$(document).ready(function () {
    // add knowledges
    $('#add-knowledge-btn').on('click', function () {
        $('#modal-add-knowledge').modal('show');
    })

    // edit knowledges
    $('#knowledge-table').on('click', '#edit-knowledge-btn', function () {
        var key_id = $(this).attr('key_id');
        var domain_url = window.location.host;


        // ajax
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "http://" + domain_url + "/get_knowledge_byid",
            data: {
                'id': key_id
            },
            success: function (response) {
                var response_data = response;
                $('#modal-edit-knowledge').find('#input-id').val(response_data['id']);
                $('#modal-edit-knowledge').find('#input-judul').val(response_data['judul']);
                $('#modal-edit-knowledge').find('#input-deskripsi').val(response_data['deskripsi']);
                $('#modal-edit-knowledge').find('#input-lampiran').val(response_data['lampiran']);
            }
        })

        $('#modal-edit-knowledge').modal('show');

    })

    // delete knowledges
    $('#knowledge-table').on('click', '#delete-knowledge-btn', function () {
        var key_id = $(this).attr('key_id');
        var key_name = $(this).attr('key_name');

        $('#modal-delete-knowledge').find('#input-id').val(key_id);
        $('#modal-delete-knowledge').find('#nama-knowledge').html(key_name);
        $('#modal-delete-knowledge').modal('show');

    })
})