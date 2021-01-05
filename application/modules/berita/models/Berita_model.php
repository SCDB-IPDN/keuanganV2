<?php
class Berita_model extends CI_Model{
    
	public function berita(){
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->result();
    }

    public function tambah_berita($input_data){
        return $this->db->insert('berita', $input_data);
    }

    function edit_berita($input_data){       
        $id_berita = $input_data['id_berita'];
        return $this->db->where('id_berita', $id_berita)->update('berita', $input_data);
    }

    function draft_berita($input_data){       
        $id_berita = $input_data['id_berita'];
        return $this->db->where('id_berita', $id_berita)->update('berita', $input_data);
    }

    function publish_berita($input_data){       
        $id_berita = $input_data['id_berita'];
        return $this->db->where('id_berita', $id_berita)->update('berita', $input_data);
    }
}