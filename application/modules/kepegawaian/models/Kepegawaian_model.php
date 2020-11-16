<?php
class Kepegawaian_model extends CI_Model{

  function cek_pegawai($nip)
	{   
    $cek_peg = $this->db->query("SELECT * FROM tbl_pns WHERE nip='$nip'")->result();
    return $cek_peg;
  }

  // PNS
  public function get_all_pns()
	{	
    $result = $this->db->query("SELECT * FROM tbl_pns");

    return $result;
  }

  function tambah_pns($input_data)
	{   
    $add_pns = $this->db->insert('tbl_pns', $input_data);
    return $add_pns;
  }

  function edit_pns($input_data)
  {       
    $nip = $input_data['nip'];
    $hasil = $this->db->where('nip', $nip)->update('tbl_pns', $input_data);
    
    return $hasil;    
  }

  function hapus_pns($nip){
    $hasil=$this->db->query("DELETE FROM tbl_pns WHERE nip='$nip'");
    return $hasil;
  }
  // END PNS

  // THL
  public function get_all_thl()
	{	
    $result = $this->db->query("SELECT * FROM tbl_thl");

    return $result;
  }

  function tambah_thl($input_data)
	{   
    $add_thl = $this->db->insert('tbl_thl', $input_data);
    return $add_thl;
  }

  function edit_thl($input_data)
  {       
    $id_thl = $input_data['id_thl'];
    $hasil = $this->db->where('id_thl', $id_thl)->update('tbl_thl', $input_data);
    
    return $hasil;    
  }

  function hapus_thl($id_thl){
    $hasil=$this->db->query("DELETE FROM tbl_thl WHERE id_thl='$id_thl'");
    return $hasil;
  }
  // END THL
}