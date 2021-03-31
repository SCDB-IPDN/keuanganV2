<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>Smart Campus Database | &copy; Offical Website SCDB IPDN</title>
	<link rel="icon" type="image/png" sizes="16x16" href="https://upload.wikimedia.org/wikipedia/commons/5/56/Lambang_IPDN.png">
	<link href="<?= base_url('assets/page-w9/css/bootstrap.css');?>" rel="stylesheet">
	<link href="<?= base_url('assets/page-w9/css/style.css');?>" rel="stylesheet">
	<link href="<?= base_url('assets/page-w9/css/responsive.css');?>" rel="stylesheet">
	<link href="<?= base_url('assets/page-w9/css/color-switcher-design.css');?>" rel="stylesheet">
	<link id="theme-color-file" href="<?= base_url('assets/page-w9/css/color-themes/default-theme.css');?>" rel="stylesheet">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style type="text/css">
	.logo-header {
		width: 357px;
		height: 100%;
		padding: 14px;
	}
	.logo-header2 {
		width: 150px;
		height: 100%;
		/* padding: 14px; */
	}
	.profil-user {
		width: 40px;
		height: 100%;
		margin-top: -7px;
		background-color: #fff;
		border-radius: 100%;
	}
</style>
<?php
function tanggal_indo($tanggal, $cetak_hari = false)
{
	$hari = array ( 1 =>    
		'Senin',
		'Selasa',
		'Rabu',
		'Kamis',
		'Jumat',
		'Sabtu',
		'Minggu'
	);
	$bulan = array (1 =>   
		'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$split    = explode('-', $tanggal);
	$tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];

	if ($cetak_hari) {
		$num = date('N', strtotime($tanggal));
		return $hari[$num] . ', ' . $tgl_indo;
	}
	return $tgl_indo;
}
?>
<body class="hidden-bar-wrapper">
	<div class="page-wrapper">
		<div class="preloader"></div>
		