<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kemeng extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    //load chart_model from model
    $this->load->model('Kemeng_model');
  }

  function index()
  {
    if ($this->session->userdata('nip') != NULL) {
        // $data = $this->Kemeng_model->get_namdosen()->result();
        $namdos = $this->Kemeng_model->get_namdosen();
        $nammatkul = $this ->Kemeng_model->get_nammatkul();

            //    $x['data'] = $data;
               $x['namdosen'] = $namdos;
               $x['nammatkul'] = $nammatkul;

      $this->load->view("include/head");
      $this->load->view("include/top-header");
      $this->load->view("view_presensi", $x);
      $this->load->view("include/sidebar");
      $this->load->view("include/panel");
      $this->load->view("include/footer");
    } else {
      redirect("user");
    }
  }

// function presensi()
// {
//   if ($this->session->userdata('nip') != NULL) {
//     $data = $this->Kemeng_model->get_dosen()->result();
//     $x['data'] = json_encode($data);

//       // var_dump($data);
//       // exit();
//     $this->load->view("include/head");
//     $this->load->view("include/top-header");
//     $this->load->view("view_presensi", $x);
//     $this->load->view("include/sidebar");
//     $this->load->view("include/panel");
//     $this->load->view("include/footer");
//   } else {
//     redirect("user");
//   }
// }

// function tambah_presensi()
// {
//   if ($this->session->userdata('nip') != NULL) {

//     $data = $this->kemeng_model->getcoba($this->input->post('nama', true))->row_array();

//     if ($this->input->post('status', true) == "turuntingkat" && $data['tingkat'] == 1) {
//       $ting = $data['tingkat'];
//       $ang = $data['angkatan'];
      
//     }else{
//       $ting = $data['tingkat']-1;
//       $ang = $data['angkatan']+1;
//     }

//     $tingkatann = $this->input->post('status', true);
//     $keterangann = $this->input->post('keterangan', true);

//     $nya = array();
//     array_push($nya, array(
//       'id'      => $data['id'],
//       'nama'      => $data['nama'],
//       'status'      => $tingkatann,
//       'tingkat'      => $ting,
//       'angkatan' => $ang,
//       'keterangan' => $keterangann

//     ));
//     // print("<pre>".print_r($nya,true)."</pre>");
//     $up = $this->db->insert_batch('hukuman', $nya);


//     if($this->input->post('status', true) != "turuntingkat"){
//      $haha = $this->input->post('status', true);
//        // echo "$haha";
//    }else{
//      $haha = $data['status'];
//    }

//    $uptudate = array();
//    $uptudate = array(
//      'id'      => $data['id'],
//      'nama'      => $data['nama'],
//      'status'      => $haha,
//      'tingkat'      => $ting,
//      'angkatan' => $ang,
//    );
//     // print("<pre>".print_r($uptudate,true)."</pre>");
//     // exit();
//    $nih = $this->db->where('id',$data['id']);
//     $nih = $this->db->update('praja',$uptudate); //Here also couldn't update


//    // $this->db->update_batch('praja', $uptudate, '$data[id]');
// // exit();

//     if (!$up && $nih) {
//       $this->session->set_flashdata('praja', 'DATA PRAJA GAGAL DIUBAH.');
//       redirect('d_praja/editstatus');
//     } else {
//       $this->session->set_flashdata('praja', 'DATA PRAJA BERHASIL DIUBAH.');
//       redirect('d_praja/editstatus');
//     }

//   } else {
//     redirect("user");
//   }
// }




}
