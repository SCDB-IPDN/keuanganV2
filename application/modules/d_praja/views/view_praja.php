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
                  <TH>JENIS KELAMIN</TH>
                  <th>TINGKAT</th>
                  <th>ASAL</th>
                  <th>OPSI</th>
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
                   <td><?= $x['kab/kota']; ?></td>
                   <?php if (isset($x['nik_praja'])){ ?>
                    <td>
                      <a href='<?= base_url().'d_praja/detail/'.$x['nik_praja'] ?>' class='btn btn-sm btn-primary' btn-sm><i class='fa fa-eye'></i></a>
                      <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editpraja<?php echo $x['nik_praja'];?>"><i class="fa fas fa-edit"></i></a>
                      <a href="#" class="btn btn-sm btn-danger" style="color:#fff;cursor:pointer" data-toggle="modal" data-target="#hapuspraja<?php echo $x['nik_praja'];?>"><i class="fa fas fa-trash"></i></a>
                    </td>
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
    <?php foreach(json_decode($data, true) as $x){?>
    <!-- Modal EDIT THL -->
    <div class="modal fade" id="editpraja<?php echo $x['nik_praja'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">EDIT PRAJA <?php echo $x['nama'];?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form action="d_praja/edit_praja" method="post">
                        <input type="hidden" class="form-control" id="nik_praja" name="nik_praja" value="<?php echo $x['nik_praja'];?>">
                        <div class="form-group">
                            <label for="nama" class="col-form-label">Nama:</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $x['nama'];?>" placeholder="Nama Lengkap.." required>
                        </div>
                        <div class="form-group">
                              <label for="tmpt_lahir" class="col-form-label">Tempat Lahir:</label>
                              <input type="text" class="form-control" id="tmpt_lahir" name="tmpt_lahir" value="<?php echo $x['tmpt_lahir'];?>" placeholder="Tempat Lahir.." required>
                        </div>
                        <div class="form-group">
                            <label for="alamat" class="col-form-label">Alamat:</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $x['alamat'];?>" placeholder="Alamat.." required>
                        </div>
                        <div class="form-group">
                            <label for="tlp_pribadi" class="col-form-label">telpon pribadi:</label>
                            <input type="text" class="form-control" id="tlp_pribadi" name="tlp_pribadi" value="<?php echo $x['tlp_pribadi'];?>" placeholder="tlp_pribadi.." required>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-form-label">Email:</label>
                            <input type="text" class="form-control" id="email" name="email" value="<?php echo $x['email'];?>" placeholder="Email.." required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" value="Cek">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>



<script src="<?php echo base_url().'assets/js/jquery.min.js'?>"></script>
<script src="<?php echo base_url().'assets/js/raphael-min.js'?>"></script>
<script src="<?php echo base_url().'assets/js/morris.min.js'?>"></script>
