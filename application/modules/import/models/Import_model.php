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

    // KRS
    public function getkrs($data){
        return $this->db->query("SELECT * FROM tbl_krs where prodi = '$data'")->result();
    }

    public function krs($table, $data){
        $result = $this->db->insert_batch($table, $data);

        if($result){
            $this->session->set_flashdata('krs', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
            return TRUE;
        }else{
            $this->session->set_flashdata('krs', '<div class="alert alert-warning"><b>PROSES IMPORT GAGAL!</b> Data Gagal diimport!</div>');
            return FALSE;
        }
    }

    public function tambah_krs($input_data){
        $result = $this->db->insert('tbl_krs', $input_data);

        if($result){
            $this->session->set_flashdata('krs', '<div class="alert alert-success"><b>Tambah Data Berhasil!</b></div>');
            return TRUE;
        }else{
            $this->session->set_flashdata('krs', '<div class="alert alert-warning"><b>Tambah Data gagal!</b></div>');
            return FALSE;
        }
    }

    public function edit_krs($id, $input_data){
        $result = $this->db->where('id', $id)->update('tbl_krs', $input_data);

        if($result){
            $this->session->set_flashdata('krs', '<div class="alert alert-success"><b>Ubah Data Berhasil!</b></div>');
            return TRUE;
        }else{
            $this->session->set_flashdata('krs', '<div class="alert alert-warning"><b>Ubah Data gagal!</b></div>');
            return FALSE;
        }
    }

    public function hapus_krs($id){
        $result = $this->db->where('id', $id)->delete('tbl_krs');

        if($result){
            $this->session->set_flashdata('krs', '<div class="alert alert-success"><b>Hapus Data Berhasil!</b></div>');
            return TRUE;
        }else{
            $this->session->set_flashdata('krs', '<div class="alert alert-warning"><b>Hapus Data gagal!</b></div>');
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

    // Nilai Perkuliahan
    public function getnilai($data){
        return $this->db->query("SELECT * FROM tbl_nilai_perkuliahan where prodi = '$data'")->result();
    }

    public function nilai($table, $data){
        $result = $this->db->insert_batch($table, $data);

        if($result){
            $this->session->set_flashdata('nilai', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
            return TRUE;
        }else{
            $this->session->set_flashdata('nilai', '<div class="alert alert-warning"><b>PROSES IMPORT GAGAL!</b> Data Gagal diimport!</div>');
            return FALSE;
        }
    }

    public function tambah_nilai($input_data){
        $result = $this->db->insert('tbl_nilai_perkuliahan', $input_data);

        if($result){
            $this->session->set_flashdata('nilai', '<div class="alert alert-success"><b>Tambah Data Berhasil!</b></div>');
            return TRUE;
        }else{
            $this->session->set_flashdata('nilai', '<div class="alert alert-warning"><b>Tambah Data gagal!</b></div>');
            return FALSE;
        }
    }

    public function edit_nilai($id, $input_data){
        $result = $this->db->where('id', $id)->update('tbl_nilai_perkuliahan', $input_data);

        if($result){
            $this->session->set_flashdata('nilai', '<div class="alert alert-success"><b>Ubah Data Berhasil!</b></div>');
            return TRUE;
        }else{
            $this->session->set_flashdata('nilai', '<div class="alert alert-warning"><b>Ubah Data gagal!</b></div>');
            return FALSE;
        }
    }

    public function hapus_nilai($id){
        $result = $this->db->where('id', $id)->delete('tbl_nilai_perkuliahan');

        if($result){
            $this->session->set_flashdata('nilai', '<div class="alert alert-success"><b>Hapus Data Berhasil!</b></div>');
            return TRUE;
        }else{
            $this->session->set_flashdata('nilai', '<div class="alert alert-warning"><b>Hapus Data gagal!</b></div>');
            return FALSE;
        }
    }

    // kelulusan
    public function getkelulusan($data) {
        return $this->db->query("SELECT * FROM tbl_kelulusan where prodi = '$data'")->result();
    }

    public function tambah_kelulusan($input_data) {
        
        $result = $this->db->insert('tbl_kelulusan', $input_data);

        if($result){
            $this->session->set_flashdata('kelulusan', ['success', "<b>Tambah data kelulusan berhasil!</b>"]);
            return TRUE;
        }else{
            $this->session->set_flashdata('kelulusan', ['danger', "<b>Tambah data kelulusan gagal!</b>"]);
            return FALSE;
        }
    }

    public function edit_kelulusan($id, $input_data){

        $result = $this->db->where('id', $id)->update('tbl_kelulusan', $input_data);

        if($result){
            $this->session->set_flashdata('kelulusan', ['success', "<b>Ubah Data Kelulusan Berhasil!</b>"]);
            return TRUE;
        }else{
            $this->session->set_flashdata('kelulusan', ['danger', "<b>Ubah Data Kelulusan gagal!</b>"]);
            return FALSE;
        }
    }

    public function hapus_kelulusan($id){

        $result = $this->db->delete('tbl_kelulusan', ['id' => $id]);

        if($result){
            $this->session->set_flashdata('kelulusan', ['success', "<b>Hapus data kelulusan berhasil!</b>"]);
            return TRUE;
        } else {
            $this->session->set_flashdata('kelulusan', ['danger', "<b>Hapus data kelulusan gagal!</b>"]);
            return FALSE;
        }
    }

    // AKM
    public function akm_get($kode_prodi) {
        return $this->db->get_where('tbl_akm', ['prodi' => $kode_prodi])->result();
    }

    public function akm_add($data) {
        return $this->db->insert('tbl_akm', $data);
    }

    public function akm_edit($id, $data) {
        return $this->db->where('id', $id)->update('tbl_akm', $data);
    }

    public function akm_delete($id){
        return $this->db->delete('tbl_akm', ['id' => $id]);
    }
    
    // upload excel
    public function upload_excel($table, $data) {
        return $this->db->insert_batch($table, $data);
    }
}