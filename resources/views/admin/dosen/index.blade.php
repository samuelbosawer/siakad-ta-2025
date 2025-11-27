

     
@extends('admin.layout.tamplate')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  {{-- <h4 class="text-muted py-3 mb-4"><a href="/{{ Request::segment(1).'/'.Request::segment(2) }}" class=" fw-light">{{  Request::segment(2) }}</a> </h4> --}}

  <div class="row ">
    <div class="col-12">
        
        <div class="card">
                <h5 class="card-header">Data Dosen </h5>
                <div class="table-responsive text-nowrap p-3">
                  <div class="row">
                    <div class="col-6 my-3">
                      <a class="btn btn-primary" href="{{ route('dashboard.dosen.tambah') }}">Tambah Data Dosen <i class="bx bx-plus me-1"></i></a>
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
                        <th class="text-white text-center  p-3 fw-bolder">Nama</th>
                        <th class="text-white text-center  p-3 fw-bolder">No Hp</th>
                        <th class="text-white text-center  p-3 fw-bolder">Email</th> 
                        <th class="text-white text-center  p-3 fw-bolder"></th> 
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      @foreach ($datas as $data )
                      <tr>
                        <td>{{ ++$i }}</td>
                        <td class="fw-bolder"> <a href="{{ route('dashboard.dosen.ubah', $data->id) }}">{{ $data->nama_depan.' '.$data->nama_belakang }}</a></td>
                        <td>{{ $data->no_hp }}</td>
                        <td>{{ $data->user->email }}</td>
                        <td class="text-center">
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{ route('dashboard.dosen.detail', $data->id) }}"
                                >
                                <i class="bx bx-box me-1"></i> Detail</a
                              >
                              <a class="dropdown-item" href="{{ route('dashboard.dosen.ubah', $data->id )}}"><i class="bx bx-edit-alt me-1"></i> Ubah</a
                              >

                            <form action="{{ route('dashboard.dosen.hapus', $data->id) }}" 
                                    method="POST" 
                                    onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                  @csrf
                                  @method('DELETE')

                                  <button type="submit" class="dropdown-item text-danger">
                                      <i class="bx bx-trash me-1"></i> Hapus
                                  </button>
                              </form>
                            </div>
                          </div>
                          
                        </td>
                      </tr>
                      @endforeach
                     
                    
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- Bootstrap Table with Header - Light -->

    </div>
  </div>

@endsection
      