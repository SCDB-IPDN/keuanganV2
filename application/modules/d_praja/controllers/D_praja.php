<?php
defined('BASEPATH') or exit('No direct script access allowed');


require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class D_praja extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    //load chart_model from model
    $this->load->model('D_praja_model');
  }

  function index()
  {
    if ($this->session->userdata('nip') != NULL) {
      $data = $this->D_praja_model->get_praja()->result();
      $x['data'] =$data;
      // var_dump($data);exit();
      // $x['tingkat'] = $tingkat;

      $angkatan = $this->D_praja_model->get_angkatan()->result();
      $x['angkatan'] = json_encode($angkatan);


      $prov = $this->D_praja_model->get_provinsi()->result();
      $x['prov'] = $prov;

      $status = $this->D_praja_model->get_status()->result();
      $x['status'] = json_encode($status);

      $agama = $this->D_praja_model->agama()->result();
      $x['agama'] = $agama;

      $jenistinggal = $this->D_praja_model->jenistinggal()->result();
      $x['jenistinggal'] = $jenistinggal;

      $prodi = $this->D_praja_model->prodi()->result();
      $x['prodi'] = $prodi;

      $kewarganegaraan = $this->D_praja_model->kewarganegaraan()->result();
      $x['kewarganegaraan'] = $kewarganegaraan;

      $jenispendaftaran = $this->D_praja_model->jenispendaftaran()->result();
      $x['jenispendaftaran'] = $jenispendaftaran;

      $pembiayaan = $this->D_praja_model->pembiayaan()->result();
      $x['pembiayaan'] = $pembiayaan;

      $jalurmasuk = $this->D_praja_model->jalurmasuk()->result();
      $x['jalurmasuk'] = $jalurmasuk;

      $pendidikan = $this->D_praja_model->pendidikan()->result();
      $x['pendidikan'] = $pendidikan;

      $pekerjaan = $this->D_praja_model->pekerjaan()->result();
      $x['pekerjaan'] = $pekerjaan;

      $penghasilan = $this->D_praja_model->penghasilan()->result();
      $x['penghasilan'] = $penghasilan;

      $alattransportasi = $this->D_praja_model->alattransportasi()->result();
      $x['alattransportasi'] = $alattransportasi;

      $mulaisemester = $this->D_praja_model->mulaisemester()->result();
      $x['mulaisemester'] = $mulaisemester;

      $fakulll = $this->D_praja_model->get_fakultas()->result();
      $x['fakulll'] = $fakulll;

      $wilayah = $this->D_praja_model->get_will()->result();
      $x['wilayah'] = $wilayah;


      $this->load->view("include/head");
      $this->load->view("include/top-header");
      $this->load->view("view_praja", $x);
      $this->load->view("include/sidebar");
      $this->load->view("include/panel");
      $this->load->view("include/footer");
    } else {
      redirect("user");
    }
  }

  function get_sub_category(){
    $category_id = $this->input->post('prodi',TRUE);
    $data = $this->D_praja_model->get_sub_category($category_id)->result();
    echo json_encode($data);
  }


  function get_sub_provinsi(){
    $prov = $this->input->post('kab_kota',TRUE);
    $data = $this->D_praja_model->get_sub_provinsi($prov)->result();
    echo json_encode($data);
  }

  function get_sub_kabkota(){
    $kec = $this->input->post('kecamatan',TRUE);
    $data = $this->D_praja_model->get_sub_kabkota($kec)->result();
    echo json_encode($data);
  }

  // function get_table_p($angkatan = NULL)
  // {

  //   if ($this->session->userdata('nip') != NULL) {
  //     $data = $this->D_praja_model->get_table_praja($angkatan)->result();
  //     echo json_encode($data);
  //   } else {
  //     redirect("user");
  //   }
  // }


  function cobain($angkatan = NULL){
    // $data = $this->D_praja_model->get_praja()->result();
    $data = $this->D_praja_model->get_table($angkatan)->result();
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



  function detail($id)
  {
    // var_dump($id);exit();
    if ($this->session->userdata('nip') != NULL) {
      $data = $this->D_praja_model->get_detail($id)->result();
      echo json_encode($data);


    // $x['data'] = json_encode($data);

    // $this->load->view("include/head");
    // $this->load->view("include/top-header");
    // $this->load->view("view_detail", $x);
    // $this->load->view("include/sidebar");
    // $this->load->view("include/panel");
    // $this->load->view("include/footer");
    } else {
      redirect("user");
    }
  }

  function edt($npp)
  {
    if ($this->session->userdata('nip') != NULL) {

      $data = $this->D_praja_model->get_detail($npp)->result();

      $x['data'] = $data;

      // var_dump($data);
      // exit();

      $this->load->view("include/head");
      $this->load->view("include/top-header");
      $this->load->view('view_edit', $x);
      $this->load->view("include/sidebar");
      $this->load->view("include/panel");
      $this->load->view("include/footer");
    } else {
      redirect("user");
    }
  }


  public function view_edit()
  {
    if ($this->session->userdata('nip') != NULL) {

     $editnya['nama'] = $this->input->post('nama', true);
     $editnya['npp'] = $this->input->post('npp', true);
     $editnya['jk'] = $this->input->post('jk', true);
     $editnya['tmpt_lahir'] = $this->input->post('tmpt_lahir', true);
     $editnya['tgl_lahir'] = $this->input->post('tgl_lahir', true);
     $editnya['nisn'] = $this->input->post('nisn', true);
     $editnya['npwp'] = $this->input->post('npwp', true);
     $editnya['no_spcp'] = $this->input->post('no_spcp', true);
     $editnya['nik_praja'] = $this->input->post('nik_praja', true);
     $editnya['agama'] = $this->input->post('agama', true);
     $editnya['alamat'] = $this->input->post('alamat', true);
     $editnya['rt'] = $this->input->post('rt', true);
     $editnya['rw'] = $this->input->post('rw', true);
     $editnya['provinsi'] = $this->input->post('provinsi', true);
     $editnya['kab_kota'] = $this->input->post('kab_kota', true);
     $editnya['kelurahan'] = $this->input->post('kelurahan', true);
     $editnya['nama_dusun'] = $this->input->post('nama_dusun', true);
     $editnya['kecamatan'] = $this->input->post('kecamatan', true);
     $editnya['kode_pos'] = $this->input->post('kode_pos', true);
     $editnya['jenis_tinggal'] = $this->input->post('jenis_tinggal', true);
     $editnya['tlp_pribadi'] = $this->input->post('tlp_pribadi', true);
     $editnya['tlp_rumah'] = $this->input->post('tlp_rumah', true);
     $editnya['email'] = $this->input->post('email', true);
     $editnya['tingkat'] = $this->input->post('tingkat', true);
     $editnya['angkatan'] = $this->input->post('angkatan', true);
     $editnya['status'] = $this->input->post('status', true);
     $editnya['fakultas'] = $this->input->post('fk', true);
     $editnya['prodi'] = $this->input->post('prodi', true);
     $editnya['kewarganegaraan'] = $this->input->post('kewarganegaraan', true);
     $editnya['jenis_pendaftaran'] = $this->input->post('jenis_pendaftaran', true);
     $editnya['tgl_masuk_kuliah'] = $this->input->post('tgl_masuk_kuliah', true);
     $editnya['tahun_masuk_kuliah'] = $this->input->post('tahun_masuk_kuliah', true);
     $editnya['pembiayaan'] = $this->input->post('pembiayaan', true);
     $editnya['alat_transport'] = $this->input->post('alat_transport', true);
     $editnya['biaya_masuk'] = $this->input->post('biaya_masuk', true);
     $editnya['jalur_masuk'] = $this->input->post('jalur_masuk', true);
     $editnya['penerima_pks'] = $this->input->post('penerima_pks', true);
     $editnya['no_pks'] = $this->input->post('no_pks', true);
     $editnya['mulai_semester'] = $this->input->post('mulai_semester', true);

     $editnya['nik_ayah'] = $this->input->post('nik_ayah', true);
     $editnya['nama_ayah'] = $this->input->post('nama_ayah', true);
     $editnya['tgllahir_ayah'] = $this->input->post('tgllahir_ayah', true);
     $editnya['pendidikan_ayah'] = $this->input->post('pendidikan_ayah', true);
     $editnya['pekerjaan_ayah'] = $this->input->post('pekerjaan_ayah', true);
     $editnya['penghasilan_ayah'] = $this->input->post('penghasilan_ayah', true);
     $editnya['tlp_ayah'] = $this->input->post('tlp_ayah', true);
     $editnya['nik_ibu'] = $this->input->post('nik_ibu', true);
     $editnya['nama_ibu'] = $this->input->post('nama_ibu', true);
     $editnya['tgllahir_ibu'] = $this->input->post('tgllahir_ibu', true);
     $editnya['pendidikan_ibu'] = $this->input->post('pendidikan_ibu', true);
     $editnya['pekerjaan_ibu'] = $this->input->post('pekerjaan_ibu', true);
     $editnya['penghasilan_ibu'] = $this->input->post('penghasilan_ibu', true);
     $editnya['tlp_ibu'] = $this->input->post('tlp_ibu', true);

     $editnya['nik_wali'] = $this->input->post('nik_wali', true);
     $editnya['nama_wali'] = $this->input->post('nama_wali', true);
     $editnya['tgllahir_wali'] = $this->input->post('tgllahir_wali', true);
     $editnya['pendidikan_wali'] = $this->input->post('pendidikan_wali', true);
     $editnya['pekerjaan_wali'] = $this->input->post('pekerjaan_wali', true);
     $editnya['penghasilan_wali'] = $this->input->post('penghasilan_wali', true);
     $editnya['tlp_wali'] = $this->input->post('tlp_wali', true);


     // $result = $this->D_praja_model->view_edit($editnya);
     var_dump($editnya);exit();
     // echo "$result";exit();

     if (!$result) {
      $this->session->set_flashdata('praja', 'DATA PRAJA GAGAL DIUBAH.');
      redirect('d_praja');
    } else {

     $isi = $editnya['npp'];
     $log['user'] = $this->session->userdata('nip');
     $log['Ket'] = "Mengedit Data Praja, NPP Praja = $isi";
     $log['tanggal'] = date('Y-m-d H:i:s');
     // var_dump($log);exit();
     $this->D_praja_model->log($log);

     $this->session->set_flashdata('praja', 'DATA PRAJA BERHASIL DIUBAH.');
     redirect('d_praja');
   }
 } else {
  redirect("user");
}
}

function alumni()
{
  if ($this->session->userdata('nip') != NULL) {
    $data = $this->D_praja_model->get_praja()->result();
      // $tingkat = $data[0]->tingkat-1;
      // echo $tingkat;
      // exit();
    $x['data'] = json_encode($data);
      // $x['tingkat'] = $tingkat;

    $prov = $this->D_praja_model->get_provinsi()->result();
    $x['prov'] = json_encode($prov);

    $status = $this->D_praja_model->get_status()->result();
    $x['status'] = json_encode($status);

    $this->load->view("include/head");
    $this->load->view("include/top-header");
    $this->load->view("view_praja", $x);
    $this->load->view("include/sidebar");
    $this->load->view("include/panel");
    $this->load->view("include/footer");
  } else {
    redirect("user");
  }
}


function hukuman()
{
  if ($this->session->userdata('nip') != NULL) {
    $data = $this->D_praja_model->get_statuspraja()->result();
    $x['data'] = json_encode($data);

    $pra = $this->D_praja_model->get_praja()->result();
    $x['pra'] = $pra;

    $this->load->view("include/head");
    $this->load->view("include/top-header");
    $this->load->view("view_status", $x);
    $this->load->view("include/sidebar");
    $this->load->view("include/panel");
    $this->load->view("include/footer");
  } else {
    redirect("user");
  }
}


function editstatus()
{
  if ($this->session->userdata('nip') != NULL) {
    $data = $this->D_praja_model->get_statuspraja()->result();
    $x['data'] = json_encode($data);

    $pra = $this->D_praja_model->get_praja()->result();
    $x['pra'] = $pra;

    $this->load->view("include/head");
    $this->load->view("include/top-header");
    $this->load->view("view_status", $x);
    $this->load->view("include/sidebar");
    $this->load->view("include/panel");
    $this->load->view("include/footer");
  } else {
    redirect("user");
  }
}

function ubahstatus()
{
  if ($this->session->userdata('nip') != NULL) {
    $data = $this->D_praja_model->get_npp()->result();
    $x['data'] = json_encode($data);

      // var_dump($x['data']);
      // exit();
    $this->load->view("include/head");
    $this->load->view("include/top-header");
    $this->load->view("view_ubah", $x);
    $this->load->view("include/sidebar");
    $this->load->view("include/panel");
    $this->load->view("include/footer");
  } else {
    redirect("user");
  }
}

function coba($npp = NULL)
{
  if ($this->session->userdata('nip') != NULL) {
    $data = $this->D_praja_model->getcoba($npp)->result();
    echo json_encode($data);

      // $html = "";
      // $html .= "<br>";
      // $html .= "<h4> Nama : $data[nama]</h4>";

  } else {
    redirect("user");
  }
}

function tambah_status()
{
  if ($this->session->userdata('nip') != NULL) {

    $data = $this->D_praja_model->getcoba($this->input->post('npp', true))->row_array();

    if ($this->input->post('status', true) == "turuntingkat" && $data['tingkat'] == 1) {
      $ting = $data['tingkat'];
      $ang = $data['angkatan'];
    }else if ($this->input->post('status', true) == "turuntingkat"){
      $ting = $data['tingkat']-1;
      $ang = $data['angkatan']+1;
    }else if($this->input->post('status', true) != "turuntingkat") {
     $ting = $data['tingkat'];
     $ang = $data['angkatan'];
   }

   $tingkatann = $this->input->post('status', true);
   $keterangann = $this->input->post('keterangan', true);
   $tgl = date('Y-m-d');

   $nya = array();
   $config['upload_path']          = './assets/uploads_skpraja/';
   $config['allowed_types']        = 'pdf|docx';
   $config['max_size']             = 2000000;
   $this->load->library('upload', $config);

   if ($this->upload->do_upload('fileToUpload')){

    // var_dump($tingkatann);exit;

    $nya = array(
      'npp'      => $data['npp'],
      'nama'      => $data['nama'],
      'status'      => $tingkatann,
      'tingkat'      => $ting,
      'angkatan' => $ang,
      'keterangan' => $keterangann,
      'tgl' => $tgl,
      'bukti'=> $this->upload->data("file_name")

    );
    // var_dump($nya);exit;
    $this->db->insert('hukuman', $nya);
  }
  
  
  // print("<pre>".print_r($nya,true)."</pre>");
  // exit();



   // if ($this->upload->do_upload('fileToUpload')){

   //  // var_dump($up);exit();
   // }



 //  if($this->input->post('status', true) != "turuntingkat"){
 //   $haha = $this->input->post('status', true);
 //       // echo "$haha";
 // }else{
 //   $haha = $data['status'];
 // }

  $uptudate = array();
  $uptudate = array(
   'npp'      => $data['npp'],
   'nama'      => $data['nama'],
   'status'      => $tingkatann,
   'tingkat'      => $ting,
   'angkatan' => $ang

 );
  // print("<pre>".print_r($uptudate,true)."</pre>");
  // exit();
  $nih = $this->db->where('npp',$data['npp']);
  $nih = $this->db->update('praja_baru',$uptudate); 


   // $this->db->update_batch('praja', $uptudate, '$data[id]');
// exit();

  if (!$nih) {
    $this->session->set_flashdata('praja', 'DATA PRAJA GAGAL DIUBAH.');
    redirect('d_praja/editstatus');
  } else {

   $isi = $data['npp'];
   $log['user'] = $this->session->userdata('nip');
   $log['Ket'] = "Mengedit Status Praja, NPP Praja = $isi";
   $log['tanggal'] = date('Y-m-d H:i:s');
   // var_dump($log);exit();
   $this->D_praja_model->log($log);

   $this->session->set_flashdata('praja', 'DATA PRAJA BERHASIL DIUBAH.');
   redirect('d_praja/editstatus');
 }

} else {
  redirect("user");
}
}





function export($angkatan=NULL)
{


 $semua_pengguna = $this->D_praja_model->exportdata($angkatan)->result();
 
 $spreadsheet = new Spreadsheet;

 $spreadsheet->setActiveSheetIndex(0)
 ->setCellValue('A1','NPP')
 ->setCellValue('B1','NAMA')
 ->setCellValue('C1','TEMPAT LAHIR')
 ->setCellValue('D1','TGL LAHIR')
 ->setCellValue('E1','L/P')
 ->setCellValue('F1','NIK')
 ->setCellValue('G1','AGAMA')
 ->setCellValue('H1','NISN')
 ->setCellValue('I1','JALUR PENDAFTARAN')
 ->setCellValue('J1','NPWP')
 ->setCellValue('K1','KEWARGANEGARAAN')
 ->setCellValue('L1','JENIS PENDAFTARAN')
 ->setCellValue('M1','TANGGAL MASUK KULIAH')
 ->setCellValue('N1','MULAI SEMESTER')
 ->setCellValue('O1','ALAMAT')
 ->setCellValue('P1','RT')
 ->setCellValue('Q1','RW')
 ->setCellValue('R1','NAMA DUSUN')
 ->setCellValue('S1','KELURAHAN')
 ->setCellValue('T1','KECAMATAN')
 ->setCellValue('U1','KODE POS')
 ->setCellValue('V1','JENIS TINGGAL')
 ->setCellValue('W1','ALAT TRANSPORTASI')
 ->setCellValue('X1','TELEPON RUMAH')
 ->setCellValue('Y1','NO HP')
 ->setCellValue('Z1','EMAIL')
 ->setCellValue('AA1','TERIMA KPS')
 ->setCellValue('AB1','NO KPS')
 ->setCellValue('AC1','NIK AYAH')
 ->setCellValue('AD1','NAMA AYAH')
 ->setCellValue('AE1','TGL LAHIR AYAH')
 ->setCellValue('AF1','PENDIDIKAN Ayah')
 ->setCellValue('AG1','PEKERJAAN AYAH')
 ->setCellValue('AH1','PENGHASILAN AYAH')
 ->setCellValue('AI1','NIK IBU')
 ->setCellValue('AJ1','NAMA IBU')
 ->setCellValue('AK1','TGL LAHIR IBU')
 ->setCellValue('AL1','PENDIDIKAN IBU')
 ->setCellValue('AM1','PEKERJAAN IBU')
 ->setCellValue('AN1','PENGHASILAN IBU')
 ->setCellValue('AO1','NAMA WALI')
 ->setCellValue('AP1','TGL LAHIR WALI')
 ->setCellValue('AQ1','PENDIDIKAN WALI')
 ->setCellValue('AR1','PEKERJAAN WALI')
 ->setCellValue('AS1','PENGHASILAN WALI')
 ->setCellValue('AT1','JENIS PEMBIAYAAN')
 ->setCellValue('AU1','JUMLAH BIAYA MASUK')
 ->setCellValue('AV1','PRODI');


 $kolom = 2;
 $nomor = 1;


 foreach($semua_pengguna as $pengguna) {
   // var_dump($pengguna);exit();

   $spreadsheet ->setActiveSheetIndex(0)
   ->setCellValue('A'. $kolom, $pengguna->npp )
   ->setCellValue('B'. $kolom, $pengguna->nama)
   ->setCellValue('C'. $kolom, $pengguna->tmpt_lahir )
   ->setCellValue('D'. $kolom, $pengguna->tgl_lahir)
   ->setCellValue('E'. $kolom, $pengguna->jk)
   ->setCellValue('F'. $kolom, $pengguna->nik_praja )
   ->setCellValue('G'. $kolom, $pengguna->agama)
   ->setCellValue('H'. $kolom, $pengguna->nisn )
   ->setCellValue('I'. $kolom, $pengguna->jalur_masuk)
   ->setCellValue('J'. $kolom, $pengguna->npwp )
   ->setCellValue('K'. $kolom, $pengguna->kewarganegaraan )
   ->setCellValue('L'. $kolom, $pengguna->jenis_pendaftaran )
   ->setCellValue('M'. $kolom, $pengguna->tgl_masuk_kuliah )
   ->setCellValue('N'. $kolom, $pengguna->mulai_semester)
   ->setCellValue('O'. $kolom, $pengguna->alamat )
   ->setCellValue('P'. $kolom, $pengguna->rt)
   ->setCellValue('Q'. $kolom, $pengguna->rw )
   ->setCellValue('R'. $kolom, $pengguna->nama_dusun )
   ->setCellValue('S'. $kolom, $pengguna->kelurahan )
   ->setCellValue('T'. $kolom, $pengguna->kecamatan)
   ->setCellValue('U'. $kolom, $pengguna->kode_pos)
   ->setCellValue('V'. $kolom, $pengguna->jenis_tinggal )
   ->setCellValue('W'. $kolom, $pengguna->alat_transport )
   ->setCellValue('X'. $kolom, $pengguna->tlp_rumah )
   ->setCellValue('Y'. $kolom, $pengguna->tlp_pribadi)
   ->setCellValue('Z'. $kolom, $pengguna->email)
   ->setCellValue('AA'. $kolom, $pengguna->penerima_pks )
   ->setCellValue('AB'. $kolom, $pengguna->no_pks )
   ->setCellValue('AC'. $kolom, $pengguna->nik_ayah )
   ->setCellValue('AD'. $kolom, $pengguna->nama_ayah )
   ->setCellValue('AE'. $kolom, $pengguna->tgllahir_ayah )
   ->setCellValue('AF'. $kolom, $pengguna->pendidikan_ayah )
   ->setCellValue('AG'. $kolom, $pengguna->pekerjaan_ayah )
   ->setCellValue('AH'. $kolom, $pengguna->penghasilan_ayah )
   ->setCellValue('AI'. $kolom, $pengguna->nik_ibu)
   ->setCellValue('AJ'. $kolom, $pengguna->nama_ibu )
   ->setCellValue('AK'. $kolom, $pengguna->tgllahir_ibu )
   ->setCellValue('AL'. $kolom, $pengguna->pendidikan_ibu )
   ->setCellValue('AM'. $kolom, $pengguna->pekerjaan_ibu )
   ->setCellValue('AN'. $kolom, $pengguna->penghasilan_ibu )
   ->setCellValue('AO'. $kolom, $pengguna->nama_wali)
   ->setCellValue('AP'. $kolom, $pengguna->tgllahir_wali )
   ->setCellValue('AQ'. $kolom, $pengguna->pendidikan_wali )
   ->setCellValue('AR'. $kolom, $pengguna->pekerjaan_wali)
   ->setCellValue('AS'. $kolom, $pengguna->penghasilan_wali)
   ->setCellValue('AT'. $kolom, $pengguna->pembiayaan )
   ->setCellValue('AU'. $kolom, $pengguna->biaya_masuk )
   ->setCellValue('AV'. $kolom, $pengguna->prodi );

   $kolom++;
   $nomor++;
   // var_dump($pengguna->$no_spcp);exit();

 }

 $writer = new Xlsx($spreadsheet);

 header('Content-Type: application/vnd.ms-excel');
 header('Content-Disposition: attachment;filename="DataPraja.xlsx"');
 header('Cache-Control: max-age=0');

 $writer->save('php://output');
}





}
