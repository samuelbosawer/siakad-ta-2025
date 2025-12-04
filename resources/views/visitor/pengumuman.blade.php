@extends('visitor.layout.tamplate')

@section('content')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title" data-aos="fade">
            <div class="heading">
                <div class="container">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1>Sejarah<br></h1>
                            <p class="mb-0"> Halaman ini menjelaskan informarsi terbaru dari program studi</p>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="breadcrumbs">
                <div class="container">
                    <ol>
                        <li><a href="/">Beranda</a></li>
                        <li class="current">Pengumuman<br></li>
                    </ol>
                </div>
            </nav>
        </div><!-- End Page Title -->


     
        <!-- Courses Section -->
        <section id="courses" class="courses section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Terbaru</h2>
                <p>Pengumuman</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row">
                    @foreach ($datas as $p)
                        @php
                            $path = 'storage/' . $p->gambar;
                        @endphp

                       
                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                                data-aos-delay="100">
                                <div class="course-item">

                                  @if (isset($p) && $p->gambar && file_exists(public_path($path)))
                                        <img src="{{ asset('storage/' . $p->gambar) }}" class="img-fluid" alt="...">
                                    @else
                                        <img src="/assets-visitor/img/course/course-1.webp" class="img-fluid"
                                            alt="...">
                                    @endif

                                    <div class="course-content">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <p class="category">
                                                {{ \Carbon\Carbon::parse($p->tanggal)->translatedFormat('d F Y') }}</p>
                                        </div>

                                        <h3><a href="course-details.html">{{ $p->judul }}</a></h3>
                                        <p class="description">{{ $p->deskripsi }}</p>

                                    </div>
                                </div>
                            </div> <!-- End Course Item-->
                        @endforeach




                </div>

            </div>

        </section><!-- /Courses Section -->








    </main>
@endsection
