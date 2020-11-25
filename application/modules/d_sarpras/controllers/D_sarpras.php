<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class D_sarpras extends CI_Controller {
	function __construct(){
		parent::__construct();
			//load chart_model from model
		$this->load->model('d_sarpras_model');
	}

	function index($kampus = NULL) {
		if($this->session->userdata('nip') != NULL) {
			if ($kampus == NULL) {
				$x['title'] = 'Parent';
				$data = $this->d_sarpras_model->get_sarpras()->result();
				// $chart = $this->d_sarpras_model->get_sarpras_year()->result();
				$chart = $this->d_sarpras_model->get_belanja_tahun()->result();
				$list_kat = $this->d_sarpras_model->get_kategori()->result();

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
						'perolehan'			=>  $z['perolehan'],
						'tahun'			=>	$z['tahun'],
						'kategori'	=>	$z['kategori']
					));

				endforeach;
				array_push($arr, $tmp);

				$x['data'] = json_encode($data);
				$x['chart'] = $arr;
				$x['l_kat'] = json_encode($list_kat);

				$this->load->view("include/head");
				$this->load->view("include/top-header");
				$this->load->view("view_sarpras",$x);
				$this->load->view("include/sidebar");
				$this->load->view("include/footer");
			}
		}else{
			redirect("user");
		}
	}
}