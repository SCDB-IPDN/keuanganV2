<div id="content" class="content">
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="<?php echo base_url('import/kelulusan');?>">Kelulusan</a></li>
    </ol>
    <h1 class="page-header">Manage Kelulusan</h1>
    <div class="row">
        <div class="col-xl-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a href="" class="btn btn-icon btn-sm btn-inverse" data-toggle="modal" data-target="#tambah_datakelulusan"><i class="fa fa-plus-square"></i></a>
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
                    <div class="row">
                        <div class="col-xl-7 col-lg-8">
                            <?php echo $this->session->flashdata('kelulusan') ?>
                            <form method="POST" action="<?php echo base_url() ?>import/uploadkelulusan" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleInputEmail2">Upload Data Excel</label>
                                    <span class="ml-2">
                                        <i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-title="Format yang diupload .xlsx" data-placement="top" data-content=""></i>
                                    </span>
                                    <input type="file" name="da" class="form-control">
                                    <input type="hidden" name="kode_prodi" value="<?= $kode_prodi ?>">
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
                                <th class="text-nowrap">NPP</th>
                                <th class="text-nowrap">Nama</th>
                                <th class="text-nowrap">Jenis Keluar</th>
                                <th class="text-nowrap">Tanggal Keluar</th>
                                <th class="text-nowrap">SK Yudisium</th>
                                <th class="text-nowrap">Tanggal SK Yudisium</th>
                                <th class="text-nowrap">IPK</th>
                                <th class="text-nowrap">No Seri Ijazah</th>
                                <th class="text-nowrap">Semester Keluar</th>
                                <th class="text-nowrap">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <?php } ?>
                
            </div>
        </div>
    </div>
    
    <!-- Tambah  -->
    <div class="modal fade" id="tambah_datakelulusan" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Tambah Data Kelulusan</h5>
                <button type="button" class="close              " data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('import/tambah_kelulusan');?>" method="POST">
                        <input type="hidden" name="prodi" value="<?= $kode_prodi ?>">
                        <div class="form-group">
                            <label class="col-form-label">NPP:</label>
                            <input type="text" class="form-control" name="npp" placeholder="Nama" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nama:</label>
                            <input type="text" class="form-control" name="nama_mhs" placeholder="Nama" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Jenis Keluar:</label>
                            <input type="text" class="form-control" name="jenis_keluar" placeholder="Jenis Keluar" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Tanggal Keluar:</label>
                            <input type="text" class="form-control" name="tgl_keluar" placeholder="Tanggal Keluar" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">SK Yudisium:</label>
                            <input type="text" class="form-control" name="sk_yudisium" placeholder="SK Yudisium" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Tanggal SK Yudisium:</label>
                            <input type="text" class="form-control" name="tgl_sk_yudisium" placeholder="Tanggal SK Yudisium " required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">IPK:</label>
                            <input type="text" class="form-control" name="ipk" placeholder="IPK" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">No Seri Ijazah:</label>
                            <input type="text" class="form-control" name="no_ijazah" placeholder="SKS Ajar">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Semester Keluar:</label>
                            <input type="text" class="form-control" name="smt_keluar" placeholder="SKS Ajar">
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

    <!-- Modal EDIT THL -->
    <div class="modal fade" id="edit_datakelulusan" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Edit Dosen Ajar</h5>
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
                            <input type="text" class="form-control" name="npp" placeholder="Nama" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nama:</label>
                            <input type="text" class="form-control" name="nama_mhs" placeholder="Nama" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Jenis Keluar:</label>
                            <input type="text" class="form-control" name="jenis_keluar" placeholder="Jenis Keluar" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Tanggal Keluar:</label>
                            <input type="text" class="form-control" name="tgl_keluar" placeholder="Tanggal Keluar" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">SK Yudisium:</label>
                            <input type="text" class="form-control" name="sk_yudisium" placeholder="SK Yudisium" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Tanggal SK Yudisium:</label>
                            <input type="text" class="form-control" name="tgl_sk_yudisium" placeholder="Tanggal SK Yudisium " required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">IPK:</label>
                            <input type="text" class="form-control" name="ipk" placeholder="IPK" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">No Seri Ijazah:</label>
                            <input type="text" class="form-control" name="no_ijazah" placeholder="SKS Ajar">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Semester Keluar:</label>
                            <input type="text" class="form-control" name="smt_keluar" placeholder="SKS Ajar">
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

    <!-- Modal HAPUS THL -->
    <div class="modal fade" id="hapus_datakelulusan" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="<?php echo base_url('import/hapus_kelulusan');?>">Hapus Data Kelulusan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="hapus_thl">
                        <div class="modal-body">
                            <p>Anda yakin mau menghapus Data?</p>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" id="idxx" name="id">
                            <input type="hidden" name="prodi" value="<?= $kode_prodi ?>">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button class="btn btn-danger">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<script>
$(document).ready(function() {

    if ($('#data-kelulusan').length !== 0) {
        var url = "<?php echo base_url('import/datakelulusan/'.$kode_prodi); ?>";
        console.log(url);

        $('#data-kelulusan').dataTable({
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

    // Untuk sunting
    $('#edit_datakelulusan').on('show.bs.modal', function (event) {
        var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
        var modal          = $(this)

        // Isi nilai pada field
        modal.find('#idx').attr("value",div.data('id'));
        modal.find('#nppx').attr("value",div.data('npp'));
        modal.find('#nama_mhsx').attr("value",div.data('nama_mhs'));
        modal.find('#jenis_keluarx').attr("value",div.data('jenis_keluar'));
        modal.find('#tgl_keluarx').attr("value",div.data('tgl_keluar'));
        modal.find('#sk_yudisiumx').attr("value",div.data('sk_yudisium'));
        modal.find('#tgl_sk_yudisiumx').attr("value",div.data('tgl_sk_yudisium'));
        modal.find('#ipkx').attr("value",div.data('ipk'));
        modal.find('#no_ijazahx').attr("value",div.data('no_ijazah'));
        modal.find('#smt_keluarx').attr("value",div.data('smt_keluar'));
        
    });

    // Untuk sunting
    $('#hapus_datakelulusan').on('show.bs.modal', function (event) {
        var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
        var modal          = $(this)

        // Isi nilai pada field
        modal.find('#idxx').attr("value",div.data('id'));
    });

});
</script>

       