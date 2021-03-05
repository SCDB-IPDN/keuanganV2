<?php
class D_praja_model extends CI_Model
{

	public function get_praja()
	{

		// $result = $this->db->query("SELECT * FROM praja");

		$result = $this->db->query("SELECT *,CASE WHEN jk= 'P' THEN 'Perempuan'
			WHEN jk= 'L' THEN 'Laki-Laki' ELSE 'Belum Ada ' END AS jeniskelamin FROM praja ");

		// $result = "SELECT *, CASE WHEN jk = 'P' THEN 'Perempuan'
		// WHEN jk= 'L' THEN 'Laki-Laki'
		// ELSE 'Belum Ada'
		// END AS jeniskelamin
		// FROM Praja
		// ";

		return $result;
	}

	
	public function log($log){
		return $this->db->insert('tbl_log', $log);
	}

	public function get_detail($npp)
	{

		$result = $this->db->query("SELECT id,no_spcp, nama,CASE WHEN jk= 'P' THEN 'Perempuan'WHEN jk= 'L' THEN 'Laki-Laki' ELSE 'Belum Ada ' END AS jk, nisn,npwp,npp,nik_praja,tmpt_lahir,tgl_lahir, alamat,rt,rw,nama_dusun,kelurahan,kode_pos,kab_kota,provinsi,tlp_pribadi,tlp_rumah,email,penerima_pks,no_pks,tgl_masuk_kuliah,
			tahun_masuk_kuliah,status,tingkat,angkatan,fakultas,mulai_semester,biaya_masuk,nik_ayah , nama_ayah , tgllahir_ayah ,tlp_ayah ,nik_ibu ,nama_ibu ,tgllahir_ibu,tlp_ibu , nik_wali,
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
			(SELECT nm_wil FROM data_wilayah WHERE kecamatan = id_wil) as kecamatan FROM praja_baru WHERE praja_baru.npp = '$npp' ");

		return $result;
	}

	public function get_angkatan()
	{
		$result = $this->db->query("SELECT angkatan FROM `praja_baru` GROUP by angkatan");

		return $result;
	}
	public function get_table($angkatan){
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
			(SELECT nm_wil FROM data_wilayah WHERE kecamatan = id_wil) as kecamatan

			FROM praja_baru WHERE angkatan = $angkatan ");

		return $result;
	}



	public function agama(){
		$result = $this->db->query("SELECT * FROM agama " );

		return $result;

	}

	public function jenistinggal(){
		$result = $this->db->query("SELECT * FROM jenis_tinggal " );

		return $result;

	}

	public function prodi(){
		$result = $this->db->query("SELECT * FROM program_studi " );

		return $result;

	}

	public function kewarganegaraan(){
		$result = $this->db->query("SELECT * FROM negara " );

		return $result;

	}

	public function jenispendaftaran(){
		$result = $this->db->query("SELECT * FROM jenis_pendaftaran " );

		return $result;

	}


	public function pembiayaan(){
		$result = $this->db->query("SELECT * FROM jenis_pembiayaan " );

		return $result;

	}


	public function jalurmasuk(){
		$result = $this->db->query("SELECT * FROM jalur_masuk " );

		return $result;

	}


	public function pendidikan(){
		$result = $this->db->query("SELECT * FROM jenjang_pendidikan " );

		return $result;

	}


	public function pekerjaan(){
		$result = $this->db->query("SELECT * FROM pekerjaan " );

		return $result;
	}

	public function penghasilan(){
		$result = $this->db->query("SELECT * FROM penghasilan " );

		return $result;

	}

	public function alattransportasi(){
		$result = $this->db->query("SELECT * FROM alat_transportasi " );

		return $result;

	}

	public function mulaisemester(){
		$result = $this->db->query("SELECT * FROM semester " );

		return $result;

	}


	public function get_table_praja($angkatan)
	{

		$result = $this->db->query("SELECT *, CASE WHEN jk= 'P' THEN 'Perempuan'
			WHEN jk= 'L' THEN 'Laki-Laki' ELSE 'Belum Ada ' END AS jk FROM praja JOIN orangtua ON praja.id = orangtua.id_ortu JOIN wali ON orangtua.id_ortu = wali.id_wali WHERE angkatan = $angkatan" );

		return $result;
	}


	// public function exportdata($angkatan)
	// {

	// 	$result = $this->db->query("SELECT *, CASE WHEN jk= 'P' THEN 'Perempuan'
	// 		WHEN jk= 'L' THEN 'Laki-Laki' ELSE 'Belum Ada ' END AS jk FROM praja JOIN orangtua ON praja.id = orangtua.id_ortu JOIN wali ON orangtua.id_ortu = wali.id_wali WHERE angkatan = '$angkatan'" );

	// 	return $result;
	// }

	public function exportdata($angkatan)
	{

		$result = $this->db->query("SELECT *, CASE WHEN jk= 'P' THEN 'Perempuan'
			WHEN jk= 'L' THEN 'Laki-Laki' ELSE 'Belum Ada ' END AS jk FROM praja_baru WHERE angkatan = '$angkatan'" );

		return $result;
	}




	public function get_statuspraja()
	{


		$result = $this->db->query("SELECT * FROM hukuman");

		return $result;
	}

	public function get_npp()
	{

		$result = $this->db->query("SELECT npp FROM praja ");

		return $result;
	}

	public function getcoba($npp)
	{
		// $nama = strtoupper(str_replace('-', ' ', $nama));
		$result = $this->db->query("SELECT npp,nama,status,angkatan,tingkat FROM praja_baru WHERE npp = '$npp'");

		return $result;
	}



	public function view_edit($editnya)
	{
		$npp =  $editnya['npp'];
		$no_spcp =  $editnya['no_spcp'];
		$nama =  $editnya['nama'];
		$jk =  $editnya['jk'];
		$nisn =  $editnya['nisn'];
		$npwp =  $editnya['npwp'];
		$nik_praja =  $editnya['nik_praja'];
		$tmpt_lahir =  $editnya['tmpt_lahir'];
		$tgl_lahir =  $editnya['tgl_lahir'];
		$alamat =  $editnya['alamat'];
		$rt =  $editnya['rt'];
		$rw =  $editnya['rw'];
		$nama_dusun =  $editnya['nama_dusun'];
		$kelurahan =  $editnya['kelurahan'];
		$kode_pos =  $editnya['kode_pos'];
		$kab_kota =  $editnya['kab_kota'];
		$provinsi =  $editnya['provinsi'];
		$tlp_pribadi =  $editnya['tlp_pribadi'];
		$tlp_rumah =  $editnya['tlp_rumah'];
		$email =  $editnya['email'];
		$penerima_pks =  $editnya['penerima_pks'];
		$no_pks =  $editnya['no_pks'];
		$tgl_masuk_kuliah =  $editnya['tgl_masuk_kuliah'];
		$tahun_masuk_kuliah =  $editnya['tahun_masuk_kuliah'];
		$status =  $editnya['status'];
		$tingkat =  $editnya['tingkat'];
		$angkatan =  $editnya['angkatan'];
		$fakultas =  $editnya['fakultas'];
		$biaya_masuk =  $editnya['biaya_masuk'];
		$mulai_semester =  $editnya['mulai_semester'];
		$nik_ayah  =  $editnya['nik_ayah'];
		$nama_ayah  =  $editnya['nama_ayah'];
		$tgllahir_ayah  =  $editnya['tgllahir_ayah'];
		$tlp_ayah  =  $editnya['tlp_ayah'];
		$nik_ibu  =  $editnya['nik_ibu'];
		$nama_ibu  =  $editnya['nama_ibu'];
		$tgllahir_ibu =  $editnya['tgllahir_ibu'];
		$tlp_ibu  =  $editnya['tlp_ibu'];
		$nik_wali =  $editnya['nik_wali'];
		$nama_wali  =  $editnya['nama_wali'];
		$tgllahir_wali  =  $editnya['tgllahir_wali'];
		$tlp_wali =  $editnya['tlp_wali'];

		// $hasil ="UPDATE praja SET email=$email,alamat=$alamat,rt=$rt,rw=$rw,nama_dusun=$nama_dusun,
		// kelurahan=$kelurahan,kecamatan=$kecamatan,kab_kota=$kab_kota,kode_pos=$kode_pos,
		// provinsi=$provinsi,tlp_pribadi=$tlp_pribadi,status=$status,tingkat=$tingkat,
		// angkatan=$angkatan where nama=$nama";
		
		// $hasil = $this->db->where('npp', $npp)->update('praja_baru', $editnya);



		$hasil = $this->db->query("UPDATE praja_baru 
			SET no_spcp = '$no_spcp',nama = '$nama',jk = '$jk',nisn = '$nisn',npwp = '$npwp',npp = '$npp',nik_praja = '$nik_praja',tmpt_lahir = '$tmpt_lahir',tgl_lahir = '$tgl_lahir',alamat = '$alamat',rt = $rt,rw = $rw,nama_dusun = '$nama_dusun',kelurahan = '$kelurahan',kode_pos = '$kode_pos',kab_kota = '$kab_kota',provinsi = '$provinsi',tlp_pribadi = '$tlp_pribadi',tlp_rumah = '$tlp_rumah',email = '$email',penerima_pks = '$penerima_pks',no_pks = '$no_pks',tgl_masuk_kuliah = '$tgl_masuk_kuliah',tahun_masuk_kuliah = '$tahun_masuk_kuliah',status = '$status',tingkat = '$tingkat',angkatan = '$angkatan',fakultas = '$fakultas',biaya_masuk = '$biaya_masuk',mulai_semester = '$mulai_semester',nik_ayah  = '$nik_ayah ',nama_ayah  = '$nama_ayah ',tgllahir_ayah  = '$tgllahir_ayah ',tlp_ayah  = '$tlp_ayah ',nik_ibu  = '$nik_ibu ',nama_ibu  = '$nama_ibu ',tgllahir_ibu = '$tgllahir_ibu',tlp_ibu  = '$tlp_ibu ',nik_wali = '$nik_wali',nama_wali  = '$nama_wali ',tgllahir_wali  = '$tgllahir_wali ',tlp_wali = '$tlp_wali',
			jenis_pendaftaran =(SELECT id_jenis_daftar FROM jenis_pendaftaran WHERE jenis_pendaftaran = id_jenis_daftar LIMIT 1),
			jalur_masuk =(SELECT id_jalur_masuk FROM jalur_masuk WHERE jalur_masuk = id_jalur_masuk LIMIT 1),
			prodi = (SELECT id_prodi FROM program_studi WHERE prodi = id_prodi LIMIT 1) ,
			kewarganegaraan = (SELECT id_negara FROM negara WHERE kewarganegaraan = id_negara LIMIT 1) ,
			jenis_tinggal = (SELECT id_jenis_tinggal FROM jenis_tinggal WHERE jenis_tinggal = id_jenis_tinggal LIMIT 1),
			alat_transport = (SELECT id_alat_transportasi FROM alat_transportasi WHERE alat_transport = id_alat_transportasi LIMIT 1),
			pendidikan_ayah =  (SELECT id_jenjang_didik FROM jenjang_pendidikan WHERE pendidikan_ayah = id_jenjang_didik LIMIT 1),
			penghasilan_ayah =(SELECT id_penghasilan FROM penghasilan  WHERE penghasilan_ayah = id_penghasilan LIMIT 1) ,
			pekerjaan_ayah = (SELECT id_pekerjaan FROM pekerjaan  WHERE pekerjaan_ayah = id_pekerjaan LIMIT 1),
			pendidikan_ayah = (SELECT id_jenjang_didik FROM jenjang_pendidikan WHERE pendidikan_ibu= id_jenjang_didik LIMIT 1),
			penghasilan_ibu = (SELECT id_penghasilan FROM penghasilan  WHERE penghasilan_ibu = id_penghasilan LIMIT 1),
			pekerjaan_ibu = (SELECT id_pekerjaan FROM pekerjaan  WHERE pekerjaan_ibu = id_pekerjaan LIMIT 1),
			pendidikan_ibu = (SELECT id_jenjang_didik FROM jenjang_pendidikan WHERE pendidikan_wali = id_jenjang_didik LIMIT 1),
			penghasilan_ibu = (SELECT id_penghasilan FROM penghasilan  WHERE penghasilan_wali = id_penghasilan LIMIT 1),
			pekerjaan_ibu = (SELECT id_pekerjaan FROM pekerjaan  WHERE pekerjaan_wali = id_pekerjaan LIMIT 1),
			agama = (SELECT id_agama FROM agama  WHERE agama = id_agama LIMIT 1),
			pembiayaan = (SELECT id_pembiayaan FROM jenis_pembiayaan  WHERE pembiayaan = id_pembiayaan LIMIT 1),
			mulai_semester = (SELECT id_semester FROM semester WHERE mulai_semester = id_semester LIMIT 1),
			kecamatan = (SELECT id_wil FROM data_wilayah WHERE kecamatan = id_wil LIMIT 1) WHERE npp ='$npp'
			");

		return $hasil;
	}

	public function view_editortu($editort)
	{
		$id_ortu = $editort['id_ortu'];


		// $hasil ="UPDATE orangtua SET id_ortu=$id_ortu,nik_praja=$nik_praja,nama=$nama,nik_ayah=$nik_ayah,nama_ayah=$nama_ayah,
		// tgllahir_ayah=$tgllahir_ayah,pendidikan_ayah=$pendidikan_ayah,pekerjaan_ayah=$pekerjaan_ayah,penghasilan_ayah=$penghasilan_ayah,
		// tlp_ayah=$tlp_ayah,tlp_ayah=$tlp_ayah,nik_ibu=$nik_ibu,nama_ibu=$nama_ibu,tgllahir_ibu=$tgllahir_ibu,pendidikan_ibu=$pendidikan_ibu,pekerjaan_ibu=$pekerjaan_ibu,penghasilan_ibu=$penghasilan_ibu,tlp_ibu=$tlp_ibu where id_ortu=$id_ortu";
		// echo "$hasil";
		$hasil = $this->db->where('id_ortu', $id_ortu)->update('orangtua', $editort);
		// echo "$id_ortu";
	 // exit();
		return $hasil;
	}

	public function view_editwali($editwal)
	{
		$id_wali = $editwal['id_wali'];

		// $hasil ="UPDATE orangtua SET id_ortu=$id_ortu,nik_praja=$nik_praja,nama=$nama,nik_ayah=$nik_ayah,nama_ayah=$nama_ayah,
		// tgllahir_ayah=$tgllahir_ayah,pendidikan_ayah=$pendidikan_ayah,pekerjaan_ayah=$pekerjaan_ayah,penghasilan_ayah=$penghasilan_ayah,
		// tlp_ayah=$tlp_ayah,tlp_ayah=$tlp_ayah,nik_ibu=$nik_ibu,nama_ibu=$nama_ibu,tgllahir_ibu=$tgllahir_ibu,pendidikan_ibu=$pendidikan_ibu,pekerjaan_ibu=$pekerjaan_ibu,penghasilan_ibu=$penghasilan_ibu,tlp_ibu=$tlp_ibu where id_ortu=$id_ortu";
		// echo "$hasil";
		$hasil = $this->db->where('id_wali', $id_wali)->update('wali', $editwal);
		// echo "$hasil";
	 // 	exit();
		return $hasil;
	}

	public function hapus_praja($id_praja)
	{
		$hasil = $this->db->query("DELETE FROM praja WHERE id_praja='$id_praja'");
		return $hasil;
	}

	public function get_status()
	{
		$prov = $this->db->query("SELECT status from praja_baru ");
		return $prov;
	}

	public function get_provinsi()
	{
		$prov = $this->db->query("SELECT provinsi , count(provinsi) as jumlah from praja_baru group by provinsi");
		return $prov;
	}


	function edit($editpraja)
	{   
		$id = $editpraja['id'];
		$hasil = $this->db->where('id', $id)->update('praja', $editpraja);
		return $hasil;
	}
}
