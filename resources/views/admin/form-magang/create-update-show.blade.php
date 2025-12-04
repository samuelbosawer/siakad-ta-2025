@extends('admin.layout.tamplate')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">
            <div class="col-12">
                <div class="card mb-4">

                    <h5 class="card-header fw-bolder">
                        <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                        {{ $judul ?? (Request::segment(3) == 'tambah' ? 'TAMBAH DATA MAGANG' : 'UBAH DATA MAGANG') }}
                    </h5>

                    <div class="card-body">

                        {{-- FORM --}}
                        @php
                            $isDetail = Request::segment(3) == 'detail';
                            $isTambah = Request::segment(3) == 'tambah';
                            $isUbah = Request::segment(4) == 'ubah';
                        @endphp

                        @if ($isUbah)
                            <form action="{{ route('dashboard.form-magang.update', $data->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                            @elseif($isTambah)
                                <form action="{{ route('dashboard.form-magang.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                @else
                                    <form>
                        @endif

                        <div class="row">

                            {{-- PILIH MAHASISWA --}}
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Mahasiswa</label>
                                <select name="mahasiswa_id" class="form-select"
                                    @if ($isDetail) disabled @endif>
                                    <option value="">Pilih Mahasiswa</option>
                                    @foreach ($mahasiswas as $m)
                                        <option value="{{ $m->id }}" @selected(old('mahasiswa_id', $data->mahasiswa_id ?? '') == $m->id)>
                                            {{ $m->nama_depan . ' ' . $m->nama_belakang }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('mahasiswa_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Magang</label>
                                <select name="magang_id" class="form-select"
                                    @if ($isDetail) disabled @endif>
                                    <option value="">Pilih Magang</option>
                                    @foreach ($magangs as $m)
                                        <option value="{{ $m->id }}" @selected(old('magang_id', $data->magang_id ?? '') == $m->id)>
                                            {{ $m->nama_magang }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('magang_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>


                            {{-- TANGGAL --}}
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Tanggal</label>
                                <input type="date" class="form-control" name="tanggal"
                                    value="{{ old('tanggal', $data->tanggal ?? '') }}"
                                    @if ($isDetail) disabled @endif>
                                @error('tanggal')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>



                            {{-- SK MAGANG --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label">SK Magang</label>


                                @if (isset($data) && $data->berkas)
                                    <p>
                                        <a class="btn btn-dark btn-sm" target="_blank"
                                            href="{{ asset('storage/' . $data->berkas) }}">
                                            Lihat File
                                        </a>
                                    </p>
                                @endif

                                <input type="file" class="form-control" name="berkas"
                                    @if ($isDetail) disabled @endif>
                                @error('sk')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>



                            @if (!Auth::user()->hasRole('mahasiswa'))
                                {{-- STATUS --}}
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-select"
                                        @if ($isDetail) disabled @endif>
                                        <option value="">Pilih</option>
                                        <option value="Dalam Proses" @selected(isset($data) && $data->status == 'Dalam Proses')>Dalam Proses</option>
                                        <option value="Selesai" @selected(isset($data) && $data->status == 'Selesai')>Selesai</option>
                                    </select>
                                    @error('status')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            @else
                                <input type="text" hidden value="Dalam Proses" name="status">
                            @endif

                            {{-- KETERANGAN --}}
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Keterangan</label>
                                <textarea name="ket" class="form-control" rows="3" @if ($isDetail) disabled @endif>{{ old('ket', $data->ket ?? '') }}</textarea>
                                @error('ket')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>

                        <div class="col-md-12 mb-3 mx-auto pb-3">

                            {{-- BUTTONS --}}
                            @if ($isDetail)
                               @if(!Auth::user()->hasAnyRole(['mahasiswa', 'dosen']))
                                    <a href="{{ route('dashboard.form-magang.ubah', $data->id) }}" class="btn btn-dark">
                                        <i class="bx bx-pencil"></i> UBAH DATA
                                    </a>
                                @endif
                            @elseif ($isTambah || $isUbah)
                                <button type="submit" class="btn btn-primary">
                                    SIMPAN <i class="bx bx-save"></i>
                                </button>
                            @endif

                            <a href="{{ route('dashboard.form-magang') }}" class="btn btn-dark">KEMBALI</a>

                        </div>

                    </div>



                    </form>

                </div>
            </div>
        </div>

    </div>
@endsection
