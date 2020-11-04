<!-- begin #sidebar -->
<div id="sidebar" class="sidebar">
    <div data-scrollbar="true" data-height="100%">
        <ul class="nav">
            <li class="nav-profile">
                <a href="javascript:;" data-toggle="nav-profile">
                    <div class="cover with-shadow"></div>
                    <div class="image">
                        <img src="https://www.searchpng.com/wp-content/uploads/2019/02/Men-Profile-Image.png" alt=""/>
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
                    <li class="<?php echo $this->uri->segment(1)=="profil"?"active":"";?>"><a href="profil"><i class="fa fa-cog"></i> Edit Profile</a></li>
                </ul>
            </li>
        </ul>
        <ul class="nav">
            <li class="nav-header">Navigation</li>
            <li class="<?php echo $this->uri->segment(1)=="home" || $this->uri->segment(1)=="d_span" || $this->uri->segment(1)=="d_span_biro"?"active":"";?> has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>    
                    <i class="fa fa-th-large"></i> 
                    <span>Dashboard</span>
                </a>
                <ul class="sub-menu">
					<li class="<?php echo $this->uri->segment(1)=="home"?"active":"";?>"><a href="home">HOME</a></li>
					<li class="<?php echo $this->uri->segment(1)=="d_span" || $this->uri->segment(1)=="d_span_biro"?"active":"";?> has-sub">
                        <a href="javascript:;">
                            <b class="caret"></b>
                            SPAN
                        </a>
                        <ul class="sub-menu">
                            <li class="<?php echo $this->uri->segment(1)=="d_span"?"active":"";?>"><a href="d_span">UTAMA</a></li>
							<li class="<?php echo $this->uri->segment(1)=="d_span_biro"?"active":"";?>"><a href="d_span_biro">KAMPUS JATINANGOR</a></li>
						</ul>
                    </li>

                    <li><a href="home">POK</a></li>
                    <li><a href="home">SAS</a></li>
				</ul>
            </li>
            <?php if($this->session->userdata('role') == 'Admin'){?>
            
            <li class="<?php echo $this->uri->segment(1)=="pegawai"?"active":"";?>">
                <a href="pegawai"><i class="fa fa-users"></i> <span>Pegawai</span></a>
            </li>

            <?php } ?>
            <!-- <li class="nav-header">Section Kehadiran</li>
            <li class="">
                <a href="#"><i class="fa fa-calendar"></i> <span>Kehadiran Pegawai</span></a>
            </li>
            <li class="nav-header">Section Keuangan</li>
            <li class="">
                <a href="#"><i class="fa fa-chart-pie"></i> <span>Keuangan Pegawai</span></a>
            </li>
            <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li> -->
        </ul>
    </div>
</div>
<div class="sidebar-bg"></div>
<!-- end #sidebar -->