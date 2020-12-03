<link rel="stylesheet" href="<?php echo base_url().'assets/js/morris.css'?>">
<div id="content" class="content">
	<ol class="breadcrumb float-xl-right">
		<li class="breadcrumb-item"><a href="<?php echo base_url('home');?>">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="<?php echo base_url('d_sarpras');?>"><?= $title; ?></a></li>
	</ol>
	<h1 class="page-header">Sarana dan Prasarana IPDN <?= $title; ?></h1>
	<div class="row">

		<div class="col-xl-12" id="tabs">
			<!-- begin nav-tabs -->
			<ul class="nav nav-tabs">

				<?php $cl = 1; ?>
				<?php foreach (json_decode($l_kat, true) as $y): ?>

				<li class="nav-item">
					<a href="#default-tab-<?= $cl; ?>" id="tab-<?= $cl; ?>" data-toggle="tab" class="nav-link <?php echo $cl==1?'active':''; ?>" data-url="<?= base_url(uri_string()).'/'.url_title($y['kategori']); ?>">
						<span class="d-sm-none">Tab <?= $cl++; ?></span>
						<span class="d-sm-block d-none"><?php echo ucwords(strtolower($y['kategori'])); ?></span>
					</a>
				</li>

				<?php endforeach; ?>

			</ul>
			<!-- end nav-tabs -->
			<!-- begin tab-content -->
			<div class="tab-content">

			<?php $cl = 1; ?>
				<?php foreach (json_decode($l_kat, true) as $y): ?>

				<div class="tab-pane fade <?php echo $cl==1?'active show':''; ?>" id="default-tab-<?= $cl; ?>">
					<h4 class="text-center">Belanja <?php echo ucwords(strtolower($y['kategori'])); ?> bedasarkan Tahun</h4>
					<canvas id="myChart<?php echo $cl; ?>" height="70"></canvas>
					<table class="table table-striped table-bordered table-td-valign-middle" id="tbl-tab-<?php echo $cl++; ?>" width="100%">
						<thead>
							<tr align="center">
								<th>#</th>
								<th>Uraian</th>
								<th>Merk</th>
								<th>Tahun</th>
								<th>Asal Perolehan</th>
								<th>Jumlah/Luas</th>
								<th>Harga Satuan</th>
								<th>Harga Perolehan</th>
								<th>Harga Revaluasi</th>
								<th>Kondisi</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tfoot>
							<tr align="center">
								<th colspan="7">TOTAL</th>
								<th><?= $y['total']; ?></th>
								<th><?= $y['perolehan']; ?></th>
								<th colspan="2"></th>
							</tr>
						</tfoot>
					</table>
				</div>

			<?php endforeach; ?>

			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	{"id":"7925","kode_satker":"448302","kode":"8010101001","uraian":"Software Komputer","nup":"1","merk":"Software Windows","tahun":"2010","jumlah":"1","harga_beli":"4900000","harga_baru":"4900000","asal":"PPs.MAPD","kondisi":"Baik","luas":"0","kategori":"Aset Tak Berwujud","nama_satker":"IPDN KAMPUS JATINANGOR"}

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
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

	$(document).ready(function() {

		var uri = $("#tab-<?php echo $cc; ?>").attr("Data-url");

		$('#tbl-tab-<?= $cc; ?>').DataTable({
			dom: 'Bfrtip',
			buttons: [
				'copy', 'excel', 'pdf', 'print'
			],
			"responsive": true,
			"ajax": {
				"url": uri,
				"dataSrc": ""
			},
			"columns": [
				{ "data": "no" },
				{ "data": "uraian" },
				{ "data": "merk" },
				{ "data": "tahun", className: "text-right" },
				{ "data": "asal" },
				{ "data": "jumlah", className: "text-right" },
				{ "data": "harga_beli", className: "text-right" },
				{ "data": "tb", className: "text-right" },
				{ "data": "tr", className: "text-right" },
				{ "data": "kondisi" },
				{ "data": "id",
					render: function (data, type, full, meta) {
						return '<button data-id="' + data + '" data-toggle="modal" data-target="#editModal">detail</button>';
					}
				}
			]
		});

		$('#tbl-tab-<?= $cc; ?> tbody').on('click', 'button', function () {
    	    var uri = "<?= base_url().'d_sarpras/detail/'; ?>" + $(this).attr("data-id");
    	    // alert(uri);
			$.ajax({
				url: uri,
				success: function(data){
					// alert(data);
					var obj = JSON.parse(data);
					// alert(obj.uraian);
					$('#editModalTitle').text(obj.merk);
					// alert(data);
				}
			});
		});
		
		<?php $ch = json_encode($x) ?>

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

	});

	<?php endforeach; ?>

	</script>