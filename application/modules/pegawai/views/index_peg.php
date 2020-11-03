<div id="content" class="content">
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">Pegawai</a></li>
  </ol>
  <h1 class="page-header">Data Pegawai</h1>
  <div class="row">
    <div class="col-xl-12">
      <div class="panel panel-inverse">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a href="index.php?m=user&s=user_add" target="_blank" class="btn btn-icon btn-sm btn-inverse"><i class="fa fa-plus-square"></i></a>
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
          <p>Silahkan input <b>Data Pegawai</b> Pada Button icon "<i class="fa fa-plus-square"></i>"</p>
        </div>
        <div class="panel-body">
          <table id="data-table-buttons" class="table table-striped table-bordered table-td-valign-middle">
            <thead>
              <tr>
                <th class="text-nowrap">No</th>
                <th class="text-nowrap">NIP</th>
                <th class="text-nowrap">Nama Lengkap</th>
                <th class="text-nowrap">Role</th>
                <th class="text-nowrap">Aksi</th>
              </tr>
            </thead>
            <tbody>
            <?php
                $no = 1;
                foreach($data as $row){
            ?>
            <tr>
                <td><?= $no == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $no ?></td>
                <td><?= $row->nip == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->nip ?></td>
                <td><?= $row->nama_user == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->nama_user ?></td>
                <td><?= $row->role == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->role ?></td>
                <td>
                    <a href="#" class="btn btn-sm btn-primary"><i class="fa fas fa-edit"></i></a>
                    <!-- <a href="#" class="btn btn-sm btn-secondary"><i class="fa fas fa-lock"></i></a> -->
                    <a onclick="#" class="btn btn-sm btn-danger" style="color:#fff;cursor:pointer"><i class="fa fas fa-trash"></i></a>
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