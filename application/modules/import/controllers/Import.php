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
            $action = " <a href='javascript:;'
                data-id='$r->id'
                data-semester='$r->semester'
                data-kode_mk='$r->kode_mk'
                data-nama_mk='$r->nama_mk'
                data-kelas='$r->kelas'
                data-bahasan='$r->bahasan' 
                data-tanggal_mulai='$r->tanggal_mulai_efektif'
                data-tanggal_akhir='$r->tanggal_akhir_efektif' 
                data-toggle='modal' data-target='#edit_datakk' class='btn btn-sm btn-primary'><i class='fa fas fa-edit'></i></a> 
                
                <a href='javascript:;' 
                data-id='$r->id'
                data-toggle='modal' data-target='#hapus_datakk' class='btn btn-sm btn-danger'><i class='fa fas fa-trash'></i></a>";

            $hasil[] = array(
                $semester,
                $kode_mk,
                $nama_mk,
                $kelas,
                $bahasan,
                $tanggal_mulai,
                $tanggal_akhir,
                $action
            );
        }
        
        echo json_encode($hasil);
    }

    public function edit_kk(){

        $kode_prodi = $this->input->post('prodi', true);        
        $id = $this->input->post('id', true);

        $input_data['semester'] = $this->input->post('semester', true);
        $input_data['kode_mk'] = $this->input->post('kode_mk', true);
        $input_data['nama_mk'] = $this->input->post('nama_mk', true);
        $input_data['kelas'] = $this->input->post('kelas', true);
        $input_data['bahasan'] = $this->input->post('bahasan', true);
        $input_data['tanggal_mulai_efektif'] = $this->input->post('tanggal_mulai_efektif', true);
        $input_data['tanggal_akhir_efektif'] = $this->input->post('tanggal_akhir_efektif', true);

        if($this->import_model->edit_kk($id, $input_data)){
            redirect('import/kelas_kuliah/'.$kode_prodi);
        }else{
            redirect('import/kelas_kuliah/'.$kode_prodi);
        }
    }

    public function hapus_kk(){

        $kode_prodi = $this->input->post('prodi', true);        
        $id = $this->input->post('id', true);

        if($this->import_model->hapus_kk($id)){
            redirect('import/kelas_kuliah/'.$kode_prodi);
        }else{
            redirect('import/kelas_kuliah/'.$kode_prodi);
        }
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

    // Dosen Ajar
    public function view_da(){
        $x['prodi'] = $this->import_model->getprodi();

        $this->load->view("include/head");
        $this->load->view("include/top-header");
        $this->load->view('dosen_ajar',$x);
        $this->load->view("include/sidebar");
        $this->load->view("include/panel");
        $this->load->view("include/footer");
    }
    
    public function dosen_ajar($data){
        $x['kode_prodi'] = $data;

        $this->load->view("include/head");
        $this->load->view("include/top-header");
        $this->load->view('dosen_ajar', $x);
        $this->load->view("include/sidebar");
        $this->load->view("include/panel");
        $this->load->view("include/footer");
    }

    public function datada($data){
        $data = $this->import_model->getda($data);
        $hasil = array();

        foreach($data as $r){
            $semester = $r->semester == NULL ? "<i><font>Tidak ada data</font></i>": $r->semester;
            $nidn = $r->nidn == NULL ? "<i><font>Tidak ada data</font></i>": $r->nidn;
            $nama_dosen = $r->nama_dosen == NULL ? "<i><font>Tidak ada data</font></i>": $r->nama_dosen;            
            $kode_mk = $r->kode_mk == NULL ? "<i><font>Tidak ada data</font></i>": $r->kode_mk;
            $nama_kelas = $r->nama_kelas == NULL ? "<i><font>Tidak ada data</font></i>": $r->nama_kelas;
            $tatap_muka = $r->tatap_muka == NULL ? "<i><font>Tidak ada data</font></i>": $r->tatap_muka;
            $realisasi = $r->realisasi == NULL ? "<i><font>Tidak ada data</font></i>": $r->realisasi;
            $sks_ajar = $r->sks_ajar == NULL ? "<i><font>Tidak ada data</font></i>": $r->sks_ajar;
            $action = " <a href='javascript:;'
                data-id='$r->id'
                data-semester='$r->semester'
                data-nidn='$r->nidn'
                data-nama_dosen='$r->nama_dosen'
                data-kode_mk='$r->kode_mk'
                data-nama_kelas='$r->nama_kelas' 
                data-tatap_muka='$r->tatap_muka' 
                data-realisasi='$r->realisasi' 
                data-sks_ajar='$r->sks_ajar' 
                data-toggle='modal' data-target='#edit_datada' class='btn btn-sm btn-primary'><i class='fa fas fa-edit'></i></a> 
                
                <a href='javascript:;' 
                data-id='$r->id'
                data-toggle='modal' data-target='#hapus_datada' class='btn btn-sm btn-danger'><i class='fa fas fa-trash'></i></a>";

            $hasil[] = array(
                $semester,
                $nidn,
                $nama_dosen,
                $kode_mk,
                $nama_kelas,
                $tatap_muka,
                $realisasi,
                $sks_ajar,
                $action
            );
        }
        
        echo json_encode($hasil);
    }

    public function tambah_da(){

        $kode_prodi = $this->input->post('prodi', true);
        
        $input_data['semester'] = $this->input->post('semester', true);
        $input_data['nidn'] = $this->input->post('nidn', true);
        $input_data['nama_dosen'] = $this->input->post('nama_dosen', true);
        $input_data['kode_mk'] = $this->input->post('kode_mk', true);
        $input_data['nama_kelas'] = $this->input->post('nama_kelas', true);
        $input_data['tatap_muka'] = $this->input->post('tatap_muka', true);
        $input_data['realisasi'] = $this->input->post('realisasi', true);
        $input_data['sks_ajar'] = $this->input->post('sks_ajar', true);
        $input_data['prodi'] = $kode_prodi;

        if($this->import_model->tambah_da($input_data)){
            redirect('import/dosen_ajar/'.$kode_prodi);
        }else{
            redirect('import/dosen_ajar/'.$kode_prodi);
        }
    }

    public function edit_da(){

        $kode_prodi = $this->input->post('prodi', true);        
        $id = $this->input->post('id', true);

        $input_data['semester'] = $this->input->post('semester', true);
        $input_data['nidn'] = $this->input->post('nidn', true);
        $input_data['nama_dosen'] = $this->input->post('nama_dosen', true);
        $input_data['kode_mk'] = $this->input->post('kode_mk', true);
        $input_data['nama_kelas'] = $this->input->post('nama_kelas', true);
        $input_data['tatap_muka'] = $this->input->post('tatap_muka', true);
        $input_data['realisasi'] = $this->input->post('realisasi', true);
        $input_data['sks_ajar'] = $this->input->post('sks_ajar', true);

        if($this->import_model->edit_da($id, $input_data)){
            redirect('import/dosen_ajar/'.$kode_prodi);
        }else{
            redirect('import/dosen_ajar/'.$kode_prodi);
        }
    }

    public function hapus_da(){

        $kode_prodi = $this->input->post('prodi', true);        
        $id = $this->input->post('id', true);

        if($this->import_model->hapus_da($id)){
            redirect('import/dosen_ajar/'.$kode_prodi);
        }else{
            redirect('import/dosen_ajar/'.$kode_prodi);
        }
    }

    public function uploadda()
    {        
        $kode_prodi = $this->input->post('kode_prodi');
        
        $file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        if(isset($_FILES['da']['name']) && in_array($_FILES['da']['type'], $file_mimes)) {

            $arr_file = explode('.', $_FILES['da']['name']);
            $extension = end($arr_file);

            if($extension != 'xlsx') {
                $this->session->set_flashdata('dosen_ajar', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

                redirect("import/dosen_ajar/$kode_prodi"); 
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }

            $loadexcel  = $reader->load($_FILES['da']['tmp_name']);
            $list_sheet = $loadexcel->getSheetNames();
            $sheetData = $loadexcel->getSheetByName($list_sheet[0])->toArray(null, true, true ,true);

            $data = array();
            $numrow = 0;

            foreach($sheetData as $row){
                if($numrow > 0){
                    
                    if($row['A'] != NULL){             
                        array_push($data, array(
                            'semester'      => $row['A'],
                            'nidn'          => $row['B'],
                            'nama_dosen'    => $row['C'],
                            'kode_mk'       => $row['D'],
                            'nama_kelas'    => $row['E'],
                            'tatap_muka'    => $row['F'],
                            'realisasi'     => $row['G'],
                            'sks_ajar'      => $row['H'],
                            'prodi'         => $kode_prodi 
                        ));
                    }
                }
               $numrow++;
            }

            if($this->import_model->dosen_ajar('tbl_dosen_ajar', $data)){
                redirect('import/dosen_ajar/'.$kode_prodi);
            }else{
                redirect('import/dosen_ajar/'.$kode_prodi);
            }
        }
    }

}