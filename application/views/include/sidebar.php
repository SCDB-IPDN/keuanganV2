<!-- begin #sidebar -->
<div id="sidebar" class="sidebar">
	<div data-scrollbar="true" data-height="100%">
		<ul class="nav">
			<li class="nav-profile">
				<a href="javascript:;" data-toggle="nav-profile">
					<div class="cover with-shadow"></div>
					<div class="image">
						<img src="https://www.searchpng.com/wp-content/uploads/2019/02/Men-Profile-Image.png" alt="" />
					</div>
					<div class="info">
						<b class="caret pull-right"></b>
						<?php echo $_SESSION['nama']; ?>
						<small>Nip: <?php echo $_SESSION['nip']; ?></small>
					</div>
				</a>
			</li>
			<li>
				<ul class="nav nav-profile">
					<li class="<?php echo $this->uri->segment(1) == "profil" ? "active" : ""; ?>"><a href="<?php echo base_url('profil'); ?>"><i class="fa fa-cog"></i> Edit Profile</a></li>
				</ul>
			</li>
		</ul>
		<ul class="nav">
			<li class="nav-header">Navigation</li>
			<li class="<?php echo $this->uri->segment(1) == "home" ? "active" : ""; ?> has-sub">
				<a href="<?php echo base_url('home'); ?>">
					<i class="fa fa-th-large"></i>
					<span>Dashboard</span>
				</a>
			</li>

			<!-- KEUANGAN -->
			<li class="<?php echo $this->uri->segment(1) == "d_spanint" || $this->uri->segment(1) == "d_pok" || $this->uri->segment(1) == "d_sas" || $this->uri->segment(2) == "biro" ? "active" : ""; ?> has-sub">
				<a href="javascript:;">
					<b class="caret"></b>
					<i class="fas fa-money-bill-alt"></i>
					<span>Keuangan</span>
				</a>
				<ul class="sub-menu">
					<li class="<?php echo $this->uri->segment(1) == "d_spanint" || $this->uri->segment(2) == "448302" ? "active" : ""; ?> has-sub">
						<a href="javascript:;">
							<b class="caret"></b>
							SPAN
						</a>
						<ul class="sub-menu">
							<li class="<?php echo $this->uri->segment(1) == "d_spanint" && $this->uri->segment(2) != "448302" ? "active" : ""; ?>"><a href="<?php echo base_url('d_spanint'); ?>">UTAMA</a></li>
							<li class="<?php echo $this->uri->segment(2) == "448302" ? "active" : ""; ?>"><a href="<?php echo base_url('d_spanint/448302'); ?>">KAMPUS JATINANGOR</a></li>
						</ul>
					</li>
					<li class="<?php echo $this->uri->segment(1) == "d_pok" ? "active" : ""; ?> has-sub">
						<a href="javascript:;">
							<b class="caret"></b>
							POK
						</a>
						<ul class="sub-menu">
							<li class="<?php echo $this->uri->segment(1) == "d_pok" ? "active" : ""; ?>"><a href="<?php echo base_url('d_pok'); ?>">JATINANGOR</a></li>
						</ul>
					</li>

					<li class="<?php echo $this->uri->segment(1) == "d_sas" ? "active" : ""; ?> has-sub">
						<a href="javascript:;">
							<b class="caret"></b>
							SAS
						</a>
						<ul class="sub-menu">
							<li class="<?php echo $this->uri->segment(1) == "d_sas" ? "active" : ""; ?>"><a href="<?php echo base_url('d_sas'); ?>">UTAMA</a></li>
							<!-- <li class="<?php echo $this->uri->segment(1) == "coba" ? "active" : ""; ?>"><a href="<?php echo base_url('d_sas/coba'); ?>">KAMPUS JATINANGOR</a></li>
							<li class="<?php echo $this->uri->segment(1) == "d_sasbaru" ? "active" : ""; ?>"><a href="<?php echo base_url('d_sasbaru'); ?>">KAMPUS JATINANGOR</a></li> -->
						</ul>
					</li>

				</ul>
			</li>
			<!-- END KEUANGAN -->

			<!-- KEPEGAWAIAN -->
			<li class="<?php echo $this->uri->segment(1)=="kepegawaian" && $this->uri->segment(2)!="dosen" || $this->uri->segment(2)=="thl"?"active":"";?> has-sub">
				<a href="javascript:;">
					<b class="caret"></b>
					<i class="fas fa-id-card"></i>
					<span>Kepegawaian</span>
				</a>
				<ul class="sub-menu">
					<li class="<?php echo $this->uri->segment(1)=="kepegawaian" && $this->uri->segment(2)!="thl" && $this->uri->segment(2)!="ta" && $this->uri->segment(2)!="dosen" ?"active":"";?>"><a href="<?php echo base_url('kepegawaian');?>">PNS</a></li>
					<li class="<?php echo $this->uri->segment(2)=="thl" || $this->uri->segment(2)=="ta" ?"active":"";?> has-sub">
						<a href="javascript:;">
							<b class="caret"></b>
							NON-PNS
						</a>
						<ul class="sub-menu">
							<li class="<?php echo $this->uri->segment(2) == "thl" ? "active" : ""; ?>"><a href="<?php echo base_url('kepegawaian/thl'); ?>">THL</a></li>
							<li class="<?php echo $this->uri->segment(2) == "ta" ? "active" : ""; ?>"><a href="<?php echo base_url('kepegawaian/ta'); ?>">TA</a></li>
						</ul>
					</li>
				</ul>
			</li>
			<!-- END KEPEGAWAIAN -->

			<!-- AKADEMIK -->
			<li class="<?php echo $this->uri->segment(2)=="dosen"?"active":"";?> has-sub">
				<a href="javascript:;">
					<b class="caret"></b>
					<i class="fas fa-school"></i>
					<span>Akademik</span>
				</a>
				<ul class="sub-menu">
					<li class="<?php echo $this->uri->segment(2)=="dosen" ?"active":"";?>"><a href="<?php echo base_url('kepegawaian/dosen');?>">DOSEN</a></li>
				</ul>
			</li>
			<!-- END AKADEMIK -->

			<!-- KEPRAJAAN -->
			<li class="<?php echo $this->uri->segment(1) == "d_praja" ? "active" : ""; ?> has-sub">
				<a href="javascript:;">
					<b class="caret"></b>
					<i class="fas fa-graduation-cap"></i>
					<span>Keprajaan</span>
				</a>
				<ul class="sub-menu">
					<li class="<?php echo $this->uri->segment(1) == "d_praja" ? "active" : ""; ?>"><a href="<?php echo base_url('d_praja'); ?>">PRAJA</a></li>
					<!-- <li class="<?php echo $this->uri->segment(1) == "alumni" ? "active" : ""; ?>"><a href="<?php echo base_url('d_praja/alumni'); ?>">ALUMNI</a></li> -->

				</ul>
			</li>
			<!-- END KEPRAJAAN -->

			<!-- PERENCANAAN -->
			<li class="<?php echo $this->uri->segment(2) == "span" || $this->uri->segment(2) == "span_jatinangor" || $this->uri->segment(1) == "d_peringkat" ? "active" : ""; ?> has-sub">
				<a href="javascript:;">
					<b class="caret"></b>
					<i class="fas fa-chart-line"></i>
					<span>Perencanaan</span>
				</a>
				<ul class="sub-menu">
					<li class="<?php echo $this->uri->segment(2) == "span" || $this->uri->segment(2) == "span_jatinangor" ? "active" : ""; ?> has-sub">
						<a href="javascript:;">
							<b class="caret"></b>
							HISTORY
						</a>
						<ul class="sub-menu">
							<li class="<?php echo $this->uri->segment(2) == "span" || $this->uri->segment(2) == "span_jatinangor" ? "active" : ""; ?>"><a href="<?php echo base_url('history/span'); ?>">SPAN</a></li>
						</ul>
					</li>
					<li class="<?php echo $this->uri->segment(1) == "d_peringkat" ? "active" : ""; ?>"><a href="<?php echo base_url('d_peringkat'); ?>">PERINGKAT</a></li>
				</ul>

			</li>
			<!-- END PERENCANAAN -->

			<!-- SARPRAS -->
			<li class=" <?php echo $this->uri->segment(2)=="448302" || $this->uri->segment(2)=="677024" || $this->uri->segment(2)=="683091" || $this->uri->segment(2)=="683084" || $this->uri->segment(2)=="677010"?"active":"";?> has-sub">
				<a href="javascript:;">
					<b class="caret"></b>
					<i class="fas fa-building"></i>
					<span>Sarpras</span>
				</a>
				<ul class="sub-menu">
					<li class="<?php echo $this->uri->segment(2)=="448302"?"active":"";?>"><a href="<?php echo base_url('d_sarpras')."/448302";?>">JATINANGOR</a></li>
					<li class="<?php echo $this->uri->segment(2)=="677024"?"active":"";?>"><a href="<?php echo base_url('d_sarpras')."/677024";?>">SULAWESI SELATAN</a></li>
					<li class="<?php echo $this->uri->segment(2)=="683091"?"active":"";?>"><a href="<?php echo base_url('d_sarpras')."/683091";?>">PAPUA</a></li>
					<li class="<?php echo $this->uri->segment(2)=="683084"?"active":"";?>"><a href="<?php echo base_url('d_sarpras')."/683084";?>">NTB</a></li>
					<li class="<?php echo $this->uri->segment(2)=="677010"?"active":"";?>"><a href="<?php echo base_url('d_sarpras')."/677010";?>">SULAWESI UTARA</a></li>
				</ul>
			</li>
			<!-- END SARPRAS -->

			<?php if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'Keuangan' || $this->session->userdata('role') == 'Perencanaan' || $this->session->userdata('role') == 'Bmn'  ){?>
			<li class="nav-header">Data</li>
				<li class="<?php echo $this->uri->segment(2)=="v_span" || $this->uri->segment(2)=="v_dosen" || $this->uri->segment(2)=="v_pns" || $this->uri->segment(2)=="v_thl" || $this->uri->segment(2)=="v_pok" || $this->uri->segment(2)=="v_sas" || $this->uri->segment(2)=="v_sarpras" || $this->uri->segment(2)=="v_praja" || $this->uri->segment(2)=="v_rank"?"active":"";?> has-sub">
					<a href="javascript:;">
						<b class="caret"></b>
						<i class="fa fa-upload"></i>
						<span>Upload</span>
					</a>
					<ul class="sub-menu">
						<?php if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'Keuangan' || $this->session->userdata('role') == 'Perencanaan' ){?>
						<li class="<?php echo $this->uri->segment(2)=="v_span"?"active":"";?>"><a href="<?php echo base_url('uploads/v_span');?>">SPAN</a></li>
						<?php } ?>

						<?php if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'Keuangan' ){?>
						<li class="<?php echo $this->uri->segment(2)=="v_pok"?"active":"";?>"><a href="<?php echo base_url('uploads/v_pok');?>">POK</a></li>
						<?php } ?>

						<?php if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'Perencanaan' || $this->session->userdata('role') == 'Keuangan' ){?>
						<li class="<?php echo $this->uri->segment(2)=="v_sas"?"active":"";?>"><a href="<?php echo base_url('uploads/v_sas');?>">SAS</a></li>
						<?php } ?>

						<?php if($this->session->userdata('role') == 'Admin' ){?>
						<li class="<?php echo $this->uri->segment(2)=="v_praja"?"active":"";?>"><a href="<?php echo base_url('uploads/v_praja');?>">PRAJA</a></li>
						<!-- <li class="<?php echo $this->uri->segment(2)=="v_alumni"?"active":"";?>"><a href="<?php echo base_url('uploads/v_alumni');?>">ALUMNI</a></li> -->
						<li class="<?php echo $this->uri->segment(2)=="v_pns"?"active":"";?>"><a href="<?php echo base_url('uploads/v_pns');?>">PNS</a></li>
                    	<li class="<?php echo $this->uri->segment(2)=="v_thl"?"active":"";?>"><a href="<?php echo base_url('uploads/v_thl');?>">THL</a></li>
						<li class="<?php echo $this->uri->segment(2)=="v_dosen"?"active":"";?>"><a href="<?php echo base_url('uploads/v_dosen');?>">DOSEN</a></li>
						<?php } ?>

						<?php if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'Perencanaan' ){?>
						<li class="<?php echo $this->uri->segment(2)=="v_rank"?"active":"";?>"><a href="<?php echo base_url('uploads/v_rank');?>">PERINGKAT</a></li>
						<?php } ?>
						
						<?php if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'Bmn' ){?>
						<li class="<?php echo $this->uri->segment(3)=="jatinangor" || $this->uri->segment(3)=="sulsel" || $this->uri->segment(3)=="papua" || $this->uri->segment(3)=="ntb" || $this->uri->segment(3)=="sulut" ? "active" : ""; ?> has-sub">
							<a href="javascript:;">
								<b class="caret"></b>
								SARPRAS
							</a>
							<ul class="sub-menu">
								<li class="<?php echo $this->uri->segment(3)=="jatinangor"?"active":"";?>"><a href="<?php echo base_url('uploads/v_sarpras/jatinangor');?>">SARPRAS JATINANGOR</a></li>
								<li class="<?php echo $this->uri->segment(3)=="sulsel"?"active":"";?>"><a href="<?php echo base_url('uploads/v_sarpras/sulsel');?>">SARPRAS SULSEL</a></li>
								<li class="<?php echo $this->uri->segment(3)=="papua"?"active":"";?>"><a href="<?php echo base_url('uploads/v_sarpras/papua');?>">SARPRAS PAPUA</a></li>
								<li class="<?php echo $this->uri->segment(3)=="ntb"?"active":"";?>"><a href="<?php echo base_url('uploads/v_sarpras/ntb');?>">SARPRAS NTB</a></li>
								<li class="<?php echo $this->uri->segment(3)=="sulut"?"active":"";?>"><a href="<?php echo base_url('uploads/v_sarpras/sulut');?>">SARPRAS SULUT</a></li>
							</ul>
						</li>
						<?php } ?>
					</ul>
				</li>
			<?php } ?>

			<?php if ($this->session->userdata('role') == 'Admin') { ?>
				<li class="<?php echo $this->uri->segment(1) == "apps" ? "active" : ""; ?>">
					<a href="<?php echo base_url('apps'); ?>"><i class="fa fa-list"></i> <span>Aplikasi</span></a>
				</li>
				<li class="<?php echo $this->uri->segment(1) == "pegawai" ? "active" : ""; ?>">
					<a href="<?php echo base_url('pegawai'); ?>"><i class="fa fa-users"></i> <span>User</span></a>
				</li>
			<?php } ?>

			<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
		</ul>
	</div>
</div>
<div class="sidebar-bg"></div>
<!-- end #sidebar -->