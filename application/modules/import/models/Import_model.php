<?php
class Import_model extends CI_Model {
    
    
    public function getprodi(){
        return $this->db->query("SELECT * FROM program_studi")->result();
    }

    // Kelas Kuliah
    public function getkk($data){
        return $this->db->query("SELECT * FROM tbl_kelas_kuliah where prodi = '$data'")->result();
    }

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

    public function edit_kk($id, $input_data){

        $result = $this->db->where('id', $id)->update('tbl_kelas_kuliah', $input_data);

        if($result){
            $this->session->set_flashdata('dosen_ajar', '<div class="alert alert-success"><b>Ubah Data Berhasil!</b></div>');
            return TRUE;
        }else{
            $this->session->set_flashdata('dosen_ajar', '<div class="alert alert-warning"><b>Ubah Data gagal!</b></div>');
            return FALSE;
        }
    }

    public function hapus_kk($id){

        $result = $this->db->where('id', $id)->delete('tbl_kelas_kuliah');

        if($result){
            $this->session->set_flashdata('dosen_ajar', '<div class="alert alert-success"><b>Hapus Data Berhasil!</b></div>');
            return TRUE;
        }else{
            $this->session->set_flashdata('dosen_ajar', '<div class="alert alert-warning"><b>Hapus Data gagal!</b></div>');
            return FALSE;
        }
    }

    // Dosen Ajar
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
            $this->session->set_flashdata('dosen_ajar', '<div class="alert alert-success"><b>Tambah Data Berhasil!</b></div>');
            return TRUE;
        }else{
            $this->session->set_flashdata('dosen_ajar', '<div class="alert alert-warning"><b>Tambah Data gagal!</b></div>');
            return FALSE;
        }
    }

    public function edit_da($id, $input_data){

        $result = $this->db->where('id', $id)->update('tbl_dosen_ajar', $input_data);

        if($result){
            $this->session->set_flashdata('dosen_ajar', '<div class="alert alert-success"><b>Ubah Data Berhasil!</b></div>');
            return TRUE;
        }else{
            $this->session->set_flashdata('dosen_ajar', '<div class="alert alert-warning"><b>Ubah Data gagal!</b></div>');
            return FALSE;
        }
    }

    public function hapus_da($id){

        $result = $this->db->where('id', $id)->delete('tbl_dosen_ajar');

        if($result){
            $this->session->set_flashdata('dosen_ajar', '<div class="alert alert-success"><b>Hapus Data Berhasil!</b></div>');
            return TRUE;
        }else{
            $this->session->set_flashdata('dosen_ajar', '<div class="alert alert-warning"><b>Hapus Data gagal!</b></div>');
            return FALSE;
        }
    }
}