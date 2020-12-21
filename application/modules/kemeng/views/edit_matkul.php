<link rel="stylesheet" href="<?php echo base_url() . 'assets/js/morris.css' ?>">
<div id="content" class="content">
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('d_praja'); ?>">Matkul</a></li>

  </ol>
  <h1 class="page-header">Tambah Mata Kuliah </h1>
  <div class="panel panel-inverse">
    <div class="panel-heading">
      <h4 class="panel-title">

      </h4>

      <div class="panel-heading-btn">
        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-col-xllapse"><i class="fa fa-minus"></i></a>
        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
      </div>
    </div>
    <div class="table-responsive">
      <div class="panel-body">
        <form action="<?php echo base_url(''); ?>" method="POST">
         <div class="col-sm-3">
           <label for="basic-url">Fakultas :</label>
           <select class="form-control" name="fakultas" id="fakultas" >
            <?php foreach ($data as $x) { ?>
            <option value="<?php echo $x->nama_fakultas;?>"><?php echo $x->nama_fakultas;?></option>
               <?php } ?>
           </select>
      
         </div>
         <br>
         <div class="col-sm-3">
           <label for="basic-url">Nama Matakuliah : </label>
           <input type="text" class="form-control" id="matkul" name="matkul" placeholder="Mata Kuliah..">
         </div>
         <br>
         <div class="col-sm-3">
           <label for="basic-url">Sks : </label>
           <input type="text" class="form-control" id="sks" name="sks" placeholder="Jumlah SKS..">
         </div>
         <br>
       <!--   <div class="col-sm-3">
           <label for="basic-url">Semester :</label>
           <select class="form-control" name="semester" id="semester">
            <option value="L">Pilih Semester</option>
            <option value="L">GANJIL</option>
            <option value="P">GENAP</option>
          </select>
        </div> -->
        <br>
         <div class="col-sm-5">
      <button type="submit" class="btn btn-success" value="Cek">Tambah</button>
      <br>
    </div>
      </div>



    </form>
  </div>
</div>



</div>