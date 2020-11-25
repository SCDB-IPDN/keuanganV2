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

    function span()
    {
        if($this->session->userdata('nip') != NULL)
        {
            $fromDate = $this->input->post('fromDate', true);
            $endDate = $this->input->post('endDate', true);

            if($fromDate != NULL && $endDate != NULL){
                $data = $this->history_model->get_range_span($fromDate, $endDate)->result();
                
                $x['fromDate'] = $fromDate;
                $x['endDate'] = $endDate;
                $x['data'] = $data;

                $this->load->view("include/head");
                $this->load->view("include/top-header");
                $this->load->view('history_span', $x);
                $this->load->view("include/sidebar");
                $this->load->view("include/panel");
                $this->load->view("include/footer"); 
            }else{

                $x['data'] = "Tidak";
                $x['fromDate'] = $fromDate;
                $x['endDate'] = $endDate;

                $this->load->view("include/head");
                $this->load->view("include/top-header");
                $this->load->view('history_span', $x);
                $this->load->view("include/sidebar");
                $this->load->view("include/panel");
                $this->load->view("include/footer");
            }
        }else{
            //jika session belum terdaftar, maka redirect ke halaman login
            redirect("user");
        }
    }

    function span_jatinangor()
    {
          if($this->session->userdata('nip') != NULL)
          {
            $fromDate = $this->input->get('fromDate', true);
            
            $data = $this->history_model->get_range_span_biro($fromDate)->result();

            $x['fromDate'] = $fromDate;
            $x['data'] = $data;
        
            $this->load->view("include/head");
            $this->load->view("include/top-header");
            $this->load->view('history_span_jatinangor', $x);
            $this->load->view("include/sidebar");
            $this->load->view("include/panel");
            $this->load->view("include/footer");
          }else{
            redirect("user");
          }
    }


}