$(document).ready(function () {
    $('#input-uraian-output').on('change', function () {
        var kd_program = $('option:selected', this).attr('kd_program');
        var kd_kegiatan = $('option:selected', this).attr('kd_kegiatan');
        var kd_output = $('option:selected', this).attr('kd_output');
        var kd_suboutput = $('option:selected', this).attr('kd_suboutput');

        $('#input-kd-program').val(kd_program);
        $('#input-kd-kegiatan').val(kd_kegiatan);
        $('#input-kd-output').val(kd_output);
        $('#input-kd-suboutput').val(kd_suboutput);

    });

    // add catatan
    $('#coutput-table').on('click', '#add-warning-coutput-btn', function () {
        var id_rev = $(this).attr('key_id');
        $('#modal-add-warning').find('#input-id').val(id_rev);
        $('#modal-add-warning').modal('show');
    })

    // show catatan
    $('#coutput-table').on('click', '#warning-coutput-btn', function () {
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
            url: "http://" + domain_url + "/get_coutput_byid",
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

    // delete coutput
    $('#coutput-table').on('click', '#delete-coutput-btn', function () {
        var id_rev = $(this).attr('key_id');
        $('#modal-delete-coutput').find('#input-id').val(id_rev)
        $('#modal-delete-coutput').modal('show');
    })

})