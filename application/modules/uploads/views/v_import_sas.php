<div id="content" class="content">
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Upload File Excel</a></li>
        <li class="breadcrumb-item active">Upload</li>
    </ol>
    <h1 class="page-header">Upload</b></h1>
    <div class="row">
        <div class="col-xl-12">
            <div class="panel panel-inverse" data-sortable-id="form-plugins-1">
                <div class="panel-heading">
                    <h4 class="panel-title">Upload File Excel</h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="panel-body panel-form">
                    <br>
                    <div class="row">
                        <div class="col-md-2 offset-1">
                            <?php echo $this->session->flashdata('pagu') ?>
                            <form method="POST" action="<?php echo base_url() ?>uploads/uploadPagu" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleInputEmail2">UNGGAH FILE EXCEL PAGU</label>
                                    <span class="ml-2">
                                        <i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-title="Format yang diupload .xlsx" data-placement="top" data-content=""></i>
                                    </span>
                                    <input for="biroN" type="file" name="pagu" class="form-control">
                                </div>

                                <button id="biroN" type="submit" class="btn btn-success">UPLOAD REKAP PAGU</button>
                            </form>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <div class="row">
                        <div class="col-md-2 offset-1">
                            <?php echo $this->session->flashdata('notifsulsel') ?>
                            <form method="POST" action="<?php echo base_url() ?>uploads/uploadRealisasiSulsel" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleInputEmail2">UNGGAH FILE EXCEL SULSEL</label>
                                    <span class="ml-2">
                                        <i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-title="Format yang diupload .xlsx" data-placement="top" data-content=""></i>
                                    </span>
                                    <input for="biroN" type="file" name="sulsel" class="form-control">
                                </div>

                                <button id="biroN" type="submit" class="btn btn-success">UPLOAD REKAP SULSEL</button>
                            </form>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <div class="row">
                        <div class="col-md-2 offset-1">
                            <?php echo $this->session->flashdata('notifkalbar') ?>
                            <form method="POST" action="<?php echo base_url() ?>uploads/uploadRealisasiKalbar" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleInputEmail2">UNGGAH FILE EXCEL KALBAR</label>
                                    <span class="ml-2">
                                        <i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-title="Format yang diupload .xlsx" data-placement="top" data-content=""></i>
                                    </span>
                                    <input for="biroN" type="file" name="kalbar" class="form-control">
                                </div>

                                <button id="biroN" type="submit" class="btn btn-success">UPLOAD REKAP KALBAR</button>
                            </form>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <div class="row">
                        <div class="col-md-2 offset-1">
                            <?php echo $this->session->flashdata('notifntb') ?>
                            <form method="POST" action="<?php echo base_url() ?>uploads/uploadRealisasiNTB" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleInputEmail2">UNGGAH FILE EXCEL NTB</label>
                                    <span class="ml-2">
                                        <i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-title="Format yang diupload .xlsx" data-placement="top" data-content=""></i>
                                    </span>
                                    <input for="biroN" type="file" name="ntb" class="form-control">
                                </div>

                                <button id="biroN" type="submit" class="btn btn-success">UPLOAD REKAP NTB</button>
                            </form>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <div class="row">
                        <div class="col-md-2 offset-1">
                            <?php echo $this->session->flashdata('notifpapua') ?>
                            <form method="POST" action="<?php echo base_url() ?>uploads/uploadRealisasiPapua" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleInputEmail2">UNGGAH FILE EXCEL PAPUA</label>
                                    <span class="ml-2">
                                        <i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-title="Format yang diupload .xlsx" data-placement="top" data-content=""></i>
                                    </span>
                                    <input for="biroN" type="file" name="papua" class="form-control">
                                </div>

                                <button id="biroN" type="submit" class="btn btn-success">UPLOAD REKAP PAPUA</button>
                            </form>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <div class="row">
                        <div class="col-md-2 offset-1">
                            <?php echo $this->session->flashdata('notifsulut') ?>
                            <form method="POST" action="<?php echo base_url() ?>uploads/uploadRealisasiSulut" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleInputEmail2">UNGGAH FILE EXCEL SULUT</label>
                                    <span class="ml-2">
                                        <i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-title="Format yang diupload .xlsx" data-placement="top" data-content=""></i>
                                    </span>
                                    <input for="biroN" type="file" name="sulut" class="form-control">
                                </div>

                                <button id="biroN" type="submit" class="btn btn-success">UPLOAD REKAP SULUT</button>
                            </form>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <div class="row">
                        <div class="col-md-2 offset-1">
                            <?php echo $this->session->flashdata('notifsumbar') ?>
                            <form method="POST" action="<?php echo base_url() ?>uploads/uploadRealisasiSumbar" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleInputEmail2">UNGGAH FILE EXCEL SUMBAR</label>
                                    <span class="ml-2">
                                        <i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-title="Format yang diupload .xlsx" data-placement="top" data-content=""></i>
                                    </span>
                                    <input for="biroN" type="file" name="sumbar" class="form-control">
                                </div>

                                <button id="biroN" type="submit" class="btn btn-success">UPLOAD REKAP SUMBAR</button>
                            </form>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>