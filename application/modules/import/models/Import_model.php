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

   
}