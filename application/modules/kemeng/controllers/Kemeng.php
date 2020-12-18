<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kemeng extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    //load chart_model from model
    $this->load->model('Kemeng_model');
  }

  function index()
  {
    if ($this->session->userdata('nip') != NULL) {
        // $data = $this->Kemeng_model->get_namdosen()->result();
        $fakultaz = $this->Kemeng_model->get_fakul()->result();
        $nammatkul = $this ->Kemeng_model->get_nammatkul()->result();
        $semesteer = $this ->Kemeng_model->get_smt()->result();

        $x['semesteer'] = $semesteer;
        $x['fakultaz'] = $fakultaz;
        $x['nammatkul'] = $nammatkul;

      $this->load->view("include/head");
      $this->load->view("include/top-header");
      $this->load->view("view_presensi", $x);
      $this->load->view("include/sidebar");
      $this->load->view("include/panel");
      $this->load->view("include/footer");
    } else {
      redirect("user");
    }
  }

  function get_autocomplete(){
      if (isset($_GET['term'])) {
          $result = $this->Kemeng_model->namdosens($_GET['term']);
          if (count($result) > 0) {
            foreach ($result as $row)
              $arr_result[] = $row->nama_dosen;
              echo json_encode($arr_result);
      }
    }
  }

// function tambah_presensi()
// {





}
