<div id="content" class="content">
	<ol class="breadcrumb float-xl-right">
		<li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Dashboard</a></li>
    	<li class="breadcrumb-item"><a href="<?php echo base_url('kerjasama'); ?>">Kerjasama</a></li>
	</ol>
  	<h1 class="page-header">List Dokumen Kerjasama (MOU)</h1>
  	<div class="row">
    	<div class="col-xl-12">
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title">
					<?php if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'kerjasama'){?>
						<span><a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#addmou">TAMBAH MOU</a></span>
						<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus-square"></i></button> -->
						<!-- <a href="" class="btn btn-icon btn-sm btn-inverse" data-toggle="modal" data-target="#addpeg"><i class="fa fa-plus-square"></i></a> -->
						<?php } ?> 
					</h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn- icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<!-- <p><a href="export.php"><button>Export Data ke Excel</button></a></p> -->
				<div class="table-responsive">
					<?php if ($this->session->flashdata('mou') != NULL) { ?>
						<div class="alert alert-<?php echo $this->session->flashdata('mou') [0] ?> alert-dismissible">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<strong><i class="fa fa-info-circle"></i></strong> <?php echo $this->session->flashdata('mou') [1] ?>
						</div>
					<?php } ?> 
			
					<!-- <a href="<?php //echo base_url('uu/export'); ?>">Export Data</a> -->

					<div class="panel-body">
						<table id="data-mou" class="table table-striped table-bordered table-td-valign-middle" width="100%">
							<thead>
								<tr>
									<th>No</th>
									<th>MITRA</th>
									<th>NO MITRA</th>
									<th>NO IPDN</th>
									<th>TMT</th>
									<th>HAL</th>
									<th>MASA BERLAKU</th>
                                    <th>STATUS</th>
									<th>FILE</th>
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
	</div>
</div>

    <!-- Modal ADD mou -->
    <div class="modal fade" id="addmou" tabindex="-1" role="dialog" aria-labelledby="addmou" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addmouu">Tambah MOU</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    	<span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="col-xl">
                    <form action="<?php echo base_url('kerjasama/add_mou'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">

                            <label class="col-form-label">Mitra:</label>
                            <input type="text" class="form-control" name="mitra" placeholder="Mitra" required>

                            <label class="col-form-label">No Mitra:</label>
                            <input type="text" class="form-control" name="no_mitra" placeholder="Nomor Mitra" required>

							<label class="col-form-label">No IPDN:</label>
							<input type="text" class="form-control" name="no_ipdn" placeholder="Nomor IPDN" required>

                            <label class="col-form-label">TMT:</label>
                            <input type="date" class="form-control" name="tmt" placeholder="TMT" required>
                         
                            <label class="col-form-label">Hal:</label>
                            <textarea class="form-control" name="hal" placeholder="Hal" required></textarea>

                            <label class="col-form-label">Masa Berlaku:</label>
                            <input class="form-control" name="masa_berlaku" placeholder="Masa Berlaku" required></textarea>
                            
                            <label class="col-form-label">Status:</label>
                            <select type="text" class="form-control" name="status" id="Status" required>
                                <option value="" disabled selected> Pilih Status</option>  
                                <option value="Habis Masa Berlaku">Habis Masa Berlaku</option>
                                <option value="Masih Berlaku">Masih Berlaku</option>
							</select>
							
							<label class="col-form-label">File:</label>
                            <input type="file" class="form-control" name="file" accept="application/pdf">
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

    <!-- Modal EDIT mou -->
    <div class="modal fade" id="editmou" tabindex="-1" role="dialog" aria-labelledby="editmou" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                	<h5 class="modal-title">Edit MOU</h5>
                	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    	<span aria-hidden="true">&times;</span>
                	</button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('kerjasama/edit_mou'); ?>" method="POST" enctype="multipart/form-data">

                        <div class="form-group">                              

                            <label class="col-form-label">Mitra:</label>
                            <input type="text" class="form-control" name="mitra" placeholder="Mitra" required>

                            <label class="col-form-label">No Mitra:</label>
                            <input type="text" class="form-control" name="no_mitra" placeholder="Nomor Mitra" required>

							<label class="col-form-label">No IPDN:</label>
							<input type="text" class="form-control" name="no_ipdn" placeholder="Nomor IPDN" required>

                            <label class="col-form-label">TMT:</label>
                            <input type="date" class="form-control" name="tmt" placeholder="TMT" required>
                         
                            <label class="col-form-label">Hal:</label>
                            <textarea class="form-control" name="hal" placeholder="Hal" required></textarea>

                            <label class="col-form-label">Masa Berlaku:</label>
                            <input class="form-control" name="masa_berlaku" placeholder="Masa Berlaku" required></textarea>
                            
                            <label class="col-form-label">Status:</label>
                            <select type="text" class="form-control" name="status" id="Status" required>
                                <option value="" disabled selected> Pilih Status</option>  
                                <option value="Habis Masa Berlaku">Habis Masa Berlaku</option>
                                <option value="Masih Berlaku">Masih Berlaku</option>
							</select>
							
							<label class="col-form-label">File:</label>
							<div id="nama_pdf" class="my-1"></div>
							<input type="file" id="file_edit" class="form-control" name="file" accept="application/pdf">
							<p class="mt-1 text-danger" id="pdf_info"></p>

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

    <!-- Modal HAPUS prokum -->
    <div class="modal fade" id="delmou" tabindex="-1" role="dialog" aria-labelledby="delmouu" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                	<h5 class="modal-title" id="delmouu">Hapus MOU</h5>
                	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    	<span aria-hidden="true">&times;</span>
                	</button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="<?php echo base_url('kerjasama/del_prokum'); ?>">
                        <div class="modal-body" id="del-info"></div>
                        <div class="modal-footer">
							<input type="hidden" id="del_id_mou" name="del_id_mou">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
	</div>
	
<script src="<?php echo base_url() . 'assets/js/jquery.min.js' ?>"></script>
<script>
$(document).ready(function() {
    var url = '<?php echo base_url('kerjasama/get_mou');?>';
    $('#data-mou').dataTable({
        buttons: [
        	'copy', 'excel', 'print'
        ],
        responsive: true,
		"ajax": {
			"url": url,
			"dataSrc": ""
		},
		"columnDefs": [
			{ 
				"orderable": false, 
				"targets": 10 
			}
  		]
	});
	
	// Edit
	$('#editmou').on('show.bs.modal', function (event) {
		var div = $(event.relatedTarget); // Tombol dimana modal di tampilkan
		var modal = $(this);
		var status_edit = div.data('status');
		var nama_pdf = div.data('file');

		// Isi nilai pada field
		modal.find('#id').attr("value", div.data('id'));
		modal.find('#mitra').attr("value", div.data('mitra'));
		modal.find('#no_mitra').attr("value", div.data('no_mitra'));
		modal.find('#no_ipdn').attr("value", div.data('no_ipdn'));
        modal.find('#tmt').attr("value", div.data('tmt'));
        modal.find('#hal').text(div.data('hal'));
        modal.find('#masa_berlaku').attr("value", div.data('masa_berlaku'));
		modal.find(`#status option[value="${status_edit}"]`).attr("selected","selected");

		if(nama_pdf) {
            modal.find('#nama_pdf').text(nama_pdf);
            modal.find('#pdf_info').text("*Abaikan field ini jika tidak ingin mengubah file");
        }
	});
		  
	// Hapus
	$('#delmou').on('show.bs.modal', function (event) {
		var del = $(event.relatedTarget) // Tombol dimana modal di tampilkan
		var modal = $(this)

		var mitra_del = del.data('mitra');
		var nomor_del = del.data('no_ipdn');
		var hal_del = del.data('hal');
		modal.find('#del_id_mou').attr("value", del.data('id'));
		modal.find('#del-info').text(`Anda yakin akan menghapus MOU Mitra ${mitra_del} nomor ${nomor_del} tentang ${hal_del}?`);
	});
});
</script>