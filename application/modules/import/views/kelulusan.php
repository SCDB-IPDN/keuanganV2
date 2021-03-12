<div id="content" class="content">
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="<?php echo base_url('home');?>">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url('import/view_kelulusan');?>">Kelulusan</a></li>
        <?php if($this->uri->segment(2) == "kelulusan") { ?>
        <li class="breadcrumb-item"><a href="#"><?= $kode_prodi ?></a></li>
        <?php } ?>
    </ol>
    <h1 class="page-header">Manage Kelulusan</h1>
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

                <?php if($this->uri->segment(2) == "view_kelulusan") { ?>
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
                                                <td><a href="<?= base_url('import/kelulusan/'.$r->kode_prodi); ?>"><?= $r->nama_program_studi; ?></a></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if($this->uri->segment(2) == "kelulusan") { ?>
                                    <div class="card-body">
                <span>
                            <?php if($this->session->userdata('role') == 'SuperAdmin' || $this->session->userdata('role') == 'Prodi'){?>
                                <a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#tambah_datakelulusan">TAMBAH DATA KELULUSAN</a>
                            <?php } ?>
                        </span>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-sm-12">
                                <?php if ($this->session->flashdata('kelulusan') != NULL) { ?>
                                    <div class="alert alert-<?php echo $this->session->flashdata('kelulusan') [0] ?> alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong><i class="fa fa-info-circle"></i></strong> <?php echo $this->session->flashdata('kelulusan') [1] ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="col-xl-7 col-lg-8">
                                <form method="POST" action="<?php echo base_url() ?>import/uploadkelulusan" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="exampleInputEmail2">Upload Data Excel</label>
                                        <span class="ml-2">
                                            <i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-title="Format yang diupload .xlsx" data-placement="top" data-content=""></i>
                                        </span>
                                        <input type="file" name="da" class="form-control" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                                        <input type="hidden" id="kode_prodi" name="kode_prodi" value="<?= $kode_prodi ?>">
                                    </div>
                                    <button type="submit" class="btn btn-success">Upload Data</button>
                                    <a href="<?php echo base_url() ?>assets/download/sample_template_kelulusan.xlsx" class="btn btn-primary">Template</a>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="panel-body">
                        <table id="data-kelulusan" class="table table-striped table-bordered table-td-valign-middle">
                            <thead>
                                <tr>
                                    <th class="text-nowrap">#</th>
                                    <th class="text-nowrap">NPP</th>
                                    <th class="text-nowrap">Nama</th>
                                    <th class="text-nowrap">Jenis Keluar</th>
                                    <th class="text-nowrap">Tanggal Keluar</th>
                                    <th class="text-nowrap">SK Yudisium</th>
                                    <th class="text-nowrap">Tanggal SK Yudisium</th>
                                    <th class="text-nowrap">IPK</th>
                                    <th class="text-nowrap">No Seri Ijazah</th>
                                    <th class="text-nowrap">Semester Keluar</th>
                                    <th class="text-nowrap">Prodi</th>
                                    <th class="text-nowrap">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                <?php } ?>
                
            </div>
        </div>
    </div>
</div>

<!-- Tambah  -->
<div class="modal fade" id="tambah_datakelulusan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Kelulusan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('import/tambah_kelulusan');?>" method="POST">
                    <input type="hidden" name="prodi" value="<?= $kode_prodi ?>">
                    <div class="form-group">
                        <label class="col-form-label">NPP:</label>
                        <input type="number" class="form-control" name="npp" placeholder="NPP" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Nama:</label>
                        <input type="text" class="form-control" name="nama_mhs" placeholder="Nama" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Jenis Keluar:</label>
                        <input type="number" class="form-control" name="jenis_keluar" placeholder="Jenis Keluar" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Tanggal Keluar:</label>
                        <input type="date" class="form-control" name="tgl_keluar" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">SK Yudisium:</label>
                        <input type="text" class="form-control" name="sk_yudisium" placeholder="SK Yudisium" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Tanggal SK Yudisium:</label>
                        <input type="date" class="form-control" name="tgl_sk_yudisium" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">IPK:</label>
                        <input type="number" step="0.01" max="4.00" class="form-control" name="ipk" placeholder="IPK" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">No Seri Ijazah:</label>
                        <input type="text" class="form-control" name="no_ijazah" placeholder="No Seri Ijazah">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Semester Keluar:</label>
                        <input type="number" class="form-control" name="smt_keluar" placeholder="Semester Keluar">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- edit -->
<div class="modal fade" id="edit_datakelulusan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Kelulusan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('import/edit_kelulusan');?>" method="POST">
                    <input type="hidden" class="form-control" id="idx" name="id">
                    <input type="hidden" name="prodi" value="<?= $kode_prodi ?>">
                    <div class="form-group">
                        <label class="col-form-label">NPP:</label>
                        <input type="number" class="form-control" name="npp" id="nppx" placeholder="NPP" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Nama:</label>
                        <input type="text" class="form-control" name="nama_mhs" id="nama_mhsx" placeholder="Nama" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Jenis Keluar:</label>
                        <input type="number" class="form-control" name="jenis_keluar" id="jenis_keluarx" placeholder="Jenis Keluar" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Tanggal Keluar:</label>
                        <input type="date" class="form-control" name="tgl_keluar" id="tgl_keluarx" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">SK Yudisium:</label>
                        <input type="text" class="form-control" name="sk_yudisium" id="sk_yudisiumx" placeholder="SK Yudisium" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Tanggal SK Yudisium:</label>
                        <input type="date" class="form-control" name="tgl_sk_yudisium" id="tgl_sk_yudisiumx" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">IPK:</label>
                        <input type="number" step="0.01" max="4.00" class="form-control" name="ipk" id="ipkx" placeholder="IPK" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">No Seri Ijazah:</label>
                        <input type="text" class="form-control" name="no_ijazah" id="no_ijazahx" placeholder="No Seri Ijazah">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Semester Keluar:</label>
                        <input type="number" class="form-control" name="smt_keluar" id="smt_keluarx" placeholder="Semester Keluar">
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

<!-- hapus -->
<div class="modal fade" id="hapus_datakelulusan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Data Kelulusan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" action="<?php echo base_url('import/hapus_kelulusan'); ?>">
                    <div class="modal-body">
                        <p id="del-info"></p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="delete_id" name="id">
                        <input type="hidden" name="prodi" value="<?= $kode_prodi ?>">
                        <button class="btn btn-info" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<script>
$(document).ready(function() {

    if ($('#data-kelulusan').length !== 0) {
        var base_url = window.location.origin + "/" + window.location.pathname.split("/")[1] ;
        var kode_prodi = $("#kode_prodi").val();
        var url = `${base_url}/import/datakelulusan/${kode_prodi}`;

        $('#data-kelulusan').dataTable({
            dom: '<"row"<"col-sm-5"B><"col-sm-7"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>',
            buttons: [
                {
                    extend: 'copy',
                    exportOptions: {
                        columns: 'th:not(:last-child)'
                    }
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: 'th:not(:last-child)'
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: 'th:not(:last-child)'
                    }
                }
            ],
            responsive: true,
            "ajax": {
                "url": url,
                "dataSrc": ""
            }
        });
    }

    // edit
    $('#edit_datakelulusan').on('show.bs.modal', function (event) {
        var edit = $(event.relatedTarget) // Tombol dimana modal di tampilkan
        var modal = $(this)

        // Isi nilai pada field
        modal.find('#idx').attr("value",edit.data('id'));
        modal.find('#nppx').attr("value",edit.data('npp'));
        modal.find('#nama_mhsx').attr("value",edit.data('nama_mhs'));
        modal.find('#jenis_keluarx').attr("value",edit.data('jenis_keluar'));
        modal.find('#tgl_keluarx').attr("value",edit.data('tgl_keluar'));
        modal.find('#sk_yudisiumx').attr("value",edit.data('sk_yudisium'));
        modal.find('#tgl_sk_yudisiumx').attr("value",edit.data('tgl_sk_yudisium'));
        modal.find('#ipkx').attr("value",edit.data('ipk'));
        modal.find('#no_ijazahx').attr("value",edit.data('no_ijazah'));
        modal.find('#smt_keluarx').attr("value",edit.data('smt_keluar'));
        
    });

    // hapus
    $('#hapus_datakelulusan').on('show.bs.modal', function (event) {
        var del = $(event.relatedTarget);
		var modal = $(this);

		var id_del = del.data('id');
		var nama_del = del.data('nama');
		modal.find('#delete_id').attr("value", del.data('id'));
		modal.find('#del-info').text(`Anda yakin akan menghapus data kelulusan ${nama_del}?`);
    });
});
</script>

       