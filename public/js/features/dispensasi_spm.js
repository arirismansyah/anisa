$(document).ready(function () {

    // add catatan
    $('#spm-table').on('click', '#add-warning-spm-btn', function () {
        var id_rev = $(this).attr('key_id');
        $('#modal-add-warning').find('#input-id').val(id_rev);
        $('#modal-add-warning').modal('show');
    })

    // show catatan
    $('#spm-table').on('click', '#warning-spm-btn', function () {
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
            url: "http://" + domain_url + "/get_spm_byid",
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

    // delete spm
    $('#spm-table').on('click', '#delete-spm-btn', function () {
        var id_rev = $(this).attr('key_id');
        $('#modal-delete-spm').find('#input-id').val(id_rev)
        $('#modal-delete-spm').modal('show');
    })

})