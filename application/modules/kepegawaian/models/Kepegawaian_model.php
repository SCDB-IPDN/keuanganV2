<?php
class Kepegawaian_model extends CI_Model{

  function cek_pegawai($nip)
	{   
    $cek_peg = $this->db->query("SELECT * FROM tbl_pns WHERE nip='$nip'")->result();
    return $cek_peg;
  }

  function get_pendidikan()
	{   
    $tingkat = $this->db->query("SELECT * FROM tbl_pendidikan")->result();
    return $tingkat;
  }
  function get_namasatker()
	{   
    $nama_satker = $this->db->query("SELECT * FROM tbl_satker")->result();
    return $nama_satker;
  }

  public function log($log){
    return $this->db->insert('tbl_log', $log);
  } 

  //DOSEN
  public function get_all_dosen()
	{	
    $result = $this->db->query("SELECT * FROM tbl_dosen ORDER BY updated_date DESC");

    return $result;
  }

  public function get_not_serdos()
	{
    $result = $this->db->query("SELECT * FROM tbl_dosen WHERE serdos = ''");
    
    return $result;
  }

  public function get_not_nidn()
	{
    $result = $this->db->query("SELECT * FROM tbl_dosen WHERE nidn = 0");
    return $result;
  }

  function tambah_dosen($input_data)
	{   
    $result = $this->db->insert('tbl_dosen', $input_data);
    return $result;
  }

  function edit_dosen($input_data)
  {       
    $id = $input_data['id_dosen'];
    $hasil = $this->db->where('id_dosen', $id)->update('tbl_dosen', $input_data);
    
    return $hasil;    
  }

  function hapus_dosen($id){
    $hasil=$this->db->query("DELETE FROM tbl_dosen WHERE id_dosen='$id'");
    return $hasil;
  }

  // PNS
  public function get_all_pns()
	{	
    // $result = $this->db->query("SELECT * FROM tbl_pns");

    $result = $this->db->query("SELECT a.*, b.jabatan as jabatan_dosen FROM tbl_pns as a LEFT JOIN tbl_dosen_pddikti as b ON SUBSTR(b.nip, 1, 17) LIKE SUBSTR(a.nip, 1, 17)");

    return $result;
  }

  public function search_pns($penempatan)
	{
    if($penempatan == 'JATINANGOR'){
      return $this->db->query("SELECT a.*, b.jabatan as jabatan_dosen, 'JATINANGOR' as penempatan
        FROM tbl_pns as a LEFT JOIN tbl_dosen_pddikti as b ON SUBSTR(b.nip, 1, 17) LIKE SUBSTR(a.nip, 1, 17)
        WHERE a.jabatan NOT LIKE '%JAKARTA%' 
        AND a.jabatan NOT LIKE '%SUMATERA BARAT%'
        AND a.jabatan NOT LIKE '%KALIMANTAN BARAT%'
        AND a.jabatan NOT LIKE '%SULAWESI SELATAN%'
        AND a.jabatan NOT LIKE '%SULAWESI UTARA%'
        AND a.jabatan NOT LIKE '%NUSA TENGGARA BARAT%'
        AND a.jabatan NOT LIKE '%PAPUA%'
      ");
    }else if($penempatan == 'JAKARTA'){
      return $this->db->query("SELECT a.*, b.jabatan as jabatan_dosen, 'JAKARTA' as penempatan  
        FROM tbl_pns as a LEFT JOIN tbl_dosen_pddikti as b ON SUBSTR(b.nip, 1, 17) LIKE SUBSTR(a.nip, 1, 17)
        WHERE a.jabatan LIKE '%JAKARTA%'
      ");
    }else if($penempatan == 'SUMATERA BARAT'){
      return $this->db->query("SELECT a.*, b.jabatan as jabatan_dosen, 'SUMATERA BARAT' as penempatan  
        FROM tbl_pns as a LEFT JOIN tbl_dosen_pddikti as b ON SUBSTR(b.nip, 1, 17) LIKE SUBSTR(a.nip, 1, 17)
        WHERE a.jabatan LIKE '%SUMATERA BARAT%'
      ");
    }else if($penempatan == 'KALIMANTAN BARAT'){
      return $this->db->query("SELECT a.*, b.jabatan as jabatan_dosen, 'KALIMANTAN BARAT' as penempatan  
        FROM tbl_pns as a LEFT JOIN tbl_dosen_pddikti as b ON SUBSTR(b.nip, 1, 17) LIKE SUBSTR(a.nip, 1, 17)
        WHERE a.jabatan LIKE '%KALIMANTAN BARAT%'
      ");
    }else if($penempatan == 'SULAWESI SELATAN'){
      return $this->db->query("SELECT a.*, b.jabatan as jabatan_dosen, 'SULAWESI SELATAN' as penempatan  
        FROM tbl_pns as a LEFT JOIN tbl_dosen_pddikti as b ON SUBSTR(b.nip, 1, 17) LIKE SUBSTR(a.nip, 1, 17)
        WHERE a.jabatan LIKE '%SULAWESI SELATAN%'
      ");
    }else if($penempatan == 'SULAWESI UTARA'){
      return $this->db->query("SELECT a.*, b.jabatan as jabatan_dosen, 'SULAWESI UTARA' as penempatan  
        FROM tbl_pns as a LEFT JOIN tbl_dosen_pddikti as b ON SUBSTR(b.nip, 1, 17) LIKE SUBSTR(a.nip, 1, 17)
        WHERE a.jabatan LIKE '%SULAWESI UTARA%'
      ");
    }else if($penempatan == 'NUSA TENGGARA BARAT'){
      return $this->db->query("SELECT a.*, b.jabatan as jabatan_dosen, 'NUSA TENGGARA BARAT' as penempatan  
        FROM tbl_pns as a LEFT JOIN tbl_dosen_pddikti as b ON SUBSTR(b.nip, 1, 17) LIKE SUBSTR(a.nip, 1, 17)
        WHERE a.jabatan LIKE '%NUSA TENGGARA BARAT%'
      ");
    }else if($penempatan == 'PAPUA'){
      return $this->db->query("SELECT a.*, b.jabatan as jabatan_dosen, 'PAPUA' as penempatan  
        FROM tbl_pns as a LEFT JOIN tbl_dosen_pddikti as b ON SUBSTR(b.nip, 1, 17) LIKE SUBSTR(a.nip, 1, 17)
        WHERE a.jabatan LIKE '%PAPUA%'
      ");
    }  
  }

  public function get_edit_pns($no)
	{	
    $result = $this->db->query("SELECT * FROM tbl_pns WHERE NO = $no");

    return $result;
  }

  function tambah_pns($input_data)
	{   
    $add_pns = $this->db->insert('tbl_pns', $input_data);
    return $add_pns;
  }

  function edit_pns($input_data)
  { 
    $no = $input_data['no'];
    $hasil = $this->db->where('no', $no)->update('tbl_pns', $input_data);
    
    return $hasil;    
  }

  function hapus_pns($nip){
    $hasil=$this->db->query("DELETE FROM tbl_pns WHERE nip='$nip'");
    return $hasil;
  }
  // END PNS

  // THL
  public function get_all_thl()
	{	
    $result = $this->db->query("SELECT * FROM tbl_thl");

    return $result;
  }

  function tambah_thl($input_data)
	{   
    $add_thl = $this->db->insert('tbl_thl', $input_data);
    return $add_thl;
  }

  function edit_thl($input_data)
  {       
    $id_thl = $input_data['id_thl'];
    $hasil = $this->db->where('id_thl', $id_thl)->update('tbl_thl', $input_data);
    
    return $hasil;    
  }

  function hapus_thl($id_thl){
    $hasil=$this->db->query("DELETE FROM tbl_thl WHERE id_thl='$id_thl'");
    return $hasil;
  }
  // END THL
  // TA
  public function get_all_ta()
	{	
    $result = $this->db->query("SELECT * FROM tbl_ta");

    return $result;
  }

  function tambah_ta($input_data)
	{   
    $add_ta = $this->db->insert('tbl_ta', $input_data);
    return $add_ta;
  }


  function tambah_thlusers($input_users)
  {   
    $add_ta = $this->db->insert('tbl_users_presensi', $input_users);
    return $add_ta;
  }

  function edit_ta($input_data)
  {       
    $nik = $input_data['nik'];
    $hasil = $this->db->where('nik', $nik)->update('tbl_ta', $input_data);
    
    return $hasil;    
  }

  function hapus_ta($nik){
    $hasil=$this->db->query("DELETE FROM tbl_ta WHERE nik='$nik'");
    return $hasil;
  }

   function cek_dataakhir()
    {   

      $cek_thl = $this->db->query("SELECT id_thl FROM tbl_thl order by id_thl DESC limit 1")->result();
      return $cek_thl;
    }

  // END TA
}