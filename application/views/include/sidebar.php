<!-- begin #sidebar -->
<div id="sidebar" class="sidebar">
	<div data-scrollbar="true" data-height="100%">
		<ul class="nav">
			<li class="nav-profile <?php echo $this->uri->segment(1) == "profil" ? "active" : ""; ?>">
				<a href="javascript:;" data-toggle="nav-profile">
					<div class="cover with-shadow"></div>
					<div class="image">
						<?php if(file_exists('assets/img/user/'.$this->session->userdata('image_url')) && $this->session->userdata('image_url') != NULL) { ?>
							<img src="<?php echo base_url().'assets/img/user/'. $this->session->userdata('image_url');?>" alt="" />     
						<?php }else{ ?>
							<img src="https://www.searchpng.com/wp-content/uploads/2019/02/Men-Profile-Image.png" alt=""/>  
						<?php } ?> 
					</div>
					<div class="info">
						<b class="caret pull-right"></b>
						<?php echo $this->session->userdata('nama'); ?>
						<small>Nip: <?php echo $this->session->userdata('nip'); ?></small>
					</div>
				</a>
			</li>
			<li>
				<ul class="nav nav-profile <?php echo $this->uri->segment(1) == "profil" ? "active" : ""; ?>">
					<li class="<?php echo $this->uri->segment(1) == "profil" ? "active" : ""; ?>"><a href="<?php echo base_url('profil'); ?>"><i class="fa fa-cog"></i> Edit Profile</a></li>
				</ul>
			</li>
		</ul>
		<ul class="nav">
			<li class="nav-header">Utama</li>
			
			<li class="<?php echo $this->uri->segment(1) == "home" ? "active" : ""; ?> has-sub">
				<a href="<?php echo base_url('home'); ?>">
					<i class="fa fa-th-large"></i>
					<span>Dashboard</span>
				</a>
			</li>
			<li class="has-sub">
				<a href="https://ipdn.ac.id" target="_blank">
					<i class="fas fa-globe"></i>
					<span>IPDN</span>
				</a>
			</li>

			<li class="nav-header">Menu</li>

			<!-- AKADEMIK -->
			<li class="<?php echo $this->uri->segment(1)=="dosen_dikti" || $this->uri->segment(1)=="import"?"active":"";?> has-sub">
				<a href="javascript:;">
					<b class="caret"></b>
					<i class="fas fa-school"></i>
					<span>Akademik</span>
				</a>
				<ul class="sub-menu">
					<li class="<?php echo $this->uri->segment(1)=="dosen_dikti" ?"active":"";?>"><a href="<?php echo base_url('dosen_dikti');?>">DOSEN</a></li>
					<li class=""><a href="http://sister.ipdn.ac.id" target="_blank">SISTER</a></li>
					<?php if ($this->session->userdata('role') == 'SuperAdmin') { ?>
						<li class="<?php echo $this->uri->segment(1)=="import" ?"active":"";?> has-sub">
							<a href="javascript:;">
								<b class="caret"></b>
								<i class="fas fa-upload"></i>
								<span>Import</span>
							</a>
							<ul class="sub-menu">
								<li class="<?php echo $this->uri->segment(2) == "view_kurkum" || $this->uri->segment(2) == "kurikulum" ? "active" : ""; ?>"><a href="<?php echo base_url('import/view_kurkum'); ?>">Kurikulum</a></li>
								<li class="<?php echo $this->uri->segment(2) == "kelas_kuliah" || $this->uri->segment(2) == "view_kk" || $this->uri->segment(2) == "krs" || $this->uri->segment(2) == "view_krs" || $this->uri->segment(2) == "dosen_ajar" || $this->uri->segment(2) == "view_da" ?"active":"";?> has-sub">
									<a href="javascript:;">
										<b class="caret"></b>
										<i class="fa fa-file-import"></i>
										<span>Kelas dan Krs</span>
									</a>
									<ul class="sub-menu">
										<li class="<?php echo $this->uri->segment(2) == "kelas_kuliah" || $this->uri->segment(2) == "view_kk"  ? "active" : ""; ?> has-sub">
											<a href="<?php echo base_url('import/view_kk'); ?>">Kelas Kuliah</a>
										</li>
										<li class="<?php echo $this->uri->segment(2) == "krs" || $this->uri->segment(2) == "view_krs" ? "active" : ""; ?> has-sub">
											<a href="<?php echo base_url('import/view_krs'); ?>">Krs</a>
										</li>
										<li class="<?php echo $this->uri->segment(2) == "dosen_ajar" || $this->uri->segment(2) == "view_da"  ? "active" : ""; ?> has-sub">
											<a href="<?php echo base_url('import/view_da'); ?>">Dosen Ajar</a>
										</li>
									</ul>
								</li>
								<li class="<?php echo $this->uri->segment(2) == "view_nilai" || $this->uri->segment(2) == "nilai" ? "active" : ""; ?>"><a href="<?php echo base_url('import/view_nilai'); ?>">Nilai Perkuliahan</a></li>
								<li class="<?php echo $this->uri->segment(2) == "view_akm" || $this->uri->segment(2) == "akm" ? "active" : ""; ?>"><a href="<?php echo base_url('import/view_akm'); ?>">Akm</a></li>
								<li class="<?php echo $this->uri->segment(2) == "view_kelulusan" || $this->uri->segment(2) == "kelulusan" ? "active" : ""; ?>"><a href="<?php echo base_url('import/view_kelulusan'); ?>">Kelulusan</a></li>
							</ul>
						<?php } ?>
					</li>
				</ul>
			</li>
			<!-- END AKADEMIK -->

			<!-- Fakultas -->
			<?php if($this->session->userdata('role') == 'SuperAdmin'){ ?>
				<li class="<?php echo $this->uri->segment(1) == "kemeng"  || $this->uri->segment(2)=="view_matkul" ? "active" : ""; ?> has-sub">
					<a href="javascript:;">
						<b class="caret"></b>
						<i class="fas fa-graduation-cap"></i>
						<span>Fakultas</span>
					</a>
					<ul class="sub-menu">
						<li class="<?php echo $this->uri->segment(1) == "kemeng" || $this->uri->segment(2) == "view_matkul" || $this->uri->segment(2) == "jadwal_dosen" || $this->uri->segment(2) == "plot" ? "active" : ""; ?> has-sub">
							<a href="javascript:;">
								<b class="caret"></b>
								KEMENG
							</a>
							<ul class="sub-menu">
								<li class="<?php echo $this->uri->segment(1) == "kemeng" && $this->uri->segment(2) == NULL ? "active" : ""; ?>"><a href="<?php echo base_url('kemeng'); ?>">PRESENSI</a></li>
								<li class="<?php echo $this->uri->segment(2) == "plot" ? "active" : ""; ?>"><a href="<?php echo base_url('kemeng/plot'); ?>">PLOT</a></li>
								<li class="<?php echo $this->uri->segment(2) == "view_matkul" ? "active" : ""; ?>"><a href="<?php echo base_url('kemeng/view_matkul'); ?>">MATKUL</a></li>
								<?php if($this->session->userdata('dosen') == 'Dosen' || $this->session->userdata('role') == 'Admin' ||$this->session->userdata('role') == 'SuperAdmin'){?>
									<li class="<?php echo $this->uri->segment(2) == "jadwal_dosen" ? "active" : ""; ?>"><a href="<?php echo base_url('kemeng/jadwal_dosen'); ?>">JADWAL</a></li>
									<li class="<?php echo $this->uri->segment(3)=="FHTP" || $this->uri->segment(3)=="FMP" || $this->uri->segment(3)=="FPP" ?"active":"";?> has-sub">
										<a href="javascript:;">
											<b class="caret"></b>
											HONOR ALL
										</a>
										<ul class="sub-menu">
											<li class="<?php echo $this->uri->segment(3)=="FHTP"?"active":"";?>"><a href="<?php echo base_url('kemeng/hon_all/')."/FHTP";?>">FHTP</a></li>
											<li class="<?php echo $this->uri->segment(3)=="FMP"?"active":"";?>"><a href="<?php echo base_url('kemeng/hon_all/')."/FMP";?>">FMP</a></li>
											<li class="<?php echo $this->uri->segment(3)=="FPP"?"active":"";?>"><a href="<?php echo base_url('kemeng/hon_all/')."/FPP";?>">FPP</a></li>
										</ul>
									</li>
								<?php } ?>
							</ul>
						</li>
					</ul>
				</li>
			<?php } ?>
			<!-- END Fakultas -->

			<!-- ORTALA -->
			<li class="<?php echo $this->uri->segment(1)=="ortala" ?"active":"";?> has-sub">
				<a href="javascript:;">
					<b class="caret"></b>
					<i class="fas fa-balance-scale"></i>
					<span>Hukum dan Ortala</span>
				</a>
				<ul class="sub-menu">
					<li class="<?php echo $this->uri->segment(1) == "ortala"  ? "active" : ""; ?> has-sub">
						<a href="javascript:;">
							<b class="caret"></b>
							Produk Hukum
						</a>
						<ul class="sub-menu">
							<li class="<?php echo $this->uri->segment(2) == "uu" ? "active" : ""; ?>"><a href="<?php echo base_url('ortala/uu'); ?>">Undang-Undang</a></li>
							<li class="<?php echo $this->uri->segment(2) == "pp" ? "active" : ""; ?>"><a href="<?php echo base_url('ortala/pp'); ?>">Peraturan Pemerintah</a></li>
							<li class="<?php echo $this->uri->segment(2) == "perpres" ? "active" : ""; ?>"><a href="<?php echo base_url('ortala/perpres'); ?>">Peraturan Presiden</a></li>
							<li class="<?php echo $this->uri->segment(2) == "kepres" ? "active" : ""; ?>"><a href="<?php echo base_url('ortala/kepres'); ?>">Keputusan Presiden</a></li>
							<li class="<?php echo $this->uri->segment(2) == "permen" ? "active" : ""; ?>"><a href="<?php echo base_url('ortala/permen'); ?>">Peraturan Menteri</a></li>
							<li class="<?php echo $this->uri->segment(2) == "km" ? "active" : ""; ?>"><a href="<?php echo base_url('ortala/km'); ?>">Keputusan Menteri</a></li>
							<li class="<?php echo $this->uri->segment(2) == "im" ? "active" : ""; ?>"><a href="<?php echo base_url('ortala/im'); ?>">Instruksi Menteri</a></li>
							<li class="<?php echo $this->uri->segment(2) == "sem" ? "active" : ""; ?>"><a href="<?php echo base_url('ortala/sem'); ?>">Surat Edaran Menteri</a></li>
							<li class="<?php echo $this->uri->segment(2) == "pr" ? "active" : ""; ?>"><a href="<?php echo base_url('ortala/pr'); ?>">Peraturan Rektor</a></li>
							<li class="<?php echo $this->uri->segment(2) == "keputusan_rektor" ? "active" : ""; ?>"><a href="<?php echo base_url('ortala/keputusan_rektor'); ?>">Keputusan Rektor</a></li>
							<li class="<?php echo $this->uri->segment(2) == "ser" ? "active" : ""; ?>"><a href="<?php echo base_url('ortala/ser'); ?>">Surat Edaran Rektor</a></li>

							<!-- <li class=""><a href="#">EKSTERNAL</a></li> -->
						</ul>
					</li>
				</ul>
			</li>
			<!-- END ORTALA -->

			<!-- KAMPUS -->
			<li class="has-sub">
				<a href="javascript:;">
					<b class="caret"></b>
					<i class="fas fa-university"></i>
					<span>Kampus</span>
				</a>
				<ul class="sub-menu">
					<li class=""><a href="http://jakarta.ipdn.ac.id">Kampus Jakarta</a></li>
					<li class=""><a href="#">Kampus Kalimantan Barat</a></li>
					<li class=""><a href="#">Kampus Nusa Tenggara Barat</a></li>
					<li class=""><a href="#">Kampus Papua</a></li>
					<li class=""><a href="#">Kampus Sulawesi Selatan</a></li>
					<li class=""><a href="#">Kampus Sulawesi Utara</a></li>
					<li class=""><a href="#">Kampus Sumatera Barat</a></li>
				</ul>
			</li>
			<!-- END KAMPUS -->
			
			<!-- KEUANGAN -->
			<li class="<?php echo $this->uri->segment(1) == "d_spanint" || $this->uri->segment(1) == "d_pok" || $this->uri->segment(1) == "d_sas" || $this->uri->segment(2) == "biro" ? "active" : ""; ?> has-sub">
				<a href="javascript:;">
					<b class="caret"></b>
					<i class="fas fa-money-bill-alt"></i>
					<span>Keuangan</span>
				</a>
				<ul class="sub-menu">
					<li class="<?php echo $this->uri->segment(1) == "d_spanint" && ($this->uri->segment(1) == "d_spanint" || $this->uri->segment(2) == "448302") ? "active" : ""; ?> has-sub">
						<a href="javascript:;">
							<b class="caret"></b>
							OM-SPAN (SP2D)
						</a>
						<ul class="sub-menu">
							<li class="<?php echo $this->uri->segment(1) == "d_spanint" && $this->uri->segment(2) != "448302" ? "active" : ""; ?>"><a href="<?php echo base_url('d_spanint'); ?>">ALL KAMPUS</a></li>
							<li class="<?php echo $this->uri->segment(1) == "d_spanint" && $this->uri->segment(2) == "448302" ? "active" : ""; ?>"><a href="<?php echo base_url('d_spanint/448302'); ?>">KAMPUS JATINANGOR</a></li>
						</ul>
					</li>
					<li class="<?php echo $this->uri->segment(1) == "d_sas" ? "active" : ""; ?> has-sub">
						<a href="<?php echo base_url('d_sas');?>">
							<span>SAS (SPM)</span>
						</a>
						<!-- <a href="javascript:;">
							<b class="caret"></b>
							SAS (SPM)
						</a>
						<ul class="sub-menu">
							<li class="<?php echo $this->uri->segment(1) == "d_sas" ? "active" : ""; ?>"><a href="<?php echo base_url('d_sas'); ?>">UTAMA</a></li>
						</ul> -->
					</li>


					<li class="<?php echo $this->uri->segment(1) == "d_pok" ? "active" : ""; ?> has-sub">
						<a href="javascript:;">
							<b class="caret"></b>
							POK (SPP)
						</a>
						<ul class="sub-menu">
							<li class="<?php echo $this->uri->segment(1) == "d_pok" ? "active" : ""; ?>"><a href="<?php echo base_url('d_pok'); ?>">JATINANGOR</a></li>
						</ul>
					</li>
					<li class=""><a href="http://perdin.ipdn.ac.id" target="_blank">PERDIN</a></li>
				</ul>
			</li>
			<!-- END KEUANGAN -->

			<!-- KEPEGAWAIAN -->
			<li class="<?php echo $this->uri->segment(1)=="kepegawaian" || $this->uri->segment(2)=="thl"  || $this->uri->segment(1)=="absensi"?"active":"";?> has-sub">
				<a href="javascript:;">
					<b class="caret"></b>
					<i class="fas fa-id-card"></i>
					<span>Kepegawaian</span>
				</a>
				<ul class="sub-menu">
					<li class="<?php echo $this->uri->segment(1)=="kepegawaian" && $this->uri->segment(2)!="thl" && $this->uri->segment(2)!="ta" ?"active":"";?>"><a href="<?php echo base_url('kepegawaian');?>">PNS</a></li>
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

					<li class="<?php echo $this->uri->segment(1)=="absensi" ?"active":"";?> has-sub">
						<a href="javascript:;">
							<b class="caret"></b>
							PRESENSI
						</a>
						<ul class="sub-menu">
							<li class=""><a href="https://presensi.ipdn.ac.id" target="_blank">APPS PRESENSI</a></li>
							<li class="<?php echo $this->uri->segment(1) == "absensi" ? "active" : ""; ?>"><a href="<?php echo base_url('absensi'); ?>">REKAP DATA</a></li>
						</ul>
					</li>

				</ul>
			</li>
			<!-- END KEPEGAWAIAN -->


			<!-- Keprajaan -->
			<li class="<?php echo $this->uri->segment(1)=="praja" || $this->uri->segment(1)=="alumni" ?"active":"";?> has-sub">
				<a href="javascript:;">
					<b class="caret"></b>
					<i class="fas fa-graduation-cap"></i>
					<span>Keprajaan</span>
				</a>
				<ul class="sub-menu">
					<li class="<?php echo $this->uri->segment(1) == "praja" && $this->uri->segment(2) !="alumni" ? "active" : ""; ?> has-sub">

						<li class="<?php echo $this->uri->segment(1) == "praja" && $this->uri->segment(2) !="alumni" ? "active" : ""; ?>"><a href="<?php echo base_url('praja'); ?>">Praja</a></li>
						<li class="<?php echo $this->uri->segment(2) == "alumni" ? "active" : ""; ?>"><a href="<?php echo base_url('praja/alumni'); ?>">Alumni</a></li>

					</li>
				</ul>
			</li>
			<!-- END keprajaan -->


			<!-- KERJA SAMA DAN HUMAS -->
			<li class="<?php echo $this->uri->segment(1)=="kerjasama" || $this->uri->segment(1)=="berita" || $this->uri->segment(1)=="BeritaEksternal" ?"active":"";?> has-sub">
				<a href="javascript:;">
					<b class="caret"></b>
					<i class="fas fa-id-card"></i>
					<span>Kerja Sama & Humas</span>
				</a>
				<ul class="sub-menu">
					<li class="<?php echo $this->uri->segment(1)=="kerjasama" ?"active":"";?> has-sub">
						<a href="javascript:;">
							<b class="caret"></b>
							Kerja Sama
						</a>
						<ul class="sub-menu">
							<li class="<?php echo $this->uri->segment(1) == "kerjasama" ? "active" : ""; ?>"><a href="<?php echo base_url('kerjasama/mou'); ?>">Nota Kesepahaman / Perjanjian Kerja Sama</a></li>
						</ul>
					</li>
					<li class="<?php echo $this->uri->segment(1) == "berita" || $this->uri->segment(1)=="BeritaEksternal" ? "active" : ""; ?> has-sub">
						<a href="javascript:;">
							<b class="caret"></b>
							HUMAS
						</a>
						<ul class="sub-menu">
							<li class="<?php echo $this->uri->segment(1) == "berita" ? "active" : ""; ?>"><a href="<?php echo base_url('berita'); ?>">INTERNAL</a></li>
							<li class="<?php echo $this->uri->segment(1) == "BeritaEksternal" ? "active" : ""; ?>"><a href="<?php echo base_url('BeritaEksternal'); ?>">EKSTERNAL</a></li>
						</ul>
					</li>
				</ul>
			</li>
			<!-- END kerja sama dan humas -->

			<!-- PASCA SARJANA -->
			<li class="has-sub">
				<a href="javascript:;">
					<b class="caret"></b>
					<i class="fas fa-map-marker"></i>
					<span>Pasca Sarjana</span>
				</a>
				<ul class="sub-menu">
					<li class=""><a href="http://pasca.ipdn.ac.id" target="_blank">WEB PASCA</a></li>
					<li class=""><a href="http://sika.ipdn.ac.id/pasca/pmb/admin-aplikasi" target="_blank">ADMIN PMB</a></li>
					<li class=""><a href="http://sika.ipdn.ac.id/pmb " target="_blank">LAMAN PMB</a></li>
				</ul>
			</li>
			<!-- END PASCA SARJANA -->

			<!-- PERENCANAAN -->
			<li class="<?php echo $this->uri->segment(2) == "span" || $this->uri->segment(2) == "span_jatinangor" || $this->uri->segment(1) == "d_peringkat" ? "active" : ""; ?> has-sub">
				<a href="javascript:;">
					<b class="caret"></b>
					<i class="fas fa-chart-line"></i>
					<i class="fas fa-chart-lingit pulle"></i>
					<span>Perencanaan</span>
				</a>
				<ul class="sub-menu">
					<li class="<?php echo $this->uri->segment(2) == "span" || $this->uri->segment(2) == "span_jatinangor" ? "active" : ""; ?> has-sub">
						<a href="javascript:;">
							<b class="caret"></b>
							HISTORY
						</a>
						<ul class="sub-menu">
							<li class="<?php echo $this->uri->segment(2) == "span" || $this->uri->segment(2) == "span_jatinangor" ? "active" : ""; ?>"><a href="<?php echo base_url('history/span'); ?>">OM-SPAN</a></li>
						</ul>
					</li>
					<li class="<?php echo $this->uri->segment(1) == "d_peringkat" ? "active" : ""; ?>"><a href="<?php echo base_url('d_peringkat'); ?>">PERINGKAT</a></li>
				</ul>

			</li>
			<!-- END PERENCANAAN -->

			<!-- PERPUSTAKAAN -->
			<li class="has-sub">
				<a href="javascript:;">
					<b class="caret"></b>
					<i class="fas fa-book"></i>
					<span>Perpustakaan</span>
				</a>
				<ul class="sub-menu">
					<li class=""><a href="http://elib.ipdn.ac.id" target="_blank">ELIB</a></li>
					<li class=""><a href="http://er.elib.ipdn.ac.id" target="_blank">ER-ELIB</a></li>
					<li class=""><a href="http://eprints.ipdn.ac.id" target="_blank">E-PRINT</a></li>
				</ul>
			</li>
			<!-- END PERPUSTAKAAN -->

			<!-- RISET -->
			<li class="has-sub">
				<a href="javascript:;">
					<b class="caret"></b>
					<i class="fas fa-refresh"></i>
					<span>Riset</span>
				</a>
				<ul class="sub-menu">
					<li class=""><a href="http://ojs.ipdn.ac.id" target="_blank">OJS</a></li>
				</ul>
			</li>
			<!-- END RISET -->

			<!-- SARPRAS -->
			<li class="<?php echo $this->uri->segment(1)=="d_sarpras" || $this->uri->segment(1)=="d_sarpras" && ($this->uri->segment(2)=="448302" || $this->uri->segment(2)=="677024" || $this->uri->segment(2)=="683091" || $this->uri->segment(2)=="683084" || $this->uri->segment(2)=="677010")?"active":"";?> has-sub">
				<!-- <a href="javascript:;"> -->
					<a href="<?php echo base_url('d_sarpras');?>">
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
						<li class="<?php echo $this->uri->segment(2)=="352593"?"active":"";?>"><a href="<?php echo base_url('d_sarpras')."/352593";?>">JAKARTA</a></li>
						<li class="<?php echo $this->uri->segment(2)=="683070"?"active":"";?>"><a href="<?php echo base_url('d_sarpras')."/683070";?>">KALIMANTAN BARAT</a></li>
						<li class="<?php echo $this->uri->segment(2)=="677045"?"active":"";?>"><a href="<?php echo base_url('d_sarpras')."/677045";?>">SUMATERA BARAT</a></li>
					</ul>
				</li>
				<!-- END SARPRAS -->

				<!-- TP -->
				<li class="has-sub">
					<a href="javascript:;">
						<b class="caret"></b>
						<i class="fas fa-desktop"></i>
						<span>Teknologi Pendidikan</span>
					</a>
					<ul class="sub-menu">
						<li class=""><a href="http://mail.ipdn.ac.id" target="_blank">EMAIL</a></li>
						<li class=""><a href="http://mcu.ipdn.ac.id" target="_blank">MCU</a></li>
						<li class=""><a href="http://livestreaming.ipdn.ac.id" target="_blank">STREAMING</a></li>
					</ul>
				</li>
				<!-- END TP -->

				<li class="nav-header">Lainnya</li>
				<!-- LAINNYA -->
				<li class="has-sub">
					<a href="javascript:;">
						<b class="caret"></b>
						<i class="fas fa-info"></i>
						<span>More Apps</span>
					</a>
					<ul class="sub-menu">
						<li class=""><a href="http://sika.ipdn.ac.id" target="_blank">SIKA</a></li>
						<li class=""><a href="http://pddikti.ipdn.ac.id/login" target="_blank">PDDIKTI</a></li>
						<li class=""><a href="https://docs.google.com/forms/d/e/1FAIpQLSf-sLnZqvzKaz0sOJLU1CwbTRkKRvddpmBqrs0vtZ6xA4RC8g/viewform" target="_blank">SPCP (VALIDASI)</a></li>
						<li class="has-sub">
							<a href="javascript:;">
								<b class="caret"></b>
								<span>PILKADA 2020</span>
							</a>
							<ul class="sub-menu">
								<li class=""><a href="https://forms.gle/Sc7zgiaxPKTWeu1i8" target="_blank">FORM KUESIONER</a></li>
								<li class=""><a href="https://bit.ly/3qlwi9P" target="_blank">HASIL KUESIONER</a></li>
								<li class=""><a href="https://forms.gle/uVGs43WqNdyaHsPA6" target="_blank">FORM MONITORING</a></li>
								<li class=""><a href="https://bit.ly/2NrqYTA" target="_blank">HASIL MONITORING</a></li>
								<li class=""><a href="https://forms.gle/YBvKx2kGitw95cLb6 " target="_blank">FORM REKAPITULASI</a></li>
								<li class=""><a href="https://bit.ly/3qpY2tG" target="_blank">HASIL FORM REKAPITULASI</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<!-- END LAINNYA -->

				<?php if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'SuperAdmin' || $this->session->userdata('role') == 'Keuangan' || $this->session->userdata('role') == 'Perencanaan' || $this->session->userdata('role') == 'Bmn'  ){?>
					<li class="nav-header">Data</li>
					<li class="<?php echo $this->uri->segment(2)=="v_span" || $this->uri->segment(2)=="v_dosen" || $this->uri->segment(2)=="v_pns" || $this->uri->segment(2)=="v_thl" || $this->uri->segment(2)=="v_pok" || $this->uri->segment(2)=="v_sas" || $this->uri->segment(2)=="v_sarpras" || $this->uri->segment(2)=="v_praja" || $this->uri->segment(2)=="v_rank"?"active":"";?> has-sub">
						<a href="javascript:;">
							<b class="caret"></b>
							<i class="fa fa-upload"></i>
							<span>Upload</span>
						</a>
						<ul class="sub-menu">
							<?php if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'SuperAdmin' || $this->session->userdata('role') == 'Keuangan' || $this->session->userdata('role') == 'Perencanaan' ){?>
								<li class="<?php echo $this->uri->segment(2)=="v_span"?"active":"";?>"><a href="<?php echo base_url('uploads/v_span');?>">SPAN</a></li>
							<?php } ?>

							<?php if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'SuperAdmin' || $this->session->userdata('role') == 'Keuangan' ){?>
								<li class="<?php echo $this->uri->segment(2)=="v_pok"?"active":"";?>"><a href="<?php echo base_url('uploads/v_pok');?>">POK</a></li>
							<?php } ?>

							<?php if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'SuperAdmin' || $this->session->userdata('role') == 'Perencanaan' || $this->session->userdata('role') == 'Keuangan' ){?>
								<li class="<?php echo $this->uri->segment(2)=="v_sas"?"active":"";?>"><a href="<?php echo base_url('uploads/v_sas');?>">SAS</a></li>
							<?php } ?>

							<?php if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'SuperAdmin' ){?>
								<li class="<?php echo $this->uri->segment(2)=="v_praja"?"active":"";?>"><a href="<?php echo base_url('uploads/v_praja');?>">PRAJA</a></li>
								<li class="<?php echo $this->uri->segment(2)=="v_alumni"?"active":"";?>"><a href="<?php echo base_url('uploads/v_alumni');?>">ALUMNI</a></li>
								<li class="<?php echo $this->uri->segment(2)=="v_pns"?"active":"";?>"><a href="<?php echo base_url('uploads/v_pns');?>">PNS</a></li>
								<li class="<?php echo $this->uri->segment(2)=="v_thl"?"active":"";?>"><a href="<?php echo base_url('uploads/v_thl');?>">THL</a></li>
								<li class="<?php echo $this->uri->segment(2)=="v_dosen"?"active":"";?>"><a href="<?php echo base_url('uploads/v_dosen');?>">DOSEN</a></li>
							<?php } ?>

							<?php if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'SuperAdmin' || $this->session->userdata('role') == 'Perencanaan' ){?>
								<li class="<?php echo $this->uri->segment(2)=="v_rank"?"active":"";?>"><a href="<?php echo base_url('uploads/v_rank');?>">PERINGKAT</a></li>
							<?php } ?>

							<?php if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'SuperAdmin' || $this->session->userdata('role') == 'Bmn' ){?>
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
										<li class="<?php echo $this->uri->segment(3)=="jakarta"?"active":"";?>"><a href="<?php echo base_url('uploads/v_sarpras/jakarta');?>">SARPRAS JAKARTA</a></li>
										<li class="<?php echo $this->uri->segment(3)=="kalbar"?"active":"";?>"><a href="<?php echo base_url('uploads/v_sarpras/kalbar');?>">SARPRAS KALBAR</a></li>
										<li class="<?php echo $this->uri->segment(3)=="sumbar"?"active":"";?>"><a href="<?php echo base_url('uploads/v_sarpras/sumbar');?>">SARPRAS SUMBAR</a></li>
									</ul>
								</li>
							<?php } ?>
						</ul>
					</li>
				<?php } ?>

				<?php if ($this->session->userdata('role') == 'SuperAdmin') { ?>
					<li class="<?php echo $this->uri->segment(1) == "apps" ? "active" : ""; ?>">
						<a href="<?php echo base_url('apps'); ?>"><i class="fa fa-list"></i> <span>Aplikasi</span></a>
					</li>
					<li class="<?php echo $this->uri->segment(1) == "pegawai" ? "active" : ""; ?>">
						<a href="<?php echo base_url('pegawai'); ?>"><i class="fa fa-users"></i> <span>User</span></a>
					</li>
					<li class="<?php echo $this->uri->segment(1) == "log" ? "active" : ""; ?>">
						<a href="<?php echo base_url('log'); ?>"><i class="fa fa-history"></i> <span>Log</span></a>
					</li>
				<?php } ?>

				<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
			</ul>
		</div>
	</div>
	<div class="sidebar-bg"></div>
	<!-- end #sidebar -->
