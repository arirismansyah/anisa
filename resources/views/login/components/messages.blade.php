@if ($message = Session::get('success'))
    <div class="alert alert-success alert-icon alert-dismissible fade show" role="alert">
        <i class="uil uil-check-circle"></i>{{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($message = Session::get('info'))
    <div class="alert alert-info alert-icon alert-dismissible fade show" role="alert">
        <i class="uil uil-exclamation-circle"></i> {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-icon alert-dismissible fade show" role="alert">
        <i class="uil uil-exclamation-triangle"></i> {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger alert-icon alert-dismissible fade show" role="alert">
        <i class="uil uil-times-circle"></i>{{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-icon alert-dismissible fade show" role="alert">
        <i class="uil uil-times-circle"></i>{{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
