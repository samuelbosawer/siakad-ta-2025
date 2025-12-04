@extends('admin.layout.tamplate')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        {{-- <h4 class="text-muted py-3 mb-4"><a href="/{{ Request::segment(1).'/'.Request::segment(2) }}" class=" fw-light">{{  Request::segment(2) }}</a> </h4> --}}

        <div class="row ">
            <div class="col-12">
                <div class="row">
                    <div class="card mb-4">
                        <h5 class="card-header fw-bolder"><i class="menu-icon tf-icons bx bx-file"></i>
                            {{ $judul ?? 'TAMBAH DATA SKRIPSI ' }} </h5>
                        <div class="card-body">

                            @if (Request::segment(4) == 'ubah' && Request::segment(2) == 'skripsi')
                                <form action="{{ route('dashboard.skripsi.update', $data->id) }}"
                                    enctype="multipart/form-data" method="POST">
                                    @csrf
                                    @method('PUT')
                                @elseif (Request::segment(3) == 'tambah' && Request::segment(2) == 'skripsi')
                                    <form action="{{ route('dashboard.skripsi.store') }}" enctype="multipart/form-data"
                                        method="POST">
                                        @csrf
                                    @else
                                        <form action="">
                            @endif

                            <div class="row">


                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Proposal</label>
                                    <select name="id_proposal" class="form-select"
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                        <option value="">Pilih Proposal</option>
                                        @foreach ($propsal as $p)
                                            <option value="{{ $p->id }}" @selected(old('id_proposal', $data->id_proposal ?? '') == $p->id)>
                                                {{ $p->judul }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_proposal')
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
                                        <option value="Belum Selesai" @selected(isset($data) && $data->status == 'Belum Selesai')>Belum Selesai</option>
                                        <option value="Selesai" @selected(isset($data) && $data->status == 'Selesai')>Selesai</option>
                                    </select>
                                    @error('status')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            @else
                                <input type="text" hidden value="Belum Selesai" name="status">
                            @endif
                           
                                <div class="col-md-6 mb-3">
                                    <label for="berkas" class="form-label">Berkas Skripsi</label>
                                @if (!Auth::user()->hasRole('mahasiswa'))
                                    
                                    @if (isset($data) && $data->berkas)
                                        <p>
                                            <a href="{{ asset('storage/' . $data->berkas) }}" target="_blank"
                                                class="btn btn-dark btn-sm">Lihat File</a>
                                        </p>
                                    @endif
                                    @endif

                                    <input type="file" class="form-control" id="berkas" name="berkas"
                                        value="{{ old('berkas') ?? ($data->berkas ?? '') }}"
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                    @error('berkas')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                  <div class="col-md-12 mb-3">
                                    <label for="keterangan" class="form-label">Keterangan</label>
                                    <textarea class="form-control" id="ket" name ="ket" rows="3"
                                        @if (Request::segment(3) == 'detail') disabled @endif>{{ old('keterangan') ?? ($data->keterangan ?? '') }}</textarea>
                                    @error('keterangan')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                            </div>




                            <div class="col-md-12 mb-3 mx-auto">
                                @if (Request::segment(3) == 'detail')

                                 @if(!Auth::user()->hasAnyRole(['mahasiswa', 'dosen']))
                                    <a href="{{ route('dashboard.skripsi.ubah', $data->id) }}"
                                        class="btn btn-dark text-white">
                                        <i class="menu-icon tf-icons bx bx-pencil"></i> UBAH DATA </a>
                                    @endif
                                @elseif ((Request::segment(3) == 'tambah' || Request::segment(4) == 'ubah') && Request::segment(2) == 'skripsi')
                                    <button type="submit" class="btn btn-primary text-white">SIMPAN <i
                                            class="menu-icon tf-icons bx bx-save"></i></button>
                                @endif

                                <a href="{{ route('dashboard.skripsi') }}" class="btn btn-dark text-white"> KEMBALI </a>

                            </div>


                            </form>
                        </div>
                    </div>

                </div>
            </div>
        @endsection
