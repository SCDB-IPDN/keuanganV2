function get_prodi() {
    var data = $("#fakultas").val();
    var base_url = window.location.origin + "/" + window.location.pathname.split("/")[1] ;
	if(data) {
		$.ajax({
			type: 'POST',
			url: `${base_url}/kemeng/prodi`,
			data: { 
				'data': data
			},
			success: function(data){
				$("#prodi").html('<option value="">Pilih</option>'); 
				var dataObj = jQuery.parseJSON(data);
				if(dataObj) {
					$(dataObj).each(function() {
						var option = $('<option />');
						option.attr('value', this.id_prodi).text(this.nama_prodi);           
						$("#prodi").append(option);
					});
				}
				else {
					$("#prodi").html('<option value="">Pilihan tidak ada</option>');
				}
			}
		}); 
	}
	else {
		$("#prodi").html('<option value="">Pilihan tidak ada</option>');
	}	
}

function get_matkul() {
    var data = $("#prodi").val();
    var base_url = window.location.origin + "/" + window.location.pathname.split("/")[1] ;
	if(data) {
		$.ajax({
			type: 'POST',
			url: `${base_url}/kemeng/matkul`,
			data: { 
				'data': data
			},
			success: function(data){
				$("#matkul").html('<option value="">Pilih</option>'); 
				var dataObj = jQuery.parseJSON(data);
				if(dataObj) {
					$(dataObj).each(function() {
						var option = $('<option />');
						option.attr('value', this.id_matkul).text(this.nama_matkul);           
						$("#matkul").append(option);
					});
				}
				else {
					$("#matkul").html('<option value="">Pilihan tidak ada</option>');
				}
			}
		}); 
	}
	else {
		$("#matkul").html('<option value="">Pilihan tidak ada</option>');
	}	
}

$(document).ready(function() {
    $('#fakultas').change(get_prodi);
    $('#prodi').change(get_matkul);
    $('#dosen').select2();
    //$('#matkul').select2();

    $('#tanggal').datetimepicker({
        format: "DD-MM-YYYY",
    });

	$('#jam').datetimepicker({
        format: 'HH:mm',
        widgetPositioning: { vertical:  'top' }
    });
});