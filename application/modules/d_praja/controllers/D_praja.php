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

  function detail($id)
  {
    if ($this->session->userdata('nip') != NULL) {
      $data = $this->D_praja_model->get_detail($id)->result();
      $x['data'] = json_encode($data);

      $this->load->view("include/head");
      $this->load->view("include/top-header");
      $this->load->view("view_detail", $x);
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
     $editnya['tlp_rumah'] = $this->input->post('tlp_rumah', true);
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

    $editort['id_ortu'] = $this->input->post('id_ortu', true);
    $editort['nik_praja'] = $this->input->post('nik_praja', true);
    $editort['nama'] = $this->input->post('nama', true);
    $editort['nik_ayah'] = $this->input->post('nik_ayah', true);
    $editort['nama_ayah'] = $this->input->post('nama_ayah', true);
    $editort['tgllahir_ayah'] = $this->input->post('tgllahir_ayah', true);
    $editort['pendidikan_ayah'] = $this->input->post('pendidikan_ayah', true);
    $editort['pekerjaan_ayah'] = $this->input->post('pekerjaan_ayah', true);
    $editort['penghasilan_ayah'] = $this->input->post('penghasilan_ayah', true);
    $editort['tlp_ayah'] = $this->input->post('tlp_ayah', true);
    $editort['nik_ibu'] = $this->input->post('nik_ibu', true);
    $editort['nama_ibu'] = $this->input->post('nama_ibu', true);
    $editort['tgllahir_ibu'] = $this->input->post('tgllahir_ibu', true);
    $editort['pendidikan_ibu'] = $this->input->post('pendidikan_ibu', true);
    $editort['pekerjaan_ibu'] = $this->input->post('pekerjaan_ibu', true);
    $editort['penghasilan_ibu'] = $this->input->post('email', true);
    $editort['penghasilan_ibu'] = $this->input->post('email', true);
    $editort['tlp_ibu'] = $this->input->post('tlp_ibu', true);

    $editwal['id_wali'] = $this->input->post('id_wali', true);
    $editwal['nik_praja'] = $this->input->post('nik_praja', true);
    $editwal['nama'] = $this->input->post('nama', true);
    $editwal['nik_wali'] = $this->input->post('nik_wali', true);
    $editwal['nama_wali'] = $this->input->post('nama_wali', true);
    $editwal['pendidikan_wali'] = $this->input->post('pendidikan_wali', true);
    $editwal['tgllahir_wali'] = $this->input->post('tgllahir_wali', true);
    $editwal['pekerjaan_wali'] = $this->input->post('pekerjaan_wali', true);
    $editwal['penghasilan_wali'] = $this->input->post('penghasilan_wali', true);
    $editwal['tlp_wali'] = $this->input->post('tlp_wali', true);


    $result = $this->D_praja_model->view_edit($editnya);
    $ha = $this->D_praja_model->view_editortu($editort);
    $hi = $this->D_praja_model->view_editwali($editwal);
    // echo $result;
    // exit();


    if (!$result && !$ha && !$hi) {
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
    $data = $this->D_praja_model->get_nama()->result();
    $x['data'] = json_encode($data);

      // var_dump($data);
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

function coba($nama = NULL)
{
  if ($this->session->userdata('nip') != NULL) {
    $data = $this->D_praja_model->getcoba($nama)->result();
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

    $data = $this->D_praja_model->getcoba($this->input->post('nama', true))->row_array();

    if ($this->input->post('status', true) == "turuntingkat") {
      $ting = $data['tingkat']-1;
      $ang = $data['angkatan']+1;
    }else{
      $ting = $data['tingkat'];
      $ang = $data['angkatan'];
    }

    $tingkatann = $this->input->post('status', true);
    $keterangann = $this->input->post('keterangan', true);

    $nya = array();
    array_push($nya, array(
      'id'      => $data['id'],
      'nama'      => $data['nama'],
      'status'      => $tingkatann,
      'tingkat'      => $ting,
      'angkatan' => $ang,
      'keterangan' => $keterangann

    ));
    // print("<pre>".print_r($nya,true)."</pre>");
    $up = $this->db->insert_batch('hukuman', $nya);


    if($this->input->post('status', true) != "turuntingkat"){
       $haha = $this->input->post('status', true);
       // echo "$haha";
    }else{
       $haha = $data['status'];
    }
    
    $uptudate = array();
    $uptudate = array(
     'id'      => $data['id'],
     'nama'      => $data['nama'],
     'status'      => $haha,
     'tingkat'      => $ting,
     'angkatan' => $ang,
   );
    // print("<pre>".print_r($uptudate,true)."</pre>");
    // exit();
    $nih = $this->db->where('id',$data['id']);
    $nih = $this->db->update('praja',$uptudate); //Here also couldn't update


   // $this->db->update_batch('praja', $uptudate, '$data[id]');
// exit();

    if (!$up && $nih) {
      $this->session->set_flashdata('praja', 'DATA PRAJA GAGAL DIUBAH.');
      redirect('d_praja/editstatus');
    } else {
      $this->session->set_flashdata('praja', 'DATA PRAJA BERHASIL DIUBAH.');
      redirect('d_praja/editstatus');
    }

  } else {
    redirect("user");
  }
}




}
