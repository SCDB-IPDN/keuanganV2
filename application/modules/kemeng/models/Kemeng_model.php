  
<?php
class Kemeng_model extends CI_Model
{

	public function get_fakul()
	{
	
			$fakul = $this->db->query("SELECT * FROM tbl_fakultas group BY nama_fakultas");

		return $fakul;
	}


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

		$namadosen = $this->db->query("SELECT nip,nama FROM tbl_dosen ORDER BY id_dosen");

		return $namadosen;
	}
	
	public function get_matkul($prodi)
	{
		return $this->db->select("id_matkul, nama_matkul,sks")
					->order_by("nama_matkul", "ASC")
					->get_where("tbl_matkul", ["id_prodi" => $prodi]);
	}


	public function get_prodi($fakultas)
	{
		return $this->db->order_by("nama_prodi", "ASC")->get_where("tbl_prodi", ["id_fakultas" => $fakultas]);
	}

	function attendence_add($data)
	{   
		// var_dump($data);exit;
		return $this->db->insert('tbl_absensi', $data);
		
	}

	function get_absen_bulan($date, $nip) {
		$date_t = explode('-', $date);
		$index = $this->get_index_honor($nip)->row_array()['index'];

		// echo $index;exit;
		
		$this->db->select("tbl_absensi.id_matkul AS 'Kode Mata Kuliah', tbl_matkul.nama_matkul AS 'Nama Mata Kuliah',
			LOWER(tbl_prodi.nama_prodi) AS 'Program Studi', UPPER(tbl_absensi.kelas) AS 'Kelas', tbl_absensi.tanggal AS 'Tanggal',
			tbl_absensi.jam AS 'Shift', tbl_absensi.sks AS 'Durasi (SKS)', FORMAT($index,0,'de_DE') AS 'Honor Per SKS',
			tbl_absensi.sks AS 'Indek', FORMAT(tbl_absensi.sks*$index,0,'de_DE') AS 'Jumlah Honor'");
		$this->db->from('tbl_absensi');
		$this->db->join('tbl_matkul', "tbl_absensi.id_matkul=tbl_matkul.id_matkul");
		$this->db->join('tbl_prodi', "tbl_matkul.id_prodi = tbl_prodi.id_prodi");
		$this->db->where('YEAR(tbl_absensi.tanggal)', $date_t[1]);
		$this->db->where('MONTH(tbl_absensi.tanggal)', $date_t[0]);
		$this->db->where('tbl_absensi.nip', $nip);
		$this->db->order_by('tbl_absensi.tanggal', 'ASC');
		$res = $this->db->get();
		return $res;
	}

	function get_index_honor($nip) {
		$this->db->select("index");
		$this->db->from("tbl_dosen");
		$this->db->join('tbl_honor_dosen', "tbl_dosen.jabatan=tbl_honor_dosen.jabatan");
		$this->db->where('tbl_dosen.nip', $nip);
		$res = $this->db->get();
		return $res;
	}

}