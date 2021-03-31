<?php
defined('BASEPATH') OR exit('No direct script access allowed ');
class F_website extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        //load model
		$this->load->model('F_website_model');
		$this->load->model('home/home_model');
		$this->load->model('user/choose_model');
	}

	public function index()
	{
		if($this->session->userdata('nip') != NULL)
		{
			$apps = $this->home_model->apps();
			$berita = $this->home_model->listing();

			$x['berita'] = $berita;
			$x['apps'] = $apps;

			$t_utama = $this->choose_model->get_link_utama();
			$t_pilih = $this->choose_model->get_link_pilihan();
			$t_umum = $this->choose_model->get_link_umum();
			$t_password = $this->choose_model->get_link_password();

			if ($t_utama && $t_umum && $t_password != NULL) {
				$x['t_utama'] = $t_utama[0]->link;
				$x['t_pilih'] = $t_pilih[0]->link;
				$x['t_umum'] = $t_umum[0]->link;
				$x['t_password'] = $t_password[0]->link;
			} else {
				$x['t_utama'] = 'Link Kosong';
				$x['t_pilih'] = 'Link Kosong';
				$x['t_umum'] = 'Link Kosong';
				$x['t_password'] = 'Link Kosong';
			}
			$website = $this->F_website_model->get_website();
			// var_dump($website);exit;

			if ($website != NULL) {
				if ($website[0]->kode == '001' && $website[0]->berkas == '1') {
					
				// UGM
				// $this->load->view('include/website-ugm/head.php');
				// $this->load->view('include/website-ugm/top-header.php',$x);
					$this->load->view('ugm/index.php');
				// $this->load->view('include/website-ugm/footer');
					
					
				} else if ($website[0]->kode == '002' && $website[0]->berkas == '1') {
					
				// ITB
					$this->load->view('include/website-itb/head.php');
					$this->load->view('include/website-itb/top-header.php',$x);
					$this->load->view('itb/index.php');
					$this->load->view('include/website-itb/footer');
					
				} else if ($website[0]->kode == '003' && $website[0]->berkas == '1') {
					
				// OPSI 03 WEB
					$this->load->view('include/website-03/head.php');
					$this->load->view('include/website-03/top-header.php',$x);
					$this->load->view('03/index.php');
					$this->load->view('include/website-03/footer');
					
				} else if ($website[0]->kode == '004' && $website[0]->berkas == '1') {
					
				// OPSI 04 WEB
					$this->load->view('include/website-04/head.php');
					$this->load->view('include/website-04/top-header.php',$x);
					$this->load->view('04/index.php');
					$this->load->view('include/website-04/footer');
					
				} else if ($website[0]->kode == '005' && $website[0]->berkas == '1') {
					
				// OPSI 05 WEB
					$this->load->view('include/website-05/head.php');
					$this->load->view('include/website-05/top-header.php',$x);
					$this->load->view('05/index.php');
					$this->load->view('include/website-05/footer');
					
				} else if ($website[0]->kode == '006' && $website[0]->berkas == '1') {
					
				// OPSI 06 WEB
					$this->load->view('include/website-06/head.php');
					$this->load->view('include/website-06/top-header.php',$x);
					$this->load->view('06/index.php');
					$this->load->view('include/website-06/footer');
					
				} else if ($website[0]->kode == '007' && $website[0]->berkas == '1') {
					
				// OPSI 07 WEB
					$this->load->view('include/website-07/head.php');
					$this->load->view('include/website-07/top-header.php',$x);
					$this->load->view('include/website-07/panel.php');
					$this->load->view('07/index.php');
					$this->load->view('include/website-07/footer');
					
				} else if ($website[0]->kode == '008' && $website[0]->berkas == '1') {
					
				// OPSI 08 WEB
					// $this->load->view('include/website-08/head.php');
					// $this->load->view('include/website-08/top-header.php',$x);
					$this->load->view('08/index.php');
					// $this->load->view('include/website-08/footer');
					
				} else if ($website[0]->kode == '009' && $website[0]->berkas == '1') {
					
				// OPSI 09 WEB
					$this->load->view('include/website-09/head.php');
					$this->load->view('include/website-09/top-header.php',$x);
					$this->load->view('include/website-09/panel.php');
					$this->load->view('09/index.php',$x);
					$this->load->view('include/website-09/footer');
					
				}
			} else {
			// include "website-ugm/laman/notfound/head.php";
			// include "pages/laman/notfound-validation.php";
			// include "include/website-ugm/notfound/footer.php";
				echo "string";
			}
		}else{
			//jika session belum terdaftar, maka redirect ke halaman login
			redirect("user");
		}
	}

	public function updateweb()
	{	
		$data['id'] = 8;
		$data['berkas'] = '1';

		$result = $this->F_website_model->updateweb($data);

		redirect('f_website');
	}
	
	public function updatewebnol()
	{	
		$data['id'] = 8;
		$data['berkas'] = '0';

		$result = $this->F_website_model->updatewebnol($data);

		redirect('f_website');
	}

	public function tema2(){
		$this->load->view('include/website-09/head.php');
		$this->load->view('include/website-09/top-header.php');
		$this->load->view('include/website-09/panel.php');
		$this->load->view('09/index.php');
		$this->load->view('include/website-09/footer');
	}
}
?>
