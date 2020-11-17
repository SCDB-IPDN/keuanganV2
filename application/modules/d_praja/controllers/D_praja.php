<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class D_praja extends CI_Controller{
  function __construct(){
    parent::__construct();
      //load chart_model from model
    $this->load->model('D_praja_model');
  }

  function index()
  {
    $data = $this->D_praja_model->get_praja()->result();
    $x['data'] = json_encode($data);

    $this->load->view("include/head");
    $this->load->view("include/top-header");
    $this->load->view("view_praja",$x);
    $this->load->view("include/sidebar");
    $this->load->view("include/panel");
    $this->load->view("include/footer");
  }

  function detail($nik)
  {
      $data = $this->D_praja_model->get_detail($nik)->result();
      $x['data'] = json_encode($data);
    
    $this->load->view("include/head");
    $this->load->view("include/top-header");
    $this->load->view("view_detail",$x);
    $this->load->view("include/sidebar");
    $this->load->view("include/panel");
    $this->load->view("include/footer");
  }
	
  public function edit_praja()
     {
     $input_data['id_praja'] = $this->input->post('id_praja', true);
     $input_data['nama'] = $this->input->post('nama', true);
     $input_data['tmpt_lahir'] = $this->input->post('tmpt_lahir', true);
     $input_data['alamat'] = $this->input->post('alamat', true);
     $input_data['tlp_pribadi'] = $this->input->post('tanggal_lahir', true);
     $input_data['email'] = $this->input->post('email', true);

          $result = $this->D_praja_model->edit_praja($input_data);

          if (!$result) { 							
               $this->session->set_flashdata('praja', 'DATA PRAJA GAGAL DIUBAH.');		
               redirect('d_praja/praja'); 			
          } else { 								
               $this->session->set_flashdata('praja', 'DATA PRAJA BERHASIL DIUBAH.');			
               redirect('d_praja/praja'); 			
          }
     }

     function hapus_praja()
     {
          $id_praja = $this->input->post('id_praja');
          $this->D_praja_model->hapus_praja($id_praja);
          redirect('d_praja/praja');
     }
}
