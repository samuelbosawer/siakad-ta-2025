@extends('admin.layout.tamplate')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        {{-- <h4 class="text-muted py-3 mb-4"><a href="/{{ Request::segment(1).'/'.Request::segment(2) }}" class=" fw-light">{{  Request::segment(2) }}</a> </h4> --}}

        <div class="row ">
            <div class="col-12">
                <div class="row">
                    <div class="card mb-4">
                        <h5 class="card-header fw-bolder"> <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                            {{ $judul ?? 'TAMBAH DATA KKN' }} </h5>
                        <div class="card-body">

                            @if (Request::segment(4) == 'ubah' && Request::segment(2) == 'form-kkn')
                                <form action="{{ route('dashboard.form-kkn.update', $data->id) }}"
                                    enctype="multipart/form-data" method="POST">
                                    @csrf
                                    @method('PUT')
                                @elseif (Request::segment(3) == 'tambah' && Request::segment(2) == 'form-kkn')
                                    <form action="{{ route('dashboard.form-kkn.store') }}" enctype="multipart/form-data"
                                        method="POST">
                                        @csrf
                                    @else
                                        <form action="">
                            @endif

                            <div class="row">

                                {{-- PILIH MAHASISWA --}}
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Mahasiswa</label>
                                    <select name="mahasiswa_id" class="form-select"
                                        @if (Request::segment(3) == 'detail') disabled @endif>
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

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">KKN</label>
                                    <select name="kkn_id" class="form-select"
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                        <option value="">Pilih KKN</option>
                                        @foreach ($kkns as $k)
                                            <option value="{{ $k->id }}" @selected(old('kkn_id', $data->kkn_id ?? '') == $k->id)>
                                                {{ $k->nama_kkn }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('kkn_id')
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

                                @if (!Auth::user()->hasRole('mahasiswa'))
                                    {{-- STATUS --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Status</label>
                                        <select name="status" class="form-select"
                                             @if (Request::segment(3) == 'detail') disabled @endif>
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


                                <div class="col-md-6 mb-3">
                                    <label for="sk" class="form-label">Kemajuan Studi</label>
                                    <p>
                                        @if (isset($data) && $data->kem_studi)
                                            <a href="{{ asset('storage/' . $data->kem_studi) }}" target="_blank"
                                                class="btn btn-dark btn-sm">Lihat File</a>
                                        @endif
                                    </p>
                                    <input type="file" class="form-control" id="kem_studi" name="kem_studi"
                                        value="{{ old('kem_studi') ?? ($data->kem_studi ?? '') }}"
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                    @error('kem_studi')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="bukti_bayar" class="form-label">Bukti pembayaran</label>
                                    <p>
                                        @if (isset($data) && $data->bukti_bayar)
                                            <a href="{{ asset('storage/' . $data->bukti_bayar) }}" target="_blank"
                                                class="btn btn-dark btn-sm">Lihat File</a>
                                        @endif
                                    </p>
                                    <input type="file" class="form-control" id="bukti_bayar" name="bukti_bayar"
                                        value="{{ old('bukti_bayar') ?? ($data->bukti_bayar ?? '') }}"
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                    @error('bukti_bayar')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                {{-- KETERANGAN --}}
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Keterangan</label>
                                    <textarea name="keterangan" class="form-control" rows="3" @if (Request::segment(3) == 'detail') disabled @endif>{{ old('keterangan', $data->keterangan ?? '') }}</textarea>
                                    @error('keterangan')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>





                            </div>


                            <div class="col-md-12 mb-3 mx-auto">

                                @if (Request::segment(3) == 'detail')
                                    @if (!Auth::user()->hasAnyRole(['mahasiswa', 'dosen']))
                                        <a href="{{ route('dashboard.form-kkn.ubah', $data->id) }}"
                                            class="btn btn-dark text-white">
                                            <i class="menu-icon tf-icons bx bx-pencil"></i> UBAH DATA </a>
                                    @endif
                                @elseif ((Request::segment(3) == 'tambah' || Request::segment(4) == 'ubah') && Request::segment(2) == 'form-kkn')
                                    <button type="submit" class="btn btn-primary text-white">SIMPAN <i
                                            class="menu-icon tf-icons bx bx-save"></i></button>
                                @endif




                                <a href="{{ route('dashboard.form-kkn') }}" class="btn btn-dark text-white"> KEMBALI </a>

                            </div>


                            </form>
                        </div>
                    </div>

                </div>
            </div>
        @endsection
