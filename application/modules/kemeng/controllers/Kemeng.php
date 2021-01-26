<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kemeng extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
    	//load chart_model from model
		$this->load->model('Kemeng_model');
	}

	function matkul(){

		if ($this->session->userdata('nip') != NULL) {
			$id_fakultas = $this->session->userdata('role');
			$data = $this->Kemeng_model->get_fakultassss($id_fakultas)->result();
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
			$id_fakultas = $this->session->userdata('role');
			$data = $this->Kemeng_model->get_makul($id_fakultas)->result();
			$x['data'] = $data;

			$id_fakultas = $this->session->userdata('role');
			$fakulll = $this->Kemeng_model->get_fakultassss($id_fakultas)->result();
			// var_dump($fakulll);
			// exit();
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
		$id_fakultas = $this->session->userdata('role');
		$data = $this->Kemeng_model->get_makul($id_fakultas)->result();

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
			if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'FHTP' || $this->session->userdata('role') == 'FPP' || $this->session->userdata('role') == 'FMP' ){
				$opsi = "<a 
				href='javascript:;' data-id_matkul='$r->id_matkul' data-id_prodi='$r->id_prodi'  data-nama_prodi='$r->nama_prodi' data-nama_matkul='$r->nama_matkul'
				data-sks='$r->sks' data-id_fakultas='$r->id_fakultas' data-nama_fakultas='$r->nama_fakultas'
				data-semester='$r->semester'
				data-toggle='modal' data-target='#edit-data' class='btn btn-info'><i class='fa fas fa-edit'></i>
				</a>

				<a 
				href='javascript:;' data-id_matkul='$r->id_matkul' data-nama_matkul='$r->nama_matkul'
				data-toggle='modal' data-target='#hapusmatkul' class='btn btn-danger'><i class='fa fas fa-trash'></i>
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

 	function tambah_presensi()
	{
		$baru = $this->input->post('nama_dosen', true);
		$hahaha = explode("|",$baru);
		$nama = $hahaha[0];
		$id = $hahaha[1];


		$baru2 =$this->input->post('matkul', true);
		$hihihih = explode("|",$baru2);
		$idmat = $hihihih[0];
		$sks = $hihihih[1];

		$data['nip'] = $id;
		$data['nama_dosen'] =$nama;
		$data['id_fakultas'] = $this->input->post('fakultas', true);
		$data['id_matkul'] = $idmat;
		$data['sks'] = $sks;
		$data['id_prodi'] = $this->input->post('prodi', true);
		$data['tanggal'] = $this->input->post('tanggal', true);
		$data['jam'] = $this->input->post('jam', true);
		$data['kelas'] = $this->input->post('kelas', true);
		$result = $this->Kemeng_model->attendence_add($data);

		// var_dump($data);exit;

		if ($result) { 				
			$this->session->set_flashdata('absen', ['success', 'Data absensi berhasil disimpan']);
			redirect('kemeng'); 			
		} 
		else { 								
			$this->session->set_flashdata('absen', ['danger', 'Data absensi gagal disimpan']); 
			redirect('kemeng'); 			
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

	function jadwal_dosen(){
		if ($this->session->userdata('nip') != NULL) {
			$nip = $this->session->userdata('nip');
			$dosen = $this->session->userdata('dosen');

			if($nip == 'admin'){
				$semester = $this->input->post('semester');
				$data = $this->Kemeng_model->jadwal_dosen($nip, $semester);
				$x['data'] = json_encode($data);

				$this->session->set_flashdata('alert', 'SILAHKAN PILIH SEMESTER');

				if($data == NULL && $semester != NULL){
					$this->session->set_flashdata('alert', 'TIDAK ADA JADWAL MENGAJAR DI SEMESTER '.$semester.'.');
				}
				
				if($data != NULL && $semester != NULL){
					$this->session->set_flashdata('alert', 'JADWAL MENGAJAR DI SEMESTER '.$semester.'.');
				}

				$this->load->view("include/head");
				$this->load->view("include/top-header");
				$this->load->view("jadwal_dosen",$x);
				$this->load->view("include/sidebar");
				$this->load->view("include/panel");
				$this->load->view("include/footer");
			}else if($dosen != NULL){
				$cek_dosen = $this->Kemeng_model->cek_dosen($nip);

				if($cek_dosen != NULL){

					$semester = $this->input->post('semester');
					$data = $this->Kemeng_model->jadwal_dosen($nip, $semester);
					$x['data'] = json_encode($data);

					$this->session->set_flashdata('alert', 'SILAHKAN PILIH SEMESTER');

					if($data == NULL && $semester != NULL){
						$this->session->set_flashdata('alert', 'TIDAK ADA JADWAL MENGAJAR DI SEMESTER '.$semester.'.');
					}
					
					if($data != NULL && $semester != NULL){
						$this->session->set_flashdata('alert', 'JADWAL MENGAJAR DI SEMESTER '.$semester.'.');
					}

					$this->load->view("include/head");
					$this->load->view("include/top-header");
					$this->load->view("jadwal_dosen",$x);
					$this->load->view("include/sidebar");
					$this->load->view("include/panel");
					$this->load->view("include/footer");

				}
			}else{
				redirect("home");
			}
			
		} else {
			redirect("user");
		}
	}

	function honor() {

		if($this->session->userdata('nip') != NULL) {
						
			$x['seDate'] = date_format(new DateTime(),"m/d/yy");
			$x['uDate'] = date_format(new DateTime(),"F Y");

			$this->load->view("include/head");
			$this->load->view("include/top-header");
			$this->load->view("view_honor",$x);
			$this->load->view("include/sidebar");
			$this->load->view("include/footer");

		}else{
			redirect("user");
		}
	}

	function honor_table($date) {

		$nip = $this->session->userdata('nip');
		$data = $this->Kemeng_model->get_absen_bulan($date, $nip)->result();
		// var_dump($data);exit;
		if ($data) {
			$html = "<table id='data-table-buttons' class='table table-striped table-bordered table-td-valign-middle' width='100%'>";
			$html .= '<tr>';
			$html .= '<th>No.</th>';
			foreach($data[0] as $key=>$value){
				$html .= '<th>' . htmlspecialchars($key) . '</th>';
			}
			$html .= '</tr>';

			// data rows
			$cc = 1;
			foreach( $data as $key=>$value){
				$html .= '<tr>';
				$html .= '<td>' . $cc++ . '</td>';
				foreach($value as $key2=>$value2){
					$html .= '<td>' . htmlspecialchars(ucwords($value2)) . '</td>';
				}
				$html .= '</tr>';
			}
			$html .= '</table>';
			echo $html;
		}

	}
	//PLOT
	function plot ()
	{
		 if($this->session->userdata('nip') != NULL)
		 {
			  $data = $this->Kemeng_model->get_all_plot()->result();
			  $tp = $this->Kemeng_model->get_nama()->result();
			  $mk = $this->Kemeng_model->get_nama_matkul()->result();
			  $fk = $this->Kemeng_model->get_nama_fakultas()->result();
			  $prodi = $this->Kemeng_model->get_nama_prodi()->result();

			  $id_fakultas = $this->session->userdata('role');
			  $fakulll = $this->Kemeng_model->get_fakultassss($id_fakultas)->result();
			// var_dump($fakulll);
			// exit();
			  $x['fakulll'] = $fakulll;

			  $x['data'] = $data;
			  $x['tp'] = $tp;
			  $x['mk'] = $mk;
			  $x['fk'] = $fk;
			  $x['prodi'] = $prodi;
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
		$nama = $this->input->post('nama', true);
		$id_matkul = $this->input->post('id_matkul', true);
		$id_prodi = $this->input->post('prodi', true);
		$tanggal = $this->input->post('tanggal', true);
		$jam = $this->input->post('jam', true);
		$kelas = $this->input->post('kelas', true);
		$semester = $this->input->post('semester', true);
		$id_fakultas = $this->input->post('fakultas', true);
		$sks = $this->input->post('sks', true);

		$nama_fakultas = $this->Kemeng_model->getRowFakultas($id_fakultas);
		$nama_prodi = $this->Kemeng_model->getRowProdi($id_prodi);
		$nama_matkul = $this->Kemeng_model->getRowMatkul($id_matkul);

		$plot = [
			'nama' => $nama,
			'nama_matkul' => $nama_matkul->nama_matkul, //ini penulisannya kan pakai tanda panah artinya ini object
			'id_matkul' => $id_matkul,
			'tanggal' => $tanggal,
			'jam' => $jam,
			'kelas' => $kelas,
			'semester' => $semester,
			'id_fakultas' => $id_fakultas,
			'nama_fakultas' => $nama_fakultas->nama_fakultas,
			'id_prodi' => $id_prodi,
			'nama_prodi' => $nama_prodi->nama_prodi,
		];
		
		$kemeng = 9;
		if ($plot['sks'] > $kemeng) {
			$plot['indeks'] = $plot['sks'] - $kemeng;
		}
		
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

	   $editplot['id_plot'] = $this->input->post('id_plot', true);
	   $editplot['nama'] = $this->input->post('nama', true);
	   $editplot['nama_matkul'] = $this->input->post('nama_matkul', true);
	   $editplot['tanggal'] = $this->input->post('tanggal', true);
	   $editplot['jam'] = $this->input->post('jam', true);
	   $editplot['kelas'] = $this->input->post('kelas', true);
	   $editplot['semester'] = $this->input->post('semester', true);
	   $editplot['nama_fakultas'] = $this->input->post('nama_fakultas', true);

   // 	var_dump($editplot);
   // exit();
	   
	   $result = $this->Kemeng_model->edit_plot($editplot);
		   
	   if (!$result) { 	
		   $this->session->set_flashdata('plot', 'DATA BERHASIL DIUBAH.');			
		   redirect('kemeng/plot'); 									
	   } else { 								
		   $this->session->set_flashdata('plot', 'DATA GAGAL DIUBAH.');		
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
			$nama_prodi = $r->nama_prodi;
						 
			if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'FHTP' || $this->session->userdata('role') == 'FPP' || $this->session->userdata('role') == 'FMP' ){
				 $aksi = "<a href='javascript:; 'data-id_plot='$r->id_plot' data-nama='$r->nama' data-nama_matkul='$r->nama_matkul' data-tanggal='$r->tanggal' 
				 data-jam='$r->jam' data-kelas='$r->kelas' data-semester='$r->semester' 
				 data-nama_fakultas='$r->nama_fakultas' data-nama_prodi='$r->nama_prodi' data-toggle='modal' data-target='#edit-plot'> <button  data-toggle=
				 'modal' data-target='#ubah-data' class='btn btn-info'>Ubah</button> </a>
				 
				 <a 
				 href='javascript:;' data-nama='$r->nama' data-id_plot='$r->id_plot'
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
				 $nama_prodi,
				 $aksi,
			);
	   }
	   
	   echo json_encode($plot);
  }

  function hapus_plot()
   {
	   $id = $this->input->post('id_plot');
	   

	   $hasil = $this->Kemeng_model->hapus_plot($id);

	   if (!$hasil) { 		
		   $this->session->set_flashdata('plot', 'DATA BERHASIL DIHAPUS.');	
		   redirect('kemeng/plot'); 						 			
	   } else { 								
		   $this->session->set_flashdata('plot', 'DATA GAGAL DIHAPUS.');				
		   redirect('kemeng/plot');		
	   }
	   
   }

   public function getProdiByFakultasId($fakultas_id)
	{
		$data = $this->Kemeng_model->ProdiByFakultasId($fakultas_id);
		echo json_encode($data);
	}

	public function getMatkulByProdiId($prodi_id)
	{
		$data = $this->Kemeng_model->MatkulByProdiId($prodi_id);
		echo json_encode($data);
	}
  //END PLOT
}