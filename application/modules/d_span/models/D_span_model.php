<?php
class D_span_model extends CI_Model{

  public function get_all_dashboard()
	{	
		$result = $this->db->query("SELECT a.*, b.alias as alias FROM tbl_span as a JOIN tbl_satker as b ON a.kode_satker=b.kode_satker ORDER BY created_date DESC limit 8 ");
        
		return $result;
  }

  // public function jumlah_pagu()
	// {	
	// 	$result = $this->db->query("SELECT SUM(pagu) AS pagu, sum(realisasi) as realisasi, sum(sisa_pagu) as sisa_pagu
  //   FROM tbl_span
  //   GROUP BY created_at
  //   ORDER BY created_at DESC LIMIT 1");
        
	// 	return $result;
  // }

  public function get_tanggal()
	{	
		$result = $this->db->query("SELECT created_date FROM tbl_span ORDER BY created_date DESC LIMIT 1");
        
		return $result;
  }
  
}