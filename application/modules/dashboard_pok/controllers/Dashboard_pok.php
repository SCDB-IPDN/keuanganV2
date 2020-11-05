<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard_pok extends CI_Controller{
    function __construct(){
      parent::__construct();
      //load chart_model from model
      $this->load->model('pok_model');
    }

    function index($id = NULL)
    {
      if($_SESSION['nip'])
      {
        if ($id == NULL) {
          $x['title'] = 'Parent';
          $data = $this->pok_model->get_biro_data()->result();
          // var_dump($data);
          // exit();
          // $keuangan = $this->pok_model->jumlah_pagu()->result();

          // $hitung= $keuangan[0]->realisasi/$keuangan[0]->pagu*100;
          // $persentase = round($hitung,2);

          // $tanggal = $this->pok_model->get_tanggal()->result();
          // $hasil_tgl = date('d F Y', strtotime($tanggal[0]->created_date));
        } else {
          $x['title'] = $id;
          if (strlen($id) == 3) {
            $data = $this->pok_model->get_out_data($id)->result();
          } else {
            $data = $this->pok_model->get_unit_data($id)->result();
          }
        }

        // if($hasil_tgl == '01 January 1970'){
        //     $hasil_tanggal = '--------';
        // }else{
        //     $hasil_tanggal = $hasil_tgl;
        // }

        $x['data'] = json_encode($data);
        // $x['pagu'] = number_format($keuangan[0]->pagu);
        // $x['realisasi'] = number_format($keuangan[0]->realisasi);
        // $x['pengembalian'] = number_format($keuangan[0]->pengembalian);
        // $x['sisa_pagu'] = number_format($keuangan[0]->sisa_pagu);
        // $x['persentase'] = $persentase;
        // $x['tanggal'] = $hasil_tanggal;
      
        $this->load->view("include/head");
        $this->load->view("include/top-header");
        $this->load->view("view_pok",$x);
        $this->load->view("include/sidebar");
        $this->load->view("include/panel");
        $this->load->view("include/footer");
      
    }else{
      redirect("user");
    }
  }
}