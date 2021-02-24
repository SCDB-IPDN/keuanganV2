<?php
class Ortala_model extends CI_Model{
    public function get_ortala($id_kat)
	{
		$getuu = $this->db->query("SELECT * FROM tbl_ort where id_kat = '$id_kat'");

		return $getuu;
    }

     public function get_ortala1($id_kat,$tahun)
	{
		$getuu = $this->db->query("SELECT * FROM tbl_ort where id_kat = '$id_kat' and tahun='$tahun' ");

		return $getuu;
    }


    function add_prokum($data)
	{   
		$addprokum = $this->db->insert('tbl_ort', $data);
		return $addprokum;
    }

	function del_prokum($id_prokum)
	{
		return $this->db->query("DELETE FROM tbl_ort WHERE id_prokum= '$id_prokum'");
    }

	public function edit_prokum($id_prokum, $editprokum) 
	{
		return $this->db->where('id_prokum', $id_prokum)->update('tbl_ort', $editprokum);
	}
	
	public function get_status_count($kat, $status)
	{
		$this->db->where('id_kat', $kat);
		$this->db->where('status', $status);
		$this->db->from('tbl_ort'); 
		return $this->db->count_all_results();
	}
	
	public function getById($id)
	{
		return $this->db->get_where('tbl_ort', ['id_prokum' => $id])->row();
    }
    

    public function getTahun()
	{

		$haha = $this->db->query("SELECT DISTINCT tahun FROM tbl_ort")->result_array();
		return $haha;
    }

 //      public function getTahun()
	// {

	// 	$haha = $this->db->query("SELECT tahun FROM tbl_ort GROUP BY tahun")->result_array();
	// 	return $haha;
 //    }

    /*function get_kategori()
    {   
        $getkat = $this->db->query("SELECT * FROM tbl_ort_kat")->result();
        return $getkat;
    }*/

}