<div id="content" class="content">
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('praja'); ?>">Praja</a></li>
  </ol>
  <h1 class="page-header">Data Keprajaan</h1>
  <div class="row">
    <div class="col-xl-12">
      <div class="panel panel-inverse">
        <div class="panel-heading">
          <h4 class="panel-title"></h4>
          <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
          </div>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <h4 class="text-center">Jumlah Praja Di Setiap Provinsi</h4>

            <!-- <div id="graph" class="height-sm width-xl"></div> -->
            <canvas id="myChart" height="70"></canvas>
          </div>
        </div>
      </div>
      <div class="panel panel-inverse">
        <div class="panel-heading">
          <h4 class="panel-title">
            <span><a href="<?php echo base_url('praja/editstatus'); ?>" class="btn btn-sm btn-warning">STATUS PRAJA</a></span>
          </h4>
          <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
          </div>
        </div>

        <div class="table-responsive">
          <br>

          <?php if ($this->session->flashdata('praja') != NULL) { ?>
            <div class="alert alert-success alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Notif!</strong> <?php echo $this->session->flashdata('praja') ?>
            </div>
          <?php } ?>
          <div class="panel-body">
            <tbody>
              <tr>
                <td>

                  <select name="filter" id="filter_angkatan" class="form-control col-sm-2 mb-3"></select>
                  <select name="filter" id="filter_prod" class="form-control col-sm-2 mb-3"></select>
                  <!-- <button type="button" id="export" class="btn btn-info">Export Data</button> -->
                </td>
              </tr>
            </tbody>
            <table id="data-praja" class="table table-striped table-bordered table-td-valign-middle" width="100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Opsi</th>
                  <th>NPP</th>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
                  <th>Tingkat</th>
                  <th>Angkatan</th>
                  <th>Status</th>
                  <th>Penempatan</th>
                  <th>Fakultas</th>
                  <th>Prodi</th>
                  <th>Tempat Lahir</th>
                  <th>Tanggal Lahir</th>
                  <th>NISN</th>
                  <th>NPWP</th>
                  <th>No SPCP</th>
                  <th>NIK</th>
                  <th>Agana</th>
                  <th>Alamat</th>
                  <th>RT</th>
                  <th>RW</th>
                  <th>Provinsi</th>
                  <th>Kab/Kota</th>
                  <th>Kelurahan</th>
                  <th>Nama Dusun</th>
                  <th>Kecamatan</th>
                  <th>Kode Pos</th>
                  <th>Jenis Tinggal</th>
                  <th>Tlp Pribadi</th>
                  <th>Tlp Rumah</th>
                  <th>Email</th>
                  <th>Kewarganegaraan</th>
                  <th>Jenis Pendaftaran</th>
                  <th>Tgl Masuk Kuliah</th>
                  <th>Tahun Masuk Kuliah</th>
                  <th>Pembiayaan</th>
                  <th>Alat Transportasi</th>
                  <th>Biaya Masuk</th>
                  <th>Jalur Masuk</th>
                  <th>Penerima KPS</th>
                  <th>NO KPS</th>
                  <th>Mulai Semester</th>

                  <th>NIK Ayah</th>
                  <th>Nama Ayah </th>
                  <th>Tgl Lahir Ayah</th>
                  <th>Pendidikan Ayah</th>
                  <th>Pekerjaan Ayah</th>
                  <th>Penghasilan Ayah</th>
                  <th>Tlp Ayah</th>
                  <th>NIK Ibu</th>
                  <th>Nama Ibu</th>
                  <th>Tgl Lahir Ibu</th>
                  <th>Pendidikan Ibu</th>
                  <th>Pekerjaan Ibu</th>
                  <th>Penghasilan Ibu</th>
                  <th>Tlp Ibu</th>

                  <th>NIK Wali</th>
                  <th>Nama Wali</th>
                  <th>Tgl Lahir Wali</th>
                  <th>Pendidikan Wali</th>
                  <th>Pekerjaan Wali</th>
                  <th>Penghasilan Wali</th>
                  <th>Tlp Wali</th>

                </tr>
              </thead>
            </table>
          </div>
        </div>


      </div>
    </div>
  </div>

  <!-- Modal View -->
  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="show-data" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Data Praja</h4>
          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>

        </div>
        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" role="form">
          <div class="modal-body">
            <div class="form-group">
              <div class="row">
                <div class="col-xl">
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" href="#profile" role="tab" data-toggle="tab">Data Praja</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#ortu" role="tab" data-toggle="tab">Data Orang Tua</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#wali" role="tab" data-toggle="tab">Data Wali</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#lain" role="tab" data-toggle="tab">Data Lain-lain</a>
                    </li>
                  </ul>
                </div>
              </div>

              <!-- Tab panes -->

              <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade active show" id="profile">

                  <table class="table table-striped" align="center">
                    <tbody>
                      <br>

                      <tr>
                        <td><input type="text" readonly class="form-control-plaintext" placeholder="NPP"></td>
                        <td><input type="text" readonly class="form-control-plaintext" id="nppx"></td>
                      </tr>
                      <tr>
                        <td><input type="text" readonly class="form-control-plaintext" placeholder="Nama Praja"></td>
                        <td><input type="text" readonly="" class="form-control-plaintext" id="namax"></td>
                      </tr>
                      <tr>
                        <td><input type="text" readonly class="form-control-plaintext" placeholder="Jenis Kelamin"></td>
                        <td><input type="text" readonly class="form-control-plaintext" id="jkx"></td>
                      </tr>
                      <tr>
                        <td><input type="text" readonly class="form-control-plaintext" placeholder="Tempat Tanggal Lahir"></td>
                        <td><input type="text" readonly class="form-control-plaintext" id="tmpt_lahirx"></td>

                      </tr>
                      <tr>
                        <td><input type="text" readonly class="form-control-plaintext" placeholder="NISN"></td>
                        <td><input type="text" readonly class="form-control-plaintext" id="nisnx"></td>
                      </tr>
                      <tr>
                        <td><input type="text" readonly class="form-control-plaintext" placeholder="NPWP"></td>
                        <td><input type="text" readonly class="form-control-plaintext" id="npwpx"></td>
                      </tr>
                      <tr>
                        <td><input type="text" readonly class="form-control-plaintext" placeholder="NO SPCP"></td>
                        <td><input type="text" readonly class="form-control-plaintext" id="no_spcpx"></td>
                      </tr>
                      <tr>

                        <td><input type="text" readonly class="form-control-plaintext" placeholder="NIK"></td>
                        <td><input type="text" readonly class="form-control-plaintext" id="nik_prajax"></td>
                      </tr>
                      <tr>
                        <td><input type="text" readonly class="form-control-plaintext" placeholder="Agama"></td>
                        <td> <input type="text" readonly class="form-control-plaintext" id="agamax"></td>
                      </tr>
                      <tr>
                        <td><input type="text" readonly class="form-control-plaintext" placeholder="Alamat"></td>
                        <td><input type="text" readonly class="form-control-plaintext" id="alamatx"></td>
                      </tr>
                      <tr>
                        <td><input type="text" readonly class="form-control-plaintext" placeholder="RT"></td>
                        <td><input type="text" readonly class="form-control-plaintext" id="rtx"></td>
                      </tr>
                      <tr>
                        <td><input type="text" readonly class="form-control-plaintext" placeholder="RW"></td>
                        <td> <input type="text" readonly class="form-control-plaintext" id="rwx"></td>
                      </tr>
                      <tr>
                        <td><input type="text" readonly class="form-control-plaintext" placeholder="Nama Dusun"></td>
                        <td> <input type="text" readonly class="form-control-plaintext" id="nama_dusunx"></td>
                      </tr>
                      <tr>
                        <td><input type="text" readonly class="form-control-plaintext" placeholder="Kelurahan"></td>
                        <td> <input type="text" readonly class="form-control-plaintext" id="kelurahanx"></td>
                      </tr>
                      <tr>
                        <td><input type="text" readonly class="form-control-plaintext" placeholder="Kabupaten"></td>
                        <td><input type="text" readonly class="form-control-plaintext" id="kab_kotax"></td>
                      </tr>
                      <tr>
                        <td><input type="text" readonly class="form-control-plaintext" placeholder="Kecamatan"></td>
                        <td><input type="text" readonly class="form-control-plaintext" id="kecamatanx"></td>
                      </tr>
                      <tr>
                        <td><input type="text" readonly class="form-control-plaintext" placeholder="Kode Pos"></td>
                        <td> <input type="text" readonly class="form-control-plaintext" id="kode_posx"></td>
                      </tr>
                      <tr>
                        <td><input type="text" readonly class="form-control-plaintext" placeholder="Jenis Tinggal"></td>
                        <td> <input type="text" readonly class="form-control-plaintext" id="jenis_tinggalx"></td>
                      </tr>
                      <tr>
                        <td><input type="text" readonly class="form-control-plaintext" placeholder="Alat Transportasi"></td>
                        <td> <input type="text" readonly class="form-control-plaintext" id="alat_transportx"></td>
                      </tr>
                      <tr>
                        <td><input type="text" readonly class="form-control-plaintext" placeholder="Tlp Rumah"></td>
                        <td> <input type="text" readonly class="form-control-plaintext" id="tlp_rumahx"></td>
                      </tr>
                      <tr>
                        <td><input type="text" readonly class="form-control-plaintext" placeholder="No Hp"></td>
                        <td> <input type="text" readonly class="form-control-plaintext" id="tlp_pribadix"></td>
                      </tr>
                      <tr>
                        <td><input type="text" readonly class="form-control-plaintext" placeholder="Email"></td>
                        <td><input type="text" readonly class="form-control-plaintext" id="emailx"></td>
                      </tr>
                      <tr>
                        <td><input type="text" readonly class="form-control-plaintext" placeholder="Tingkat"></td>
                        <td><input type="text" readonly class="form-control-plaintext" id="tingkatx"></td>
                      </tr>
                      <tr>
                        <td><input type="text" readonly class="form-control-plaintext" placeholder="Angkatan"></td>
                        <td><input type="text" readonly class="form-control-plaintext" id="angkatanx"></td>
                      </tr>
                      <tr>
                        <td><input type="text" readonly class="form-control-plaintext" placeholder="Status"></td>
                        <td><input type="text" readonly class="form-control-plaintext" id="statusx"></td>
                      </tr>
                    </tbody>
                  </table>

                </div>

                <div role="tabpanel" class="tab-pane fade" id="ortu">
                  <table class="table table-striped">
                    <tbody>
                      <br>
                      <tr>
                        <td><input type="text" readonly class="form-control-plaintext" placeholder="NIK Ayah"></td>
                        <td><input type="text" readonly class="form-control-plaintext" id="nik_ayahx"></td>
                      </tr>
                      <tr>
                        <td><input type="text" readonly class="form-control-plaintext" placeholder="Nama Ayah"></td>
                        <td><input type="text" readonly class="form-control-plaintext" id="nama_ayahx"></td>
                      </tr>
                      <tr>
                        <td><input type="text" readonly class="form-control-plaintext" placeholder="Tanggal Lahir Ayah"></td>
                        <td><input type="text" readonly class="form-control-plaintext" id="tgllahir_ayahx"></td>
                      </tr>
                      <tr>
                        <td><input type="text" readonly class="form-control-plaintext" placeholder="Pendidikan Ayah"></td>
                        <td><input type="text" readonly class="form-control-plaintext" id="pendidikan_ayahx"></td>
                      </tr>
                      <tr>
                        <td><input type="text" readonly class="form-control-plaintext" placeholder="Pekerjaan Ayah"></td>
                        <td><input type="text" readonly class="form-control-plaintext" id="pekerjaan_ayahx"></td>
                      </tr>
                      <tr>
                        <td><input type="text" readonly class="form-control-plaintext" placeholder="Penghasilan Ayah"></td>
                        <td><input type="text" readonly class="form-control-plaintext" id="penghasilan_ayahx"></td>
                      </tr>
                      <tr>
                        <td><input type="text" readonly class="form-control-plaintext" placeholder="NIK Ibu"></td>
                        <td><input type="text" readonly class="form-control-plaintext" id="nik_ibux"></td>
                      </tr>
                      <tr>
                        <td><input type="text" readonly class="form-control-plaintext" placeholder="Nama Ibu"></td>
                        <td><input type="text" readonly class="form-control-plaintext" id="nama_ibux"></td>
                      </tr>
                      <tr>
                        <td><input type="text" readonly class="form-control-plaintext" placeholder="Tanggal Lahir Ibu"></td>
                        <td><input type="text" readonly class="form-control-plaintext" id="tgllahir_ibux"></td>
                      </tr>
                      <tr>
                        <td><input type="text" readonly class="form-control-plaintext" placeholder="Pendidikan Ibu"></td>
                        <td><input type="text" readonly class="form-control-plaintext" id="pendidikan_ibux"></td>
                      </tr>
                      <tr>
                        <td><input type="text" readonly class="form-control-plaintext" placeholder="Pekerjaan Ibu"></td>
                        <td><input type="text" readonly class="form-control-plaintext" id="pekerjaan_ibux"></td>
                      </tr>
                      <tr>
                        <td><input type="text" readonly class="form-control-plaintext" placeholder="Penghasilan Ibu"></td>
                        <td><input type="text" readonly class="form-control-plaintext" id="penghasilan_ibux"></td>
                      </tr>
                    </tbody>
                  </table>

                </div>

                <div role="tabpanel" class="tab-pane fade" id="wali">
                  <table class="table table-striped">
                    <tbody>
                      <br>
                      <tr>
                        <td><input type="text" readonly class="form-control-plaintext" placeholder="NIK Wali"></td>
                        <td><input type="text" readonly class="form-control-plaintext" id="nik_walix"></td>
                      </tr>
                      <tr>
                        <td><input type="text" readonly class="form-control-plaintext" placeholder="Nama Wali"></td>
                        <td><input type="text" readonly class="form-control-plaintext" id="nama_walix"></td>
                      </tr>
                      <tr>
                        <td><input type="text" readonly class="form-control-plaintext" placeholder="Tanggal Lahir Wali"></td>
                        <td><input type="text" readonly class="form-control-plaintext" id="tgllahir_walix"></td>
                      </tr>
                      <tr>
                        <td><input type="text" readonly class="form-control-plaintext" placeholder="Pendidikan Wali"></td>
                        <td><input type="text" readonly class="form-control-plaintext" id="pendidikan_walix"></td>
                      </tr>
                      <tr>
                        <td><input type="text" readonly class="form-control-plaintext" placeholder="Pekerjaan Wali"></td>
                        <td><input type="text" readonly class="form-control-plaintext" id="pekerjaan_walix"></td>
                      </tr>
                      <tr>
                        <td><input type="text" readonly class="form-control-plaintext" placeholder="Penghasilan Wali"></td>
                        <td><input type="text" readonly class="form-control-plaintext" id="penghasilan_walix"></td>
                      </tr>

                    </tbody>
                  </table>

                </div>

                <div role="tabpanel" class="tab-pane fade" id="lain">
                  <table class="table table-striped">
                    <tbody>
                      <br>
                      <tr>
                        <td><input type="text" readonly class="form-control-plaintext" placeholder="Fakultas"></td>
                        <td><input type="text" readonly class="form-control-plaintext" id="fakultasx"></td>
                      </tr>
                      <tr>
                        <td><input type="text" readonly class="form-control-plaintext" placeholder="Prodi"></td>
                        <td><input type="text" readonly class="form-control-plaintext" id="prodix"></td>
                      </tr>
                      <tr>
                        <td><input type="text" readonly class="form-control-plaintext" placeholder="Kewarganegaraan"></td>
                        <td><input type="text" readonly class="form-control-plaintext" id="kewarganegaraanx"></td>
                      </tr>
                      <tr>
                        <td><input type="text" readonly class="form-control-plaintext" placeholder="Jenis Pendaftaran"></td>
                        <td><input type="text" readonly class="form-control-plaintext" id="jenis_pendaftaranx"></td>
                      </tr>

                      <tr>
                        <td><input type="text" readonly class="form-control-plaintext" placeholder="Tanggal Masuk Kuliah"></td>
                        <td><input type="text" readonly class="form-control-plaintext" id="tgl_masuk_kuliahx"></td>
                      </tr>
                      <tr>
                        <td><input type="text" readonly class="form-control-plaintext" placeholder="Tahun Masuk Kuliah"></td>
                        <td><input type="text" readonly class="form-control-plaintext" id="tahun_masuk_kuliahx"></td>
                      </tr>
                      <tr>
                        <td><input type="text" readonly class="form-control-plaintext" placeholder="Jenis Pembiayaan"></td>
                        <td><input type="text" readonly class="form-control-plaintext" id="pembiayaanx"></td>
                      </tr>
                      <tr>
                        <td><input type="text" readonly class="form-control-plaintext" placeholder="Jalur Masuk"></td>
                        <td><input type="text" readonly class="form-control-plaintext" id="jalur_masukx"></td>
                      </tr>
                      <tr>
                        <td><input type="text" readonly class="form-control-plaintext" placeholder="Penempatan"></td>
                        <td><input type="text" readonly class="form-control-plaintext" id="penempatanx"></td>
                      </tr>
                    </tbody>
                  </table>


                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- END Modal view -->

<!-- Modal Ubah -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data-praja" class="modal fade">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ubah Data PRAJA</h4>
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>

      </div>
      <form class="form-horizontal" action="<?php echo base_url('praja/view_edit') ?>" method="post" enctype="multipart/form-data" role="form">

        <div class="modal-body">
          <div class="d-flex align-items-center">
            <i class="fas fa-user-graduate fa-2x icon-praja"></i>
            <h5>⠀ Data Diri Praja </h5>

          </div>
          <br>
          <div class="form-group">
            <div class="row">
              <div class="col-xl">

                <label class="col-form-label">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap ...." >
              </div>
              <div class="col-xl-2">
                <label class="col-form-label">NPP:</label>
                <input type="text" class="form-control" id="npp" name="npp" placeholder="NPP ...." >
              </div>

              <div class="col-xl-2">
                <div class="form-group">
                  <label class="col-form-label">Jenis Kelamin:</label>
                  <!-- <input type="text" class="form-control" id="jk" name="jk" placeholder="jenis kelamin ...." readonly=""> -->

                  <select name="jk" id="jk" class="form-control" required="">
                    <option value="">-Pilih Jenis Kelamin-</option>
                    <option value="L">Laki-Laki</option>
                    <option value="P">Perempuan</option>
                  </select>
                </div>
              </div>
              <div class="col-xl">
                <label class="col-form-label">Tempat Lahir:</label>
                <input type="text" class="form-control" id="tmpt_lahir" name="tmpt_lahir" placeholder="Tempat Lahir ...." >
              </div>
              <div class="col-xl">
                <label class="col-form-label">Tanggal lahir:</label>
                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" >
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">

              <div class="col-xl">
                <label class="col-form-label">NISN:</label>
                <input type="text" class="form-control" id="nisn" name="nisn" placeholder="NISN ...." >
              </div>
              <div class="col-xl">
                <label class="col-form-label">NPWP:</label>
                <input type="text" class="form-control" id="npwp" name="npwp" placeholder="NPWP ...." >
              </div>
              <div class="col-xl">
                <label class="col-form-label">NO SPCP:</label>
                <input type="text" class="form-control" id="no_spcp" name="no_spcp" placeholder="No SPCP ...." >
              </div>
              <div class="col-xl">
                <label class="col-form-label">NIK:</label>
                <input type="text" class="form-control" id="nik_praja" name="nik_praja" placeholder="NIK Praja ...." >
              </div>
              <div class="col-xl">
                <label class="col-form-label">Agama:</label>
                <!-- <input type="text" class="form-control" id="agama" name="agama" placeholder="Agama ...." readonly> -->
                <select name="agama" id="agama" class="form-control">
                  <option value="">-Pilih Agama-</option>
                  <?php foreach ($agamaa as $x) { ?>
                    <option value="<?php echo $x->nama_agama; ?>"><?php echo $x->nama_agama; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">

              <div class="col-xl-3">
                <label class="col-form-label">Alamat:</label>
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat ...." >
              </div>
              <div class="col-xl-1">
                <label class="col-form-label">RT:</label>
                <input type="text" class="form-control" id="rt" name="rt" placeholder="RT ...." >
              </div>
              <div class="col-xl-1">
                <label class="col-form-label">RW:</label>
                <input type="text" class="form-control" id="rw" name="rw" placeholder="RW ....">
              </div>
              <div class="col-xl-2">
                <label class="col-form-label">Provinsi:</label>
                <!-- <input type="text" class="form-control" id="provinsi" name="provinsi" placeholder="Provinsi ...." readonly> -->
                <select class="form-control" name="provinsi" id="provinsi">

                  <option value="">-Pilih Provinsi-</option>
                  <?php foreach ($wilayah as $x) { ?>
                    <option value="<?php echo $x->nama_provinsi; ?>"><?php echo $x->nama_provinsi; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-xl">
                <label class="col-form-label">Kota/Kabupaten:</label>
                <!-- <input type="text" class="form-control" id="kab_kota" name="kab_kota" placeholder="Kabupaten/Kota ...." readonly> -->
                <select class="form-control" name="kab_kota" id="kab_kota" >
                  <option value="">-Pilih Kab/kota-</option>
                </select>
              </div>
              <div class="col-xl">
                <label class="col-form-label">Kelurahan:</label>
                <input type="text" class="form-control" id="kelurahan" name="kelurahan" placeholder="Kelurahan ...." >
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col-xl">
                <label class="col-form-label">Nama Dusun:</label>
                <input type="text" class="form-control" id="nama_dusun" name="nama_dusun" placeholder="Nama Dusun ...." >
              </div>
              <div class="col-xl">
                <label class="col-form-label">Kecamatan:</label>
                <!-- <input type="text" class="form-control" id="kecamatan" name="kecamatan" placeholder="Kecamatan ...." readonly> -->
                <select class="form-control" name="kecamatan" id="kecamatan" required="">
                  <option>-Pilih Kecamatan-</option>
                    <?php foreach ($kecc as $x) { ?>
                    <option value="<?php echo $x->nama_kecamatan; ?>" readonly><?php echo $x->nama_kecamatan; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-xl-1">
                <label class="col-form-label">Kode Pos:</label>
                <input type="text" class="form-control" id="kode_pos" name="kode_pos" placeholder="Kode Pos ...." >
              </div>
              <div class="col-xl">
                <label class="col-form-label">Jenis Tinggal:</label>
                <!-- <input type="text" class="form-control" id="jenis_tinggal" name="jenis_tinggal" placeholder="jenis_tinggal ...." > -->

                <select class="form-control" name="jenis_tinggal" id="jenis_tinggal">

                  <option value="">-Pilih Jenis Tinggal-</option>
                  <?php foreach ($jenistinggal as $x) { ?>
                    <option value="<?php echo $x->nama_jenis_tinggal; ?>"><?php echo $x->nama_jenis_tinggal; ?></option>
                  <?php } ?>
                </select>
              </div>

              <div class="col-xl-2">
                <label class="col-form-label">No HP:</label>
                <input type="number" class="form-control" id="tlp_pribadi" name="tlp_pribadi" placeholder="TLP Pribadi ....">
              </div>
              <div class="col-xl-2">
                <label class="col-form-label">No Tlp Rumah:</label>
                <input type="number" class="form-control" id="tlp_rumah" name="tlp_rumah" placeholder="TLP Rumah ....">
              </div>

            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col-xl">
                <label class="col-form-label">Email:</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Email ....">
              </div>
              <div class="col-xl-1">
                <label class="col-form-label">Tingkat:</label>
                <input type="text" class="form-control" id="tingkat" name="tingkat" placeholder="Tingkat ...." readonly="">
              </div>
              <div class="col-xl-1">
                <label class="col-form-label">Angkatan:</label>
                <input type="text" class="form-control" id="angkatan" name="angkatan" placeholder="Angkatan ...." readonly="">
              </div>
              <div class="col-xl-1">
                <label class="col-form-label">Status:</label>
                <input type="text" class="form-control" id="status" name="status" placeholder="Status ...." readonly="">
              </div>

              <div class="col-xl">
                <label class="col-form-label">Fakultas:</label>
                <!-- <input type="text" class="form-control" id="fakultas" name="fakultas" placeholder="fakultas ...."> -->

              <select class="form-control" name="fakultas" id="fakultas" required="">
             <option value="">-Pilih Fakultas-</option>
              <?php foreach ($fakulll as $x) { ?>
              <option value="<?php echo $x->nama_fakultas; ?>"><?php echo $x->nama_fakultas; ?></option>
             <?php } ?>
              </select> 
              </div>
              <div class="col-xl">
                <label class="col-form-label">Prodi:</label>
                <!-- <input type="text" class="form-control" id="prodi" name="prodi" placeholder="prodi ...." > -->
                <select class="form-control" name="prodi" id="prodi" required="">
             <option value="">-Pilih Prodi-</option>
              <?php foreach ($proddd as $x) { ?>
              <option value="<?php echo $x->nama_program_studi; ?>"><?php echo $x->nama_program_studi; ?></option>
             <?php } ?>
              </select> 
              </div>



            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col-xl">
                <label class="col-form-label">Kewarganegaraan:</label>
                <!-- <input type="text" class="form-control" id="kewarganegaraan" name="kewarganegaraan" placeholder="kewarganegaraan ...." readonly=""> -->
                
                <select class="form-control" name="kewarganegaraan" id="kewarganegaraan" >
                <option value="">-Pilih Kewarganegaraan-</option>
                  <?php foreach ($kewarganegaraan as $x) { ?>
                    <option value="<?php echo $x->nama_negara; ?>"><?php echo $x->nama_negara; ?></option>
                  <?php } ?>
                </select> 
              </div>

              <div class="col-xl">
                <label class="col-form-label">Jenis Pendaftaran:</label>
                <!-- <input type="text" class="form-control" id="jenis_pendaftaran" name="jenis_pendaftaran" placeholder="jenis_pendaftaran ...." readonly=""> -->
                
                <select class="form-control" name="jenis_pendaftaran" id="jenis_pendaftaran">
                    <option value="">-Pilih Jenis Pendaftaran-</option>
                  <?php foreach ($jenispendaftaran as $x) { ?>
                    <option value="<?php echo $x->nama_jenis_daftar; ?>"><?php echo $x->nama_jenis_daftar; ?></option>
                  <?php } ?>
                </select>
              </div>

              <div class="col-xl">
                <label class="col-form-label">Tanggal Masuk Kuliah:</label>
                <input type="date" class="form-control" id="tgl_masuk_kuliah" name="tgl_masuk_kuliah" >
              </div>
              <div class="col-xl">
                <label class="col-form-label">Tahun Masuk Kuliah:</label>
                <input type="text" class="form-control" id="tahun_masuk_kuliah" name="tahun_masuk_kuliah" placeholder="Tahun Masuk Kuliah ....">
              </div>
              <div class="col-xl">
                <label class="col-form-label">Pembiayaan:</label>
                <!-- <input type="text" class="form-control" id="pembiayaan" name="pembiayaan" placeholder="pembiayaan ...."> -->

                  <select class="form-control" name="pembiayaan" id="pembiayaan">
                   <option value="">-Pilih Jenis Pembiayaan-</option>
                   <?php foreach ($pembiayaan as $x) { ?>
                    <option value="<?php echo $x->nama_pembiayaan; ?>"><?php echo $x->nama_pembiayaan; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-xl">
                <label class="col-form-label">Penempatan:</label>
               <select class="form-control" name="penempatan" id="penempatan">
                   <option value="">-Pilih Jenis Penempatan-</option>
                   <?php foreach ($kampus as $x) { ?>
                    <option value="<?php echo $x->nama_satker; ?>"><?php echo $x->nama_satker; ?></option>
                  <?php } ?>
                </select>
              </div>


            </div>
          </div>


          <div class="form-group">
            <div class="row">
              <div class="col-xl">
                <label class="col-form-label">Mulai Semester:</label>
                <!-- <input type="text" class="form-control" id="mulai_semester" name="mulai_semester" placeholder="mulai_semester ...." readonly=""> -->

                <select class="form-control" name="mulai_semester" id="mulai_semester" >
               <option value="">-Pilih Mulai Semester-</option>
               <?php foreach ($mulaisemester as $x) { ?>
                <option value="<?php echo $x->nama_semester; ?>"><?php echo $x->nama_semester; ?></option>
              <?php } ?>
            </select>
              </div>
              <div class="col-xl">
                <label class="col-form-label">Alat Transportasi:</label>
                <!-- <input type="text" class="form-control" id="alat_transport" name="alat_transport" placeholder="alat_transport ...." readonly=""> -->

                <select class="form-control" name="alat_transport" id="alat_transportx">
               <option value="">-Pilih Alat Transportasi-</option>
               <?php foreach ($alattransportasi as $x) { ?>
                <option value="<?php echo $x->nama_alat_transportasi; ?>"><?php echo $x->nama_alat_transportasi; ?></option>
              <?php } ?>
            </select>
              </div>
              <div class="col-xl">
                <label class="col-form-label">Biaya Masuk:</label>
                <input type="text" class="form-control" id="biaya_masuk" name="biaya_masuk" placeholder="Biaya Masuk ....">
              </div>
              <div class="col-xl">
                <label class="col-form-label">Jalur Masuk:</label>
                <!-- <input type="text" class="form-control" id="jalur_masuk" name="jalur_masuk" placeholder="jalur_masuk ...." readonly=""> -->

              <select class="form-control" name="jalur_masuk" id="jalur_masuk" >
                <option value="">-Pilih Jalur Masuk-</option>
                 <?php foreach ($jalurmasuk as $x) { ?>
                <option value="<?php echo $x->id_jalur_masuk; ?>"><?php echo $x->nama_jalur_masuk; ?></option>
                <?php } ?>
              </select>
              </div>
              <div class="col-xl">
                <label class="col-form-label">Penerima KPS :</label>
                <select class="form-control" name="penerima_pks" id="penerima_pks" >
                  <option value="">-Pilih Penerima KPS-</option>
                  <option value="YA">Ya</option>
                  <option value="TIDAK">Tidak</option>
                </select>

              </div>
              <div class="col-xl">
                <label class="col-form-label">NO KPS:</label>
                <input type="text" class="form-control" id="no_pks" name="no_pks" placeholder="No KPS ...." >
              </div>
            </div>
          </div>


          <br>

          <div class="d-flex align-items-center">
            <i class="fas fa-users fa-2x icon-ortu"></i>
            <h5>⠀ Data Orang Tua </h5>
          </div>
          <br>

          <div class="form-group">
            <div class="row">
              <div class="col-xl">
                <label class="col-form-label">NIK Ayah:</label>
                <input type="text" class="form-control" id="nik_ayah" name="nik_ayah" placeholder="NIK Ayah ...." >
              </div>
              <div class="col-xl">
                <label class="col-form-label">Nama Ayah:</label>
                <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" placeholder="Nama Ayah ...." >
              </div>
              <div class="col-xl">
                <label class="col-form-label">Tanggal Lahir Ayah:</label>
                <input type="date" class="form-control" id="tgllahir_ayah" name="tgllahir_ayah">
              </div>

              <div class="col-xl">
                <label class="col-form-label">Pendidikan Ayah:</label>
                <!-- <input type="text" class="form-control" id="pendidikan_ayah" name="pendidikan_ayah" placeholder="pendidikan_ayah ...." readonly=""> -->
                
                <select class="form-control" name="pendidikan_ayah" id="pendidikan_ayah">
                 <option value="">-Pilih Pendidikan-</option>
                 <?php foreach ($pendidikan as $x) { ?>
                  <option value="<?php echo $x->nama_jenjang_didik; ?>"><?php echo $x->nama_jenjang_didik; ?></option>
                <?php } ?>
              </select>
              </div>

              <div class="col-xl">
                <label class="col-form-label">Pekerjaan Ayah:</label>
                <!-- <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" placeholder="pekerjaan_ayah ...." readonly=""> -->
                
                <select class="form-control" name="pekerjaan_ayah" id="pekerjaan_ayah" >
                 <option value="">-Pilih Pekerjaan-</option>
                 <?php foreach ($pekerjaan as $x) { ?>
                  <option value="<?php echo $x->nama_pekerjaan; ?>"><?php echo $x->nama_pekerjaan; ?></option>
                <?php } ?>
              </select>
              </div>


            </div>
          </div>

          <div class="form-group">
            <div class="row">

              <div class="col-xl">
                <label class="col-form-label">Penghasilan Ayah:</label>
                <!-- <input type="text" class="form-control" id="penghasilan_ayah" name="penghasilan_ayah" placeholder="penghasilan_ayah ...." readonly=""> -->

                <select class="form-control" name="penghasilan_ayah" id="penghasilan_ayah">
                 <option value="">-Pilih Penghasilan-</option>
                 <?php foreach ($penghasilan as $x) { ?>
                  <option value="<?php echo $x->nama_penghasilan; ?>"><?php echo $x->nama_penghasilan; ?></option>
                <?php } ?>
              </select>
              </div>
              <div class="col-xl">
                <label class="col-form-label">No Tlp Ayah:</label>
                <input type="number" class="form-control" id="tlp_ayah" name="tlp_ayah" placeholder="No Tlp Ayah ...." >
              </div>
              <div class="col-xl">
                <label class="col-form-label">NIK ibu:</label>
                <input type="text" class="form-control" id="nik_ibu" name="nik_ibu" placeholder="NIK Ibu ...." >
              </div>
              <div class="col-xl">
                <label class="col-form-label">Nama ibu:</label>
                <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" placeholder="Nama Ibu ...." >
              </div>
              <div class="col-xl">
                <label class="col-form-label">Tanggal Lahir ibu:</label>
                <input type="date" class="form-control" id="tgllahir_ibu" name="tgllahir_ibu" >
              </div>



            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col-xl">
                <label class="col-form-label">Pendidikan ibu:</label>
                <!-- <input type="text" class="form-control" id="pendidikan_ibu" name="pendidikan_ibu" placeholder="pendidikan_ibu ...." readonly=""> -->

                <select class="form-control" name="pendidikan_ibu" id="pendidikan_ibu" >
                 <option value="">-Pilih Pendidikan-</option>
                 <?php foreach ($pendidikan as $x) { ?>
                  <option value="<?php echo $x->nama_jenjang_didik; ?>"><?php echo $x->nama_jenjang_didik; ?></option>
                <?php } ?>
              </select>
              </div>
              <div class="col-xl">
                <label class="col-form-label">Pekerjaan ibu:</label>
                <!-- <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" placeholder="pekerjaan_ibu ...." readonly=""> -->
                
                <select class="form-control" name="pekerjaan_ibu" id="pekerjaan_ibu" >
                 <option value="">-Pilih Pekerjaan-</option>
                 <?php foreach ($pekerjaan as $x) { ?>
                  <option value="<?php echo $x->nama_pekerjaan; ?>"><?php echo $x->nama_pekerjaan; ?></option>
                <?php } ?>
              </select>
              </div>

              <div class="col-xl">
                <label class="col-form-label">Penghasilan ibu:</label>
                <!-- <input type="text" class="form-control" id="penghasilan_ibu" name="penghasilan_ibu" placeholder="penghasilan_ibu ...." readonly=""> -->

                <select class="form-control" name="penghasilan_ibu" id="penghasilan_ibu" >
                 <option value="">-Pilih Penghasilan-</option>
                 <?php foreach ($penghasilan as $x) { ?>
                  <option value="<?php echo $x->nama_penghasilan; ?>"><?php echo $x->nama_penghasilan; ?></option>
                <?php } ?>
              </select>

              </div>
              <div class="col-xl">
                <label class="col-form-label">No TLP Ibu:</label>
                <input type="number" class="form-control" id="tlp_ibu" name="tlp_ibu" placeholder="No Tlp Ibu ...." >
              </div>
            </div>
          </div>

          <br>

          <div class="d-flex align-items-center">
            <i class="fas fa-user fa-2x icon-wali"></i>
            <h5>⠀ Data Wali </h5>
          </div>
          <br>
          <div class="form-group">
            <div class="row">
              <div class="col-xl">
                <label class="col-form-label">NIK wali:</label>
                <input type="text" class="form-control" id="nik_wali" name="nik_wali" placeholder="NIK Wali ....">
              </div>
              <div class="col-xl">
                <label class="col-form-label">Nama wali:</label>
                <input type="text" class="form-control" id="nama_wali" name="nama_wali" placeholder="Nama Wali ...." >
              </div>
              <div class="col-xl">
                <label class="col-form-label">Tanggal Lahir wali:</label>
                <input type="date" class="form-control" id="tgllahir_wali" name="tgllahir_wali" >
              </div>

              <div class="col-xl">
                <label class="col-form-label">Pendidikan wali:</label>
                <!-- <input type="text" class="form-control" id="pendidikan_wali" name="pendidikan_wali" placeholder="pendidikan_wali ...." readonly=""> -->
                
                <select class="form-control" name="pendidikan_wali" id="pendidikan_wali" >
                 <option value="">-Pilih Pendidikan-</option>
                 <?php foreach ($pendidikan as $x) { ?>
                  <option value="<?php echo $x->id_jenjang_didik; ?>"><?php echo $x->nama_jenjang_didik; ?></option>
                <?php } ?>
              </select>
              </div>


            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col-xl">
                <label class="col-form-label">Pekerjaan wali:</label>
                <!-- <input type="text" class="form-control" id="pekerjaan_wali" name="pekerjaan_wali" placeholder="pekerjaan_wali ...." readonly=""> -->

                <select class="form-control" name="pekerjaan_wali" id="pekerjaan_wali" >
                 <option value="">-Pilih Pekerjaan-</option>
                 <?php foreach ($pekerjaan as $x) { ?>
                  <option value="<?php echo $x->nama_pekerjaan; ?>"><?php echo $x->nama_pekerjaan; ?></option>
                <?php } ?>
              </select>
              </div>

              <div class="col-xl">
                <label class="col-form-label">Penghasilan wali:</label>
                <!-- <input type="text" class="form-control" id="penghasilan_wali" name="penghasilan_wali" placeholder="penghasilan_wali ...." readonly=""> -->
                
                <select class="form-control" name="penghasilan_wali" id="penghasilan_wali" >
                 <option value="">-Pilih Penghasilan-</option>
                 <?php foreach ($penghasilan as $x) { ?>
                  <option value="<?php echo $x->nama_penghasilan; ?>"><?php echo $x->nama_penghasilan; ?></option>
                <?php } ?>
              </select> 
              </div>
              <div class="col-xl">
                <label class="col-form-label">No TLP Wali:</label>
                <input type="text" class="form-control" id="tlp_wali" name="tlp_wali" placeholder="No Tlp Wali ...." >
              </div>
            </div>
          </div>





        </div>
        <div class="modal-footer">
          <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
          <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
<!-- END Modal Ubah -->

<script src="<?php echo base_url() . 'assets/js/jquery.min.js' ?>"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script type="text/javascript">
  var ctx = document.getElementById('myChart').getContext('2d');
  var chart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: [
        <?php
        if (count($prov) > 0) {
          foreach ($prov as $data) {
            echo "'" . $data->provinsi . "',";
          }
        }
        ?>
      ],
      datasets: [{
        label: 'Jumlah Praja',
        backgroundColor: '#ADD8E6',
        borderColor: '##93C3D2',
        data: [
          <?php
          if (count($prov) > 0) {
            foreach ($prov as $data) {
              echo $data->jumlah . ", ";
            }
          }
          ?>
        ]
      }]
    },
  });
</script>


<script>
  function get_angkatan() {
    var base_url = window.location.origin + "/" + window.location.pathname.split("/")[1];
    $.ajax({
      type: 'POST',
      url: `${base_url}/praja/angkat`,
      success: function(data) {
        $("#filter_angkatan").html('<option value="" selected>Filter Angkatan</option>');
        var dataObj = jQuery.parseJSON(data);
        console.log(dataObj);
        if (dataObj) {
          $(dataObj).each(function() {
            var option = $('<option />');
            option.attr('value', this).text(this);
            // console.log(option.attr('value', this).text(this));     
            $("#filter_angkatan").append(option);
          });
        } else {
          $("#filter_angkatan").html('<option value="">Pilihan tidak ada</option>');
        }
      }
    });
  }

  function get_prod() {
    var base_url = window.location.origin + "/" + window.location.pathname.split("/")[1];
    $.ajax({
      type: 'POST',
      url: `${base_url}/praja/prod`,
      success: function(data) {
        $("#filter_prod").html('<option value="" selected>Filter Prodi</option>');
        var dataObj = jQuery.parseJSON(data);
        console.log(dataObj);
        if (dataObj) {
          $(dataObj).each(function() {
            var option = $('<option />');
            option.attr('value', this).text(this);
            console.log(option.attr('value', this).text(this));
            $("#filter_prod").append(option);
          });
        } else {
          $("#filter_prod").html('<option value="">Pilihan tidak ada</option>');
        }
      }
    });
  }

  $(document).ready(function() {
    // list MOU
    get_prod();
    get_angkatan();
    var url = '<?php echo base_url('praja/get_praja'); ?>';

    var list_mou = $('#data-praja').DataTable({
      dom: 'Bfrtip',
      buttons: [{
          extend: 'copy',
          className: '',
          exportOptions: {
            columns: 'th:not(:last-child)'
          }
        },
        // {
        //   extend: 'csv',
        //   exportOptions: {
        //     columns: 'th:not(:last-child)'
        //   }
        // },
        {
          extend: 'excel',
          exportOptions: {
            columns: 'th:not(:last-child)'
          }
        },
        {
          extend: 'pdf',
          exportOptions: {
            columns: 'th:not(:last-child)'
          }
        },
        {
          extend: 'print',
          exportOptions: {
            columns: 'th:not(:last-child)'
          }
        }
      ],
      responsive: true,
      "ajax": {
        "url": url,
        "dataSrc": ""
      }
    });


    $('#filter_angkatan').on('change', function() {
      list_mou
        .column(6)
        .search(this.value)
        .draw();

      // var val = this.value;
      // console.log(val);


      // $('#export').on('click', function() {
      //   $.ajax({

      //     success: function(url) {
      //       window.open("<?php echo base_url('praja') . '/export/'; ?>" + val);
      //     }
      //   });

      // });



    });
    $('#filter_prod').on('change', function() {
      list_mou
        .column(10)
        .search(this.value)
        .draw();


    });



  });

  $(document).ready(function() {
    // Untuk show data
    $('#show-data').on('show.bs.modal', function(event) {
      var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
      var modal = $(this)

      // Isi nilai pada field
      modal.find('#nppx').attr("value", div.data('npp'));
      modal.find('#namax').attr("value", div.data('nama'));
      modal.find('#jkx').attr("value", div.data('jk'));
      modal.find('#nisnx').attr("value", div.data('nisn'));
      modal.find('#no_spcpx').attr("value", div.data('no_spcp'));
      modal.find('#npwpx').attr("value", div.data('npwp'));
      modal.find('#nik_prajax').attr("value", div.data('nik_praja'));
      modal.find('#tmpt_lahirx').attr("value", div.data('tmpt_lahir'));
      modal.find('#tgl_lahirx').attr("value", div.data('tgl_lahir'));
      // modal.find('#agamax').val(div.data('agama')); 
      modal.find('#agamax').attr("value", div.data('agama'));
      modal.find('#alamatx').attr("value", div.data('alamat'));
      modal.find('#rtx').attr("value", div.data('rt'));
      modal.find('#rwx').attr("value", div.data('rw'));
      modal.find('#nama_dusunx').attr("value", div.data('nama_dusun'));
      modal.find('#kelurahanx').attr("value", div.data('kelurahan'));
      modal.find('#kecamatanx').attr("value", div.data('kecamatan'));
      modal.find('#kode_posx').attr("value", div.data('kode_pos'));
      modal.find('#kab_kotax').attr("value", div.data('kab_kota'));
      modal.find('#provinsix').attr("value", div.data('provinsi'));
      modal.find('#jenis_tinggalx').attr("value", div.data('jenis_tinggal'));
      modal.find('#alat_transportx').attr("value", div.data('alat_transport'));
      modal.find('#tlp_rumahx').attr("value", div.data('tlp_rumah'));
      modal.find('#tlp_pribadix').attr("value", div.data('tlp_pribadi'));
      modal.find('#emailx').attr("value", div.data('email'));
      modal.find('#kewarganegaraanx').attr("value", div.data('kewarganegaraan'));
      modal.find('#penerima_pksx').attr("value", div.data('penerima_pks'));
      modal.find('#no_pksx').attr("value", div.data('no_pks'));
      modal.find('#prodix').attr("value", div.data('prodi'));
      modal.find('#jenis_pendaftaranx').attr("value", div.data('jenis_pendaftaran'));
      modal.find('#tgl_masuk_kuliahx').attr("value", div.data('tgl_masuk_kuliah'));
      modal.find('#tahun_masuk_kuliahx').attr("value", div.data('tahun_masuk_kuliah'));
      modal.find('#pembiayaanx').attr("value", div.data('pembiayaan'));
      modal.find('#jalur_masukx').attr("value", div.data('jalur_masuk'));
      modal.find('#biaya_masukx').attr("value", div.data('biaya_masuk'));
      modal.find('#tingkatx').attr("value", div.data('tingkat'));
      modal.find('#angkatanx').attr("value", div.data('angkatan'));
      modal.find('#statusx').attr("value", div.data('status'));
      modal.find('#fakultasx').attr("value", div.data('fakultas'));
      modal.find('#id_ortux').attr("value", div.data('id_ortu'));
      modal.find('#nik_ayahx').attr("value", div.data('nik_ayah'));
      modal.find('#nama_ayahx').attr("value", div.data('nama_ayah'));
      modal.find('#tgllahir_ayahx').attr("value", div.data('tgllahir_ayah'));
      modal.find('#pendidikan_ayahx').attr("value", div.data('pendidikan_ayah'));
      modal.find('#pekerjaan_ayahx').attr("value", div.data('pekerjaan_ayah'));
      modal.find('#penghasilan_ayahx').attr("value", div.data('penghasilan_ayah'));
      modal.find('#tlp_ayahx').attr("value", div.data('tlp_ayah'));
      modal.find('#nik_ibux').attr("value", div.data('nik_ibu'));
      modal.find('#nama_ibux').attr("value", div.data('nama_ibu'));
      modal.find('#tgllahir_ibux').attr("value", div.data('tgllahir_ibu'));
      modal.find('#pendidikan_ibux').attr("value", div.data('pendidikan_ibu'));
      modal.find('#pekerjaan_ibux').attr("value", div.data('pekerjaan_ibu'));
      modal.find('#penghasilan_ibux').attr("value", div.data('penghasilan_ibu'));
      modal.find('#id_walix').attr("value", div.data('id_wali'));
      modal.find('#nik_walix').attr("value", div.data('nik_wali'));
      modal.find('#nama_walix').attr("value", div.data('nama_wali'));
      modal.find('#tgllahir_walix').attr("value", div.data('tgllahir_wali'));
      modal.find('#pendidikan_walix').attr("value", div.data('pendidikan_wali'));
      modal.find('#pekerjaan_walix').attr("value", div.data('pekerjaan_wali'));
      modal.find('#penghasilan_walix').attr("value", div.data('penghasilan_wali'));
      modal.find('#tlp_walix').attr("value", div.data('tlp_wali'));
      modal.find('#penempatanx').attr("value", div.data('penempatan'));

    });

    // Untuk sunting
    $('#edit-data-praja').on('show.bs.modal', function(event) {
      var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
      var modal = $(this)

      // Isi nilai pada field
      modal.find('#npp').attr("value", div.data('npp'));
      modal.find('#nama').attr("value", div.data('nama'));
      // modal.find('#jk').attr("value", div.data('jk'));
      modal.find('#jk').val(div.data('jk'));
      modal.find('#nisn').attr("value", div.data('nisn'));
      modal.find('#no_spcp').attr("value", div.data('no_spcp'));
      modal.find('#npwp').attr("value", div.data('npwp'));
      modal.find('#nik_praja').attr("value", div.data('nik_praja'));
      modal.find('#tmpt_lahir').attr("value", div.data('tmpt_lahir'));
      modal.find('#tgl_lahir').attr("value", div.data('tgl_lahir'));
      modal.find('#agama').val(div.data('agama'));
      // modal.find('#agama').attr("value", div.data('agama'));
      modal.find('#alamat').attr("value", div.data('alamat'));
      modal.find('#rt').attr("value", div.data('rt'));
      modal.find('#rw').attr("value", div.data('rw'));
      modal.find('#nama_dusun').attr("value", div.data('nama_dusun'));
      modal.find('#kelurahan').attr("value", div.data('kelurahan'));
      modal.find('#kecamatan').val(div.data('kecamatan'));
      // modal.find('#kecamatan').attr("value", div.data('kecamatan'));
      modal.find('#kode_pos').attr("value", div.data('kode_pos'));
      modal.find('#kab_kota').attr("value", div.data('kab_kota'));
      // modal.find('#provinsi').attr("value", div.data('provinsi'));
      modal.find('#provinsi').val(div.data('provinsi'));
      modal.find('#jenis_tinggal').val(div.data('jenis_tinggal'));
      // modal.find('#jenis_tinggal').attr("value", div.data('jenis_tinggal'));
      modal.find('#alat_transport').val(div.data('alat_transport'));
      // modal.find('#alat_transport').attr("value", div.data('alat_transport'));
      modal.find('#tlp_rumah').attr("value", div.data('tlp_rumah'));
      modal.find('#tlp_pribadi').attr("value", div.data('tlp_pribadi'));
      modal.find('#email').attr("value", div.data('email'));
      modal.find('#kewarganegaraan').val(div.data('kewarganegaraan'));
      // modal.find('#kewarganegaraan').attr("value", div.data('kewarganegaraan'));
      modal.find('#penerima_pks').attr("value", div.data('penerima_pks'));
      modal.find('#no_pks').attr("value", div.data('no_pks'));
      modal.find('#prodi').val(div.data('prodi'));
      // modal.find('#prodi').attr("value", div.data('prodi'));

      modal.find('#jenis_pendaftaran').val(div.data('jenis_pendaftaran'));
      // modal.find('#jenis_pendaftaran').attr("value", div.data('jenis_pendaftaran'));
      modal.find('#tgl_masuk_kuliah').attr("value", div.data('tgl_masuk_kuliah'));
      modal.find('#tahun_masuk_kuliah').attr("value", div.data('tahun_masuk_kuliah'));
      modal.find('#pembiayaan').val(div.data('pembiayaan'));
      // modal.find('#pembiayaan').attr("value", div.data('pembiayaan'));
      modal.find('#biaya_masuk').attr("value", div.data('biaya_masuk'));
      modal.find('#jalur_masuk').val(div.data('jalur_masuk'));
      // modal.find('#jalur_masuk').attr("value", div.data('jalur_masuk'));
      modal.find('#tingkat').attr("value", div.data('tingkat'));
      modal.find('#angkatan').attr("value", div.data('angkatan'));
      modal.find('#status').attr("value", div.data('status'));
      modal.find('#fakultas').val(div.data('fakultas'));
      // modal.find('#fakultas').attr("value", div.data('fakultas'));
       modal.find('#mulai_semester').val(div.data('mulai_semester'));
      // modal.find('#mulai_semester').attr("value", div.data('mulaisemester'));
      modal.find('#penempatan').val(div.data('penempatan'));
      // modal.find('#penempatan').attr("value", div.data('penempatan'));

      modal.find('#id_ortu').attr("value", div.data('id_ortu'));
      modal.find('#nik_ayah').attr("value", div.data('nik_ayah'));
      modal.find('#nama_ayah').attr("value", div.data('nama_ayah'));
      modal.find('#tgllahir_ayah').attr("value", div.data('tgllahir_ayah'));
      modal.find('#pendidikan_ayah').val(div.data('pendidikan_ayah'));
      // modal.find('#pendidikan_ayah').attr("value", div.data('pendidikan_ayah'));
      modal.find('#pekerjaan_ayah').val(div.data('pekerjaan_ayah'));
      // modal.find('#pekerjaan_ayah').attr("value", div.data('pekerjaan_ayah'));
      modal.find('#penghasilan_ayah').val(div.data('penghasilan_ayah'));
      // modal.find('#penghasilan_ayah').attr("value", div.data('penghasilan_ayah'));
      modal.find('#tlp_ayah').attr("value", div.data('tlp_ayah'));
      modal.find('#nik_ibu').attr("value", div.data('nik_ibu'));
      modal.find('#nama_ibu').attr("value", div.data('nama_ibu'));
      modal.find('#tgllahir_ibu').attr("value", div.data('tgllahir_ibu'));
      modal.find('#pendidikan_ibu').val(div.data('pendidikan_ibu'));
      // modal.find('#pendidikan_ibu').attr("value", div.data('pendidikan_ibu'));
      modal.find('#pekerjaan_ibu').val(div.data('pekerjaan_ibu'));
      // modal.find('#pekerjaan_ibu').attr("value", div.data('pekerjaan_ibu'));
      modal.find('#penghasilan_ibu').val(div.data('penghasilan_ibu'));
      // modal.find('#penghasilan_ibu').attr("value", div.data('penghasilan_ibu'));
      modal.find('#id_wali').attr("value", div.data('id_wali'));
      modal.find('#nik_wali').attr("value", div.data('nik_wali'));
      modal.find('#nama_wali').attr("value", div.data('nama_wali'));
      modal.find('#tgllahir_wali').attr("value", div.data('tgllahir_wali'));
      modal.find('#pendidikan_wali').val(div.data('pendidikan_wali'));
      // modal.find('#pendidikan_wali').attr("value", div.data('pendidikan_wali'));
      modal.find('#pekerjaan_wali').val(div.data('pekerjaan_wali'));
      // modal.find('#pekerjaan_wali').attr("value", div.data('pekerjaan_wali'));
      modal.find('#penghasilan_wali').val(div.data('penghasilan_wali'));
      // modal.find('#penghasilan_wali').attr("value", div.data('penghasilan_wali'));
      modal.find('#tlp_wali').attr("value", div.data('tlp_wali'));

    });

    $('#fk').change(function() {
      var prodi = $(this).val();
      console.log(prodi);
      $.ajax({
        url: "<?php echo site_url('praja/get_sub_category'); ?>",
        method: "POST",
        data: {
          prodi: prodi
        },
        async: true,
        dataType: 'json',
        success: function(data) {

          var html = '';
          var i;
          for (i = 0; i < data.length; i++) {
            html += '<option value=' + data[i].id_prodi + '>' + data[i].nama_program_studi + '</option>';
          }
          $('#prodi').html(html);

        }
      });
      return false;
    });


    $('#provinsi').change(function() {
      var kab_kota = $(this).val();
     
      console.log(kab_kota);
      $.ajax({
        url: "<?php echo site_url('praja/get_sub_provinsi'); ?>",
        method: "POST",
        data: {
          kab_kota: kab_kota
        },
        async: true,
        dataType: 'json',
        success: function(data) {

          var html = " ";
          var i;
          for (i = 0; i < data.length; i++) {
            html += "<option value=" + "'" + data[i].nama_kabkota + "'" +">" + data[i].nama_kabkota + "</option>";
          }

          $('#kab_kota').html(html);

        }
      });
      return false;
    });

    $('#kab_kota').change(function() {
      var kecamatan = $(this).val();
      console.log(kecamatan);
      $.ajax({
        url: "<?php echo site_url('praja/get_sub_kabkota'); ?>",
        method: "POST",
        data: {
          kecamatan: kecamatan
        },
        async: true,
        dataType: 'json',
        success: function(data) {

          var html = " ";
          var i;
          for (i = 0; i < data.length; i++) {
            html += '<option value=' + "'" + data[i].nama_kecamatan + "'" + '>' + data[i].nama_kecamatan + '</option>';
          }
          $('#kecamatan').html(html);

        }
      });
      return false;
    });

  });
</script>