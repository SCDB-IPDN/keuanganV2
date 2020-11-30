<div id="content" class="content">
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="<?php echo base_url('home');?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('kepegawaian/dosen');?>">DOSEN</a></li>
  </ol>
  <h1 class="page-header"><?php echo $title ?></h1>
  <div class="row">
    <div class="col-xl-12">
      <div class="panel panel-inverse">
        <div class="panel-heading">
          <h4 class="panel-title">
            <?php if($this->session->userdata('role') == 'Admin' && $title == 'DATA DOSEN'){?>
            <span><a href="" class="btn btn-sm btn-white" data-toggle="modal" data-target="#adddosen">TAMBAH DOSEN</a></span>
            <span><a href="<?php echo base_url('kepegawaian/dosen/belum_nidn');?>" class="btn btn-sm btn-green">DETAIL BELUM NIDN</a></span>
            <span><a href="<?php echo base_url('kepegawaian/dosen/belum_serdos');?>" class="btn btn-sm btn-primary" >DETAIL BELUM SERDOS</a></span>
            <?php }else{ ?>
                <span><a href="<?php echo base_url('kepegawaian/dosen');?>" class="btn btn-sm btn-warning">KEMBALI</a></span>
            <?php } ?>
          </h4>
          <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a> -->
          </div>
        </div>
        <?php if($this->session->flashdata('dosen') != NULL){ ?>
        <div class="alert alert-success alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Notif!</strong> <?php echo $this->session->flashdata('dosen') ?>
        </div>
        <?php } ?>
        <div class="panel-body">
            <div class ="table-responsive">
                <table id="data-table-buttons" class="table table-striped table-bordered table-td-valign-middle" width="100%">
                    <thead>
                    <tr>
                        <th class="text-nowrap">NO</th>
                        <th class="text-nowrap">NAMA</th>
                        <th class="text-nowrap">NIP</th>
                        <th class="text-nowrap">NIDN</th>
                        <th class="text-nowrap">SERTIFIKASI DOSEN</th>
                        <th class="text-nowrap">BIDANG ILMU</th>
                        <th class="text-nowrap">NIK</th>
                        <th class="text-nowrap" width="10%">ALAMAT</th>
                        <th class="text-nowrap">JABATAN</th>
                        <th class="text-nowrap">PANGKAT(GOL)</th>
                        <th class="text-nowrap" width="6%">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        foreach($data as $row){
                        $no++;
                        ?>

                        <tr>
                            <td><?= $no == NULL ? "<i><font style='color:red;'>Data tidak ada</font></i>" : $no ?></td>
                            <td><?= $row->nama == NULL ? "<i><font style='color:red;'>Nama tidak ada</font></i>" : $row->nama ?></td>
                            <td><?= $row->nip == 0 ? "<i><font style='color:red;'>Nip tidak ada</font></i>" : $row->nip ?></td>
                            <td><?= $row->nidn == 0 ? "<i><font style='color:red;'>NIDN tidak ada</font></i>" : $row->nidn ?></td>
                            <td><?= $row->serdos == NULL ? "<i><font style='color:red;'>Data tidak ada</font></i>" : $row->serdos ?></td>
                            <td><?= $row->bidang_ilmu == NULL ? "<i><font style='color:red;'>Bidang Ilmu tidak ada</font></i>" : $row->bidang_ilmu ?></td>
                            <td><?= $row->nik == 0 ? "<i><font style='color:red;'>NIK tidak ada</font></i>" : $row->nik ?></td>
                            <td><?= $row->alamat == NULL ? "<i><font style='color:red;'>Alamat tidak ada</font></i>" : $row->alamat ?></td>
                            <td><?= $row->jabatan == NULL ? "<i><font style='color:red;'>Jabata tidak ada</font></i>" : $row->jabatan ?></td>
                            <td><?= $row->pangkat == NULL ? "<i><font style='color:red;'>Pangkat(Gol) tidak ada</font></i>" : $row->pangkat ?></td>
                            <?php if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'khusus'){?>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editdosen<?php echo $row->id_dosen;?>"><i class="fa fas fa-edit"></i></a>
                                <a href="#" class="btn btn-sm btn-danger" style="color:#fff;cursor:pointer" data-toggle="modal" data-target="#hapusdosen<?php echo $row->id_dosen;?>"><i class="fa fas fa-trash"></i></a>
                            </td>
                            <?php }else{?>
                                <td>-</td>
                            <?php } ?>
                        </tr>

                        <!-- Modal EDIT THL -->
                        <div class="modal fade" id="editdosen<?php echo $row->id_dosen;?>" tabindex="-1" role="dialog" aria-labelledby="editthll" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="editdosen">Edit DOSEN <?php echo $row->nama;?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="edit_dosen" method="POST">
                                            <input type="hidden" class="form-control" id="id_dosen" name="id_dosen" value="<?php echo $row->id_dosen;?>">
                                            <div class="form-group">
                                                <label class="col-form-label">NIK:</label>
                                                <input type="number" class="form-control" id="nik" name="nik" value="<?php echo $row->nik;?>" placeholder="NIK..">
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label">Nama: *</label>
                                                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row->nama;?>" placeholder="Nama Lengkap.." required>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm">
                                                        <label class="col-form-label">NIP:</label>
                                                        <input type="number" class="form-control" id="nip" name="nip" value="<?php echo $row->nip;?>" placeholder="NIP..">
                                                    </div>
                                                    <div class="col-sm">
                                                        <label class="col-form-label">NIDN:</label>
                                                        <input type="number" class="form-control" id="nidn" name="nidn" value="<?php echo $row->nidn;?>" placeholder="NIDN..">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label">SERTIFIKASI DOSEN:</label>
                                                <textarea  class="form-control" id="serdos" name="serdos" rows="3" cols="40"><?php echo $row->serdos;?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label">BIDANG ILMU:</label>
                                                <textarea  class="form-control" id="bidang_ilmu" name="bidang_ilmu" rows="3" cols="40"><?php echo $row->bidang_ilmu;?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label">Alamat:</label>
                                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $row->alamat;?>" placeholder="Alamat..">
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm">
                                                        <label class="col-form-label">Jabatan: *</label>
                                                        <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?php echo $row->jabatan;?>" placeholder="Jabatan.." required>
                                                    </div>
                                                    <div class="col-sm">
                                                        <label class="col-form-label">Pangkat(Gol): *</label>
                                                        <input type="text" class="form-control" id="pangkat" name="pangkat" value="<?php echo $row->pangkat;?>" placeholder="Pangkat(Gol).." required>
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

                        <!-- Modal HAPUS DOSEN -->
                        <div class="modal fade" id="hapusdosen<?php echo $row->id_dosen;?>" tabindex="-1" role="dialog" aria-labelledby="hapusdosen" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="hapusdosen">Hapus Data DOSEN</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" method="post" action="hapus_dosen">
                                            <div class="modal-body">
                                                <p>Anda yakin mau menghapus Data DOSEN <b><?php echo $row->nama;?></b></p>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" name="id_dosen" value="<?php echo $row->id_dosen;?>">
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
        <!-- end panel-body -->
      </div>
      <!-- end panel -->
    </div>
    <!-- end col-10 -->

    <!-- Modal ADD THL -->
    <div class="modal fade" id="adddosen" tabindex="-1" role="dialog" aria-labelledby="adddosen" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adddosen">TAMBAH DOSEN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="tambah_dosen" method="POST">
                        <div class="form-group">
                            <label class="col-form-label">NIK:</label>
                            <input type="number" class="form-control" id="nik" name="nik" placeholder="NIK..">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nama: *</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap.." required>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm">
                                    <label class="col-form-label">NIP:</label>
                                    <input type="number" class="form-control" id="nip" name="nip" placeholder="NIP..">
                                </div>
                                <div class="col-sm">
                                    <label class="col-form-label">NIDN:</label>
                                    <input type="number" class="form-control" id="nidn" name="nidn" placeholder="NIDN..">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">SERTIFIKASI DOSEN:</label>
                            <textarea  class="form-control" id="serdos" name="serdos" rows="3" cols="40"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">BIDANG ILMU:</label>
                            <textarea  class="form-control" id="bidang_ilmu" name="bidang_ilmu" rows="3" cols="40"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Alamat:</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat..">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm">
                                    <label class="col-form-label">Jabatan: *</label>
                                    <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan.." required>
                                </div>
                                <div class="col-sm">
                                    <label class="col-form-label">Pangkat(Gol): *</label>
                                    <input type="text" class="form-control" id="pangkat" name="pangkat" placeholder="Pangkat(Gol).." required>
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