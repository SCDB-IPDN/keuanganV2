<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>SCDB IPDN | Login Page</title>
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
	<div id="page-container" class="fade">
		<div class="login login-v1">
			<div class="login-container">
				<div class="login-header">
					<div class="brand">
						<span class="logo"></span> <b>LOGIN</b>
						<small>SCDB IPDN &copy; <?php echo date('Y') ?></small>
					</div>
					<div class="icon">
						<!-- <i class="fa fa-lock"></i> -->
						<img src="https://upload.wikimedia.org/wikipedia/commons/5/56/Lambang_IPDN.png" class="lingkaran">
					</div>
				</div>
				<div class="login-body">
					<div class="login-content">
						<form action="<?php echo base_url(); ?>user/proses" method="POST" class="margin-bottom-0">
							<div class="form-group m-b-20">
								<input type="text" class="form-control form-control-lg inverse-mode" name="nip" placeholder="nip" required />
							</div>
							<div class="form-group m-b-20">
								<input type="password" class="form-control form-control-lg inverse-mode" name="password" placeholder="Password" required />
							</div>
							<center><b><?php echo $this->session->flashdata('error') ?></b></center>
							<br>
							<div class="checkbox checkbox-css m-b-20">
								<input type="checkbox" id="remember_checkbox" /> 
								<label for="remember_checkbox">
								Remember Me
								</label>
							</div>
							<div class="login-buttons">
								<button type="submit" class="btn btn-success btn-block btn-lg">Login</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	  </div>
	<script src="<?php echo base_url('assets/js/app.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/theme/default.min.js'); ?>"></script>
	<!-- <script src="assets/js/app.min.js"></script>
	<script src="assets/js/theme/default.min.js"></script> -->
</body>
</html>
