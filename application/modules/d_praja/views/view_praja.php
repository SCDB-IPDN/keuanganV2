<link rel="stylesheet" href="<?php echo base_url() . 'assets/js/morris.css' ?>">
<div id="content" class="content">
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('d_praja'); ?>">All Praja</a></li>

  </ol>
  <h1 class="page-header">PRAJA</h1>
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
            <h4 class="text-center">PRAJA IPDN</h4>
            <!-- <div id="graph" class="height-sm width-xl"></div> -->
            <canvas id="myChart" height="70"></canvas>
          </div>
        </div>
      </div>
      <!-- end panel -->
      <div class="panel panel-inverse">
        <div class="panel-heading">
          <h4 class="panel-title">
            <?php if($this->session->userdata('role') == 'Admin'){?>
              <span><a href="<?php echo base_url('d_praja/editstatus');?>" class="btn btn-sm btn-warning"> STATUS PRAJA</a></span>
            <?php } ?>
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


        <div class="table-responsive">
          <?php if ($this->session->flashdata('praja') != NULL) { ?>
            <div class="alert alert-success alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Notif!</strong> <?php echo $this->session->flashdata('praja') ?>
            </div>
          <?php } ?>

          <div class="panel-body">
            <table id="data-praja" class="table table-striped table-bordered table-td-valign-middle" width="100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NAMA</th>
                  <TH>JENIS KELAMIN</TH>
                  <th>TINGKAT</th>
                  <th>ANGKATAN</th>
                  <th>STATUS</th>
                  <th>OPSI</th>
                </tr>
              </thead>

            </table>
          </div>
        </div>
        <!-- end panel-body -->
      </div>
      <!-- end panel -->
    </div>
    <!-- end col-10 -->



    <script src="<?php echo base_url() . 'assets/js/jquery.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/raphael-min.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/morris.min.js' ?>"></script>
    <script>

      $(document).ready(function() {

        var url = '<?php echo base_url('d_praja/cobain');?>';

        $('#data-praja').dataTable({
            // dom: 'Bfrtip',
            dom: '<"row"<"col-sm-5"B><"col-sm-7"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>',
            buttons: [
            'copy', 'excel', 'print'
            ],
            responsive: true,
            "ajax": {
              "url": url,
              "dataSrc": "",
              "deferRender": true
            }
          });
      });

    </script>

<!--   <script>
    Morris.Bar({
      element: 'graph',
      data: <?php echo $prov; ?>,
      xkey: 'provinsi',
      ykeys: ['jumlah'],
      labels: [' Jumlah'],
      barRatio: 0.1,
      behaveLikeLine: true,
      pointSize: 5,
      resize: true,
      parseTime: false,
      hideHover: 'auto',
      gridTextSize: 10
    });
  </script> -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  <script type="text/javascript">
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: [
        <?php
        if (count($prov)>0) {
          foreach ($prov as $data) {
            echo "'" .$data->provinsi ."',";
          }
        }
        ?>
        ],
        datasets: [{
          label: 'Jumlah Praja',
          backgroundColor: '#ADD8E6',
          borderColor: '##93C3D2',
          data: [
          <?php
          if (count($prov)>0) {
           foreach ($prov as $data) {
            echo $data->jumlah . ", ";
          }
        }
        ?>
        ]
      }]
    },
  });

</script>