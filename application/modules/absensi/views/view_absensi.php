
<div id="content" class="content">
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('absensi'); ?>">Detail </a></li>

  </ol>
  <h1 class="page-header"> ABSENSI</h1>
  <div class="row">
    <div class="col-xl-12">
      <!-- begin panel -->

      <!-- end panel -->
      <div class="panel panel-inverse">
        <div class="panel-heading">
          <h4 class="panel-title">
          </h4>
          <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
          </div>
        </div>
        <div class="table-responsive">
          <div class="panel-body">
            <h3> DATA DIRI </h3>
            <br>
            <div class="row">
             <div class="col-3">
              <label for="basic-url">Penugasan  : </label>
              <input class="form-control" list="penugasann" name="penugasan" id="penugasan">
              <datalist id="penugasann">
               <?php foreach (json_decode($divisi, true) as $x) : ?>

                 <option value="<?php echo $x['penugasan'] ?>">

                 <?php endforeach; ?>
               </datalist>
               <br>

             </div>
           </div>

         </div>
       </div>
       <div class="panel-body">
         <table class="table table-striped table-bordered table-td-valign-middle" id="absensi" width="100%">
          <thead>
            <tr align="center">

              <th>ID ABSEN </th>
              <th>TANGGAL</th>
              <th>WAKTU</th>
              <th>KETERANGAN</th>
              <th>NAMA</th>
              <th>PENUGASAN</th>

            </tr>
          </thead>
        </table>
        
      </div>


    </div>


    <div id="ini">

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

<script >
 $(document).on('change', 'input', function(){
  var options = $('datalist')[0].options;
  var val = $(this).val();
  for (var i=0;i<options.length;i++){
   if (options[i].value === val) {
     
    var uri = "<?php echo base_url('absensi').'/coba/'; ?>"+ val;
    console.log(uri);
    $('#absensi').dataTable({
      "searching": false,
      "paging": false,
      retrieve: true,
      dom: 'Bfrtip',
        buttons: [
        'copy', 'excel', 'print'
        ],
      destroy: true,
      "ajax": {
        "url": uri,
        "dataSrc": ""
      },
      "columns": [
      { "data": "id_absen" },
      { "data": "tgl" },
      { "data": "waktu" },
      { "data": "keterangan"},
      { "data": "nama"},
      { "data": "penugasan"}
      ]
    });
    break;
  }
}
});

</script>

