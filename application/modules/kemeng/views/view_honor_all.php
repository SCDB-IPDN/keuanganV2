<div id="content" class="content">
	<ol class="breadcrumb float-xl-right">
		<li class="breadcrumb-item"><a href="<?php echo base_url('home');?>">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="<?php echo base_url('honor_all');?>">Honor All</a></li>
	</ol>
	<h1 class="page-header">Rekap Kelebihan Jam Mengajar Dosen IPDN</h1>
	<div class="row">

		<div class="col-xl-12" id="tabs">
			<!-- begin nav-tabs -->
			<ul class="nav nav-tabs">
				<?php $cl = 1; ?>
				<?php foreach (json_decode($fakultas, true) as $y): ?>

					<li class="nav-item">
						<a href="#default-tab-<?= $cl; ?>" id="tab-<?= $cl; ?>" data-toggle="tab" class="nav-link <?php echo $cl==1?'active':''; ?>" data-url="<?= base_url(uri_string()).'/'.url_title($y['id_fakultas']); ?>">
							<span class="d-sm-none">Tab <?= $cl++; ?></span>
							<span class="d-sm-block d-none"><?php echo ucwords(strtolower($y['nama_fakultas'])); ?></span>
						</a>
					</li>

				<?php endforeach; ?>

			</ul>
			<!-- end nav-tabs -->

			<!-- begin tab-content -->
			<div class="tab-content">

				<?php $cl = 1; ?>
				<?php foreach (json_decode($fakultas, true) as $y): ?>

					<div class="tab-pane fade <?php echo $cl==1?'active show':''; ?>" id="default-tab-<?= $cl; ?>">

						<h4 class="text-center">Kelebihan Mengajar <?php echo ucwords(strtolower($y['nama_fakultas'])); ?></h4>
						<br>
						<!-- <table id="data-table-buttons" class="table table-striped table-bordered table-td-valign-middle" width="100%"> -->
							<table class="table table-striped table-bordered" id="jancok-tab-<?php echo $cl++;?>" width="100%">

								<thead valign="middle">
									<tr align="center">
										<th  >#</th>
										<th  >DOSEN</th>
										<th  >MATAKULIAH</th>
										<th  >TOTAL SKS</th>
										<th  >KEWAJIBAN</th>
										<th  >KELEBIHAN</th>
										<th  >TOTAL</th>

									</tr>		
								</thead>

								<tbody>
								</tbody>

							</table>
						</div>

					<?php endforeach; ?>

				</div>
			</div>
		</div>

		<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>

		<script type="text/javascript">
			<?php $cc = 0; ?>
			<?php foreach (json_decode($fakultas, true) as $x): ?>

				<?php $cc++; ?>
				$(document).ready(function() {

					var url = $("#tab-<?php echo $cc; ?>").attr("Data-url");

					$('#jancok-tab-<?php echo $cc; ?>').dataTable( {
						dom: "Bfrtip",
						"processing": true,
						"serverSide": true,
						"ajax": {
							"url": url,
							"type": "POST"
						},
						"columns": [
							{ "data": "nip" },
							{ "data": "nama" },
							{ "data": "jabatan" },
							{ "data": "totalsks"},
							{ "data": "kewajiban" },
							{ "data": "kelebihan" },
							{ "data": "total" }
						]

					} );
				} );
				<?php endforeach; ?>	
			</script>

		