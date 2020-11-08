window.toastr = require('toastr');

$('.btn-delete').on('click', function () {
    var href = $(this).data('href');
    $('#modal-delete').modal('show');
    $('#modal-confirm').on('click', function () {
        window.location.href = href;
    })
});

document.querySelector('[data-switch-dark]').addEventListener('click', function() {
    document.body.classList.toggle('dark');
});
