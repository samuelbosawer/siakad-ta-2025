@extends('visitor.layout.tamplate')

@section('content')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title" data-aos="fade">
            <div class="heading">
                <div class="container">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1>Struktur Organisasi<br></h1>
                            <p class="mb-0"> Halaman ini menjelaskan tentang Struktur Organisasi Program Studi</p>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="breadcrumbs">
                <div class="container">
                    <ol>
                        <li><a href="/">Beranda</a></li>
                        <li class="current">Struktur Organisasi<br></li>
                    </ol>
                </div>
            </nav>
        </div><!-- End Page Title -->


        <!-- About Us Section -->
        <section id="about-us" class="section about-us">

            <div class="container">

                <div class="row gy-4">



                    <div class="col-lg-12 order-2 order-lg-1 content" data-aos="fade-up" data-aos-delay="200">
                        <h3 class="text-center"> Struktur Organisasi</h3>
                        <p style="text-align: justify">
                            @if (isset($data) && $data->struktur)
                                <img src="{{ asset('storage/' . $data->struktur) }}" class="img-fluid" alt="...">
                            @else
                                <img src="/assets-visitor/img/course/course-1.webp" class="img-fluid" alt="...">
                            @endif
                        </p>

                    </div>

                </div>

            </div>

        </section><!-- /About Us Section -->








    </main>
@endsection
