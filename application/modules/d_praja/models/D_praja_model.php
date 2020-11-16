<?php
class D_praja_model extends CI_Model{

  	public function get_praja()
	{	
		$result = $this->db->query("SELECT * FROM praja GROUP BY nik_praja");

		return $result;
	}
  
  	public function get_detail($nik)
	{	
		$result = $this->db->query("SELECT * FROM praja WHERE nik_praja = $nik GROUP BY nik_praja");

		return $result;
	}
}