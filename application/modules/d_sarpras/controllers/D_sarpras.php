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
				$chart = $this->d_sarpras_model->get_sarpras_year()->result();
			} else {
				$x['title'] = $kampus;
			}

			$chart = json_encode($chart);

			$kat = "";
			$arr = $tmp = array();
			foreach (json_decode($chart, true) as $z):

				if ($z['kategori'] != $kat) {
					if ($kat != "") {
						array_push($arr, $tmp);
						$tmp = array();
					}
					$kat = $z['kategori'];
				}
				array_push($tmp, array(
					'total'			=>  $z['total'],
					'tahun'			=>	$z['tahun'],
					'kategori'	=>	$z['kategori']
				));

			endforeach;
			array_push($arr, $tmp);

			$x['data'] = json_encode($data);
			$x['chart'] = $arr;

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