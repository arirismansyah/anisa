$(document).ready(function () {
    // add qnas
    $('#add-qna-btn').on('click', function () {
        $('#modal-add-qna').modal('show');
    })

    // edit qnas
    $('#qna-table').on('click', '#edit-qna-btn', function () {
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
            url: "http://" + domain_url + "/get_qna_byid",
            data: {
                'id': key_id
            },
            success: function (response) {
                var response_data = response;
                $('#modal-edit-qna').find('#input-id').val(response_data['id']);
                $('#modal-edit-qna').find('#input-pertanyaan').val(response_data['pertanyaan']);
                $('#modal-edit-qna').find('#input-jawaban').val(response_data['jawaban']);


            }
        })

        $('#modal-edit-qna').modal('show');

    })

    // delete qnas
    $('#qna-table').on('click', '#delete-qna-btn', function () {
        var key_id = $(this).attr('key_id');
        var key_name = $(this).attr('key_name');

        $('#modal-delete-qna').find('#input-id').val(key_id);
        $('#modal-delete-qna').find('#nama-qna').html(key_name);
        $('#modal-delete-qna').modal('show');

    })
})