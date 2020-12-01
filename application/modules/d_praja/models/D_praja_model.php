<?php
class D_praja_model extends CI_Model
{
	public function get_praja()
	{

		$result = $this->db->query("SELECT * FROM praja ORDER BY angkatan");

		return $result;
	}
  
  	public function get_detail($id)
	{	
		$result = $this->db->query("SELECT * FROM praja JOIN orangtua ON praja.nik_praja = orangtua.nik_praja JOIN wali ON orangtua.nik_praja = wali.nik_praja WHERE praja.id = $id ");

		return $result;
	}
	
	public function edit_praja($input_data)
  	{     
    	$id_praja = $input_data['nik_praja'];
    	$tingkat = $input_data['tingkat'];
    	$hasil = $this->db->where('nik_praja', $id_praja)->update('praja', $input_data);
        return $hasil;  
  }

	public function view_edit($editnya)
	{
		$id = $editnya['id'];
		// $nama = $editnya['nama'];
		// $email = $editnya['email'];
		// $alamat = $editnya['alamat'];
		// $rt = $editnya['rt'];
		// $rw = $editnya['rw'];
		// $nama_dusun = $editnya['nama_dusun'];
		// $kelurahan = $editnya['kelurahan'];
		// $kecamatan = $editnya['kecamatan'];
		// $kab_kota = $editnya['kab_kota'];
		// $kode_pos = $editnya['kode_pos'];
		// $provinsi = $editnya['provinsi'];
		// $tlp_pribadi = $editnya['tlp_pribadi'];
		// $status = $editnya['status'];
		// $tingkat = $editnya['tingkat'];
		// $angkatan = $editnya['angkatan'];

		// $hasil ="UPDATE praja SET email=$email,alamat=$alamat,rt=$rt,rw=$rw,nama_dusun=$nama_dusun,
		// kelurahan=$kelurahan,kecamatan=$kecamatan,kab_kota=$kab_kota,kode_pos=$kode_pos,
		// provinsi=$provinsi,tlp_pribadi=$tlp_pribadi,status=$status,tingkat=$tingkat,
		// angkatan=$angkatan where nama=$nama";
		
		$hasil = $this->db->where('id', $id)->update('praja', $editnya);
		// echo "$hasil";
		// exit();
		return $hasil;
	}

	public function view_editortu($editort)
	{
		$id_ortu = $editort['id_ortu'];
		// echo "$id_ortu";
		// exit();
		// $nik_praja = $editnya['nik_praja'] ;
		// $nama = $editnya['nama'] ;
		// $nik_ayah = $editnya['nik_ayah'] ;
		// $nama_ayah = $editnya['nama_ayah'];
		// $tgllahir_ayah = $editnya['tgllahir_ayah'];
		// $pendidikan_ayah = $editnya['pendidikan_ayah'];
		// $pekerjaan_ayah = $editnya['pekerjaan_ayah'];
		// $penghasilan_ayah = $editnya['penghasilan_ayah'] ;
		// $tlp_ayah = $editnya['tlp_ayah'];
		// $nik_ibu = $editnya['nik_ibu'];
		// $nama_ibu = $editnya['nama_ibu'] ;
		// $tgllahir_ibu = $editnya['tgllahir_ibu'];
		// $pendidikan_ibu = $editnya['pendidikan_ibu'];
		// $pekerjaan_ibu = $editnya['pekerjaan_ibu'];
		// $penghasilan_ibu = $editnya['penghasilan_ibu'];
		// $tlp_ibu = $editnya['tlp_ibu'];

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
		// $nik_praja = $editnya['nik_praja'] ;
		// $nama = $editnya['nama'] ;
		// $nik_ayah = $editnya['nik_ayah'] ;
		// $nama_ayah = $editnya['nama_ayah'];
		// $tgllahir_ayah = $editnya['tgllahir_ayah'];
		// $pendidikan_ayah = $editnya['pendidikan_ayah'];
		// $pekerjaan_ayah = $editnya['pekerjaan_ayah'];
		// $penghasilan_ayah = $editnya['penghasilan_ayah'] ;
		// $tlp_ayah = $editnya['tlp_ayah'];
		// $nik_ibu = $editnya['nik_ibu'];
		// $nama_ibu = $editnya['nama_ibu'] ;
		// $tgllahir_ibu = $editnya['tgllahir_ibu'];
		// $pendidikan_ibu = $editnya['pendidikan_ibu'];
		// $pekerjaan_ibu = $editnya['pekerjaan_ibu'];
		// $penghasilan_ibu = $editnya['penghasilan_ibu'];
		// $tlp_ibu = $editnya['tlp_ibu'];

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
		$prov=$this->db->query("SELECT status from praja ");
		$prov = $this->db->query("SELECT status from praja ");
		return $prov;
	}

	public function get_provinsi()
	{
		$prov=$this->db->query("SELECT provinsi , count(provinsi) as jumlah from praja group by provinsi");
		return $prov;
	}
}
