$(document).ready(function () {
    // add roles
    $('#add-role-btn').on('click', function () {
        $('#modal-add-role').modal('show');
    })

    // edit roles
    $('#role-table').on('click', '#edit-role-btn', function () {
        var key_id = $(this).attr('key_id');
        var key_name = $(this).attr('key_name');

        $('#modal-edit-role').find('#input-id').val(key_id);
        $('#modal-edit-role').find('#input-name').val(key_name);
        $('#modal-edit-role').modal('show');

    })

    // delete roles
    $('#role-table').on('click', '#delete-role-btn', function () {
        var key_id = $(this).attr('key_id');
        var key_name = $(this).attr('key_name');

        $('#modal-delete-role').find('#input-id').val(key_id);
        $('#modal-delete-role').find('#nama-role').html(key_name);
        $('#modal-delete-role').modal('show');

    })
})