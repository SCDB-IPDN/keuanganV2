<?php defined("BASEPATH") OR exit("No direct script access allowed");

class Ortala extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('ortala_model');
    }

    public function uu(){
        if($this->session->userdata('nip') != NULL){
            $data = $this->ortala_model->get_uu();
            $kat = $this->ortala_model->get_kategori();

            
            $x['kat'] = $kat;
            $x['data'] = $data;
        
            $this->load->view("include/head");
            $this->load->view("include/top-header");
            $this->load->view('view_uu', $x);
            $this->load->view("include/sidebar");
            $this->load->view("include/panel");
            $this->load->view("include/footer");
        }else{
             redirect("user");
        }
    }

    function add_prokum()
	{
		$data['kategori'] = $this->input->post('kategori', true);
		$data['nomor'] = $this->input->post('nomor', true);
		$data['tahun'] = $this->input->post('tahun', true);
		$data['tentang'] = $this->input->post('tentang', true);
		$data['status'] = $this->input->post('status', true);
		$result = $this->Ortala_model->add_prokum($data);



		if ($result) { 				
			$this->session->set_flashdata('uu', ['success', 'Data Produk Hukum berhasil disimpan']);
			redirect('ortala/uu'); 			
		} 
		else { 								
			$this->session->set_flashdata('uu', ['danger', 'Data Produk Hukum gagal disimpan']); 
			redirect('ortala/uu'); 			
		} 
    }
    
    function del_prokum()
	{
		$id_prokum = $this->input->post('id_prokum');

		$hasil = $this->Ortala_model->del_matkul($id_prokum);

		if (!$hasil) { 							
			$this->session->set_flashdata('uu', 'DATA PRODUK HUKUM GAGAL DIHAPUS.');				
			redirect('ortala/uu'); 			
		} else { 								
			$this->session->set_flashdata('uu', 'DATA PRODUK HUKUM BERHASIL DIHAPUS.');	
			redirect('ortala/uu'); 			
		}
		
	}

}