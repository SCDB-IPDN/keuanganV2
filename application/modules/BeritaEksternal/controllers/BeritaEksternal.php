<?php
defined('BASEPATH') OR exit('No direct script access allowed ');

require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class BeritaEksternal extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model('BeritaEksternal_model');
    }

    public function index()
	{
        $data = $this->BeritaEksternal_model->get_data()->result();
        $x['data'] = $data;

        $this->load->view("include/head");
        $this->load->view("include/top-header");
        $this->load->view('index_BeritaEksternal', $x);
        $this->load->view("include/sidebar");
        $this->load->view("include/panel");
        $this->load->view("include/footer");
    }

    public function tambah_BeritaEKsternal()
	{
        $input_data['NamaMedia'] = $this->input->post('NamaMedia', true); 			
        $input_data['Judul'] = $this->input->post('Judul', true);
        $input_data['Link'] = $this->input->post('Link', true);
        $input_data['Tanggal'] = $this->input->post('Tanggal', true);
        
        $cek_Berita = $this->BeritaEksternal_model->cek_BeritaEksternal($input_data['Judul']);
        
        if(!$cek_Berita)
        {
            $result = $this->BeritaEksternal_model->tambah_BeritaEksternal($input_data);
        }
        else
        {
            $this->session->set_flashdata('BeritaEksternal', 'JUDUL BERITA SUDAH ADA!');
            $x['alert'] = 'ada';			
            redirect('BeritaEksternal',$x);
        }

        if (!$result) 
        { 							
            $this->session->set_flashdata('BeritaEksternal', 'BERITA GAGAL DITAMBAHKAN.'); 				
            redirect('BeritaEksternal'); 			
        } 
        else 
        { 								
            $this->session->set_flashdata('BeritaEksternal', 'DATA BERITA BERHASIL DITAMBAHKAN.');			
            redirect('BeritaEksternal'); 			
        }
    }

    public function edit_BeritaEksternal()
	{

        $input_data['NamaMedia'] = $this->input->post('NamaMedia', true); 			
        $input_data['Judul'] = $this->input->post('Judul', true);
        $input_data['Link'] = $this->input->post('Link', true);
        $input_data['Tanggal'] = $this->input->post('Tanggal', true);
        $input_data['Id'] = $this->input->post('Id', true);

        $result = $this->BeritaEksternal_model->edit_BeritaEksternal($input_data);

        if (!$result) 
        { 							
            $this->session->set_flashdata('BeritaEksternal', 'DATA BERITA EKSTERNAL GAGAL DIUBAH.');		
            redirect('BeritaEksternal'); 			
        } 
        else 
        { 								
            $this->session->set_flashdata('BeritaEksternal', 'DATA BERITA EKSTERNAL BERHASIL DIUBAH.');			
            redirect('BeritaEksternal'); 			
        }
    }

    function hapus_BeritaEksternal()
    {
        $id_berita=$this->input->post('Id');
        $this->BeritaEksternal_model->hapus_BeritaEksternal($id_berita);
        $this->session->set_flashdata('BeritaEksternal', 'DATA BERITA EKSTERNAL BERHASIL DIHAPUS.');
        redirect('BeritaEksternal');
    }

    public function uploadaja()
    {
        // Load plugin PHPExcel nya
        $file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        if(isset($_FILES['struk']['name']) && in_array($_FILES['struk']['type'], $file_mimes)) {

            $arr_file = explode('.', $_FILES['struk']['name']);
            $extension = end($arr_file);

            if($extension != 'xlsx') {
                $this->session->set_flashdata('notifberita', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

                redirect("BeritaEksternal"); 
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }

            $loadexcel  = $reader->load($_FILES['struk']['tmp_name']);
            $sheet  = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

            $list_sheet = $loadexcel->getSheetNames();

            $sheetData = $loadexcel->getSheetByName($list_sheet[0])->toArray(null, true, true ,true);

            $data = array();
            $numrow = 0;

            foreach($sheetData as $row){
                
                if($numrow > 1){
                    if(isset($row['B']) && isset($row['C']) && isset($row['D']) && isset($row['E'])){
                        array_push($data, array(
                            'NamaMedia'       => $row['B'],
                            'Judul'           => $row['C'],
                            'Link'            => $row['E'],
                            'Tanggal'         => $row['D']   
                        ));
                    }else{
                        $this->session->set_flashdata('notifberita', '<div class="alert alert-success"><b>PROSES IMPORT GAGAL !!!</b> Pastikan format isian excel sesuai template!</div>');
                        //redirect halaman
                        redirect('BeritaEksternal');
                    }
                }
               $numrow++;
            }

            // INSERT TO DATABASE
            $this->db->insert_batch('tbl_beritaeksternal', $data);

            //upload success
            $this->session->set_flashdata('notifberita', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
            //redirect halaman
            redirect('BeritaEksternal');
        }
    }
}
