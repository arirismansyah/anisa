@extends('admin.layout')

@section('content')
    <div class="main-content app-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <div>
                        <h1 class="page-title">Knowledges Management</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Q&A</li>
                        </ol>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <button id="add-qna-btn" href="javascript:void(0);"
                            class="btn btn-primary btn-icon text-white me-2">
                            <span>
                                <i class="fe fe-plus"></i>
                            </span> Add Q&A
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
                                    <h3 class="card-title">Data Q&A</h3>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="qna-table"
                                            class="table border text-nowrap text-md-nowrap table-bordered table-striped mg-b-0">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Pertanyaan</th>
                                                    <th class="text-center">Jawaban</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data_qnas as $qna)
                                                    <tr>
                                                        <td>{{ $qna->pertanyaan }}</td>
                                                        <td style="max-width: 40vw; " class="text-wrap">{{ $qna->jawaban }}
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="btn-list">
                                                                <button id="edit-qna-btn" key_id="{{ $qna->id }}"
                                                                    type="button" class="btn btn-icon  btn-success"><i
                                                                        class="fe fe-edit"></i></button>
                                                                <button id="delete-qna-btn" key_id="{{ $qna->id }}"
                                                                    type="button" class="btn btn-icon  btn-danger"><i
                                                                        class="fe fe-trash"></i></button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        {{ $data_qnas->links('vendor.pagination.simple-bootstrap-4') }}
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
    {{-- modal-add-qna --}}
    <div class="modal fade" id="modal-add-qna" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Q&A</h5>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/add_qna') }}" method="post">
                        @csrf

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">
                                    Pertanyaan
                                    <span class="text-red">*</span>
                                </label>

                                <textarea required id="input-pertanyaan" rows="3" name="pertanyaan" class="form-control" placeholder="Pertanyaan"> </textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">
                                    Jawaban
                                    <span class="text-red">*</span>
                                </label>
                                <textarea required id="input-jawaban" rows="3" name="jawaban" class="form-control" placeholder="Jawaban"> </textarea>
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

    {{-- modal-edit-qna --}}
    <div class="modal fade" id="modal-edit-qna" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Q&A</h5>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/edit_qna') }}" method="post">
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
                                    Pertanyaan
                                    <span class="text-red">*</span>
                                </label>
                                <textarea required id="input-pertanyaan" rows="3" name="pertanyaan" class="form-control"
                                    placeholder="Pertanyaan"> </textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">
                                    Jawaban
                                    <span class="text-red">*</span>
                                </label>
                                <textarea required id="input-jawaban" rows="3" name="jawaban" class="form-control" placeholder="Jawaban"> </textarea>
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

    {{-- modal-delete-qna --}}
    <div class="modal fade" id="modal-delete-qna">
        <div class="modal-dialog modal-dialog-centered text-center" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Qna</h5>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body text-center p-4">

                    <div class="row">
                        <i class="fa fa-trash fa-5x text-danger mb-5"></i>
                    </div>
                    <h4 class="text-danger">Yakin menghapus Q&A ini?</h4>

                    <form action="{{ url('delete_qna') }}" method="post">
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
    <script src="{{ url('js/admin/m_qnas.js') }}"></script>
@endpush
{{-- scripts --}}
