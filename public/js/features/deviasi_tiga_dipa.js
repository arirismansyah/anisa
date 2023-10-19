$(document).ready(function () {

    // bulan 
    $('#input-bulan').on('change', function () {
        var bulan = $(this).val();
        if (bulan == 1) {

            $('#input-deviasi-sebelumnya').val(0);
            $('#input-deviasi-sebelumnya').attr('readonly', true);
        } else {
            $('#input-deviasi-sebelumnya').attr('readonly', false);
        }
    })

    // add catatan
    $('#deviasi-table').on('click', '#add-warning-deviasi-btn', function () {
        var id_rev = $(this).attr('key_id');
        $('#modal-add-warning').find('#input-id').val(id_rev);
        $('#modal-add-warning').modal('show');
    })

    // show catatan
    $('#deviasi-table').on('click', '#warning-deviasi-btn', function () {
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
            url: "http://" + domain_url + "/get_deviasi_byid",
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

    // delete deviasi
    $('#deviasi-table').on('click', '#delete-deviasi-btn', function () {
        var id_rev = $(this).attr('key_id');
        $('#modal-delete-deviasi').find('#input-id').val(id_rev)
        $('#modal-delete-deviasi').modal('show');
    })

})