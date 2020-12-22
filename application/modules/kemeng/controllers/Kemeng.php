<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kemeng extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Kemeng_model');
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

               $x['data'] = $data;
               $x['tp'] = $tp;
               $x['mk'] = $mk;
               $x['fk'] = $fk;
               // var_dump($fk);
               // exit();    
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
 
		   $result = $this->Kemeng_model->tambah_plot($plot);
 
		   if (!$result) { 							
				$this->session->set_flashdata('plot', 'DATA GAGAL DITAMBAHKAN.'); 				
				redirect('kepegawaian/plot'); 			
		   } else { 								
				$this->session->set_flashdata('plot', 'DATA BERHASIL DITAMBAHKAN.');			
				redirect('kepegawaian/plot'); 			
		   }
	 }

	 function table_plot() {
		$data = $this->Kemeng_model->get_all_plot()->result();
   
		$apa = array();
		$no = 1;
   
		foreach($data as $r) {
			 $nama = $r->nama == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $r->nama;
			 $nama_matkul = $r->nama_matkul == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $r->nama_matkul; 
			 $tanggal = $r->tanggal == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $r->tanggal; 
			 $jam = $r->jam == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $r->jam;
			 $kelas = $r->kelas == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $r->kelas;
			 $semester = $r->semester == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $r->semester;
			 $nama_fakultas = $r->nama_fakultas == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $r->nama_fakultas;
						  
			 if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'Kepegawaian'){
				  $aksi = "<a href='javascript:; 'data-nama='$r->nama' data-nama_matkul='$r->nama_matkul' data-tanggal='$r->tanggal' data-jam='$r->jam' data-kelas='$r->kelas' data-semester='$r->semester' data-nama_fakultas='$r->nama_fakultas' </a>";
			 }else{
				  $aksi = "Tidak ada Akses";
			 }
   
			 $apa[] = array(
				  $no++,
				  $nama,
				  $nama_matkul,
				  $tanggal,
				  $jam,
				  $kelas,
				  $semester,
				  $nama_fakultas,
			 );
		}
		
		echo json_encode($apa);
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
}
