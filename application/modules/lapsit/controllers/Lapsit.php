<?php defined("BASEPATH") OR exit("No direct script access allowed");

require('./application/third_party/dompdf/autoload.inc.php');

use Dompdf\Dompdf;
use Dompdf\Options;

class Lapsit extends CI_Controller {

    function __construct() {
        parent::__construct();
		$this->load->model('Lapsit_model');
		$this->load->helper('url');
    }

    public function lapsitView() {
        if ($this->session->userdata('nip') != NULL) {
			$date = $this->input->post('inputDate', true);
			if (!(bool)$date) {
				$date = date('Y-m-d');
			} 

			// lapsit
			$x['date'] = $date;
			$x['hariTanggal'] = $this->formatHariTanggal($date);
			$tableResult = $this->renderTable($date);
			$x['satu'] = $tableResult[0];
			$x['dua'] = $tableResult[1];
			$x['tiga'] = $tableResult[2];
			$x['totalTiga'] = $tableResult[3];
			$x['empat'] = $tableResult[4];
			$x['totalEmpat'] = $tableResult[5];
			$x['totalJ'] = $tableResult[6];
			$x['grandTotal'] = $tableResult[7];

			// klb
			$klbResult = $this->renderKlb($date);
			$x['klbSatu'] = $klbResult[0];
			$x['klbDua'] = $klbResult[1];
			$x['klbTiga'] = $klbResult[2];
			$x['klbEmpat'] = $klbResult[3];

			$this->load->view('include/head');
            $this->load->view('include/top-header');
			$this->load->view('lapsit_view', $x);
            $this->load->view('include/sidebar');
            $this->load->view('include/panel');
            $this->load->view('include/footer');
        } else {
            redirect('user');
        }
	}

	private function renderTable($date) {
		// Muda JATINANGOR
		$satuJL = $this->Lapsit_model->getLapsit($date, 'Muda', 1, 'L');
		$satuJP = $this->Lapsit_model->getLapsit($date, 'Muda', 1, 'P');
		$satuJCount = $this->countData([$satuJL[0], $satuJP[0]]);
		$satuValue = $this->renderNumber(4, 10, 1, 'Muda Praja') . 
							$this->renderSatkerMen('Jatinangor', $satuJL[0]) .
							$this->renderSatkerWomen($satuJP[0]) .
							$this->renderSatkerCount($satuJCount);

		// Madya JATINANGOR
		$duaJL = $this->Lapsit_model->getLapsit($date, 'Madya', 1, 'L');
		$duaJP = $this->Lapsit_model->getLapsit($date, 'Madya', 1, 'P');
		$duaJCount = $this->countData([$duaJL[0], $duaJP[0]]);
		$duaValue = $this->renderNumber(4, 10, 2, 'Madya Praja') . 
							$this->renderSatkerMen('Jatinangor', $duaJL[0]) .
							$this->renderSatkerWomen($duaJP[0]) .
							$this->renderSatkerCount($duaJCount);
		
		// Nindya SUMATERA BARAT
		$tigaSBL = $this->Lapsit_model->getLapsit($date, 'Nindya', 5, 'L');
		$tigaSBP = $this->Lapsit_model->getLapsit($date, 'Nindya', 5, 'P');
		$tigaSBCount = $this->countData([$tigaSBL[0], $tigaSBP[0]]);

		// Nindya KALIMANTAN BARAT
		$tigaKBL = $this->Lapsit_model->getLapsit($date, 'Nindya', 6, 'L');
		$tigaKBP = $this->Lapsit_model->getLapsit($date, 'Nindya', 6, 'P');
		$tigaKBCount = $this->countData([$tigaKBL[0], $tigaKBP[0]]);

		// Nindya SULAWESI UTARA
		$tigaSUL = $this->Lapsit_model->getLapsit($date, 'Nindya', 3, 'L');
		$tigaSUP = $this->Lapsit_model->getLapsit($date, 'Nindya', 3, 'P');
		$tigaSUCount = $this->countData([$tigaSUL[0], $tigaSUP[0]]);

		// Nindya SELAWESI SELATAN
		$tigaSSL = $this->Lapsit_model->getLapsit($date, 'Nindya', 4, 'L');
		$tigaSSP = $this->Lapsit_model->getLapsit($date, 'Nindya', 4, 'P');
		$tigaSSCount = $this->countData([$tigaSSL[0], $tigaSSP[0]]);

		// Nindya NTB
		$tigaNTL = $this->Lapsit_model->getLapsit($date, 'Nindya', 7, 'L');
		$tigaNTP = $this->Lapsit_model->getLapsit($date, 'Nindya', 7, 'P');
		$tigaNTCount = $this->countData([$tigaNTL[0], $tigaNTP[0]]);

		// Nindya PAPUA
		$tigaPL = $this->Lapsit_model->getLapsit($date, 'Nindya', 8, 'L');
		$tigaPP = $this->Lapsit_model->getLapsit($date, 'Nindya', 8, 'P');
		$tigaPCount = $this->countData([$tigaPL[0], $tigaPP[0]]);
		
		$tigaValue = $this->renderNumber(19, 10, 3, 'Nindya Praja') . 
							$this->renderSatkerMen('Sumatera Barat', $tigaSBL[0]) .
							$this->renderSatkerWomen($tigaSBP[0]) .
							$this->renderSatkerCount($tigaSBCount) .

							$this->renderSatkerMen('Kalimantan Barat', $tigaKBL[0]) .
							$this->renderSatkerWomen($tigaKBP[0]) .
							$this->renderSatkerCount($tigaKBCount) .

							$this->renderSatkerMen('Sulawesi Utara', $tigaSUL[0]) .
							$this->renderSatkerWomen($tigaSUP[0]) .
							$this->renderSatkerCount($tigaSUCount) .

							$this->renderSatkerMen('Sulawesi Selatan', $tigaSSL[0]) .
							$this->renderSatkerWomen($tigaSSP[0]) .
							$this->renderSatkerCount($tigaSSCount) .

							$this->renderSatkerMen('NTB', $tigaNTL[0]) .
							$this->renderSatkerWomen($tigaNTP[0]) .
							$this->renderSatkerCount($tigaNTCount) .

							$this->renderSatkerMen('Papua', $tigaPL[0]) .
							$this->renderSatkerWomen($tigaPP[0]) .
							$this->renderSatkerCount($tigaPCount);

		// Total Nindya
		$totalNindyaData = [$tigaSBCount, $tigaKBCount, $tigaSUCount, $tigaSSCount, $tigaNTCount, $tigaPCount];
		$totalNindyaLData = [$tigaSBL[0], $tigaKBL[0], $tigaSUL[0], $tigaSSL[0], $tigaNTL[0], $tigaPL[0]];
		$totalNindyaPData = [$tigaSBP[0], $tigaKBP[0], $tigaSUP[0], $tigaSSP[0], $tigaNTP[0], $tigaPP[0]];

		$totalNindya = $this->countData($totalNindyaData);
		$totalNindyaL = $this->countData($totalNindyaLData);
		$totalNindyaP = $this->countData($totalNindyaPData);
		
		$totalTigaValue = $this->renderSatkerTotal($totalNindya, $totalNindyaL, $totalNindyaP, 3);

		// Utama JATINANGOR
		$empatJL = $this->Lapsit_model->getLapsit($date, 'Utama', 1, 'L');
		$empatJP = $this->Lapsit_model->getLapsit($date, 'Utama', 1, 'P');
		$empatJCount = $this->countData([$empatJL[0], $empatJP[0]]);

		// Utama JAKARTA
		$empatJKL = $this->Lapsit_model->getLapsit($date, 'Utama', 2, 'L');
		$empatJKP = $this->Lapsit_model->getLapsit($date, 'Utama', 2, 'P');
		$empatJKCount = $this->countData([$empatJKL[0], $empatJKP[0]]);

		$empatValue = $this->renderNumber(7, 10, 4, 'Praja Utama') . 
							$this->renderSatkerMen('Jatinangor', $empatJL[0]) .
							$this->renderSatkerWomen($empatJP[0]) .
							$this->renderSatkerCount($empatJCount) .

							$this->renderSatkerMen('Jakarta', $empatJKL[0]) .
							$this->renderSatkerWomen($empatJKP[0]) .
							$this->renderSatkerCount($empatJKCount);
		
		// Total Utama
		$totalUtamaData = [$empatJCount, $empatJKCount];
		$totalUtamaLData = [$empatJL[0], $empatJKL[0]];
		$totalUtamaPData = [$empatJP[0], $empatJKP[0]];

		$totalUtama = $this->countData($totalUtamaData);
		$totalUtamaL = $this->countData($totalUtamaLData);
		$totalUtamaP = $this->countData($totalUtamaPData);

		$totalEmpatValue = $this->renderSatkerTotal($totalUtama, $totalUtamaL, $totalUtamaP, 4);

		// Total JATINANGOR
		$totalJData = [$satuJCount, $duaJCount, $empatJCount];
		$totalJLData = [$satuJL[0], $duaJL[0], $empatJL[0]];
		$totalJPData = [$satuJP[0], $duaJP[0], $empatJP[0]];

		$totalJ = $this->countData($totalJData);
		$totalJL = $this->countData($totalJLData);
		$totalJP = $this->countData($totalJPData);
		
		$totalJValue = $this->renderGrandTotal($totalJ, $totalJL, $totalJP, 'TOTAL PRAJA IPDN KAMPUS JATINANGOR');

		// Grand Total 
		$grandTotalData = [$satuJCount, $duaJCount, $totalNindya, $totalUtama];
		$grandTotalLData = [$satuJL[0], $duaJL[0], $totalNindyaL, $totalUtamaL];
		$grandTotalPData = [$satuJP[0], $duaJP[0], $totalNindyaP, $totalUtamaP];

		$grandTotal = $this->countData($grandTotalData);
		$grandTotalL = $this->countData($grandTotalLData);
		$grandTotalP = $this->countData($grandTotalPData);
		
		$grandTotalValue = $this->renderGrandTotal($grandTotal, $grandTotalL, $grandTotalP, 'TOTAL PRAJA KESELURUHAN');

		return [
			$satuValue, 
			$duaValue, 
			$tigaValue, 
			$totalTigaValue, 
			$empatValue, 
			$totalEmpatValue, 
			$totalJValue, 
			$grandTotalValue
		];
	}

	private function renderKlb($date) {
		$satuJ = $this->Lapsit_model->getKlb($date, 'Muda', 1);
		$satuValue = $this->renderNumber(2, 2, 1, 'Muda Praja') . $this->renderNote('Jatinangor', $satuJ[0]);
		
		$duaJ = $this->Lapsit_model->getKlb($date, 'Madya', 1);
		$duaValue = $this->renderNumber(2, 2, 2, 'Madya Praja') . $this->renderNote('Jatinangor', $duaJ[0]);

		$tigaSB = $this->Lapsit_model->getKlb($date, 'Nindya', 5);
		$tigaKB = $this->Lapsit_model->getKlb($date, 'Nindya', 6);
		$tigaSU = $this->Lapsit_model->getKlb($date, 'Nindya', 3);
		$tigaSS = $this->Lapsit_model->getKlb($date, 'Nindya', 4);
		$tigaNT = $this->Lapsit_model->getKlb($date, 'Nindya', 7);
		$tigaP = $this->Lapsit_model->getKlb($date, 'Nindya', 8);
		
		$tigaValue = $this->renderNumber(7, 2, 3, 'Nindya Praja') . 
								$this->renderNote('Sumatera Barat', $tigaSB[0]) . 
								$this->renderNote('Kalimantan Barat', $tigaKB[0]) .
								$this->renderNote('Sulawesi Utara', $tigaSU[0]) .
								$this->renderNote('Sulawesi Selatan', $tigaSS[0]) . 
								$this->renderNote('NTB', $tigaNT[0]) .
								$this->renderNote('Papua', $tigaP[0]);

		$empatJ = $this->Lapsit_model->getKlb($date, 'Utama', 1);
		$empatJK = $this->Lapsit_model->getKlb($date, 'Praja Utama', 2);
		$empatValue = $this->renderNumber(3, 2, 4, 'Praja Utama') . 
								$this->renderNote('Jatinangor', $empatJ[0]) . 
								$this->renderNote('Jakarta', $empatJK[0]);

		return [$satuValue, $duaValue, $tigaValue, $empatValue];
	}

	private function renderNumber($rowspan, $colspan, $number, $romawi) {
		return '
			<tr>
				<td rowspan="' . $rowspan . '">' . $number . '</td>
				<td colspan="' . $colspan . '" class="left bold pl5">' . $romawi . '</td>
			</tr>';
	}

	private function renderSatkerMen($satker, $data) {
		return '
			<tr>
				<td rowspan="3">' . $satker . '</td>
				<td>L:</td>
				<td>' . $data['jumlah'] . '</td>
				<td>' . $data['kurang'] . '</td>
				<td>' . $data['hadir'] . '</td>
				<td>' . $data['dd'] . '</td>
				<td>' . $data['sakit']. '</td>
				<td>' . $data['izin'] . '</td>
				<td>' . $data['isolasi'] . '</td>
				<td>' . $data['tk'] . '</td>
			</tr>';
	}

	private function renderSatkerWomen($data) {
		return '
			<tr>
				<td>P:</td>
				<td>' . $data['jumlah'] . '</td>
				<td>' . $data['kurang'] . '</td>
				<td>' . $data['hadir'] . '</td>
				<td>' . $data['dd'] . '</td>
				<td>' . $data['sakit']. '</td>
				<td>' . $data['izin'] . '</td>
				<td>' . $data['isolasi'] . '</td>
				<td>' . $data['tk'] . '</td>
			</tr>';
	}

	private function renderSatkerCount($data) {
		return '
			<tr class="font-weight-bold bg-light">
				<td colspan="2">' . $data['jumlah'] . '</td>
				<td>' . $data['kurang'] . '</td>
				<td>' . $data['hadir'] . '</td>
				<td>' . $data['dd'] . '</td>
				<td>' . $data['sakit']. '</td>
				<td>' . $data['izin'] . '</td>
				<td>' . $data['isolasi'] . '</td>
				<td>' . $data['tk'] . '</td>
			</tr>';
	}

	private function renderSatkerTotal($count, $countL, $countP, $number) {
		return '
			<tr class="bg-light">
				<td rowspan="3" colspan="2">TOTAL NOMOR '. $number . '</td>
				<td>L:</td>
				<td>' . $countL['jumlah'] . '</td>
				<td rowspan="3">' . $count['kurang'] . '</td>
				<td rowspan="3">' . $count['hadir'] . '</td>
				<td rowspan="3">' . $count['dd'] . '</td>
				<td rowspan="3">' . $count['sakit'] . '</td>
				<td rowspan="3">' . $count['izin'] . '</td>
				<td rowspan="3">' . $count['isolasi'] . '</td>
				<td rowspan="3">' . $count['tk'] . '</td>
			</tr>
			<tr class="bg-light">
				<td>P:</td>
				<td>' . $countP['jumlah'] . '</td>
			</tr>
			<tr class="bg-light">
				<td colspan="2">' . $count['jumlah'] . '</td>
			</tr>';
	}

	private function renderGrandTotal($GT, $GTL, $GTP, $title) {
		return '				
			<tr class="font-weight-bold bg-light">
				<td colspan="2">' . $title . '</td>
				<td colspan="2">' . $GT['jumlah'] . '</td>
				<td>L:</td>
				<td colspan="2">' . $GTL['jumlah'] . '</td>
				<td>P:</td>
				<td colspan="3">' . $GTP['jumlah'] . '</td>
			</tr>';
	}

	private function renderNote($satker, $note) {
		$noteSplit = preg_split('/\r\n|\r|\n/', $note['keterangan']);
		$noteList = '';
		foreach($noteSplit as $value) {
			$noteList .="<p>$value</p>";
		}

		return '
			<tr>
				<td class="center text-center">' . $satker . '</td>
				<td class="left p25">' . $noteList . '</td>
			</tr>';
	}

	private function countData($data) {
		$countedData = [];

		foreach ($data as $key => $subArray) {
			foreach ($subArray as $id => $value) {
				array_key_exists( $id, $countedData ) ? $countedData[$id] += $value : $countedData[$id] = $value;
			}
		}

		return $countedData;
	}

	private function formatHariTanggal($date) {
		$hariArray = [
			'Minggu',
			'Senin',
			'Selasa',
			'Rabu',
			'Kamis',
			'Jumat',
			'Sabtu'
		];
		$hr = date('w', strtotime($date));
		$hari = $hariArray[$hr];
		$tanggal = date('j', strtotime($date));
		$bulanArray = [
			1 => 'Januari',
			2 => 'Februari',
			3 => 'Maret',
			4 => 'April',
			5 => 'Mei',
			6 => 'Juni',
			7 => 'Juli',
			8 => 'Agustus',
			9 => 'September',
			10 => 'Oktober',
			11 => 'November',
			12 => 'Desember',
		];
		$bl = date('n', strtotime($date));
		$bulan = $bulanArray[$bl];
		$tahun = date('Y', strtotime($date));
		return "$hari, $tanggal $bulan $tahun";
	}

	public function exportToPdf() {
		$date = $this->input->post('exportDate', true);
		if (!(bool)$date) {
			$date = date('Y-m-d');
		} 

		$hariTanggal = $this->formatHariTanggal($date);
		$tableResult = $this->renderTable($date);
		$klbResult = $this->renderKlb($date);

		$html = '
			<!DOCTYPE html>
			<html lang="en">
			<head>
				<meta charset="UTF-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<title>Daily Report</title>
				<style>
					table, tr, th, td {
						border-collapse: collapse;
						border: 1px solid #000000;
					}
					table {
						width: 100%;
						font-size: 12px;
					}
					th, td {
						text-align: center;
						vertical-align: middle;
						padding: 1px;
					}
					th, td[colspan="10"], .font-weight-bold, .bold {
						font-weight: 700;
					}
					td[colspan="10"], .left {
						text-align: left;
					}
					.bg-light {
						background-color: #f2f3f4;
					}
					.center {
						text-align: center;
					}
					.font16 {
						font-size: 16px;
					}
					.font14 {
						font-size: 14px;
					}
					.font12 {
						font-size: 12px;
					}
					.pl5 {
						padding-left: 5px;
					}
					.p25 {
						padding: 2px 5px;
					}
					.letter-head {
						border-bottom: 4px solid #000000;
						margin-bottom: 2px;
						padding-bottom: 4px;
					}
					p {
						margin: 1px;
					}
					.logo {
						position: fixed;
						top: -20px;
						left: 0;
					}
					img {
						width: 120px;
					}
					.day-date {
						margin-bottom: 20px;
						padding-top: 20px;
						border-top: 1px solid #000000;
					}
					.page-break {
						page-break-before: always;
					}
					.signature {
						margin-top: 40px;
						float: right;
					}
					.city {
						margin-bottom: 100px;
					}
				</style>
			</head>
			<body>
				<div class="content">
					<div class="letter-head">
						<div class="logo">
							<img src="https://upload.wikimedia.org/wikipedia/commons/5/56/Lambang_IPDN.png" alt="Logo IPDN">
						</div>
						<div class="center">
							<p class="bold font14">KEMENTRIAN DALAM NEGERI</p>
							<p class="bold font14">REPUBLIK INDONESIA</p>
							<p class="bold font16">INSTITUT PEMERINTAHAN DALAM NEGERI</p>
							<p class="font12">Jl Ir. Soekarno KM 20 Jatinangor - Sumedang, Jawa Barat 45363</p>
							<p class="font12">Tlp. 0-804-1-700-700, Fax 0-804-1-700-700, Website: https://ipdn.ac.id</p>
						</div>
					</div>
					<div class="day-date">
						<p class="center bold">LAPORAN SITUASI HARIAN</p>
						<p class="center bold">SATUAN MANGGALA PRAJA</p>
						<p class="center font14">' . $hariTanggal . '</p>
					</div>
					<p class="bold">I.	Rekapitulasi Kekuatan Apel</p>
					<br>
					<table>
					
						<thead>
							<tr>
								<th rowspan="2">NO</th>
								<th rowspan="2">SATKER</th>
								<th rowspan="2" colspan="2">JUMLAH</th>
								<th rowspan="2">KURANG</th>
								<th rowspan="2">HADIR</th>
								<th colspan="5">KETERANGAN</th>
							</tr>
							<tr>
								<th>DD</th>
								<th>SAKIT</th>
								<th>IZIN</th>
								<th>ISOL</th>
								<th>TK</th>
							</tr>
						</thead>
						<tbody>' . $tableResult[0] .'</tbody>
						<tbody>' . $tableResult[1] .'</tbody>
						<tbody>' . $tableResult[2] .'</tbody>
						<tbody>' . $tableResult[3] .'</tbody>
						<tbody>' . $tableResult[4] .'</tbody>
						<tbody>' . $tableResult[5] .'</tbody>
						<tbody>' . $tableResult[6] .'</tbody>
						<tbody>' . $tableResult[7] .'</tbody>
					</table>
					<div class="page-break"></div>
					<p class="bold">II.	Hal-hal Menonjol</p>
					<br>
					<table>
						<thead>
							<tr class="bg-light">
								<th height="25">NO</th>
								<th>OBJEK</th>
								<th>KETERANGAN</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="3" class="left bold pl5">SATUAN PRAJA</td>
							</tr>
						</tbody>
						<tbody>' . $klbResult[0] .'</tbody>
						<tbody>' . $klbResult[1] .'</tbody>
						<tbody>' . $klbResult[2] .'</tbody>
						<tbody>' . $klbResult[3] .'</tbody>
					</table>
					<div class="signature">
						<p class="city">Kepala Satuan Manggala,</p>
						<p>Drs. Dody Marsidy, M.Hum, CFrA</p>
						<p>Brigadir Jenderal Polisi</p>
					</div>
				</div>
			</body>
			</html>';

		$filename = 'Laporan Harian' . explode(',', $hariTanggal)[1];
		$options = new Options();
		$options->set('isRemoteEnabled', true);
		$dompdf = new Dompdf($options);
		$dompdf->loadHtml($html);
		$dompdf->setPaper('A4', 'portrait');
		$dompdf->render();
		$dompdf->stream($filename);
	}
}