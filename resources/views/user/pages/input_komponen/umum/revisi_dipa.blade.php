@extends('user.layout')

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
                            <li class="breadcrumb-item active" aria-current="page">Revisi DIPA</li>
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
                                    <h3 class="card-title">Input Revisi DIPA</h3>
                                </div>

                                <div class="card-body">
                                    <div class="row d-flex justify-content-center">
                                        <form action="{{ url('/input_revisi_dipa') }}" method="post">
                                            @csrf
                                            <div class="col">
                                                <label class="form-label">
                                                    Tahun Anggaran
                                                    <span class="text-red">*</span>
                                                </label>
                                                <div class="row mb-4">
                                                    <div class="col-md-4 mt-4 mt-md-0">
                                                        <div class="input-group">
                                                            <div class="input-group-text">
                                                                <span class="fa fa-clock-o tx-16 lh-0 op-6"></span>
                                                            </div>
                                                            <input required class="form-control year-picker"
                                                                id="input-periode" placeholder="Tahun Anggaran"
                                                                name="tahun_anggaran" type="text">
                                                        </div>
                                                    </div>
                                                </div>

                                                <label class="form-label">
                                                    Jumlah Revisi
                                                    <span class="text-red">*</span>
                                                </label>
                                                <div class="row mb-4">
                                                    <div class="col-lg-12">
                                                        <div class="table-responsive">
                                                            <table class="table border table-bordered mg-b-2">
                                                                <thead class="bg-primary-transparent">
                                                                    <tr class="text-center">
                                                                        <th>JAN</th>
                                                                        <th>FEB</th>
                                                                        <th>MAR</th>
                                                                        <th>APR</th>
                                                                        <th>MAY</th>
                                                                        <th>JUN</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr class="text-end">
                                                                        <td>
                                                                            <input required class="text-end" required
                                                                                type="number" name="rev_jan" id="rev_jan"
                                                                                value="0">
                                                                        </td>
                                                                        <td>
                                                                            <input required class="text-end" required
                                                                                type="number" name="rev_feb" id="rev_feb"
                                                                                value="0">
                                                                        </td>
                                                                        <td>
                                                                            <input required class="text-end" required
                                                                                type="number" name="rev_mar" id="rev_mar"
                                                                                value="0">
                                                                        </td>
                                                                        <td>
                                                                            <input required class="text-end" required
                                                                                type="number" name="rev_apr" id="rev_apr"
                                                                                value="0">
                                                                        </td>
                                                                        <td>
                                                                            <input required class="text-end" required
                                                                                type="number" name="rev_may" id="rev_may"
                                                                                value="0">
                                                                        </td>
                                                                        <td>
                                                                            <input required class="text-end" required
                                                                                type="number" name="rev_jun" id="rev_jun"
                                                                                value="0">
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <table class="table border table-bordered mg-b-2">
                                                                <thead class="bg-primary-transparent">
                                                                    <tr class="text-center">
                                                                        <th>JUL</th>
                                                                        <th>AUG</th>
                                                                        <th>SEP</th>
                                                                        <th>OCT</th>
                                                                        <th>NOV</th>
                                                                        <th>DEC</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr class="text-end">
                                                                        <td>
                                                                            <input required class="text-end" required
                                                                                type="number" name="rev_jul" id="rev_jul"
                                                                                value="0">
                                                                        </td>
                                                                        <td>
                                                                            <input required class="text-end" required
                                                                                type="number" name="rev_aug" id="rev_aug"
                                                                                value="0">
                                                                        </td>
                                                                        <td>
                                                                            <input required class="text-end" required
                                                                                type="number" name="rev_sep" id="rev_sep"
                                                                                value="0">
                                                                        </td>
                                                                        <td>
                                                                            <input required class="text-end" required
                                                                                type="number" name="rev_oct" id="rev_oct"
                                                                                value="0">
                                                                        </td>
                                                                        <td>
                                                                            <input required class="text-end" required
                                                                                type="number" name="rev_nov"
                                                                                id="rev_nov" value="0">
                                                                        </td>
                                                                        <td>
                                                                            <input required class="text-end" required
                                                                                type="number" name="rev_dec"
                                                                                id="rev_dec" value="0">
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>


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
                                    <h3 class="card-title">Table Revisi DIPA</h3>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="revisi-table"
                                            class="table border text-nowrap text-md-nowrap table-bordered table-striped mg-b-0">
                                            <thead>
                                                <tr>
                                                    <th class="text-center text-middle" rowspan="2">Tahun Anggaran</th>
                                                    <th class="text-center text-middle" colspan="12">Jumlah Revisi Per
                                                    <th class="text-center text-middle" colspan="5">NILAI</th>

                                                    <th class="text-center text-middle" rowspan="2">Action</th>

                                                </tr>
                                                <tr>

                                                    <th class="text-center">01</th>
                                                    <th class="text-center">02</th>
                                                    <th class="text-center">03</th>
                                                    <th class="text-center">04</th>
                                                    <th class="text-center">05</th>
                                                    <th class="text-center">06</th>
                                                    <th class="text-center">07</th>
                                                    <th class="text-center">08</th>
                                                    <th class="text-center">09</th>
                                                    <th class="text-center">10</th>
                                                    <th class="text-center">11</th>
                                                    <th class="text-center">12</th>
                                                    <th class="text-center text-middle">TW 1</th>
                                                    <th class="text-center text-middle">TW 2</th>
                                                    <th class="text-center text-middle">TW 3</th>
                                                    <th class="text-center text-middle">TW 4</th>
                                                    <th class="text-center text-middle">IKPA</th>


                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data_revisi as $revisi)
                                                    @if ($revisi->warning == 1)
                                                        <tr class="bg-warning-transparent">
                                                            <td class="text-end">{{ $revisi->tahun_anggaran }}</td>
                                                            <td class="text-end">{{ $revisi->rev_jan }}</td>
                                                            <td class="text-end">{{ $revisi->rev_feb }}</td>
                                                            <td class="text-end">{{ $revisi->rev_mar }}</td>
                                                            <td class="text-end">{{ $revisi->rev_apr }}</td>
                                                            <td class="text-end">{{ $revisi->rev_may }}</td>
                                                            <td class="text-end">{{ $revisi->rev_jun }}</td>
                                                            <td class="text-end">{{ $revisi->rev_jul }}</td>
                                                            <td class="text-end">{{ $revisi->rev_aug }}</td>
                                                            <td class="text-end">{{ $revisi->rev_sep }}</td>
                                                            <td class="text-end">{{ $revisi->rev_oct }}</td>
                                                            <td class="text-end">{{ $revisi->rev_nov }}</td>
                                                            <td class="text-end">{{ $revisi->rev_dec }}</td>
                                                            <td class="text-end">{{ $revisi->rev_tw_1 }}</td>
                                                            <td class="text-end">{{ $revisi->rev_tw_2 }}</td>
                                                            <td class="text-end">{{ $revisi->rev_tw_3 }}</td>
                                                            <td class="text-end">{{ $revisi->rev_tw_4 }}</td>
                                                            <td class="text-end">{{ $revisi->ikpa }}</td>
                                                            <td class="text-center">
                                                                <div class="btn-list">
                                                                    <button id="warning-revisi-btn"
                                                                        key_id="{{ $revisi->id }}" type="button"
                                                                        class="btn btn-icon  btn-info"><i
                                                                            class="fa fa-comment"></i></button>
                                                                    @hasanyrole(['Admin'])
                                                                        <button id="add-warning-revisi-btn"
                                                                            key_id="{{ $revisi->id }}" type="button"
                                                                            class="btn btn-icon  btn-warning"><i
                                                                                class="fa fa-warning"></i></button>
                                                                    @endhasanyrole
                                                                    <button id="delete-revisi-btn"
                                                                        key_id="{{ $revisi->id }}" type="button"
                                                                        class="btn btn-icon  btn-danger"><i
                                                                            class="fe fe-trash"></i></button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @else
                                                        <tr>
                                                            <td class="text-end">{{ $revisi->tahun_anggaran }}</td>
                                                            <td class="text-end">{{ $revisi->rev_jan }}</td>
                                                            <td class="text-end">{{ $revisi->rev_feb }}</td>
                                                            <td class="text-end">{{ $revisi->rev_mar }}</td>
                                                            <td class="text-end">{{ $revisi->rev_apr }}</td>
                                                            <td class="text-end">{{ $revisi->rev_may }}</td>
                                                            <td class="text-end">{{ $revisi->rev_jun }}</td>
                                                            <td class="text-end">{{ $revisi->rev_jul }}</td>
                                                            <td class="text-end">{{ $revisi->rev_aug }}</td>
                                                            <td class="text-end">{{ $revisi->rev_sep }}</td>
                                                            <td class="text-end">{{ $revisi->rev_oct }}</td>
                                                            <td class="text-end">{{ $revisi->rev_nov }}</td>
                                                            <td class="text-end">{{ $revisi->rev_dec }}</td>
                                                            <td class="text-end">{{ $revisi->rev_tw_1 }}</td>
                                                            <td class="text-end">{{ $revisi->rev_tw_2 }}</td>
                                                            <td class="text-end">{{ $revisi->rev_tw_3 }}</td>
                                                            <td class="text-end">{{ $revisi->rev_tw_4 }}</td>
                                                            <td class="text-end">{{ $revisi->ikpa }}</td>
                                                            <td class="text-center">
                                                                <div class="btn-list">
                                                                    @hasanyrole(['Admin'])
                                                                        <button id="add-warning-revisi-btn"
                                                                            key_id="{{ $revisi->id }}" type="button"
                                                                            class="btn btn-icon  btn-warning"><i
                                                                                class="fa fa-warning"></i></button>
                                                                    @endhasanyrole

                                                                    <button id="delete-revisi-btn"
                                                                        key_id="{{ $revisi->id }}" type="button"
                                                                        class="btn btn-icon  btn-danger"><i
                                                                            class="fe fe-trash"></i></button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>

                                        {{ $data_revisi->links('vendor.pagination.simple-bootstrap-4') }}
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
                    <form action="{{ url('/add_warning_revisi_dipa') }}" method="post">
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
    {{-- modal warning --}}

    {{-- modal-delete --}}
    <div class="modal fade" id="modal-delete-revisi">
        <div class="modal-dialog modal-dialog-centered text-center" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-body text-center p-4">
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span
                            aria-hidden="true">&times;</span></button>
                    <i class="fe fe-trash fs-65 text-danger lh-1 mb-5 d-inline-block"></i>
                    <h4 class="text-danger">Yakin menghapus komponen revisi dipa ini?</h4>
                    <p class="mg-b-20 mg-x-20">Anda akan menghapus komponen revisi dipa tahun anggaran <span
                            id="tahun-anggaran"></span></p>
                    <form action="{{ url('delete_revisi_dipa') }}" method="post">
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
    <script src="{{ url('js/features/revisi_dipa.js') }}"></script>
@endpush
{{-- scripts --}}
