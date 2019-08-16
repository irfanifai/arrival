const flashData = $('.flash-data').data('flashdata');

// info success
if (flashData) {
    Swal.fire({
        type: 'success',
        title: 'Data',
        text: flashData
    });
}

// tombol-hapus (belum bisa)
$('.tombol-hapus').on('click', function (e) {
    e.preventDefault();
    var postId = $(this).data('id');

    Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Data akan dihapus",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus Data!'
    },
    function(){
        window.location.href = "{{ route('admin.users.destroy' )}}" + postId;
    });

});
