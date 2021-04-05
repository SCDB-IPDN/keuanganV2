<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class Uploads extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('uploads_model');
	}

	public function index()
	{
		if($this->session->userdata('nip') != NULL)
		{
			redirect("home"); 
		}else{
			redirect("user");
		}
	}

	public function v_span()
	{
		if($this->session->userdata('nip') != NULL)
		{
			// redirect("home");
			$this->load->view("include/head");
			$this->load->view("include/top-header");
			$this->load->view('v_import_span');
			$this->load->view("include/sidebar");
			$this->load->view("include/panel");
			$this->load->view("include/footer"); 
		}else{
			redirect("user");
		}
	}

	public function v_pok()
	{
		if($this->session->userdata('nip') != NULL)
		{
			$x['title'] = "pok";
			$this->load->view("include/head");
			$this->load->view("include/top-header");
			$this->load->view('v_import', $x);
			$this->load->view("include/sidebar");
			// $this->load->view("include/panel");
			$this->load->view("include/footer");  
		}else{
			redirect("user");
		}
	}

	public function v_sas()
	{
		if($this->session->userdata('nip') != NULL)
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

	public function v_sarpras($kampus = NULL)
	{
		if($this->session->userdata('nip') != NULL)
		{
			$x['title'] = 'sarpras';
			$x['kampus'] = $kampus;
			$this->load->view("include/head");
			$this->load->view("include/top-header");
			$this->load->view('v_import', $x);
			$this->load->view("include/sidebar");
			// $this->load->view("include/panel");
			$this->load->view("include/footer"); 
		}else{
			redirect("user");
		}
	}

	public function v_rank()
	{
		if($_SESSION['nip'])
		{
			$x['title'] = "rank";
			$this->load->view("include/head");
			$this->load->view("include/top-header");
			$this->load->view('v_import', $x);
			$this->load->view("include/sidebar");
			// $this->load->view("include/panel");
			$this->load->view("include/footer"); 
		}else{
			redirect("user");
		}
	}

	public function v_praja()
	{
		if($this->session->userdata('nip') != NULL)
		{
			$x['title'] = "praja";
			$this->load->view("include/head");
			$this->load->view("include/top-header");
			$this->load->view('v_import_praja', $x);
			$this->load->view("include/sidebar");
			// $this->load->view("include/panel");
			$this->load->view("include/footer"); 
		}else{
			redirect("user");
		}
	}

	public function v_pns()
	{
		if($this->session->userdata('nip') != NULL)
		{
			// redirect("home");
			$this->load->view("include/head");
			$this->load->view("include/top-header");
			$this->load->view('v_import_pns');
			$this->load->view("include/sidebar");
			$this->load->view("include/panel");
			$this->load->view("include/footer"); 
		}else{
			redirect("user");
		}
	}
	
	public function v_thl()
	{
		if($this->session->userdata('nip') != NULL)
		{
			// redirect("home");
			$this->load->view("include/head");
			$this->load->view("include/top-header");
			$this->load->view('v_import_thl');
			$this->load->view("include/sidebar");
			$this->load->view("include/panel");
			$this->load->view("include/footer"); 
		}else{
			redirect("user");
		}
	}

	public function v_dosen()
	{
		if($this->session->userdata('nip') != NULL)
		{
			$this->load->view("include/head");
			$this->load->view("include/top-header");
			$this->load->view('v_import_dosen');
			$this->load->view("include/sidebar");
			$this->load->view("include/panel");
			$this->load->view("include/footer"); 
		}else{
			redirect("user");
		}
	}

	public function v_alumni()
	{
		if($this->session->userdata('nip') != NULL)
		{
			// redirect("home");
			$this->load->view("include/head");
			$this->load->view("include/top-header");
			$this->load->view('v_import_alumni');
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

			$span = $this->db->query("SELECT created_date FROM tbl_span WHERE created_date = '$datee'")->result();
			$biroo = $this->db->query("SELECT created_date FROM tbl_span_biro WHERE created_date = '$datee'")->result();
			
			if(!$span && !$biroo){
				$this->db->insert_batch('tbl_span_biro', $biro);
				$this->db->insert_batch('tbl_span', $data);
			}else{
				$this->db->query("DELETE FROM tbl_span_biro WHERE created_date='$datee'");
				$this->db->insert_batch('tbl_span_biro', $biro);
				$this->db->query("DELETE FROM tbl_span WHERE created_date='$datee'");
				$this->db->insert_batch('tbl_span', $data);
			}
			
			//upload success
			$log['user'] = $this->session->userdata('nip');
			$log['Ket'] = "UPLOAD SPAN";
			$log['tanggal'] = date('Y-m-d H:i:s');
			$this->uploads_model->log($log);
			
			$this->session->set_flashdata('span', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');

			redirect("uploads/v_span"); 
		}
	}

	public function satkerspan() {

		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['satker']['name']) && in_array($_FILES['satker']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['satker']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('satker', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_span"); 
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel = $reader->load($_FILES['satker']['tmp_name']);
			// echo $_FILES['belanja']['name'];

			$shit = $loadexcel->getActiveSheet();
			$rows = $shit->toArray(null, true, true ,true);
			$data = array();
			

			$date = new DateTime();
			$datee = $date->format('Y-m-d');

			
			foreach ($rows as $row) {
			// echo $row ['B'];
				$add = false;
				$nama = "";
				preg_match('/\b[0-9]{6}\b/', $row['B'], $tmp);
				if (count($tmp) > 0) {
					preg_match('/[A-Za-z]+[A-Za-z ]+/', $row['B'], $txt);
					$nama = $txt[0];
					switch ($tmp[0]) {
						case 448302:
							// IPDN KAMPUS JATINANGOR
						$add = true;
						break;
						case 352593:
                            // IPDN KAMPUS JAKARTA 
						$add = true;
						break;
						case 677010:
                            // IPDN KAMPUS SULUT
						$add = true;
						break;
						case 677024:
                            // IPDN KAMPUS SULSES
						$add = true;
						break;	
						case 677045:
                            // IPDN KAMPUS SUMBAR
						$add = true;
						break;	
						case 683070:
                            // IPDN KAMPUS KALBAR
						$add = true;
						break;	
						case 683084:
                            // IPDN KAMPUS NTB
						$add = true;
						break;	
						case 683091:
                            // IPDN KAMPUS PAPUA
						$add = true;
						break;
					}
					if ($add) {
						array_push($data, array(
							'kode_satker'    =>  $tmp[0],
							'nama_satker'  =>  $txt[0],
							'pagu_bp'      => $row['C'],
							'realisasi_bp'      => $row['D'],
							'persentase_bp'      => substr($row['E'], 1, 6),
							'pagu_bb'      => $row['G'],
							'realisasi_bb'   => $row['H'],
							'persentase_bb'   => substr($row['I'], 1, 6),
							'pagu_bm'   => $row['K'],
							'realisasi_bm'   => $row['L'],
							'persentase_bm'   => substr($row['M'], 1, 6),
							'pagu_t'   => $row['AM'],
							'realisasi_t'   => $row['AN'],
							'persentase_t'   => substr($row['AO'], 1, 6),
							'sisa'   => $row['AP'],
							'created_date' => $datee,

						));
					}	
				}
			}


			// print("<pre>".print_r($data,true)."</pre>");
			// print("<pre>".print_r($pelatihan,true)."</pre>");
			// exit;
		}
		// $this->db->insert_truncate('tbl_span');
		$this->db->truncate('tbl_span_rank');
		$this->db->insert_batch('tbl_span_rank', $data);
		//upload success
		
		$log['user'] = $this->session->userdata('nip');
		$log['Ket'] = "UPLOAD SATKER SPAN";
		$log['tanggal'] = date('Y-m-d H:i:s');
		$this->uploads_model->log($log);

		$this->session->set_flashdata('satker', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b><br>Data berhasil diimport!</div>');
		//redirect halaman
		redirect("uploads/v_span");
	}

	public function satkerspanbiro() {

		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['belanja']['name']) && in_array($_FILES['belanja']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['belanja']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('belanja', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_span"); 
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel = $reader->load($_FILES['belanja']['tmp_name']);
			// echo $_FILES['belanja']['name'];

			$shit = $loadexcel->getActiveSheet();
			$rows = $shit->toArray(null, true, true ,true);
			$biroo = array();
			
			$date = new DateTime();
			$datee = $date->format('Y-m-d');
			
			foreach ($rows as $row) {
			// echo $row ['B'];
				$add = false;
				$nama = "";
				preg_match('/\b[0-9]{6}\b/', $row['B'], $tmp);
				if (count($tmp) > 0) {
					preg_match('/[A-Za-z]+[A-Za-z ]+/', $row['B'], $txt);
					$nama = $txt[0];
					switch ($tmp[0]) {
						case '1294':
							// Pengelolaan Administrasi Umum dan Keuangan Pendidikan Kepamongprajaan
						$add = true;
						break;
						case '1293':
							// Penyelenggaraan Administrasi Keprajaan dan Kemahasiswaan
						$add = true;
						break;
						case '1286':
							// Penyelenggaraan Administrasin Kerjasama dan Hukum
						$add = true;
						break;
						case '1292':
							// Penyelenggaraan Administrasi Akademik dan Perencanaan Pendidikan Kepamongprajaan
						$add = true;
						break;
					}
					if ($add) {
						array_push($biroo, array(
							'kode_satker'    =>  $tmp[0],
							'nama_satker'  =>  $txt[0],
							'pagu_bp'      => $row['C'],
							'realisasi_bp'      => $row['D'],
							'persentase_bp'      => substr($row['E'], 1, 4),
							'pagu_bb'      => $row['G'],
							'realisasi_bb'   => $row['H'],
							'persentase_bb'   => substr($row['I'], 1, 4),
							'pagu_bm'   => $row['K'],
							'realisasi_bm'   => $row['L'],
							'persentase_bm'   => substr($row['M'], 1, 4),
							'pagu_t'   => $row['AM'],
							'realisasi_t'   => $row['AN'],
							'persentase_t'   => substr($row['AO'], 1, 4),
							'sisa'   => $row['AP'],
							'created_date' => $datee,

						));
					}	
				}
			}
			// print("<pre>".print_r($data,true)."</pre>");
			// print("<pre>".print_r($pelatihan,true)."</pre>");
			// exit;
		} var_dump($biroo);
		exit;
		// $this->db->insert_truncate('tbl_span');
		$this->db->truncate('tbl_span_rank');
		$this->db->insert_batch('tbl_span_rank', $biroo);
		//upload success
		
		$log['user'] = $this->session->userdata('nip');
		$log['Ket'] = "UPLOAD SATKER SPAN BIRO";
		$log['tanggal'] = date('Y-m-d H:i:s');
		$this->uploads_model->log($log);
		
		$this->session->set_flashdata('belanja', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b><br>Data berhasil diimport!</div>');
		//redirect halaman
		redirect("uploads/v_span");
	}

	public function pok() {
		// error_reporting(E_ERROR | E_PARSE);
		// error_reporting(E_ALL);
		// ini_set('display_errors', TRUE);
		// ini_set('display_startup_errors', TRUE);
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
		if(strtolower($_SERVER['REQUEST_METHOD']) == 'post' && $_FILES['pok']['tmp_name'][0] != "") {
			// ada isinya
			$count = count($_FILES['pok']['name']);

			// echo $count."<br>";
			// var_dump($_FILES);
			// print("<pre>".print_r($_FILES,true)."</pre>");
			$data_out = array();
			$unitList = array();

			foreach($_FILES[ 'pok' ][ 'tmp_name' ] as $index => $tmpName) {
				// echo $_FILES['pok']['name'][$index]."<br>";
				// echo $index."<br>";

				if(isset($_FILES['pok']['name'][$index]) && in_array($_FILES['pok']['type'][$index], $file_mimes)) {

					$arr_file = explode('.', $_FILES['pok']['name'][$index]);
					$extension = end($arr_file);

					// echo $_FILES['pok']['name'][$index];
					// echo "<br><br>=============================<br><br>";

					if($extension != 'xlsx') {
						$this->session->set_flashdata('pok', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

						redirect("uploads/v_pok"); 
					} else {
						$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
					}

					$loadexcel = $reader->load($_FILES['pok']['tmp_name'][$index]);

					$list_sheet = $loadexcel->getSheetNames();

					// print("<pre>".print_r($list_sheet,true)."</pre>");

					// $sheetData = $spreadsheet->getSheetByName($list_sheet[0])->toArray();


					$biro = "";
					$set = false;
					// $data_out = array();
					// $unitList = array();

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

						if ((is_numeric($es[0]) || ($shit == "PASCA") || ($shit == "PROFESI")) && !(strpos(strtolower($shit), 'edit') === 0)) {
							// echo "<br><br>=============================<br><br>";
							// echo $shit."<br>";

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

							// echo "<br>".$unit."<br>";

							$rows = $loadexcel->getSheetByName($shit)->toArray(null, true, true ,true);
							$maxRow = $loadexcel->getSheetByName($shit)->getHighestDataRow() + 1;
							$stop = false;
							$num = 1;
							$nullcc = 0;
							while(!$stop && $num < $maxRow) {
								$row = $rows[$num++];
								if ($row['A'] == NULL) {
									$nullcc++;
									if ($nullcc == 4) {
										$stop = true;    
									}
								} else {
									$nullcc = 0;
									// echo $row['A']."<br>";
									$newDate = date("Y-m-d");
									if ($num > 6) {
										// echo $row['A']."<br>";
										$regex = '/^[0-9]{4}\.[A-Z]{3}$/';
										if (preg_match($regex, $row['A'])) {
											// echo $row['A']." ".str_replace("_x000D_", "",$row['B'])." ".preg_replace("/[^0-9]/", "", $row['C'])." ".preg_replace("/[^0-9]/", "", $row['D'])." ".preg_replace("/[^0-9]/", "", $row['E'])."<br>";
											// echo $row['A']." ".str_replace("_x000D_", "",$row['B'])."<br>";
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
							// $unitList = array();
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

							// echo $shit."<br>";
							// echo "ID BIRO : ".$id_b."<br>";

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
									// echo $id_u."=".$row['B']."<br>";
									// echo "INSERT INTO unit values (".$id_u.", ".$id_b.", '".$row['B']."')";
									array_push($unitList, array(
										'id'    =>  $id_u , // 301, 411, 103, ... id unit
										'id_b'  =>  $id_b,  // 101, 102, 103, 104, ... id biro
										'nama'  =>  $row['B'] // LAB, TU BIRO
									));
									// echo "<br>";
								} else if (strpos($row['A'], 'tgl')) {
									// echo $row['A']."<br>";
									$tgl = explode("tgl. ", $row['A']);
									$tgl_last = count($tgl)-1;
									$tgl = $this->ite($tgl[$tgl_last]);
									$newDate = date("Y-m-d", strtotime($tgl));
									// echo $newDate."<br>";
								}
							}
							// echo "<br>";
							// var_dump($unitList);
							// echo "<br>";

							// setting table unit kalo belum ada isinya
							// $this->db->truncate('unit_pok');

							// untuk unit_pok yang kosong
							// $this->db->insert_batch('unit_pok', $unitList); // PENTING
						}
					}
					// echo "<br>";
					// var_dump($unitList);
					// print("<pre>".print_r($unitList,true)."</pre>");
					// var_dump($data_out);
					// print("<pre>".print_r($data_out,true)."</pre>");
					// exit();

					// if (!empty($unitList)) {
					// 	$this->db->insert_batch('unit_pok', $unitList); // PENTING    
					// }
					// $this->db->truncate('out_pok');
					// $this->db->insert_batch('out_pok', $data_out);  // PENTING
					//delete file from server
					// unlink(realpath('excel/'.$data_upload['file_name'])); 
				}

			}
			// var_dump($unitList);
			// exit;
			// print("<pre>".print_r($unitList,true)."</pre>");
			$this->db->truncate('unit_pok');
			$this->db->insert_batch('unit_pok', $unitList); // PENTING 
			// var_dump($data_out);
			// print("<pre>".print_r($data_out,true)."</pre>");
			$this->db->truncate('out_pok');
			$this->db->insert_batch('out_pok', $data_out);  // PENTING
			// exit;
			// //upload success
			$log['user'] = $this->session->userdata('nip');
			$log['Ket'] = "UPLOAD POK";
			$log['tanggal'] = date('Y-m-d H:i:s');
			$this->uploads_model->log($log);

			$this->session->set_flashdata('pok', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b><br>Data berhasil diimport!</div>');
			//redirect halaman
			redirect("uploads/v_pok");
		} else {
			// echo "kosong";
			$this->session->set_flashdata('pok', '<div class="alert alert-warning"><b>PROSES IMPORT GAGAL!</b><br>Data kosong!</div>');
			redirect("uploads/v_pok");
		}
	}

	public function sarpras_jatinangor() {

		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['sarpras_jatinangor']['name']) && in_array($_FILES['sarpras_jatinangor']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['sarpras_jatinangor']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('sarpras_jatinangor', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_sarpras/jatinangor"); 
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel = $reader->load($_FILES['sarpras_jatinangor']['tmp_name']);

			$list_sheet = $loadexcel->getSheetNames();

			$table = "";
			$set = false;
			$data = array();
			$kode_satker = 448302;

			foreach ($list_sheet as $shit) {
				$table = strtolower(str_replace(" ", "_", trim($shit)));
				// $kategori = trim($shit);
				// echo "====================<br>";
				// echo "tabel: $table<br>";
				// echo "====================<br>";
				$rows = $loadexcel->getSheetByName($shit)->toArray(null, true, true ,true);
				$stop = false;
				$num = 1;
				$nullcc = 0;
				$luas = 0;
				$set = false; // buat liat bentuk tabel
				$tab = 0; // jenis tabel (tanpa pake luas, pake luas)
				while(!$stop) {
					$row = $rows[$num++];
					if ($row['A'] == NULL) {
						$nullcc++;
						if ($nullcc == 4) {
							$stop = true;
						}
					} else {
						$nullcc = 0;
						if (strpos(strtoupper($row['A']), 'PER') === 0) {
							$tgl = explode("PER ", $row['A']);
							$tgl_last = count($tgl)-1;
							$tgl = $this->ite($tgl[$tgl_last]);
							$newDate = date("Y-m-d", strtotime($tgl));
							// echo "tanggal: $newDate<br>";
						} else if ($num > 6) {
							if (!$set) {
								if (strpos(strtolower($row['L']), 'asal') === 0) {
									$set = true;
									$tab = 1;
								} elseif (strpos(strtolower($row['L']), 'kondisi') === 0) {
									$set = true;
									$tab = 0;
								}
							} elseif (is_numeric($row['A']) && strlen($row['A']) > 4) {
								$harga_beli = $harga_baru = $asal = $kondisi = "";
								$jumlah = $this->ktt($row['F']);
								if ($tab) { //if ($row['M'] != NULL) {
									// punya luas
									$luas = $this->ktt($row['G']);
									$harga_beli = $this->ktt($row['H']);
									$harga_baru = $this->ktt($row['J']);
									$asal = $row['L'];
									$kondisi = $row['M'];
								} else {
									$harga_beli = $this->ktt($row['G']);
									$harga_baru = $this->ktt($row['I']);
									$asal = $row['K'];
									$kondisi = $row['L'];
								}

								array_push($data, array(
									'kode_satker'    =>  $kode_satker,
									'kode'  =>  preg_replace("/[^0-9]/", "", $row['A']),
									'uraian' => $row['B'],
									'nup' => $row['C'],
									'merk' => $row['D'],
									'tahun' => $row['E'],
									'jumlah' => $jumlah,
									'harga_beli' => $harga_beli,
									'harga_baru' => $harga_baru,
									'asal' => $asal,
									'kondisi' => $kondisi,
									'luas' => $luas
								));
							}
						}
					}
				}
			} 

			$this->db->insert_batch('tbl_sarpras', $data);
			// exit;
		}

		//upload success
		$log['user'] = $this->session->userdata('nip');
		$log['Ket'] = "UPLOAD SARPRAS JATINANGOR";
		$log['tanggal'] = date('Y-m-d H:i:s');
		$this->uploads_model->log($log);
		
		$this->session->set_flashdata('sarpras_jatinangor', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b><br>Data '.$_FILES['sarpras_jatinangor']['name'].' berhasil diimport!</div>');
		//redirect halaman
		redirect("uploads/v_sarpras/jatinangor");
	}

	public function sarpras_papua() {

		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['sarpras_papua']['name']) && in_array($_FILES['sarpras_papua']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['sarpras_papua']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('sarpras_papua', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_sarpras/papua");
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel = $reader->load($_FILES['sarpras_papua']['tmp_name']);

			$list_sheet = $loadexcel->getSheetNames();

			$table = "";
			$kategori = "";
			$set = false;
			$data = array();
			$kode_satker = 683091;

			foreach ($list_sheet as $shit) {
				$table = strtolower(str_replace(" ", "_", trim($shit)));
				$kategori = trim($shit);
				// echo "====================<br>";
				// echo "tabel: $table<br>";
				// echo "====================<br>";
				$rows = $loadexcel->getSheetByName($shit)->toArray(null, true, true ,true);
				$maxRow = $loadexcel->getSheetByName($shit)->getHighestDataRow() + 1;
				$stop = false;
				$num = 1;
				$nullcc = 0;
				$luas = 0;
				while(!$stop && $num < $maxRow) {
					$row = $rows[$num];
					if ($row['A'] == NULL) {
						$nullcc++;
						if ($nullcc == 4) {
							$stop = true;
						}
					} elseif (is_numeric($row['D']) && strlen($row['D']) > 4) {
						$nullcc = 0;
						$harga_beli = $harga_baru = $asal = $kondisi = "";
						$jumlah = $this->ktt($row['K']);
						$harga_beli = $this->ktt($row['L']);
						$harga_baru = $this->ktt($row['P']);
						$kondisi = $row['J'];

						$thn = $row['I'];
						if (strlen($thn) > 4) {
							preg_match("/[0-9]{4}\b/", $thn, $thnT);
							$thn = $thnT[0];
						}

						array_push($data, array(
							'kode_satker'    =>  $kode_satker,
							'kode'  =>  preg_replace("/[^0-9]/", "", $row['D']),
							'uraian' => $row['F'],
							'nup' => $row['E'],
							'merk' => $row['G'],
							'tahun' => $thn,
							'jumlah' => $jumlah,
							'harga_beli' => $harga_beli,
							'harga_baru' => $harga_baru,
							'asal' => $asal,
							'kondisi' => $kondisi,
							'luas' => $luas
						));

					} elseif (strpos(strtoupper($row['A']), 'PER') === 0) {
						$nullcc = 0;
						$tgl = explode("PER ", $row['A']);
						$tgl_last = count($tgl)-1;
						$tgl = $this->ite($tgl[$tgl_last]);
						$newDate = date("Y-m-d", strtotime($tgl));
						// echo $newDate."<br>";exit;
					}
					$num++;
				}
			}
			// exit;
			$this->db->insert_batch('tbl_sarpras', $data);
		}

		//upload success
		$log['user'] = $this->session->userdata('nip');
		$log['Ket'] = "UPLOAD SARPRAS PAPUA";
		$log['tanggal'] = date('Y-m-d H:i:s');
		$this->uploads_model->log($log);

		$this->session->set_flashdata('sarpras_papua', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b><br>Data '.$_FILES['sarpras_papua']['name'].' berhasil diimport!</div>');
		//redirect halaman
		redirect("uploads/v_sarpras/papua");
	}

	public function sarpras_sulsel() {

		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['sarpras_sulsel']['name']) && in_array($_FILES['sarpras_sulsel']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['sarpras_sulsel']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('sarpras_sulsel', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_sarpras/sulsel");
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel = $reader->load($_FILES['sarpras_sulsel']['tmp_name']);

			$list_sheet = $loadexcel->getSheetNames();

			$table = "";
			$kategori = "";
			$set = false;
			$data = array();
			$kode_satker = 677024;

			foreach ($list_sheet as $shit) {
				$table = strtolower(str_replace(" ", "_", trim($shit)));
				$kategori = trim($shit);
				// echo "====================<br>";
				// echo "tabel: $table<br>";
				// echo "====================<br>";
				$rows = $loadexcel->getSheetByName($shit)->toArray(null, true, true ,true);
				$maxRow = $loadexcel->getSheetByName($shit)->getHighestDataRow() + 1;
				$stop = false;
				$num = 1;
				$nullcc = 0;
				$luas = 0;
				$set = false; // buat liat bentuk tabel
				$tab = 0; // jenis tabel (pake luas, tanpa pake luas)
				while(!$stop && $num < $maxRow) {
					$row = $rows[$num];
					// print("<pre>".print_r($row,true)."</pre>");
					if ($row['A'] == NULL) {
						$nullcc++;
						if ($nullcc == 4) {
							$stop = true;
						}
					} else {
						$nullcc = 0;
						if (!$set) {
							if (strpos(strtolower($row['H']), "harga") === 0) {
								if (strpos(strtolower($row['L']), 'asal') === 0) {
									// tanah
									$set = true;
									$tab = 0;
								} elseif (strpos(strtolower($row['L']), 'kondisi') === 0) {
									// aset tak berwujud, aset tetap lainnya, peralatan dan mesin
									$set = true;
									$tab = 1;
								}
							} elseif (strpos(strtolower($row['H']), "luas") === 0) {
								if (strpos(strtolower($row['M']), 'asal') === 0) {
									// gedung dan bangunan
									$set = true;
									$tab = 2;
								} elseif (strpos(strtolower($row['M']), 'kondisi') === 0) {
									// jaringan, irigasi, jalan dan jembatan
									$set = true;
									$tab = 3;
								}
							}
						} elseif (is_numeric($row['B']) && strlen($row['B']) > 4) {
							$luas = $harga_beli = $harga_baru = 0;
							$asal = $kondisi = "";
							$jumlah = $this->ktt($row['G']);
							switch ($tab) {
								case 0:
									// tanah
								$harga_beli = $this->ktt($row['H']);
								$harga_baru = $this->ktt($row['J']);
								$asal = $row['L'];
								$kondisi = $row['M'];
								break;
								case 1:
									// aset tak berwujud, aset tetap lainnya, peralatan dan mesin
								$harga_beli = $this->ktt($row['H']);
								$harga_baru = $this->ktt($row['J']);
								$kondisi = $row['L'];
								break;
								case 2:
									// gedung dan bangunan
								$luas = $this->ktt($row['H']);
								$harga_beli = $this->ktt($row['I']);
								$harga_baru = $this->ktt($row['K']);
								$asal = $row['M'];
								$kondisi = $row['N'];
								break;
								case 3:
									// jaringan, irigasi, jalan dan jembatan
								$luas = $this->ktt($row['H']);
								$harga_beli = $this->ktt($row['I']);
								$harga_baru = $this->ktt($row['K']);
								$kondisi = $row['M'];
								break;
							}

							$thn = $row['F'];
							if (strlen($thn) > 4) {
								// $thnT = explode('/', $thn);
								preg_match("/[0-9]{4}\b/", $thn, $thnT);
								$thn = $thnT[0];
							}

							array_push($data, array(
								'kode_satker'    =>  $kode_satker,
								'kode'  =>  preg_replace("/[^0-9]/", "", $row['B']),
								'uraian' => $row['C'],
								'nup' => $row['D'],
								'merk' => $row['E'],
								'tahun' => $thn,
								'jumlah' => $jumlah,
								'harga_beli' => $harga_beli,
								'harga_baru' => $harga_baru,
								'asal' => $asal,
								'kondisi' => $kondisi,
								'luas' => $luas
							));

						}
					}
					$num++;
				}
			}
			// exit;
			$this->db->insert_batch('tbl_sarpras', $data);
		}

		//upload success
		$log['user'] = $this->session->userdata('nip');
		$log['Ket'] = "UPLOAD SARPRAS SULSEL";
		$log['tanggal'] = date('Y-m-d H:i:s');
		$this->uploads_model->log($log);
		
		$this->session->set_flashdata('sarpras_sulsel', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b><br>Data '.$_FILES['sarpras_sulsel']['name'].' berhasil diimport!</div>');
		//redirect halaman
		redirect("uploads/v_sarpras/sulsel"); 
	}

	public function sarpras_ntb() {

		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['sarpras_ntb']['name']) && in_array($_FILES['sarpras_ntb']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['sarpras_ntb']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('sarpras_ntb', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_sarpras/ntb");
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel = $reader->load($_FILES['sarpras_ntb']['tmp_name']);

			$list_sheet = $loadexcel->getSheetNames();

			$table = "";
			$kategori = "";
			$set = false;
			$data = array();
			$kode_satker = 683084;

			foreach ($list_sheet as $shit) {
				$table = strtolower(str_replace(" ", "_", trim($shit)));
				$kategori = trim($shit);
				// echo "====================<br>";
				// echo "tabel: $table<br>";
				// echo "====================<br>";
				$rows = $loadexcel->getSheetByName($shit)->toArray(null, true, true ,true);
				$maxRow = $loadexcel->getSheetByName($shit)->getHighestDataRow() + 1;
				$stop = false;
				$num = 1;
				$nullcc = 0;
				$luas = $jumlah = 0;
				$set = false; // buat liat bentuk tabel
				$tab = 0; // jenis tabel
				while(!$stop && $num < $maxRow) {
					$row = $rows[$num];
					if ($row['A'] == NULL) {
						$nullcc++;
						if ($nullcc == 4) {
							$stop = true;
						}
					} else {
						$nullcc = 0;
						if (!$set) {
							if (strpos(strtolower($row['F']), "luas") === 0) {
								if (strpos(strtolower($row['J']), 'kondisi') === 0) {
									// jalan dan jembatan, tanah, bangunan air
									$set = true;
									$tab = 1;
								} else {
									// gedung dan bangunan
									$set = true;
									$tab = 4;
								}
							} elseif (strpos(strtolower($row['F']), "jumlah") === 0) {
								if (strpos(strtolower($row['J']), 'kondisi') === 0) {
									// peralatan dan mesin, aset tetap lainnya, monografi, jaringan, alat besar
									$set = true;
									$tab = 3;
								} else {
									// irigasi
									$set = true;
									$tab = 2;
								}
							} elseif (strpos(strtolower($row['F']), "polis") === 0) {
								// randis
								$set = true;
								$tab = 5;
							}
						} elseif (is_numeric(preg_replace("/[^0-9]/", "", $row['A'])) && strlen($row['A']) > 4) {
							$luas = $harga_beli = $harga_baru = 0;
							$jumlah = 1;
							$asal = $kondisi = "";
							switch ($tab) {
								case 1:
								$luas = $this->ktt($row['F']);
								$harga_beli = $this->ktt($row['G']);
								$asal = $row['I'];
								$kondisi = $row['J'];
								break;
								case 2:
								$jumlah = $this->ktt($row['F']);
								$harga_beli = $this->ktt($row['G']);
								$harga_baru = $this->ktt($row['I']);
								$asal = $row['K'];
								$kondisi = $row['L'];
								break;
								case 3:
								$jumlah = $this->ktt($row['F']);
								$harga_beli = $this->ktt($row['G']);
								$asal = $row['I'];
								$kondisi = $row['J'];
								break;
								case 4:
								$luas = $this->ktt($row['F']);
								$harga_beli = $this->ktt($row['H']);
								$asal = $row['J'];
								$kondisi = $row['K'];
								break;
								case 5:
								$harga_beli = $this->ktt($row['G']);
								$asal = $row['I'];
								$kondisi = $row['J'];
								break;
							}

							$thn = $row['E'];
							if (strlen($thn) > 4) {
								preg_match("/[0-9]{4}\b/", $thn, $thnT);
								$thn = $thnT[0];
							}

							array_push($data, array(
								'kode_satker'    =>  $kode_satker,
								'kode'  =>  preg_replace("/[^0-9]/", "", $row['A']),
								'uraian' => $row['B'],
								'nup' => $row['C'],
								'merk' => $row['D'],
								'tahun' => $thn,
								// -------------------- //
								'jumlah' => $jumlah,
								'luas' => $luas,
								'harga_beli' => $harga_beli,
								'harga_baru' => $harga_baru,
								'asal' => $asal,
								'kondisi' => $kondisi
							));

						}
					}
					$num++;
				}
			}

			// exit;
			$this->db->insert_batch('tbl_sarpras', $data);
		}

		//upload success
		$log['user'] = $this->session->userdata('nip');
		$log['Ket'] = "UPLOAD SARPRAS NTB";
		$log['tanggal'] = date('Y-m-d H:i:s');
		$this->uploads_model->log($log);
		
		$this->session->set_flashdata('sarpras_ntb', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b><br>Data '.$_FILES['sarpras_ntb']['name'].' berhasil diimport!</div>');
			//redirect halaman
		redirect("uploads/v_sarpras/ntb");
	}

	public function sarpras_sulut() {

		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['sarpras_sulut']['name']) && in_array($_FILES['sarpras_sulut']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['sarpras_sulut']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('sarpras_sulut', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_sarpras/sulut");
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel = $reader->load($_FILES['sarpras_sulut']['tmp_name']);

			$list_sheet = $loadexcel->getSheetNames();

			$table = "";
			$kategori = "";
			$set = false;
			$data = array();
			$kode_satker = 677010;

			foreach ($list_sheet as $shit) {
				$table = strtolower(str_replace(" ", "_", trim($shit)));
				$kategori = trim($shit);
				// echo "====================<br>";
				// echo "tabel: $table<br>";
				// echo "====================<br>";
				$rows = $loadexcel->getSheetByName($shit)->toArray(null, true, true ,true);
				$maxRow = $loadexcel->getSheetByName($shit)->getHighestDataRow() + 1;
				$stop = false;
				$num = 1;
				$nullcc = 0;
				$luas = $jumlah = 0;
				$set = false; // buat liat bentuk tabel
				$tab = 0; // jenis tabel
				while(!$stop && $num < $maxRow) {
					$row = $rows[$num];
					if ($row['A'] == NULL) {
						$nullcc++;
						if ($nullcc == 4) {
							$stop = true;
						}
					} else {
						$nullcc = 0;
						if (!$set) {
							if (strpos(strtolower($row['J']), "harga") === 0) {
								if (strpos(strtolower($row['N']), 'psp') === 0) {
									// jaringan, aset tetap lainnya
									$set = true;
									$tab = 3;
								} elseif (strpos(strtolower($row['N']), 'lokasi') === 0) {
									// peralatan dan mesin
									$set = true;
									$tab = 4;
								} elseif (strpos(strtolower($row['N']), 'kondisi') === 0) {
									// gedung dan bangunan
									$set = true;
									$tab = 5;
								}
							} elseif (strpos(strtolower($row['J']), "asal") === 0) {
								// kendaraan
								$set = true;
								$tab = 2;
							} elseif (strpos(strtolower($row['J']), "kondisi") === 0) {
								// jalan
								$set = true;
								$tab = 1;
							}
						} elseif (is_numeric(preg_replace("/[^0-9]/", "", $row['B'])) && strlen($row['B']) > 4) {
							$luas = $harga_beli = $harga_baru = 0;
							$jumlah = 1;
							$asal = $kondisi = "";

							switch ($tab) {
								case 1:
								$harga_beli = $this->ktt($row['H']);
								$asal = $row['I'];
								$kondisi = $row['J'];
								break;
								case 2:
								$harga_beli = $this->ktt($row['H']);
								$harga_baru = $this->ktt($row['I']);
								$asal = $row['J'];
								$kondisi = $row['K'];
								break;
								case 3:
								$harga_beli = $this->ktt($row['H']);
								$harga_baru = $this->ktt($row['J']);
								$asal = $row['L'];
								$kondisi = $row['M'];
								break;
								case 4:
								$harga_beli = $this->ktt($row['H']);
								$harga_baru = $this->ktt($row['J']);
								$asal = $row['L'];
								$kondisi = $row['M'];
								break;
								case 5:
								$luas = $this->ktt($row['H']);
								$harga_beli = $this->ktt($row['I']);
								$harga_baru = $this->ktt($row['K']);
								$asal = $row['M'];
								$kondisi = $row['N'];
								break;
							}

							$thn = $row['F'];
							if (strlen($thn) > 4) {
								preg_match("/[0-9]{4}\b/", $thn, $thnT);
								$thn = $thnT[0];
							}
							$jumlah = $this->ktt($row['G']);

							array_push($data, array(
								'kode_satker'    =>  $kode_satker,
								'kode'  =>  preg_replace("/[^0-9]/", "", $row['B']),
								'uraian' => $row['C'],
								'nup' => $row['D'],
								'merk' => $row['E'],
								// -------------------- //
								'tahun' => $thn,
								'jumlah' => $jumlah,
								'luas' => $luas,
								'harga_beli' => $harga_beli,
								'harga_baru' => $harga_baru,
								'asal' => $asal,
								'kondisi' => $kondisi
							));

						}
					}
					$num++;
				}
			}
			// $this->ptt($data);exit;
			$this->db->insert_batch('tbl_sarpras', $data);
		}

		//upload success
		$log['user'] = $this->session->userdata('nip');
		$log['Ket'] = "UPLOAD SARPRAS SULUT";
		$log['tanggal'] = date('Y-m-d H:i:s');
		$this->uploads_model->log($log);
		
		$this->session->set_flashdata('sarpras_sulut', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b><br>Data '.$_FILES['sarpras_sulut']['name'].' berhasil diimport!</div>');
			//redirect halaman
		redirect("uploads/v_sarpras/sulut");
	}

	public function sarpras_jakarta() {

		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['sarpras_jakarta']['name']) && in_array($_FILES['sarpras_jakarta']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['sarpras_jakarta']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('sarpras_jakarta', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_sarpras/jakarta");
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel = $reader->load($_FILES['sarpras_jakarta']['tmp_name']);

			$list_sheet = $loadexcel->getSheetNames();

			$table = "";
			$kategori = "";
			$set = false;
			$data = array();
			$kode_satker = 352593;

			foreach ($list_sheet as $shit) {
				$table = strtolower(str_replace(" ", "_", trim($shit)));
				$kategori = trim($shit);
				// echo "====================<br>";
				// echo "tabel: $table<br>";
				// echo "====================<br>";
				$rows = $loadexcel->getSheetByName($shit)->toArray(null, true, true ,true);
				$maxRow = $loadexcel->getSheetByName($shit)->getHighestDataRow() + 1;
				$stop = false;
				$num = 1;
				$nullcc = 0;
				$luas = $jumlah = 0;
				$set = false; // buat liat bentuk tabel
				$tab = 0; // jenis tabel
				while(!$stop && $num < $maxRow) {
					$row = $rows[$num];
					if ($row['A'] == NULL) {
						$nullcc++;
						if ($nullcc == 4) {
							$stop = true;
						}
					} else {
						$nullcc = 0;
						if (!$set) {
							if (strpos(strtolower($row['G']), "harga") === 0) {
								if (strpos(strtolower($row['K']), 'kondisi') === 0) {
									// jalan dan jembatan, jaringan, aset tetap lainnya, peralatan dan mesin, aset tak berwujud
									$set = true;
									$tab = 3;
								} else {
									// tanah
									$set = true;
									$tab = 2;
								}
							} elseif (strpos(strtolower($row['G']), "luas") === 0) {
								// gedung dan bangunan, irigasi
								$set = true;
								$tab = 1;
							}
						} elseif (is_numeric(preg_replace("/[^0-9]/", "", $row['A'])) && strlen(preg_replace("/[^0-9]/", "", $row['A'])) > 8) {
							// echo preg_replace("/[^0-9]/", "", $row['A'])."<br>";
							$luas = $harga_beli = $harga_baru = 0;
							$jumlah = 1;
							$asal = $kondisi = "";

							switch ($tab) {
								case 1:
								$luas = $this->ktt($row['G']);
								$harga_beli = $this->ktt($row['H']);
								$harga_baru = $this->ktt($row['J']);
								$kondisi = $row['L'];
								break;
								case 2:
								$harga_beli = $this->ktt($row['G']);
								$harga_baru = $this->ktt($row['I']);
								$asal = $row['K'];
								$kondisi = $row['L'];
								break;
								case 3:
								$harga_beli = $this->ktt($row['G']);
								$harga_baru = $this->ktt($row['I']);
								$kondisi = $row['K'];
								break;
							}

							$thn = $row['E'];
							if (strlen($thn) > 4) {
								preg_match("/[0-9]{4}\b/", $thn, $thnT);
								$thn = $thnT[0];
							}
							$jumlah = $this->ktt($row['F']);

							array_push($data, array(
								'kode_satker'    =>  $kode_satker,
								'kode'  =>  preg_replace("/[^0-9]/", "", $row['A']),
								'uraian' => $row['B'],
								'nup' => $row['C'],
								'merk' => $row['D'],
								// -------------------- //
								'tahun' => $thn,
								'jumlah' => $jumlah,
								'luas' => $luas,
								'harga_beli' => $harga_beli,
								'harga_baru' => $harga_baru,
								'asal' => $asal,
								'kondisi' => $kondisi
							));

						}
					}
					$num++;
				}
			}
			// $this->ptt($data);exit;
			$this->db->insert_batch('tbl_sarpras', $data);
		}

		//upload success
		$log['user'] = $this->session->userdata('nip');
		$log['Ket'] = "UPLOAD SARPRAS JAKARTA";
		$log['tanggal'] = date('Y-m-d H:i:s');
		$this->uploads_model->log($log);
		
		$this->session->set_flashdata('sarpras_jakarta', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b><br>Data '.$_FILES['sarpras_jakarta']['name'].' berhasil diimport!</div>');
			//redirect halaman
		redirect("uploads/v_sarpras/jakarta");
	}

	public function sarpras_kalbar() {

		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['sarpras_kalbar']['name']) && in_array($_FILES['sarpras_kalbar']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['sarpras_kalbar']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('sarpras_kalbar', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_sarpras/kalbar");
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel = $reader->load($_FILES['sarpras_kalbar']['tmp_name']);

			$list_sheet = $loadexcel->getSheetNames();

			$table = "";
			$kategori = "";
			$set = false;
			$data = array();
			$kode_satker = 683070;
			$ctest = 0;
			$carr = 0;

			foreach ($list_sheet as $shit) {
				$ctest = 0;
				$table = strtolower(str_replace(" ", "_", trim($shit)));
				$kategori = trim($shit);
				// echo "====================<br>";
				// echo "tabel: $table<br>";
				// echo "====================<br>";
				$rows = $loadexcel->getSheetByName($shit)->toArray(null, true, true ,true);
				$maxRow = $loadexcel->getSheetByName($shit)->getHighestDataRow() + 1;
				$stop = false;
				$num = 1;
				$nullcc = 0;
				$luas = $jumlah = 0;
				$set = false; // buat liat bentuk tabel
				$tab = 0; // jenis tabel
				while($num < $maxRow) {
					$row = $rows[$num];
					$nullcc = 0;
					if (!$set) {
						if (strpos(strtolower($row['F']), "luas") === 0) {
							// tanah
							$set = true;
							$tab = 1;
						} elseif (strpos(strtolower($row['F']), "jumlah") === 0) {
							// jalan
							$set = true;
							$tab = 2;
						} elseif (strpos(strtolower($row['F']), "tahun") === 0) {
							if (strpos(strtolower($row['H']), 'luas') === 0) {
								if (strpos(strtolower($row['K']), 'harga') === 0) {
									// jaringan
									$set = true;
									$tab = 3;
								} else {
									// gedung, irigasi
									$set = true;
									$tab = 4;
								}									
							} else {
								if (isset($row['J'])) {
									// peralatan
									$set = true;
									$tab = 5;
								} else {
									// aset tetap lainnya, buku
									$set = true;
									$tab = 6;
								}
							}
						}
					} elseif (is_numeric(preg_replace("/[^0-9]/", "", $row['B'])) && strlen(preg_replace("/[^0-9]/", "", $row['B'])) > 8) {
						// echo preg_replace("/[^0-9]/", "", $row['A'])."<br>";
						$luas = $harga_beli = $harga_baru = 0;
						$jumlah = 1;
						$asal = $kondisi = "";

						switch ($tab) {
							case 1:
							$luas = $this->ktt($row['F']);
							$thn = $row['G'];
							if (strlen($thn) > 4) {
								preg_match("/[0-9]{4}\b/", $thn, $thnT);
								$thn = $thnT[0];
							}
							$jumlah = $this->ktt($row['H']);
							$harga_beli = $this->ktt($row['I']);
							$asal = $row['L'];
							$ctest++;
							break;
							case 2:
							$jumlah = $this->ktt($row['F']);
							$thn = $row['G'];
							if (strlen($thn) > 4) {
								preg_match("/[0-9]{4}\b/", $thn, $thnT);
								$thn = $thnT[0];
							}
							$luas = $this->ktt($row['H']);
							$harga_beli = $this->ktt($row['I']);
							$ctest++;
							break;
							case 3:
							$thn = $row['F'];
							if (strlen($thn) > 4) {
								preg_match("/[0-9]{4}\b/", $thn, $thnT);
								$thn = $thnT[0];
							}
							$jumlah = $this->ktt($row['G']);
							$luas = $this->ktt($row['H']);
							$harga_beli = $this->ktt($row['I']);
							$harga_baru = $this->ktt($row['K']);
							$kondisi = $row['L'];
							$ctest++;
							break;
							case 4:
							$thn = $row['F'];
							if (strlen($thn) > 4) {
								preg_match("/[0-9]{4}\b/", $thn, $thnT);
								$thn = $thnT[0];
							}
							$jumlah = $this->ktt($row['G']);
							$luas = $this->ktt($row['H']);
							$harga_beli = $this->ktt($row['I']);
							$kondisi = $row['K'];
							$ctest++;
							break;
							case 5:
							$thn = $row['F'];
							if (strlen($thn) > 4) {
								preg_match("/[0-9]{4}\b/", $thn, $thnT);
								$thn = $thnT[0];
							}
							$jumlah = $this->ktt($row['G']);
							$harga_beli = $this->ktt($row['H']);
							$kondisi = $row['J'];
							$ctest++;
							break;
							case 6:
							$thn = $row['F'];
							if (strlen($thn) > 4) {
								preg_match("/[0-9]{4}\b/", $thn, $thnT);
								$thn = $thnT[0];
							}
							$jumlah = $this->ktt($row['G']);
							$harga_beli = $this->ktt($row['H']);
							$ctest++;
							break;
						}

						array_push($data, array(
							'kode_satker'    =>  $kode_satker,
							'kode'  =>  preg_replace("/[^0-9]/", "", $row['B']),
							'uraian' => $row['C'],
							'nup' => $row['D'],
							'merk' => $row['E'],
							// -------------------- //
							'tahun' => $thn,
							'jumlah' => $jumlah,
							'luas' => $luas,
							'harga_beli' => $harga_beli,
							'harga_baru' => $harga_baru,
							'asal' => $asal,
							'kondisi' => $kondisi
						));
						$carr++;

					}
					
					$num++;
				}
				// echo $ctest."<br>";
			}
			// echo $carr."<br>";
			// echo count($data)."<br>";
			// $this->ptt($data);exit;
			$this->db->insert_batch('tbl_sarpras', $data);
		}

		//upload success
		$log['user'] = $this->session->userdata('nip');
		$log['Ket'] = "UPLOAD SARPRAS KALBAR";
		$log['tanggal'] = date('Y-m-d H:i:s');
		$this->uploads_model->log($log);
		
		$this->session->set_flashdata('sarpras_kalbar', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b><br>Data '.$_FILES['sarpras_kalbar']['name'].' berhasil diimport!</div>');
			//redirect halaman
		redirect("uploads/v_sarpras/kalbar");
	}

	public function sarpras_sumbar() {

		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['sarpras_sumbar']['name']) && in_array($_FILES['sarpras_sumbar']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['sarpras_sumbar']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('sarpras_sumbar', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_sarpras/sumbar");
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel = $reader->load($_FILES['sarpras_sumbar']['tmp_name']);

			$list_sheet = $loadexcel->getSheetNames();

			$table = "";
			$kategori = "";
			$set = false;
			$data = array();
			$kode_satker = 677045;
			$ctest = 0;
			$carr = 0;

			foreach ($list_sheet as $shit) {
				$ctest = 0;
				$table = strtolower(str_replace(" ", "_", trim($shit)));
				$kategori = trim($shit);
				// echo "====================<br>";
				// echo "tabel: $table<br>";
				// echo "====================<br>";
				$rows = $loadexcel->getSheetByName($shit)->toArray(null, true, true ,true);
				$maxRow = $loadexcel->getSheetByName($shit)->getHighestDataRow() + 1;
				$stop = false;
				$num = 1;
				$nullcc = 0;
				$luas = $jumlah = 0;
				$set = false; // buat liat bentuk tabel
				$tab = 0; // jenis tabel
				while($num < $maxRow) {
					$row = $rows[$num];
					$nullcc = 0;
					if (!$set) {
						if (strpos(strtolower($row['G']), "lokasi") === 0) {
							// gedung dan bangunan
							$set = true;
							$tab = 1;
						} elseif (strpos(strtolower($row['G']), "tanggal") === 0) {
							// kendaraan
							$set = true;
							$tab = 2;
						} elseif (strpos(strtolower($row['G']), "nilai") === 0) {
							// jalan, jembatan dan jaringan
							$set = true;
							$tab = 3;
						}
					} elseif (is_numeric(preg_replace("/[^0-9]/", "", $row['C'])) && strlen(preg_replace("/[^0-9]/", "", $row['C'])) > 8) { //kode barang
						// echo preg_replace("/[^0-9]/", "", $row['A'])."<br>";
						$luas = $harga_beli = $harga_baru = 0;
						$jumlah = 1;
						$uraian = $nup = $merk = $thn = $asal = $kondisi = "";

						switch ($tab) {
							case 1:
							$uraian = $row['D'];
							$nup = $row['E'];
							$harga_beli = $this->ktt($row['H']);
							$luas = $this->ktt($row['I']);
							$kondisi = $row['J'];
							$ctest++;
							break;
							case 2:
							$uraian = $row['D'];
							$merk = $row['E'];
							$harga_beli = $this->ktt($row['F']);
							$thn = $row['G'];
							if (strlen($thn) > 4) {
								preg_match("/[0-9]{4}\b/", $thn, $thnT);
								$thn = $thnT[0];
							}
							$kondisi = $row['H'];
							$ctest++;
							break;
							case 3:
							$nup = $row['D'];
							$uraian = $row['E'];
							$harga_beli = $this->ktt($row['G']);
								// $thn = $row['H'];
								// if (strlen($thn) > 4) {
								// 	preg_match("/[0-9]{4}\b/", $thn, $thnT);
								// 	$thn = $thnT[0];
								// }
							$ctest++;
							break;
						}

						array_push($data, array(
							'kode_satker'    =>  $kode_satker,
							'kode'  =>  preg_replace("/[^0-9]/", "", $row['C']),
							// -------------------- //
							'uraian' => $uraian,
							'nup' => $nup,
							'merk' => $merk,
							'tahun' => $thn,
							'jumlah' => $jumlah,
							'luas' => $luas,
							'harga_beli' => $harga_beli,
							'harga_baru' => $harga_baru,
							'asal' => $asal,
							'kondisi' => $kondisi
						));
						$carr++;

					}
					$num++;
				}
				// echo $ctest."<br>";
			}
			// echo $carr."<br>";
			// echo count($data)."<br>";
			// $this->ptt($data);exit;
			$this->db->insert_batch('tbl_sarpras', $data);
		}

		//upload success
		$log['user'] = $this->session->userdata('nip');
		$log['Ket'] = "UPLOAD SARPRAS SUMBAR";
		$log['tanggal'] = date('Y-m-d H:i:s');
		$this->uploads_model->log($log);
		
		$this->session->set_flashdata('sarpras_sumbar', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b><br>Data '.$_FILES['sarpras_sumbar']['name'].' berhasil diimport!</div>');
			//redirect halaman
		redirect("uploads/v_sarpras/sumbar");
	}

	public function rank() {

		// Load plugin PHPExcel nya
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(strtolower($_SERVER['REQUEST_METHOD']) == 'post' && $_FILES['rank']['tmp_name'][0] != "") {

			// hitung ada berapa file yg di upload bersamaan, buat cek doang
			// $count = count($_FILES['rank']['name']);

			// echo $count."<br>";
			// var_dump($_FILES);
			// print("<pre>".print_r($_FILES,true)."</pre>");
			$data = $data_span = array();
			$nf = 1; // tanda file aja, kalo file pertama eselon 1 brarti 1, satker 2, kegiatan 3

			foreach($_FILES[ 'rank' ][ 'tmp_name' ] as $index => $tmpName) {
				$f_name = $_FILES['rank']['name'][$index];
				// echo $f_name."<br>";
				if (strpos(strtolower($f_name), 'satker')) {
					$nf = 2;
				} elseif (strpos(strtolower($f_name), 'kegiatan')) {
					$nf = 3;
				}

				if(isset($_FILES['rank']['name'][$index]) && in_array($_FILES['rank']['type'][$index], $file_mimes)) {

					$arr_file = explode('.', $_FILES['rank']['name'][$index]);
					$extension = end($arr_file);

					if($extension != 'xlsx') {
						$this->session->set_flashdata('rank', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

						redirect("uploads/v_rank");
					}

					$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
					$loadexcel = $reader->load($_FILES['rank']['tmp_name'][$index]);
					$shit = $loadexcel->getActiveSheet();
					$rows = $shit->toArray(null, true, true ,true);
					$newDate = date_format(new DateTime(),"Y-m-d");

					switch ($nf) {
						case 1:
							// file eselon 1
						foreach ($rows as $row) {
							preg_match('/\b[0-9]{5}\b/', $row['B'], $tmp);
								// echo count($tmp);
							if (count($tmp) > 0) {
								if ($tmp[0] != "01001") {
									preg_match('/[A-Za-z]+[A-Za-z ]+/', $row['B'], $txt);
									array_push($data, array(
										'satker'    =>  $tmp[0],
										'nama'  =>  $txt[0],
										'pagu_peg' => $row['C'],
										'real_peg' => $row['D'],
										'pagu_bar' => $row['G'],
										'real_bar' => $row['H'],
										'pagu_mod' => $row['K'],
										'real_mod' => $row['L'],
										'created_at' => $newDate
									));
								}
							}
						}
						$nf = 1;
						break;
						case 2:
							// file satker
						$pool = 0;
						$pagu_peg_a = $pagu_mod_a = $pagu_bar_a = $real_peg_a = $real_mod_a = $real_bar_a = $satker_a = $nama_a = 0;
						foreach ($rows as $row) {
							$add = $spanint = false;
							$nama = "";
							preg_match('/\b[0-9]{6}\b/', $row['B'], $tmp);
								// echo count($tmp);
							if (count($tmp) > 0) {
								preg_match('/[A-Za-z]+[A-Za-z ]+/', $row['B'], $txt);
								$nama = $txt[0];

								switch ($tmp[0]) {
									case 403200:
											// SETJEN
									$add = true;
									break;
									case 483005:
											// DKPP
									$add = true;
									break;
									case 448302:
											// IPDN
											// $add = true;
									$satker_a = $tmp[0];
									$nama_a = $txt[0];
									$pagu_peg_a += $row['C'];
									$real_peg_a += $row['D'];
									$pagu_bar_a += $row['G'];
									$real_bar_a += $row['H'];
									$pagu_mod_a += $row['K'];
									$real_mod_a += $row['L'];

									$pool++;
									$spanint = true;
									$nama = "IPDN KAMPUS JATINANGOR";
									break;
									case 352593:
											// IPDN JAKARTA
											// $add = true;
									$pagu_peg_a += $row['C'];
									$real_peg_a += $row['D'];
									$pagu_bar_a += $row['G'];
									$real_bar_a += $row['H'];
									$pagu_mod_a += $row['K'];
									$real_mod_a += $row['L'];

									$pool++;
									$spanint = true;
									break;
									case 677010:
											// IPDN SULUT
											// $add = true;
									$pagu_peg_a += $row['C'];
									$real_peg_a += $row['D'];
									$pagu_bar_a += $row['G'];
									$real_bar_a += $row['H'];
									$pagu_mod_a += $row['K'];
									$real_mod_a += $row['L'];

									$pool++;
									$spanint = true;
									break;
									case 677024:
											// IPDN SULSEL
											// $add = true;
									$pagu_peg_a += $row['C'];
									$real_peg_a += $row['D'];
									$pagu_bar_a += $row['G'];
									$real_bar_a += $row['H'];
									$pagu_mod_a += $row['K'];
									$real_mod_a += $row['L'];

									$pool++;
									$spanint = true;
									break;
									case 677045:
											// IPDN SUMBAR
											// $add = true;
									$pagu_peg_a += $row['C'];
									$real_peg_a += $row['D'];
									$pagu_bar_a += $row['G'];
									$real_bar_a += $row['H'];
									$pagu_mod_a += $row['K'];
									$real_mod_a += $row['L'];

									$pool++;
									$spanint = true;
									break;
									case 683070:
											// IPDN KALBAR
											// $add = true;
									$pagu_peg_a += $row['C'];
									$real_peg_a += $row['D'];
									$pagu_bar_a += $row['G'];
									$real_bar_a += $row['H'];
									$pagu_mod_a += $row['K'];
									$real_mod_a += $row['L'];

									$pool++;
									$spanint = true;
									break;
									case 683084:
											// IPDN NTB
											// $add = true;
									$pagu_peg_a += $row['C'];
									$real_peg_a += $row['D'];
									$pagu_bar_a += $row['G'];
									$real_bar_a += $row['H'];
									$pagu_mod_a += $row['K'];
									$real_mod_a += $row['L'];

									$pool++;
									$spanint = true;
									break;
									case 683091:
											// IPDN PAPUA
											// $add = true;
									$pagu_peg_a += $row['C'];
									$real_peg_a += $row['D'];
									$pagu_bar_a += $row['G'];
									$real_bar_a += $row['H'];
									$pagu_mod_a += $row['K'];
									$real_mod_a += $row['L'];

									$pool++;
									$spanint = true;
									break;
								}

								if ($add) {
									array_push($data, array(
										'satker'	=>  $tmp[0],
										'nama'		=>  $nama,
										'pagu_peg'	=> $row['C'],
										'real_peg'	=> $row['D'],
										'pagu_bar'	=> $row['G'],
										'real_bar'	=> $row['H'],
										'pagu_mod'	=> $row['K'],
										'real_mod'	=> $row['L'],
										'created_at'	=> $newDate
									));
								} elseif ($pool == 8) {
									array_push($data, array(
										'satker'	=>  $satker_a,
										'nama'		=>  $nama_a,
										'pagu_peg'	=> $pagu_peg_a,
										'real_peg'	=> $real_peg_a,
										'pagu_bar'	=> $pagu_bar_a,
										'real_bar'	=> $real_bar_a,
										'pagu_mod'	=> $pagu_mod_a,
										'real_mod'	=> $real_mod_a,
										'created_at'	=> $newDate
									));
								} 

								if ($spanint) {
									array_push($data_span, array(
										'satker'	=>  $tmp[0],
										'nama'		=>  $nama,
										'pagu_peg'	=> $row['C'],
										'real_peg'	=> $row['D'],
										'pagu_bar'	=> $row['G'],
										'real_bar'	=> $row['H'],
										'pagu_mod'	=> $row['K'],
										'real_mod'	=> $row['L'],
										'created_at'	=> $newDate
									));
								}
							}
						}
						$nf = 1;
						break;
						case 3:
							// file kegiatan (biro)
						$biro = array('1286', '1292', '1293', '1294');
						foreach ($rows as $row) {
							preg_match('/\b[0-9]{4}\b/', $row['B'], $tmp);
							if (count($tmp) > 0) {
								if (in_array($tmp[0], $biro)) {
									preg_match('/[A-Za-z]+[A-Za-z ]+/', $row['B'], $txt);
									array_push($data_span, array(
										'satker'	=>  $tmp[0],
										'nama'		=>  $txt[0],
										'pagu_peg'	=> $row['C'],
										'real_peg'	=> $row['D'],
										'pagu_bar'	=> $row['G'],
										'real_bar'	=> $row['H'],
										'pagu_mod'	=> $row['K'],
										'real_mod'	=> $row['L'],
										'created_at'	=> $newDate
									));
								}
							}
						}
						$nf = 1;
						break;
					}
				}
			}
			// print("<pre>".print_r($data,true)."</pre>");
			// $this->db->truncate('peringkat');
			// $this->db->insert_batch('peringkat', $data);  // PENTING
			// $this->ptt($data);exit;
			
			
			$this->uploads_model->upsert_batch($data, 'tbl_rank', $newDate);

			// exit;

			// $this->db->truncate('tbl_rank');
			// $this->db->insert_batch('tbl_rank', $data);

			// $this->db->truncate('tbl_spanint');
			// $this->db->insert_batch('tbl_spanint', $data_span);
			$this->uploads_model->upsert_batch($data_span, 'tbl_spanint', $newDate);
			// exit;
			// //upload success
			$log['user'] = $this->session->userdata('nip');
			$log['Ket'] = "UPLOAD RANK";
			$log['tanggal'] = date('Y-m-d H:i:s');
			$this->uploads_model->log($log);

			$this->session->set_flashdata('rank', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b><br>Data berhasil diimport!</div>');
			//redirect halaman
			redirect("uploads/v_rank");
		} else {
			// echo "kosong";
			$this->session->set_flashdata('rank', '<div class="alert alert-warning"><b>PROSES IMPORT GAGAL!</b><br>Data kosong!</div>');
			redirect("uploads/v_rank");
		}
	}

	public function uploadPagu()
	{
		// Load plugin PHPExcel nya
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if (isset($_FILES['pagu']['name']) && in_array($_FILES['pagu']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['pagu']['name']);
			$extension = end($arr_file);

			if ($extension != 'xlsx') {
				$this->session->set_flashdata('notifpagu', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_sas");
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel  = $reader->load($_FILES['pagu']['tmp_name']);
			$sheet  = $loadexcel->getActiveSheet()->toArray(null, true, true, true);
			$data = array();
			$numrow = 1;
			$cbiro = 1;
			$cunit = 0;
			$satker_jatinangor = 448302;
			$tgl = date('Y-m-d');

			$this->db->where('kode_satker', $satker_jatinangor);
			$this->db->delete('unit_sas');

			$this->db->where('kode_satker', $satker_jatinangor);
			$this->db->delete('output_sas');

			$this->db->where('kode_satker', $satker_jatinangor);
			$this->db->delete('suboutput_sas');

			foreach ($sheet as $row) {
				if ($numrow > 1) {

					if ($row['A'] == 2) {
						$cunit++;

						$ket = trim($row['AI']);

						$ex = explode(' ', $ket);
						$satker_biro = $ex[0] . "." . $satker_jatinangor;
						// var_dump($satker_biro);exit();
						$keterangan = substr($ket, 5);

						$unitjatinangor = array();
						array_push($unitjatinangor, array(
							'kode_satker'      => $satker_jatinangor,
							// 'id_c'      => $id_c,
							'id_b'      => $satker_biro,
							'ket'      => $keterangan,
							'tanggal' => $tgl
						));

						$this->db->insert_batch('unit_sas', $unitjatinangor);
					} elseif ($row['A'] == 3) {

						$ket = trim($row['AI']);
						$keterangan = substr($ket, 8);
						// var_dump($keterangan);exit();
						$ex = explode(' ', $ket);
						$id = $ex[0] . "." . $satker_jatinangor;
						$iduntuksuboutput = $ex[0];


						$outputjatinangor = array();
						array_push($outputjatinangor, array(
							'id_b'      => $satker_biro,
							'id_c'      => $id,
							'kode_satker'      => $satker_jatinangor,
							'ket'      => $keterangan
						));
						// print("<pre>".print_r($outputsulsel,true)."</pre>");
						$this->db->insert_batch('output_sas', $outputjatinangor);
					} elseif ($row['A'] == 4) {
						$kettt = trim($row['AI']);
						$keterangan1 = substr($kettt, 4);

						$kode = explode(' ', $kettt);
						$kodesub = $kode[0];


						$makakodesub = $iduntuksuboutput . "." . $kodesub . "." . $satker_jatinangor;

						$suboutjatinangor = array();
						array_push($suboutjatinangor, array(
							'id_b'      => $satker_biro,
							'id_c'      => $id,
							'id_d'      => $makakodesub,
							'kode_satker'      => $satker_jatinangor,
							'ket'      => $keterangan1,
							'pagu' => preg_replace("/[^0-9]/", "", $row['AB']),
							'realisasi' => preg_replace("/[^0-9]/", "", $row['AC']),
							'tanggal' => $tgl
						));
						// print("<pre>".print_r($suboutputsulsel,true)."</pre>");
						$this->db->insert_batch('suboutput_sas', $suboutjatinangor);
					}
				}
				$numrow++;
			}
			// $this->db->truncate('realisasi_kalbar');
			// $this->db->insert_batch('realisasi_kalbar', $data);
			//delete file from server
			unlink(realpath('excel/' . $data_upload['file_name']));

			//upload success
			$log['user'] = $this->session->userdata('nip');
			$log['Ket'] = "UPLOAD REALISASI JATINANGOR";
			$log['tanggal'] = date('Y-m-d H:i:s');
			$this->uploads_model->log($log);

			$this->session->set_flashdata('notifpagu', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
			//redirect halaman
			redirect('uploads/v_sas');
		}
	}


	public function uploadRealisasiJakarta()
	{
				// Load plugin PHPExcel nya
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['jakarta']['name']) && in_array($_FILES['jakarta']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['jakarta']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('jakarta', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_sas"); 
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel  = $reader->load($_FILES['jakarta']['tmp_name']);
			$sheet  = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
			$data = array();
			$numrow = 1;
			$cbiro = 1;
			$cunit = 0;
			$satker_jakarta = 352593;
			$tgl = date('Y-m-d');

			$this->db->where('kode_satker', $satker_jakarta);
			$this->db->delete('unit_sas');

			$this->db->where('kode_satker', $satker_jakarta);
			$this->db->delete('output_sas');


			foreach($sheet as $row){
				if($numrow > 1){
					$ket1 = trim($row['AI']);
					// echo "$ket1<br>";
					$ket = substr($ket1, 9);
					
					$temp = explode(" ", $ket1);

					$regex = '/^[0-9]{4}\.[0-9]{3}$/';
					$regex1 = '/^[0-9]{4}\.[0-9]{3}\.[0-9]{3}$/';
					// var_dump(preg_match($regex, $temp[0]));exit();
					if (preg_match($regex, $temp[0])) {
						$cunit++;
						$satker_biro = explode(".", $temp[0]);

						$id_c = ($cunit<10)?$cbiro."0".$cunit:$cbiro.$cunit;


						$unitjakarta = array();
						array_push($unitjakarta, array(
							'kode_satker'      => $satker_jakarta,
							'id_c'      => $id_c,
							'id_b'      => $satker_biro[0],
							'ket'      => $ket,
							'tanggal' => $tgl
						));
						// exit;
						$this->db->insert_batch('unit_sas', $unitjakarta);


					}elseif((strlen($temp[0]) == 3) && (strpos($temp[0], "00") === 0) && preg_match($regex1, $row['AJ'])){
						$ket1 = trim($row['AI']);
						$ket1 = substr($ket1, 4);
					    // var_dump($ket1);exit();

						$pagu = $row['AB'];
					   // echo "pagunya"."$pagu";
						$realisasi = $row['AC'];
					   // echo "realisasi"."$realisasi";
					   // echo $row['A']."<br>" ;

						$outputjakarta = array();
						array_push($outputjakarta, array(
							'kode_satker' => $satker_jakarta,
							'id_b'      => $satker_biro[0],
							'id_c'      => $id_c,
							'pagu'      => preg_replace("/[^0-9]/", "", $row['AB']),
							'realisasi' => preg_replace("/[^0-9]/", "", $row['AC']),
							'ket'      => $ket1,
							'tanggal' => $tgl
						));
						// exit;
						$this->db->insert_batch('output_sas', $outputjakarta);

					   // $sql2 = "INSERT INTO output_sas values (NULL,".$satker_kalbar.",".$satker_biro[0].",".$id_c.",".preg_replace("/[^0-9]/", "", $row['B']).",".preg_replace("/[^0-9]/", "", $row['C']).",'".$ket1."') ";
					   // echo "$sql2";
					   // echo "<br>";
					   // $this->db->query($sql2);
					}

				}
				$numrow++;
			}
			// $this->db->truncate('realisasi_kalbar');
			// $this->db->insert_batch('realisasi_kalbar', $data);
			//delete file from server
			unlink(realpath('excel/'.$data_upload['file_name']));

			//upload success
			$log['user'] = $this->session->userdata('nip');
			$log['Ket'] = "UPLOAD REALISASI JAKARTA";
			$log['tanggal'] = date('Y-m-d H:i:s');
			$this->uploads_model->log($log);

			$this->session->set_flashdata('jakarta', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
			//redirect halaman
			redirect('uploads/v_sas');
		}
	}

	public function uploadRealisasiSulsel()
	{
		// Load plugin PHPExcel nya
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if (isset($_FILES['sulsel']['name']) && in_array($_FILES['sulsel']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['sulsel']['name']);
			$extension = end($arr_file);

			if ($extension != 'xlsx') {
				$this->session->set_flashdata('notifsulsel', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_sas");
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel  = $reader->load($_FILES['sulsel']['tmp_name']);
			$sheet  = $loadexcel->getActiveSheet()->toArray(null, true, true, true);
			$data = array();
			$numrow = 1;
			$cbiro = 1;
			$cunit = 0;
			$satker_sulsel = 677024;
			$tgl = date('Y-m-d');

			$this->db->where('kode_satker', $satker_sulsel);
			$this->db->delete('unit_sas');

			$this->db->where('kode_satker', $satker_sulsel);
			$this->db->delete('output_sas');

			$this->db->where('kode_satker', $satker_sulsel);
			$this->db->delete('suboutput_sas');

			foreach ($sheet as $row) {
				if ($numrow > 1) {

					if ($row['A'] == 2) {
						$cunit++;

						$ket = trim($row['AI']);

						$ex = explode(' ', $ket);
						$satker_biro = $ex[0] . "." . $satker_sulsel;
						// var_dump($satker_biro);exit();
						$keterangan = substr($ket, 5);

						$unitsulsel = array();
						array_push($unitsulsel, array(
							'kode_satker'      => $satker_sulsel,
							// 'id_c'      => $id_c,
							'id_b'      => $satker_biro,
							'ket'      => $keterangan,
							'tanggal' => $tgl
						));

						$this->db->insert_batch('unit_sas', $unitsulsel);
					} elseif ($row['A'] == 3) {

						$ket = trim($row['AI']);
						$keterangan = substr($ket, 8);
						// var_dump($keterangan);exit();
						$ex = explode(' ', $ket);
						$id = $ex[0] . "." . $satker_sulsel;
						$iduntuksuboutput = $ex[0];


						$outputsulsel = array();
						array_push($outputsulsel, array(
							'id_b'      => $satker_biro,
							'id_c'      => $id,
							'kode_satker'      => $satker_sulsel,
							'ket'      => $keterangan
						));
						// print("<pre>".print_r($outputsulsel,true)."</pre>");
						$this->db->insert_batch('output_sas', $outputsulsel);
					} elseif ($row['A'] == 4) {
						$kettt = trim($row['AI']);
						$keterangan1 = substr($kettt, 4);

						$kode = explode(' ', $kettt);
						$kodesub = $kode[0];


						$makakodesub = $iduntuksuboutput . "." . $kodesub . "." . $satker_sulsel;

						$suboutputsulsel = array();
						array_push($suboutputsulsel, array(
							'id_b'      => $satker_biro,
							'id_c'      => $id,
							'id_d'      => $makakodesub,
							'kode_satker'      => $satker_sulsel,
							'ket'      => $keterangan1,
							'pagu' => preg_replace("/[^0-9]/", "", $row['AB']),
							'realisasi' => preg_replace("/[^0-9]/", "", $row['AC']),
							'tanggal' => $tgl
						));
						// print("<pre>".print_r($suboutputsulsel,true)."</pre>");
						$this->db->insert_batch('suboutput_sas', $suboutputsulsel);
					}
				}
				$numrow++;
			}
			// $this->db->truncate('realisasi_kalbar');
			// $this->db->insert_batch('realisasi_kalbar', $data);
			//delete file from server
			unlink(realpath('excel/' . $data_upload['file_name']));

			//upload success
			$log['user'] = $this->session->userdata('nip');
			$log['Ket'] = "UPLOAD REALISASI SULSEL";
			$log['tanggal'] = date('Y-m-d H:i:s');
			$this->uploads_model->log($log);

			$this->session->set_flashdata('notifsulsel', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
			//redirect halaman
			redirect('uploads/v_sas');
		}
	}





	public function uploadRealisasiKalbar()
	{
				// Load plugin PHPExcel nya
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['kalbar']['name']) && in_array($_FILES['kalbar']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['kalbar']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('kalbar', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_sas"); 
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel  = $reader->load($_FILES['kalbar']['tmp_name']);
			$sheet  = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
			$data = array();
			$numrow = 1;
			$cbiro = 1;
			$cunit = 0;
			$satker_kalbar = 683070;
			$tgl = date('Y-m-d');

			$this->db->where('kode_satker', $satker_kalbar);
			$this->db->delete('unit_sas');

			$this->db->where('kode_satker', $satker_kalbar);
			$this->db->delete('output_sas');


			foreach($sheet as $row){
				if($numrow > 4){
					$ket1 = trim($row['A']);
					// echo "$ket1<br>";
					$ket = substr($ket1, 9);
					// echo "$ket<br>";
					$temp = explode(" ", $ket1);
					$regex = '/^[0-9]{4}\.[0-9]{3}$/';
					// var_dump(preg_match($regex, $temp[0]));exit();
					if (preg_match($regex, $temp[0])) {
						$cunit++;
						$satker_biro = explode(".", $temp[0]);

						$id_c = ($cunit<10)?$cbiro."0".$cunit:$cbiro.$cunit;


						$unitkalbar = array();
						array_push($unitkalbar, array(
							'kode_satker'      => $satker_kalbar,
							'id_c'      => $id_c,
							'id_b'      => $satker_biro[0],
							'ket'      => $ket,
							'tanggal' => $tgl
						));
						// exit;
						$this->db->insert_batch('unit_sas', $unitkalbar);


					}elseif((strlen($temp[0]) == 3) && (strpos($temp[0], "00") === 0)){
						$ket1 = trim($row['A']);
						$ket1 = substr($ket1, 4);
					    // echo "$ket1<br>";

						$pagu = $row['B'];
					   // echo "pagunya"."$pagu";
						$realisasi = $row['C'];
					   // echo "realisasi"."$realisasi";
					   // echo $row['A']."<br>" ;

						$outputkalbar = array();
						array_push($outputkalbar, array(
							'kode_satker' => $satker_kalbar,
							'id_b'      => $satker_biro[0],
							'id_c'      => $id_c,
							'pagu'      => preg_replace("/[^0-9]/", "", $row['B']),
							'realisasi' => preg_replace("/[^0-9]/", "", $row['C']),
							'ket'      => $ket1,
							'tanggal' => $tgl
						));
						// exit;
						$this->db->insert_batch('output_sas', $outputkalbar);

					   // $sql2 = "INSERT INTO output_sas values (NULL,".$satker_kalbar.",".$satker_biro[0].",".$id_c.",".preg_replace("/[^0-9]/", "", $row['B']).",".preg_replace("/[^0-9]/", "", $row['C']).",'".$ket1."') ";
					   // echo "$sql2";
					   // echo "<br>";
					   // $this->db->query($sql2);
					}

				}
				$numrow++;
			}
			// $this->db->truncate('realisasi_kalbar');
			// $this->db->insert_batch('realisasi_kalbar', $data);
			//delete file from server
			unlink(realpath('excel/'.$data_upload['file_name']));

			//upload success
			$log['user'] = $this->session->userdata('nip');
			$log['Ket'] = "UPLOAD REALISASI KALBAR";
			$log['tanggal'] = date('Y-m-d H:i:s');
			$this->uploads_model->log($log);

			$this->session->set_flashdata('notifkalbar', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
			//redirect halaman
			redirect('uploads/v_sas');
		}
	}

	public function uploadRealisasiNTB()
	{
		// Load plugin PHPExcel nya
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if (isset($_FILES['ntb']['name']) && in_array($_FILES['ntb']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['ntb']['name']);
			$extension = end($arr_file);

			if ($extension != 'xlsx') {
				$this->session->set_flashdata('ntb', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_sas");
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel  = $reader->load($_FILES['ntb']['tmp_name']);
			$sheet  = $loadexcel->getActiveSheet()->toArray(null, true, true, true);
			$data = array();
			$numrow = 1;
			$cbiro = 1;
			$cunit = 0;
			$satker_ntb = 683084;
			$tgl = date('Y-m-d');

			$this->db->where('kode_satker', $satker_ntb);
			$this->db->delete('unit_sas');

			$this->db->where('kode_satker', $satker_ntb);
			$this->db->delete('output_sas');

			$this->db->where('kode_satker', $satker_ntb);
			$this->db->delete('suboutput_sas');


			foreach ($sheet as $row) {
				if ($numrow > 1) {

					if ($row['A'] == 2) {
						$cunit++;

						$ket = trim($row['AI']);

						$ex = explode(' ', $ket);
						$satker_biro = $ex[0] . "." . $satker_ntb;
						// var_dump($satker_biro);exit();
						$keterangan = substr($ket, 5);

						$unitntb = array();
						array_push($unitntb, array(
							'kode_satker'      => $satker_ntb,
							// 'id_c'      => $id_c,
							'id_b'      => $satker_biro,
							'ket'      => $keterangan,
							'tanggal' => $tgl
						));

						$this->db->insert_batch('unit_sas', $unitntb);
					} elseif ($row['A'] == 3) {

						$ket = trim($row['AI']);
						$keterangan = substr($ket, 8);
						// var_dump($keterangan);exit();
						$ex = explode(' ', $ket);
						$id = $ex[0];

						$id = $ex[0] . "." . $satker_ntb;
						$iduntuksuboutput = $ex[0];



						$outputntb = array();
						array_push($outputntb, array(
							'id_b'      => $satker_biro,
							'id_c'      => $id,
							'kode_satker'      => $satker_ntb,
							'ket'      => $keterangan
						));
						// print("<pre>".print_r($outputsulsel,true)."</pre>");
						$this->db->insert_batch('output_sas', $outputntb);
					} elseif ($row['A'] == 4) {
						$kettt = trim($row['AI']);
						$keterangan1 = substr($kettt, 4);

						$kode = explode(' ', $kettt);
						$kodesub = $kode[0];

						$makakodesub = $iduntuksuboutput . "." . $kodesub . "." . $satker_ntb;


						$suboutputntb = array();
						array_push($suboutputntb, array(
							'id_b'      => $satker_biro,
							'id_c'      => $id,
							'id_d'      => $makakodesub,
							'kode_satker'      => $satker_ntb,
							'ket'      => $keterangan1,
							'pagu' => preg_replace("/[^0-9]/", "", $row['AB']),
							'realisasi' => preg_replace("/[^0-9]/", "", $row['AC']),
							'tanggal' => $tgl
						));
						// print("<pre>".print_r($suboutputntb,true)."</pre>");
						$this->db->insert_batch('suboutput_sas', $suboutputntb);
					}
				}
				$numrow++;
			}
			// $this->db->truncate('realisasi_ntb');
			// $this->db->insert_batch('realisasi_ntb', $data);
			//delete file from server
			// unlink(realpath('excel/'.$data_upload['file_name']));

			//upload success
			$log['user'] = $this->session->userdata('nip');
			$log['Ket'] = "UPLOAD REALISASI NTB";
			$log['tanggal'] = date('Y-m-d H:i:s');
			$this->uploads_model->log($log);

			$this->session->set_flashdata('notifntb', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
			//redirect halaman
			redirect('uploads/v_sas');
		}
	}

	public function uploadRealisasiPapua()
	{
				// Load plugin PHPExcel nya
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['papua']['name']) && in_array($_FILES['papua']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['papua']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('papua', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_sas"); 
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel  = $reader->load($_FILES['papua']['tmp_name']);
			$sheet  = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
			$data = array();
			$numrow = 1;
			$cbiro = 1;
			$cunit = 0;
			$satker_papua = 683091;
			$tgl = date('Y-m-d');


			$this->db->where('kode_satker', $satker_papua);
			$this->db->delete('unit_sas');

			$this->db->where('kode_satker', $satker_papua);
			$this->db->delete('output_sas');


			foreach($sheet as $row){
				if($numrow > 6){
					$ket1 = trim($row['A']);
					// echo "$ket1<br>";
					$ket = substr($ket1, 9);
					$temp = explode(" ", $ket1);
					$regex = '/^[0-9]{4}\.[0-9]{3}$/';
					if (preg_match($regex, $temp[0])) {
						$cunit++;
						$satker_biro = explode(".", $temp[0]);

						$id_c = ($cunit<10)?$cbiro."0".$cunit:$cbiro.$cunit;
						$unitpapua = array();
						array_push($unitpapua, array(
							'kode_satker'      => $satker_papua,
							'id_c'      => $id_c,
							'id_b'      => $satker_biro[0],
							'ket'      => $ket,
							'tanggal' => $tgl
						));
						// exit;
						$this->db->insert_batch('unit_sas', $unitpapua);
						// $sql1 = "INSERT INTO unit_sas values (".$satker_papua.",".$id_c.",".$satker_biro[0].",'".$ket."')";
						// echo "$sql1";
						// echo "<br>";
						// $this->db->query($sql1);

					}elseif((strlen($temp[0]) == 3) && (strpos($temp[0], "00") === 0)){
						$ket1 = trim($row['A']);
						$ket1 = substr($ket1, 4);
					   // echo "$ket1<br>";

						$pagu = $row['B'];
					   // echo "pagunya"."$pagu";
						$realisasi = $row['C'];
						$outputpapua = array();
						array_push($outputpapua, array(
							'kode_satker' => $satker_papua,
							'id_b'      => $satker_biro[0],
							'id_c'      => $id_c,
							'pagu'      => preg_replace("/[^0-9]/", "", $row['B']),
							'realisasi' => preg_replace("/[^0-9]/", "", $row['C']),
							'ket'      => $ket1,
							'tanggal' => $tgl
						));
						// exit;
						$this->db->insert_batch('output_sas', $outputpapua);
					   // $sql2 = "INSERT INTO output_sas values (NULL,".$satker_papua.",".$satker_biro[0].",".$id_c.",".preg_replace("/[^0-9]/", "", $row['B']).",".preg_replace("/[^0-9]/", "", $row['C']).",'".$ket1."') ";
					   // echo "$sql2";
					   // echo "<br>";
					   // $this->db->query($sql2);
					}

				}
				$numrow++;
			}
			// $this->db->truncate('realisasi_papua');
			// $this->db->insert_batch('realisasi_papua', $data);


			//delete file from server
			// unlink(realpath('excel/'.$data_upload['file_name']));

			//upload success
			$log['user'] = $this->session->userdata('nip');
			$log['Ket'] = "UPLOAD REALISASI PAPUA";
			$log['tanggal'] = date('Y-m-d H:i:s');
			$this->uploads_model->log($log);

			$this->session->set_flashdata('notifpapua', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
			//redirect halaman
			redirect('uploads/v_sas');
		}
	}

	public function uploadRealisasiSulut()
	{
				// Load plugin PHPExcel nya
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['sulut']['name']) && in_array($_FILES['sulut']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['sulut']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('sulut', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_sas"); 
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel  = $reader->load($_FILES['sulut']['tmp_name']);
			$sheet  = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
			$data = array();
			$numrow = 1;
			$cbiro = 1;
			$cunit = 0;
			$satker_sulut = 677010;
			$tgl = date('Y-m-d');


			$this->db->where('kode_satker', $satker_sulut);
			$this->db->delete('unit_sas');

			$this->db->where('kode_satker', $satker_sulut);
			$this->db->delete('output_sas');


			foreach($sheet as $row){
				if($numrow > 1){
					$ket1 = trim($row['A']);
					// echo "$ket1<br>";
					$ket = substr($ket1, 9);
					$temp = explode(" ", $ket1);
					$regex = '/^[0-9]{4}\.[0-9]{3}$/';
					if (preg_match($regex, $temp[0])) {
						$cunit++;
						$satker_biro = explode(".", $temp[0]);


						$id_c = ($cunit<10)?$cbiro."0".$cunit:$cbiro.$cunit;
						$unitsulut = array();
						array_push($unitsulut, array(
							'kode_satker'  => $satker_sulut,
							'id_c'      => $id_c,
							'id_b'      => $satker_biro[0],
							'ket'      => $ket,
							'tanggal' => $tgl
						));
						// exit;
						$this->db->insert_batch('unit_sas', $unitsulut);
					// $sql1 = "INSERT INTO unit_sas values (".$satker_sulut.",".$id_c.",".$satker_biro[0].",'".$ket."')";
					// echo "$sql1";
					// echo "<br>";
					// $this->db->query($sql1);

					}elseif((strlen($temp[0]) == 3) && (strpos($temp[0], "00") === 0)){
						$ket1 = trim($row['A']);
						$ket1 = substr($ket1, 4);
					   // echo "$ket1<br>";

						$pagu = $row['B'];
					   // echo "pagunya"."$pagu";
						$realisasi = $row['C'];
						$outputsulut = array();
						array_push($outputsulut, array(
							'kode_satker' => $satker_sulut,
							'id_b'      => $satker_biro[0],
							'id_c'      => $id_c,
							'pagu'      => preg_replace("/[^0-9]/", "", $row['B']),
							'realisasi' => preg_replace("/[^0-9]/", "", $row['C']),
							'ket'      => $ket1,
							'tanggal' => $tgl
						));
						// exit;
						$this->db->insert_batch('output_sas', $outputsulut);
				 // $sql2 = "INSERT INTO output_sas values (NULL,".$satker_sulut.",".$satker_biro[0].",".$id_c.",".preg_replace("/[^0-9]/", "", $row['B']).",".preg_replace("/[^0-9]/", "", $row['C']).",'".$ket1."') ";
				 // echo "$sql2";
				 // echo "<br>";
				 // $this->db->query($sql2);
					}
				}
				$numrow++;
			}
			// $this->db->truncate('realisasi_sulut');
			// $this->db->insert_batch('realisasi_sulut', $data);
			//delete file from server
			// unlink(realpath('excel/'.$data_upload['file_name']));

			//upload success
			$log['user'] = $this->session->userdata('nip');
			$log['Ket'] = "UPLOAD REALISASI SULUT";
			$log['tanggal'] = date('Y-m-d H:i:s');
			$this->uploads_model->log($log);

			$this->session->set_flashdata('notifsulut', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
			//redirect halaman
			redirect('uploads/v_sas');
		}
	}

	public function uploadRealisasiSumbar()
	{
				// Load plugin PHPExcel nya
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['sumbar']['name']) && in_array($_FILES['sumbar']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['sumbar']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('sumbar', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_sas"); 
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel  = $reader->load($_FILES['sumbar']['tmp_name']);
			$sheet  = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
			$data = array();
			$numrow = 1;
			$cbiro = 1;
			$cunit = 0;
			$satker_sumbar = 677045;
			$tgl = date('Y-m-d');

			$this->db->where('kode_satker', $satker_sumbar);
			$this->db->delete('unit_sas');

			$this->db->where('kode_satker', $satker_sumbar);
			$this->db->delete('output_sas');
			foreach($sheet as $row){
				if($numrow > 1){
					$ket1 = trim($row['A']);
					// echo "$ket1<br>";
					$ket = substr($ket1, 9);
					$temp = explode(" ", $ket1);
					$regex = '/^[0-9]{4}\.[0-9]{3}$/';
					if (preg_match($regex, $temp[0])) {
						$cunit++;
						$satker_biro = explode(".", $temp[0]);

						$id_c = ($cunit<10)?$cbiro."0".$cunit:$cbiro.$cunit;
						$unitsumbar = array();
						array_push($unitsumbar, array(
							'kode_satker'  => $satker_sumbar,
							'id_c'      => $id_c,
							'id_b'      => $satker_biro[0],
							'ket'      => $ket,
							'tanggal' => $tgl
						));
						// exit;
						$this->db->insert_batch('unit_sas', $unitsumbar);

						// $sql1 = "INSERT INTO unit_sas values (".$satker_sumbar.",".$id_c.",".$satker_biro[0].",'".$ket."')";
						// echo "$sql1";
						// echo "<br>";
						// $this->db->query($sql1);

						// echo $id_c;
					}elseif((strlen($temp[0]) == 3) && (strpos($temp[0], "00") === 0)){
						$ket1 = trim($row['A']);
						$ket1 = substr($ket1, 4);
					   // echo "$ket1<br>";

						$pagu = $row['B'];
					   // echo "pagunya"."$pagu";
						$realisasi = $row['C'];
						$outputsumbar = array();
						array_push($outputsumbar, array(
							'kode_satker' => $satker_sumbar,
							'id_b'      => $satker_biro[0],
							'id_c'      => $id_c,
							'pagu'      => preg_replace("/[^0-9]/", "", $row['B']),
							'realisasi' => preg_replace("/[^0-9]/", "", $row['C']),
							'ket'      => $ket1,
							'tanggal' => $tgl
						));
						// exit;
						$this->db->insert_batch('output_sas', $outputsumbar);
					   // $sql2 = "INSERT INTO output_sas values (NULL,".$satker_sumbar.",".$satker_biro[0].",".$id_c.",".preg_replace("/[^0-9]/", "", $row['B']).",".preg_replace("/[^0-9]/", "", $row['C']).",'".$ket1."') ";
					   // echo "$sql2";
					   // echo "<br>";
					   // $this->db->query($sql2);
					}

				}
				$numrow++;
			}
			// $this->db->truncate('realisasi_sumbar');
			// $this->db->insert_batch('realisasi_sumbar', $data);

			//delete file from server
			// unlink(realpath('excel/'.$data_upload['file_name']));

			//upload success
			$log['user'] = $this->session->userdata('nip');
			$log['Ket'] = "UPLOAD REALISASI SUMBAR";
			$log['tanggal'] = date('Y-m-d H:i:s');
			$this->uploads_model->log($log);

			$this->session->set_flashdata('notifsumbar', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
			//redirect halaman
			redirect('uploads/v_sas');
		}
	}

	public function praja()
	{
		// Load plugin PHPExcel nya
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');


		if(isset($_FILES['praja']['name']) && in_array($_FILES['praja']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['praja']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('praja', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_praja"); 
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel  = $reader->load($_FILES['praja']['tmp_name']);
			$sheet  = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
			$namasheet = $loadexcel->getSheetNames();

			$data = array();
			$unitpraja = array();
			$unitortu = array();
			$unitwali = array();
			$numrow = 1;
			$stat = 'aktif';
			$penempatan = 'IPDN Kampus Jatinangor';
			// $date = STR_TO_DATE($row['AY'], '%d.%m.%y');

			$stop = false;
			$num = 1;
			$nullcc = 0;
			$biaya_masuk = 0;
			while(!$stop) {
				$row = $sheet[$num++];
				// var_dump($round(val)w);exit();
				if ($row['B'] == NULL) {
					$nullcc++;
					if ($nullcc == 4) {
						$stop = true;    
					}
				} elseif (strlen($row['C']) == 1){
					$nullcc = 0;
					$angkatan = 31;
					$kurangtahun = 2020 - $row['BA'];
					$hasil = 0;

					$bb = explode(".", $row['F']);
					$cc = $bb[0];

					if ($row['BA'] == 2020)  {
						$hasil = $angkatan;
					}elseif($row['BA'] < 2020 || $row['BA'] > 2020 ){
						$hasil= $angkatan-$kurangtahun;
					}

					// array_push($unitpraja, array(
					// 	'no_spcp'      => $row['A'],
					// 	'nama'      => $row['B'],
					// 	'jk'      => $row['C'],
					// 	'nisn'      => $row['D'],
					// 	'npwp'      => $row['E'],
					// 	'npp'      => $row['F'],
					// 	'nik_praja'      => $row['G'],
					// 	'tmpt_lahir'      => $row['H'],
					// 	'tgl_lahir'      =>  date("Y-m-d", strtotime($row['I'])),
					// 	'agama'      => $this->agamaa($row['J']),
					// 	'alamat'      => $row['K'],
					// 	'rt'      => $row['L'],
					// 	'rw'      => $row['M'],
					// 	'nama_dusun'      => $row['N'],
					// 	'kelurahan'      => $row['O'],
					// 	'kecamatan'      => $row['P'],
					// 	'kode_pos'      =>$row['Q'],
					// 	'kab_kota'      => $row['R'],
					// 	'provinsi'      => $row['S'],
					// 	'jenis_tinggal'      => $row['T'],
					// 	'alat_transport'      => $row['U'],
					// 	'tlp_rumah'      => $row['V'],
					// 	'tlp_pribadi'      => $row['W'],
					// 	'email'      => $row['X'],
					// 	'kewarganegaraan'      => $row['AM'],
					// 	'penerima_pks'      => $row['AN'],
					// 	'no_pks'      => $row['AO'],
					// 	'prodi'      => $row['AW'],
					// 	'fakultas'      => $row['AX'],
					// 	'jenis_pendaftaran'      =>  $row['AY'],
					// 	// 'tgl_masuk_kuliah'      =>  date("Y-m-d", strtotime($row['AZ'])),
					// 	'tgl_masuk_kuliah'      =>  $row['AZ'],
					// 	'tahun_masuk_kuliah'      => $row['BA'],
					// 	'pembiayaan'      => $row['BB'],
					// 	'jalur_masuk'      => $row['BC'],
					// 	'status' => $stat,
					// 	'tingkat' => 2020-$row['BA']+1,
					// 	'angkatan' => $cc,
					// 	'mulai_semester' => $row['BD']
					// ));

					// array_push($unitortu, array(
					// 	'npp'      => $row['F'],
					// 	'nama'      => $row['B'],
					// 	'nik_ayah'      => $row['Y'],
					// 	'nama_ayah'      => $row['Z'],
					// 	'tgllahir_ayah'      => $row['AA'],
					// 	'pendidikan_ayah'      => $row['AB'],
					// 	'pekerjaan_ayah'      => $row['AC'],
					// 	'penghasilan_ayah'      => $row['AD'],
					// 	'tlp_ayah'      => $row['AE'],
					// 	'nik_ibu'      => $row['AF'],
					// 	'nama_ibu'      => $row['AG'],
					// 	'tgllahir_ibu'      => $row['AH'],
					// 	'pendidikan_ibu'      =>$row['AI'],
					// 	'pekerjaan_ibu'      => $row['AJ'],
					// 	'penghasilan_ibu'      => $row['AK'],
					// 	'tlp_ibu'      => $row['AL']

					// ));


					// array_push($unitwali, array(
					// 	'npp'      => $row['F'],
					// 	'nama'      => $row['B'],
					// 	'nik_wali'      => $row['AP'],
					// 	'nama_wali'      => $row['AQ'],
					// 	'tgllahir_wali'      => $row['AR'],
					// 	'pendidikan_wali'      => $row['AS'],
					// 	'pekerjaan_wali'      => $row['AT'],
					// 	'penghasilan_wali'      => $row['AU'],
					// 	'tlp_wali'      => $row['AV']

					// ));



					array_push($unitpraja, array(
						'no_spcp'      => $row['A'],
						'nama'      => $row['B'],
						'jk'      => $row['C'],
						'nisn'      => $row['D'],
						'npwp'      => $row['E'],
						'npp'      => $row['F'],
						'nik_praja'      => $row['G'],
						'tmpt_lahir'      => $row['H'],
						'tgl_lahir'      =>  date("Y-m-d", strtotime($row['I'])),
						'agama'      => $this->agamaa($row['J']),
						'alamat'      => $row['K'],
						'rt'      => $row['L'],
						'rw'      => $row['M'],
						'nama_dusun'      => $row['N'],
						'kelurahan'      => $row['O'],
						'kecamatan'      => $row['P'],
						'kode_pos'      =>$row['Q'],
						'kab_kota'      => $row['R'],
						'provinsi'      => $row['S'],
						'jenis_tinggal'      => $this->jenistinggal($row['T']),
						'alat_transport'      => $this->alat($row['U']),
						'tlp_rumah'      => $row['V'],
						'tlp_pribadi'      => $row['W'],
						'email'      => $row['X'],
						'kewarganegaraan'      => $this->negara($row['AM']),
						'penerima_pks'      => $row['AN'],
						'no_pks'      => $row['AO'],
						'prodi'      => $this->prodi($row['AW']),
						'fakultas'      => $row['AX'],
						'jenis_pendaftaran'      =>  $this->jenispend($row['AY']),
						'tgl_masuk_kuliah'      =>  date("Y-m-d", strtotime($row['AZ'])),
						// 'tgl_masuk_kuliah'      =>  $row['AZ'],
						'tahun_masuk_kuliah'      => $row['BA'],
						'pembiayaan'      => $this->jenispembiayaan($row['BB']),
						'jalur_masuk'      => $this->jalurmasuk($row['BC']),
						'status' => $stat,
						'tingkat' => 2020-$row['BA']+1,
						'angkatan' => $cc,
						'mulai_semester' => $this->semesterr($row['BD']),
						'biaya_masuk' => $biaya_masuk,
						'nik_ayah'      => $row['Y'],
						'nama_ayah'      => $row['Z'],
						'tgllahir_ayah'      => $row['AA'],
						'pendidikan_ayah'      => $this->pendidik($row['AB']),
						'pekerjaan_ayah'      => $this->pekerja($row['AC']),
						'penghasilan_ayah'      => $this->penghasil($row['AD']),
						'tlp_ayah'      => $row['AE'],
						'nik_ibu'      => $row['AF'],
						'nama_ibu'      => $row['AG'],
						'tgllahir_ibu'      => $row['AH'],
						'pendidikan_ibu'      =>$this->pendidik($row['AI']),
						'pekerjaan_ibu'      => $this->pekerja($row['AJ']),
						'penghasilan_ibu'      => $this->penghasil($row['AK']),
						'tlp_ibu'      => $row['AL'],
						'nik_wali'      => $row['AP'],
						'nama_wali'      => $row['AQ'],
						'tgllahir_wali'      => $row['AR'],
						'pendidikan_wali'      => $row['AS'],
						'pekerjaan_wali'      => $this->pekerja($row['AT']),
						'penghasilan_wali'      => $this->penghasil($row['AU']),
						'tlp_wali'      => $row['AV'],
						'penempatan' => $penempatan

					));
					// var_dump( date("Y-m-d", strtotime($row['I'])));exit();


					// array_push($unitortu, array(
					// 	'npp'      => $row['F'],
					// 	'nama'      => $row['B'],
					// 	'nik_ayah'      => $row['Y'],
					// 	'nama_ayah'      => $row['Z'],
					// 	'tgllahir_ayah'      => $row['AA'],
					// 	'pendidikan_ayah'      => $this->pendidik($row['AB']),
					// 	'pekerjaan_ayah'      => $this->pekerja($row['AC']),
					// 	'penghasilan_ayah'      => $this->penghasil($row['AD']),
					// 	'tlp_ayah'      => $row['AE'],
					// 	'nik_ibu'      => $row['AF'],
					// 	'nama_ibu'      => $row['AG'],
					// 	'tgllahir_ibu'      => $row['AH'],
					// 	'pendidikan_ibu'      =>$this->pendidik($row['AI']),
					// 	'pekerjaan_ibu'      => $this->pekerja($row['AJ']),
					// 	'penghasilan_ibu'      => $this->penghasil($row['AK']),
					// 	'tlp_ibu'      => $row['AL']

					// ));


					// array_push($unitwali, array(
					// 	'npp'      => $row['F'],
					// 	'nama'      => $row['B'],
					// 	'nik_wali'      => $row['AP'],
					// 	'nama_wali'      => $row['AQ'],
					// 	'tgllahir_wali'      => $row['AR'],
					// 	'pendidikan_wali'      => $row['AS'],
					// 	'pekerjaan_wali'      => $this->pekerja($row['AT']),
					// 	'penghasilan_wali'      => $this->penghasil($row['AU']),
					// 	'tlp_wali'      => $row['AV']

					// ));

				}

			}

			// print("<pre>".print_r($unitpraja,true)."</pre>");
			// exit();
			// var_dump($unitpraja);exit();
			// $this->db->truncate('praja');
			$this->db->insert_batch('praja_baru', $unitpraja);
			// // $this->db->truncate('orangtua');
			// $this->db->insert_batch('orangtua', $unitortu);
			// // $this->db->truncate('wali');
			// $this->db->insert_batch('wali', $unitwali);
			// delete file from server
			// unlink(realpath('excel/'.$data_upload['file_name']));

			//upload success
			$log['user'] = $this->session->userdata('nip');
			$log['Ket'] = "UPLOAD PRAJA";
			$log['tanggal'] = date('Y-m-d H:i:s');
			$this->uploads_model->log($log);

			$this->session->set_flashdata('praja', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
			//redirect halaman
			redirect('uploads/v_praja');
		}
	}


	public function prajabaru()
	{
				// Load plugin PHPExcel nya
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

		if(isset($_FILES['prajabaru']['name']) && in_array($_FILES['prajabaru']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['prajabaru']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('prajabaru', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_praja"); 
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel  = $reader->load($_FILES['prajabaru']['tmp_name']);

			$namasheet = $loadexcel->getSheetNames();

			// var_dump($sheetData);
			// $i = 28;
			$unitpraja = array();
			$unitortu = array();
			$unitwali = array();
			$stat = 'aktif';

			foreach($namasheet as $shit){

				if (($shit == "Angkatan 28") || ($shit == "Angkatan 29") || ($shit == "Angkatan 30")) {
					$sheetData = $loadexcel->getSheetByName($shit)->toArray(null, true, true ,true);
					$numrow =  1;

					$bb = explode(" ", $shit);
					$cc = $bb[1];
					// echo "$cc";

					$stop = false;
					$num = 1;
					$nullcc = 0;
					while(!$stop) {
						$row = $sheetData[$num++];
						if ($row['C'] == NULL && $numrow > 7) {
							$nullcc++;
							if ($nullcc == 3) {
								$stop = true;    
							}
						} else {

							$nullcc = 0;
							$angka = 'XXX';
							$jadi =1;
							if($numrow > 7){
								if ($row['AC'] != "") {
									$angka = $row['AC'];

								}
								$angka = $this->rti($angka);
								$jadi = date('y') +12 - $angka;
							// echo "$jadi";
								array_push($unitpraja, array(
									'nama'      => $row['C'],
									'tmpt_lahir'      => $row['D'],
									'tgl_lahir'      => date("Y-m-d", strtotime($row['E'])),
									'jk'      => $row['F'],
									'provinsi'      => $row['H'],
									'kab_kota'      => $row['J'],
									'agama'      => $row['K'],		
									'nik_praja'      => $row['N'],
									'alamat'      => $row['S'],
									'kelurahan'      => $row['T'],
									'kecamatan'      => $row['U'],
									'tingkat' => $jadi,
									'angkatan' => $cc,
									'status'=>$stat

								));

								array_push($unitortu, array(
									'nik_praja'      => $row['N'],
									'nama'      => $row['C'],
									'nama_ayah'      => $row['O'],
									'pekerjaan_ayah'      => $row['P'],
									'nama_ibu'      => $row['Q'],
									'pekerjaan_ibu'      => $row['R']

								));

								array_push($unitwali, array(
									'nik_praja'      => $row['N'],
									'nama'      => $row['C'],
								));

							}
							$numrow++;
						}
					}
				}

			}

			// print("<pre>".print_r($unitwali,true)."</pre>");
			// exit();
			$this->db->insert_batch('praja', $unitpraja);
			$this->db->insert_batch('orangtua', $unitortu);
			$this->db->insert_batch('wali', $unitwali);
					//upload success
			$log['user'] = $this->session->userdata('nip');
			$log['Ket'] = "UPLOAD FUNCTION PRAJA BARU";
			$log['tanggal'] = date('Y-m-d H:i:s');
			$this->uploads_model->log($log);

			$this->session->set_flashdata('prajabaru', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
			//redirect halaman
			redirect('uploads/v_praja');

		}
	}



	public function thl()
	{
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['thl']['name']) && in_array($_FILES['thl']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['thl']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('thl','<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>'); 
				redirect('uploads/v_thl'); 
			}
			else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel  = $reader->load($_FILES['thl']['tmp_name']);
			$excel = $loadexcel->getSheetByName('Sheet1');
			$rowCount = $excel->getHighestDataRow();
			$saveData   = array();
			$saveData2   = array();

			$dataterakhir = 0;

			// $cek_data = $this->uploads_model->cek_dataakhir();
			// var_dump($cek_data);exit();

			// if($cek_data != NULL){
			// 	$dataterakhir = $cek_data[0]->id_thl;  
			// 	// $dataterakhir = $cek_data->username;
		 //        var_dump($dataterakhir);exit();
			// 	// $datakahirnya = substr($dataterakhir, 9);
			// 	// var_dump($datakahirnya);exit();   
			// }else{
			// 	$dataterakhir = 0;
			// }

			for ($i=7; $i<=$rowCount; $i++){
				$nama = $excel->getCellByColumnAndRow(2, $i)->getValue();
				$ttl = $excel->getCellByColumnAndRow(3, $i)->getValue();
				$ttl2 = explode(',', $ttl);
				$tempat_lahir = $ttl2[0];
				$tanggal_lahir = date_create($ttl2[1]);
				$tanggal_lahir = date_format($tanggal_lahir, "Y-m-d");
				$dik =  $excel->getCellByColumnAndRow(4, $i)->getValue();
				$penugasan =  $excel->getCellByColumnAndRow(5, $i)->getValue();
				$satker =  $excel->getCellByColumnAndRow(6, $i)->getValue();

				$date = $tanggal_lahir;
				$result = date('dmY', strtotime($date));

				$dataterakhir++;
				$username = $result.$dataterakhir;
				// var_dump($dataterakhir);


				$data = array(
					'nama' => $nama,
					'tempat_lahir' => $tempat_lahir,
					'username' => $username,
					'tanggal_lahir' => $tanggal_lahir,
					'dik' => $dik,
					'penugasan' => $penugasan,
					'nama_satker' => $satker
				);
				array_push($saveData, $data);

				$data2 = array(
					'nama' => $nama,
					'username' => $username,
					'password' => md5('123456'),
					'level' => 'Karyawan',
					'penugasan' =>  $penugasan
				);
				array_push($saveData2, $data2);
			}

			print("<pre>".print_r($data2,true)."</pre>");
			$this->db->insert_batch('tbl_thl', $saveData);
			$this->db->insert_batch('tbl_users_presensi', $saveData2);

			$log['user'] = $this->session->userdata('nip');
			$log['Ket'] = "UPLOAD THL";
			$log['tanggal'] = date('Y-m-d H:i:s');
			$this->uploads_model->log($log);

			$this->session->set_flashdata('thl',"<b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!"); 
			redirect('uploads/v_thl'); 
		}
	}


	public function pns() {

		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['pns']['name']) && in_array($_FILES['pns']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['pns']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('pns', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_pns"); 
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel = $reader->load($_FILES['pns']['tmp_name']);

			$shit = $loadexcel->getActiveSheet();

			$data = $pelatihan = array();
			$rows = $shit->toArray(null, true, true ,true);
			$stop = false;
			$pegawai = 1; // jumlah pegawai per bagian
			$det_peg = 0; // tanda buat ambil detail pegawai
			$bagian = "";
			$no = $cc = $newDate = 0;

			// create variable global
			$nip = $nama_lengkap = $bagian = $tempat_lahir = $tanggal_lahir = $no_urut_pangkat = $pangkat = $gol_ruang = $tmt_pangkat = $jabatan = $tmt_jabatan = $jurusan = $nama_pt = $tahun_lulus = $tingkat_pendidikan = $usia = $masa_kerja = $catatan_mutasi = $no_kapreg = $eselon = $nama_pelatihan = $tanggal_pelatihan = $jumlah_jam = "";

			foreach ($rows as $row) {
				$cc++;

				if ($cc < 5) {
					// ngambil tanggal dari file
					if (strpos(strtolower($row['A']), 'keadaan') === 0) {
						$tgl = explode(": ", $row['A']);
						$tgl_last = count($tgl)-1;
						$tgl = $this->ite($tgl[$tgl_last]);
						$newDate = date("Y-m-d", strtotime($tgl));
					}
				} elseif (strlen($row['A']) > 6 && $cc > 5) {
					// ketemu bagian
					$bagian = $row['A'];
					$pegawai = 0;

				} elseif ($bagian != "") {
					// nemu pegawai baru
					if (is_numeric($row['A'])) {
						$det_peg = 0;
						$pegawai++;
						$no++;
					}
					$det_peg++;
					switch ($det_peg) {
						case 1:
							// baris pertama
						$nama_lengkap = $row['B'];
						$no_urut_pangkat = $row['C'];
							// $pangkat_t = preg_split('/\(([^"]+)\)/', $row['D']);
						$pangkat_t = preg_split('/( \(|\))/', $row['D']);
						$pangkat = trim($pangkat_t[0]);
							# preg_match('/\(([^"]+)\)/', $row['D'], $gol_t);
						$gol_ruang = trim($pangkat_t[1]);
						$jabatan = $row['E'];
						$tmt_jabatan = date("Y-m-d", strtotime($row['F']));
						$jurusan = $row['L'];
						$nama_pt = $row['M'];
						$tahun_lulus = $row['N'];
						$tingkat_pendidikan = $row['O'];
						$usia = $row['P'];
						$catatan_mutasi = $row['Q'];
						$no_kapreg = preg_replace('/[ ,.]/', "", $row['R']);

						if ($row['H'] != "") {
							$nama_pelatihan = $row['H'];
							$tanggal_pelatihan = $row['I'];
							$jumlah_jam = $row['J'];
						}

						break;
						case 2:
							// baris kedua
						$nip = str_replace(" ", "", $row['B']);
						$tmt_pangkat = date("Y-m-d", strtotime($row['D']));

						if ($row['E'] != NULL) {
							preg_match('/\(([^"]+)\)/', $row['E'], $es_t);
							$eselon = $es_t[1];
						}

						$masa_kerja = $row['P'];

						if ($nama_pelatihan != "") {
							array_push($pelatihan, array(
								'nip' => $nip,
								'nama_pelatihan' => $nama_pelatihan,
								'tanggal_pelatihan' => $tanggal_pelatihan,
								'jumlah_jam'=> $jumlah_jam
							));
						}

						if ($row['H'] != "") {
							$nama_pelatihan = $row['H'];
							$tanggal_pelatihan = $row['I'];
							$jumlah_jam = $row['J'];
							array_push($pelatihan, array(
								'nip' => $nip,
								'nama_pelatihan' => $nama_pelatihan,
								'tanggal_pelatihan' => $tanggal_pelatihan,
								'jumlah_jam'=> $jumlah_jam
							));
						}							

						break;
						case 3:
							// baris ketiga
						$ttl = explode(",", $row['B']);
						switch (count($ttl)) {
							case 1:
							$tempat_lahir = "";
							$tanggal_lahir = date("Y-m-d", strtotime($row['B']));
							break;
							case 2:
							$tempat_lahir = strtoupper(trim($ttl[0]));
							$tgl_t = explode("/", trim($ttl[1]));
							$tanggal_lahir = date("Y-m-d", strtotime("$tgl_t[1]/$tgl_t[0]/$tgl_t[2]"));
							break;
							case 3:
							$tempat_lahir = strtoupper(trim($ttl[0]).", ".trim($ttl[1]));
							$tgl_t = explode("/", trim($ttl[2]));
							$tanggal_lahir = date("Y-m-d", strtotime("$tgl_t[1]/$tgl_t[0]/$tgl_t[2]"));
							break;
						}

						array_push($data, array(
							'nip' => $nip,
							'nama_lengkap' => $nama_lengkap,
							'bagian' => $bagian,
							'tempat_lahir' => $tempat_lahir,
							'tanggal_lahir' => $tanggal_lahir,
							'no_urut_pangkat' => $no_urut_pangkat,
							'pangkat' => $pangkat,
							'gol_ruang' => $gol_ruang,
							'tmt_pangkat' => $tmt_pangkat,
							'jabatan' => $jabatan,
							'tmt_jabatan' => $tmt_jabatan,
							'jurusan' => $jurusan,
							'nama_pt' => $nama_pt,
							'tahun_lulus' => $tahun_lulus,
							'tingkat_pendidikan' => $tingkat_pendidikan,
							'usia' => $usia,
							'masa_kerja' => $masa_kerja,
							'catatan_mutasi' => $catatan_mutasi,
							'no_kapreg' => $no_kapreg,
							'eselon' => $eselon
						));

						if ($row['H'] != "") {
							$nama_pelatihan = $row['H'];
							$tanggal_pelatihan = $row['I'];
							$jumlah_jam = $row['J'];
							array_push($pelatihan, array(
								'nip'				=> $nip,
								'nama_pelatihan'	=> $nama_pelatihan,
								'tanggal_pelatihan'	=> $tanggal_pelatihan,
								'jumlah_jam'		=> $jumlah_jam
							));
						}

							// set variable
						$nip = $nama_lengkap = $tempat_lahir = $tanggal_lahir = $no_urut_pangkat = $pangkat = $gol_ruang = $tmt_pangkat = $jabatan = $tmt_jabatan = $jurusan = $nama_pt = $tahun_lulus = $tingkat_pendidikan = $usia = $masa_kerja = $catatan_mutasi = $no_kapreg = $eselon = $nama_pelatihan = $tanggal_pelatihan = $jumlah_jam = "";

						break;
					}				
				}
			}

			// print("<pre>".print_r($data,true)."</pre>");
			// print("<pre>".print_r($pelatihan,true)."</pre>");
			// exit;
		}

		//upload success
		$this->db->insert_batch('tbl_pns', $data);
		$this->db->insert_batch('tbl_pelatihan', $pelatihan);
		
		$log['user'] = $this->session->userdata('nip');
		$log['Ket'] = "UPLOAD PNS";
		$log['tanggal'] = date('Y-m-d H:i:s');
		$this->uploads_model->log($log);

		$this->session->set_flashdata('pns', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b><br>Data '.$_FILES['pns']['name'].' berhasil diimport!</div>');
			//redirect halaman
		redirect("uploads/v_pns");

	}

	public function pns2()
	{       
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['pns']['name']) && in_array($_FILES['pns']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['pns']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('pns','<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>'); 
				redirect('uploads/v_pns'); 
			}
			else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel  = $reader->load($_FILES['pns']['tmp_name']);

			$excel = $loadexcel->getActiveSheet();
			$rowCount = $excel->getHighestDataRow();
			$saveData  = array();
			$savedDataTrain = array();
			$lineLimitNo = array();
			for ($i=9; $i <=$rowCount; $i++) { 
				$cellA = $excel->getCellByColumnAndRow(1, $i);
				$limitA = $i+2;
				if($cellA->isInMergeRange() || $cellA->isMergeRangeValueCell()) {
					if($cellA->getMergeRange() == "A$i:A$limitA") {
						$colNo = $cellA->getMergeRange();
						$limitNo = explode("A", $colNo);
						$limitNo = $limitNo[1];
						$limitNo = explode(":", $limitNo);
						$limitNo = $limitNo[0];
						array_push($lineLimitNo, $limitNo);
					}
				}
			}
			$keepBagian = array();
			foreach ($lineLimitNo as $col) {
				$lineBagian = $col - 1;
				$rowBagian = $excel->getCellByColumnAndRow(1, $lineBagian);
				if($rowBagian->getMergeRange() != "A$lineBagian:R$lineBagian") {
					$bagian = array_pop($keepBagian);
				}
				else {
					$bagian = $excel->getCellByColumnAndRow(1, $lineBagian)->getValue();
				}            
				$no = $excel->getCellByColumnAndRow(1, $col)->getValue();
				$nip = $excel->getCellByColumnAndRow(2, $col+1)->getValue();
				$nip = str_replace(' ', '', $nip);
				$nama_lengkap = $excel->getCellByColumnAndRow(2, $col)->getValue();
				$ttl = $excel->getCellByColumnAndRow(2, $col+2)->getValue();
				$ttl = explode(', ', $ttl);
				$tempat_lahir = $ttl[0];
				$tanggal_lahir = explode('/', $ttl[1]);
				$tanggal_lahir = date_create("$tanggal_lahir[1]/$tanggal_lahir[0]/$tanggal_lahir[2]");
				$tanggal_lahir = date_format($tanggal_lahir, "Y-m-d");
				$no_urut_pangkat = $excel->getCellByColumnAndRow(3, $col)->getValue();
				$pangkat_gol = $excel->getCellByColumnAndRow(4, $col)->getValue();
				$pangkat_gol = explode("(", $pangkat_gol);
				$pangkat = $pangkat_gol[0];
				$gol_ruang = trim($pangkat_gol[1], ")");
				$tmt_pangkat = $excel->getCellByColumnAndRow(4, $col+1)->getValue();
				$tmt_pangkat = Date::excelToDateTimeObject($tmt_pangkat)->format('Y-m-d');
				$jabatan = $excel->getCellByColumnAndRow(5, $col)->getValue();
				$eselon = $excel->getCellByColumnAndRow(5, $col+1)->getValue();
				$tmt_jabatan = $excel->getCellByColumnAndRow(6, $col)->getValue();
				$tmt_jabatan = Date::excelToDateTimeObject($tmt_jabatan)->format('Y-m-d');
				$jurusan = $excel->getCellByColumnAndRow(12, $col)->getValue();
				$nama_pt = $excel->getCellByColumnAndRow(13, $col)->getValue();
				$tahun_lulus = $excel->getCellByColumnAndRow(14, $col)->getValue();
				$tingkat_pendidikan = $excel->getCellByColumnAndRow(15, $col)->getValue();
				$usia = $excel->getCellByColumnAndRow(16, $col)->getValue();
				$masa_kerja = $excel->getCellByColumnAndRow(16, $col+1)->getValue();
				$catatan_mutasi = $excel->getCellByColumnAndRow(17, $col)->getValue();
				$no_kapreg = $excel->getCellByColumnAndRow(18, $col)->getValue();

				for($j=0; $j<3;$j++){
					$col2 = $col+2;
					$nama_pelatihan = $excel->getCellByColumnAndRow(8, $col+$j)->getValue();
					$cellBln = $excel->getCellByColumnAndRow(9, $col+$j);

					if($cellBln->isInMergeRange() && $cellBln->getMergeRange() == "I$col:I$col2" && $nama_pelatihan != null) {
						$bln_pelatihan = $excel->getCellByColumnAndRow(9, $col)->getValue();
					}
					else {
						$bln_pelatihan = $excel->getCellByColumnAndRow(9, $col+$j)->getValue();
					}

					$cellThn = $excel->getCellByColumnAndRow(10, $col+$j);
					if($cellThn->isInMergeRange() && $cellThn->getMergeRange() == "J$col:J$col2" && $nama_pelatihan != null) {
						$thn_pelatihan = $excel->getCellByColumnAndRow(10, $col)->getValue();
					}
					else {
						$thn_pelatihan = $excel->getCellByColumnAndRow(10, $col+$j)->getValue();
					}

					$cellJam = $excel->getCellByColumnAndRow(11, $col+$j);
					if($cellJam->isInMergeRange() && $cellJam->getMergeRange() == "K$col:K$col2" && $nama_pelatihan != null) {
						$jumlah_jam = $excel->getCellByColumnAndRow(11, $col)->getValue();
					}
					else {
						$jumlah_jam = $excel->getCellByColumnAndRow(11, $col+$j)->getValue();
					}

					if($bln_pelatihan == '') {
						$bln_pelatihan = 0;
					}

					if($thn_pelatihan == '') {
						$thn_pelatihan = 0;
					}
					$tanggal_pelatihan = "$bln_pelatihan-$thn_pelatihan";

					$dataTrain = array(
						'nip' => $nip,
						'nama_pelatihan' => $nama_pelatihan,
						'tanggal_pelatihan' => $tanggal_pelatihan,
						'jumlah_jam'=> $jumlah_jam
					);
					array_push($savedDataTrain, $dataTrain);
				}
				array_push($keepBagian, $bagian);

				$data = array(
					'no' => $no,
					'nip' => $nip,
					'nama_lengkap' => $nama_lengkap,
					'bagian' => $bagian,
					'tempat_lahir' => $tempat_lahir,
					'tanggal_lahir' => $tanggal_lahir,
					'no_urut_pangkat' => $no_urut_pangkat,
					'pangkat' => $pangkat,
					'gol_ruang' => $gol_ruang,
					'tmt_pangkat' => $tmt_pangkat,
					'jabatan' => $jabatan,
					'tmt_jabatan' => $tmt_jabatan,
					'jurusan' => $jurusan,
					'nama_pt' => $nama_pt,
					'tahun_lulus' => $tahun_lulus,
					'tingkat_pendidikan' => $tingkat_pendidikan,
					'usia' => $usia,
					'masa_kerja' => $masa_kerja,
					'catatan_mutasi' => $catatan_mutasi,
					'no_kapreg' => $no_kapreg,
					'eselon' => $eselon
				);
				array_push($saveData, $data);
			}
            // print("<pre>".print_r($saveData,true)."</pre>");exit();

			$this->db->insert_batch('tbl_pns', $saveData);
			$this->db->insert_batch('tbl_pelatihan', $savedDataTrain); 

			$log['user'] = $this->session->userdata('nip');
			$log['Ket'] = "UPLOAD PNS2";
			$log['tanggal'] = date('Y-m-d H:i:s');
			$this->uploads_model->log($log);

			$this->session->set_flashdata('pns',"<b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!"); 
			redirect('uploads/v_pns'); 
		}
	}


	public function uploadJatinangor()
	{
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['nangor']['name']) && in_array($_FILES['nangor']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['nangor']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('nangor', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_sas"); 
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel  = $reader->load($_FILES['nangor']['tmp_name']);

			$sheet  = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);			
			$dataoutput = array();
			$datasuboutput = array();
			$datakomponen = array();
			$datasubkomponen = array();
			$dataakun = array();
			$numrow = 1;
			$bag = '';
			$id_c = 0;
			$id_d = 0;
			$id_e = 0;
			$satker_jatinangor = 448302;
			$tgl = date('Y-m-d');

			foreach($sheet as $row){
				if($numrow > 1){
					if ($row['A'] == 2){
						$coutput = 0;
						$csuboutput = 0;
						$ckomponen =0;
						$csubkomponen =0;
						$cakun =0;
						$csubunit =0;
						if (strpos($row['AI'], 'Perencanaan')) {
							$cbiro = 1;
							$id_b = ($cbiro<10)?"10".$cbiro:"1".$cbiro;
							// echo "ID BIRO : ".$id_b." <br>";
						}elseif (strpos($row['AI'], 'Keuangan')) {
							$cbiro = 2;
							$id_b = ($cbiro<10)?"10".$cbiro:"1".$cbiro;
							// echo "ID BIRO : ".$id_b." <br>";
						}elseif (strpos($row['AI'], 'Alumni')) {
							$cbiro = 3;
							$id_b = ($cbiro<10)?"10".$cbiro:"1".$cbiro;
							// echo "ID BIRO : ".$id_b." <br>";
						}elseif (strpos($row['AI'], 'Hukum')) {
							$cbiro = 4;
							$id_b = ($cbiro<10)?"10".$cbiro:"1".$cbiro;

							// echo "ID BIRO : ".$id_b." <br>";
						}
					} elseif ($row['A'] == 3) {
						$coutput++;
						$output = (($coutput<10)?$cbiro."0".$coutput:$cbiro.$coutput).$row['AI']."<br>";
						// echo("$output");
						$temp = explode(".", $row['AI']);
						$satker_biro = $temp[0];

						// $id_c = ($cunit<10)?$cbiro."0".$coutput:$cbiro.$coutput;
						$id_c = ($coutput<20)?"out.".$cbiro."0".$coutput:$cbiro.$coutput;
						// echo "$id_c ";
						$ket = trim($row['AI']);
						$temp = explode(".", $ket);
						$satker_biro = $temp[0];
						// echo "$satker_biro";
						$ket = substr($ket, 9);
						// echo "$ket";
						// echo "<br><br>";

						array_push($dataoutput, array(
							'kode_satker' => $satker_jatinangor,
							'id_b'      => $satker_biro,
							'id_c'      =>$id_c,
							'ket'      => $ket,
							'tanggal' => $tgl
						));

					}  elseif ($row['A'] == 4) {
						$csuboutput++;   
						$id_d = ($csuboutput<20)?"subout.".$cbiro."0".$csuboutput:$csuboutput.$cbiro;      
						// echo "$id_d ";               
						$ket1 = trim($row['AI']);
						$ket1 = substr($ket1, 4);
						// echo "$ket1<br>";
						array_push($datasuboutput, array(
							'kode_satker' => $satker_jatinangor,
							'id_b'      => $satker_biro,
							'id_c'      =>$id_c,
							'id_d'		=> $id_d,
							'ket'      => $ket1,
							'tanggal' => $tgl
						));
						// echo("<br>");
					}  elseif ($row['A'] == 5) {
						$ckomponen++;  
						$id_e = ($ckomponen<1000)?"komp.".$cbiro."0".$ckomponen:$ckomponen.$cbiro;   
						// echo "$id_e ";                    
						$ket1 = trim($row['AI']);
						$ket1 = substr($ket1, 4);
						// echo "$ket1 <br>"; 
						array_push($datakomponen, array(
							'kode_satker' => $satker_jatinangor,
							'id_b'      => $satker_biro,
							'id_c'      =>$id_c,
							'id_d'      =>$id_d,
							'id_e'		=> $id_e,
							// 'id_u'      => ($cunit<10)?$cbiro."0".$cunit:$cbiro.$cunit,
							'ket'      => $ket1,
							'tanggal' => $tgl
						));

					}  elseif ($row['A'] == 6) {
						$csubkomponen++;                        
						$ket1 = trim($row['AI']);
						$ket1 = substr($ket1, 2);
						$id_f = ($csubkomponen<1000)?"subkomp.".$cbiro."0".$csubkomponen:$csubkomponen.$cbiro;   
						// echo "idf = $id_f ";
						// echo "$ket1 <br>";
						array_push($datasubkomponen, array(
							'kode_satker' => $satker_jatinangor,
							'id_b'      => $satker_biro,
							'id_c'      =>$id_c,
							'id_d'      =>$id_d,
							'id_e'		=> $id_e,
							'id_f'		=> $id_f,
							'ket'      => $ket1,
							'tanggal' => $tgl
						));

					}  elseif ($row['A'] == 7) {
						$cakun++;                        
						$ket1 = trim($row['AI']);
						$ket1 = substr($ket1, 33);

						$id_g = ($cakun<1000)?"akun.".$cbiro."0".$cakun:$cakun.$cbiro;   
						// echo "$id_g ";
						// echo "$ket1 <br>";

						array_push($dataakun, array(
							'kode_satker' => $satker_jatinangor,
							'id_b'      => $satker_biro,
							'id_c'      =>$id_c,
							'id_d'      =>$id_d,
							'id_e'		=> $id_e,
							'id_f'		=> $id_f,
							'id_g'		=> $id_g,
							// 'id_u'      => ($cunit<10)?$cbiro."0".$cunit:$cbiro.$cunit,
							'pagu'      => preg_replace("/[^0-9]/", "", $row['AB']),
							'realisasi' => preg_replace("/[^0-9]/", "", $row['AC']),
							'ket'      => $ket1,
							'tanggal' => $tgl
						));

					}
				}
				$numrow++;
			}
			// echo "<br>";
			// var_dump($data);

			// echo "</pre>";
			// exit();

			$this->db->truncate('outputnya_sas');
			$this->db->insert_batch('outputnya_sas', $dataoutput);
			$this->db->truncate('suboutput_sas');
			$this->db->insert_batch('suboutput_sas', $datasuboutput);

			$this->db->truncate('komponen_sas');
			$this->db->insert_batch('komponen_sas', $datakomponen);
			$this->db->truncate('subkomponen_sas');
			$this->db->insert_batch('subkomponen_sas', $datasubkomponen);
			$this->db->truncate('akun_sas');
			$this->db->insert_batch('akun_sas', $dataakun);
			//delete file from server
			// unlink(realpath('excel/'.$data_upload['file_name']));

			//upload success
			$log['user'] = $this->session->userdata('nip');
			$log['Ket'] = "UPLOAD FUNCTION JATINANGOR";
			$log['tanggal'] = date('Y-m-d H:i:s');
			$this->uploads_model->log($log);

			$this->session->set_flashdata('nangor', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
			//redirect halaman
			redirect('uploads/v_sas');

		}
	}

	function dosen()
	{
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['dosen']['name']) && in_array($_FILES['dosen']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['dosen']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('dosen', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/dosen"); 
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$spreadsheet = $reader->load($_FILES['dosen']['tmp_name']);

			$list_sheet = $spreadsheet->getSheetNames();

			$sheetData = $spreadsheet->getSheetByName($list_sheet[0])->toArray(null, true, true ,true);
			$data = array();
			$datex = new DateTime();
			$date = $datex->format('Y-m-d');

			foreach($sheetData as $row){
				if($row['A'] >= 1){

					array_push($data, array(
						'nama'      => $row['B'],
						'nip'      => $row['C'],
						'nidn'      => $row['D'],
						'serdos'      => $row['E'],
						'bidang_ilmu'      => $row['F'],
						'nik'   => $row['G'],
						'alamat'   => $row['H'],
						'jabatan'   => $row['I'],
						'pangkat'   => $row['J'],
						'created_date' => $date,
					));

					// echo "NO: $row[A]<br>";
					// echo "NAMA: $row[B]<br>";
					// echo "NIP: $row[C]<br>";
					// echo "NIDN: $row[D]<br>";
					// echo "SERTIFIKASI DOSEN: $row[E]<br>";
					// echo "BIDANG ILMU: $row[F]<br>";
					// echo "NIK: $row[G]<br>";
					// echo "ALAMAT: $row[H]<br>";
					// echo "JABATAN: $row[I]<br>";
					// echo "PANGKAT: $row[J]<br>";
				}	
			}
			$this->db->truncate('tbl_dosen');
			$this->db->insert_batch('tbl_dosen', $data);
			
			$log['user'] = $this->session->userdata('nip');
			$log['Ket'] = "UPLOAD DOSEN";
			$log['tanggal'] = date('Y-m-d H:i:s');
			$this->uploads_model->log($log);

			$this->session->set_flashdata('dosen', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b><br>Data berhasil diimport!</div>');
			//redirect halaman
			redirect("uploads/v_dosen");
		}else {
			$this->session->set_flashdata('dosen', '<div class="alert alert-warning"><b>PROSES IMPORT GAGAL!</b><br>Data kosong!</div>');
			redirect("uploads/v_dosen");
		}

	}

	public function alumni()
	{
		// Load plugin PHPExcel nya
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES['alumni']['name']) && in_array($_FILES['alumni']['type'], $file_mimes)) {

			$arr_file = explode('.', $_FILES['alumni']['name']);
			$extension = end($arr_file);

			if($extension != 'xlsx') {
				$this->session->set_flashdata('alumni', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

				redirect("uploads/v_alumni"); 
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$loadexcel  = $reader->load($_FILES['alumni']['tmp_name']);
			$sheet  = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

			$upalumni = array();
			$numrow = 1;
			$tgl = date('Y-m-d');

			foreach($sheet as $row){
				if($numrow > 1){
					
					// $regex = "/[-\d]+([ \d]|[ '\w])+[- \d]+$/";
					// $tgl =  $row['H'];
					// if ($row['H'] != NULL) {
					// 	preg_match($regex, trim($row['H']),$haha);
					// 	if (count($haha) > 1) {
					// 		$tgl = $haha['0'];
					// 		// echo "$tgl<br>";
					// 		$tgl = str_replace("'"," ","$tgl");
					// 	}
					// }else{
					// 	$tgl =  $row['H'];
					// }

					// $temp = explode(",", $row['H']);
					// $tgl_last = count($temp)-1;
					// $caca = "/[ ,-]+$/";
					// // echo "$tgl_last ..... $row[H]<br>";
					// $kosong = " ";
					// $yukbisa = preg_replace($regex,'' , $row['H']);
					// $yukbisa = preg_replace($caca,'' , $yukbisa);
					// echo "$yukbisa<br>";

					// array_push($upalumni, array(
					// 	'nama'      => $row['D'],
					// 	'jk'      => $row['E'],
					// 	'npp'      => $row['F'],
					// 	'nip'      => $row['G'],
					// 	'tempat_lahir' => $yukbisa,
					// 	'tanggal_lahir' => $tgl,
					// 	'asdaf' => $row['I'],
					// 	'agama' => $row['K'],
					// 	'instansi' => $row['L'],
					// 	'jabatan' =>$row['M']
					// ));

					array_push($upalumni, array(
						'nip'      => $row['C'],
						'nama'      => $row['D'],
						'jk'      => $row['E'],
						'institusi'      => $row['F'],
						'angkatan'      => $row['G'],
						'tahun_lulus' => $row['H'],
						'instansi' => $row['I'],
						'jabatan' => $row['J'],
						'kab_kota' => $row['K'],
						'provinsi' => $row['L']
					));
						// exit;


				}
				$numrow++;
			}
			$this->db->insert_batch('alumni', $upalumni);
			// print("<pre>".print_r($upalumni,true)."</pre>");
			// exit();

			//upload success
			$log['user'] = $this->session->userdata('nip');
			$log['Ket'] = "UPLOAD ALUMNI";
			$log['tanggal'] = date('Y-m-d H:i:s');
			$this->uploads_model->log($log);

			$this->session->set_flashdata('alumni', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
			//redirect halaman
			redirect('uploads/v_alumni');
		}
	}


	function jenispend($s) {
		$jp = array(
			'Peserta Didik Baru' => 1,
			'Pindahan' => 2,
			'Naik kelas' => 3,
			'Akselerasi' => 4,
			'Mengulang' => 5,
			'Lanjutan semester' => 6,
			'Pindahan Alih Bentuk' => 8,
			'Alih Jenjang' => 11,
			'Lintas Jalur' => 12,
			'Rekognisi Pembelajaran Lampau (RPL)' => 13,
			'Course' => 14,
			'Fast Track' => 15,

		);

		// $roman = 'MMMCMXCIX';
		$result = 0;

		foreach ($jp as $key => $value) {
			while (strpos($s, $key) === 0) {
				$result += $value;
				$s = substr($s, strlen($key));
			}
		}
		return $result;
	}

	function jalurmasuk($s) {
		$jm = array(
			'SBMPTN' => 1,
			'SNMPTN' => 2,
			'PMDK' => 3,
			'Prestasi' => 4,
			'Seleksi Mandiri PTN' => 5,
			'Seleksi Mandiri PTS' => 6,
			'Ujian Masuk Bersama PTN (UMB-PT)' => 7,
			'Ujian Masuk Bersama PTS (UMB-PTS)' => 8,
			'Program Internasional' => 9,
			'Kerjasama Pemerintahan' => 11,
		);

		// $roman = 'MMMCMXCIX';
		$result = 0;

		foreach ($jm as $key => $value) {
			while (strpos($s, $key) === 0) {
				$result += $value;
				$s = substr($s, strlen($key));
			}
		}
		return $result;
	}


	function jenispembiayaan($s) {
		$jt = array(
			'Mandiri' => 1,
			'Beasiswa Tidak Penuh' => 2,
			'Beasiswa Penuh' => 3,
			'Bidikmisi' => 4,

		);

		// $roman = 'MMMCMXCIX';
		$result = 0;

		foreach ($jt as $key => $value) {
			while (strpos($s, $key) === 0) {
				$result += $value;
				$s = substr($s, strlen($key));
			}
		}
		return $result;
	}

	function negara($s) {
		$nn = array(
			'WNI' => 'ID',
		);

		// $roman = 'MMMCMXCIX';
		$result = "";

		foreach ($nn as $en => $in) {
			if (strtoupper($in) == 0) {
				$result = $in;
			}
		}
		return strtoupper($result);
	}


	function semesterr($angka) {

		$angka = str_replace("20191","2019/2020 Ganjil",$angka);
		$angka = str_replace("20192","2019/2020 Genap",$angka);
		$angka = str_replace("20193","2019/2020 Pendek",$angka);
		$angka = str_replace("20201","2020/2021 Ganjil",$angka);
		$angka = str_replace("20202","2020/2021 Genap",$angka);
		$angka = str_replace("20203","2020/2021 Pendek",$angka);
		$angka = str_replace("20211","2021/2022 Ganjil",$angka);
		$angka = str_replace("20212","2021/2022 Genap",$angka);
		$angka = str_replace("20213","2021/2022 Pendek",$angka);
		return $angka;
	}


	function jenistinggal($s) {
		$jtt = array(
			'Bersama orang tua' => 1,
			'Bersama Wali' => 2,
			'Kost' => 3,
			'Asrama' => 4,
			'Panti Asuhan' => 5,
			'Lainnya' => 99,

		);

		// $roman = 'MMMCMXCIX';
		$result = 0;

		foreach ($jtt as $key => $value) {
			while (strpos($s, strtoupper($key)) === 0) {
				$result += $value;
				$s = substr($s, strlen($key));
			}
		}
		return $result;
	}


	function alat($s) {
		$aa = array(
			'Jalan Kaki'=>1,
			'Angkutan umum/bus/pete-pete'=>3,
			'Mobil/bus antar jemput'=>4,
			'Kereta api'=>5,
			'Ojek'=>6,
			'Andong/bendi/sado/dokar/delman/becak'=>7,
			'Perahu penyeberangan/rakit/getek'=>8,
			'Kuda'=>11,
			'Sepeda'=>12,
			'Motor'=>13,
			'Mobil pribadi'=>14,
			'Lainnya'=>99,

		);

		// $roman = 'MMMCMXCIX';
		$result = 0;

		foreach ($aa as $key => $value) {
			while (strpos($s, strtoupper($key)) === 0) {
				$result += $value;
				$s = substr($s, strlen($key));
			}
		}
		return $result;
	}

	function pendidik($s) {
		$pp = array(
			'Tidak sekolah' => 0,
			'PAUD' => 1,
			'TK' => 2,
			'Putus SD' => 3,
			'SD ' => 4,
			'SMP' => 5,
			'SMA' => 6,
			'Paket A' => 7,
			'Paket B' => 8,
			'Paket C' => 9,
			'D1' => 20,
			'D2' => 21,
			'D3' => 22,
			'D4' => 23,
			'S1' => 30,
			'Profesi' => 31,
			'Sp-1' => 32,
			'S2' => 35,
			'S2 Terapan' => 36,
			'Sp-2' => 37,
			'S3' => 40,
			'S3 Terapan' => 41,
			'Non formal' => 90,
			'Informal' => 91,
			'Lainnya' => 99,


		);

		// $roman = 'MMMCMXCIX';
		$result = 0;

		foreach ($pp as $key => $value) {
			while (strpos($s, $key) === 0) {
				$result += $value;
				$s = substr($s, strlen($key));
			}
		}
		return $result;
	}

	function penghasil($s) {
		$pe = array(
			'Kurang dari Rp. 500,000'=>11,
			'Rp. 500,000 - Rp. 999,999'=>12,
			'Rp. 1,000,000 - Rp. 1,999,999'=>13,
			'Rp. 2,000,000 - Rp. 4,999,999'=>14,
			'Rp. 5,000,000 - Rp. 20,000,000'=>15,
			'Lebih dari Rp. 20,000,000'=>16,
			'Kurang dari Rp. 500.000,-' => 11,
			'Rp. 2.000.000,- s/d Rp. 4.999.999,-' =>14,
			'Rp. 500.000,- s/d Rp. 999.999,-' => 12,
			'Rp. 7.500.000,- s/d Rp. 9.999.999,-' =>15,
			'Rp. 1.000.000,- s/d Rp. 1.999.999,-' =>13,
			'Rp.5.000.000' => 14,
			'Rp. 0'=>11,
			'Rp. 5.000.000,- s/d Rp. 7.499.999,-' =>15,
			'Rp. 3000000' =>14,
			'Rp. 3.000.000,- s/d Rp. 5.000.000,-' =>14,
			'Lebih dari Rp. 10.000.000,-' =>16,
			'Lebih dari Rp. 3.000.000,-' =>14,

		);

		// $roman = 'MMMCMXCIX';
		$result = 0;

		foreach ($pe as $key => $value) {
			while (strpos($s, $key) === 0) {
				$result += $value;
				$s = substr($s, strlen($key));
			}
		}
		return $result;
	}

	function agamaa($s) {
		$ag = array(
			'Islam' => 1,
			'Kristen' => 2,
			'Katholik' => 3,
			'Hindu' => 4,
			'Budha' => 5,
			'Konghucu' => 6,
			'Lainnya' => 99,
		);

		// $roman = 'MMMCMXCIX';
		$result = 0;

		foreach ($ag as $key => $value) {
			while (strpos($s, strtoupper($key)) === 0) {
				$result += $value;
				$s = substr($s, strlen($key));
			}
		}
		return $result;
	}

	function prodi($prod) {

		
		$prod =str_replace("POLITIK INDONESIA TERAPAN","24d1a130-3af6-4f57-ab30-06131d701209",$prod);
		$prod =str_replace("TEKNOLOGI REKAYASA INFORMASI PEMERINTAHAN","e5ad2f00-89d8-45ee-a6e4-0a4b04b3f3a1",$prod);
		$prod =str_replace("STUDI KEPENDUDUKAN DAN PENCATATAN SIPIL","1f8b17bb-85ea-4c21-833b-295a61e8be12",$prod);
		$prod =str_replace("MANAJEMEN SUMBER DAYA MANUSIA","caabc219-ee2e-453b-9afb-5451d9107420",$prod);
		$prod =str_replace("MANAJEMEN SUMBER DAYA MANUSIA SEKTOR PUBLIK","c0322bbc-b0b2-4e73-a23c-3b46fae3f774",$prod);
		$prod =str_replace("PEMBANGUNAN EKONOMI DAN PEMBERDAYAAN MASYARAKAT","f2db54aa-5a23-4c9d-bbc3-1bd56ad0863d",$prod);
		$prod =str_replace("KEBIJAKAN PEMERINTAHAN","a2f19c26-8acf-43f9-af9b-4d1d47c05c0a",$prod);
		$prod =str_replace("MANAJEMEN SUMBER DAYA APARATUR","b1b35fdb-37d0-425d-88c4-94eba8706b80",$prod);
		$prod =str_replace("KEUANGAN DAERAH","653236f3-5299-4b37-b219-97d25a93280b",$prod);
		$prod =str_replace("POLITIK PEMERINTAHAN","337f1a82-131a-40b3-b4f7-a7eed89237f8",$prod);
		$prod =str_replace("STUDI KEBIJAKAN PUBLIK","43abc93c-6e89-449d-9c70-70afe75527b9",$prod);
		$prod =str_replace("MANAJEMEN KEAMANAN DAN KESELATAMAN PUBLIK","022e0cd9-c7c6-4e0e-aecb-b9506642f946",$prod);
		$prod =str_replace("MANAJEMEN PEMERINTAHAN","0ba84683-2802-41e1-b547-bc7b81ec44ae",$prod);
		$prod =str_replace("PEMBANGUNAN DAN PEMBERDAYAAN","f59b170e-8041-477f-8bbf-ad66c0f6af51",$prod);
		$prod =str_replace("ADMINISTRASI KEPENDUDUKAN DAN CATATAN SIPIL","5d8eff93-68a4-4f2a-832d-b85ae59d9fa1",$prod);
		$prod =str_replace("KEUANGAN PUBLIK","7ed35eba-1c9d-474b-9a19-d5da4e9ccc6c",$prod);
		$prod =str_replace("ADMINISTRASI PEMERINTAHAN DAERAH","4b2970da-2353-4101-bfab-cfaf4126071a",$prod);
		$prod =str_replace("PRAKTIK PERPOLISIAN TATA PAMONG","71e82f5f-24a0-4ca3-a0ee-eed587948f84",$prod);
		$prod =str_replace("MANAJEMEN PEMBANGUNAN","77155c68-a799-405b-911e-eedb03435b91",$prod);
		$prod =str_replace("MANAJEMEN KEUANGAN","187a1750-7aa6-43a6-a729-f1a45cf992cf",$prod);


		return $prod;
	}


	function pekerja($s) {
		$pp = array(
			'Tidak Bekerja' => 1,
			'Nelayan' => 2,
			'Petani' => 3,
			'Peternak' => 4,
			'PNS/TNI/Polri' => 5,
			'Karyawan Swasta' => 6,
			'Pedagang Kecil' => 7,
			'Pedagang Besar' => 8,
			'Wiraswasta' => 9,
			'Wirausaha' => 10,
			'Buruh' => 11,
			'Pensiunan' => 12,
			'Peneliti' => 13,
			'Tim Ahli / Konsultan' => 14,
			'Magang' => 15,
			'Tenaga Pengajar / Instruktur / Fasiltator' => 16,
			'Pimpinan / Manajerial' => 17,
			'Sudah Meninggal' => 98,
			'Lainnya' => 99,
			'Mengurus Rumah Tangga' => 1,
			'Pegawai Negeri Sipil' => 5,
			'PETANI / PEKEBUN' => 3,
			'Perawat' => 99,
			'Guru' =>16,
			'Bidan' =>99,
			'Pedagang' =>10,
			'Kepolisian RI' => 5,
			'PNS (Guru)' => 5,
			'Belum / Tidak Bekerja' => 1,
			'Polri' => 5,
			'IRT' => 99,
			'PNS' => 5,
			'GURU HONORER' =>16,
			'Notaris' => 99,
			'PENYIAR RADIO' => 99,
			'Karyawan Honorer' => 99,
			'penata rias' => 99,
			'Buruh harian lepas' => 11,
			'swasta' => 99,
			'sopir'=> 99,
			'pendeta' => 99,
			'pns (bidan)' => 5,
			'-' => 99,
			'Dokter' => 99,
			'ANGGOTA DPRD PROPINSI' => 99,
			'TENTARA NASIONAL INDONESIA' => 5,
			'supir' => 99,
			'ASN' => 5,
			'TUKANG ELEKTRIK' =>99,
			'KARYAWAN BUMD' => 6,
			'TUKANG LAS / PANDAI BESI'=>10,
			'NELAYAN / PERIKANAN' => 2,
			'BURUH TANI / PERKEBUNAN' => 3,
			'TENTARA NASIONAL INDONESIA ANGKATAN DARAT' =>5,
			'KONTRAKTOR' => 99,
			'PURNAWIRAWAN TNI-AD' => 5,
			'KONSULTAN' => 14,
			'MEKANIK' => 99,
			'INDUSTRI' => 6,
			'SOPIR TRUK' => 99,
			'WIRASWASTA (PEDAGANG)' => 9,
			'TUKANG BATU' => 99,
			'KEPALA DESA' => 5,
			'PERANGKAT DESA' => 99,
			'TUKANG KAYU' => 99,
			'ANGGOTA DPRD KABUPATEN / KOTA' => 5,
			'MANTAN TNI AD' =>12,



		);

		// $roman = 'MMMCMXCIX';
		$result = 0;

		foreach ($pp as $key => $value) {
			while (strpos($s, strtoupper($key)) === 0) {
				$result += $value;
				$s = substr($s, strlen($key));
			}
		}
		return $result;
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

	function ktt($s) {
		if ($s == "" || !is_numeric(preg_replace('/[A-Za-z,. ]/', "", $s))) {
			return 0;
		}
		$temp = preg_replace("/[^0-9,.]/", "", $s);
		$res = $temp;
		$temp = explode(",", $temp);
		$temp_last = count($temp)-1;
		if ((strlen($temp[$temp_last]) < 3) && count($temp) > 1) {
			// berarti koma
			$res = substr_replace($s, ".", -3, 1);
		}
		return str_replace(",", "", $res);
	}

	function ptt($data) {
		$html = "<table border='1'>";
		$html .= '<tr>';
		$html .= '<th>No.</th>';
		foreach($data[0] as $key=>$value){
			$html .= '<th>' . htmlspecialchars($key) . '</th>';
		}
		$html .= '</tr>';

		// data rows
		$cc = 1;
		foreach( $data as $key=>$value){
			$html .= '<tr>';
			$html .= '<td>' . $cc++ . '</td>';
			foreach($value as $key2=>$value2){
				$html .= '<td>' . htmlspecialchars($value2) . '</td>';
			}
			$html .= '</tr>';
		}

		// finish table and return it

		$html .= '</table>';
		echo $html;
	}

	function wilayah($s) {
		$ww = array(
			'Prov. D.K.I. Jakarta' => 10000,
			'Kab. Kepulauan Seribu' => 10100,
			'Kec. Kepulauan Seribu Selatan ' => 10101,
			'Kec. Kepulauan Seribu Utara ' => 10102,
			'Kota Jakarta Pusat' => 16000,
			'Kec. Tanah Abang' => 16001,
			'Kec. Menteng' => 16002,
			'Kec. Senen' => 16003,
			'Kec. Johar Baru' => 16004,
			'Kec. Cempaka Putih' => 16005,
			'Kec. Kemayoran' => 16006,
			'Kec. Sawah Besar' => 16007,
			'Kec. Gambir' => 16008,
			'Kota Jakarta Utara' => 16100,
			'Kec. Penjaringan' => 16101,
			'Kec. Pademangan' => 16102,
			'Kec. Tanjung Priok' => 16103,
			'Kec. Koja' => 16104,
			'Kec. Kelapa Gading' => 16105,
			'Kec. Cilincing' => 16106,
			'Kota Jakarta Barat' => 16200,
			'Kec. Kembangan' => 16201,
			'Kec. Kebon Jeruk' => 16202,
			'Kec. Palmerah' => 16203,
			'Kec. Grogol Petamburan' => 16204,
			'Kec. Tambora' => 16205,
			'Kec. Taman Sari' => 16206,
			'Kec. Cengkareng' => 16207,
			'Kec. Kali Deres' => 16208,
			'Kota Jakarta Selatan ' => 16300,
			'Kec. Jagakarsa' => 16301,
			'Kec. Pasar Minggu' => 16302,
			'Kec. Cilandak ' => 16303,
			'Kec. Pesanggrahan ' => 16304,
			'Kec. Kebayoran Lama ' => 16305,
			'Kec. Kebayoran Baru' => 16306,
			'Kec. Mampang Prapatan ' => 16307,
			'Kec. Pancoran' => 16308,
			'Kec. Tebet' => 16309,
			'Kec. Setia Budi  ' => 16310,
			'Kota Jakarta Timur ' => 16400,
			'Kec. Pasar Rebo  ' => 16401,
			'Kec. Ciracas ' => 16402,
			'Kec. Cipayung  ' => 16403,
			'Kec. Makasar ' => 16404,
			'Kec. Kramat Jati ' => 16405,
			'Kec. Jatinegara  ' => 16406,
			'Kec. Duren Sawit ' => 16407,
			'Kec. Cakung  ' => 16408,
			'Kec. Pulo Gadung ' => 16409,
			'Kec. Matraman  ' => 16410,
			'Prov. Jawa Barat ' => 20000,
			'Kab. Bogor ' => 20500,
			'Kec. Nanggung  ' => 20501,
			'Kec. Leuwiliang  ' => 20502,
			'Kec. Pamijahan ' => 20503,
			'Kec. Cibungbulang  ' => 20504,
			'Kec. Ciampea ' => 20505,
			'Kec. Dramaga ' => 20506,
			'Kec. Ciomas  ' => 20507,
			'Kec. Cijeruk ' => 20508,
			'Kec. Caringin  ' => 20509,
			'Kec. Ciawi ' => 20510,
			'Kec. Cisarua ' => 20511,
			'Kec. Megamendung ' => 20512,
			'Kec. Sukaraja  ' => 20513,
			'Kec. Babakan Madang ' => 20514,
			'Kec. Sukamakmur  ' => 20515,
			'Kec. Cariu ' => 20516,
			'Kec. Jonggol ' => 20517,
			'Kec. Cileungsi ' => 20518,
			'Kec. Gunungputri ' => 20519,
			'Kec. Citeureup ' => 20520,
			'Kec. Cibinong  ' => 20521,
			'Kec. Bojong Gede ' => 20522,
			'Kec. Kemang  ' => 20523,
			'Kec. Parung  ' => 20524,
			'Kec. Gunung Sindur ' => 20525,
			'Kec. Rumpin  ' => 20526,
			'Kec. Cigudeg ' => 20527,
			'Kec. Jasinga ' => 20528,
			'Kec. Tenjo ' => 20529,
			'Kec. Parungpanjang ' => 20530,
			'Kec. Tamansari ' => 20531,
			'Kec. Ciseeng ' => 20532,
			'Kec. Kelapa Nunggal ' => 20533,
			'Kec. Sukajaya  ' => 20534,
			'Kec. Ranca Bungur  ' => 20535,
			'Kec. Tanjung Sari  ' => 20536,
			'Kec. Tajurhalang ' => 20537,
			'Kec. Cigombong ' => 20538,
			'Kec. Leuwisadeng ' => 20539,
			'Kec. Tenjolaya ' => 20540,
			'Kab. Sukabumi  ' => 20600,
			'Kec. Ciemas  ' => 20601,
			'Kec. Ciracap ' => 20602,
			'Kec. Surade  ' => 20603,
			'Kec. Jampang Kulon ' => 20604,
			'Kec. Kalibunder  ' => 20605,
			'Kec. Tegalbuleud ' => 20606,
			'Kec. Cidolog ' => 20607,
			'Kec. Sagaranten  ' => 20608,
			'Kec. Pabuaran  ' => 20609,
			'Kec. Lengkong  ' => 20610,
			'Kec. Pelabuhan Ratu ' => 20611,
			'Kec. Warung Kiara  ' => 20612,
			'Kec. Jampang Tengah ' => 20613,
			'Kec. Cikembar  ' => 20614,
			'Kec. Nyalindung  ' => 20615,
			'Kec. Gegerbitung ' => 20616,
			'Kec. Sukaraja  ' => 20617,
			'Kec. Sukabumi  ' => 20618,
			'Kec. Kadudampit  ' => 20619,
			'Kec. Cisaat  ' => 20620,
			'Kec. Cibadak ' => 20621,
			'Kec. Nagrak  ' => 20622,
			'Kec. Cicurug ' => 20623,
			'Kec. Cidahu  ' => 20624,
			'Kec. Parakansalak  ' => 20625,
			'Kec. Parungkuda  ' => 20626,
			'Kec. Kalapa Nunggal ' => 20627,
			'Kec. Cikidang  ' => 20628,
			'Kec. Cisolok ' => 20629,
			'Kec. Kabandungan ' => 20630,
			'Kec. Gunung Guruh  ' => 20631,
			'Kec. Cikakak ' => 20632,
			'Kec. Bantar Gadung ' => 20633,
			'Kec. Cicantayan  ' => 20634,
			'Kec. Simpenan  ' => 20635,
			'Kec. Kebon Pedes ' => 20636,
			'Kec. Cidadap ' => 20637,
			'Kec. Cibitung  ' => 20638,
			'Kec. Curugkembar ' => 20639,
			'Kec. Purabaya  ' => 20640,
			'Kec. Cireunghas  ' => 20641,
			'Kec. Sukalarang  ' => 20642,
			'Kec. Caringin  ' => 20643,
			'Kec. Bojong Genteng ' => 20644,
			'Kec. Waluran ' => 20645,
			'Kec. Cimanggu  ' => 20646,
			'Kec. Ciambar ' => 20647,
			'Kab. Cianjur ' => 20700,
			'Kec. Agrabinta ' => 20701,
			'Kec. Sindang Barang ' => 20702,
			'Kec. Cidaun  ' => 20703,
			'Kec. Naringgul ' => 20704,
			'Kec. Cibinong  ' => 20705,
			'Kec. Tanggeung ' => 20706,
			'Kec. Kadupandak  ' => 20707,
			'Kec. Takokak ' => 20708,
			'Kec. Sukanagara  ' => 20709,
			'Kec. Pagelaran ' => 20710,
			'Kec. Campaka ' => 20711,
			'Kec. Cibeber ' => 20712,
			'Kec. Warungkondang ' => 20713,
			'Kec. Cilaku  ' => 20714,
			'Kec. Sukaluyu  ' => 20715,
			'Kec. Ciranjang ' => 20717,
			'Kec. Mande ' => 20718,
			'Kec. Karang Tengah ' => 20719,
			'Kec. Cianjur ' => 20720,
			'Kec. Cugenang  ' => 20721,
			'Kec. Pacet ' => 20722,
			'Kec. Sukaresmi ' => 20723,
			'Kec. Cikalong Kulon ' => 20724,
			'Kec. Bojong Picung ' => 20725,
			'Kec. Campaka Mulya ' => 20726,
			'Kec. Cikadu  ' => 20727,
			'Kec. Leles ' => 20728,
			'Kec. Cijati  ' => 20729,
			'Kec. Gekbrong  ' => 20730,
			'Kec. Cipanas ' => 20731,
			'Kec. Haurwangi ' => 20732,
			'Kec. Pasirkuda ' => 20733,
			'Kab. Bandung ' => 20800,
			'Kec. Ciwidey ' => 20801,
			'Kec. Pasirjambu  ' => 20802,
			'Kec. Cimaung ' => 20803,
			'Kec. Pangalengan ' => 20804,
			'Kec. Kertasari ' => 20805,
			'Kec. Pacet ' => 20806,
			'Kec. Ibun  ' => 20807,
			'Kec. Paseh ' => 20808,
			'Kec. Cikancung ' => 20809,
			'Kec. Cicalengka  ' => 20810,
			'Kec. Rancaekek ' => 20811,
			'Kec. Majalaya  ' => 20812,
			'Kec. Ciparay ' => 20813,
			'Kec. Bale Endah  ' => 20814,
			'Kec. Arjasari  ' => 20815,
			'Kec. Banjaran  ' => 20816,
			'Kec. Pameungpeuk ' => 20817,
			'Kec. Ketapang  ' => 20818,
			'Kec. Soreang ' => 20819,
			'Kec. Marga Asih  ' => 20820,
			'Kec. Margahayu ' => 20821,
			'Kec. Dayeuhkolot ' => 20822,
			'Kec. Bojongsoang ' => 20823,
			'Kec. Cileunyi  ' => 20824,
			'Kec. Cilengkrang ' => 20825,
			'Kec. Cimenyan  ' => 20826,
			'Kec. Rancabali ' => 20829,
			'Kec. Nagreg  ' => 20830,
			'Kec. Solokan Jeruk ' => 20831,
			'Kec. Cangkuang ' => 20832,
			'Kec. Kutawaringin  ' => 20833,
			'Kab. Sumedang  ' => 21000,
			'Kec. Jatinangor  ' => 21001,
			'Kec. Cimanggung  ' => 21002,
			'Kec. Tanjungsari ' => 21003,
			'Kec. Rancakalong ' => 21004,
			'Kec. Sumedang Selatan   ' => 21005,
			'Kec. Sumedang Utara ' => 21006,
			'Kec. Situraja  ' => 21007,
			'Kec. Darmaraja ' => 21008,
			'Kec. Cibugel ' => 21009,
			'Kec. Wado  ' => 21010,
			'Kec. Tomo  ' => 21012,
			'Kec. Ujung Jaya  ' => 21013,
			'Kec. Conggeang ' => 21014,
			'Kec. Paseh ' => 21015,
			'Kec. Cimalaka  ' => 21016,
			'Kec. Tanjungkerta  ' => 21017,
			'Kec. Buah Dua  ' => 21018,
			'Kec. Ganeas  ' => 21019,
			'Kec. Jati Gede ' => 21020,
			'Kec. Pamulihan ' => 21023,
			'Kec. Cisitu  ' => 21024,
			'Kec. Jatinunggal ' => 21025,
			'Kec. Cisarua ' => 21026,
			'Kec. Tanjungmedar  ' => 21027,
			'Kec. Surian  ' => 21028,
			'Kec. Sukasari  ' => 21029,
			'Kab. Garut ' => 21100,
			'Kec. Talegong  ' => 21101,
			'Kec. Cisewu  ' => 21102,
			'Kec. Bungbulang  ' => 21103,
			'Kec. Pamulihan ' => 21104,
			'Kec. Pakenjeng ' => 21105,
			'Kec. Cikelet ' => 21106,
			'Kec. Pameungpeuk ' => 21107,
			'Kec. Cibalong  ' => 21108,
			'Kec. Cisompet  ' => 21109,
			'Kec. Peundeuy  ' => 21110,
			'Kec. Singajaya ' => 21111,
			'Kec. Cikajang  ' => 21112,
			'Kec. Banjarwangi ' => 21113,
			'Kec. Cilawu  ' => 21114,
			'Kec. Bayongbong  ' => 21115,
			'Kec. Cisurupan ' => 21116,
			'Kec. Samarang  ' => 21117,
			'Kec. Garut Kota  ' => 21119,
			'Kec. Karangpawitan ' => 21120,
			'Kec. Wanaraja  ' => 21121,
			'Kec. Sukawening  ' => 21122,
			'Kec. Banyuresmi  ' => 21123,
			'Kec. Leles ' => 21124,
			'Kec. Leuwigoong  ' => 21125,
			'Kec. Cibatu  ' => 21126,
			'Kec. Cibiuk  ' => 21127,
			'Kec. Kadungora ' => 21128,
			'Kec. Blubur Limbangan   ' => 21129,
			'Kec. Selaawi ' => 21130,
			'Kec. Malangbong  ' => 21131,
			'Kec. Mekarmukti  ' => 21132,
			'Kec. Caringin  ' => 21133,
			'Kec. Cihurip ' => 21134,
			'Kec. Sukaresmi ' => 21135,
			'Kec. Pasirwangi  ' => 21136,
			'Kec. Karangtengah  ' => 21137,
			'Kec. Kersamanah  ' => 21138,
			'Kec. Tarogong Kaler ' => 21139,
			'Kec. Tarogong Kidul ' => 21140,
			'Kec. Cigedug ' => 21141,
			'Kec. Sucinaraja  ' => 21142,
			'Kec. Pangatikan  ' => 21143,
			'Kab. Tasikmalaya ' => 21200,
			'Kec. Cipatujah ' => 21201,
			'Kec. Karangnunggal ' => 21202,
			'Kec. Cikalong  ' => 21203,
			'Kec. Panca Tengah  ' => 21204,
			'Kec. Cikatomas ' => 21205,
			'Kec. Cibalong  ' => 21206,
			'Kec. Bantarkalong  ' => 21207,
			'Kec. Bojong Gambir ' => 21208,
			'Kec. Sodonghilir ' => 21209,
			'Kec. Taraju  ' => 21210,
			'Kec. Salawu  ' => 21211,
			'Kec. Tanjungjaya ' => 21212,
			'Kec. Sukaraja  ' => 21213,
			'Kec. Salopa  ' => 21214,
			'Kec. Cineam  ' => 21215,
			'Kec. Manonjaya ' => 21216,
			'Kec. Singaparna  ' => 21219,
			'Kec. Cigalontang ' => 21220,
			'Kec. Leuwisari ' => 21221,
			'Kec. Cisayong  ' => 21223,
			'Kec. Rajapolah ' => 21224,
			'Kec. Jamanis ' => 21225,
			'Kec. Ciawi ' => 21226,
			'Kec. Pagerageung ' => 21227,
			'Kec. Parung Ponteng ' => 21228,
			'Kec. Sariwangi ' => 21229,
			'Kec. Sukaratu  ' => 21230,
			'Kec. Sukarame  ' => 21231,
			'Kec. Bojong Asih ' => 21232,
			'Kec. Culamega  ' => 21233,
			'Kec. Puspahiang  ' => 21234,
			'Kec. Jatiwaras ' => 21235,
			'Kec. Mangunreja  ' => 21236,
			'Kec. Gunung Tanjung ' => 21237,
			'Kec. Karang Jaya ' => 21238,
			'Kec. Pada Kembang  ' => 21239,
			'Kec. Sukahening  ' => 21240,
			'Kec. Kadipaten ' => 21241,
			'Kec. Sukaresik ' => 21242,
			'Kab. Ciamis  ' => 21400,
			'Kec. Cimerak ' => 21401,
			'Kec. Cijulang  ' => 21402,
			'Kec. Cigugur ' => 21403,
			'Kec. Langkaplancar ' => 21404,
			'Kec. Parigi  ' => 21405,
			'Kec. Sidamulih ' => 21406,
			'Kec. Pangandaran ' => 21407,
			'Kec. Kalipucang  ' => 21408,
			'Kec. Padaherang  ' => 21409,
			'Kec. Banjarsari  ' => 21410,
			'Kec. Lakbok  ' => 21411,
			'Kec. Pamarican ' => 21412,
			'Kec. Cidolog ' => 21413,
			'Kec. Cimaragas ' => 21414,
			'Kec. Cijeungjing ' => 21415,
			'Kec. Cisaga  ' => 21416,
			'Kec. Tambaksari  ' => 21417,
			'Kec. Rancah  ' => 21418,
			'Kec. Rajadesa  ' => 21419,
			'Kec. Sukadana  ' => 21420,
			'Kec. Ciamis  ' => 21421,
			'Kec. Cikoneng  ' => 21422,
			'Kec. Cihaurbeuti ' => 21423,
			'Kec. Sadananya ' => 21424,
			'Kec. Cipaku  ' => 21425,
			'Kec. Jatinagara  ' => 21426,
			'Kec. Panawangan  ' => 21427,
			'Kec. Kawali  ' => 21428,
			'Kec. Panjalu ' => 21429,
			'Kec. Panumbangan ' => 21430,
			'Kec. Panjalu Utara/Sukamantri ' => 21431,
			'Kec. Sindangkasih  ' => 21432,
			'Kec. Purwadadi ' => 21433,
			'Kec. Baregbeg  ' => 21434,
			'Kec. Lumbung ' => 21435,
			'Kec. Mangunjaya  ' => 21436,
			'Sukamantri ' => 21437,
			'Kec. Banjaranyar' => 21438,
			'Padaherang ' => 21490,
			'Kalipucang ' => 21491,
			'Pangandaran  ' => 21492,
			'Sidamulih  ' => 21493,
			'Parigi ' => 21494,
			'Cimerak  ' => 21495,
			'Cigugur  ' => 21496,
			'Langkaplancar  ' => 21497,
			'Mangunjaya ' => 21498,
			'Kab. Kuningan  ' => 21500,
			'Kec. Darma ' => 21501,
			'Kec. Kadugede  ' => 21502,
			'Kec. Ciniru  ' => 21503,
			'Kec. Selajambe ' => 21504,
			'Kec. Subang  ' => 21505,
			'Kec. Ciwaru  ' => 21506,
			'Kec. Cibingbin ' => 21507,
			'Kec. Luragung  ' => 21508,
			'Kec. Cidahu  ' => 21509,
			'Kec. Ciawigebang ' => 21510,
			'Kec. Lebakwangi  ' => 21511,
			'Kec. Garawangi ' => 21512,
			'Kec. Kuningan  ' => 21513,
			'Kec. Cigugur ' => 21514,
			'Kec. Kramatmulya ' => 21515,
			'Kec. Jalaksana ' => 21516,
			'Kec. Cilimus ' => 21517,
			'Kec. Mandirancan ' => 21518,
			'Kec. Pasawahan ' => 21519,
			'Kec. Pancalang ' => 21520,
			'Kec. Cipicung  ' => 21521,
			'Kec. Kalimanggis ' => 21522,
			'Kec. Japara  ' => 21523,
			'Kec. Karangkancana ' => 21524,
			'Kec. Nusaherang  ' => 21525,
			'Kec. Cilebak ' => 21526,
			'Kec. Hantara ' => 21527,
			'Kec. Cimahi  ' => 21528,
			'Kec. Cibeureum ' => 21529,
			'Kec. Sindang Agung ' => 21530,
			'Kec. Maleber ' => 21531,
			'Kec. Ciganda Mekar ' => 21532,
			'Kab. Majalengka  ' => 21600,
			'Kec. Lemahsugih  ' => 21601,
			'Kec. Bantarujeg  ' => 21602,
			'Kec. Cikijing  ' => 21603,
			'Kec. Talaga  ' => 21604,
			'Kec. Argapura  ' => 21605,
			'Kec. Maja  ' => 21606,
			'Kec. Majalengka  ' => 21607,
			'Kec. Cigasong  ' => 21608,
			'Kec. Sukahaji  ' => 21609,
			'Kec. Rajagaluh ' => 21610,
			'Kec. Sindangwangi  ' => 21611,
			'Kec. Leuwimunding  ' => 21612,
			'Kec. Palasah ' => 21613,
			'Kec. Jatiwangi ' => 21614,
			'Kec. Dawuan  ' => 21615,
			'Kec. Panyingkiran  ' => 21616,
			'Kec. Kadipaten ' => 21617,
			'Kec. Kertajati ' => 21618,
			'Kec. Jatitujuh ' => 21619,
			'Kec. Ligung  ' => 21620,
			'Kec. Sumberjaya  ' => 21621,
			'Kec. Banjaran  ' => 21622,
			'Kec. Cingambul ' => 21623,
			'Kec. Mala usma ' => 21624,
			'Kec. Sindang ' => 21625,
			'Kec. Kasokandel  ' => 21626,
			'Kab. Cirebon ' => 21700,
			'Kec. Waled ' => 21701,
			'Kec. Ciledug ' => 21702,
			'Kec. Losari  ' => 21703,
			'Kec. Babakan ' => 21704,
			'Kec. Karang Sembung ' => 21705,
			'Kec. Lemah Abang ' => 21706,
			'Kec. Sedong  ' => 21707,
			'Kec. Astana Japura ' => 21708,
			'Kec. Mundu ' => 21709,
			'Kec. Beber ' => 21710,
			'Kec. Sumber  ' => 21712,
			'Kec. Palimanan ' => 21713,
			'Kec. Plumbon ' => 21714,
			'Kec. Weru  ' => 21715,
			'Kec. Kapetakan ' => 21718,
			'Kec. Klangenan ' => 21719,
			'Kec. Arjawinangun  ' => 21720,
			'Kec. Ciwaringin  ' => 21721,
			'Kec. Susukan ' => 21722,
			'Kec. Gegesik ' => 21723,
			'Kec. Susukan Lebak ' => 21724,
			'Kec. Pabedilan ' => 21725,
			'Kec. Dukupuntang ' => 21726,
			'Kec. Panguragan  ' => 21727,
			'Kec. Kaliwedi  ' => 21728,
			'Kec. Pangenan  ' => 21729,
			'Kec. Gebang  ' => 21730,
			'Kec. Depok ' => 21731,
			'Kec. Kedawung  ' => 21732,
			'Kec. Karang Wereng ' => 21733,
			'Kec. Talun ' => 21734,
			'Kec. Gunung Jati ' => 21735,
			'Kec. Pasaleman ' => 21736,
			'Kec. Pabuaran  ' => 21737,
			'Kec. Tengah Tani ' => 21738,
			'Kec. Plered  ' => 21739,
			'Kec. Gempol  ' => 21740,
			'Kec. Greged  ' => 21741,
			'Kec. Suranenggala  ' => 21742,
			'Kec. Jamblang  ' => 21743,
			'Kab. Indramayu ' => 21800,
			'Kec. Haurgeulis  ' => 21801,
			'Kec. Kroya ' => 21802,
			'Kec. Gabuswetan  ' => 21803,
			'Kec. Cikedung  ' => 21804,
			'Kec. Lelea ' => 21805,
			'Kec. Bangodua  ' => 21806,
			'Kec. Widasari  ' => 21807,
			'Kec. Kertasemaya ' => 21808,
			'Kec. Krangkeng ' => 21809,
			'Kec. Karangampel ' => 21810,
			'Kec. Juntinyuat  ' => 21811,
			'Kec. Sliyeg  ' => 21812,
			'Kec. Jatibarang  ' => 21813,
			'Kec. Balongan  ' => 21814,
			'Kec. Indramayu ' => 21815,
			'Kec. Sindang ' => 21816,
			'Kec. Lohbener  ' => 21817,
			'Kec. Losarang  ' => 21818,
			'Kec. Kandanghaur ' => 21819,
			'Kec. Bongas  ' => 21820,
			'Kec. Anjatan ' => 21821,
			'Kec. Sukra ' => 21822,
			'Kec. Arahan  ' => 21823,
			'Kec. Cantigi ' => 21824,
			'Kec. Gantar  ' => 21825,
			'Kec. Terisi  ' => 21826,
			'Kec. Sukagumiwang  ' => 21827,
			'Kec. Kedokan Bunder ' => 21828,
			'Kec. Pasekan ' => 21829,
			'Kec. Tukdana ' => 21830,
			'Kec. Patrol  ' => 21831,
			'Kab. Subang  ' => 21900,
			'Kec. Sagalaherang  ' => 21901,
			'Kec. Jalancagak  ' => 21902,
			'Kec. Cisalak ' => 21903,
			'Kec. Tanjung Siang ' => 21904,
			'Kec. Cijambe ' => 21905,
			'Kec. Cibogo  ' => 21906,
			'Kec. Subang  ' => 21907,
			'Kec. Kalijati  ' => 21908,
			'Kec. Cipeundeuy  ' => 21909,
			'Kec. Pabuaran  ' => 21910,
			'Kec. Patokbeusi  ' => 21911,
			'Kec. Purwadadi ' => 21912,
			'Kec. Cikaum  ' => 21913,
			'Kec. Pagaden ' => 21914,
			'Kec. Cipunagara  ' => 21915,
			'Kec. Compreng  ' => 21916,
			'Kec. Binong  ' => 21917,
			'Kec. Ciasem  ' => 21918,
			'Kec. Pamanukan ' => 21919,
			'Kec. Pusakanagara  ' => 21920,
			'Kec. Legon Kulon ' => 21921,
			'Kec. Blanakan  ' => 21922,
			'Kec. Dawuan  ' => 21923,
			'Kec. Serang Panjang ' => 21924,
			'Kec. Kasomalang  ' => 21925,
			'Kec. Tambakdahan ' => 21926,
			'Kec. Pagaden Barat ' => 21927,
			'Kec. Pusakajaya  ' => 21928,
			'Kec. Ciater  ' => 21929,
			'Kec. Sukasari  ' => 21930,
			'Kab. Purwakarta  ' => 22000,
			'Kec. Jatiluhur ' => 22001,
			'Kec. Maniis  ' => 22002,
			'Kec. Tegalwaru ' => 22003,
			'Kec. Plered  ' => 22004,
			'Kec. Sukatani  ' => 22005,
			'Kec. Darangdan ' => 22006,
			'Kec. Bojong  ' => 22007,
			'Kec. Wanayasa  ' => 22008,
			'Kec. Pasawahan ' => 22009,
			'Kec. Purwakarta  ' => 22010,
			'Kec. Campaka ' => 22011,
			'Kec. Sukasari  ' => 22012,
			'Kec. Kiarapedes  ' => 22013,
			'Kec. Babakancikao  ' => 22014,
			'Kec. Cibatu  ' => 22015,
			'Kec. Bungursari  ' => 22016,
			'Kec. Pondok Salam  ' => 22017,
			'Kab. Karawang  ' => 22100,
			'Kec. Pangkalan ' => 22101,
			'Kec. Ciampel ' => 22102,
			'Kec. Klari ' => 22104,
			'Kec. Cikampek  ' => 22105,
			'Kec. Tirtamulya  ' => 22106,
			'Kec. Jatisari  ' => 22107,
			'Kec. Lemahabang  ' => 22109,
			'Kec. Telagasari  ' => 22110,
			'Kec. Karawang  ' => 22111,
			'Kec. Rawamerta ' => 22112,
			'Kec. Tempuran  ' => 22113,
			'Kec. Kutawaluya  ' => 22114,
			'Kec. Rengasdengklok ' => 22115,
			'Kec. Pedes ' => 22116,
			'Kec. Cibuaya ' => 22117,
			'Kec. Tirtajaya ' => 22118,
			'Kec. Batujaya  ' => 22119,
			'Kec. Pakisjaya ' => 22120,
			'Kec. Majalaya  ' => 22121,
			'Kec. Jayakerta ' => 22122,
			'Kec. Cilamaya Kulon ' => 22123,
			'Kec. Banyusari ' => 22124,
			'Kec. Kotabaru  ' => 22125,
			'Kec. Cilamaya Wetan ' => 22126,
			'Kec. Purwasari ' => 22127,
			'Kec. Teluk Jambe Barat  ' => 22128,
			'Kec. Teluk Jambe Timur  ' => 22129,
			'Kec. Karawang Timur ' => 22130,
			'Kec. Tegalwaru ' => 22131,
			'Kec. Cilebar ' => 22132,
			'Kec. Karawang Barat ' => 22133,
			'Kab. Bekasi  ' => 22200,
			'Kec. Setu  ' => 22201,
			'Kec. Cibarusah ' => 22203,
			'Kec. Kedung Waringin  ' => 22205,
			'Kec. Cibitung  ' => 22207,
			'Kec. Babelan' => 22209,
			'Kec. Taruma Jaya ' => 22210,
			'Kec. Tembelang ' => 22211,
			'Kec. Sukatani  ' => 22212,
			'Kec. Pebayuran ' => 22213,
			'Kec. Cabangbungin  ' => 22214,
			'Kec. Muara Gembong ' => 22215,
			'Kec. Tambun Selatan ' => 22216,
			'Kec. Tambun Utara  ' => 22217,
			'Kec. Cikarang Barat ' => 22218,
			'Kec. Karang Bahagia ' => 22219,
			'Kec. Cikarang Utara ' => 22220,
			'Kec. Cikarang Selatan   ' => 22221,
			'Kec. Cikarang Timur ' => 22222,
			'Kec. Bojong Mangu  ' => 22223,
			'Kec. Cikarang Pusat ' => 22224,
			'Kec. Sukakarya ' => 22225,
			'Kec. Sukawangi ' => 22226,
			'Kec. Serang Baru ' => 22227,
			'Kec. Tarumajaya' => 22228,
			'Kab. Bandung Barat ' => 22300,
			'Kec. Rongga  ' => 22301,
			'Kec. Gununghalu  ' => 22302,
			'Kec. Sindangkerta  ' => 22303,
			'Kec. Cililin ' => 22304,
			'Kec. Cihampelas  ' => 22305,
			'Kec. Cipongkor ' => 22306,
			'Kec. Batujajar ' => 22307,
			'Kec. Cipatat ' => 22308,
			'Kec. Padalarang  ' => 22309,
			'Kec. Ngamprah  ' => 22310,
			'Kec. Parongpong  ' => 22311,
			'Kec. Lembang ' => 22312,
			'Kec. Cisarua ' => 22313,
			'Kec. Cikalong Wetan ' => 22314,
			'Kec. Cipeundeuy  ' => 22315,
			'Kec. Saguling' => 22316,
			'Kab. Pangandaran' => 22500,
			'Kec. Cijulang' => 22551,
			'Kec. Cimerak' => 22552,
			'Kec. Cigugur' => 22553,
			'Kec. Langkaplancar' => 22554,
			'Kec. Mangunjaya' => 22555,
			'Kec. Padaherang' => 22556,
			'Kec. Kalipucang' => 22557,
			'Kec. Pangandaran' => 22558,
			'Kec. Sidamulih' => 22559,
			'Kec. Parigi' => 22560,
			'Kota Bandung ' => 26000,
			'Kec. Bandung Kulon ' => 26001,
			'Kec. Babakan Ciparay  ' => 26002,
			'Kec. Bojong Loa Kaler   ' => 26003,
			'Kec. Bojong Loa Kidul   ' => 26004,
			'Kec. Astananyar  ' => 26005,
			'Kec. Regol ' => 26006,
			'Kec. Lengkong  ' => 26007,
			'Kec. Bandung Kidul ' => 26008,
			'Kec. Buah Batu ' => 26009,
			'Kec. Rancasari ' => 26010,
			'Kec. Cibiru  ' => 26011,
			'Kec. Ujungberung ' => 26012,
			'Kec. Arcamanik ' => 26013,
			'Kec. Kiaracondong  ' => 26015,
			'Kec. Batununggal ' => 26016,
			'Kec. Sumur Bandung ' => 26017,
			'Kec. Andir ' => 26018,
			'Kec. Cicendo ' => 26019,
			'Kec. Bandung Wetan ' => 26020,
			'Kec. Cibeunying Kidul   ' => 26021,
			'Kec. Cibeunying Kaler   ' => 26022,
			'Kec. Coblong ' => 26023,
			'Kec. Sukajadi  ' => 26024,
			'Kec. Sukasari  ' => 26025,
			'Kec. Cidadap ' => 26026,
			'Kec. Gedebage  ' => 26027,
			'Kec. Panyileukan ' => 26028,
			'Kec. Cinambo ' => 26029,
			'Kec. Mandalajati ' => 26030,
			'Kec. Antapani  ' => 26031,
			'Kota Bogor ' => 26100,
			'Kec. Kota Bogor Selatan ' => 26101,
			'Kec. Kota Bogor Timur   ' => 26102,
			'Kec. Kota Bogor Utara   ' => 26103,
			'Kec. Kota Bogor Tengah  ' => 26104,
			'Kec. Kota Bogor Barat   ' => 26105,
			'Kec. Tanah Sereal  ' => 26106,
			'Kota Sukabumi  ' => 26200,
			'Kec. Baros ' => 26201,
			'Kec. Citamiang ' => 26202,
			'Kec. Warudoyong  ' => 26203,
			'Kec. Gunung Puyuh  ' => 26204,
			'Kec. Cikole  ' => 26205,
			'Kec. Lembur Situ ' => 26206,
			'Kec. Cibeureum ' => 26207,
			'Kota Cirebon ' => 26300,
			'Kec. Harjamukti  ' => 26301,
			'Kec. Lemahwungkuk  ' => 26302,
			'Kec. Pekalipan ' => 26303,
			'Kec. Kesambi ' => 26304,
			'Kec. Kejaksan  ' => 26305,
			'Kota Bekasi  ' => 26500,
			'Kec. Pondokgede  ' => 26501,
			'Kec. Jatiasih  ' => 26502,
			'Kec. Bantargebang  ' => 26503,
			'Kec. Bekasi Timur  ' => 26504,
			'Kec. Bekasi Selatan ' => 26505,
			'Kec. Bekasi Barat  ' => 26506,
			'Kec. Bekasi Utara  ' => 26507,
			'Kec. Jati Sampurna ' => 26508,
			'Kec. Medan Satria  ' => 26509,
			'Kec. Rawalumbu ' => 26510,
			'Kec. Mustika Jaya  ' => 26511,
			'Kec. Pondok Melati ' => 26512,
			'Kota Depok ' => 26600,
			'Kec. Sawangan  ' => 26601,
			'Kec. Pancoran Mas  ' => 26602,
			'Kec. Sukmajaya ' => 26603,
			'Kec. Cimanggis ' => 26604,
			'Kec. Beji  ' => 26605,
			'Kec. Limo  ' => 26606,
			'Kec. Cipayung  ' => 26607,
			'Kec. Cilodong  ' => 26608,
			'Kec. Cinere  ' => 26609,
			'Kec. Tapos ' => 26610,
			'Kec. Bojongsari  ' => 26611,
			'Kota Cimahi  ' => 26700,
			'Kec. Cimahi Selatan ' => 26701,
			'Kec. Cimahi Tengah ' => 26702,
			'Kec. Cimahi Utara  ' => 26703,
			'Kota Tasikmalaya ' => 26800,
			'Kec. Cibeureum ' => 26801,
			'Kec. Tamansari ' => 26802,
			'Kec. Kawalu  ' => 26803,
			'Kec. Mangkubumi  ' => 26804,
			'Kec. Indihiang ' => 26805,
			'Kec. Cipedes ' => 26806,
			'Kec. Cihideung ' => 26807,
			'Kec. Tawang  ' => 26808,
			'Kec. Purbaratu ' => 26809,
			'Kec. Bungursari  ' => 26810,
			'Kota Banjar  ' => 26900,
			'Kec. Banjar  ' => 26901,
			'Kec. Purwaharja  ' => 26902,
			'Kec. Pataruman ' => 26903,
			'Kec. Langensari  ' => 26904,
			'Prov. Jawa Tengah  ' => 30000,
			'Kab. Cilacap ' => 30100,
			'Kec. Dayeuhluhur ' => 30101,
			'Kec. Wanareja  ' => 30102,
			'Kec. Majenang  ' => 30103,
			'Kec. Cimanggu  ' => 30104,
			'Kec. Karangpucung  ' => 30105,
			'Kec. Cipari  ' => 30106,
			'Kec. Sidareja  ' => 30107,
			'Kec. Kedungreja  ' => 30108,
			'Kec. Patimuan  ' => 30109,
			'Kec. Gandrungmangu ' => 30110,
			'Kec. Bantarsari  ' => 30111,
			'Kec. Kawunganten ' => 30112,
			'Kec. Kampung Laut  ' => 30113,
			'Kec. Jeruklegi ' => 30114,
			'Kec. Kesugihan ' => 30115,
			'Kec. Adipala ' => 30116,
			'Kec. Maos  ' => 30117,
			'Kec. Sampang ' => 30118,
			'Kec. Kroya ' => 30119,
			'Kec. Binangun  ' => 30120,
			'Kec. Nusawungu ' => 30121,
			'Kec. Cilacap Selatan  ' => 30122,
			'Kec. Cilacap Tengah ' => 30123,
			'Kec. Cilacap Utara ' => 30124,
			'Kab. Banyumas  ' => 30200,
			'Kec. Lumbir  ' => 30201,
			'Kec. Wangon  ' => 30202,
			'Kec. Jatilawang  ' => 30203,
			'Kec. Rawalo  ' => 30204,
			'Kec. Kebasen ' => 30205,
			'Kec. Kemranjen ' => 30206,
			'Kec. Sumpiuh ' => 30207,
			'Kec. Tambak  ' => 30208,
			'Kec. Somagede  ' => 30209,
			'Kec. Kalibagor ' => 30210,
			'Kec. Banyumas  ' => 30211,
			'Kec. Patikraja ' => 30212,
			'Kec. Purwojati ' => 30213,
			'Kec. Ajibarang ' => 30214,
			'Kec. Gumelar ' => 30215,
			'Kec. Pekuncen  ' => 30216,
			'Kec. Cilongok  ' => 30217,
			'Kec. Karanglewas ' => 30218,
			'Kec. Kedung Banteng ' => 30219,
			'Kec. Baturaden ' => 30220,
			'Kec. Sumbang ' => 30221,
			'Kec. Kembaran  ' => 30222,
			'Kec. Sokaraja  ' => 30223,
			'Kec. Purwokerto Selatan ' => 30224,
			'Kec. Purwokerto Barat   ' => 30225,
			'Kec. Purwokerto Timur   ' => 30226,
			'Kec. Purwokerto Utara   ' => 30227,
			'Kab. Purbalingga ' => 30300,
			'Kec. Kemangkon ' => 30301,
			'Kec. Bukateja  ' => 30302,
			'Kec. Kejobong  ' => 30303,
			'Kec. Pengadegan  ' => 30304,
			'Kec. Kaligondang ' => 30305,
			'Kec. Purbalingga ' => 30306,
			'Kec. Kalimanah ' => 30307,
			'Kec. Padamara  ' => 30308,
			'Kec. Kutasari  ' => 30309,
			'Kec. Bojongsari  ' => 30310,
			'Kec. Mrebet  ' => 30311,
			'Kec. Bobotsari ' => 30312,
			'Kec. Karangreja  ' => 30313,
			'Kec. Karanganyar ' => 30314,
			'Kec. Karangmoncol  ' => 30315,
			'Kec. Rembang ' => 30316,
			'Kec. Karangjambu ' => 30317,
			'Kec. Kertanegara ' => 30318,
			'Kab. Banjarnegara  ' => 30400,
			'Kec. Susukan ' => 30401,
			'Kec. Purworejo/ Klampok ' => 30402,
			'Kec. Mandiraja ' => 30403,
			'Kec. Purwonegara ' => 30404,
			'Kec. Bawang  ' => 30405,
			'Kec. Banjarnegara  ' => 30406,
			'Kec. Sigaluh ' => 30407,
			'Kec. Madukara  ' => 30408,
			'Kec. Banjarmangu ' => 30409,
			'Kec. Wanadadi  ' => 30410,
			'Kec. Rakit ' => 30411,
			'Kec. Punggelan ' => 30412,
			'Kec. Karangkobar ' => 30413,
			'Kec. Pagentan  ' => 30414,
			'Kec. Pejawaran ' => 30415,
			'Kec. Batur ' => 30416,
			'Kec. Wanayasa  ' => 30417,
			'Kec. Kalibening  ' => 30418,
			'Kec. Pandan Arum ' => 30419,
			'Kec. Pagedongan  ' => 30420,
			'Kab. Kebumen ' => 30500,
			'Kec. Ayah  ' => 30501,
			'Kec. Buayan  ' => 30502,
			'Kec. Puring  ' => 30503,
			'Kec. Petanahan ' => 30504,
			'Kec. Klirong ' => 30505,
			'Kec. Bulupesantren ' => 30506,
			'Kec. Ambal ' => 30507,
			'Kec. Mirit ' => 30508,
			'Kec. Prembun ' => 30509,
			'Kec. Kutowinangun  ' => 30510,
			'Kec. Alian ' => 30511,
			'Kec. Kebumen ' => 30512,
			'Kec. Pejagoan  ' => 30513,
			'Kec. Sruweng ' => 30514,
			'Kec. Adimulyo  ' => 30515,
			'Kec. Kuwarasan ' => 30516,
			'Kec. Rowokele  ' => 30517,
			'Kec. Sempor  ' => 30518,
			'Kec. Gombong ' => 30519,
			'Kec. Karanganyar ' => 30520,
			'Kec. Karangganyam  ' => 30521,
			'Kec. Sadang  ' => 30522,
			'Kec. Bonorowo  ' => 30523,
			'Kec. Padureso  ' => 30524,
			'Kec. Poncowarno  ' => 30525,
			'Kec. Karangsambung ' => 30526,
			'Kab. Purworejo ' => 30600,
			'Kec. Grabag  ' => 30601,
			'Kec. Ngombol ' => 30602,
			'Kec. Purwodadi ' => 30603,
			'Kec. Bagelen ' => 30604,
			'Kec. Kaligesing  ' => 30605,
			'Kec. Purworejo ' => 30606,
			'Kec. Banyu Urip  ' => 30607,
			'Kec. Bayan ' => 30608,
			'Kec. Kutoarjo  ' => 30609,
			'Kec. Butuh ' => 30610,
			'Kec. Pituruh ' => 30611,
			'Kec. Kemiri  ' => 30612,
			'Kec. Bruno ' => 30613,
			'Kec. Gebang  ' => 30614,
			'Kec. Loano ' => 30615,
			'Kec. Bener ' => 30616,
			'Kab. Wonosobo  ' => 30700,
			'Kec. Wadaslintang  ' => 30701,
			'Kec. Kepil ' => 30702,
			'Kec. Sapuran ' => 30703,
			'Kec. Kaliwiro  ' => 30704,
			'Kec. Leksono ' => 30705,
			'Kec. Selomerto ' => 30706,
			'Kec. Kalikajar ' => 30707,
			'Kec. Kertek  ' => 30708,
			'Kec. Wonosobo  ' => 30709,
			'Kec. Watumalang  ' => 30710,
			'Kec. Mojotengah  ' => 30711,
			'Kec. Garung  ' => 30712,
			'Kec. Kejajar ' => 30713,
			'Kec. Sukoharjo ' => 30714,
			'Kec. Kalibawang  ' => 30715,
			'Kab. Magelang  ' => 30800,
			'Kec. Salaman ' => 30801,
			'Kec. Borobudur ' => 30802,
			'Kec. Ngluwar ' => 30803,
			'Kec. Salam ' => 30804,
			'Kec. Srumbung  ' => 30805,
			'Kec. Dukun ' => 30806,
			'Kec. Muntilan  ' => 30807,
			'Kec. Mungkid ' => 30808,
			'Kec. Sawangan  ' => 30809,
			'Kec. Candimulyo  ' => 30810,
			'Kec. Martoyudan  ' => 30811,
			'Kec. Tempuran  ' => 30812,
			'Kec. Kajoran ' => 30813,
			'Kec. Kaliangkrik ' => 30814,
			'Kec. Bandongan ' => 30815,
			'Kec. Windusari ' => 30816,
			'Kec. Secang  ' => 30817,
			'Kec. Tegalrejo ' => 30818,
			'Kec. Pakis ' => 30819,
			'Kec. Grabag  ' => 30820,
			'Kec. Ngablak ' => 30821,
			'Kab. Boyolali  ' => 30900,
			'Kec. Selo  ' => 30901,
			'Kec. Ampel ' => 30902,
			'Kec. Cepogo  ' => 30903,
			'Kec. Musuk ' => 30904,
			'Kec. Boyolali  ' => 30905,
			'Kec. Mojosongo ' => 30906,
			'Kec. Teras ' => 30907,
			'Kec. Sawit ' => 30908,
			'Kec. Banyudono ' => 30909,
			'Kec. Sambi ' => 30910,
			'Kec. Ngemplak  ' => 30911,
			'Kec. Nogosari  ' => 30912,
			'Kec. Simo  ' => 30913,
			'Kec. Karanggede  ' => 30914,
			'Kec. Klego ' => 30915,
			'Kec. Andong  ' => 30916,
			'Kec. Kemusu  ' => 30917,
			'Kec. Wonosegoro  ' => 30918,
			'Kec. Juwangi ' => 30919,
			'Kab. Klaten  ' => 31000,
			'Kec. Prambanan ' => 31001,
			'Kec. Gantiwarno  ' => 31002,
			'Kec. Wedi  ' => 31003,
			'Kec. Bayat ' => 31004,
			'Kec. Cawas ' => 31005,
			'Kec. Trucuk  ' => 31006,
			'Kec. Kalikotes ' => 31007,
			'Kec. Kebonarum ' => 31008,
			'Kec. Jogonalan ' => 31009,
			'Kec. Manisrenggo ' => 31010,
			'Kec. Karangnongko  ' => 31011,
			'Kec. Ngawen  ' => 31012,
			'Kec. Ceper ' => 31013,
			'Kec. Pedan ' => 31014,
			'Kec. Karangdowo  ' => 31015,
			'Kec. Juwiring  ' => 31016,
			'Kec. Wonosari  ' => 31017,
			'Kec. Delanggu  ' => 31018,
			'Kec. Polanharjo  ' => 31019,
			'Kec. Karanganom  ' => 31020,
			'Kec. Tulung  ' => 31021,
			'Kec. Jatinom ' => 31022,
			'Kec. Kemalang  ' => 31023,
			'Kec. Klaten Selatan ' => 31024,
			'Kec. Klaten Tengah ' => 31025,
			'Kec. Klaten Utara  ' => 31026,
			'Kab. Sukoharjo ' => 31100,
			'Kec. Weru  ' => 31101,
			'Kec. Bulu  ' => 31102,
			'Kec. Tawangsari  ' => 31103,
			'Kec. Sukoharjo ' => 31104,
			'Kec. Nguter  ' => 31105,
			'Kec. Bendosari ' => 31106,
			'Kec. Polokarto ' => 31107,
			'Kec. Mojolaban ' => 31108,
			'Kec. Grogol  ' => 31109,
			'Kec. Baki  ' => 31110,
			'Kec. Gatak ' => 31111,
			'Kec. Kartasura ' => 31112,
			'Kab. Wonogiri  ' => 31200,
			'Kec. Pracimantoro  ' => 31201,
			'Kec. Paranggupito  ' => 31202,
			'Kec. Giritontro  ' => 31203,
			'Kec. Giriwoyo  ' => 31204,
			'Kec. Batuwarno ' => 31205,
			'Kec. Karangtengah  ' => 31206,
			'Kec. Tirtomoyo ' => 31207,
			'Kec. Nguntoronadi  ' => 31208,
			'Kec. Baturetno ' => 31209,
			'Kec. Eromoko ' => 31210,
			'Kec. Wuryantoro  ' => 31211,
			'Kec. Manyaran  ' => 31212,
			'Kec. Selogiri  ' => 31213,
			'Kec. Wonogiri  ' => 31214,
			'Kec. Ngadirojo ' => 31215,
			'Kec. Sidoharjo ' => 31216,
			'Kec. Jatiroto  ' => 31217,
			'Kec. Kismantoro  ' => 31218,
			'Kec. Purwantoro  ' => 31219,
			'Kec. Bulukerto ' => 31220,
			'Kec. Slogohimo ' => 31221,
			'Kec. Jatisrono ' => 31222,
			'Kec. Jatipurno ' => 31223,
			'Kec. Girimarto ' => 31224,
			'Kec. Puhpelem  ' => 31225,
			'Kab. Karanganyar ' => 31300,
			'Kec. Jatipuro  ' => 31301,
			'Kec. Jatiyoso  ' => 31302,
			'Kec. Jumapolo  ' => 31303,
			'Kec. Jumantono ' => 31304,
			'Kec. Matesih ' => 31305,
			'Kec. Tawangmangu ' => 31306,
			'Kec. Ngargoyoso  ' => 31307,
			'Kec. Karangpandan  ' => 31308,
			'Kec. Karanganyar ' => 31309,
			'Kec. Tasikmadu ' => 31310,
			'Kec. Jaten ' => 31311,
			'Kec. Colomadu  ' => 31312,
			'Kec. Gondangrejo ' => 31313,
			'Kec. Kebakkramat ' => 31314,
			'Kec. Mojogedang  ' => 31315,
			'Kec. Kerjo ' => 31316,
			'Kec. Jenawi  ' => 31317,
			'Kab. Sragen  ' => 31400,
			'Kec. Kalijambe ' => 31401,
			'Kec. Plupuh  ' => 31402,
			'Kec. Masaran ' => 31403,
			'Kec. Kedawung  ' => 31404,
			'Kec. Sambirejo ' => 31405,
			'Kec. Gondang ' => 31406,
			'Kec. Sambung Macan ' => 31407,
			'Kec. Ngrampal  ' => 31408,
			'Kec. Karangmalang  ' => 31409,
			'Kec. Sragen  ' => 31410,
			'Kec. Sidoharjo ' => 31411,
			'Kec. Tanon ' => 31412,
			'Kec. Gemolong  ' => 31413,
			'Kec. Miri  ' => 31414,
			'Kec. Sumberlawang  ' => 31415,
			'Kec. Mondokan  ' => 31416,
			'Kec. Sukodono  ' => 31417,
			'Kec. Gesi  ' => 31418,
			'Kec. Tangen  ' => 31419,
			'Kec. Jenar ' => 31420,
			'Kab. Grobogan  ' => 31500,
			'Kec. Kedungjati  ' => 31501,
			'Kec. Karangrayung  ' => 31502,
			'Kec. Penawangan  ' => 31503,
			'Kec. Toroh ' => 31504,
			'Kec. Geyer ' => 31505,
			'Kec. Pulokulon ' => 31506,
			'Kec. Kradenan  ' => 31507,
			'Kec. Gabus ' => 31508,
			'Kec. Ngaringan ' => 31509,
			'Kec. Wirosari  ' => 31510,
			'Kec. Tawangharjo ' => 31511,
			'Kec. Grobogan  ' => 31512,
			'Kec. Purwodadi ' => 31513,
			'Kec. Brati ' => 31514,
			'Kec. Klambu  ' => 31515,
			'Kec. Godong  ' => 31516,
			'Kec. Gubug ' => 31517,
			'Kec. Tegowanu  ' => 31518,
			'Kec. Tanggungharjo ' => 31519,
			'Kab. Blora ' => 31600,
			'Kec. Jati  ' => 31601,
			'Kec. Randublatung  ' => 31602,
			'Kec. Kradenan  ' => 31603,
			'Kec. Kedungtuban ' => 31604,
			'Kec. Cepu  ' => 31605,
			'Kec. Sambong ' => 31606,
			'Kec. Jiken ' => 31607,
			'Kec. Bogorejo  ' => 31608,
			'Kec. Jepon ' => 31609,
			'Kec. Kota Blora  ' => 31610,
			'Kec. Banjarejo ' => 31611,
			'Kec. Tunjungan ' => 31612,
			'Kec. Japah ' => 31613,
			'Kec. Ngawen  ' => 31614,
			'Kec. Kunduran  ' => 31615,
			'Kec. Todanan ' => 31616,
			'Kab. Rembang ' => 31700,
			'Kec. Sumber  ' => 31701,
			'Kec. Bulu  ' => 31702,
			'Kec. Gunem ' => 31703,
			'Kec. Sale  ' => 31704,
			'Kec. Sarang  ' => 31705,
			'Kec. Sedan ' => 31706,
			'Kec. Pamotan ' => 31707,
			'Kec. Sulang  ' => 31708,
			'Kec. Kaliori ' => 31709,
			'Kec. Rembang ' => 31710,
			'Kec. Pancur  ' => 31711,
			'Kec. Kragan  ' => 31712,
			'Kec. Sluke ' => 31713,
			'Kec. Lasem ' => 31714,
			'Kab. Pati  ' => 31800,
			'Kec. Sukolilo  ' => 31801,
			'Kec. Kayen ' => 31802,
			'Kec. Tambakromo  ' => 31803,
			'Kec. Winong  ' => 31804,
			'Kec. Pucakwangi  ' => 31805,
			'Kec. Jaken ' => 31806,
			'Kec. Batangan  ' => 31807,
			'Kec. Juwana  ' => 31808,
			'Kec. Jakenan ' => 31809,
			'Kec. Pati  ' => 31810,
			'Kec. Gabus ' => 31811,
			'Kec. Margorejo ' => 31812,
			'Kec. Gembong ' => 31813,
			'Kec. Tlogowungu  ' => 31814,
			'Kec. Wedarijaksa ' => 31815,
			'Kec. Trangkil  ' => 31816,
			'Kec. Margoyoso ' => 31817,
			'Kec. Gunung Wungkal ' => 31818,
			'Kec. Cluwak  ' => 31819,
			'Kec. Tayu  ' => 31820,
			'Kec. Dukuhseti ' => 31821,
			'Kab. Kudus ' => 31900,
			'Kec. Kaliwungu ' => 31901,
			'Kec. Kota Kudus  ' => 31902,
			'Kec. Jati  ' => 31903,
			'Kec. Undaan  ' => 31904,
			'Kec. Mejobo  ' => 31905,
			'Kec. Jekulo  ' => 31906,
			'Kec. Bae   ' => 31907,
			'Kec. Gebog ' => 31908,
			'Kec. Dawe  ' => 31909,
			'Kab. Jepara  ' => 32000,
			'Kec. Kedung  ' => 32001,
			'Kec. Pecangaan ' => 32002,
			'Kec. Welahan ' => 32003,
			'Kec. Mayong  ' => 32004,
			'Kec. Nalumsari ' => 32005,
			'Kec. Batealit  ' => 32006,
			'Kec. Tahunan ' => 32007,
			'Kec. Jepara  ' => 32008,
			'Kec. Mlonggo ' => 32009,
			'Kec. Bangsri ' => 32010,
			'Kec. Keling  ' => 32011,
			'Kec. Karimunjawa ' => 32012,
			'Kec. Kalinyamatan  ' => 32013,
			'Kec. Kembang ' => 32014,
			'Kec. Donorojo  ' => 32015,
			'Kec. Pakis Aji ' => 32016,
			'Kab. Demak ' => 32100,
			'Kec. Mranggen  ' => 32101,
			'Kec. Karangawen  ' => 32102,
			'Kec. Guntur  ' => 32103,
			'Kec. Sayung  ' => 32104,
			'Kec. Karang Tengah ' => 32105,
			'Kec. Bonang  ' => 32106,
			'Kec. Demak ' => 32107,
			'Kec. Wonosalam ' => 32108,
			'Kec. Dempet  ' => 32109,
			'Kec. Gajah ' => 32110,
			'Kec. Karanganyar ' => 32111,
			'Kec. Mijen ' => 32112,
			'Kec. Wedung  ' => 32113,
			'Kec. Kebonagung  ' => 32114,
			'Kab. Semarang  ' => 32200,
			'Kec. Getasan ' => 32201,
			'Kec. Tengaran  ' => 32202,
			'Kec. Susukan ' => 32203,
			'Kec. Suruh ' => 32204,
			'Kec. Pabelan ' => 32205,
			'Kec. Tuntang ' => 32206,
			'Kec. Banyubiru ' => 32207,
			'Kec. Jambu ' => 32208,
			'Kec. Sumowono  ' => 32209,
			'Kec. Ambarawa  ' => 32210,
			'Kec. Bawen ' => 32211,
			'Kec. Bringin ' => 32212,
			'Kec. Pringapus ' => 32213,
			'Kec. Bergas  ' => 32214,
			'Kec. Kaliwungu ' => 32217,
			'Kec. Bancak  ' => 32218,
			'Kec. Ungaran Barat ' => 32219,
			'Kec. Ungaran Timur ' => 32220,
			'Kec. Bandungan ' => 32221,
			'Kab. Temanggung  ' => 32300,
			'Kec. Parakan ' => 32301,
			'Kec. Bulu  ' => 32302,
			'Kec. Temanggung  ' => 32303,
			'Kec. Tembarak  ' => 32304,
			'Kec. Kranggan  ' => 32305,
			'Kec. Pringsurat  ' => 32306,
			'Kec. Kaloran ' => 32307,
			'Kec. Kandangan ' => 32308,
			'Kec. Kedu  ' => 32309,
			'Kec. Ngadirejo ' => 32310,
			'Kec. Jumo  ' => 32311,
			'Kec. Candiroto ' => 32312,
			'Kec. Tretep  ' => 32313,
			'Kec. Kledung ' => 32314,
			'Kec. Bansari ' => 32315,
			'Kec. Tlogomulyo  ' => 32316,
			'Kec. Selopampang ' => 32317,
			'Kec. Gemawang  ' => 32318,
			'Kec. Bejen ' => 32319,
			'Kec. Wonoboyo  ' => 32320,
			'Kab. Kendal  ' => 32400,
			'Kec. Plantungan  ' => 32401,
			'Kec. Sukorejo  ' => 32402,
			'Kec. Pegeruyung  ' => 32403,
			'Kec. Patean  ' => 32404,
			'Kec. Singorojo ' => 32405,
			'Kec. Limbangan ' => 32406,
			'Kec. Boja  ' => 32407,
			'Kec. Kaliwungu ' => 32408,
			'Kec. Brangsong ' => 32409,
			'Kec. Pegandon  ' => 32410,
			'Kec. Gemuh ' => 32411,
			'Kec. Waleri  ' => 32412,
			'Kec. Rowosari  ' => 32413,
			'Kec. Kangkung  ' => 32414,
			'Kec. Cipiring  ' => 32415,
			'Kec. Patebon ' => 32416,
			'Kec. Kota Kendal ' => 32417,
			'Kec. Ngampel ' => 32418,
			'Kec. Ringinarum  ' => 32419,
			'Kec. Kaliwungu Selatan  ' => 32420,
			'Kab. Batang  ' => 32500,
			'Kec. Wonotunggal ' => 32501,
			'Kec. Bandar  ' => 32502,
			'Kec. Blado ' => 32503,
			'Kec. Reban ' => 32504,
			'Kec. Bawang  ' => 32505,
			'Kec. Tersono ' => 32506,
			'Kec. Gringsing ' => 32507,
			'Kec. Limpung ' => 32508,
			'Kec. Subah ' => 32509,
			'Kec. Tulis ' => 32510,
			'Kec. Batang  ' => 32511,
			'Kec. Warung Asem ' => 32512,
			'Kec. Banyuputih  ' => 32513,
			'Kec. Pecalungan  ' => 32514,
			'Kec. Kandeman  ' => 32515,
			'Kab. Pekalongan  ' => 32600,
			'Kec. Kandang Serang ' => 32601,
			'Kec. Peninggaran ' => 32602,
			'Kec. Lebakbarang ' => 32603,
			'Kec. Petungkriono  ' => 32604,
			'Kec. Talun ' => 32605,
			'Kec. Doro  ' => 32606,
			'Kec. Karanganyar ' => 32607,
			'Kec. Kajen ' => 32608,
			'Kec. Kesesi  ' => 32609,
			'Kec. Sragi ' => 32610,
			'Kec. Bojong  ' => 32611,
			'Kec. Wonopringgo ' => 32612,
			'Kec. Kedungwuni  ' => 32613,
			'Kec. Buaran  ' => 32614,
			'Kec. Tirto ' => 32615,
			'Kec. Wiradesa  ' => 32616,
			'Kec. Siwalan ' => 32617,
			'Kec. Karangdadap ' => 32618,
			'Kec. Wonokerto ' => 32619,
			'Kab. Pemalang  ' => 32700,
			'Kec. Moga  ' => 32701,
			'Kec. Pulosari  ' => 32702,
			'Kec. Belik ' => 32703,
			'Kec. Watukumpul  ' => 32704,
			'Kec. Bodeh ' => 32705,
			'Kec. Bantarbolang  ' => 32706,
			'Kec. Randudongkel  ' => 32707,
			'Kec. Pemalang  ' => 32708,
			'Kec. Taman ' => 32709,
			'Kec. Petarukan ' => 32710,
			'Kec. Ampelgading ' => 32711,
			'Kec. Comal ' => 32712,
			'Kec. Ulujami ' => 32713,
			'Kec. Warungpring ' => 32714,
			'Kab. Tegal ' => 32800,
			'Kec. Margasari ' => 32801,
			'Kec. Bumijawa  ' => 32802,
			'Kec. Bojong  ' => 32803,
			'Kec. Balapulang  ' => 32804,
			'Kec. Pagerbarang ' => 32805,
			'Kec. Lebaksiu  ' => 32806,
			'Kec. Jatinegara  ' => 32807,
			'Kec. Kedung Banteng ' => 32808,
			'Kec. Pangkah ' => 32809,
			'Kec. Slawi ' => 32810,
			'Kec. Dukuhwaru ' => 32811,
			'Kec. Adiwerna  ' => 32812,
			'Kec. Dukuhturi ' => 32813,
			'Kec. Talang  ' => 32814,
			'Kec. Tarub ' => 32815,
			'Kec. Kramat  ' => 32816,
			'Kec. Suradadi  ' => 32817,
			'Kec. Warureja  ' => 32818,
			'Kab. Brebes  ' => 32900,
			'Kec. Salem ' => 32901,
			'Kec. Bantarkawung  ' => 32902,
			'Kec. Bumiayu ' => 32903,
			'Kec. Paguyangan  ' => 32904,
			'Kec. Sirampog  ' => 32905,
			'Kec. Tonjong ' => 32906,
			'Kec. Larangan  ' => 32907,
			'Kec. Ketanggungan  ' => 32908,
			'Kec. Banjarharjo ' => 32909,
			'Kec. Losari  ' => 32910,
			'Kec. Tanjung ' => 32911,
			'Kec. Kersana ' => 32912,
			'Kec. Bulakamba ' => 32913,
			'Kec. Wanasari  ' => 32914,
			'Kec. Songgom ' => 32915,
			'Kec. Jatibarang  ' => 32916,
			'Kec. Brebes  ' => 32917,
			'Kota Magelang  ' => 36000,
			'Kec. Magelang Selatan   ' => 36001,
			'Kec. Magelang Utara ' => 36002,
			'Kec. Magelang Tengah  ' => 36003,
			'Kota Surakarta ' => 36100,
			'Kec. Laweyan ' => 36101,
			'Kec. Serengan  ' => 36102,
			'Kec. Pasarkliwon ' => 36103,
			'Kec. Jebres  ' => 36104,
			'Kec. Banjarsari  ' => 36105,
			'Kota Salatiga  ' => 36200,
			'Kec. Argomulyo ' => 36201,
			'Kec. Tingkir ' => 36202,
			'Kec. Sidomukti ' => 36203,
			'Kec. Sidorejo  ' => 36204,
			'Kota Semarang  ' => 36300,
			'Kec. Mijen ' => 36301,
			'Kec. Gunung Pati ' => 36302,
			'Kec. Banyumanik  ' => 36303,
			'Kec. Gajah Mungkur ' => 36304,
			'Kec. Semarang Selatan   ' => 36305,
			'Kec. Candisari ' => 36306,
			'Kec. Tembalang ' => 36307,
			'Kec. Pedurungan  ' => 36308,
			'Kec. Genuk ' => 36309,
			'Kec. Gayamsari ' => 36310,
			'Kec. Semarang Timur ' => 36311,
			'Kec. Semarang Tengah  ' => 36312,
			'Kec. Semarang Utara ' => 36313,
			'Kec. Semarang Barat ' => 36314,
			'Kec. Tugu  ' => 36315,
			'Kec. Ngaliyan  ' => 36316,
			'Kota Pekalongan  ' => 36400,
			'Kec. Pekalongan Barat   ' => 36401,
			'Kec. Pekalongan Timur   ' => 36402,
			'Kec. Pekalongan Selatan ' => 36403,
			'Kec. Pekalongan Utara   ' => 36404,
			'Kota Tegal ' => 36500,
			'Kec. Tegal Selatan ' => 36501,
			'Kec. Tegal Timur ' => 36502,
			'Kec. Tegal Barat ' => 36503,
			'Kec. Margadana ' => 36504,
			'Prov. D.I. Yogyakarta   ' => 40000,
			'Kab. Bantul  ' => 40100,
			'Kec. Srandakan ' => 40101,
			'Kec. Sanden  ' => 40102,
			'Kec. Kretek  ' => 40103,
			'Kec. Pundong ' => 40104,
			'Kec. Bambang Lipuro ' => 40105,
			'Kec. Pandak  ' => 40106,
			'Kec. Bantul  ' => 40107,
			'Kec. Jetis ' => 40108,
			'Kec. Imogiri ' => 40109,
			'Kec. Dlingo  ' => 40110,
			'Kec. Pleret  ' => 40111,
			'Kec. Piyungan  ' => 40112,
			'Kec. Banguntapan ' => 40113,
			'Kec. Sewon ' => 40114,
			'Kec. Kasihan ' => 40115,
			'Kec. Pajangan  ' => 40116,
			'Kec. Sedayu  ' => 40117,
			'Kab. Sleman  ' => 40200,
			'Kec. Moyudan ' => 40201,
			'Kec. Minggir ' => 40202,
			'Kec. Seyegan ' => 40203,
			'Kec. Godean  ' => 40204,
			'Kec. Gamping ' => 40205,
			'Kec. Mlati ' => 40206,
			'Kec. Depok ' => 40207,
			'Kec. Berbah  ' => 40208,
			'Kec. Prambanan ' => 40209,
			'Kec. Kalasan ' => 40210,
			'Kec. Ngemplak  ' => 40211,
			'Kec. Ngaglik ' => 40212,
			'Kec. Sleman  ' => 40213,
			'Kec. Tempel  ' => 40214,
			'Kec. Turi  ' => 40215,
			'Kec. Pekem ' => 40216,
			'Kec. Cangkringan ' => 40217,
			'Kec. Gamping' => 40218,
			'Kab. Gunung Kidul  ' => 40300,
			'Kec. Panggang  ' => 40301,
			'Kec. Paliyan ' => 40302,
			'Kec. Sapto Sari  ' => 40303,
			'Kec. Tepus ' => 40304,
			'Kec. Rongkop ' => 40305,
			'Kec. Semanu  ' => 40306,
			'Kec. Ponjong ' => 40307,
			'Kec. Karangmojo  ' => 40308,
			'Kec. Wonosari  ' => 40309,
			'Kec. Playen  ' => 40310,
			'Kec. Patuk ' => 40311,
			'Kec. Gedang Sari ' => 40312,
			'Kec. Nglipar ' => 40313,
			'Kec. Ngawen  ' => 40314,
			'Kec. Semin ' => 40315,
			'Kec. Purwosari ' => 40316,
			'Kec. Girisubo  ' => 40317,
			'Kec. Tanjungsari ' => 40318,
			'Kab. Kulon Progo ' => 40400,
			'Kec. Temon ' => 40401,
			'Kec. Wates ' => 40402,
			'Kec. Panjatan  ' => 40403,
			'Kec. Galur ' => 40404,
			'Kec. Lendah  ' => 40405,
			'Kec. Sentolo ' => 40406,
			'Kec. Pengasih  ' => 40407,
			'Kec. Kokap ' => 40408,
			'Kec. Girimulyo ' => 40409,
			'Kec. Nanggulan ' => 40410,
			'Kec. Kalibawang  ' => 40411,
			'Kec. Samigaluh ' => 40412,
			'Kota Yogyakarta  ' => 46000,
			'Kec. Mantrijeron ' => 46001,
			'Kec. Kraton  ' => 46002,
			'Kec. Mergangsan  ' => 46003,
			'Kec. Umbulharjo  ' => 46004,
			'Kec. Kotagede  ' => 46005,
			'Kec. Gondokusuman  ' => 46006,
			'Kec. Danurejan ' => 46007,
			'Kec. Pakualaman  ' => 46008,
			'Kec. Gondomanan  ' => 46009,
			'Kec. Ngampilan ' => 46010,
			'Kec. Wirobrajan  ' => 46011,
			'Kec. Gedongtengen  ' => 46012,
			'Kec. Jetis ' => 46013,
			'Kec. Tegalrejo ' => 46014,
			'Kec. Gamping' => 46015,
			'Prov. Jawa Timur ' => 50000,
			'Kab. Gresik  ' => 50100,
			'Kec. Wringin Anom  ' => 50101,
			'Kec. Driyorejo ' => 50102,
			'Kec. Kedamean  ' => 50103,
			'Kec. Menganti  ' => 50104,
			'Kec. Cerme ' => 50105,
			'Kec. Benjeng ' => 50106,
			'Kec. Balong Panggang  ' => 50107,
			'Kec. Duduk Sampeyan ' => 50108,
			'Kec. Kebomas ' => 50109,
			'Kec. Gresik  ' => 50110,
			'Kec. Manyar  ' => 50111,
			'Kec. Bungah  ' => 50112,
			'Kec. Sidayu  ' => 50113,
			'Kec. Dukun ' => 50114,
			'Kec. Panceng ' => 50115,
			'Kec. Ujung Pangkah ' => 50116,
			'Kec. Sangkapura  ' => 50117,
			'Kec. Tambak  ' => 50118,
			'Kab. Sidoarjo  ' => 50200,
			'Kec. Tarik ' => 50201,
			'Kec. Prambon ' => 50202,
			'Kec. Krembung  ' => 50203,
			'Kec. Porong  ' => 50204,
			'Kec. Jabon ' => 50205,
			'Kec. Tanggulangin  ' => 50206,
			'Kec. Candi ' => 50207,
			'Kec. Tulangan  ' => 50208,
			'Kec. Wonoayu ' => 50209,
			'Kec. Sukodono  ' => 50210,
			'Kec. Sidoarjo  ' => 50211,
			'Kec. Buduran ' => 50212,
			'Kec. Sedati  ' => 50213,
			'Kec. Waru  ' => 50214,
			'Kec. Gedangan  ' => 50215,
			'Kec. Taman ' => 50216,
			'Kec. Krian ' => 50217,
			'Kec. Balong Bendo  ' => 50218,
			'Kab. Mojokerto ' => 50300,
			'Kec. Jatirejo  ' => 50301,
			'Kec. Gondang ' => 50302,
			'Kec. Pacet ' => 50303,
			'Kec. Trawas  ' => 50304,
			'Kec. Ngoro ' => 50305,
			'Kec. Pungging  ' => 50306,
			'Kec. Kutorejo  ' => 50307,
			'Kec. Mojosari  ' => 50308,
			'Kec. Bangsal ' => 50309,
			'Kec. Dlanggu ' => 50310,
			'Kec. Puri  ' => 50311,
			'Kec. Trowulan  ' => 50312,
			'Kec. Sooko ' => 50313,
			'Kec. Gedek ' => 50314,
			'Kec. Kemlagi ' => 50315,
			'Kec. Jetis ' => 50316,
			'Kec. Dawar Blandong ' => 50317,
			'Kec. Mojoanyar ' => 50318,
			'Kab. Jombang ' => 50400,
			'Kec. Bandar Kedung Mulyo  ' => 50401,
			'Kec. Perak ' => 50402,
			'Kec. Gudo  ' => 50403,
			'Kec. Diwek ' => 50404,
			'Kec. Ngoro ' => 50405,
			'Kec. Mojowarno ' => 50406,
			'Kec. Bareng  ' => 50407,
			'Kec. Wonosalam ' => 50408,
			'Kec. Mojoagung ' => 50409,
			'Kec. Somobito  ' => 50410,
			'Kec. Jogo Roto ' => 50411,
			'Kec. Peterongan  ' => 50412,
			'Kec. Jombang ' => 50413,
			'Kec. Megaluh ' => 50414,
			'Kec. Tembelang ' => 50415,
			'Kec. Kesamben  ' => 50416,
			'Kec. Kudu  ' => 50417,
			'Kec. Ploso ' => 50418,
			'Kec. Kabuh ' => 50419,
			'Kec. Plandaan  ' => 50420,
			'Kec. Ngusikan  ' => 50421,
			'Kab. Bojonegoro  ' => 50500,
			'Kec. Margomulyo  ' => 50501,
			'Kec. Ngraho  ' => 50502,
			'Kec. Tambakrejo  ' => 50503,
			'Kec. Ngambon ' => 50504,
			'Kec. Bubulan ' => 50505,
			'Kec. Temayang  ' => 50506,
			'Kec. Sugihwaras  ' => 50507,
			'Kec. Kedungadem  ' => 50508,
			'Kec. Kepoh Baru  ' => 50509,
			'Kec. Baureno ' => 50510,
			'Kec. Kanor ' => 50511,
			'Kec. Sumberrejo  ' => 50512,
			'Kec. Balen ' => 50513,
			'Kec. Sukosewu  ' => 50514,
			'Kec. Kapas ' => 50515,
			'Kec. Bojonegoro  ' => 50516,
			'Kec. Trucuk  ' => 50517,
			'Kec. Dander  ' => 50518,
			'Kec. Ngasem  ' => 50519,
			'Kec. Kalitidu  ' => 50520,
			'Kec. Malo  ' => 50521,
			'Kec. Purwosari ' => 50522,
			'Kec. Padangan  ' => 50523,
			'Kec. Kasiman ' => 50524,
			'Kec. Kedewan ' => 50525,
			'Kec. Gondang ' => 50526,
			'Kec. Sekar ' => 50527,
			'Kec. Gayam' => 50528,
			'Kab. Tuban ' => 50600,
			'Kec. Kenduruan ' => 50601,
			'Kec. Bangilan  ' => 50602,
			'Kec. Senori  ' => 50603,
			'Kec. Singgahan ' => 50604,
			'Kec. Montong ' => 50605,
			'Kec. Parengan  ' => 50606,
			'Kec. Soko  ' => 50607,
			'Kec. Rengel  ' => 50608,
			'Kec. Plumpang  ' => 50609,
			'Kec. Widang  ' => 50610,
			'Kec. Palang  ' => 50611,
			'Kec. Semanding ' => 50612,
			'Kec. Tuban ' => 50613,
			'Kec. Jenu  ' => 50614,
			'Kec. Merakurak ' => 50615,
			'Kec. Kerek ' => 50616,
			'Kec. Tambakboyo  ' => 50617,
			'Kec. Jatirogo  ' => 50618,
			'Kec. Bancar  ' => 50619,
			'Kec. Grabagan  ' => 50620,
			'Kab. Lamongan  ' => 50700,
			'Kec. Sukorame  ' => 50701,
			'Kec. Bluluk  ' => 50702,
			'Kec. Ngimbang  ' => 50703,
			'Kec. Sambeng ' => 50704,
			'Kec. Mantup  ' => 50705,
			'Kec. Kambang Bahu  ' => 50706,
			'Kec. Sugio ' => 50707,
			'Kec. Kedungpring ' => 50708,
			'Kec. Modo  ' => 50709,
			'Kec. Babat ' => 50710,
			'Kec. Pucuk ' => 50711,
			'Kec. Sukodadi  ' => 50712,
			'Kec. Lamongan  ' => 50713,
			'Kec. Tikung  ' => 50714,
			'Kec. Deket ' => 50715,
			'Kec. Glagah  ' => 50716,
			'Kec. Karangbinangun ' => 50717,
			'Kec. Turi  ' => 50718,
			'Kec. Kalitengah  ' => 50719,
			'Kec. Karang Geneng ' => 50720,
			'Kec. Sekaran ' => 50721,
			'Kec. Maduran ' => 50722,
			'Kec. Laren ' => 50723,
			'Kec. Solokuro  ' => 50724,
			'Kec. Paciran ' => 50725,
			'Kec. Brondong  ' => 50726,
			'Kec. Sarirejo  ' => 50727,
			'Kab. Madiun  ' => 50800,
			'Kec. Kebonsari ' => 50801,
			'Kec. Geger ' => 50802,
			'Kec. Dolopo  ' => 50803,
			'Kec. Dagangan  ' => 50804,
			'Kec. Wungu ' => 50805,
			'Kec. Kare  ' => 50806,
			'Kec. Gemarang  ' => 50807,
			'Kec. Saradan ' => 50808,
			'Kec. Pilangkenceng ' => 50809,
			'Kec. Mejayan ' => 50810,
			'Kec. Wonoasri  ' => 50811,
			'Kec. Balerejo  ' => 50812,
			'Kec. Madiun  ' => 50813,
			'Kec. Sawahan ' => 50814,
			'Kec. Jiwan ' => 50815,
			'Kab. Ngawi ' => 50900,
			'Kec. Sine  ' => 50901,
			'Kec. Ngrambe ' => 50902,
			'Kec. Jogorogo  ' => 50903,
			'Kec. Kendal  ' => 50904,
			'Kec. Geneng  ' => 50905,
			'Kec. Kwadungan ' => 50906,
			'Kec. Pangkur ' => 50907,
			'Kec. Karangjati  ' => 50908,
			'Kec. Bringin ' => 50909,
			'Kec. Padas ' => 50910,
			'Kec. Ngawi ' => 50911,
			'Kec. Paron ' => 50912,
			'Kec. Kedunggalar ' => 50913,
			'Kec. Pitu  ' => 50914,
			'Kec. Widodaren ' => 50915,
			'Kec. Mantingan ' => 50916,
			'Kec. Karanganyar ' => 50917,
			'Kec. Gerih ' => 50918,
			'Kec. Kasreman  ' => 50919,
			'Kab. Magetan ' => 51000,
			'Kec. Poncol  ' => 51001,
			'Kec. Parang  ' => 51002,
			'Kec. Lembeyan  ' => 51003,
			'Kec. Takeran ' => 51004,
			'Kec. Kawedanan ' => 51005,
			'Kec. Magetan ' => 51006,
			'Kec. Plaosan ' => 51007,
			'Kec. Panekan ' => 51008,
			'Kec. Sukomoro  ' => 51009,
			'Kec. Bendo ' => 51010,
			'Kec. Maospati  ' => 51011,
			'Kec. Karangrejo  ' => 51012,
			'Kec. Barat ' => 51014,
			'Kec. Kartoharjo  ' => 51015,
			'Kec. Karas ' => 51016,
			'Kec. Ngariboyo ' => 51017,
			'Kec. Nguntoronadi  ' => 51018,
			'Kec. Sidorejo  ' => 51019,
			'Kab. Ponorogo  ' => 51100,
			'Kec. Ngrayun ' => 51101,
			'Kec. Slahung ' => 51102,
			'Kec. Bungkal ' => 51103,
			'Kec. Sambit  ' => 51104,
			'Kec. Sawoo ' => 51105,
			'Kec. Sooko ' => 51106,
			'Kec. Pulung  ' => 51107,
			'Kec. Mlarak  ' => 51108,
			'Kec. Siman ' => 51109,
			'Kec. Jetis ' => 51110,
			'Kec. Balong  ' => 51111,
			'Kec. Kauman  ' => 51112,
			'Kec. Jambon  ' => 51113,
			'Kec. Badegan ' => 51114,
			'Kec. Sampung ' => 51115,
			'Kec. Sukorejo  ' => 51116,
			'Kec. Ponorogo  ' => 51117,
			'Kec. Babadan ' => 51118,
			'Kec. Jenangan  ' => 51119,
			'Kec. Ngebel  ' => 51120,
			'Kec. Pudak ' => 51121,
			'Kab. Pacitan ' => 51200,
			'Kec. Donorejo  ' => 51201,
			'Kec. Punung  ' => 51202,
			'Kec. Pringkuku ' => 51203,
			'Kec. Pacitan ' => 51204,
			'Kec. Kebon Agung ' => 51205,
			'Kec. Arjosari  ' => 51206,
			'Kec. Nawangan  ' => 51207,
			'Kec. Bandar  ' => 51208,
			'Kec. Tegalombo ' => 51209,
			'Kec. Tulakan ' => 51210,
			'Kec. Ngadirojo ' => 51211,
			'Kec. Sudimoro  ' => 51212,
			'Kab. Kediri  ' => 51300,
			'Kec. Kras  ' => 51301,
			'Kec. Ringinrejo  ' => 51302,
			'Kec. Ngancar ' => 51303,
			'Kec. Kepung  ' => 51304,
			'Kec. Puncu ' => 51305,
			'Kec. Ploso Klaten  ' => 51306,
			'Kec. Wates ' => 51307,
			'Kec. Kandat  ' => 51308,
			'Kec. Ngadiluwih  ' => 51309,
			'Kec. Mojo  ' => 51310,
			'Kec. Semen ' => 51311,
			'Kec. Banyakan  ' => 51312,
			'Kec. Tarokan ' => 51313,
			'Kec. Grogol  ' => 51314,
			'Kec. Gampengrejo ' => 51315,
			'Kec. Gurah ' => 51316,
			'Kec. Pagu  ' => 51317,
			'Kec. Papar ' => 51318,
			'Kec. Plemahan  ' => 51319,
			'Kec. Purwoasri ' => 51320,
			'Kec. Kunjang ' => 51321,
			'Kec. Pare  ' => 51322,
			'Kec. Kandangan ' => 51323,
			'Kec. Kayen Kidul ' => 51324,
			'Kec. Ngasem  ' => 51325,
			'Kec. Badas ' => 51326,
			'Kab. Nganjuk ' => 51400,
			'Kec. Sawahan ' => 51401,
			'Kec. Ngetos  ' => 51402,
			'Kec. Berbek  ' => 51403,
			'Kec. Loceret ' => 51404,
			'Kec. Pace  ' => 51405,
			'Kec. Tanjunganom ' => 51406,
			'Kec. Prambon ' => 51407,
			'Kec. Ngronggot ' => 51408,
			'Kec. Kertosono ' => 51409,
			'Kec. Patianrowo  ' => 51410,
			'Kec. Baron ' => 51411,
			'Kec. Gondang ' => 51412,
			'Kec. Sukomoro  ' => 51413,
			'Kec. Nganjuk ' => 51414,
			'Kec. Bagor ' => 51415,
			'Kec. Wilangan  ' => 51416,
			'Kec. Rejoso  ' => 51417,
			'Kec. Ngluyu  ' => 51418,
			'Kec. Lengkong  ' => 51419,
			'Kec. Jatikalen ' => 51420,
			'Kab. Blitar  ' => 51500,
			'Kec. Bakung  ' => 51501,
			'Kec. Wonotirto ' => 51502,
			'Kec. Panggungrejo  ' => 51503,
			'Kec. Wates ' => 51504,
			'Kec. Binangun  ' => 51505,
			'Kec. Sutojayan ' => 51506,
			'Kec. Kademangan  ' => 51507,
			'Kec. Kanigoro  ' => 51508,
			'Kec. Talun ' => 51509,
			'Kec. Selopuro  ' => 51510,
			'Kec. Kesamben  ' => 51511,
			'Kec. Selorejo  ' => 51512,
			'Kec. Doko  ' => 51513,
			'Kec. Wlingi  ' => 51514,
			'Kec. Gandusari ' => 51515,
			'Kec. Garum ' => 51516,
			'Kec. Nglegok ' => 51517,
			'Kec. Sanankulon  ' => 51518,
			'Kec. Ponggok ' => 51519,
			'Kec. Srengat ' => 51520,
			'Kec. Wonodadi  ' => 51521,
			'Kec. Udanawu ' => 51522,
			'Kab. Tulungagung ' => 51600,
			'Kec. Besuki  ' => 51601,
			'Kec. Bandung ' => 51602,
			'Kec. Pakel ' => 51603,
			'Kec. Campur Darat  ' => 51604,
			'Kec. Tanggung Gunung  ' => 51605,
			'Kec. Kalidawir ' => 51606,
			'Kec. Pucang Laban  ' => 51607,
			'Kec. Rejotangan  ' => 51608,
			'Kec. Ngunut  ' => 51609,
			'Kec. Sumbergempol  ' => 51610,
			'Kec. Boyolangu ' => 51611,
			'Kec. Tulungagung ' => 51612,
			'Kec. Kedungwaru  ' => 51613,
			'Kec. Ngantru ' => 51614,
			'Kec. Karangrejo  ' => 51615,
			'Kec. Kauman  ' => 51616,
			'Kec. Gondang ' => 51617,
			'Kec. Pagerwojo ' => 51618,
			'Kec. Sendang ' => 51619,
			'Kab. Trenggalek  ' => 51700,
			'Kec. Panggul ' => 51701,
			'Kec. Munjungan ' => 51702,
			'Kec. Watulimo  ' => 51703,
			'Kec. Kampak  ' => 51704,
			'Kec. Dongko  ' => 51705,
			'Kec. Pule  ' => 51706,
			'Kec. Karangan  ' => 51707,
			'Kec. Gandusari ' => 51708,
			'Kec. Durenan ' => 51709,
			'Kec. Pogalan ' => 51710,
			'Kec. Trenggalek  ' => 51711,
			'Kec. Tugu  ' => 51712,
			'Kec. Bendungan ' => 51713,
			'Kec. Suruh ' => 51714,
			'Kab. Malang  ' => 51800,
			'Kec. Donomulyo ' => 51801,
			'Kec. Kalipare  ' => 51802,
			'Kec. Pagak ' => 51803,
			'Kec. Bantur  ' => 51804,
			'Kec. Gedangan  ' => 51805,
			'Kec. Sumber Manjing Wetan ' => 51806,
			'Kec. Dampit  ' => 51807,
			'Kec. Tirto Yudo  ' => 51808,
			'Kec. Ampelgading ' => 51809,
			'Kec. Poncokusumo ' => 51810,
			'Kec. Wajak ' => 51811,
			'Kec. Turen ' => 51812,
			'Kec. Pagelaran ' => 51813,
			'Kec. Gondanglegi ' => 51814,
			'Kec. Bululawang  ' => 51815,
			'Kec. Kepanjen  ' => 51816,
			'Kec. Sumberpucung  ' => 51817,
			'Kec. Kromengan ' => 51818,
			'Kec. Wonosari  ' => 51819,
			'Kec. Ngajum  ' => 51820,
			'Kec. Wagir ' => 51821,
			'Kec. Pakisaji  ' => 51822,
			'Kec. Tajinan ' => 51823,
			'Kec. Tumpang ' => 51824,
			'Kec. Pakis ' => 51825,
			'Kec. Jabung  ' => 51826,
			'Kec. Lawang  ' => 51827,
			'Kec. Singosari ' => 51828,
			'Kec. Karangploso ' => 51829,
			'Kec. Dau   ' => 51830,
			'Kec. Pujon ' => 51831,
			'Kec. Ngantang  ' => 51832,
			'Kec. Kasembon  ' => 51833,
			'Kab. Pasuruan  ' => 51900,
			'Kec. Purwodadi ' => 51901,
			'Kec. Tutur ' => 51902,
			'Kec. Puspo ' => 51903,
			'Kec. Tosari  ' => 51904,
			'Kec. Lumbang ' => 51905,
			'Kec. Pasrepan  ' => 51906,
			'Kec. Kejayan ' => 51907,
			'Kec. Wonorejo  ' => 51908,
			'Kec. Purwosari ' => 51909,
			'Kec. Prigen  ' => 51910,
			'Kec. Sukorejo  ' => 51911,
			'Kec. Pandaan ' => 51912,
			'Kec. Gempol  ' => 51913,
			'Kec. Beji  ' => 51914,
			'Kec. Bangil  ' => 51915,
			'Kec. Rembang ' => 51916,
			'Kec. Kraton  ' => 51917,
			'Kec. Pohjentrek  ' => 51918,
			'Kec. Gondang Wetan ' => 51919,
			'Kec. Rejoso  ' => 51920,
			'Kec. Winongan  ' => 51921,
			'Kec. Grati ' => 51922,
			'Kec. Lekok ' => 51923,
			'Kec. Nguling ' => 51924,
			'Kab. Probolinggo ' => 52000,
			'Kec. Sukapura  ' => 52001,
			'Kec. Sumber  ' => 52002,
			'Kec. Kuripan ' => 52003,
			'Kec. Bantaran  ' => 52004,
			'Kec. Leces ' => 52005,
			'Kec. Tegal Siwalan ' => 52006,
			'Kec. Banyu Anyar ' => 52007,
			'Kec. Tiris ' => 52008,
			'Kec. Krucil  ' => 52009,
			'Kec. Gading  ' => 52010,
			'Kec. Pakuniran ' => 52011,
			'Kec. Kota Anyar  ' => 52012,
			'Kec. Paiton  ' => 52013,
			'Kec. Besuk ' => 52014,
			'Kec. Kraksaan  ' => 52015,
			'Kec. Krejengan ' => 52016,
			'Kec. Pajarakan ' => 52017,
			'Kec. Maron ' => 52018,
			'Kec. Gending ' => 52019,
			'Kec. Dringu  ' => 52020,
			'Kec. Wonomerto ' => 52021,
			'Kec. Lumbang ' => 52022,
			'Kec. Tongas  ' => 52023,
			'Kec. Sumberasih  ' => 52024,
			'Kab. Lumajang  ' => 52100,
			'Kec. Tempursari  ' => 52101,
			'Kec. Pronojiwo ' => 52102,
			'Kec. Candipuro ' => 52103,
			'Kec. Pasirian  ' => 52104,
			'Kec. Tempeh  ' => 52105,
			'Kec. Kunir ' => 52106,
			'Kec. Yosowilangun  ' => 52107,
			'Kec. Rowokangkung  ' => 52108,
			'Kec. Tekung  ' => 52109,
			'Kec. Lumajang  ' => 52110,
			'Kec. Pasrujambe  ' => 52111,
			'Kec. Senduro ' => 52112,
			'Kec. Padang  ' => 52113,
			'Kec. Sukodono  ' => 52114,
			'Kec. Jatiroto  ' => 52115,
			'Kec. Randuagung  ' => 52116,
			'Kec. Kedungjajang  ' => 52117,
			'Kec. Gucialit  ' => 52118,
			'Kec. Klakah  ' => 52119,
			'Kec. Ranuyoso  ' => 52120,
			'Kec. Sumbersuko  ' => 52121,
			'Kab. Bondowoso ' => 52200,
			'Kec. Maesan  ' => 52201,
			'Kec. Grujugan  ' => 52202,
			'Kec. Tamanan ' => 52203,
			'Kec. Pujer ' => 52204,
			'Kec. Tlogosari ' => 52205,
			'Kec. Sukosari  ' => 52206,
			'Kec. Tapen ' => 52207,
			'Kec. Wonosari  ' => 52208,
			'Kec. Tenggarang  ' => 52209,
			'Kec. Bondowoso ' => 52210,
			'Kec. Curahdami ' => 52211,
			'Kec. Pakem ' => 52212,
			'Kec. Wringin ' => 52213,
			'Kec. Tegalampel  ' => 52214,
			'Kec. Klabang ' => 52215,
			'Kec. Prajekan  ' => 52216,
			'Kec. Cermee  ' => 52217,
			'Kec. Binakal ' => 52218,
			'Kec. Sumber Wringin ' => 52219,
			'Kec. Sempol  ' => 52220,
			'Kec. Jambesari Darus Sholah ' => 52221,
			'Kec. Taman Krocok  ' => 52222,
			'Kec. Botolinggo  ' => 52223,
			'Kab. Situbondo ' => 52300,
			'Kec. Sumber Malang ' => 52301,
			'Kec. Jatibanteng ' => 52302,
			'Kec. Banyuglugur ' => 52303,
			'Kec. Besuki  ' => 52304,
			'Kec. Suboh ' => 52305,
			'Kec. Mlandingan  ' => 52306,
			'Kec. Bungatan  ' => 52307,
			'Kec. Kendit  ' => 52308,
			'Kec. Panarukan ' => 52309,
			'Kec. Situbondo ' => 52310,
			'Kec. Mangaran  ' => 52311,
			'Kec. Panji ' => 52312,
			'Kec. Kapongan  ' => 52313,
			'Kec. Arjasa  ' => 52314,
			'Kec. Jangkar ' => 52315,
			'Kec. Asembagus ' => 52316,
			'Kec. Banyuputih  ' => 52317,
			'Kab. Jember  ' => 52400,
			'Kec. Kencong ' => 52401,
			'Kec. Gumuk Mas ' => 52402,
			'Kec. Puger ' => 52403,
			'Kec. Wuluhan ' => 52404,
			'Kec. Ambulu  ' => 52405,
			'Kec. Tempurejo ' => 52406,
			'Kec. Silo  ' => 52407,
			'Kec. Mayang  ' => 52408,
			'Kec. Mumbulsari  ' => 52409,
			'Kec. Jenggawah ' => 52410,
			'Kec. Ajung ' => 52411,
			'Kec. Rambipuji ' => 52412,
			'Kec. Balung  ' => 52413,
			'Kec. Umbulsari ' => 52414,
			'Kec. Semboro ' => 52415,
			'Kec. Jombang ' => 52416,
			'Kec. Sumberbaru  ' => 52417,
			'Kec. Tanggul ' => 52418,
			'Kec. Bangsalsari ' => 52419,
			'Kec. Panti ' => 52420,
			'Kec. Sukorambi ' => 52421,
			'Kec. Arjasa  ' => 52422,
			'Kec. Pakusari  ' => 52423,
			'Kec. Kalisat ' => 52424,
			'Kec. Ledok Ombo  ' => 52425,
			'Kec. Sumberjambe ' => 52426,
			'Kec. Sukowono  ' => 52427,
			'Kec. Jelbuk  ' => 52428,
			'Kec. Kaliwates ' => 52429,
			'Kec. Sumbersari  ' => 52430,
			'Kec. Patrang ' => 52431,
			'Kab. Banyuwangi  ' => 52500,
			'Kec. Pesanggaran ' => 52501,
			'Kec. Bangorejo ' => 52502,
			'Kec. Purwoharjo  ' => 52503,
			'Kec. Tegaldlimo  ' => 52504,
			'Kec. Muncar  ' => 52505,
			'Kec. Cluring ' => 52506,
			'Kec. Gambiran  ' => 52507,
			'Kec. Glenmore  ' => 52508,
			'Kec. Kalibaru  ' => 52509,
			'Kec. Genteng ' => 52510,
			'Kec. Srono ' => 52511,
			'Kec. Rogojampi ' => 52512,
			'Kec. Kabat ' => 52513,
			'Kec. Singojuruh  ' => 52514,
			'Kec. Sempu ' => 52515,
			'Kec. Songgon ' => 52516,
			'Kec. Glagah  ' => 52517,
			'Kec. Banyuwangi  ' => 52518,
			'Kec. Giri  ' => 52519,
			'Kec. Kalipuro  ' => 52520,
			'Kec. Wongsorejo  ' => 52521,
			'Kec. Licin ' => 52522,
			'Kec. Tegalsari ' => 52523,
			'Kec. Siliragung  ' => 52524,
			'Kec. Blimbingsari' => 52525,
			'Kab. Pamekasan ' => 52600,
			'Kec. Tlanakan  ' => 52601,
			'Kec. Pademawu  ' => 52602,
			'Kec. Galis ' => 52603,
			'Kec. Larangan  ' => 52604,
			'Kec. Pamekasan ' => 52605,
			'Kec. Proppo  ' => 52606,
			'Kec. Palengaan ' => 52607,
			'Kec. Pegantenan  ' => 52608,
			'Kec. Kadur ' => 52609,
			'Kec. Pakong  ' => 52610,
			'Kec. Waru  ' => 52611,
			'Kec. Batu Marmer ' => 52612,
			'Kec. Pasean  ' => 52613,
			'Kab. Sampang ' => 52700,
			'Kec. Sreseh  ' => 52701,
			'Kec. Torjun  ' => 52702,
			'Kec. Sampang ' => 52703,
			'Kec. Camplong  ' => 52704,
			'Kec. Omben ' => 52705,
			'Kec. Kedungdung  ' => 52706,
			'Kec. Jrengik ' => 52707,
			'Kec. Tambelangan ' => 52708,
			'Kec. Banyuates ' => 52709,
			'Kec. Robatal ' => 52710,
			'Kec. Ketapang  ' => 52711,
			'Kec. Sokobanah ' => 52712,
			'Kec. Karangpenang  ' => 52713,
			'Kec. Pangarengan ' => 52714,
			'Kab. Sumenep ' => 52800,
			'Kec. Pragaan ' => 52801,
			'Kec. Bluto ' => 52802,
			'Kec. Saronggi  ' => 52803,
			'Kec. Giligenteng ' => 52804,
			'Kec. Talango ' => 52805,
			'Kec. Kalianget ' => 52806,
			'Kec. Kota Sumenep  ' => 52807,
			'Kec. Lenteng ' => 52808,
			'Kec. Ganding ' => 52809,
			'Kec. Guluk Guluk ' => 52810,
			'Kec. Pasongsongan  ' => 52811,
			'Kec. Ambunten  ' => 52812,
			'Kec. Rubaru  ' => 52813,
			'Kec. Dasuk ' => 52814,
			'Kec. Manding ' => 52815,
			'Kec. Batuputih ' => 52816,
			'Kec. Gapura  ' => 52817,
			'Kec. Batang Batang ' => 52818,
			'Kec. Dungkek ' => 52819,
			'Kec. Nonggunong  ' => 52820,
			'Kec. Gayam ' => 52821,
			'Kec. Ra As ' => 52822,
			'Kec. Sapeken ' => 52823,
			'Kec. Arjasa  ' => 52824,
			'Kec. Masalembu ' => 52825,
			'Kec. Batuan  ' => 52827,
			'Kec. Kangayan  ' => 52828,
			'Kab. Bangkalan ' => 52900,
			'Kec. Kamal ' => 52901,
			'Kec. Labang  ' => 52902,
			'Kec. Kwanyar ' => 52903,
			'Kec. Modung  ' => 52904,
			'Kec. Blega ' => 52905,
			'Kec. Konang  ' => 52906,
			'Kec. Galis ' => 52907,
			'Kec. Tanah Merah ' => 52908,
			'Kec. Tragah  ' => 52909,
			'Kec. Socah ' => 52910,
			'Kec. Bangkalan ' => 52911,
			'Kec. Burneh  ' => 52912,
			'Kec. Arosbaya  ' => 52913,
			'Kec. Geger ' => 52914,
			'Kec. Kokop ' => 52915,
			'Kec. Tanjungbumi ' => 52916,
			'Kec. Sepulu  ' => 52917,
			'Kec. Klampis ' => 52918,
			'Kota Surabaya  ' => 56000,
			'Kec. Karang Pilang ' => 56001,
			'Kec. Jambangan ' => 56002,
			'Kec. Gayungan  ' => 56003,
			'Kec. Wonocolo  ' => 56004,
			'Kec. Tenggilis Mejoyo   ' => 56005,
			'Kec. Gununganyar ' => 56006,
			'Kec. Rungkut ' => 56007,
			'Kec. Sukolilo  ' => 56008,
			'Kec. Mulyorejo ' => 56009,
			'Kec. Gubeng  ' => 56010,
			'Kec. Wonokromo ' => 56011,
			'Kec. Dukuh Pakis ' => 56012,
			'Kec. Wiyung  ' => 56013,
			'Kec. Lakarsantri ' => 56014,
			'Kec. Tandes  ' => 56015,
			'Kec. Sukomanunggal ' => 56016,
			'Kec. Sawahan ' => 56017,
			'Kec. Tegal Sari  ' => 56018,
			'Kec. Genteng ' => 56019,
			'Kec. Tambaksari  ' => 56020,
			'Kec. Kenjeran  ' => 56021,
			'Kec. Simokerto ' => 56022,
			'Kec. Semampir  ' => 56023,
			'Kec. Pabean Cantian ' => 56024,
			'Kec. Bubutan ' => 56025,
			'Kec. Krembangan  ' => 56026,
			'Kec. Asemrowo  ' => 56027,
			'Kec. Benowo  ' => 56028,
			'Kec. Bulak ' => 56029,
			'Kec. Pakal ' => 56030,
			'Kec. Sambi Kerep ' => 56031,
			'Kota Malang  ' => 56100,
			'Kec. Kedungkandang ' => 56101,
			'Kec. Sukun ' => 56102,
			'Kec. Klojen  ' => 56103,
			'Kec. Blimbing  ' => 56104,
			'Kec. Lowokwaru ' => 56105,
			'Kota Madiun  ' => 56200,
			'Kec. Manguharjo  ' => 56201,
			'Kec. Taman ' => 56202,
			'Kec. Kartoharjo  ' => 56203,
			'Kota Kediri  ' => 56300,
			'Kec. Mojoroto  ' => 56301,
			'Kec. Kota Kediri ' => 56302,
			'Kec. Pesantren ' => 56303,
			'Kota Mojokerto ' => 56400,
			'Kec. Prajurit Kulon ' => 56401,
			'Kec. Magersari ' => 56402,
			'Kec. Kranggan' => 56403,
			'Kota Blitar  ' => 56500,
			'Kec. Sukorejo  ' => 56501,
			'Kec. Kepanjen Kidul ' => 56502,
			'Kec. Sanan Wetan ' => 56503,
			'Kota Pasuruan  ' => 56600,
			'Kec. Gadingrejo  ' => 56601,
			'Kec. Purworejo ' => 56602,
			'Kec. Bugul Kidul ' => 56603,
			'Panggungrejo ' => 56604,
			'Kota Probolinggo ' => 56700,
			'Kec. Kademangan  ' => 56701,
			'Kec. Wonoasih  ' => 56702,
			'Kec. Mayangan  ' => 56703,
			'Kec. Kedopok ' => 56704,
			'Kec. Kanigaran ' => 56705,
			'Kota Batu  ' => 56800,
			'Kec. Batu  ' => 56801,
			'Kec. Junrejo ' => 56802,
			'Kec. Bumiaji ' => 56803,
			'Prov. Aceh ' => 60000,
			'Kab. Aceh Besar  ' => 60100,
			'Kec. Lhoong  ' => 60101,
			'Kec. Lho Nga ' => 60102,
			'Kec. Indrapuri ' => 60103,
			'Kec. Seulimeum ' => 60104,
			'Kec. Mesjid Raya ' => 60105,
			'Kec. Darussalam  ' => 60106,
			'Kec. Kuta Baro ' => 60107,
			'Kec. Montasik  ' => 60108,
			'Kec. Ingin Jaya  ' => 60109,
			'Kec. Suka Makmur ' => 60110,
			'Kec. Darul Imarah  ' => 60111,
			'Kec. Peukan Bada ' => 60112,
			'Kec. Pulo Aceh ' => 60113,
			'Kec. Leupung ' => 60114,
			'Kec. Kuta Malaka ' => 60115,
			'Kec. Leumbah Seulewah   ' => 60116,
			'Kec. Kota Jantho ' => 60117,
			'Kec. Baitussalam ' => 60118,
			'Kec. Krung Barona Jaya  ' => 60119,
			'Kec. Simpang Tiga  ' => 60120,
			'Kec. Kuta Cot Glie ' => 60121,
			'Kec. Darul Kamal ' => 60122,
			'Kec. Blang Bintang ' => 60123,
			'Kab. Pidie ' => 60200,
			'Kec. Geumpang  ' => 60201,
			'Kec. Glumpang Tiga ' => 60207,
			'Kec. Mutiara ' => 60208,
			'Kec. Tiro/Truseb ' => 60209,
			'Kec. Tangse  ' => 60210,
			'Kec. Sakti ' => 60212,
			'Kec. Mila  ' => 60213,
			'Kec. Padang Tiji ' => 60214,
			'Kec. Delima  ' => 60215,
			'Kec. Indrajaya ' => 60216,
			'Kec. Peukan Baru ' => 60217,
			'Kec. Kembang Tanjung  ' => 60218,
			'Kec. Simpang Tiga  ' => 60219,
			'Kec. Kota Sigli  ' => 60220,
			'Kec. Pidie ' => 60221,
			'Kec. Batee ' => 60222,
			'Kec. Muara Tiga  ' => 60223,
			'Kec. Mane  ' => 60224,
			'Kec. Grong-Grong ' => 60227,
			'Kec. Mutiara Timur ' => 60228,
			'Kec. Glupang Baro  ' => 60230,
			'Kec. Keumala ' => 60231,
			'Kec. Titeuae ' => 60232,
			'Kab. Aceh Utara  ' => 60300,
			'Kec. Sawang  ' => 60301,
			'Kec. Nisam ' => 60302,
			'Kec. Kuta Makmur ' => 60303,
			'Kec. Syamtalira Bayu  ' => 60304,
			'Kec. Meurah Mulia  ' => 60305,
			'Kec. Matangkuli  ' => 60306,
			'Kec. Cot Girek ' => 60307,
			'Kec. Tanah Jambo Aye  ' => 60308,
			'Kec. Seunudon  ' => 60309,
			'Kec. Baktiya ' => 60310,
			'Kec. Tanah Luas  ' => 60312,
			'Kec. Samudera  ' => 60313,
			'Kec. Syamtalira Aron  ' => 60314,
			'Kec. Tanah Pasir ' => 60315,
			'Kec. Langkahan ' => 60316,
			'Kec. Baktiya Barat ' => 60317,
			'Kec. Simpang Keramat  ' => 60318,
			'Kec. Nibong  ' => 60319,
			'Kec. Paya Bakong ' => 60320,
			'Kec. Muara Batu  ' => 60321,
			'Kec. Dewantara ' => 60322,
			'Kec. Lhoksukon ' => 60323,
			'Kec. Lapang  ' => 60326,
			'Kec. Pirak Timu  ' => 60327,
			'Kec. Geureudong Pase  ' => 60328,
			'Kec. Banda Baro  ' => 60329,
			'Kec. Nisam Antara  ' => 60330,
			'Kab. Aceh Timur  ' => 60400,
			'Kec. Serba Jadi  ' => 60408,
			'Kec. Birem Bayeun  ' => 60409,
			'Kec. Rantau Selamat ' => 60410,
			'Kec. Peureulak ' => 60411,
			'Kec. Ranto Peureulak  ' => 60412,
			'Kec. Idi Rayeuk  ' => 60413,
			'Kec. Darul Aman  ' => 60414,
			'Kec. Nurussalam  ' => 60415,
			'Kec. Julok ' => 60416,
			'Kec. Pante Beudari ' => 60417,
			'Kec. Simpang Ulim  ' => 60418,
			'Kec. Sungai Raya ' => 60419,
			'Kec. Peureulak Timur  ' => 60420,
			'Kec. Peureulak Barat  ' => 60421,
			'Kec. Banda Alam  ' => 60422,
			'Kec. Idi Tunong  ' => 60423,
			'Kec. Peudawa ' => 60424,
			'Kec. Indra Makmur  ' => 60425,
			'Kec. Madat ' => 60426,
			'Kec. Simpang Jernih ' => 60428,
			'Kec. Darul Ihsan ' => 60429,
			'Kec. Peunaron  ' => 60430,
			'Kec. Idi Timur ' => 60431,
			'Kec. Darul Falah ' => 60432,
			'Kab. Aceh Tengah ' => 60500,
			'Kec. Lingge  ' => 60501,
			'Kec. Bintang ' => 60502,
			'Kec. Pegasing  ' => 60504,
			'Kec. Bebesen ' => 60505,
			'Kec. Silih Nara  ' => 60506,
			'Kec. Kuta Panang ' => 60512,
			'Kec. Ketol ' => 60513,
			'Kec. Celala  ' => 60514,
			'Kec. Kebayakan ' => 60522,
			'Kec. Laut Tawar  ' => 60524,
			'Kec. Atu Lintang ' => 60525,
			'Kec. Jagong Jeget  ' => 60526,
			'Kec. Bies  ' => 60527,
			'Kec. Rusip Antara  ' => 60528,
			'Kab. Aceh Barat  ' => 60600,
			'Kec. Johan Pahlawan ' => 60605,
			'Kec. Samatiga  ' => 60606,
			'Kec. Woyla ' => 60607,
			'Kec. Kaway XVI ' => 60608,
			'Kec. Sungai Mas  ' => 60609,
			'Kec. Bubon ' => 60610,
			'Kec. Arongan Lambalek   ' => 60611,
			'Kec. Meureubo  ' => 60612,
			'Kec. Pantee Ceureumen   ' => 60613,
			'Kec. Woyla Barat ' => 60614,
			'Kec. Woyla Timur ' => 60615,
			'Kec. Panton Reu  ' => 60616,
			'Kab. Aceh Selatan  ' => 60700,
			'Kec. Trumon  ' => 60701,
			'Kec. Bakongan  ' => 60702,
			'Kec. Kluet Selatan ' => 60703,
			'Kec. Kluet Utara ' => 60704,
			'Kec. Tapak Tuan  ' => 60705,
			'Kec. Samadua ' => 60706,
			'Kec. Sawang  ' => 60707,
			'Kec. Meukek  ' => 60708,
			'Kec. Labuhan Haji  ' => 60709,
			'Kec. Pasie Raja  ' => 60710,
			'Kec. Trumon Timur  ' => 60711,
			'Kec. Kluet Timur ' => 60712,
			'Kec. Bakongan Timur ' => 60713,
			'Kec. Kluet Tengah  ' => 60714,
			'Kec. Labuhan Haji Barat ' => 60715,
			'Kec. Labuhan Haji Timur ' => 60716,
			'Kec. Kota Bahagia  ' => 60717,
			'Kec. Trumon Tengah ' => 60718,
			'Kab. Aceh Tenggara ' => 60800,
			'Kec. Lawe Alas ' => 60801,
			'Kec. Lawe Sigala-Gala   ' => 60802,
			'Kec. Bambel  ' => 60803,
			'Kec. Babussalam  ' => 60804,
			'Kec. Badar ' => 60805,
			'Kec. Darul Hasanah ' => 60806,
			'Kec. Babul Makmur  ' => 60807,
			'Kec. Lawe Bulan  ' => 60808,
			'Kec. Bukit Tusam ' => 60809,
			'Kec. Semadam ' => 60810,
			'Kec. Babul Rahmat  ' => 60811,
			'Kec. Ketambe ' => 60822,
			'Kec. Deleng Pokhkisen   ' => 60823,
			'Kec. Lawe Sumur  ' => 60824,
			'Kec. Tanoh Alas  ' => 60825,
			'Kec. Lueser  ' => 60826,
			'Kab. Simeulue  ' => 61100,
			'Kec. Teupah Selatan ' => 61101,
			'Kec. Simeulue Timur ' => 61102,
			'Kec. Simeulue Tengah  ' => 61103,
			'Kec. Salang  ' => 61104,
			'Kec. Simeulue Barat ' => 61105,
			'Kec. Teupah Barat  ' => 61106,
			'Kec. Teluk Dalam ' => 61107,
			'Kec. Alafan  ' => 61108,
			'Kec. Teupah Tengah' => 61109,
			'Kec. Simeulue Cut' => 61110,
			'Kab. Bireuen ' => 61200,
			'Kec. Samalanga ' => 61201,
			'Kec. Pandrah ' => 61202,
			'Kec. Jeunib  ' => 61203,
			'Kec. Peudada ' => 61204,
			'Kec. Juli  ' => 61205,
			'Kec. Jeumpa  ' => 61206,
			'Kec. Jangka  ' => 61207,
			'Kec. Peusangan ' => 61208,
			'Kec. Makmur  ' => 61209,
			'Kec. Ganda Pura  ' => 61210,
			'Kec. Simpang Mamplam  ' => 61211,
			'Kec. Peulimbang  ' => 61212,
			'Kec. Kota Juang  ' => 61213,
			'Kec. Kuala ' => 61214,
			'Kec. Peusangan Selatan  ' => 61215,
			'Kec. Peusangan Siblah Krueng  ' => 61216,
			'Kec. Kuta Blang  ' => 61217,
			'Kab. Aceh Singkil  ' => 61300,
			'Kec. Pulau Banyak  ' => 61301,
			'Kec. Singkil ' => 61302,
			'Kec. Simpang Kanan ' => 61303,
			'Kec. Singkil Utara ' => 61305,
			'Kec. Gunung Mariah ' => 61306,
			'Kec. Danau Paris ' => 61307,
			'Kec. Suro Makmur ' => 61308,
			'Kec. Kuta Baharu ' => 61312,
			'Kec. Singkohor ' => 61313,
			'Kec. Kuala Baru  ' => 61317,
			'Pulau Banyak Barat ' => 61318,
			'Kab. Aceh Tamiang  ' => 61400,
			'Kec. Tamiang Hulu  ' => 61401,
			'Kec. Kejuruan Muda ' => 61402,
			'Kec. Kota Kuala Simpang ' => 61403,
			'Kec. Seruway ' => 61404,
			'Kec. Bendahara ' => 61405,
			'Kec. Karang Baru ' => 61406,
			'Kec. Manyak Payed  ' => 61407,
			'Kec. Rantau  ' => 61408,
			'Kec. Bandar Mulya  ' => 61412,
			'Kec. Bandar Pusaka ' => 61413,
			'Kec. Tenggulun ' => 61414,
			'Kec. Sekerak ' => 61415,
			'Kab. Nagan Raya  ' => 61500,
			'Kec. Darul Makmur  ' => 61501,
			'Kec. Kuala ' => 61502,
			'Kec. Beutong ' => 61503,
			'Kec. Seunagan  ' => 61504,
			'Kec. Seunagan Timur ' => 61505,
			'Kec. Kuala Pesisir ' => 61506,
			'Kec. Tadu Raya ' => 61507,
			'Kec. Suka Makmue ' => 61508,
			'Kec. Tripa Makmur  ' => 61509,
			'Kec. Beutong Ateuh Banggalan' => 61510,
			'Kab. Aceh Jaya ' => 61600,
			'Kec. Teunom  ' => 61601,
			'Kec. Krueng Sabee  ' => 61602,
			'Kec. Setia Bakti ' => 61603,
			'Kec. Sampoiniet  ' => 61604,
			'Kec. Jaya  ' => 61605,
			'Kec. Panga ' => 61606,
			'Kec. Indra Jaya  ' => 61607,
			'Kec. Darul Hikmah  ' => 61608,
			'Kec. Pasie Raya  ' => 61609,
			'Kab. Aceh Barat Daya  ' => 61700,
			'Kec. Manggeng  ' => 61701,
			'Kec. Tangan-Tangan ' => 61702,
			'Kec. Blang Pidie ' => 61703,
			'Kec. Susoh ' => 61704,
			'Kec. Kuala Batee ' => 61705,
			'Kec. Babah Rot ' => 61706,
			'Kec. Lembah Sabil  ' => 61707,
			'Kec. Setia Bakti ' => 61708,
			'Kec. Jeumpa  ' => 61709,
			'Kab. Gayo Lues ' => 61800,
			'Kec. Blang Kejeran ' => 61801,
			'Kec. Kuta Panjang  ' => 61802,
			'Kec. Rikit Gaib  ' => 61803,
			'Kec. Terangon  ' => 61804,
			'Kec. Pinding ' => 61805,
			'Kec. Blang Jerango ' => 61806,
			'Kec. Puteri Betung ' => 61807,
			'Kec. Dabung Gelang ' => 61808,
			'Kec. Blang Pegayon ' => 61809,
			'Kec. Pantan Cuaca  ' => 61810,
			'Kec. Tripe Jaya  ' => 61811,
			'Kab. Bener Meriah  ' => 61900,
			'Kec. Timang Gajah  ' => 61901,
			'Kec. Bukit ' => 61902,
			'Kec. Bandar  ' => 61903,
			'Kec. Permata ' => 61904,
			'Kec. Pintu Rime Gayo  ' => 61905,
			'Kec. Wih Pesam ' => 61906,
			'Kec. Syiah Utama ' => 61907,
			' Bener Kelipah ' => 61908,
			' Mesidah   ' => 61909,
			'Gajah Putih  ' => 61910,
			'Kab. Pidie Jaya  ' => 62000,
			'Kec. Meureudu  ' => 62001,
			'Kec. Ulim  ' => 62002,
			'Kec. Jangka Buya ' => 62003,
			'Kec. Bandar Dua  ' => 62004,
			'Kec. Meurah Dua  ' => 62005,
			'Kec. Bandar Baru ' => 62006,
			'Kec. Panteraja ' => 62007,
			'Kec. Trienggadeng  ' => 62008,
			'Kota Sabang  ' => 66000,
			'Kec. Sukajaya  ' => 66001,
			'Kec. Sukakarya ' => 66002,
			'Kota Banda Aceh  ' => 66100,
			'Kec. Meuraxa ' => 66101,
			'Kec. Baiturrahman  ' => 66102,
			'Kec. Kuta Alam ' => 66103,
			'Kec. Syiah Kuala ' => 66104,
			'Kec. Kuta Raja ' => 66105,
			'Kec. Ulee Kareng ' => 66106,
			'Kec. Lueng Bata  ' => 66107,
			'Kec. Banda Raya  ' => 66108,
			'Kec. Jaya Baru ' => 66109,
			'Kota Lhokseumawe ' => 66200,
			'Kec. Blang Mangat  ' => 66201,
			'Kec. Muara Dua ' => 66202,
			'Kec. Banda Sakti ' => 66203,
			'Kec. Muara Satu  ' => 66204,
			'Kota Langsa  ' => 66300,
			'Kec. Langsa Timur  ' => 66301,
			'Kec. Langsa Barat  ' => 66302,
			'Kec. Langsa Kota ' => 66303,
			'Kec. Langsa Lama ' => 66304,
			'Kec. Langsa Baro ' => 66305,
			'Kab. Sabussalam  ' => 66400,
			'Simpang Kiri ' => 66401,
			'Penanggalan  ' => 66402,
			'Rundeng  ' => 66403,
			'Sultan Daulat  ' => 66404,
			'Longkib  ' => 66405,
			'Prov. Sumatera Utara  ' => 70000,
			'Kab. Deli Serdang  ' => 70100,
			'Kec. Gunung Meriah ' => 70101,
			'Kec. Sinembah Tanjung Muda Hul' => 70102,
			'Kec. Sibolangit  ' => 70103,
			'Kec. KutaIimbaru ' => 70104,
			'Kec. Pancur Batu ' => 70105,
			'Kec. Namo Rambe  ' => 70106,
			'Kec. Sibiru-biru ' => 70107,
			'Kec. Bangun Purba  ' => 70109,
			'Kec. Galang  ' => 70119,
			'Kec. Tanjung Morawa ' => 70120,
			'Kec. Patumbak  ' => 70121,
			'Kec. Deli Tua  ' => 70122,
			'Kec. Sunggal ' => 70123,
			'Kec. Hamparan Perak ' => 70124,
			'Kec. Labuhan Deli  ' => 70125,
			'Kec. Percut Sei Tuan  ' => 70126,
			'Kec. Batang Kuis ' => 70127,
			'Kec. Pantai Labu ' => 70128,
			'Kec. Beringin  ' => 70129,
			'Kec. Lubuk Pakam ' => 70130,
			'Kec. Pagar Marbau  ' => 70131,
			'STM Hilir  ' => 70132,
			'Kab. Langkat ' => 70200,
			'Kec. Bohorok ' => 70201,
			'Kec. Salapian  ' => 70202,
			'Kec. Sei Bingai  ' => 70203,
			'Kec. Kuala ' => 70204,
			'Kec. Selesai ' => 70205,
			'Kec. Binjai  ' => 70206,
			'Kec. Stabat  ' => 70207,
			'Kec. Wampu ' => 70208,
			'Kec. Batang Serangan  ' => 70209,
			'Kec. Sawit Seberang ' => 70210,
			'Kec. Padang Tualang ' => 70211,
			'Kec. Hinai ' => 70212,
			'Kec. Secanggang  ' => 70213,
			'Kec. Tanjung Pura  ' => 70214,
			'Kec. Gebang  ' => 70215,
			'Kec. Sei Lepan ' => 70216,
			'Kec. Babalan ' => 70217,
			'Kec. Berandan Barat ' => 70218,
			'Kec. Besitang  ' => 70219,
			'Kec. Pangkalan Susu ' => 70220,
			'Kec. Serapit ' => 70221,
			'Kec. Kutambaru ' => 70222,
			'Kec. Pematang Jaya ' => 70223,
			'Kab. Karo  ' => 70300,
			'Kec. Mardinding  ' => 70301,
			'Kec. Laubaleng ' => 70302,
			'Kec. Tiga Binanga  ' => 70303,
			'Kec. Juhar ' => 70304,
			'Kec. Munte ' => 70305,
			'Kec. Kuta Buluh  ' => 70306,
			'Kec. Payung  ' => 70307,
			'Kec. Simpang Empat ' => 70308,
			'Kec. Kabanjahe ' => 70309,
			'Kec. Berastagi ' => 70310,
			'Kec. Tiga Panah  ' => 70311,
			'Kec. Merek ' => 70312,
			'Kec. Barus Jahe  ' => 70313,
			'Kec. Tiga Binanga  ' => 70314,
			'Kec. Naman Teran ' => 70315,
			'Kec. Merdeka ' => 70316,
			'Kec. Dolat Rayat ' => 70317,
			'Tiganderket  ' => 70390,
			'Kab. Simalungun  ' => 70400,
			'Kec. Silimakuta  ' => 70401,
			'Kec. Purba ' => 70402,
			'Kec. Dolok Pardamean  ' => 70403,
			'Kec. Sidamanik ' => 70404,
			'Kec. Girsang Simpangan Bolon  ' => 70405,
			'Kec. Tanah Jawa  ' => 70406,
			'Kec. Dolok Panribuan  ' => 70407,
			'Kec. Jorlang Hataran  ' => 70408,
			'Kec. Pane  ' => 70409,
			'Kec. Raya  ' => 70410,
			'Kec. Dolok Silau ' => 70411,
			'Kec. Silau Kahean  ' => 70412,
			'Kec. Raya Kahean ' => 70413,
			'Kec. Tapian Dolok  ' => 70414,
			'Kec. Dolok Batu Nanggar ' => 70415,
			'Kec. Siantar ' => 70416,
			'Kec. Hutabayu Raja ' => 70417,
			'Kec. Pematang Bandar  ' => 70418,
			'Kec. Bandar  ' => 70419,
			'Kec. Bosar Maligas ' => 70420,
			'Kec. Ujung Padang  ' => 70421,
			'Kec. Panombeian Pane  ' => 70422,
			'Kec. Gunung Malela ' => 70423,
			'Kec. Gunung Maligas ' => 70424,
			'Kec. Bandar Huluan ' => 70425,
			'Kec. Bandar Masilam ' => 70426,
			'Kec. Hatonduhan  ' => 70427,
			'Kec. Jawa Maraja Bah Jambi  ' => 70428,
			'Kec. Haranggaol Horison ' => 70429,
			'Kec. Pematang Sidamanik ' => 70430,
			'Pamatang Silima Huta  ' => 70431,
			'Kab. Dairi ' => 70500,
			'Kec. Sidikalang  ' => 70503,
			'Kec. Parbuluan ' => 70504,
			'Kec. Sumbul  ' => 70505,
			'Kec. Pegangan Hilir ' => 70506,
			'Kec. Siempat Nempu Hulu ' => 70507,
			'Kec. Siempat Nempu ' => 70508,
			'Kec. Silima Pungga-Pungga ' => 70509,
			'Kec. Siempat Nempu Hilir  ' => 70510,
			'Kec. Tigalingga  ' => 70511,
			'Kec. Tanah Pinem ' => 70512,
			'Kec. Lae Parira  ' => 70513,
			'Kec. Gunung Stember ' => 70514,
			'Kec. Berampu ' => 70515,
			'Kec. Sitinjo ' => 70516,
			'Silahi Sabungan  ' => 70517,
			'Merek ' => 70590,
			'Kab. Asahan  ' => 70600,
			'Kec. Bandar Pasir Mandoge ' => 70601,
			'Kec. Bandar Pulau  ' => 70602,
			'Kec. Pulau Rakyat  ' => 70603,
			'Kec. Sei Kepayang  ' => 70604,
			'Kec. Tanjung Balai ' => 70605,
			'Kec. Simpang Empat ' => 70606,
			'Kec. Air Batu  ' => 70607,
			'Kec. Buntu Pane  ' => 70608,
			'Kec. Meranti ' => 70609,
			'Kec. Air Joman ' => 70610,
			'Kec. Aek Kuasan  ' => 70619,
			'Kec. Kisaran Barat ' => 70621,
			'Kec. Kisaran Timur ' => 70622,
			'Kec. Aek Songsongan ' => 70623,
			'Kec. Rahuning  ' => 70624,
			'Kec. Aek Ledong  ' => 70625,
			'Kec. Sei Kepayang Barat ' => 70626,
			'Kec. Sei Kepayang Timur ' => 70627,
			'Kec. Teluk Dalam ' => 70628,
			'Kec. Sei dadap ' => 70629,
			'Kec. Tinggi Raja ' => 70630,
			'Kec. Setia Janji ' => 70631,
			'Kec. Pulo Bandring ' => 70632,
			'Kec. Rawang Panca Arga  ' => 70633,
			'Kec. Silo Laut ' => 70634,
			'Kab. Labuhan Batu  ' => 70700,
			'Kec. Bilah Hulu  ' => 70705,
			'Kec. Pangkatan ' => 70707,
			'Kec. Bilah Barat ' => 70708,
			'Kec. Bilah Hilir ' => 70713,
			'Kec. Panai Hulu  ' => 70714,
			'Kec. Panai Tengah  ' => 70715,
			'Kec. Panai Hilir ' => 70716,
			'Kec. Rantau Selatan ' => 70721,
			'Kec. Rantau Utara  ' => 70722,
			'Kab. Tapanuli Utara ' => 70800,
			'Kec. Parmonangan ' => 70803,
			'Kec. Adian Koting  ' => 70804,
			'Kec. Sipoholon ' => 70805,
			'Kec. Tarutung  ' => 70806,
			'Kec. Pahae Jae ' => 70807,
			'Kec. Pahae Julu  ' => 70808,
			'Kec. Pangaribuan ' => 70809,
			'Kec. Garoga  ' => 70810,
			'Kec. Sipahutar ' => 70811,
			'Kec. Siborong-Borong  ' => 70812,
			'Kec. Pagaran ' => 70813,
			'Kec. Muara ' => 70818,
			'Kec. Purbatua  ' => 70819,
			'Kec. Simangumban ' => 70822,
			'Kec. Siatas Barita ' => 70823,
			'Kab. Tapanuli Tengah  ' => 70900,
			'Kec. Lumut ' => 70901,
			'Kec. Sibabangun  ' => 70902,
			'Kec. Pandan  ' => 70903,
			'Kec. Tapian Nauli  ' => 70904,
			'Kec. Kolang  ' => 70905,
			'Kec. Sorkam  ' => 70906,
			'Kec. Barus ' => 70907,
			'Kec. Manduamas ' => 70908,
			'Kec. Sosor Gadong  ' => 70909,
			'Kec. Sorkam Barat  ' => 70910,
			'Kec. Andam Dewi  ' => 70911,
			'Kec. Badiri  ' => 70912,
			'Kec. Sitahuis  ' => 70913,
			'Kec. Sirandorung ' => 70914,
			'Kec. Tukka ' => 70915,
			'Kec. Pinang Sori ' => 70916,
			'Kec. Sukabangun  ' => 70917,
			'Kec. Sarudik ' => 70918,
			'Kec. Barus Utara ' => 70919,
			'Pasaribu Tobing  ' => 70920,
			'Kab. Tapanuli Selatan   ' => 71000,
			'Kec. Batang Angkola ' => 71001,
			'Kec. Batang Toru ' => 71010,
			'Kec. Sipirok ' => 71011,
			'Kec. Arse  ' => 71012,
			'Kec. Saipar Dolok Hole  ' => 71016,
			'Kec. Marancar  ' => 71025,
			'Kec. Sayur Matinggi ' => 71026,
			'Kec. Aek Bilah ' => 71027,
			'Kec. Muaro Batang Toru  ' => 71029,
			'Angkola Barat  ' => 71030,
			'Angkola Sangkunur  ' => 71031,
			'Angkola Selatan  ' => 71032,
			'Angkola Timur  ' => 71033,
			'Tantom Angkola ' => 71034,
			'Kab. Nias  ' => 71100,
			'Kec. Idano Gawo  ' => 71106,
			'Kec. Gido  ' => 71107,
			'Kec. Hiliduho  ' => 71113,
			'Kec. Bawalato  ' => 71119,
			'Kec. Ulugawo ' => 71123,
			'Kec. Ma U  ' => 71125,
			'Kec. Somolo-Molo ' => 71126,
			'Kec. Hili Serangkai ' => 71132,
			'Kec. Botomuzoi ' => 71133,
			'Sogaeadu   ' => 71190,
			'Kab. Mandailing Natal   ' => 71500,
			'Kec. Batahan ' => 71501,
			'Kec. Batang Natal  ' => 71502,
			'Kec. Kotanopan ' => 71503,
			'Kec. Muara Sipongi ' => 71504,
			'Kec. Panyabungan Kota   ' => 71505,
			'Kec. Natal ' => 71506,
			'Kec. Muara Batang Gadis ' => 71507,
			'Kec. Siabu ' => 71508,
			'Kec. Panyabungan Utara  ' => 71509,
			'Kec. Panyabungan Barat  ' => 71510,
			'Kec. Panyabungan Timur  ' => 71511,
			'Kec. Panyabungan Selatan  ' => 71512,
			'Kec. Bukit Malintang  ' => 71513,
			'Kec. Lembah Sorik Merapi  ' => 71514,
			'Kec. Ulu Pungut  ' => 71515,
			'Kec. Tambangan ' => 71516,
			'Kec. Langga Bayu ' => 71517,
			'Kec. Ranto Baek' => 71518,
			'Kec. Puncak Sorik Merapi' => 71519,
			'Kec. Sinunukan' => 71520,
			'Kec. Huta Bargot' => 71521,
			'Kec. Pakantan' => 71522,
			'Kec. Naga Juang' => 71523,
			'Kab. Toba Samosir  ' => 71600,
			'Kec. Balige  ' => 71603,
			'Kec. Lagu Boti ' => 71604,
			'Kec. Habinsaran  ' => 71605,
			'Kec. Silaen  ' => 71606,
			'Kec. Porsea  ' => 71607,
			'Kec. Lumban Julu ' => 71608,
			'Kec. Uluan ' => 71616,
			'Kec. Pintu Pohan Meranti  ' => 71617,
			'Kec. Ajibata ' => 71618,
			'Kec. Borbor  ' => 71619,
			'Kec. Tampahan  ' => 71620,
			'Kec. Nassau  ' => 71621,
			'Kec. Sigumpar  ' => 71622,
			'Kec. Siantar Narumonda  ' => 71623,
			'Kec. Parmaksian  ' => 71624,
			'Kec. Bonatua Lunasi ' => 71625,
			'Kab. Nias Selatan  ' => 71700,
			'Kec. Pulau-Pulau Batu   ' => 71701,
			'Kec. Teluk Dalam ' => 71702,
			'Kec. Amandraya ' => 71703,
			'Kec. Lahusa  ' => 71704,
			'Kec. Gomo  ' => 71705,
			'Kec. Lolomatua ' => 71706,
			'Kec. Lolowa`U  ' => 71707,
			'Kec. Hibala  ' => 71708,
			'Kec. Susua ' => 71709,
			'Kec. Maniamolo ' => 71710,
			'Kec. Hilimegai ' => 71711,
			'Kec. Toma  ' => 71712,
			'Kec. Mazino  ' => 71713,
			'Kec. Umbunasi  ' => 71714,
			'Kec. Aramo ' => 71715,
			'Kec. Pulau-Pulau Batu Timur ' => 71716,
			'Kec. Mazo  ' => 71717,
			'Kec. Fanayama  ' => 71718,
			'Kec. Ulunoyo' => 71719,
			'Kec. Huruna' => 71720,
			'Kec. Oou' => 71721,
			'Kec. Onohazumba' => 71722,
			'Kec. Hilisalawaahe' => 71723,
			'Kec. Ulususua' => 71724,
			'Kec. Siduaori' => 71725,
			'Kec. Somambawa' => 71726,
			'Kec. Boronadu' => 71727,
			'Kec. Ulu Idanotae' => 71728,
			'Kec. Idanotae' => 71729,
			'Kec. Luahagundre Maniamolo' => 71730,
			'Kec. Onolalu' => 71731,
			'Kec. Pulau-Pulau Batu Utara' => 71732,
			'Kec. Pulau-Pulau Batu Barat' => 71733,
			'Kec. Simuk' => 71734,
			'Kec. Tanah Masa' => 71735,
			'Kec. Onolalu' => 71736,
			'Kec. Luahagundre Maniamolo' => 71737,
			'Kab. Pak pak Bharat ' => 71800,
			'Kec. Salak ' => 71801,
			'Kec. Kerajaan  ' => 71802,
			'Kec. Sitelutali Urang Jehe  ' => 71803,
			'Kec. Sitelutali Urang Jehe  ' => 71804,
			'Kec. Pangindar ' => 71805,
			'Kec. Pergetteng-getteng Sengku' => 71806,
			'Kec. Tinada  ' => 71807,
			'Kec. Siempat Rube  ' => 71808,
			'Sitelu Tali Urang Julu  ' => 71899,
			'Kab. Humbang Hasudutan  ' => 71900,
			'Kec. Pakkat  ' => 71901,
			'Kec. Onan Ganjang  ' => 71902,
			'Kec. Lintong Nihuta ' => 71903,
			'Kec. Dolok Sanggul ' => 71904,
			'Kec. Parlilitan  ' => 71905,
			'Kec. Pollung ' => 71906,
			'Kec. Paranginan  ' => 71907,
			'Kec. Bakti Raja  ' => 71908,
			'Kec. Sijamapolang  ' => 71909,
			'Kec. Tarabintang ' => 71910,
			'Kab. Samosir ' => 72000,
			'Kec. Harian  ' => 72001,
			'Kec. Sianjur Mula Mula  ' => 72002,
			'Kec. Onan Runggu Timur  ' => 72003,
			'Kec. Palipi  ' => 72004,
			'Kec. Pangururan  ' => 72005,
			'Kec. Simanindo ' => 72006,
			'Kec. Nainggolan  ' => 72007,
			'Kec. Ronggur Nihuta ' => 72008,
			'Kec. Sitiotio  ' => 72009,
			'Kab. Serdang Bedagai  ' => 72100,
			'Kec. Kotarih ' => 72101,
			'Kec. Dolok Masihul ' => 72102,
			'Kec. Sipispis  ' => 72103,
			'Kec. Dolok Merawan ' => 72104,
			'Kec. Tebing Tinggi ' => 72105,
			'Kec. Bandar Khalifah  ' => 72106,
			'Kec. Tanjung Beringin   ' => 72107,
			'Kec. Teluk Mengkudu ' => 72108,
			'Kec. Sei Rampah  ' => 72109,
			'Kec. Perbaungan  ' => 72110,
			'Kec. Pantai Cermin ' => 72111,
			'Kec. Silinda ' => 72112,
			'Kec. Bintang Bayu  ' => 72113,
			'Kec. Serbajadi ' => 72114,
			'Kec. Tebing Syahbandar  ' => 72115,
			'Kec. Sei Bamban  ' => 72116,
			'Kec. Pegajahan ' => 72117,
			'Kab. Batubara  ' => 72200,
			'Kec. Medang Deras  ' => 72201,
			'Kec. Air Putih ' => 72202,
			'Kec. Lima Puluh  ' => 72203,
			'Kec. Sei Balai ' => 72204,
			'Kec. Sei Suka  ' => 72205,
			'Kec. Talawi  ' => 72206,
			'Kec. Tanjung Tiram ' => 72207,
			'Kab. Padang Lawas utara ' => 72300,
			'Kec. Padang Bolak Julu  ' => 72301,
			'Kec. Padang Bolak  ' => 72302,
			'Kec. Halongonan  ' => 72303,
			'Kec. Dolok Sxigompulon  ' => 72304,
			'Kec. Portibi ' => 72305,
			'Kec. Simangambat ' => 72306,
			'Kec. Batang Onang  ' => 72307,
			'Kec. Dolok ' => 72308,
			'Hulu Sihapas ' => 72390,
			'Kab. Padang Lawas  ' => 72400,
			'Kec. Barumun ' => 72401,
			'Kec. Sosa  ' => 72402,
			'Kec. Barumun Tengah ' => 72403,
			'Kec. Batang Lubu Sutam. ' => 72404,
			'Kec. Huta Raja Tinggi   ' => 72405,
			'Kec. Lubuk Barumun ' => 72406,
			'Kec. Huristak  ' => 72407,
			'Kec. Ulu Barumun ' => 72408,
			'Kec. Sosopan ' => 72409,
			'Kec. Barumun Selatan  ' => 72410,
			'Kec. Aek Nabara Barumun ' => 72411,
			'Kec. Sihapas Barumun' => 72412,
			'Kab. Labuhan Batu Utara ' => 72500,
			'Kec. Na IX-X ' => 72501,
			'Kec. Aek Natas ' => 72502,
			'Kec. Aek Kuo ' => 72503,
			'Kec. Kualuh Hilir  ' => 72504,
			'Kec. Kualuh Selatan ' => 72505,
			'Kec. Kualuh Hulu ' => 72506,
			'Kec. Kualuh Leidong ' => 72507,
			'Kec. Marbau  ' => 72508,
			'Kab. Labuhan Batu Selatan ' => 72600,
			'Kec. Sungai Kanan  ' => 72601,
			'Kec. Torgamba  ' => 72602,
			'Kec. Kota Pinang ' => 72603,
			'Kec. Silangkitang  ' => 72604,
			'Kec. Kampung Rakyat ' => 72605,
			'Kab. Nias Barat  ' => 72700,
			'Kec. Lolofitu Moi  ' => 72701,
			'Kec. Sirombu ' => 72702,
			'Kec. Lahomi  ' => 72703,
			'Kec. Mandrehe  ' => 72704,
			'Kec. Mandrehe Barat ' => 72705,
			'Kec. Moro O  ' => 72706,
			'Kec. Mandrehe Barat ' => 72707,
			'Kec. Ulo Moro O  ' => 72708,
			'Kec. Mandrehe Utara' => 72709,
			'Kab. Nias Utara  ' => 72800,
			'Kec. Tuhemberua  ' => 72801,
			'Kec. Lotu  ' => 72802,
			'Kec. Sitolu Ori  ' => 72803,
			'Kec. Sawo  ' => 72804,
			'Kec. Alasa ' => 72805,
			'Kec. Namohalu Esiwa ' => 72806,
			'Kec. Alasa Talu Muzoi   ' => 72807,
			'Kec. Tugala Oyo  ' => 72808,
			'Kec. Lahewa  ' => 72809,
			'Kec. Afulu ' => 72810,
			'Kec. Lahewa Timur  ' => 72811,
			'Kota Medan ' => 76000,
			'Kec. Medan Tuntungan  ' => 76001,
			'Kec. Medan Johor ' => 76002,
			'Kec. Medan Amplas  ' => 76003,
			'Kec. Medan Denai ' => 76004,
			'Kec. Medan Area  ' => 76005,
			'Kec. Medan Kota  ' => 76006,
			'Kec. Medan Maimun  ' => 76007,
			'Kec. Medan Polonia ' => 76008,
			'Kec. Medan Baru  ' => 76009,
			'Kec. Medan Selayang ' => 76010,
			'Kec. Medan Sunggal ' => 76011,
			'Kec. Medan Helvetia ' => 76012,
			'Kec. Medan Petisah ' => 76013,
			'Kec. Medan Barat ' => 76014,
			'Kec. Medan Timur ' => 76015,
			'Kec. Medan Perjuangan   ' => 76016,
			'Kec. Medan Tembung ' => 76017,
			'Kec. Medan Deli  ' => 76018,
			'Kec. Medan Labuhan ' => 76019,
			'Kec. Medan Marelan ' => 76020,
			'Kec. Medan Kota Belawan ' => 76021,
			'Kec. Medan Utara' => 76022,
			'Kota Binjai  ' => 76100,
			'Kec. Binjai Selatan ' => 76101,
			'Kec. Binjai Kota ' => 76102,
			'Kec. Binjai Timur  ' => 76103,
			'Kec. Binjai Utara  ' => 76104,
			'Kec. Binjai Barat  ' => 76105,
			'Kota Tebing Tinggi ' => 76200,
			'Kec. Padang Hulu ' => 76201,
			'Kec. Rambutan  ' => 76202,
			'Kec. Padang Hilir  ' => 76203,
			'Kec. Bajenis ' => 76204,
			'Kec. Tebing Tinggi Kota ' => 76205,
			'Kota Pematang Siantar   ' => 76300,
			'Kec. Siantar Marihat  ' => 76301,
			'Kec. Siantar Selatan  ' => 76302,
			'Kec. Siantar Barat ' => 76303,
			'Kec. Siantar Utara ' => 76304,
			'Kec. Siantar Timur ' => 76305,
			'Kec. Siantar Martoba  ' => 76306,
			'Kec. Siantar Marimbun   ' => 76307,
			'Kec. Siantar Sitalasari ' => 76308,
			'Kota Tanjung Balai ' => 76400,
			'Kec. Datuk Bandar  ' => 76401,
			'Kec. Tanjung Balai Selatan  ' => 76402,
			'Kec. Tanjung Balai Utara  ' => 76403,
			'Kec. S. Tualang Raso  ' => 76404,
			'Kec. Teluk Nibung  ' => 76405,
			'Kec. Datuk Bandar Timur ' => 76406,
			'Kota Sibolga ' => 76500,
			'Kec. Sibolga Utara ' => 76501,
			'Kec. Sibolga Kota  ' => 76502,
			'Kec. Sibolga Selatan  ' => 76503,
			'Kec. Sibolga Sambas ' => 76504,
			'Kota Padang Sidempuan   ' => 76600,
			'Kec. Padang Sidimpuan Selatan ' => 76601,
			'Kec. Padang Sidimpuan Utara ' => 76602,
			'Kec. Padang Sidimpuan Batu Nad' => 76603,
			'Kec. Padang Sidimpuan Hutaimba' => 76604,
			'Kec. Padang Sidimpuan Tenggara' => 76605,
			'Kec. Padang Sidimpuan Angkola ' => 76606,
			'Kota Gunung Sitoli ' => 76700,
			'Kec. Gunung Sitoli Idanoi ' => 76701,
			'Kec. Gunung Sitoli Alo Oa ' => 76702,
			'Kec. Gunung Sitoli ' => 76703,
			'Kec. Gunung Sitoli Selatan  ' => 76704,
			'Kec. Gunung Sitoli Barat  ' => 76705,
			'Kec. Gunung Sitoli Utara  ' => 76706,
			'Prov. Sumatera Barat  ' => 80000,
			'Kab. Agam  ' => 80100,
			'Kec. Tanjung Mutiara  ' => 80101,
			'Kec. Lubuk Basung  ' => 80102,
			'Kec. Tanjung Raya  ' => 80103,
			'Kec. Matur ' => 80104,
			'Kec. IV Koto ' => 80105,
			'Kec. IV Angkat Candung  ' => 80107,
			'Kec. Baso  ' => 80108,
			'Kec. Tilatang Kamang  ' => 80109,
			'Kec. Palembayan  ' => 80110,
			'Kec. Palupuh ' => 80111,
			'Kec. Sungai Pua  ' => 80113,
			'Kec. Candung ' => 80114,
			'Kec. Kamang Magek  ' => 80115,
			'Kec. Banuhampu ' => 80116,
			'Kec. Ampek Angkek  ' => 80117,
			'Kec. Malalak ' => 80118,
			'Ampek Nagari ' => 80119,
			'Kab. Pasaman ' => 80200,
			'Kec. Bonjol  ' => 80207,
			'Kec. Lubuk Sikaping ' => 80208,
			'Kec. II Koto ' => 80210,
			'Kec. Panti ' => 80211,
			'Kec. III Nagari  ' => 80212,
			'Kec. Rao   ' => 80213,
			'Kec. Mapat Tunggul ' => 80214,
			'Kec. Mapat Tunggul Selatan  ' => 80215,
			'Kec. Simpang Alahan Mati  ' => 80216,
			'Kec. Padang Gelugur ' => 80217,
			'Kec. Rao Utara ' => 80218,
			'Kec. Rao Selatan ' => 80219,
			'Kab. Lima Puluh Koto  ' => 80300,
			'Kec. Payakumbuh  ' => 80301,
			'Kec. Luak  ' => 80302,
			'Kec. Harau ' => 80303,
			'Kec. Guguak  ' => 80304,
			'Kec. Suliki  ' => 80305,
			'Kec. Gunuang Omeh  ' => 80306,
			'Kec. Kapur IX  ' => 80307,
			'Kec. Pangkalan Koto Baru  ' => 80308,
			'Kec. Bukkt Barisan ' => 80309,
			'Kec. Mungka  ' => 80310,
			'Kec. Akabiluru ' => 80311,
			'Kec. Situjuah Limo Nagari ' => 80312,
			'Kec. Lareh Sago Halaban ' => 80313,
			'Kab. Solok ' => 80400,
			'Kec. Pantai Cermin ' => 80404,
			'Kec. Lembah Gumanti ' => 80405,
			'Kec. Payung Sekaki ' => 80406,
			'Kec. Lembang Jaya  ' => 80407,
			'Kec. Gunung Talang ' => 80408,
			'Kec. Bukit Sundi ' => 80409,
			'Kec. Kubung  ' => 80410,
			'Kec. IX Koto Sungai Lasi  ' => 80411,
			'Kec. X Koto Diatas ' => 80412,
			'Kec. X Koto Singkarak   ' => 80413,
			'Kec. Junjung Sirih ' => 80414,
			'Kec. Hiliran Gumanti  ' => 80416,
			'Kec. Tigo Lurah  ' => 80417,
			'Kec. Danau Kembar  ' => 80418,
			'Kab. Padang Pariaman  ' => 80500,
			'Kec. Batang Anai ' => 80501,
			'Kec. Lubuk Alung ' => 80502,
			'Kec. Ulakan Tapakis ' => 80503,
			'Kec. Nan Sabaris ' => 80504,
			'Kec. 2 x 11 VI Lingkung ' => 80505,
			'Kec. VII Koto Sungai Sarik  ' => 80506,
			'Kec. V Koto Kampung Dalam ' => 80507,
			'Kec. Sungai Limau  ' => 80508,
			'Kec. Sungai Geringging  ' => 80509,
			'Kec. IV Koto Aur Malintang  ' => 80510,
			'Kec. Batang Gasan  ' => 80513,
			'Kec. V Koto Timur  ' => 80514,
			'Kec. Patamuan  ' => 80515,
			'Kec. Padang Sago ' => 80516,
			'Kec. 2 x 11 Kayu Tanam  ' => 80517,
			'Kec. Sintuk Toboh Gadang  ' => 80518,
			'Kec. VI Lingkung ' => 80519,
			'Kab. Pesisir Selatan  ' => 80600,
			'Kec. Lunang Silaut ' => 80601,
			'Kec. Basa IV Balai Tapan  ' => 80602,
			'Kec. Pancung Soal  ' => 80603,
			'Kec. Linggo Saribaganti ' => 80604,
			'Kec. Ranah Pesisir ' => 80605,
			'Kec. Lengayang ' => 80606,
			'Kec. Sutera  ' => 80607,
			'Kec. Batang Kapas  ' => 80608,
			'Kec. IV Jurai  ' => 80609,
			'Kec. Bayang  ' => 80610,
			'Kec. Koto XI Terusan  ' => 80611,
			'Kec. IV Bayang Utara  ' => 80612,
			'Kec. Silaut' => 80613,
			'Kec. Ranah Ampek Hulu Tapan' => 80614,
			'Kec. Air Pura' => 80615,
			'Kec. Air Pura' => 80616,
			'Kec. Iv Nagari Bayang Utara' => 80617,
			'Kab. Tanah Datar ' => 80700,
			'Kec. Sepuluh Koto  ' => 80701,
			'Kec. Batipuh ' => 80702,
			'Kec. Pariangan ' => 80703,
			'Kec. Rambatan  ' => 80704,
			'Kec. Lima Kaum ' => 80705,
			'Kec. Tanjung Mas ' => 80706,
			'Kec. Padang Ganting ' => 80707,
			'Kec. Lintau Buo  ' => 80708,
			'Kec. Sungayang ' => 80709,
			'Kec. Sungai Tarab  ' => 80710,
			'Kec. Salimpaung  ' => 80711,
			'Kec. Batipuh Selatan  ' => 80712,
			'Kec. Lintau Buo Utara   ' => 80713,
			'Kec. Tanjung Baru  ' => 80714,
			'Kab. Sawahlunto/ Sijunjung  ' => 80800,
			'Kec. Kamang Baru ' => 80805,
			'Kec. Tanjung Gadang ' => 80806,
			'Kec. Sijunjung ' => 80807,
			'Kec. IV Nagari ' => 80808,
			'Kec. Kupitan ' => 80809,
			'Kec. Koto Tujuh  ' => 80810,
			'Kec. Sumpur Kudus  ' => 80811,
			'Kec. Lubuk Tarok ' => 80812,
			'Kab. Kepulauan Mentawai ' => 81000,
			'Kec. Pagai Utara ' => 81001,
			'Kec. Sipora Selatan ' => 81002,
			'Kec. Siberut Selatan  ' => 81003,
			'Kec. Siberut Utara ' => 81004,
			'Kec. Siberut Barat ' => 81005,
			'Kec. Siberut Barat Daya ' => 81006,
			'Kec. Siberut Tengah ' => 81007,
			'Kec. Sipora Utara  ' => 81008,
			'Kec. Sikakap ' => 81009,
			'Kec. Pagai Selatan ' => 81010,
			'Siberut Barat  ' => 81011,
			'Kab. Solok Selatan ' => 81100,
			'Kec. Sangir  ' => 81101,
			'Kec. Sungai Pagu ' => 81102,
			'Kec. Koto Parik Gadang Diateh ' => 81103,
			'Kec. Sangir Jujuhan ' => 81104,
			'Kec. Sangir Batanghari  ' => 81105,
			'Kec. Pauah Duo ' => 81106,
			'Kec. Sangir Balai Janggo  ' => 81107,
			'Kab. Dharmas Raya  ' => 81200,
			'Kec. Sungai Rumbai ' => 81201,
			'Kec. Koto Baru ' => 81202,
			'Kec. Sitiung ' => 81203,
			'Kec. Pulau Punjung ' => 81204,
			'Kec. Sembilan Koto ' => 81205,
			'Kec. Timpeh  ' => 81206,
			'Kec. Koto Salak  ' => 81207,
			'Kec. Tiumang ' => 81208,
			'Kec. Padang Laweh  ' => 81209,
			'Kec. Asam Jujuhan  ' => 81210,
			'Kec. Koto Besar  ' => 81211,
			'Kab. Pasaman Barat ' => 81300,
			'Kec. Sungai Beremas ' => 81301,
			'Kec. Ranah Batahan ' => 81302,
			'Kec. Lembah Melintang   ' => 81303,
			'Kec. Gunung Tuleh  ' => 81304,
			'Kec. Pasaman ' => 81305,
			'Kec. Kinali  ' => 81306,
			'Kec. Talamau ' => 81307,
			'Kec. Koto Balingka ' => 81308,
			'Kec. Luhak Nan Duo ' => 81309,
			'Kec. Sasak Ranah Pesisir  ' => 81310,
			'Kec. Sungai Aur  ' => 81311,
			'Kota Bukittinggi ' => 86000,
			'Kec. Guguk Panjang ' => 86001,
			'Kec. Mandiangin Koto Selayan  ' => 86002,
			'Kec. Aur Birugo Tigo Baleh  ' => 86003,
			'Kota Padang  ' => 86100,
			'Kec. Bungus Teluk Kabung  ' => 86101,
			'Kec. Lubuk Kilangan ' => 86102,
			'Kec. Lubuk Begalung ' => 86103,
			'Kec. Padang Selatan ' => 86104,
			'Kec. Padang Timur  ' => 86105,
			'Kec. Padang Barat  ' => 86106,
			'Kec. Padang Utara  ' => 86107,
			'Kec. Nanggalo  ' => 86108,
			'Kec. Kuranji ' => 86109,
			'Kec. Pauh  ' => 86110,
			'Kec. Koto Tangah ' => 86111,
			'Kota Padang Panjang ' => 86200,
			'Kec. Padang Panjang Barat ' => 86201,
			'Kec. Padang Panjang Timur ' => 86202,
			'Kota Sawah Lunto ' => 86300,
			'Kec. Silungkang  ' => 86301,
			'Kec. Lembah Segar  ' => 86302,
			'Kec. Barangin  ' => 86303,
			'Kec. Talawi  ' => 86304,
			'Kota Solok ' => 86400,
			'Kec. Lubuk Sikarah ' => 86401,
			'Kec. Tanjung Harapan  ' => 86402,
			'Kota Payakumbuh  ' => 86500,
			'Kec. Payakumbuh Barat   ' => 86501,
			'Kec. Payakumbuh Timur   ' => 86502,
			'Kec. Payakumbuh Utara   ' => 86503,
			'Kec. Lamposi Tigo Nagori  ' => 86504,
			'Kec. Payakumbuh Selatan ' => 86505,
			'Kota Pariaman  ' => 86600,
			'Kec. Pariaman Selatan   ' => 86601,
			'Kec. Pariaman Tengah  ' => 86602,
			'Kec. Pariaman Utara ' => 86603,
			'Kec. Pariaman Timur ' => 86604,
			'Prov. Riau ' => 90000,
			'Kab. Kampar  ' => 90100,
			'Kec. XIII Koto Kampar   ' => 90101,
			'Kec. Kampar Kiri ' => 90102,
			'Kec. Kampar  ' => 90103,
			'Kec. Tambang ' => 90104,
			'Kec. Bangkinang  ' => 90105,
			'Kec. Bangkinang Barat   ' => 90106,
			'Kec. Siak Hulu ' => 90107,
			'Kec. Tapung  ' => 90108,
			'Kec. Kampar Kiri Hulu   ' => 90109,
			'Kec. Kampar Kiri Hilir  ' => 90110,
			'Kec. Tapung Hulu ' => 90111,
			'Kec. Tapung Hilir  ' => 90112,
			'Kec. Tapung Kiri ' => 90113,
			'Kec. Salo  ' => 90114,
			'Kec. Rumbio Jaya ' => 90115,
			'Kec. Bangkinang Seberang  ' => 90116,
			'Kec. Perhentian Raja  ' => 90117,
			'Kec. Kampar Timur  ' => 90118,
			'Kec. Kampar Utara  ' => 90119,
			'Kec. Kampar Kiri Tengah ' => 90120,
			'Kec. Gunung Sahilan ' => 90121,
			'Koto Kampar Hulu ' => 90190,
			'Kab. Bengkalis ' => 90200,
			'Kec. Mandau  ' => 90201,
			'Kec. Bengkalis ' => 90205,
			'Kec. Bantan  ' => 90206,
			'Kec. Bukit Batu  ' => 90207,
			'Kec. Rupat ' => 90208,
			'Kec. Rupat Utara ' => 90209,
			'Kec. Siak Kecil  ' => 90212,
			'Kec. Pinggir ' => 90213,
			'Kab. Indragiri Hulu ' => 90400,
			'Kec. Peranap ' => 90401,
			'Kec. Pasir Penyu ' => 90402,
			'Kec. Kelayang  ' => 90403,
			'Kec. Seberida  ' => 90404,
			'Kec. Rengat  ' => 90405,
			'Kec. Rengat Barat  ' => 90406,
			'Kec. Lirik ' => 90407,
			'Kec. Batang Gansal ' => 90408,
			'Kec. Batang Cenaku ' => 90409,
			'Kec. Batang Peranap ' => 90410,
			'Kec. Lubuk Batu Jaya  ' => 90411,
			'Kec. Sei Lala  ' => 90412,
			'Kec. Rakit Kulim ' => 90413,
			'Kec. Kuala Cenaku  ' => 90414,
			'Kab. Indragiri Hilir  ' => 90500,
			'Kec. Keritang  ' => 90501,
			'Kec. Reteh ' => 90502,
			'Kec. Enok  ' => 90503,
			'Kec. Tanah Merah ' => 90504,
			'Kec. Kuala Indragiri  ' => 90505,
			'Kec. Tembilahan  ' => 90506,
			'Kec. Tempuling ' => 90507,
			'Kec. Batang Tuaka  ' => 90508,
			'Kec. Gaung Anak Serka   ' => 90509,
			'Kec. Gaung ' => 90510,
			'Kec. Mandah  ' => 90511,
			'Kec. Kateman ' => 90512,
			'Kec. Kemuning  ' => 90513,
			'Kec. Pelangiran  ' => 90514,
			'Kec. Pulau Burung  ' => 90515,
			'Kec. Teluk Blengkong  ' => 90516,
			'Kec. Tembilahan Hulu  ' => 90517,
			'Kec. Concong ' => 90518,
			'Kec. Kempas  ' => 90519,
			'Kec. Sungai Batang ' => 90520,
			'Kab. Pelalawan ' => 90800,
			'Kec. Langgam ' => 90801,
			'Kec. Pangkalan Kuras  ' => 90802,
			'Kec. Bunut ' => 90803,
			'Kec. Kuala Kampar  ' => 90804,
			'Kec. Pangkalan Kerinci  ' => 90805,
			'Kec. Ukui  ' => 90806,
			'Kec. Pangkalan Lesung   ' => 90807,
			'Kec. Kerumutan ' => 90808,
			'Kec. Pelalawan ' => 90809,
			'Kec. Teluk Meranti ' => 90810,
			'Kec. Bandar Sei Kijang  ' => 90811,
			'Kec. Bandar Petalangan  ' => 90812,
			'Kab. Rokan Hilir ' => 90900,
			'Kec. Ujung Batu  ' => 90901,
			'Kec. Rokan IV Koto ' => 90902,
			'Kec. Rambah  ' => 90903,
			'Kec. Tembusai  ' => 90904,
			'Kec. Kepenuhan ' => 90905,
			'Kec. Kunto Darussalam   ' => 90906,
			'Kec. Rambah Samo ' => 90907,
			'Kec. Rambah Hilir  ' => 90908,
			'Kec. Tembusai Utara ' => 90909,
			'Kec. Bangun Purba  ' => 90910,
			'Kec. Tandun  ' => 90911,
			'Kec. Kabun ' => 90912,
			'Kec. Bonai Darussalam   ' => 90913,
			'Kec. Pagaran Tapah Darussalam ' => 90914,
			'Kec. Pendalian IV Koto  ' => 90916,
			'Kec. Kepenuhan Hulu ' => 90917,
			'Kab. Siak  ' => 91000,
			'Kec. Kubu  ' => 91001,
			'Kec. Bangko  ' => 91002,
			'Kec. Tanah Putih ' => 91003,
			'Kec. Rimba Melintang  ' => 91004,
			'Kec. Bagan Sinembah ' => 91005,
			'Kec. Pasir Limau Kapas  ' => 91006,
			'Kec. Sinaboi ' => 91007,
			'Kec. Tanah Putih Tanjung Melawan' => 91008,
			'Kec. Pujud ' => 91009,
			'Kec. Bangko Pusako ' => 91010,
			'Kec. Simpang Kanan ' => 91011,
			'Kec. Batu Hampar ' => 91012,
			'Kec. Rantau Kopar  ' => 91013,
			'Kec. Pekaitan' => 91014,
			'Kec. Kubu Babussalam' => 91015,
			'Kec. Bagan Sinembah Jaya' => 91016,
			'Kec. Balai Jaya' => 91017,
			'Kec. Tanjung Medan' => 91018,
			'Kab. Kuantan Singingi   ' => 91100,
			'Kec. Minas ' => 91101,
			'Kec. Siak  ' => 91102,
			'Kec. Sungai Apit ' => 91103,
			'Kec. Tualang ' => 91104,
			'Kec. Kerinci Kanan ' => 91105,
			'Kec. Dayun ' => 91106,
			'Kec. Bunga Raya  ' => 91107,
			'Kec. Sungai Mandau ' => 91108,
			'Kec. Kandis  ' => 91109,
			'Kec. Lubuk Dalam ' => 91110,
			'Kec. Koto Gasip  ' => 91111,
			'Kec. Pusako  ' => 91112,
			'Kec. Sabak Auh ' => 91113,
			'Kec. Sungai Mempura ' => 91114,
			'Mempura  ' => 91115,
			'Kab. Rokan Hulu  ' => 91400,
			'Kec. Kuantan Mudik ' => 91401,
			'Kec. Kuantan Tengah ' => 91402,
			'Kec. Benai ' => 91403,
			'Kec. Singingi  ' => 91404,
			'Kec. Kuantan Hilir ' => 91405,
			'Kec. Cerenti ' => 91406,
			'Kec. Pangean ' => 91407,
			'Kec. Logas Tanah Darat  ' => 91408,
			'Kec. Inuman  ' => 91409,
			'Kec. Singingi Hilir ' => 91410,
			'Kec. Hulu Kuantan  ' => 91411,
			'Kec. Gunung Toar ' => 91412,
			'Kec. Kuantan Hilir Seberang' => 91413,
			'Kec. Sentajo Raya' => 91414,
			'Kec. Pucuk Rantau' => 91415,
			'Kab. Kepulauan Meranti' => 91500,
			'Kec. Merbau' => 91501,
			'Kec. Rangsang' => 91502,
			'Kec. Rangsang Barat' => 91503,
			'Kec. Tebing Tinggi' => 91504,
			'Kec. Tebing Tinggi Barat' => 91505,
			'Kec. Tasik Putri Puyu' => 91506,
			'Kec. Pulau Merbau' => 91507,
			'Kec. Tebing Tinggi Timur' => 91508,
			'Kec. Rangsang Pesisir' => 91509,
			'Kota Pekanbaru ' => 96000,
			'Kec. Tampan  ' => 96001,
			'Kec. Bukit Raya  ' => 96002,
			'Kec. Lima Puluh  ' => 96003,
			'Kec. Sail  ' => 96004,
			'Kec. Pekanbaru Kota ' => 96005,
			'Kec. Sukajadi  ' => 96006,
			'Kec. Senapelan ' => 96007,
			'Kec. Rumbai  ' => 96008,
			'Kec. Tenayan Raya  ' => 96009,
			'Kec. Marpoyan Damai ' => 96010,
			'Kec. Rumbai Pesisir ' => 96011,
			'Kec. Payung Sekaki ' => 96012,
			'Kota Dumai ' => 96200,
			'Kec. Bukit Kapur ' => 96201,
			'Kec. Dumai Barat ' => 96202,
			'Kec. Dumai Timur ' => 96203,
			'Kec. Medang Kampai ' => 96204,
			'Kec. Sungai Sembilan  ' => 96205,
			'Kec. Dumai Kota  ' => 96206,
			'Kec. Dumai Selatan ' => 96207,
			'Prov. Jambi  ' => 100000,
			'Kab. Batang Hari ' => 100100,
			'Kec. Mersan  ' => 100101,
			'Kec. Muara Tembesi ' => 100102,
			'Kec. Batin XXIV  ' => 100103,
			'Kec. Muara Bulian  ' => 100104,
			'Kec. Pemayung  ' => 100105,
			'Kec. Maro Sebo Ulu ' => 100106,
			'Kec. Bajubang  ' => 100107,
			'Kec. Maro Sebo Ilir ' => 100108,
			'Kab. Bungo ' => 100200,
			'Kec. Tanah Tumbuh  ' => 100201,
			'Kec. Tanah Sepenggal  ' => 100202,
			'Kec. Jujuhan ' => 100203,
			'Kec. Rantau Pandan ' => 100204,
			'Kec. Pasar Muara Bungo  ' => 100205,
			'Kec. Pelepat ' => 100206,
			'Kec. Pelepat Ilir  ' => 100208,
			'Kec. Limbur Lubuk Mengkuang ' => 100209,
			'Kec. Bathin II Babeko   ' => 100210,
			'Kec. Muko Muko Batin VII  ' => 100211,
			'Kec. Bungo Dani  ' => 100212,
			'Kec. Bathin III  ' => 100213,
			'Kec. Bathin III Ulu ' => 100214,
			'Kec. Tanah Sepenggal Luas ' => 100215,
			'Kec. Bathin II Pelayang ' => 100216,
			'Kec. Jujuhan Ilir  ' => 100217,
			'Kec. Rimbo Tengah  ' => 100218,
			'Tanah Sepenggal Lintas  ' => 100299,
			'Kab. Sarolangun  ' => 100300,
			'Kec. Batang Asai ' => 100301,
			'Kec. Limun ' => 100302,
			'Kec. Sarolangon  ' => 100303,
			'Kec. Pelawan ' => 100304,
			'Kec. Pauh  ' => 100305,
			'Kec. Mandiangin  ' => 100306,
			'Kec. Air Hitam ' => 100307,
			'Kec. Bathin VIII ' => 100308,
			'Kec. Singkut ' => 100309,
			'Kec. Cermin Nan Gadang  ' => 100310,
			'Kab. Tanjung Jabung Barat ' => 100400,
			'Kec. Tungkal Ulu ' => 100401,
			'Kec. Pengabuan ' => 100402,
			'Kec. Tungkal Ilir  ' => 100403,
			'Kec. Betara  ' => 100404,
			'Kec. Merlung ' => 100405,
			'Kec. Batang Asam ' => 100406,
			'Kec. Tebing Tinggi ' => 100407,
			'Kec. Renah Mendalu ' => 100408,
			'Kec. Muara Papalik ' => 100409,
			'Kec. Senyerang ' => 100410,
			'Kec. Bram Itam ' => 100411,
			'Kec. Seberang Kota ' => 100412,
			'Kec. Kuala Betara  ' => 100413,
			'Kab. Kerinci ' => 100500,
			'Kec. Gunung Raya ' => 100501,
			'Kec. Batang Merangin  ' => 100502,
			'Kec. Keliling Danau ' => 100503,
			'Kec. Danau Kerinci ' => 100504,
			'Kec. Sitinjau Laut ' => 100505,
			'Kec. Air Hangat  ' => 100507,
			'Kec. Gunung Kerinci ' => 100508,
			'Kec. Kayu Aro  ' => 100509,
			'Kec. Air Hangat Timur   ' => 100511,
			'Kec. Gunung Tujuh  ' => 100515,
			'Kec. Siulak  ' => 100516,
			'Kec. Depati Tujuh  ' => 100517,
			'Kec. Bukit Kerman' => 100518,
			'Kec. Air Hangat Barat' => 100519,
			'Kec. Siulak Mukai' => 100520,
			'Kec. Kayu Aro Barat' => 100521,
			'Kab. Tebo  ' => 100600,
			'Kec. Rimbo Bujang  ' => 100601,
			'Kec. Tebo Ilir ' => 100602,
			'Kec. Tebo Tengah ' => 100603,
			'Kec. Tebo Ulu  ' => 100604,
			'Kec. Sumay ' => 100605,
			'Kec. VII Koto  ' => 100606,
			'Kec. Rimbo Ilir  ' => 100607,
			'Kec. Rimbo Ulu ' => 100608,
			'Kec. Tengah Ilir ' => 100609,
			'Kec. Serai Serumpun ' => 100610,
			'Kec. VII Koto Ilir ' => 100611,
			'Kec. Muara Tabir ' => 100612,
			'Kab. Muaro Jambi ' => 100700,
			'Kec. Jambi Luar Kota  ' => 100701,
			'Kec. Mestong ' => 100702,
			'Kec. Kumpeh Ulu  ' => 100703,
			'Kec. Sekernan  ' => 100704,
			'Kec. Maro Sebo ' => 100705,
			'Kec. Kumpeh  ' => 100706,
			'Kec. Sungai Bahar  ' => 100707,
			'Kec. Sungai Gelam  ' => 100708,
			'Kec. Bahar Utara' => 100709,
			'Kec. Bahar Selatan' => 100710,
			'Kec. Taman Rajo' => 100711,
			'Kab. Tanjung Jabung Timur ' => 100800,
			'Kec. Muara Sabak ' => 100801,
			'Kec. Mendahara ' => 100802,
			'Kec. Dendang ' => 100803,
			'Kec. Nipah Panjang ' => 100804,
			'Kec. Rantau Rasau  ' => 100805,
			'Kec. Sadu  ' => 100806,
			'Kec. Mendahara Ulu ' => 100807,
			'Kec. Geragai ' => 100808,
			'Kec. Muara Sabak Barat  ' => 100809,
			'Kec. Kuala Jambi ' => 100811,
			'Kec. Berbak  ' => 100812,
			'Muara Sabak Timur  ' => 100890,
			'Kab. Merangin  ' => 100900,
			'Kec. Jangkat ' => 100901,
			'Kec. Bangko  ' => 100902,
			'Kec. Pamenang  ' => 100903,
			'Kec. Muara Siau  ' => 100904,
			'Kec. Sungai Manau  ' => 100905,
			'Kec. Tabir ' => 100906,
			'Kec. Tabir Ulu ' => 100907,
			'Kec. Lembah Masuarai  ' => 100909,
			'Kec. Tabir Selatan ' => 100910,
			'Kec. Bangko Barat  ' => 100911,
			'Kec. Nalo Tantan ' => 100912,
			'Kec. Batang Masumai ' => 100913,
			'Kec. Pamenang Barat ' => 100914,
			'Kec. Tabir Ilir  ' => 100915,
			'Kec. Tabir Timur ' => 100916,
			'Kec. Renah Pemparap ' => 100917,
			'Kec. Pangkalan Jambu  ' => 100918,
			'Kec. Sungai Tenang ' => 100919,
			'Kec. Tiang Pumpung ' => 100920,
			'Kec. Renah Pamenang ' => 100921,
			'Kec. Pamenang Selatan   ' => 100922,
			'Kec. Tabir Lintas  ' => 100923,
			'Kec. Margo Tabir ' => 100924,
			'Kec. Tabir Barat ' => 100925,
			'Kota Jambi ' => 106000,
			'Kec. Kota Baru ' => 106001,
			'Kec. Jambi Selatan ' => 106002,
			'Kec. Jelutung  ' => 106003,
			'Kec. Pasar Jambi ' => 106004,
			'Kec. Telanai Pura  ' => 106005,
			'Kec. Danau Teluk ' => 106006,
			'Kec. Pelayangan  ' => 106007,
			'Kec. Jambi Timur ' => 106008,
			'Kec. Alam Barajo' => 106009,
			'Kec. Danau Sipin' => 106010,
			'Kec. Paal Merah' => 106011,
			'Kab. Sungai Penuh  ' => 106100,
			'Kec. Tanah Kampung ' => 106101,
			'Kec. Sungai Penuh  ' => 106102,
			'Kec. Hamparan Rawang  ' => 106103,
			'Kec. Pesisir Bukit ' => 106104,
			'Kec. Kumun Debai ' => 106105,
			'Kec. Pondok Tinggi' => 106106,
			'Kec. Koto Baru' => 106107,
			'Kec. Sungai Bungkal' => 106108,
			'Prov. Sumatera Selatan  ' => 110000,
			'Kab. Musi Banyu Asin  ' => 110100,
			'Kec. Sanga Desa  ' => 110101,
			'Kec. Babat Toman ' => 110102,
			'Kec. Sungai Keruh  ' => 110103,
			'Kec. Sekayu  ' => 110104,
			'Kec. Sungai Lilin  ' => 110109,
			'Kec. Bayung Lencir ' => 110110,
			'Kec. Lais  ' => 110111,
			'Kec. Batanghari Leko  ' => 110112,
			'Kec. Keluang ' => 110113,
			'Kec. Plakat Tinggi ' => 110116,
			'Kec. Lalan ' => 110117,
			'Kec. Tungkal Jaya  ' => 110118,
			'Kec. Lawang Wetan  ' => 110119,
			'Kec. Babat Supat ' => 110120,
			'Kab. Ogan Komering Ilir ' => 110200,
			'Kec. Lempuing  ' => 110201,
			'Kec. Mesuji  ' => 110202,
			'Kec. Tulung Selapan ' => 110203,
			'Kec. Pedamaran ' => 110204,
			'Kec. Tanjung Lubuk ' => 110205,
			'Kec. Kota Ayu Agung ' => 110206,
			'Kec. Sirah Pulau Padang ' => 110212,
			'Kec. Pampangan ' => 110213,
			'Kec. Air Sugihan ' => 110214,
			'Kec. Cengal  ' => 110216,
			'Kec. Jejawi  ' => 110218,
			'Kec. Sungai Menang ' => 110220,
			'Kec. Lempuing Jaya ' => 110221,
			'Kec. Mesuji Makmur ' => 110222,
			'Kec. Mesuji Raya ' => 110223,
			'Kec. Pedamaran Timur  ' => 110224,
			'Kec. Teluk Gelam ' => 110225,
			'Kec. Pangkalan Lapam  ' => 110226,
			'Kab. Ogan Komering Ulu  ' => 110300,
			'Kec. Sosoh Buay Rayap   ' => 110307,
			'Kec. Pengandonan ' => 110308,
			'Kec. Peninjauan  ' => 110309,
			'Kec. Lubuk Batang  ' => 110317,
			'Kec. Ulu Ogan  ' => 110320,
			'Kec. Semidang Aji  ' => 110321,
			'Kec. Lengkiti  ' => 110322,
			'Kec. Baturaja Timur ' => 110371,
			'Kec. Baturaja Barat ' => 110372,
			'Kec. Sinar Peninjauan   ' => 110373,
			'Kec. Lubuk Raja  ' => 110374,
			'Kec. Muara Jaya  ' => 110375,
			'Kab. Muara Enim  ' => 110400,
			'Kec. Semende Darat Laut ' => 110401,
			'Kec. Tanjung Agung ' => 110402,
			'Kec. Lawang Kidul  ' => 110403,
			'Kec. Muara Enim  ' => 110404,
			'Kec. Gunung Megang ' => 110405,
			'Kec. Talang Ubi  ' => 110406,
			'Kec. Gelumbang ' => 110407,
			'Kec. Sungai Rotan  ' => 110409,
			'Kec. Lembak  ' => 110410,
			'Kec. Benakat ' => 110411,
			'Kec. Ujan Mas  ' => 110412,
			'Kec. Penukal ' => 110413,
			'Kec. Penukal Utara ' => 110414,
			'Kec. Tanah Abang ' => 110415,
			'Kec. Lubai ' => 110416,
			'Kec. Rambang ' => 110417,
			'Kec. Semende Darat Ulu  ' => 110419,
			'Kec. Semende Darat Tengah ' => 110420,
			'Kec. Rambang Dangku ' => 110422,
			'Kec. Abab  ' => 110423,
			'Kec. Kelekar ' => 110424,
			'Kec. Muara Belida  ' => 110425,
			'Abab  ' => 110427,
			'Talang Ubi ' => 110428,
			'Penukal Utara  ' => 110429,
			'Tanah Abang  ' => 110430,
			'Penukal  ' => 110431,
			'Kec. Lubai Ulu' => 110432,
			'Kec. Belimbing' => 110433,
			'Kec. Belimbing' => 110434,
			'Kec. Belida Darat' => 110435,
			'Kec. Belida Barat' => 110436,
			'Kec. Lubai Ulu' => 110437,
			'Kab. Lahat ' => 110500,
			'Kec. Kota Agung  ' => 110504,
			'Kec. Pulau Pinang  ' => 110505,
			'Kec. Jarai ' => 110506,
			'Kec. Kikim Timur ' => 110511,
			'Kec. Lahat ' => 110512,
			'Kec. Mulak Ulu ' => 110514,
			'Kec. Pajar Bulan ' => 110515,
			'Kec. Kikim Selatan ' => 110519,
			'Kec. Kikim Barat ' => 110520,
			'Kec. Kikim Tengah  ' => 110521,
			'Kec. Tanjung Sakti Pumi ' => 110522,
			'Kec. Tanjung Sakti Pumu ' => 110523,
			'Kec. Merapi Barat  ' => 110524,
			'Kec. Pseksu  ' => 110526,
			'Kec. Gumay Talang  ' => 110527,
			'Kec. Pagar Gunung  ' => 110528,
			'Kec. Merapi Timur  ' => 110529,
			'Kec. Gumay Ulu ' => 110530,
			'Kec. Merapi Selatan ' => 110531,
			'kec. Tanjung Tebat ' => 110532,
			'Kec. Muara Payang  ' => 110533,
			'Kec. Sukamerindu' => 110534,
			'Kec. Sukamerindu' => 110535,
			'Kab. Musi Rawas  ' => 110600,
			'Kec. Rawas Ulu ' => 110601,
			'Kec. Rupit ' => 110602,
			'Kec. STL  Ulu Terawas   ' => 110603,
			'Kec. Tugu Mulyo  ' => 110604,
			'Kec. Muara Beliti  ' => 110605,
			'Kec. Jayaloka  ' => 110606,
			'Kec. Muara Kelingi ' => 110607,
			'Kec. Muara Lakitan ' => 110608,
			'Kec. Megang Sakti  ' => 110609,
			'Kec. Rawas Ilir  ' => 110610,
			'Kec. Purwodadi ' => 110611,
			'Kec. Selangit  ' => 110612,
			'Kec. Karang Jaya ' => 110613,
			'Kec. Karang Dapo ' => 110614,
			'Kec. Bulan Tengah Suku Ulu  ' => 110615,
			'Kec. Ulu Rawas ' => 110616,
			'Kec. Nibung  ' => 110617,
			'Kec. Tiang Pumpung Kepungut ' => 110619,
			'Kec. Sumber Harta  ' => 110620,
			'Kec. Tanah Negeri  ' => 110621,
			'Kec. Suka Karya  ' => 110622,
			'Kab. Banyuasin ' => 110700,
			'Kec. Rantau Bayur  ' => 110701,
			'Kec. Talang Kelapa ' => 110702,
			'Kec. Banyuasin III ' => 110703,
			'Kec. Betung  ' => 110704,
			'Kec. Makarti Jaya  ' => 110705,
			'Kec. Banyuasin I ' => 110706,
			'Kec. Banyuasin II  ' => 110707,
			'Kec. Rambutan  ' => 110709,
			'Kec. Muara Telang  ' => 110710,
			'Kec. Muara Padang  ' => 110711,
			'Kec. Tanjung Lago  ' => 110712,
			'Kec. Muara Sugihan ' => 110713,
			'Kec. Air Salek ' => 110714,
			'Kec. Tungkal Ilir  ' => 110715,
			'Kec. Suak Tapeh  ' => 110716,
			'Kec. Pulau Rimau ' => 110717,
			'Kec. Sembawa ' => 110718,
			'Kec. Sumber Marga Telang' => 110719,
			'Kec. Air Kumbang' => 110720,
			'Kab. Ogan Komering Ulu Timur  ' => 110800,
			'Kec. Martapura ' => 110801,
			'Kec. Buay Madang ' => 110802,
			'Kec. Cempaka ' => 110803,
			'Kec. Madang Suku I ' => 110804,
			'Kec. Madang Suku II ' => 110805,
			'Kec. Belitang I  ' => 110806,
			'Kec. Belitang II ' => 110807,
			'Kec. Belitang III  ' => 110808,
			'Kec. Buay Pemuka Peliung  ' => 110809,
			'Kec. Semendawai Suku III  ' => 110810,
			'Kec. Bunga Mayang  ' => 110811,
			'Kec. Buay Madang Timur  ' => 110812,
			'Kec. Madang Suku III  ' => 110813,
			'Kec. Semendawai Barat   ' => 110814,
			'Kec. Semendawai Timur   ' => 110815,
			'Kec. Jayapura  ' => 110816,
			'Kec. Belitang Jaya ' => 110817,
			'Kec. Belitang Madang Raya ' => 110818,
			'Kec. Belitang Mulia ' => 110819,
			'Kec. Buay Pemuka Bangsa Raja  ' => 110820,
			'Belitang   ' => 110890,
			'Kab. Ogan Komering Ulu Selatan' => 110900,
			'Kec. Banding Agung ' => 110901,
			'Kec. Pulau Beringin ' => 110902,
			'Kec. Muaradua Kisam ' => 110903,
			'Kec. Muaradua  ' => 110904,
			'Kec. Simpang ' => 110905,
			'Kec. Buay Sandang Aji   ' => 110906,
			'Kec. Buay Runjung  ' => 110907,
			'Kec. Buay Pemaca ' => 110908,
			'Kec. Mekakau Ilir  ' => 110909,
			'Kec. Kisam Tinggi  ' => 110910,
			'Kec. Kisam Ilir  ' => 110911,
			'Kec. Buay Pematang Ribu Ranau ' => 110912,
			'Kec. Warkuk Ranau Selatan ' => 110913,
			'Kec. Runjung Agung ' => 110914,
			'Kec. Sungai Are  ' => 110915,
			'Kec. Sidang Danau  ' => 110916,
			'Kec. Buana Pemaca  ' => 110917,
			'Kec. Tiga Dihaji ' => 110918,
			'Kec. Buay Rawan  ' => 110919,
			'Kab. Ogan Ilir ' => 111000,
			'Kec. Tanjung Raja  ' => 111001,
			'Kec. Muara Kuang ' => 111002,
			'Kec. Tanjung Batu  ' => 111003,
			'Kec. Indralaya ' => 111004,
			'Kec. Pemulutan ' => 111005,
			'Kec. Rantau Alai ' => 111006,
			'Kec. Rambang Kuang ' => 111007,
			'Kec. Lubuk Keliat  ' => 111008,
			'Kec. Payaraman ' => 111009,
			'Kec. Kandis  ' => 111010,
			'Kec. Pemulutan Selatan  ' => 111011,
			'Kec. Pemulutan Barat  ' => 111012,
			'Kec. Indralaya Selatan  ' => 111013,
			'Kec. Indralaya Utara  ' => 111014,
			'Kec. Rantau Panjang ' => 111015,
			'Kec. Sungai Pinang ' => 111016,
			'Kab. Empat Lawang  ' => 111100,
			'Kec. Lintang Kanan ' => 111101,
			'Kec. Muara Pinang  ' => 111102,
			'Kec. Pendopo ' => 111103,
			'Kec. Ulu Musi  ' => 111104,
			'Kec. Tebing Tinggi ' => 111105,
			'Kec. Talang Padang ' => 111106,
			'Kec. Pasemah Air Keruh  ' => 111107,
			'Kec. Sikap Dalam ' => 111108,
			'Kec. Saling' => 111109,
			'Kec. Pendopo Barat' => 111110,
			'Kab. Penukal Abab Lematang Ilir' => 111200,
			'Kec. Penukal Utara' => 111221,
			'Kec. Abab' => 111223,
			'Kec. Tanah Abang' => 111224,
			'Kec. Talang Ubi' => 111225,
			'Kec. Penukal' => 111226,
			'Kab. Musi Rawas Utara' => 111300,
			'Kec. Rupit' => 111301,
			'Kec. Rawas Ulu' => 111302,
			'Kec. Nibung' => 111303,
			'Kec. Rawas Iilir' => 111304,
			'Kec. Karang Dapo' => 111305,
			'Kec. Karang Jaya' => 111306,
			'Kec. Ulu Rawas' => 111307,
			'Kota Palembang ' => 116000,
			'Kec. Ilir Barat II ' => 116001,
			'Kec. Seberang Ulu I ' => 116002,
			'Kec. Seberang Ulu II  ' => 116003,
			'Kec. Ilir Barat I  ' => 116004,
			'Kec. Ilir Timur I  ' => 116005,
			'Kec. Ilir Timur II ' => 116006,
			'Kec. Sako  ' => 116007,
			'Kec. Sukarami  ' => 116008,
			'Kec. Kemuning  ' => 116009,
			'Kec. Plaju ' => 116010,
			'Kec. Kertapati ' => 116011,
			'Kec. Gandus  ' => 116012,
			'Kec. Bukit Kecil ' => 116013,
			'Kec. Kalidoni  ' => 116014,
			'Kec. Alang-Alang Lebar  ' => 116015,
			'Kec. Sematang Borang  ' => 116016,
			'Kota Prabumulih  ' => 116100,
			'Kec. Prabumulih Timur   ' => 116103,
			'Kec. Prabumulih Barat   ' => 116104,
			'Kec. Cambai  ' => 116105,
			'Kec. Rambang Kapak Tengah ' => 116106,
			'Kec. Prabumulih Utara   ' => 116107,
			'Kec. Prabumulih Selatan ' => 116108,
			'Kota Lubuk Linggau ' => 116200,
			'Kec. Lubuk Linggau Barat I  ' => 116201,
			'Kec. Lubuk Linggau Timur I  ' => 116202,
			'Kec. Lubuk Linggau Selatan I  ' => 116203,
			'Kec. Lubuk Linggau Utara I  ' => 116204,
			'Kec. Lubuk Linggau Barat II ' => 116205,
			'Kec. Lubuk Linggau Timur II ' => 116206,
			'Kec. Lubuk Linggau Selatan II ' => 116207,
			'Kec. Lubuk Linggau Utara II ' => 116208,
			'Kota Pagar Alam  ' => 116300,
			'Kec. Pagar Alam Utara   ' => 116301,
			'Kec. Pagar Alam Selatan ' => 116302,
			'Kec. Dempo Utara ' => 116303,
			'Kec. Dempo Selatan ' => 116304,
			'Kec. Dempo Tengah  ' => 116305,
			'Prov. Lampung  ' => 120000,
			'Kab. Lampung Selatan  ' => 120100,
			'Kec. Natar ' => 120106,
			'Kec. Jati Agung  ' => 120107,
			'Kec. Tanjung Bintang  ' => 120108,
			'Kec. Katibung  ' => 120109,
			'Kec. Sidomulyo ' => 120110,
			'Kec. Palas ' => 120112,
			'Kec. Penengahan  ' => 120113,
			'Kec. Merbau Mataram ' => 120116,
			'Kec. Candipuro ' => 120117,
			'Kec. Rajabasa  ' => 120118,
			'Kec. Sragi ' => 120119,
			'Kec. Ketapang  ' => 120120,
			'Kec. Katibung  ' => 120121,
			'Kec. Bakauheni ' => 120122,
			'Kec. Tanjung Sari  ' => 120123,
			'Kec. Way Sulan ' => 120124,
			'Kec. Way Panji ' => 120125,
			'Kalianda   ' => 120126,
			'Kab. Lampung Tengah ' => 120200,
			'Kec. Padang Ratu ' => 120201,
			'Kec. Kalirejo  ' => 120202,
			'Kec. Bangunrejo  ' => 120203,
			'Kec. Gunung Sugih  ' => 120204,
			'Kec. Trimurjo  ' => 120205,
			'Kec. Punggur ' => 120206,
			'Kec. Seputih Raman ' => 120207,
			'Kec. Terbanggi Besar  ' => 120208,
			'Kec. Terusan Nunyai ' => 120209,
			'Kec. Seputih Mataram  ' => 120210,
			'Kec. Seputih Banyak ' => 120211,
			'Kec. Rumbia  ' => 120212,
			'Kec. Seputih Surabaya   ' => 120213,
			'Kec. Bumi Ratu Nuban  ' => 120214,
			'Kec. Way Pengubuan ' => 120215,
			'Kec. Seputih Agung ' => 120216,
			'Kec. Bandar Mataram ' => 120217,
			'Kec. Sendang Agung ' => 120218,
			'Kec. Anak Tuha ' => 120219,
			'Kec. Pubian  ' => 120220,
			'Kec. Bandar Surabaya  ' => 120221,
			'Kec. Bumi Nabung ' => 120222,
			'Kec. Way Seputih ' => 120223,
			'Kec. Kota Gajah  ' => 120224,
			'Kec. Selagai Lingga ' => 120225,
			'Kec. Bekri ' => 120226,
			'Kec. Anak Ratu Aji ' => 120227,
			'Kec. Putra Rumbia  ' => 120228,
			'Kab. Lampung Utara ' => 120300,
			'Kec. Bukit Kemuning ' => 120301,
			'Kec. Tanjung Raja  ' => 120302,
			'Kec. Abung Barat ' => 120303,
			'Kec. Kotabumi Kota ' => 120304,
			'Kec. Abung Selatan ' => 120305,
			'Kec. Abung Timur ' => 120306,
			'Kec. Sungkai Selatan  ' => 120307,
			'Kec. Sungkai Utara ' => 120308,
			'Kec. Abung Tinggi  ' => 120309,
			'Kec. Abung Tengah  ' => 120310,
			'Kec. Kotabumi Utara ' => 120311,
			'Kec. Kotabumi Selatan   ' => 120312,
			'Kec. Abung Semuli  ' => 120313,
			'Kec. Abung Surakarta  ' => 120314,
			'Kec. Muara Sungkai ' => 120315,
			'Kec. Bunga Mayang  ' => 120316,
			'Kec. Hulu Sungkai  ' => 120317,
			'Kec. Sungkai Tengah ' => 120318,
			'Kec. Abung Pekurun ' => 120319,
			'Kec. Sungkai Jaya  ' => 120320,
			'Kec. Sungkai Barat ' => 120321,
			'Kec. Abung Kunang  ' => 120322,
			'Kec. Blambangan Pagar   ' => 120323,
			'Kab. Lampung Barat ' => 120400,
			'Kec. Pesisir Selatan  ' => 120401,
			'Kec. Pesisir Tengah ' => 120402,
			'Kec. Pesisir Utara ' => 120403,
			'Kec. Balik Bukit ' => 120404,
			'Kec. Belalau ' => 120405,
			'Kec. Sumber Jaya ' => 120406,
			'Kec. Sekincau  ' => 120407,
			'Kec. Bengkunat ' => 120408,
			'Kec. Batu Brak ' => 120409,
			'Kec. Karyapenggawa ' => 120410,
			'Kec. Lemong  ' => 120411,
			'Kec. Waytenong ' => 120412,
			'Kec. Sukau ' => 120413,
			'Kec. Suoh  ' => 120414,
			'Kec. Gedung Surian ' => 120415,
			'Kec. Bengkunat Belimbing  ' => 120416,
			'Kec. Ngambur ' => 120417,
			'Pagar Dewa ' => 120490,
			'Lumbok Seminung  ' => 120491,
			'Kec. Kebun Tebu' => 120492,
			'Kec. Air Hitam' => 120493,
			'Kec. Batu Ketulis' => 120494,
			'Kec. Bandar Negeri Suoh' => 120495,
			'Kec. Way Krui' => 120496,
			'Kec. Krui Selatan' => 120497,
			'Kec. Pulau Pisang' => 120498,
			'Kec. Pagar Dewa' => 120499,
			'Kab. Tulang Bawang ' => 120500,
			'Kec. Banjar Agung  ' => 120503,
			'Kec. Gedung Aji  ' => 120504,
			'Kec. Manggala  ' => 120505,
			'Kec. Penawartama ' => 120509,
			'Kec. Rawajitu Selatan   ' => 120513,
			'Kec. Gedung Meneng ' => 120514,
			'Kec. Banjar Margo  ' => 120519,
			'Kec. Penawar Aji ' => 120520,
			'Kec. Rawa Pitu ' => 120521,
			'Kec. Rawajitu Timur ' => 120522,
			'Kec. Meraksa Aji ' => 120525,
			'Kec. Gedung AJI Baru  ' => 120526,
			'Kec. Dente Teladas ' => 120527,
			'Kec. Banjar Baru ' => 120528,
			'Kec. Menggala Timur ' => 120529,
			'Menggala   ' => 120590,
			'Kab. Tenggamus ' => 120600,
			'Kec. Wonosobo  ' => 120601,
			'Kec. Kota Agung  ' => 120602,
			'Kec. Pulau Panggung ' => 120603,
			'Kec. Talang Padang ' => 120604,
			'Kec. Pugung  ' => 120605,
			'Kec. Cukuh Balak ' => 120611,
			'Kec. Pematang Sawa ' => 120612,
			'Kec. Sumberejo ' => 120613,
			'Kec. Semaka  ' => 120614,
			'Kec. Ulu Belu  ' => 120615,
			'Kec. Kelumbayan  ' => 120617,
			'Kota Agung Barat ' => 120618,
			'Kota Agung Timur ' => 120619,
			'Kec. Gisting ' => 120620,
			'Kec. Gunung Alip ' => 120621,
			'Kec. Limau ' => 120624,
			'Kec. Bandar Negeri Semuong  ' => 120625,
			'Kec. Air Naningan  ' => 120626,
			'Kec. Bulok ' => 120627,
			'Kec. Kelumbayan Barat   ' => 120628,
			'Kab. Lampung Timur ' => 120700,
			'Kec. Metro Kibang  ' => 120701,
			'Kec. Batanghari  ' => 120702,
			'Kec. Sekampung ' => 120703,
			'Kec. Margatiga ' => 120704,
			'Kec. Sekampung Udik ' => 120705,
			'Kec. Jabung  ' => 120706,
			'Kec. Labuhan Maringgai  ' => 120707,
			'Kec. Way Jepara  ' => 120708,
			'Kec. Sukadana  ' => 120709,
			'Kec. Pekalongan  ' => 120710,
			'Kec. Raman Utara ' => 120711,
			'Kec. Purbolinggo ' => 120712,
			'Kec. Bumi Agung  ' => 120713,
			'Kec. Braja Slebah  ' => 120716,
			'Kec. Bandar Sribawono   ' => 120717,
			'Kec. Mataram Baru  ' => 120718,
			'Kec. Melinting ' => 120719,
			'Kec. Gunung Pelindung   ' => 120720,
			'Kec. Waway Karya ' => 120721,
			'Kec. Pasir Sakti ' => 120722,
			'Kec. Labuhan Ratu  ' => 120723,
			'Kec. Batanghari Nuban   ' => 120724,
			'Kec. Way Bungur  ' => 120725,
			'Kec. Marga Sekampung  ' => 120726,
			'Kab. Way Kanan ' => 120800,
			'Kec. Banjit  ' => 120801,
			'Kec. Baradatu  ' => 120802,
			'Kec. Kasui ' => 120803,
			'Kec. Blambangan Umpu  ' => 120804,
			'Kec. Bahuga  ' => 120805,
			'Kec. Pakuan Ratu ' => 120806,
			'Kec. Gunung Labuhan ' => 120807,
			'Kec. Rebang Tangkas ' => 120808,
			'Kec. Way Tuba  ' => 120809,
			'Kec. Negeri Agung  ' => 120810,
			'Kec. Negara Batin  ' => 120811,
			'Kec. Negeri Besar  ' => 120812,
			'Kec. Buay Bahuga ' => 120813,
			'Kec. Bumi Agung  ' => 120814,
			'Kab. Pasawaran ' => 120900,
			'Kec. Padang Cermin ' => 120901,
			'Kec. Punduh Pedada ' => 120902,
			'Kec. Kedondong ' => 120903,
			'Kec. Way Lima  ' => 120904,
			'Kec. Gedung Tataan ' => 120905,
			'Kec. Negeri Katon  ' => 120906,
			'Kec. Tegineneng  ' => 120907,
			'Kec. Marga Punduh' => 120908,
			'Kec. Way Khilau' => 120909,
			'Kec. Teluk Pandan' => 120910,
			'Kec. Way Ratai' => 120911,
			'Kab. Tulang Bawang Barat  ' => 121000,
			'Kec. Pagelaran ' => 121001,
			'Kec. Sukoharjo ' => 121002,
			'Kec. Adiluwih  ' => 121003,
			'Kec. Banyumas  ' => 121004,
			'Kec. Pringsewu ' => 121005,
			'Kec. Ambarawa  ' => 121006,
			'Kec. Gadingrejo  ' => 121007,
			'Kec. Pardasuka ' => 121008,
			'Kec. Pagelaran Utara' => 121009,
			'Kab. Mesuji  ' => 121100,
			'Kec. Mesuji  ' => 121101,
			'Kec. Tanjung Raya  ' => 121102,
			'Kec. Rawajitu Utara ' => 121103,
			'Kec. Mesuji Timur  ' => 121104,
			'Kec. Simpang Pematang   ' => 121105,
			'Kec. Way Serdang ' => 121106,
			'Kec. Panca Jaya  ' => 121107,
			'Kab. Pringsewu ' => 121200,
			'Kec. Tulang Bawang Udik ' => 121201,
			'Kec. Tumijajar ' => 121202,
			'Kec. Tulang Bawang Tengah ' => 121203,
			'Kec. Lambu Kibang  ' => 121204,
			'Kec. Pagar Dewa  ' => 121205,
			'Kec. Way Kenanga ' => 121206,
			'Kec. Gunung Terang ' => 121207,
			'Kec. Gunung Agung  ' => 121208,
			'Kab. Pesisir Barat' => 121300,
			'Kec. Bangkunat' => 121301,
			'Kec. Pesisir Selatan' => 121331,
			'Kec. Ngambur' => 121332,
			'Kec. Lemong' => 121333,
			'Kec. Ngaras' => 121334,
			'Kec. Karyapenggawa' => 121335,
			'Kec. Pesisir Tengah' => 121336,
			'Kec. Pesisir Utara' => 121337,
			'Kec. Krui Selatan' => 121338,
			'Kec. Pulau Pisang' => 121339,
			'Kec. Way Krui' => 121340,
			'Kota Bandar Lampung ' => 126000,
			'Kec. Teluk Betung Barat ' => 126001,
			'Kec. Teluk Betung Selatan ' => 126002,
			'Kec. Panjang ' => 126003,
			'Kec. Tanjung Karang Timur ' => 126004,
			'Kec. Teluk Betung Utara ' => 126005,
			'Kec. Tanjung Karang Pusat ' => 126006,
			'Kec. Tanjung Karang Barat ' => 126007,
			'Kec. Kedaton ' => 126008,
			'Kec. Sukarame  ' => 126009,
			'Kec. Kemiling  ' => 126010,
			'Kec. Rajabasa  ' => 126011,
			'Kec. Tanjung Senang ' => 126012,
			'Kec. Sukabumi  ' => 126013,
			'Kec. Labuhan Ratu' => 126014,
			'Kec. Way Halim' => 126015,
			'Kec. Kedamaian' => 126016,
			'Kec. Enggal' => 126017,
			'Kec. Langkapura' => 126018,
			'Kec. Bumi Waras' => 126019,
			'Kec. Teluk Betung Timur' => 126020,
			'Kota Metro ' => 126100,
			'Kec. Metro Pusat ' => 126101,
			'Kec. Metro Utara ' => 126102,
			'Kec. Metro Barat ' => 126103,
			'Kec. Metro Timur ' => 126104,
			'Kec. Metro Selatan ' => 126105,
			'Prov. Kalimantan Barat  ' => 130000,
			'Kab. Sambas  ' => 130100,
			'Kec. Selakau ' => 130101,
			'Kec. Pemangkat ' => 130102,
			'Kec. Tebas ' => 130103,
			'Kec. Sambas  ' => 130104,
			'Kec. Jawai ' => 130105,
			'Kec. Teluk Keramat ' => 130106,
			'Kec. Sejangkung  ' => 130107,
			'Kec. Sajingan Besar ' => 130108,
			'Kec. Paloh ' => 130109,
			'Kec. Subah ' => 130110,
			'Kec. Galing  ' => 130111,
			'Kec. Semparuk  ' => 130112,
			'Kec. Tekarang  ' => 130113,
			'Kec. Sajad ' => 130114,
			'Kec. Sebawi  ' => 130115,
			'Kec. Jawai Selatan ' => 130116,
			'Kec. Tangaran  ' => 130117,
			'Kec. Selakau Tua ' => 130118,
			'Kec. Salatiga  ' => 130119,
			'Selakau Timur  ' => 130190,
			'Kab. Pontianak ' => 130200,
			'Kec. Siantan ' => 130208,
			'Kec. Sungai Pinyuh ' => 130209,
			'Kec. Mempawah Hilir ' => 130210,
			'Kec. Sungai Kunyit ' => 130211,
			'Kec. Toho  ' => 130212,
			'Kec. Segedong  ' => 130216,
			'Kec. Anjongan  ' => 130217,
			'Kec. Sadaniang ' => 130218,
			'Kec. Mempawah Timur ' => 130219,
			'Kec. Ambawang  ' => 130220,
			'Kab. Sanggau ' => 130300,
			'Kec. Toba  ' => 130301,
			'Kec. Sanggau Kapuas ' => 130306,
			'Kec. Mokok ' => 130307,
			'Kec. Jangkang  ' => 130312,
			'Kec. Bonti ' => 130313,
			'Kec. Parindu ' => 130314,
			'Kec. Tayan Hilir ' => 130315,
			'Kec. Balai ' => 130316,
			'Kec. Tayan Hulu  ' => 130317,
			'Kec. Kembayan  ' => 130318,
			'Kec. Beduwai ' => 130319,
			'Kec. Noyan ' => 130320,
			'Kec. Sekayan ' => 130321,
			'Kec. Entikong  ' => 130322,
			'Meliau ' => 130323,
			'Kapuas ' => 130324,
			'Kab. Sintang ' => 130400,
			'Kec. Nanga Serawai ' => 130406,
			'Kec. Ambalau ' => 130407,
			'Kec. Kayan Hulu  ' => 130408,
			'Kec. Sepauk  ' => 130411,
			'Kec. Tempunak  ' => 130412,
			'Kec. Sungai Tebelian  ' => 130413,
			'Kec. Sintang ' => 130414,
			'Kec. Dedai ' => 130415,
			'Kec. Kayan Hilir ' => 130416,
			'Kec. Kelam Permai  ' => 130417,
			'Kec. Binjai Hulu ' => 130418,
			'Kec. Ketungau Hilir ' => 130419,
			'Kec. Ketungau Tengah  ' => 130420,
			'Kec. Ketungau Hulu ' => 130421,
			'Kab. Kapuas Hulu ' => 130500,
			'Kec. Silat Hilir ' => 130501,
			'Kec. Silat Hulu  ' => 130502,
			'Kec. Hulu Gurung ' => 130503,
			'Kec. Bunut Hulu  ' => 130504,
			'Kec. Mentebah  ' => 130505,
			'Kec. Kalis ' => 130507,
			'Kec. Embaloh Hilir ' => 130509,
			'Kec. Bunut Hilir ' => 130510,
			'Kec. Boyan Tanjung ' => 130511,
			'Kec. Selimbau  ' => 130514,
			'Kec. Suhaid  ' => 130515,
			'Kec. Seberuang ' => 130516,
			'Kec. Semitau ' => 130517,
			'Kec. Empanang  ' => 130518,
			'Kec. Puring Kencana ' => 130519,
			'Kec. Badau ' => 130520,
			'Kec. Batang Lupar  ' => 130521,
			'Kec. Embaloh Hulu  ' => 130522,
			'Kec. Hulu Kapuas ' => 130524,
			'Kec. Putussibau Utara   ' => 130526,
			'Kec. Bika  ' => 130527,
			'Kec. Jongkong  ' => 130528,
			'Kec. Putussibau Selatan ' => 130529,
			'Kec. Pengkadan ' => 130530,
			'Kec. Danau Setarum ' => 130531,
			'Kab. Ketapang  ' => 130600,
			'Kec. Kendawangan ' => 130601,
			'Kec. Manis Mata  ' => 130602,
			'Kec. Marau ' => 130603,
			'Kec. Jelai Hulu  ' => 130604,
			'Kec. Tumbang Titi  ' => 130605,
			'Kec. Matan Hilir Selatan  ' => 130606,
			'Kec. Matan Hilir Utara  ' => 130607,
			'Kec. Nanga Tayap ' => 130609,
			'Kec. Sandai  ' => 130610,
			'Kec. Sungai Laur ' => 130611,
			'Kec. Simpang Hulu  ' => 130612,
			'Kec. Muara Pawan ' => 130618,
			'Kec. Delta Pawan ' => 130619,
			'Kec. Simpang Dua ' => 130620,
			'Kec. Benua Kayong  ' => 130621,
			'Kec. Hulu Sungai ' => 130622,
			'Kec. Air Upas  ' => 130623,
			'Kec. Singkup ' => 130624,
			'Kec. Pemahan ' => 130625,
			'Kec. Sungai Melayu Rayek  ' => 130626,
			'Kab. Bengkayang  ' => 130800,
			'Kec. Sungai Raya ' => 130801,
			'Kec. Capkala ' => 130802,
			'Kec. Samalantan  ' => 130803,
			'Kec. Bengkayang  ' => 130804,
			'Kec. Ledo  ' => 130805,
			'Kec. Sanggau Ledo  ' => 130806,
			'Kec. Seluas  ' => 130807,
			'Kec. Jagoi Babang  ' => 130808,
			'Kec. Teriak  ' => 130809,
			'Kec. Monterado ' => 130810,
			'Kec. Suti Semarang ' => 130811,
			'Kec. Siding  ' => 130812,
			'Kec. Lumar ' => 130813,
			'Kec. Sungai Betung ' => 130814,
			'Kec. Sungai Raya Kepulauan  ' => 130815,
			'Kec. Lembah Bawang ' => 130816,
			'Kec. Tujuh Belas ' => 130817,
			'Kab. Landak  ' => 130900,
			'Kec. Sebangki  ' => 130902,
			'Kec. Ngabang ' => 130903,
			'Kec. Sengah Temila ' => 130904,
			'Kec. Mandor  ' => 130905,
			'Kec. Menjalin  ' => 130906,
			'Kec. Mempawah Hulu ' => 130907,
			'Kec. Menyuke ' => 130908,
			'Kec. Meranti ' => 130909,
			'Kec. Kuala Behe  ' => 130910,
			'Kec. Air Besar ' => 130911,
			'Kec. Jelimpo ' => 130912,
			'Kec. Sompak  ' => 130913,
			'Kec. Banyuke Hulu  ' => 130914,
			'Kab. Sekadau ' => 131000,
			'Kec. Nanga Mahap ' => 131001,
			'Kec. Nanga Taman ' => 131002,
			'Kec. Sekadau Hulu  ' => 131003,
			'Kec. Sekadau Hilir ' => 131004,
			'Kec. Belitang  ' => 131005,
			'Kec. Belitang Hilir ' => 131006,
			'Kec. Belitang Hulu ' => 131007,
			'Kab. Melawi  ' => 131100,
			'Kec. Sokan ' => 131101,
			'Kec. Tanah Pinoh ' => 131102,
			'Kec. Sayan ' => 131103,
			'Kec. Ella Hilir  ' => 131104,
			'Kec. Menukung  ' => 131105,
			'Kec. Nanga Pinoh ' => 131108,
			'Kec. Belimbing ' => 131109,
			'Kec. Tanah Pinoh Barat  ' => 131110,
			'Kec. Belimbing Hulu ' => 131111,
			'Kec. Pinoh Selatan ' => 131112,
			'Kec. Pinoh Utara ' => 131113,
			'Kab. Kayong Utara  ' => 131200,
			'Kec. Pulau Maya Karimata  ' => 131201,
			'Kec. Simpang Hilir ' => 131202,
			'Kec. Sukadana  ' => 131203,
			'Kec. Teluk Batang  ' => 131204,
			'Kec. Seponti ' => 131205,
			'Kec. Kepulauan Karimata' => 131206,
			'Kab. Kuburaya  ' => 131300,
			'Kec. Kuala Mandor B ' => 131302,
			'Kec. Sungai Ambawang  ' => 131304,
			'Kec. Sungai Kakap  ' => 131305,
			'Kec. Telok Pakedai ' => 131308,
			'Kec. Terentang ' => 131309,
			'Kec. Sungai Raya ' => 131310,
			'Kec. Batu Ampar  ' => 131311,
			'Kec. Kubu  ' => 131312,
			'Kec. Rasau Jaya  ' => 131313,
			'Kota Pontianak ' => 136000,
			'Kec. Pontianak Selatan  ' => 136001,
			'Kec. Pontianak Timur  ' => 136002,
			'Kec. Pontianak Barat  ' => 136003,
			'Kec. Pontianak Utara  ' => 136004,
			'Kec. Pontianak Kota ' => 136005,
			'Kec. Pontianak Tenggara ' => 136006,
			'Kota Singkawang  ' => 136100,
			'Kec. Singkawang Selatan ' => 136101,
			'Kec. Singkawang Timur   ' => 136102,
			'Kec. Singkawang Utara   ' => 136103,
			'Kec. Singkawang Barat   ' => 136104,
			'Kec. Singkawang Tengah  ' => 136105,
			'Prov. Kalimantan Tengah ' => 140000,
			'Kab. Kapuas  ' => 140100,
			'Kec. Kapuas Kuala  ' => 140102,
			'Kec. Kapuas Timur  ' => 140103,
			'Kec. Selat ' => 140104,
			'Kec. Basarang  ' => 140107,
			'Kec. Kapuas Hilir  ' => 140108,
			'Kec. Pulau Petak ' => 140109,
			'Kec. Kapuas Murung ' => 140110,
			'Kec. Kapuas Barat  ' => 140111,
			'Kec. Mantangai ' => 140115,
			'Kec. Timpah  ' => 140116,
			'Kec. Kapuas Tengah ' => 140117,
			'Kec. Kapuas Hulu ' => 140118,
			'Kec. Bataguh' => 140119,
			'Kec. Dadahup' => 140120,
			'Kec. Tamban Catur' => 140121,
			'Kec. Pasak Talawang' => 140122,
			'Kec. Mandau Talawang' => 140123,
			'Kab. Barito Selatan ' => 140200,
			'Kec. Dusun Hilir ' => 140201,
			'Kec. Jenamas ' => 140202,
			'Kec. Karau Kuala ' => 140209,
			'Kec. Dusun Selatan ' => 140210,
			'Kec. Dusun Utara ' => 140211,
			'Kec. Gunung Bintang Awai  ' => 140212,
			'Kab. Barito Utara  ' => 140300,
			'Kec. Montallat ' => 140301,
			'Kec. Gunung Timang ' => 140302,
			'Kec. Gunung Purei  ' => 140303,
			'Kec. Teweh Timur ' => 140304,
			'Kec. Teweh Tengah  ' => 140305,
			'Kec. Lahei ' => 140306,
			'Teweh Baru ' => 140307,
			'Teweh Selatan  ' => 140308,
			'Lahei Barat  ' => 140309,
			'Kab. Kotawaringin Timur ' => 140400,
			'Kec. Mentaya Hilir Selatan  ' => 140402,
			'Kec. Pulau Hanaut  ' => 140405,
			'Kec. Mentawa Baru/Ketapang  ' => 140406,
			'Kec. Mentaya Hilir Utara  ' => 140407,
			'Kec. Kota Besi ' => 140411,
			'Kec. Baamang ' => 140412,
			'Kec. Cempaga ' => 140419,
			'Kec. Parenggean  ' => 140420,
			'Kec. Mentaya Hulu  ' => 140421,
			'Kec. Antang Kalang ' => 140423,
			'Kec. Teluk Sampit  ' => 140425,
			'Kec. Seranau ' => 140426,
			'Kec. Cempaga Hulu  ' => 140427,
			'Kec. Bukit Santuei ' => 140428,
			'Kec. Telawang  ' => 140429,
			'Kec. Tualan Hulu ' => 140430,
			'Kec. Telaga Antang ' => 140431,
			'Tualan Hulu  ' => 140432,
			'Telaga Antang  ' => 140433,
			'Kab. Kotawaringin Barat ' => 140500,
			'Kec. Kotawaringin Lama  ' => 140504,
			'Kec. Arut Selatan  ' => 140505,
			'Kec. Kumai ' => 140506,
			'Kec. Arut Utara  ' => 140507,
			'Kec. Pangkalan Banteng  ' => 140508,
			'Kec. Pangkalan Lada ' => 140509,
			'Kab. Katingan  ' => 140600,
			'Kec. Katingan Kuala ' => 140601,
			'Kec. Mendawai  ' => 140602,
			'Kec. Kampiang  ' => 140603,
			'Kec. Tasik Payawan ' => 140604,
			'Kec. Katingan Hilir ' => 140605,
			'Kec. Tewang Sangalang Garing  ' => 140606,
			'Kec. Pulau Malan ' => 140607,
			'Kec. Katingan Tengah  ' => 140608,
			'Kec. Katingan Hulu ' => 140609,
			'Kec. Marikit ' => 140610,
			'Kec. Sanaman Mantikei   ' => 140611,
			'Kec. Petak Malai ' => 140612,
			'Kec. Bukit Raya  ' => 140613,
			'Kab. Seruyan ' => 140700,
			'Kec. Seruyan Hilir ' => 140701,
			'Kec. Danau Sembuluh ' => 140702,
			'Kec. Hanau ' => 140703,
			'Kec. Seruyan Tengah ' => 140704,
			'Kec. Seruyan Hulu  ' => 140705,
			'Kec. Seruyan Hilir Timur  ' => 140706,
			'Kec. Seruyan Raya  ' => 140707,
			'Kec. Danau Seluluk ' => 140708,
			'Kec. Batu Ampar  ' => 140709,
			'Kec. Suling Tambun ' => 140710,
			'Kec. Sembuluh Raya ' => 140711,
			'Kec. Natai Kelampai ' => 140712,
			'Kec. Sepan Biha  ' => 140713,
			'Kec. Seruyan Hulu Utara ' => 140714,
			'Natai Kelampai ' => 140790,
			'Sepan Biha ' => 140791,
			'Seruyan Hulu Utara ' => 140792,
			'Sembuluh Raya  ' => 140799,
			'Kab. Sukamara  ' => 140800,
			'Kec. Jelai ' => 140801,
			'Kec. Sukamara  ' => 140802,
			'Kec. Balai Riam  ' => 140803,
			'Kec. Pantai Lunci  ' => 140804,
			'Kec. Permata Kecubung   ' => 140805,
			'Kab. Lamandau  ' => 140900,
			'Kec. Bulik ' => 140901,
			'Kec. Lamandau  ' => 140902,
			'Kec. Delang  ' => 140903,
			'Kec. Bulik Timur ' => 140904,
			'Kec. Mentobi Raya  ' => 140905,
			'Kec. Sematu Jaya ' => 140906,
			'Kec. Belantikan Raya  ' => 140907,
			'Kec. Batang Kawa ' => 140908,
			'Kab. Gunung Mas  ' => 141000,
			'Kec. Tewah ' => 141001,
			'Kec. Kurun ' => 141002,
			'Kec. Sepang Simin  ' => 141003,
			'Kec. Rungan  ' => 141004,
			'Kec. Manuhing  ' => 141005,
			'Kec. Kahayan Hulu Utara ' => 141006,
			'Kec. Mihing Raya ' => 141007,
			'Kec. Damang Batu ' => 141008,
			'Kec. Miri Manasa ' => 141009,
			'Kec. Rungan Hulu ' => 141010,
			'Kec. Manuhing Raya ' => 141011,
			'Kec. Rungan Barat' => 141012,
			'Kab. Pulang Pisau  ' => 141100,
			'Kec. Kahayan Kuala ' => 141101,
			'Kec. Pandih Batu ' => 141102,
			'Kec. Maliku  ' => 141103,
			'Kec. Kahayan Hilir ' => 141104,
			'Kec. Kahayan Tengah ' => 141105,
			'Kec. Banama Tingan ' => 141106,
			'Kec. Sebangau Kuala ' => 141107,
			'Kec. Jabiren Raya  ' => 141108,
			'Kab. Murung Raya ' => 141200,
			'Kec. Laung Tuhup ' => 141201,
			'Kec. Murung  ' => 141202,
			'Kec. Permata Intan ' => 141203,
			'Kec. Tanah Siang ' => 141204,
			'Kec. Sumber Barito ' => 141205,
			'Kec. Barito Tuhup Raya  ' => 141206,
			'Kec. Tanah Siang Selatan  ' => 141207,
			'Kec. Sungai Babuat ' => 141208,
			'Kec. Seribu Riam ' => 141209,
			'Kec. Uut Murung  ' => 141210,
			'Kab. Barito Timur  ' => 141300,
			'Kec. Dusun Timur ' => 141301,
			'Kec. Benua Lima  ' => 141302,
			'Kec. Patangkep Tutui  ' => 141303,
			'Kec. Awang ' => 141304,
			'Kec. Dusun Tengah  ' => 141305,
			'Kec. Pematang Karau ' => 141306,
			'Kec. Paju Epat ' => 141307,
			'Kec. Reren Batuah  ' => 141308,
			'Kec. Paku  ' => 141309,
			'Kec. Karusen Janang ' => 141310,
			'Kota Palangka Raya ' => 146000,
			'Kec. Pahandut  ' => 146001,
			'Kec. Bukit Batu  ' => 146002,
			'Kec. Sabangau  ' => 146003,
			'Kec. Jekan Raya  ' => 146004,
			'Kec. Rakumpit  ' => 146005,
			'Prov. Kalimantan Selatan  ' => 150000,
			'Kab. Banjar  ' => 150100,
			'Kec. Aluh-Aluh ' => 150101,
			'Kec. Gambut  ' => 150102,
			'Kec. Kertak Hanyar ' => 150103,
			'Kec. Sungai Tabuk  ' => 150104,
			'Kec. Martapura ' => 150105,
			'Kec. Astambul  ' => 150106,
			'Kec. Karang Intan  ' => 150107,
			'Kec. Aranio  ' => 150108,
			'Kec. Sungai Pinang ' => 150109,
			'Kec. Pengaron  ' => 150110,
			'Kec. Mataraman ' => 150111,
			'Kec. Simpang Empat ' => 150112,
			'Kec. Beruntung Baru ' => 150113,
			'Kec. Martapura Barat  ' => 150114,
			'Kec. Martapura Timur  ' => 150115,
			'Kec. Paramasan ' => 150116,
			'Kec. Tatah Makmur  ' => 150117,
			'Kec. Sambung Makmur ' => 150118,
			'Kec. Telaga Bauntung  ' => 150119,
			'Kab. Tanah Laut  ' => 150200,
			'Kec. Panyipatan  ' => 150201,
			'Kec. Takisung  ' => 150202,
			'Kec. Kurau ' => 150203,
			'Kec. Bati-Bati ' => 150204,
			'Kec. Tambang Ulang ' => 150205,
			'Kec. Pelaihari ' => 150206,
			'Kec. Batu Ampar  ' => 150207,
			'Kec. Jorong  ' => 150208,
			'Kec. Kintap  ' => 150209,
			'Kec. Harapan Bumi Makmur  ' => 150210,
			'Kec. Bajuin  ' => 150211,
			'Kab. Barito Kuala  ' => 150300,
			'Kec. Tabunganen  ' => 150301,
			'Kec. Tamban  ' => 150302,
			'Kec. Mekarsari ' => 150303,
			'Kec. Anjir Pasar ' => 150304,
			'Kec. Anjir Muara ' => 150305,
			'Kec. Alalak  ' => 150306,
			'Kec. Mandastana  ' => 150307,
			'Kec. Belawang  ' => 150308,
			'Kec. Wanaraya  ' => 150309,
			'Kec. Barambai  ' => 150310,
			'Kec. Rantau Badauh ' => 150311,
			'Kec. Cerbon  ' => 150312,
			'Kec. Bakumpai  ' => 150313,
			'Kec. Marabahan ' => 150314,
			'Kec. Tabukan ' => 150315,
			'Kec. Kuripan ' => 150316,
			'Kec. Jejangkit ' => 150317,
			'Kab. Tapin ' => 150400,
			'Kec. Binuang ' => 150401,
			'Kec. Tapin Selatan ' => 150402,
			'Kec. Tapin Tengah  ' => 150403,
			'Kec. Bungur  ' => 150404,
			'Kec. Piani ' => 150405,
			'Kec. Lokpaikat ' => 150406,
			'Kec. Tapin Utara ' => 150407,
			'Kec. Bakarangan  ' => 150408,
			'Kec. Candi Laras Selatan  ' => 150409,
			'Kec. Candi Laras Utara  ' => 150410,
			'Kec. Hatungun  ' => 150411,
			'Kec. Salam Babaris ' => 150412,
			'Kab. Hulu Sungai Selatan  ' => 150500,
			'Kec. Padang Batung ' => 150501,
			'Kec. Loksado ' => 150502,
			'Kec. Telaga Langsat ' => 150503,
			'Kec. Angkinang ' => 150504,
			'Kec. Kandangan ' => 150505,
			'Kec. Sungai Raya ' => 150506,
			'Kec. Simpur  ' => 150507,
			'Kec. Kalumpang ' => 150508,
			'Kec. Daha Selatan  ' => 150509,
			'Kec. Daha Utara  ' => 150510,
			'Kec. Daha Barat  ' => 150511,
			'Kab. Hulu Sungai Tengah ' => 150600,
			'Kec. Haruyan ' => 150601,
			'Kec. Batu Benawa ' => 150602,
			'Kec. Hantakan  ' => 150603,
			'Kec. Batang Alai Selatan  ' => 150604,
			'Kec. Barabai ' => 150605,
			'Kec. Labuan Amas Selatan  ' => 150606,
			'Kec. Labuan Amas Utara  ' => 150607,
			'Kec. Pendawan  ' => 150608,
			'Kec. Batang Alai Utara  ' => 150609,
			'Kec. Batang Alai Timur  ' => 150610,
			'Kec. Limpasu ' => 150611,
			'Kab. Hulu Sungai Utara  ' => 150700,
			'Kec. Danau Panggang ' => 150701,
			'Kec. Babirik ' => 150702,
			'Kec. Sungai Pandan ' => 150703,
			'Kec. Amuntai Selatan  ' => 150704,
			'Kec. Amuntai Tengah ' => 150705,
			'Kec. Banjang ' => 150706,
			'Kec. Amuntai Utara ' => 150707,
			'Kec. Paminggir ' => 150708,
			'Kec. Sungai Tabukan ' => 150709,
			'Kec. Haur Gading ' => 150710,
			'Kab. Tabalong  ' => 150800,
			'Kec. Banua Lawas ' => 150801,
			'Kec. Pugaan  ' => 150802,
			'Kec. Kelua ' => 150803,
			'Kec. Muara Harus ' => 150804,
			'Kec. Tanta ' => 150805,
			'Kec. Tanjung ' => 150806,
			'Kec. Murung Pudak  ' => 150807,
			'Kec. Haruai  ' => 150808,
			'Kec. Upau  ' => 150809,
			'Kec. Muara Uya ' => 150810,
			'Kec. Jaro  ' => 150811,
			'Kec. Bintang Ara ' => 150812,
			'Kab. Kota Baru ' => 150900,
			'Kec. Pulau Sembilan ' => 150901,
			'Kec. Pulau Laut Barat   ' => 150902,
			'Kec. Pulau Laut Selatan ' => 150903,
			'Kec. Pulau Laut Timur   ' => 150904,
			'Kec. Pulau Sebuku  ' => 150905,
			'Kec. Pulau Laut Utara   ' => 150906,
			'Kec. Pulau Laut Tengah  ' => 150907,
			'Kec. Kelumpang Hilir  ' => 150908,
			'Kec. Kelumpang Barat  ' => 150909,
			'Kec. Kelumpang Selatan  ' => 150912,
			'Kec. Kelumpang Hulu ' => 150913,
			'Kec. Hampang ' => 150914,
			'Kec. Sungai Durian ' => 150915,
			'Kec. Kelumpang Tengah   ' => 150916,
			'Kec. Kelumpang Utara  ' => 150917,
			'Kec. Pamukan Selatan  ' => 150918,
			'Kec. Sampanahan  ' => 150919,
			'Kec. Pamukan Utara ' => 150920,
			'Kec. Pulau Laut Kepulauan ' => 150921,
			'Kec. Pamukan Barat ' => 150922,
			'Kec. Pulau Laut Tanjung Selayar' => 150923,
			'Kab. Balangan  ' => 151000,
			'Kec. Lampihong ' => 151001,
			'Kec. Batu Mandi  ' => 151002,
			'Kec. Awayan  ' => 151003,
			'Kec. Paringin  ' => 151004,
			'Kec. Juai  ' => 151005,
			'Kec. Halong  ' => 151006,
			'Kec. Tebing Tinggi ' => 151007,
			'Kec. Paringin Selatan   ' => 151008,
			'Kab. Tanah Bumbu ' => 151100,
			'Kec. Kusan Hilir ' => 151101,
			'Kec. Sungai Loban  ' => 151102,
			'Kec. Satui ' => 151103,
			'Kec. Kusan Hulu  ' => 151104,
			'Kec. Batu Licin  ' => 151105,
			'Kec. Simpang Empat ' => 151106,
			'Kec. Karang Bintang ' => 151107,
			'Kec. Mantewe ' => 151108,
			'Kec. Angsana ' => 151109,
			'Kec. Kuranji ' => 151110,
			'Kota Banjarmasin ' => 156000,
			'Kec. Banjarmasin Selatan  ' => 156001,
			'Kec. Banjarmasin Timur  ' => 156002,
			'Kec. Banjarmasin Barat  ' => 156003,
			'Kec. Banjarmasin Utara  ' => 156004,
			'Kec. Banjarmasin Tengah ' => 156005,
			'Kota Banjarbaru  ' => 156100,
			'Kec. Landasan Ulin ' => 156101,
			'Kec. Cempaka ' => 156102,
			'Kec. Banjarbaru Utara   ' => 156104,
			'Kec. Banjarbaru Selatan ' => 156105,
			'Kec. Liang Anggang ' => 156106,
			'Prov. Kalimantan Timur  ' => 160000,
			'Kab. Pasir ' => 160100,
			'Kec. Batu Sopang ' => 160101,
			'Kec. Tanjung Harapan  ' => 160102,
			'Kec. Pasir Balengkong   ' => 160103,
			'Kec. Tanah Grogot  ' => 160104,
			'Kec. Kuaro ' => 160105,
			'Kec. Long Ikis ' => 160106,
			'Kec. Muara Komam ' => 160107,
			'Kec. Long Kali ' => 160108,
			'Kec. Muara Samu  ' => 160109,
			'Kec. Batu Engau  ' => 160110,
			'Kab. Kutai Kartanegara  ' => 160200,
			'Kec. Semboja ' => 160201,
			'Kec. Muara Jawa  ' => 160202,
			'Kec. Sanga-Sanga ' => 160203,
			'Kec. Loa Janan ' => 160204,
			'Kec. Loa Kulu  ' => 160205,
			'Kec. Muara Muntai  ' => 160206,
			'Kec. Muara Wis ' => 160207,
			'Kec. Kota Bangun ' => 160208,
			'Kec. Tenggarong  ' => 160209,
			'Kec. Sebulu  ' => 160210,
			'Kec. Tenggarong Seberang  ' => 160211,
			'Kec. Anggana ' => 160212,
			'Kec. Muara Badak ' => 160213,
			'Kec. Marang Kayu ' => 160214,
			'Kec. Muara Kaman ' => 160215,
			'Kec. Kenohan ' => 160216,
			'Kec. Kembang Janggut  ' => 160217,
			'Kec. Tabang  ' => 160218,
			'Kab. Berau ' => 160300,
			'Kec. Kelay ' => 160301,
			'Kec. Talisayan ' => 160302,
			'Kec. Biduk Biduk ' => 160303,
			'Kec. Pulau Derawan ' => 160304,
			'Kec. Sambaliung  ' => 160305,
			'Kec. Tanjung Redeb ' => 160306,
			'Kec. Gunung Tabur  ' => 160307,
			'Kec. Segah ' => 160308,
			'Kec. Teluk Bayur ' => 160309,
			'Kec. Tubalar ' => 160312,
			'Kec. Pulau Maratua ' => 160313,
			'Kec. Batu Putih  ' => 160314,
			'Kec. Biatan  ' => 160315,
			'Kab. Bulongan  ' => 160400,
			'Kec. Tanjung Palas ' => 160402,
			'Kec. Sekatak ' => 160403,
			'Kec. Pulau Bunyu ' => 160405,
			'Kec. Tanjung Palas Barat  ' => 160406,
			'Kec. Tanjung Palas Utara  ' => 160407,
			'Kec. Tanjung Palas Timur  ' => 160408,
			'Kec. Tanjung Selor ' => 160409,
			'Kec. Tanjung Palas Tengah ' => 160410,
			'Kec. Peso Hilir  ' => 160411,
			'Kec. Peso  ' => 160413,
			'Kab. Malinau ' => 160700,
			'Kec. Kayan Hulu  ' => 160701,
			'Kec. Kayan Hilir ' => 160702,
			'Kec. Pujungan  ' => 160703,
			'Kec. Malinau Kota  ' => 160704,
			'Kec. Mentarang ' => 160705,
			'Kec. Sungai Boh  ' => 160706,
			'Kec. Malinau Selatan  ' => 160707,
			'Kec. Malinau Barat ' => 160708,
			'Kec. Malinau Utara ' => 160709,
			'Kec. Kayan Selatan ' => 160710,
			'Kec. Bahau Hulu  ' => 160711,
			'Kec. Mentarang Hulu ' => 160712,
			'Kab. Nunukan ' => 160800,
			'Kec. Kerayan ' => 160801,
			'Kec. Lumbis  ' => 160802,
			'Kec. Sembakung ' => 160803,
			'Kec. Nunukan ' => 160804,
			'Kec. Sebatik ' => 160805,
			'Kec. Sebuku  ' => 160806,
			'Kec. Krayan Selatan ' => 160807,
			'Kec. Sebatik Barat ' => 160808,
			'Kec. Nunukan Selatan  ' => 160809,
			'Nunukan  ' => 160814,
			'Krayan Selatan ' => 160815,
			'Krayan ' => 160816,
			'Nunukan Selatan  ' => 160817,
			'Kab. Kutai Barat ' => 160900,
			'Kec. Bongan  ' => 160901,
			'Kec. Jempang ' => 160902,
			'Kec. Penyinggahan  ' => 160903,
			'Kec. Muara Pahu  ' => 160904,
			'Kec. Muara Lawa  ' => 160905,
			'Kec. Damai ' => 160906,
			'Kec. Barong Tongkok ' => 160907,
			'Kec. Melak ' => 160908,
			'Kec. Long Iram ' => 160909,
			'Kec. Long Hubung ' => 160910,
			'Kec. Long Bagun  ' => 160911,
			'Kec. Long Pahangai ' => 160912,
			'Kec. Long Apari  ' => 160913,
			'Kec. Bentian Besar ' => 160915,
			'Kec. Linggang Bingung   ' => 160916,
			'Kec. Manor Bulatn  ' => 160917,
			'Kec. Laham ' => 160918,
			'Kec. Nyuatan ' => 160919,
			'Kec. Sekolaq Darat ' => 160920,
			'Kec. Tering  ' => 160921,
			'Kec. Siluq Ngurai  ' => 160923,
			'Long Bagun ' => 160924,
			'Long Apari ' => 160990,
			'Long Pahangai  ' => 160991,
			'Long Hubung  ' => 160992,
			'Laham ' => 160993,
			'Kab. Kutai Timur ' => 161000,
			'Kec. Muara Ancalong ' => 161001,
			'Kec. Muara Wahau ' => 161002,
			'Kec. Muara Bengkal ' => 161003,
			'Kec. Sengata Utara ' => 161004,
			'Kec. Sangkulirang  ' => 161005,
			'Kec. Kaliorang ' => 161006,
			'Kec. Kombeng ' => 161008,
			'Kec. Bengalon  ' => 161009,
			'Kec. Busang  ' => 161010,
			'Kec. Sandaran  ' => 161011,
			'Kec. Telen ' => 161012,
			'Kec. Sengata Selatan  ' => 161013,
			'Kec. Teluk Pandan  ' => 161014,
			'Kec. Rantau Pulung ' => 161015,
			'Kec. Kaubun  ' => 161016,
			'Kec. Karangan  ' => 161017,
			'Kec. Batu Ampar  ' => 161018,
			'Kec. Long Mesangat ' => 161019,
			'Kab. Penajam Paser Utara  ' => 161100,
			'Kec. Babulu  ' => 161101,
			'Kec. Waru  ' => 161102,
			'Kec. Penajam ' => 161103,
			'Kec. Sepaku  ' => 161104,
			'Kab. Mahakam Ulu' => 161200,
			'Kec. Long Hubung' => 161221,
			'Kec. Laham' => 161222,
			'Kec. Long Apari' => 161223,
			'Kec. Long Pahangai' => 161224,
			'Kec. Long Bagun' => 161225,
			'Kab. Tanah Tidung  ' => 165400,
			'Kota Samarinda ' => 166000,
			'Kec. Palaran ' => 166001,
			'Kec. Samarinda Ilir ' => 166002,
			'Kec. Samarinda Seberang ' => 166003,
			'Kec. Sungai Kunjang ' => 166004,
			'Kec. Samarinda Ulu ' => 166005,
			'Kec. Samarinda Utara  ' => 166006,
			'Kec. Sambutan  ' => 166007,
			'Kec. Sungai Pinang ' => 166008,
			'Kec. Samarinda Kota ' => 166009,
			'Kec. Loa Janan Ilir ' => 166010,
			'Kota Balikpapan  ' => 166100,
			'Kec. Balikpapan Selatan ' => 166101,
			'Kec. Balikpapan Timur   ' => 166102,
			'Kec. Balikpapan Utara   ' => 166103,
			'Kec. Balikpapan Tengah  ' => 166104,
			'Kec. Balikpapan Barat   ' => 166105,
			'Kec. Balikpapan Kota' => 166106,
			'Kota Tarakan ' => 166200,
			'Kec. Tarakan Timur ' => 166201,
			'Kec. Tarakan Tengah ' => 166202,
			'Kec. Tarakan Barat ' => 166203,
			'Kec. Tarakan Utara ' => 166204,
			'Kota Bontang ' => 166300,
			'Kec. Bontang Selatan  ' => 166301,
			'Kec. Bontang Utara ' => 166302,
			'Kec. Bontang Barat ' => 166303,
			'Sesayap  ' => 166404,
			'Sesayap Hilir  ' => 166412,
			'Tana Lia   ' => 166414,
			'Prov. Sulawesi Utara  ' => 170000,
			'Kab. Bolaang Mongondaw  ' => 170100,
			'Kec. Lolayan ' => 170106,
			'Kec. Poigar  ' => 170109,
			'Kec. Bolaang ' => 170110,
			'Kec. Lolak ' => 170111,
			'Kec. Sangtombolang ' => 170112,
			'Kec. Dumoga Utara  ' => 170117,
			'Kec. Dumoga Barat  ' => 170119,
			'Kec. Dumoga Timur  ' => 170120,
			'Kec. Passi Barat ' => 170128,
			'Kec. Passi Timur ' => 170129,
			'Kec. Bilalang  ' => 170130,
			'Kec. Sangtombolang ' => 170131,
			'Bolaang Timur  ' => 170133,
			'Kec. Dumoga' => 170134,
			'Kec. Dumoga Tenggara' => 170135,
			'Kec. Dumoga Tengah' => 170136,
			'Kab. Minahasa  ' => 170200,
			'Kec. Langowan Timur ' => 170209,
			'Kec. Tompaso ' => 170211,
			'Kec. Kawangkoan  ' => 170212,
			'Kec. Sonder  ' => 170213,
			'Kec. Tombariri ' => 170216,
			'Kec. Pineleng  ' => 170217,
			'Kec. Tondano Timur ' => 170219,
			'Kec. Remboken  ' => 170220,
			'Kec. Kakas ' => 170221,
			'Kec. Lembean Timur ' => 170222,
			'Kec. Eris  ' => 170223,
			'Kec. Kombi ' => 170224,
			'Kec. Langowan Barat ' => 170233,
			'Kec. Tombulu ' => 170234,
			'Kec. Tondano Barat ' => 170235,
			'Kec. Tondano Utara ' => 170236,
			'Kec. Langowan Selatan   ' => 170237,
			'Kec. Tondano Selatan  ' => 170238,
			'Kec. Langowan Utara ' => 170239,
			'Kec. Kakas Barat' => 170240,
			'Kec. Kawangkoan Utara' => 170241,
			'Kec. Tombariri Timur' => 170242,
			'Kec. Kawangkoan Barat' => 170243,
			'Kec. Mandolang' => 170244,
			'Kec. Tompaso Barat' => 170245,
			'Kab. Kep. Sangihe  ' => 170300,
			'Kec. Manganitu Selatan  ' => 170304,
			'Kec. Tamako  ' => 170305,
			'Kec. Tabukan Selatan  ' => 170306,
			'Kec. Tabukan Tengah ' => 170307,
			'Kec. Manganitu ' => 170308,
			'Kec. Tahuna  ' => 170309,
			'Kec. Tabukan Utara ' => 170310,
			'Kec. Kendahe ' => 170311,
			'Kec. Tatoareng ' => 170313,
			'Kec. Nusa Tabukan  ' => 170317,
			'Kec. Tabukan Selatan Tengah ' => 170319,
			'Kec. Tabukan Selatan Tenggara ' => 170320,
			'Kec. Tahuna Timur  ' => 170323,
			'Kec. Tahuna Barat  ' => 170324,
			'Kepulauan Marore ' => 170390,
			'Kab. Kepulauan Talaud   ' => 170400,
			'Kec. Kabaruan  ' => 170401,
			'Kec. Lirung  ' => 170402,
			'Kec. Melonguane  ' => 170403,
			'Kec. Beo   ' => 170404,
			'Kec. Rainis  ' => 170405,
			'Kec. Essang  ' => 170406,
			'Kec. Nanusa  ' => 170407,
			'Kec. Gemeh ' => 170408,
			'Kec. Damau ' => 170409,
			'Kec. Tanpa Namma ' => 170410,
			'Kec. Lirung Selatan ' => 170411,
			'Kec. Kalongan  ' => 170412,
			'Kec. Moronge ' => 170413,
			'Kec. Melonguane Timur   ' => 170414,
			'Kec. Beo Utara ' => 170415,
			'Kec. Beo Selatan ' => 170416,
			'Kec. Pulutan ' => 170417,
			'Kec. Essang Selatan ' => 170418,
			'Kec. Miangas ' => 170419,
			'Salibabu   ' => 170420,
			'Kab. Minahasa Selatan   ' => 170500,
			'Kec. Modoinding  ' => 170501,
			'Kec. Tompaso Baru  ' => 170502,
			'Kec. Ranoyapo  ' => 170503,
			'Kec. Motoling  ' => 170504,
			'Kec. Tenga ' => 170505,
			'Kec. Amurang ' => 170509,
			'Kec. Tareran ' => 170510,
			'Kec. Kumelembuai ' => 170515,
			'Kec. Maesaan ' => 170516,
			'Kec. Amurang Barat ' => 170517,
			'Kec. Amurang Timur ' => 170518,
			'Kec. Tatapan ' => 170519,
			'Kec. Motoling Barat ' => 170520,
			'Kec. Motoling Timur ' => 170521,
			'Kec. Sulta ' => 170522,
			'Kec. Tumpaan ' => 170523,
			'Sinonsayang  ' => 170524,
			'Kec. Ratatotok ' => 170529,
			'Kec. Pusomaen  ' => 170530,
			'Kec. Suluun Tareran' => 170531,
			'Kab. Minahasa Utara ' => 170600,
			'Kec. Kauditan  ' => 170601,
			'Kec. Airmadidi ' => 170602,
			'Kec. Dimembe ' => 170603,
			'Kec. Wori  ' => 170604,
			'Kec. Likupang Timur ' => 170605,
			'Kec. Kema  ' => 170606,
			'Kec. Likupang Barat ' => 170607,
			'Kec. Kalawat ' => 170608,
			'Kec. Talawaan  ' => 170609,
			'Kec. Likupang Selatan   ' => 170610,
			'Kab. Bolaang Mongondow Utara  ' => 170800,
			'Kec. Bintauna  ' => 170801,
			'Kec. Bolaang Itang Timur  ' => 170802,
			'Kec. Bolaang Itang Barat  ' => 170803,
			'Kec. Kaidipang ' => 170804,
			'Kec. Pinogaluman ' => 170805,
			'Kec. Sangkub ' => 170806,
			'Kab. Kepulauan Sitaro   ' => 170900,
			'Kec. Biaro ' => 170901,
			'Kec. Siau Barat  ' => 170902,
			'Kec. Siau Barat Selatan ' => 170903,
			'Kec. Siau Barat Utara   ' => 170904,
			'Kec. Siau Tengah ' => 170905,
			'Kec. Siau Timur  ' => 170906,
			'Kec. Siau Timur Selatan ' => 170907,
			'Kec. Tagulandang ' => 170908,
			'Kec. Tagulandang Selatan  ' => 170909,
			'Kec. Tagulandang Utara  ' => 170910,
			'Kab. Minahasa Tenggara  ' => 171000,
			'Kec. Ratatotok ' => 171001,
			'Kec. Pusomaen  ' => 171002,
			'Kec. Belang  ' => 171003,
			'Kec. Ratahan ' => 171004,
			'Kec. Tombatu ' => 171005,
			'Kec. Touluaan  ' => 171006,
			'Kec. Touluaan Selatan   ' => 171007,
			'Kec. Silian Raya ' => 171008,
			'Kec. Tombatu Timur ' => 171009,
			'Kec. Tombatu Utara ' => 171010,
			'Kec. Pasan ' => 171011,
			'Kec. Ratahan Timur ' => 171012,
			'Kab. Bolaang Mongondaw Timur  ' => 171100,
			'Kec. Kotabunan ' => 171101,
			'Kec. Nuangan ' => 171102,
			'Kec.Tutuyan  ' => 171103,
			'Kec. Modayag ' => 171104,
			'Kec. Modayag Barat ' => 171105,
			'Kab. Bolaang Mongondaw Selatan' => 171200,
			'Kec. Bolaang Uki ' => 171201,
			'Kec. Posigadan ' => 171202,
			'Kec. Pinolosian  ' => 171203,
			'Kec. Pinolosian Timur   ' => 171204,
			'Kec. Pinolosian Tengah  ' => 171205,
			'Kec. Helumo' => 171206,
			'Kota Manado  ' => 176000,
			'Kec. Malalayang  ' => 176001,
			'Kec. Sario ' => 176002,
			'Kec. Wenang  ' => 176003,
			'Kec. Mapanget  ' => 176004,
			'Kec. Bunaken ' => 176005,
			'Kec. Wanea ' => 176006,
			'Kec. Tikala  ' => 176007,
			'Kec. Tuminting ' => 176008,
			'Kec. Singkil ' => 176009,
			'Kec. Paal Dua' => 176010,
			'Kec. Bunaken Kepulauan' => 176011,
			'Kota Bitung  ' => 176100,
			'Kec. Ranowulu  ' => 176101,
			'Kec. Matuari ' => 176102,
			'Kec. Girian  ' => 176103,
			'Kec. Madidir ' => 176104,
			'Kec. Maesa ' => 176105,
			'Kec. Aertembaga  ' => 176106,
			'Kec. Lembeh Utara  ' => 176107,
			'Kec. Lembeh Selatan ' => 176108,
			'Kota Tomohon ' => 176200,
			'Kec. Tomohon Utara ' => 176201,
			'Kec. Tomohon Tengah ' => 176202,
			'Kec. Tomohon Selatan  ' => 176203,
			'Kec. Tomohon Timur ' => 176204,
			'Kec. Tomohon Barat ' => 176205,
			'Kota. Kotamobagu ' => 176300,
			'Kec. Kotamobagu Barat   ' => 176301,
			'Kec. Kotamobagu Timur   ' => 176302,
			'Kec. Kotamobagu Utara   ' => 176303,
			'Kec. Kotamobagu Selatan ' => 176304,
			'Prov. Sulawesi Tengah   ' => 180000,
			'Kab. Banggai Kepulauan  ' => 180100,
			'Kec. Labobo  ' => 180101,
			'Kec. Banggai ' => 180102,
			'Kec. Totikum ' => 180103,
			'Kec. Tinangkung  ' => 180104,
			'Kec. Liang ' => 180105,
			'Kec. Bulagi  ' => 180106,
			'Kec. Buko  ' => 180107,
			'Kec. Bokan Kepulauan  ' => 180109,
			'Kec. Bulagi Selatan ' => 180110,
			'Kec. Bangkurung  ' => 180111,
			'Kec. Banggai Utara ' => 180112,
			'Kec. Banggai Tengah ' => 180113,
			'Kec. Banggai Selatan  ' => 180114,
			'Kec. Selatan ' => 180115,
			'Kec. Tinangkung Selatan ' => 180116,
			'Kec. Tinangkung Utara   ' => 180117,
			'Kec. Peling Tengah ' => 180118,
			'Kec. Bulagi Utara  ' => 180119,
			'Kec. Buko Selatan  ' => 180120,
			'Banggai Utara  ' => 180121,
			'Banggai  ' => 180122,
			'Labobo ' => 180190,
			'Bokan Kepulauan  ' => 180191,
			'Bangkurung ' => 180192,
			'Banggai Tengah ' => 180193,
			'Banggai Selatan  ' => 180194,
			'Totikum Selatan  ' => 180199,
			'Kab. Donggala  ' => 180200,
			'Kec. Banawa  ' => 180208,
			'Kec. Labuan  ' => 180209,
			'Kec. Sindue  ' => 180210,
			'Kec. Sirenja ' => 180212,
			'Kec. Balaesang ' => 180213,
			'Kec. Damsol  ' => 180214,
			'Kec. Sojol ' => 180216,
			'Kec. Rio Pakava  ' => 180220,
			'Kec. Banawa Selatan ' => 180224,
			'Kec. Tanantovea  ' => 180225,
			'Kec. Pinembani ' => 180227,
			'Kec. Banawa Tengah ' => 180233,
			'Kec. Sindue Tombusabora ' => 180234,
			'Kec. Sindue Tobata ' => 180235,
			'Kec. Sojol Utara ' => 180236,
			'Kec. Balaesang Tanjung  ' => 180237,
			'Dompelas Sojol ' => 180290,
			'Kab. Parigi Mautong ' => 180300,
			'Kec. Pamona Selatan ' => 180301,
			'Kec. Lore Selatan  ' => 180302,
			'Kec. Pamona Utara  ' => 180303,
			'Kec. Lore Utara  ' => 180304,
			'Kec. Poso Pesisir  ' => 180305,
			'Kec. Lage  ' => 180306,
			'Kec. Poso Kota ' => 180307,
			'Kec. Pamona Timur  ' => 180314,
			'Kec. Lore Tengah ' => 180315,
			'Kec. Pamona Barat  ' => 180316,
			'Kec. Poso Pesisir Selatan ' => 180317,
			'Kec. Poso Pesisir Utara ' => 180318,
			'Kec. Poso Kota Utara  ' => 180319,
			'Kec. Lore Barat  ' => 180320,
			'Kec. Poso Kota Selatan  ' => 180321,
			' Pamona Puselemba  ' => 180322,
			'Kec. Lore Timur  ' => 180323,
			'Kec. Lore Peore  ' => 180324,
			' Pamona Tenggara ' => 180325,
			'Kab. Banggai ' => 180400,
			'Kec. Toili ' => 180401,
			'Kec. Batui ' => 180402,
			'Kec. Bunta ' => 180403,
			'Kec. Kintom  ' => 180404,
			'Kec. Luwuk ' => 180405,
			'Kec. Pagimana  ' => 180406,
			'Kec. Lamala  ' => 180407,
			'Kec. Balantak  ' => 180408,
			'Kec. Bualemo ' => 180409,
			'Kec. Toili Barat ' => 180410,
			'Kec. Nuhon ' => 180411,
			'Kec. Luwuk Timur ' => 180412,
			'Kec. Masama  ' => 180413,
			'Kec. Moilong' => 180414,
			'Kec. Batui Selatan' => 180415,
			'Kec. Luwuk Utara' => 180416,
			'Kec. Luwuk Selatan' => 180417,
			'Kec. Nambo' => 180418,
			'Kec. Mantoh' => 180419,
			'Kec. Balantak Utara' => 180420,
			'Kec. Balantak Selatan' => 180421,
			'Kec. Lobu' => 180422,
			'Kec. Simpang Raya' => 180423,
			'Kab. Buol  ' => 180500,
			'Kec. Biau  ' => 180501,
			'Kec. Momunu  ' => 180502,
			'Kec. Bokat ' => 180503,
			'Kec. Bunobogu  ' => 180504,
			'Kec. Paleleh ' => 180505,
			'Kec. Tiloan  ' => 180506,
			'Kec. Bukal ' => 180507,
			'Kec. Gadung  ' => 180508,
			'Kec. Lipunoto  ' => 180509,
			'Kec. Karamat ' => 180510,
			'Kec. Paleleh Barat ' => 180511,
			'Lakea ' => 180512,
			'Kab. Toli-Toli ' => 180600,
			'Kec. Dampal Selatan ' => 180601,
			'Kec. Dampal Utara  ' => 180602,
			'Kec. Dondo ' => 180603,
			'Kec. Baolan  ' => 180604,
			'Kec. Galang  ' => 180605,
			'Kec. Utara Toli-Toli  ' => 180606,
			'Kec. Ogo Deide ' => 180607,
			'Kec. Basidondo ' => 180608,
			'Kec. Lampasio  ' => 180609,
			'Kec. Dako Pemean ' => 180610,
			'Kab. Marowali  ' => 180700,
			'Kec. Menui Kepulauan  ' => 180701,
			'Kec. Bungku Selatan ' => 180702,
			'Kec. Bungku Tengah ' => 180703,
			'Kec. Bungku Barat  ' => 180704,
			'Kec. Lembo ' => 180705,
			'Kec. Mori Atas ' => 180706,
			'Kec. Petasia ' => 180707,
			'Kec. Bungku Utara  ' => 180708,
			'Kec. Bahodopi  ' => 180709,
			'Kec. Soyo Jaya ' => 180710,
			'Kec. Witaponda ' => 180711,
			'Kec. Mamosalato  ' => 180712,
			'Kec. Bumi Raya ' => 180713,
			'Kec. Petasia Barat' => 180714,
			'Kec. Bungku Timur' => 180715,
			'Kec. Bungku Pesisir' => 180716,
			'Kec. Lembo Raya' => 180717,
			'Kec. Mori Utara' => 180718,
			'Kec. Petasia Timur' => 180719,
			'Kab. Poso  ' => 180800,
			'Kec. Sausu ' => 180801,
			'Kec. Parigi  ' => 180802,
			'Kec. Ampibabo  ' => 180803,
			'Kec. Tinombo ' => 180804,
			'Kec. Tomini  ' => 180805,
			'Kec. Moutong ' => 180806,
			'Kec. Bolano Lambunu ' => 180807,
			'Kec. Kasimbar  ' => 180808,
			'Kec. Torue ' => 180809,
			'Kec. Tinombo Selatan  ' => 180810,
			'Kec. Parigi Selatan ' => 180811,
			'Kec. Mepanga ' => 180812,
			'Kec. Malakosa  ' => 180813,
			'Kec. Parigi Barat  ' => 180814,
			'Kec. Parigi Utara  ' => 180815,
			'Kec. Ribulu  ' => 180816,
			'Kec. Siniu ' => 180817,
			'Kec. Palasa  ' => 180818,
			'Kec. Taopa ' => 180819,
			'Kec. Parigi Tengah ' => 180820,
			'Balinggi   ' => 180821,
			'Ongka Malino ' => 180890,
			'Bolano ' => 180891,
			'Lambunu  ' => 180892,
			'Kec. Sidoan' => 180893,
			'Kab. Tojo Una-Una  ' => 180900,
			'Kec. Tojo  ' => 180901,
			'Kec. Ulubongka ' => 180902,
			'Kec. Ampana Tete ' => 180903,
			'Kec. Ampana Kota ' => 180904,
			'Kec. Una - Una ' => 180905,
			'Kec. Walea Kepulauan  ' => 180906,
			'Kec. Togean  ' => 180907,
			'Kec. Tojo Barat  ' => 180908,
			'Kec. Walea Besar ' => 180909,
			'Kec. Ratolindo' => 180910,
			'Kec. Batudaka' => 180911,
			'Kec. Talatako' => 180912,
			'Kab. Sigi  ' => 181000,
			'Kec. Kulawi  ' => 181001,
			'Kec. Pipikoro  ' => 181002,
			'Kec. Kulawi Selatan ' => 181003,
			'Kec. Lindu ' => 181004,
			'Kec. Palolo  ' => 181005,
			'Kec. Nokilalaki  ' => 181006,
			'Kec. Dolo  ' => 181007,
			'Kec. Dolo Selatan  ' => 181008,
			'Kec. Dolo Barat  ' => 181009,
			'Kec. Marawola  ' => 181010,
			'Kec. Kinovaru  ' => 181011,
			'Kec. Marawola Barat ' => 181012,
			'Kec. Sigibiromaru  ' => 181013,
			'Kec. Gumbasa ' => 181014,
			'Kec. Tanambulava ' => 181015,
			'Kab. Banggai Laut' => 181100,
			'Kec. Bokan Kepulauan' => 181112,
			'Kec. Bangkurung' => 181113,
			'Kec. Labobo' => 181114,
			'Kec. Banggai Selatan' => 181115,
			'Kec. Banggai Tengah' => 181116,
			'Kec. Banggai' => 181117,
			'Kec. Banggai Utara' => 181118,
			'Kec. Banggai' => 181119,
			'Kec. Banggai Utara' => 181120,
			'Kab. Morowali Utara' => 181200,
			'Kec. Bungku Utara' => 181201,
			'Kec. Lembo' => 181202,
			'Kec. Lembo Raya' => 181203,
			'Kec. Mamosalato' => 181204,
			'Kec. Mori Atas' => 181205,
			'Kec. Mori Utara' => 181206,
			'Kec. Petasia' => 181207,
			'Kec. Petasia Timur' => 181208,
			'Kec. Soyo Jaya' => 181209,
			'Kec. Petasia Barat' => 181210,
			'Kota Palu  ' => 186000,
			'Kec. Palu Barat  ' => 186001,
			'Kec. Palu Selatan  ' => 186002,
			'Kec. Palu Timur  ' => 186003,
			'Kec. Palu Utara  ' => 186004,
			'Kec. Ulujadi' => 186005,
			'Kec. Tatanga' => 186006,
			'Kec. Tawaeli' => 186007,
			'Kec. Mantikulore' => 186008,
			'Prov. Sulawesi Selatan  ' => 190000,
			'Kab. Maros ' => 190100,
			'Kec. Mandai  ' => 190101,
			'Kec. Maros Baru  ' => 190102,
			'Kec. Maros Utara ' => 190103,
			'Kec. Bantimurung ' => 190104,
			'Kec. Tanralili ' => 190105,
			'Kec. Camba ' => 190106,
			'Kec. Mallawa ' => 190107,
			'Kec. Moncongloe  ' => 190108,
			'Kec. Turikale  ' => 190109,
			'Kec. Marusu  ' => 190110,
			'Kec. Lau   ' => 190111,
			'Kec. Simbang ' => 190112,
			'Kec. Tompobulu ' => 190113,
			'Kec. Cenrana ' => 190114,
			'Bontoa ' => 190115,
			'Kab. Pangkajene Kepulauan ' => 190200,
			'Kec. Liukang Tangaya  ' => 190201,
			'Kec. Liukang Kalukuang Masalim' => 190202,
			'Kec. Liukang Tapabiring ' => 190203,
			'Kec. Pangkajene  ' => 190204,
			'Kec. Balocci ' => 190205,
			'Kec. Bungoro ' => 190206,
			'Kec. Labakkang ' => 190207,
			'Kec. Ma`rang ' => 190208,
			'Kec. Sigeri  ' => 190209,
			'Kec. Minasatene  ' => 190210,
			'Kec. Tondong Tallasa  ' => 190211,
			'Kec. Mandalle  ' => 190212,
			' Liukang Tupabbiring Utara  ' => 190213,
			'Kab. Gowa  ' => 190300,
			'Kec. Bontonompo  ' => 190301,
			'Kec. Bajeng  ' => 190302,
			'Kec. Pallangga ' => 190303,
			'Kec. Somba Opu ' => 190304,
			'Kec. Bontomarannu  ' => 190305,
			'Kec. Parang Loe  ' => 190306,
			'Kec. Tinggi Moncong ' => 190307,
			'Kec. Bungaya ' => 190308,
			'Kec. Tompobulu ' => 190309,
			'Kec. Barombong ' => 190310,
			'Kec. Biring Bulu ' => 190311,
			'Kec. Tombolo Pao ' => 190312,
			'Kec. Manuju  ' => 190313,
			'Kec. Bontolempangan ' => 190314,
			'Kec. Pattallassang ' => 190315,
			'Kec. Bontonompo Selatan ' => 190316,
			'Kec. Parigi  ' => 190317,
			'Kec. Bajeng Barat  ' => 190318,
			'Pattalasang  ' => 190399,
			'Kab. Takalar ' => 190400,
			'Kec. Mangarabombang ' => 190401,
			'Kec. Mappakasunggu ' => 190402,
			'Kec. Polombangkeng Selatan  ' => 190403,
			'Kec. Polombangkeng Utara  ' => 190404,
			'Kec. Galesong Selatan   ' => 190405,
			'Kec. Galesong Utara ' => 190406,
			'Kec. Pattallassang ' => 190408,
			'Kec. Sanrobone ' => 190409,
			'Kec. Galesong  ' => 190410,
			'Kab. Jeneponto ' => 190500,
			'Kec. Bangkala  ' => 190501,
			'Kec. Tamalatea ' => 190502,
			'Kec. Binamu  ' => 190503,
			'Kec. Batang  ' => 190504,
			'Kec. Kelara  ' => 190505,
			'Kec. Bangkala Barat ' => 190506,
			'Kec. Bontoramba  ' => 190507,
			'Kec. Turatea ' => 190508,
			'Kec. Arungkeke ' => 190509,
			'Kec. Rumbia  ' => 190510,
			'Kec. Tarowang  ' => 190511,
			'Kab. Barru ' => 190600,
			'Kec. Tanete Riaja  ' => 190601,
			'Kec. Tanete Rilau  ' => 190602,
			'Kec. Barru ' => 190603,
			'Kec. Soppeng Riaja ' => 190604,
			'Kec. Mallusetasi ' => 190605,
			'Kec. Balusu  ' => 190606,
			'Kec. Pujananting ' => 190607,
			'Kab. Bone  ' => 190700,
			'Kec. Bontocani ' => 190701,
			'Kec. Kahu  ' => 190702,
			'Kec. Kajuara ' => 190703,
			'Kec. Selomekko ' => 190704,
			'Kec. Tonra ' => 190705,
			'Kec. Patimpeng ' => 190706,
			'Kec. Libureng  ' => 190707,
			'Kec. Mare  ' => 190708,
			'Kec. Sibulue ' => 190709,
			'Kec. Cina  ' => 190710,
			'Kec. Barebbo ' => 190711,
			'Kec. Ponre ' => 190712,
			'Kec. Lappariaja  ' => 190713,
			'Kec. Lamuru  ' => 190714,
			'Kec. Bengo ' => 190715,
			'Kec. Ulaweng ' => 190716,
			'Kec. Palakka ' => 190717,
			'Kec. Awangpone ' => 190718,
			'Kec. Tellu Siattinge  ' => 190719,
			'Kec. Amali ' => 190720,
			'Kec. Ajangale  ' => 190721,
			'Kec. Dua Boccoe  ' => 190722,
			'Kec. Cenrana ' => 190723,
			'Kec. Tanete Riattang Barat  ' => 190724,
			'Kec. Tanete Riattang  ' => 190725,
			'Kec. Tanete Riattang Timur  ' => 190726,
			'Kec. Tellu Limpoe  ' => 190727,
			'Kab. Wajo  ' => 190800,
			'Kec. Sabbangparu ' => 190801,
			'Kec. Tempe ' => 190802,
			'Kec. Pammana ' => 190803,
			'Kec. Bola  ' => 190804,
			'Kec. Takkalala ' => 190805,
			'Kec. Sajo Anging ' => 190806,
			'Kec. Majauleng ' => 190807,
			'Kec. Tanasitolo  ' => 190808,
			'Kec. Belawa  ' => 190809,
			'Kec. Maniang Pajo  ' => 190810,
			'Kec. Keera ' => 190811,
			'Kec. Pitumpanua  ' => 190812,
			'Kec. Gilireng  ' => 190813,
			'Kec. Penrang ' => 190814,
			'Kab. Soppeng ' => 190900,
			'Kec. Mariowiwawo ' => 190901,
			'Kec. Lalabata  ' => 190902,
			'Kec. Liliriaja ' => 190903,
			'Kec. Lili Rilau  ' => 190904,
			'Kec. Donri-Donri ' => 190905,
			'Kec. Mario Riawa ' => 190906,
			'Kec. Ganra ' => 190907,
			'Kec. Citta ' => 190908,
			'Kab. Bantaeng  ' => 191000,
			'Kec. Bissappu  ' => 191001,
			'Kec. Bantaeng  ' => 191002,
			'Kec. Tompobulu ' => 191003,
			'Kec. Ulu Ere ' => 191004,
			'Kec. Ere Merasa  ' => 191005,
			'Kec. Pa`jukukang ' => 191006,
			'Kec. Gantarang Keke ' => 191007,
			'Kec. Sinoa ' => 191008,
			'Kab. Bulukumba ' => 191100,
			'Kec. Gantarang ' => 191101,
			'Kec. Ujung Bulu  ' => 191102,
			'Kec. Bontobahari ' => 191103,
			'Kec. Bontotiro ' => 191104,
			'Kec. Hero Lange-Lange   ' => 191105,
			'Kec. Kajang  ' => 191106,
			'Kec. Bulukumba ' => 191107,
			'Kec. Rilau Ale ' => 191108,
			'Kec. Kindang ' => 191109,
			'Kec. Ujung Loe ' => 191110,
			'Kab. Sinjai  ' => 191200,
			'Kec. Sinjai Barat  ' => 191201,
			'Kec. Sinjai Borong ' => 191202,
			'Kec. Sinjai Selatan ' => 191203,
			'Kec. Tellu Limpoe  ' => 191204,
			'Kec. Sinjai Timur  ' => 191205,
			'Kec. Sinjai Tengah ' => 191206,
			'Kec. Sinjai Utara  ' => 191207,
			'Kec. Bulupoddo ' => 191208,
			'Kec. Pulau Sembilan ' => 191209,
			'Kab. Selayar ' => 191300,
			'Kec. Pasimarannu ' => 191301,
			'Kec. Pasimassunggu ' => 191302,
			'Kec. Bontosikuyu ' => 191303,
			'Kec. Bontoharu ' => 191304,
			'Kec. Bontomatene ' => 191305,
			'Kec. Bontomanai  ' => 191306,
			'Kec. Benteng ' => 191307,
			'Kec. Taka Bonerate ' => 191308,
			'Kec. Pasilambena ' => 191309,
			'Kec. Pasimasunggu Timur ' => 191310,
			'Kec. Buki  ' => 191311,
			'Pasimasunggu ' => 191390,
			'Kec. Pasimasunggu' => 191391,
			'Kec. Pasimasunggu' => 191392,
			'Kec. Pasimasunggu' => 191393,
			'Kec. Pasimasunggu' => 191394,
			'Kab. Pinrang ' => 191400,
			'Kec. Suppa ' => 191401,
			'Kec. Mattiro Sompe ' => 191402,
			'Kec. Mattiro Bulu  ' => 191403,
			'Kec. Watang Sawitto ' => 191404,
			'Kec. Patampanua  ' => 191405,
			'Kec. Cempa ' => 191406,
			'Kec. Duampanua ' => 191407,
			'Kec. Lembang ' => 191408,
			'Kec. Lanrisang ' => 191409,
			'Kec. Tiroang ' => 191410,
			'Kec. Paleteang ' => 191411,
			'Kec. Batulappa ' => 191412,
			'Kab. Sidenreng Rappang  ' => 191500,
			'Kec. Panca Lautang ' => 191501,
			'Kec. Tellulimpoe ' => 191502,
			'Kec. Watangpulu  ' => 191503,
			'Kec. Baranti ' => 191504,
			'Kec. Panca Rijang  ' => 191505,
			'Kec. Maritengae  ' => 191506,
			'Kec. Pitu Riawa  ' => 191507,
			'Kec. Duapitue  ' => 191508,
			'Kec. Kulo  ' => 191509,
			'Kec. Pitu Riase  ' => 191510,
			'Kec. Watang Sidenreng   ' => 191511,
			'Kab. Enrekang  ' => 191600,
			'Kec. Maiwa ' => 191601,
			'Kec. Enrekang  ' => 191602,
			'Kec. Barakka ' => 191603,
			'Kec. Anggeraja ' => 191604,
			'Kec. Alla  ' => 191605,
			'Kec. Bungin  ' => 191606,
			'Kec. Cendana ' => 191607,
			'Kec. Curio ' => 191608,
			'Kec. Malua ' => 191609,
			'Kec. Buntu Batu  ' => 191610,
			'Kec. Masale  ' => 191611,
			'Kec. Baroko  ' => 191612,
			'Kab. Luwu  ' => 191700,
			'Kec. Larompong ' => 191701,
			'Kec. Suli  ' => 191702,
			'Kec. Belopa  ' => 191703,
			'Kec. Bajo  ' => 191704,
			'Kec. Bassesangtempe ' => 191705,
			'Kec. Buaponrang  ' => 191706,
			'Kec. Bua   ' => 191707,
			'Kec. Walenrang ' => 191708,
			'Kec. Lamasi  ' => 191709,
			'Kec. Latimojong  ' => 191710,
			'Kec. Larompong Selatan  ' => 191711,
			'Kec. Kamanre ' => 191712,
			'Kec. Walenrang Barat  ' => 191713,
			'Kec. Walenrang Utara  ' => 191714,
			'Kec. Walenrang Timur  ' => 191715,
			'Kec. Lamasi Timur  ' => 191716,
			'Kec. Suli Barat  ' => 191717,
			'Kec. Bajo Barat  ' => 191718,
			'Kec. Ponrang Selatan  ' => 191719,
			'Kec. Ponrang ' => 191720,
			'Kec. Bolopa Utara  ' => 191721,
			'Kec. Bassesangtempe Utara' => 191722,
			'Kab. Tana Toraja ' => 191800,
			'Kec. Bonggakaradeng ' => 191801,
			'Kec. Mengkendek  ' => 191802,
			'Kec. Sangalla  ' => 191803,
			'Kec. Makale  ' => 191804,
			'Kec. Saluputti ' => 191805,
			'Kec. Simbuang  ' => 191810,
			'Kec. Rantetayo ' => 191811,
			'Kec. Bittuang  ' => 191812,
			'Kec. Ranomeeto ' => 191813,
			'Kec. Mappak  ' => 191814,
			'Kec. Gadang Batu Silanan  ' => 191815,
			'Kec. Sangala Selatan  ' => 191816,
			'Kec. Sangala Utara ' => 191817,
			'Kec. Makale Selatan ' => 191818,
			'Kec. Makale Utara  ' => 191819,
			'Kec. Rembon  ' => 191820,
			'Kec. Masanda ' => 191821,
			'Kec. Malimbong Balepe   ' => 191822,
			'Kec. Kurra ' => 191823,
			'Kab. Luwu Utara  ' => 192400,
			'Kec. Sabbang ' => 192401,
			'Kec. Baebunta  ' => 192402,
			'Kec. Malangke  ' => 192403,
			'Kec. Sukamaju  ' => 192404,
			'Kec. Bone-Bone ' => 192405,
			'Kec. Massamba  ' => 192412,
			'Kec. Limbong ' => 192413,
			'Kec. Mappedeceng ' => 192415,
			'Kec. Sekko ' => 192416,
			'Kec. Rampi ' => 192417,
			'Kec. Malangke Barat ' => 192418,
			'Tana Lili  ' => 192490,
			'Kab. Luwu Timur  ' => 192600,
			'Kec. Burau ' => 192601,
			'Kec. Tomoni  ' => 192602,
			'Kec. Wotu  ' => 192603,
			'Kec. Malili  ' => 192604,
			'Kec. Nuha  ' => 192605,
			'Kec. Mangkutana  ' => 192606,
			'Kec. Towuti  ' => 192607,
			'Kec. Angkona ' => 192608,
			'Kec. Tomoni Timur  ' => 192609,
			'Kec. Kalaena ' => 192610,
			'Kec. Wasuponda ' => 192611,
			'Kab. Toraja Utara  ' => 192700,
			'Kec. Awan Rante karua   ' => 192701,
			'Kec. Balusu  ' => 192702,
			'Kec. Bengkelekila  ' => 192703,
			'Kec. Baruppu ' => 192704,
			'Kec. Buntao  ' => 192705,
			'Kec. Kapala Pitu ' => 192706,
			'Kec. Kesu  ' => 192707,
			'Kec. Nanggala  ' => 192708,
			'Kec. Rantebua  ' => 192709,
			'Kec. Rantepao  ' => 192710,
			'Kec. Rindingallo ' => 192711,
			'Kec. Sa`dan  ' => 192712,
			'Kec. Sanggalangi ' => 192713,
			'Kec. Sesean  ' => 192714,
			'Kec. Sesean Suloara ' => 192715,
			'Kec. Sopai ' => 192716,
			'Kec. Tallunglipu ' => 192717,
			'Kec. Tikala  ' => 192718,
			'Kec. Tondon  ' => 192719,
			'Kec. Dende` Piongan Napo  ' => 192720,
			'Kec. Buntu Pepasan ' => 192721,
			'Kota Makassar  ' => 196000,
			'Kec. Mariso  ' => 196001,
			'Kec. Mamajang  ' => 196002,
			'Kec. Tamalate  ' => 196003,
			'Kec. Makasar ' => 196004,
			'Kec. Ujung Pandang ' => 196005,
			'Kec. Wajo  ' => 196006,
			'Kec. Bontoala  ' => 196007,
			'Kec. Ujung Tanah ' => 196008,
			'Kec. Tallo ' => 196009,
			'Kec. Panakukkang ' => 196010,
			'Kec. Biringkanaya  ' => 196011,
			'Kec. Tamalanrea  ' => 196012,
			'Kec. Rappocini ' => 196013,
			'Kec. Manggala  ' => 196014,
			'Kota Pare-Pare ' => 196100,
			'Kec. Bacukiki  ' => 196101,
			'Kec. Ujung ' => 196102,
			'Kec. Soreang ' => 196103,
			'Kec. Bacukiki Barat ' => 196104,
			'Kota Palopo  ' => 196200,
			'Kec. Wara  ' => 196201,
			'Kec. Wara Utara  ' => 196202,
			'Kec. Wara Selatan  ' => 196203,
			'Kec. Telluwanua  ' => 196204,
			'Kec. Wara Timur  ' => 196205,
			'Kec. Wara Barat  ' => 196206,
			'Kec. Sendana ' => 196207,
			'Kec. Mungkajang  ' => 196208,
			'Kec. Bara  ' => 196209,
			'Prov. Sulawesi Tenggara ' => 200000,
			'Kab. Konawe  ' => 200100,
			'Kec. Soropia ' => 200108,
			'Kec. Sampara ' => 200109,
			'Kec. Lambuya ' => 200112,
			'Kec. Pondidaha ' => 200114,
			'Kec. Wawotobi  ' => 200115,
			'Kec. Unaaha  ' => 200116,
			'Kec. Abuki ' => 200118,
			'Kec. BondoAla  ' => 200124,
			'Kec. Uepai ' => 200125,
			'Kec. Wonggeduku  ' => 200126,
			'Kec. Tongauna  ' => 200128,
			'Kec. Latoma  ' => 200130,
			'Kec. Besulutu  ' => 200131,
			'Kec. Puriala ' => 200132,
			'Kec. Meluhu  ' => 200133,
			'Kec. Amonggedo ' => 200134,
			'Kec. Wawonii Barat ' => 200135,
			'Kec. Wawonii Timur ' => 200136,
			'Kec. Wawonii Selatan  ' => 200137,
			'Kec. Wawonii Utara ' => 200138,
			'Kec. Routa ' => 200139,
			'Kec. Anggaberi ' => 200140,
			'Kec. Wawoni Tengah ' => 200141,
			'Kec. Kapoiala  ' => 200142,
			'Kec. Konawe  ' => 200143,
			' Asinua  ' => 200144,
			' Wawonii Tenggara  ' => 200145,
			' Wawonii Timur Laut ' => 200146,
			' Lalonggasumeeto ' => 200147,
			' Onembute  ' => 200148,
			'Kec. Anggalomoare' => 200149,
			'Kec. Morosi' => 200150,
			'Kec. Wonggeduku Barat' => 200151,
			'Kec. Padangguni' => 200152,
			'Kec. Tongauna Utara' => 200153,
			'Kec. Anggotoa' => 200154,
			'Kab. Muna  ' => 200200,
			'Kec. Tongkuno  ' => 200201,
			'Kec. Parigi  ' => 200202,
			'Kec. Kabawo  ' => 200203,
			'Kec. Lawa  ' => 200205,
			'Kec. Kusambi ' => 200206,
			'Kec. Katobu  ' => 200207,
			'Kec. Napabalano  ' => 200208,
			'Kec. Wakorumba Selatan  ' => 200209,
			'Kec. Lohia ' => 200215,
			'Kec. Kontunaga ' => 200216,
			'Kec. Sawerigadi  ' => 200217,
			'Kec. Maginti ' => 200218,
			'Kec. Kabangka  ' => 200219,
			'Kec. Maligano  ' => 200220,
			'Kec. Tiworo Tengah ' => 200224,
			'Kec. Barangka  ' => 200225,
			'Kec. Watopute  ' => 200226,
			'Kec. Batalaiworu ' => 200227,
			'Kec. Duruka  ' => 200228,
			'Kec. Lasalepa  ' => 200229,
			'Kec. Pasir Putih ' => 200230,
			'Kec. Tiworo Kepulauan   ' => 200232,
			'Kec. Bone  ' => 200233,
			' Kontu Kowuna  ' => 200234,
			' Marobo  ' => 200235,
			' Tongkuno Selatan  ' => 200236,
			' Pasi Kolaga ' => 200237,
			' Batukara  ' => 200238,
			' Wa Daga   ' => 200239,
			' Napano Kusambi  ' => 200240,
			' Towea ' => 200241,
			' Tiworo Selatan  ' => 200242,
			' Tiworo Utara  ' => 200243,
			'Kec. Kusambi' => 200244,
			'Kab. Buton ' => 200300,
			'Kec. Lasalimu  ' => 200305,
			'Kec. Pasar Wajo  ' => 200306,
			'Kec. Sampolawa ' => 200307,
			'Kec. Batauga ' => 200308,
			'Kec. Kapontori ' => 200311,
			'Kec. Gu  ' => 200312,
			'Kec. Lakudo  ' => 200313,
			'Kec. Mawasangka  ' => 200314,
			'Kec. Lasalimu Selatan   ' => 200321,
			'Kec. Batu Atas ' => 200322,
			'Kec. Siompu  ' => 200323,
			'Kec. Kadatua ' => 200324,
			'Kec. Mawasangka Timur   ' => 200325,
			'Kec. Talaga Raya ' => 200326,
			'Kec. Mawasangka Tengah  ' => 200328,
			'Kec. Sangia Wambulu ' => 200329,
			'Kec. Siontapia ' => 200330,
			'Kec. Wolowa  ' => 200331,
			'Kec. Wabula  ' => 200332,
			'Kec. Lapandewa ' => 200333,
			'Kec. Siompu Barat  ' => 200334,
			'Kab. Kolaka  ' => 200400,
			'Kec. Watubangga  ' => 200401,
			'Kec. Pomalaa ' => 200402,
			'Kec. Wundulako ' => 200403,
			'Kec. Ladongi ' => 200404,
			'Kec. Tirawuta  ' => 200405,
			'Kec. Kolaka  ' => 200406,
			'Kec. Wolo  ' => 200407,
			'Kec. Mowewe  ' => 200408,
			'Kec. Tanggetada  ' => 200412,
			'Kec. Baula ' => 200413,
			'Kec. Lambandia ' => 200414,
			'Kec. Latambaga ' => 200415,
			'Kec. Samaturu  ' => 200416,
			'Kec. Uluiwoi ' => 200417,
			'Kec. Tinondo ' => 200418,
			'Kec. Poli-Polia  ' => 200419,
			'Kec. Lalolae ' => 200420,
			'Kec. Toari ' => 200421,
			'Kec. Polinggona  ' => 200422,
			'Kec. Loela ' => 200423,
			'Tirawuta   ' => 200424,
			'Ladongi  ' => 200425,
			'Poli-polia ' => 200426,
			'Lambandia  ' => 200427,
			'Uluiwoi  ' => 200428,
			'Mowewe ' => 200429,
			'Kec. Iwoimendaa' => 200430,
			'Kab. Konawe Selatan ' => 200500,
			'Kec. Tinanggea ' => 200501,
			'Kec. Palangga  ' => 200502,
			'Kec. Konda ' => 200503,
			'Kec. Lainea  ' => 200504,
			'Kec. Moramo  ' => 200505,
			'Kec. Ranomeeto ' => 200506,
			'Kec. Landono ' => 200507,
			'Kec. Kolono  ' => 200508,
			'Kec. Andolo  ' => 200509,
			'Kec. Laonti  ' => 200510,
			'Kec. Angata  ' => 200511,
			'Kec. Lalembuu  ' => 200512,
			'Kec. Buke  ' => 200513,
			'Kec. Palangga Selatan   ' => 200514,
			'Kec. Baito ' => 200515,
			'Kec. Laeya ' => 200516,
			'Kec. Moramo Utara  ' => 200517,
			'Kec. Wolasi  ' => 200518,
			'Kec. Ranomeeto Barat  ' => 200519,
			'Kec. Mowila  ' => 200520,
			'Kec. Benua ' => 200521,
			'Kec. Basala  ' => 200522,
			'Kab. Wakatobi  ' => 200600,
			'Kec. Binongko  ' => 200601,
			'Kec. Tomia ' => 200602,
			'Kec. Kaledupa  ' => 200603,
			'Kec. Wangi-Wangi ' => 200604,
			'Kec. Wangi-Wangi Selatan  ' => 200605,
			'Kec. Kaledupa Selatan   ' => 200606,
			'Kec. Tomia Timur ' => 200607,
			'Kec. Togo Binongko ' => 200608,
			'Kab. Bombana ' => 200700,
			'Kec. Kabaena ' => 200701,
			'Kec. Kabaena Timur ' => 200702,
			'Kec. Poleang ' => 200703,
			'Kec. Poleang Timur ' => 200704,
			'Kec. Rumbia  ' => 200705,
			'Kec. Rarowatu  ' => 200706,
			'Kec. Poleang Barat ' => 200707,
			'Kec. Mataelo ' => 200708,
			'Kec. Rarowatu Utara ' => 200709,
			'Kec. Poleang Utara ' => 200710,
			'Kec. Poleang Selatan  ' => 200711,
			'Kec. Poleang Tenggara   ' => 200712,
			'Kec. Kabaena Selatan  ' => 200713,
			'Kec. Kabaena Barat ' => 200714,
			'Kec. Kabaena Utara ' => 200715,
			'Kec. Kabaena Tengah ' => 200716,
			'Kec. Kep. Masaloka Raya ' => 200717,
			'Kec. Rumbia Tengah ' => 200718,
			'Kec. Poleang Tengah ' => 200719,
			'Kec. Tatonuwu  ' => 200720,
			'Kec. Lantari Jaya  ' => 200721,
			'Kec. Mata Usu  ' => 200722,
			'Kab. Kolaka Utara  ' => 200800,
			'Kec. Lasusua ' => 200801,
			'Kec. Pakue ' => 200802,
			'Kec. Batu Putih  ' => 200803,
			'Kec. Ranteangin  ' => 200804,
			'Kec. Kodeoha ' => 200805,
			'Kec. Ngapa ' => 200806,
			'Kec. Wawo  ' => 200807,
			'Kec. Lambai  ' => 200808,
			'Kec. Watunohu  ' => 200809,
			'Kec. Pakue Tengah  ' => 200810,
			'Kec. Pakue Utara ' => 200811,
			'Kec. Porehu  ' => 200812,
			'Kec. Katoi ' => 200813,
			'Kec. Tiwu  ' => 200814,
			'Kec. Katoi ' => 200815,
			'Tolala ' => 200890,
			'Kab. Konawe Utara  ' => 200900,
			'Kec. Langkima  ' => 200901,
			'Kec. Molawe  ' => 200902,
			'Kec. Lembo ' => 200903,
			'Kec. Asera ' => 200904,
			'Kec. Wiwirano  ' => 200905,
			'Kec. Lasolo  ' => 200906,
			'Kec. Sawa  ' => 200907,
			'Kec. Oheo  ' => 200908,
			'Kec. Andowia ' => 200909,
			'Kec. Motui ' => 200910,
			'Kec. Landawe' => 200911,
			'Kec. Lasolo Kepulauan' => 200912,
			'Kec. Wawolesea' => 200913,
			'Kab. Buton Utara ' => 201000,
			'Kec. Kulisusu  ' => 201001,
			'Kec. Kulisusu Barat ' => 201002,
			'Kec. Kulisusu Utara ' => 201003,
			'Kec. Kambowa ' => 201004,
			'Kec. Bonenugu  ' => 201005,
			'Kec. Wakorumba Utara  ' => 201006,
			'Wakorumba Utara  ' => 201099,
			'Kab. Kolaka Timur' => 201100,
			'Loea  ' => 201111,
			'Kec. Ladongi' => 201112,
			'Kec. Poli-Polia' => 201113,
			'Kec. Lambandia' => 201114,
			'Lalolae  ' => 201115,
			'Kec. Mowewe' => 201116,
			'Kec. Uluiwoi' => 201117,
			'Kec. Tinondo' => 201118,
			'Kec. Tirawuta' => 201119,
			'Kec. Ueesi' => 201120,
			'Kec. Aere' => 201121,
			'Kec. Dangia' => 201122,
			'Kab. Konawe Kepulauan' => 201200,
			'Kec. Wawonii Barat' => 201201,
			'Kec. Wawonii Utara' => 201202,
			'Kec. Wawonii Timur Laut' => 201203,
			'Kec. Wawonii Timur' => 201204,
			'Kec. Wawonii Tenggara' => 201205,
			'Kec. Wawonii Selatan' => 201206,
			'Kec. Wawonii Tengah' => 201207,
			'Kab. Muna Barat' => 201300,
			'Kec. Sawerigadi' => 201301,
			'Kec. Barangka' => 201302,
			'Kec. Lawa' => 201303,
			'Kec. Wadaga' => 201304,
			'Kec. Tiworo Selatan' => 201305,
			'Kec. Maginti' => 201306,
			'Kec. Tiworo Tengah' => 201307,
			'Kec. Tiworo Tengah' => 201308,
			'Kec. Tiworo Utara' => 201309,
			'Kec. Tiworo Kepulauan' => 201310,
			'Kec. Napano Kusambi' => 201311,
			'Kec. Kusambi' => 201312,
			'Kab. Buton Selatan' => 201400,
			'Kec. Batauga' => 201401,
			'Kec. Sampolawa' => 201402,
			'Kec. Lapandewa' => 201403,
			'Kec. Batu Atas' => 201404,
			'Kec. Siompu Barat' => 201405,
			'Kec. Siompu' => 201406,
			'Kec. Kadatua' => 201407,
			'Kab. Buton Tengah' => 201600,
			'Kec. Lakudo' => 201601,
			'Kec. Mawasangka Timur' => 201602,
			'Kec. Mawasangka Tengah' => 201603,
			'Kec. Mawasangka' => 201604,
			'Kec.Talaga Raya' => 201605,
			'Kec. Gu' => 201606,
			'Kec. Sangia Wambulu' => 201607,
			'Kota Kendari ' => 206000,
			'Kec. Mandonga  ' => 206001,
			'Kec. Poasia  ' => 206002,
			'Kec. Kendari ' => 206003,
			'Kec. Baruga  ' => 206004,
			'Kec. Kendari Barat ' => 206005,
			'Kec. Abeli ' => 206006,
			'Kec. Puwato  ' => 206007,
			'Kec. Kadia ' => 206008,
			'Kec. Wua-Wua ' => 206009,
			'Kec. Kambu ' => 206010,
			'Kota Baubau  ' => 206100,
			'Kec. Betoambari  ' => 206101,
			'Kec. Wolio ' => 206102,
			'Kec. Sorowalio ' => 206103,
			'Kec. Bungi ' => 206104,
			'Kec. Murhum  ' => 206105,
			'Kec. Kokalukuna  ' => 206106,
			'Kec. Lea-Lea ' => 206107,
			'Kec. Batupoaro' => 206108,
			'Prov. Maluku ' => 210000,
			'Kab. Maluku Tengah ' => 210100,
			'Kec. Banda ' => 210101,
			'Kec. Tehoru  ' => 210104,
			'Kec. Amahai  ' => 210105,
			'Kec. Teon Nila Serua  ' => 210106,
			'Kec. Saparua ' => 210108,
			'Kec. Pulau Haruku  ' => 210109,
			'Kec. Salahutu  ' => 210110,
			'Kec. Leihitu ' => 210111,
			'Kec. Seram Utara ' => 210114,
			'Kec. Masohi  ' => 210116,
			'Kec. Nusa Laut ' => 210117,
			'Kec. Teluk Elpaputih  ' => 210118,
			'Kec. Seram Utara Barat  ' => 210119,
			'Kec. Leihitu Barat ' => 210120,
			'Telutih  ' => 210121,
			'Seram Utara Timur Seti  ' => 210122,
			'Seram Utara Timur Kobi  ' => 210123,
			'Kec. Saparua Timur' => 210124,
			'Kab. Maluku Tenggara  ' => 210200,
			'Kec. Kei Kecil ' => 210201,
			'Kec. Kei Besar ' => 210202,
			'Kec. Kei Besar Selatan  ' => 210205,
			'Kec. Kei Besar Utara Timur  ' => 210206,
			'Kec. Kei Kecil Barat  ' => 210212,
			'Kec. Kei Kecil Timur  ' => 210213,
			'Kec. Manyeuw' => 210214,
			'Kec. Hoat Sorbay' => 210215,
			'Kec. Kei Besar Utara Barat' => 210216,
			'Kec. Kei Besar Selatan Barat' => 210217,
			'Kec. Kei Kecil Timur Selatan' => 210218,
			'Kab. Buru  ' => 210300,
			'Kec. Air Buaya ' => 210304,
			'Kec. Waeapo  ' => 210307,
			'Kec. Namlea  ' => 210310,
			'Kec. Waplau  ' => 210316,
			'Kec. Bata Baul ' => 210317,
			'Kec. Lolong Guba' => 210318,
			'Kec. Waelata' => 210319,
			'Kec. Fena Leisela' => 210320,
			'Kec. Teluk Kaiely' => 210321,
			'Kec. Lilialy' => 210322,
			'Kab. Maluku Tenggara Barat  ' => 210400,
			'Kec. Pulau-pulau Terselatan ' => 210401,
			'Kec. Pulau-Pulau Babar  ' => 210403,
			'Kec. Tanimbar Selatan   ' => 210404,
			'Kec. Tanimbar Utara ' => 210405,
			'Kec. Damer ' => 210406,
			'Kec. Wer Tamrian ' => 210411,
			'Kec. Wer Maktian ' => 210412,
			'Kec. Selaru  ' => 210413,
			'Kec. Yaru  ' => 210414,
			'Kec. Wuar Labobar  ' => 210415,
			'Kec. Nirun Mas ' => 210416,
			'Kec. Kormomolin  ' => 210417,
			'Kec. Molu Maru ' => 210418,
			'Kab. Seram Bagian Barat ' => 210500,
			'Kec. Kairatu ' => 210501,
			'Kec. Seram Barat ' => 210502,
			'Kec. Taniwel ' => 210503,
			'Kec. Waisala ' => 210504,
			'Huamual  ' => 210505,
			'Kec. Amalatu' => 210506,
			'Inamosol   ' => 210590,
			'Elpaputih  ' => 210591,
			'Taniwel Timur  ' => 210592,
			'Huamual Belakang ' => 210593,
			'Kepulauan Manipa ' => 210594,
			'Kairatu Barat  ' => 210599,
			'Kab. Seram Bagian Timur ' => 210600,
			'Kec. Seram Timur ' => 210601,
			'Kec. Werinama  ' => 210602,
			'Kec. Bula  ' => 210603,
			'Kec. Pulau-pulau Gorom  ' => 210604,
			'Kec. Wakate  ' => 210605,
			'Kec. Tutuk Tolu  ' => 210606,
			'Kec. Siwalalat' => 210607,
			'Kec. Kilmury' => 210608,
			'Kec. Pulau Panjang' => 210609,
			'Kec. Teor' => 210610,
			'Kec. Gorom Timur' => 210611,
			'Kec. Bula Barat' => 210612,
			'Kec. Kian Darat' => 210613,
			'Kec. Siritaun Wida Timur' => 210614,
			'Kec. Teluk Waru' => 210615,
			'Kec. Lian Vitu' => 210616,
			'Kec. Ukar Sengan' => 210617,
			'Kab. Kepulauan Aru ' => 210700,
			'Kec. Pulau-Pulau Aru  ' => 210701,
			'Kec. Aru Tengah  ' => 210702,
			'Kec. Aru Selatan ' => 210703,
			'Kec. Aru Selatan Timur  ' => 210704,
			'Kec. Aru Tengah Timur   ' => 210705,
			'Kec. Aru Tengah Selatan ' => 210706,
			'Kec. Aru Utara ' => 210707,
			'Kec. Batuley ' => 210708,
			'Kec. Sir-Sir ' => 210709,
			'Kec. Aru Selatan Utara  ' => 210710,
			'Kab. Maluku Barat Daya  ' => 210800,
			'Kec. Babar Timur ' => 210801,
			'Kec. Mdona Hiera ' => 210803,
			'Kec. Moa Lakor ' => 210804,
			'Kec. Pulau Letti ' => 210805,
			'Kec. Wetar ' => 210808,
			'Damer ' => 210809,
			'Pulau-pulau Babar  ' => 210810,
			'Pulau-pulau Terselatan  ' => 210811,
			'Kec. Pulau Masela' => 210812,
			'Kec. Dawelor Dawera' => 210813,
			'Kec. Pulau Wetang' => 210814,
			'Kec. Pulau Lakor' => 210815,
			'Kec. Wetar Utara' => 210816,
			'Kec. Wetar Barat' => 210817,
			'Kec. Wetar Timur' => 210818,
			'Kec. Kepulauan Romang' => 210819,
			'Kec. Kisar Utara' => 210820,
			'Kab. Buru Selatan  ' => 210900,
			'Kec. Ambalau ' => 210901,
			'Kec. Kepala Madan  ' => 210902,
			'Kec. Leksula ' => 210903,
			'Kec. Namrole ' => 210904,
			'Kec. Waesama ' => 210905,
			'Kec. Fena Fafan' => 210906,
			'Kota Ambon ' => 216000,
			'Kec. Nusaniwe  ' => 216001,
			'Kec. Sirimau ' => 216002,
			'Kec. Teluk Ambon ' => 216003,
			'Kec. Baguala ' => 216005,
			'Kec. Lei Timur Selatan  ' => 216006,
			'Kota. Tual ' => 216100,
			'Kec. PP Kur Mangur ' => 216101,
			'Kec. Pulau Dullah Selatan ' => 216102,
			'Kec. Pulau Dullah Utara ' => 216103,
			'Kec. Tayando Tam ' => 216104,
			'Kec. Kur Selatan' => 216105,
			'Prov. Bali ' => 220000,
			'Kab. Buleleng  ' => 220100,
			'Kec. Gerokgak  ' => 220101,
			'Kec. Seririt ' => 220102,
			'Kec. Busungbiu ' => 220103,
			'Kec. Banjar  ' => 220104,
			'Kec. Sukasada  ' => 220105,
			'Kec. Buleleng  ' => 220106,
			'Kec. Sawan ' => 220107,
			'Kec. Kubutambahan  ' => 220108,
			'Kec. Tejakula  ' => 220109,
			'Kab. Jembrana  ' => 220200,
			'Kec. Melaya  ' => 220201,
			'Kec. Negara  ' => 220202,
			'Kec. Mendoyo ' => 220203,
			'Kec. Pekutatan ' => 220204,
			'Kec. Jembrana  ' => 220205,
			'Kab. Tabanan ' => 220300,
			'Kec. Selemadeg ' => 220301,
			'Kec. Kerambitan  ' => 220302,
			'Kec. Tabanan ' => 220303,
			'Kec. Kediri  ' => 220304,
			'Kec. Marga ' => 220305,
			'Kec. Baturiti  ' => 220306,
			'Kec. Penebel ' => 220307,
			'Kec. Pupuan  ' => 220308,
			'Kec. Selemadeg Barat  ' => 220309,
			'Kec. Selemadeg Timur  ' => 220310,
			'Kab. Badung  ' => 220400,
			'Kec. Kuta Selatan  ' => 220401,
			'Kec. Kuta  ' => 220402,
			'Kec. Kuta Utara  ' => 220403,
			'Kec. Mengwi  ' => 220404,
			'Kec. Abiansemal  ' => 220405,
			'Kec. Petang  ' => 220406,
			'Kab. Gianyar ' => 220500,
			'Kec. Sukawati  ' => 220501,
			'Kec. Blahbatuh ' => 220502,
			'Kec. Gianyar ' => 220503,
			'Kec. Tampak siring ' => 220504,
			'Kec. Ubud  ' => 220505,
			'Kec. Tegallalang ' => 220506,
			'Kec. Payangan  ' => 220507,
			'Kab. Klungkung ' => 220600,
			'Kec. Nusapenida  ' => 220601,
			'Kec. Banjarangkan  ' => 220602,
			'Kec. Klungkung ' => 220603,
			'Kec. Dawan ' => 220604,
			'Kab. Bangli  ' => 220700,
			'Kec. Susut ' => 220701,
			'Kec. Bangli  ' => 220702,
			'Kec. Tembuku ' => 220703,
			'Kec. Kintamani ' => 220704,
			'Kab. Karang Asem ' => 220800,
			'Kec. Rendang ' => 220801,
			'Kec. Sidemen ' => 220802,
			'Kec. Manggis ' => 220803,
			'Kec. Karang asem ' => 220804,
			'Kec. Abang ' => 220805,
			'Kec. Bebandem  ' => 220806,
			'Kec. Selat ' => 220807,
			'Kec. Kubu  ' => 220808,
			'Kota Denpasar  ' => 226000,
			'Kec. Denpasar Selatan   ' => 226001,
			'Kec. Denpasar Timur ' => 226002,
			'Kec. Denpasar Barat ' => 226003,
			'Kec. Denpasar Utara ' => 226004,
			'Prov. Nusa Tenggara Barat ' => 230000,
			'Kab. Lombok Barat  ' => 230100,
			'Kec. Sekotong Tengah  ' => 230101,
			'Kec. Gerung  ' => 230102,
			'Kec. Labuapi ' => 230103,
			'Kec. Kediri  ' => 230104,
			'Kec. Narmada ' => 230105,
			'Kec. Gunung Sari ' => 230106,
			'Kec. Kuripan ' => 230110,
			'Kec. Lembar  ' => 230112,
			'Kec. Batu Layar  ' => 230114,
			'Kec. Lingsar ' => 230115,
			'Kab. Lombok Tengah ' => 230200,
			'Kec. Praya Barat ' => 230201,
			'Kec. Pujut ' => 230202,
			'Kec. Praya Timur ' => 230203,
			'Kec. Janapria  ' => 230204,
			'Kec. Kopang  ' => 230205,
			'Kec. Praya ' => 230206,
			'Kec. Jonggat ' => 230207,
			'Kec. Pringgarata ' => 230208,
			'Kec. Batukliang  ' => 230209,
			'Kec. Batukliang Utara   ' => 230210,
			'Kec. Praya Barat Daya   ' => 230211,
			'Kec. Praya Tengah  ' => 230212,
			'Kab. Lombok Timur  ' => 230300,
			'Kec. Keruak  ' => 230301,
			'Kec. Sakra ' => 230302,
			'Kec. Terara  ' => 230303,
			'Kec. Sikur ' => 230304,
			'Kec. Masbagik  ' => 230305,
			'Kec. Sukamulia ' => 230306,
			'Kec. Selong  ' => 230307,
			'Kec. Pringgabaya ' => 230308,
			'Kec. Aikmel  ' => 230309,
			'Kec. Sambelia  ' => 230310,
			'Kec. Labuhan Haji  ' => 230311,
			'Kec. Suralaga  ' => 230312,
			'Kec. Sakra Timur ' => 230313,
			'Kec. Sakra Barat ' => 230314,
			'Kec. Jerowaru  ' => 230315,
			'Kec. Pringgasela ' => 230316,
			'Kec. Montong Gading ' => 230317,
			'Kec. Wanasaba  ' => 230318,
			'Kec. Sembalun  ' => 230319,
			'Kec. Suela ' => 230320,
			'Kab. Sumbawa ' => 230400,
			'Kec. Lunyuk  ' => 230402,
			'Kec. Alas  ' => 230405,
			'Kec. Batu Lanten ' => 230407,
			'Kec. Sumbawa ' => 230408,
			'Kec. Moyo Hilir  ' => 230409,
			'Kec. Moyo Hulu ' => 230410,
			'Kec. Ropang  ' => 230411,
			'Kec. Plampang  ' => 230413,
			'Kec. Empang  ' => 230414,
			'Kec. Labuhan Badas ' => 230415,
			'Kec. Alas Barat  ' => 230416,
			'Kec. Labangka  ' => 230419,
			'Kec. Unter Iwes  ' => 230420,
			'Kec. Rhee  ' => 230421,
			'Kec. Buer  ' => 230422,
			'Kec. Moyo Utara  ' => 230423,
			'Kec. Maronge ' => 230424,
			'Kec. Tarano  ' => 230425,
			'Kec. Lopok ' => 230426,
			'Kec. Lenangguar  ' => 230427,
			'Kec. Orong Telu  ' => 230428,
			'Kec. Utan  ' => 230429,
			'Kec. Lape  ' => 230430,
			'Kec. Lantung ' => 230431,
			'Kab. Dompu ' => 230500,
			'Kec. Hu`u  ' => 230501,
			'Kec. Dompu ' => 230502,
			'Kec. Woja  ' => 230503,
			'Kec. Kilo  ' => 230504,
			'Kec. Kempo ' => 230505,
			'Kec. Pekat ' => 230506,
			'Kec. Pajo  ' => 230507,
			'Kec. Manggelewa  ' => 230508,
			'Kab. Bima  ' => 230600,
			'Kec. Monta ' => 230601,
			'Kec. Bolo  ' => 230602,
			'Kec. Woha  ' => 230603,
			'Kec. Belo  ' => 230604,
			'Kec. Wawo  ' => 230605,
			'Kec. Sape  ' => 230606,
			'Kec. Wera  ' => 230607,
			'Kec. Donggo  ' => 230608,
			'Kec. Sanggar ' => 230609,
			'Kec. Lambu ' => 230610,
			'Kec. Tambora ' => 230611,
			'Kec. Ambalawi  ' => 230612,
			'Kec. Mada pangga ' => 230613,
			'Kec. Langgudu  ' => 230614,
			'Kec. Soromandi ' => 230615,
			'Kec. Parado  ' => 230616,
			'Kec. Lambitu ' => 230617,
			'Kec. Palibelo  ' => 230618,
			'Kab. Sumbawa Barat ' => 230700,
			'Kec. Jereweh ' => 230701,
			'Kec. Taliwang  ' => 230702,
			'Kec. Seteluk ' => 230703,
			'Kec. Brang Rea ' => 230704,
			'Kec. Sekongkang  ' => 230705,
			'Kec. Maluk ' => 230706,
			'Kec. Brang Ene ' => 230707,
			'Kec. Poto Tano ' => 230708,
			'Kab. Lombok Utara  ' => 230800,
			'Kec. Tanjung ' => 230801,
			'Kec. Gangga  ' => 230802,
			'Kec. Bayan ' => 230803,
			'Kec. Pemenang  ' => 230804,
			'Kec. Kayangan  ' => 230805,
			'Kota Mataram ' => 236000,
			'Kec. Ampenan ' => 236001,
			'Kec. Mataram ' => 236002,
			'Kec. Cakranegara ' => 236003,
			'Kec. Sekarbela ' => 236004,
			'Kec. Selaperang  ' => 236005,
			'Kec. Sandubaya ' => 236006,
			'Kota Bima  ' => 236100,
			'Kec. RasanaE Barat ' => 236101,
			'Kec. RasanaE Timur ' => 236102,
			'Kec. Asakota ' => 236103,
			'Kec. Raba  ' => 236104,
			'Kec. Mpunda  ' => 236105,
			'Prov. Nusa Tenggara Timur ' => 240000,
			'Kab. Kupang  ' => 240100,
			'Kec. Raijua  ' => 240101,
			'Kec. Sabu Barat  ' => 240102,
			'Kec. Sabu Timur  ' => 240103,
			'Kec. Semau ' => 240110,
			'Kec. Kupang Barat  ' => 240111,
			'Kec. Kupang Tengah ' => 240112,
			'Kec. Amarasi ' => 240113,
			'Kec. Kupang Timur  ' => 240114,
			'Kec. Sulamu  ' => 240115,
			'Kec. Fatuleu ' => 240116,
			'Kec. Takari  ' => 240117,
			'Kec. Amfoang Selatan  ' => 240118,
			'Kec. Amfoang Utara ' => 240119,
			'Kec. Sabu Tengah ' => 240120,
			'Kec. Nekamese  ' => 240121,
			'Kec. Amabi Oefeto Timur ' => 240122,
			'Kec. Amarasi Selatan  ' => 240123,
			'Kec. Amarasi Timur ' => 240124,
			'Kec. Amarasi Barat ' => 240125,
			'Kec. Amfoang Barat Daya ' => 240126,
			'Kec. Amfoang Barat Laut ' => 240127,
			'Kec. Sabu Liae ' => 240128,
			'Kec. Hawu Mehara ' => 240129,
			'Kec. Semau Selatan ' => 240130,
			'Kec. Taebenu ' => 240131,
			'Kec. Amabi Oefeto  ' => 240132,
			'Kec. Fatuleu Tengah ' => 240133,
			'Kec. Fatuleu Barat ' => 240134,
			'Kec. Amfoang Timur ' => 240135,
			'Kec. Amfoang Tengah ' => 240136,
			'Kab. Timor Tengah Selatan ' => 240300,
			'Kec. Mollo Utara ' => 240301,
			'Kec. Mollo Selatan ' => 240302,
			'Kec. Kota Soe  ' => 240303,
			'Kec. Amanuban Barat ' => 240304,
			'Kec. Amanuban Selatan   ' => 240305,
			'Kec. Kuanfatu  ' => 240306,
			'Kec. Amanuban Tengah  ' => 240307,
			'Kec. Amanuban Timur ' => 240308,
			'Kec. Kie   ' => 240309,
			'Kec. Amanatun Selatan   ' => 240310,
			'Kec. Amanatun Utara ' => 240311,
			'Kec. Fatumnasi ' => 240312,
			'Kec. Polen ' => 240313,
			'Kec. BatuPutih ' => 240314,
			'Kec. Boking  ' => 240315,
			'Kec. Noebana ' => 240316,
			'Kec. Nunkolo ' => 240317,
			'Kec. Kot`Olin  ' => 240318,
			'Kec. Oenino  ' => 240319,
			'Kec. Kolbano ' => 240320,
			'Kec. Kualin  ' => 240321,
			'Kec. Toianas ' => 240322,
			'Kec. Mollo Barat ' => 240323,
			'Kec. Kok Baun  ' => 240324,
			'Kec. Tobu  ' => 240325,
			'Kec. Nunbena ' => 240326,
			'Kec. Mollo Tengah  ' => 240327,
			'Kec. Kuatnana  ' => 240328,
			'Kec. Noebeba ' => 240329,
			'Kec. Fautmolo  ' => 240330,
			'Kec. Fatukopa  ' => 240331,
			'Kec. Santian ' => 240332,
			'Kab. Timor Tengah Utara ' => 240400,
			'Kec. Miomafo Barat ' => 240401,
			'Kec. Miomafo Timur ' => 240402,
			'Kec. Kota Kefamenanu  ' => 240403,
			'Kec. Insana  ' => 240404,
			'Kec. Biboki Selatan ' => 240405,
			'Kec. Biboki Utara  ' => 240406,
			'Kec. Noemuti ' => 240407,
			'Kec. Insana Utara  ' => 240408,
			'Kec. Biboki Anleu  ' => 240409,
			'Kec. Noemuti Timur ' => 240410,
			'Kec. Miomafo Tengah ' => 240411,
			'Kec. Musi  ' => 240412,
			'Kec. Mutis ' => 240413,
			'Kec. Bikomi Selatan ' => 240414,
			'Kec. Bikomi Tengah ' => 240415,
			'Kec. Bikomi Nilulat ' => 240416,
			'Kec. Bikomi Utara  ' => 240417,
			'Kec. Naibenu ' => 240418,
			'Kec. Insana Fafinesu  ' => 240419,
			'Kec. Insana Barat  ' => 240420,
			'Kec. Insana Tengah ' => 240421,
			'Kec. Biboki Tanpah ' => 240422,
			'Kec. Biboki Moenleu ' => 240423,
			'Kec. Biboki Feotleu ' => 240424,
			'Kab. Belu  ' => 240500,
			'Kec. Malaka Barat  ' => 240501,
			'Kec. Malaka Tengah ' => 240502,
			'Kec. Malaka Timur  ' => 240503,
			'Kec. Kobalima  ' => 240504,
			'Kec. Tasifeto Barat ' => 240505,
			'Kec. Kota Atambua  ' => 240506,
			'Kec. Tasifeto Timur ' => 240507,
			'Kec. Lamakmen  ' => 240508,
			'Kec. Kakuluk Mesak ' => 240509,
			'Kec. Raihat  ' => 240510,
			'Kec. Rinhat  ' => 240511,
			'Kec. Sasita Mean ' => 240512,
			'Kec. Weliman ' => 240513,
			'Kec. Wewiku  ' => 240514,
			'Kec. Rai Manuk ' => 240515,
			'Kec. Laen Manen  ' => 240516,
			'Kec. Lasiolat  ' => 240517,
			'Kec. Lamakmen Selatan   ' => 240518,
			'Kec. Lo Kufeu  ' => 240519,
			'Kec. Botin Leo Bele ' => 240520,
			'Kec. Atambua Barat ' => 240521,
			'Kec. Atambua Selatan  ' => 240522,
			'Kec. Nanaet Duabesi ' => 240523,
			'Kec. Kobalima Timur ' => 240524,
			'Malaka Barat ' => 240525,
			'Malaka Timur ' => 240526,
			'Kobalima   ' => 240527,
			'Sasitamean ' => 240528,
			'Laen Manen ' => 240529,
			'Io Kufeu   ' => 240530,
			'Botin Leo Bele ' => 240531,
			'Kobalima Timur ' => 240532,
			'Rinhat ' => 240533,
			'Wewiku ' => 240534,
			'Weliman  ' => 240535,
			'Kab. Alor  ' => 240600,
			'Kec. Alor Barat Daya  ' => 240602,
			'Kec. Alor Selatan  ' => 240603,
			'Kec. Alor Timur  ' => 240604,
			'Kec. Teluk Mutiara ' => 240605,
			'Kec. Alor Barat Laut  ' => 240606,
			'Kec. Pantar  ' => 240607,
			'Kec. Alor Timur Laut  ' => 240608,
			'Kec. Alor Tengah Utara  ' => 240609,
			'Kec. Pantar Barat  ' => 240610,
			'Kec. Pantar Timur  ' => 240611,
			'Kec. Pantar Barat Laut  ' => 240612,
			'Kec. Pantar Tengah ' => 240613,
			'Kec. Mataru  ' => 240614,
			'Kec. Pureman ' => 240615,
			'Kec. Kabola  ' => 240616,
			'Kec. Pulau Pura  ' => 240617,
			'Kec. Lembur  ' => 240618,
			'Kab. Flores Timur  ' => 240700,
			'Kec. Wulang Gitang ' => 240701,
			'Kec. Tanjung Bunga ' => 240702,
			'Kec. Larantuka ' => 240703,
			'Kec. Solor Barat ' => 240704,
			'Kec. Solor Timur ' => 240705,
			'Kec. Adonara Barat ' => 240706,
			'Kec. Adonara Timur ' => 240707,
			'Kec. Titehena  ' => 240708,
			'Kec. Ile Boleng  ' => 240709,
			'Kec. Witihama  ' => 240710,
			'Kec. Kelubagolit ' => 240711,
			'Kec. Wotan Ulumado ' => 240712,
			'Kec. Ile Mandiri ' => 240713,
			'Kec. Demon Pagong  ' => 240714,
			'Kec. Lewolema  ' => 240715,
			'Kec. Ilebura ' => 240716,
			'Kec. Adonara ' => 240717,
			'Kec. Adonara Tengah ' => 240718,
			'Kec. Solor Selatan ' => 240719,
			'Kab. Sikka ' => 240800,
			'Kec. Paga  ' => 240801,
			'Kec. Lela  ' => 240802,
			'Kec. Bola  ' => 240803,
			'Kec. Talibura  ' => 240804,
			'Kec. Kewapante ' => 240805,
			'Kec. Nelle ' => 240806,
			'Kec. Nitta ' => 240807,
			'Kec. Alok  ' => 240808,
			'Kec. Mego  ' => 240809,
			'Kec. Waigete ' => 240810,
			'Kec. Palue ' => 240811,
			'Kec. Waiblama  ' => 240812,
			'Kec. Alok Barat  ' => 240813,
			'Kec. Alok Timur  ' => 240814,
			'Kec. Magependa ' => 240815,
			'Kec. Koting  ' => 240816,
			'Kec. Tana Wawo ' => 240817,
			'Kec. Hewokloang  ' => 240818,
			'Kec. Kangae  ' => 240819,
			'Kec. Doreng  ' => 240820,
			'Kec. Mapitara  ' => 240821,
			'Kab. Ende  ' => 240900,
			'Kec. Nangapanda  ' => 240901,
			'Kec. Ende  ' => 240902,
			'Kec. Ende Selatan  ' => 240903,
			'Kec. Ndona ' => 240904,
			'Kec. Wolowaru  ' => 240905,
			'Kec. Maurole ' => 240906,
			'Kec. Detusoko  ' => 240907,
			'Kec. Maukaro ' => 240909,
			'Kec. Wewaria ' => 240910,
			'Kec. Wolojita  ' => 240911,
			'Kec. Pulau Ende  ' => 240912,
			'Kec. Kota Baru ' => 240913,
			'Kec. Ndona Timur ' => 240914,
			'Kec. Kelimutu  ' => 240915,
			'Kec. Lio Timur ' => 240916,
			'Kec. Detukeli  ' => 240917,
			'Kec. Ndori ' => 240918,
			'Kec. Ende Utara  ' => 240919,
			'Kec. Ende Tengah ' => 240920,
			'Kec. Ende Timur  ' => 240921,
			'Kec. Lepembusu Kelisoke ' => 240922,
			'Kab. Ngada ' => 241000,
			'Kec. Aimere  ' => 241001,
			'Kec. Bajawa  ' => 241002,
			'Kec. Golewa  ' => 241003,
			'Kec. Golewa Barat' => 241004,
			'Kec. Bajawa Utara  ' => 241007,
			'Kec. Riung ' => 241008,
			'Kec. Riung Barat ' => 241012,
			'Kec. Soa   ' => 241013,
			'Kec. Jerebuu ' => 241015,
			'Kec. Riung Selatan ' => 241017,
			'Kec. Inerie' => 241018,
			'Kec. Golewa Selatan' => 241019,
			'Kab. Manggarai ' => 241100,
			'Kec. Satarmese ' => 241104,
			'Kec. Langke Rembong ' => 241111,
			'Kec. Ruteng  ' => 241112,
			'Kec. Cibal ' => 241113,
			'Kec. Reok  ' => 241114,
			'Kec. Wae Ri`I  ' => 241117,
			'Kec. Satar Mese Barat   ' => 241118,
			'Kec. Rahong Utara  ' => 241119,
			'Kec. Lelak ' => 241120,
			'Kec. Reok Barat' => 241121,
			'Kec. Cibal Barat' => 241122,
			'Kec. Landu Leko' => 241123,
			'Kab. Sumba Timur ' => 241200,
			'Kec. Lewa  ' => 241201,
			'Kec. Tabundung ' => 241202,
			'Kec. Paberiwai ' => 241203,
			'Kec. Pahunga Lodu  ' => 241204,
			'Kec. Rindi ' => 241205,
			'Kec. Pandawai  ' => 241206,
			'Kec. Kota Waingapu ' => 241207,
			'Kec. Haharu  ' => 241208,
			'Kec. Nggaha Ori Angu  ' => 241209,
			'Kec. Karera  ' => 241210,
			'Kec. Umalulu ' => 241211,
			'Kec. Kahaungu Eti  ' => 241212,
			'Kec. Matawai La Pawu  ' => 241213,
			'Kec. Pinu Pahar  ' => 241214,
			'Kec. Wulla Waijelu ' => 241215,
			'Kec. Katala Hamu Lingu  ' => 241216,
			'Kec. Mahu  ' => 241217,
			'Kec. Ngadu Ngala ' => 241218,
			'Kec. Kambata Mapambuhang  ' => 241219,
			'Kec. Kambera ' => 241220,
			'Kec. Kanatang  ' => 241221,
			'Kec. Lewa Tidahu ' => 241222,
			'Kab. Sumba Barat ' => 241300,
			'Kec. Loli  ' => 241305,
			'Kec. Kota Waikabubak  ' => 241306,
			'Kec. Wanokaka  ' => 241310,
			'Kec. Lamboya ' => 241311,
			'Kec. Tana Righu  ' => 241318,
			'Kec. Laboya Barat  ' => 241319,
			'Kab. Lembata ' => 241400,
			'Kec. Naga Wutung ' => 241401,
			'Kec. Atadei  ' => 241402,
			'Kec. Ile Ape ' => 241403,
			'Kec. Lebatukan ' => 241404,
			'Kec. Nubatukan ' => 241405,
			'Kec. Omesuri ' => 241406,
			'Kec. Buyasuri  ' => 241407,
			'Kec. Wulandoni ' => 241408,
			'Kec. Ile Ape Timur ' => 241409,
			'Kab. Rote-Ndao ' => 241500,
			'Kec. Rote Barat Daya  ' => 241504,
			'Kec. Rote Barat Laut  ' => 241505,
			'Kec. Lobalain  ' => 241506,
			'Kec. Rote Tengah ' => 241507,
			'Kec. Pantai Baru ' => 241508,
			'Kec. Rote Timur  ' => 241509,
			'Kec. Rote Barat  ' => 241510,
			'Kec. Rote Selatan  ' => 241511,
			'Kec. Ndao Nuse' => 241512,
			'Kec. Landu Leko' => 241513,
			'Kec. Ndau Nuse' => 241514,
			'Kab. Manggarai Barat  ' => 241600,
			'Kec. Komodo  ' => 241601,
			'Kec. Sano Nggoang  ' => 241602,
			'Kec. Lembor  ' => 241603,
			'Kec. Kuwus ' => 241604,
			'Kec. Macang Pacar  ' => 241605,
			'Kec. Boleng  ' => 241606,
			'Kec. Welak ' => 241607,
			'Kec. Ndoso ' => 241608,
			'Kec. Lembor Selatan ' => 241609,
			'Kec. Mbeliling ' => 241610,
			'Kab. Nagakeo ' => 241700,
			'Kec. Aesesa  ' => 241701,
			'Kec. Boawae  ' => 241702,
			'Kec. Keo Tengah  ' => 241703,
			'Kec. Mauponggo ' => 241704,
			'Kec. Nangaroro ' => 241705,
			'Kec. Wolowae ' => 241706,
			'Kec. Aesesa Selatan ' => 241708,
			'Kab. Sumba Tengah  ' => 241800,
			'Kec. Katiku Tana ' => 241801,
			'Kec. Mamboro ' => 241802,
			'Kec. Umbu Ratu Nggay  ' => 241803,
			'Kec. Umbu Ratu Nggay Barat  ' => 241804,
			'Kec. Katiku Tana Selatan  ' => 241805,
			'Kab. Sumba Barat Daya   ' => 241900,
			'Kec. Kodi  ' => 241901,
			'Kec. Kodi Bangedo  ' => 241902,
			'Kec. Loura ' => 241903,
			'Kec. Wewewa Barat  ' => 241904,
			'Kec. Wewewa Selatan ' => 241905,
			'Kec. Wewewa Timur  ' => 241906,
			'Kec. Wewewa Utara  ' => 241907,
			'Kec. Kodi Utara  ' => 241908,
			'Kec. Kota Tambolaka' => 241909,
			'Kec. Wewewa Tengah' => 241910,
			'Kec. Kodi Balaghar' => 241911,
			'Kab. Manggarai Timur  ' => 242000,
			'Kec. Elar  ' => 242001,
			'Kec. Kota Komba  ' => 242002,
			'Kec. Lamba Leda  ' => 242003,
			'Kec. Poco Ranaka ' => 242004,
			'Kec. Sambi Rampas  ' => 242005,
			'Kec. Borong  ' => 242006,
			'Kec. Rana Mese' => 242007,
			'Kec. Poco Ranaka Timur' => 242008,
			'Kec. Elar Selatan' => 242009,
			'Kab. Sabu Raijua ' => 242100,
			'Hawu Mehara  ' => 242111,
			'Sabu Tengah  ' => 242112,
			'Raijua ' => 242113,
			'Sabu Liae  ' => 242114,
			'Sabu Barat ' => 242115,
			'Sabu Timur ' => 242116,
			'Kab. Malaka' => 242200,
			'Kec. Malaka Barat' => 242221,
			'Kec. Wewiku' => 242222,
			'Kec. Weliman' => 242223,
			'Kec. Rinhat' => 242224,
			'Kec. Io Kufeu' => 242225,
			'Kec. Sasitamean' => 242226,
			'Kec. Laenmanen' => 242227,
			'Kec. Malaka Timur' => 242228,
			'Kec. Kobalima Timur' => 242229,
			'Kec. Kobalima' => 242230,
			'Kec. Botin Leobele' => 242231,
			'Kec. Malaka Tengah' => 242232,
			'Kota Kupang  ' => 246000,
			'Kec. Alak  ' => 246001,
			'Kec. Maulafa ' => 246002,
			'Kec. Oebodo  ' => 246003,
			'Kec. Kelapa Lima ' => 246004,
			'Kec. Kota Raja ' => 246005,
			'Kec. Kota Lama ' => 246006,
			'Prov. Papua  ' => 250000,
			'Kab. Jayapura  ' => 250100,
			'Kec. Kaureh  ' => 250108,
			'Kec. Kemtuk  ' => 250114,
			'Kec. Kemtuk Gresie ' => 250115,
			'Kec. Nimboran  ' => 250116,
			'Kec. Nimbokrang  ' => 250117,
			'Kec. Unurum Guay ' => 250118,
			'Kec. Demta ' => 250120,
			'Kec. Depapre ' => 250121,
			'Kec. Sentani Barat ' => 250122,
			'Kec. Sentani ' => 250123,
			'Kec. Sentani Timur ' => 250124,
			'Kec. Airu  ' => 250125,
			'Kec. Yapsi ' => 250126,
			'Kec. Nimboran Timur/Namblong  ' => 250127,
			'Kec. Waibu ' => 250128,
			'Kec. Ebungfau  ' => 250129,
			'Kec. Yokari' => 250130,
			'Kec. Ravenirara' => 250131,
			'Kec. Gresi Selatan' => 250132,
			'Kab. Biak Numfor ' => 250200,
			'Kec. Numfor Barat  ' => 250201,
			'Kec. Numfor Timur  ' => 250202,
			'Kec. Padaido ' => 250203,
			'Kec. Biak Timur  ' => 250204,
			'Kec. Biak Kota ' => 250205,
			'Kec. Samofa  ' => 250206,
			'Kec. Yendidori ' => 250207,
			'Kec. Biak Utara  ' => 250208,
			'Kec. Warsa ' => 250209,
			'Kec. Biak Barat  ' => 250210,
			'Kec. Swandiwe  ' => 250211,
			'Kec. Orkeri  ' => 250212,
			'Kec. Bruyandori  ' => 250213,
			'Kec. Poiru ' => 250214,
			'Kec. Ainando Padaido  ' => 250215,
			'Kec. Oridek  ' => 250216,
			'Kec. Andey ' => 250217,
			'Kec. Yawosi  ' => 250218,
			'Kec. Bondifuar ' => 250219,
			'Kab. Yapen Waropen ' => 250300,
			'Kec. Yapen Timur ' => 250304,
			'Kec. Angkaisera  ' => 250305,
			'Kec. Yapen Selatan ' => 250306,
			'Kec. Yapen Barat ' => 250307,
			'Kec. Poom  ' => 250308,
			'Kec. Kosiwo  ' => 250309,
			'Kec. Yapen Utara ' => 250310,
			'Kec. Raimbawi  ' => 250311,
			'Kec. Teluk Ampimoi ' => 250312,
			'Kec. Kepulauan Ambai  ' => 250313,
			'Kec. Wonawa  ' => 250314,
			'Kec. Windesi ' => 250315,
			'Kec. Pulau Kurudu' => 250316,
			'Kec. Pulau Yerui' => 250317,
			'Kab. Merauke ' => 250700,
			'Kec. Kimaam  ' => 250701,
			'Kec. Okaba ' => 250702,
			'Kec. Kurik ' => 250703,
			'Kec. Merauke ' => 250704,
			'Kec. Muting  ' => 250705,
			'Kec. Distrik Ulilin ' => 250724,
			'Kec. Semangga  ' => 250725,
			'Kec. Tanah Miring  ' => 250726,
			'Kec. Jagebob ' => 250727,
			'Kec. Sota  ' => 250728,
			'Kec. Eligobel  ' => 250729,
			'Kec. Naukenjerai ' => 250730,
			'Kec. Animha  ' => 250731,
			'Kec. Malind  ' => 250732,
			'Kec. Tubang  ' => 250733,
			'Kec. Ngunti  ' => 250734,
			'Kec. Kaptel  ' => 250736,
			'Kec. Tabonji ' => 250737,
			'Kec. Waan  ' => 250738,
			'Kec. Ilwayab ' => 250739,
			'Kab. Jayawijaya' => 250800,
			'Kec. Asologaima  ' => 250818,
			'Kec. Kurulu  ' => 250819,
			'Kec. Abenaho ' => 250821,
			'Kec. Walelagama  ' => 250839,
			'Kec. Musatfak  ' => 250841,
			'Kec. Asolokobal  ' => 250843,
			'Kec. Pelebaga  ' => 250848,
			'Kec. Yalengga  ' => 250849,
			'Kec. Wamena  ' => 250854,
			'Kec. Hubikosi  ' => 250860,
			'Kec. Bolakme ' => 250862,
			'Kec. Wollo ' => 250863,
			'Kec. Wesaput' => 250864,
			'Kec. Trikora' => 250865,
			'Kec. Walaik' => 250866,
			'Kec. Wouma' => 250867,
			'Kec. Ibele' => 250868,
			'Kec. Taelarek' => 250869,
			'Kec. Wame' => 250870,
			'Kec. Napua' => 250871,
			'Kec. Hubikiak' => 250872,
			'Kec. Itlay Hisage' => 250873,
			'Kec. Pisugi' => 250874,
			'Kec. Molagalome' => 250875,
			'Kec. Tagineri' => 250876,
			'Kec. Silo Karno Doga' => 250877,
			'Kec. Siepkosi' => 250878,
			'Kec. Usilimo' => 250879,
			'Kec. Libarek' => 250880,
			'Kec. Wadangku' => 250881,
			'Kec. Koragi' => 250882,
			'Kec. Tagime' => 250883,
			'Kec. Piramid' => 250884,
			'Kec. Muliama' => 250885,
			'Kec. Bugi' => 250886,
			'Kec. Bipiri' => 250887,
			'Kec. Welesi' => 250888,
			'Kec. Asotipo' => 250889,
			'Kec. Maima' => 250890,
			'Kec. Wita Waya' => 250891,
			'Kec. Popugoba' => 250892,
			'Kab. Nabire  ' => 250900,
			'Kec. Uwapa ' => 250905,
			'Kec. Yaur  ' => 250906,
			'Kec. Wanggar ' => 250907,
			'Kec. Nabire  ' => 250908,
			'Kec. Napan ' => 250909,
			'Kec. Siriwo  ' => 250910,
			'Kec. Teluk Umar  ' => 250911,
			'Kec. Makimi  ' => 250912,
			'Kec. Teluk Kimi  ' => 250916,
			'Kec. Yarokibisay ' => 250917,
			'Kec. Kepulauan Moora' => 250918,
			'Kec. Nabire Barat  ' => 250922,
			'Kec. Wapoga  ' => 250923,
			'Kec. Menou' => 250924,
			'Dipha ' => 250990,
			'Yaro  ' => 250999,
			'Kab. Paniai  ' => 251000,
			'Kec. Paniai Timur  ' => 251003,
			'Kec. Bibida  ' => 251004,
			'Kec. Paniai Barat  ' => 251008,
			'Kec. Bogoboida ' => 251009,
			'Kec. Yatamo  ' => 251014,
			'Kec. Kebo  ' => 251015,
			'Kec. Dumadama  ' => 251016,
			'Kec. Ekadide ' => 251018,
			'Kec. Siriwo  ' => 251019,
			'Kec. Weege Bino' => 251020,
			'Aradide  ' => 251090,
			'Kec. Aweida' => 251091,
			'Kec. Baya Biru' => 251092,
			'Kec. Deiyai Miyo' => 251093,
			'Kec. Dogomo' => 251094,
			'Kec. Muye' => 251095,
			'Kec. Nakama' => 251096,
			'Kec. Pugo Dagi' => 251097,
			'Kec. Teluk Deya' => 251098,
			'Kec. Topiyai' => 251099,
			'Kab. Puncak Jaya ' => 251100,
			'Kec. Fawi  ' => 251104,
			'Kec. Mulia ' => 251105,
			'Kec. Ilu   ' => 251106,
			'Kec. Mewoluk ' => 251110,
			'Kec. Yamo  ' => 251111,
			'Kec. Torere  ' => 251113,
			'Kec. Jigonikme ' => 251114,
			'Kec. Tingginambut  ' => 251115,
			'Kec. Nume' => 251116,
			'Kec. Pagaleme' => 251117,
			'Kec. Gurage' => 251118,
			'Kec. Irimuli' => 251119,
			'Kec. Muara' => 251120,
			'Kec. Ilamburawi' => 251121,
			'Kec. Yambi' => 251122,
			'Kec. Lumo' => 251123,
			'Kec. Molanikime' => 251124,
			'Kec. Dokome' => 251125,
			'Kec. Kalome' => 251126,
			'Kec. Wanwi' => 251127,
			'Kec. Yamoneri' => 251128,
			'Kec. Waegi' => 251129,
			'Kec. Nioga' => 251130,
			'Kec. Gubume' => 251131,
			'Kec. Taganombak' => 251132,
			'Kec. Dagai' => 251133,
			'Kec. Kiyage' => 251134,
			'Kab. Mimika  ' => 251200,
			'Kec. Mimika Barat  ' => 251201,
			'Kec. Mimika Timur  ' => 251202,
			'Kec. Mimika Baru ' => 251203,
			'Kec. Agimuga ' => 251204,
			'Kec. Mimika Barat Jauh  ' => 251205,
			'Kec. Mimika Barat Tengah  ' => 251206,
			'Kec. Tembagapura ' => 251209,
			'Kec. Jila  ' => 251210,
			'Kec. Jita  ' => 251211,
			'Kec. Kuala Kencana ' => 251212,
			'Kec. Mimika Timur Tengah  ' => 251213,
			'Kec. Mimika Timur Jauh  ' => 251214,
			'Kec. Mimika Tengah' => 251215,
			'Kec. Kwamki Narama' => 251216,
			'Kec. Hoya' => 251217,
			'Kec. Iwaka' => 251218,
			'Kec. Wania' => 251219,
			'Kec. Amar' => 251220,
			'Kec. Alama' => 251221,
			'Kab. Boven Digoel  ' => 251300,
			'Kec. Jair  ' => 251301,
			'Kec. Mindiptana  ' => 251302,
			'Kec. Mandobo ' => 251303,
			'Kec. Kouh  ' => 251304,
			'Kec. Waropko ' => 251305,
			'Kec. Distrik Bomakia  ' => 251306,
			'Kec. Subur ' => 251307,
			'Kec. Iniyandit ' => 251308,
			'Kec. Fofi  ' => 251309,
			'Kec. Arimop  ' => 251310,
			'Kec. Firiwage  ' => 251311,
			'Kec. Manggelum ' => 251312,
			'Kec. Yaniruma  ' => 251313,
			'Kec. Ambatkwi  ' => 251314,
			' Kombut  ' => 251315,
			'Kec. Ninati' => 251316,
			'Kec. Sesnuk' => 251317,
			'Kec. Ki' => 251318,
			'Kec. Kombay' => 251319,
			'Kec. Kawagit' => 251320,
			'Kec. Syahcame' => 251321,
			'Kab. Mappi ' => 251400,
			'Kec. Nambioman Bapai  ' => 251401,
			'Kec. Edera ' => 251402,
			'Kec. Obaa  ' => 251403,
			'Kec. Haju  ' => 251404,
			'Kec. Assue ' => 251405,
			'Kec. Citakmitak  ' => 251406,
			'Kec. Minyamur  ' => 251407,
			'Kec. Venaha  ' => 251408,
			'Kec. Passue  ' => 251409,
			'Kec. Kaibar  ' => 251410,
			'Kec. Syahcame' => 251411,
			'Kec. Yakomi' => 251412,
			'Kec. Bamgi' => 251413,
			'Kec. Passue Bawah' => 251414,
			'Kec. Ti Zain' => 251415,
			'Kab. Asmat ' => 251500,
			'Kec. Pantai Kasuari ' => 251501,
			'Kec. Fayit ' => 251502,
			'Kec. Atsy  ' => 251503,
			'Kec. Suator  ' => 251504,
			'Kec. Akat  ' => 251505,
			'Kec. Agats ' => 251506,
			'Kec. Sawaerma  ' => 251507,
			'Kec. Kopay' => 251508,
			'Kec. Safan' => 251509,
			'Kec. Sirets' => 251510,
			'Kec. Joerat' => 251511,
			'Kec. Pulau Tiga' => 251512,
			'Kec. Der Koumur' => 251513,
			'Kec. Ayip' => 251514,
			'Kec. Betcbamu' => 251515,
			'Kec. Suru-Suru' => 251516,
			'Kec. Kolf Braza' => 251517,
			'Kec. Jetsy' => 251518,
			'Kec. Unir Sirau' => 251519,
			'Kec. Sirau' => 251520,
			'Kab. Yahukimo  ' => 251600,
			'Kec. Kurima  ' => 251601,
			'Kec. Ninia ' => 251602,
			'Kec. Anggruk ' => 251603,
			'Kec. Dekai ' => 251604,
			'Kec. Obio  ' => 251605,
			'Kec. Suru Suru ' => 251606,
			'Kec. Wusuma  ' => 251607,
			'Kec. Amuma ' => 251608,
			'Kec. Wusaik  ' => 251609,
			'Kec. Pasema  ' => 251610,
			'Kec. Hogio ' => 251611,
			'Kec. Mogi  ' => 251612,
			'Kec. Soba  ' => 251613,
			'Kec. Werima  ' => 251614,
			'Kec. Tangma  ' => 251615,
			'Kec. Ukha  ' => 251616,
			'Kec. Panggema  ' => 251617,
			'Kec. Kosarek ' => 251618,
			'Kec. Nipsan  ' => 251619,
			'Kec. Ubahak  ' => 251620,
			'Kec. Pronggoli ' => 251621,
			'Kec. Walma ' => 251622,
			'Kec. Yahuliambut ' => 251623,
			'Kec. Puldama ' => 251624,
			'Kec. Hereapingi  ' => 251625,
			'Kec. Ubahili ' => 251626,
			'Kec. Talambo ' => 251627,
			'Kec. Endomen ' => 251628,
			'Kec. Kona  ' => 251629,
			'Kec. Dirwemna  ' => 251630,
			'Kec. Holuwon ' => 251631,
			'Kec. Lolat ' => 251632,
			'Kec. Soloikma  ' => 251633,
			'Kec. Sela  ' => 251634,
			'Kec. Korupun ' => 251635,
			'Kec. Langda  ' => 251636,
			'Kec. Bomela  ' => 251637,
			'Kec. Suntamon  ' => 251638,
			'Kec. Seredela  ' => 251639,
			'Kec. Sobaham ' => 251640,
			'Kec. Kabianggama ' => 251641,
			'Kec. Kwelamdua ' => 251642,
			'Kec. Kwikma  ' => 251643,
			'Kec. Hilipuk ' => 251644,
			'Kec. Duram ' => 251645,
			'Kec. Yogosem ' => 251646,
			'Kec. Kayo  ' => 251647,
			'Kec. Sumo  ' => 251648,
			'Kec. Silimo  ' => 251649,
			'Kec. Samenage  ' => 251650,
			'Kec. Nalca ' => 251651,
			'Kec. Tolikapura 2' => 251652,
			'Seradala   ' => 251699,
			'Kab. Pegunungan Bintang ' => 251700,
			'Kec. Okiwur  ' => 251701,
			'Kec. Oksibil ' => 251702,
			'Kec. Borme ' => 251703,
			'Kec. Okbibab ' => 251704,
			'Kec. Kiwirok ' => 251705,
			'Kec. Batom ' => 251706,
			'Kec. Pepera  ' => 251707,
			'Kec. Bime  ' => 251708,
			'Kec. Aboy  ' => 251709,
			'Kec. Kiwirok Timur ' => 251710,
			'Kec. Kawor ' => 251711,
			'Kec. Tarup ' => 251712,
			'Kec. Alemsom ' => 251713,
			'Kec. Serambakon  ' => 251714,
			'Kec. Kalomdom  ' => 251715,
			'Kec. Oksop ' => 251716,
			'Kec. Epumek  ' => 251717,
			'Kec. Weime ' => 251718,
			'Kec. Okbab ' => 251719,
			'Kec. Teiraplu  ' => 251720,
			'Kec. Sopsebang ' => 251721,
			'Kec. Hokhika ' => 251722,
			'Kec.Oklip  ' => 251723,
			'Kec. Oksamol ' => 251724,
			'Kec. Bemta ' => 251725,
			' Okbape  ' => 251726,
			' Ok Aom  ' => 251727,
			' Awinbon   ' => 251728,
			' Batani  ' => 251729,
			' Murkim  ' => 251730,
			' Mofinop   ' => 251731,
			' Jetfa ' => 251732,
			' Nongme  ' => 251733,
			' Pamek ' => 251734,
			'Iwur  ' => 251737,
			'Okbemtau   ' => 251790,
			'Oksebang   ' => 251791,
			'Kab. Tolikara  ' => 251800,
			'Kec. Kanggime  ' => 251801,
			'Kec. Karubaga  ' => 251802,
			'Kec. Bokondini ' => 251803,
			'Kec. Kembu ' => 251804,
			'Kec. Goyage  ' => 251805,
			'Kec. Kubu  ' => 251806,
			'Kec. Geya  ' => 251807,
			'Kec. Numba ' => 251808,
			'Kec. Dundu ' => 251809,
			'Kec. Gudage  ' => 251810,
			'Kec. Timori  ' => 251811,
			'Kec. Konda ' => 251812,
			'Kec. Nelawi  ' => 251813,
			'Kec. Kuari ' => 251814,
			'Kec. Bokoneri  ' => 251815,
			'Kec. Bewani  ' => 251816,
			'Kec. Komboneri ' => 251817,
			'Kec. Nabunage  ' => 251818,
			'Kec. Wakuo ' => 251819,
			'Kec. Nunggawi  ' => 251820,
			'Kec. Woniki  ' => 251821,
			'Kec. Wunin ' => 251822,
			'Kec. Wina  ' => 251823,
			'Kec. Panaga  ' => 251824,
			'Kec. Poganeri  ' => 251825,
			'Kec. Dow   ' => 251826,
			'Kec. Wari/Taiyeve  ' => 251827,
			'Kec. Umagi ' => 251830,
			'Kec. Gilungbandu ' => 251831,
			'Kec. Yuneri  ' => 251832,
			'Kec. Taginire  ' => 251833,
			'Kec. Egiam ' => 251834,
			'Kec. Air Garam ' => 251835,
			' Gika ' => 251836,
			' Telenggeme  ' => 251837,
			' Anawi ' => 251838,
			' Wenam ' => 251839,
			' Wugi ' => 251840,
			' Danime  ' => 251841,
			' Tagime  ' => 251842,
			'tidak ada  ' => 251843,
			' Aweku ' => 251844,
			' Bogonuk   ' => 251845,
			' Li Anogomma ' => 251846,
			' Biuk ' => 251847,
			' Yuko ' => 251848,
			'Kamboneri  ' => 251890,
			'Kec. Kai' => 251891,
			'Kab. Sarmi ' => 251900,
			'Kec. Pantai Timur  ' => 251902,
			'Kec. Bonggo  ' => 251903,
			'Kec. Tor Atas  ' => 251904,
			'Kec. Sarmi ' => 251905,
			'Kec. Pantai Barat  ' => 251906,
			'Kec. Pantai Timur Bagian Barat' => 251907,
			'Kec. Bonggo Timur  ' => 251910,
			'Kec. Sarmi Timur ' => 251911,
			'Kec. Sarmi Barat ' => 251912,
			'Kec. Apawert Hulu  ' => 251913,
			'Sarmi Selatan  ' => 251914,
			'Kec. Ismari' => 251915,
			'Kec. Muara Tor' => 251916,
			'Kec. Sobey' => 251917,
			'Kec. Walani' => 251918,
			'Kab. Keerom  ' => 252000,
			'Kec. Web   ' => 252001,
			'Kec. Senggi  ' => 252002,
			'Kec. Waris ' => 252003,
			'Kec. Arso  ' => 252004,
			'Kec. Skamto  ' => 252005,
			'Kec. Towe Hitam  ' => 252006,
			'Kec. Arso Timur  ' => 252007,
			'Kec. Arso Barat' => 252008,
			'Kec. Kaisenar' => 252009,
			'Kec. Mannem' => 252010,
			'Kec. Yaffi' => 252011,
			'Kec. Yaffi' => 252012,
			'Kab. Waropen ' => 252600,
			'Kec. Waropen Bawah ' => 252601,
			'Kec. Masirei ' => 252602,
			'Kec. Inggerus  ' => 252604,
			'Kec. Ureifaisei  ' => 252605,
			'Kec. Risei Sayati  ' => 252607,
			'Kec. Kirihi  ' => 252609,
			'Wapoga ' => 252610,
			'Kec. Demba' => 252611,
			'Kec. Oudate' => 252612,
			'Kec. Wonti' => 252613,
			'Kec. Soyoi Mambai' => 252614,
			'Kec. Walani' => 252615,
			'Kab. Supiori ' => 252700,
			'Kec. Supiori Selatan  ' => 252701,
			'Kec. Yenggarbun  ' => 252702,
			'Kec. Supiori Timur ' => 252703,
			'Kec. Kepulauan Aruri  ' => 252704,
			'Kec. Supiori Barat ' => 252705,
			'Supiori Utara  ' => 252790,
			'Kab. Memberamo Raya ' => 252800,
			'Kec. Waropen Atas  ' => 252803,
			'Kec. Mamberamo Ilir ' => 252804,
			'Kec. Mamberamo Tengah   ' => 252805,
			'Kec. Mamberamo Tengah Timur ' => 252806,
			'Kec. Rufaer  ' => 252807,
			'Kec. Mamberamo Ulu ' => 252808,
			'Kec. Benuki  ' => 252809,
			'Kec. Sawai ' => 252810,
			'Mamberamo Hulu ' => 252890,
			'Mamberamo Hilir  ' => 252891,
			'Kab. Nduga ' => 252900,
			'Kec. Wosak ' => 252901,
			'Kec. Kenyam  ' => 252902,
			'Kec. Geselma ' => 252903,
			'Kec. Mapenduma ' => 252904,
			'Kec. Mugi  ' => 252905,
			'Kec. Yigi  ' => 252906,
			'Kec. Mbuwa ' => 252907,
			'Kec. Gearek  ' => 252908,
			'Kec. Kegayem' => 252909,
			'Kec. Paro' => 252910,
			'Kec. Mebarok' => 252911,
			'Kec. Kilmid' => 252912,
			'Kec. Koroptak' => 252913,
			'Kec. Yenggelo' => 252914,
			'Kec. Alama' => 252915,
			'Kec. Yal' => 252916,
			'Kec. Mam' => 252917,
			'Kec. Dal' => 252918,
			'Kec. Nirkuri' => 252919,
			'Kec. Iniye' => 252920,
			'Kec. Mbua Tengah' => 252921,
			'Kec. Inikgal' => 252922,
			'Kec. Mbulmu Yalma' => 252923,
			'Kec. Embetpen' => 252924,
			'Kec. Kora' => 252925,
			'Kec. Wusi' => 252926,
			'Kec. Nenggeagin' => 252927,
			'Kec. Pasir Putih' => 252928,
			'Kec. Pija' => 252929,
			'Kec. Moba' => 252930,
			'Kec. Wutpaga' => 252931,
			'Kec. Krepkuri' => 252932,
			'Kab. Lanny Jaya  ' => 253000,
			'Kec. Makki ' => 253001,
			'Kec. Pirime  ' => 253002,
			'Kec. Tiom  ' => 253003,
			'Kec. Balingga  ' => 253004,
			'Kec. Kuyawage  ' => 253005,
			'Kec. Malagaineri ' => 253006,
			'Kec. Tiomneri  ' => 253007,
			'Kec. Dimba ' => 253008,
			'Kec. Gamelia ' => 253009,
			'Kec. Poga  ' => 253010,
			'Kec. Awina' => 253011,
			'Kec. Ayumnati' => 253012,
			'Kec. Balingga Barat' => 253013,
			'Kec. Bruwa' => 253014,
			'Kec. Buguk Gona' => 253015,
			'Kec. Gelok Beam' => 253016,
			'Kec. Goa Balim' => 253017,
			'Kec. Gollo' => 253018,
			'Kec. Guna' => 253019,
			'Kec. Gupura' => 253020,
			'Kec. Karu' => 253021,
			'Kec. Kelulome' => 253022,
			'Kec. Kolawa' => 253023,
			'Kec. Kuly Lanny' => 253024,
			'Kec. Lannyna' => 253025,
			'Kec. Melagi' => 253026,
			'Kec. Milimbo' => 253027,
			'Kec. Mokoni' => 253028,
			'Kec. Muara' => 253029,
			'Kec. Nikogwe' => 253030,
			'Kec. Niname' => 253031,
			'Kec. Nogi' => 253032,
			'Kec. Tiom Ollo' => 253033,
			'Kec. Wano Barat' => 253034,
			'Kec. Wereka' => 253035,
			'Kec. Wiringgambut' => 253036,
			'Kec. Yiginua' => 253037,
			'Kec. Yiluk' => 253038,
			'Kec. Yugungwi' => 253039,
			'Kab. Membramo Tengah  ' => 253100,
			'Kec. Kobakma ' => 253101,
			'Kec. Ilugwa  ' => 253102,
			'Kec. Kelila  ' => 253103,
			'Kec. Eragayam  ' => 253104,
			'Kec. Megambilis  ' => 253105,
			'Kab. Yalimo  ' => 253200,
			'Kec. Welarek ' => 253201,
			'Kec. Apalapsili  ' => 253202,
			'Kec. Abenaho ' => 253203,
			'Kec. Elelim  ' => 253204,
			'Kec. Benawa  ' => 253205,
			'kab. Puncak  ' => 253300,
			'Kec. Agadugume ' => 253301,
			'Kec. Gome  ' => 253302,
			'Kec. Ilaga ' => 253303,
			'Kec. Sinak ' => 253304,
			'Kec. Pogoma  ' => 253305,
			'Kec. Wangbe  ' => 253306,
			'Kec. Beoga ' => 253307,
			'Kec. Doufo ' => 253308,
			'Kec. Dervos' => 253309,
			'Kec. Beoga Barat' => 253310,
			'Kec. Beoga Timur' => 253311,
			'Kec. Ogamanim' => 253312,
			'Kec. Kembru' => 253313,
			'Kec. Bina' => 253314,
			'Kec. Sinak Barat' => 253315,
			'Kec. Mage`abume' => 253316,
			'Kec. Yugumuak' => 253317,
			'Kec. Ilaga Utara' => 253318,
			'Kec. Mabugi' => 253319,
			'Kec. Omukia' => 253320,
			'Kec. Lambewi' => 253321,
			'Kec. Oneri' => 253322,
			'Kec. Amungkalpia' => 253323,
			'Kec. Gome Utara' => 253324,
			'Kec. Erelmakawia' => 253325,
			'Kab. Dogiyai ' => 253400,
			'Kec. Piyaiye ' => 253401,
			'Kec. Mapia Barat ' => 253402,
			'Kec. Mapia ' => 253403,
			'Kec. Dogiyai ' => 253404,
			'Kec. Kamu Selatan  ' => 253405,
			'Kec. Kamu  ' => 253406,
			'Kec. Mapia Tengah  ' => 253407,
			'Kec. Kamu Tmur ' => 253408,
			'Kec. Kamu Utara  ' => 253409,
			'Kec. Sukikai Selatan  ' => 253410,
			'Kab. Deiyai  ' => 253500,
			'Kec. Tigi  ' => 253501,
			'Kec. Tigi Barat  ' => 253502,
			'Kec. Tigi Timur  ' => 253503,
			'Kec. Bowobado  ' => 253504,
			'Kec. Kapiraya  ' => 253505,
			'Kab. Intan Jaya  ' => 253600,
			'Kec. Sugapa  ' => 253601,
			'Kec. Hitadipa  ' => 253602,
			'Kec. Homeyo  ' => 253603,
			'Kec. Biandoga  ' => 253604,
			'Kec. Wandai  ' => 253605,
			'Kec. Agisiga ' => 253606,
			'Sugapa*  ' => 253691,
			'Hitadipa*  ' => 253692,
			'Homeyo*  ' => 253693,
			'Biandoga*  ' => 253694,
			'Wandai*  ' => 253695,
			'Agisiga*   ' => 253696,
			'Kec. Ugimba' => 253697,
			'Kec. Tomosiga' => 253698,
			'Kota Jayapura  ' => 256000,
			'Kec. Muara Tami  ' => 256001,
			'Kec. Abepura ' => 256002,
			'Kec. Jayapura Selatan   ' => 256003,
			'Kec. Jayapura Utara ' => 256004,
			'Kec. Heram ' => 256005,
			'Kotaraja   ' => 256090,
			'Prov. Bengkulu ' => 260000,
			'Kab. Bengkulu Utara ' => 260100,
			'Kec. Enggano ' => 260101,
			'Kec. Kerkap  ' => 260105,
			'Kec. Arga Makmur ' => 260106,
			'Kec. Lais  ' => 260107,
			'Kec. Padang Jaya ' => 260108,
			'Kec. Ketahun ' => 260109,
			'Kec. Putri Hijau ' => 260110,
			'Kec. Air Napal ' => 260117,
			'Kec. Air Besi  ' => 260118,
			'Kec. Batik Nau ' => 260119,
			'Kec. Giri Mulia  ' => 260120,
			'Kec. Napal Putih ' => 260121,
			' Hulu Palik  ' => 260122,
			' Air Padang  ' => 260123,
			'Kec. Arma Jaya' => 260124,
			'Kec. Tanjungagung Palik' => 260125,
			'Kec. Ulok Kupai' => 260126,
			'Kec. Marga Sakti Sebelat' => 260127,
			'Kec. Pinang Raya' => 260128,
			'Kab. Rejang Lebong ' => 260200,
			'Kec. Kota Padang ' => 260202,
			'Kec. Padang Ulang Tanding ' => 260203,
			'Kec. Curup ' => 260204,
			'Kec. Sindang Kelingi  ' => 260210,
			'Kec. Bermani Ulu ' => 260211,
			'Kec. Selupu Rejang ' => 260212,
			'Kec. Sindang Beliti Ilir  ' => 260217,
			'Kec. Bindu Riang ' => 260218,
			'Kec. Sindang Beliti Ulu ' => 260219,
			'Kec. Sindang Dataran  ' => 260220,
			'Kec. Curup Selatan ' => 260221,
			'Kec. Curup Tengah  ' => 260222,
			'Kec. Bermani Ulu Raya   ' => 260223,
			'Kec. Curup Utara ' => 260224,
			'Kec. Curup Timur ' => 260225,
			'Kab. Bengkulu Selatan   ' => 260300,
			'Kec. Manna ' => 260304,
			'Kec. Seginim ' => 260305,
			'Kec. Pino  ' => 260306,
			'Kec. Kota Manna  ' => 260314,
			'Kec. Pinoraya  ' => 260315,
			'Kec. Kedurang  ' => 260318,
			'Kec. Bunga Mas ' => 260319,
			'Kec. Pasar Manna ' => 260320,
			'Kec. Kedurang Ilir ' => 260321,
			'Kec. Air Nipis ' => 260322,
			'Kec. Ulu Manna ' => 260323,
			'Kab. Muko-muko ' => 260400,
			'Kec. Muko-Muko Selatan  ' => 260401,
			'Kec. Teras Terunjam ' => 260402,
			'Kec. Muko-Muko Utara  ' => 260403,
			'Kec. Pondok Suguh  ' => 260404,
			'Kec. Lubuk Pinang  ' => 260405,
			'Kec. Air Rami  ' => 260406,
			'Kec. Malin Deman ' => 260407,
			'Kec. Sungai Rumbai ' => 260408,
			'Kec. Teramang Jaya ' => 260409,
			'Kec. Penarik ' => 260410,
			'Kec. Selagan Raya  ' => 260411,
			'Kec. Air Dikit ' => 260412,
			'Kec. XIV Koto  ' => 260413,
			'Kec. Air Manjunto  ' => 260414,
			'Kec. V Koto  ' => 260415,
			'Kota Mukomuko  ' => 260490,
			'Ipuh  ' => 260491,
			'Kab. Kepahiang ' => 260500,
			'Kec. Kepahiang ' => 260501,
			'Kec. Bermani Ilir  ' => 260502,
			'Kec. Tebat Karai ' => 260503,
			'Kec. Ujan Mas  ' => 260504,
			'Kec. Muara Kemumu  ' => 260505,
			'Kec. Seberang Musi ' => 260506,
			'Kec. Kaba Wetan  ' => 260507,
			'Kec. Merigi  ' => 260508,
			'Kab. Lebong  ' => 260600,
			'Kec. Lebong Selatan ' => 260601,
			'Kec. Lebong Utara  ' => 260602,
			'Kec. Rimbo Pegadang ' => 260603,
			'Kec. Lebong Tengah ' => 260604,
			'Kec. Lebong Atas ' => 260605,
			' Topos ' => 260607,
			' Bingin Kuning ' => 260608,
			' Lebong Sakti  ' => 260609,
			' Pelabai   ' => 260610,
			' Amen ' => 260611,
			' Uram Jaya ' => 260612,
			' Pinang Belapis  ' => 260613,
			'Kec. Padang Bano' => 260614,
			'Kab. Kaur  ' => 260700,
			'Kec. Kaur Selatan  ' => 260701,
			'Kec. Kaur Tengah ' => 260702,
			'Kec. Kaur Utara  ' => 260703,
			'Kec. Maje  ' => 260704,
			'Kec. Nasal ' => 260705,
			'Kec. Kinal ' => 260706,
			'Kec. Tanjung Kemuning   ' => 260707,
			'Kec. Muara Tetap ' => 260708,
			'Kec. Luas  ' => 260709,
			'Kec. Muara Sahung  ' => 260710,
			'Kec. Semidang Gumai ' => 260711,
			'Kec. Kelam Tengah  ' => 260712,
			'Kec. Padang Guci Hilir  ' => 260713,
			'Kec. Padang Guci Ulu  ' => 260714,
			'Kec. Lungkang Kule ' => 260715,
			'Kab. Seluma  ' => 260800,
			'Kec. Talo  ' => 260801,
			'Kec. Seluma  ' => 260802,
			'Kec. Sukaraja  ' => 260803,
			'Kec. Semidang Alas Maras  ' => 260804,
			'Kec. Semidang Alas ' => 260805,
			'Kec. Ilir Talo ' => 260806,
			'Kec. Talo Kecil  ' => 260807,
			'Kec. Ulu Talo  ' => 260808,
			'Kec. Seluma Selatan ' => 260809,
			'Kec. Seluma Barat  ' => 260810,
			'Kec. Seluma Timur  ' => 260811,
			'Kec. Seluma Utara  ' => 260812,
			'Kec. Air Periukan  ' => 260813,
			'Kec. Lubuk Sandi ' => 260814,
			'Kab. Bengkulu Tengah  ' => 260900,
			'Kec. Talang Empat  ' => 260901,
			'Kec. Karang Tinggi ' => 260902,
			'Kec. Taba Penanjung ' => 260903,
			'Kec. Pagar Jati  ' => 260904,
			'Kec. Pondok Kelapa ' => 260905,
			'Kec. Pematang Tiga ' => 260906,
			'Kec. Merigi Kelindang   ' => 260907,
			'Kec. Merigi Sakti  ' => 260908,
			'Kec. Pondok Kubang ' => 260909,
			'Kec. Bang Haji ' => 260910,
			'Kota Bengkulu  ' => 266000,
			'Kec. Selebar ' => 266001,
			'Kec. Gading Cempaka ' => 266002,
			'Kec. Teluk Segara  ' => 266003,
			'Kec. Muara Bangkahulu   ' => 266004,
			'Kec. Kampung Melayu ' => 266005,
			'Kec. Ratu Agung  ' => 266006,
			'Kec. Ratu Samban ' => 266007,
			'Kec. Sungai  Serut ' => 266008,
			'Kec. Singaran Pati ' => 266009,
			'Prov. Maluku Utara ' => 270000,
			'Kab. Pulau Taliabu' => 270100,
			'Kec. Taliabu Barat' => 270101,
			'Kec. Taliabu Barat Laut' => 270102,
			'Kec. Lede' => 270103,
			'Kec. Taliabu Utara' => 270104,
			'Kec. Taliabu Timur' => 270105,
			'Kec. Taliabu Timur Selatan' => 270106,
			'Kec. Taliabu Selatan' => 270107,
			'Kec. Tabona' => 270108,
			'Kab. Halmahera Tengah   ' => 270200,
			'Kec. Weda  ' => 270203,
			'Kec. Pulau Gebe  ' => 270204,
			'Kec. Patani  ' => 270206,
			'Kec. Weda Utara  ' => 270207,
			'Kec. Weda Selatan  ' => 270208,
			'Kec. Patani Utara  ' => 270209,
			' Weda Tengah ' => 270210,
			' Patani Barat  ' => 270211,
			'Kec. Weda Timur' => 270212,
			'Kec. Patani Timur' => 270213,
			'Kab. Halmahera Barat  ' => 270300,
			'Kec. Sahu  ' => 270302,
			'Kec. Ibu   ' => 270303,
			'Kec. Loloda  ' => 270304,
			'Kec. Jailolo Selatan  ' => 270305,
			'Kec. Jailolo ' => 270306,
			'Kec. Sahu Timur  ' => 270307,
			'Kec. Ibu Selatan ' => 270308,
			'Kec. Ibu Utara ' => 270309,
			'Jailolo Timur  ' => 270310,
			'Kec. Tabaru' => 270311,
			'Kab. halmahera Utara  ' => 270400,
			'Kec. Tobelo  ' => 270401,
			'Kec. Tobelo Selatan ' => 270402,
			'Kec. Kao   ' => 270403,
			'Kec. Galela  ' => 270404,
			'Kec. Loloda Utara  ' => 270408,
			'Kec. Malifut ' => 270409,
			'Kec. Tobelo Utara  ' => 270410,
			'Kec. Tobelo Tengah ' => 270411,
			'Kec. Tobelo Timur  ' => 270412,
			'Kec. Tobelo Barat  ' => 270413,
			'Kec. Galela Barat  ' => 270414,
			'Kec. Galela Selatan ' => 270415,
			'Kec. Galela Utara  ' => 270416,
			'Kec. Loloda Kepulauan   ' => 270419,
			'Kec. Kao Utara ' => 270420,
			'Kec. Kao Barat ' => 270421,
			'Kec. Kao Teluk ' => 270422,
			'Kab. Halmahera Selatan  ' => 270500,
			'Kec. Bacan Timur ' => 270502,
			'Kec. Bacan Barat ' => 270503,
			'Kec. Bacan ' => 270504,
			'Kec. Obi   ' => 270505,
			'Kec. Gane Barat  ' => 270506,
			'Kec. Gane Timur  ' => 270507,
			'Kec. Kayoa ' => 270508,
			'Kec. Pulau Makian  ' => 270509,
			'Kec. Obi Selatan ' => 270510,
			'Kec. Obi Barat ' => 270511,
			'Kec. Obi Timur ' => 270512,
			'Kec. Obi Utara ' => 270513,
			'Kec. Mandioli Selatan   ' => 270514,
			'Kec. Mandioli Utara ' => 270515,
			'Kec. Bancan Selatan ' => 270516,
			'Kec. Batang Lomang ' => 270517,
			'Kec. Bacan Timur Selatan  ' => 270518,
			'Kec. Bacan Timur Tengah ' => 270519,
			'Kec. Kasiruta Barat ' => 270520,
			'Kec. Kasiruta Timur ' => 270521,
			'Kec. Bacan Barat Utara  ' => 270522,
			'Kec. Kayoa Barat ' => 270523,
			'Kec. Kayoa Selatan ' => 270524,
			'Kec. Kayoa Utara ' => 270525,
			'Kec. Makian Barat  ' => 270526,
			'Kec. Gane Selatan  ' => 270527,
			'Kec. Gane Utara  ' => 270528,
			'Kec. Kepulauan Joronga  ' => 270529,
			'Kec. Gane Timur Tengah  ' => 270530,
			'Kec. Gane Timur Selatan ' => 270531,
			'Gane Barat Selatan ' => 270590,
			'Gane Barat Utara ' => 270591,
			'Kab. Halmahera Timur  ' => 270600,
			'Kec. Maba Selatan  ' => 270601,
			'Kec. Wasile Selatan ' => 270602,
			'Kec. Wasile  ' => 270603,
			'Kec. Maba  ' => 270604,
			'Kec. Wasile Tengah ' => 270605,
			'Kec. Wasile Utara  ' => 270606,
			'Kec. Wasile Timur  ' => 270607,
			'Kec. Maba Tengah ' => 270608,
			'Kec. Maba Utara  ' => 270609,
			'Kec. Kota Maba ' => 270610,
			'Kab. Kepulauan Sula ' => 270700,
			'Kec. Sanana  ' => 270701,
			'Kec. Sula Besi Barat  ' => 270702,
			'Kec. Mangoli Timur ' => 270703,
			'Kec. Taliabu Barat ' => 270704,
			'Kec. Taliabu Timur ' => 270705,
			'Kec. Mangoli Barat ' => 270706,
			'Kec. Sula Besi Tengah   ' => 270707,
			'Kec. Sula Besi Timur  ' => 270708,
			'Kec. Mangoli Tengah ' => 270709,
			'Kec. Mangoli Utara Timur  ' => 270710,
			'Kec. Mangoli Utara ' => 270711,
			'Kec. Mangoli Selatan  ' => 270712,
			'Kec. Taliabu Timur Selatan  ' => 270713,
			'Kec. Taliabu Utara ' => 270714,
			'Kec. Sula Besi Selatan  ' => 270715,
			'Kec. Sanana Utara  ' => 270716,
			'Kec. Taliabu Barat Laut ' => 270717,
			'Kec. Lede  ' => 270718,
			'Kec. Taliabu Selatan  ' => 270719,
			'Mangoli Tengah ' => 270720,
			'Taliabu Utara  ' => 270721,
			'Taliabu Timur Selatan   ' => 270722,
			'Taliabu -Timur ' => 270723,
			'Taliabu Selatan  ' => 270724,
			'Taliabu Barat Laut ' => 270725,
			'Taliabu Barat  ' => 270726,
			'Lede  ' => 270727,
			'Tabona ' => 270790,
			'Kab. Kepulauan Morotai  ' => 270800,
			'Kec. Morotai Selatan Barat  ' => 270801,
			'Kec. Morotai Selatan  ' => 270802,
			'Kec. Morotai Utara ' => 270803,
			'Kec. Morotai Jaya  ' => 270804,
			'Kec. Morotai Timur ' => 270805,
			'Kota Ternate ' => 276000,
			'Kec. Pulau Ternate ' => 276001,
			'Kec. Ternate Selatan  ' => 276002,
			'Kec. Ternate Utara ' => 276003,
			'Kec. Moti  ' => 276004,
			'Kec. Pulau Batang Dua   ' => 276005,
			'Kec. Ternate Tengah ' => 276006,
			'Kec.  Pulau Hiri ' => 276007,
			'Kota Tidore Kepulauan   ' => 276100,
			'Kec. Tidore Selatan ' => 276102,
			'Kec. Tidore Utara  ' => 276103,
			'Kec. Oba   ' => 276104,
			'Kec. Oba Utara ' => 276105,
			'Kec. Oba Tengah  ' => 276106,
			'Kec. Oba Selatan ' => 276107,
			'Kec. Tidore  ' => 276108,
			'Kec. Tidore Timur  ' => 276109,
			'Prov. Banten ' => 280000,
			'Kab. Pandeglang  ' => 280100,
			'Kec. Sumur ' => 280101,
			'Kec. Cimanggu  ' => 280102,
			'Kec. Cibaliung ' => 280103,
			'Kec. Cikeusik  ' => 280104,
			'Kec. Cigeulis  ' => 280105,
			'Kec. Panimbang ' => 280106,
			'Kec. Munjul  ' => 280107,
			'Kec. Picung  ' => 280108,
			'Kec. Bojong  ' => 280109,
			'Kec. Saketi  ' => 280110,
			'Kec. Pagelaran ' => 280111,
			'Kec. Labuan  ' => 280112,
			'Kec. Jiput ' => 280113,
			'Kec. Menes ' => 280114,
			'Kec. Mandalawangi  ' => 280115,
			'Kec. Cimanuk ' => 280116,
			'Kec. Banjar  ' => 280117,
			'Kec. Pandeglang  ' => 280118,
			'Kec. Cadasari  ' => 280119,
			'Kec. Angsana ' => 280120,
			'Kec. Karang Tanjung ' => 280121,
			'Kec. Kaduhejo  ' => 280122,
			'Kec. Cikedal ' => 280123,
			'Kec. Cipeucang ' => 280124,
			'Kec. Cisata  ' => 280125,
			'Kec. Patia ' => 280126,
			'Kec. Carita  ' => 280127,
			'Kec. Sukaresmi ' => 280132,
			'Kec. Mekarjaya ' => 280133,
			'Kec. Sindangresmi  ' => 280134,
			'Kec. Pulosari  ' => 280135,
			'Kec. Koroncong ' => 280136,
			'Kec. Cibitung  ' => 280138,
			'Kec. Majasari  ' => 280139,
			'Kec. Sobang  ' => 280140,
			'Kab. Lebak ' => 280200,
			'Kec. Malingping  ' => 280201,
			'Kec. Panggarangan  ' => 280202,
			'Kec. Bayah ' => 280203,
			'Kec. Cibeber ' => 280204,
			'Kec. Cijaku  ' => 280205,
			'Kec. Banjarsari  ' => 280206,
			'Kec. Cileles ' => 280207,
			'Kec. Gunung kencana ' => 280208,
			'Kec. Bojongmanik ' => 280209,
			'Kec. Leuwidamar  ' => 280210,
			'Kec. Muncang ' => 280211,
			'Kec. Cipanas ' => 280212,
			'Kec. Sajira  ' => 280213,
			'Kec. Cimarga ' => 280214,
			'Kec. Cikulur ' => 280215,
			'Kec. Warung gunung ' => 280216,
			'Kec. Cibadak ' => 280217,
			'Kec. Rangkasbitung ' => 280218,
			'Kec. Maja  ' => 280219,
			'Kec. Curug bitung  ' => 280220,
			'Kec. Sobang  ' => 280221,
			'Kec. Wanasalam ' => 280222,
			'Kec. Cilograng ' => 280223,
			'Kec. Cihara  ' => 280224,
			'Kec. Cigemblong  ' => 280225,
			'Kec. Cirinten  ' => 280226,
			'Kec. Lebakgedong ' => 280227,
			'Kec. Karanganyar ' => 280228,
			'Kab. Tangerang ' => 280300,
			'Kec. Cisoka  ' => 280301,
			'Kec. Tiga raksa  ' => 280302,
			'Kec. Cikupa  ' => 280303,
			'Kec. Panongan  ' => 280304,
			'Kec. Curug ' => 280305,
			'Kec. Legok ' => 280306,
			'Kec. Pagedangan  ' => 280307,
			'Kec. Pasar Kemis ' => 280312,
			'Kec. Balaraja  ' => 280313,
			'Kec. Kresek  ' => 280314,
			'Kec. Kronjo  ' => 280315,
			'Kec. Mauk  ' => 280316,
			'Kec. Rajeg ' => 280317,
			'Kec. Sepatan ' => 280318,
			'Kec. Pakuhaji  ' => 280319,
			'Kec. Teluk naga  ' => 280320,
			'Kec. Kosambi ' => 280321,
			'Kec. Jayanti ' => 280322,
			'Kec. Jambe ' => 280323,
			'Kec. Cisauk  ' => 280324,
			'Kec. Kemeri  ' => 280325,
			'Kec. Sukadiri  ' => 280326,
			'Kec. Sukamulya ' => 280333,
			'Kec. Kelapa Dua  ' => 280334,
			'Kec. Sindang Jaya  ' => 280335,
			'Kec. Sepatan Timur ' => 280336,
			'Kec. Solear  ' => 280337,
			'Kec. Gunung Kaler  ' => 280338,
			'Kec. Mekar Baru  ' => 280339,
			'Kab. Serang  ' => 280400,
			'Kec. Cinangka  ' => 280401,
			'Kec. Padarincang ' => 280402,
			'Kec. Ciomas  ' => 280403,
			'Kec. Pabuaran  ' => 280404,
			'Kec. Baros ' => 280405,
			'Kec. Petir ' => 280406,
			'Kec. Cikeusal  ' => 280408,
			'Kec. Pamarayan ' => 280409,
			'Kec. Jawilan ' => 280410,
			'Kec. Kopo  ' => 280411,
			'Kec. Cikande ' => 280412,
			'Kec. Kragilan  ' => 280413,
			'Kec. Serang  ' => 280416,
			'Kec. Waringinkurung ' => 280418,
			'Kec. Mancak  ' => 280419,
			'Kec. Anyar ' => 280420,
			'Kec. Bojonegara  ' => 280421,
			'Kec. Kramatwatu  ' => 280422,
			'Kec. Ciruas  ' => 280424,
			'Kec. Pontang ' => 280425,
			'Kec. Carenang  ' => 280426,
			'Kec. Tirtayasa ' => 280427,
			'Kec. Tunjung Teja  ' => 280428,
			'Kec. Kibin ' => 280429,
			'Kec. Pulo Ampel  ' => 280430,
			'Kec. Binuang ' => 280431,
			'Kec. Tanara  ' => 280432,
			'Kec. Gunung Sari ' => 280433,
			'Kec. Bandung ' => 280434,
			'Kec. Lebak Wangi' => 280435,
			'Kota Cilegon ' => 286000,
			'Kec. Ciwandan  ' => 286001,
			'Kec. Pulomerak ' => 286002,
			'Kec. Cilegon ' => 286003,
			'Kec. Cibeber ' => 286004,
			'Kec. Gerogol ' => 286005,
			'Kec. Purwakarta  ' => 286006,
			'Kec. Jombang ' => 286007,
			'Kec. Citangkil ' => 286008,
			'Kota Tangerang ' => 286100,
			'Kec. Ciledug ' => 286101,
			'Kec. Cipondoh  ' => 286102,
			'Kec. Tangerang ' => 286103,
			'Kec. Jati uwung  ' => 286104,
			'Kec. Batuceper ' => 286105,
			'Kec. Benda ' => 286106,
			'Kec. Larangan  ' => 286107,
			'Kec. Karang Tengah ' => 286108,
			'Kec. Pinang  ' => 286109,
			'Kec. Karawaci  ' => 286110,
			'Kec. Cibodas ' => 286111,
			'Kec. Periuk  ' => 286112,
			'Kec. Neglasari ' => 286113,
			'Kota Serang  ' => 286200,
			'Kec. Cipocok Jaya  ' => 286201,
			'Kec. Curug ' => 286202,
			'Kec. Kasemen ' => 286203,
			'Kec. Taktakan  ' => 286205,
			'Kec. Walantaka ' => 286206,
			'Serang ' => 286207,
			'Kota tangerang Selatan  ' => 286300,
			'Kec. Ciputat ' => 286301,
			'Kec. Ciputat Timur ' => 286302,
			'Kec. Pamulang  ' => 286303,
			'Kec. Pondok Aren ' => 286304,
			'Kec. Serpong ' => 286305,
			'Kec. Serpong Utara ' => 286306,
			'Kec. Setu  ' => 286307,
			'Prov. Bangka Belitung   ' => 290000,
			'Kab. Bangka  ' => 290100,
			'Kec. Mendo Barat ' => 290107,
			'Kec. Merawang  ' => 290108,
			'Kec. Sungai Liat ' => 290109,
			'Kec. Belinyu ' => 290113,
			'Kec. Puding Besar  ' => 290114,
			'Kec. Bakam ' => 290115,
			'Kec. Pemali  ' => 290116,
			'Kec. Riau Silip  ' => 290117,
			'Kab. Belitung  ' => 290200,
			'Kec. Membalong ' => 290201,
			'Kec. Tanjung Pandan ' => 290206,
			'Kec. Sijuk ' => 290207,
			'Kec. Badau ' => 290208,
			'Kec. Selat Nasik ' => 290209,
			'Kec. Air Gegas ' => 290225,
			'Kab. Bangka Tengah ' => 290300,
			'Kec. Koba  ' => 290301,
			'Kec. Pangkalan Baru ' => 290302,
			'Kec. Sungai Selan  ' => 290303,
			'Kec. Simpang Katis ' => 290304,
			'Kec. Lubuk Besar ' => 290305,
			'Kec. Namang  ' => 290306,
			'Kab. Bangka Barat  ' => 290400,
			'Kec. Kelapa  ' => 290401,
			'Kec. Tempilang ' => 290402,
			'Kec. Mentok  ' => 290403,
			'Kec. Simpang Teritip  ' => 290404,
			'Kec. Jebus ' => 290405,
			'Kec. Parittiga ' => 290406,
			'Kab. Bangka Selatan ' => 290500,
			'Kec. Payung  ' => 290501,
			'Kec. Simpang Rimba ' => 290502,
			'Kec. Toboali ' => 290503,
			'Kec. Lepar Pongok  ' => 290505,
			'Kec. Pulau Besar ' => 290506,
			'Kec. Tukak Sadai ' => 290507,
			'Air Gegas  ' => 290508,
			'Kec. Kep. Pongok' => 290509,
			'Kab. Belitung Timur ' => 290600,
			'Kec. Dendang ' => 290601,
			'Kec. Gantung ' => 290602,
			'Kec. Manggar ' => 290603,
			'Kec. Kelapa Kampit ' => 290604,
			'Kec. Damar ' => 290605,
			'Kec. Simpang Renggiang  ' => 290606,
			'Kec. Simpang Pesak ' => 290607,
			'Kota Pangkalpinang ' => 296000,
			'Kec. Rangkui ' => 296001,
			'Kec. Bukit Intan ' => 296002,
			'Kec. Pangkal Balam ' => 296003,
			'Kec. Taman Sari  ' => 296004,
			'Kec. Gerunggang  ' => 296005,
			'Girimaya   ' => 296090,
			'Kec. Gabek' => 296091,
			'Prov. Gorontalo  ' => 300000,
			'Kab. Boalemo ' => 300100,
			'Kec. Tilamuta  ' => 300104,
			'Kec. Paguyaman ' => 300106,
			'Kec. Mananggu  ' => 300107,
			'Kec. Dulupi  ' => 300108,
			'Kec. Wonosari  ' => 300109,
			'Kec. Botumoita ' => 300110,
			'Kec. Paguyaman Pantai   ' => 300111,
			'Kab. Gorontalo ' => 300200,
			'Kec. Batudaa Pantai ' => 300201,
			'Kec. Batudaa ' => 300202,
			'Kec. Tibawa  ' => 300203,
			'Kec. Boliyohuto  ' => 300204,
			'Kec. Limboto ' => 300207,
			'Kec. Telaga  ' => 300208,
			'Kec. Bongomeme ' => 300210,
			'Kec. Pulubala  ' => 300211,
			'Kec. Tolangohula ' => 300215,
			'Kec. Mootilango  ' => 300216,
			'Kec. Telaga Biru ' => 300218,
			'Kec. Limboto Barat ' => 300219,
			'Kec. Biluhu  ' => 300220,
			'Kec. Tabongo ' => 300221,
			'Kec. Asparaga  ' => 300222,
			'Kec. Tilango ' => 300223,
			'Kec. Telaga Jaya ' => 300224,
			'Kec. Bilato  ' => 300225,
			'Bilato ' => 300226,
			'Kec. Dungaliyo' => 300227,
			'Kab. Pohuwato  ' => 300300,
			'Kec. Popayato  ' => 300301,
			'Kec. Marisa  ' => 300302,
			'Kec. Paguat  ' => 300303,
			'Kec. Lemito  ' => 300304,
			'Kec. Randangan ' => 300305,
			'Kec. Patilanggio ' => 300306,
			'Kec. Taluditi  ' => 300307,
			'Kec. Popayato Barat ' => 300308,
			'Kec. Popayato Timur ' => 300309,
			'Kec. Wanggarasi  ' => 300310,
			'Kec. Buntulia  ' => 300311,
			'Kec. Duhiadaa  ' => 300312,
			'Kec. Dengilo ' => 300313,
			'Kab. Bone Bolango  ' => 300400,
			'Kec. Tapa  ' => 300401,
			'Kec. Kabila  ' => 300402,
			'Kec. Suwawa  ' => 300403,
			'Kec. Bonepantai  ' => 300404,
			'Kec. Bulango Utara ' => 300405,
			'Kec. Tilongkabila  ' => 300406,
			'Kec. Botupingge  ' => 300407,
			'Kec. Kabila Bone ' => 300408,
			'Kec. Bone  ' => 300409,
			'Kec. Bone Raya ' => 300410,
			'Kec. Bulango Selatan  ' => 300411,
			'Kec. Bulango Timur ' => 300412,
			'Kec. Bulango Ulu ' => 300413,
			'Kec. Suwawa Selatan ' => 300414,
			'Kec. Suwawa Timur  ' => 300415,
			'Kec. Suwawa Tengah ' => 300416,
			'Kec. Bulawa  ' => 300417,
			'Kec. Pinogu' => 300418,
			'Kab. Gorontalo Utara  ' => 300500,
			'Kec. Anggrek ' => 300501,
			'Kec. Atinggola ' => 300502,
			'Kec. Kwandang  ' => 300503,
			'Kec. Sumalata  ' => 300504,
			'Kec. Tolinggula  ' => 300505,
			'Kec. Gentuma Raya  ' => 300506,
			'Tomilito   ' => 300507,
			'Ponelo Kepulauan ' => 300508,
			'Monano ' => 300509,
			'Biau  ' => 300511,
			'Kec. Sumalata Timur' => 300512,
			'Kec. Sumalata Timur' => 300513,
			'Kota Gorontalo ' => 306000,
			'Kec. Kota Barat  ' => 306001,
			'Kec. Kota Selatan  ' => 306002,
			'Kec. Kota Utara  ' => 306003,
			'Kec. Kota Timur  ' => 306004,
			'Kec. Dungingi  ' => 306005,
			'Kec. Kota Tengah ' => 306006,
			'Kec. Sipatana  ' => 306007,
			'Kec. Dumbo Raya  ' => 306008,
			'Kec. Hulonthalangi ' => 306009,
			'Prov. Kepulauan Riau  ' => 310000,
			'Kab. Bintan  ' => 310100,
			'Kec. Bintan Utara  ' => 310101,
			'Kec. Gunung Kijang ' => 310102,
			'Kec. Tambelan  ' => 310103,
			'Kec. Teluk Bintan  ' => 310104,
			'Kec. Teluk Sebong  ' => 310105,
			'Kec. Toapaya ' => 310106,
			'Kec. Mantang ' => 310107,
			'Kec. Bintan Pesisir ' => 310108,
			'Kec. Seri Kuala Loban   ' => 310109,
			'Kec. Bintan Timur  ' => 310110,
			'Kab. Karimun ' => 310200,
			'Kec. Moro  ' => 310201,
			'Kec. Kundur  ' => 310202,
			'Kec. Karimun ' => 310203,
			'Kec. Meral ' => 310204,
			'Kec. Tebing  ' => 310205,
			'Kec. Buru  ' => 310206,
			'Kec. Kundur Utara  ' => 310207,
			'Kec. Kundur Barat  ' => 310208,
			'Kec. Durai ' => 310209,
			'Kec. Meral Barat' => 310210,
			'Kec. Ungar' => 310211,
			'Kec. Belat' => 310212,
			'Kab. Natuna  ' => 310300,
			'Kec. Midai ' => 310303,
			'Kec. Bunguran Barat ' => 310304,
			'Kec. Bunguran Timur ' => 310305,
			'Kec. Serasan ' => 310306,
			'Kec. Subi  ' => 310309,
			'Kec. Bunguran Utara ' => 310311,
			'Kec. Pulau Laut  ' => 310312,
			'Kec. Pulau Tiga  ' => 310313,
			'Kec. Bunguran Timur Laut  ' => 310317,
			'Kec. Bunguran Tengah  ' => 310318,
			'Kec. Bunguran Selatan   ' => 310320,
			'Kec. Serasan Timur ' => 310321,
			'Kab. Lingga  ' => 310400,
			'Kec. Singkep ' => 310401,
			'Kec. Lingga  ' => 310402,
			'Kec. Senayang  ' => 310403,
			'Kec. Singkep Barat ' => 310404,
			'Kec. Lingga Utara  ' => 310405,
			'Kec. Singkep Pesisir' => 310406,
			'Kec. Singkep Selatan' => 310407,
			'Kec. Lingga Timur' => 310408,
			'Kec. Selayar' => 310409,
			'Kec. Kepulauan Posek' => 310410,
			'Kab. Kepulauan Anambas  ' => 310500,
			'Kec. Jemaja  ' => 310501,
			'Kec. Jemaja Timur  ' => 310502,
			'Kec. Siantan ' => 310503,
			'Kec. Palmatak  ' => 310504,
			'Kec. Siantan Selatan  ' => 310505,
			'Kec. Siantan Timur ' => 310506,
			'Kec. Siantan Tengah ' => 310507,
			'Kota Batam ' => 316000,
			'Kec. Belakang Padang  ' => 316001,
			'Kec. Sekupang  ' => 316002,
			'Kec. Sei Beduk ' => 316003,
			'Kec. Bulang  ' => 316004,
			'Kec. Lubuk Baja  ' => 316005,
			'Kec. Batu Ampar  ' => 316006,
			'Kec. Nongsa  ' => 316007,
			'Kec. Galang  ' => 316008,
			'Kec. Bengkong  ' => 316011,
			'Kec. Batam Kota  ' => 316012,
			'Kec. Sagulung  ' => 316013,
			'Kec. Batu Aji  ' => 316014,
			'Kota Tanjungpinang ' => 316100,
			'Kec. Tanjung Pinang Barat ' => 316101,
			'Kec. Tanjung Pinang Timur ' => 316102,
			'Kec. Bukit Bestari ' => 316103,
			'Kec. Tanjung Pinang Kota  ' => 316104,
			'Prov. Papua Barat  ' => 320000,
			'Kab. Fak-Fak ' => 320100,
			'Kec.  Fak-Fak Timur ' => 320101,
			'Kec.  Karas  ' => 320102,
			'Kec.  Fak-Fak  ' => 320103,
			'Kec.  Fak-Fak Tengah  ' => 320104,
			'Kec.  Fak-Fak Barat ' => 320105,
			'Kec.  Kokas  ' => 320106,
			'Kec.  Teluk Patipi ' => 320107,
			'Kec.  Kramongmongga ' => 320108,
			'Kec.  Bomberay ' => 320109,
			'Kec. Pariwari' => 320110,
			'Kec. Wartutin' => 320111,
			'Kec. Fakfak Timur Tengah' => 320112,
			'Kec. Arguni' => 320113,
			'Kec. Mbahamdandara' => 320114,
			'Kec. Kayauni' => 320115,
			'Kec. Furwagi' => 320116,
			'Kec. Tomage' => 320117,
			'Kab. Kaimana ' => 320200,
			'Kec.  Buruway  ' => 320201,
			'Kec.  Teluk Arguni (Atas) ' => 320202,
			'Kec.  Teluk Arguni Bawah  ' => 320203,
			'Kec.  Kaimana  ' => 320204,
			'Kec.  Kambrau  ' => 320205,
			'Kec.  Teluk Etna ' => 320206,
			'Kec.  Yamor  ' => 320207,
			'Kab. Teluk Wondama ' => 320300,
			'Kec.  Naikere  ' => 320301,
			'Kec.  Wondiboy ' => 320302,
			'Kec.  Rasiei ' => 320303,
			'Kec.  Kuri Wamesa  ' => 320304,
			'Kec.  Wasior ' => 320305,
			'Kec.  Teluk Duairi ' => 320306,
			'Kec.  Roon ' => 320307,
			'Kec.  Windesi  ' => 320308,
			'Kec.  Wamesa ' => 320309,
			'Kec.  Roswar ' => 320310,
			'Kec.  Rumberpon  ' => 320311,
			'Kec.  Soug Jaya  ' => 320312,
			'Kec.  Nikiwar  ' => 320313,
			'Sough Wepu ' => 320390,
			'Kab. Teluk Bintuni ' => 320400,
			'Kec. Irorutu/Fafuwar  ' => 320401,
			'Kec. Babo  ' => 320402,
			'Kec. Sumuri  ' => 320403,
			'Kec. Aroba ' => 320404,
			'Kec. Kaitaro ' => 320405,
			'Kec. Kuri  ' => 320406,
			'Kec. Idoor ' => 320407,
			'Kec. Bintuni ' => 320408,
			'Kec. Manimeri  ' => 320409,
			'Kec. Tuhiba  ' => 320410,
			'Kec. Dataran Beimes ' => 320411,
			'Kec. Tembuni ' => 320412,
			'Kec. Aranday ' => 320413,
			'Kec. Komundan  ' => 320414,
			'Kec. Tomu  ' => 320415,
			'Kec. Weriagar  ' => 320416,
			'Kec. Moskona Selatan  ' => 320417,
			'Kec. Meyado  ' => 320418,
			'Kec. Moskona Barat ' => 320419,
			'Kec. Merdey  ' => 320420,
			'Kec. Biscoop ' => 320421,
			'Kec. Masyeta ' => 320422,
			'Kec. Moskona Utara ' => 320423,
			'Kec. Moskona Timur ' => 320424,
			'Wamesa ' => 320425,
			'Kab. Manokwari ' => 320500,
			'Kec. Ransiki ' => 320501,
			'Kec. Momi Waren  ' => 320502,
			'Kec. Nenei ' => 320503,
			'Kec. Sururay ' => 320504,
			'Kec. Anggi ' => 320505,
			'Kec. Taige ' => 320506,
			'Kec. Membey  ' => 320507,
			'Kec. Oransbari ' => 320508,
			'Kec. Warmare ' => 320509,
			'Kec. Prafi ' => 320510,
			'Kec. Menyambouw  ' => 320511,
			'Kec. Catubouw  ' => 320512,
			'Kec. Manokwari Barat  ' => 320513,
			'Kec. Manokwari Timur  ' => 320514,
			'Kec. Manokwari Utara  ' => 320515,
			'Kec. Manokwari Selatan  ' => 320516,
			'Kec. Testega ' => 320517,
			'Kec. Tanah Rubu  ' => 320518,
			'Kec. Kebar ' => 320519,
			'Kec. Senopi  ' => 320520,
			'Kec. Amberbaken  ' => 320521,
			'Kec. Murbani/Arfu  ' => 320522,
			'Kec. Masni ' => 320523,
			'Kec. Sidey ' => 320524,
			'Kec. Tahosta ' => 320525,
			'Kec. Didohu  ' => 320526,
			'Kec. Dataran Isim  ' => 320527,
			'Kec. Anggi Gida  ' => 320528,
			'Kec. Hingk ' => 320529,
			'Neney ' => 320530,
			'Momi - Waren ' => 320531,
			'Tohota ' => 320532,
			'Taige ' => 320533,
			'Membey ' => 320534,
			'Anggi Gida ' => 320535,
			'Didohu ' => 320536,
			'Dataran Isim ' => 320537,
			'Catubouw   ' => 320538,
			'Hink  ' => 320539,
			'Ransiki  ' => 320590,
			'Kec. Anggi' => 320591,
			'Kab. Sorong Selatan ' => 320600,
			'Kec.  Inanwatan  ' => 320601,
			'Kec. Kokoda  ' => 320602,
			'Kec. Metemeini Kais ' => 320603,
			'Kec. Moswaren  ' => 320608,
			'Kec. Seremuk ' => 320610,
			'Kec. Wayer ' => 320611,
			'Kec. Sawiat  ' => 320612,
			'Kec.  Kais ' => 320616,
			'Kec.  Konda  ' => 320617,
			'Kec.  Kokoda Utara ' => 320618,
			'Kec.  Saifi  ' => 320619,
			'Kec.  Fokour ' => 320620,
			'Kec.  Teminabuan ' => 320621,
			'Kec. Kais Darat' => 320622,
			'Kec. Salkma' => 320623,
			'Kab. Sorong  ' => 320700,
			'Kec. Moraid  ' => 320705,
			'Kec. Makbon  ' => 320706,
			'Kec. Beraur  ' => 320707,
			'Kec. Klamono ' => 320708,
			'Kec. Salawati  ' => 320709,
			'Kec. Manyamuk  ' => 320710,
			'Kec. Seget ' => 320711,
			'Kec. Segun ' => 320712,
			'Kec. Salawati Selatan   ' => 320713,
			'Kec. Aimas ' => 320714,
			'Kec. Sayosa  ' => 320715,
			'Kec.  Klabot ' => 320716,
			'Kec.  Klawak ' => 320717,
			'Kec.  Maudus ' => 320718,
			'Kec.  Mariat ' => 320719,
			'Kec.  Klayili  ' => 320720,
			'Kec.  Klaso  ' => 320721,
			'Kec.  Moisegen ' => 320722,
			'Kec. Mega' => 320723,
			'Kec. Moraid/Mega' => 320724,
			'Kec. Salawati Timur' => 320725,
			'Kec. Sorong' => 320726,
			'Kab. Raja Ampat  ' => 320800,
			'Kec.  Misool Selatan  ' => 320801,
			'Kec.  Misool (Misool Utara) ' => 320802,
			'Kec.  Kofiau ' => 320803,
			'Kec.  Misool Timur ' => 320804,
			'Kec.  Salawati Utara  ' => 320805,
			'Kec.  Waigeo Selatan  ' => 320807,
			'Kec.  Teluk Mayalibit   ' => 320808,
			'Kec.  Meos Mansar  ' => 320809,
			'Kec.  Waigeo Barat ' => 320810,
			'Kec.  Waigeo Utara ' => 320811,
			'Kec.  Kepulauan Ayau  ' => 320812,
			'Kec.  Waigeo Timur ' => 320813,
			'Kec.  Warwarbomi ' => 320814,
			'Kec.  Waigeo Barat Kepulauan  ' => 320815,
			'Kec.  Misool Barat ' => 320816,
			'Kec.  Kepulauan Sembilan  ' => 320817,
			'Kec.  Kota Waisai  ' => 320818,
			'Kec.  Tiplol Mayalibit  ' => 320819,
			'Kec.  Batanta Utara ' => 320820,
			'Kec.  Salawati Barat  ' => 320821,
			'Kec.  Salawati Tengah   ' => 320822,
			'Kec.  Supnin ' => 320823,
			'Kec.  Ayau ' => 320824,
			'Kec.  Batanta Selatan   ' => 320825,
			'Selat Sagawin  ' => 320890,
			'Kab. Tambrauw  ' => 320900,
			'Kec.  Fef  ' => 320901,
			'Kec.  Miyah  ' => 320902,
			'Kec.  Yembun ' => 320903,
			'Kec.  Kwoor  ' => 320904,
			'Kec.  Sausapor ' => 320905,
			'Kec.  Abun ' => 320906,
			'Kec. Amberbaken' => 320907,
			'Kec. Kebar' => 320908,
			'Kec. Senopi' => 320909,
			'Kec. Mubrani' => 320910,
			'Kec. Syujak' => 320911,
			'Kec. Moraid' => 320912,
			'Kec. Bikar' => 320913,
			'Kec. Bamusbama' => 320914,
			'Kec. Ases' => 320915,
			'Kec. Miyah Selatan' => 320916,
			'Kec. Ireres' => 320917,
			'Kec. Tobouw' => 320918,
			'Kec. Wilhem Roumbouts' => 320919,
			'Kec. Kebar Timur' => 320920,
			'Kec. Tinggouw' => 320921,
			'Kec. Kwesefo' => 320922,
			'Kec. Mawabuan' => 320923,
			'Kec. Kebar Selatan' => 320924,
			'Kec. Manekar' => 320925,
			'Kec. Mpur' => 320926,
			'Kec. Amberbaken Barat' => 320927,
			'Kec. Kasi' => 320928,
			'Kec. Selemkai' => 320929,
			'Kab. Maybrat ' => 321000,
			'Kec.  Aifat  ' => 321001,
			'Kec.  Aifat Utara  ' => 321002,
			'Kec.  Aifat Timur  ' => 321003,
			'Kec.  Aifat Selatan ' => 321004,
			'Kec.  Aitinyo Barat ' => 321005,
			'Kec.  Aitinyo  ' => 321006,
			'Kec.  Aitinyo Utara ' => 321007,
			'Kec.  Ayamaru  ' => 321008,
			'Kec.  Ayamaru Utara ' => 321009,
			'Kec.  Ayamaru Timur ' => 321010,
			'Kec.  Mare ' => 321011,
			'Aitinyo Tengah ' => 321012,
			'Aifat Timur Selatan ' => 321013,
			'Kec. Ayamaru Barat' => 321014,
			'Aitinyo Raya ' => 321015,
			'Kec. Ayamaru Tengah' => 321016,
			'Kec. Ayamaru Selatan' => 321017,
			'Kec. Ayamaru Utara Timur' => 321018,
			'Kec. Ayamaru Selatan Jaya' => 321019,
			'Kec. Mare Selatan' => 321020,
			'Ayamaru Timur Selatan   ' => 321090,
			'Aifat Timur Tengah ' => 321091,
			'Aifat Timur Jauh ' => 321092,
			'Ayamaru Jaya ' => 321099,
			'Kab. Pegunungan Arfak' => 321100,
			'Kec. Anggi Gida' => 321111,
			'Kec. Membey' => 321112,
			'Kec. Sururay' => 321113,
			'Kec. Didohu' => 321114,
			'Kec. Taige' => 321115,
			'Kec. Catubouw' => 321116,
			'Kec. Testega' => 321117,
			'Kec. Menyambouw' => 321118,
			'Kec. Hingk' => 321119,
			'Kec. Anggi' => 321120,
			'Kab. Manokwari Selatan' => 321200,
			'Kec. Ransiki' => 321206,
			'Kec. Oransbari' => 321221,
			'Kec. Nenei' => 321222,
			'Kec. Dataran Isim' => 321223,
			'Kec. Momi Waren' => 321224,
			'Kec. Tahota' => 321225,
			'Kota Sorong  ' => 326000,
			'Kec.  Sorong Timur ' => 326002,
			'Kec.  Sorong ' => 326003,
			'Kec.  Klablim  ' => 326006,
			'Kec.  Klawalu  ' => 326007,
			'Kec.  Giwu ' => 326008,
			'Kec.  Klamana  ' => 326009,
			'Kec. Klaurung' => 326010,
			'Kec. Malaimsimsa' => 326011,
			'Kec. Maladomes' => 326012,
			'Kec. Sorong' => 326013,
			'Prov. Sulawesi Barat  ' => 330000,
			'Kab. Mamuju  ' => 330100,
			'Kec. Tapalang  ' => 330101,
			'Kec. Mamuju  ' => 330102,
			'Kec. Kalukku ' => 330103,
			'Kec. Kalumpang ' => 330104,
			'Kec. Budong-Budong ' => 330105,
			'Kec. Tapalang Barat ' => 330106,
			'Kec. Papalang  ' => 330107,
			'Kec. Sampaga ' => 330108,
			'Kec. Pangale ' => 330109,
			'Kec. Tommo ' => 330110,
			'Kec. Bonehau ' => 330111,
			'Kec. Topoyo  ' => 330112,
			'Kec. Tobadak ' => 330113,
			'Kec. Karossa ' => 330114,
			'Kec. Simboro Kepulauan  ' => 330115,
			'Kec. Kep. Bala Balakang ' => 330116,
			'Topoyo ' => 330117,
			'Budong-budong  ' => 330190,
			'Pangale  ' => 330191,
			'Kab. Mamuju Utara  ' => 330200,
			'Kec. Pasangkayu  ' => 330201,
			'Kec. Sarudu  ' => 330202,
			'Kec. Baras ' => 330203,
			'Kec. Bambalamutu ' => 330204,
			'Kec. Dapurang  ' => 330205,
			'Kec. Duripoku  ' => 330206,
			'Kec. Bulu Taba ' => 330207,
			'Kec. Lariang ' => 330208,
			'Kec. Tikke Raya  ' => 330209,
			'Kec. Pedongga  ' => 330210,
			'Kec. Bambaira  ' => 330211,
			'Kec. Sarjo ' => 330212,
			'Karossa  ' => 330292,
			'Simboro Dan Kepulauan   ' => 330293,
			'Tobadak  ' => 330294,
			'Kab. Polewali Mamasa  ' => 330300,
			'Kec. Tinambung ' => 330301,
			'Kec. Tutallu ' => 330302,
			'Kec. Campalagian ' => 330303,
			'Kec. Wonomulyo ' => 330304,
			'Kec. Polewali  ' => 330305,
			'Kec. Limboro ' => 330306,
			'Kec. Balanipa  ' => 330307,
			'Kec. Luyo  ' => 330308,
			'Kec. Allu  ' => 330309,
			'Kec. Mapili  ' => 330310,
			'Kec. Matakali  ' => 330311,
			'Kec. Binuang ' => 330312,
			'Kec. Anreapi ' => 330313,
			'Kec. Tapango ' => 330314,
			'Kec. Matangnga ' => 330315,
			'Kec. Bulo  ' => 330316,
			'Tutar ' => 330317,
			'Kab. Mamasa  ' => 330400,
			'Kec. Sumarorong  ' => 330401,
			'Kec. Pana  ' => 330402,
			'Kec. Mamasa  ' => 330403,
			'Kec. Mambi ' => 330404,
			'Kec. Tabulahan ' => 330405,
			'Kec. Tabang  ' => 330406,
			'Kec. Messawa ' => 330407,
			'Kec. Sesenapadang  ' => 330408,
			'Kec. Tandukalua  ' => 330409,
			'Kec. Aralle  ' => 330410,
			'Kec. Nosu  ' => 330411,
			'Kec. Bambang ' => 330412,
			'Kec. Balla ' => 330413,
			'Kec. Tawalian  ' => 330414,
			'Kec. Rantebulahan Timur ' => 330415,
			'Kec. Buntumalangka ' => 330416,
			'Kec. Mehalaan  ' => 330417,
			'Kab. Majene  ' => 330500,
			'Kec. Pamboang  ' => 330502,
			'Kec. Ulumunda  ' => 330505,
			'Kec. Tammerodo Sendana  ' => 330506,
			'Kec. Tubo Sendana  ' => 330507,
			'Kec. Banggai ' => 330509,
			'Kec. Sendana ' => 330510,
			'Kec. Malunda ' => 330511,
			'Kec. Banggai Timur ' => 330512,
			'Kab. Mamuju Tengah' => 330600,
			'Kec. Budong-Budong' => 330601,
			'Kec. Karossa' => 330602,
			'Kec. Topoyo' => 330603,
			'Kec. Tobadak' => 330604,
			'Kec. Pangale' => 330605,
			'Prov. Kalimantan Utara' => 340000,
			'Tanjung Palas Utara ' => 340001,
			'Peso Ilir  ' => 340002,
			'Tanjung Palas  ' => 340003,
			'Tanjung Palas Barat ' => 340004,
			'Tanjung Selor  ' => 340005,
			'Peso  ' => 340006,
			'Tanjung Palas Tengah  ' => 340007,
			'Bunyu ' => 340008,
			'Tanjung Palas Timur ' => 340009,
			'Sekatak  ' => 340010,
			'Kab. Malinau' => 340100,
			'Tarakan Utara  ' => 340101,
			'Tarakan Tengah ' => 340102,
			'Tarakan Timur  ' => 340103,
			'Tarakan Barat  ' => 340104,
			'Kec. Mentarang' => 340105,
			'Kec. Sungai Boh' => 340106,
			'Kec. Malinau Selatan' => 340107,
			'Kec. Malinau Barat' => 340108,
			'Kec. Malinau Utara' => 340109,
			'Kec. Kayan Selatan' => 340110,
			'Kec. Bahau Hulu' => 340111,
			'Kec. Mentarang Hulu' => 340112,
			'Kec. Malinau Selatan Hilir' => 340113,
			'Kec. Malinau Selatan Hulu' => 340114,
			'Kec. Sungai Tubu' => 340115,
			'Kab. Bulungan' => 340200,
			'Kec. Tanjung Palas' => 340202,
			'Kec. Sekatak' => 340203,
			'Kec. Pulau Bunyu' => 340205,
			'Kec. Tanjung Palas Barat' => 340206,
			'Kec. Tanjung Palas Utara' => 340207,
			'Kec. Tanjung Palas Timur' => 340208,
			'Kec. Tanjung Selor' => 340209,
			'Kec. Tanjung Palas Tengah' => 340210,
			'Kec. Peso Hilir' => 340211,
			'Kec. Peso' => 340213,
			'Kab. Tana Tidung' => 340300,
			'Kec. Sesayap' => 340301,
			'Kec. Sesayap Hilir' => 340302,
			'Kec. Tanah Lia' => 340303,
			'Kec. Betayau' => 340304,
			'Kec. Muruk Rian' => 340305,
			'Kab. Nunukan' => 340500,
			'Kec. Krayan' => 340501,
			'Kec. Lumbis' => 340502,
			'Kec. Sembakung' => 340503,
			'Kec. Nunukan' => 340504,
			'Kec. Sebatik' => 340505,
			'Kec. Sebuku' => 340506,
			'Kec. Krayan Selatan' => 340507,
			'Kec. Sebatik Barat' => 340508,
			'Kec. Nunukan Selatan' => 340509,
			'Kec. Nunukan' => 340514,
			'Kec. Krayan Selatan' => 340515,
			'Kec. Krayan' => 340516,
			'Kec. Nunukan Selatan' => 340517,
			'Kec. Sebatik Timur' => 340518,
			'Kec. Sebatik Utara' => 340519,
			'Kec. Sebatik Tengah' => 340520,
			'Kec. Sei Menggaris' => 340521,
			'Kec. Tulin Onsoi' => 340522,
			'Kec. Lumbis Ogong' => 340523,
			'Kec. Sembakung Atulai' => 340524,
			'Kota Tarakan' => 346000,
			'Kec. Tarakan Timur' => 346001,
			'Kec. Tarakan Tengah' => 346002,
			'Kec. Tarakan Barat' => 346003,
			'Kec. Tarakan Utara' => 346004,
			'tidak ada  ' => 999999,

		);

$result = "";

$bi = explode(" ", $s);
			// echo "file: ".$s."<br>";
foreach ($ww as $en => $in) {
	if (strpos(strtoupper($in), strtoupper($bi[1])) === 0) {
		$result = str_replace($bi[1],$en,$s);
	}
}
return strtoupper($result);
}
}

