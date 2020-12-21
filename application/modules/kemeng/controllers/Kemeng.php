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

	function get_matkul(){

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
			$this->session->set_flashdata('ubah', 'DATA MATAKULIAH GAGAL DIUBAH.');		
			redirect('Kemeng/get_matkul'); 			
		} else { 								
			$this->session->set_flashdata('ubah', 'DATA MATAKULIAH BERHASIL DIUBAH.');			
			redirect('Kemeng/get_matkul'); 			
		}
	}

	function tambahmatakuliah(){

		$input_data['id_matkul'] = $this->input->post('id_matkul', true);
		$input_data['nama_matkul'] = $this->input->post('nama_matkul', true);
		$input_data['id_prodi'] = $this->input->post('id_prodi', true);
		$input_data['id_fakultas'] = $this->input->post('id_fakultas', true);
		$input_data['sks'] = $this->input->post('sks', true);
		$input_data['semester'] = $this->input->post('semester', true);
		
		$result = $this->Kemeng_model->tambahmatkul($input_data);

		if (!$result) { 							
			$this->session->set_flashdata('tambah', 'DATA MATAKULIAH GAGAL DITAMBAHKAN.');		
			redirect('Kemeng/get_matkul'); 			
		} else { 								
			$this->session->set_flashdata('tambah', 'DATA MATAKULIAH BERHASIL DITAMBAHKAN.');			
			redirect('Kemeng/get_matkul'); 			
		}
	}


}