<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>SCDB IPDN | Pilihan Tampilan</title>
	<link rel="icon" type="image/png" href="https://upload.wikimedia.org/wikipedia/commons/5/56/Lambang_IPDN.png">
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<!-- <link href="assets/css/default/app.min.css" rel="stylesheet" /> -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/default/app.min.css');?>">
</head>
<style type="text/css">
	.lingkaran{
		width: 100px;
		height: 100px;
	}
</style>
<body class="pace-top">
	<div id="page-loader" class="fade show">
		<span class="spinner"></span>
	</div>

	<!-- begin login-cover -->
	<div class="login-cover">
		<div class="login-cover-image" style="background-image: url(<?php echo base_url('assets/img/login-bg/login-ipdn-1.jpg');?>)" data-id="login-cover-image"></div>
		<div class="login-cover-bg"></div>
	</div>
	<!-- end login-cover -->

	<div id="page-container" class="fade">
		<!-- begin login -->
		<div class="login login-v2" data-pageload-addclass="animated fadeIn">
			<!-- begin brand -->
			<div class="login-header">
				<div class="row">
					<div class="col-md-6">
						<div class="login-buttons">
							<a href="http://192.168.203.68/W-IPDN/Group/FrontendV2">
								<span type="submit" class="btn btn-success btn-sm"><i class="fas fa-arrow-left"></i></span>
							</a>
							<hr>
						</div>
					</div>
				</div>
				<div class="brand">
					<span class="logo"></span> <b>SCDB IPDN</b>
					<small>SCDB IPDN v1.0 &copy; <?php echo date('Y') ?></small>
				</div>
				<div class="icon">
					<!-- <i class="fa fa-lock"></i> -->
					<img src="https://upload.wikimedia.org/wikipedia/commons/5/56/Lambang_IPDN.png" class="lingkaran">
				</div>
			</div>
			<!-- end brand -->
			<!-- begin login-content -->
			<div class="login-content">
				<p>Silahkan pilih tampilan yang akan dibuka, jika anda memiliki NIP dan Password disarankan masuk ke tampilan password.</p>
				<div class="row">
					<div class="col-md-6">
						<div class="login-buttons">
							<a href="<?= $t_umum ?>">
								<br>
								<span type="submit" class="btn btn-success btn-block btn-lg">Tampilan Umum</span>
							</a>
						</div>
					</div>
					<div class="col-md-6">
						<div class="login-buttons">
							<a href="<?= $t_password ?>">
								<br>
								<span type="submit" class="btn btn-success btn-block btn-lg">Tampilan Password</span>
							</a>
						</div>
					</div>
				</div>
			</div>
			<!-- end login-content -->
		</div>
		<!-- end login -->
		
		<!-- begin login-bg -->
		<ul class="login-bg-list clearfix">
			<li class="active"><a href="javascript:;" data-click="change-bg" data-img="<?php echo base_url('assets/img/login-bg/login-ipdn-1.jpg');?>" style="background-image: url(<?php echo base_url('assets/img/login-bg/login-ipdn-1.jpg');?>)"></a></li>
			<li><a href="javascript:;" data-click="change-bg" data-img="<?php echo base_url('assets/img/login-bg/login-bg-16.jpg');?>" style="background-image: url(<?php echo base_url('assets/img/login-bg/login-bg-16.jpg');?>)"></a></li>
			<li><a href="javascript:;" data-click="change-bg" data-img="<?php echo base_url('assets/img/login-bg/login-bg-15.jpg');?>" style="background-image: url(<?php echo base_url('assets/img/login-bg/login-bg-15.jpg');?>)"></a></li>
			<li><a href="javascript:;" data-click="change-bg" data-img="<?php echo base_url('assets/img/login-bg/login-bg-14.jpg');?>" style="background-image: url(<?php echo base_url('assets/img/login-bg/login-bg-14.jpg');?>)"></a></li>
			<li><a href="javascript:;" data-click="change-bg" data-img="<?php echo base_url('assets/img/login-bg/login-bg-13.jpg');?>" style="background-image: url(<?php echo base_url('assets/img/login-bg/login-bg-13.jpg');?>)"></a></li>
			<li><a href="javascript:;" data-click="change-bg" data-img="<?php echo base_url('assets/img/login-bg/login-bg-12.jpg');?>" style="background-image: url(<?php echo base_url('assets/img/login-bg/login-bg-12.jpg');?>)"></a></li>
		</ul>
		<!-- end login-bg -->
	</div>

	
	<script src="<?php echo base_url('assets/js/app.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/theme/default.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/demo/login-v2.demo.js'); ?>"></script>
</body>
</html>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-show-password/1.0.3/bootstrap-show-password.min.js"></script>

<script type="text/javascript">
	$("#password").password('toggle');
</script>
<script>
function goBack() {
  window.history.back();
}
</script>
