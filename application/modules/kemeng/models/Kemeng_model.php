  
<?php
class Kemeng_model extends CI_Model
{
	public function cek_dosen($nip)
	{
		$result = $this->db->query("SELECT nip FROM tbl_dosen_pddikti WHERE nip = '$nip'")->result();

		return $result;
	}

	public function jadwal_dosen($nip, $semester)
	{
		if($nip == 'Admin' && $nip != "SuperAdmin"){
			$result = $this->db->query("SELECT * FROM tbl_plot_dosen WHERE semester = '$semester'")->result();
		}else{
			$result = $this->db->query("SELECT * FROM tbl_plot_dosen WHERE nip = '$nip' AND semester = '$semester'")->result();
		}

		return $result;
	}

	public function get_fakul()
	{

		$fakul = $this->db->query("SELECT * FROM tbl_fakultas group BY nama_fakultas");

		return $fakul;
	}

	public function get_fakultassss($id_fakultas)
	{

		if ($id_fakultas != "SuperAdmin" && $id_fakultas != "Admin"){
			$fakul = $this->db->query("SELECT * FROM tbl_fakultas where id_fakultas='$id_fakultas'");
		}else{

			$fakul = $this->db->query("SELECT * FROM tbl_fakultas group BY nama_fakultas");
		}
		

		return $fakul;
	}

	public function get_makul($id_fakultas)
	{
		if ($id_fakultas != "SuperAdmin" && $id_fakultas != "Admin"){
			$makul = $this->db->query("SELECT *, tbl_matkul.nama_matkul, tbl_fakultas.nama_fakultas FROM tbl_matkul JOIN tbl_prodi ON tbl_prodi.id_prodi = tbl_matkul.id_prodi JOIN tbl_fakultas ON tbl_fakultas.id_fakultas = tbl_matkul.id_fakultas Where tbl_fakultas.id_fakultas ='$id_fakultas' ");
		}else{

			$makul = $this->db->query("SELECT *, tbl_matkul.nama_matkul, tbl_fakultas.nama_fakultas FROM tbl_matkul JOIN tbl_prodi ON tbl_prodi.id_prodi = tbl_matkul.id_prodi JOIN tbl_fakultas ON tbl_fakultas.id_fakultas = tbl_matkul.id_fakultas ");
		}

		return $makul;
	}

	public function log($log){
		return $this->db->insert('tbl_log', $log);
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
		$this->db->select("tbl_absensi.nip, tbl_absensi.nama_dosen, tbl_absensi.kelas, tbl_fakultas.nama_fakultas, tbl_prodi.nama_prodi, tbl_matkul.nama_matkul, tbl_absensi.timestamp");
		$this->db->from("tbl_absensi");
		$this->db->join("tbl_fakultas", "tbl_fakultas.id_fakultas =  tbl_absensi.id_fakultas");
		$this->db->join("tbl_prodi", "tbl_prodi.id_prodi =  tbl_absensi.id_prodi");
		$this->db->join("tbl_matkul", "tbl_matkul.id_matkul =  tbl_absensi.id_matkul");

		if ($id_absensi != "Admin" && $id_absensi != "SuperAdmin"){
			$this->db->where("tbl_absensi.id_fakultas", $id_absensi);
		} else {
			$this->db->group_by("tbl_absensi.id_absensi");
		}
		
		$this->db->order_by("tbl_absensi.timestamp", "DESC");
		return $this->db->get();
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

	//HONOR
	function get_absen_bulan($date, $nip) {
		$date_t = explode('-', $date);
		$index = $this->get_index_honor($nip)->row_array()['index'];

		// echo $index;exit;
		
		$this->db->select("tbl_absensi.id_matkul AS 'Kode Mata Kuliah', tbl_matkul.nama_matkul AS 'Nama Mata Kuliah',
			LOWER(tbl_prodi.nama_prodi) AS 'Program Studi', UPPER(tbl_absensi.kelas) AS 'Kelas', DATE(tbl_absensi.timestamp) AS 'Tanggal',
			TIME(tbl_absensi.timestamp) AS 'Shift', tbl_absensi.sks AS 'Durasi (SKS)', FORMAT($index,0,'de_DE') AS 'Honor Per SKS',
			tbl_absensi.indeks AS 'Indeks', FORMAT(tbl_absensi.indeks*$index,0,'de_DE') AS 'Jumlah Honor'");
		$this->db->from('tbl_absensi');
		$this->db->join('tbl_matkul', "tbl_absensi.id_matkul=tbl_matkul.id_matkul");
		$this->db->join('tbl_prodi', "tbl_matkul.id_prodi = tbl_prodi.id_prodi");
		$this->db->where('YEAR(tbl_absensi.timestamp)', $date_t[1]);
		$this->db->where('MONTH(tbl_absensi.timestamp)', $date_t[0]);
		$this->db->where('tbl_absensi.nip', $nip);
		$this->db->order_by('DATE(tbl_absensi.timestamp)', 'ASC');
		$res = $this->db->get();
		return $res;
	}
	//END HONOR

	function get_honor_allinone($id_fakultas){
		$query = $this->db->query("SELECT tbl_plot_dosen.nip,tbl_plot_dosen.nama,tbl_plot_dosen.nama_matkul,tbl_dosen_pddikti.jabatan,  sum(tbl_plot_dosen.sks) as totalsks, 9 as kewajiban, 
			CASE WHEN SUM(tbl_plot_dosen.sks) > 9  THEN SUM(tbl_plot_dosen.sks)-9
			WHEN SUM(tbl_plot_dosen.sks) <= 9 then 0
			END AS kelebihan,
			CASE WHEN SUM(tbl_plot_dosen.sks) > 9  THEN (SUM(tbl_plot_dosen.sks)-9)*(tbl_honor_dosen.index)
			WHEN SUM(tbl_plot_dosen.sks) <= 9 then 0
			END AS total
			FROM tbl_dosen_pddikti JOIN tbl_plot_dosen on tbl_dosen_pddikti.nip= tbl_plot_dosen.nip JOIN tbl_honor_dosen on tbl_honor_dosen.jabatan = tbl_dosen_pddikti.jabatan
			WHERE tbl_plot_dosen.id_fakultas ='$id_fakultas' GROUP BY tbl_plot_dosen.nip ");
		
		return $query;
	}

	function nihcoba($id_fakultas,$nip){
		$b = array();
		$total = count($nip);

		for ($i=0; $i<$total; $i++){
			$bebas = $nip[$i]->nip;

			$b []=$bebas;
		}

		$dadah = json_encode($b);

		$bebas= preg_replace('/[^0-9\",]/', '', $dadah);
		
		if ($bebas != NULL) {
			$query = $this->db->query("SELECT tbl_plot_dosen.nip,tbl_plot_dosen.nama_matkul,tbl_plot_dosen.sks, 9 as kewajiban FROM tbl_dosen_pddikti JOIN tbl_plot_dosen on tbl_dosen_pddikti.nip= tbl_plot_dosen.nip JOIN tbl_honor_dosen on tbl_honor_dosen.jabatan = tbl_dosen_pddikti.jabatan WHERE tbl_plot_dosen.id_fakultas ='$id_fakultas' and tbl_plot_dosen.nip IN ($bebas)")->result();
			return $query;
		}
	}

	function cobanip($id_fakultas){
		$query = $this->db->query("SELECT nip FROM tbl_plot_dosen WHERE id_fakultas ='$id_fakultas'");
		
		return $query;
	}

	function get_fakulhonor(){
		$query = $this->db->query("SELECT tbl_plot_dosen.nip,tbl_plot_dosen.nama,tbl_dosen_pddikti.jabatan, sum(tbl_plot_dosen.sks) as totalsks,9 as kewajiban,
			CASE WHEN SUM(tbl_plot_dosen.sks) > 9  THEN SUM(tbl_plot_dosen.sks)-9
			WHEN SUM(tbl_plot_dosen.sks) <= 9 then 0
			END AS kelebihan,
			CASE WHEN SUM(tbl_plot_dosen.sks) > 9  THEN (SUM(tbl_plot_dosen.sks)-9)*(tbl_honor_dosen.index)
			WHEN SUM(tbl_plot_dosen.sks) <= 9 then 0
			END AS total
			FROM `tbl_plot_dosen` join tbl_dosen_pddikti on tbl_plot_dosen.nip = tbl_dosen_pddikti.nip JOIN tbl_honor_dosen on tbl_honor_dosen.jabatan = tbl_dosen_pddikti.jabatan
			group by tbl_plot_dosen.nip");

		return $query;
	}

	function get_index_honor($nip) {
		$this->db->select("index");
		$this->db->from("tbl_dosen_pddikti");
		$this->db->join('tbl_honor_dosen', "tbl_dosen_pddikti.jabatan=tbl_honor_dosen.jabatan");
		$this->db->where('tbl_dosen_pddikti.nip', $nip);
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

	function matkul_dosen($nip){
		$query =  $this->db->query("SELECT nip,nama_matkul,sks FROM `tbl_plot_dosen` WHERE nip='$nip'");
				
		return $query;
	}

	//PLOT
	public function get_all_plot($id_fakultas){
		if($id_fakultas != 'Admin' && $id_fakultas != 'SuperAdmin'){
			$result = $this->db->query("SELECT * FROM tbl_plot_dosen WHERE id_fakultas = '$id_fakultas'");
		}else{
			$result = $this->db->query("SELECT * FROM tbl_plot_dosen");
		}

		return $result;
	}

  	function tambah_plot($plot){
		$result = $this->db->insert('tbl_plot_dosen', $plot);
		return $result;
	}
	
	public function get_nama(){
		$result = $this->db->query("SELECT nama, nip FROM tbl_dosen_pddikti");
		return $result;
	}

	public function get_nama_matkul(){
		$result = $this->db->query("SELECT nama_matkul, id_matkul FROM tbl_matkul ");
		return $result;
	}

	public function get_nama_prodi(){
		$result = $this->db->query("SELECT nama_prodi, id_prodi FROM tbl_prodi ");
		return $result;
	}

	public function get_nama_fakultas($role){
		if($role != 'Admin' && $role != 'SuperAdmin'){
			$result = $this->db->query("SELECT nama_fakultas, id_fakultas FROM tbl_fakultas WHERE id_fakultas = '$role'");
		}else{
			$result = $this->db->query("SELECT nama_fakultas, id_fakultas FROM tbl_fakultas ");
		}
		return $result;
	}

	function edit_plot($editplot){
		$this->db->where('id_plot', $editplot['id_plot']);
		$this->db->update('tbl_plot_dosen', $editplot);
  	}

	function hapus_plot($id){

		$this->db->where(['id_plot' => $id]);
		$this->db->delete('tbl_plot_dosen');
	// 	$hasil=$this->db->query("DELETE FROM tbl_plot_dosen WHERE id_plot= '$id' ");
	// 	return $hasil;
	}
	
	public function ProdiByFakultasId($fakultas_id){
        $query = $this->db->get_where('tbl_prodi', array('id_fakultas' => $fakultas_id));
        return $query->result();
    }

    public function MatkulByProdiId($prodi_id){
        $query = $this->db->get_where('tbl_matkul', array('id_prodi' => $prodi_id));
        return $query->result();
	}

	public function SksByMatkul($sks){
        $query = $this->db->get_where('tbl_matkul', array('id_matkul' => $sks));
        return $query->result();
	}

	public function SemesterByMatkul($semester){
        $query = $this->db->get_where('tbl_matkul', array('id_matkul' => $semester));
        return $query->result();
	}
	
	public function getRowFakultas($id){
		$query = $this->db->get_where('tbl_fakultas', ['id_fakultas' => $id]);
		return $query->row();
	}
	
	public function getRowProdi($id){
		$query = $this->db->get_where('tbl_prodi', ['id_prodi' => $id]);
		return $query->row();
	}
	
	public function getRowMatkul($id){
		$query = $this->db->get_where('tbl_matkul', ['id_matkul' => $id]);
		return $query->row();
	}

	public function getRowSks($id){
		$query = $this->db->get_where('tbl_matkul', ['id_prodi' => $id]);
		return $query->row();
	}
	//END PLOT
}