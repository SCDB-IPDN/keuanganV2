<link rel="stylesheet" href="<?php echo base_url().'assets/js/morris.css'?>">
<div id="content" class="content">
	<ol class="breadcrumb float-xl-right">
		<li class="breadcrumb-item"><a href="<?php echo base_url('home');?>">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="<?php echo base_url('d_sarpras');?>">JATINANGOR</a></li>
	</ol>
	<h1 class="page-header">Sarana dan Prasarana IPDN Jatinangor</h1>
	<div class="row">

		<div class="col-xl-12">
			<!-- begin nav-tabs -->
			<ul class="nav nav-tabs">

				<?php $cl = 1; ?>
				<?php foreach (json_decode($l_kat, true) as $y): ?>

				<li class="nav-item">
					<a href="#default-tab-<?= $cl; ?>" data-toggle="tab" class="nav-link <?php echo $cl==1?'active':''; ?>">
						<span class="d-sm-none">Tab <?= $cl++; ?></span>
						<span class="d-sm-block d-none"><?php echo ucwords(strtolower($y['kategori'])); ?></span>
					</a>
				</li>

				<?php endforeach; ?>

			</ul>
			<!-- end nav-tabs -->
			<!-- begin tab-content -->
			<div class="tab-content">

			<?php $kat = ""; ?>
			<?php $m = 0; ?>
			<?php $cc = 1; ?>
			<?php foreach (json_decode($data, true) as $x): ?>
				<?php if ($x['kategori'] != $kat) { ?>

					<?php if ($kat != "") { ?>

						</tbody>
					</table>
				</div>
				<!-- end tab-pane -->

					<?php } ?>

					<?php $kat = $x['kategori']; ?>
					<?php $no = 1; ?>
				<!-- begin tab-pane -->
				<div class="tab-pane fade <?php echo $cc==1?'active show':''; ?>" id="default-tab-<?= $cc; ?>">
					<h4 class="text-center">Belanja <?php echo ucwords(strtolower($x['kategori'])); ?> bedasarkan Tahun</h4>
					<canvas id="myChart<?php echo $cc; ?>" height="70"></canvas>
					<table class="table table-striped table-bordered table-td-valign-middle data-table-buttons" id="myTable<?php echo $cc++; ?>" width="100%">
						<thead>
							<tr>
								<th>#</th>
								<th>Uraian</th>
								<th>Merk</th>
								<th>Tahun</th>
								<?php if ($x['luas'] != 0) { ?>
									<th>Luas</th>
								<?php } else { ?>
									<th>Jumlah</th>
								<?php } ?>
								<th>Harga Satuan</th>
								<th>Harga Perolehan</th>
								<th>Harga Revaluasi</th>
								<th>Asal Perolehan</th>
								<th>Kondisi</th>
							</tr>
						</thead>
						<tbody>

				<?php } else { ?>

							<tr class="gradeA">
								<td><?php echo $no++; ?></td>
								<td><?= $x['uraian']; ?></td>
								<td><?= $x['merk']; ?></td>
								<td><?= $x['tahun']; ?></td>
								<?php if ($x['luas'] != 0) { ?>
									<td><?= number_format($x['luas'], 0, ',', '.'); ?></td>
									<?php $m = $x['luas']; ?>
								<?php } else { ?>
									<td><?= number_format($x['jumlah'], 0, ',', '.'); ?></td>
									<?php $m = $x['jumlah']; ?>
								<?php } ?>
								<td><?= number_format($x['harga_beli'], 0, ',', '.'); ?></td>
								<?php $tot = $m*$x['harga_beli']; ?>
								<td><?= number_format($tot, 0, ',', '.'); ?></td>
								<?php $tot = $m*$x['harga_baru']; ?>
								<td><?= number_format($tot, 0, ',', '.'); ?></td>
								<td><?= $x['asal']; ?></td>
								<td><?= $x['kondisi']; ?></td>
							</tr>

				<?php } ?>

			<?php endforeach; ?>

						</tbody>
					</table>
				</div>
				<!-- end tab-pane -->
			</div>
		</div>
	</div>
</div>

<script src="<?php echo base_url().'assets/js/jquery.min.js'?>"></script>
<script src="<?php echo base_url().'assets/js/raphael-min.js'?>"></script>
<script src="<?php echo base_url().'assets/js/morris.min.js'?>"></script>
<script src="https://www.chartjs.org/dist/2.9.4/Chart.min.js"></script>

<script>

	<?php $cc = 1; ?>
	<?php foreach ($chart as $x): ?>
		<?php $ch = json_encode($x) ?>

		$('a[href="#default-tab-<?php echo $cc; ?>"]').click(function() {
			$.fn.dataTable.tables( {visible: true, api: true} ).columns.adjust();
		});
			
		var labels<?php echo $cc; ?> = <?php echo $ch;?>.map(function(e) {
			return e.tahun;
		});
		var data1_<?php echo $cc;?> = <?php echo $ch;?>.map(function(e) {
			return e.total;
		});

		var data2_<?php echo $cc;?> = <?php echo $ch;?>.map(function(e) {
			return e.perolehan;
		});

		var ctx<?php echo $cc; ?> = document.getElementById("myChart<?php echo $cc; ?>").getContext('2d');
		var config = {
			type: 'line',
			data: {
				labels: labels<?php echo $cc;?>,
				datasets: [{
					label: 'Total Belanja',
					data: data1_<?php echo $cc;?>,
					pointBackgroundColor: 'white',
					pointBorderWidth: 2,
					backgroundColor: 'rgba(153, 102, 255, 0.2)',
					borderColor: 'rgba(153, 102, 255, 1)'
				},
				{
					label: 'Total Revaluasi',
					data: data2_<?php echo $cc;?>,
					pointBackgroundColor: 'white',
					pointBorderWidth: 2,
					backgroundColor: 'rgba(75, 192, 192, 0.2)',
					borderColor: 'rgba(75, 192, 192, 1)'
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

		var chart<?php echo $cc; ?> = new Chart(ctx<?php echo $cc++; ?>, config);

	<?php endforeach; ?>

	</script>