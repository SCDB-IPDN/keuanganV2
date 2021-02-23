<?php

class Kerjasama_m extends CI_Model
{
    public function get_mou()
	{
		return $this->db->get('tbl_kerjasama')->result();
    }

    public function add_mou($data)
	{   
		return $this->db->insert('tbl_kerjasama', $data);
    }

	public function del_mou($id)
	{
		return $this->db->delete('tbl_kerjasama', ['id' => $id]);
    }

	public function edit_mou($id, $editmou) 
	{
		return $this->db->where('id', $id)->update('tbl_kerjasama', $editmou);
	}

	public function filter_tmt()
	{
		$this->db->distinct()->select('YEAR(`tmt`)');
		return $this->db->get('tbl_kerjasama')->result_array();
	}

	public function getById($id)
	{
		return $this->db->get_where('tbl_kerjasama', ['id' => $id])->row();
    }
}