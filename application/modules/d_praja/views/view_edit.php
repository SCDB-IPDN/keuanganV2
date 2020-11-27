<link rel="stylesheet" href="<?php echo base_url().'assets/js/morris.css'?>">
<div id="content" class="content">
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="<?php echo base_url('home');?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('d_praja');?>">Edit Praja </a></li>
    
  </ol>
  <h1 class="page-header">EDIT PRAJA</h1>
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
         <?php if($this->session->flashdata('praja') != NULL){ ?>
          <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Notif!</strong> <?php echo $this->session->flashdata('praja') ?>
          </div>
        <?php } ?>
          <div class="panel-body">


            <?php foreach (json_decode($data, true) as $x): ?>
             <form action="d_praja/edit_praja" method="post">
              <h3> DATA DIRI  </h3>
              <br>
              <h5> Nama : <?= $x['nama']; ?>  </h5>
              <div class="row" id="editpraja">
                <div class="col-2">
                  <label for="basic-url">NIK</label>
                  <input type="text" class="form-control" value="<?php echo $x['nik_praja'];?>" placeholder= "Nomer Induk Kependudukan"  required>
                </div>
                <div class="col-2">
                 <label for="basic-url">No SPCP</label>
                 <input type="text" class="form-control" value="<?= $x['no_spcp'] == NULL ? "-" : $x['no_spcp'] ?>" readonly>
               </div>
               <div class="col-2">
                 <label for="basic-url">NISN</label>
                 <input type="text" class="form-control" value="<?= $x['nisn'] == NULL ? "-" : $x['nisn'] ?>" readonly>
               </div>

               <div class="col-2">
                <label for="basic-url">Tempat Lahir</label>
                <input type="text" class="form-control" value="<?= $x['tmpt_lahir'] == NULL ? "-" : $x['tmpt_lahir'] ?>" readonly>
              </div>
              <div class="col-2">
               <label for="basic-url">Tanggal Lahir</label>
               <input type="date" class="form-control" value="<?= $x['tgl_lahir'] == NULL ? "-" : $x['tgl_lahir'] ?>" readonly>
             </div>
             <div class="col-2">
               <label for="basic-url">Agama</label>
               <input type="text" class="form-control" value="<?= $x['agama'] == NULL ? "-" : $x['agama'] ?>" readonly>
             </div>
             <div class="col-4">
               <br>
               <label for="basic-url">Alamat</label>
               <input type="text" class="form-control" value="<?php echo $x['alamat'];?>" placeholder= "Alamat"  required>
             </div>
             <div class="col-1">
               <br>
               <label for="basic-url">RT</label>
               <input type="text" class="form-control" value="<?php echo $x['rt'];?>" placeholder= "RT"  required>
             </div>
             <div class="col-1">
               <br>
               <label for="basic-url">RW</label>
               <input type="text" class="form-control" value="<?php echo $x['rw'];?>" placeholder= "RW"  required>
             </div>
             <div class="col-2">
               <br>
               <label for="basic-url">Nama Dusun</label>
               <input type="text" class="form-control" value="<?php echo $x['nama_dusun'];?>" placeholder= "Nama Dusun"  required>
             </div>
             <div class="col-2">
               <br>
               <label for="basic-url">Kelurahan</label>
               <input type="text" class="form-control" value="<?php echo $x['kelurahan'];?>" placeholder= "Kelurahan"  required>
             </div>
             <div class="col-2">
               <br>
               <label for="basic-url">Kecamatan</label>
               <input type="text" class="form-control" value="<?php echo $x['kecamatan'];?>" placeholder="Kecamatan.." required>
             </div>
             <div class="col-1">
               <br>
               <label for="basic-url">Kode Pos</label>
               <input type="text" class="form-control" value="<?php echo $x['kode_pos'];?>" placeholder="Kode Pos.." required>
             </div>
             <div class="col-1">
               <br>
               <label for="basic-url">Kab/Kota</label>
               <input type="text" class="form-control" value="<?php echo $x['kab/kota'];?>" placeholder="Kabupaten/Kota.." required>
             </div>
             <div class="col-2">
               <br>
               <label for="basic-url">Provinsi</label>
               <input type="text" class="form-control" value="<?= $x['provinsi'] == NULL ? "-" : $x['provinsi'] ?>"readonly>
             </div>
             <div class="col-2">
               <br>
               <label for="basic-url">Jenis Tinggal</label>
               <input type="text" class="form-control" value="<?= $x['jenis_tinggal'] == NULL ? "-" : $x['jenis_tinggal'] ?>" readonly>
             </div>
             <div class="col-1">
               <br>
               <label for="basic-url">Alat Transportasi</label>
               <input type="text" class="form-control" value="<?= $x['alat_transport'] == NULL ? "-" : $x['alat_transport'] ?>" readonly>
             </div>
             <div class="col-1">
               <br>
               <label for="basic-url">TLP Rumah</label>
               <input type="text" class="form-control" value="<?= $x['tlp_rumah'] == NULL ? "-" : $x['tlp_rumah'] ?>" readonly>
             </div>
             <div class="col-1">
               <br>
               <label for="basic-url">TLP Pribadi</label>
               <input type="text" class="form-control" value="<?php echo $x['tlp_pribadi'];?>" placeholder="Telepon Pribadi.." required>
             </div>
             <div class="col-3">
               <br>
               <label for="basic-url">Email</label>
               <input type="text" class="form-control" value="<?php echo $x['email'];?>" placeholder= "Isi Email Terbaru...."  required>
             </div>
             <div class="col-1">
               <br>
               <label for="basic-url">Kewarganegaraan</label>
               <input type="text" class="form-control" value="<?= $x['kewarganegaraan'] == NULL ? "-" : $x['kewarganegaraan'] ?>" readonly>
             </div>
             <div class="col-1">
               <br>
               <label for="basic-url">Penerima PKS</label>
               <input type="text" class="form-control" value="<?= $x['kode_prodi'] == NULL ? "-" : $x['kode_prodi'] ?>" readonly>
             </div>
             <div class="col-2">
               <br>
               <label for="basic-url">No PKS</label>
               <input type="text" class="form-control" value="<?= $x['no_pks'] == NULL ? "-" : $x['no_pks'] ?>" readonly>
             </div>
             <div class="col-2">
               <br>
               <label for="basic-url">Kode Prodi</label>
               <input type="text" class="form-control" value="<?= $x['kode_prodi'] == NULL ? "-" : $x['kode_prodi'] ?>" readonly>
             </div>
             <div class="col-2">
               <br>
               <label for="basic-url">Jenis Pendaftaran</label>
               <input type="text" class="form-control" value="<?= $x['jenis_pendaftaran'] == NULL ? "-" : $x['jenis_pendaftaran'] ?>" readonly>
             </div>
             <div class="col-2">
               <br>
               <label for="basic-url">Tanggal Masuk Kuliah</label>
               <input type="date" class="form-control" value="<?= $x['tgl_masuk_kuliah'] == NULL ? "-" : $x['tgl_masuk_kuliah'] ?>" readonly>
             </div>
             <div class="col-1">
               <br>
               <label for="basic-url">Tahun Masuk Kuliah</label>
               <input type="text" class="form-control" value="<?= $x['tahun_masuk_kuliah'] == NULL ? "-" : $x['tahun_masuk_kuliah'] ?>" readonly>
             </div>
             <div class="col-2">
               <br>
               <label for="basic-url">Pembiayaan</label>
               <input type="text" class="form-control" value="<?= $x['pembiayaan'] == NULL ? "-" : $x['pembiayaan'] ?>"readonly>
             </div>
             <div class="col-2">
               <br>
               <label for="basic-url">Jalur Masuk</label>
               <input type="text" class="form-control" value="<?= $x['jalur_masuk'] == NULL ? "-" : $x['jalur_masuk'] ?>" readonly>
             </div>
             <div class="form-group">
             <br>
            <label for="status" class="col-form-label">Status
            <select class="form-control" name="status" id="status" required="">
             <option value="aktif">Aktif</option>
             <option value="cuti">Cuti</option>
           </select>

         </div>
           </div>
           <br>
           <br>
           <h3> DATA ORANG TUA  </h3>
           <br>
           <div class="row">
            <div class="col-2">
              <label for="basic-url">Nama Ayah</label>
              <input type="text" class="form-control" value="<?= $x['nama_ayah'] == NULL ? "-" : $x['nama_ayah'] ?>" readonly>
            </div>
            <div class="col-2">
             <label for="basic-url">NIK Ayah</label>
             <input type="text" class="form-control" value="<?= $x['nik_ayah'] == NULL ? "-" : $x['nik_ayah'] ?>"readonly>
           </div>
           <div class="col-2">
             <label for="basic-url">Tanggal Lahir Ayah </label>
             <input type="date" class="form-control" value="<?= $x['tgllahir_ayah'] == NULL ? "-" : $x['tgllahir_ayah'] ?>" readonly>
           </div>
           <div class="col-2">
            <label for="basic-url">Pekerjaan Ayah</label>
            <input type="text" class="form-control" value="<?= $x['pekerjaan_ayah'] == NULL ? "-" : $x['pekerjaan_ayah'] ?>" readonly>
          </div>
          <div class="col-2">
           <label for="basic-url">Pengahasilan Ayah</label>
           <input type="text" class="form-control" value="<?= $x['penghasilan_ayah'] == NULL ? "-" : $x['penghasilan_ayah'] ?>" readonly>
         </div>
         <div class="col-1">
           <label for="basic-url">No Tlp Ayah</label>
           <input type="text" class="form-control" value="<?= $x['tlp_ayah'] == NULL ? "-" : $x['tlp_ayah'] ?>" readonly>
         </div>
         <div class="col-2">
           <br>
           <label for="basic-url">Nama Ibu</label>
           <input type="text" class="form-control" value="<?= $x['nama_ibu'] == NULL ? "-" : $x['nama_ibu'] ?>" readonly>
         </div>
         <div class="col-2">
           <br>
           <label for="basic-url">NIK Ibu</label>
           <input type="text" class="form-control" value="<?= $x['nik_ibu'] == NULL ? "-" : $x['nik_ibu'] ?>" readonly>
         </div>
         <div class="col-2">
           <br>
           <label for="basic-url">Tanggal Lahir Ibu </label>
           <input type="date" class="form-control"  value="<?= $x['tgllahir_ibu'] == NULL ? "-" : $x['tgllahir_ibu'] ?>" readonly>
         </div>
         <div class="col-2">
           <br>
           <label for="basic-url">Pekerjaan Ibu</label>
           <input type="text" class="form-control" value="<?= $x['pekerjaan_ibu'] == NULL ? "-" : $x['pekerjaan_ibu'] ?>" readonly>
         </div>
         <div class="col-2">
           <br>
           <label for="basic-url">Pengahasilan Ibu</label>
           <input type="text" class="form-control" value="<?= $x['penghasilan_ibu'] == NULL ? "-" : $x['penghasilan_ibu'] ?>" readonly>
         </div>
         <div class="col-1">
           <br>
           <label for="basic-url">No Tlp Ibu</label>
           <input type="text" class="form-control" value="<?= $x['tlp_ibu'] == NULL ? "-" : $x['tlp_ibu'] ?>" readonly>
         </div>
       </div>
       <br>
       <br>
       <h3> DATA WALI  </h3>
       <br>
       <div class="row">
        <div class="col-2">
          <label for="basic-url">Nama Wali</label>
          <input type="text" class="form-control" value="<?= $x['nama_wali'] == NULL ? "-" : $x['nama_wali'] ?>" readonly>
        </div>
        <div class="col-2">
         <label for="basic-url">NIK Wali</label>
         <input type="text" class="form-control" value="<?= $x['nik_wali'] == NULL ? "-" : $x['nik_wali'] ?>" readonly>
       </div>
       <div class="col-2">
         <label for="basic-url">Tanggal Lahir Wali </label>
         <input type="date" class="form-control" value="<?= $x['tgllahir_wali'] == NULL ? "-" : $x['tgllahir_wali'] ?>" readonly>
       </div>
       <div class="col-2">
        <label for="basic-url">Pendidikan Wali</label>
        <input type="text" class="form-control" value="<?= $x['pendidikan_wali'] == NULL ? "-" : $x['pendidikan_wali'] ?>" readonly>
      </div>
      <div class="col-2">
        <label for="basic-url">Pekerjaan Wali</label>
        <input type="text" class="form-control" value="<?= $x['pekerjaan_wali'] == NULL ? "-" : $x['pekerjaan_wali'] ?>" readonly>
      </div>
      <div class="col-2">
       <label for="basic-url">Pengahasilan Wali</label>
       <input type="text" class="form-control" value="<?= $x['penghasilan_wali'] == NULL ? "-" : $x['penghasilan_wali'] ?>" readonly>
     </div>
     <div class="col-2">
      <br>
       <label for="basic-url">No Tlp Wali</label>
       <input type="text" class="form-control" value="<?= $x['tlp_wali'] == NULL ? "-" : $x['tlp_wali'] ?>" readonly>
     </div>
     <br>
   </form>

 <?php endforeach; ?>
 
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary" value="Cek">Ubah</button>
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
