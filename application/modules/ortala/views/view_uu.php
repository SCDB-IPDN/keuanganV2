<link rel="stylesheet" href="<?php echo base_url() . 'assets/js/morris.css' ?>">
<div id="content" class="content">
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('ortala'); ?>">Undang-Undang</a></li>

  </ol>
  <h1 class="page-header">Presensi</h1>
  <div class="row">
    <div class="col-xl-12">
      <!-- begin panel -->
      
      <!-- end panel -->
      <div class="panel panel-inverse">
        <div class="panel-heading">
          <h4 class="panel-title">
          <span><a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#adduu">TAMBAH UNDANG-UNDANG</a></span>
 <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus-square"></i></button> -->
            <!-- <a href="" class="btn btn-icon btn-sm btn-inverse" data-toggle="modal" data-target="#addpeg"><i class="fa fa-plus-square"></i></a> -->
          </h4>
          <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
          </div>
        </div>

        <!-- <p><a href="export.php"><button>Export Data ke Excel</button></a></p> -->
        <div class="table-responsive">
		  	<?php if ($this->session->flashdata('uu') != NULL) { ?>
				<div class="alert alert-<?php echo $this->session->flashdata('uu') [0] ?> alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong><i class="fa fa-info-circle"></i></strong> <?php echo $this->session->flashdata('uu') [1] ?>
				</div>
			<?php } ?> 
		 
          <!-- <a href="<?php echo base_url('uu/export'); ?>">Export Data</a> -->

          <div class="panel-body">
            <table id="data-presensi" class="table table-striped table-bordered table-td-valign-middle" width="100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>KATEGORI</th>
                  <TH>NOMOR</TH>
                  <th>TAHUN</th>
                  <th>TENTANG</th>
                  <th>FILE</th>
                  <th>STATUS</th>
				  <th>AKSI</th>
                </tr>
              </thead>

            </table>
          </div>
        </div>
        <!-- end panel-body -->
      </div>
      <!-- end panel -->
    </div>
    <!-- end col-10 -->

    <!-- Modal ADD prokum -->
    <div class="modal fade" id="adduu" tabindex="-1" role="dialog" aria-labelledby="adduuu" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adduuu">Tambah Produk Hukum</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="col-xl">
                    <form action="adduu" method="POST">
                        <div class="form-group">
                            <label class="col-form-label">Kategori:</label>
                            <select class="form-control" id="kat" name="kat" required>
                                        <option disabled selected> Pilih Kategori</option>
                                        <?php foreach($kat as $rows){?>
                                            <option value="<?php echo $rows->nama_kat ?>"><?php echo $rows->nama_kat ?></option>
                                        <?php } ?>
                                    </select>
                              
                            <label class="col-form-label">Nomor:</label>
                            <input type="text" class="form-control" id="nomor" name="Nomor" placeholder="Nomor" required>

                            <label class="col-form-label">Tahun:</label>
                            <input type="year" class="form-control" id="tahun" name="Tahun" placeholder="Tahun" required>
                         
                            <label class="col-form-label">Tentang:</label>
                            <textarea class="form-control" id="tentang" name="tentang" placeholder="Tentang" required></textarea>
                            
                            <label class="col-form-label">Link:</label>
                            <input type="text" class="form-control" id="link" name="Link" placeholder="Link" required>
                            
                            <label class="col-form-label">Status:</label>
                            <select type="text" class="form-control" name="status" id="Status">
                                <option disabled selected> Pilih Status</option>  
                                <option value="aktif">Aktif</option>
                                <option value="non-aktif">Non Aktif</option>
                            </select>
                            </div>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" value="Cek">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

        <!-- Modal EDIT prokum -->
        <div class="modal fade" id="editprokum" tabindex="-1" role="dialog" aria-labelledby="editprokum" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="editthll">Edit Produk Hukum</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form action="edit_prokum" method="POST">
                        <input type="hidden" class="form-control" id="id_prokumx" name="id_prokum">
                        <div class="form-group">
                        <label class="col-form-label">Kategori:</label>
                            <select class="form-control" id="kat" name="kat" required>
                                        <option disabled selected> Pilih Kategori</option>
                                        <?php foreach($kat as $rows){?>
                                            <option value="<?php echo $rows->nama_kat ?>"><?php echo $rows->nama_kat ?></option>
                                        <?php } ?>
                                    </select>
                              
                            <label class="col-form-label">Nomor:</label>
                            <input type="text" class="form-control" id="nomor" name="Nomor" placeholder="Nomor" required>

                            <label class="col-form-label">Tahun:</label>
                            <input type="year" class="form-control" id="tahun" name="Tahun" placeholder="Tahun" required>
                            
                            <label class="col-form-label">Tentang:</label>
                            <textarea class="form-control" id="tentang" name="tentang" placeholder="Tentang" required></textarea>
                            
                            <label class="col-form-label">Link:</label>
                            <input type="text" class="form-control" id="link" name="Link" placeholder="Link" required>
                            
                            <label class="col-form-label">Status:</label>
                            <select type="text" class="form-control" name="status" id="Status">
                                <option disabled selected> Pilih Status</option>  
                                <option value="aktif">Aktif</option>
                                <option value="non-aktif">Non Aktif</option>
                            </select>

                            </div>
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
    <div class="modal fade" id="delprokum" tabindex="-1" role="dialog" aria-labelledby="delprokumm" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="delprokumm">Hapus Produk Hukum</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="del_prokum">
                        <div class="modal-body">
                            <p>Anda yakin mau menghapus Data <input type="text" id="namaxx" disabled> ?</p>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" id="id_prokumxx" name="id_prokum">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button class="btn btn-danger">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

  $(document).ready(function() {

    var url = '<?php echo base_url('ortala/get_uu');?>';
    // alert(url);

        $('#data-uu').dataTable({
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
      });

    </script>

<script>
      $(document).ready(function() {
        // Untuk sunting
        $('#editprokum').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

            // Isi nilai pada field
            modal.find('#kat').attr("value",div.data('kategori'));
            modal.find('#nomor').attr("value",div.data('nomor'));
            modal.find('#tahun').attr("value",div.data('tahun'));
            modal.find('#tentang').attr("value",div.data('tentang'));
            modal.find('#link').attr("value",div.data('link'));
            modal.find('#status').attr("value",div.data('status'));

          });
        // Untuk sunting
        $('#delprokum').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

            // Isi nilai pada field
            modal.find('#kat').attr("value",div.data('kategori'));
            modal.find('#nomor').attr("value",div.data('nomor'));
            modal.find('#tahun').attr("value",div.data('tahun'));
            modal.find('#tentang').attr("value",div.data('tentang'));
            modal.find('#link').attr("value",div.data('link'));
            modal.find('#status').attr("value",div.data('status'));
          });
      });
    </script>