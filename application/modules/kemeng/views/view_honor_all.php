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
						<a href="#default-tab-<?= $cl; ?>" id="tab-<?= $cl; ?>" data-toggle="tab" class="nav-link <?php echo $cl==1?'active':''; ?>" data-url="<?= base_url(uri_string()).'/'.url_title($y['nama_fakultas']); ?>">
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
							<table class="table table-striped table-bordered"id="tbl-tab-<?php echo $cl++; ?>" width="100%">

								<thead valign="middle">
									<tr align="center">
										<th rowspan="2" style="vertical-align: middle !important">#</th>
										<th colspan="3" style="vertical-align: middle !important">DOSEN</th>
										<!-- <th colspan="2" style="vertical-align: middle !important">MATAKULIAH</th> -->
										<th rowspan="2" style="vertical-align: middle !important">TOTAL SKS</th>
										<th rowspan="2" style="vertical-align: middle !important">KEWAJIBAN</th>
										<th rowspan="2" style="vertical-align: middle !important">KELEBIHAN</th>
										<th rowspan="2" style="vertical-align: middle !important">TOTAL</th>

									</tr>

									<tr align="center">
										<th style="vertical-align: middle !important">NIP</th>
										<th style="vertical-align: middle !important">NAMA</th>
										<th style="vertical-align: middle !important">GOLONGAN</th>
										<!-- <th style="vertical-align: middle !important">NAMA MATAKULIAH</th>
										<th style="vertical-align: middle !important">SKS</th> -->
									</tr>
								</thead>
						<!-- <tfoot>
							<tr align="center">
								<th colspan="7">TOTAL</th>
								<th><?= $y['total']; ?></th>
								<th><?= $y['perolehan']; ?></th>
								<th colspan="2"></th>
							</tr>
						</tfoot> -->
					</table>
				</div>

			<?php endforeach; ?>

		</div>
	</div>
</div>

<script>

	<?php $cc = 1; ?>
	

	$(document).ready(function() {
		<?php foreach ($honoooor as $x): ?>

			$('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {

				$($.fn.dataTable.tables(true)).DataTable()
				.columns.adjust()
				.responsive.recalc();
			});

			var uri = $("#tab-<?php echo $cc; ?>").attr("Data-url");
			// alert(uri);
			$('#tbl-tab-<?= $cc; ?>').DataTable({
				dom: 'Bfrtip',
				buttons: [
				'copy', 'excel', 'print'
				],
				"responsive": true,
				"ajax": {
					"url": uri,
					"dataSrc": ""
				},
				"columns": [
				{ "data": "no" },
				{ "data": "nip" },
				{ "data": "nama" },
				{ "data": "nama_matkul", className: "text-right" },
				{ "data": "totalsks" },
				{ "data": "kewajiban", className: "text-right" },
				{ "data": "kelebihan", className: "text-right" },
				{ "data": "total", className: "text-right" },
				{ "data": "tr", className: "text-right" },
				{ "data": "kondisi" }
			]
		});
		<?php endforeach; ?>
</script>