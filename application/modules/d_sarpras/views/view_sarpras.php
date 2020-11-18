<link rel="stylesheet" href="<?php echo base_url().'assets/js/morris.css'?>">
<div id="content" class="content">
	<ol class="breadcrumb float-xl-right">
		<li class="breadcrumb-item"><a href="<?php echo base_url('home');?>">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="<?php echo base_url('d_sarpras');?>">JATINANGOR</a></li>
	</ol>
	<h1 class="page-header">Sarana dan Prasarana IPDN Jatinangor</h1>
	<div class="row">
		<div class="col-xl-12">

			<?php $kat = ""; ?>
			<?php $m = 0; ?>
			<?php $cc = 1; ?>
			<?php foreach (json_decode($data, true) as $x): ?>
				<?php if ($x['kategori'] != $kat) { ?>

					<?php if ($kat != "") { ?>

							</tbody>
						</table>
					</div>
				</div>
			</div>

					<?php } ?>

					<?php $kat = $x['kategori']; ?>
					<?php $no = 1; ?>

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
								<h4 class="text-center"><?php echo ucwords(strtolower($x['kategori'])); ?> bedasarkan Tahun</h4>
								<div id="graph<?php echo $cc++; ?>" class="height-sm width-xl"></div>
							</div>
						</div>
					</div>
					<!-- end panel -->

					<div class="panel panel-inverse">
						<div class="panel-heading">
							<h4 class="panel-title"><?php echo $x['kategori']; ?></h4>
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
						</div>
						<div class ="table-responsive">
							<div class="panel-body">
								<table class="table table-striped table-bordered table-td-valign-middle data-table-buttons">
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
				</div>
			</div>

		</div>
		<!-- end col-10 -->
	</div>
</div>

<script src="<?php echo base_url().'assets/js/jquery.min.js'?>"></script>
<script src="<?php echo base_url().'assets/js/raphael-min.js'?>"></script>
<script src="<?php echo base_url().'assets/js/morris.min.js'?>"></script>

<script>

		<?php $cc = 1; ?>
		<?php foreach ($chart as $x): ?>
			<?php $ch = json_encode($x) ?>
			Morris.Bar({
				element: 'graph<?php echo $cc++; ?>',
				data: <?php echo $ch;?>,
				xkey: 'tahun',
				ykeys: ['total'],
				labels: ['total'],
				lineWidth: '3px',
				resize: true,
				redraw: true
			});

		<?php endforeach; ?>

	</script>