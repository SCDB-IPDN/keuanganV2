<!-- TOPNAVBAR -->
<style>

</style>
<!-- <div class="container grd3">
	<center>
		<div class="topnav">
			<a href="#home">(021) 123456789</a>
			<a href="#news">cs.ipdn@ipdn.id</a>
			<a href="#contact">Jl. Raya Bandung-Sumedang Km. 20 Jatinangor, Sumedang 45363</a>
		</div>
	</center>
</div> -->
<!-- END TOPNAVBAR -->
<!-- HEADER -->
<header class="header transparent-header">
	<div class="container">
		<nav class="navbar navbar-toggleable-md navbar-inverse yamm" id="slide-nav">
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTopMenu" aria-controls="navbarTopMenu" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a class="navbar-brand" href="<?= base_url()?>f_themes"><img src="assets/page-w7/images/logo2_footer.png" class="logo-header"></a>
			<div class="collapse navbar-collapse" id="navbarTopMenu">
				<ul class="navbar-nav mr-auto mt-2 mt-md-0">
					<li class="<?= $this->uri->segment(1) == "f_website" ? "active" : ""; ?>">
						<a class="nav-link" href="https://www.ipdn.ac.id/" target="_blank">
							<b>Tentang IPDN</b></font>
						</a>
					</li>
					<li class="<?= $this->uri->segment(1) != "f_website" ? "active" : ""; ?>">
						<a class="nav-link" href="https://www.kemendagri.go.id/" target="_blank">
							<b>Tentang Kemendagri</b></font>
						</a>
					</li>
					<li class="dropdown yamm-fw nav-item has-submenu">
						<a class="nav-link dropdown-toggle" href="#" id="dropdown61" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<b>Smart Campus Database</b></font>
						</a>
						<ul class="dropdown-menu" aria-labelledby="dropdown61">
							<li>
								<div class="row">
									<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
										<div class="mega-menu-items">
											<h4>First column</h4>
											<ol>
												<li><a href="#">Mega Menu Item</a></li>
											</ol>
										</div>
									</div>
									<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
										<div class="mega-menu-items">
											<h4>Second Block</h4>
											<ol>
												<li><a href="#">Mega Menu Item</a></li>
											</ol>
										</div>
									</div>
									<div class="col-lg-6 hidden-md-down hidden-sm-down hidden-xs-down">
										<div class="menu-image">
											<img src="assets/page-w7/upload/menu-banner_01.jpg" alt="" class="img-fluid">
											<div class="menu-details">
												<p class="bolder">Build Your Own</p>
												<p>The Micrology comes with mega menu section<br> and HTML blocks.</p>
												<a href="#" class="btn btn-orange btn-sm withradius secbtn">Did you like?</a>
											</div>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</li>
					<li class="nav-item dropdown has-submenu">
						<a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<b>Humas</b></font>
						</a>
						<ul class="dropdown-menu" aria-labelledby="dropdown05">
							<li>
								<a class="dropdown-item" href="#">Sub Dropdown 
									<span class="hidden-md-down hidden-sm-down hidden-xs-down">
										<i class="fa fa-angle-right"></i>
									</span>
								</a>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="#">Sub Dropdown Item</a></li>
								</ul>
							</li>
							<li>
								<a class="dropdown-item" href="#">Sub Dropdown 
									<span class="hidden-md-down hidden-sm-down hidden-xs-down">
										<i class="fa fa-angle-right"></i>
									</span>
								</a>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="#">Sub Dropdown Item</a></li>
								</ul>
							</li>
							<li><a class="dropdown-item" href="#">Dropdown Item</a></li>
						</ul>
					</li>
					<li class="nav-item dropdown has-submenu">
						<a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<b>Layanan</b></font>
						</a>
						<ul class="dropdown-menu" aria-labelledby="dropdown05">
							<li>
								<a class="dropdown-item" href="#">Sub Dropdown 
									<span class="hidden-md-down hidden-sm-down hidden-xs-down">
										<i class="fa fa-angle-right"></i>
									</span>
								</a>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="#">Sub Dropdown Item</a></li>
								</ul>
							</li>
							<li>
								<a class="dropdown-item" href="#">Sub Dropdown 
									<span class="hidden-md-down hidden-sm-down hidden-xs-down">
										<i class="fa fa-angle-right"></i>
									</span>
								</a>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="#">Sub Dropdown Item</a></li>
								</ul>
							</li>
							<li><a class="dropdown-item" href="#">Dropdown Item</a></li>
						</ul>
					</li>
				</ul>
				<div class="nav navbar-nav ml-auto hidden-md-down hidden-sm-down hidden-xs-down">
					<!-- <div class="head-social">
						<a href="#" title="Facebook"><i class="fa fa-facebook" style="color: #fff;"></i></a>
						<a href="#" title="Twitter"><i class="fa fa-twitter" style="color: #fff;"></i></a>
						<a href="#" title="Instagram"><i class="fa fa-instagram" style="color: #fff;"></i></a>
					</div> -->
					<div class="menu-right">
						<a href="#" class="btn btn-custom btn-sm withradius secbtn" title="Open Right Menu">
							<span class="fa fa-sign-in"></span> 
							Login
						</a>
						<a id="nav-expander" href="#" class="btn btn-custom btn-sm withradius secbtn-circle withicon" title="Open Right Menu">
							<span class="fa fa-bullhorn"></span> 
							<i class="fa fa-long-arrow-right"></i>
						</a>
						<!-- <a id="nav-expander" href="#" title="Open Right Menu">
							<i class="fa fa-bars" style="color: #fff;"></i>
						</a> -->
					</div>
				</div>
			</div>
		</nav>
	</div>
</header>
<!-- END HEADER -->