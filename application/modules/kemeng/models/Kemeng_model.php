<?php
class Kemeng_model extends CI_Model
{

	public function get_namdosen()
	{

		$namadosen = $this->db->query("SELECT nama FROM tbl_dosen ORDER BY id_dosen");

		return $namadosen;
    }
    public function get_matkul($prodi)
	{
		return $this->db->select("id_matkul, nama_matkul")
					->order_by("nama_matkul", "ASC")
					->get_where("tbl_matkul", ["id_prodi" => $prodi]);
	}

	public function get_fakul()
	{
		$fakul = $this->db->query("SELECT * FROM tbl_fakultas ORDER BY nama_fakultas");

		return $fakul;
	}
	public function get_prodi($fakultas)
	{
		return $this->db->order_by("nama_prodi", "ASC")->get_where("tbl_prodi", ["id_fakultas" => $fakultas]);
	}

	function attendence_add($data)
	{   
		return $this->db->insert('tbl_absensi', $data);
	}
	//plot dosen
	public function get_all_plot()
	{

	$result = $this->db->query("SELECT * FROM tbl_plot_dosen");
	return $result;

	}

  	function tambah_plot($plot)
 	{

  	$result = $this->db->insert('tbl_plot_dosen', $plot);
  	return $result;

	}
	
	public function get_nama()
	{

	$result = $this->db->query("SELECT nama FROM tbl_dosen ");
	return $result;

	}

	public function get_nama_matkul()
	{

	$result = $this->db->query("SELECT nama_matkul FROM tbl_matkul ");
	return $result;

	}

	public function get_nama_fakultas()
	{

	$result = $this->db->query("SELECT nama_fakultas FROM tbl_fakultas ");
	return $result;

	}

}