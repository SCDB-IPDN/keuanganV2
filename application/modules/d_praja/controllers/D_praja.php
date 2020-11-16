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

  

}