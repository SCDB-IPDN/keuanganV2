<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Absensi extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
    	//load chart_model from model
		$this->load->model('Absensi_model');
	}

	
	function index()
	{
		if ($this->session->userdata('nip') != NULL) {
			$divisi = $this->Absensi_model->get_divisi()->result();
			$absen = $this ->Absensi_model->get_absensi()->result();

			$x['divisi'] = json_encode($divisi);
			$x['absen'] = $absen;

			$this->load->view("include/head");
			$this->load->view("include/top-header");
			$this->load->view("view_absensi", $x);
			$this->load->view("include/sidebar");
			$this->load->view("include/panel");
			$this->load->view("include/footer");
		} else {
			redirect("user");
		}
	}

	function coba($penugasan = NULL)
	{
		// var_dump($penugasan);exit();

		// $bebas= preg_replace('/[^A-Z a-z\,]/', '', $penugasan);
		$nya = str_replace('%20', " ", $penugasan);
		// var_dump($nya);exit();
		if ($this->session->userdata('nip') != NULL) {
			$data = $this->Absensi_model->get_divisi_table($nya)->result();
			echo json_encode($data);

		} else {
			redirect("user");
		}
	}



}