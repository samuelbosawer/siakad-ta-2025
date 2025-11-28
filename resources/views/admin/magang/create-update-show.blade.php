@extends('admin.layout.tamplate')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        {{-- <h4 class="text-muted py-3 mb-4"><a href="/{{ Request::segment(1).'/'.Request::segment(2) }}" class=" fw-light">{{  Request::segment(2) }}</a> </h4> --}}

        <div class="row ">
            <div class="col-12">
                <div class="row">
                    <div class="card mb-4">
                        <h5 class="card-header fw-bolder">    <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                            {{ $judul ?? 'TAMBAH DATA MAGANG' }} </h5>
                        <div class="card-body">

                            @if (Request::segment(4) == 'ubah' && Request::segment(2) == 'magang')
                                <form action="{{ route('dashboard.magang.update', $data->id) }}" enctype="multipart/form-data"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                @elseif (Request::segment(3) == 'tambah' && Request::segment(2) == 'magang')
                                    <form action="{{ route('dashboard.magang.store') }}" enctype="multipart/form-data"
                                        method="POST">
                                        @csrf
                                    @else
                                        <form action="">
                            @endif

                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label for="nama_magang" class="form-label">Nama Magang</label>
                                    <input type="text" class="form-control" id="nama_magang" name="nama_magang"
                                        value="{{ old('nama_magang') ?? ($data->nama_magang ?? '') }}"
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                    @error('nama_magang')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal"
                                        value="{{ old('tanggal') ?? ($data->tanggal ?? '') }}"
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                    @error('tanggal')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="semester" class="form-label">Semester</label>
                                    <input type="text" class="form-control" id="semester" name="semester"
                                        value="{{ old('semester') ?? ($data->semester ?? '') }}"
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                    @error('semester')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="sk" class="form-label">SK Magang</label>
                                    <p>
                                        @if(isset($data) && $data->sk)
                                        <a href="{{ asset('storage/' . $data->sk) }}" target="_blank" class="btn btn-dark btn-sm">Lihat File</a>
                                        @endif
                                    </p>
                                    <input type="file" class="form-control" id="sk" name="sk"
                                        value="{{ old('sk') ?? ($data->sk ?? '') }}"
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                    @error('sk')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="dosen_id" class="form-label">Dosen Pembimbing</label>
                                    <select name="dosen_id" class="form-select" id="exampleFormControlSelect1"
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                        <option  >Pilih</option>
                                        @foreach ($dosens as $d )
                                                  <option @if (old('sk') ?? ($data->dosen_id ?? '') == $d->id ) selected
                                                      
                                                  @endif  value="{{ $d->id }}"> {{ $d->nama_depan.' '. $d->nama_belakang}}</option>
                                        @endforeach 
                                    </select>
                                    @error('dosen_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" class="form-select" id="exampleFormControlSelect1"
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                        <option value="">Pilih</option>
                                        <option value="Dalam Proses" @if( isset($data) && ($data->status == 'Dalam Proses') ) selected @endif>Dalam Proses</option>
                                        <option value="Dalam Proses" @if( isset($data) && ($data->status == 'Selesai') ) selected @endif>Selesai</option>
                                    </select>
                                      @error('status')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="ket" class="form-label">Keterangan</label>
                                    <textarea class="form-control" id="ket" name ="ket" rows="3"
                                        @if (Request::segment(3) == 'detail') disabled @endif>{{ old('ket') ?? ($data->ket ?? '') }}</textarea>
                                    @error('ket')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>







                        </div>
                        <div class="col-md-12 mb-3 mx-auto">
                            @if (Request::segment(3) == 'detail')
                                <a href="{{ route('dashboard.magang.ubah', $data->id) }}" class="btn btn-dark text-white">
                                    <i class="menu-icon tf-icons bx bx-pencil"></i> UBAH DATA </a>
                            @elseif ((Request::segment(3) == 'tambah' || Request::segment(4) == 'ubah') && Request::segment(2) == 'magang')
                                <button type="submit" class="btn btn-primary text-white">SIMPAN <i
                                        class="menu-icon tf-icons bx bx-save"></i></button>
                            @endif

                            <a href="{{ route('dashboard.magang') }}" class="btn btn-dark text-white"> KEMBALI </a>

                        </div>


                        </form>
                    </div>
                </div>

            </div>
        </div>
    @endsection
