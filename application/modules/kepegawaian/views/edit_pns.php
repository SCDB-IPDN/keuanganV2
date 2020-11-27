<div id="content" class="content">
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="<?php echo base_url('home');?>">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url('kepegawaian');?>">Data Pegawai Negeri Sipil (PNS)</a></li>
        <li class="breadcrumb-item"><a href="#">EDIT PNS (<?php echo $data[0]->nama_lengkap;?>)</a></li>
    </ol>
    <h3 class="page-header">&nbsp;</h3>
    <div class="row">
        <div class="col-xl-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        EDIT PNS (<?php echo $data[0]->nama_lengkap;?>)
                    </h4>
                    <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                    </div>
                </div>
                <div class ="table-responsive">
                    <div class="panel-body">
                        <form action="kepegawaian/edit_pns" method="POST">
                            <input type="hidden" class="form-control" id="no" name="no" value="<?php echo $data[0]->no?>">
                            <div class="form-group">
                                <div class="row">
                                <div class="col-sm-4">
                                    <label class="col-form-label">Nip:</label>
                                    <input type="text" class="form-control" id="nip" name="nip" value="<?php echo $data[0]->nip?>" placeholder="Nip.." required>
                                </div>
                                <div class="col-sm-8">
                                    <label class="col-form-label">Nama Lengkap:</label>
                                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?php echo $data[0]->nama_lengkap;?>" placeholder="Nama Lengkap.." required>
                                </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Bagian:</label>
                                <input type="text" class="form-control" id="bagian" name="bagian" value="<?php echo $data[0]->bagian;?>" placeholder="Bagian.." required>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                <div class="col-sm">
                                    <label class="col-form-label">Tempat Lahir:</label>
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?php echo $data[0]->tempat_lahir;?>" placeholder="Tempat Lahir.." required>
                                </div>
                                <div class="col-sm">
                                    <label class="col-form-label">Tanggal Lahir:</label>
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $data[0]->tanggal_lahir;?>" required>
                                </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                <div class="col-sm">
                                    <label class="col-form-label">No Urut:</label>
                                    <input type="text" class="form-control" id="no_urut_pangkat" name="no_urut_pangkat" placeholder="No Urut Pangkat.." value="<?php echo $data[0]->no_urut_pangkat;?>" required>
                                </div>
                                <div class="col-sm">
                                    <label class="col-form-label">Pangkat:</label>
                                    <input type="text" class="form-control" id="pangkat" name="pangkat" placeholder="Pangkat.." value="<?php echo $data[0]->pangkat;?>" required>
                                </div>
                                <div class="col-sm">
                                    <label class="col-form-label">Gol Ruang:</label>
                                    <input type="text" class="form-control" id="gol_ruang" name="gol_ruang" placeholder="Gol Ruang.." value="<?php echo $data[0]->gol_ruang;?>" required>
                                </div>
                                <div class="col-sm">
                                    <label class="col-form-label">TMT Pangkat:</label>
                                    <input type="date" class="form-control" id="tmt_pangkat" name="tmt_pangkat" placeholder="TMT Pangkat.." value="<?php echo $data[0]->tmt_pangkat;?>" required>
                                </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                <div class="col-sm">
                                    <label class="col-form-label">Jabatan:</label>
                                    <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan.." value="<?php echo $data[0]->jabatan;?>" required>
                                </div>
                                <div class="col-sm">
                                    <label class="col-form-label">TMT Jabatan:</label>
                                    <input type="date" class="form-control" id="tmt_jabatan" name="tmt_jabatan" placeholder="TMT Jabatan.." value="<?php echo $data[0]->tmt_jabatan;?>" required>
                                </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                <div class="col-sm">
                                    <label class="col-form-label">Jurusan:</label>
                                    <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Jurusan.." value="<?php echo $data[0]->jurusan;?>" required>
                                </div>
                                <div class="col-sm">
                                    <label class="col-form-label">Nama Perguruan Tinggi:</label>
                                    <input type="text" class="form-control" id="nama_pt" name="nama_pt" placeholder="Perguruan Tinggi.." value="<?php echo $data[0]->nama_pt;?>" required>
                                </div>
                                <div class="col-sm">
                                    <label class="col-form-label">Tahun Lulus:</label>
                                    <input type="text" class="form-control" id="tahun_lulus" name="tahun_lulus" placeholder="Tahun Lulus.." value="<?php echo $data[0]->tahun_lulus;?>" required>
                                </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                <div class="col-sm">
                                    <label class="col-form-label">Tingkat Pendidikan Terakhir:</label>
                                    <select class="form-control" id="tingkat_pendidikan" name="tingkat_pendidikan" required>
                                    <option disabled selected> Pilih </option>
                                    <?php foreach($tp as $rows){ ?>
                                        <?php if($rows->tingkat_pendidikan == $data[0]->tingkat_pendidikan){?>
                                        <option value="<?php echo $rows->tingkat_pendidikan ?>" selected><?php echo $rows->tingkat_pendidikan ?></option>
                                        <?php }else{ ?>
                                        <option value="<?php echo $rows->tingkat_pendidikan ?>"><?php echo $rows->tingkat_pendidikan ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                    </select>
                                </div>
                                <div class="col-sm">
                                    <label class="col-form-label">Masa Kerja:</label>
                                    <input type="text" class="form-control" id="masa_kerja" name="masa_kerja" placeholder="Masa Kerja.." value="<?php echo $data[0]->masa_kerja;?>" required>
                                </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Catatan Mutasi:</label>
                                <input type="text" class="form-control" id="catatan_mutasi" name="catatan_mutasi" placeholder="Catatan Mutasi.." value="<?php echo $data[0]->catatan_mutasi;?>">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                <div class="col-sm">
                                    <label class="col-form-label">No.Karpeg:</label>
                                    <input type="text" class="form-control" id="no_kapreg" name="no_kapreg" placeholder="No.Karpeg.." value="<?php echo $data[0]->no_kapreg;?>" required>
                                </div>
                                <div class="col-sm">
                                    <label class="col-form-label">Eselon:</label>
                                    <input type="text" class="form-control" id="eselon" name="eselon" placeholder="Eselon.." value="<?php echo $data[0]->eselon;?>">
                                </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="<?php echo base_url('kepegawaian');?>"><button type="button" class="btn btn-secondary">Kembali</button></a>
                                <button type="submit" class="btn btn-primary" value="Cek">Ubah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>