<link rel="stylesheet" href="<?php echo base_url() . 'assets/js/morris.css' ?>">
<div id="content" class="content">
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('edit_alumni'); ?>">Edit Alumni <?php echo $data[0]->nama ?> </a></li>

  </ol>
  <h1 class="page-header">EDIT ALUMNI <?php echo $data[0]->nama;?> </h1>
  <div class="row">
    <div class="col-xl-12">
      <!-- begin panel -->

      <!-- end panel -->
      <div class="panel panel-inverse">
        <div class="panel-heading">
          <h4 class="panel-title">
            ID : <?php echo $data[0]->id ?>
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
            <form action="<?php echo base_url('d_praja/edit_alumni'); ?>" method="POST">
              <h3> DATA DIRI </h3>
              <br>
              <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $data[0]->id ?>" >

              <div class="row">
               <div class="col-xl">
                <label for="basic-url">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data[0]->nama == NULL ? "-" :$data[0]->nama ?>" >
              </div>
              <div class="col-xl">
                <br>
                <label for="basic-url">Jenis Kelamin</label>
                <select class="form-control" name="jk" id="jk" >
                   <option value="<?php echo $data[0]->jk== NULL ? "-" : $data[0]->jk?>"><?php echo $data[0]->jk == NULL ? "-" : $data[0]->jk?>
                   <option value="L">Laki-Laki</option>
                   <option value="P">Perempuan</option>
                 </select>
                            </div>
              <div class="col-xl">
                <br>
                <label for="basic-url">NPP</label>
                <input type="text" class="form-control"  id="npp" name="npp"  value="<?php echo $data[0]->npp == NULL ? "-" : $data[0]->npp ?>" >
              </div>
              <div class="col-xl">
                <br>
                <label for="basic-url">NIP</label>
                <input type="text" class="form-control"  id="nip" name="nip"  value="<?php echo $data[0]->nip == NULL ? "-" : $data[0]->nip ?>">
              </div>
              <div class="col-xl">
                <br>
                <label for="basic-url">Tempat Lahir</label>
                <input type="text" class="form-control"  id="tempat_lahir" name="tempat_lahir"  value="<?php echo $data[0]->tempat_lahir == NULL ? "-" : $data[0]->tempat_lahir  ?>">
              </div>
              <div class="col-xl">
              <br>
                <label for="basic-url">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $data[0]->tanggal_lahir == NULL ? "-" : $data[0]->tanggal_lahir ?>" >
              </div>
              <div class="col-xl">
                <br>
                <label for="basic-url">Asdaf</label>
                <input type="text" class="form-control"  id="asdaf" name="asdaf" value="<?php echo $data[0]->asdaf == NULL ? "-" : $data[0]->asdaf ?>" >
              </div>
              <div class="col-xl">
                <br>
                <label for="basic-url">Agama</label>
                <input type="text" class="form-control"  id="agama" name="agama"  value="<?php echo $data[0]->agama == NULL ? "-" : $data[0]->agama ?>" >
              </div>
              <div class="col-xl">
                <br>
                <label for="basic-url">Instansi</label>
                <input type="text" class="form-control"  id="instansi" name="instansi"  value="<?php echo $data[0]->instansi == NULL ? "-" : $data[0]->instansi ?>">
              </div>
              <div class="col-xl">
                <br>
                <label for="basic-url">Jabatan</label>
                <input type="text" class="form-control"  id="jabatan" name="jabatan"  value="<?php echo $data[0]->jabatan == NULL ? "-" : $data[0]->jabatan ?>">
              </div>
              <br>
              <br>
              <div class="col-11">
                <br>
                <button type="submit" class="btn btn-warning" value="Cek">Ubah</button>
                <a href="<?php echo base_url('view_alumni'); ?>"><button type="button" class="btn btn-secondary">Kembali</button></a>
              </div>
              <br>
            </form>
            <br>


          </div>
        </div>
        <!-- end panel-body -->
      </div>
      <!-- end panel -->
    </div>
    <!-- end col-xl0 -->
  </div>
</div>

<script src="<?php echo base_url() . 'assets/js/jquery.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/js/raphael-min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/js/morris.min.js' ?>"></script>