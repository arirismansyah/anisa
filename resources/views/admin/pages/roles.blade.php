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
                            <li class="breadcrumb-item active" aria-current="page">Roles</li>
                        </ol>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <button id="add-role-btn" href="javascript:void(0);"
                            class="btn btn-primary btn-icon text-white me-2">
                            <span>
                                <i class="fe fe-plus"></i>
                            </span> Add Role
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
                                    <h3 class="card-title">Data Roles</h3>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="role-table"
                                            class="table border text-nowrap text-md-nowrap table-bordered table-striped mg-b-0">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Role</th>
                                                    <th class="text-center">Guard Name</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data_roles as $role)
                                                    <tr>
                                                        <td>{{ $role->name }}</td>
                                                        <td>{{ $role->guard_name }}</td>
                                                        <td class="text-center">
                                                            <div class="btn-list">
                                                                <button id="edit-role-btn" key_id="{{ $role->id }}"
                                                                    key_name="{{ $role->name }}"
                                                                    key_guard="{{ $role->guard_name }}" type="button"
                                                                    class="btn btn-icon  btn-success"><i
                                                                        class="fe fe-edit"></i></button>
                                                                <button id="delete-role-btn" key_id="{{ $role->id }}"
                                                                    key_name="{{ $role->name }}"
                                                                    key_guard="{{ $role->guard_name }}" type="button"
                                                                    class="btn btn-icon  btn-danger"><i
                                                                        class="fe fe-trash"></i></button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        {{ $data_roles->links('vendor.pagination.simple-bootstrap-4') }}
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
    {{-- modal-add-role --}}
    <div class="modal fade" id="modal-add-role" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Role</h5>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/add_role') }}" method="post">
                        @csrf

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">
                                    Role Name
                                    <span class="text-red">*</span>
                                </label>
                                <input id="input-name" type="text" name="name" class="form-control"
                                    placeholder="Role Name">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">
                                    Guard Name
                                    <span class="text-red">*</span>
                                </label>
                                <input value="anisa" readonly id="input-guard" type="text" name="guard_name"
                                    class="form-control" placeholder="Guard Name">
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

    {{-- modal-edit-role --}}
    <div class="modal fade" id="modal-edit-role" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Role</h5>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/edit_role') }}" method="post">
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
                                    Role Name
                                    <span class="text-red">*</span>
                                </label>
                                <input id="input-name" type="text" name="name" class="form-control"
                                    placeholder="Role Name">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">
                                    Guard Name
                                    <span class="text-red">*</span>
                                </label>
                                <input value="anisa" readonly id="input-guard" type="text" name="guard_name"
                                    class="form-control" placeholder="Guard Name">
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
    <div class="modal fade" id="modal-delete-role">
        <div class="modal-dialog modal-dialog-centered text-center" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Role</h5>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body text-center p-4">

                    <div class="row">
                        <i class="fa fa-trash fa-5x text-danger mb-5"></i>
                    </div>
                    <h4 class="text-danger">Yakin menghapus role?</h4>
                    <p class="mg-b-20 mg-x-20">Anda akan menghapus role <strong>"<span id="nama-role"></span>"</strong>
                    </p>
                    <form action="{{ url('delete_role') }}" method="post">
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
    <script src="{{ url('js/admin/m_roles.js') }}"></script>
@endpush
{{-- scripts --}}
