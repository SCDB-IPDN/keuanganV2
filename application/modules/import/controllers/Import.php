<?php
defined('BASEPATH') OR exit('No direct script access allowed ');

require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Import extends CI_Controller 
{
    protected $xlsx_mimes = [
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',  // the one and only ms office xlsx mime type!
    ];

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

    // Krs
    public function view_krs(){
        $x['prodi'] = $this->import_model->getprodi();

        $this->load->view("include/head");
        $this->load->view("include/top-header");
        $this->load->view('krs',$x);
        $this->load->view("include/sidebar");
        $this->load->view("include/panel");
        $this->load->view("include/footer");
    }

    public function krs($data){
        $x['kode_prodi'] = $data;

        $this->load->view("include/head");
        $this->load->view("include/top-header");
        $this->load->view('krs', $x);
        $this->load->view("include/sidebar");
        $this->load->view("include/panel");
        $this->load->view("include/footer");
    }

    public function datakrs($data){
        $data = $this->import_model->getkrs($data);
        $hasil = array();

        foreach($data as $r){
            $npp = $r->npp == NULL ? "<i><font>Tidak ada data</font></i>": $r->npp;
            $nama = $r->nama == NULL ? "<i><font>Tidak ada data</font></i>": $r->nama;
            $semester = $r->semester == NULL ? "<i><font>Tidak ada data</font></i>": $r->semester;            
            $kode_mk = $r->kode_mk == NULL ? "<i><font>Tidak ada data</font></i>": $r->kode_mk;
            $nama_mk = $r->nama_mk == NULL ? "<i><font>Tidak ada data</font></i>": $r->nama_mk;
            $kelas = $r->kelas == NULL ? "<i><font>Tidak ada data</font></i>": $r->kelas;
            $action = " <a href='javascript:;'
                data-id='$r->id'
                data-npp='$r->npp'
                data-nama='$r->nama'
                data-semester='$r->semester'
                data-kode_mk='$r->kode_mk'
                data-nama_mk='$r->nama_mk' 
                data-kelas='$r->kelas'
                data-toggle='modal' data-target='#edit_krs' class='btn btn-sm btn-primary'><i class='fa fas fa-edit'></i></a> 
                
                <a href='javascript:;' 
                data-id='$r->id'
                data-toggle='modal' data-target='#hapus_krs' class='btn btn-sm btn-danger'><i class='fa fas fa-trash'></i></a>";

            $hasil[] = array(
                $npp,
                $nama,
                $semester,
                $kode_mk,
                $nama_mk,
                $kelas,
                $action
            );
        }
        
        echo json_encode($hasil);
    }

    public function tambah_krs(){
        $kode_prodi = $this->input->post('prodi', true);
        
        $input_data['npp'] = $this->input->post('npp', true);
        $input_data['nama'] = $this->input->post('nama', true);
        $input_data['semester'] = $this->input->post('semester', true);
        $input_data['kode_mk'] = $this->input->post('kode_mk', true);
        $input_data['nama_mk'] = $this->input->post('nama_mk', true);
        $input_data['kelas'] = $this->input->post('kelas', true);
        $input_data['prodi'] = $kode_prodi;

        if($this->import_model->tambah_krs($input_data)){
            redirect('import/krs/'.$kode_prodi);
        }else{
            redirect('import/krs/'.$kode_prodi);
        }
    }

    public function edit_krs(){
        $kode_prodi = $this->input->post('prodi', true);        
        $id = $this->input->post('id', true);

        $input_data['npp'] = $this->input->post('npp', true);
        $input_data['nama'] = $this->input->post('nama', true);
        $input_data['semester'] = $this->input->post('semester', true);
        $input_data['kode_mk'] = $this->input->post('kode_mk', true);
        $input_data['nama_mk'] = $this->input->post('nama_mk', true);
        $input_data['kelas'] = $this->input->post('kelas', true);

        if($this->import_model->edit_krs($id, $input_data)){
            redirect('import/krs/'.$kode_prodi);
        }else{
            redirect('import/krs/'.$kode_prodi);
        }
    }

    public function hapus_krs(){
        $kode_prodi = $this->input->post('prodi', true);        
        $id = $this->input->post('id', true);

        if($this->import_model->hapus_krs($id)){
            redirect('import/krs/'.$kode_prodi);
        }else{
            redirect('import/krs/'.$kode_prodi);
        }
    }

    public function uploadkrs() {        
        $kode_prodi = $this->input->post('kode_prodi');
        
        $file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        if(isset($_FILES['krs']['name']) && in_array($_FILES['krs']['type'], $file_mimes)) {

            $arr_file = explode('.', $_FILES['krs']['name']);
            $extension = end($arr_file);

            if($extension != 'xlsx') {
                $this->session->set_flashdata('krs', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

                redirect("import/krs/$kode_prodi"); 
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }

            $loadexcel  = $reader->load($_FILES['krs']['tmp_name']);
            $list_sheet = $loadexcel->getSheetNames();
            $sheetData = $loadexcel->getSheetByName($list_sheet[0])->toArray(null, true, true ,true);

            $data = array();
            $numrow = 0;

            foreach($sheetData as $row){
                if($numrow > 0){
                    
                    if($row['A'] != NULL){             
                        array_push($data, array(
                            'npp'      => $row['B'],
                            'nama'          => $row['C'],
                            'semester'    => $row['D'],
                            'kode_mk'       => $row['E'],
                            'nama_mk'    => $row['F'],
                            'kelas'    => $row['G'],
                            'prodi'         => $kode_prodi 
                        ));
                    }
                }
               $numrow++;
            }

            if($this->import_model->krs('tbl_krs', $data)){
                redirect('import/krs/'.$kode_prodi);
            }else{
                redirect('import/krs/'.$kode_prodi);
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

    public function uploadda() {        
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

    // Nilai
    public function view_nilai(){
        $x['prodi'] = $this->import_model->getprodi();

        $this->load->view("include/head");
        $this->load->view("include/top-header");
        $this->load->view('nilai',$x);
        $this->load->view("include/sidebar");
        $this->load->view("include/panel");
        $this->load->view("include/footer");
    }

    public function nilai($data){
        $x['kode_prodi'] = $data;

        $this->load->view("include/head");
        $this->load->view("include/top-header");
        $this->load->view('nilai', $x);
        $this->load->view("include/sidebar");
        $this->load->view("include/panel");
        $this->load->view("include/footer");
    }

    public function datanilai($data){
        $data = $this->import_model->getnilai($data);
        $hasil = array();

        foreach($data as $r){
            $npp = $r->npp == NULL ? "<i><font>Tidak ada data</font></i>": $r->npp;
            $nama = $r->nama == NULL ? "<i><font>Tidak ada data</font></i>": $r->nama;          
            $kode_mk = $r->kode_mk == NULL ? "<i><font>Tidak ada data</font></i>": $r->kode_mk;
            $matkul = $r->matkul == NULL ? "<i><font>Tidak ada data</font></i>": $r->matkul;
            $semester = $r->semester == NULL ? "<i><font>Tidak ada data</font></i>": $r->semester;
            $kelas = $r->kelas == NULL ? "<i><font>Tidak ada data</font></i>": $r->kelas;
            $nilai_huruf = $r->nilai_huruf == NULL ? "<i><font>Tidak ada data</font></i>": $r->nilai_huruf;
            $nilai_indeks = $r->nilai_indeks == NULL ? "<i><font>Tidak ada data</font></i>": $r->nilai_indeks;
            $nilai_angka = $r->nilai_angka == NULL ? "<i><font>Tidak ada data</font></i>": $r->nilai_angka;
            $action = " <a href='javascript:;'
                data-id='$r->id'
                data-npp='$r->npp'
                data-nama='$r->nama'
                data-kode_mk='$r->kode_mk'
                data-matkul='$r->matkul' 
                data-semester='$r->semester' 
                data-kelas='$r->kelas' 
                data-nilai_huruf='$r->nilai_huruf'
                data-nilai_indeks='$r->nilai_indeks'
                data-nilai_angka='$r->nilai_angka' 
                data-toggle='modal' data-target='#edit_nilai' class='btn btn-sm btn-primary'><i class='fa fas fa-edit'></i></a> 
                
                <a href='javascript:;' 
                data-id='$r->id'
                data-toggle='modal' data-target='#hapus_nilai' class='btn btn-sm btn-danger'><i class='fa fas fa-trash'></i></a>";

            $hasil[] = array(
                $npp,
                $nama,
                $kode_mk,
                $matkul,
                $semester,
                $kelas,
                $nilai_huruf,
                $nilai_indeks,
                $nilai_angka,
                $action
            );
        }
        
        echo json_encode($hasil);
    }

    public function tambah_nilai(){
        $kode_prodi = $this->input->post('prodi', true);
        
        $input_data['npp'] = $this->input->post('npp', true);
        $input_data['nama'] = $this->input->post('nama', true);
        $input_data['kode_mk'] = $this->input->post('kode_mk', true);
        $input_data['matkul'] = $this->input->post('matkul', true);
        $input_data['semester'] = $this->input->post('semester', true);
        $input_data['kelas'] = $this->input->post('kelas', true);
        $input_data['nilai_huruf'] = $this->input->post('nilai_huruf', true);
        $input_data['nilai_indeks'] = $this->input->post('nilai_indeks', true);
        $input_data['nilai_angka'] = $this->input->post('nilai_angka', true);
        $input_data['prodi'] = $kode_prodi;

        if($this->import_model->tambah_nilai($input_data)){
            redirect('import/nilai/'.$kode_prodi);
        }else{
            redirect('import/nilai/'.$kode_prodi);
        }
    }

    public function edit_nilai(){
        $kode_prodi = $this->input->post('prodi', true);        
        $id = $this->input->post('id', true);
        
        $input_data['npp'] = $this->input->post('npp', true);
        $input_data['nama'] = $this->input->post('nama', true);
        $input_data['kode_mk'] = $this->input->post('kode_mk', true);
        $input_data['matkul'] = $this->input->post('matkul', true);
        $input_data['semester'] = $this->input->post('semester', true);
        $input_data['kelas'] = $this->input->post('kelas', true);
        $input_data['nilai_huruf'] = $this->input->post('nilai_huruf', true);
        $input_data['nilai_indeks'] = $this->input->post('nilai_indeks', true);
        $input_data['nilai_angka'] = $this->input->post('nilai_angka', true);

        if($this->import_model->edit_nilai($id, $input_data)){
            redirect('import/nilai/'.$kode_prodi);
        }else{
            redirect('import/nilai/'.$kode_prodi);
        }
    }

    public function hapus_nilai(){
        $kode_prodi = $this->input->post('prodi', true);        
        $id = $this->input->post('id', true);

        if($this->import_model->hapus_nilai($id)){
            redirect('import/nilai/'.$kode_prodi);
        }else{
            redirect('import/nilai/'.$kode_prodi);
        }
    }

    public function uploadnilai() {        
        $kode_prodi = $this->input->post('kode_prodi');
        
        $file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        if(isset($_FILES['nilai']['name']) && in_array($_FILES['nilai']['type'], $file_mimes)) {

            $arr_file = explode('.', $_FILES['nilai']['name']);
            $extension = end($arr_file);

            if($extension != 'xlsx') {
                $this->session->set_flashdata('nilai', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

                redirect("import/nilai/$kode_prodi"); 
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }

            $loadexcel  = $reader->load($_FILES['nilai']['tmp_name']);
            $list_sheet = $loadexcel->getSheetNames();
            $sheetData = $loadexcel->getSheetByName($list_sheet[0])->toArray(null, true, true ,true);

            $data = array();
            $numrow = 0;

            foreach($sheetData as $row){
                if($numrow > 0){
                    
                    if($row['A'] != NULL){             
                        array_push($data, array(
                            'npp'      => $row['B'],
                            'nama'          => $row['C'],
                            'kode_mk'       => $row['D'],
                            'matkul'    => $row['E'],
                            'semester'    => $row['F'],
                            'kelas'     => $row['G'],
                            'nilai_huruf'      => $row['H'],
                            'nilai_indeks'      => $row['I'],
                            'nilai_angka'      => $row['J'],
                            'prodi'         => $kode_prodi 
                        ));
                    }
                }
               $numrow++;
            }

            if($this->import_model->nilai('tbl_nilai_perkuliahan', $data)){
                redirect('import/nilai/'.$kode_prodi);
            }else{
                redirect('import/nilai/'.$kode_prodi);
            }
        }
    }

    // kelulusan
    public function view_kelulusan(){
        $x['prodi'] = $this->import_model->getprodi();

        $this->load->view("include/head");
        $this->load->view("include/top-header");
        $this->load->view('kelulusan',$x);
        $this->load->view("include/sidebar");
        $this->load->view("include/panel");
        $this->load->view("include/footer");
    }
    
    public function kelulusan($data){
        $x['kode_prodi'] = $data;

        $this->load->view("include/head");
        $this->load->view("include/top-header");
        $this->load->view('kelulusan', $x);
        $this->load->view("include/sidebar");
        $this->load->view("include/panel");
        $this->load->view("include/footer");
    }

    public function datakelulusan($data){
        $data = $this->import_model->getkelulusan($data);
        $hasil = array();

        $i = 1;
        foreach($data as $r){
            $no = $i;
            $npp = $r->npp == NULL ? "<i><font>Tidak ada data</font></i>": $r->npp;
            $nama_mhs = $r->nama_mhs == NULL ? "<i><font>Tidak ada data</font></i>": $r->nama_mhs;
            $jenis_keluar = $r->jenis_keluar == NULL ? "<i><font>Tidak ada data</font></i>": $r->jenis_keluar;            
            $tgl_keluar = $r->tgl_keluar == NULL ? "<i><font>Tidak ada data</font></i>": $r->tgl_keluar;
            $sk_yudisium = $r->sk_yudisium == NULL ? "<i><font>Tidak ada data</font></i>": $r->sk_yudisium;
            $tgl_sk_yudisium = $r->tgl_sk_yudisium == NULL ? "<i><font>Tidak ada data</font></i>": $r->tgl_sk_yudisium;
            $ipk = $r->ipk == NULL ? "<i><font>Tidak ada data</font></i>": $r->ipk;
            $no_ijazah = $r->no_ijazah == NULL ? "<i><font>Tidak ada data</font></i>": $r->no_ijazah;
            $smt_keluar = $r->smt_keluar == NULL ? "<i><font>Tidak ada data</font></i>": $r->smt_keluar;
            $prodi = $r->prodi == NULL ? "<i><font>Tidak ada data</font></i>": $r->prodi;
            $action = " <a href='javascript:;'
                data-id='$r->id'
                data-npp='$r->npp'
                data-nama_mhs='$r->nama_mhs'
                data-jenis_keluar='$r->jenis_keluar'
                data-tgl_keluar='$r->tgl_keluar'
                data-sk_yudisium='$r->sk_yudisium' 
                data-tgl_sk_yudisium='$r->tgl_sk_yudisium' 
                data-ipk='$r->ipk' 
                data-no_ijazah='$r->no_ijazah' 
                data-smt_keluar='$r->smt_keluar' 
                
                data-toggle='modal' data-target='#edit_datakelulusan' class='btn btn-sm btn-primary'><i class='fa fas fa-edit'></i></a> 
                
                <a href='javascript:;' 
                data-id='$r->id' data-nama='$r->nama_mhs'
                data-toggle='modal' data-target='#hapus_datakelulusan' class='btn btn-sm btn-danger'><i class='fa fas fa-trash'></i></a>";

            $hasil[] = array(
                $no,
                $npp,
                $nama_mhs,
                $jenis_keluar,
                $tgl_keluar,
                $sk_yudisium,
                $tgl_sk_yudisium,
                $ipk,
                $no_ijazah,
                $smt_keluar,
                $prodi,
                $action
            );
            $i++;
        }
         
        echo json_encode($hasil);
    }

    public function tambah_kelulusan(){

        $kode_prodi = $this->input->post('prodi', true);
        
        $input_data['npp'] = $this->input->post('npp', true);
        $input_data['nama_mhs'] = $this->input->post('nama_mhs', true);
        $input_data['jenis_keluar'] = $this->input->post('jenis_keluar', true);
        $input_data['tgl_keluar'] = $this->input->post('tgl_keluar', true);
        $input_data['sk_yudisium'] = $this->input->post('sk_yudisium', true);
        $input_data['tgl_sk_yudisium'] = $this->input->post('tgl_sk_yudisium', true);
        $input_data['ipk'] = $this->input->post('ipk', true);
        $input_data['no_ijazah'] = $this->input->post('no_ijazah', true);
        $input_data['smt_keluar'] = $this->input->post('smt_keluar', true);
        $input_data['prodi'] = $kode_prodi;

        if($this->import_model->tambah_kelulusan($input_data)){
            redirect('import/kelulusan/'.$kode_prodi);
        }else{
            redirect('import/kelulusan/'.$kode_prodi);
        }
    }

    public function edit_kelulusan(){

        $kode_prodi = $this->input->post('prodi', true);        
        $id = $this->input->post('id', true);

        $input_data['npp'] = $this->input->post('npp', true);
        $input_data['nama_mhs'] = $this->input->post('nama_mhs', true);
        $input_data['jenis_keluar'] = $this->input->post('jenis_keluar', true);
        $input_data['tgl_keluar'] = $this->input->post('tgl_keluar', true);
        $input_data['sk_yudisium'] = $this->input->post('sk_yudisium', true);
        $input_data['tgl_sk_yudisium'] = $this->input->post('tgl_sk_yudisium', true);
        $input_data['ipk'] = $this->input->post('ipk', true);
        $input_data['no_ijazah'] = $this->input->post('no_ijazah', true);
        $input_data['smt_keluar'] = $this->input->post('smt_keluar', true);

        if($this->import_model->edit_kelulusan($id, $input_data)){
            redirect('import/kelulusan/'.$kode_prodi);
        }else{
            redirect('import/kelulusan/'.$kode_prodi);
        }
    }

    public function hapus_kelulusan(){

        $kode_prodi = $this->input->post('prodi', true);        
        $id = $this->input->post('id', true);

        if($this->import_model->hapus_kelulusan($id)){
            redirect('import/kelulusan/'.$kode_prodi);
        }else{
            redirect('import/kelulusan/'.$kode_prodi);
        }
    }

    public function uploadkelulusan() {        
        $kode_prodi = $this->input->post('kode_prodi');

        if(!empty($_FILES['da']['name'])) {
            $file = explode('.', $_FILES['da']['name']);
            $extension = end($file);
            if($extension === 'xlsx' && in_array($_FILES['da']['type'], $this->xlsx_mimes)) {
                $reader = new Xlsx();
                $excel = $reader->load($_FILES['da']['tmp_name']);
                $sheet = $excel->getActiveSheet();
                $rowCount = $sheet->getHighestDataRow();
                $nim = $sheet->getCellByColumnAndRow(1, 2)->getValue();
                $nama = $sheet->getCellByColumnAndRow(2, 2)->getValue();
                if (is_numeric($nim) && is_string($nama)) {
                    $data = [];
                    for ($i=2; $i<=$rowCount; $i++) {
                        $nim = $sheet->getCellByColumnAndRow(1, $i)->getValue();
                        $nama = $sheet->getCellByColumnAndRow(2, $i)->getValue();
                        $jenis_keluar = $sheet->getCellByColumnAndRow(3, $i)->getValue();
                        $tgl_keluar = $sheet->getCellByColumnAndRow(4, $i)->getValue();
                        $tgl_keluar = Date::excelToDateTimeObject($tgl_keluar)->format('Y-m-d');
                        $yudisium = $sheet->getCellByColumnAndRow(5, $i)->getValue();
                        $tgl_yudisium = $sheet->getCellByColumnAndRow(6, $i)->getValue();
                        $tgl_yudisium = Date::excelToDateTimeObject($tgl_yudisium)->format('Y-m-d');
                        $ipk = $sheet->getCellByColumnAndRow(7, $i)->getValue();
                        $no_ijasah = $sheet->getCellByColumnAndRow(8, $i)->getValue();
                        $smt_keluar = $sheet->getCellByColumnAndRow(9, $i)->getValue();

                        array_push($data, [
                            'npp' => $nim,
                            'nama_mhs' => $nama,
                            'jenis_keluar' => $jenis_keluar,
                            'tgl_keluar' => $tgl_keluar, 
                            'sk_yudisium' => $yudisium,
                            'tgl_sk_yudisium' => $tgl_yudisium,
                            'ipk' => $ipk,
                            'no_ijazah' => $no_ijasah, 
                            'smt_keluar' => $smt_keluar,
                            'prodi' => $kode_prodi
                        ]);
                    }

                    $save = $this->import_model->upload_excel('tbl_kelulusan', $data);
                    if($save) {
                        $this->session->set_flashdata('kelulusan', ['success', "<b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!"]);
                    }
                    else {
                        $this->session->set_flashdata('kelulusan', ['danger', "<b>PROSES IMPORT GAGAL!</b> Data Gagal diimport!"]);
                    }
                    redirect('import/kelulusan/'.$kode_prodi);
                }
                else {
                    $error = "<b>PROSES IMPORT DATA GAGAL!</b> File tidak sesuai";
                    $this->session->set_flashdata('kelulusan', ['danger', $error]);
                    redirect('import/kelulusan/'.$kode_prodi);
                }
            }
            else {
                $error = "<b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah";
                $this->session->set_flashdata('kelulusan', ['danger', $error]);
                redirect('import/kelulusan/'.$kode_prodi);
            }
        }
        else {
            $error = "Pilih file excel terlebih dahulu";
            $this->session->set_flashdata('kelulusan', ['danger', $error]);
            redirect('import/kelulusan/'.$kode_prodi);
        }
    }

    // AKM
    public function view_akm(){
        $x['prodi'] = $this->import_model->getprodi();

        $this->load->view("include/head");
        $this->load->view("include/top-header");
        $this->load->view('akm',$x);
        $this->load->view("include/sidebar");
        $this->load->view("include/panel");
        $this->load->view("include/footer");
    }

    public function akm($data){
        $x['kode_prodi'] = $data;

        $this->load->view("include/head");
        $this->load->view("include/top-header");
        $this->load->view('akm', $x);
        $this->load->view("include/sidebar");
        $this->load->view("include/panel");
        $this->load->view("include/footer");
    }

    public function data_akm($data){
        $db_result = $this->import_model->akm_get($data);
        $result = [];

        $i = 1;
        foreach($db_result as $res){
            $no = $i;
            $npp = $res->npp == NULL ? "<i><font>Tidak ada data</font></i>": $res->npp;
            $nama_mhs = $res->nama_mhs == NULL ? "<i><font>Tidak ada data</font></i>": $res->nama_mhs;
            $smt = $res->smt == NULL ? "<i><font>Tidak ada data</font></i>": $res->smt;
            $sks = $res->sks == NULL ? "<i><font>Tidak ada data</font></i>": $res->sks;
            $ip_smt = $res->ip_smt == NULL ? "<i><font>Tidak ada data</font></i>": $res->ip_smt;
            $sks_kum = $res->sks_kum == NULL ? "<i><font>Tidak ada data</font></i>": $res->sks_kum;
            $ip_kum = $res->ip_kum == NULL ? "<i><font>Tidak ada data</font></i>": $res->ip_kum;
            $status = $res->status == NULL ? "<i><font>Tidak ada data</font></i>": $res->status;
            $biaya = $res->biaya == NULL ? "<i><font>Tidak ada data</font></i>": $res->biaya;
            $prodi = $res->prodi == NULL ? "<i><font>Tidak ada data</font></i>": $res->prodi;

            $action = " <a href='javascript:;'
                data-id='$res->id'
                data-npp='$res->npp'
                data-nama='$res->nama_mhs'
                data-smt='$res->smt'
                data-sks='$res->sks'
                data-ip_smt='$res->ip_smt' 
                data-sks_kum='$res->sks_kum' 
                data-ip_kum='$res->ip_kum' 
                data-status='$res->status' 
                data-biaya='$res->biaya' 
                data-toggle='modal' 
                data-target='#edit_data_akm' 
                class='btn btn-sm btn-primary'><i class='fa fas fa-edit'></i></a> 
                
                <a href='javascript:;' 
                data-id='$res->id' data-nama='$res->nama_mhs'
                data-toggle='modal' data-target='#hapus_data_akm' class='btn btn-sm btn-danger'><i class='fa fas fa-trash'></i></a>";

            $result[] = array(
                $no,
                $npp,
                $nama_mhs,
                $smt,
                $sks,
                $ip_smt,
                $sks_kum,
                $ip_kum,
                $status,
                $biaya,
                $prodi,
                $action
            );
            $i++;
        }
         
        echo json_encode($result);
    }

    public function upload_akm() {        
        $kode_prodi = $this->input->post('kode_prodi');

        if(!empty($_FILES['akm']['name'])) {
            $file = explode('.', $_FILES['akm']['name']);
            $extension = end($file);
            if($extension === 'xlsx' && in_array($_FILES['akm']['type'], $this->xlsx_mimes)) {
                $reader = new Xlsx();
                $excel = $reader->load($_FILES['akm']['tmp_name']);
                $sheet = $excel->getActiveSheet();
                $rowCount = $sheet->getHighestDataRow();
                $nim = $sheet->getCellByColumnAndRow(2, 2)->getValue();
                $nama = $sheet->getCellByColumnAndRow(3, 2)->getValue();
                if (is_numeric($nim) && is_string($nama)) {
                    $data = [];
                    for ($i=2; $i<=$rowCount; $i++) {
                        $nim = $sheet->getCellByColumnAndRow(2, $i)->getValue();
                        $nama = $sheet->getCellByColumnAndRow(3, $i)->getValue();
                        $smt = $sheet->getCellByColumnAndRow(4, $i)->getValue();
                        $sks = $sheet->getCellByColumnAndRow(5, $i)->getValue();
                        $ip_smt = $sheet->getCellByColumnAndRow(6, $i)->getValue();
                        $sks_kum = $sheet->getCellByColumnAndRow(7, $i)->getValue();
                        $ip_kum = $sheet->getCellByColumnAndRow(8, $i)->getValue();
                        $status = $sheet->getCellByColumnAndRow(9, $i)->getValue();
                        $biaya = $sheet->getCellByColumnAndRow(10, $i)->getValue();

                        array_push($data, [
                            'npp' => $nim,
                            'nama_mhs' => $nama,
                            'smt' => $smt,
                            'sks' => $sks, 
                            'ip_smt' => $ip_smt,
                            'sks_kum' => $sks_kum,
                            'ip_kum' => $ip_kum,
                            'status' => $status, 
                            'biaya' => $biaya,
                            'prodi' => $kode_prodi
                        ]);
                    }

                    $save = $this->import_model->upload_excel('tbl_akm', $data);
                    if($save) {
                        $this->session->set_flashdata('akm', ['success', "<b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!"]);
                    }
                    else {
                        $this->session->set_flashdata('akm', ['danger', "<b>PROSES IMPORT GAGAL!</b> Data Gagal diimport!"]);
                    }
                    redirect('import/akm/'.$kode_prodi);
                    
                }
                else {
                    $error = "<b>PROSES IMPORT DATA GAGAL!</b> File tidak sesuai";
                    $this->session->set_flashdata('akm', ['danger', $error]);
                    redirect('import/akm/'.$kode_prodi);
                }
            }
            else {
                $error = "<b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah";
                $this->session->set_flashdata('akm', ['danger', $error]);
                redirect('import/akm/'.$kode_prodi);
            }
        }
        else {
            $error = "Pilih file excel terlebih dahulu";
            $this->session->set_flashdata('akm', ['danger', $error]);
            redirect('import/akm/'.$kode_prodi);
        }
    }

    public function tambah_akm() {
        $kode_prodi = $this->input->post('prodi', true);        
        $data['npp'] = $this->input->post('npp', true);
        $data['nama_mhs'] = $this->input->post('nama', true);
        $data['smt'] = $this->input->post('smt', true);
        $data['sks'] = $this->input->post('sks', true);
        $data['ip_smt'] = $this->input->post('ip_smt', true);
        $data['sks_kum'] = $this->input->post('sks_kumulatif', true);
        $data['ip_kum'] = $this->input->post('ip_kumulatif', true);
        $data['status'] = $this->input->post('status', true);
        $data['biaya'] = $this->input->post('biaya', true);
        $data['prodi'] = $kode_prodi;

        if($this->import_model->akm_add($data)) {
            $this->session->set_flashdata('akm', ['success', "<b>Tambah data AKM berhasil!</b>"]);
        }else{
            $this->session->set_flashdata('akm', ['danger', "<b>Tambah data AKM gagal!</b>"]);
        }
        redirect('import/akm/'.$kode_prodi);
    }

    public function edit_akm() {
        $kode_prodi = $this->input->post('prodi', true);
        $id = $this->input->post('id', true);    
        $data['npp'] = $this->input->post('npp', true);
        $data['nama_mhs'] = $this->input->post('nama', true);
        $data['smt'] = $this->input->post('smt', true);
        $data['sks'] = $this->input->post('sks', true);
        $data['ip_smt'] = $this->input->post('ips', true);
        $data['sks_kum'] = $this->input->post('sksk', true);
        $data['ip_kum'] = $this->input->post('ipk', true);
        $data['status'] = $this->input->post('status', true);
        $data['biaya'] = $this->input->post('biaya', true);

        if($this->import_model->akm_edit($id, $data)) {
            $this->session->set_flashdata('akm', ['success', "<b>Ubah Data AKM Berhasil!</b>"]);
        } else {
            $this->session->set_flashdata('akm', ['danger', "<b>Ubah Data AKM gagal!</b>"]);
        }
        redirect('import/akm/'.$kode_prodi);
    }

    public function hapus_akm() {
        $kode_prodi = $this->input->post('prodi', true);        
        $id = $this->input->post('id', true);

        if($this->import_model->akm_delete($id)) {
            $this->session->set_flashdata('akm', ['success', "<b>Hapus data AKM berhasil!</b>"]);
        } else {
            $this->session->set_flashdata('akm', ['danger', "<b>Hapus data AKM gagal!</b>"]);
        }
        redirect('import/akm/'.$kode_prodi);
    }
}