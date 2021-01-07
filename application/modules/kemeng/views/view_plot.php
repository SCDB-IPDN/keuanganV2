<div id="content" class="content">
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="<?php echo base_url('home');?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('kemeng/plot');?>">Plot Dosen</a></li>
  </ol>
  <h1 class="page-header">Plot Dosen</h1>

  <!-- TABEL -->
  <div class="row">
    <div class="col-xl-12">
      <div class="panel panel-inverse">
        <div class="panel-heading">
          <h4 class="panel-title">
          <?php if($this->session->userdata('role') == 'Admin'){?>
			<span><a href="" class="btn btn-sm btn-yellow" data-toggle="modal" data-target="#addplot">TAMBAH PLOT</a></span>
          <?php } ?>
          </h4>
          <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
          </div>
        </div>
        <?php if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'Kepegawaian'){?>
        <?php } ?>
        <?php if($this->session->flashdata('plot') != NULL){ ?>
        <div class="alert alert-success alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Notif!</strong> <?php echo $this->session->flashdata('plot') ?>
        </div>
        <?php } ?>

        	<div class="panel-body">
        		<table id="tbl-plot" class="table table-striped table-bordered table-td-valign-middle" width="100%">
        			<thead>
        				<tr>
        					<th>No</th>
        					<th>Nama Dosen | NIP</th>
        					<th>Nama Matkul</th>
        					<th>Tanggal</th>
        					<th>Jam Mengajar</th>
        					<th>Kelas</th>
                  <th>Semester</th>
                  <th>Nama Fakultas</th>
                  <th>Nama Progdi</th>
                  <?php if($this->session->userdata('role') == 'Admin'){?>
                    <th>OPSI</th>
                  <?php } ?>
        				</tr>
        			</thead>
              <tbody>
              </tbody>
        		</table>
        	</div>
        </div>
      </div>
    </div>
  <!-- END TABEL -->

  <!-- Modal ADD PLOT -->
  <div class="modal fade" id="addplot" tabindex="-1" role="dialog" aria-labelledby="addplot" aria-hidden="true">
  	<div class="modal-dialog" role="document">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h5 class="modal-title" id="addplot">Tambah Plot Dosen</h5>
  				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
  						aria-hidden="true">&times;</span></button>
  			</div>
  			<div class="modal-body">
  				<form action="kemeng/tambah_plot" method="POST">
  					<div class="form-group">
  						<div class="row">
  							<div class="col-sm-8">
  								<label class="col-form-label">Nama Dosen :</label>
  								<select class="form-control" id="nama" name="nama" required>
  									<option>--Nama|Nip--</option>
  									<?php foreach($tp as $rows){?>
  									<option value="<?php echo $rows->nama.'|'.$rows->nip;?>"><?php echo $rows->nama.'|'.$rows->nip;?>
  									</option>
  									<?php } ?>
  								</select>
  							</div>
  						</div>
  					</div>
  					<div class="form-group">
  						<div class="row">
  							<div class="col-xl-3">
  								<label class="col-form-label">Kode Matkul :</label>
  								<input type="text" class="form-control" id="id_matkul" name="id_matkul" placeholder="ID Matkul..">
  							</div>
  							<div class="col-xl">
  								<label class="col-form-label">Nama Matkul :</label>
                  <select class="form-control" id="nama_matkul" name="nama_matkul" required>
                  	<option>--Matkul--</option>
                  	<?php foreach($mk as $rows){?>
                  	<option value="<?php echo $rows->nama_matkul ?>"><?php echo $rows->nama_matkul ?></option>
                  	<?php } ?>
                  </select>
  							</div>
  						</div>
  					</div>
  					<div class="form-group">
  						<div class="row">
  							<div class="col-xl-3">
  								<label class="col-form-label">Jam :</label>
  								<input type="time" class="form-control" id="jam" name="jam" required>
  							</div>
                <div class="col-xl">
  								<label class="col-form-label">Tanggal :</label>
  								<input type="date" class="form-control" id="tanggal" name="tanggal" required>
  							</div>
  						</div>
            </div>
  					<div class="form-group">
  						<label class="col-form-label">Kelas :</label>
  						<input type="text" class="form-control" id="kelas" name="kelas" required>
  					</div>
  					<div class="form-group">
  						<label class="col-form-label">Semester :</label>
  						<select class="form-control" id="semester" name="semester" required>
  							<option>--Semester--</option>
  							<option>GANJIL 2020/2021</option>
  							<option>GENAP 2020/2021</option>
  						</select>
  					</div>
  					<div class="form-group">
  						<div class="row">
  							<div class="col-xl-3">
  								<label class="col-form-label">Id Fakultas :</label>
  								<input type="text" class="form-control" id="id_fakultas" name="id_fakultas" placeholder="ID Matkul..">
  							</div>
  							<div class="col-xl">
  								<label class="col-form-label">Nama Fakultas :</label>
  								<select class="form-control" name="nama_fakultas" id="nama_fakultas">
  									<option>--Fakultas--</option>
  									<?php foreach($fk as $rows){?>
  									<option value="<?php echo $rows->nama_fakultas ?>"><?php echo $rows->nama_fakultas ?></option>
  									<?php } ?>
  								</select>
  							</div>
  						</div>
  					</div>
            <div class="form-group">
  						<div class="row">
  							<div class="col-xl-3">
  								<label class="col-form-label">ID Prodi :</label>
  								<input type="text" class="form-control" id="id_prodi" name="id_prodi" required>
  							</div>
                <div class="col-xl">
  								<label class="col-form-label">Nama Prodi :</label>
  								<select class="form-control" name="nama_prodi" id="nama_prodi">
  									<option>--Prodi--</option>
  									<?php foreach($prodi as $rows){?>
  									<option value="<?php echo $rows->nama_prodi ?>"><?php echo $rows->nama_prodi ?></option>
  									<?php } ?>
  								</select>
  							</div>
  						</div>
            </div>
            <div class="form-group">
            	<label class="col-form-label">Sks :</label>
            	<input type="text" class="form-control" id="sks" name="sks" required>
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

<!-- END Modal tambah -->

  <!-- Modal Edit -->
  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-plot" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
           <h4 class="modal-title">Ubah Data Plot</h4>
           <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
         </div>
         <form class="form-horizontal" action="<?php echo base_url('kemeng/edit_plot')?>" method="post" enctype="multipart/form-data" role="form">
           <div class="modal-body">
           <div class="form-group">
            	<label class="col-form-label">Nama Dosen :</label>
              <input type="hidden" class="form-control" id="id_plot" name="id_plot">
            	<input type="text" class="form-control" id="nama" name="nama" readonly="">
            </div>
           <div class="form-group">
            	<label class="col-form-label">Tanggal :</label>
            	<input type="date" class="form-control" id="tanggal" name="tanggal" required>
            </div>
            <div class="form-group">
            	<label class="col-form-label">Nama Matkul :</label>
            	<input type="text" class="form-control" id="nama_matkul" name="nama_matkul" readonly="">
            </div>
            <div class="form-group">
            	<label class="col-form-label">Jam :</label>
            	<input type="time" class="form-control" id="jam" name="jam" required>
            </div>
            <div class="form-group">
            	<label class="col-form-label">Kelas :</label>
            	<input type="text" class="form-control" id="kelas" name="kelas" required>
            </div>
            <div class="form-group">
            	<label class="col-form-label">Semester :</label>
            	<input type="text" class="form-control" id="semester" name="semester" readonly="">
            </div>
            <div class="form-group">
            	<label class="col-form-label">Nama Fakultas :</label>
            	<input type="text" class="form-control" id="nama_fakultas" name="nama_fakultas" readonly="">
            </div>
          <div class="modal-footer">
           <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
           <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
         </div>
       </form>
     </div>
   </div>
 </div>
</div>
 <!-- END Modal Edit -->

 <!-- Modal HAPUS PLOT -->
<div class="modal fade" id="hapusplot" tabindex="-1" role="dialog" aria-labelledby="hapusplot" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapusplot">Hapus Data Matkuliah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="post" action="hapus_plot">
          <div class="modal-body">
            <p>Anda yakin akan menghapus Data : </p>
            <div class="form-group">
          <div class="row">
            <div class="col-xl">
            <input type="hidden" id="id_plot" name="id_plot">
            <input type="text" class="form-control" id="nama" name="nama" readonly="">
            </div>
          </div>
        </div>

          </div>
          <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>

            <button class="btn btn-danger">Hapus</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- END Modal Hapus -->

<script src="<?php echo base_url() . 'assets/js/jquery.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/js/raphael-min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/js/morris.min.js' ?>"></script>
<script>

  $(document).ready(function() {

    var url = '<?php echo base_url('kemeng/table_plot');?>';
        // alert(url);

        $('#tbl-plot').dataTable({
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
        $('#edit-plot').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

            // Isi nilai pada field
            modal.find('#id_plot').attr("value",div.data('id_plot'));
            modal.find('#nama').attr("value",div.data('nama'));
            modal.find('#tanggal').attr("value",div.data('tanggal'));
            modal.find('#jam').attr("value",div.data('jam'));
            modal.find('#kelas').attr("value",div.data('kelas'));
            modal.find('#nama_matkul').attr("value",div.data('nama_matkul'));
            modal.find('#nama_fakultas').attr("value",div.data('nama_fakultas'));
            modal.find('#nama_progdi').attr("value",div.data('nama_progdi'));
            modal.find('#semester').attr("value",div.data('semester'));
          });
        // Untuk sunting
        $('#hapusplot').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

            // Isi nilai pada field
            modal.find('#id_plot').attr("value",div.data('id_plot'));
            modal.find('#nama').attr("value",div.data('nama'));

          });
      });
    </script>


    
