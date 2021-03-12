<?php
defined('BASEPATH') OR exit('No direct script access allowed ');

require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class Import extends CI_Controller 
{

    public function __construct(){
        parent::__construct();
        //load model
        $this->load->model('import_model');
    }

    // Kelas Kuliah

    public function view_kk(){
        $x['prodi'] = $this->import_model->getprodi();

        $this->load->view("include/head");
        $this->load->view("include/top-header");
        $this->load->view('kelas_kuliah',$x);
        $this->load->view("include/sidebar");
        $this->load->view("include/panel");
        $this->load->view("include/footer");
    }
    
    public function kelas_kuliah($data){
        $x['kode_prodi'] = $data;

        $this->load->view("include/head");
        $this->load->view("include/top-header");
        $this->load->view('kelas_kuliah', $x);
        $this->load->view("include/sidebar");
        $this->load->view("include/panel");
        $this->load->view("include/footer");
    }

    public function datakk($data){
        $data = $this->import_model->getkk($data);
        $hasil = array();

        foreach($data as $r){
            $semester = $r->semester == NULL ? "<i><font>Tidak ada data</font></i>": $r->semester;
            $kode_mk = $r->kode_mk == NULL ? "<i><font>Tidak ada data</font></i>": $r->kode_mk;
            $nama_mk = $r->nama_mk == NULL ? "<i><font>Tidak ada data</font></i>": $r->nama_mk;
            $kelas = $r->kelas == NULL ? "<i><font>Tidak ada data</font></i>": $r->kelas;
            $semester = $r->semester == NULL ? "<i><font>Tidak ada data</font></i>": $r->semester;
            $bahasan = $r->bahasan == NULL ? "<i><font>Tidak ada data</font></i>": $r->bahasan;
            $tanggal_mulai = $r->tanggal_mulai_efektif == NULL ? "<i><font>Tidak ada data</font></i>": $r->tanggal_mulai_efektif;
            $tanggal_akhir = $r->tanggal_akhir_efektif == NULL ? "<i><font>Tidak ada data</font></i>": $r->tanggal_akhir_efektif;

            $hasil[] = array(
                $semester,
                $kode_mk,
                $nama_mk,
                $kelas,
                $bahasan,
                $tanggal_mulai,
                $tanggal_akhir
            );
        }
        
        echo json_encode($hasil);
    }

    public function uploadkk()
    {        
        $kode_prodi = $this->input->post('kode_prodi');
        
        $file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        if(isset($_FILES['kk']['name']) && in_array($_FILES['kk']['type'], $file_mimes)) {

            $arr_file = explode('.', $_FILES['kk']['name']);
            $extension = end($arr_file);

            if($extension != 'xlsx') {
                $this->session->set_flashdata('kelas_kuliah', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

                redirect("import/kelas_kuliah/$kode_prodi"); 
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }

            $loadexcel  = $reader->load($_FILES['kk']['tmp_name']);
            $list_sheet = $loadexcel->getSheetNames();
            $sheetData = $loadexcel->getSheetByName($list_sheet[0])->toArray(null, true, true ,true);

            $data = array();
            $numrow = 0;

            foreach($sheetData as $row){
                if($numrow > 0){
                    
                    if($row['A'] != NULL){             
                        array_push($data, array(
                            'semester'                  => $row['A'],
                            'kode_mk'                   => $row['B'],
                            'nama_mk'                   => $row['C'],
                            'kelas'                     => $row['D'],
                            'bahasan'                   => $row['E'],
                            'tanggal_mulai_efektif'     => $row['F'],
                            'tanggal_akhir_efektif'     => $row['G'],
                            'prodi'     => $kode_prodi 
                        ));
                    }
                }
               $numrow++;
            }

            if($this->import_model->kelas_kuliah('tbl_kelas_kuliah', $data)){
                redirect('import/kelas_kuliah/'.$kode_prodi);
            }else{
                redirect('import/kelas_kuliah/'.$kode_prodi);
            }
        }
    }


}