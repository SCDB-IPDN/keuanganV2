<?php
class D_span_biro_model extends CI_Model{

  	public function get_all_dashboard()
	{	
		// $result = $this->db->query("SELECT a.*, CONCAT(b.alias, ' ', a.persentase_t) as alias FROM tbl_span_biro as a JOIN tbl_satker_biro as b ON a.kode_satker_biro=b.kode_satker_biro ORDER BY created_date DESC limit 8");
    	$result = $this->db->query("SELECT a.*, b.alias as alias FROM tbl_span_biro as a JOIN tbl_satker_biro as b ON a.kode_satker_biro=b.kode_satker_biro ORDER BY created_date DESC limit 8 ");

		return $result;
  	}

 	public function get_tanggal()
	{	
		$result = $this->db->query("SELECT created_date FROM tbl_span_biro ORDER BY created_date DESC LIMIT 1");
        
		return $result;
  	}
  
}