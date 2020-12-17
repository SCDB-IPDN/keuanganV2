<?php
class uploads_model extends CI_Model {
	'satker'    =>  $tmp[0],
	'nama'  =>  $txt[0],
	'pagu_peg' => $row['C'],
	'real_peg' => $row['D'],
	'pagu_bar' => $row['G'],
	'real_bar' => $row['H'],
	'pagu_mod' => $row['K'],
	'real_mod' => $row['L'],
	'created_at' => $newDate
	INSERT INTO tbl_rank (satker, nama, pagu_peg, real_peg, pagu_bar, real_bar, pagu_mod, real_mod, created_at) VALUES 

	public function upsert_batch($data) {
		$ccc = 0;
		foreach ($data as $value) {
			# code...
			$ccc++;
			if ($ccc == 1) {
				echo "($value[satker], $value[nama], $value[pagu_peg], $value[real_peg], $value[pagu_bar], $value[real_bar], $value[pagu_mod], $value[real_mod], )";
			} else {
				echo ", ($value[satker], $value[nama])";
			}
		}
	}
}