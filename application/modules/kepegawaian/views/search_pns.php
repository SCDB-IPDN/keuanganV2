<div id="content" class="content">
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="<?php echo base_url('home');?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('kepegawaian');?>">Pegawai Negeri Sipil (PNS)</a></li>
  </ol>
  <h1 class="page-header">Data PNS Berdasarkan Penempatan</h1>

  <!-- TABEL -->
  <div class="row">
    <div class="col-xl-12">
      <div class="panel panel-inverse">
        <div class="panel-heading">
          <h4 class="panel-title">
            <?php
              $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
            ?>
            <span><a href="<?=$url?>" class="btn btn-sm btn-warning">KEMBALI</a></span>
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
            <table id="tbl-search-pns" class="table table-striped table-bordered table-td-valign-middle" width="100%">
                <thead>
                    <tr>
                    <th class="text-nowrap">No</th>
                    <th class="text-nowrap">NIP</th>
                    <th class="text-nowrap">Nama Lengkap</th>
                    <th class="text-nowrap">Bagian</th>
                    <th class="text-nowrap">Jabatan</th>
                    <th class="text-nowrap">Jabatan Lainnya</th>
                    <th class="text-nowrap">Penempatan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;
                    foreach($data as $row){
                        $no++; ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $row->nip ?></td>
                            <td><?= $row->nama_lengkap ?></td>
                            <td><?= $row->bagian ?></td>
                            <td><?= $row->jabatan ?></td>
                            <td><?= $row->jabatan_dosen ?></td>
                            <td><?= $row->penempatan ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END TABEL -->
  
  <script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
  <script>
      $(document).ready(function() {                   
          $('#tbl-search-pns').DataTable({
              responsive: true,
              retrieve: true,
              searching: false,
              dom: 'Bfrtip',
              buttons: ['excel']
          });
      });
  </script>
