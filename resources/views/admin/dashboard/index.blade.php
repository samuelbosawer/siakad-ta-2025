@extends('admin.layout.tamplate')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            {{-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4> --}}

            <div class="row">

                <div class="col-lg-12 col-md-12 order-1">
                    <div class="row">


                        @if(!Auth::user()->hasAnyRole(['mahasiswa', 'dosen']))

                        <div class="col-lg-3 col-md-6 col-6 mt-3 shadow-2">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h4 class="fw-semibold d-block mb-1 text-dark">Mahasiswa</h4>
                                    <h1>{{ $jumlahMahasiswa ?? 0 }}</h1>
                                    <a href="{{ route('dashboard.mahasiswa') }}">Detail</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-6 mt-3 shadow-2">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h4 class="fw-semibold d-block mb-1 text-dark">Dosen</h4>
                                    <h1>{{ $jumlahDosen ?? 0 }}</h1>
                                    <a href="{{ route('dashboard.dosen') }}">Detail</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-6 mt-3 shadow-2">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h4 class="fw-semibold d-block mb-1 text-dark">Skripsi</h4>
                                    <h1>{{ $jumlahSkripsi ?? 0 }}</h1>
                                    <a href="{{ route('dashboard.skripsi') }}">Detail</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-6 mt-3 shadow-2">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h4 class="fw-semibold d-block mb-1 text-dark">Magang</h4>
                                    <h1>{{ $jumlahMagang ?? 0 }}</h1>
                                    <a href="{{ route('dashboard.magang') }}">Detail</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-6 mt-3 shadow-2">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h4 class="fw-semibold d-block mb-1 text-dark">KKN</h4>
                                    <h1>{{ $jumlahKkn ?? 0 }}</h1>
                                    <a href="{{ route('dashboard.kkn') }}">Detail</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-6 mt-3 shadow-2">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h4 class="fw-semibold d-block mb-1 text-dark">Proposal</h4>
                                    <h1>{{ $jumlahProposal ?? 0 }}</h1>
                                    <a href="{{ route('dashboard.proposal') }}">Detail</a>
                                </div>
                            </div>
                        </div>
                    @endif











                    </div>
                </div>


            </div>

        </div>
    @endsection
