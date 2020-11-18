<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kepegawaian extends CI_Controller{
     function __construct(){
          parent::__construct();
          $this->load->model('kepegawaian_model');
     }

     // PNS
     function index()
     {
          if($_SESSION['nip'])
          {
               $data = $this->kepegawaian_model->get_all_pns()->result();
               $tp = $this->kepegawaian_model->get_pendidikan();

               $x['data'] = $data;
               $x['tp'] = $tp;
          
               $this->load->view("include/head");
               $this->load->view("include/top-header");
               $this->load->view('view_pns', $x);
               $this->load->view("include/sidebar");
               $this->load->view("include/panel");
               $this->load->view("include/footer");
          }else{
               redirect("user");
          }
     }

     public function tambah_pns()
	{		
          // USIA
          $tanggal = new DateTime($this->input->post('tanggal_lahir', true));
          $today = new DateTime('today');
          $y = $today->diff($tanggal)->y;
          $m = $today->diff($tanggal)->m;
          $usia = $y . " Thn " . $m . " Bln";
          //END USIA

          $thn = $this->input->post('thn', true);
          $bln = $this->input->post('bln', true);
          $masa_kerja = $thn . " Thn " . $bln . " Bln";

          $nip = str_replace(' ', '', $this->input->post('nip', true));

          $input_data['nip'] = $nip;
          $input_data['nama_lengkap'] = $this->input->post('nama_lengkap', true);
          $input_data['bagian'] = $this->input->post('bagian', true);
          $input_data['tempat_lahir'] = $this->input->post('tempat_lahir', true);
          $input_data['tanggal_lahir'] = $this->input->post('tanggal_lahir', true);
          $input_data['no_urut_pangkat'] = $this->input->post('no_urut_pangkat', true);
          $input_data['pangkat'] = $this->input->post('pangkat', true);
          $input_data['gol_ruang'] = $this->input->post('gol_ruang', true);
          $input_data['tmt_pangkat'] = $this->input->post('tmt_pangkat', true);
          $input_data['jabatan'] = $this->input->post('jabatan', true);
          $input_data['tmt_jabatan'] = $this->input->post('tmt_jabatan', true);
          $input_data['jurusan'] = $this->input->post('jurusan', true);
          $input_data['nama_pt'] = $this->input->post('nama_pt', true);
          $input_data['tahun_lulus'] = $this->input->post('tahun_lulus', true);
          $input_data['tingkat_pendidikan'] = $this->input->post('tingkat_pendidikan', true);
          $input_data['usia'] = $usia;
          $input_data['masa_kerja'] = $masa_kerja;
          $input_data['catatan_mutasi'] = $this->input->post('catatan_mutasi', true);
          $input_data['no_kapreg'] = $this->input->post('no_kapreg', true);

          $cek_peg = $this->kepegawaian_model->cek_pegawai($input_data['nip']);
        
          if(!$cek_peg){
               $result = $this->kepegawaian_model->tambah_pns($input_data);
          }else{
               $this->session->set_flashdata('pns', 'NIP PEGAWAI SUDAH TERDAFTAR.');
               $x['alert'] = 'ada';			
               redirect('kepegawaian',$x);
          }


          if (!$result) { 							
               $this->session->set_flashdata('pns', 'DATA PNS GAGAL DITAMBAHKAN.'); 				
               redirect('kepegawaian'); 			
          } else { 								
               $this->session->set_flashdata('pns', 'DATA PNS BERHASIL DITAMBAHKAN.');			
               redirect('kepegawaian'); 			
          }
    }

     public function edit_pns()
     {
          // USIA
          $tanggal = new DateTime($this->input->post('tanggal_lahir', true));
          $today = new DateTime('today');
          $y = $today->diff($tanggal)->y;
          $m = $today->diff($tanggal)->m;
          $usia = $y . " Thn " . $m . " Bln";
          //END USIA

          $nip = str_replace(' ', '', $this->input->post('nip', true));

          $input_data['no'] = $this->input->post('no', true);
          $input_data['nip'] = $nip;
          $input_data['nama_lengkap'] = $this->input->post('nama_lengkap', true);
          $input_data['bagian'] = $this->input->post('bagian', true);
          $input_data['tempat_lahir'] = $this->input->post('tempat_lahir', true);
          $input_data['tanggal_lahir'] = $this->input->post('tanggal_lahir', true);
          $input_data['no_urut_pangkat'] = $this->input->post('no_urut_pangkat', true);
          $input_data['pangkat'] = $this->input->post('pangkat', true);
          $input_data['gol_ruang'] = $this->input->post('gol_ruang', true);
          $input_data['tmt_pangkat'] = $this->input->post('tmt_pangkat', true);
          $input_data['jabatan'] = $this->input->post('jabatan', true);
          $input_data['tmt_jabatan'] = $this->input->post('tmt_jabatan', true);
          $input_data['jurusan'] = $this->input->post('jurusan', true);
          $input_data['nama_pt'] = $this->input->post('nama_pt', true);
          $input_data['tahun_lulus'] = $this->input->post('tahun_lulus', true);
          $input_data['tingkat_pendidikan'] = $this->input->post('tingkat_pendidikan', true);
          $input_data['usia'] = $usia;
          $input_data['masa_kerja'] = $this->input->post('masa_kerja', true);
          $input_data['catatan_mutasi'] = $this->input->post('catatan_mutasi', true);
          $input_data['no_kapreg'] = $this->input->post('no_kapreg', true);

          $cek_peg = $this->kepegawaian_model->cek_pegawai($input_data['nip']);
        
          if(!$cek_peg){
               $result = $this->kepegawaian_model->edit_pns($input_data);
          }else{
               $this->session->set_flashdata('pns', 'NIP PEGAWAI SUDAH TERDAFTAR.');
               $x['alert'] = 'ada';			
               redirect('kepegawaian',$x);
          }

          if (!$result) { 							
               $this->session->set_flashdata('pns', 'DATA PNS GAGAL DIUBAH.');		
               redirect('kepegawaian'); 			
          } else { 								
               $this->session->set_flashdata('pns', 'DATA PNS BERHASIL DIUBAH.');			
               redirect('kepegawaian'); 			
          }
     }

     function hapus_pns()
     {
          $nip = $this->input->post('nip');
          $this->kepegawaian_model->hapus_pns($nip);
          redirect('kepegawaian');
     }
     //END PNS

     // THL
     function thl()
     {
          if($_SESSION['nip'])
          {
               $data = $this->kepegawaian_model->get_all_thl()->result();
               $tp = $this->kepegawaian_model->get_pendidikan();

               $x['data'] = $data;
               $x['tp'] = $tp;
          
               $this->load->view("include/head");
               $this->load->view("include/top-header");
               $this->load->view('view_thl', $x);
               $this->load->view("include/sidebar");
               $this->load->view("include/panel");
               $this->load->view("include/footer");
          }else{
               redirect("user");
          }
     }

     public function tambah_thl()
	{		
          $input_data['nama'] = $this->input->post('nama', true);
          $input_data['tempat_lahir'] = $this->input->post('tempat_lahir', true);
          $input_data['tanggal_lahir'] = $this->input->post('tanggal_lahir', true);
          $input_data['dik'] = $this->input->post('dik', true);
          $input_data['penugasan'] = $this->input->post('penugasan', true);

          $result = $this->kepegawaian_model->tambah_thl($input_data);

          if (!$result) { 							
               $this->session->set_flashdata('thl', 'DATA THL GAGAL DITAMBAHKAN.'); 				
               redirect('kepegawaian/thl'); 			
          } else { 								
               $this->session->set_flashdata('thl', 'DATA THL BERHASIL DITAMBAHKAN.');			
               redirect('kepegawaian/thl'); 			
          }
    }

     public function edit_thl()
     {
          $input_data['id_thl'] = $this->input->post('id_thl', true);
          $input_data['nama'] = $this->input->post('nama', true);
          $input_data['tempat_lahir'] = $this->input->post('tempat_lahir', true);
          $input_data['tanggal_lahir'] = $this->input->post('tanggal_lahir', true);
          $input_data['dik'] = $this->input->post('dik', true);
          $input_data['penugasan'] = $this->input->post('penugasan', true);

          $result = $this->kepegawaian_model->edit_thl($input_data);

          if (!$result) { 							
               $this->session->set_flashdata('thl', 'DATA THL GAGAL DIUBAH.');		
               redirect('kepegawaian/thl'); 			
          } else { 								
               $this->session->set_flashdata('thl', 'DATA THL BERHASIL DIUBAH.');			
               redirect('kepegawaian/thl'); 			
          }
     }

     function hapus_thl()
     {
          $id_thl = $this->input->post('id_thl');
          $this->kepegawaian_model->hapus_thl($id_thl);
          redirect('kepegawaian/thl');
     }
     // END THL
}