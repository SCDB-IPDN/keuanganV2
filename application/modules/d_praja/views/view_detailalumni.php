<link rel="stylesheet" href="<?php echo base_url() . 'assets/js/morris.css' ?>">
<div id="content" class="content">
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('view_detailalumni'); ?>">Detail Alumni </a></li>

  </ol>
  <hl class="page-header">DETAIL ALUMNI</hl>
  <div class="row">
    <div class="col-xl-12">
      <!-- begin panel -->

      <!-- end panel -->
      <div class="panel panel-inverse">
        <div class="panel-heading">
          <h4 class="panel-title">
            <span><a href="<?php echo base_url('d_praja/alumni');?>" class="btn btn-sm btn-warning">KEMBALI</a></span>
          </h4>
          <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
          </div>
        </div>
        <div class="table-responsive">
          <div class="panel-body">
            <?php foreach (json_decode($data, true) as $x) : ?>
              <form>
                <h3> DATA DIRI </h3>
                <br>
                <h5> Nama : <?= $x['nama']; ?> </h5>
                <br>
                <div class="row">
                  <div class="col-xl">
                  <br>
                    <label for="basic-url">NIP</label>
                    <input type="text" class="form-control" value="<?= $x['nip'] == NULL ? "-" : $x['nip'] ?>" readonly>
                  </div>
                  <div class="col-xl">
                  <br>
                    <label for="basic-url">JENIS KELAMIN</label>
                    <input type="text" class="form-control" value="<?= $x['jk'] == NULL ? "-" : $x['jk'] ?>" readonly>
                  </div>
                  <div class="col-xl">
                  <br>
                    <label for="basic-url">INSTITUSI</label>
                    <input type="text" class="form-control" value="<?= $x['institusi'] == NULL ? "-" : $x['institusi'] ?>" readonly>
                  </div>

                  <div class="col-xl">
                  <br>
                    <label for="basic-url">Angkatan</label>
                    <input type="text" class="form-control" value="<?= $x['angkatan'] == NULL ? "-" : $x['angkatan'] ?>" readonly>
                  </div>
                  <div class="col-xl">
                  <br>
                    <label for="basic-url">Tahun Lulus</label>
                    <input type="year" class="form-control" value="<?= $x['tahun_lulus'] == NULL ? "-" : $x['tahun_lulus'] ?>" readonly>
                  </div>
                  <div class="col-xl">
                  <br>
                    <label for="basic-url">Instansi</label>
                    <input type="text" class="form-control" value="<?= $x['instansi'] == NULL ? "-" : $x['instansi'] ?>" readonly>
                  </div>
                  <div class="col-xl">
                    <br>
                    <label for="basic-url">Jabatan</label>
                    <input type="text" class="form-control" value="<?= $x['jabatan'] == NULL ? "-" : $x['jabatan'] ?>" readonly>
                  </div>
                  <div class="col-xl">
                    <br>
                    <label for="basic-url">KAB/KOTA</label>
                    <input type="text" class="form-control" value="<?= $x['kabkot'] == NULL ? "-" : $x['kabkot'] ?>" readonly>
                  </div>
                  <div class="col-xl">
                    <br>
                    <label for="basic-url">Provinsi</label>
                    <input type="text" class="form-control" value="<?= $x['provinsi'] == NULL ? "-" : $x['provinsi'] ?>" readonly>
                  </div>
                  <br>
                </form>
              <?php endforeach; ?>
              <br>
            </div>
          </div>
          <!-- end panel-body -->
        </div>
        <!-- end panel -->
      </div>
      <!-- end col-l0 -->
    </div>
  </div>

  <script src="<?php echo base_url() . 'assets/js/jquery.min.js' ?>"></script>
  <script src="<?php echo base_url() . 'assets/js/raphael-min.js' ?>"></script>
  <script src="<?php echo base_url() . 'assets/js/morris.min.js' ?>"></script>