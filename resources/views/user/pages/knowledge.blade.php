@extends('user.layout')

@section('content')
    <div class="main-content app-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <div>
                        <h1 class="page-title">Knowledge</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Knowledge</li>
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
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">FAQ</h3>
                            </div>
                            <div class="card-body">


                                <div class="accordion" id="accordionExample">
                                    @foreach ($data_faq as $faq)
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="heading{{ $faq->id }}">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}"
                                                    aria-expanded="false" aria-controls="collapse{{ $faq->id }}">
                                                    <i class="fe fe-help-circle me-2" aria-hidden="true"></i>
                                                    <span>{{ $faq->pertanyaan }}</span>
                                                </button>
                                            </h2>
                                            <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse"
                                                aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    {{ $faq->jawaban }}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach


                                </div>



                            </div>

                            <div class="card-footer">
                                {{ $data_faq->links('vendor.pagination.simple-bootstrap-4') }}
                            </div>
                        </div>
                    </div><!-- COL-END -->
                </div>
            </div>
        </div>
        <!-- CONTAINER CLOSED -->
    </div>
@endsection
