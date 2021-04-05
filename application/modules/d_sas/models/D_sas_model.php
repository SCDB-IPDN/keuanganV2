<?php
class D_sas_model extends CI_Model
{

	public function get_all_kampus()
	{
		$kampus = $this->db->query("SELECT tbl_satker.nama_satker as nama,  suboutput_sas.kode_satker as satker, suboutput_sas.id_b, SUM(suboutput_sas.pagu) as pagu, SUM(suboutput_sas.realisasi) as realisasi FROM suboutput_sas JOIN tbl_satker ON tbl_satker.kode_satker = suboutput_sas.kode_satker GROUP BY suboutput_sas.kode_satker");

		return $kampus;
	}
	public function get_kegiatan($kode)
	{
		$kegiatan = $this->db->query("SELECT unit_sas.ket as nama, unit_sas.id_b as satker, SUM(suboutput_sas.pagu) as pagu, SUM(suboutput_sas.realisasi) as realisasi FROM unit_sas JOIN suboutput_sas ON unit_sas.id_b = suboutput_sas.id_b Where unit_sas.kode_satker = $kode GROUP BY unit_sas.id_b ORDER BY unit_sas.id_b
		");
		return $kegiatan;
	}

	public function get_output($kegiatan)
	{
		$output = $this->db->query("SELECT output_sas.ket as nama, output_sas.id_c as satker, SUM(suboutput_sas.pagu) as pagu, SUM(suboutput_sas.realisasi) as realisasi FROM output_sas JOIN suboutput_sas ON output_sas.id_c = suboutput_sas.id_c Where output_sas.id_b = $kegiatan GROUP BY output_sas.id_c ORDER BY output_sas.id_c");
		return $output;
	}

	public function get_suboutput($out)
	{
		$suboutput = $this->db->query("SELECT suboutput_sas.ket as nama, suboutput_sas.id_b, pagu,realisasi FROM suboutput_sas Where suboutput_sas.id_c = '$out'  ORDER BY suboutput_sas.id_c ");
		return $suboutput;
	}
}
