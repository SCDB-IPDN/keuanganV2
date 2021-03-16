<?php defined("BASEPATH") OR exit("No direct script access allowed");

class Praja extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Praja_model');
    }

    public function index() {
      if($this->session->userdata('nip') != NULL) {     
        
        $prov = $this->Praja_model->get_provinsi()->result();
        $x['prov'] = $prov;
        // var_dump($prov);exit;

          $this->load->view("include/head");
          $this->load->view("include/top-header");
          $this->load->view('view_praja');
          $this->load->view("include/sidebar");
          $this->load->view("include/panel");
          $this->load->view("include/footer");
      } else {
           redirect("user");
      }
    }

    public function angkat() {
      $tmt_list = $this->Praja_model->get_angkatan();
      $tmt = [];
      foreach($tmt_list as $t) {
        $tmt[] =  $t['angkatan'];
      }
      echo json_encode($tmt);
    }

    function get_praja(){
      // $data = $this->D_praja_model->get_praja()->result();
      $data = $this->Praja_model->get_table()->result();
      // var_dump($data);exit;
      $x['data'] = $data;
      $dataall = array();
  
      $no = 1;
      foreach($data as $r) {
        $id = $r->id;
        $npp = $r->npp;
        $nama = $r->nama;
        $jk = $r->jk;
        $tmpt_lahir = $r->tmpt_lahir;
        $tgl_lahir = $r->tgl_lahir;
        $nisn = $r->nisn;
        $npwp = $r->npwp;
        $no_spcp = $r->no_spcp;
        $nik_praja = $r->nik_praja;
        $agama = $r->agama;
        $alamat = $r->alamat;
        $rt = $r->rt;
        $rw = $r->rw;
        $provinsi = $r->provinsi;
        $kab_kota = $r->kab_kota;
        $kelurahan = $r->kelurahan;
        $nama_dusun = $r->nama_dusun;
        $kecamatan = $r->kecamatan;
        $kode_pos = $r->kode_pos;
        $jenis_tinggal = $r->jenis_tinggal;
        $tlp_pribadi = $r->tlp_pribadi;
        $tlp_rumah = $r->tlp_rumah;
        $email = $r->email;
        $tingkat = $r->tingkat;
        $angkatan = $r->angkatan;
        $status = $r->status;
        $fakultas = $r->fakultas;
        $prodi = $r->prodi;
        $kewarganegaraan = $r->kewarganegaraan;
        $jenis_pendaftaran = $r->jenis_pendaftaran;
        $tgl_masuk_kuliah = $r->tgl_masuk_kuliah;
        $tahun_masuk_kuliah = $r->tahun_masuk_kuliah;
        $pembiayaan = $r->pembiayaan;
        $alat_transport = $r->alat_transport;
        $biaya_masuk = $r->biaya_masuk;
        $jalur_masuk = $r->jalur_masuk;
        $penerima_pks = $r->penerima_pks;
        $no_pks = $r->no_pks;
        $mulai_semester = $r->mulai_semester;
  
        $nik_ayah = $r->nik_ayah;
        $nama_ayah = $r->nama_ayah;
        $tgllahir_ayah = $r->tgllahir_ayah;
        $pendidikan_ayah = $r->pendidikan_ayah;
        $pekerjaan_ayah = $r->pekerjaan_ayah;
        $penghasilan_ayah = $r->penghasilan_ayah;
        $tlp_ayah = $r->tlp_ayah;
        $nik_ibu = $r->nik_ibu;
        $nama_ibu = $r->nama_ibu;
        $tgllahir_ibu = $r->tgllahir_ibu;
        $pendidikan_ibu = $r->pendidikan_ibu;
        $pekerjaan_ibu = $r->pekerjaan_ibu;
        $penghasilan_ibu = $r->penghasilan_ibu;
        $tlp_ibu = $r->tlp_ibu;
  
        $nik_wali = $r->nik_wali;
        $nama_wali = $r->nama_wali;
        $tgllahir_wali = $r->tgllahir_wali;
        $pendidikan_wali = $r->pendidikan_wali;
        $pekerjaan_wali = $r->pekerjaan_wali;
        $penghasilan_wali = $r->penghasilan_wali;
        $tlp_wali = $r->tlp_wali;
  
        if($this->session->userdata('role') == 'Admin' ||  $this->session->userdata('role') == 'SuperAdmin' || $this->session->userdata('role') == 'Keprajaan'){

          $opsi = "<a 
          href='javascript:;' 
          data-id='$r->id' 
          data-nama='$r->nama' 
          data-npp='$r->npp' 
          data-jk='$r->jk' 
          data-tmpt_lahir='$r->tmpt_lahir' 
          data-tgl_lahir='$r->tgl_lahir' 
          data-nisn='$r->nisn' 
          data-npwp='$r->npwp' 
          data-no_spcp='$r->no_spcp' 
          data-nik_praja='$r->nik_praja' 
          data-agama='$r->agama' 
          data-alamat='$r->alamat'
          data-rt='$r->rt'
          data-rw='$r->rw'
          data-provinsi='$r->provinsi'
          data-kab_kota='$r->kab_kota'
          data-kelurahan='$r->kelurahan'
          data-nama_dusun='$r->nama_dusun'
          data-kecamatan='$r->kecamatan'
          data-kode_pos='$r->kode_pos'
          data-jenis_tinggal='$r->jenis_tinggal'
          data-tlp_pribadi='$r->tlp_pribadi'
          data-tlp_rumah='$r->tlp_rumah'
          data-email='$r->email'
          data-tingkat='$r->tingkat'
          data-angkatan='$r->angkatan'
          data-status='$r->status'
          data-fakultas='$r->fakultas''
          data-prodi='$r->prodi'
          data-kewarganegaraan='$r->kewarganegaraan'
          data-jenis_pendaftaran='$r->jenis_pendaftaran'
          data-tgl_masuk_kuliah='$r->tgl_masuk_kuliah'
          data-tahun_masuk_kuliah='$r->tahun_masuk_kuliah'
          data-pembiayaan='$r->pembiayaan'
          data-alat_transport='$r->alat_transport'
          data-biaya_masuk ='$r->biaya_masuk'
          data-jalur_masuk='$r->jalur_masuk'
          data-penerima_pks='$r->penerima_pks'
          data-no_pks='$r->no_pks'
          data-mulai_semester='$r->mulai_semester'
  
          data-nik_ayah='$r->nik_ayah'
          data-nama_ayah='$r->nama_ayah'
          data-tgllahir_ayah='$r->tgllahir_ayah'
          data-pendidikan_ayah='$r->pendidikan_ayah'
          data-pekerjaan_ayah='$r->pekerjaan_ayah'
          data-penghasilan_ayah='$r->penghasilan_ayah'
          data-tlp_ayah='$r->tlp_ayah'
          data-nik_ibu='$r->nik_ibu'
          data-nama_ibu='$r->nama_ibu'
          data-tgllahir_ibu='$r->tgllahir_ibu'
          data-pendidikan_ibu='$r->pendidikan_ibu'
          data-pekerjaan_ibu='$r->pekerjaan_ibu'
          data-penghasilan_ibu='$r->penghasilan_ibu'
          data-tlp_ibu='$r->tlp_ibu'
  
          data-nik_wali='$r->nik_wali'
          data-nama_wali='$r->nama_wali'
          data-tgllahir_wali='$r->tgllahir_wali'
          data-pendidikan_wali='$r->pendidikan_wali'
          data-pekerjaan_wali='$r->pekerjaan_wali'
          data-penghasilan_wali='$r->penghasilan_wali'
          data-tlp_wali='$r->tlp_wali'
  
  
          data-toggle='modal' data-target='#show-data' class='btn btn-success'><i class='fa fas fa-eye'></i>
          </a> 
  
          <a 
          href='javascript:;' 
          data-id='$r->id' 
          data-nama='$r->nama' 
          data-npp='$r->npp' 
          data-jk='$r->jk' 
          data-tmpt_lahir='$r->tmpt_lahir' 
          data-tgl_lahir='$r->tgl_lahir' 
          data-nisn='$r->nisn' 
          data-npwp='$r->npwp' 
          data-no_spcp='$r->no_spcp' 
          data-nik_praja='$r->nik_praja' 
          data-agama='$r->agama'   
          data-alamat='$r->alamat'
          data-rt='$r->rt'
          data-rw='$r->rw'
          data-provinsi='$r->provinsi'
          data-kab_kota='$r->kab_kota'
          data-kelurahan='$r->kelurahan'
          data-nama_dusun='$r->nama_dusun'
          data-kecamatan='$r->kecamatan'
          data-kode_pos='$r->kode_pos'
          data-jenis_tinggal='$r->jenis_tinggal'
          data-tlp_pribadi='$r->tlp_pribadi'
          data-tlp_rumah='$r->tlp_rumah'
          data-email='$r->email'
          data-tingkat='$r->tingkat'
          data-angkatan='$r->angkatan'
          data-status='$r->status'
          data-fakultas='$r->fakultas'
          data-prodi='$r->prodi'
          data-kewarganegaraan='$r->kewarganegaraan'
          data-jenis_pendaftaran='$r->jenis_pendaftaran'
          data-tgl_masuk_kuliah='$r->tgl_masuk_kuliah'
          data-tahun_masuk_kuliah='$r->tahun_masuk_kuliah'
          data-pembiayaan='$r->pembiayaan'
          data-alat_transport='$r->alat_transport'
          data-biaya_masuk ='$r->biaya_masuk'
          data-jalur_masuk='$r->jalur_masuk'
          data-penerima_pks='$r->penerima_pks'
          data-no_pks='$r->no_pks'
          data-mulai_semester='$r->mulai_semester'
  
          data-nik_ayah='$r->nik_ayah'
          data-nama_ayah='$r->nama_ayah'
          data-tgllahir_ayah='$r->tgllahir_ayah'
          data-pendidikan_ayah='$r->pendidikan_ayah'
          data-pekerjaan_ayah='$r->pekerjaan_ayah'
          data-penghasilan_ayah='$r->penghasilan_ayah'
          data-tlp_ayah='$r->tlp_ayah'
          data-nik_ibu='$r->nik_ibu'
          data-nama_ibu='$r->nama_ibu'
          data-tgllahir_ibu='$r->tgllahir_ibu'
          data-pendidikan_ibu='$r->pendidikan_ibu'
          data-pekerjaan_ibu='$r->pekerjaan_ibu'
          data-penghasilan_ibu='$r->penghasilan_ibu'
          data-tlp_ibu='$r->tlp_ibu'
  
          data-nik_wali='$r->nik_wali'
          data-nama_wali='$r->nama_wali'
          data-tgllahir_wali='$r->tgllahir_wali'
          data-pendidikan_wali='$r->pendidikan_wali'
          data-pekerjaan_wali='$r->pekerjaan_wali'
          data-penghasilan_wali='$r->penghasilan_wali'
          data-tlp_wali='$r->tlp_wali'
  
  
          data-toggle='modal' data-target='#edit-data-praja' class='btn btn-primary'><i class='fa fas fa-edit'></i></a>   ";
  
         // <a href='d_praja/edt/$r->npp' class='btn btn-primary'><i class='fa fas fa-edit'></i></a>
          // $opsi = "<a href='d_praja/detail/$r->id' class='btn btn-sm btn-primary' btn-sm><i class='fa fa-eye'></i></a>  <a href='d_praja/edt/$r->id' class='btn btn-sm btn-warning' btn-sm><i class='fa fa-edit'></i></a>  ";
          // <a href='#' class='btn btn-sm btn-primary' data-toggle='modal' data-target='#editpraja$r->id'><i class='fa fas fa-edit'></i></a>
        }else{
          $opsi = "<a 
          href='javascript:;' 
          data-id='$r->id' 
          data-nama='$r->nama' 
          data-npp='$r->npp' 
          data-jk='$r->jk' 
          data-tmpt_lahir='$r->tmpt_lahir' 
          data-tgl_lahir='$r->tgl_lahir' 
          data-nisn='$r->nisn' 
          data-npwp='$r->npwp' 
          data-no_spcp='$r->no_spcp' 
          data-nik_praja='$r->nik_praja' 
          data-agama='$r->agama' 
          data-alamat='$r->alamat'
          data-rt='$r->rt'
          data-rw='$r->rw'
          data-provinsi='$r->provinsi'
          data-kab_kota='$r->kab_kota'
          data-kelurahan='$r->kelurahan'
          data-nama_dusun='$r->nama_dusun'
          data-kecamatan='$r->kecamatan'
          data-kode_pos='$r->kode_pos'
          data-jenis_tinggal='$r->jenis_tinggal'
          data-tlp_pribadi='$r->tlp_pribadi'
          data-tlp_rumah='$r->tlp_rumah'
          data-email='$r->email'
          data-tingkat='$r->tingkat'
          data-angkatan='$r->angkatan'
          data-status='$r->status'
          data-fakultas='$r->fakultas'
          data-prodi='$r->prodi'
          data-kewarganegaraan='$r->kewarganegaraan'
          data-jenis_pendaftaran='$r->jenis_pendaftaran'
          data-tgl_masuk_kuliah='$r->tgl_masuk_kuliah'
          data-tahun_masuk_kuliah='$r->tahun_masuk_kuliah'
          data-pembiayaan='$r->pembiayaan'
          data-alat_transport='$r->alat_transport'
          data-biaya_masuk ='$r->biaya_masuk'
          data-jalur_masuk='$r->jalur_masuk'
          data-penerima_pks='$r->penerima_pks'
          data-no_pks='$r->no_pks'
          data-mulai_semester='$r->mulai_semester'
  
          data-nik_ayah='$r->nik_ayah'
          data-nama_ayah='$r->nama_ayah'
          data-tgllahir_ayah='$r->tgllahir_ayah'
          data-pendidikan_ayah='$r->pendidikan_ayah'
          data-pekerjaan_ayah='$r->pekerjaan_ayah'
          data-penghasilan_ayah='$r->penghasilan_ayah'
          data-tlp_ayah='$r->tlp_ayah'
          data-nik_ibu='$r->nik_ibu'
          data-nama_ibu='$r->nama_ibu'
          data-tgllahir_ibu='$r->tgllahir_ibu'
          data-pendidikan_ibu='$r->pendidikan_ibu'
          data-pekerjaan_ibu='$r->pekerjaan_ibu'
          data-penghasilan_ibu='$r->penghasilan_ibu'
          data-tlp_ibu='$r->tlp_ibu'
  
          data-nik_wali='$r->nik_wali'
          data-nama_wali='$r->nama_wali'
          data-tgllahir_wali='$r->tgllahir_wali'
          data-pendidikan_wali='$r->pendidikan_wali'
          data-pekerjaan_wali='$r->pekerjaan_wali'
          data-penghasilan_wali='$r->penghasilan_wali'
          data-tlp_wali='$r->tlp_wali'
  
  
          data-toggle='modal' data-target='#show-data' class='btn btn-success'><i class='fa fas fa-eye'></i>
          </a>";
        }
  
      // $eksel = "<a href='d_praja/export/$r->angkatan' class='btn btn-sm btn-primary' btn-sm><i class='fa fa-eye'></i></a>";
  
        $dataall[] = array(
          $no++,
          $npp ,
          $nama,
          $jk,
          $status ,
          $tingkat ,
          $angkatan,
          $opsi
        );
      }
      echo json_encode($dataall);
    }
    
}