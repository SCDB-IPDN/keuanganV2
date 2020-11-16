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

               <div class="col-2">
                <br>
                <label for="basic-url">Tempat Lahir</label>
                <input type="text" class="form-control" value="<?= $x['tmpt_lahir']; ?>" readonly>
              </div>
              <div class="col-2">
               <br>
               <label for="basic-url">Tanggal Lahir</label>
               <input type="date" class="form-control" value="<?= $x['tgl_lahir']; ?>" readonly>
             </div>
             <div class="col-2">
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
             <div class="col-1">
               <br>
               <label for="basic-url">Kode Pos</label>
               <input type="text" class="form-control" value="<?= $x['kode_pos']; ?>" readonly>
             </div>
             <div class="col-2">
               <br>
               <label for="basic-url">Kab/Kota</label>
               <input type="text" class="form-control" value="<?= $x['kab/kota']; ?>" readonly>
             </div>
             <div class="col-2">
               <br>
               <label for="basic-url">Provinsi</label>
               <input type="text" class="form-control" value="<?= $x['provinsi']; ?>" readonly>
             </div>
             <div class="col-2">
               <br>
               <label for="basic-url">Jenis Tinggal</label>
               <input type="text" class="form-control" value="<?= $x['jenis_tinggal']; ?>" readonly>
             </div>
             <div class="col-2">
               <br>
               <label for="basic-url">Alat Transportasi</label>
               <input type="text" class="form-control" value="<?= $x['alat_transport']; ?>" readonly>
             </div>
             <div class="col-2">
               <br>
               <label for="basic-url">TLP Rumah</label>
               <input type="text" class="form-control" value="<?= $x['tlp_rumah']; ?>" readonly>
             </div>
             <div class="col-2">
               <br>
               <label for="basic-url">TLP Pribadi</label>
               <input type="text" class="form-control" value="<?= $x['tlp_pribadi']; ?>" readonly>
             </div>
             <div class="col-3">
               <br>
               <label for="basic-url">Email</label>
               <input type="text" class="form-control" value="<?= $x['email']; ?>" readonly>
             </div>
             <div class="col-1">
               <br>
               <label for="basic-url">Kewarganegaraan</label>
               <input type="text" class="form-control" value="<?= $x['kewarganegaraan']; ?>" readonly>
             </div>
             <div class="col-3">
               <br>
               <label for="basic-url">Email</label>
               <input type="text" class="form-control" value="<?= $x['email']; ?>" readonly>
             </div>
             <div class="col-1">
               <br>
               <label for="basic-url">Penerima PKS</label>
               <input type="text" class="form-control" value="<?= $x['penerima_pks']; ?>" readonly>
             </div>
             <div class="col-3">
               <br>
               <label for="basic-url">No PKS</label>
               <input type="text" class="form-control" value="<?= $x['no_pks']; ?>" readonly>
             </div>
             <div class="col-2">
               <br>
               <label for="basic-url">Kode Prodi</label>
               <input type="text" class="form-control" value="<?= $x['kode_prodi']; ?>" readonly>
             </div>
             <div class="col-2">
               <br>
               <label for="basic-url">Jenis Pendaftaran</label>
               <input type="text" class="form-control" value="<?= $x['jenis_pendaftaran']; ?>" readonly>
             </div>
             <div class="col-2">
               <br>
               <label for="basic-url">Tanggal Masuk Kuliah</label>
               <input type="date" class="form-control" value="<?= $x['tgl_masuk_kuliah']; ?>" readonly>
             </div>
             <div class="col-2">
               <br>
               <label for="basic-url">Pembiayaan</label>
               <input type="text" class="form-control" value="<?= $x['pembiayaan']; ?>" readonly>
             </div>
             <div class="col-2">
               <br>
               <label for="basic-url">Jalur Masuk</label>
               <input type="text" class="form-control" value="<?= $x['jalur_masuk']; ?>" readonly>
             </div>
           </div>
           <br>
           <br>
           <h3> DATA ORANG TUA  </h3>
           <br>
           <div class="row">
            <div class="col-2">
              <label for="basic-url">Nama Ayah</label>
              <input type="text" class="form-control" value="<?= $x['nama_ayah']; ?>" readonly>
            </div>
            <div class="col-2">
             <label for="basic-url">NIK Ayah</label>
             <input type="text" class="form-control" value="<?= $x['nik_ayah']; ?>" readonly>
           </div>
           <div class="col-2">
             <label for="basic-url">Tanggal Lahir Ayah </label>
             <input type="date" class="form-control" value="<?= $x['tgllahir_ayah']; ?>" readonly>
           </div>
           <div class="col-2">
            <label for="basic-url">Pekerjaan Ayah</label>
            <input type="text" class="form-control" value="<?= $x['pekerjaan_ayah']; ?>" readonly>
          </div>
          <div class="col-2">
           <label for="basic-url">Pengahasilan Ayah</label>
           <input type="text" class="form-control" value="<?= $x['penghasilan_ayah']; ?>" readonly>
         </div>
         <div class="col-2">
           <label for="basic-url">No Tlp Ayah</label>
           <input type="text" class="form-control" value="<?= $x['tlp_ayah']; ?>" readonly>
         </div>
         <div class="col-2">
           <br>
           <label for="basic-url">Nama Ibu</label>
           <input type="text" class="form-control" value="<?= $x['nama_ibu']; ?>" readonly>
         </div>
         <div class="col-2">
           <br>
           <label for="basic-url">NIK Ibu</label>
           <input type="text" class="form-control" value="<?= $x['nik_ibu']; ?>" readonly>
         </div>
         <div class="col-2">
           <br>
           <label for="basic-url">Tanggal Lahir Ibu </label>
           <input type="date" class="form-control" value="<?= $x['tgllahir_ibu']; ?>" readonly>
         </div>
         <div class="col-2">
           <br>
           <label for="basic-url">Pekerjaan Ibu</label>
           <input type="text" class="form-control" value="<?= $x['pekerjaan_ibu']; ?>" readonly>
         </div>
         <div class="col-2">
           <br>
           <label for="basic-url">Pengahasilan Ibu</label>
           <input type="text" class="form-control" value="<?= $x['penghasilan_ibu']; ?>" readonly>
         </div>
         <div class="col-2">
           <br>
           <label for="basic-url">No Tlp Ibu</label>
           <input type="text" class="form-control" value="<?= $x['tlp_ibu']; ?>" readonly>
         </div>
       </div>
        <h3> DATA ORANG TUA  </h3>
           <br>
           <div class="row">
            <div class="col-2">
              <label for="basic-url">Nama Ayah</label>
              <input type="text" class="form-control" value="<?= $x['nama_ayah']; ?>" readonly>
            </div>
            <div class="col-2">
             <label for="basic-url">NIK Ayah</label>
             <input type="text" class="form-control" value="<?= $x['nik_ayah']; ?>" readonly>
           </div>
           <div class="col-2">
             <label for="basic-url">Tanggal Lahir Ayah </label>
             <input type="date" class="form-control" value="<?= $x['tgllahir_ayah']; ?>" readonly>
           </div>
           <div class="col-2">
            <label for="basic-url">Pekerjaan Ayah</label>
            <input type="text" class="form-control" value="<?= $x['pekerjaan_ayah']; ?>" readonly>
          </div>
          <div class="col-2">
           <label for="basic-url">Pengahasilan Ayah</label>
           <input type="text" class="form-control" value="<?= $x['penghasilan_ayah']; ?>" readonly>
         </div>
         <div class="col-2">
           <label for="basic-url">No Tlp Ayah</label>
           <input type="text" class="form-control" value="<?= $x['tlp_ayah']; ?>" readonly>
         </div>
         <div class="col-2">
           <br>
           <label for="basic-url">Nama Ibu</label>
           <input type="text" class="form-control" value="<?= $x['nama_ibu']; ?>" readonly>
         </div>
         <div class="col-2">
           <br>
           <label for="basic-url">NIK Ibu</label>
           <input type="text" class="form-control" value="<?= $x['nik_ibu']; ?>" readonly>
         </div>
         <div class="col-2">
           <br>
           <label for="basic-url">Tanggal Lahir Ibu </label>
           <input type="date" class="form-control" value="<?= $x['tgllahir_ibu']; ?>" readonly>
         </div>
         <div class="col-2">
           <br>
           <label for="basic-url">Pekerjaan Ibu</label>
           <input type="text" class="form-control" value="<?= $x['pekerjaan_ibu']; ?>" readonly>
         </div>
         <div class="col-2">
           <br>
           <label for="basic-url">Pengahasilan Ibu</label>
           <input type="text" class="form-control" value="<?= $x['penghasilan_ibu']; ?>" readonly>
         </div>
         <div class="col-2">
           <br>
           <label for="basic-url">No Tlp Ibu</label>
           <input type="text" class="form-control" value="<?= $x['tlp_ibu']; ?>" readonly>
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
<!-- end col-10 -->
</div>
</div>

<script src="<?php echo base_url().'assets/js/jquery.min.js'?>"></script>
<script src="<?php echo base_url().'assets/js/raphael-min.js'?>"></script>
<script src="<?php echo base_url().'assets/js/morris.min.js'?>"></script>
