<link rel="stylesheet" href="<?php echo base_url() . 'assets/js/morris.css' ?>">
<link rel="stylesheet" href="<?php echo base_url() . 'assets/plugins/bootstrap-daterangepicker/daterangepicker.css' ?>" />
<div id="content" class="content">
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('kemeng'); ?>">Presensi</a></li>
  </ol>
  <h1 class="page-header">Presensi</h1>
  <div class="row">
    <div class="col-xl-12">
      <!-- begin panel -->

      <!-- end panel -->
      <div class="panel panel-inverse">
        <div class="panel-heading">
          <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
          </div>
        </div>
        <div class="table-responsive">
          <div class="panel-body">
            <form action="<?php echo base_url('kemeng/tambah_presensi'); ?>" method="POST">
              <br>
              <div class="row">
              <div class="col-lg-8">
                <label for="basic-url">Nama Dosen:</label>
                <input type="text" class="form-control" id="nama_dosen" placeholder="Nama Dosen..">
                <br>
                <label for="basic-url">Fakultas:</label>
                <select class="form-control" id="fakulx" name="fakul" required>
                <option disabled selected> Pilih </option>
                <?php foreach($fakultaz as $rows){?>
                <option value="<?php echo $rows->nama_fakultas ?>"><?php echo $rows->nama_fakultas ?></option>
                <?php } ?>
                </select>
                <br>
                <label for="basic-url">Semester:</label>
                <select class="form-control" id="smtx" name="smt" required>
                <option disabled selected> Pilih Semester </option>
                <?php foreach($semesteer as $rows){?>
                <option value="<?php echo $rows->semester ?>"><?php echo $rows->semester ?></option>
                <?php } ?>
                </select>
                <br>
                <label for="basic-url">Mata Kuliah:</label>
                <select class="form-control" id="matkulx" name="matkul" required>
                <option disabled selected> Pilih </option>
                <?php foreach($nammatkul as $rows){?>
                <option value="<?php echo $rows->nama_matkul ?>"><?php echo $rows->nama_matkul ?></option>
                <?php } ?>
                </select>
                <br>
                <label for="basic-url">Tanggal dan Jam:</label>
										<div class="input-group date" id="datetimepicker1">
											<input type="text" class="form-control" />
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
										</div>
								</div>
               
              </div>
            </div>

          </div>
        </div>
        <div class="panel-body">
        <div class="col-11">
          <br>

          <button type="submit" class="btn btn-blue" value="Cek">Submit</button>
          <a href="<?php echo base_url('kemeng'); ?>"><button type="button" class="btn btn-secondary">Kembali</button></a>
        </div>
      </div>


    </div>


  </form>

  </div>
  <br>


</div>
</div>
<!-- end panel-body -->
</div>
<!-- end panel -->
</div>
<!-- end col-10 -->
</div>
</div>

<script src="<?php echo base_url() . 'assets/js/jquery.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/js/raphael-min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/js/morris.min.js' ?>"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
<link hrf="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" rel="stylesheet"></link>
<script src="<?php echo base_url() . 'assets/plugins/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js' ?>"></script>

<script src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>" type="text/javascript"></script>
<script src="<?php echo base_url().'assets/js/bootstrap.js'?>" type="text/javascript"></script>
<script src="<?php echo base_url().'assets/js/jquery-ui.js'?>" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $( "#nama_dosen" ).autocomplete({
              source: "<?php echo site_url('kemeng/get_autocomplete/?');?>"
            });
        });
    </script>
