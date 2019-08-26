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

// SELECT2
$('#categories').select2({
    ajax: {
        url: 'http://arrival.test:8080/admin/ajax/categories/search',
        processResults: function (data) {
            return {
                results: data.map(function (item) { return { id: item.id, text: item.title } })
            }
        }
    }
});

// laravel File Manager
var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
};

// CKEditor
CKEDITOR.replace( 'content', options);

// $('textarea.coba').ckeditor(options);
