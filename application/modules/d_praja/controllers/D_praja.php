<?php
defined('BASEPATH') or exit('No direct script access allowed');
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
   if($_SESSION['nip'])
   {
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
    $this->load->view("view_praja",$x);
    $this->load->view("include/sidebar");
    $this->load->view("include/panel");
    $this->load->view("include/footer");
  }else{
   redirect("user");
 }
}

function detail($id)
{
  if($_SESSION['nip'])
  {
    $data = $this->D_praja_model->get_detail($id)->result();
    $x['data'] = json_encode($data);
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

  function edt($id)
  {
    if ($this->session->userdata('nip') != NULL) {

      $data = $this->D_praja_model->get_detail($id)->result();

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
     $editnya['id'] = $this->input->post('id', true);
     $editnya['no_spcp'] = $this->input->post('no_spcp', true);
     $editnya['nama'] = $this->input->post('nama', true);
     $editnya['jk'] = $this->input->post('jk', true);
     $editnya['nisn'] = $this->input->post('nisn', true);
     $editnya['npwp'] = $this->input->post('npwp', true);
     $editnya['nik_praja'] = $this->input->post('nik_praja', true);
     $editnya['tmpt_lahir'] = $this->input->post('tmpt_lahir', true);
     $editnya['tgl_lahir'] = $this->input->post('tgl_lahir', true);
     $editnya['agama'] = $this->input->post('agama', true);
     $editnya['email'] = $this->input->post('email', true);
     $editnya['alamat'] = $this->input->post('alamat', true);
     $editnya['rt'] = $this->input->post('rt', true);
     $editnya['rw'] = $this->input->post('rw', true);
     $editnya['nama_dusun'] = $this->input->post('nama_dusun', true);
     $editnya['kelurahan'] = $this->input->post('kelurahan', true);
     $editnya['kecamatan'] = $this->input->post('kecamatan', true);
     $editnya['kab_kota'] = $this->input->post('kab_kota', true);
     $editnya['kode_pos'] = $this->input->post('kode_pos', true);
     $editnya['provinsi'] = $this->input->post('provinsi', true);
     $editnya['jenis_tinggal'] = $this->input->post('jenis_tinggal', true);
     $editnya['alat_transport'] = $this->input->post('alat_transport', true);
     // $editnya['tlp_rmh'] = $this->input->post('tlp_rmh', true);
     $editnya['tlp_pribadi'] = $this->input->post('tlp_pribadi', true);
     $editnya['kewarganegaraan'] = $this->input->post('kewarganegaraan', true);
     $editnya['penerima_pks'] = $this->input->post('penerima_pks', true);
     $editnya['no_pks'] = $this->input->post('no_pks', true);
     $editnya['kode_prodi'] = $this->input->post('kode_prodi', true);
     $editnya['jenis_pendaftaran'] = $this->input->post('jenis_pendaftaran', true);
     $editnya['tgl_masuk_kuliah'] = $this->input->post('tgl_masuk_kuliah', true);
     $editnya['tahun_masuk_kuliah'] = $this->input->post('tahun_masuk_kuliah', true);
     $editnya['pembiayaan'] = $this->input->post('pembiayaan', true);
     $editnya['jalur_masuk'] = $this->input->post('jalur_masuk', true);
     $editnya['status'] = $this->input->post('status', true);

     if ($editnya['status'] == "turuntingkat") {
      $editnya['tingkat'] = $this->input->post('tingkat', true) - 1;
      $editnya['angkatan'] = $this->input->post('angkatan', true) +1;
    } else {
      $editnya['tingkat'] = $this->input->post('tingkat', true);
      $editnya['angkatan'] = $this->input->post('angkatan', true);
    }

    $result = $this->D_praja_model->view_edit($editnya);
    // echo $result;
    // exit();


    if (!$result) {
      $this->session->set_flashdata('praja', 'DATA PRAJA GAGAL DIUBAH.');
      redirect('d_praja');
    } else {
      $this->session->set_flashdata('praja', 'DATA PRAJA BERHASIL DIUBAH.');
      redirect('d_praja');
    }
  } else {
    redirect("user");
  }
}

  public function view_editortu()
  {
    if ($this->session->userdata('nip') != NULL) {
     $editnya['id_ortu'] = $this->input->post('id_ortu', true);

     $editnya['nik_praja'] = $this->input->post('nik_praja', true);
     $editnya['nama'] = $this->input->post('nama', true);
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
     $editnya['penghasilan_ibu'] = $this->input->post('email', true);
     $editnya['penghasilan_ibu'] = $this->input->post('email', true);
     $editnya['tlp_ibu'] = $this->input->post('tlp_ibu', true);
  
   
    $result = $this->D_praja_model->view_editortu($editnya);
    // echo $result;
    // exit();


    if (!$result) {
      $this->session->set_flashdata('praja', 'DATA PRAJA GAGAL DIUBAH.');
      redirect('d_praja');
    } else {
      $this->session->set_flashdata('praja', 'DATA PRAJA BERHASIL DIUBAH.');
      redirect('d_praja');
    }
  } else {
    redirect("user");
  }
}

 public function view_editwali()
  {
    if ($this->session->userdata('nip') != NULL) {
     $editnya['id_wali'] = $this->input->post('id_wali', true);
     $editnya['nik_praja'] = $this->input->post('nik_praja', true);
     $editnya['nama'] = $this->input->post('nama', true);
     $editnya['nik_wali'] = $this->input->post('nik_wali', true);
     $editnya['nama_wali'] = $this->input->post('nama_wali', true);
     $editnya['pendidikan_wali'] = $this->input->post('pendidikan_wali', true);
     $editnya['tgllahir_wali'] = $this->input->post('tgllahir_wali', true);
     $editnya['pekerjaan_wali'] = $this->input->post('pekerjaan_wali', true);
     $editnya['penghasilan_wali'] = $this->input->post('penghasilan_wali', true);
     $editnya['tlp_wali'] = $this->input->post('tlp_wali', true);
  
   
    $result = $this->D_praja_model->view_editwali($editnya);
    // echo $result;
    // exit();


    if (!$result) {
      $this->session->set_flashdata('praja', 'DATA PRAJA GAGAL DIUBAH.');
      redirect('d_praja');
    } else {
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
  }else{
   redirect("user");
 }

}

function edit($id)
{
  if($_SESSION['nip'])
  {
    $data = $this->D_praja_model->edit_praja($id)->result();
    $x['data'] = json_encode($data);

    $this->load->view("include/head");
    $this->load->view("include/top-header");
    $this->load->view("view_edit",$x);
    $this->load->view("include/sidebar");
    $this->load->view("include/panel");
    $this->load->view("include/footer");
  }else{
   redirect("user");
 }

}

function edit_praja()
{
  if($_SESSION['nip'])
  {
    $input_data['nik_praja'] = $this->input->post('nik_praja', true);
    $input_data['nama'] = $this->input->post('nama', true);
    $input_data['email'] = $this->input->post('email', true);
    $input_data['alamat'] = $this->input->post('alamat', true);
    $input_data['rt'] = $this->input->post('rt', true);
    $input_data['rw'] = $this->input->post('rw', true);
    $input_data['nama_dusun'] = $this->input->post('nama_dusun', true);
    $input_data['kelurahan'] = $this->input->post('kelurahan', true);
    $input_data['kecamatan'] = $this->input->post('kecamatan', true);
    $input_data['kab/kota'] = $this->input->post('kab/kota', true);
    $input_data['kode_pos'] = $this->input->post('kode_pos', true);
    $input_data['tlp_pribadi'] = $this->input->post('tlp_pribadi', true);
    $input_data['status'] = $this->input->post('status', true);

    if ($input_data['status'] == "turuntingkat") {
      $input_data['tingkat'] = $this->input->post('tingkat', true)-1;
    }else{
      $input_data['tingkat'] = $this->input->post('tingkat', true);
    }
    

    $result = $this->D_praja_model->edit_praja($input_data);

    if (!$result) { 							
     $this->session->set_flashdata('praja', 'DATA PRAJA GAGAL DIUBAH.');		
     redirect('d_praja'); 			
   } else { 						
     $this->session->set_flashdata('praja', 'DATA PRAJA BERHASIL DIUBAH.');			
     redirect('d_praja'); 			
   }

 }else{
   redirect("user");
 }
}

}
  } else {
    redirect("user");
  }
}

}
