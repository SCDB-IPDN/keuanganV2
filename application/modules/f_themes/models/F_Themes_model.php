<?php
class F_Themes_model extends CI_Model {

    // LAMAN THEMES
    public function get_laman()
    {

    return $this->db->query("SELECT * FROM tbl_fthemes WHERE berkas='1'")->result();
    }

    // LINK KHUSUS
    public function get_link_khusus()
    {

    return $this->db->query("SELECT * FROM tbl_flink WHERE berkas='1' AND modul='Khusus'")->result();
    }

    // LINK UMUM
    public function get_link_umum()
    {

    return $this->db->query("SELECT * FROM tbl_flink WHERE berkas='1' AND modul='Umum'")->result();
    }
}
?>