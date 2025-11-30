@extends('admin.layout.tamplate')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        {{-- <h4 class="text-muted py-3 mb-4"><a href="/{{ Request::segment(1).'/'.Request::segment(2) }}" class=" fw-light">{{  Request::segment(2) }}</a> </h4> --}}

        <div class="row ">
            <div class="col-12">
                <div class="row">
                    <div class="card mb-4">
                        <h5 class="card-header fw-bolder"><i class="menu-icon tf-icons bx bx-file"></i>
                            {{ $judul ?? 'TAMBAH DATA PROPOSAL' }} </h5>
                        <div class="card-body">

                            @if (Request::segment(4) == 'ubah' && Request::segment(2) == 'proposal')
                                <form action="{{ route('dashboard.proposal.update', $data->id) }}" enctype="multipart/form-data"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                @elseif (Request::segment(3) == 'tambah' && Request::segment(2) == 'proposal')
                                    <form action="{{ route('dashboard.proposal.store') }}" enctype="multipart/form-data"
                                        method="POST">
                                        @csrf
                                    @else
                                        <form action="">
                            @endif

                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label for="judul" class="form-label">Judul</label>
                                    <input type="text" class="form-control" id="judul" name="judul"
                                        value="{{ old('judul') ?? ($data->judul ?? '') }}"
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                    @error('judul')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                
                            <div class="col-md-6 mb-3">
                            <label class="form-label">Mahasiswa</label>
                            <select name="mahasiswa_id" class="form-select"  @if (Request::segment(3) == 'detail') disabled @endif>
                                <option value="">Pilih Mahasiswa</option>
                                @foreach ($mahasiswas as $m)
                                    <option value="{{ $m->id }}"
                                        @selected( old('mahasiswa_id', $data->mahasiswa_id ?? '') == $m->id )>
                                        {{ $m->nama_depan . ' ' . $m->nama_belakang }}
                                    </option>
                                @endforeach
                            </select>
                            @error('mahasiswa_id') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        
                               

                                  <div class="col-md-6 mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" class="form-select" id="exampleFormControlSelect1"
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                        <option value="">Pilih</option>
                                        <option value="Belum Selesai" @if( isset($data) && ($data->status == 'Belum Selesai') ) selected @endif>Belum Selesai</option>

                                        <option value="Selesai" @if( isset($data) && ($data->status == 'Selesai') ) selected @endif>Selesai</option>
                                    </select>
                                      @error('status')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                </div>

                                 <div class="col-md-6 mb-3">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal"
                                        value="{{ old('tanggal') ?? ($data->tanggal ?? '') }}"
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                    @error('tanggal')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                               

                            </div>

                             <div class="col-md-6 mb-3">
                                    <label for="berkas" class="form-label">Berkas</label>
                                    <p>
                                        @if(isset($data) && $data->berkas)
                                        <a href="{{ asset('storage/' . $data->berkas) }}" target="_blank" class="btn btn-dark btn-sm">Lihat File</a>
                                        @endif
                                    </p>
                                    <input type="file" class="form-control" id="berkas" name="berkas"
                                        value="{{ old('berkas') ?? ($data->berkas ?? '') }}"
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                    @error('berkas')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                            <div class="col-md-12 mb-3 mx-auto">
                                @if (Request::segment(3) == 'detail')
                                    <a href="{{ route('dashboard.proposal.ubah', $data->id) }}" class="btn btn-dark text-white">
                                        <i class="menu-icon tf-icons bx bx-pencil"></i> UBAH DATA </a>
                                @elseif ((Request::segment(3) == 'tambah' || Request::segment(4) == 'ubah') && Request::segment(2) == 'proposal')
                                    <button type="submit" class="btn btn-primary text-white">SIMPAN <i
                                            class="menu-icon tf-icons bx bx-save"></i></button>
                                @endif

                                <a href="{{ route('dashboard.proposal') }}" class="btn btn-dark text-white"> KEMBALI </a>

                            </div>


                            </form>
                        </div>
                    </div>

                </div>
            </div>
        @endsection
