<div id="content" class="content">
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="<?php echo base_url('import/nilai');?>">Nilai Perkuliahan</a></li>
    </ol>
    <h1 class="page-header">Manage Nilai Perkuliahan</h1>
    <div class="row">
        <div class="col-xl-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <?php if($this->uri->segment(2) == "nilai") { ?>
                            <span><a href="" class="btn btn-sm btn-white" data-toggle="modal" data-target="#tambah_nilai">TAMBAH DATA NILAI PERKULIAHAN</a></span>
                        <?php } ?>
                    </h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                </div>

                <?php if($this->uri->segment(2) == "view_nilai") { ?>
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
                                            <td><a href="<?= base_url('import/nilai/'.$r->kode_prodi); ?>"><?= $r->nama_program_studi; ?></a></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>

                <?php if($this->uri->segment(2) == "nilai") { ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-7 col-lg-8">
                            <?php echo $this->session->flashdata('nilai') ?>
                            <form method="POST" action="<?php echo base_url() ?>import/uploadnilai" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleInputEmail2">Upload Data Excel</label>
                                    <span class="ml-2">
                                        <i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-title="Format yang diupload .xlsx" data-placement="top" data-content=""></i>
                                    </span>
                                    <input type="file" name="nilai" class="form-control">
                                    <input type="hidden" name="kode_prodi" value="<?= $kode_prodi ?>">
                                </div>
                                <button type="submit" class="btn btn-success">Upload Data</button>
                                <a href="<?php echo base_url() ?>assets/download/nilai_sample.xlsx" class="btn btn-primary">Template</a>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="panel-body">
                    <table id="data-nilai" class="table table-striped table-bordered table-td-valign-middle">
                        <thead>
                            <tr>
                                <th class="text-nowrap">NPP</th>
                                <th class="text-nowrap">Nama</th>
                                <th class="text-nowrap">Kode MK</th>
                                <th class="text-nowrap">Mata kuliah</th>
                                <th class="text-nowrap">Semester</th>
                                <th class="text-nowrap">Kelas</th>
                                <th class="text-nowrap">Nilai Huruf</th>
                                <th class="text-nowrap">Nilai Indeks</th>
                                <th class="text-nowrap">Nilai Angka</th>
                                <th class="text-nowrap">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <!-- Tambah -->
    <div class="modal fade" id="tambah_nilai" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Tambah Nilai Perkuliahan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('import/tambah_nilai');?>" method="POST">
                        <input type="hidden" name="prodi" value="<?= $kode_prodi ?>">
                        <div class="form-group">
                            <label class="col-form-label">NPP:</label>
                            <input type="text" class="form-control" name="npp" placeholder="NPP" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nama Mahasiswa:</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama Mahasiswa" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Kode Matakuliah:</label>
                            <input type="text" class="form-control" name="kode_mk" placeholder="Kode Matakuliah" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Matakuliah:</label>
                            <input type="text" class="form-control" name="matkul" placeholder="Matakuliah" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Semester:</label>
                            <input type="text" class="form-control" name="semester" placeholder="Contoh : 20201" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Kelas:</label>
                            <input type="text" class="form-control" name="kelas" placeholder="Kelas" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nilai Huruf:</label>
                            <input type="text" class="form-control" name="nilai_huruf" placeholder="Nilai Huruf" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nilai Indeks:</label>
                            <input type="text" class="form-control" name="nilai_indeks" placeholder="Nilai Indeks" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nilai Angka:</label>
                            <input type="text" class="form-control" name="nilai_angka" placeholder="Nilai Angka" required>
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

    <!-- Edit -->
    <div class="modal fade" id="edit_nilai" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Ubah Nilai Perkuliahan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('import/edit_nilai');?>" method="POST">
                        <input type="hidden" class="form-control" id="idx" name="id">
                        <input type="hidden" name="prodi" value="<?= $kode_prodi ?>">
                        <div class="form-group">
                            <label class="col-form-label">NPP:</label>
                            <input type="text" class="form-control" id="npp" name="npp" placeholder="NPP" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nama Mahasiswa:</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Mahasiswa" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Kode Matakuliah:</label>
                            <input type="text" class="form-control" id="kode_mk" name="kode_mk" placeholder="Kode Matakuliah" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Matakuliah:</label>
                            <input type="text" class="form-control" id="matkul" name="matkul" placeholder="Matakuliah" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Semester:</label>
                            <input type="text" class="form-control" id="semester" name="semester" placeholder="Contoh : 20201" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Kelas:</label>
                            <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Kelas" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nilai Huruf:</label>
                            <input type="text" class="form-control" id="nilai_huruf" name="nilai_huruf" placeholder="Nilai Huruf" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nilai Indeks:</label>
                            <input type="text" class="form-control" id="nilai_indeks" name="nilai_indeks" placeholder="Nilai Indeks" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nilai Angka:</label>
                            <input type="text" class="form-control" id="nilai_angka" name="nilai_angka" placeholder="Nilai Angka" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- HAPUS -->
    <div class="modal fade" id="hapus_nilai" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Hapus Nilai Perkuliahan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="<?php echo base_url('import/hapus_krs');?>">
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

    if ($('#data-nilai').length !== 0) {
        var url = "<?php echo base_url('import/datanilai/'.$kode_prodi); ?>";
        console.log(url);

        $('#data-nilai').dataTable({
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
    $('#edit_nilai').on('show.bs.modal', function (event) {
        var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
        var modal          = $(this)

        // Isi nilai pada field
        modal.find('#idx').attr("value",div.data('id'));
        modal.find('#nppx').attr("value",div.data('npp'));
        modal.find('#namax').attr("value",div.data('nama'));
        modal.find('#kode_mkx').attr("value",div.data('kode_mk'));
        modal.find('#matkulx').attr("value",div.data('matkul'));
        modal.find('#semesterx').attr("value",div.data('semester'));
        modal.find('#kelasx').attr("value",div.data('kelas'));
        modal.find('#nilai_hurufx').attr("value",div.data('nilai_huruf'));
        modal.find('#nilai_indeksx').attr("value",div.data('nilai_indeks'));
        modal.find('#nilai_angkax').attr("value",div.data('nilai_angka'));
        
    });

    // Untuk sunting
    $('#hapus_nilai').on('show.bs.modal', function (event) {
        var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
        var modal          = $(this)

        // Isi nilai pada field
        modal.find('#idxx').attr("value",div.data('id'));
    });
});
</script>