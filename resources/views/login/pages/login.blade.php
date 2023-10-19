@extends('login.layout')

@section('content')
    <div class="content-wrapper bg-soft-primary">
        <section class="wrapper bg-soft-primary h-100">
            {{-- messages --}}
            <div class="row m-2">
                <div class="col-lg-12 d-flex justify-content-center">
                    @include('login.components.messages')
                </div>
            </div>
            {{-- messages --}}


            <div class="container col-lg-12 h-100 d-flex align-items-center">

                <div class="row d-flex justify-content-around w-100">
                    <div class="col-lg-6 ">

                        {{-- logo & name --}}
                        {{-- logo & name --}}

                        <div class="card shadow-lg">
                            <div class="card-body">
                                <h3 class="mb-5">Login</h3>
                                <form action="{{ url('auth') }}" method="POST">
                                    @csrf
                                    <div class="form-floating mb-4">
                                        <input id="input-username" name="username" type="text" class="form-control"
                                            placeholder="Text Input">
                                        <label for="password">Username</label>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <input id="input-password" name="password" type="password" class="form-control"
                                            placeholder="Password">
                                        <label for="password">Password</label>
                                    </div>
                                    <div class="form-floating mb-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="showpass">
                                            <label class="form-check-label" for="showpass"> Show password
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-floating text-end mb-4">
                                        <a href="">Lupa password?</a>
                                    </div>
                                    <div class="form-floating float-end">
                                        <button type="submit" class="btn btn-primary rounded-pill">Login</button>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6 d-flex align-items-center h-100" data-cue="slideInDown" data-show="true"
                        style="animation-name: slideInDown; animation-duration: 700ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
                        <figure>
                            <img class="img-fluid" src="{{ url('sandbox/img/illustrations/i20.png') }}"
                                srcset="{{ url('sandbox/img/illustrations/i20@2x.png') }} 2x" alt="" />
                        </figure>
                    </div>

                </div>
            </div>


        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ url('js/login.js') }}"></script>
@endpush
