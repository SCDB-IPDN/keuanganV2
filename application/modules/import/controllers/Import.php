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


       // kurikulum

     public function view_kurkum(){
        $x['prodi'] = $this->import_model->getprodi();
    
        $this->load->view("include/head");
        $this->load->view("include/top-header");
        $this->load->view('kurikulum',$x);
        $this->load->view("include/sidebar");
        $this->load->view("include/panel");
        $this->load->view("include/footer");
    }

    public function kurkum_pamong($data){
        $x['kode_prodi'] = $data;
        
        $x['getkurkum'] = $this->import_model->getkurkum($data);

        $ho = $this->import_model->getkurkum($data);
        $x['ho'] = json_encode($ho);

        
        $this->load->view("include/head");
        $this->load->view("include/top-header");
        $this->load->view('kurikulum', $x);
        $this->load->view("include/sidebar");
        $this->load->view("include/panel");
        $this->load->view("include/footer");
    }



    public function kurkum_matkul(){
        $x['getkurkum'] = $this->uri->segment(4);
        $x['getprodi'] = $this->uri->segment(3);

        // var_dump($this->uri->segment(4));exit;
        $this->load->view("include/head");
        $this->load->view("include/top-header");
        $this->load->view('kurikulum',$x);
        $this->load->view("include/sidebar");
        $this->load->view("include/panel");
        $this->load->view("include/footer");
    }

    public function uploadkurkum()
    {        
        $nama_kurikulum = $this->input->post('getkurkum');
        var_dump($nama_kurikulum);exit;
        
        $file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        if(isset($_FILES['kurkum']['name']) && in_array($_FILES['kurkum']['type'], $file_mimes)) {

            $arr_file = explode('.', $_FILES['kurkum']['name']);
            $extension = end($arr_file);

            if($extension != 'xlsx') {
                $this->session->set_flashdata('kurkum_matkul', '<div class="alert alert-success"><b>PROSES IMPORT DATA GAGAL!</b> Format file yang anda masukkan salah!</div>');

                redirect("import/kurkum_pamong/kurkum_matkul/$nama_kurikulum"); 
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }

            $loadexcel  = $reader->load($_FILES['kurkum']['tmp_name']);
            $list_sheet = $loadexcel->getSheetNames();
            $sheetData = $loadexcel->getSheetByName($list_sheet[0])->toArray(null, true, true ,true);

            $data = array();
            $numrow = 0;

            foreach($sheetData as $row){
                if($numrow > 0){
                    
                    if($row['A'] != NULL){             
                        array_push($data, array(
                            'kode_mk'                  => $row['A'],
                            'nama_mk'                  => $row['B'],
                            'jenis_mk'                 => $row['C'],
                            'sks_tatapmuka'            => $row['D'],
                            'sks_praktek'              => $row['E'],
                            'sks_lapangan'             => $row['F'],
                            'sks_simulasi'             => $row['G'],
                            'tgl_mulai_efektif'        => $row['H'],
                            'tgl_akhir_efektif'        => $row['I'],
                            'semester'                 => $row['J'],
                            'nama_kurikulum'           => $nama_kurikulum
                        ));
                    }
                }
               $numrow++;
            }

            if($this->import_model->kurkum_matkul('tbl_kurkum_matkul', $data)){
                redirect('import/kurkum_pamong/kurkum_matkul/'.$nama_kurikulum);
            }else{
                redirect('import/kurkum_pamong/kurkum_matkul/'.$nama_kurikulum);
            }
        }
    }

    public function datakurkum($data){
        $data = $this->import_model->getkurkum($data);
        $hasil = array();

        foreach($data as $r){


            $nama_kurikulum ="<a href='../kurkum_matkul/$r->prodi/$r->nama_kurikulum'></i>$r->nama_kurikulum</a>";
            $mulai_kurikulum = $r->mulai_kurikulum == NULL ? "<i><font>Tidak ada data</font></i>": $r->mulai_kurikulum;
            $lulus = $r->lulus == NULL ? "<i><font>Tidak ada data</font></i>": $r->lulus;
            $wajib = $r->wajib == NULL ? "<i><font>Tidak ada data</font></i>": $r->wajib;
            $pilihan = $r->pilihan == NULL ? "<i><font>Tidak ada data</font></i>": $r->pilihan;

            if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'SuperAdmin' || $this->session->userdata('role') == 'Akademik'){
				$opsi = "<a 
				href='javascript:;' data-nama_kurikulum='$r->nama_kurikulum' data-mulai_kurikulum='$r->mulai_kurikulum' 
                data-lulus='$r->lulus' data-wajib='$r->wajib' data-pilihan='$r->pilihan'
				data-toggle='modal' data-target='#edit-data' class='btn btn-info'><i class='fa fas fa-edit'></i>
				</a>

				<a 
				href='javascript:;' data-nama_kurikulum='$r->nama_kurikulum'
				data-toggle='modal' data-target='#hapus-kurikulum' class='btn btn-danger'><i class='fa fas fa-trash'></i>
				</a>";
			}else{
				$opsi = "";
			}
        
            $hasil[] = array(
                $nama_kurikulum,
                $mulai_kurikulum,
                $lulus,
                $wajib,
                $pilihan,
                $opsi
            );
        }
        
        echo json_encode($hasil);
    }


    public function datamatkulkurum(){
        $prod = $this->uri->segment(3);
        $mat = $this->uri->segment(4);

        $data = $this->import_model->getmatkulkurkum($prod,$mat);
        // var_dump($data);exit;
        $hasil = array();

        foreach($data as $r){

            
            $kode_mk = $r->kode_mk == NULL ? "<i><font>Tidak ada data</font></i>": $r->kode_mk;
            $nama_mk = $r->nama_mk == NULL ? "<i><font>Tidak ada data</font></i>": $r->nama_mk;
            $jenis_mk = $r->jenis_mk == NULL ? "<i><font>Tidak ada data</font></i>": $r->jenis_mk;
            $sks_tatapmuka = $r->sks_tatapmuka == NULL ? "<i><font>Tidak ada data</font></i>": $r->sks_tatapmuka;
            $sks_praktek = $r->sks_praktek == NULL ? "<i><font>Tidak ada data</font></i>": $r->sks_praktek;
            $sks_lapangan = $r->sks_lapangan == NULL ? "<i><font>Tidak ada data</font></i>": $r->sks_lapangan;
            $sks_simulasi = $r->sks_simulasi == NULL ? "<i><font>Tidak ada data</font></i>": $r->sks_simulasi;
            $tgl_mulai_efektif = $r->tgl_mulai_efektif == NULL ? "<i><font>Tidak ada data</font></i>": $r->tgl_mulai_efektif;
            $tgl_akhir_efektif = $r->tgl_akhir_efektif == NULL ? "<i><font>Tidak ada data</font></i>": $r->tgl_akhir_efektif;
            $semester = $r->semester == NULL ? "<i><font>Tidak ada data</font></i>": $r->semester;
            $nama_kurikulum = $r->nama_kurikulum == NULL ? "<i><font>Tidak ada data</font></i>": $r->nama_kurikulum;
            

            if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'SuperAdmin' || $this->session->userdata('role') == 'Akademik'){
				$opsi = "<a 
				href='javascript:;' data-kode_mk='$r->kode_mk' data-nama_mk='$r->nama_mk' 
                data-jenis_mk='$r->jenis_mk' data-sks_tatapmuka='$r->sks_tatapmuka' data-sks_praktek='$r->sks_praktek'
                data-sks_praktek='$r->sks_lapangan' data-sks_praktek='$r->sks_simulasi' data-sks_praktek='$r->tgl_mulai_efektif' 
                data-tgl_akhir_efektif='$r->tgl_akhir_efektif' data-semester='$r->semester'  data-nama_kurikulum='$r->nama_kurikulum'
				data-toggle='modal' data-target='#edit-data' class='btn btn-info'><i class='fa fas fa-edit'></i>
				</a>

				<a 
				href='javascript:;' data-kode_mk='$r->kode_mk'
				data-toggle='modal' data-target='#hapusmatkul' class='btn btn-danger'><i class='fa fas fa-trash'></i>
				</a>";
			}else{
				$opsi = "";
			}
        
            $hasil[] = array(
                $kode_mk ,
                $nama_mk ,
                $jenis_mk ,
                $sks_tatapmuka ,
                $sks_praktek,
                $sks_lapangan,
                $sks_simulasi ,
                $tgl_mulai_efektif,
                $tgl_akhir_efektif,
                $semester,
                $nama_kurikulum,
                $opsi
            );
        }
        
        echo json_encode($hasil);
    }

    function tambahkurikulum(){

		$input_data['nama_kurikulum'] = $this->input->post('nama_kurikulum', true);
		$input_data['mulai_kurikulum'] = $this->input->post('mulai_kurikulum', true);
		$input_data['lulus'] = $this->input->post('prodi', true);
		$input_data['wajib'] = $this->input->post('fakultas', true);
		$input_data['pilihan'] = $this->input->post('sks', true);
		$input_data['prodi'] = $this->input->post('semester', true);
		
		$cekdata = $this->import_model->cekdata($input_data['nama_kurikulum']);
		if(!$cekdata){
			$result = $this->import_model->cekdata($input_data);
		}else{

			$this->session->set_flashdata('matkul', 'NAMA KURIKULUM SUDAH TERDAFTAR!!');
			$x['alert'] = 'ada';			
			redirect('import/kurikulum',$x);
		}

		$result = $this->import_model->tambahkurikulum($input_data);

		if (!$result) { 							
			$this->session->set_flashdata('matkul', 'DATA MATAKULIAH GAGAL DITAMBAHKAN!!');		
			redirect('import/kurikulum'); 			
		} else { 								
			$this->session->set_flashdata('matkul', 'DATA MATAKULIAH BERHASIL DITAMBAHKAN.');			
			redirect('import/kurikulum'); 			
		}
	}

    function ubahkurikulum(){

	
		$ubahkurkum['nama_kurikulum'] = $this->input->post('nama_kurikulum', true);
		$ubahkurkum['mulai_kurikulum'] = $this->input->post('mulai_kurikulum', true);
		$ubahkurkum['lulus'] = $this->input->post('prodi', true);
		$ubahkurkum['wajib'] = $this->input->post('fakultas', true);
		$ubahkurkum['pilihan'] = $this->input->post('sks', true);
		$ubahkurkum['prodi'] = $this->input->post('semester', true);
		
		
		$result = $this->import_model->ubah_kurikulum($ubahkurkum);

		if (!$result) { 							
			$this->session->set_flashdata('matkul', 'DATA MATAKULIAH GAGAL DIUBAH.');		
			redirect('import/kurikulum'); 			
		} else { 								
			$this->session->set_flashdata('matkul', 'DATA MATAKULIAH BERHASIL DIUBAH.');			
			redirect('import/kurikulum'); 			
		}
	}

    function hapuskurikulum()
	{
		$nama_kurikulum = $this->input->post('nama_kurikulum');

		$hasil = $this->import_model->del_kurikulum($nama_kurikulum);

		if (!$hasil) { 							
			$this->session->set_flashdata('matkul', 'DATA KURIKULUM GAGAL DIHAPUS.');				
			redirect('import/kurikulum'); 			
		} else { 								
			$this->session->set_flashdata('matkul', 'DATA KURIKULUM BERHASIL DIHAPUS.');	
			redirect('import/kurikulum'); 			
		}
		
	}



   


}