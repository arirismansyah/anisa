$(document).ready(function () {
    // add teams
    $('#add-team-btn').on('click', function () {
        $('#modal-add-team').modal('show');
    })

    // edit teams
    $('#team-table').on('click', '#edit-team-btn', function () {
        var key_id = $(this).attr('key_id');
        var key_kode = $(this).attr('key_kode');
        var key_nama = $(this).attr('key_nama');

        $('#modal-edit-team').find('#input-id').val(key_id);
        $('#modal-edit-team').find('#input-kode').val(key_kode);
        $('#modal-edit-team').find('#input-nama').val(key_nama);
        $('#modal-edit-team').modal('show');

    })

    // delete teams
    $('#team-table').on('click', '#delete-team-btn', function () {
        var key_id = $(this).attr('key_id');
        var key_nama = $(this).attr('key_nama');

        $('#modal-delete-team').find('#input-id').val(key_id);
        $('#modal-delete-team').find('#nama-tim').html(key_nama);
        $('#modal-delete-team').modal('show');

    })
})