<div id="content" class="content">
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="<?php echo base_url('home');?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('kepegawaian');?>">Pegawai Negeri Sipil (PNS)</a></li>
  </ol>
  <h1 class="page-header">Data PNS</h1>
  <div class="row">
    <div class="col-xl-12">
      <div class="panel panel-inverse">
        <div class="panel-heading">
          <h4 class="panel-title">
            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus-square"></i></button> -->
            <a href="" class="btn btn-icon btn-sm btn-inverse" data-toggle="modal" data-target="#addpeg"><i class="fa fa-plus-square"></i></a>
          </h4>
          <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
          </div>
        </div>
        <div class="alert alert-warning fade show">
          <button type="button" class="close" data-dismiss="alert">
          <span aria-hidden="true">&times;</span>
          </button>
          <p>Tambah <b>Data PNS</b> Click icon "<i class="fa fa-plus-square"></i>"</p>
        </div>
        <?php if($this->session->flashdata('pns') != NULL){ ?>
        <div class="alert alert-success alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Notif!</strong> <?php echo $this->session->flashdata('pns') ?>
        </div>
        <?php } ?>
        <div class="panel-body">
          <table id="data-table-buttons" class="table table-striped table-bordered table-td-valign-middle">
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
                <td><?= $row->tanggal_lahir == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->tanggal_lahir ?></td>
                <td><?= $row->no_urut_pangkat == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->no_urut_pangkat ?></td>
                <td><?= $row->pangkat == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->pangkat ?></td>
                <td><?= $row->gol_ruang == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->gol_ruang ?></td>
                <td><?= $row->tmt_pangkat == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->tmt_pangkat ?></td>
                <td><?= $row->jabatan == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->jabatan ?></td>
                <td><?= $row->tmt_jabatan == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->tmt_jabatan ?></td>
                <td><?= $row->jurusan == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->jurusan ?></td>
                <td><?= $row->nama_pt == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->nama_pt ?></td>
                <td><?= $row->tahun_lulus == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->tahun_lulus ?></td>
                <td><?= $row->tingkat_pendidikan == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->tingkat_pendidikan ?></td>
                <td><?= $row->usia == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->usia ?></td>
                <td><?= $row->masa_kerja == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->masa_kerja ?></td>
                <td><?= $row->catatan_mutasi == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->catatan_mutasi ?></td>
                <td><?= $row->no_kapreg == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->no_kapreg ?></td>
                <td>
                    <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editpns<?php echo $row->no;?>"><i class="fa fas fa-edit"></i></a>
                    <a href="#" class="btn btn-sm btn-danger" style="color:#fff;cursor:pointer" data-toggle="modal" data-target="#hapuspns<?php echo $row->no;?>"><i class="fa fas fa-trash"></i></a>
                </td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
        <!-- end panel-body -->
      </div>
      <!-- end panel -->
    </div>
    <!-- end col-10 -->
  </div>
</div>