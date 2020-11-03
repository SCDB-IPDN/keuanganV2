<?php defined("BASEPATH") OR exit("No direct script access allowed");

class Home extends CI_Controller {

  function __construct() {
    parent::__construct();
    // $this->load->model('User_model');
  }

  /**
     * This function is used to load page view
     * @return Void
     */
  public function index()
  {
    if($_SESSION['nip'])
    {
        $this->load->view("include/head");
        $this->load->view("include/top-header");
        $this->load->view('home');
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