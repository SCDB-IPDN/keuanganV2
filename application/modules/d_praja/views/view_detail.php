<link rel="stylesheet" href="<?php echo base_url().'assets/js/morris.css'?>">
<div id="content" class="content">
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="<?php echo base_url('home');?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('d_praja');?>">Detail Praja </a></li>
    
  </ol>
  <h1 class="page-header">DETAIL PRAJA</h1>
  <div class="row">
    <div class="col-xl-12">
      <!-- begin panel -->

      <!-- end panel -->
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


            <?php foreach (json_decode($data, true) as $x): ?>
             <form>
              <h3> DATA DIRI  </h3>
              <br>
              <h6> Nama : <?= $x['nama']; ?>  </h6>
              <div class="row">
                <div class="col-4">

                  <label for="basic-url">NIK</label>
                  <input type="text" class="form-control" value="<?= $x['nik_praja']; ?>" readonly>
                </div>
                <div class="col-4">
                 <label for="basic-url">No SPCP</label>
                 <input type="text" class="form-control" value="<?= $x['no_spcp']; ?>" readonly>
               </div>
               <div class="col-4">
                 <label for="basic-url">NISN</label>
                 <input type="text" class="form-control" value="<?= $x['nisn']; ?>" readonly>
               </div>

               <div class="col-4">
                <br>
                <label for="basic-url">Tempat Lahir</label>
                <input type="text" class="form-control" value="<?= $x['tmpt_lahir']; ?>" readonly>
              </div>
              <div class="col-4">
               <br>
               <label for="basic-url">Tanggal Lahir</label>
               <input type="date" class="form-control" value="<?= $x['tgl_lahir']; ?>" readonly>
             </div>
             <div class="col-4">
               <br>
               <label for="basic-url">Agama</label>
               <input type="text" class="form-control" value="<?= $x['agama']; ?>" readonly>
             </div>
             <div class="col-4">
               <br>
               <label for="basic-url">Alamat</label>
               <input type="text" class="form-control" value="<?= $x['alamat']; ?>" readonly>
             </div>
              <div class="col-1">
               <br>
               <label for="basic-url">RT</label>
               <input type="text" class="form-control" value="<?= $x['rt']; ?>" readonly>
             </div>
              <div class="col-1">
               <br>
               <label for="basic-url">RW</label>
               <input type="text" class="form-control" value="<?= $x['rw']; ?>" readonly>
             </div>
              <div class="col-2">
               <br>
               <label for="basic-url">Nama Dusun</label>
               <input type="text" class="form-control" value="<?= $x['nama_dusun']; ?>" readonly>
             </div>
              <div class="col-2">
               <br>
               <label for="basic-url">Kelurahan</label>
               <input type="text" class="form-control" value="<?= $x['kelurahan']; ?>" readonly>
             </div>
              <div class="col-2">
               <br>
               <label for="basic-url">Kecamatan</label>
               <input type="text" class="form-control" value="<?= $x['kecamatan']; ?>" readonly>
             </div>


           </div>
           <br>
         </form>

       <?php endforeach; ?>
       <br>
       <table id="data-table-buttons" class="table table-striped table-bordered table-td-valign-middle">

        <thead>
          <tr>

            <th>No</th>
            <TH>NIK</TH>
            <th>NO SPCP</th>
            <th>NISN</th>
            <th>NPWP</th>

          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php foreach (json_decode($data, true) as $x): ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?= $x['nik_praja']; ?></td>
              <td><?= $x['no_spcp'];?></td>
              <td><?= $x['nisn'];?></td>
              <td><?= $x['npwp'];?></td> 
              <!-- <td><a href='' class='btn btn-primary mr-1' btn-sm><i class='fa fa-eye'></i></a></td> -->
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
