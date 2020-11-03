<link rel="stylesheet" href="<?php echo base_url().'assets/js/morris.css'?>">
<div id="content" class="content">
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">SPAN</a></li>
  </ol>
  <h1 class="page-header">SPAN</h1>
  <div class="row">
    <div class="col-xl-12">
					<!-- begin panel -->
					<div class="panel panel-inverse" data-sortable-id="morris-chart-3">
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
							<h4 class="text-center">Laporan progress realisasi anggaran IPDN <?php echo date("Y") ?> Berdasarkan SPAN</h4>
              <div id="graph" class="height-sm width-xl"></div>
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
          <table id="data-table-buttons" class="table table-striped table-bordered table-td-valign-middle">
            <thead>
              <tr>
                <th width="1%" class="text-nowrap">Kampus</th>
                <th width="1%" class="text-nowrap">Pagu</th>
                <th width="1%" class="text-nowrap">Realisasi</th>
                <th width="1%" class="text-nowrap">Sisa Pagu</th>
                <th width="1%" class="text-nowrap">Persentase</th>
                <th width="1%" class="text-nowrap">Detail</th>
              </tr>
            </thead>
            <tbody>
            <?php
                $no = 0;
                foreach($data as $row){
                $no++;
            ?>
              <tr class="gradeA">
                <td width="1%"><?= $row->kampus == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->kampus ?></td>
                <td width="1%"><?= number_format($row->pagu) == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : number_format($row->pagu) ?></td>
                <td width="1%"><?= number_format($row->realisasi) == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : number_format($row->realisasi) ?></td>
                <td width="1%"><?= number_format($row->sisa_pagu) == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : number_format($row->sisa_pagu) ?></td>
                <td width="1%"><?= $row->persentase == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->persentase ?></td>
                <?php if($row->kampus == 'IPDN KAMPUS JATINANGOR'){?>
                <td width="1%"><?= "<a href='home' class='btn btn-primary mr-1' btn-sm><i class='fa fa-eye'></i></a>"?></td>
                <?php }else{ ?>
                <td width="1%">Tidak ada detail</td>
                <?php } ?>
              </tr>
            <?php } ?>
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
              
<script>
  Morris.Bar({
    element: 'graph',
    data: <?php echo $chart;?>,
    xkey: 'kampus',
    ykeys: ['pagu', 'realisasi'],
    labels: ['pagu', 'realisasi'],
    barRatio: 0.4,
    pointSize: 2.5,
    xLabelAngle: 4,
    resize: true,
    parseTime: false,
    hideHover: 'auto',
    gridTextSize: 9
  });
  
</script>