<?php
class D_sas_model extends CI_Model{

  public function get_all_kampus()
	{	
		$result = $this->db->query("SELECT tbl_satker.kode_satker,tbl_satker.alias,tbl_satker.nama_satker as nama , SUM(output_sas.pagu) AS pagu , SUM(output_sas.realisasi) AS realisasi FROM tbl_satker JOIN output_sas ON tbl_satker.kode_satker = output_sas.kode_satker GROUP BY tbl_satker.kode_satker");

		return $result;
  }

  public function get_all_biro($kode_satker)
	{	

		$result = $this->db->query("SELECT tbl_satker_biro.kode_satker_biro , output_sas.id_b, tbl_satker_biro.nama_satker_biro as nama, tbl_satker_biro.alias as alias, SUM(output_sas.pagu) AS pagu , SUM(output_sas.realisasi) AS realisasi FROM tbl_satker_biro JOIN output_sas ON tbl_satker_biro.kode_satker_biro = output_sas.id_b WHERE output_sas.kode_satker = $kode_satker GROUP BY tbl_satker_biro.kode_satker_biro ");
        
		return $result;
  }


  public function get_all_unit($unit_sas)
	{	
		$result = $this->db->query("SELECT unit_sas.id_b, unit_sas.id_c, unit_sas.ket as nama, unit_sas.ket as alia, SUM(output_sas.pagu) AS pagu , SUM(output_sas.realisasi) AS realisasi FROM unit_sas JOIN output_sas ON unit_sas.id_b = output_sas.id_b WHERE unit_sas.id_b = $unit_sas GROUP BY unit_sas.id_c ");

		// $result = $this->db->query("SELECT id_b, ket as nama FROM unit_sas where id_b = $unit_sas");

		// $resul = $this->db->query("SELECT unit_sas.id_b, unit_sas.ket as nama , sum(output_sas.pagu) as pagu, sum(output_sas.realisasi) as realisasi, from output_sas JOIN unit_sas on output_sas.id_b = output_sas.id_b where unit_sas.id_b = $id_b GROUP BY unit_sas.id_b");

        
		return $result;

  }

  public function get_all_unit_satker($kode)
	{	
		$result = $this->db->query("SELECT unit_sas.id_b, unit_sas.id_c, unit_sas.ket as nama, unit_sas.ket as alias, SUM(output_sas.pagu) AS pagu , SUM(output_sas.realisasi) AS realisasi FROM unit_sas JOIN output_sas ON unit_sas.id_b = output_sas.id_b WHERE unit_sas.kode_satker = $kode GROUP BY unit_sas.id_c ");

		// $result = $this->db->query("SELECT id_b, ket as nama FROM unit_sas where id_b = $unit_sas");

		// $resul = $this->db->query("SELECT unit_sas.id_b, unit_sas.ket as nama , sum(output_sas.pagu) as pagu, sum(output_sas.realisasi) as realisasi, from output_sas JOIN unit_sas on output_sas.id_b = output_sas.id_b where unit_sas.id_b = $id_b GROUP BY unit_sas.id_b");

        
		return $result;

  }

  public function get_all_output($output_sas)
	{	

		// $result = $this->db->query("SELECT output_sas.pagu,output_sas.realisasi,ket as nama FROM output_sas where id_c = $output_sas");
		$result = $this->db->query("SELECT output_sas.pagu,output_sas.realisasi,ket as nama, ket as alias FROM output_sas where id_c = $output_sas");
        
		return $result;
  }
  
}