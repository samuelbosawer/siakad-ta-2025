@extends('visitor.layout.tamplate')

@section('content')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title" data-aos="fade">
            <div class="heading">
                <div class="container">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1>Dosen & Staft<br></h1>
                            <p class="mb-0"> Halaman ini menjelaskan tentang Dosen & Staf Prodi </p>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="breadcrumbs">
                <div class="container">
                    <ol>
                        <li><a href="/">Beranda</a></li>
                        <li class="current">Dosen & Staf <br></li>
                    </ol>
                </div>
            </nav>
        </div><!-- End Page Title -->


        <!-- About Us Section -->
        <section id="about-us" class="section about-us">

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-12 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
                        <table class="table table-bordered">
                            <thead class="">
                                <tr class="bg-primary ">
                                    <th class=" text-center  p-3 fw-bolder" width="10px" hight="10px">No</th>
                                    <th class=" text-center  p-3 fw-bolder">Nama</th>
                                    <th class=" text-center  p-3 fw-bolder">No Hp</th>
                                    <th class=" text-center  p-3 fw-bolder">Email</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                              @php
                                $i = 0;
                              @endphp
                                @foreach ($datas as $data)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td class="fw-bolder"> <a
                                                href="{{ route('dashboard.dosen.ubah', $data->id) }}">{{ $data->nama_depan . ' ' . $data->nama_belakang }}</a>
                                        </td>
                                        <td>{{ $data->no_hp }}</td>
                                        <td>{{ $data->user->email }}</td>
                                     
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>



                </div>

            </div>

        </section><!-- /About Us Section -->








    </main>
@endsection
