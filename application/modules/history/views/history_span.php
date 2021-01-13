<link href="<?php echo base_url().'assets/plugins/bootstrap-daterangepicker/daterangepicker.css'?>" rel="stylesheet" />
<div id="content" class="content">
	<ol class="breadcrumb float-xl-right">
		<li class="breadcrumb-item"><a href="<?php echo base_url('home');?>">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="<?php echo base_url('history/span');?>">SPAN</a></li>
	</ol>
	<div class="d-sm-flex align-items-center mb-3">
		<a href="#" class="btn btn-inverse mr-2 text-truncate" id="daterange-filter">
			<i class="fa fa-calendar fa-fw text-white-transparent-5 ml-n1"></i> 
			<span></span>
			<b class="caret"></b>
		</a>
	</div>
	<div class="row">
		<div class="col-xl-12">
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title">
					</h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<div class ="table-responsive">
					<div class="panel-body">
						<form method='post' action='span'>
							<div class="form-group">
								<div class="row">
									<div class="col-sm-2">
										<label class="col-form-label">Start Date:</label>
										<input type="date" class="form-control" id="fromDate" name="fromDate" value="<?php echo $fromDate ?>" required/>
									</div>
									<div class="col-sm-2">
										<label class="col-form-label">End Date:</label>
										<input type="date" class="form-control" id="endDate" name="endDate" value="<?php echo $endDate ?>" required/>
									</div>
									<div class="col-sm-0.5">
										<label class="col-form-label">&nbsp;</label>
										<button type="submit" class="form-control btn btn-primary btn-sm" name="but_search" value="Search"><i class="fa fa-search"></i></button>
									</div>
								</div>
							</div>
						</form>
						<br>
						<?php if($data != 'Tidak') {?>
							<table id="data-table-buttons" class="table table-striped table-bordered table-td-valign-middle">
								<thead>
									<tr>
										<th>#</th>
										<th>Tanggal</th>
										<th>Kode Satker</th>
										<th>Nama Satker</th>
										<th>Pagu BP</th>
										<th>Realisasi BP</th>
										<th>% BP</th>
										<th>Pagu BB</th>
										<th>Realisasi BB</th>
										<th>% BB</th>
										<th>Pagu BM</th>
										<th>Realisasi BM</th>
										<th>% BM</th>
										<th>Pagu T</th>
										<th>Realisasi T</th>
										<th>% T</th>
										<th>Sisa</th>
										<th>Detail</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 0;
									foreach($data as $row){
										$no++;
										?>
										<tr class="gradeA">
											<td width="1%"><?= $no == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $no ?></td>
											<td width="1%"><?= $row->created_date == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->created_date ?></td>
											<td width="1%"><?= $row->kode_satker == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->kode_satker ?></td>
											<td width="1%"><?= $row->nama_satker == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->nama_satker ?></td>

											<td width="1%"><?= number_format($row->pagu_bp ) == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : number_format($row->pagu_bp ) ?></td>
											<td width="1%"><?= number_format($row->realisasi_bp) == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : number_format($row->realisasi_bp) ?></td>
											<td width="1%"><?= $row->persentase_bp == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->persentase_bp?></td>

											<td width="1%"><?= number_format($row->pagu_bb ) == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : number_format($row->pagu_bb ) ?></td>
											<td width="1%"><?= number_format($row->realisasi_bb) == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : number_format($row->realisasi_bb) ?></td>
											<td width="1%"><?= $row->persentase_bb == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->persentase_bb?></td>

											<td width="1%"><?= number_format($row->pagu_bm ) == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : number_format($row->pagu_bm ) ?></td>
											<td width="1%"><?= number_format($row->realisasi_bm) == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : number_format($row->realisasi_bm) ?></td>
											<td width="1%"><?= $row->persentase_bm == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->persentase_bm?></td>

											<td width="1%"><?= number_format($row->pagu_t ) == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : number_format($row->pagu_t ) ?></td>
											<td width="1%"><?= number_format($row->realisasi_t) == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : number_format($row->realisasi_t) ?></td>
											<td width="1%"><?= $row->persentase_t == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->persentase_t?></td>

											<td width="1%"><?= number_format($row->sisa) == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : number_format($row->sisa) ?></td>
											<?php if($row->kode_satker == 448302){?>
												<td width="1%"><?= "<a href='span_jatinangor?fromDate=$row->created_date' class='btn btn-primary mr-1' btn-sm><i class='fa fa-eye'></i></a>"?></td>
											<?php }else{ ?>
												<td width="1%">Tidak ada detail</td>
											<?php } ?>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						<?php }else{ ?>
							Silahkan pilih tanggal
						<?php } ?>
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
<script src="<?php echo base_url().'assets/plugins/moment/moment.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/bootstrap-daterangepicker/daterangepicker.js'?>"></script>
<script>
	// alert('test');
	$('#daterange-filter span').html(moment().subtract('days', 7).format('D MMMM YYYY') + ' - ' + moment().format('D MMMM YYYY'));

	$('#daterange-filter').daterangepicker({
		format: 'MM/DD/YYYY',
		startDate: moment().subtract(7, 'days'),
		endDate: moment(),
		minDate: '01/01/2017',
		maxDate: moment(),
		dateLimit: { days: 60 },
		showDropdowns: true,
		showWeekNumbers: true,
		timePicker: false,
		timePickerIncrement: 1,
		timePicker12Hour: true,
		ranges: {
			'Today': [moment(), moment()],
			'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
			'Last 7 Days': [moment().subtract(6, 'days'), moment()],
			'Last 30 Days': [moment().subtract(29, 'days'), moment()],
			'This Month': [moment().startOf('month'), moment().endOf('month')],
			'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
		},
		opens: 'right',
		drops: 'down',
		buttonClasses: ['btn', 'btn-sm'],
		applyClass: 'btn-primary',
		cancelClass: 'btn-default',
		separator: ' to ',
		locale: {
			applyLabel: 'Submit',
			cancelLabel: 'Cancel',
			fromLabel: 'From',
			toLabel: 'To',
			customRangeLabel: 'Custom',
			daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr','Sa'],
			monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
			firstDay: 1
		}
	}, function(start, end, label) {
		$('#daterange-filter span').html(start.format('D MMMM YYYY') + ' - ' + end.format('D MMMM YYYY'));
		
		// var gap = end.diff(start, 'days');
		// $('#daterange-prev-date').html(moment(start).subtract('days', gap).format('D MMMM') + ' & ' + moment(start).subtract('days', 1).format('D MMMM YYYY'));
	});
</script>