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
            $role = $this->pegawai_model->get_role()->result();
            $x['data'] = $data;
            $x['role'] = $role;

			$this->load->view("include/head");
            $this->load->view("include/top-header");
            $this->load->view('index_peg', $x);
            $this->load->view("include/sidebar");
            $this->load->view("include/panel");
            $this->load->view("include/footer");
		}
    }

    public function tambah_pegawai()
	{
        $input_data['nip'] = $this->input->post('nip', true); 			
        $input_data['nama_user'] = $this->input->post('nama_user', true);
        $input_data['password'] = md5($this->input->post('password', true));
        $input_data['role'] = $this->input->post('role', true);
        $input_data['created_at'] = date("Y-m-d H:i:s");

        $result = $this->pegawai_model->tambah_pegawai($input_data);

        if (!$result) { 							
            $this->session->set_flashdata('notif_tambah', 'Data Pegawai Gagal ditambahkan.'); 				
            redirect('pegawai'); 			
        } else { 								
            $this->session->set_flashdata('notif_tambah', 'Data Pegawai Berhasil ditambahkan.');			
            redirect('pegawai'); 			
        }
    }

    public function edit_pegawai()
	{
        $input_data['role'] = $this->input->post('role', true);

        $result = $this->pegawai_model->edit_pegawai($input_data);

        if (!$result) { 							
            $this->session->set_flashdata('notif_tambah', 'Data Pegawai Gagal ditambahkan.'); 				
            redirect('pegawai'); 			
        } else { 								
            $this->session->set_flashdata('notif_tambah', 'Data Pegawai Berhasil ditambahkan.');			
            redirect('pegawai'); 			
        }
    }

    function hapus_pegawai(){
        $id_user=$this->input->post('id_user');
        $this->pegawai_model->hapus_pegawai($id_user);
        redirect('pegawai');
    }
}
?>