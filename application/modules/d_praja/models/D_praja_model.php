<?php
class D_praja_model extends CI_Model{

  	public function get_praja()
	{	

		$result = $this->db->query("SELECT *, tahun_masuk_kuliah FROM praja GROUP BY nik_praja");

		return $result;
	}
  
  	public function get_detail($nik)
	{	
		$result = $this->db->query("SELECT * FROM praja JOIN orangtua ON praja.nik_praja = orangtua.nik_praja JOIN wali ON orangtua.nik_praja = wali.nik_praja WHERE praja.nik_praja = $nik GROUP BY praja.nik_praja");

		return $result;
	}
	
	public function edit_praja($input_data)
  	{     

    	$id_praja = $input_data['nik_praja'];
    	$tingkat = $input_data['tingkat'];
    	$hasil = $this->db->where('nik_praja', $id_praja)->update('praja', $input_data);
        return $hasil;    
	}
	
	public function hapus_praja($id_praja)
	{
		$hasil=$this->db->query("DELETE FROM praja WHERE id_praja='$id_praja'");
		return $hasil;
	}

	public function get_status()
	{
		$prov=$this->db->query("SELECT status from praja ");
		return $prov;
	}

	public function get_provinsi()
	{
		$prov=$this->db->query("SELECT provinsi , count(provinsi) as jumlah from praja group by provinsi");
		return $prov;
	}
}
