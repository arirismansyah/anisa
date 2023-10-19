$(document).ready(function () {
    $('#btn-add-user').on('click', function () {
        $('#modal-add-user').modal('show');
    })

    $('#modal-add-user').on('change', '#input-kode-tim', function () {
        var key_nama_tim = $('option:selected', this).attr('key_nama_tim');
        console.log(key_nama_tim);
        $('#modal-add-user').find('#input-nama-tim').val(key_nama_tim);
    });

    $('#modal-edit-user').on('change', '#input-kode-tim', function () {
        var key_nama_tim = $('option:selected', this).attr('key_nama_tim');
        console.log(key_nama_tim);
        $('#modal-edit-user').find('#input-nama-tim').val(key_nama_tim);
    });

    $('#user-table').on('click', '#edit-user-btn', function () {
        var key_id = $(this).attr('key_id');
        var domain_url = window.location.host;
        var key_role = $(this).attr('key_role');


        // ajax
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "http://" + domain_url + "/get_user_byid",
            data: {
                'id': key_id
            },
            success: function (response) {
                var response_data = response;

                $('#modal-edit-user').find('#input-id').val(response_data['id']);
                $('#modal-edit-user').find('#input-username').val(response_data['username']);
                $('#modal-edit-user').find('#input-nama').val(response_data['nama']);
                $('#modal-edit-user').find('#input-email').val(response_data['email']);
                $('#modal-edit-user').find('#input-jk').val(response_data['jenis_kelamin']).change();
                $('#modal-edit-user').find('#input-kode-tim').val(response_data['kode_tim']).change();
                $('#modal-edit-user').find('#input-nama-tim').val(response_data['nama_tim']);
                $('#modal-edit-user').find('#input-no-telp').val(response_data['no_telp']);

                key_role = key_role.replace('["', '');
                key_role = key_role.replace('"]', '');
                key_role = key_role.replace('[', '');
                key_role = key_role.replace(']', '');
                if (key_role.length > 0) {
                    $('#modal-edit-user').find('#input-role').val(key_role).change();
                }

            }
        })

        $('#modal-edit-user').modal('show');

    })


    $('#user-table').on('click', '#delete-user-btn', function () {
        var key_id = $(this).attr('key_id');
        var key_name = $(this).attr('key_nama');

        $('#modal-delete-user').find('#input-id').val(key_id);
        $('#modal-delete-user').find('#nama-user').html(key_name);
        $('#modal-delete-user').modal('show');

    })

    $('#user-table').on('click', '#edit-role-btn', function () {
        var key_id = $(this).attr('key_id');
        var key_name = $(this).attr('key_nama');
        var key_role = $(this).attr('key_role');
        console.log(key_id);
        console.log(key_name);

        if (key_role != undefined) {
            key_role = key_role.replace('["', '');
            key_role = key_role.replace('"]', '');
            key_role = key_role.replace('[', '');
            key_role = key_role.replace(']', '');
            if (key_role.length > 0) {
                $('#modal-edit-role').find('#input-role').val(key_role).change();
            }
        }

        $('#modal-edit-role').find('#input-id').val(key_id);
        $('#modal-edit-role').find('#input-nama').val(key_name);
        $('#modal-edit-role').find('#input-role').val('').change();


        $('#modal-edit-role').modal('show');

    })
})