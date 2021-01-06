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

    function index()
	{
		if ($this->session->userdata('nip') != NULL) {

			$this->load->view("include/head");
			$this->load->view("include/top-header");
			$this->load->view("view_uu", $x);
			$this->load->view("include/sidebar");
			$this->load->view("include/panel");
			$this->load->view("include/footer");
		} else {
			redirect("user");
		}
    }
}