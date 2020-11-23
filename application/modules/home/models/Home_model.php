<?php
class Home_model extends CI_Model{

  // Kepegawaian
  public function jumlah_peg()
  {
    $peg = $this->db->query("SELECT pns, thl FROM (SELECT count(*) as pns FROM tbl_pns) as pns, (SELECT count(*) as thl FROM tbl_thl) as thl")->result();

    return $peg;
  }

  public function jum_eselon()
  {
    $result = $this->db->query("SELECT SUM(eselon LIKE 'I.%') as I, SUM(eselon LIKE 'II.%') as II, SUM(eselon LIKE 'III.%') as III, SUM(eselon LIKE 'IV.%') as IV FROM tbl_pns")->result();

    return $result;
  }

  public function dosen()
  {
    $result = $this->db->query("SELECT SUM(jabatan LIKE '%ASISTEN AHLI%') as asisten_ahli, SUM(jabatan LIKE '%GURU BESAR%') as guru_besar, SUM(jabatan LIKE '%LEKTOR%') as lektor, SUM(jabatan LIKE '%LEKTOR KEPALA%') as lektor_kepala FROM tbl_pns")->result();
    return $result;
  }

  public function app_perpus()
  {
    $perpus = $this->db->query("SELECT * FROM tbl_apps WHERE kategori_apps = 1 AND status= 1 ")->result();

    return $perpus;
  }

  public function app_akademik()
  {
    $akademik = $this->db->query("SELECT * FROM tbl_apps WHERE kategori_apps = 2 AND status= 1")->result();

    return $akademik;
  }

  public function app_keuangan()
  {
    $keuangan = $this->db->query("SELECT * FROM tbl_apps WHERE kategori_apps = 3 AND status= 1")->result();

    return $keuangan;
  }

  public function app_riset()
  {
    $riset = $this->db->query("SELECT * FROM tbl_apps WHERE kategori_apps = 4 AND status= 1")->result();

    return $riset;
  }

  public function app_tp()
  {
    $tp = $this->db->query("SELECT * FROM tbl_apps WHERE kategori_apps = 5 AND status= 1")->result();

    return $tp;
  }

  public function app_keprajaan()
  {
    $keprajaan = $this->db->query("SELECT * FROM tbl_apps WHERE kategori_apps = 6 AND status= 1")->result();

    return $keprajaan;
  }

  public function app_pascasarjana()
  {
    $pascasarjana = $this->db->query("SELECT * FROM tbl_apps WHERE kategori_apps = 7 AND status= 1")->result();

    return $pascasarjana;
  }

  public function app_pddikti()
  {
    $pddikti = $this->db->query("SELECT * FROM tbl_apps WHERE kategori_apps = 8 AND status= 1")->result();

    return $pddikti;
  }

  public function app_kepegawaian()
  {
    $result = $this->db->query("SELECT * FROM tbl_apps WHERE kategori_apps = 9 AND status= 1")->result();

    return $result;
  }
  
  public function app_kerjasama()
  {
    $result = $this->db->query("SELECT * FROM tbl_apps WHERE kategori_apps = 10 AND status= 1")->result();

    return $result;
  }

  public function app_pengasuhan()
  {
    $result = $this->db->query("SELECT * FROM tbl_apps WHERE kategori_apps = 11 AND status= 1")->result();

    return $result;
  }

  public function get_span()
	{	
    $result = $this->db->query("SELECT SUM(pagu_t) AS pagu, sum(realisasi_t) as realisasi
              FROM tbl_span
              GROUP BY created_date
              ORDER BY created_date DESC LIMIT 1");
        
		return $result;
  }

  public function get_span_jatinangor(){
    $result = $this->db->query("SELECT persentase_t FROM tbl_span WHERE kode_satker = 448302 ORDER BY created_date DESC LIMIT 1")->result();

    return $result;
  }

  public function get_all_span_biro()
	{	
		$result = $this->db->query("SELECT *, alias FROM (SELECT a.*, b.alias FROM tbl_span_biro as a JOIN tbl_satker_biro as b ON a.kode_satker_biro=b.kode_satker_biro ORDER BY a.id_span_biro DESC limit 4) as k ORDER BY alias ASC")->result();

		return $result;
  }

  public function get_all_pok_biro()
	{	
		$result = $this->db->query("SELECT (100*sum(realisasi)/sum(pagu)) as persen FROM out_pok")->result();

    return $result;
  }

  public function get_all_sas()
	{	
		$result = $this->db->query("SELECT (100*sum(output_sas.realisasi)/sum(output_sas.pagu)) as persen FROM output_sas JOIN tbl_satker ON output_sas.kode_satker = tbl_satker.kode_satker")->result();

    return $result;
  }

   public function get_praja()
  { 
    $result = $this->db->query("SELECT * FROM praja")->result();

    return $result;
  }

   public function get_jk_praja()
  { 
    $result = $this->db->query("SELECT SUM(jk = 'p') AS jumlahP, SUM(jk = 'l') AS jumlahL FROM praja")->result();

    return $result;
  }
  
  public function jumlah_praja()
  {
    $praja = $this->db->query("SELECT count(*) as praja from praja")->result();

    return $praja;
  }

  public function status_praja()
  {
    $result = $this->db->query("SELECT SUM(status = 'turuntingkat') as tt, SUM(status = 'aktif') as aktif, SUM(status = 'cuti') as cuti FROM praja")->result();

    return $result;
  }
  
  
}
