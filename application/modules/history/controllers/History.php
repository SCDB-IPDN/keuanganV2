<?php defined("BASEPATH") OR exit("No direct script access allowed");

class History extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('history_model');
    }

    function index(){
        if($this->session->userdata('nip') != NULL)
        {
            redirect("home");
        }else{
            redirect("user");
        }
    }

    function span($date = NULL)
    {
        if($this->session->userdata('nip') != NULL) {
			if ($date == NULL) {
				$tgl = $this->history_model->get_date();
				$date = $tgl['created_at'];
			}

			$x['uDate'] = strtoupper( date("d F Y", strtotime($date)) );
			$x['seDate'] = date("mm/dd/yyyy", strtotime($date));
			$data = $this->history_model->get_span($date)->result();
			$x['data'] = json_encode($data);			

			$this->load->view("include/head");
			$this->load->view("include/top-header");
			$this->load->view("history_span",$x);
			$this->load->view("include/sidebar");
			$this->load->view("include/footer");

		}else{
			redirect("user");
        }
    }
}