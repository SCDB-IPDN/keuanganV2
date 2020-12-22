<div id="content" class="content">
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="<?php echo base_url('home');?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('kepegawaian/plot');?>">Plot Dosen</a></li>
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
        
        <div class="table-responsive">
        	<div class="panel-body">
        		<table id="tbl-scdb-plot" class="table table-striped table-bordered table-td-valign-middle" width="100%">
        			<thead>
        				<tr>
        					<th class="text-nowrap">No</th>
        					<th class="text-nowrap">Nama Dosen | NIP</th>
        					<th class="text-nowrap">Nama Matkul</th>
        					<th class="text-nowrap">Tanggal</th>
        					<th class="text-nowrap">Jam Mengajar</th>
        					<th class="text-nowrap">Kelas</th>
        					<th class="text-nowrap">Nama Fakultas</th>
        					<th class="text-nowrap">Semester</th>
        				</tr>
        			</thead>
        			<tbody>
                    <?php
                $no = 0;
                foreach($data as $rows){
                $no++;
            ?>
              <tr>
                <td><?= $no == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $no ?></td>
                <td><?= $rows->nama.'|'.$rows->nip == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $rows->nama.'|'.$rows->nip ?></td>
                <td><?= $rows->nama_matkul == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $rows->nama_matkul ?></td>
                <td><?= $rows->tanggal == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $rows->tanggal ?></td>
                <td><?= $rows->jam == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $rows->jam ?></td>
                <td><?= $rows->kelas == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $rows->kelas ?></td>
                <td><?= $rows->nama_fakultas == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $rows->nama_fakultas ?></td>
                <td><?= $rows->semester == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $rows->semester ?></td>
            <?php } ?>
            </tbody>
        		</table>
        	</div>
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
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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
        						<option value="<?php echo $rows->nama.'|'.$rows->nip;?>"><?php echo $rows->nama.'|'.$rows->nip;?></option>
        						<?php } ?>
        					</select>
        				</div>
        			</div>
        		</div>
            <div class="form-group">
            	<label class="col-form-label">Mata Kuliah:</label>
            	<select class="form-control" id="nama_matkul" name="nama_matkul" required>
            		<option>--Matkul--</option>
            		<?php foreach($mk as $rows){?>
            		<option value="<?php echo $rows->nama_matkul ?>"><?php echo $rows->nama_matkul ?></option>
            		<?php } ?>
            	</select>
            </div>
            <div class="form-group">
            	<label class="col-form-label">Tanggal :</label>
            	<input type="date" class="form-control" id="tanggal" name="tanggal" required>
            </div>
            <div class="form-group">
            	<label class="col-form-label">Jam :</label>
            	<input type="text" class="form-control" id="jam" name="jam" required>
            </div>
            <div class="form-group">
            	<label class="col-form-label">Kelas :</label>
            	<input type="text" class="form-control" id="kelas" name="kelas" required>
            </div>
            <div class="form-group">
            	<label class="col-form-label">Semester :</label>
            	<input type="text" class="form-control" id="semester" name="semester" placeholder="Ganjil/Genap" required>
            </div>
            <div class="form-group">
            	<label class="col-form-label">Nama Fakultas :</label>
            	<select class="form-control" id="nama_fakultas" name="nama_fakultas" required>
            		<option>--Fakultas--</option>
            		<?php foreach($fk as $rows){?>
            		<option value="<?php echo $rows->nama_fakultas ?>"><?php echo $rows->nama_fakultas ?></option>
            		<?php } ?>
            	</select>
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
</div>

<!-- Manage -->
<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/app-manage.js');?>"></script>
