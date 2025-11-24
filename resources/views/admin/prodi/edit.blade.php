

     
@extends('admin.layout.tamplate')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  {{-- <h4 class="text-muted py-3 mb-4"><a href="/{{ Request::segment(1).'/'.Request::segment(2) }}" class=" fw-light">{{  Request::segment(2) }}</a> </h4> --}}

  <div class="row ">
    <div class="col-12">
        <div class="row">
          <div class="card mb-4">
            <h5 class="card-header fw-bolder"><i class="menu-icon tf-icons bx bx-box"></i> DATA PRODI</h5>
            <div class="card-body">
            
                @if (Request::segment(4) == 'ubah' && Request::segment(2) == 'prodi')
                   <form action="{{ route('dashboard.prodi.update', $data->id) }}" enctype="multipart/form-data" method="POST"  >
                    @csrf
                    @method('PUT')
                @else
                   <form action="">
                @endif


                  <div class="col-md-12 mb-3">
                    <label for="nama" class="form-label">Nama Program Studi</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') ?? $data->nama ?? '' }}" @if (Request::segment(3) == null && Request::segment(2) == 'prodi')  disabled @endif>
                    @error('nama')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                   </div>
                   <div class="col-md-12 mb-3">
                     <label for="visi" class="form-label">Visi</label>
                      <textarea class="form-control" id="visi" name ="visi" rows="3" @if (Request::segment(3) == null && Request::segment(2) == 'prodi')  disabled @endif>{{ old('visi') ?? $data->visi ?? ''}}</textarea>
                       @error('visi')
                        <small class="text-danger">{{ $message }}</small>
                       @enderror
                   </div>
                   <div class="col-md-12 mb-3">
                     <label for="misi" class="form-label">MIsi</label>
                      <textarea class="form-control" id="misi" name="misi" rows="3" @if (Request::segment(3) == null && Request::segment(2) == 'prodi')  disabled @endif>{{ old('misi') ?? $data->misi ?? ''}}</textarea>
                        @error('misi')
                        <small class="text-danger">{{ $message }}</small>
                       @enderror
                   </div>
                    <div class="col-md-12 mb-3">
                     <label for="sejarah" class="form-label">Sejarah</label>
                      <textarea class="form-control" id="sejarah" name="sejarah" rows="3" @if (Request::segment(3) == null && Request::segment(2) == 'prodi')  disabled @endif>{{ old('sejarah') ?? $data->sejarah ?? ''}}</textarea>
                        @error('sejarah')
                          <small class="text-danger">{{ $message }}</small>
                       @enderror
                   </div>
                    <div class="col-md-12 mb-3">
                     <label for="sejarah" class="form-label">Sturktur</label>
                     <input type="file" class="form-control" id="struktur" name="struktur" value="{{ old('struktur') ?? $data->struktur ?? '' }}" @if (Request::segment(3) == null && Request::segment(2) == 'prodi')  disabled @endif>
                     @error('struktur')
                          <p class="text-danger text-sm">{{ $message }}</p>
                       @enderror
                      <a target="_blank" class="btn btn-primary text-white btn-sm mt-2" href="/{{ old('struktur') ?? $data->struktur ?? ''}}">Lihat file</a>
                   </div>

                   <div class="col-md-12 mb-3 mx-auto">
                        @if (Request::segment(3) == null && Request::segment(2) == 'prodi')
                          <a href="{{ route('dashboard.prodi.ubah', $data->id) }}" class="btn btn-dark text-white"> <i class="menu-icon tf-icons bx bx-pencil"></i> UBAH DATA </a>
                       @elseif (Request::segment(4) == 'ubah' && Request::segment(2) == 'prodi')
                          <button type="submit" class="btn btn-primary text-white">SIMPAN <i class="menu-icon tf-icons bx bx-save"></i></button>
                       @endif

                   </div>
                   
                   
               </form>
            </div>
        </div>
      
    </div>
  </div>

@endsection
      