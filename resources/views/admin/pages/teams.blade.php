@extends('admin.layout')

@section('content')
    <div class="main-content app-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <div>
                        <h1 class="page-title">Users Management</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tim Kerja</li>
                        </ol>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <button id="add-team-btn" href="javascript:void(0);"
                            class="btn btn-primary btn-icon text-white me-2">
                            <span>
                                <i class="fe fe-plus"></i>
                            </span> Add Team
                        </button>
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

                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="panel panel-primary">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Data Tim Kerja</h3>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="team-table"
                                            class="table border text-nowrap text-md-nowrap table-bordered table-striped mg-b-0">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Kode Tim</th>
                                                    <th class="text-center">Nama Tim</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data_teams as $team)
                                                    <tr>
                                                        <td>{{ $team->kode_tim }}</td>
                                                        <td>{{ $team->nama_tim }}</td>
                                                        <td class="text-center">
                                                            <div class="btn-list">
                                                                <button id="edit-team-btn" key_id="{{ $team->id }}"
                                                                    key_kode="{{ $team->kode_tim }}"
                                                                    key_nama="{{ $team->nama_tim }}" type="button"
                                                                    class="btn btn-icon  btn-success"><i
                                                                        class="fe fe-edit"></i></button>
                                                                <button id="delete-team-btn" key_id="{{ $team->id }}"
                                                                    key_kode="{{ $team->kode_tim }}"
                                                                    key_nama="{{ $team->nama_tim }}" type="button"
                                                                    class="btn btn-icon  btn-danger"><i
                                                                        class="fe fe-trash"></i></button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        {{ $data_teams->links('vendor.pagination.simple-bootstrap-4') }}
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
    {{-- modal-add-teams --}}
    <div class="modal fade" id="modal-add-team" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Team</h5>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/add_team') }}" method="post">
                        @csrf

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">
                                    Kode Tim
                                    <span class="text-red">*</span>
                                </label>
                                <input required id="input-kode" type="text" name="kode_tim" class="form-control"
                                    placeholder="Kode Tim">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">
                                    Nama Tim
                                    <span class="text-red">*</span>
                                </label>
                                <input required id="input-nama" type="text" name="nama_tim" class="form-control"
                                    placeholder="Nama Tim">
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

    {{-- modal-edit-teams --}}
    <div class="modal fade" id="modal-edit-team" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Team</h5>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/edit_team') }}" method="post">
                        @csrf

                        <div class="col-md-12" style="display: none">
                            <div class="form-group">
                                <label class="form-label">
                                    Id
                                    <span class="text-red">*</span>
                                </label>
                                <input id="input-id" type="text" name="id" class="form-control"
                                    placeholder="Id">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">
                                    Kode Tim
                                    <span class="text-red">*</span>
                                </label>
                                <input id="input-kode" type="text" name="kode_tim" class="form-control"
                                    placeholder="Kode Tim">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">
                                    Nama Tim
                                    <span class="text-red">*</span>
                                </label>
                                <input value="anisa" required id="input-nama" type="text" name="nama_tim"
                                    class="form-control" placeholder="Nama Tim">
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

    {{-- modal-delete-role --}}
    <div class="modal fade" id="modal-delete-team">
        <div class="modal-dialog modal-dialog-centered text-center" role="document">
            <div class="modal-content">
                <div class="modal-body text-center p-4">
                    <div class="row d-flex float-end mb-2">
                        <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="row">
                        <i class="fa fa-trash fa-5x text-danger mb-5"></i>
                    </div>
                    <h4 class="text-danger">Yakin menghapus tim kerja?</h4>
                    <p class="mg-b-20 mg-x-20">Anda akan menghapus tim kerja <strong>"<span
                                id="nama-tim"></span>"</strong>
                    </p>
                    <form action="{{ url('delete_team') }}" method="post">
                        @csrf
                        <input type="text" name="id" id="input-id" style="display: none">
                        <button type="submit" aria-label="Close" class="btn btn-danger pd-x-25"
                            data-bs-dismiss="modal">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- scripts --}}
@push('scripts')
    <script src="{{ url('js/admin/m_teams.js') }}"></script>
@endpush
{{-- scripts --}}
