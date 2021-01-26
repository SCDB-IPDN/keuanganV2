<?php
class MDosen_dikti extends CI_Model{

    public function get_all_dosen(){	
        return $this->db->query("SELECT * FROM tbl_dosen_pddikti ORDER BY updated_at DESC");
    }

    public function belum(){
        return $this->db->query("SELECT serdos, nidn, total
        FROM 
        (SELECT COUNT(*) as serdos FROM tbl_dosen_pddikti WHERE sertifikasi_dosen = '') a,
        (SELECT COUNT(*) as nidn FROM tbl_dosen_pddikti WHERE nidn_nup_nidk = 0) b,
        (SELECT COUNT(*) as total FROM tbl_dosen_pddikti) c")->result();
    }
}