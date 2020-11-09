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
            redirect("home"); 
        }else{
            redirect("user");
        }
    }

    public function v_span()
    {
        if($_SESSION['nip'])
        {
            redirect("home");
            // $this->load->view("include/head");
            // $this->load->view("include/top-header");
            // $this->load->view('v_import_span');
            // $this->load->view("include/sidebar");
            // $this->load->view("include/panel");
            // $this->load->view("include/footer"); 
        }else{
            redirect("user");
        }
    }

    public function v_pok()
    {
        if($_SESSION['nip'])
        {
            $this->load->view("include/head");
            $this->load->view("include/top-header");
            $this->load->view('v_import_pok');
            $this->load->view("include/sidebar");
            $this->load->view("include/panel");
            $this->load->view("include/footer"); 
        }else{
            redirect("user");
        }
    }

    public function v_sas()
    {
        if($_SESSION['nip'])
        {
            $this->load->view("include/head");
            $this->load->view("include/top-header");
            $this->load->view('v_import_sas');
            $this->load->view("include/sidebar");
            $this->load->view("include/panel");
            $this->load->view("include/footer"); 
        }else{
            redirect("user");
        }
    }

    public function span(){
        $file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        if(isset($_FILES['span']['name']) && in_array($_FILES['span']['type'], $file_mimes)) {
        
            $arr_file = explode('.', $_FILES['span']['name']);
            $extension = end($arr_file);

            if($extension != 'xlsx') {
                $this->session->set_flashdata('span', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');
           
                redirect("uploads/v_span"); 
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }
        
            $spreadsheet = $reader->load($_FILES['span']['tmp_name']);

            $list_sheet = $spreadsheet->getSheetNames();

            $sheetData = $spreadsheet->getSheetByName($list_sheet[0])->toArray();

            $data = array();
            $biro = array();

            $date = new DateTime();
            $datee = $date->format('Y-m-d');

            for($i = 10;$i < 23;$i++)
            {
                // var_dump($sheetData[$i]['2'] != 1286);
                if($sheetData[$i]['2'] != NULL && $sheetData[$i]['2'] != 1286 && $sheetData[$i]['2'] != 1292 && $sheetData[$i]['2'] != 1293 && $sheetData[$i]['2'] != 1294 && $sheetData[$i]['2'] != 1295){
                    array_push($data, array(
                        'kode_satker'      => $sheetData[$i]['2'],
                        'nama_satker'      => $sheetData[$i]['3'],
                        'pagu_bp'      => preg_replace("/[^0-9]/", "", $sheetData[$i]['4']),
                        'realisasi_bp'      => preg_replace("/[^0-9]/", "", $sheetData[$i]['5']),
                        'persentase_bp'      => $sheetData[$i]['7'],
                        'pagu_bb'      => preg_replace("/[^0-9]/", "", $sheetData[$i]['8']),
                        'realisasi_bb'   => preg_replace("/[^0-9]/", "", $sheetData[$i]['9']),
                        'persentase_bb'   => $sheetData[$i]['11'],
                        'pagu_bm'   => preg_replace("/[^0-9]/", "", $sheetData[$i]['12']),
                        'realisasi_bm'   => preg_replace("/[^0-9]/", "", $sheetData[$i]['13']),
                        'persentase_bm'   => $sheetData[$i]['15'],
                        'pagu_t'   => preg_replace("/[^0-9]/", "", $sheetData[$i]['16']),
                        'realisasi_t'   => preg_replace("/[^0-9]/", "", $sheetData[$i]['17']),
                        'persentase_t'   => $sheetData[$i]['19'],
                        'sisa'   => preg_replace("/[^0-9]/", "", $sheetData[$i]['20']),
                        'created_date' => $datee,
                    ));
                }
            }

            for($i = 11;$i < 15;$i++)
            {
                array_push($biro, array(
                    'kode_satker_biro'      => $sheetData[$i]['2'],
                    'nama_satker_biro'      => $sheetData[$i]['3'],
                    'pagu_bp'      => preg_replace("/[^0-9]/", "", $sheetData[$i]['4']),
                    'realisasi_bp'      => preg_replace("/[^0-9]/", "", $sheetData[$i]['5']),
                    'persentase_bp'      => $sheetData[$i]['7'],
                    'pagu_bb'      => preg_replace("/[^0-9]/", "", $sheetData[$i]['8']),
                    'realisasi_bb'   => preg_replace("/[^0-9]/", "", $sheetData[$i]['9']),
                    'persentase_bb'   => $sheetData[$i]['11'],
                    'pagu_bm'   => preg_replace("/[^0-9]/", "", $sheetData[$i]['12']),
                    'realisasi_bm'   => preg_replace("/[^0-9]/", "", $sheetData[$i]['13']),
                    'persentase_bm'   => $sheetData[$i]['15'],
                    'pagu_t'   => preg_replace("/[^0-9]/", "", $sheetData[$i]['16']),
                    'realisasi_t'   => preg_replace("/[^0-9]/", "", $sheetData[$i]['17']),
                    'persentase_t'   => $sheetData[$i]['19'],
                    'sisa'   => preg_replace("/[^0-9]/", "", $sheetData[$i]['20']),
                    'created_date' => $datee,
                ));
            }
            // exit;
            $this->db->truncate('tbl_span_biro');
            $this->db->insert_batch('tbl_span_biro', $biro);
            $this->db->truncate('tbl_span');
            $this->db->insert_batch('tbl_span', $data);

            //upload success
            $this->session->set_flashdata('span', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
           
            redirect("uploads/v_span"); 
        }
    }

    public function pok()
    {
        error_reporting(E_ERROR | E_PARSE);
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
        $file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        if(isset($_FILES['pok']['name']) && in_array($_FILES['pok']['type'], $file_mimes)) {
        
            $arr_file = explode('.', $_FILES['pok']['name']);
            $extension = end($arr_file);

            if($extension != 'xlsx') {
                $this->session->set_flashdata('pok', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');
           
                redirect("uploads/v_pok"); 
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }
        
            $loadexcel = $reader->load($_FILES['pok']['tmp_name']);

            $list_sheet = $loadexcel->getSheetNames();

            // $sheetData = $spreadsheet->getSheetByName($list_sheet[0])->toArray();


            $biro = "";
            $set = false;
            $data_out = array();

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
                    $num = 1;
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
                                    array_push($data_out, array(
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
                    switch ($biro) {
                        case '1':
                            $id_b = 1292;
                            break;
                        case '2':
                            $id_b = 1294;
                            break;
                        case '3':
                            $id_b = 1293;
                            break;
                        case '4':
                            $id_b = 1286;
                            break;
                    }

                    echo $shit."<br>";
                    echo "ID BIRO : ".$id_b."<br>";

                    // read data pada sheet REKAP BIRO
                    $rows = $loadexcel->getSheetByName($shit)->toArray(null, true, true ,true);
                    $stop = false;
                    $num = 1;
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
                            echo "INSERT INTO unit values (".$id_u.", ".$id_b.", '".$row['B']."')";
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
                    $this->db->insert_batch('unit_pok', $unitList); // PENTING
                }
            }
            echo "<br>";
            // var_dump($data_out);
            // exit();

            // $this->db->truncate('out_pok');
            $this->db->insert_batch('out_pok', $data_out);  // PENTING
            //delete file from server
            // unlink(realpath('excel/'.$data_upload['file_name']));

            // //upload success
            $this->session->set_flashdata('span', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
            //redirect halaman
            redirect("uploads/v_pok"); 
        }
    }

    function rti($s) {
        $romans = array(
            'M' => 1000,
            'CM' => 900,
            'D' => 500,
            'CD' => 400,
            'C' => 100,
            'XC' => 90,
            'L' => 50,
            'XL' => 40,
            'X' => 10,
            'IX' => 9,
            'V' => 5,
            'IV' => 4,
            'I' => 1,
        );

        // $roman = 'MMMCMXCIX';
        $result = 0;

        foreach ($romans as $key => $value) {
            while (strpos($s, $key) === 0) {
                $result += $value;
                $s = substr($s, strlen($key));
            }
        }
        return $result;
    }

    function ite($s) {
        $months = array(
            'Jan' => "Januari",
            'Feb' => "Februari",
            'Mar' => "Maret",
            'Apr' => "April",
            'May' => "Mei",
            'Jun' => "Juni",
            'Jul' => "Juli",
            'Aug' => "Agustus",
            'Sep' => "September",
            'Oct' => "Oktober",
            'Nov' => "November",
            'Dec' => "Desember"
        );

        $result = "";

        $bi = explode(" ", $s);
        // echo "file: ".$s."<br>";
        foreach ($months as $en => $in) {
            if (strpos(strtoupper($in), strtoupper($bi[1])) === 0) {
                $result = str_replace($bi[1],$en,$s);
            }
        }
        return strtoupper($result);
    }
}
