<link rel="stylesheet" href="<?php echo base_url() . 'assets/js/morris.css' ?>">
<div id="content" class="content">
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url('d_praja'); ?>">Edit Praja </a></li>

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
                <div class="table-responsive">
                    <div class="panel-body">

                        <form action="d_praja/view_edit" method="POST">
                            <h3> DATA DIRI </h3>
                            <br>
                            <h5> Nama : <?php echo $data[0]->nama ?> </h5>
                            <div class="row">
                                <div class="col-2">
                                    <label for="basic-url">NIK</label>
                                    <input type="text" class="form-control" value="<?php echo $data[0]->nik_praja  == NULL ? "-" : $data[0]->nik_praja ?>" readonly>
                                </div>
                                <div class="col-2">
                                    <label for="basic-url">No SPCP</label>
                                    <input type="text" class="form-control" value="<?php echo $data[0]->no_spcp == NULL ? "-" : $data[0]->no_spcp ?>" readonly>
                                </div>
                                <div class="col-2">
                                    <label for="basic-url">NISN</label>
                                    <input type="text" class="form-control" value="<?php echo $data[0]->nisn == NULL ? "-" : $data[0]->nisn ?>" readonly>
                                </div>

                                <div class="col-2">
                                    <label for="basic-url">Tempat Lahir</label>
                                    <input type="text" class="form-control" value="<?php echo $data[0]->tmpt_lahir == NULL ? "-" : $data[0]->tmpt_lahir ?>" readonly>
                                </div>
                                <div class="col-2">
                                    <label for="basic-url">Tanggal Lahir</label>
                                    <input type="date" class="form-control" value="<?php echo $data[0]->tgl_lahir == NULL ? "-" : $data[0]->tgl_lahir ?>" readonly>
                                </div>
                                <div class="col-2">
                                    <label for="basic-url">Agama</label>
                                    <input type="text" class="form-control" value="<?php echo $data[0]->agama == NULL ? "-" : $data[0]->agama ?>" readonly>
                                </div>
                                <div class="col-4">
                                    <br>
                                    <label for="basic-url">Alamat</label>
                                    <input type="text" class="form-control" value="<?php echo $data[0]->alamat == NULL ? "-" : $data[0]->alamat ?>">
                                </div>
                                <div class="col-1">
                                    <br>
                                    <label for="basic-url">RT</label>
                                    <input type="text" class="form-control" value="<?php echo $data[0]->rt == NULL ? "-" : $data[0]->rt ?>">
                                </div>
                                <div class="col-1">
                                    <br>
                                    <label for="basic-url">RW</label>
                                    <input type="text" class="form-control" value="<?php echo $data[0]->rw == NULL ? "-" : $data[0]->rw ?>">
                                </div>
                                <div class="col-2">
                                    <br>
                                    <label for="basic-url">Nama Dusun</label>
                                    <input type="text" class="form-control" value="<?php echo $data[0]->nama_dusun == NULL ? "-" : $data[0]->nama_dusun ?>">
                                </div>
                                <div class="col-2">
                                    <br>
                                    <label for="basic-url">Kelurahan</label>
                                    <input type="text" class="form-control" value="<?php echo $data[0]->kelurahan == NULL ? "-" : $data[0]->kelurahan ?>">
                                </div>
                                <div class="col-2">
                                    <br>
                                    <label for="basic-url">Kecamatan</label>
                                    <input type="text" class="form-control" value="<?php echo $data[0]->kecamatan == NULL ? "-" : $data[0]->kecamatan ?>">
                                </div>
                                <div class="col-1">
                                    <br>
                                    <label for="basic-url">Kode Pos</label>
                                    <input type="text" class="form-control" value="<?php echo $data[0]->kode_pos == NULL ? "-" : $data[0]->kode_pos ?>">
                                </div>
                                <div class="col-1">
                                    <br>
                                    <label for="basic-url">Kab/Kota</label>
                                    <input type="text" class="form-control" value="<?php echo $data[0]->kab_kota == NULL ? "-" : $data[0]->kab_kota ?>">
                                </div>
                                <div class="col-2">
                                    <br>
                                    <label for="basic-url">Provinsi</label>
                                    <input type="text" class="form-control" value="<?php echo $data[0]->provinsi == NULL ? "-" : $data[0]->provinsi ?>">
                                </div>
                                <div class="col-2">
                                    <br>
                                    <label for="basic-url">Jenis Tinggal</label>
                                    <input type="text" class="form-control" value="<?php echo $data[0]->jenis_tinggal == NULL ? "-" : $data[0]->jenis_tinggal ?>" readonly>
                                </div>
                                <div class="col-1">
                                    <br>
                                    <label for="basic-url">Alat Transportasi</label>
                                    <input type="text" class="form-control" value="<?php echo $data[0]->alat_transport == NULL ? "-" : $data[0]->alat_transport ?>" readonly>
                                </div>
                                <div class="col-1">
                                    <br>
                                    <label for="basic-url">TLP Rumah</label>
                                    <input type="text" class="form-control" value="<?php echo $data[0]->tlp_rumah == NULL ? "-" : $data[0]->tlp_rumah ?>">
                                </div>
                                <div class="col-1">
                                    <br>
                                    <label for="basic-url">TLP Pribadi</label>
                                    <input type="text" class="form-control" value="<?php echo $data[0]->tlp_pribadi == NULL ? "-" : $data[0]->tlp_pribadi ?>">
                                </div>
                                <div class="col-3">
                                    <br>
                                    <label for="basic-url">Email</label>
                                    <input type="text" class="form-control" value="<?php echo $data[0]->email == NULL ? "-" : $data[0]->email ?>">
                                </div>
                                <div class="col-1">
                                    <br>
                                    <label for="basic-url">Kewarganegaraan</label>
                                    <input type="text" class="form-control" value="<?php echo $data[0]->kewarganegaraan == NULL ? "-" : $data[0]->kewarganegaraan ?>" readonly>
                                </div>
                                <div class="col-1">
                                    <br>
                                    <label for="basic-url">Penerima PKS</label>
                                    <input type="text" class="form-control" value="<?php echo $data[0]->kode_prodi == NULL ? "-" : $data[0]->kode_prodi ?>" readonly>
                                </div>
                                <div class="col-2">
                                    <br>
                                    <label for="basic-url">No PKS</label>
                                    <input type="text" class="form-control" value="<?php echo $data[0]->no_pks == NULL ? "-" : $data[0]->no_pks ?>" readonly>
                                </div>
                                <div class="col-2">
                                    <br>
                                    <label for="basic-url">Kode Prodi</label>
                                    <input type="text" class="form-control" value="<?php echo $data[0]->kode_prodi == NULL ? "-" : $data[0]->kode_prodi ?>" readonly>
                                </div>
                                <div class="col-2">
                                    <br>
                                    <label for="basic-url">Jenis Pendaftaran</label>
                                    <input type="text" class="form-control" value="<?php echo $data[0]->jenis_pendaftaran == NULL ? "-" :  $data[0]->jenis_pendaftaran ?>" readonly>
                                </div>
                                <div class="col-2">
                                    <br>
                                    <label for="basic-url">Tanggal Masuk Kuliah</label>
                                    <input type="date" class="form-control" value="<?php echo $data[0]->tgl_masuk_kuliah == NULL ? "-" : $data[0]->tgl_masuk_kuliah ?>" readonly>
                                </div>
                                <div class="col-2">
                                    <br>
                                    <label for="basic-url">Tahun Masuk Kuliah</label>
                                    <input type="text" class="form-control" value="<?php echo $data[0]->tahun_masuk_kuliah == NULL ? "-" : $data[0]->tahun_masuk_kuliah ?>" readonly>
                                </div>
                                <div class="col-2">
                                    <br>
                                    <label for="basic-url">Pembiayaan</label>
                                    <input type="text" class="form-control" value="<?php echo $data[0]->pembiayaan == NULL ? "-" : $data[0]->pembiayaan ?>" readonly>
                                </div>
                                <div class="col-2">
                                    <br>
                                    <label for="basic-url">Jalur Masuk</label>
                                    <input type="text" class="form-control" value="<?php echo $data[0]->jalur_masuk  == NULL ? "-" : $data[0]->jalur_masuk ?>" readonly>
                                </div>
                                <div class="col-2">
                                    <br>
                                    <label for="basic-url">Tingkat</label>
                                    <input type="text" class="form-control" value="<?php echo $data[0]->tingkat == NULL ? "-" : $data[0]->tingkat ?>" readonly>
                                </div>
                                <div class="col-2">
                                    <br>
                                    <label for="basic-url">Angkatan</label>
                                    <input type="text" class="form-control" value="<?php echo $data[0]->angkatan == NULL ? "-" : $data[0]->angkatan ?>" readonly>
                                </div>
                                <div class="col-2">
                                    <br>
                                    <label for="basic-url">Status sebelumnya: <?php echo $data[0]->status; ?> </label>
                                    <select class="form-control" name="status" id="status" required="">
                                        <option value="aktif">Aktif</option>
                                        <option value="cuti">Cuti</option>
                                        <option value="diberhentikan">Diberhentikan</option>
                                        <option value="turuntingkat">Turun Tingkat</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <br>
                            <h3> DATA ORANG TUA </h3>
                            <br>
                            <div class="row">
                                <div class="col-2">
                                    <label for="basic-url">Nama Ayah</label>
                                    <input type="text" class="form-control" value="<?php echo $data[0]->nama_ayah == NULL ? "-" : $data[0]->nama_ayah ?>" readonly>
                                </div>
                                <div class="col-2">
                                    <label for="basic-url">NIK Ayah</label>
                                    <input type="text" class="form-control" value="<?php echo $data[0]->nik_ayah == NULL ? "-" : $data[0]->nik_ayah ?>" readonly>
                                </div>
                                <div class="col-2">
                                    <label for="basic-url">Tanggal Lahir Ayah </label>
                                    <input type="date" class="form-control" value="<?php echo $data[0]->tgllahir_ayah == NULL ? "-" : $data[0]->tgllahir_ayah ?>" readonly>
                                </div>
                                <div class="col-2">
                                    <label for="basic-url">Pekerjaan Ayah</label>
                                    <input type="text" class="form-control" value="<?php echo $data[0]->pekerjaan_ayah == NULL ? "-" : $data[0]->pekerjaan_ayah ?>" readonly>
                                </div>
                                <div class="col-2">
                                    <label for="basic-url">Pengahasilan Ayah</label>
                                    <input type="text" class="form-control" value="<?php echo $data[0]->penghasilan_ayah == NULL ? "-" : $data[0]->penghasilan_ayah ?>" readonly>
                                </div>
                                <div class="col-1">
                                    <label for="basic-url">No Tlp Ayah</label>
                                    <input type="text" class="form-control" value="<?php echo $data[0]->tlp_ayah == NULL ? "-" : $data[0]->tlp_ayah ?>" readonly>
                                </div>
                                <div class="col-2">
                                    <br>
                                    <label for="basic-url">Nama Ibu</label>
                                    <input type="text" class="form-control" value="<?php echo $data[0]->nama_ibu == NULL ? "-" : $data[0]->nama_ibu ?>" readonly>
                                </div>
                                <div class="col-2">
                                    <br>
                                    <label for="basic-url">NIK Ibu</label>
                                    <input type="text" class="form-control" value="<?php echo $data[0]->nik_ibu == NULL ? "-" : $data[0]->nik_ibu ?>" readonly>
                                </div>
                                <div class="col-2">
                                    <br>
                                    <label for="basic-url">Tanggal Lahir Ibu </label>
                                    <input type="date" class="form-control" value="<?php echo $data[0]->tgllahir_ibu == NULL ? "-" : $data[0]->tgllahir_ibu ?>" readonly>
                                </div>
                                <div class="col-2">
                                    <br>
                                    <label for="basic-url">Pekerjaan Ibu</label>
                                    <input type="text" class="form-control" value="<?php $data[0]->pekerjaan_ibu == NULL ? "-" : $data[0]->pekerjaan_ibu ?>" readonly>
                                </div>
                                <div class="col-2">
                                    <br>
                                    <label for="basic-url">Pengahasilan Ibu</label>
                                    <input type="text" class="form-control" value="<?php echo $data[0]->penghasilan_ibu == NULL ? "-" :  $data[0]->penghasilan_ibu ?>" readonly>
                                </div>
                                <div class="col-1">
                                    <br>
                                    <label for="basic-url">No Tlp Ibu</label>
                                    <input type="text" class="form-control" value="<?php echo $data[0]->tlp_ibu == NULL ? "-" :  $data[0]->tlp_ibu ?>" readonly>
                                </div>
                            </div>
                            <br>
                            <br>
                            <h3> DATA WALI </h3>
                            <br>
                            <div class="row">
                                <div class="col-2">
                                    <label for="basic-url">Nama Wali</label>
                                    <input type="text" class="form-control" value="<?php echo $data[0]->nama_wali == NULL ? "-" : $data[0]->nama_wali ?>" readonly>
                                </div>
                                <div class="col-2">
                                    <label for="basic-url">NIK Wali</label>
                                    <input type="text" class="form-control" value="<?php echo $data[0]->nik_wali == NULL ? "-" :  $data[0]->nik_wali ?>" readonly>
                                </div>
                                <div class="col-2">
                                    <label for="basic-url">Tanggal Lahir Wali </label>
                                    <input type="date" class="form-control" value="<?php echo $data[0]->tgllahir_wali == NULL ? "-" : $data[0]->tgllahir_wali ?>" readonly>
                                </div>
                                <div class="col-2">
                                    <label for="basic-url">Pendidikan Wali</label>
                                    <input type="text" class="form-control" value="<?php echo $data[0]->pendidikan_wali == NULL ? "-" :  $data[0]->pendidikan_wali ?>" readonly>
                                </div>
                                <div class="col-2">
                                    <label for="basic-url">Pekerjaan Wali</label>
                                    <input type="text" class="form-control" value="<?php echo $data[0]->pekerjaan_wali == NULL ? "-" : $data[0]->pekerjaan_wali ?>" readonly>
                                </div>
                                <div class="col-2">
                                    <label for="basic-url">Pengahasilan Wali</label>
                                    <input type="text" class="form-control" value="<?php echo $data[0]->penghasilan_wali == NULL ? "-" :  $data[0]->penghasilan_wali ?>" readonly>
                                </div>
                                <div class="col-2">
                                    <br>
                                    <label for="basic-url">No Tlp Wali</label>
                                    <input type="text" class="form-control" value="<?php echo $data[0]->tlp_wali == NULL ? "-" : $data[0]->tlp_wali ?>" readonly>
                                </div>
                                <br>
                                <br>
                                <div class="footer">
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <a href="<?php echo base_url('d_praja'); ?>"><button type="button" class="btn btn-secondary">Kembali</button></a>
                                    <button type="submit" class="btn btn-primary" value="Cek">Ubah</button>
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