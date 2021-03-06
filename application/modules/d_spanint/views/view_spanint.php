<link rel="stylesheet" href="<?php echo base_url().'assets/js/morris.css'?>">
<div id="content" class="content">
	<ol class="breadcrumb float-xl-right">
		<li class="breadcrumb-item"><a href="<?php echo base_url('home');?>">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="<?php echo base_url('d_spanint');?>">SPAN IPDN</a></li>
		<?php if($this->uri->segment(2) != "") { ?>
			<li class="breadcrumb-item"><a href="<?php echo base_url(uri_string());?>"><?= $title; ?></a></li>
		<?php } ?>
	</ol>
	<h1 class="page-header">OM-SPAN <?= $title; ?></h1>
	<div class="row">
		<div class="col-xl-12">
			<!-- begin panel -->
			<div class="panel panel-inverse" data-sortable-id="morris-chart-1">
				<div class="panel-heading">
					<h4 class="panel-title"></h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<h4 class="text-center">Laporan Progress Realisasi Anggaran IPDN <?php echo date("Y") ?> Berdasarkan OM-SPAN</h4>
						<h4 class="text-center">PER <?= $uDate; ?></h4><br>
						<!-- <div id="graph" class="height-sm width-xl"></div> -->
						<canvas id="myCharts" height="170" class="d-sm-none"></canvas>
						<canvas id="myChart" height="70" class="d-sm-block d-none"></canvas>
					</div>
				</div>
			</div>
			<!-- end panel -->
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title">
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
				<!-- <div class="alert alert-warning fade show">
					<button type="button" class="close" data-dismiss="alert">
					<span aria-hidden="true">&times;</span>
					</button>
					<p>Silahkan input <b>Data Pegawai</b> Pada Button icon "<i class="fa fa-plus-square"></i>"</p>
				</div> -->
				<div class ="table-responsive">
					<div class="panel-body">
						<table id="data-table-buttons" class="table table-striped table-bordered" width="100%">
							<thead valign="middle">
								<tr align="center">
									<th rowspan="2" style="vertical-align: middle !important">#</th>
									<th rowspan="2" style="vertical-align: middle !important">UNIT KERJA</th>
									<th rowspan="2" style="vertical-align: middle !important">KETERANGAN</th>
									<th colspan="3" style="vertical-align: middle !important">JENIS BELANJA</th>
									<th rowspan="2" style="vertical-align: middle !important">TOTAL</th>
								</tr>
								<tr align="center">
									<th style="vertical-align: middle !important">PEGAWAI</th>
									<th style="vertical-align: middle !important">BARANG</th>
									<th style="vertical-align: middle !important">MODAL</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1; ?>
								<?php foreach (json_decode($data, true) as $x): ?>
									<tr class="gradeA">
										<td rowspan="2"><?php echo $no++; ?></td>
										<td rowspan="2"><?= $x['nama']; ?></td>
										<td>PAGU<br>REALISASI<br></td>
										<td align="right"><?= number_format($x['pagu_peg'], 0, ',', '.'); ?><br><?= number_format($x['real_peg'], 0, ',', '.'); ?><br>(<?= $x['per_peg']; ?>)</td>
										<td align="right"><?= number_format($x['pagu_bar'], 0, ',', '.'); ?><br><?= number_format($x['real_bar'], 0, ',', '.'); ?><br>(<?= $x['per_bar']; ?>)</td>
										<td align="right"><?= number_format($x['pagu_mod'], 0, ',', '.'); ?><br><?= number_format($x['real_mod'], 0, ',', '.'); ?><br>(<?= $x['per_mod']; ?>)</td>
										<td align="right"><?= number_format($x['pagu_tot'], 0, ',', '.'); ?><br><?= number_format($x['real_tot'], 0, ',', '.'); ?><br>(<?= $x['per_tot']; ?>)</td>
									</tr>
									<tr>
										<td>SISA</td>
										<td align="right"><?= number_format($x['sisa_peg'], 0, ',', '.'); ?></td>
										<td align="right"><?= number_format($x['sisa_bar'], 0, ',', '.'); ?></td>
										<td align="right"><?= number_format($x['sisa_mod'], 0, ',', '.'); ?></td>
										<td align="right"><?= number_format($x['sisa_tot'], 0, ',', '.'); ?></td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
				<!-- end panel-body -->
			</div>
			<!-- end panel -->
		</div>
		<!-- end col-10 -->
	</div>
</div>

<script src="<?php echo base_url().'assets/js/jquery.min.js'?>"></script>
<script src="<?php echo base_url().'assets/js/raphael-min.js'?>"></script>
<script src="<?php echo base_url().'assets/js/morris.min.js'?>"></script>
<script src="https://www.chartjs.org/dist/2.9.4/Chart.min.js"></script>

<script>

		var labels = <?php echo $data;?>.map(function(e) {
			return e.aliass;
		});

		var label = <?php echo $data;?>.map(function(e) {
			return e.alias;
		});

		var data1 = <?php echo $data;?>.map(function(e) {
			return e.pagu_tot;
		});

		var data2 = <?php echo $data;?>.map(function(e) {
			return e.real_tot;
		});

		var ctxs = document.getElementById("myCharts").getContext('2d');
		var ctx = document.getElementById("myChart").getContext('2d');

		var configs = {
			type: 'bar',
			data: {
				labels: labels,
				datasets: [{
					label: 'Pagu',
					data: data1,
					borderWidth: 1,
					backgroundColor: 'rgba(54, 162, 235, 0.2)',
					borderColor: 'rgba(54, 162, 235, 1)'
				},
				{
					label: 'Realisasi',
					data: data2,
					borderWidth: 1,
					backgroundColor: 'rgba(255, 99, 132, 0.2)',
					borderColor: 'rgba(255, 99, 132, 1)'
				}]
			},

			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true,
							userCallback: function(value, index, values) {
								// Convert the number to a string and splite the string every 3 charaters from the end
								value = value.toString();
								value = value.split(/(?=(?:...)*$)/);
								// Convert the array to a string and format the output
								value = value.join('.');
								return value;
							}
						}
					}]
				},
				responsive: true
			}
		};

		var config = {
			type: 'bar',
			data: {
				labels: label,
				datasets: [{
					label: 'Pagu',
					data: data1,
					borderWidth: 1,
					backgroundColor: 'rgba(54, 162, 235, 0.2)',
					borderColor: 'rgba(54, 162, 235, 1)'
				},
				{
					label: 'Realisasi',
					data: data2,
					borderWidth: 1,
					backgroundColor: 'rgba(255, 99, 132, 0.2)',
					borderColor: 'rgba(255, 99, 132, 1)'
				}]
			},

			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true,
							userCallback: function(value, index, values) {
								// Convert the number to a string and splite the string every 3 charaters from the end
								value = value.toString();
								value = value.split(/(?=(?:...)*$)/);
								// Convert the array to a string and format the output
								value = value.join('.');
								return value;
							}
						}
					}]
				},
				responsive: true
			}
		};

		var charts = new Chart(ctxs, configs);
		var chart = new Chart(ctx, config);
	</script>