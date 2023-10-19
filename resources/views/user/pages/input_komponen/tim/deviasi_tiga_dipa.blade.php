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
                            <li class="breadcrumb-item active" aria-current="page">Deviasi Halaman III DIPA</li>
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
                                    <h3 class="card-title">Input Deviasi Halaman III DIPA</h3>
                                </div>

                                <div class="card-body">
                                    <div class="row d-flex justify-content-center">
                                        <form action="{{ url('/input_deviasi') }}" method="post">
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
                                                    <div class="col-md-4 mt-4 mt-md-0">
                                                        <label class="form-label">
                                                            Rencana Anggaran (Rp.)
                                                            <span class="text-red">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <input required class="form-control" id="input-rencana-anggaran"
                                                                value="0" name="rencana_anggaran" type="number">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mt-4 mt-md-0">
                                                        <label class="form-label">
                                                            Penyerapan Anggaran (Rp.)
                                                            <span class="text-red">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <input required class="form-control"
                                                                id="input-penyerapan-anggaran" value="0"
                                                                name="penyerapan_anggaran" type="number">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4 mt-4 mt-md-0">
                                                        <label class="form-label">
                                                            Deviasi Bulan Sebelumnya (%)
                                                            <span class="text-red">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <input required class="form-control"
                                                                id="input-deviasi-sebelumnya" value="0"
                                                                name="persen_deviasi_sebelumnya" type="number">
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
                                    <h3 class="card-title">Table Deviasi Halaman III DIPA</h3>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="deviasi-table"
                                            class="table text-nowrap text-md-nowrap border table-bordered table-striped mg-b-0">
                                            <thead class="text-center">
                                                <tr>
                                                    <th>Tahun Anggaran</th>
                                                    <th>Bulan</th>
                                                    <th>Kode Tim</th>
                                                    <th>Nama Tim</th>
                                                    <th>Rencana Anggaran</th>
                                                    <th>Penyerapan Anggaran</th>
                                                    <th>Deviasi (%)</th>
                                                    <th>Deviasi Bulan Sebelumnya (%)</th>
                                                    <th>IKPA</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($data_deviasi as $deviasi)
                                                    @if ($deviasi->warning == 1)
                                                        <tr class="bg-warning-transparent">
                                                            <td>{{ $deviasi->tahun_anggaran }}</td>
                                                            <td>{{ $deviasi->bulan }}</td>
                                                            <td>{{ $deviasi->kode_tim }}</td>
                                                            <td>{{ $deviasi->nama_tim }}</td>
                                                            <td>{{ $deviasi->rencana_anggaran }}</td>
                                                            <td>{{ $deviasi->penyerapan_anggaran }}</td>
                                                            <td>{{ $deviasi->persen_deviasi }}</td>
                                                            <td>{{ $deviasi->persen_deviasi_sebelumnya }}</td>
                                                            <td>{{ $deviasi->ikpa }}</td>
                                                            <td class="text-center">
                                                                <div class="btn-list">
                                                                    <button id="warning-deviasi-btn"
                                                                        key_id="{{ $deviasi->id }}" type="button"
                                                                        class="btn btn-icon  btn-info"><i
                                                                            class="fa fa-comment"></i></button>
                                                                    @hasanyrole(['Admin'])
                                                                        <button id="add-warning-deviasi-btn"
                                                                            key_id="{{ $deviasi->id }}" type="button"
                                                                            class="btn btn-icon  btn-warning"><i
                                                                                class="fa fa-warning"></i></button>
                                                                    @endhasanyrole
                                                                    <button id="delete-deviasi-btn"
                                                                        key_id="{{ $deviasi->id }}" type="button"
                                                                        class="btn btn-icon  btn-danger"><i
                                                                            class="fe fe-trash"></i></button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @else
                                                        <tr>
                                                            <td>{{ $deviasi->tahun_anggaran }}</td>
                                                            <td>{{ $deviasi->bulan }}</td>
                                                            <td>{{ $deviasi->kode_tim }}</td>
                                                            <td>{{ $deviasi->nama_tim }}</td>
                                                            <td>{{ $deviasi->rencana_anggaran }}</td>
                                                            <td>{{ $deviasi->penyerapan_anggaran }}</td>
                                                            <td>{{ $deviasi->persen_deviasi }}</td>
                                                            <td>{{ $deviasi->persen_deviasi_sebelumnya }}</td>
                                                            <td>{{ $deviasi->ikpa }}</td>
                                                            <td class="text-center">
                                                                <div class="btn-list">
                                                                    @hasanyrole(['Admin'])
                                                                        <button id="add-warning-deviasi-btn"
                                                                            key_id="{{ $deviasi->id }}" type="button"
                                                                            class="btn btn-icon  btn-warning"><i
                                                                                class="fa fa-warning"></i></button>
                                                                    @endhasanyrole
                                                                    <button id="delete-deviasi-btn"
                                                                        key_id="{{ $deviasi->id }}" type="button"
                                                                        class="btn btn-icon  btn-danger"><i
                                                                            class="fe fe-trash"></i></button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>

                                        </table>

                                        {{ $data_deviasi->links('vendor.pagination.simple-bootstrap-4') }}
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
                    <form action="{{ url('/add_warning_deviasi') }}" method="post">
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
    <div class="modal fade" id="modal-delete-deviasi">
        <div class="modal-dialog modal-dialog-centered text-center" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-body text-center p-4">
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span
                            aria-hidden="true">&times;</span></button>
                    <i class="fe fe-trash fs-65 text-danger lh-1 mb-5 d-inline-block"></i>
                    <h4>Yakin menghapus komponen Deviasi Halaman III DIPA ini?</h4>
                    <form action="{{ url('delete_deviasi') }}" method="post">
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
    <script src="{{ url('js/features/deviasi_tiga_dipa.js') }}"></script>
@endpush
{{-- scripts --}}
