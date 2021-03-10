<div id="content" class="content">
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="<?php echo base_url('import/kelas_kuliah');?>">Kelas Kuliah</a></li>
    </ol>
    <h1 class="page-header">Manage Kelas Kuliah</h1>
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

                <?php if($this->uri->segment(2) == "view_kk") { ?>
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
                                            <td><a href="<?= base_url('import/kelas_kuliah/'.$r->kode_prodi); ?>"><?= $r->nama_program_studi; ?></a></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>

                <?php if($this->uri->segment(2) == "kelas_kuliah") { ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-7 col-lg-8">
                            <?php echo $this->session->flashdata('kelas_kuliah') ?>
                            <form method="POST" action="<?php echo base_url() ?>import/uploadkk" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleInputEmail2">Upload Data Excel</label>
                                    <span class="ml-2">
                                        <i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-title="Format yang diupload .xlsx" data-placement="top" data-content=""></i>
                                    </span>
                                    <input type="file" name="kk" class="form-control">
                                    <input type="hidden" name="kode_prodi" value="<?= $kode_prodi ?>">
                                </div>
                                <button type="submit" class="btn btn-success">Upload Data</button>
                                <a href="<?php echo base_url() ?>assets/download/kelas_sample_baru.xlsx" class="btn btn-primary">Template</a>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="panel-body">
                    <table id="data-kelas-kuliah" class="table table-striped table-bordered table-td-valign-middle">
                        <thead>
                            <tr>
                                <th class="text-nowrap">Semester</th>
                                <th class="text-nowrap">Kode Matakuliah</th>
                                <th class="text-nowrap">Nama Matakuliah</th>
                                <th class="text-nowrap">Nama Kelas</th>
                                <th class="text-nowrap">Bahasan</th>
                                <th class="text-nowrap">Tanggal Mulai Efektif</th>
                                <th class="text-nowrap">Tanggal Akhir Efektif</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <?php } ?>
                
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<script>
$(document).ready(function() {

    if ($('#data-kelas-kuliah').length !== 0) {
        var url = "<?php echo base_url('import/datakk/'.$kode_prodi); ?>";
        console.log(url);

        $('#data-kelas-kuliah').dataTable({
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

       