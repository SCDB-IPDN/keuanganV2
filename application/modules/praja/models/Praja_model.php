<?php

class Praja_model extends CI_Model
{

	public function get_angkatan()
	{
		$this->db->distinct()->select('angkatan');
		return $this->db->get('praja_baru')->result_array();
	}

	
	public function get_provinsi()
	{
		$prov = $this->db->query("SELECT provinsi , count(provinsi) as jumlah from praja_baru group by provinsi");
		return $prov;
	}


	public function get_praja()
	{
		$result = $this->db->query("SELECT *,CASE WHEN jk= 'P' THEN 'Perempuan'
			WHEN jk= 'L' THEN 'Laki-Laki' ELSE 'Belum Ada ' END AS jeniskelamin FROM praja_baru ");
		return $result;
	}

	public function get_detail($npp)
	{

		$result = $this->db->query("SELECT id,no_spcp, nama,CASE WHEN jk= 'P' THEN 'Perempuan'WHEN jk= 'L' THEN 'Laki-Laki' ELSE 'Belum Ada ' END AS jk, nisn,npwp,npp,nik_praja,tmpt_lahir,tgl_lahir,alamat,rt,rw,nama_dusun,kelurahan,kode_pos,kab_kota,provinsi,tlp_pribadi,tlp_rumah,email,penerima_pks,no_pks,tgl_masuk_kuliah,
			tahun_masuk_kuliah,status,tingkat,angkatan,mulai_semester,biaya_masuk,nik_ayah , nama_ayah , tgllahir_ayah ,tlp_ayah ,nik_ibu ,nama_ibu ,tgllahir_ibu,tlp_ibu , nik_wali,
			nama_wali ,tgllahir_wali ,tlp_wali,
			(SELECT nama_jenis_daftar FROM jenis_pendaftaran WHERE jenis_pendaftaran = id_jenis_daftar) as jenis_pendaftaran,
			(SELECT nama_jalur_masuk  FROM jalur_masuk WHERE jalur_masuk = id_jalur_masuk) as jalur_masuk ,
			(SELECT nama_program_studi FROM program_studi WHERE prodi = id_prodi) as prodi,
			(SELECT nama_negara FROM negara WHERE kewarganegaraan = id_negara) as kewarganegaraan,
			(SELECT nama_jenis_tinggal FROM jenis_tinggal WHERE jenis_tinggal = id_jenis_tinggal) as jenis_tinggal,
			(SELECT nama_alat_transportasi FROM alat_transportasi WHERE alat_transport = id_alat_transportasi) as alat_transport,
			(SELECT nama_jenjang_didik FROM jenjang_pendidikan WHERE pendidikan_ayah = id_jenjang_didik) as pendidikan_ayah,
			(SELECT nama_penghasilan FROM penghasilan  WHERE penghasilan_ayah = id_penghasilan) as penghasilan_ayah,
			(SELECT nama_pekerjaan FROM pekerjaan  WHERE pekerjaan_ayah = id_pekerjaan) as pekerjaan_ayah,
			(SELECT nama_jenjang_didik FROM jenjang_pendidikan WHERE pendidikan_ibu= id_jenjang_didik) as pendidikan_ibu,
			(SELECT nama_penghasilan FROM penghasilan  WHERE penghasilan_ibu = id_penghasilan) as penghasilan_ibu,
			(SELECT nama_pekerjaan FROM pekerjaan  WHERE pekerjaan_ibu = id_pekerjaan) as pekerjaan_ibu,
			(SELECT nama_jenjang_didik FROM jenjang_pendidikan WHERE pendidikan_wali = id_jenjang_didik) as pendidikan_wali,
			(SELECT nama_penghasilan FROM penghasilan  WHERE penghasilan_wali = id_penghasilan) as penghasilan_wali,
			(SELECT nama_pekerjaan FROM pekerjaan  WHERE pekerjaan_wali = id_pekerjaan) as pekerjaan_wali,
			(SELECT nama_agama FROM agama  WHERE agama = id_agama) as agama,
			(SELECT nama_semester FROM semester WHERE mulai_semester = id_semester) as mulai_semester,
			(SELECT nama_pembiayaan FROM jenis_pembiayaan  WHERE pembiayaan = id_pembiayaan) as pembiayaan,
			(SELECT kecamatan FROM wilayah WHERE kecamatan = id_kecamatan) as kecamatan FROM praja_baru WHERE praja_baru.npp = '$npp' ");

		return $result;
	}

	public function get_table(){
		$result = $this->db->query("SELECT id,no_spcp, nama,CASE WHEN jk= 'P' THEN 'Perempuan'WHEN jk= 'L' THEN 'Laki-Laki' ELSE 'Belum Ada ' END AS jk, nisn,npwp,npp,nik_praja,tmpt_lahir,tgl_lahir, alamat,rt,rw,nama_dusun,kelurahan,kode_pos,kab_kota,provinsi,tlp_pribadi,tlp_rumah,email,penerima_pks,no_pks,tgl_masuk_kuliah,
			tahun_masuk_kuliah,status,tingkat,angkatan,fakultas,biaya_masuk,mulai_semester,nik_ayah , nama_ayah , tgllahir_ayah ,tlp_ayah ,nik_ibu ,nama_ibu ,tgllahir_ibu,tlp_ibu , nik_wali,
			nama_wali ,tgllahir_wali ,tlp_wali,
			(SELECT nama_jenis_daftar FROM jenis_pendaftaran WHERE jenis_pendaftaran = id_jenis_daftar) as jenis_pendaftaran,
			(SELECT nama_jalur_masuk  FROM jalur_masuk WHERE jalur_masuk = id_jalur_masuk) as jalur_masuk ,
			(SELECT nama_program_studi FROM program_studi WHERE prodi = id_prodi) as prodi,
			(SELECT nama_negara FROM negara WHERE kewarganegaraan = id_negara) as kewarganegaraan,
			(SELECT nama_jenis_tinggal FROM jenis_tinggal WHERE jenis_tinggal = id_jenis_tinggal) as jenis_tinggal,
			(SELECT nama_alat_transportasi FROM alat_transportasi WHERE alat_transport = id_alat_transportasi) as alat_transport,
			(SELECT nama_jenjang_didik FROM jenjang_pendidikan WHERE pendidikan_ayah = id_jenjang_didik) as pendidikan_ayah,
			(SELECT nama_penghasilan FROM penghasilan  WHERE penghasilan_ayah = id_penghasilan) as penghasilan_ayah,
			(SELECT nama_pekerjaan FROM pekerjaan  WHERE pekerjaan_ayah = id_pekerjaan) as pekerjaan_ayah,
			(SELECT nama_jenjang_didik FROM jenjang_pendidikan WHERE pendidikan_ibu= id_jenjang_didik) as pendidikan_ibu,
			(SELECT nama_penghasilan FROM penghasilan  WHERE penghasilan_ibu = id_penghasilan) as penghasilan_ibu,
			(SELECT nama_pekerjaan FROM pekerjaan  WHERE pekerjaan_ibu = id_pekerjaan) as pekerjaan_ibu,
			(SELECT nama_jenjang_didik FROM jenjang_pendidikan WHERE pendidikan_wali = id_jenjang_didik) as pendidikan_wali,
			(SELECT nama_penghasilan FROM penghasilan  WHERE penghasilan_wali = id_penghasilan) as penghasilan_wali,
			(SELECT nama_pekerjaan FROM pekerjaan  WHERE pekerjaan_wali = id_pekerjaan) as pekerjaan_wali,
			(SELECT nama_agama FROM agama  WHERE agama = id_agama) as agama,
			(SELECT nama_pembiayaan FROM jenis_pembiayaan  WHERE pembiayaan = id_pembiayaan) as pembiayaan,
			(SELECT nama_semester FROM semester WHERE mulai_semester = id_semester) as mulai_semester,
			(SELECT kecamatan FROM wilayah WHERE kecamatan = id_kecamatan) as kecamatan

			FROM praja_baru");

		return $result;
	}

	public function agama(){
		return $this->db->query("SELECT * FROM agama " );
	}

	public function jenistinggal(){
		return$this->db->query("SELECT * FROM jenis_tinggal " );
	}

	public function prodi(){
		return$this->db->query("SELECT * FROM program_studi " );
	}

	public function kewarganegaraan(){
		return$this->db->query("SELECT * FROM negara " );
	}

	public function jenispendaftaran(){
		return $this->db->query("SELECT * FROM jenis_pendaftaran " );
	}

	public function pembiayaan(){
		return $this->db->query("SELECT * FROM jenis_pembiayaan " );
	}

	public function jalurmasuk(){
		return $this->db->query("SELECT * FROM jalur_masuk " );
	}

	public function pendidikan(){
		return $this->db->query("SELECT * FROM jenjang_pendidikan " );
	}


	public function pekerjaan(){
		return $this->db->query("SELECT * FROM pekerjaan " );
	}

	public function penghasilan(){
		return $this->db->query("SELECT * FROM penghasilan " );
	}

	public function alattransportasi(){
		return $this->db->query("SELECT * FROM alat_transportasi " );
	}

	public function mulaisemester(){
		return $this->db->query("SELECT * FROM semester " );
	}
	
	public function get_fakultas()
	{
		return $this->db->query("SELECT * FROM program_studi group BY kode_fakultas");
	}

	public function get_will()
	{
		return  $this->db->query("SELECT * FROM `wilayah` GROUP BY id_provinsi ");
	}

	function get_sub_provinsi($prov){

		$this->db->select('*');
		$this->db->from('wilayah');
		$this->db->where(array('id_provinsi' => $prov));
		$this->db->group_by('id_kabkota');
		$query = $this->db->get();

		return $query;
	}

	function get_sub_kabkota($kab){

		$this->db->select('*');
		$this->db->from('wilayah');
		$this->db->where(array('id_kabkota' => $kab));
		$query = $this->db->get();

		return $query;
	}

	public function get_statuspraja()
	{
		return$this->db->query("SELECT * FROM hukuman");
	}


}