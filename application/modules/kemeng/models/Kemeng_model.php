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

	public function get_fakul()
	{

		$fakul = $this->db->query("SELECT * FROM tbl_fakultas ORDER BY nama_fakultas");

		return $fakul;
	}
	public function get_smt()
	{

		$smt = $this->db->query("SELECT DISTINCT semester FROM tbl_matkul");

		return $smt;
	}
	function namdosens($namdosen){
		$this->db->like('nama_dosen', $namdosen, 'both');
		$this->db->order_by('nama_dosen', 'ASC');
		$this->db->limit(10);
		return $this->db->get('blog')->result();
	}
}