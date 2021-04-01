<?php
class D_sas_model extends CI_Model{

	public function get_all_kampus()
	{
		$kampus = $this->db->query("SELECT tbl_satker.nama_satker as nama,  output_sas.kode_satker, output_sas.id_b as satker, SUM(output_sas.pagu) as pagu, SUM(output_sas.realisasi) as realisasi FROM output_sas JOIN tbl_satker ON tbl_satker.kode_satker = output_sas.kode_satker GROUP BY output_sas.kode_satker");

		return $kampus;
	}
	public function get_kegiatan($kode)
	{
		$kegiatan = $this->db->query("SELECT unit_sas.ket as nama, unit_sas.id_b as satker , SUM(output_sas.pagu) as pagu, SUM(output_sas.realisasi) as realisasi FROM akun_sas JOIN kegiatan_sas ON unit_sas.id_b = output_sas.id_b Where unit_sas.kode_satker = $kode GROUP BY unit_sas.id_b ORDER BY unit_sas.id_b");
		return $kegiatan;
	}

	public function get_output($kegiatan)
	{
		$output = $this->db->query("SELECT output_sas.ket as nama ,output_sas.id_c, unit_sas.id_c as satker, SUM(output_sas.pagu) as pagu, SUM(output_sas.realisasi) as realisasi FROM akun_sas WHERE output_sas.id_b = $kegiatan GROUP BY output_sas.id_c ORDER BY output_sas.id_c ");
		return $output;
	}


}