  <?php
class Absensi_model extends CI_Model
{
	public function get_divisi()
	{
		$result = $this->db->query("SELECT penugasan FROM `users` GROUP by penugasan");

		return $result;
	}

	public function get_absensi()
	{
		$result = $this->db->query("SELECT * FROM `absensi`");

		return $result;
	}

	public function get_divisi_table($penugasan)
	{
		$result = $this->db->query("SELECT absensi.id_absen,absensi.tgl,absensi.waktu,absensi.keterangan,users.nama,users.penugasan FROM absensi JOIN users ON absensi.id_user= users.id_user WHERE users.penugasan = '$penugasan' and absensi.keterangan='masuk' group by users.nama");

		return $result;
	}


}