<?php
class F_Loader_model extends CI_Model {

    // LINK LOADER
    function get_link_loader()
    {

        return $this->db->query("SELECT * FROM tbl_flink WHERE berkas='1' AND modul='Loader'")->result();

    }
}
?>