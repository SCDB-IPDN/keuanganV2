<?php
class D_sarpras_model extends CI_Model{

	public function get_sarpras() {
		
		$this->db->order_by('kategori', 'ASC');
		$result = $this->db->get('sarpras');

		return $result;
	}

	public function get_sarpras_year() {

		$this->db->select('COUNT(tahun) as total, tahun, kategori');
		$this->db->group_by(array("kategori", "tahun"));
		$result = $this->db->get('sarpras');

		return $result;
	}

}