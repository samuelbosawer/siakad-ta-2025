

     
@extends('admin.layout.tamplate')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  {{-- <h4 class="text-muted py-3 mb-4"><a href="/{{ Request::segment(1).'/'.Request::segment(2) }}" class=" fw-light">{{  Request::segment(2) }}</a> </h4> --}}

  <div class="row ">
    <div class="col-12">
        
        <div class="card">
                <h5 class="card-header">Data KKN Mahasiswa</h5>
                <div class="table-responsive text-nowrap p-3">
                  <div class="row">
                    <div class="col-6 my-3">
                      <a class="btn btn-primary" href="{{ route('dashboard.form-kkn.tambah') }}">Tambah Data KKN Mahasiswa <i class="bx bx-plus me-1"></i></a>
                    </div>
                    <div class="col-6 my-3">
                      @include('admin.layout.search')
                      </div>

                    </div>
                  </div>
                  <table class="table table-bordered">
                    <thead class="">
                      <tr class="bg-primary ">
                        <th class="text-white text-center  p-3 fw-bolder" width="10px" hight="10px" >No</th>
                        <th class="text-white text-center  p-3 fw-bolder">KKN</th>
                        <th class="text-white text-center  p-3 fw-bolder">Tanggal</th>
                        <th class="text-white text-center  p-3 fw-bolder">Mahasiswa</th>
                        <th class="text-white text-center  p-3 fw-bolder"></th> 
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      @forelse ($datas as $data )
                           <tr>
                        <td>{{ ++$i }}</td>
                        <td class="fw-bolder"> <a href="{{ route('dashboard.form-kkn.ubah', $data->id) }}">{{ $data->kkn->nama_kkn  ?? 
                          ''}}</a></td>
                      <td class="text-center">   {{ \Carbon\Carbon::parse($data->tanggal)->translatedFormat('d m Y') }}</td>
                        <td>{{ $data->mahasiswa->nama_depan .' '.$data->mahasiswa->nama_belakang }}</td>
                        <td class="text-center">
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu"> 
                              <a class="dropdown-item" href="{{ route('dashboard.form-kkn.detail', $data->id) }}"
                                >
                                <i class="bx bx-box me-1"></i> Detail</a
                              >

                                @if(!Auth::user()->hasAnyRole(['mahasiswa', 'dosen']))
                              <a class="dropdown-item" href="{{ route('dashboard.form-kkn.ubah', $data->id )}}"><i class="bx bx-edit-alt me-1"></i> Ubah</a
                              >

                            <form action="{{ route('dashboard.form-kkn.hapus', $data->id) }}" 
                                    method="POST" 
                                    onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                  @csrf
                                  @method('DELETE')

                                  <button type="submit" class="dropdown-item text-danger">
                                      <i class="bx bx-trash me-1"></i> Hapus
                                  </button>
                              </form>
                            @endif
                            </div>
                          </div>
                          
                        </td>
                      </tr>
                        
                      @empty
                         <tr>
                        <td colspan="5" class="text-center">Data Belum Ada</td>
                      </tr>
                      @endforelse ($datas as $data )
                 
                
                     
                    
                    </tbody>
                  </table>
                    <div class=" mt-3">
                    {{ $datas->links() }}
                  </div>
                </div>
              </div>
              <!-- Bootstrap Table with Header - Light -->

    </div>
  </div>

@endsection
      