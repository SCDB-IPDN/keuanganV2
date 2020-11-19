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

  function edit_praja()
  {
    $input_data['nik_praja'] = $this->input->post('nik_praja', true);
    $input_data['nama'] = $this->input->post('nama', true);
    $input_data['email'] = $this->input->post('email', true);
    $input_data['alamat'] = $this->input->post('alamat', true);
    $input_data['rt'] = $this->input->post('rt', true);
    $input_data['rw'] = $this->input->post('rw', true);
    $input_data['nama_dusun'] = $this->input->post('nama_dusun', true);
    $input_data['kelurahan'] = $this->input->post('kelurahan', true);
    $input_data['kecamatan'] = $this->input->post('kecamatan', true);
    $input_data['kab/kota'] = $this->input->post('kab/kota', true);
    $input_data['kode_pos'] = $this->input->post('kode_pos', true);
    $input_data['tlp_pribadi'] = $this->input->post('tlp_pribadi', true);
    $input_data['status'] = $this->input->post('status', true);

    $result = $this->D_praja_model->edit_praja($input_data);

   if (!$result) { 							
     $this->session->set_flashdata('praja', 'DATA PRAJA GAGAL DIUBAH.');		
     redirect('d_praja'); 			
   } else { 								
     $this->session->set_flashdata('praja', 'DATA PRAJA BERHASIL DIUBAH.');			
     redirect('d_praja'); 			
   }

 }

 function hapus_praja()
 {
  $id_praja = $this->input->post('id_praja');
  $this->D_praja_model->hapus_praja($id_praja);
  redirect('d_praja/praja');
}
}
