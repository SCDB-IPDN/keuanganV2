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

    public function getda($data){
        return $this->db->query("SELECT * FROM tbl_dosen_ajar where prodi = '$data'")->result();
    }

    public function dosen_ajar($table, $data){
        $result = $this->db->insert_batch($table, $data);

        if($result){
            $this->session->set_flashdata('kelas_kuliah', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
            return TRUE;
        }else{
            $this->session->set_flashdata('kelas_kuliah', '<div class="alert alert-warning"><b>PROSES IMPORT GAGAL!</b> Data Gagal diimport!</div>');
            return FALSE;
        }
    }

    public function tambah_da($input_data){

        $result = $this->db->insert('tbl_dosen_ajar', $input_data);

        if($result){
            $this->session->set_flashdata('dosen_ajar', '<div class="alert alert-success"><b>Tambah Dosen Ajar Berhasil!</b></div>');
            return TRUE;
        }else{
            $this->session->set_flashdata('dosen_ajar', '<div class="alert alert-warning"><b>Tambah Dosen Ajar gagal!</b></div>');
            return FALSE;
        }
    }

    public function edit_da($id, $input_data){

        $result = $this->db->where('id', $id)->update('tbl_dosen_ajar', $input_data);

        if($result){
            $this->session->set_flashdata('dosen_ajar', '<div class="alert alert-success"><b>Ubah Dosen Ajar Berhasil!</b></div>');
            return TRUE;
        }else{
            $this->session->set_flashdata('dosen_ajar', '<div class="alert alert-warning"><b>Ubah Dosen Ajar gagal!</b></div>');
            return FALSE;
        }
    }

    public function hapus_da($id){

        $result = $this->db->where('id', $id)->delete('tbl_dosen_ajar');

        if($result){
            $this->session->set_flashdata('dosen_ajar', '<div class="alert alert-success"><b>Ubah Dosen Ajar Berhasil!</b></div>');
            return TRUE;
        }else{
            $this->session->set_flashdata('dosen_ajar', '<div class="alert alert-warning"><b>Ubah Dosen Ajar gagal!</b></div>');
            return FALSE;
        }
    }
}