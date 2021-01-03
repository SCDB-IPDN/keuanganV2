<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kemeng extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
    	//load chart_model from model
		$this->load->model('Kemeng_model');
	}

	function matkul(){

		if ($this->session->userdata('nip') != NULL) {
			$data = $this->Kemeng_model->get_fakul()->result();
			$x['data'] = $data;

			$this->load->view("include/head");
			$this->load->view("include/top-header");
			$this->load->view("edit_matkul",$x);
			$this->load->view("include/sidebar");
			$this->load->view("include/panel");
			$this->load->view("include/footer");
		}

	}

	function view_matkul(){

		if ($this->session->userdata('nip') != NULL) {
			$data = $this->Kemeng_model->get_makul()->result();
			$x['data'] = $data;

			$fakulll = $this->Kemeng_model->get_fakul()->result();
			$x['fakulll'] = $fakulll;

			$this->load->view("include/head");
			$this->load->view("include/top-header");
			$this->load->view("view_matkul1",$x);
			$this->load->view("include/sidebar");
			$this->load->view("include/panel");
			$this->load->view("include/footer");
		}

	}


	// function get_prodii($idfakul=NULL){
	// 	if ($this->session->userdata('nip') != NULL) {
	// 		$prodiii = $this->Kemeng_model->get_prodi($idfakul)->result();
	// 		echo json_encode($prodiii);
	// 	}

	// }


	// function get_prodii(){
	//       $$idfakul = $this->input->post('id_fakultas',TRUE);
	//       $data = $this->Kemeng_model->get_prodi($$idfakul)->result();
	//       echo json_encode($data);
	//   }

	function get_sub_category(){
		$category_id = $this->input->post('id_prodi',TRUE);
		$data = $this->Kemeng_model->get_sub_category($category_id)->result();
		echo json_encode($data);
	}


	function cobain(){
		$data = $this->Kemeng_model->get_makul()->result();

		$dataall = array();

		$no = 1;
		foreach($data as $r) {
			$id_matkul = $r->id_matkul;
			$nama_matkul = $r->nama_matkul;
			$nama_prodi = $r->nama_prodi;
			$id_fakultas = $r->id_fakultas;
			$nama_fakultas = $r->nama_fakultas;
			$id_prodi = $r->id_prodi;

			$sks = $r->sks;
			$semester = $r->semester;
			if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'Keprajaan'){
				$opsi = "<a 
				href='javascript:;' data-id_matkul='$r->id_matkul' data-id_prodi='$r->id_prodi'  data-nama_prodi='$r->nama_prodi' data-nama_matkul='$r->nama_matkul'
				data-sks='$r->sks' data-id_fakultas='$r->id_fakultas' data-nama_fakultas='$r->nama_fakultas'
				data-semester='$r->semester'
				data-toggle='modal' data-target='#edit-data'> <button  data-toggle=
				'modal' data-target='#ubah-data' class='btn btn-info'>Ubah</button>
				</a>

				<a 
				href='javascript:;' data-id_matkul='$r->id_matkul' data-nama_matkul='$r->nama_matkul'
				<button  data-toggle=
				'modal' data-target='#hapusmatkul' class='btn btn-danger'>Hapus</button>
				</a>";
			}else{
				$opsi = "";
			}

			$dataall[] = array(
				$no++,
				$id_matkul,
				$nama_matkul,
	// $id_fakultas,
				$nama_fakultas,
	// $id_prodi,
				$nama_prodi,
				$sks,
				$semester,
				$opsi
			);
		}
		echo json_encode($dataall);
	}

	function ubah(){

		$ubahmatakuliah['id_matkul'] = $this->input->post('id_matkul', true);
		$ubahmatakuliah['nama_matkul'] = $this->input->post('nama_matkul', true);
		$ubahmatakuliah['id_prodi'] = $this->input->post('id_prodi', true);
		$ubahmatakuliah['id_fakultas'] = $this->input->post('id_fakultas', true);
		$ubahmatakuliah['sks'] = $this->input->post('sks', true);
		$ubahmatakuliah['semester'] = $this->input->post('semester', true);
		
		$result = $this->Kemeng_model->ubah($ubahmatakuliah);

		if (!$result) { 							
			$this->session->set_flashdata('matkul', 'DATA MATAKULIAH GAGAL DIUBAH.');		
			redirect('Kemeng/view_matkul'); 			
		} else { 								
			$this->session->set_flashdata('matkul', 'DATA MATAKULIAH BERHASIL DIUBAH.');			
			redirect('Kemeng/view_matkul'); 			
		}
	}

	function tambahmatakuliah(){

		$input_data['id_matkul'] = $this->input->post('id_matkul', true);
		$input_data['nama_matkul'] = $this->input->post('nama_matkul', true);
		$input_data['id_prodi'] = $this->input->post('prodi', true);
		$input_data['id_fakultas'] = $this->input->post('fakultas', true);
		$input_data['sks'] = $this->input->post('sks', true);
		$input_data['semester'] = $this->input->post('semester', true);
		
		$cekdata = $this->Kemeng_model->cekdata($input_data['id_matkul']);
		if(!$cekdata){
			$result = $this->Kemeng_model->cekdata($input_data);
		}else{

			$this->session->set_flashdata('matkul', 'KODE MATKUL SUDAH TERDAFTAR!!');
			$x['alert'] = 'ada';			
			redirect('Kemeng/view_matkul',$x);
		}

		$result = $this->Kemeng_model->tambahmatkul($input_data);

		if (!$result) { 							
			$this->session->set_flashdata('matkul', 'DATA MATAKULIAH GAGAL DITAMBAHKAN!!');		
			redirect('Kemeng/view_matkul'); 			
		} else { 								
			$this->session->set_flashdata('matkul', 'DATA MATAKULIAH BERHASIL DITAMBAHKAN.');			
			redirect('Kemeng/view_matkul'); 			
		}
	}


	function hapus_matkul()
	{
		$id_matkul = $this->input->post('id_matkul');

		$hasil = $this->Kemeng_model->del_matkul($id_matkul);

		if (!$hasil) { 							
			$this->session->set_flashdata('matkul', 'DATA MATAKULIAH GAGAL DIHAPUS.');				
			redirect('Kemeng/view_matkul'); 			
		} else { 								
			$this->session->set_flashdata('matkul', 'DATA MATAKULIAH BERHASIL DIHAPUS.');	
			redirect('Kemeng/view_matkul'); 			
		}
		
	}

	function index()
	{
		if ($this->session->userdata('nip') != NULL) {
			$fakultas = $this->Kemeng_model->get_fakul()->result();
			$nama_dosen = $this ->Kemeng_model->get_namdosen()->result();

			$x['fakultas'] = $fakultas;
			$x['nama_dosen'] = $nama_dosen;

			$this->load->view("include/head");
			$this->load->view("include/top-header");
			$this->load->view("view_presensi", $x);
			$this->load->view("include/sidebar");
			$this->load->view("include/panel");
			$this->load->view("include/footer");
		} else {
			redirect("user");
		}
	}

	 //PLOT

     function plot()
     {
          if($this->session->userdata('nip') != NULL)
          {
               $data = $this->Kemeng_model->get_all_plot()->result();
               $tp = $this->Kemeng_model->get_nama()->result();
               $mk = $this->Kemeng_model->get_nama_matkul()->result();
			   $fk = $this->Kemeng_model->get_nama_fakultas()->result();
			   $fakultas = $this->Kemeng_model->get_fakul()->result();

			   $x['fakultas'] = $fakultas;
               $x['data'] = $data;
               $x['tp'] = $tp;
               $x['mk'] = $mk;
               $x['fk'] = $fk;
            //    var_dump($tp);
            //    exit();    
               $this->load->view("include/head");
               $this->load->view("include/top-header");
               $this->load->view('view_plot', $x);
               $this->load->view("include/sidebar");
               $this->load->view("include/panel");
               $this->load->view("include/footer");
          }else{
               redirect("user");
          }
	 }
	 
	 public function tambah_plot()
	 {		
		   $plot['nama'] = $this->input->post('nama', true);
		   $plot['nama_matkul'] = $this->input->post('nama_matkul', true);
		   $plot['tanggal'] = $this->input->post('tanggal', true);
		   $plot['jam'] = $this->input->post('jam', true);
		   $plot['kelas'] = $this->input->post('kelas', true);
		   $plot['semester'] = $this->input->post('semester', true);
		   $plot['nama_fakultas'] = $this->input->post('nama_fakultas', true);
		
		   $pisah = explode("|", $plot['nama']);
		   $nama = $pisah[0];
		   $nip = $pisah[1];
		   $plot['nama']=$nama;
		   $plot['nip']=$nip;

		   $result = $this->Kemeng_model->tambah_plot($plot);
		   
		   if (!$result) { 							
				$this->session->set_flashdata('plot', 'DATA GAGAL DITAMBAHKAN.'); 				
				redirect('kemeng/plot'); 			
		   } else { 								
				$this->session->set_flashdata('plot', 'DATA BERHASIL DITAMBAHKAN.');			
				redirect('kemeng/plot'); 			
		   }
	 }

	 function edit_plot(){

		$editplot['nama'] = $this->input->post('nama', true);
		$editplot['nama_matkul'] = $this->input->post('nama_matkul', true);
		$editplot['tanggal'] = $this->input->post('tanggal', true);
		$editplot['jam'] = $this->input->post('jam', true);
		$editplot['kelas'] = $this->input->post('kelas', true);
		$editplot['semester'] = $this->input->post('semester', true);
		$editplot['nama_fakultas'] = $this->input->post('nama_fakultas', true);
		
		$result = $this->Kemeng_model->edit_plot($editplot);
	
		if (!$result) { 							
			$this->session->set_flashdata('plot', 'DATA GAGAL DIUBAH.');		
			redirect('kemeng/plot'); 			
		} else { 								
			$this->session->set_flashdata('plot', 'DATA BERHASIL DIUBAH.');			
			redirect('kemeng/plot'); 			
		}
	}

	 function table_plot() {
		$data = $this->Kemeng_model->get_all_plot()->result();
   
		$plot = array();
		$no = 1;
   
		foreach($data as $r) {
			 $nama = $r->nama.'|'.$r->nip;
			 $nama_matkul = $r->nama_matkul; 
			 $tanggal = $r->tanggal; 
			 $jam = $r->jam;
			 $kelas = $r->kelas;
			 $semester = $r->semester;
			 $nama_fakultas = $r->nama_fakultas;
						  
			 if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'Kepegawaian'){
				  $aksi = "<a href='javascript:; 'data-nama='$r->nama' data-nama_matkul='$r->nama_matkul' data-tanggal='$r->tanggal' 
				  data-jam='$r->jam' data-kelas='$r->kelas' data-semester='$r->semester' 
				  data-nama_fakultas='$r->nama_fakultas' data-toggle='modal' data-target='#edit-plot'> <button  data-toggle=
				  'modal' data-target='#ubah-data' class='btn btn-info'>Ubah</button> </a>
				  
				  <a 
				  href='javascript:;' data-nama='$r->nama'
				  <button  data-toggle=
				  'modal' data-target='#hapusplot' class='btn btn-danger'>Hapus</button>
				  </a>"; ;
			 }else{
				  $aksi = "";
			 }
   
			 $plot[] = array(
				  $no++,
				  $nama,
				  $nama_matkul,
				  $tanggal,
				  $jam,
				  $kelas,
				  $semester,
				  $nama_fakultas,
				  $aksi,
			 );
		}
		
		echo json_encode($plot);
   }
   
   //END PLOT

 	function tambah_presensi()
	{
		$data['nama_dosen'] = $this->input->post('nama_dosen', true);
		$data['id_fakultas'] = $this->input->post('fakultas', true);
		$data['id_matkul'] = $this->input->post('matkul', true);
		$data['id_prodi'] = $this->input->post('prodi', true);
		$data['tanggal'] = $this->input->post('tanggal', true);
		$data['jam'] = $this->input->post('jam', true);
		$data['kelas'] = $this->input->post('kelas', true);
		$result = $this->Kemeng_model->attendence_add($data);

		if ($result) { 				
			$this->session->set_flashdata('absen', ['success', 'Data absensi berhasil disimpan']);
			redirect('kemeng/view_matkul'); 			
		} 
		else { 								
			$this->session->set_flashdata('absen', ['danger', 'Data absensi gagal disimpan']); 
			redirect('kemeng/view_matkul'); 			
		} 
	}

	function get_matkul() 
	{
		$prodi = $this->input->post('data');
		$fakultaz = $this->Kemeng_model->get_matkul($prodi)->result();
		echo json_encode($fakultaz);
	}

	function get_prodi() 
	{
		$fakultas = $this->input->post('data');
		$prodi = $this->Kemeng_model->get_prodi($fakultas)->result();
		echo json_encode($prodi);
	}
}