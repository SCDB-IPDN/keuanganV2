const flashData = $ ('.flash-data').data('flashdata');

if (flashData) {
    Swal.fire({
        title:'Anda Berhasil Login!',
        text:'Username anda adalah ' + flashData,
        icon:'success',
    });
}