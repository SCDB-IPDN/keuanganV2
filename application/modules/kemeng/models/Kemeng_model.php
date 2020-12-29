  
<?php
class Kemeng_model extends CI_Model
{

	public function get_fakultassss($id_fakultas)
	{

		if ($id_fakultas != "Admin"){
			$fakul = $this->db->query("SELECT * FROM tbl_fakultas where id_fakultas='$id_fakultas'");
		}else{

			$fakul = $this->db->query("SELECT * FROM tbl_fakultas group BY nama_fakultas");
		}
		

		return $fakul;
	}



	public function get_makul($id_fakultas)
	{
		if ($id_fakultas != "Admin"){
			$makul = $this->db->query("SELECT *, tbl_matkul.nama_matkul, tbl_fakultas.nama_fakultas FROM tbl_matkul JOIN tbl_prodi ON tbl_prodi.id_prodi = tbl_matkul.id_prodi JOIN tbl_fakultas ON tbl_fakultas.id_fakultas = tbl_matkul.id_fakultas Where tbl_fakultas.id_fakultas ='$id_fakultas' ");
		}else{

			$makul = $this->db->query("SELECT *, tbl_matkul.nama_matkul, tbl_fakultas.nama_fakultas FROM tbl_matkul JOIN tbl_prodi ON tbl_prodi.id_prodi = tbl_matkul.id_prodi JOIN tbl_fakultas ON tbl_fakultas.id_fakultas = tbl_matkul.id_fakultas ");
		}

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

	public function get_presensi($id_absensi)
	{
		if ($id_absensi != "Admin"){
			$this->db->select("tbl_absensi.nip, tbl_absensi.nama_dosen, tbl_absensi.kelas, tbl_fakultas.nama_fakultas, tbl_prodi.nama_prodi, tbl_matkul.nama_matkul");
			$this->db->from("tbl_absensi");
			$this->db->join("tbl_fakultas", "tbl_fakultas.id_fakultas =  tbl_absensi.id_fakultas");
			$this->db->join("tbl_prodi", "tbl_prodi.id_prodi =  tbl_absensi.id_prodi");
			$this->db->join("tbl_matkul", "tbl_matkul.id_matkul =  tbl_absensi.id_matkul");
			$this->db->where("tbl_absensi.tbl_absensi", $id_absensi);
			return $this->db->get();
		} else {
			$this->db->select("tbl_absensi.nip, tbl_absensi.nama_dosen, tbl_absensi.kelas, tbl_fakultas.nama_fakultas, tbl_prodi.nama_prodi, tbl_matkul.nama_matkul");
			$this->db->from("tbl_absensi");
			$this->db->join("tbl_fakultas", "tbl_fakultas.id_fakultas =  tbl_absensi.id_fakultas");
			$this->db->join("tbl_prodi", "tbl_prodi.id_prodi =  tbl_absensi.id_prodi");
			$this->db->join("tbl_matkul", "tbl_matkul.id_matkul =  tbl_absensi.id_matkul");
			$this->db->group_by("id_absensi");
			return $this->db->get();
		}
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

		$namadosen = $this->db->query("SELECT DISTINCT nip,nama FROM tbl_plot_dosen ORDER BY nip");

		return $namadosen;
	}
	
	public function get_matkul($nip, $fakultas, $prodi)
	{
		return $this->db->distinct()->select("id_matkul, nama_matkul")
					->order_by("nama_matkul", "ASC")
					->get_where("tbl_plot_dosen", ["nip" => $nip, "id_fakultas" => $fakultas, "id_prodi" => $prodi]);
	}


	public function get_prodi($nip, $fakultas)
	{
		return $this->db->distinct()->select("id_prodi, nama_prodi")
					->order_by("nama_prodi", "ASC")
					->get_where("tbl_plot_dosen", ["nip" => $nip, "id_fakultas" => $fakultas]);
	}

	public function get_fakultas($nip)
	{
		return $this->db->distinct()->select("id_fakultas, nama_fakultas")
					->order_by("nama_fakultas", "ASC")
					->get_where("tbl_plot_dosen", ["nip" => $nip]);
	}

	public function get_sks($nip, $fakultas, $prodi, $matkul)
	{
		$this->db->select("tbl_plot_dosen.nama, tbl_plot_dosen.indeks, tbl_matkul.sks");
		$this->db->from("tbl_plot_dosen");
		$this->db->join("tbl_matkul", "tbl_matkul.id_matkul =  tbl_plot_dosen.id_matkul");
		$this->db->where("tbl_plot_dosen.nip", $nip);
		$this->db->where("tbl_plot_dosen.id_fakultas", $fakultas);
		$this->db->where("tbl_plot_dosen.id_prodi", $prodi);
		$this->db->where("tbl_plot_dosen.id_matkul", $matkul);
		return $this->db->get();
	}

	function attendence_add($data)
	{   
		// var_dump($data);exit;
		return $this->db->insert('tbl_absensi', $data);
		
	}




}