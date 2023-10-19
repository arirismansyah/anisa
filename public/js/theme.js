$(document).ready(function () {
    var light = true
    $('#theme-btn').on('click', function () {
        // set body class
        light = !light
        if (light) {
            $("body").addClass('light-mode');
        } else {
            $("body").addClass('dark-mode');
        }

    })
})