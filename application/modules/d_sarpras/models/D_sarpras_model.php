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

	public function get_belanja_tahun() {
		$this->db->select('SUM((jumlah*harga_beli)+(luas*harga_beli)) AS total, tahun, kategori');
		$this->db->group_by(array("kategori", "tahun"));
		$this->db->order_by('kategori', 'ASC');
		$result = $this->db->get('sarpras');

		return $result;
	}

	public function get_kategori() {

		$this->db->distinct();
		$this->db->select('kategori');
		$this->db->order_by('kategori', 'ASC');
		$result = $this->db->get('sarpras');

		return $result;
	}

}