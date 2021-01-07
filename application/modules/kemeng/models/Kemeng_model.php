<?php
class Kemeng_model extends CI_Model
{
	public function get_fakul()
	{

		$fakul = $this->db->query("SELECT * FROM tbl_fakultas group BY nama_fakultas");

		return $fakul;
	}

	public function get_makul()
	{

		$makul = $this->db->query("SELECT *, tbl_matkul.nama_matkul, tbl_fakultas.nama_fakultas FROM tbl_matkul JOIN tbl_prodi ON tbl_prodi.id_prodi = tbl_matkul.id_prodi JOIN tbl_fakultas ON tbl_fakultas.id_fakultas = tbl_matkul.id_fakultas");

		return $makul;
	}


	function get_sub_category($category_id){
		$query = $this->db->get_where('tbl_prodi', array('id_fakultas' => $category_id));
		return $query;
	}


	public function ubah($ubahmatakuliah){
		
		$id_matkul = $ubahmatakuliah['id_matkul'];
		$ubahmatkul = $this->db->where('id_matkul', $id_matkul)->update('tbl_matkul', $ubahmatakuliah);

		return $ubahmatkul; 	
	}


	function tambahmatkul($input_data)
	{   
		$tamkul = $this->db->insert('tbl_matkul', $input_data);
		return $tamkul;
	}

	function cekdata($id)
	{   
		$sql = $this->db->query("SELECT id_matkul FROM tbl_matkul where id_matkul='$id' ")->result();
		return $sql;
	}


	function del_matkul($id_matkul){

		$hasil=$this->db->query("DELETE FROM tbl_matkul WHERE id_matkul= '$id_matkul' ");
		return $hasil;
	}

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

	$result = $this->db->query("SELECT nama, nip FROM tbl_dosen");
	return $result;

	}

	public function get_nama_matkul()
	{

	$result = $this->db->query("SELECT nama_matkul FROM tbl_matkul ");
	return $result;

	}

	public function get_nama_prodi()
	{

	$result = $this->db->query("SELECT nama_prodi FROM tbl_prodi ");
	return $result;

	}

	public function get_nama_fakultas()
	{

	$result = $this->db->query("SELECT nama_fakultas FROM tbl_fakultas ");
	return $result;

	}
	function edit_plot($editplot){

	$id_plot = $editplot['id_plot'];
	$this->db->where('id_plot', $editplot['id_plot']);
	$this->db->update('tbl_plot_dosen', $editplot);
  	}

	function hapus_plot($id){

		$this->db->where(['id_plot' => $id]);
		$this->db->delete('tbl_plot_dosen');
	// 	$hasil=$this->db->query("DELETE FROM tbl_plot_dosen WHERE id_plot= '$id' ");
	// 	return $hasil;
	}
}