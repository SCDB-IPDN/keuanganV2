<?php defined("BASEPATH") OR exit("No direct script access allowed");

class Praja extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Praja_model');
    }

    public function index() {
      if($this->session->userdata('nip') != NULL) {    
        
        $data = $this->Praja_model->get_table()->result();
        $x['data'] = $data;
        
        $prov = $this->Praja_model->get_provinsi()->result();
        $x['prov'] = $prov;
        
        $agamaa = $this->Praja_model->agama()->result();
        $x['agamaa'] = $agamaa;

        
      $jenistinggal = $this->Praja_model->jenistinggal()->result();
      $x['jenistinggal'] = $jenistinggal;

      $prodi = $this->Praja_model->prodi()->result();
      $x['prodi'] = $prodi;

      $kewarganegaraan = $this->Praja_model->kewarganegaraan()->result();
      $x['kewarganegaraan'] = $kewarganegaraan;

      $jenispendaftaran = $this->Praja_model->jenispendaftaran()->result();
      $x['jenispendaftaran'] = $jenispendaftaran;

      $pembiayaan = $this->Praja_model->pembiayaan()->result();
      $x['pembiayaan'] = $pembiayaan;

      $jalurmasuk = $this->Praja_model->jalurmasuk()->result();
      $x['jalurmasuk'] = $jalurmasuk;

      $pendidikan = $this->Praja_model->pendidikan()->result();
      $x['pendidikan'] = $pendidikan;

      $pekerjaan = $this->Praja_model->pekerjaan()->result();
      $x['pekerjaan'] = $pekerjaan;

      $penghasilan = $this->Praja_model->penghasilan()->result();
      $x['penghasilan'] = $penghasilan;

      $alattransportasi = $this->Praja_model->alattransportasi()->result();
      $x['alattransportasi'] = $alattransportasi;

      $mulaisemester = $this->Praja_model->mulaisemester()->result();
      $x['mulaisemester'] = $mulaisemester;

      $fakulll = $this->Praja_model->get_fakultas()->result();
      $x['fakulll'] = $fakulll;

      $wilayah = $this->Praja_model->get_will()->result();
      $x['wilayah'] = $wilayah;

        

        // var_dump($agama);exit;

          $this->load->view("include/head");
          $this->load->view("include/top-header");
          $this->load->view('view_praja',$x);
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
      // $data = $this->Praja_model->get_praja()->result();
      $data = $this->Praja_model->get_table()->result();
      // var_dump($data);exit;
      $x['data'] = $data;

      $dataall = array();
  
      $no = 1;
      foreach($data as $r) {
        $npp = $r->npp;
        $nama = $r->nama;
        $jk = $r->jk;
        $tingkat = $r->tingkat;
        $angkatan = $r->angkatan;
        $status = $r->status;

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

    function get_sub_category(){
      $category_id = $this->input->post('prodi',TRUE);
      $data = $this->Praja_model->get_sub_category($category_id)->result();
      echo json_encode($data);
    }
  
  
    function get_sub_provinsi(){
      $prov = $this->input->post('kab_kota',TRUE);
      $data = $this->Praja_model->get_sub_provinsi($prov)->result();
      echo json_encode($data);
    }
  
    function get_sub_kabkota(){
      $kec = $this->input->post('kecamatan',TRUE);
      $data = $this->Praja_model->get_sub_kabkota($kec)->result();
      echo json_encode($data);
    }

  function editstatus()
  {
    if ($this->session->userdata('nip') != NULL) {
      $data = $this->Praja_model->get_statuspraja()->result();
      $x['data'] = json_encode($data);

      $pra = $this->Praja_model->get_praja()->result();
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
    
}