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

    public function getkurkum($data,$prr){
        return $this->db->query("SELECT * FROM tbl_kurkum where prodi = '$data'")->result();
    }

    public function getmatkulkurkum($data,$pr){
        return $this->db->query("SELECT * FROM tbl_kurkum_matkul where nama_kurikulum = '$data' and prodi = '$pr' ")->result();
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
}