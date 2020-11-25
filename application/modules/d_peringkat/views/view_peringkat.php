<link rel="stylesheet" href="<?php echo base_url().'assets/js/morris.css'?>">
<div id="content" class="content">
	<ol class="breadcrumb float-xl-right">
		<li class="breadcrumb-item"><a href="<?php echo base_url('home');?>">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="<?php echo base_url('d_pok');?>">KEMENTERIAN DALAM NEGERI</a></li>
	</ol>
<!-- 	<h2 class="page-header">URUTAN REALISASI SERAPAN ANGGARAN KEMENTERIAN DALAM NEGERI</h2> -->
	<div class="row">
		<div class="col-xl-12">
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title">
					</h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
					</div>
				</div>
				<div class ="table-responsive">
					<div class="panel-body">
						<h4 class="text-center">URUTAN REALISASI SERAPAN ANGGARAN KEMENTERIAN DALAM NEGERI</h4>
						<h4 class="text-center">PER TANGGAL <?= $uDate; ?></h4>
						<table id="data-table-buttons" class="table table-striped table-bordered table-td-valign-top" width="100%">
							<thead>
								<tr align="center">
									<th>#</th>									
									<th>NAMA</th>
									<th>KETERANGAN</th>
									<th>PEGAWAI</th>
									<th>BARANG</th>
									<th>MODAL</th>
									<th>TOTAL</th>
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