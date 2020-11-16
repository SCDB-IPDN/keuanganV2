<?php
class D_praja_model extends CI_Model{

  	public function get_praja()
	{	
		$result = $this->db->query("SELECT * FROM praja GROUP BY nik_praja");

		return $result;
	}
  
  	public function get_detail($nik)
	{	
		$result = $this->db->query("SELECT * FROM praja JOIN orangtua ON praja.nik_praja = orangtua.nik_praja JOIN wali ON orangtua.nik_praja = wali.nik_praja WHERE praja.nik_praja = $nik GROUP BY praja.nik_praja");

		return $result;
	}
}