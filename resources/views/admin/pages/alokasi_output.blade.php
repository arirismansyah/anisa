@extends('admin.layout')

@section('content')
    <div class="main-content app-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <div>
                        <h1 class="page-title">Alokasi Output Ke Tim Kerja</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Alokasi Output Ke Tim Kerja</li>
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
                                    <h3 class="card-title">Input Alokasi Output Ke Tim Kerja</h3>
                                </div>

                                <div class="card-body">
                                    <div class="row d-flex justify-content-center">
                                        <form action="{{ url('/alokasi_output_totim') }}" method="post">
                                            @csrf
                                            <div class="col">

                                                <div class="row mb-4">
                                                    <div class="col-md-4 mt-4 mt-md-0" style="display: none">
                                                        <label class="form-label">
                                                            Id
                                                            <span class="text-red">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-text">
                                                                <span class="fa fa-clock-o tx-16 lh-0 op-6"></span>
                                                            </div>
                                                            <input required class="form-control"
                                                                id="input-id" placeholder="id"
                                                                name="id" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mt-4 mt-md-0">
                                                        <label class="form-label">
                                                            Tahun Anggaran
                                                            <span class="text-red">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-text">
                                                                <span class="fa fa-clock-o tx-16 lh-0 op-6"></span>
                                                            </div>
                                                            <input required class="form-control year-picker"
                                                                id="input-periode" placeholder="Tahun Anggaran"
                                                                name="tahun_anggaran" type="text">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-8 mt-4 mt-md-0">
                                                        <label class="form-label">
                                                            Uraian Output
                                                            <span class="text-red">*</span>
                                                        </label>

                                                        <select class="form-control select2-show-search form-select"
                                                            data-placeholder="Choose one" id="input-uraian-output"
                                                            name="uraian_output">
                                                            <option selected disabled value="">-- Pilih Output --
                                                            </option>
                                                            @foreach ($data_output_belum as $output_belum)
                                                                <option kd_program="{{ $output_belum->kd_program }}"
                                                                    key_id="{{ $output_belum->id }}"
                                                                    kd_kegiatan="{{ $output_belum->kd_kegiatan }}"
                                                                    kd_output="{{ $output_belum->kd_output }}"
                                                                    kd_suboutput="{{ $output_belum->kd_suboutput }}"
                                                                    value="{{ $output_belum->uraian_output }}">
                                                                    {{ $output_belum->uraian_output }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-md-3 mt-4 mt-md-0">
                                                        <label class="form-label">
                                                            Kode Program
                                                            <span class="text-red">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <input required readonly class="form-control"
                                                                id="input-kd-program" name="kd_program" type="text">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3 mt-4 mt-md-0">
                                                        <label class="form-label">
                                                            Kode Kegiatan
                                                            <span class="text-red">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <input required readonly class="form-control"
                                                                id="input-kd-kegiatan" name="kd_kegiatan" type="text">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3 mt-4 mt-md-0">
                                                        <label class="form-label">
                                                            Kode Output
                                                            <span class="text-red">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <input required readonly class="form-control"
                                                                id="input-kd-output" name="kd_output" type="text">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3 mt-4 mt-md-0">
                                                        <label class="form-label">
                                                            Kode Suboutput
                                                            <span class="text-red">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <input required readonly class="form-control"
                                                                id="input-kd-suboutput" name="kd_suboutput"
                                                                type="text">
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row mb-4">
                                                    <div class="col-md-6 mt-4 mt-md-0">
                                                        <label class="form-label">
                                                            Nama Tim Kerja
                                                            <span class="text-red">*</span>
                                                        </label>

                                                        <select class="form-control select2-show-search form-select"
                                                            data-placeholder="Choose one" id="input-nama-tim"
                                                            name="nama_tim">
                                                            <option selected disabled value="">-- Pilih Tim --
                                                            </option>

                                                            @foreach ($data_tim as $tim)
                                                                <option value="{{$tim->nama_tim}}"
                                                                    kode_tim="{{$tim->kode_tim}}">{{$tim->nama_tim}}</option>
                                                            @endforeach
                                                            
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 mt-4 mt-md-0">
                                                        <label class="form-label">
                                                            Kode Tim Kerja
                                                            <span class="text-red">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <input required readonly class="form-control"
                                                                id="input-kode-tim" name="kode_tim" type="text">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mb-4 d-flex justify-content-center">
                                                    <div class="col mb-4 mb-lg-0">
                                                        <button class="btn btn-primary btn-icon text-white me-2 float-end">
                                                            <span>
                                                                <i class="fe fe-send"></i>
                                                            </span> Submit
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
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
                                    <h3 class="card-title">Table Output Belum Dialokasikan</h3>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="coutput-table"
                                            class="table text-nowrap text-md-nowrap border table-bordered table-striped mg-b-0">
                                            <thead class="text-center">
                                                <tr>
                                                    <th>Tahun Anggaran</th>
                                                    <th>Kode Tim</th>
                                                    <th>Nama Tim</th>
                                                    <th>Kode Program</th>
                                                    <th>Kode Kegiatan</th>
                                                    <th>Kode Output</th>
                                                    <th>Kode Sub-output</th>
                                                    <th>Uraian Output</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                               @foreach ($data_output_belum as $output_belum)
                                                   <tr>
                                                    <td>{{$output_belum->tahun_anggaran}}</td>
                                                    <td>{{$output_belum->kode_tim}}</td>
                                                    <td>{{$output_belum->nama_tim}}</td>
                                                    <td>{{$output_belum->kd_program}}</td>
                                                    <td>{{$output_belum->kd_kegiatan}}</td>
                                                    <td>{{$output_belum->kd_output}}</td>
                                                    <td>{{$output_belum->kd_suboutput}}</td>
                                                    <td>{{$output_belum->uraian_output}}</td>
                                                   </tr>
                                               @endforeach
                                            </tbody>
                                        </table>
                                        {{-- {{ $data_coutput->links('vendor.pagination.simple-bootstrap-4') }} --}}
                                    </div>
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
                                    <h3 class="card-title">Table Output Sudah Dialokasikan</h3>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="coutput-table"
                                            class="table text-nowrap text-md-nowrap border table-bordered table-striped mg-b-0">
                                            <thead class="text-center">
                                                <tr>
                                                    <th>Tahun Anggaran</th>
                                                    <th>Kode Tim</th>
                                                    <th>Nama Tim</th>
                                                    <th>Kode Program</th>
                                                    <th>Kode Kegiatan</th>
                                                    <th>Kode Output</th>
                                                    <th>Kode Sub-output</th>
                                                    <th>Uraian Output</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                               @foreach ($data_output_sudah as $output_sudah)
                                                   <tr>
                                                    <td>{{$output_sudah->tahun_anggaran}}</td>
                                                    <td>{{$output_sudah->kode_tim}}</td>
                                                    <td>{{$output_sudah->nama_tim}}</td>
                                                    <td>{{$output_sudah->kd_program}}</td>
                                                    <td>{{$output_sudah->kd_kegiatan}}</td>
                                                    <td>{{$output_sudah->kd_output}}</td>
                                                    <td>{{$output_sudah->kd_suboutput}}</td>
                                                    <td>{{$output_sudah->uraian_output}}</td>
                                                   </tr>
                                               @endforeach
                                            </tbody>
                                        </table>
                                        {{-- {{ $data_coutput->links('vendor.pagination.simple-bootstrap-4') }} --}}
                                    </div>
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
    <script src="{{ url('js/admin/alokasi_output.js') }}"></script>
@endpush
{{-- scripts --}}
