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
				<h4 class="panel-title">
            	<span><a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#addpresensi">TAMBAH PRESENSI</a></span>
            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus-square"></i></button> -->
            <!-- <a href="" class="btn btn-icon btn-sm btn-inverse" data-toggle="modal" data-target="#addpeg"><i class="fa fa-plus-square"></i></a> -->
          		</h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div> 
				</div>
				<!--start table-->
				<div class="table-responsive">
				<?php if ($this
    ->session
    ->flashdata('absen') != NULL)
{ ?>
				<div class="alert alert-<?php echo $this
        ->session
        ->flashdata('absen') [0] ?> alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong><i class="fa fa-info-circle"></i></strong> <?php echo $this
        ->session
        ->flashdata('absen') [1] ?>
				</div>
				<?php
} ?>
				
				<div class="panel-body">
					<table id="data-matkul" class="table table-striped table-bordered table-td-valign-middle" width="100%">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Dosen</th>
							<th>Fakultas</th>
							<th>Program Studi</th>
							<th>Mata Kuliah</th>
							<th>Kelas</th>
							<th>Tanggal</th>
							<th>Jam</th>
						</tr>
					</thead>
					</table>
				</div>

				<!-- end table-->
				<!--tambah-->
<div aria-hidden="true" aria-labelledby="myModalLabel" id="addpresensi" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
	<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
	   <h4 class="modal-title">Tambah Presensi</h4>
	   <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
	   </div>

		<form class="form-horizontal" action="<?php echo base_url('kemeng/tambah_presensi'); ?>" method="POST">
		<div class="modal-body">
         <div class="form-group">
			<div class="row">
			<div class="col-xl">
			<label for="dosen">Nama Dosen:</label>
			<select id="dosen" name="nama_dosen" class="form-control" style="width: 100%" > 
			<option disabled selected>Nama Dosen..</option>
			<?php foreach ($nama_dosen as $dosen)
{ ?>
			<option value="<?php echo $dosen->nama; ?>|<?php echo $dosen->nip; ?>"><?php echo $dosen->nama; ?></option>
										
			<!-- <option value="<?php echo $dosen->id_dosen ?>"><?php echo $dosen->id_dosen ?> </option>  -->
										
			<?php
} ?>
									</select>
									<br>
									<label for="fakultas">Fakultas:</label>
									<select class="form-control" id="fakultas" name="fakultas" required>
										<option disabled selected> Pilih Fakultas </option>
										<?php foreach ($fakultas as $rows)
{ ?>
										<option value="<?php echo $rows->id_fakultas ?>"><?php echo $rows->nama_fakultas ?></option>
										<?php
} ?>
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
									<!-- <label for="tanggal">Tanggal:</label>
									<div class="input-group date" id="tanggal">
										<input type="text" class="form-control" name="tanggal" value ="<?php echo date('Y-m-d') ?>" placeholder="Tanggal" required>
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
									</div>
									<br>
									<label for="jam">Jam:</label>
									<div class="input-group date" id="jam">
										<input type="text" class="form-control" name="jam" value ="<?php echo date('H:i') ?>" placeholder="Jam" required>
										<div class="input-group-addon">
											<i class="fa fa-clock"></i>
										</div>
									</div> -->
								</div>
							</div>
							<div class="panel-body">
								<div class="col-xl">
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
<script>

  $(document).ready(function() {

    var url = '<?php echo base_url('kemeng/get_allp');?>';
        // alert(url);

        $('#data-presensi').dataTable({
            // dom: 'Bfrtip',
            dom: '<"row"<"col-sm-5"B><"col-sm-7"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>',
            buttons: [
            'copy', 'excel', 'print'
            ],
            responsive: true,
            "ajax": {
              "url": url,
              "dataSrc": ""
            }
          });
      });

    </script>


<script>
      $(document).ready(function() {
            // Isi nilai pada field
			modal.find('#id_absensi').attr("value",div.data('id_absensi'));
			modal.find('#nama_dosen').attr("value",div.data('nama_dosen'));
            modal.find('#nama_matkul').attr("value",div.data('nama_matkul'));
            modal.find('#id_prodi').attr("value",div.data('id_prodi'));
            modal.find('#nama_prodi').attr("value",div.data('nama_prodi'));
            modal.find('#id_fakultas').attr("value",div.data('id_fakultas'));
            modal.find('#nama_fakultas').attr("value",div.data('nama_fakultas'));
			modal.find('#kelas').attr("value",div.data('kelas'));
			modal.find('#tanggal').attr("value",div.data('tanggal'));
            modal.find('#jam').attr("value",div.data('jam'));
          });
          });
      });
    </script>
