<link rel="stylesheet" href="<?php echo base_url() . 'assets/js/morris.css' ?>">
<div id="content" class="content">
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('d_praja'); ?>">Edit Status Praja</a></li>

  </ol>
  <h1 class="page-header">PRAJA</h1>
  <div class="row">
    <div class="col-xl-12">
      <!-- begin panel -->
      <div class="panel-body">
        <div class="table-responsive">


          <h4 class="text-center">STATUS PRAJA IPDN </h4>
          
        </div>
      </div>
      <!-- end panel -->
      <div class="panel panel-inverse">
        <div class="panel-heading">
          <h4 class="panel-title">
            <span><a href="<?php echo base_url('d_praja/ubahstatus');?>" class="btn btn-sm btn-warning">UBAH STATUS PRAJA</a></span>
            <!-- <span><a href="" class="btn btn-sm btn-red" data-toggle="modal" data-target="#editstatus">UBAH STATUS PRAJA</a></span> -->
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
            <table id="data-table-buttons" class="table table-striped table-bordered table-td-valign-middle" width="100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th> ID </th>
                  <th>NAMA</th>
                  <th>TINGKAT</th>
                  <th>ANGKATAN</th>
                  <th>STATUS</th>
                    <TH>KETERANGAN</TH>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; ?>
                <?php foreach (json_decode($data, true) as $x) : ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?= $x['id']; ?></td>
                    <td><?= $x['nama']; ?></td>
                    <td><?= $x['tingkat']; ?></td>
                    <td><?= $x['angkatan']; ?>
                    <td><?= $x['status']; ?></td>
                    <td><?= $x['keterangan']; ?></td>
                    
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



    <script src="<?php echo base_url() . 'assets/js/jquery.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/raphael-min.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/morris.min.js' ?>"></script>