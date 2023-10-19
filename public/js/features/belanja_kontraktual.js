$(document).ready(function () {

    // add catatan
    $('#belanja-table').on('click', '#add-warning-belanja-btn', function () {
        var id_rev = $(this).attr('key_id');
        $('#modal-add-warning').find('#input-id').val(id_rev);
        $('#modal-add-warning').modal('show');
    })

    // show catatan
    $('#belanja-table').on('click', '#warning-belanja-btn', function () {
        var id_rev = $(this).attr('key_id');
        var domain_url = window.location.host;
        // ajax
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "http://" + domain_url + "/get_belanja_kontraktual_byid",
            data: {
                'id': id_rev
            },
            success: function (response) {
                var response_data = response;
                console.log(response_data);
                $('#modal-warning').find('#warning-desc').val(response_data['warning_desc'])

            }, error: function () {

            }
        })
        $('#modal-warning').modal('show');
    })

    // delete belanja
    $('#belanja-table').on('click', '#delete-belanja-btn', function () {
        var id_rev = $(this).attr('key_id');
        $('#modal-delete-belanja').find('#input-id').val(id_rev)
        $('#modal-delete-belanja').modal('show');
    })

})