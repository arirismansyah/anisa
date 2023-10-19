<!doctype html>
<html lang="en" dir="ltr">

<head>

    @include('admin.includes.head')

</head>

<body class="app sidebar-mini ltr light-mode">

    <!-- GLOBAL-LOADER -->
    {{-- <div id="global-loader">
        <img src="{{ url('/zanex/images/loader.svg') }}" class="loader-img" alt="Loader">
    </div> --}}
    <!-- /GLOBAL-LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">

            <!-- app-Header -->
            @include('admin.includes.header')
            <!-- /app-Header -->

            <!--APP-SIDEBAR-->
            @include('admin.includes.sidebar')
            <!--/APP-SIDEBAR-->

            <!--app-content open-->

            @yield('content')

        </div>


        <!-- FOOTER -->
        <footer class="footer">
            @include('admin.includes.footer')
        </footer>
        <!-- FOOTER CLOSED -->
    </div>

    <!-- BACK-TO-TOP -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!-- JQUERY JS -->
    <script src="{{ url('/zanex/js/jquery.min.js') }}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ url('/zanex/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ url('/zanex/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- SPARKLINE JS-->
    <script src="{{ url('/zanex/js/jquery.sparkline.min.js') }}"></script>

    <!-- CHART-CIRCLE JS-->
    <script src="{{ url('/zanex/js/circle-progress.min.js') }}"></script>

    <!-- INPUT MASK JS-->
    <script src="{{ url('/zanex/plugins/input-mask/jquery.mask.min.js') }}"></script>

    <!-- SIDE-MENU JS -->
    <script src="{{ url('/zanex/plugins/sidemenu/sidemenu.js') }}"></script>

    <!-- Sticky js -->
    <script src="{{ url('/zanex/js/sticky.js') }}"></script>

    <!-- SIDEBAR JS -->
    <script src="{{ url('/zanex/plugins/sidebar/sidebar.js') }}"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{ url('/zanex/plugins/p-scroll/perfect-scrollbar.js') }}"></script>
    <script src="{{ url('/zanex/plugins/p-scroll/pscroll.js') }}"></script>
    <script src="{{ url('/zanex/plugins/p-scroll/pscroll-1.js') }}"></script>

    <!-- Color Theme js -->
    <script src="{{ url('/zanex/js/themeColors.js') }}"></script>

    <!-- FULL CALENDAR JS -->
    {{-- <script src='{{ url('/zanex/plugins/fullcalendar/moment.min.js') }}'></script>
    <script src='{{ url('/zanex/plugins/fullcalendar/fullcalendar.min.js') }}'></script> --}}

    <!-- FILE UPLOADES JS -->
    <script src="{{ url('/zanex/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ url('/zanex/plugins/fileuploads/js/file-upload.js') }}"></script>

    <!-- INTERNAL Bootstrap-Datepicker js-->
    <script src="{{ url('/zanex/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <!-- INTERNAL File-Uploads Js-->
    <script src="{{ url('/zanex/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ url('/zanex/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ url('/zanex/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ url('/zanex/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ url('/zanex/plugins/fancyuploder/fancy-uploader.js') }}"></script>


    <!-- SELECT2 JS -->
    <script src="{{ url('/zanex/plugins/select2/select2.full.min.js') }}"></script>

    <!-- BOOTSTRAP-DATERANGEPICKER JS -->
    <script src="{{ url('/zanex/plugins/bootstrap-daterangepicker/moment.min.js') }}"></script>
    <script src="{{ url('/zanex/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <!-- INTERNAL Bootstrap-Datepicker js-->
    <script src="{{ url('/zanex/plugins/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>

    <!-- INTERNAL Sumoselect js-->
    <script src="{{ url('/zanex/plugins/sumoselect/jquery.sumoselect.js') }}"></script>

    <!-- TIMEPICKER JS -->
    <script src="{{ url('/zanex/plugins/time-picker/jquery.timepicker.js') }}"></script>
    <script src="{{ url('/zanex/plugins/time-picker/toggles.min.js') }}"></script>

    <!-- INTERNAL intlTelInput js-->
    <script src="{{ url('/zanex/plugins/intl-tel-input-master/intlTelInput.js') }}"></script>
    <script src="{{ url('/zanex/plugins/intl-tel-input-master/country-select.js') }}"></script>
    <script src="{{ url('/zanex/plugins/intl-tel-input-master/utils.js') }}"></script>

    <!-- INTERNAL jquery transfer js-->
    <script src="{{ url('/zanex/plugins/jQuerytransfer/jquery.transfer.js') }}"></script>

    <!-- INTERNAL multi js-->
    <script src="{{ url('/zanex/plugins/multi/multi.min.js') }}"></script>

    <!-- DATEPICKER JS -->
    <script src="{{ url('/zanex/plugins/date-picker/date-picker.js') }}"></script>
    <script src="{{ url('/zanex/plugins/date-picker/jquery-ui.js') }}"></script>
    <script src="{{ url('/zanex/plugins/input-mask/jquery.maskedinput.js') }}"></script>

    <!-- MULTI SELECT JS-->
    <script src="{{ url('/zanex/plugins/multipleselect/multiple-select.js') }}"></script>
    <script src="{{ url('/zanex/plugins/multipleselect/multi-select.js') }}"></script>

    <!-- FORMELEMENTS JS -->
    <script src="{{ url('/zanex/js/formelementadvnced.js') }}"></script>
    <script src="{{ url('/zanex/js/form-elements.js') }}"></script>

    <!-- SWEET-ALERT JS -->
    <script src="{{ url('/zanex/plugins/sweet-alert/sweetalert.min.js') }}"></script>

    {{-- THEME --}}
    <script src="{{ url('js/theme.js') }}"></script>

    <!-- STACK CUSTOM JS -->
    <script src="{{url('/zanex/js/custom.js')}}"></script>
    <script src="{{ url('js/date_picker.js') }}"></script>
    @stack('scripts')

</body>

</html>
