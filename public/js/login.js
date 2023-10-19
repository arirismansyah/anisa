$(document).ready(function () {
    $('#showpass').click(function (e) {
        if ($('#showpass').prop('checked') == true) {
            $('#input-password').attr("type", "text");
        } else {
            $('#input-password').attr("type", "password");
        }
    });
});