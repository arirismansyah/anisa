$(document).ready(function () {
    $('#input-uraian-output').on('change', function () {
        var kd_program = $('option:selected', this).attr('kd_program');
        var kd_kegiatan = $('option:selected', this).attr('kd_kegiatan');
        var kd_output = $('option:selected', this).attr('kd_output');
        var kd_suboutput = $('option:selected', this).attr('kd_suboutput');
        var id = $('option:selected', this).attr('key_id');

        $('#input-kd-program').val(kd_program);
        $('#input-kd-kegiatan').val(kd_kegiatan);
        $('#input-kd-output').val(kd_output);
        $('#input-kd-suboutput').val(kd_suboutput);
        $('#input-id').val(id);

    });

    $('#input-nama-tim').on('change', function () {
        var kd_tim = $('option:selected', this).attr('kode_tim');
        
        $('#input-kode-tim').val(kd_tim);
        
    });

})