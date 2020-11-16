<link rel="stylesheet" href="<?php echo base_url().'assets/js/morris.css'?>">
<div id="content" class="content">
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="<?php echo base_url('home');?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('d_praja');?>">All Praja</a></li>
    
  </ol>
  <h1 class="page-header">PRAJA</h1>
  <div class="row">
    <div class="col-xl-12">
      <!-- begin panel -->

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
                  <th>No</th>
                  <th>NAMA</th>
                  <TH>JK</TH>
                  <th>TINGKAT</th>
                  <th>DETAIL</th>

                </tr>
              </thead>
              <tbody>
                <?php $no = 1; ?>
                <?php foreach (json_decode($data, true) as $x): ?>
                  <tr>
                   <td><?php echo $no++; ?></td>
                   <td><?= $x['nama']; ?></td>
                   <td><?= $x['jk']; ?></td>
                   <td><?= $x['tahun_masuk_kuliah'] - date('Y') +1 ;?></td>
                   <?php if (isset($x['nik_praja'])){ ?>
                    <td><a href='<?= base_url().'d_praja/detail/'.$x['nik_praja'] ?>' class='btn btn-primary mr-1' btn-sm><i class='fa fa-eye'></i></a></td>
                  <?php } else { ?>
                    <td>Tidak ada detail</td>
                  <?php } ?>
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
<script src="<?php echo base_url().'assets/js/morris.min.js'?>"></script>
