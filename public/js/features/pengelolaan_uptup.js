$(document).ready(function () {

    // pinalti 
    $('#input-bulan').on('change', function () {
        var bulan = $(this).val();
        if (bulan == 12) {
            $('#input-pinalti').attr('readonly', false);
        } else {
            $('#input-pinalti').attr('readonly', true);

        }
    })

    // add catatan
    $('#uptup-table').on('click', '#add-warning-uptup-btn', function () {
        var id_rev = $(this).attr('key_id');
        $('#modal-add-warning').find('#input-id').val(id_rev);
        $('#modal-add-warning').modal('show');
    })

    // show catatan
    $('#uptup-table').on('click', '#warning-uptup-btn', function () {
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
            url: "http://" + domain_url + "/get_uptup_byid",
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

    // delete uptup
    $('#uptup-table').on('click', '#delete-uptup-btn', function () {
        var id_rev = $(this).attr('key_id');
        $('#modal-delete-uptup').find('#input-id').val(id_rev)
        $('#modal-delete-uptup').modal('show');
    })

})