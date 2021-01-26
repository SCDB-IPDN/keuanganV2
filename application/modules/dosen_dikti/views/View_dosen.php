<div id="content" class="content">
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="<?php echo base_url('home');?>">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url('dosen_dikti');?>">Dosen</a></li>
    </ol>
    <h1 class="page-header">Data Dosen</h1>

    
    <div class="row">
        <!-- begin col-3 -->
        <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-globe fa-fw"></i></div>
                <div class="stats-content">
                    <div class="stats-title">BELUM NIDN</div>
                    <div class="stats-number"><?php echo $belum[0]->nidn;?> DOSEN</div>
                    <div class="stats-progress progress">
                        <div class="progress-bar" style="width: <?php echo $persentase_nidn;?>%;"></div>
                    </div>
                    <div class="stats-desc">Persentase NIDN (<?php echo $persentase_nidn;?>%)</div>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-black">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-users fa-fw"></i></div>
                <div class="stats-content">
                    <div class="stats-title">BELUM SERDOS</div>
                    <div class="stats-number"><?php echo $belum[0]->serdos;?> DOSEN</div>
                    <div class="stats-progress progress">
                        <div class="progress-bar" style="width: <?php echo $persentase_serdos;?>%;"></div>
                    </div>
                    <div class="stats-desc">Persentase SERDOS (<?php echo $persentase_serdos;?>%)</div>
                </div>
            </div>
        </div>
    </div>

    <!-- TABEL -->
    <div class="row">
        <div class="col-xl-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">
                    <?php if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'Akademik'){?>
                        <span><a href="" class="btn btn-sm btn-white" data-toggle="modal" data-target="#adddosen-dikti">TAMBAH DOSEN</a></span>
                    <?php } ?>
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
                        <table id="tbl-scdb-dosen-dikti" class="table table-striped table-bordered table-td-valign-middle" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-nowrap">No</th>
                                    <th class="text-nowrap" width="30%">AKSI</th>
                                    <th class="text-nowrap">NAMA</th>
                                    <th class="text-nowrap">TEMPAT LAHIR</th>
                                    <th class="text-nowrap">JENIS KELAMIN</th>
                                    <th class="text-nowrap">TANGGAL LAHIR</th>
                                    <th class="text-nowrap">AGAMA</th>
                                    <th class="text-nowrap">NAMA IBU</th>
                                    <th class="text-nowrap">STATUS AKTIF</th>
                                    <th class="text-nowrap">NIDN NUP NIDK</th>
                                    <th class="text-nowrap">NIK</th>
                                    <th class="text-nowrap">NIP</th>
                                    <th class="text-nowrap">NPWP</th>
                                    <th class="text-nowrap">IKATAN KERJA</th>
                                    <th class="text-nowrap">STATUS PEGAWAI</th>
                                    <th class="text-nowrap">JENIS PEGAWAI</th>
                                    <th class="text-nowrap">NO SK CPNS</th>
                                    <th class="text-nowrap">TANGGAL SK CPNS</th>
                                    <th class="text-nowrap">NO SK PENGANGKATAN</th>
                                    <th class="text-nowrap">TANGGAL SK PENGANGKATAN</th>
                                    <th class="text-nowrap">LEMBAGA PENGANGKATAN</th>
                                    <th class="text-nowrap">PANGKAT GOLONGAN</th>
                                    <th class="text-nowrap">SUMBER GAJI</th>
                                    <th class="text-nowrap">ALAMAT</th>
                                    <th class="text-nowrap">DUSUN</th>
                                    <th class="text-nowrap">RT</th>
                                    <th class="text-nowrap">RW</th>
                                    <th class="text-nowrap">KELURAHAN</th>
                                    <th class="text-nowrap">KODEPOS</th>
                                    <th class="text-nowrap">KECAMATAN</th>
                                    <th class="text-nowrap">TELEPON</th>
                                    <th class="text-nowrap">HP</th>
                                    <th class="text-nowrap">EMAIL</th>
                                    <th class="text-nowrap">STATUS PERNIKAHAN</th>
                                    <th class="text-nowrap">NAMA SUAMI/ISTRI</th>
                                    <th class="text-nowrap">NIP SUAMI/ISTRI</th>
                                    <th class="text-nowrap">TMT PNS</th>
                                    <th class="text-nowrap">PEKERJAAN</th>
                                    <th class="text-nowrap">MAMPU MENGHANDLE KEBUTUHAN KHUSUS</th>
                                    <th class="text-nowrap">MAMPU MENGHANDLE BRAILE</th>
                                    <th class="text-nowrap">MAMPU MENGHANDLE BAHASA ISYARAT</th>
                                    <th class="text-nowrap">SERTIFIKASI DOSEN</th>
                                    <th class="text-nowrap">BIDANG ILMU</th>
                                    <th class="text-nowrap">JABATAN</th>
                                    <th class="text-nowrap">SK JABATAN</th>
                                    <th class="text-nowrap">TMT JABATAN</th>
                                    <th class="text-nowrap">TAHUN AJARAN</th>
                                    <th class="text-nowrap">PERGURUAN TINGGI</th>
                                    <th class="text-nowrap">PROGRAM STUDI</th>
                                    <th class="text-nowrap">NO SURAT TUGAS</th>
                                    <th class="text-nowrap">TANGGAL SURAT TUGAS</th>
                                    <th class="text-nowrap">TMT SURAT TUGAS</th>
                                    <th class="text-nowrap">JUDUL PENELITIAN</th>
                                    <th class="text-nowrap">LEMBAGA</th>
                                    <th class="text-nowrap">TAHUN PENELITIAN</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END TABEL -->
</div>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="adddosen-dikti" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Dosen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="tambah_dosen_dikti" method="POST">
                    <center><img src="https://media2.giphy.com/media/j5zp4pe5GkGTbCpGw3/giphy.gif" width="40%" ></center>
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label class="col-form-label">Nama:</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama.." required>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label class="col-form-label">Tempat Lahir:</label>
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir.." required>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label class="col-form-label">Tanggal Lahir:</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="form-group">
                                <label class="col-form-label">Jenis Kelamin:</label>
                                <select name="jenis_kelamin" class="form-control" required>
                                    <option value="">Pilih...</option>
                                    <option value="L">L</option>
                                    <option value="P">P</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="form-group">
                                <label class="col-form-label">Agama:</label>
                                <select name="agama" class="form-control" required>
                                    <option value="">Pilih...</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Protestan">Protestan</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label class="col-form-label">Nama Ibu:</label>
                                <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" placeholder="Nama Ibu.." required>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="form-group">
                                <label class="col-form-label">Status Aktif:</label>
                                <select name="status_aktif" class="form-control" required>
                                    <option value="">Pilih...</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label class="col-form-label">NIDN/NUP/NIDK:</label>
                                <input type="number" class="form-control" id="nidn_nup_nidk" name="nidn_nup_nidk" placeholder="NIDN/NUP/NIDK.." required>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label class="col-form-label">NIK:</label>
                                <input type="number" class="form-control" id="nik" name="nik" placeholder="NIK.." required>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label class="col-form-label">NPWP:</label>
                                <input type="number" class="form-control" id="npwp" name="npwp" placeholder="NPWP.." required>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label class="col-form-label">Ikatan Kerja:</label>
                                <input type="text" class="form-control" id="ikatan_kerja" name="ikatan_kerja" placeholder="Ikatan Kerja.." required>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label class="col-form-label">Status Pegawai:</label>
                                <input type="text" class="form-control" id="status_pegawai" name="status_pegawai" placeholder="Status Pegawai.." required>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label class="col-form-label">Jenis Pegawai:</label>
                                <input type="text" class="form-control" id="jenis_pegawai" name="jenis_pegawai" placeholder="Jenis Pegawai.." required>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label class="col-form-label">NO SK CPNS:</label>
                                <input type="number" class="form-control" id="no_sk_cpns" name="no_sk_cpns" placeholder="No SK CPNS.." required>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label class="col-form-label">TANGGAL SK CPNS:</label>
                                <input type="date" class="form-control" id="tanggal_sk_cpns" name="tanggal_sk_cpns" required>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" value="Cek">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Manage -->
<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/app-manage.js');?>"></script>