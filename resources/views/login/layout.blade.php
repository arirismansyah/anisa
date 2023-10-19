<!DOCTYPE html>
<html lang="en">

<head>
    @include('login.includes.head')
</head>

<body>
    @yield('content')

    {{-- @include('login.includes.footer') --}}


    {{-- scripts --}}
    <!-- JQUERY JS -->
    <script src="{{ url('/zanex/js/jquery.min.js') }}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ url('/zanex/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ url('/zanex/plugins/bootstrap/js/bootstrap.min.js') }}"></script>


    <!-- Color Theme js -->
    <script src="{{ url('/zanex/js/themeColors.js') }}"></script>

    <!-- INTERNAL jquery transfer js-->
    <script src="{{ url('/zanex/plugins/jQuerytransfer/jquery.transfer.js') }}"></script>

    <!-- INTERNAL multi js-->
    <script src="{{ url('/zanex/plugins/multi/multi.min.js') }}"></script>

    <!-- SWEET-ALERT JS -->
    <script src="{{ url('') }}/zanex/plugins/sweet-alert/sweetalert.min.js"></script>
    {{-- customs --}}
    @stack('scripts')
    {{-- scripts --}}
</body>

</html>
