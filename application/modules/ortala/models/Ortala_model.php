<?php
class Ortala_model extends CI_Model{
    public function get_uu()
	{
	
		$getuu = $this->db->query("SELECT * FROM tbl_ort where id_kat = '2'");

		return $getuu;
    }

    function add_prokum($data)
	{   
		$addprokum = $this->db->insert('tbl_ort', $data);
		return $addprokum;
    }

    function del_prokum($id_prokum){

		$delprokum=$this->db->query("DELETE FROM tbl_ort WHERE id_prokum= '$id_prokum'");
		return $delporkum;
    }

    public function edit_prokum($edit_prokum){
		
		$id_prokum = $edit_prokum['id_prokum'];
		$editprok = $this->db->where('id_prokum', $id_prokum)->update('tbl_ort', $edit_prokum);

		return $editprok; 	
    }
    
    function get_kategori()
    {   
        $getkat = $this->db->query("SELECT * FROM tbl_ort_kat")->result();
        return $getkat;
    }

}