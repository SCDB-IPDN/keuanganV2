<?php
defined('BASEPATH') OR exit('No direct script access allowed ');
class Pegawai extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model('pegawai_model');
    }

    public function index()
	{
		if($this->session->userdata('role') != 'Admin')
		{
			$this->load->view('Home');
		}else{
            
            $data = $this->pegawai_model->get_data()->result();
            $x['data'] = $data;

			$this->load->view("include/head");
            $this->load->view("include/top-header");
            $this->load->view('index_peg', $x);
            $this->load->view("include/sidebar");
            $this->load->view("include/panel");
            $this->load->view("include/footer");
		}
    }
}
?>