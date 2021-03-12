<?php
class Import_model extends CI_Model {
    
    public function kelas_kuliah($table, $data){
        $result = $this->db->insert_batch($table, $data);

        if($result){
            $this->session->set_flashdata('kelas_kuliah', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
            return TRUE;
        }else{
            $this->session->set_flashdata('kelas_kuliah', '<div class="alert alert-warning"><b>PROSES IMPORT GAGAL!</b> Data Gagal diimport!</div>');
            return FALSE;
        }
    }

    public function getprodi(){
        return $this->db->query("SELECT * FROM program_studi")->result();
    }

    public function getkk($data){
        return $this->db->query("SELECT * FROM tbl_kelas_kuliah where prodi = '$data'")->result();
    }

    //kurikulum

    public function kurkum_matkul($table, $data){
        $result = $this->db->insert_batch($table, $data);

        if($result){
            $this->session->set_flashdata('kurkum_matkul', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
            return TRUE;
        }else{
            $this->session->set_flashdata('kurkum_matkul', '<div class="alert alert-warning"><b>PROSES IMPORT GAGAL!</b> Data Gagal diimport!</div>');
            return FALSE;
        }
    }

    public function getkurkum($data){
        return $this->db->query("SELECT * FROM tbl_kurkum where prodi = '$data' ")->result();
    }

    public function getmatkulkurkum($prodi,$nama_kurikulum){
        return $this->db->query("SELECT * FROM tbl_kurkum_matkul where prodi = '$prodi' and nama_kurikulum = '$nama_kurikulum' ")->result();
    }

    function cekdata($nama_kurikulum)
	{   
		$sql = $this->db->query("SELECT nama_kurikulum FROM tbl_kurkum where nama_kurikulum='$nama_kurikulum' ")->result();
		return $sql;
	}

    function tambahkurikulum($input_data)
	{   
		$tamkul = $this->db->insert('tbl_kurkum', $input_data);
		return $tamkul;
	}

    function del_kurikulum($nama_kurikulum){

		$hasil=$this->db->query("DELETE FROM tbl_kurkum WHERE nama_kurikulum= '$nama_kurikulum' ");
		return $hasil;
	}

    public function ubah_kurikulum($ubahkurkum){
		
		$nama_kurikulum = $ubahkurkum['nama_kurikulum'];
		$ubahkurikulum = $this->db->where('nama_kurikulum', $nama_kurikulum)->update('tbl_kurkum', $ubahkurkum);

		return $ubahkurikulum; 	
	}

     function del_matkul($kode_mk){

        $hasil=$this->db->query("DELETE FROM tbl_kurkum_matkul WHERE kode_mk = '$kode_mk' ");
        return $hasil;
    }

    public function ubah_matkul($ubahmatkul){
        
        $kode_mk = $ubahmatkul['kode_mk'];
        $ubahmatkul = $this->db->where('kode_mk', $kode_mk)->update('tbl_kurkum_matkul', $ubahmatkul);

        return $ubahmatkul;  
    }
}