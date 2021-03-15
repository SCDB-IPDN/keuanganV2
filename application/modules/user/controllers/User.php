<?php
defined('BASEPATH') OR exit('No direct script access allowed ');
class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model('user_model');
        $this->load->model('choose_model');
    }

    public function index()
	{
		if($this->session->userdata('nip') == NULL)
		{
			$this->load->view('login');
		}else{
			redirect('home');
		}
	}

	// CHOOSE TAMPILAN
	public function choose()
	{	
		$t_umum = $this->choose_model->get_link_umum();
		$t_password = $this->choose_model->get_link_password();

		if ($t_umum && $t_password != NULL) {
			$x['t_umum'] = $t_umum[0]->link;
			$x['t_password'] = $t_password[0]->link;
		} else {
			$x['t_umum'] = 'Link Kosong';
			$x['t_password'] = 'Link Kosong';
		}

		$this->load->view('choose-login',$x);
	}
 
	public function proses()
	{
		$nip = $this->input->post('nip', TRUE);
        $password = MD5($this->input->post('password', TRUE));
        
		if($this->user_model->login_user($nip,$password))
		{
			redirect('home');
		}
		else
		{
			$this->session->set_flashdata('error','NIP ATAU PASSWORD SALAH !!!');
			redirect('');
		}
    }
    
    public function logout()
	{
		$this->session->unset_userdata('nip');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('is_login');
		$this->session->unset_userdata('image_url');
		$this->session->unset_userdata('dosen');
		redirect('user');
	}
}
?>