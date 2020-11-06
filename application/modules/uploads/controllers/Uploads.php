<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Uploads extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if($_SESSION['nip'])
        {
            $this->load->view("include/head");
            $this->load->view("include/top-header");
            $this->load->view('v_import');
            $this->load->view("include/sidebar");
            $this->load->view("include/panel");
            $this->load->view("include/footer"); 
        }else{
            redirect("user");
        }
    }

    public function tes(){
        $file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        if(isset($_FILES['berkas_excel']['name']) && in_array($_FILES['berkas_excel']['type'], $file_mimes)) {
        
            $arr_file = explode('.', $_FILES['berkas_excel']['name']);
            $extension = end($arr_file);
        
            if('csv' == $extension) {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }
        
            $spreadsheet = $reader->load($_FILES['berkas_excel']['tmp_name']);
            
            $sheetData = $spreadsheet->getActiveSheet()->toArray();
            $data = array();
            for($i = 1;$i < count($sheetData);$i++)
            {
                array_push($data, array(
                    'nama'      => $sheetData[$i]['1'],
                    'umur'      => $sheetData[$i]['2'],
                ));
            }
            $this->db->insert_batch('pengguna', $data);
            redirect("uploads"); 
        }
    }

    public function uploadNext()
    {
        // satker kampus
        // 448302 IPDN KAMPUS JATINANGOR
        // 352593 IPDN KAMPUS JAKARTA
        // 677010 IPDN KAMPUS SULAWESI UTARA
        // 677024 IPDN KAMPUS SULAWESI SELATAN
        // 677045 IPDN KAMPUS SUMATERA BARAT
        // 683070 IPDN KAMPUS KALIMANTAN BARAT
        // 683084 IPDN KAMPUS NUSA TENGGARA BARAT
        // 683091 IPDN KAMPUS PAPUA

        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';

        $config['upload_path'] = realpath('excel');
        $config['allowed_types'] = 'xlsx|xls|csv';
        $config['max_size'] = '10000';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        // var_dump($config['upload_path']);exit;

        if (!$this->upload->do_upload()) {

            //upload gagal
            $this->session->set_flashdata('notifbiroN', '<div class="alert alert-danger"><b>PROSES IMPORT GAGAL!</b> '.$this->upload->display_errors().'</div>');
            //redirect halaman
            redirect('uploads/');

        } else {

            $data_upload = $this->upload->data();

            $excelreader       = new PHPExcel_Reader_Excel2007();

            // Load file yang telah diupload ke folder excel
            $loadexcel         = $excelreader->load('excel/'.$data_upload['file_name']);

            // get all list of sheet
            $list_sheet = $loadexcel->getSheetNames();

            $biro = "";
            $set = false;
            $data = array();

            foreach ($list_sheet as $shit) {

                // pisahkan cara membaca sheet, antara rekap dan nama bagian / unit
                // sheet yang biasanya nama bagian
                // 1. TU BIRO..
                // 2. AKADEMIK
                // ...
                // PASCA*
                // PROFESI*
                // echo $shit."<br>";
                $es = explode(".", $shit);

                if ((is_numeric($es[0]) || ($shit == "PASCA") || ($shit == "PROFESI")) && !(strpos(strtolower($shit), 'edit'))) {
                    echo "<br><br>=============================<br><br>";
                    echo $shit."<br>";

                    // set unit, biro ke berapa, unit ke berapa
                    switch ($shit) {
                        case "PASCA":
                        $unit = 115;
                        break;
                        case "PROFESI":
                        $unit = 116;
                        break;
                        default:
                        $unit = ($es[0]<10)?$biro."0".$es[0]:$biro.$es[0];
                        break;
                    }

                    echo "<br>".$unit."<br>";

                    $rows = $loadexcel->getSheetByName($shit)->toArray(null, true, true ,true);
                    $stop = false;
                    $num = 0;
                    $nullcc = 0;
                    while(!$stop) {
                        $row = $rows[$num++];
                        if ($row['A'] == NULL) {
                            $nullcc++;
                            if ($nullcc == 4) {
                                $stop = true;    
                            }
                        } else {
                            $nullcc = 0;
                            // echo $row['A']."<br>";
                            if (strpos($row['A'], 'tgl')) {
                                // echo $row['A']."<br>";
                                $tgl = explode("tgl. ", $row['A']);
                                $tgl_last = count($tgl)-1;
                                $tgl = $this->ite($tgl[$tgl_last]);
                                $newDate = date("Y-m-d", strtotime($tgl));
                                echo $newDate."<br>";
                            } else if ($num > 6) {
                                $regex = '/^[0-9]{4}\.[0-9]{3}$/';
                                if (preg_match($regex, $row['A'])) {
                                    echo $row['A']." ".str_replace("_x000D_", "",$row['B'])." ".preg_replace("/[^0-9]/", "", $row['C'])." ".preg_replace("/[^0-9]/", "", $row['D'])." ".preg_replace("/[^0-9]/", "", $row['E'])."<br>";
                                    array_push($data, array(
                                        'id_u'      => $unit,
                                        'nama'      => str_replace("[Base Line]", "", str_replace("_x000D_", "",$row['B'])),
                                        'pagu'      => preg_replace("/[^0-9]/", "", $row['C']),
                                        'realisasi' => preg_replace("/[^0-9]/", "", $row['D']),
                                        'kembali'   => preg_replace("/[^0-9]/", "", $row['E']),
                                        'tgl'       => $newDate
                                    ));
                                }
                            }
                        }
                    }

                // sheet rekap
                // bukan nama bagian / unit
                // REKAP IPDN
                // REKAP BIRO I
                // REKAP BIRO 2
                } else if (strpos($shit, 'REKAP BIRO') === 0 && !$set) {
                    // get nomer biro untuk id biro
                    $set = true;
                    $temp = explode(" ", $shit);
                    $biro = $temp[2];
                    $unitList = array();
                    if (!is_numeric($biro)) {
                        $biro = $this->rti($biro);
                    }

                    // khusus IPDN Jatinangor
                    $id_b = ($biro<10)?"10".$biro:"1".$biro;

                    echo $shit."<br>";
                    echo "ID BIRO : ".$id_b."<br>";

                    // read data pada sheet REKAP BIRO
                    $rows = $loadexcel->getSheetByName($shit)->toArray(null, true, true ,true);
                    $stop = false;
                    $num = 0;
                    $nullcc = 0;
                    while(!$stop) {
                        // echo $row['A']."<br>";
                        $row = $rows[$num++];

                        // cek eof
                        if ($row['A'] == NULL) {
                            $nullcc++;
                            if ($nullcc == 6) {
                                $stop = true;
                            }
                        } else if (is_numeric($row['A']) && strlen($row['B']) > 3) {
                            // harusnya konten, bukan header table
                            // list nama bagian / unit
                            $nullcc = 0;
                            $id_u = ($row['A']<10)?$biro."0".$row['A']:"1".$row['A'];
                            echo $id_u."=".$row['B']."<br>";
                            // echo "INSERT INTO unit values (".$id_u.", ".$id_b.", '".$row['B']."')";
                            array_push($unitList, array(
                                'id'    =>  $id_u , // 301, 411, 103, ... id unit
                                'id_b'  =>  $id_b,  // 101, 102, 103, 104, ... id biro
                                'nama'  =>  $row['B'] // LAB, TU BIRO
                            ));
                            echo "<br>";
                        } else if (strpos($row['A'], 'tgl')) {
                            // echo $row['A']."<br>";
                            $tgl = explode("tgl. ", $row['A']);
                            $tgl_last = count($tgl)-1;
                            $tgl = $this->ite($tgl[$tgl_last]);
                            $newDate = date("Y-m-d", strtotime($tgl));
                            echo $newDate."<br>";
                        }
                    }
                    echo "<br>";
                    // var_dump($unitList);
                    echo "<br>";

                    // setting table unit kalo belum ada isinya
                    // $this->db->truncate('unit_pok');

                    // untuk unit_pok yang kosong
                    // $this->db->insert_batch('unit_pok', $unitList);
                }
            }
            echo "<br>";
            // var_dump($data);
            // exit();

            // $this->db->truncate('out_pok');
            $this->db->insert_batch('out_pok', $data);
            //delete file from server
            unlink(realpath('excel/'.$data_upload['file_name']));

            //upload success
            $this->session->set_flashdata('notifbiroN', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
            //redirect halaman
            redirect('uploads/');
        }
    }
}
