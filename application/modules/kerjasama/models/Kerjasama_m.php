<?php
class Kerjasama_m extends CI_Model{
    public function get_mou()
	{
		$getmou = $this->db->query("SELECT * FROM tbl_kerjasama")->result();

        return $getmou;

    }

    function add_mou($data)
	{   
		$addmou = $this->db->insert('tbl_kerjasama', $data);
		return $addmou;
    }

	function del_mou($id)
	{
		return $this->db->query("DELETE FROM tbl_kerjasama");
    }

	public function edit_mou($id, $editmou) 
	{
		return $this->db->where('id', $id)->update('tbl_kerjasama', $editmou);
	}
	
	// public function get_status_count($kat, $status)
	// {
	// 	$this->db->where('id_kat', $kat);
	// 	$this->db->where('status', $status);
	// 	$this->db->from('tbl_ort'); 
	// 	return $this->db->count_all_results();
	// }
	
	// public function getById($id)
	// {
	// 	return $this->db->get_where('tbl_ort', ['id_prokum' => $id])->row();
    // }
    
    /*function get_kategori()
    {   
        $getkat = $this->db->query("SELECT * FROM tbl_ort_kat")->result();
        return $getkat;
    }*/

}