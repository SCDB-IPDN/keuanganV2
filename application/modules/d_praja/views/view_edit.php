<link rel="stylesheet" href="<?php echo base_url() . 'assets/js/morris.css' ?>">
<div id="content" class="content">
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('d_praja'); ?>">Edit Praja <?php echo $data[0]->nama ?> </a></li>

  </ol>
  <h1 class="page-header">EDIT PRAJA <?php echo $data[0]->nama;?> </h1>
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
            <form action="<?php echo base_url('d_praja/view_edit'); ?>" method="POST">
              <h3> DATA DIRI </h3>
              <br>
              <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $data[0]->id ?>" >

              <div class="row">
               <div class="col-2">
                <label for="basic-url">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data[0]->nama == NULL ? "-" :$data[0]->nama ?>" >
              </div>
              <div class="col-2">
                <label for="basic-url">NIK</label>
                <input type="text" class="form-control"  id="nik_praja" name="nik_praja" value="<?php echo $data[0]->nik_praja == NULL ? "-" : $data[0]->nik_praja ?>" readonly>
              </div>
              <div class="col-2">
                <label for="basic-url">No SPCP</label>
                <input type="text" class="form-control" id="no_spcp" name="no_spcp" value="<?php echo  $data[0]->no_spcp == NULL ? "-" : $data[0]->no_spcp ?>" readonly>
              </div>
              <div class="col-2">
                <label for="basic-url">NISN</label>
                <input type="text" class="form-control" id="nisn" name="nisn" value="<?php echo $data[0]->nisn == NULL ? "-" : $data[0]->nisn ?>" readonly>
              </div>

              <div class="col-2">
                <label for="basic-url">Tempat Lahir</label>
                <input type="text" class="form-control" id="tmpt_lahir" name="tmpt_lahir" value="<?php echo $data[0]->tmpt_lahir == NULL ? "-" : $data[0]->tmpt_lahir ?>" readonly>
              </div>
              <div class="col-2">
                <label for="basic-url">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?php echo $data[0]->tgl_lahir == NULL ? "-" : $data[0]->tgl_lahir ?>" readonly>
              </div>
              <div class="col-2">
                <br>
                <label for="basic-url">Agama</label>
                <input type="text" class="form-control"  id="agama" name="agama"  value="<?php echo $data[0]->agama == NULL ? "-" : $data[0]->agama ?>" readonly>
              </div>
              <div class="col-4">
                <br>
                <label for="basic-url">Alamat</label>
                <input type="text" class="form-control"  id="alamat" name="alamat"  value="<?php echo $data[0]->alamat == NULL ? "-" : $data[0]->alamat ?>">
              </div>
              <div class="col-1">
                <br>
                <label for="basic-url">RT</label>
                <input type="text" class="form-control"  id="rt" name="rt"  value="<?php echo $data[0]->rt == NULL ? "-" : $data[0]->rt  ?>">
              </div>
              <div class="col-1">
                <br>
                <label for="basic-url">RW</label>
                <input type="text" class="form-control"  id="rw" name="rw" value="<?php echo $data[0]->rw == NULL ? "-" : $data[0]->rw ?>" >
              </div>
              <div class="col-2">
                <br>
                <label for="basic-url">Nama Dusun</label>
                <input type="text" class="form-control"  id="nama_dusun" name="nama_dusun"  value="<?php echo $data[0]->nama_dusun == NULL ? "-" : $data[0]->nama_dusun ?>">
              </div>
              <div class="col-2">
                <br>
                <label for="basic-url">Kelurahan</label>
                <input type="text" class="form-control"  id="kelurahan" name="kelurahan"  value="<?php echo $data[0]->kelurahan == NULL ? "-" : $data[0]->kelurahan ?>">
              </div>
              <div class="col-2">
                <br>
                <label for="basic-url">Kecamatan</label>
                <input type="text" class="form-control"  id="kecamatan" name="kecamatan"  value="<?php echo $data[0]->kecamatan == NULL ? "-" : $data[0]->kecamatan ?>">
              </div>
              <div class="col-1">
                <br>
                <label for="basic-url">Kode Pos</label>
                <input type="text" class="form-control"  id="kode_pos" name="kode_pos"  value="<?php echo $data[0]->kode_pos == NULL ? "-" : $data[0]->kode_pos ?>">
              </div>
              <div class="col-1">
                <br>
                <label for="basic-url">Kab/Kota</label>
                <input type="text" class="form-control"  id="kab_kota" name="kab_kota"  value="<?php echo $data[0]->kab_kota == NULL ? "-" : $data[0]->kab_kota ?>">
              </div>
              <div class="col-2">
                <br>
                <label for="basic-url">Provinsi</label>
                <input type="text" class="form-control"  id="Provinsi" name="provinsi"  value="<?php echo $data[0]->provinsi == NULL ? "-" :  $data[0]->provinsi ?>">
              </div>
              <div class="col-2">
                <br>
                <label for="basic-url">Jenis Tinggal</label>
                <input type="text" class="form-control"  id="jenis_tinggal" name="jenis_tinggal"  value="<?php echo $data[0]->jenis_tinggal == NULL ? "-" : $data[0]->jenis_tinggal ?>" readonly>
              </div>
              <div class="col-1">
                <br>
                <label for="basic-url">Alat Transportasi</label>
                <input type="text" class="form-control"   id="alat_transport" name="alat_transport"  value="<?php echo $data[0]->alat_transport == NULL ? "-" : $data[0]->alat_transport ?>" readonly>
              </div>
              <div class="col-1">
                <br>
                <label for="basic-url">TLP Rumah</label>
                <input type="text" class="form-control"  id="tlp_rumah" name="tlp_rumah"  value="<?php echo $data[0]->tlp_rumah == NULL ? "-" : $data[0]->tlp_rumah ?>">
              </div>
              <div class="col-1">
                <br>
                <label for="basic-url">TLP Pribadi</label>
                <input type="text" class="form-control"  id="tlp_pribadi" name="tlp_pribadi" value="<?php echo $data[0]->tlp_pribadi == NULL ? "-" : $data[0]->tlp_pribadi ?>">
              </div>
              <div class="col-3">
                <br>
                <label for="basic-url">Email</label>
                <input type="text" class="form-control"  id="email" name="email" value="<?php echo $data[0]->email == NULL ? "-" : $data[0]->email ?>">
              </div>
              <div class="col-1">
                <br>
                <label for="basic-url">Kewarganegaraan</label>
                <input type="text" class="form-control"  id="kewarganegaraan" name="kewarganegaraan"  value="<?php echo $data[0]->kewarganegaraan == NULL ? "-" : $data[0]->kewarganegaraan ?>" readonly>
              </div>
              <div class="col-1">
                <br>
                <label for="basic-url">Penerima PKS</label>
                <input type="text" class="form-control"  id="penerima_pks" name="penerima_pks"  value="<?php echo $data[0]->penerima_pks == NULL ? "-" : $data[0]->penerima_pks ?>" readonly>
              </div>
              <div class="col-2">
                <br>
                <label for="basic-url">No PKS</label>
                <input type="text" class="form-control"  id="no_pks" name="no_pks" value="<?php echo $data[0]->no_pks == NULL ? "-" : $data[0]->no_pks ?>" >
              </div>
              <div class="col-2">
                <br>
                <label for="basic-url">Kode Prodi</label>
                <input type="text" class="form-control" id="kode_prodi" name="no_pks"  value="<?php echo  $data[0]->kode_prodi == NULL ? "-" : $data[0]->kode_prodi ?>" >
              </div>
              <div class="col-2">
                <br>
                <label for="basic-url">Jenis Pendaftaran</label>
                <input type="text" class="form-control"  id="jenis_pendaftaran" name="jenis_pendaftaran" value="<?php echo $data[0]->jenis_pendaftaran == NULL ? "-" : $data[0]->jenis_pendaftaran ?>" readonly>
              </div>
              <div class="col-2">
                <br>
                <label for="basic-url">Tanggal Masuk Kuliah</label>
                <input type="date" class="form-control"  id="tgl_masuk_kuliah" name="tgl_masuk_kuliah" value="<?php echo $data[0]->tgl_masuk_kuliah == NULL ? "-" : $data[0]->tgl_masuk_kuliah ?>" readonly>
              </div>
              <div class="col-2">
                <br>
                <label for="basic-url">Tahun Masuk Kuliah</label>
                <input type="text" class="form-control"  id="tahun_masuk_kuliah" name="tahun_masuk_kuliah"  value="<?php echo $data[0]->tahun_masuk_kuliah == NULL ? "-" : $data[0]->tahun_masuk_kuliah ?>" readonly>
              </div>
              <div class="col-2">
                <br>
                <label for="basic-url">Pembiayaan</label>
                <input type="text" class="form-control"  id="pembiayaan" name="pembiayaan"  value="<?php echo $data[0]->pembiayaan == NULL ? "-" : $data[0]->pembiayaan ?>" readonly>
              </div>
              <div class="col-2">
                <br>
                <label for="basic-url">Jalur Masuk</label>
                <input type="text" class="form-control"  id="jalur_masuk" name="jalur_masuk"  value="<?php echo $data[0]->jalur_masuk == NULL ? "-" : $data[0]->jalur_masuk ?>" readonly>
              </div>
              <div class="col-1">
                <br>
                <label for="basic-url">Tingkat</label>
                <input type="text" class="form-control"  id="tingkat" name="tingkat"  value="<?php echo $data[0]->tingkat == NULL ? "-" : $data[0]->tingkat ?>" readonly>
              </div>
              <div class="col-1">
                <br>
                <label for="basic-url">Angkatan</label>
                <input type="text" class="form-control" id="angkatan" name="angkatan"   value="<?php echo $data[0]->angkatan == NULL ? "-" : $data[0]->angkatan ?>" readonly>
              </div>
              <div class="col-1">
                <br>
                <label for="basic-url">Status</label>
                <input type="text" class="form-control" id="status" name="status"   value="<?php echo $data[0]->angkatan == NULL ? "-" : $data[0]->angkatan ?>" readonly>
              </div>
            </div>
            <br>
            <br>
            <h3> DATA ORANG TUA </h3>
            <br>
            <div class="row">
              <div class="col-2">
               <input type="hidden" class="form-control" id="id_ortu" name="id_ortu" value="<?php echo $data[0]->id_ortu ?>" >
               <input type="hidden" class="form-control" id="nik_praja" name="nik_praja" value="<?php echo $data[0]->nik_praja ?>" >
               <input type="hidden" class="form-control" id="nama" name="nama" value="<?php echo $data[0]->nama ?>" >
               <label for="basic-url">Nama Ayah</label>
               <input type="text" class="form-control" id="nama_ayah" name="nama_ayah"   value="<?php echo $data[0]->nama_ayah == NULL ? "-" : $data[0]->nama_ayah ?>" >
             </div>
             <div class="col-2">
              <label for="basic-url">NIK Ayah</label>
              <input type="text" class="form-control" id="nik_ayah" name="nik_ayah" value="<?php echo $data[0]->nik_ayah == NULL ? "-" : $data[0]->nik_ayah ?>" >
            </div>
            <div class="col-2">
              <label for="basic-url">Tanggal Lahir Ayah </label>
              <input type="date" class="form-control" id="tgllahir_ayah" name="tgllahir_ayah" value="<?php echo $data[0]->tgllahir_ayah == NULL ? "-" : $data[0]->tgllahir_ayah ?>" >
            </div>
            <div class="col-2">
              <label for="basic-url">Pekerjaan Ayah</label>
              <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" value="<?php echo $data[0]->pekerjaan_ayah == NULL ? "-" : $data[0]->pekerjaan_ayah ?>" >
            </div>
            <div class="col-2">
              <label for="basic-url">Pengahasilan Ayah</label>
              <!-- <input type="text" class="form-control" value="<?php echo $data[0]->penghasilan_ayah == NULL ? "-" : $data[0]->penghasilan_ayah ?>" readonly> -->
              <select class="form-control" name="penghasilan_ayah" id="penghasilan_ayah" >
               <option value="<?php echo $data[0]->penghasilan_ayah == NULL ? "-" : $data[0]->penghasilan_ayah ?>"><?php echo $data[0]->penghasilan_ayah == NULL ? "-" : $data[0]->penghasilan_ayah ?>
               <option value="kurang dari Rp. 500.000">kurang dari Rp. 500.000</option>
               <option value="Rp. 500.000 s/d Rp. 999.999">Rp. 500.000 s/d Rp. 999.999</option>
               <option value="Rp. 1.000.000 s/d Rp. 1.999.999">Rp. 1.000.000 s/d Rp. 1.999.999</option>
               <option value="Rp. 2.000.000 s/d Rp. 4.999.999">Rp. 2.000.000 s/d Rp. 4.999.999</option>
               <option value="Rp. 5.000.000 s/d Rp. 7.499.999">Rp. 5.000.000 s/d Rp. 7.499.999</option>
               <option value="Rp. 7.500.000 s/d Rp. 9.999.999">Rp. 7.500.000 s/d Rp. 9.999.999</option>
               <option value="Lebih dari Rp. 10.000.000">Lebih dari Rp. 10.000.000</option>
             </select>
           </div>
           <div class="col-1">
            <label for="basic-url">No Tlp Ayah</label>
            <input type="text" class="form-control" id="tlp_ayah" name="tlp_ayah" value="<?php echo $data[0]->tlp_ayah == NULL ? "-" : $data[0]->tlp_ayah ?>" >
          </div>
          <div class="col-2">
            <br>
            <label for="basic-url">Nama Ibu</label>
            <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="<?php echo $data[0]->nama_ibu == NULL ? "-" : $data[0]->nama_ibu ?>" >
          </div>
          <div class="col-2">
            <br>
            <label for="basic-url">NIK Ibu</label>
            <input type="text" class="form-control" id="nik_ibu" name="nik_ibu" value="<?php echo $data[0]->nik_ibu == NULL ? "-" : $data[0]->nik_ibu ?>" >
          </div>
          <div class="col-2">
            <br>
            <label for="basic-url">Tanggal Lahir Ibu </label>
            <input type="date" class="form-control" id="tgllahir_ibu" name="tgllahir_ibu" value="<?php echo $data[0]->tgllahir_ibu == NULL ? "-" : $data[0]->tgllahir_ibu ?>" >
          </div>
          <div class="col-2">
            <br>
            <label for="basic-url">Pekerjaan Ibu</label>
            <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" value="<?php echo $data[0]->pekerjaan_ibu == NULL ? "-" : $data[0]->pekerjaan_ibu ?>" >
          </div>
          <div class="col-2">
            <br>
            <label for="basic-url">Pengahasilan Ibu</label>
                  <!-- <input type="text" class="form-control" value="<?php echo $data[0]->penghasilan_ibu == NULL ? "-" :  $data[0]->penghasilan_ibu ?>" >
                  -->       
                  <select class="form-control" name="penghasilan_ayah" id="penghasilan_ibu" >
                   <option value="<?php echo $data[0]->penghasilan_ibu== NULL ? "-" : $data[0]->penghasilan_ibu?>"><?php echo $data[0]->penghasilan_ibu == NULL ? "-" : $data[0]->penghasilan_ibu?>
                   <option value="kurang dari Rp. 500.000">kurang dari Rp. 500.000</option>
                   <option value="Rp. 500.000 s/d Rp. 999.999">Rp. 500.000 s/d Rp. 999.999</option>
                   <option value="Rp. 1.000.000 s/d Rp. 1.999.999">Rp. 1.000.000 s/d Rp. 1.999.999</option>
                   <option value="Rp. 2.000.000 s/d Rp. 4.999.999">Rp. 2.000.000 s/d Rp. 4.999.999</option>
                   <option value="Rp. 5.000.000 s/d Rp. 7.499.999">Rp. 5.000.000 s/d Rp. 7.499.999</option>
                   <option value="Rp. 7.500.000 s/d Rp. 9.999.999">Rp. 7.500.000 s/d Rp. 9.999.999</option>
                   <option value="Lebih dari Rp. 10.000.000">Lebih dari Rp. 10.000.000</option>
                 </select>
               </div>
               <div class="col-1">
                <br>
                <label for="basic-url">No Tlp Ibu</label>
                <input type="text" class="form-control" id="tlp_ibu" name="tlp_ibu" value="<?php echo $data[0]->tlp_ibu == NULL ? "-" :  $data[0]->tlp_ibu ?>" >
              </div>

            </div>
            <br>
            <br>
            <h3> DATA WALI </h3>
            <br>
            <div class="row">
              <div class="col-2">
                <input type="hidden" class="form-control" id="id_wali" name="id_wali" value="<?php echo $data[0]->id_wali ?>" >
                <input type="hidden" class="form-control" id="nik_praja" name="nik_praja" value="<?php echo $data[0]->nik_praja ?>" >
                <input type="hidden" class="form-control" id="nama" name="nama" value="<?php echo $data[0]->nama ?>" >
                <label for="basic-url">Nama Wali</label>
                <input type="text" class="form-control" id="nama_wali" name="nama_wali"  value="<?php echo $data[0]->nama_wali == NULL ? "-" : $data[0]->nama_wali ?>" >
              </div>
              <div class="col-2">
                <label for="basic-url">NIK Wali</label>
                <input type="text" class="form-control" id="nik_wali" name="nik_wali" value="<?php echo $data[0]->nik_wali == NULL ? "-" :  $data[0]->nik_wali ?>" >
              </div>
              <div class="col-2">
                <label for="basic-url">Tanggal Lahir Wali </label>
                <input type="date" class="form-control" id="tgllahir_wali" name="tgllahir_wali" value="<?php echo $data[0]->tgllahir_wali == NULL ? "-" : $data[0]->tgllahir_wali ?>" >
              </div>
              <div class="col-2">
                <label for="basic-url">Pendidikan Wali</label>
                <input type="text" class="form-control" id="pendidikan_wali" name="pendidikan_wali" value="<?php echo $data[0]->pendidikan_wali == NULL ? "-" :  $data[0]->pendidikan_wali ?>" >
              </div>
              <div class="col-2">
                <label for="basic-url">Pekerjaan Wali</label>
                <input type="text" class="form-control" id="pekerjaan_wali" name="pekerjaan_wali" value="<?php echo $data[0]->pekerjaan_wali == NULL ? "-" : $data[0]->pekerjaan_wali ?>" >
              </div>
              <div class="col-2">
                <label for="basic-url">Pengahasilan Wali</label>
                <input type="text" class="form-control" id="penghasilan_wali" name="penghasilan_wali" value="<?php echo $data[0]->penghasilan_wali == NULL ? "-" :  $data[0]->penghasilan_wali ?>" >
              </div>
              <div class="col-2">
                <br>
                <label for="basic-url">No Tlp Wali</label>
                <input type="text" class="form-control" id="tlp_wali" name="tlp_wali" value="<?php echo $data[0]->tlp_wali == NULL ? "-" : $data[0]->tlp_wali ?>" >
              </div>
              <br>
              <br>
              <div class="col-11">
                <br>

                <button type="submit" class="btn btn-warning" value="Cek">Ubah</button>
                <a href="<?php echo base_url('d_praja'); ?>"><button type="button" class="btn btn-secondary">Kembali</button></a>
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
    <!-- end col-10 -->
  </div>
</div>

<script src="<?php echo base_url() . 'assets/js/jquery.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/js/raphael-min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/js/morris.min.js' ?>"></script>