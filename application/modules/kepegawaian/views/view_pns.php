<div id="content" class="content">
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="<?php echo base_url('home');?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('kepegawaian');?>">Pegawai Negeri Sipil (PNS)</a></li>
  </ol>
  <h1 class="page-header">Data PNS</h1>

  <!-- TABEL -->
  <div class="row">
    <div class="col-xl-12">
      <div class="panel panel-inverse">
        <div class="panel-heading">
          <h4 class="panel-title">
          <?php if($this->session->userdata('role') == 'Admin'){?>
            <a href="" class="btn btn-icon btn-sm btn-inverse" data-toggle="modal" data-target="#addpns"><i class="fa fa-plus-square"></i></a>
          <?php } ?>
          </h4>
          <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
          </div>
        </div>
        <?php if($this->session->userdata('role') == 'Admin'){?>
        <div class="alert alert-warning fade show">
          <button type="button" class="close" data-dismiss="alert">
          <span aria-hidden="true">&times;</span>
          </button>
          <p>Tambah <b>Data PNS</b> Click icon "<i class="fa fa-plus-square"></i>"</p>
        </div>
        <?php } ?>
        <?php if($this->session->flashdata('pns') != NULL){ ?>
        <div class="alert alert-success alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Notif!</strong> <?php echo $this->session->flashdata('pns') ?>
        </div>
        <?php } ?>
        
        <div class="table-responsive">
          <div class="panel-body">
            <table id="data-table-buttons" class="table table-striped table-bordered table-td-valign-middle" width="100%">
              <thead>
                <tr>
                  <th class="text-nowrap">No</th>
                  <th class="text-nowrap">NIP</th>
                  <th class="text-nowrap">Nama Lengkap</th>
                  <th class="text-nowrap">Bagian</th>
                  <th class="text-nowrap">Tempat Lahir</th>
                  <th class="text-nowrap">Tanggal Lahir</th>
                  <th class="text-nowrap">No Urut Pangkat</th>
                  <th class="text-nowrap">Pangkat</th>
                  <th class="text-nowrap">Gol Ruang</th>
                  <th class="text-nowrap">TMT Pangkat</th>
                  <th class="text-nowrap">Jabatan</th>
                  <th class="text-nowrap">TMT Jabatan</th>
                  <th class="text-nowrap">Jurusan</th>
                  <th class="text-nowrap">Nama Perguruan Tinggi</th>
                  <th class="text-nowrap">Tahun Lulus</th>
                  <th class="text-nowrap">Tingkat Pendidikan</th>
                  <th class="text-nowrap">Usia</th>
                  <th class="text-nowrap">Masa Kerja</th>
                  <th class="text-nowrap">Catatan Mutasi</th>
                  <th class="text-nowrap">No Kapreg</th>
                  <th class="text-nowrap">Eselon</th>
                  <th class="text-nowrap">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no = 0;
                  foreach($data as $row){
                  $no++;
                ?>

                <tr>
                  <td><?= $no == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $no ?></td>
                  <td><?= $row->nip == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->nip ?></td>
                  <td><?= $row->nama_lengkap == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->nama_lengkap ?></td>
                  <td><?= $row->bagian == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->bagian ?></td>
                  <td><?= $row->tempat_lahir == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->tempat_lahir ?></td>
                  <td><?= date('d/m/Y', strtotime($row->tanggal_lahir)) == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : date('d/m/Y', strtotime($row->tanggal_lahir)) ?></td>
                  <td><?= $row->no_urut_pangkat == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->no_urut_pangkat ?></td>
                  <td><?= $row->pangkat == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->pangkat ?></td>
                  <td><?= $row->gol_ruang == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->gol_ruang ?></td>
                  <td><?= date('d/m/Y', strtotime($row->tmt_pangkat)) == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : date('d/m/Y', strtotime($row->tmt_pangkat)) ?></td>
                  <td><?= $row->jabatan == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->jabatan ?></td>
                  <td><?= date('d/m/Y', strtotime($row->tmt_jabatan)) == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : date('d/m/Y', strtotime($row->tmt_jabatan)) ?></td>
                  <td><?= $row->jurusan == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->jurusan ?></td>
                  <td><?= $row->nama_pt == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->nama_pt ?></td>
                  <td><?= $row->tahun_lulus == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->tahun_lulus ?></td>
                  <td><?= $row->tingkat_pendidikan == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->tingkat_pendidikan ?></td>
                  <td><?= $row->usia == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->usia ?></td>
                  <td><?= $row->masa_kerja == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->masa_kerja ?></td>
                  <td><?= $row->catatan_mutasi == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->catatan_mutasi ?></td>
                  <td><?= $row->no_kapreg == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->no_kapreg ?></td>
                  <td><?= $row->eselon == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->eselon ?></td>
                  <?php if($this->session->userdata('role') == 'Admin'){?>
                  <td>
                      <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editpns<?php echo $row->no;?>"><i class="fa fas fa-edit"></i></a>
                      <a href="#" class="btn btn-sm btn-danger" style="color:#fff;cursor:pointer" data-toggle="modal" data-target="#hapuspns<?php echo $row->no;?>"><i class="fa fas fa-trash"></i></a>
                  </td>
                  <?php }else{?>
                      <td>-</td>
                  <?php } ?>
                </tr>

                <!-- Modal EDIT PNS -->
                <div class="modal fade" id="editpns<?php echo $row->no;?>" tabindex="-1" role="dialog" aria-labelledby="editpnss" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="editpnss">Edit PNS <?php echo $row->nama_lengkap;?></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      </div>
                      <div class="modal-body">
                        <form action="kepegawaian/edit_pns" method="POST">
                          <input type="hidden" class="form-control" id="no" name="no" value="<?php echo $row->no?>">
                          <div class="form-group">
                            <div class="row">
                              <div class="col-sm-4">
                                <label class="col-form-label">Nip:</label>
                                <input type="text" class="form-control" id="nip" name="nip" value="<?php echo $row->nip?>" placeholder="Nip.." required>
                              </div>
                              <div class="col-sm-8">
                                <label class="col-form-label">Nama Lengkap:</label>
                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?php echo $row->nama_lengkap;?>" placeholder="Nama Lengkap.." required>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="col-form-label">Bagian:</label>
                              <input type="text" class="form-control" id="bagian" name="bagian" value="<?php echo $row->bagian;?>" placeholder="Bagian.." required>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-sm">
                                  <label class="col-form-label">Tempat Lahir:</label>
                                  <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?php echo $row->tempat_lahir;?>" placeholder="Tempat Lahir.." required>
                              </div>
                              <div class="col-sm">
                                  <label class="col-form-label">Tanggal Lahir:</label>
                                  <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $row->tanggal_lahir;?>" required>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-sm">
                                <label class="col-form-label">No Urut:</label>
                                <input type="text" class="form-control" id="no_urut_pangkat" name="no_urut_pangkat" placeholder="No Urut Pangkat.." value="<?php echo $row->no_urut_pangkat;?>" required>
                              </div>
                              <div class="col-sm">
                                <label class="col-form-label">Pangkat:</label>
                                <input type="text" class="form-control" id="pangkat" name="pangkat" placeholder="Pangkat.." value="<?php echo $row->pangkat;?>" required>
                              </div>
                              <div class="col-sm">
                                <label class="col-form-label">Gol Ruang:</label>
                                <input type="text" class="form-control" id="gol_ruang" name="gol_ruang" placeholder="Gol Ruang.." value="<?php echo $row->gol_ruang;?>" required>
                              </div>
                              <div class="col-sm">
                                <label class="col-form-label">TMT Pangkat:</label>
                                <input type="date" class="form-control" id="tmt_pangkat" name="tmt_pangkat" placeholder="TMT Pangkat.." value="<?php echo $row->tmt_pangkat;?>" required>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-sm">
                                <label class="col-form-label">Jabatan:</label>
                                <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan.." value="<?php echo $row->jabatan;?>" required>
                              </div>
                              <div class="col-sm">
                                <label class="col-form-label">TMT Jabatan:</label>
                                <input type="date" class="form-control" id="tmt_jabatan" name="tmt_jabatan" placeholder="TMT Jabatan.." value="<?php echo $row->tmt_jabatan;?>" required>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-sm">
                                <label class="col-form-label">Jurusan:</label>
                                <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Jurusan.." value="<?php echo $row->jurusan;?>" required>
                              </div>
                              <div class="col-sm">
                                <label class="col-form-label">Nama Perguruan Tinggi:</label>
                                <input type="text" class="form-control" id="nama_pt" name="nama_pt" placeholder="Perguruan Tinggi.." value="<?php echo $row->nama_pt;?>" required>
                              </div>
                              <div class="col-sm">
                                <label class="col-form-label">Tahun Lulus:</label>
                                <input type="text" class="form-control" id="tahun_lulus" name="tahun_lulus" placeholder="Tahun Lulus.." value="<?php echo $row->tahun_lulus;?>" required>
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
                                    <?php if($rows->tingkat_pendidikan == $row->tingkat_pendidikan){?>
                                    <option value="<?php echo $rows->tingkat_pendidikan ?>" selected><?php echo $rows->tingkat_pendidikan ?></option>
                                    <?php }else{ ?>
                                    <option value="<?php echo $rows->tingkat_pendidikan ?>"><?php echo $rows->tingkat_pendidikan ?></option>
                                    <?php } ?>
                                  <?php } ?>
                                </select>
                              </div>
                              <div class="col-sm">
                                <label class="col-form-label">Masa Kerja:</label>
                                <input type="text" class="form-control" id="masa_kerja" name="masa_kerja" placeholder="Masa Kerja.." value="<?php echo $row->masa_kerja;?>" required>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-form-label">Catatan Mutasi:</label>
                            <input type="text" class="form-control" id="catatan_mutasi" name="catatan_mutasi" placeholder="Catatan Mutasi.." value="<?php echo $row->catatan_mutasi;?>">
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-sm">
                                <label class="col-form-label">No.Karpeg:</label>
                                <input type="text" class="form-control" id="no_kapreg" name="no_kapreg" placeholder="No.Karpeg.." value="<?php echo $row->no_kapreg;?>" required>
                              </div>
                              <div class="col-sm">
                                <label class="col-form-label">Eselon:</label>
                                <input type="text" class="form-control" id="eselon" name="eselon" placeholder="Eselon.." value="<?php echo $row->eselon;?>">
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" value="Cek">Ubah</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Modal HAPUS PNS -->
                <div class="modal fade" id="hapuspns<?php echo $row->no;?>" tabindex="-1" role="dialog" aria-labelledby="hapuspnss" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                      <h5 class="modal-title" id="hapuspnss">Hapus Data PNS</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                      <div class="modal-body">
                        <form class="form-horizontal" method="post" action="kepegawaian/hapus_pns">
                          <div class="modal-body">
                            <p>Anda yakin mau menghapus Data PNS <b><?php echo $row->nip;?></b></p>
                          </div>
                          <div class="modal-footer">
                            <input type="hidden" name="nip" value="<?php echo $row->nip;?>">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button class="btn btn-danger">Hapus</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

                <?php } ?>
                <!-- END FOREACH -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END TABEL -->

  <!-- Modal ADD PNS -->
  <div class="modal fade" id="addpns" tabindex="-1" role="dialog" aria-labelledby="addpnss" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addpnss">Tambah PNS</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <form action="kepegawaian/tambah_pns" method="POST">
            <div class="form-group">
              <div class="row">
                <div class="col-sm-4">
                  <label class="col-form-label">Nip:</label>
                  <input type="text" class="form-control" id="nip" name="nip" placeholder="Nip.." required>
                </div>
                <div class="col-sm-8">
                  <label class="col-form-label">Nama Lengkap:</label>
                  <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap.." required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-form-label">Bagian:</label>
              <input type="text" class="form-control" id="bagian" name="bagian" placeholder="Bagian.." required>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm">
                    <label class="col-form-label">Tempat Lahir:</label>
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir.." required>
                </div>
                <div class="col-sm">
                    <label class="col-form-label">Tanggal Lahir:</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm">
                  <label class="col-form-label">No Urut:</label>
                  <input type="text" class="form-control" id="no_urut_pangkat" name="no_urut_pangkat" placeholder="No Urut Pangkat.." required>
                </div>
                <div class="col-sm">
                  <label class="col-form-label">Pangkat:</label>
                  <input type="text" class="form-control" id="pangkat" name="pangkat" placeholder="Pangkat.." required>
                </div>
                <div class="col-sm">
                  <label class="col-form-label">Gol Ruang:</label>
                  <input type="text" class="form-control" id="gol_ruang" name="gol_ruang" placeholder="Gol Ruang.." required>
                </div>
                <div class="col-sm">
                  <label class="col-form-label">TMT Pangkat:</label>
                  <input type="date" class="form-control" id="tmt_pangkat" name="tmt_pangkat" placeholder="TMT Pangkat.." required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm">
                  <label class="col-form-label">Jabatan:</label>
                  <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan.." required>
                </div>
                <div class="col-sm">
                  <label class="col-form-label">TMT Jabatan:</label>
                  <input type="date" class="form-control" id="tmt_jabatan" name="tmt_jabatan" placeholder="TMT Jabatan.." required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm">
                  <label class="col-form-label">Jurusan:</label>
                  <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Jurusan.." required>
                </div>
                <div class="col-sm">
                  <label class="col-form-label">Nama Perguruan Tinggi:</label>
                  <input type="text" class="form-control" id="nama_pt" name="nama_pt" placeholder="Perguruan Tinggi.." required>
                </div>
                <div class="col-sm">
                  <label class="col-form-label">Tahun Lulus:</label>
                  <input type="text" class="form-control" id="tahun_lulus" name="tahun_lulus" placeholder="Tahun Lulus.." required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm">
                  <label class="col-form-label">Tingkat Pendidikan Terakhir:</label>
                  <select class="form-control" id="tingkat_pendidikan" name="tingkat_pendidikan" required>
                      <option disabled selected> Pilih </option>
                      <?php foreach($tp as $rows){?>
                          <option value="<?php echo $rows->tingkat_pendidikan ?>"><?php echo $rows->tingkat_pendidikan ?></option>
                      <?php } ?>
                  </select>
                </div>
                <label class="col-form-label">Masa Kerja:</label>
                <div class="col-sm">
                  <div class="form-group">
                    <input type="number" class="form-control" id="thn" name="thn" placeholder="Tahun.." required>
                  </div>
                  <div class="form-group">
                    <input type="number" class="form-control" id="bln" name="bln" max="12" placeholder="Bulan.." required>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-form-label">Catatan Mutasi:</label>
              <input type="text" class="form-control" id="catatan_mutasi" name="catatan_mutasi" placeholder="Catatan Mutasi..">
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm">
                  <label class="col-form-label">No.Karpeg:</label>
                  <input type="text" class="form-control" id="no_kapreg" name="no_kapreg" placeholder="No.Karpeg.." required>
                </div>
                <div class="col-sm">
                  <label class="col-form-label">Eselon:</label>
                  <input type="text" class="form-control" id="eselon" name="eselon" placeholder="Eselon..">
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
</div>