<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kepegawaian extends CI_Controller{
     function __construct(){
          parent::__construct();
          $this->load->model('kepegawaian_model');
     }

     function index()
     {
          if($_SESSION['nip'])
          {
               $data = $this->kepegawaian_model->get_all_pns()->result();

               $x['data'] = $data;
          
               $this->load->view("include/head");
               $this->load->view("include/top-header");
               $this->load->view('view_pns', $x);
               $this->load->view("include/sidebar");
               $this->load->view("include/panel");
               $this->load->view("include/footer");
          }else{
               redirect("user");
          }
     }

     function thl()
     {
          if($_SESSION['nip'])
          {
               $data = $this->kepegawaian_model->get_all_thl()->result();

               $x['data'] = $data;
          
               $this->load->view("include/head");
               $this->load->view("include/top-header");
               $this->load->view('view_thl', $x);
               $this->load->view("include/sidebar");
               $this->load->view("include/panel");
               $this->load->view("include/footer");
          }else{
               redirect("user");
          }
     }

     public function tambah_thl()
	{		
          $input_data['nama'] = $this->input->post('nama', true);
          $input_data['tempat_lahir'] = $this->input->post('tempat_lahir', true);
          $input_data['tanggal_lahir'] = $this->input->post('tanggal_lahir', true);
          $input_data['penugasan'] = $this->input->post('penugasan', true);

          $result = $this->kepegawaian_model->tambah_thl($input_data);

          if (!$result) { 							
               $this->session->set_flashdata('thl', 'DATA THL GAGAL DITAMBAHKAN.'); 				
               redirect('kepegawaian/thl'); 			
          } else { 								
               $this->session->set_flashdata('thl', 'DATA THL BERHASIL DITAMBAHKAN.');			
               redirect('kepegawaian/thl'); 			
          }
    }

     public function edit_thl()
     {
          $input_data['id_thl'] = $this->input->post('id_thl', true);
          $input_data['nama'] = $this->input->post('nama', true);
          $input_data['tempat_lahir'] = $this->input->post('tempat_lahir', true);
          $input_data['tanggal_lahir'] = $this->input->post('tanggal_lahir', true);
          $input_data['penugasan'] = $this->input->post('penugasan', true);

          $result = $this->kepegawaian_model->edit_thl($input_data);

          if (!$result) { 							
               $this->session->set_flashdata('thl', 'DATA THL GAGAL DIUBAH.');		
               redirect('kepegawaian/thl'); 			
          } else { 								
               $this->session->set_flashdata('thl', 'DATA THL BERHASIL DIUBAH.');			
               redirect('kepegawaian/thl'); 			
          }
     }

     function hapus_thl()
     {
          $id_thl = $this->input->post('id_thl');
          $this->kepegawaian_model->hapus_thl($id_thl);
          redirect('kepegawaian/thl');
     }
}