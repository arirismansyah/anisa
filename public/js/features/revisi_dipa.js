$(document).ready(function () {

    $('#input-periode').on('change', function () {
        var tahun = $(this).val();
        var domain_url = window.location.host;
        console.log(tahun);


        // ajax
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "http://" + domain_url + "/get_revisi_dipa_bytahun",
            data: {
                'tahun_anggaran': tahun
            },
            success: function (response) {
                var response_data = response;
                console.log(response_data);
                if (response_data['rev_jan'] != null) {
                    $('#rev_jan').val(response_data['rev_jan']);
                    $('#rev_feb').val(response_data['rev_feb']);
                    $('#rev_mar').val(response_data['rev_mar']);
                    $('#rev_apr').val(response_data['rev_apr']);
                    $('#rev_may').val(response_data['rev_may']);
                    $('#rev_jun').val(response_data['rev_jun']);
                    $('#rev_jul').val(response_data['rev_jul']);
                    $('#rev_aug').val(response_data['rev_aug']);
                    $('#rev_sep').val(response_data['rev_sep']);
                    $('#rev_oct').val(response_data['rev_oct']);
                    $('#rev_nov').val(response_data['rev_nov']);
                    $('#rev_dec').val(response_data['rev_dec']);
                } else {
                    $('#rev_jan').val('0');
                    $('#rev_feb').val('0');
                    $('#rev_mar').val('0');
                    $('#rev_apr').val('0');
                    $('#rev_may').val('0');
                    $('#rev_jun').val('0');
                    $('#rev_jul').val('0');
                    $('#rev_aug').val('0');
                    $('#rev_sep').val('0');
                    $('#rev_oct').val('0');
                    $('#rev_nov').val('0');
                    $('#rev_dec').val('0');
                }


            }, error: function () {
                $('#rev_jan').val('0');
                $('#rev_feb').val('0');
                $('#rev_mar').val('0');
                $('#rev_apr').val('0');
                $('#rev_may').val('0');
                $('#rev_jun').val('0');
                $('#rev_jul').val('0');
                $('#rev_aug').val('0');
                $('#rev_sep').val('0');
                $('#rev_oct').val('0');
                $('#rev_nov').val('0');
                $('#rev_dec').val('0');
            }
        })



    })

    // add catatan
    $('#revisi-table').on('click', '#add-warning-revisi-btn', function () {
        var id_rev = $(this).attr('key_id');
        $('#modal-add-warning').find('#input-id').val(id_rev);
        $('#modal-add-warning').modal('show');
    })

    // show catatan
    $('#revisi-table').on('click', '#warning-revisi-btn', function () {
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
            url: "http://" + domain_url + "/get_revisi_dipa_byid",
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

    // delete revisi
    $('#revisi-table').on('click', '#delete-revisi-btn', function () {
        var id_rev = $(this).attr('key_id');
        var domain_url = window.location.host;
        console.log(id_rev);
        // ajax
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "http://" + domain_url + "/get_revisi_dipa_byid",
            data: {
                'id': id_rev
            },
            success: function (response) {
                var response_data = response;
                console.log(response_data);
                $('#modal-delete-revisi').find('#input-id').val(response_data['id'])
                $('#modal-delete-revisi').find('#tahun-anggaran').html(response_data['tahun_anggaran'])

            }, error: function () {

            }
        })
        $('#modal-delete-revisi').modal('show');
    })

})