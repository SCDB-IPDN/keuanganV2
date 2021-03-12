<div id="content" class="content">
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="<?php echo base_url('home');?>">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url('import/view_akm');?>">AKM</a></li>
        <?php if($this->uri->segment(2) == "akm") { ?>
        <li class="breadcrumb-item"><a href="#"><?= $kode_prodi ?></a></li>
        <?php } ?>
    </ol>
    <h1 class="page-header">Manage AKM</h1>
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

                <?php if($this->uri->segment(2) == "view_akm") { ?>
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
                                                <td><a href="<?= base_url('import/akm/'.$r->kode_prodi); ?>"><?= $r->nama_program_studi; ?></a></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if($this->uri->segment(2) == "akm") { ?>
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
                                <?php if ($this->session->flashdata('akm') != NULL) { ?>
                                    <div class="alert alert-<?php echo $this->session->flashdata('akm') [0] ?> alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong><i class="fa fa-info-circle"></i></strong> <?php echo $this->session->flashdata('akm') [1] ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="col-xl-7 col-lg-8">
                                <form method="POST" action="<?php echo base_url() ?>import/upload_akm" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Upload Data Excel</label>
                                        <span class="ml-2">
                                            <i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-title="Format yang diupload .xlsx" data-placement="top" data-content=""></i>
                                        </span>
                                        <input type="file" name="akm" class="form-control" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                                        <input type="hidden" id="kode_prodi" name="kode_prodi" value="<?= $kode_prodi ?>">
                                    </div>
                                    <button type="submit" class="btn btn-success">Upload Data</button>
                                    <a href="<?php echo base_url() ?>assets/download/sample_template_akm.xlsx" class="btn btn-primary">Template</a>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="panel-body">
                        <table id="data-akm" class="table table-striped table-bordered table-td-valign-middle">
                            <thead>
                                <tr>
                                    <th class="text-nowrap">#</th>
                                    <th class="text-nowrap">NPP</th>
                                    <th class="text-nowrap">Nama</th>
                                    <th class="text-nowrap">Semester</th>
                                    <th class="text-nowrap">SKS</th>
                                    <th class="text-nowrap">IP Semester</th>
                                    <th class="text-nowrap">SKS Kumulatif</th>
                                    <th class="text-nowrap">IP Kumulatif</th>
                                    <th class="text-nowrap">Status</th>
                                    <th class="text-nowrap">Biaya</th>
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
<div class="modal fade" id="tambah_data_akm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data AKM</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('import/tambah_akm');?>" method="POST">
                    <input type="hidden" name="prodi" value="<?= $kode_prodi ?>">
                    <div class="form-group">
                        <label class="col-form-label">NPP:</label>
                        <input type="number" class="form-control" name="npp" placeholder="NPP" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Nama:</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Mahasiswa" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Semester:</label>
                        <input type="number" class="form-control" name="smt" placeholder="Semester" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">SKS:</label>
                        <input type="number" class="form-control" name="sks" placeholder="SKS" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">IP Semester:</label>
                        <input type="number" step="0.01" max="4.00" class="form-control" name="ip_smt" placeholder="IP Semester" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">SKS Kumulatif:</label>
                        <input type="number" class="form-control" name="sks_kumulatif" placeholder="SKS Kumulatif" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">IP Kumulatif:</label>
                        <input type="number" step="0.01" max="4.00" class="form-control" name="ip_kumulatif" placeholder="IP Kumulatif" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Status:</label>
                        <input type="text" class="form-control" name="status" placeholder="Status">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Biaya:</label>
                        <input type="text" class="form-control" name="biaya" placeholder="Biaya Kuliah Semester">
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
<div class="modal fade" id="edit_data_akm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data AKM</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('import/edit_akm');?>" method="POST">
                    <input type="hidden" class="form-control" id="id" name="id">
                    <input type="hidden" name="prodi" value="<?= $kode_prodi ?>">
                    <div class="form-group">
                        <label class="col-form-label">NPP:</label>
                        <input type="number" class="form-control" name="npp" id="npp" placeholder="NPP" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Nama:</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Mahasiswa" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Semester:</label>
                        <input type="number" class="form-control" name="smt" id="smt" placeholder="Semester" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">SKS:</label>
                        <input type="number" class="form-control" name="sks" id="sks" placeholder="SKS" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">IP Semester:</label>
                        <input type="number" step="0.01" max="4.00" class="form-control" name="ips" id="ips" placeholder="IP Semester" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">SKS Kumulatif:</label>
                        <input type="number" class="form-control" name="sksk" id="sksk" placeholder="SKS Kumulatif" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">IP Kumulatif:</label>
                        <input type="number" step="0.01" max="4.00" class="form-control" name="ipk" id="ipk" placeholder="IP Kumulatif" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Status:</label>
                        <input type="text" class="form-control" name="status" id="status" placeholder="Status">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Biaya:</label>
                        <input type="text" class="form-control" name="biaya" id="biaya" placeholder="Biaya Kuliah Semester">
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
<div class="modal fade" id="hapus_data_akm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Data AKM</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" action="<?php echo base_url('import/hapus_akm'); ?>">
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

    if ($('#data-akm').length !== 0) {
        var base_url = window.location.origin + "/" + window.location.pathname.split("/")[1] ;
        var kode_prodi = $("#kode_prodi").val();
        var url = `${base_url}/import/data_akm/${kode_prodi}`;
        $('#data-akm').dataTable({
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
            },
            "columnDefs": [
			{ 
				"orderable": false, 
				"targets": [10, 11] 
			}
  		]
        });
    }

    // edit
    $('#edit_data_akm').on('show.bs.modal', function (event) {
        var edit = $(event.relatedTarget)
        var modal = $(this)

        modal.find('#id').attr("value",edit.data('id'));
        modal.find('#npp').attr("value",edit.data('npp'));
        modal.find('#nama').attr("value",edit.data('nama'));
        modal.find('#smt').attr("value",edit.data('smt'));
        modal.find('#sks').attr("value",edit.data('sks'));
        modal.find('#ips').attr("value",edit.data('ip_smt'));
        modal.find('#sksk').attr("value",edit.data('sks_kum'));
        modal.find('#ipk').attr("value",edit.data('ip_kum'));
        modal.find('#status').attr("value",edit.data('status'));
        modal.find('#biaya').attr("value",edit.data('biaya'));
    });

    // hapus
    $('#hapus_data_akm').on('show.bs.modal', function (event) {
        var del = $(event.relatedTarget);
		var modal = $(this);

		var id_del = del.data('id');
		var nama_del = del.data('nama');
		modal.find('#delete_id').attr("value", del.data('id'));
		modal.find('#del-info').text(`Anda yakin akan menghapus data AKM ${nama_del}?`);
    });
});
</script>

       