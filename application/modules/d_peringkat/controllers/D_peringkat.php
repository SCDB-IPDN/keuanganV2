<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class D_peringkat extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('d_peringkat_model');
  }

  function index()
  {
    if($this->session->userdata('nip') != NULL)
    {
      $tgl = $this->d_peringkat_model->get_date();
      $x['uDate'] = strtoupper( date("d F Y", strtotime($tgl['created_at'])) );
      $data = $this->d_peringkat_model->get_peringkat()->result();
      $x['data'] = json_encode($data);
      
      $this->load->view("include/head");
      $this->load->view("include/top-header");
      $this->load->view("view_peringkat",$x);
      $this->load->view("include/sidebar");
      $this->load->view("include/footer");
      
    }else{
      redirect("user");
    }
  }
}