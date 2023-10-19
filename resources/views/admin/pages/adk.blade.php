@extends('admin.layout')

@section('content')
    <div class="main-content app-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <div>
                        <h1 class="page-title">ADK</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Upload ADK</li>
                        </ol>
                    </div>

                </div>
                <!-- PAGE-HEADER END -->

                {{-- MESSAGES --}}
                <div class="row mb-4">
                    <div class="col-lg-12 col-md-12">
                        @include('components.messages')
                    </div>
                </div>
                {{-- MESSAGES --}}

                <!-- ROW-1 OPEN -->
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="panel panel-primary">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Upload ADK</h3>
                                </div>
                                <div class="card-body">
                                    <form action="{{ url('/upload_adk') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mb-4 d-flex justify-content-center">
                                            <div class="col-md-6 mt-4 mt-md-0">
                                                <div class="input-group">
                                                    <div class="input-group-text">
                                                        <span class="fa fa-clock-o tx-16 lh-0 op-6"></span>
                                                    </div>
                                                    <input class="form-control year-picker" id="input-periode"
                                                        placeholder="Tahun" name="tahun_anggaran" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 d-flex justify-content-center">
                                            <div class="col-lg-6 col-sm-12 mb-4 mb-lg-0">
                                                <input type="file" name="file" class="dropify" data-bs-height="180" />
                                            </div>
                                        </div>

                                        <div class="row mb-4 d-flex justify-content-center">
                                            <div class="col-lg-6 col-sm-12 mb-4 mb-lg-0">
                                                <button class="btn btn-primary btn-icon text-white me-2 float-end">
                                                    <span>
                                                        <i class="fe fe-upload"></i>
                                                    </span> Upload
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="panel panel-primary">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Table ADK</h3>
                                </div>

                                <div class="card-body">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- CONTAINER CLOSED -->
    </div>
@endsection


{{-- scripts --}}
@push('scripts')
    <script src="{{ url('js/date_picker.js') }}"></script>
@endpush
{{-- scripts --}}
