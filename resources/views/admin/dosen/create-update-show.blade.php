@extends('admin.layout.tamplate')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        {{-- <h4 class="text-muted py-3 mb-4"><a href="/{{ Request::segment(1).'/'.Request::segment(2) }}" class=" fw-light">{{  Request::segment(2) }}</a> </h4> --}}

        <div class="row ">
            <div class="col-12">
                <div class="row">
                    <div class="card mb-4">
                        <h5 class="card-header fw-bolder"><i class="menu-icon tf-icons bx bx-cube"></i>
                            {{ $judul ?? 'TAMBAH DATA DOSEN' }} </h5>
                        <div class="card-body">

                            @if (Request::segment(4) == 'ubah' && Request::segment(2) == 'dosen')
                                <form action="{{ route('dashboard.dosen.update', $data->id) }}" enctype="multipart/form-data"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                @elseif (Request::segment(3) == 'tambah' && Request::segment(2) == 'dosen')
                                    <form action="{{ route('dashboard.dosen.store') }}" enctype="multipart/form-data"
                                        method="POST">
                                        @csrf
                                    @else
                                        <form action="">
                            @endif

                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label for="nama_depan" class="form-label">Nama Depan</label>
                                    <input type="text" class="form-control" id="nama_depan" name="nama_depan"
                                        value="{{ old('nama_depan') ?? ($data->nama_depan ?? '') }}"
                                        @if (Request::segment(3) == 'detail') disabled @endif  @if (Auth::user()->HasRole('dosen')) disabled @endif>
                                    @error('nama_depan')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="nama_belakang" class="form-label">Nama Belakang</label>
                                    <input type="text" class="form-control" id="nama_belakang" name="nama_belakang"
                                        value="{{ old('nama_belakang') ?? ($data->nama_belakang ?? '') }}"
                                        @if (Request::segment(3) == 'detail') disabled @endif  @if (Auth::user()->HasRole('dosen')) disabled @endif>
                                    @error('nama_belakang')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                        value="{{ old('tempat_lahir') ?? ($data->tempat_lahir ?? '') }}"
                                        @if (Request::segment(3) == 'detail') disabled @endif  @if (Auth::user()->HasRole('dosen')) disabled @endif>
                                    @error('tempat_lahir')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="tanggal_lahir" class="form-label">Tempat Lahir</label>
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                        value="{{ old('tanggal_lahir') ?? ($data->tanggal_lahir ?? '') }}"
                                        @if (Request::segment(3) == 'detail') disabled @endif  @if (Auth::user()->HasRole('dosen')) disabled @endif>
                                    @error('tanggal_lahir')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="no_hp" class="form-label">Nomor Hp</label>
                                    <input type="text" class="form-control" id="no_hp" name="no_hp"
                                        value="{{ old('no_hp') ?? ($data->no_hp ?? '') }}"
                                        @if (Request::segment(3) == 'detail') disabled @endif  @if (Auth::user()->HasRole('dosen')) disabled @endif>
                                    @error('no_hp')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                <div class="col-md-4 mb-3">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-select" id="exampleFormControlSelect1"
                                        @if (Request::segment(3) == 'detail') disabled @endif  @if (Auth::user()->HasRole('dosen')) disabled @endif>
                                        <option selected hidden>Pilih</option>
                                        <option value="Pria" @if (isset($data) && $data->jenis_kelamin == 'Pria') selected @endif>Pria
                                        </option>
                                        <option value="Wanita">Wanita</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea class="form-control" id="alamat" name ="alamat" rows="3"
                                        @if (Request::segment(3) == 'detail') disabled @endif  @if (Auth::user()->HasRole('dosen')) disabled @endif>{{ old('alamat') ?? ($data->alamat ?? '') }}</textarea>
                                    @error('alamat')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                 @if (Auth::user()->HasRole('adminprodi'))  


                                <div class="col-12">
                                    <p class="text-white p-2 bg-dark rounded-3 ml-3">Akses Akun</p>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="email" name="email"
                                        value="{{ old('email') ?? ($data->user->email ?? '') }}"
                                        @if (Request::segment(3) == 'detail' || Request::segment(4) == 'ubah') disabled @endif>
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        value="" @if (Request::segment(3) == 'detail') disabled @endif>
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="password_confirmation" class="form-label">Ulangi Password</label>
                                    <input type="password_confirmation" class="form-control" id="password_confirmation"
                                        name="password_confirmation" value=""
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                    @error('password_confirmation')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                @endif

                            </div>
                            <div class="col-md-12 mb-3 mx-auto">

                                
                                 @if (Auth::user()->HasRole('adminprodi'))  

                                @if (Request::segment(3) == 'detail')
                                    <a href="{{ route('dashboard.dosen.ubah', $data->id) }}"
                                        class="btn btn-dark text-white"> <i class="menu-icon tf-icons bx bx-pencil"></i>
                                        UBAH DATA </a>
                                @elseif ((Request::segment(3) == 'tambah' || Request::segment(4) == 'ubah') && Request::segment(2) == 'dosen')
                                    <button type="submit" class="btn btn-primary text-white">SIMPAN <i
                                            class="menu-icon tf-icons bx bx-save"></i></button>
                                @endif
                                @endif

                                <a href="{{ route('dashboard.dosen') }}" class="btn btn-dark text-white"> KEMBALI </a>

                            </div>


                            </form>
                        </div>
                    </div>

                </div>
            </div>
        @endsection
