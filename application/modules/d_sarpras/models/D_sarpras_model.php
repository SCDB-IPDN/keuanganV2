<?php
class D_sarpras_model extends CI_Model{

	public function get_sarpras($satker) {
		// SELECT * FROM tbl_sarpras s JOIN tbl_sarpras_kat k ON kode REGEXP concat('^', k.id);
		$this->db->select('*');
		$this->db->from('tbl_sarpras');
		$this->db->join('tbl_sarpras_kat', "kode REGEXP concat('^', tbl_sarpras_kat.id)");
		$this->db->where('kode_satker', $satker);
		$this->db->order_by('kategori', 'ASC');
		$result = $this->db->get();

		return $result;
	}

	public function get_sarpras_year($satker) {

		$this->db->select('COUNT(tahun) as total, tahun, kategori');
		$this->db->where('kode_satker', $satker);
		$this->db->group_by(array("kategori", "tahun"));
		$result = $this->db->get('tbl_sarpras');

		return $result;
	}

	public function get_belanja_tahun($satker) {
		// $this->db->select("FORMAT(SUM((jumlah*harga_beli)+(luas*harga_beli)), 2, 'de_DE') AS total, tahun, kategori");
		$this->db->select("SUM((jumlah*harga_beli)) AS total, SUM((jumlah*harga_baru)) AS perolehan, tahun, kategori");
		$this->db->from('tbl_sarpras');
		$this->db->join('tbl_sarpras_kat', "kode REGEXP concat('^', tbl_sarpras_kat.id)");
		$this->db->where('kode_satker', $satker);
		$this->db->group_by(array("kategori", "tahun"));
		$this->db->order_by('kategori', 'ASC');
		$result = $this->db->get();

		return $result;
	}

	public function get_kategori($satker) {

		// SELECT DISTINCT kategori FROM tbl_sarpras s JOIN tbl_sarpras_kat k ON kode REGEXP concat('^', k.id) WHERE kode_satker=677024 ORDER BY kategori ASC
		$this->db->distinct();
		$this->db->select('kategori');
		$this->db->from('tbl_sarpras');
		$this->db->join('tbl_sarpras_kat', "kode REGEXP concat('^', tbl_sarpras_kat.id)");
		$this->db->where('kode_satker', $satker);
		$this->db->order_by('kategori', 'ASC');
		$result = $this->db->get();

		return $result;
	}

	public function get_kategori2() {

		$this->db->distinct();
		$this->db->select('kategori');
		$this->db->order_by('kategori', 'ASC');
		$result = $this->db->get('tbl_sarpras_kat');

		return $result;
	}

}