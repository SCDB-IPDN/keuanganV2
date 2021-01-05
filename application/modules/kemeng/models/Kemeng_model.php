  
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

	function get_honor_all($nip){

		// $this->db->select("tbl_plot_dosen.nip,tbl_plot_dosen.nama,tbl_honor_dosen.jabatan, tbl_honor_dosen.index, tbl_plot_dosen.nama_fakultas,tbl_plot_dosen.nama_matkul, sum(tbl_plot_dosen.sks) as totalsks, 9 as kewajiban");
		// $this->db->from("tbl_dosen");
		// $this->db->join("tbl_plot_dosen", " tbl_dosen.nip= tbl_plot_dosen.nip");
		// $this->db->join("tbl_honor_dosen", " tbl_honor_dosen.jabatan = tbl_dosen.jabatan ");
		// $this->db->where("tbl_plot_dosen.nip='$nip'");
		// $this->db->where("CASE WHEN SUM(tbl_plot_dosen.sks) > 9  THEN SUM(tbl_plot_dosen.sks)-9
		// 	WHEN SUM(tbl_plot_dosen.sks) <= 9 then 0
		// 	END AS kelebihan,
		// 	CASE WHEN SUM(tbl_plot_dosen.sks) > 9  THEN (SUM(tbl_plot_dosen.sks)-9)*(tbl_honor_dosen.index)
		// 	WHEN SUM(tbl_plot_dosen.sks) <= 9 then 0
		// 	END AS total");
		// $result = $this->db->get();
		// $in = json_decode($nip);
		// $nya = $nip[]
		$b = array();
		$total = count($nip);
		for ($i=0; $i<$total; $i++){
			$bebas = $nip[$i]['nip'];
			$b []=$bebas;
			// var_dump($b);
		}

		// var_dump(json_encode($b));
		// exit();
		// foreach ($nip as $a) {
		// 	$b[] = $a;

		// }
		$dadah = json_encode($b);

		$bebas= preg_replace('/[^0-9\",]/', '', $dadah);
		// var_dump($bebas);
		// exit();
		// $terserah = json_decode($bebas);
		// var_dump($terserah);exit();
		// echo "SELECT tbl_plot_dosen.nip,tbl_plot_dosen.nama,tbl_honor_dosen.jabatan, tbl_honor_dosen.index, tbl_plot_dosen.nama_fakultas,tbl_plot_dosen.nama_matkul, sum(tbl_plot_dosen.sks) as totalsks, 9 as kewajiban, 
		// CASE WHEN SUM(tbl_plot_dosen.sks) > 9  THEN SUM(tbl_plot_dosen.sks)-9
		// WHEN SUM(tbl_plot_dosen.sks) <= 9 then 0
		// END AS kelebihan,
		// CASE WHEN SUM(tbl_plot_dosen.sks) > 9  THEN (SUM(tbl_plot_dosen.sks)-9)*(tbl_honor_dosen.index)
		// WHEN SUM(tbl_plot_dosen.sks) <= 9 then 0
		// END AS total
		// FROM tbl_dosen JOIN tbl_plot_dosen on tbl_dosen.nip= tbl_plot_dosen.nip JOIN tbl_honor_dosen on tbl_honor_dosen.jabatan = tbl_dosen.jabatan
		// WHERE tbl_plot_dosen.nip IN ($bebas) ";exit();
		$query = $this->db->query("SELECT tbl_plot_dosen.nip,tbl_plot_dosen.nama,tbl_honor_dosen.jabatan, tbl_honor_dosen.index, tbl_plot_dosen.nama_fakultas,tbl_plot_dosen.nama_matkul, sum(tbl_plot_dosen.sks) as totalsks, 9 as kewajiban, 
			CASE WHEN SUM(tbl_plot_dosen.sks) > 9  THEN SUM(tbl_plot_dosen.sks)-9
			WHEN SUM(tbl_plot_dosen.sks) <= 9 then 0
			END AS kelebihan,
			CASE WHEN SUM(tbl_plot_dosen.sks) > 9  THEN (SUM(tbl_plot_dosen.sks)-9)*(tbl_honor_dosen.index)
			WHEN SUM(tbl_plot_dosen.sks) <= 9 then 0
			END AS total
			FROM tbl_dosen JOIN tbl_plot_dosen on tbl_dosen.nip= tbl_plot_dosen.nip JOIN tbl_honor_dosen on tbl_honor_dosen.jabatan = tbl_dosen.jabatan
			WHERE tbl_plot_dosen.nip='$bebas' ");
		

		return $query;
	}

	function get_fakulhonor(){
		// var_dump($id_fakultas);exit();
		$query = $this->db->query("SELECT tbl_plot_dosen.nip,tbl_plot_dosen.nama,tbl_dosen.jabatan, sum(tbl_plot_dosen.sks) as totalsks,9 as kewajiban,
			CASE WHEN SUM(tbl_plot_dosen.sks) > 9  THEN SUM(tbl_plot_dosen.sks)-9
			WHEN SUM(tbl_plot_dosen.sks) <= 9 then 0
			END AS kelebihan,
			CASE WHEN SUM(tbl_plot_dosen.sks) > 9  THEN (SUM(tbl_plot_dosen.sks)-9)*(tbl_honor_dosen.index)
			WHEN SUM(tbl_plot_dosen.sks) <= 9 then 0
			END AS total
			FROM `tbl_plot_dosen` join tbl_dosen on tbl_plot_dosen.nip = tbl_dosen.nip JOIN tbl_honor_dosen on tbl_honor_dosen.jabatan = tbl_dosen.jabatan 
			
			group by tbl_plot_dosen.nip");
			// where tbl_plot_dosen.id_fakultas='$id_fakultas'

		return $query;
	}

	function get_index_honor($nip) {
		$this->db->select("index");
		$this->db->from("tbl_dosen");
		$this->db->join('tbl_honor_dosen', "tbl_dosen.jabatan=tbl_honor_dosen.jabatan");
		$this->db->where('tbl_dosen.nip', $nip);
		$res = $this->db->get();
		return $res;
	}

	function get_all_dosen(){

		$query = "SELECT * from tbl_plot_dosen ";
		
		
		return $query;
	}


	function nama_fakultas(){

		$query =  $this->db->query("SELECT id_fakultas from tbl_plot_dosen ");
		
		
		return $query;
	}

	function nama_dosen(){

		$query =  $this->db->query("SELECT nip from tbl_plot_dosen ");
		
		
		return $query;
	}


}