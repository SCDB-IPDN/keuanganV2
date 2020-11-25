<?php
class History_model extends CI_Model
{
    public function get_range_span($fromDate, $endDate)
	{	
        $result = $this->db->query("SELECT *, alias FROM (SELECT a.*, b.alias FROM tbl_span as a JOIN tbl_satker as b ON a.kode_satker=b.kode_satker WHERE a.created_date between '$fromDate' and '$endDate' ORDER BY a.id_span) as k ORDER BY id_span ASC");

		return $result;
    }
    
    public function get_range_span_biro($fromDate)
	{	
		$result = $this->db->query("SELECT *, alias FROM (SELECT a.*, b.alias FROM tbl_span_biro as a JOIN tbl_satker_biro as b ON a.kode_satker_biro=b.kode_satker_biro WHERE a.created_date = '$fromDate'  ORDER BY a.id_span_biro) as k ORDER BY alias ASC");

		return $result;
    }
}