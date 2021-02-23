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
							<span>
								<a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#addmou">TAMBAH MOU</a>
							</span>
						<?php } ?> 
					</h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<div class="table-responsive">
					<?php if ($this->session->flashdata('mou') != NULL) { ?>
						<div class="alert alert-<?php echo $this->session->flashdata('mou') [0] ?> alert-dismissible">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<strong><i class="fa fa-info-circle"></i></strong> <?php echo $this->session->flashdata('mou') [1] ?>
						</div>
					<?php } ?> 
					<div class="panel-body">
						<tbody>
							<tr>
								<td>
									<select name="filter" id="filter_year" class="form-control col-sm-2 mb-3"></select>
								</td>
							</tr>
						</tbody>
						<table id="data-mou" class="table table-striped table-bordered table-td-valign-middle" width="100%">
							<thead>
								<tr>
									<th>No</th>
									<th>MITRA</th>
									<th>NO MITRA</th>
									<th>NO INT</th>
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

<!-- Modal ADD MOU -->
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

						<label class="col-form-label">NO INT:</label>
						<input type="text" class="form-control" name="no_int" placeholder="Nomor IPDN" required>

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

<!-- Modal EDIT MOU -->
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
						<input type="hidden" name="id_mou" id="id_mou">
						<label class="col-form-label">Mitra:</label>
						<input type="text" class="form-control" name="mitra" id="mitra" placeholder="Mitra" required>

						<label class="col-form-label">No Mitra:</label>
						<input type="text" class="form-control" name="no_mitra" id="no_mitra" placeholder="Nomor Mitra" required>

						<label class="col-form-label">NO INT:</label>
						<input type="text" class="form-control" name="no_int" id="no_int" placeholder="Nomor IPDN" required>

						<label class="col-form-label">TMT:</label>
						<input type="date" class="form-control" name="tmt" id="tmt" placeholder="TMT" required>
						
						<label class="col-form-label">Hal:</label>
						<textarea class="form-control" name="hal" id="hal" placeholder="Hal" required></textarea>

						<label class="col-form-label">Masa Berlaku:</label>
						<input class="form-control" name="masa_berlaku" id="masa_berlaku" placeholder="Masa Berlaku" required></textarea>
						
						<label class="col-form-label">Status:</label>
						<select type="text" class="form-control" name="status" id="status" required>
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

<!-- Modal HAPUS MOU -->
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
				<form class="form-horizontal" method="post" action="<?php echo base_url('kerjasama/del_mou'); ?>">
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
function get_tmt_year(){
    var base_url = window.location.origin + "/" + window.location.pathname.split("/")[1] ;
	$.ajax({
		type: 'POST',
		url: `${base_url}/kerjasama/tmt_year`,
		success: function(data){
			$("#filter_year").html('<option value="" selected>Filter Tahun</option>'); 
			var dataObj = jQuery.parseJSON(data);
			if(dataObj) {
				$(dataObj).each(function() {
					var option = $('<option />');
					option.attr('value', this).text(this);           
					$("#filter_year").append(option);
				});
			}
			else {
				$("#filter_year").html('<option value="">Pilihan tidak ada</option>');
			}
		}
	}); 
}

$(document).ready(function() {
	// list MOU
	get_tmt_year();
    var url = '<?php echo base_url('kerjasama/get_mou');?>';
    var list_mou = $('#data-mou').DataTable({
        dom: 'Bfrtip',
		buttons: [
        	'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        responsive: true,
		"ajax": {
			"url": url,
			"dataSrc": ""
		},
		"columnDefs": [
			{ 
				"orderable": false, 
				"targets": 9 
			}
  		]
	});

	$('#filter_year').on( 'change', function () {
		list_mou
        .column( 4 )
        .search( this.value )
        .draw();
	});
	
	// Edit MOU
	$('#editmou').on('show.bs.modal', function (event) {
		var div = $(event.relatedTarget);
		var modal = $(this);
		var status_edit = div.data('status');
		var nama_pdf = div.data('file');

		// Isi nilai pada field
		modal.find('#id_mou').attr("value", div.data('mou'));
		modal.find('#mitra').attr("value", div.data('mitra'));
		modal.find('#no_mitra').attr("value", div.data('no_mitra'));
		modal.find('#no_int').attr("value", div.data('no_int'));
        modal.find('#tmt').attr("value", div.data('tmt'));
        modal.find('#hal').text(div.data('hal'));
        modal.find('#masa_berlaku').attr("value", div.data('masa_berlaku'));
		modal.find(`#status option[value="${status_edit}"]`).attr("selected","selected");

		if(nama_pdf) {
            modal.find('#nama_pdf').text(nama_pdf);
            modal.find('#pdf_info').text("*Abaikan field ini jika tidak ingin mengubah file");
        }
	});
		  
	// Hapus MOU
	$('#delmou').on('show.bs.modal', function (event) {
		var del = $(event.relatedTarget);
		var modal = $(this);

		var mitra_del = del.data('mitra');
		var nomor_del = del.data('no_ipdn');
		var hal_del = del.data('hal');
		modal.find('#del_id_mou').attr("value", del.data('id'));
		modal.find('#del-info').text(`Anda yakin akan menghapus MOU Mitra ${mitra_del} nomor ${nomor_del} tentang ${hal_del}?`);
	});
});
</script>