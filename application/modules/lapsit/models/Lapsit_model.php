<?php

class Lapsit_model extends CI_Model
{
	public function getLapsit($tgl, $ang, $id_satker, $jk)
	{
		$this->db->select('(kurang + hadir) as jumlah, kurang, hadir, dd, sakit, izin, isolasi, tk');
		$this->db->where('tgl', $tgl);
		$this->db->where('ang', $ang);
		$this->db->where('id_satker', $id_satker);
		$this->db->where('jk', $jk);
		$this->db->from('tbl_lapsit');
		$result = $this->db->get()->result_array();

		$isNull = [
			0 => [
				'jumlah' => 0,
				'kurang' => 0,
				'hadir' => 0, 
				'dd' => 0,
				'sakit' => 0,
				'izin' => 0,
				'isolasi' => 0,
				'tk' => 0,
			]
		];

		return  $result ? $result : $isNull;		
    }

	public function getKlb($tgl, $ang, $id_satker)
	{
		$this->db->select('keterangan');
		$this->db->where('tgl', $tgl);
		$this->db->where('ang', $ang);
		$this->db->where('id_satker', $id_satker);
		$this->db->from('tbl_klb');
		$result = $this->db->get()->result_array();

		$isNull = [
			0 => [
				'keterangan' => '-',
			]
		];

		return  $result ? $result : $isNull;		
    }
}