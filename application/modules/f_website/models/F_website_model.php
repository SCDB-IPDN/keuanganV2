<?php
class F_website_model extends CI_Model {

    // WEBSITE
    public function get_website()
    {

    return $this->db->query("SELECT * FROM tbl_fwebsite WHERE berkas='1'")->result();

    }

    public function updateweb($data)
    {
        $id = $data['id'];
        $hasil = $this->db->where('id', $id)->update('tbl_fwebsite',$data);
        return $hasil;  
    }

    public function updatewebnol($data)
    {
        $id = $data['id'];
        $hasil = $this->db->where('id', $id)->update('tbl_fwebsite',$data);
        return $hasil;  
    }

}
?>
