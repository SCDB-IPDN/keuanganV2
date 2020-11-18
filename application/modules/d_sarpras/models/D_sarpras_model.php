<?php
class D_sarpras_model extends CI_Model{

	public function get_sarpras() {

		// $result = $this->db->query("SE");
		$this->db->order_by('kategori', 'ASC');
		$result = $this->db->get('sarpras');

		return $result;
	}

}