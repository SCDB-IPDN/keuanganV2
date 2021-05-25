<div id="content" class="content">
	<ol class="breadcrumb float-xl-right">
		<li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Dashboard</a></li>
    	<li class="breadcrumb-item"><a href="#">Lapsit</a></li>
	</ol>
  	<h1 class="page-header">Lapsit</h1>
  	<div class="row">
    	<div class="col-xl-12">
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title"></h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand">
							<i class="fa fa-expand"></i>
						</a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload">
							<i class="fa fa-redo"></i>
						</a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse">
							<i class="fa fa-minus"></i>
						</a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove">
							<i class="fa fa-times"></i>
						</a>
					</div>
				</div>
				<div class="table-responsive">
					<div class="panel-body">
						<div class="mb-5">
							<p>Masukan tanggal untuk melihat data:</p>
							<form id="inputDateForm" class="col-sm-3 float-left pl-0" action="<?php echo base_url('lapsit/lapsitView'); ?>" method="POST">
								<div class="form-group mr-xs-3 mb-2">
									<input type="date" class="form-control" name="inputDate" id="inputDate" required>
								</div>
							</form>
						</div>
						<div class="pt-5">
							<h6>Menampilkan data hari <?= $hariTanggal ?></h6>
						</div>
						<ul class="nav nav-pills mb-3 zbg-light" id="pills-tab" role="tablist">
							<li class="nav-item bg-secondary">
								<a class="nav-link rounded-0 text-center text-white active" id="pills-lapsit-tab" data-toggle="pill" href="#pills-lapsit" role="tab" aria-controls="pills-lapsit" aria-selected="true">LAPSIT</a>
							</li>
							<li class="nav-item bg-secondary">
								<a class="nav-link border-left rounded-0 text-center text-white" id="pills-klb-tab" data-toggle="pill" href="#pills-klb" role="tab" aria-controls="pills-klb" aria-selected="false">KLB</a>
							</li>
							<li class="nav-item bg-secondary">
								<form id="export-pdf-form" action="<?php echo base_url('lapsit/exportToPdf'); ?>" method="POST">
									<input type="hidden" name="exportDate" value="<?= $date ?>">
								<a class="nav-link border-left rounded-0 text-center text-white" id="export-pdf" type="button">EXPORT PDF</a>
							</form>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="tab-content" id="pills-tabContent">
				<div class="tab-pane fade show active" id="pills-lapsit" role="tabpanel" aria-labelledby="pills-lapsit-tab">
					<div class="panel panel-inverse" >
						<div class="panel-heading">
							<h4 class="panel-title"></h4>
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand">
									<i class="fa fa-expand"></i>
								</a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload">
									<i class="fa fa-redo"></i>
								</a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse">
									<i class="fa fa-minus"></i>
								</a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove">
									<i class="fa fa-times"></i>
								</a>
							</div>
						</div>
						<div class="table-responsive">
							<div class="panel-body">
								<table class="table table-bordered table-td-valign-middle" width="100%" id="lapsit">
									<thead>
										<tr>
											<th rowspan="2">NO</th>
											<th rowspan="2">SATKER</th>
											<th rowspan="2" colspan="2">JUMLAH</th>
											<th rowspan="2">KURANG</th>
											<th rowspan="2">HADIR</th>
											<th colspan="5">KETERANGAN</th>
										</tr>
										<tr>
											<th>DD</th>
											<th>SAKIT</th>
											<th>IZIN</th>
											<th>ISOLASI</th>
											<th>TK</th>
										</tr>
									</thead>
									<tbody><?= $satu ?></tbody>
									<tbody><?= $dua ?></tbody>
									<tbody><?= $tiga ?></tbody>
									<tbody><?= $totalTiga ?></tbody>
									<tbody><?= $empat ?></tbody>
									<tbody><?= $totalEmpat ?></tbody>
									<tbody><?= $totalJ ?></tbody>
									<tbody><?= $grandTotal ?></tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="pills-klb" role="tabpanel" aria-labelledby="pills-klb-tab">
					<div class="panel panel-inverse" >
						<div class="panel-heading">
							<h4 class="panel-title"></h4>
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand">
									<i class="fa fa-expand"></i>
								</a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload">
									<i class="fa fa-redo"></i>
								</a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse">
									<i class="fa fa-minus"></i>
								</a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove">
									<i class="fa fa-times"></i>
								</a>
							</div>
						</div>
						<div class="table-responsive">
							<div class="panel-body">
								<table class="table table-bordered table-td-valign-middle" width="100%" id="klb">
									<thead>
										<tr>
											<th>NO</th>
											<th>OBJEK</th>
											<th>KETERANGAN</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td colspan="3">SATUAN PRAJA</td>
										</tr>
									</tbody>
									<tbody><?= $klbSatu ?></tbody>
									<tbody><?= $klbDua ?></tbody>
									<tbody><?= $klbTiga ?></tbody>
									<tbody><?= $klbEmpat ?></tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
document.addEventListener('DOMContentLoaded', (event) => {
	const tableHead = document.querySelectorAll('th');
	tableHead.forEach((th) => {
		th.className ='text-center align-middle font-weight-bold';
	});

	const tableData = document.querySelectorAll('#lapsit td');
	tableData.forEach((td) => {
		td.className ='text-center align-middle';
	});

	const colspan10 = document.querySelectorAll('#lapsit td[colspan="10"]');
	colspan10.forEach((col10) => {
		col10.className ='font-weight-bold';
	});

	const colspan2 = document.querySelectorAll('#klb td[colspan="2"]');
	colspan2.forEach((col2) => {
		col2.className ='font-weight-bold';
	});

	const colspan3 = document.querySelectorAll('#klb td[colspan="3"]');
	colspan3.forEach((col3) => {
		col3.className ='font-weight-bold';
	});

	const rowspan2 = document.querySelectorAll('#klb td[rowspan]');
	rowspan2.forEach((row2) => {
		row2.className ='text-center';
	});
});

const inputDateForm = document.getElementById('inputDateForm');
const inputDate = document.getElementById('inputDateForm');

inputDate.addEventListener('change', () => {
	inputDateForm .submit();
});

const exportForm = document.getElementById('export-pdf-form');
const exportBtn = document.getElementById('export-pdf');

exportBtn.addEventListener('click', () => {
	exportForm .submit();
});
</script>