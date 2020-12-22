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
