<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class D_sas extends CI_Controller{
  function __construct(){
    parent::__construct();
      //load chart_model from model
    $this->load->model('d_sas_model');
  }

  function index($link = NULL)
  {
    if ($link == NULL) {
      $x['title'] = "test";
      $data = $this->d_sas_model->get_all_kampus()->result();
      $x['link'] = $link;
      $x['data'] = json_encode($data);
    } elseif (strlen($link) == 6) {
      $x['title'] = "biro";
      if( $link > 500000){
        $data = $this->d_sas_model->get_all_unit_satker($link)->result();
        $page = $this->d_sas_model->get_kampus($link)->result();
      }else{
        $data = $this->d_sas_model->get_all_biro($link)->result();
        $page = $this->d_sas_model->get_kampus($link)->result();
      }
      $x['link'] = $link;
      $x['page'] = $page[0]->nama;
      $x['data'] = json_encode($data);
    } elseif (strlen($link) == 4) { //unit

      $x['title'] = "unit";
      $page = $this->d_sas_model->get_biro($link)->result();
      $data = $this->d_sas_model->get_all_unit($link)->result();
      $x['link'] = $link;
      $x['page'] = $page[0]->nama;
      $x['data'] = json_encode($data);
    } elseif (strlen($link) == 3) { //output
      $x['title'] = "output";
      $data = $this->d_sas_model->get_all_output($link)->result();
      $x['link'] = $link;
      $x['data'] = json_encode($data);
    }else{
      $x['data'] = json_encode($data);
    }

    $this->load->view("include/head");
    $this->load->view("include/top-header");
    $this->load->view("view_sas",$x);
    $this->load->view("include/sidebar");
    $this->load->view("include/panel");
    $this->load->view("include/footer");
  }

 }