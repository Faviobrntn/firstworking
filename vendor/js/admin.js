$(document).ready(function () {
    $('#modalEditarProvincia').on('show.bs.modal', function (e) {
        let button = $(e.relatedTarget);

        let modal = $(this)
        modal.find('#modalEditarProvincia_id').val(button.data('id'))
        modal.find('#modalEditarProvincia_nombreProv').val(button.data('nombre'))
        modal.find('#modalEditarProvincia_descProv').val(button.data('desc'));
    })
});