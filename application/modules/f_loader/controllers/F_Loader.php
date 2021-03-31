<?php
defined('BASEPATH') OR exit('No direct script access allowed ');
class F_Loader extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        //load model
		$this->load->model('f_loader_model');
	}

	public function index()
	{
		$loader = $this->f_loader_model->get_link_loader();
		$x['link'] = $loader[0]->link;
		$x['pending'] = $loader[0]->pending;
		// var_dump($x);exit;

		$this->load->view('include/loader/head');
		$this->load->view('loader.php',$x);
		$this->load->view('include/loader/footer');

	}

}
?>