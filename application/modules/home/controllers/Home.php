<?php defined("BASEPATH") OR exit("No direct script access allowed");

class Home extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('home_model');
  }

  /**
     * This function is used to load page view
     * @return Void
     */
  public function index()
  {
    if($_SESSION['nip'])
    {
      // KEPEGAWAIAN
      $peg = $this->home_model->jumlah_peg();
      $total_peg = $peg[0]->pns + $peg[0]->thl;

      // SPAN JATINANGOR
      $persentase_jatinangor = $this->home_model->get_span_jatinangor();

      // POK
      $persen_pok = $this->home_model->get_all_pok_biro();
      $persentase_pok = round($persen_pok[0]->persen,2);

      // SAS
      $persen_sas= $this->home_model->get_all_sas();
      $persentase_sas = round($persen_sas[0]->persen,2);

      // BIRO
      $biro = $this->home_model->get_all_span_biro();

      //praja
      $praja = $this->home_model->get_praja();

      // SPAN
      $span = $this->home_model->get_span()->result();
      $hitung_span= $span[0]->realisasi/$span[0]->pagu*100;
      $persentase_span = round($hitung_span,2);

      // App
      $perpustakaan = $this->home_model->app_perpus();
      $akademik = $this->home_model->app_akademik();
      $keuangan = $this->home_model->app_keuangan();
      $riset = $this->home_model->app_riset();
      $tp = $this->home_model->app_tp();
      $keprajaan = $this->home_model->app_keprajaan();
      $pascasarjana = $this->home_model->app_pascasarjana();
      $pddikti = $this->home_model->app_pddikti();
      $kepegawaian = $this->home_model->app_kepegawaian();
      $kerjasama = $this->home_model->app_kerjasama();
      $pengasuhan = $this->home_model->app_pengasuhan();

      $x['perpustakaan'] = $perpustakaan;
      $x['akademik'] = $akademik;
      $x['keuangan'] = $keuangan;
      $x['akademik'] = $akademik;
      $x['riset'] = $riset;
      $x['tp'] = $tp;
      $x['keprajaan'] = $keprajaan;
      $x['pascasarjana'] = $pascasarjana;
      $x['pddikti'] = $pddikti;
      $x['kepegawaian'] = $kepegawaian;
      $x['kerjasama'] = $kerjasama;
      $x['pengasuhan'] = $pengasuhan;

      $x['biro'] = $biro;
      $x['peg'] = $peg;
      $x['total_peg'] = $total_peg;
      $x['persentase_span'] = $persentase_span;
      $x['persentase_sas'] = $persentase_sas;
      $x['persentase_jatinangor'] = $persentase_jatinangor;
      $x['persentase_pok'] = $persentase_pok;
      $x['praja'] = $praja;

      $this->load->view("include/head");
      $this->load->view("include/top-header");
      $this->load->view('home', $x);
      $this->load->view("include/sidebar");
      $this->load->view("include/panel");
      $this->load->view("include/footer");         

    }else{
        //jika session belum terdaftar, maka redirect ke halaman login
        redirect("user");
    }
	
  }
}
?>