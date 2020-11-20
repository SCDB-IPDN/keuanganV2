<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class D_sarpras extends CI_Controller {
	function __construct(){
		parent::__construct();
			//load chart_model from model
		$this->load->model('d_sarpras_model');
	}

	function index($kampus = NULL) {
		if($_SESSION['nip']) {
			if ($kampus == NULL) {
				$x['title'] = 'Parent';
				$data = $this->d_sarpras_model->get_sarpras()->result(); 
			} else {
				$x['title'] = $kampus;
			}

			$x['data'] = json_encode($data);

			$this->load->view("include/head");
			$this->load->view("include/top-header");
			$this->load->view("view_sarpras",$x);
			$this->load->view("include/sidebar");
			$this->load->view("include/footer");
			
		}else{
			redirect("user");
		}
	}
}