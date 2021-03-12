<div id="content" class="content">
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="<?php echo base_url('import/kurikulum');?>">Kurikulum</a></li>
  </ol>
  <h1 class="page-header">Manage Kurikulum</h1>
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

        <?php if($this->uri->segment(2) == "view_kurkum") { ?>
          <div class="card-body">
            <div class="row">
              <div class="col-xl-12">
                <div class="panel-body">
                  <table id="data-table-buttons" class="table table-striped table-bordered table-td-valign-middle">
                    <thead>
                      <tr>
                        <th class="text-nowrap">No</th>
                        <th class="text-nowrap">Nama Prodi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1; foreach($prodi as $r) { ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><a href="<?= base_url('import/kurkum_pamong/'.$r->kode_prodi); ?>"><?= $r->nama_program_studi; ?></a></td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>

        <?php if($this->uri->segment(2) == "kurkum_pamong") { ?>

         <div class="panel-body">

          <?php if($this->session->flashdata('kurkum') != NULL){ ?>
            <div class="alert alert-success alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Notif!</strong> <?php echo $this->session->flashdata('kurkum') ?>
            </div>
          <?php } ?>
          <span><a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#tambahkurikulum">TAMBAH KURIKULUM</a></span>
          <br>
          <br>
          <table id="data-kurkum" class="table table-striped table-bordered table-td-valign-middle">
            <thead>
              <tr align="center">
                <th rowspan="2" style="vertical-align: middle !important">Nama Kurikulum</th>
                <th rowspan="2" style="vertical-align: middle !important">Mulai Kurikulum</th>
                <th colspan="3" style="vertical-align: middle !important">Aturan SKS</th>
                <th rowspan="2" style="vertical-align: middle !important">Aksi</th>
              </tr>
              <tr align="center">
                <th  style="vertical-align: middle !important">Lulus</th>
                <th  style="vertical-align: middle !important">Wajib</th>
                <th  style="vertical-align: middle !important">Pilihan</th>
              </tr>
            </thead>

          </table>
        </div>
      <?php } ?>

      <?php if($this->uri->segment(2) == "kurkum_matkul") { ?>
        <div class="card-body">
          <div class="row">
            <div class="col-xl-7 col-lg-8">
              <?php if($this->session->flashdata('kurkum_matkul') != NULL){ ?>
                <div class="alert alert-success alert-dismissible">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Notif!</strong> <?php echo $this->session->flashdata('kurkum_matkul') ?>
                </div>
              <?php } ?>
              <form method="POST" action="<?php echo base_url() ?>import/uploadkurkum" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="exampleInputEmail2">Upload Data Excel</label>
                  <span class="ml-2">
                    <i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-title="Format yang diupload .xlsx" data-placement="top" data-content=""></i>
                  </span>
                  <input type="file" name="kurkum" class="form-control">
                  <input type="hidden" name="getkurkum" value="<?= $getkurkum ?>">
                  <input type="hidden" name="getprodi" value="<?= $getprodi ?>">

                </div>
                <button type="submit" class="btn btn-success">Upload Data</button>
                <a href="<?php echo base_url() ?>assets/download/02 Kurikulum-matkul_sample_new.xlsx" class="btn btn-primary">Template</a>
              </form>
            </div>
          </div>
        </div>
        <div class="panel-body">

  
          <table id="data-matkul" class="table table-striped table-bordered table-td-valign-middle">
            <thead>
              <tr>
                <th class="text-nowrap">Kode Matakuliah</th>
                <th class="text-nowrap">Nama Matakuliah</th>
                <th class="text-nowrap">Jenis Matakuliah</th>
                <th class="text-nowrap">SKS Tatap Muka</th>
                <th class="text-nowrap">SKS Praktek</th>
                <th class="text-nowrap">SKS Lapangan</th>
                <th class="text-nowrap">SKS Simulasi</th>
                <th class="text-nowrap">Tanggal Mulai Efektif</th>
                <th class="text-nowrap">Tanggal Akhir Efektif</th>
                <th class="text-nowrap">Semester</th>
                <th class="text-nowrap">Opsi</th>
              </tr>
            </thead>
          </table>
        </div>
      <?php } ?>

    </div>
  </div>
</div>
</div>


<!-- Modal TAMBAH -->
<div aria-hidden="true" aria-labelledby="myModalLabel" id="tambahkurikulum" role="dialog" tabindex="-1"  class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
       <h4 class="modal-title">Tambah Kurikulum</h4>
       <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>

     </div>
     <form class="form-horizontal" action="<?php echo base_url('import/tambahkurikulum')?>" method="post" enctype="multipart/form-data" role="form">
       <div class="modal-body">
         <div class="form-group">
          <div class="row">
            <div class="col-xl">
              <label class="col-form-label">Nama Kurikulum :</label>
              <input type="hidden" id="prodi" name="prodi" value="<?= $kode_prodi ?>">
              <input type="text" class="form-control" id="nama_kurikulum" name="nama_kurikulum" placeholder="Nama Kurikulum..">
            </div>
            <div class="col-xl">
              <label class="col-form-label">Mulai Kurikulum :</label>
              <input type="text" class="form-control" id="mulai_kurikulum" name="mulai_kurikulum" placeholder="Ex : 20201">
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-xl">
                <label class="col-form-label">Aturan SKS Lulus :</label>
                <input type="text" class="form-control" id="lulus" name="lulus" placeholder="Aturan SKS Lulus..">
              </div>

              <div class="col-xl">
                <label class="col-form-label">Aturan SKS Wajib :</label>
                <input type="text" class="form-control" id="wajib" name="wajib" placeholder="Aturan SKS Wajib..">

              </div>
              <div class="col-xl">
                <label class="col-form-label">Aturan SKS Pilihan :</label>
                <input type="text" class="form-control" id="pilihan" name="pilihan" placeholder="Aturan SKS Pilihan..">
              </div>
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
<!-- END Modal tambah -->

<!-- Modal EDIT -->
<div aria-hidden="true" aria-labelledby="myModalLabel"  role="dialog" tabindex="-1" id="edit-data" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
       <h4 class="modal-title">Ubah Data Kurikulum</h4>
       <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>

     </div>
     <form class="form-horizontal" action="<?php echo base_url('import/ubahkurikulum')?>" method="post" enctype="multipart/form-data" role="form">
       <div class="modal-body">
         <div class="form-group">
          <div class="row">
            <div class="col-xl">
              <label class="col-form-label">Nama Kurikulum :</label>
              <input type="hidden" id="prodi" name="prodi" value="<?= $kode_prodi ?>">
              <input type="text" class="form-control" id="nama_kurikulum" name="nama_kurikulum" placeholder="Nama Kurikulum..">
            </div>
            <div class="col-xl">
              <label class="col-form-label">Mulai Kurikulum :</label>
              <input type="text" class="form-control" id="mulai_kurikulum" name="mulai_kurikulum" placeholder="Mulai Kurikulum..">
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-xl">
                <label class="col-form-label">Aturan SKS Lulus :</label>
                <input type="text" class="form-control" id="lulus" name="lulus" placeholder="Aturan SKS Lulus..">
              </div>

              <div class="col-xl">
                <label class="col-form-label">Aturan SKS Wajib :</label>
                <input type="text" class="form-control" id="wajib" name="wajib" placeholder="Aturan SKS Wajib..">

              </div>
              <div class="col-xl">
                <label class="col-form-label">Aturan SKS Pilihan :</label>
                <input type="text" class="form-control" id="pilihan" name="pilihan" placeholder="Aturan SKS Pilihan..">
              </div>
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
<!-- END Modal EDIT -->

<!-- Modal HAPUS KURIKULUM -->
<div class="modal fade" id="hapus-kurikulum" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapus">Hapus Data Kurikulum</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="post" action="<?php echo base_url('import/hapuskurikulum')?>">
          <div class="modal-body">
            <p>Anda yakin akan menghapus Data Kurikulum : </p>
            <div class="form-group">
              <div class="row">
                <div class="col-xl">
                  <!-- <input type="hidden" id="prodi" name="prodi" value="<?= $kode_prodi ?>"> -->
                  <input type="text" class="form-control" id="nama_kurikulum" name="nama_kurikulum" readonly="">
                </div>
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <input type="hidden" id="prodi" name="prodi" value="<?= $kode_prodi ?>">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
            <button class="btn btn-danger">Hapus</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- END HAPUS KURIKULUM -->


<!-- Modal EDIT MATKUL KURKUM -->
<div aria-hidden="true" aria-labelledby="myModalLabel"  role="dialog" tabindex="-1" id="edit-data-matkul" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
       <h4 class="modal-title">Ubah Data Matakuliah Kurikulum</h4>
       <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>

     </div>
     <form class="form-horizontal" action="<?php echo base_url('import/ubahkurikulumatkul')?>" method="post" enctype="multipart/form-data" role="form">
       <div class="modal-body">
         <div class="form-group">
          <div class="row">
            <div class="col-xl">
              <label class="col-form-label">Kode Matakuliah :</label>

              <input type="text" class="form-control" id="kode_mk" name="kode_mk" placeholder="Kode Matakuliah..">
            </div>
            <div class="col-xl">
              <label class="col-form-label">Nama Matakuliah :</label>
              <input type="text" class="form-control" id="nama_mk" name="nama_mk" placeholder="Nama Matakuliah..">
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-xl">
                <label class="col-form-label">Jenis Matakuliah :</label>
                <input type="text" class="form-control" id="jenis_mk" name="jenis_mk" placeholder="Jenis Matakuliah..">
              </div>
              <div class="col-xl">
                <label class="col-form-label">SKS Tatap Muka :</label>
                <input type="text" class="form-control" id="sks_tatapmuka" name="sks_tatapmuka" placeholder=">SKS Tatap Muka..">
              </div>
              <div class="col-xl">
                <label class="col-form-label">SKS Praktek :</label>
                <input type="text" class="form-control" id="sks_praktek" name="sks_praktek" placeholder="SKS Praktek..">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-xl">
                <label class="col-form-label">SKS Lapangan :</label>
                <input type="text" class="form-control" id="sks_lapangan" name="sks_lapangan" placeholder="SKS Lapangan..">
              </div>
              <div class="col-xl">
                <label class="col-form-label">SKS Simulasi :</label>
                <input type="text" class="form-control" id="sks_simulasi" name="sks_simulasi" placeholder="SKS Simulasi..">
              </div>
              <div class="col-xl">
                <label class="col-form-label">Tanggal Mulai Efektif :</label>
                <input type="date" class="form-control" id="tgl_mulai_efektif" name="tgl_mulai_efektif" placeholder="Tanggal Mulai Efektif..">
              </div>
              <div class="col-xl">
                <label class="col-form-label">Tanggal Akhir Efektif :</label>
                <input type="date" class="form-control" id="tgl_akhir_efektif" name="tgl_akhir_efektif" placeholder="Tanggal Akhir Efektif..">
              </div>
              <div class="col-xl">
                <label class="col-form-label">Semester :</label>
                <input type="text" class="form-control" id="semester" name="semester" placeholder="Semester..">
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="modal-footer">
       <input type="hidden" id="prodi" name="prodi" value="<?= $getprodi ?>">
       <input type="hidden" id="nama_kurikulum" name="nama_kurikulum" value="<?= $getkurkum ?>">
       <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
       <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
     </div>
   </form>
 </div>
</div>
</div>
</div>
<!-- END Modal EDIT MATKUL KURKUM-->

<!-- Modal HAPU SMATKUL KURKUM -->
<div class="modal fade" id="hapus-kurikulum-matkul" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapus">Hapus Data Mata Kuliah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="post" action="<?php echo base_url('import/hapuskurikulummatkul')?>">
          <div class="modal-body">
            <p>Anda yakin akan menghapus Data Mata Kuliah : </p>
            <div class="form-group">
              <div class="row">
                <div class="col-xl">
                  <!-- <input type="hidden" id="prodi" name="prodi" value="<?= $kode_prodi ?>"> -->
                  <input type="text" class="form-control" id="kode_mk" name="kode_mk" readonly="">
                </div>
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <input type="hidden" id="prodi" name="prodi" value="<?= $getprodi ?>">
            <input type="hidden" id="nama_kurikulum" name="nama_kurikulum" value="<?= $getkurkum ?>">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
            <button class="btn btn-danger">Hapus</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- END HAPUS MATKUL KURKUM -->



<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>

<script>
  $(document).ready(function() {

    if ($('#data-kurkum').length !== 0) {
      var url = "<?php echo base_url('import/datakurkum/'.$kode_prodi); ?>";
      console.log(url);

      $('#data-kurkum').dataTable({
            // dom: 'Bfrtip',
            dom: '<"row"<"col-sm-5"B><"col-sm-7"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>',
            buttons: [
            'copy', 'excel', 'print'
            ],
            responsive: true,
            "ajax": {
              "url": url,
              "dataSrc": ""
            }
          });
    }
    
  });
</script>

<script>
  $(document).ready(function() {
    var uri = "<?php echo base_url('import/datamatkulkurum/'.$getprodi.'/'.$getkurkum); ?>";
    console.log(uri);
    $('#data-matkul').dataTable({
            // dom: 'Bfrtip',
            dom: '<"row"<"col-sm-5"B><"col-sm-7"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>',
            buttons: [
            'copy', 'excel', 'print'
            ],
            responsive: true,
            "ajax": {
              "url": uri,
              "dataSrc": ""
            }
          });
  });
</script>

<script>
  $(document).ready(function() {
        // Untuk sunting
        $('#edit-data').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

            // Isi nilai pada field
            modal.find('#nama_kurikulum').attr("value",div.data('nama_kurikulum'));
            modal.find('#mulai_kurikulum').attr("value",div.data('mulai_kurikulum'));
            modal.find('#lulus').attr("value",div.data('lulus'));
            modal.find('#wajib').attr("value",div.data('wajib'));
            modal.find('#pilihan').attr("value",div.data('pilihan'));
          });
        // Untuk hapus
        $('#hapus-kurikulum').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

            // Isi nilai pada field
            modal.find('#nama_kurikulum').attr("value",div.data('nama_kurikulum'));

          });


        $('#edit-data-matkul').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

            // Isi nilai pada field
            modal.find('#kode_mk').attr("value",div.data('kode_mk'));
            modal.find('#nama_mk').attr("value",div.data('nama_mk'));
            modal.find('#jenis_mk').attr("value",div.data('jenis_mk'));
            modal.find('#sks_tatapmuka').attr("value",div.data('sks_tatapmuka'));
            modal.find('#sks_praktek').attr("value",div.data('sks_praktek'));
            modal.find('#sks_lapangan').attr("value",div.data('sks_lapangan'));
            modal.find('#sks_simulasi').attr("value",div.data('sks_simulasi'));
            modal.find('#tgl_mulai_efektif').attr("value",div.data('tgl_mulai_efektif'));
            modal.find('#tgl_akhir_efektif').attr("value",div.data('tgl_akhir_efektif'));
            modal.find('#semester').attr("value",div.data('semester'));
          });
        // Untuk hapus
        $('#hapus-kurikulum-matkul').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

            // Isi nilai pada field
            modal.find('#kode_mk').attr("value",div.data('kode_mk'));
            modal.find('#nama_mk').attr("value",div.data('nama_mk'));

          });
      });
    </script>

