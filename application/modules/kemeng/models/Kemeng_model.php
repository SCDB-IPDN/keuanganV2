<?php
class Kemeng_model extends CI_Model
{

	public function get_namdosen()
	{

		$namadosen = $this->db->query("SELECT * FROM tbl_dosen ORDER BY id_dosen");

		return $namadosen;
    }
    public function get_nammatkul()
	{

		$namamatkul = $this->db->query("SELECT * FROM tbl_matkul ORDER BY nama_matkul");

		return $namamatkul;
	}
}