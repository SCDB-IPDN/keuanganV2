<div id="content" class="content">
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="<?php echo base_url('import/dosen_ajar');?>">Dosen Ajar</a></li>
    </ol>
    <h1 class="page-header">Manage Dosen Ajar</h1>
    <div class="row">
        <div class="col-xl-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <?php if($this->uri->segment(2) == "dosen_ajar") { ?>
                            <a href="" class="btn btn-icon btn-sm btn-inverse" data-toggle="modal" data-target="#tambah_datada"><i class="fa fa-plus-square"></i></a>
                        <?php } ?>
                    </h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                </div>

                <?php if($this->uri->segment(2) == "view_da") { ?>
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
                                            <td><a href="<?= base_url('import/dosen_ajar/'.$r->kode_prodi); ?>"><?= $r->nama_program_studi; ?></a></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>

                <?php if($this->uri->segment(2) == "dosen_ajar") { ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-7 col-lg-8">
                            <?php echo $this->session->flashdata('dosen_ajar') ?>
                            <form method="POST" action="<?php echo base_url() ?>import/uploadda" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleInputEmail2">Upload Data Excel</label>
                                    <span class="ml-2">
                                        <i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-title="Format yang diupload .xlsx" data-placement="top" data-content=""></i>
                                    </span>
                                    <input type="file" name="da" class="form-control">
                                    <input type="hidden" name="kode_prodi" value="<?= $kode_prodi ?>">
                                </div>
                                <button type="submit" class="btn btn-success">Upload Data</button>
                                <a href="<?php echo base_url() ?>assets/download/sample_ajar_dosen.xlsx" class="btn btn-primary">Template</a>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="panel-body">
                    <table id="data-dosen-ajar" class="table table-striped table-bordered table-td-valign-middle">
                        <thead>
                            <tr>
                                <th class="text-nowrap">Semester</th>
                                <th class="text-nowrap">NIDN</th>
                                <th class="text-nowrap">Nama Dosen</th>
                                <th class="text-nowrap">Kode Matakuliah</th>
                                <th class="text-nowrap">Nama Kelas</th>
                                <th class="text-nowrap">Tatap Muka</th>
                                <th class="text-nowrap">Tatap Muka Realisasi</th>
                                <th class="text-nowrap">SKS Ajar</th>
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
    <div class="modal fade" id="tambah_datada" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Tambah Dosen Ajar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('import/tambah_da');?>" method="POST">
                        <input type="hidden" name="prodi" value="<?= $kode_prodi ?>">
                        <div class="form-group">
                            <label class="col-form-label">Semester:</label>
                            <input type="text" class="form-control" name="semester" placeholder="Contoh : 20201" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">NIDN:</label>
                            <input type="text" class="form-control" name="nidn" placeholder="NIDN" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nama Dosen:</label>
                            <input type="text" class="form-control" name="nama_dosen" placeholder="Nama Dosen" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Kode Matakuliah:</label>
                            <input type="text" class="form-control" name="kode_mk" placeholder="Kode Matakuliah" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nama Kelas:</label>
                            <input type="text" class="form-control" name="nama_kelas" placeholder="Contoh : 01" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Tatap Muka:</label>
                            <input type="text" class="form-control" name="tatap_muka" placeholder="Jumlah tatap Muka" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Tatap Muka Realisasi:</label>
                            <input type="text" class="form-control" name="realisasi" placeholder="Jumlah realisasi tatap Muka" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Sks Ajar:</label>
                            <input type="text" class="form-control" name="sks_ajar" placeholder="SKS Ajar">
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
    <div class="modal fade" id="edit_datada" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Edit Dosen Ajar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('import/edit_da');?>" method="POST">
                        <input type="hidden" class="form-control" id="idx" name="id">
                        <input type="hidden" name="prodi" value="<?= $kode_prodi ?>">
                        <div class="form-group">
                            <label class="col-form-label">Semester:</label>
                            <input type="text" class="form-control" id="semesterx" name="semester" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">NIDN:</label>
                            <input type="text" class="form-control" id="nidnx" name="nidn"  required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nama Dosen:</label>
                            <input type="text" class="form-control" id="nama_dosenx" name="nama_dosen"  required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Kode Matakuliah:</label>
                            <input type="text" class="form-control" id="kode_mkx" name="kode_mk"  required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nama Kelas:</label>
                            <input type="text" class="form-control" id="nama_kelasx" name="nama_kelas"  required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Tatap Muka:</label>
                            <input type="text" class="form-control" id="tatap_mukax" name="tatap_muka"  required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Tatap Muka Realisasi:</label>
                            <input type="text" class="form-control" id="realisasix" name="realisasi"  required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Sks Ajar:</label>
                            <input type="text" class="form-control" id="sks_ajarx" name="sks_ajar">
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
    <div class="modal fade" id="hapus_datada" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Hapus Dosen Ajar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="<?php echo base_url('import/hapus_da');?>">
                        <div class="modal-body">
                            <p>Anda yakin mau menghapus Data ?</p>
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

    if ($('#data-dosen-ajar').length !== 0) {
        var url = "<?php echo base_url('import/datada/'.$kode_prodi); ?>";
        console.log(url);

        $('#data-dosen-ajar').dataTable({
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
    $('#edit_datada').on('show.bs.modal', function (event) {
        var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
        var modal          = $(this)

        // Isi nilai pada field
        modal.find('#idx').attr("value",div.data('id'));
        modal.find('#semesterx').attr("value",div.data('semester'));
        modal.find('#nidnx').attr("value",div.data('nidn'));
        modal.find('#nama_dosenx').attr("value",div.data('nama_dosen'));
        modal.find('#kode_mkx').attr("value",div.data('kode_mk'));
        modal.find('#nama_kelasx').attr("value",div.data('nama_kelas'));
        modal.find('#tatap_mukax').attr("value",div.data('tatap_muka'));
        modal.find('#realisasix').attr("value",div.data('realisasi'));
        modal.find('#sks_ajarx').attr("value",div.data('sks_ajar'));
        
    });

    // Untuk sunting
    $('#hapus_datada').on('show.bs.modal', function (event) {
        var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
        var modal          = $(this)

        // Isi nilai pada field
        modal.find('#idxx').attr("value",div.data('id'));
    });

});
</script>

       