<div id="content" class="content">
	<ol class="breadcrumb float-xl-right">
		<li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Dashboard</a></li>
    	<li class="breadcrumb-item"><a href="<?php echo base_url('praja'); ?>">Praja</a></li>
	</ol>
  	<h1 class="page-header">Data Keprajaan</h1>
  	<div class="row">
    	<div class="col-xl-12">
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
									<select name="filter" id="filter_angkatan" class="form-control col-sm-2 mb-3"></select>
								</td>
							</tr>
						</tbody>
						<table id="data-praja" class="table table-striped table-bordered table-td-valign-middle" width="100%">
							<thead>
								<tr>
									<th>No</th>
									<th>NPP</th>
									<th>Nama Lengkap</th>
									<th>Jenis Kelamin</th>
									<th>Status</th>
									<th>Tingkat</th>
									<th>Angkatan</th>
                  <th>Opsi</th>
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

<!-- Modal View -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="show-data" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Data Praja</h4>
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>

      </div>
      <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" role="form">
       <div class="modal-body">
         <div class="form-group">
           <div class="row">
            <div class="col-xl">
             <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" href="#profile" role="tab" data-toggle="tab">Data Praja</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#ortu" role="tab" data-toggle="tab">Data Orang Tua</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#wali" role="tab" data-toggle="tab">Data Wali</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#lain" role="tab" data-toggle="tab">Data Lain-lain</a>
              </li>
            </ul>
          </div>
        </div>

        <!-- Tab panes -->

        <div class="tab-content">
         <div role="tabpanel" class="tab-pane fade active show" id="profile">

          <table class="table table-striped" align="center">
            <tbody>
              <br>

              <tr>
                <td><input type="text" readonly class="form-control-plaintext" placeholder="NPP"></td>
                <td><input type="text" readonly class="form-control-plaintext" id="nppx" ></td>
              </tr>
              <tr>
                <td><input type="text" readonly class="form-control-plaintext" placeholder="Nama Praja"></td>
                <td><input type="text" readonly="" class="form-control-plaintext" id="namax"></td>
              </tr>
              <tr>
                <td><input type="text" readonly class="form-control-plaintext" placeholder="Jenis Kelamin"></td>
                <td><input type="text" readonly class="form-control-plaintext" id="jkx"></td>
              </tr>
              <tr>
                <td><input type="text" readonly class="form-control-plaintext" placeholder="Tempat Tanggal Lahir"></td>
                <td><input type="text" readonly class="form-control-plaintext" id="tmpt_lahirx" ></td>

              </tr>
              <tr>
                <td><input type="text" readonly class="form-control-plaintext" placeholder="NISN"></td>
                <td><input type="text" readonly class="form-control-plaintext" id="nisnx" ></td>
              </tr>
              <tr>
                <td><input type="text" readonly class="form-control-plaintext" placeholder="NPWP"></td>
                <td><input type="text" readonly class="form-control-plaintext" id="npwpx" ></td>
              </tr>
              <tr>
                <td><input type="text" readonly class="form-control-plaintext" placeholder="NO SPCP"></td>
                <td><input type="text" readonly class="form-control-plaintext" id="no_spcpx" ></td>
              </tr>
              <tr>

                <td><input type="text" readonly class="form-control-plaintext" placeholder="NIK"></td>
                <td><input type="text" readonly class="form-control-plaintext" id="nik_prajax" ></td>
              </tr>
              <tr>
                <td><input type="text" readonly class="form-control-plaintext" placeholder="Agama"></td>
                <td> <input type="text" readonly class="form-control-plaintext" id="agamax" ></td>
              </tr>
              <tr>
                <td><input type="text" readonly class="form-control-plaintext" placeholder="Alamat"></td>
                <td><input type="text" readonly class="form-control-plaintext" id="alamatx" style="height:10px;"></td>
              </tr>
              <tr>
                <td><input type="text" readonly class="form-control-plaintext" placeholder="RT"></td>
                <td><input type="text" readonly class="form-control-plaintext" id="rtx" ></td>
              </tr>
              <tr>
                <td><input type="text" readonly class="form-control-plaintext" placeholder="RW"></td>
                <td> <input type="text" readonly class="form-control-plaintext" id="rwx" ></td>
              </tr>
              <tr>
                <td><input type="text" readonly class="form-control-plaintext" placeholder="Nama Dusun"></td>
                <td> <input type="text" readonly class="form-control-plaintext" id="nama_dusunx" ></td>
              </tr>
              <tr>
                <td><input type="text" readonly class="form-control-plaintext" placeholder="Kelurahan"></td>
                <td> <input type="text" readonly class="form-control-plaintext" id="kelurahanx" ></td>
              </tr>
              <tr>
                <td><input type="text" readonly class="form-control-plaintext" placeholder="Kecamatan"></td>
                <td><input type="text" readonly class="form-control-plaintext" id="kecamatanx" ></td>
              </tr>
              <tr>
                <td><input type="text" readonly class="form-control-plaintext" placeholder="Kode Pos"></td>
                <td> <input type="text" readonly class="form-control-plaintext" id="kode_posx" ></td>
              </tr>
              <tr>
                <td><input type="text" readonly class="form-control-plaintext" placeholder="Jenis Tinggal"></td>
                <td> <input type="text" readonly class="form-control-plaintext" id="jenis_tinggalx" ></td>
              </tr>
              <tr>
                <td><input type="text" readonly class="form-control-plaintext" placeholder="Alat Transportasi"></td>
                <td> <input type="text" readonly class="form-control-plaintext" id="alat_transportx" ></td>
              </tr>
              <tr>
                <td><input type="text" readonly class="form-control-plaintext" placeholder="Tlp Rumah"></td>
                <td> <input type="text" readonly class="form-control-plaintext" id="tlp_rumahx" ></td>
              </tr>
              <tr>
                <td><input type="text" readonly class="form-control-plaintext" placeholder="No Hp"></td>
                <td> <input type="text" readonly class="form-control-plaintext" id="tlp_pribadix" ></td>
              </tr>
              <tr>
                <td><input type="text" readonly class="form-control-plaintext" placeholder="Email"></td>
                <td><input type="text" readonly class="form-control-plaintext" id="emailx" ></td>
              </tr>
              <tr>
                <td><input type="text" readonly class="form-control-plaintext" placeholder="Tingkat"></td>
                <td><input type="text" readonly class="form-control-plaintext" id="tingkatx" ></td>
              </tr>
              <tr>
                <td><input type="text" readonly class="form-control-plaintext" placeholder="Angkatan"></td>
                <td><input type="text" readonly class="form-control-plaintext" id="angkatanx" ></td>
              </tr>
              <tr>
                <td><input type="text" readonly class="form-control-plaintext" placeholder="Status"></td>
                <td><input type="text" readonly class="form-control-plaintext" id="statusx" ></td>
              </tr>
            </tbody></table>

          </div>

          <div role="tabpanel" class="tab-pane fade" id="ortu">
            <table class="table table-striped">
             <tbody>
               <br>
               <tr>
                <td><input type="text" readonly class="form-control-plaintext" placeholder="NIK Ayah"></td>
                <td><input type="text" readonly class="form-control-plaintext" id="nik_ayahx" ></td>
              </tr>
              <tr>
                <td><input type="text" readonly class="form-control-plaintext" placeholder="Nama Ayah"></td>
                <td><input type="text" readonly class="form-control-plaintext" id="nama_ayahx" ></td>
              </tr>
              <tr>
                <td><input type="text" readonly class="form-control-plaintext" placeholder="Tanggal Lahir Ayah"></td>
                <td><input type="text" readonly class="form-control-plaintext" id="tgllahir_ayahx" ></td>
              </tr>
              <tr>
                <td><input type="text" readonly class="form-control-plaintext" placeholder="Pendidikan Ayah"></td>
                <td><input type="text" readonly class="form-control-plaintext" id="pendidikan_ayahx" ></td>
              </tr>
              <tr>
                <td><input type="text" readonly class="form-control-plaintext" placeholder="Pekerjaan Ayah"></td>
                <td><input type="text" readonly class="form-control-plaintext" id="pekerjaan_ayahx" ></td>
              </tr>
              <tr>
                <td><input type="text" readonly class="form-control-plaintext" placeholder="Penghasilan Ayah"></td>
                <td><input type="text" readonly class="form-control-plaintext" id="penghasilan_ayahx" ></td>
              </tr>       
              <tr>
                <td><input type="text" readonly class="form-control-plaintext" placeholder="NIK Ibu"></td>
                <td><input type="text" readonly class="form-control-plaintext" id="nik_ibux" ></td>
              </tr>
              <tr>
                <td><input type="text" readonly class="form-control-plaintext" placeholder="Nama Ibu"></td>
                <td><input type="text" readonly class="form-control-plaintext" id="nama_ibux" ></td>
              </tr>
              <tr>
                <td><input type="text" readonly class="form-control-plaintext" placeholder="Tanggal Lahir Ibu"></td>
                <td><input type="text" readonly class="form-control-plaintext" id="tgllahir_ibux" ></td>
              </tr>
              <tr>
                <td><input type="text" readonly class="form-control-plaintext" placeholder="Pendidikan Ibu"></td>
                <td><input type="text" readonly class="form-control-plaintext" id="pendidikan_ibux" ></td>
              </tr>
              <tr>
                <td><input type="text" readonly class="form-control-plaintext" placeholder="Pekerjaan Ibu"></td>
                <td><input type="text" readonly class="form-control-plaintext" id="pekerjaan_ibux" ></td>
              </tr>
              <tr>
                <td><input type="text" readonly class="form-control-plaintext" placeholder="Penghasilan Ibu"></td>
                <td><input type="text" readonly class="form-control-plaintext" id="penghasilan_ibux" ></td>
              </tr>                     
            </tbody>
          </table>

        </div>

        <div role="tabpanel" class="tab-pane fade" id="wali">
          <table class="table table-striped">
           <tbody>
             <br>
             <tr>
              <td><input type="text" readonly class="form-control-plaintext" placeholder="NIK Wali"></td>
              <td><input type="text" readonly class="form-control-plaintext" id="nik_walix" ></td>
            </tr>
            <tr>
              <td><input type="text" readonly class="form-control-plaintext" placeholder="Nama Wali"></td>
              <td><input type="text" readonly class="form-control-plaintext" id="nama_walix" ></td>
            </tr>
            <tr>
              <td><input type="text" readonly class="form-control-plaintext" placeholder="Tanggal Lahir Wali"></td>
              <td><input type="text" readonly class="form-control-plaintext" id="tgllahir_walix" ></td>
            </tr>
            <tr>
              <td><input type="text" readonly class="form-control-plaintext" placeholder="Pendidikan Wali"></td>
              <td><input type="text" readonly class="form-control-plaintext" id="pendidikan_walix" ></td>
            </tr>
            <tr>
              <td><input type="text" readonly class="form-control-plaintext" placeholder="Pekerjaan Wali"></td>
              <td><input type="text" readonly class="form-control-plaintext" id="pekerjaan_walix" ></td>
            </tr>
            <tr>
              <td><input type="text" readonly class="form-control-plaintext" placeholder="Penghasilan Wali"></td>
              <td><input type="text" readonly class="form-control-plaintext" id="penghasilan_walix" ></td>
            </tr>       

          </tbody>
        </table>

      </div>

      <div role="tabpanel" class="tab-pane fade" id="lain">
        <table class="table table-striped">
         <tbody>
           <br>
           <tr>
            <td><input type="text" readonly class="form-control-plaintext" placeholder="Fakultas"></td>
            <td><input type="text" readonly class="form-control-plaintext" id="fakultasx" ></td>
          </tr>
          <tr>
            <td><input type="text" readonly class="form-control-plaintext" placeholder="Prodi"></td>
            <td><input type="text" readonly class="form-control-plaintext" id="prodix" ></td>
          </tr>
          <tr>
            <td><input type="text" readonly class="form-control-plaintext" placeholder="Kewarganegaraan"></td>
            <td><input type="text" readonly class="form-control-plaintext" id="kewarganegaraanx" ></td>
          </tr>
          <tr>
            <td><input type="text" readonly class="form-control-plaintext" placeholder="Jenis Pendaftaran"></td>
            <td><input type="text" readonly class="form-control-plaintext" id="jenis_pendaftaranx" ></td>
          </tr>

          <tr>
            <td><input type="text" readonly class="form-control-plaintext" placeholder="Tanggal Masuk Kuliah"></td>
            <td><input type="text" readonly class="form-control-plaintext" id="tgl_masuk_kuliahx" ></td>
          </tr>
          <tr>
            <td><input type="text" readonly class="form-control-plaintext" placeholder="Tahun Masuk Kuliah"></td>
            <td><input type="text" readonly class="form-control-plaintext" id="tahun_masuk_kuliahx" ></td>
          </tr>
          <tr>
            <td><input type="text" readonly class="form-control-plaintext" placeholder="Jenis Pembiayaan"></td>
            <td><input type="text" readonly class="form-control-plaintext" id="pembiayaanx" ></td>
          </tr>       
          <tr>
            <td><input type="text" readonly class="form-control-plaintext" placeholder="Jalur Masuk"></td>
            <td><input type="text" readonly class="form-control-plaintext" id="jalur_masukx" ></td>
          </tr>               
        </tbody>
      </table>


    </div>
  </div>
</div>
<div class="modal-footer">
 <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
</div>
</form>
</div>
</div>
</div>
</div>
<!-- END Modal view -->
	
<script src="<?php echo base_url() . 'assets/js/jquery.min.js' ?>"></script>
<script>
function get_angkatan(){
    var base_url = window.location.origin + "/" + window.location.pathname.split("/")[1] ;
	$.ajax({
		type: 'POST',
		url: `${base_url}/praja/angkat`,
		success: function(data){
			$("#filter_angkatan").html('<option value="" selected>Filter Angkatan</option>'); 
			var dataObj = jQuery.parseJSON(data);
      // console.log(dataObj);
			if(dataObj) {
				$(dataObj).each(function() {
					var option = $('<option />');
					option.attr('value', this).text(this);   
          // console.log(option.attr('value', this).text(this));     
					$("#filter_angkatan").append(option);
				});
			}
			else {
				$("#filter_angkatan").html('<option value="">Pilihan tidak ada</option>');
			}
		}
	}); 
}

$(document).ready(function() {
	// list MOU
	get_angkatan();
    var url = '<?php echo base_url('praja/get_praja');?>';
    var list_mou = $('#data-praja').DataTable({
      dom: 'Bfrtip',
		  buttons: [
       
        ],
        responsive: true,
		    "ajax": {
        "url": url,
        "dataSrc": ""
        }
	});

	$('#filter_angkatan').on( 'change', function () {
		list_mou
        .column(6)
        .search( this.value )
        .draw();
	});
		  
});

  $(document).ready(function() {
        // Untuk show data
        $('#show-data').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

            // Isi nilai pada field
            modal.find('#nppx').attr("value",div.data('npp'));
            modal.find('#namax').attr("value",div.data('nama'));
            modal.find('#jkx').attr("value",div.data('jk'));
            modal.find('#nisnx').attr("value",div.data('nisn'));
            modal.find('#no_spcpx').attr("value",div.data('no_spcp'));
            modal.find('#npwpx').attr("value",div.data('npwp'));
            modal.find('#nik_prajax').attr("value",div.data('nik_praja'));
            modal.find('#tmpt_lahirx').attr("value",div.data('tmpt_lahir'));
            modal.find('#tgl_lahirx').attr("value",div.data('tgl_lahir'));
            modal.find('#agamax').attr("value",div.data('agama'));
            modal.find('#alamatx').attr("value",div.data('alamat'));
            modal.find('#rtx').attr("value",div.data('rt'));
            modal.find('#rwx').attr("value",div.data('rw'));
            modal.find('#nama_dusunx').attr("value",div.data('nama_dusun'));
            modal.find('#kelurahanx').attr("value",div.data('kelurahan'));
            modal.find('#kecamatanx').attr("value",div.data('kecamatan'));
            modal.find('#kode_posx').attr("value",div.data('kode_pos'));
            modal.find('#kab_kotax').attr("value",div.data('kab_kota'));
            modal.find('#provinsix').attr("value",div.data('provinsi'));
            modal.find('#jenis_tinggalx').attr("value",div.data('jenis_tinggal'));
            modal.find('#alat_transportx').attr("value",div.data('alat_transport'));
            modal.find('#tlp_rumahx').attr("value",div.data('tlp_rumah'));
            modal.find('#tlp_pribadix').attr("value",div.data('tlp_pribadi'));
            modal.find('#emailx').attr("value",div.data('email'));
            modal.find('#kewarganegaraanx').attr("value",div.data('kewarganegaraan'));
            modal.find('#penerima_pksx').attr("value",div.data('penerima_pks'));
            modal.find('#no_pksx').attr("value",div.data('no_pks'));
            modal.find('#prodix').attr("value",div.data('prodi'));
            modal.find('#jenis_pendaftaranx').attr("value",div.data('jenis_pendaftaran'));
            modal.find('#tgl_masuk_kuliahx').attr("value",div.data('tgl_masuk_kuliah'));
            modal.find('#tahun_masuk_kuliahx').attr("value",div.data('tahun_masuk_kuliah'));
            modal.find('#pembiayaanx').attr("value",div.data('pembiayaan'));
            modal.find('#jalur_masukx').attr("value",div.data('jalur_masuk'));
            modal.find('#biaya_masukx').attr("value",div.data('biaya_masuk'));
            modal.find('#tingkatx').attr("value",div.data('tingkat'));
            modal.find('#angkatanx').attr("value",div.data('angkatan'));
            modal.find('#statusx').attr("value",div.data('status'));
            modal.find('#fakultasx').attr("value",div.data('fakultas'));
            modal.find('#id_ortux').attr("value",div.data('id_ortu'));
            modal.find('#nik_ayahx').attr("value",div.data('nik_ayah'));
            modal.find('#nama_ayahx').attr("value",div.data('nama_ayah'));
            modal.find('#tgllahir_ayahx').attr("value",div.data('tgllahir_ayah'));
            modal.find('#pendidikan_ayahx').attr("value",div.data('pendidikan_ayah'));
            modal.find('#pekerjaan_ayahx').attr("value",div.data('pekerjaan_ayah'));
            modal.find('#penghasilan_ayahx').attr("value",div.data('penghasilan_ayah'));
            modal.find('#tlp_ayahx').attr("value",div.data('tlp_ayah'));
            modal.find('#nik_ibux').attr("value",div.data('nik_ibu'));
            modal.find('#nama_ibux').attr("value",div.data('nama_ibu'));
            modal.find('#tgllahir_ibux').attr("value",div.data('tgllahir_ibu'));
            modal.find('#pendidikan_ibux').attr("value",div.data('pendidikan_ibu'));
            modal.find('#pekerjaan_ibux').attr("value",div.data('pekerjaan_ibu'));
            modal.find('#penghasilan_ibux').attr("value",div.data('penghasilan_ibu'));
            modal.find('#id_walix').attr("value",div.data('id_wali'));
            modal.find('#nik_walix').attr("value",div.data('nik_wali'));
            modal.find('#nama_walix').attr("value",div.data('nama_wali'));
            modal.find('#tgllahir_walix').attr("value",div.data('tgllahir_wali'));
            modal.find('#pendidikan_walix').attr("value",div.data('pendidikan_wali'));
            modal.find('#pekerjaan_walix').attr("value",div.data('pekerjaan_wali'));
            modal.find('#penghasilan_walix').attr("value",div.data('penghasilan_wali'));
            modal.find('#tlp_walix').attr("value",div.data('tlp_wali'));

          });
});
</script>