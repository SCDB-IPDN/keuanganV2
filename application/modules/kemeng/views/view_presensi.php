<div id="content" class="content">
	<ol class="breadcrumb float-xl-right">
		<li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="<?php echo base_url('kemeng'); ?>">Presensi</a></li>
	</ol>
	<h1 class="page-header">Presensi</h1>
	<div class="row">
		<div class="col-xl-12">
			<!-- begin panel -->

			<!-- end panel -->
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
				</div>

				<?php if($this->session->flashdata() != NULL){ ?>
				<div class="alert alert-<?php echo $this->session->flashdata('absen')[0] ?> alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong><i class="fa fa-info-circle"></i></strong> <?php echo $this->session->flashdata('absen')[1] ?>
				</div>
				<?php } ?>

				<div class="table-responsive">
					<div class="panel-body">
						<form action="<?php echo base_url('kemeng/tambah_presensi'); ?>" method="POST">
							<br>
							<div class="row">
								<div class="col-lg-8">
									<label for="dosen">Nama Dosen:</label>
									<select id="dosen" name="nama_dosen" class="form-control" style="width: 100%" > 
										<option disabled selected>Nama Dosen..</option>
										<?php foreach($nama_dosen as $dosen){?>
										<option value="<?php echo $dosen->nama ?>"><?php echo $dosen->nama ?></option>
										<?php } ?>
									</select>
									<br>
									<label for="fakultas">Fakultas:</label>
									<select class="form-control" id="fakultas" name="fakultas" required>
										<option disabled selected> Pilih Fakultas </option>
										<?php foreach($fakultas as $rows){?>
										<option value="<?php echo $rows->id_fakultas ?>"><?php echo $rows->nama_fakultas ?></option>
										<?php } ?>
									</select>
									<br>
									<label for="prodi">Prodi:</label>
									<select class="form-control" id="prodi" name="prodi" required>
										<option disabled selected> Pilih Program Studi </option>
									</select>
									<br>
									<label for="matkul">Mata Kuliah:</label>
									<select class="form-control" id="matkul" name="matkul" required>
											<option disabled selected> Pilih Mata Kuliah</option>
									</select>
									<br>
									<label for="kelas">Kelas:</label>
									<input type="text" class="form-control" id="kelas" name="kelas" placeholder="Kelas" required>
									<br>
									<label for="tanggal">Tanggal:</label>
									<div class="input-group date" id="tanggal">
										<input type="text" class="form-control" name="tanggal" autocomplete="off" placeholder="Tanggal" required>
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
									</div>
									<br>
									<label for="jam">Jam:</label>
									<div class="input-group date" id="jam">
										<input type="text" class="form-control" name="jam" autocomplete="off" placeholder="Jam" required>
										<div class="input-group-addon">
											<i class="fa fa-clock"></i>
										</div>
									</div>
								</div>
							</div>
							<div class="panel-body">
								<div class="col-12">
									<br>
									<button type="submit" class="btn btn-blue" value="Cek">Submit</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>