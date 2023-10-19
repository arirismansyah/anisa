@extends('user.layout')

@section('content')
    <div class="main-content app-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <div>
                        <h1 class="page-title">Dashboard</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </div>

                </div>
                <!-- PAGE-HEADER END -->

                <!-- ROW-1 OPEN -->
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="panel panel-primary">
                            <div class="card bg-transparent">
                                <div class="card-header">
                                    <h3 class="card-title">Filter Tahun Anggaran</h3>
                                </div>

                                <div class="card-body">
                                    <div class="row d-flex justify-content-center">
                                        <form action="{{ url('/home') }}" method="get">
                                            @csrf


                                            <div class="row mb-4 d-flex align-items-end">
                                                <div class="col-md-6 mt-4 mt-md-0">
                                                    <label class="form-label">
                                                        Tahun Anggaran
                                                        <span class="text-red">*</span>
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-text">
                                                            <span class="fa fa-clock-o tx-16 lh-0 op-6"></span>
                                                        </div>
                                                        <input value="{{ $tahun_anggaran }}" required
                                                            class="form-control year-picker" id="input-periode"
                                                            placeholder="Tahun Anggaran" name="tahun_anggaran"
                                                            type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mt-4 mt-md-0">
                                                    <button class="btn btn-primary btn-icon text-white me-2">
                                                        <span>
                                                            <i class="fe fe-filter"></i>
                                                        </span> Filter
                                                    </button>
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
                                    <h3 class="card-title">Nilai IKPA Satker</h3>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="tagihan-table"
                                            class="table text-nowrap text-md-nowrap border table-bordered table-striped mg-b-0">
                                            <thead class="text-center align-middle">
                                                <tr class="align-middle">
                                                    <th class="align-middle" rowspan="2">Tahun Anggaran</th>
                                                    <th class="align-middle" rowspan="2">Bulan</th>
                                                    <th colspan="8">Nilai Komponen Penyusun</th>
                                                    <th class="align-middle" rowspan="2">IKPA</th>
                                                </tr>
                                                <tr>
                                                    <th>Revisi DIPA</th>
                                                    <th>Deviasi Hal III DIPA</th>
                                                    <th>Penyerapan ANggaran</th>
                                                    <th>Belanja Kontraktual</th>
                                                    <th>Penyelesaian Tagihan</th>
                                                    <th>Pengelolaan UP/TUP</th>
                                                    <th>Dispensasi SPM</th>
                                                    <th>Capaian Output</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($data_ikpa_satker as $ikpa_satker)
                                                    <tr>
                                                        <td>{{ $ikpa_satker->tahun_anggaran }}</td>
                                                        <td>{{ $ikpa_satker->bulan }}</td>
                                                        <td>{{ $ikpa_satker->nilai_revisi_dipa }}</td>
                                                        <td>{{ $ikpa_satker->nilai_deviasi_tiga_dipa }}</td>
                                                        <td>{{ $ikpa_satker->nilai_penyerapan_anggaran }}</td>
                                                        <td>{{ $ikpa_satker->nilai_belanja_kontraktual }}</td>
                                                        <td>{{ $ikpa_satker->nilai_penyelesaian_tagihan }}</td>
                                                        <td>{{ $ikpa_satker->nilai_up_tup }}</td>
                                                        <td>{{ $ikpa_satker->nilai_dispensasi_spm }}</td>
                                                        <td>{{ $ikpa_satker->nilai_capaian_output }}</td>
                                                        <td>{{ $ikpa_satker->ikpa }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>

                                        </table>

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
                                    <h3 class="card-title">Nilai IKPA Bagian Umum</h3>
                                </div>

                                <div class="card-body">
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
                                    <h3 class="card-title">Nilai IKPA Per Tim</h3>
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
