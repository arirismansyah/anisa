@extends('admin.layout')

@section('content')
    <div class="main-content app-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <div>
                        <h1 class="page-title">Input Komponen IKPA</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pengelolaan UP/TUP</li>
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
                                    <h3 class="card-title">Input Pengelolaan UPTUP</h3>
                                </div>

                                <div class="card-body">
                                    <div class="row d-flex justify-content-center">
                                        <form action="{{ url('/input_uptup') }}" method="post">
                                            @csrf
                                            <div class="col">

                                                <div class="row mb-4">
                                                    <div class="col-md-6 mt-4 mt-md-0">
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
                                                    <div class="col-md-6 mt-4 mt-md-0">
                                                        <label class="form-label">
                                                            Bulan
                                                            <span class="text-red">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-text">
                                                                <span class="fa fa-clock-o tx-16 lh-0 op-6"></span>
                                                            </div>
                                                            <input required class="form-control month-picker"
                                                                id="input-bulan" placeholder="Periode Bulan" name="bulan"
                                                                type="text">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-md-6 mt-4 mt-md-0">
                                                        <label class="form-label">
                                                            Jumlah GUP Tepat Waktu
                                                            <span class="text-red">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <input required class="form-control " id=""
                                                                value="0" name="jml_gup_tepat_waktu" type="number">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mt-4 mt-md-0">
                                                        <label class="form-label">
                                                            Jumlah GUP
                                                            <span class="text-red">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <input required class="form-control " id=""
                                                                value="0" name="jml_gup" type="number">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <div class="col-md-4 mt-4 mt-md-0">
                                                        <label class="form-label">
                                                            Persentase GUP
                                                            <span class="text-red">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <input required class="form-control " id=""
                                                                value="0" name="persentase_gup" type="number">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mt-4 mt-md-0">
                                                        <label class="form-label">
                                                            Tanggal GUP
                                                            <span class="text-red">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-text">
                                                                <span class="fa fa-clock-o tx-16 lh-0 op-6"></span>
                                                            </div>
                                                            <input required class="form-control date-picker"
                                                                id="input-bulan" placeholder="Tanggal GUP" name="tgl_gup"
                                                                type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mt-4 mt-md-0">
                                                        <label class="form-label">
                                                            Tanggal GUP Sebelumnya
                                                            <span class="text-red">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-text">
                                                                <span class="fa fa-clock-o tx-16 lh-0 op-6"></span>
                                                            </div>
                                                            <input required class="form-control date-picker"
                                                                id="input-bulan" placeholder="Tanggal GUP Sebelumnya"
                                                                name="tgl_gup_sebelumnya" type="text">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <div class="col-md-4 mt-4 mt-md-0">
                                                        <label class="form-label">
                                                            Jumlah PTUP Tepat Waktu
                                                            <span class="text-red">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <input required class="form-control " id=""
                                                                value="0" name="jml_ptup_tepat_waktu"
                                                                type="number">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mt-4 mt-md-0">
                                                        <label class="form-label">
                                                            Jumlah PTUP
                                                            <span class="text-red">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <input required class="form-control " id=""
                                                                value="0" name="jml_ptup" type="number">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mt-4 mt-md-0">
                                                        <label class="form-label">
                                                            Persentase Setoran TUP
                                                            <span class="text-red">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <input required class="form-control " id=""
                                                                value="0" name="persentase_tup" type="number">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-md-6 mt-4 mt-md-0">
                                                        <label class="form-label">
                                                            Pinalti Nilai
                                                            <span class="text-red">*untuk akhir triwulan iv</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <input required readonly class="form-control"
                                                                id="input-pinalti" value="0" name="pinalti_nilai"
                                                                type="number">
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
                                    <h3 class="card-title">Table Pengelolaan UPTUP</h3>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="uptup-table"
                                            class="table border text-nowrap text-md-nowrap table-bordered table-striped mg-b-0">
                                            <thead class="text-center">
                                                <tr>
                                                    <th rowspan="2">Tahun Anggaran</th>
                                                    <th rowspan="2">Bulan</th>
                                                    <th colspan="4">Jumlah</th>
                                                    <th rowspan="2">IKPA</th>
                                                    <th rowspan="2">Action</th>
                                                </tr>
                                                <tr>
                                                    <th>GUP Tepat Waktu</th>
                                                    <th>GUP</th>
                                                    <th>PTUP Tepat Waktu</th>
                                                    <th>PTUP</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($data_uptup as $uptup)
                                                    @if ($uptup->warning == 1)
                                                        <tr class="bg-warning-transparent">
                                                            <td>{{ $uptup->tahun_anggaran }}</td>
                                                            <td>{{ $uptup->bulan }}</td>
                                                            <td>{{ $uptup->jml_gup_tepat_waktu }}</td>
                                                            <td>{{ $uptup->jml_gup }}</td>
                                                            <td>{{ $uptup->jml_ptup_tepat_waktu }}</td>
                                                            <td>{{ $uptup->jml_ptup }}</td>
                                                            <td>{{ $uptup->ikpa }}</td>
                                                            <td class="text-center">
                                                                <div class="btn-list">
                                                                    <button id="warning-uptup-btn"
                                                                        key_id="{{ $uptup->id }}" type="button"
                                                                        class="btn btn-icon  btn-info"><i
                                                                            class="fa fa-comment"></i></button>
                                                                    @hasanyrole(['Admin'])
                                                                        <button id="add-warning-uptup-btn"
                                                                            key_id="{{ $uptup->id }}" type="button"
                                                                            class="btn btn-icon  btn-warning"><i
                                                                                class="fa fa-warning"></i></button>
                                                                    @endhasanyrole
                                                                    <button id="delete-uptup-btn"
                                                                        key_id="{{ $uptup->id }}" type="button"
                                                                        class="btn btn-icon  btn-danger"><i
                                                                            class="fe fe-trash"></i></button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @else
                                                        <tr>
                                                            <td>{{ $uptup->tahun_anggaran }}</td>
                                                            <td>{{ $uptup->bulan }}</td>
                                                            <td>{{ $uptup->jml_gup_tepat_waktu }}</td>
                                                            <td>{{ $uptup->jml_gup }}</td>
                                                            <td>{{ $uptup->jml_ptup_tepat_waktu }}</td>
                                                            <td>{{ $uptup->jml_ptup }}</td>
                                                            <td>{{ $uptup->ikpa }}</td>
                                                            <td class="text-center">
                                                                <div class="btn-list">

                                                                    @hasanyrole(['Admin'])
                                                                        <button id="add-warning-uptup-btn"
                                                                            key_id="{{ $uptup->id }}" type="button"
                                                                            class="btn btn-icon  btn-warning"><i
                                                                                class="fa fa-warning"></i></button>
                                                                    @endhasanyrole
                                                                    <button id="delete-uptup-btn"
                                                                        key_id="{{ $uptup->id }}" type="button"
                                                                        class="btn btn-icon  btn-danger"><i
                                                                            class="fe fe-trash"></i></button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>

                                        </table>

                                        {{ $data_uptup->links('vendor.pagination.simple-bootstrap-4') }}
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

    {{-- modals --}}

    {{-- modal warning notes --}}
    <div class="modal fade" id="modal-warning" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Warning Notes</h5>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">
                                Catatan
                                <span class="text-red">*</span>
                            </label>
                            <textarea readonly id="warning-desc" rows="3" type="text" name="warning_desc" class="form-control"
                                placeholder="Role Name"> </textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    {{-- modal warning notes --}}

    {{-- modal add warning --}}
    <div class="modal fade" id="modal-add-warning" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Warning Notes</h5>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/add_warning_uptup') }}" method="post">
                        @csrf

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">
                                    Catatan
                                    <span class="text-red">*</span>
                                </label>
                                <textarea id="input-warning-desc" rows="3" type="text" name="warning_desc" class="form-control"
                                    placeholder="Role Name"> </textarea>
                            </div>
                        </div>

                        <div class="col-md-12" style="display: none">
                            <div class="form-group">
                                <input id="input-warning" type="number" value="1" name="warning"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="col-md-12" style="display: none">
                            <div class="form-group">
                                <input id="input-id" type="numbe" name="id" class="form-control">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    {{-- modal add warning --}}

    {{-- modal-delete --}}
    <div class="modal fade" id="modal-delete-uptup">
        <div class="modal-dialog modal-dialog-centered text-center" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-body text-center p-4">
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span
                            aria-hidden="true">&times;</span></button>
                    <i class="fe fe-trash fs-65 text-danger lh-1 mb-5 d-inline-block"></i>
                    <h4>Yakin menghapus komponen pengelolaan UP/TUP ini?</h4>
                    <form action="{{ url('delete_uptup') }}" method="post">
                        @csrf
                        <input type="text" name="id" id="input-id" style="display: none">
                        <button type="submit" aria-label="Close" class="btn btn-danger pd-x-25"
                            data-bs-dismiss="modal">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- modal-delete --}}
    {{-- modals --}}
@endsection

{{-- scripts --}}
@push('scripts')
    <script src="{{ url('js/date_picker.js') }}"></script>
    <script src="{{ url('js/features/pengelolaan_uptup.js') }}"></script>
@endpush
{{-- scripts --}}
