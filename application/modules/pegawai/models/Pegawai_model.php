<?php
class Pegawai_model extends CI_Model {

    function get_data()
	{
        $query = $this->db->query("SELECT * FROM tbl_users");

        return $query;
    }
}
?>