<?php
class Choose_model extends CI_Model {

    // LINK TAMPILAN UMUM
    public function get_link_umum()
    {
    return $this->db->query("SELECT * FROM tbl_flink WHERE berkas='1' AND modul='KeuanganV2Umum'")->result();
    }

    // LINK TAMPILAN PASSWORD
    public function get_link_password()
    {
    return $this->db->query("SELECT * FROM tbl_flink WHERE berkas='1' AND modul='KeuanganV2'")->result();
    }

    // LINK TAMPILAN PILIHAN
    function get_link_pilihan()
    {
    return $this->db->query("SELECT * FROM tbl_flink WHERE berkas='1' AND modul='PilKeuangan'")->result();
    }

    // LINK TAMPILAN UTAMA
    function get_link_utama()
    {
    return $this->db->query("SELECT * FROM tbl_flink WHERE berkas='1' AND modul='HalUtama'")->result();
    }

}
?>