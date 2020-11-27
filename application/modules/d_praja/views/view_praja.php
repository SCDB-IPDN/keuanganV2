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
      <div class="panel-body">
        <div class="table-responsive">
          <h4 class="text-center">PRAJA IPDN <?php echo date("Y") ?> </h4>
          <div id="graph" class="height-sm width-xl"></div>
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
         <?php if($this->session->flashdata('praja') != NULL){ ?>
          <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Notif!</strong> <?php echo $this->session->flashdata('praja') ?>
          </div>
        <?php } ?>
        <?php $angkatan = 31; ?>
        <div class="panel-body">
          <table id="data-table-buttons" class="table table-striped table-bordered table-td-valign-middle">
            <thead>
              <tr>
                <th>No</th>
                <th>NAMA</th>
                <TH>JENIS KELAMIN</TH>
                <th>TINGKAT</th>
                <th>ANGKATAN</th>
                <th>PROVINSI</th>
                <th>STATUS</th>
                <th>OPSI</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              <?php foreach (json_decode($data, true) as $x): ?>
                <?php $kurangtahun = 2020 - $x['tahun_masuk_kuliah']; ?>
                <tr>
                 <td><?php echo $no++; ?></td>
                 <td><?= $x['nama']; ?></td>
                 <td><?= $x['jk']; ?></td>
                 <td><?= $x['tahun_masuk_kuliah'] - date('Y') +1 ;?></td>
                 <?php if ($x['tahun_masuk_kuliah'] == 2020)  { ?>
                      <td> <?= $angkatan;?> </td>
                    <?php }elseif($x['tahun_masuk_kuliah'] < 2020 || $x['tahun_masuk_kuliah'] > 2020 ){ ?>
                       <td><?= $angkatan-$kurangtahun;?> </td>
                    <?php }else{ ?>
                       <td></td>
                    <?php } ?>
                 <!-- <td><?= $x['tahun_masuk_kuliah'] = 31 ;?></td> -->
                 <td><?= $x['provinsi']; ?></td>
                 <td><?= $x['status']; ?></td>
                 <?php if (isset($x['nik_praja'])){ ?>
                  <td>
                    <a href='<?= base_url().'d_praja/detail/'.$x['nik_praja'] ?>' class='btn btn-sm btn-primary' btn-sm><i class='fa fa-eye'></i></a>
                    <a href='<?= base_url().'d_praja/edit/'.$x['nik_praja'] ?>' data-target="#editpraja" class='btn btn-sm btn-warning' btn-sm><i class='fa fas fa-edit'></i></a>
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
  <!-- Modal edit praja -->
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
              <label for="email" class="col-form-label">Email:</label>
              <input type="text" class="form-control" id="email" name="email" value="<?php echo $x['email'];?>" placeholder="Email.." required>
            </div>
            <div class="form-group">
              <label for="alamat" class="col-form-label">Alamat:</label>
              <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $x['alamat'];?>" placeholder="Alamat.." required>
            </di>
             <div class="row">
              <div class="col-sm">
                <label for="tmpt_lahir" class="col-form-label">RT:</label>
                <input type="text" class="form-control" id="rt" name="rt" value="<?php echo $x['rt'];?>" placeholder="RT.." required>
              </div>
                <div class="col-sm">
                <label for="tmpt_lahir" class="col-form-label">RW :</label>
                <input type="text" class="form-control" id="rw" name="rw" value="<?php echo $x['rw'];?>" placeholder="RW.." required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="tmpt_lahir" class="col-form-label">Nama Dusun :</label>
            <input type="text" class="form-control" id="nama_dusun" name="nama_dusun" value="<?php echo $x['nama_dusun'];?>" placeholder="Nama Dusun.." required>
          </div>
          <div class="form-group">
            <label for="tmpt_lahir" class="col-form-label">Kelurahan :</label>
            <input type="text" class="form-control" id="kelurahan" name="kelurahan" value="<?php echo $x['kelurahan'];?>" placeholder="kelurahan.." required>
          </div>
          <div class="form-group">
            <label for="tmpt_lahir" class="col-form-label">Kecamatan :</label>
            <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="<?php echo $x['kecamatan'];?>" placeholder="Kecamatan.." required>
          </div>
          <div class="form-group">
            <label for="tmpt_lahir" class="col-form-label">Kab/Kota :</label>
            <input type="text" class="form-control" id="kab/kota" name="kab/kota" value="<?php echo $x['kab/kota'];?>" placeholder="Kabupaten/Kota.." required>
          </div>
          <div class="form-group">
            <label for="tmpt_lahir" class="col-form-label">Kode Pos :</label>
            <input type="text" class="form-control" id="kode_pos" name="kode_pos" value="<?php echo $x['kode_pos'];?>" placeholder="Kode Pos.." required>
          </div>
          <div class="form-group">
            <label for="tlp_pribadi" class="col-form-label">Telpon Pribadi:</label>
            <input type="text" class="form-control" id="tlp_pribadi" name="tlp_pribadi" value="<?php echo $x['tlp_pribadi'];?>" placeholder="Telepon Pribadi.." required>
          </div>                  
          <div class="form-group">
            <label for="status" class="col-form-label">Status sebelumnya: <?php echo $x['status'];?> </label>
            <select class="form-control" name="status" id="status" required="">
             <option value="aktif">Aktif</option>
             <option value="cuti">Cuti</option>
           </select>

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

<script>
  Morris.Bar({
    element: 'graph',
    data: <?php echo $prov;?>,
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
</script>