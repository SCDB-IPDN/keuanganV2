<?php
defined('BASEPATH') OR exit('No direct script access allowed ');
class F_Themes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        //load model
		$this->load->model('f_themes_model');
	}

	public function index()
	{
		$laman = $this->f_themes_model->get_laman();
		$link_khusus = $this->f_themes_model->get_link_khusus();
		$link_umum = $this->f_themes_model->get_link_umum();
		// var_dump($laman);exit;
		$x['khusus'] = $link_khusus[0]->link;
		$x['umum'] = $link_umum[0]->link;

		if ($laman != NULL) {
			if ($laman[0]->kode == '001' && $laman[0]->berkas == '1') {
			// Themes Vidio
				$this->load->view('include/themes/vidio/head');
				$this->load->view('vidio-validation.php',$x);
				$this->load->view('include/themes/vidio/footer');
	
			} else if ($laman[0]->kode == '002' && $laman[0]->berkas == '1') {
	
			// Themes Slide
				$this->load->view('include/themes/slide/head');
				$this->load->view('slide-validation.php',$x);
				$this->load->view('include/themes/slide/footer');
	
			} else if ($laman[0]->kode == '003' && $laman[0]->berkas == '1') {
	
			// Themes Single
				$this->load->view('include/themes/single/head');
				$this->load->view('single-validation.php',$x);
				$this->load->view('include/themes/single/footer');
	
			} else if ($laman[0]->kode == '004' && $laman[0]->berkas == '1') {
	
			// Themes Color
				$this->load->view('include/themes/color/head');
				$this->load->view('color-validation.php',$x);
				$this->load->view('include/themes/color/footer');
	
			}
		} else {

			$this->load->view('include/themes/notfound/head');
			$this->load->view('notfound-validation.php',$x);
			$this->load->view('include/themes/notfound/footer');

		}
	}
	
	public function indextwo()
	{
		
		$this->load->view('include/themes/notfound/head-two');
		$this->load->view('notfound-validation-two.php');
		$this->load->view('include/themes/notfound/footer-two');
	}

	public function indexthree()
	{
		
		$this->load->view('include/themes/notfound/head-three');
		$this->load->view('notfound-validation-three.php');
		$this->load->view('include/themes/notfound/footer-three');
	}
}
?>