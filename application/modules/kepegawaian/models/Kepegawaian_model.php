<?php
class Kepegawaian_model extends CI_Model{

  public function get_all_pns()
	{	
    $result = $this->db->query("SELECT * FROM tbl_pns");

    return $result;
  }

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