<div id="content" class="content">
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('view_alumni'); ?>">All Alumni</a></li>
  </ol>
  <h1 class="page-header">Alumni</h1>
  <center><img src="<?php echo base_url() . 'assets/img/alumni.png' ?>" width="30%" ></center>
  <!-- TABEL -->
  <div class="row"> 
    <div class="col-xl-12">
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
        <?php if ($this->session->flashdata('alumni') != NULL) { ?>
          <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Notif!</strong> <?php echo $this->session->flashdata('alumni') ?>
          </div>
        <?php } ?>
        <div class="panel-body">

          <table id="tbl-alumni" class="table table-striped table-bordered table-td-valign-middle" width="100%">
            <thead>
              <tr>
                <th>No</th>
                <th>NAMA</th>
                <th>JENIS KELAMIN</th>
                <th>INSTITUSI</th>
                <th>ANGKATAN</th>
                <th>INSTANSI</th>
                <th>JABATAN</th>
                <th>PROVINSI</th>
                <th>OPSI</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- END TABEL -->

  <!-- Modal Edit -->
  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-alumni" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ubah Data Alumni</h4>
          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
        </div>
        <form class="form-horizontal" action="<?php echo base_url('d_praja/edit_alumni') ?>" method="POST" enctype="multipart/form-data" role="form">
          <div class="modal-body">
            <div class="form-group">
              <label class="col-form-label">Nama Alumni :</label>
              <input type="hidden" class="form-control" id="id_alumni" name="id_alumni">
              <input type="text" class="form-control" id="nama" name="nama" readonly="">
            </div>
            <div class="form-group">
              <label class="col-form-label">Jenis Kelamin :</label>
              <input type="text" class="form-control" id="jk" name="jk" readonly="">
            </div>
            <div class="form-group">
              <label class="col-form-label">Institusi :</label>
              <input type="text" class="form-control" id="institusi" name="institusi" required>
            </div>
            <div class="form-group">
              <label class="col-form-label">Angkatan :</label>
              <input type="text" class="form-control" id="angkatan" name="angkatan" required>
            </div>
            <div class="form-group">
              <label class="col-form-label">Instansi :</label>
              <input type="text" class="form-control" id="instansi" name="instansi" required>
            </div>
            <div class="form-group">
              <label class="col-form-label">Jabatan :</label>
              <input type="text" class="form-control" id="jabatan" name="jabatan" required>
            </div>
            <div class="form-group">
              <label class="col-form-label">Provinsi :</label>
              <input type="text" class="form-control" id="provinsi" name="provinsi" required>
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
<!-- END Modal Edit -->

<!-- Modal HAPUS PLOT -->
<div class="modal fade" id="hapusalumni" tabindex="-1" role="dialog" aria-labelledby="hapusalumni" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapusalumni">Hapus Data Alumni</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="post" action="hapus_alumni">
          <div class="modal-body">
            <p>Anda yakin akan menghapus Data : </p>
            <div class="form-group">
              <div class="row">
                <div class="col-xl">
                  <input type="hidden" id="id_alumni" name="id_alumni">
                  <input type="text" class="form-control" id="nama" name="nama" readonly="">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
            <button class="btn btn-danger">Hapus</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- END Modal Hapus -->

<script src="<?php echo base_url() . 'assets/js/jquery.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/js/raphael-min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/js/morris.min.js' ?>"></script>
<script>
  $(document).ready(function() {
    var url = '<?php echo base_url('praja/table_alumni'); ?>';
    // alert(url);
    $('#tbl-alumni').dataTable({
      // dom: 'Bfrtip',
      dom: '<"row"<"col-sm-5"B><"col-sm-7"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>',
      buttons: [
        'copy', 'excel', 'print'
      ],
      responsive: true,
      "ajax": {
        "url": url,
        "dataSrc": "",
        "deferRender": true,
        "processing": true,
        "serverSide": true
      }
    });
  });
</script>

<script>
  $(document).ready(function() {
    // Untuk sunting
    $('#edit-alumni').on('show.bs.modal', function(event) {
      var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
      var modal = $(this)

      // Isi nilai pada field
      modal.find('#id_alumni').attr("value", div.data('id_alumni'));
      modal.find('#nama').attr("value", div.data('nama'));
      modal.find('#jk').attr("value", div.data('jk'));
      modal.find('#institusi').attr("value", div.data('institusi'));
      modal.find('#angkatan').attr("value", div.data('angkatan'));
      modal.find('#instansi').attr("value", div.data('instansi'));
      modal.find('#jabatan').attr("value", div.data('jabatan'));
      modal.find('#provinsi').attr("value", div.data('provinsi'));
    });
    
    // Untuk sunting
    $('#hapusalumni').on('show.bs.modal', function(event) {
      var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
      var modal = $(this)

      // Isi nilai pada field
      modal.find('#id_alumni').attr("value", div.data('id_alumni'));
      modal.find('#nama').attr("value", div.data('nama'));

    });
  });
</script>