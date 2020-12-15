<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb float-xl-right">
				<li class="breadcrumb-item"><a href="<?php echo base_url('d_sarpras');?>">Dashboard SARPRAS</a></li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin title -->
			<div class="d-sm-flex align-items-center mb-3">
				<a href="#" class="btn btn-inverse mr-2 text-truncate">
					<span>Sarana Prasarana IPDN</span>
				</a>
			</div>
			<!-- end title -->
			<!-- begin row -->
			<div class="row">
				<?php $cc = 0; ?>
				<?php $cl = 1; ?>
				<?php foreach (json_decode($satker, true) as $y): ?>
				<!-- begin col-12 -->
				<div class="col-xl-12 col-lg-6">
					<!-- begin card -->
					<div class="card bg-dark border-0 text-white mb-3">
						<div class="card-body">
							<div class="mb-3 text-grey"><b><a href="<?php echo base_url('d_sarpras')."/".$y['kode_satker'];?>" class="text-grey"><?= $y['nama_satker']; ?></a></b> <span class="ml-2"></span></div>
							<div class="row">
								<?php foreach ($l_kon[$cc] as $z): ?>
								<div class="col-xl-3 col-4">
									<h3 class="mb-1"><span data-animation="number" data-value="<?= $z['total']; ?>">0</span> Barang</h3>
									<div><?= $z['kondisi']; ?></div>
								</div>
								<?php endforeach; ?>
								<?php $cc++; ?>
							</div>
						</div>
						<div class="card-body p-0">
							<div style="height: 269px; padding: 0 15px">
								<canvas id="myChart<?php echo $cl++; ?>" height="45%"></canvas>
							</div>
						</div>
					</div>
					<!-- end card -->
				</div>
				<!-- end col-12 -->
				<?php endforeach; ?>
			</div>
			<!-- end row -->
		</div>
		<!-- end #content -->

<script src="<?php echo base_url().'assets/js/jquery.min.js'?>"></script>
<script src="https://www.chartjs.org/dist/2.9.4/Chart.min.js"></script>

<script>

	<?php $cc = 1; ?>
	<?php foreach ($chart as $x): ?>

	$(document).ready(function() {

		// {"id":"7925","kode_satker":"448302","kode":"8010101001","uraian":"Software Komputer","nup":"1","merk":"Software Windows","tahun":"2010","jumlah":"1","harga_beli":"4900000","harga_baru":"4900000","asal":"PPs.MAPD","kondisi":"Baik","luas":"0","kategori":"Aset Tak Berwujud","nama_satker":"IPDN KAMPUS JATINANGOR"}
		
		<?php $ch = json_encode($x) ?>

		var labels<?php echo $cc; ?> = <?php echo $ch;?>.map(function(e) {
			return e.tahun;
		});
		var data1_<?php echo $cc;?> = <?php echo $ch;?>.map(function(e) {
			return e.total;
		});

		var ctx<?php echo $cc; ?> = document.getElementById("myChart<?php echo $cc; ?>").getContext('2d');

		var gradientFill = ctx<?php echo $cc; ?>.createLinearGradient(0, 0, 0, 290);
		gradientFill.addColorStop(0, "rgba(153, 102, 255, 1)");
		gradientFill.addColorStop(1, "rgba(153, 102, 255, 0.1)");

		var config = {
			type: 'line',
			data: {
				labels: labels<?php echo $cc;?>,
				datasets: [{
					label: 'Total Barang',
					data: data1_<?php echo $cc;?>,
					pointBackgroundColor: 'white',
					pointBorderWidth: 2,
					backgroundColor: gradientFill,
					borderColor: 'rgba(153, 102, 255, 1)',
					lineTension: 0
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							fontColor: "#aaaaaa",
							beginAtZero: true,
							userCallback: function(value, index, values) {
								// Convert the number to a string and splite the string every 3 charaters from the end
								value = value.toString();
								value = value.split(/(?=(?:...)*$)/);
								// Convert the array to a string and format the output
								value = value.join('.');
								return value;
							}
						},
						gridLines: { color: "#444444" }
					}],
					xAxes: [{
						ticks: {
							fontColor: "#aaaaaa",
						},
						gridLines: { color: "#444444" }
					}]
				},
				legend: {
					display: true,
					labels: {
					fontColor: "#aaaaaa"
					}
				},
				responsive: true,
				chartArea: {
					backgroundColor: 'rgba(251, 85, 85, 0.4)'
				}
			}
		};

		var chart<?php echo $cc; ?> = new Chart(ctx<?php echo $cc++; ?>, config);

	});

	<?php endforeach; ?>

	</script>