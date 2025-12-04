@extends('visitor.layout.tamplate')

@section('content')
    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">

            <img src="/assets-visitor/img/hero-bg.jpg" alt="" data-aos="fade-in">

            <div class="container">
                {{-- <img src="{{ asset('assets/img/logo.png') }}" alt="" data-aos="fade-in"> --}}
                <h2 data-aos="fade-up" data-aos-delay="100">Sistem Informasi Akademik<br>Program Studi</h2>
                <div class="row ">
                    <div class="mt-4">

                        <button data-aos="fade-up" data-aos-delay="200"
                            class="fw-bolder text-white  bg-primary p-3   mx-auto " disabled>Ilmu Komunikasi UM
                            Papua</button>
                    </div>
                </div>

                {{-- <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
                    <a href="courses.html" class="btn-get-started">Get Started</a>
                </div> --}}
            </div>

        </section><!-- /Hero Section -->

        <!-- About Section -->
        <section id="about" class="about section">

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-6 order-1 order-lg-2 " data-aos="fade-up" data-aos-delay="100">
                        <img src="/assets-visitor/img/about.jpg" class="img-fluid rounded" alt="">
                    </div>

                    <div class="col-lg-6 order-2 order-lg-1 content" data-aos="fade-up" data-aos-delay="200">
                        <h3>SIAK PRODI <br>
                            Ilmu Komunikasi UM Papua</h3>
                        <p style="text-align: justify">
                            Sistem Informasi Akademik (SIAK) Prodi Ilmu Komunikasi Universitas Muhammadiyah Papua adalah
                            platform digital yang dirancang untuk mendukung proses administrasi dan layanan akademik
                            secara terpadu. Sistem ini menjadi pusat pengelolaan data akademik yang dapat diakses oleh
                            mahasiswa, dosen, dan staf program studi.
                        </p>

                        <p style="text-align: justify">Melalui SIAK, berbagai aktivitas akademik dapat dilakukan dengan
                            lebih cepat, akurat, dan efisien. Layanan yang tersedia mencakup pengisian KRS, penjadwalan
                            perkuliahan, pemantauan kehadiran, pengelolaan nilai, dan akses informasi kurikulum serta
                            mata kuliah. Sistem ini juga membantu program studi dalam menyusun laporan akademik dan
                            memonitor progres studi mahasiswa secara real time.</p>

                        <a href="{{ route('visi_misi') }}" class="read-more"><span>Selengkapnya</span><i class="bi bi-arrow-right"></i></a>
                    </div>

                </div>

            </div>

        </section><!-- /About Section -->

        <!-- Counts Section -->
        <section id="counts" class="section counts light-background">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="{{ $jumlahMahasiswa }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>Mahasiswa</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="{{ $jumlahDosen }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>Dosen</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="{{ $jumlahKkn }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>KKN</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="{{ $jumlahMagang }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>Magang</p>
                        </div>
                    </div><!-- End Stats Item -->

                </div>

            </div>

        </section><!-- /Counts Section -->





        <!-- Courses Section -->
        <section id="courses" class="courses section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Terbaru</h2>
                <p>Pengumuman</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row">
                    @foreach ($pengumuman as $p)
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


        <!-- Counts Section -->
        <section id="" class="section bg-primary ">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-4 col-4">
                        <div class="stats-item text-center w-100 h-100">
                            <img src="/assets/img/logo.png" class="img-fluid rounded" width="50" alt="">
                            <a href="https://umpapua.siakadcloud.com/gate/login" target="_blank" class="text-white fw-bold">
                                <h class="text-white">SIAKAD</h>
                            </a>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-4 col-4">
                        <div class="stats-item text-center w-100 h-100">
                            <img src="/assets-visitor/img/cms.png" class="img-fluid rounded" width="50"
                                alt="">
                            <a href="https://edlink.id/login" target="_blank" class="text-white fw-bold">
                                <h class="text-white">LMS</h>
                            </a>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-4 col-4">
                        <div class="stats-item text-center w-100 h-100">
                            <img src="/assets-visitor/img/PDDIKTI.png" class="img-fluid rounded" width="50"
                                alt="">
                            <a href="https://pddikti.kemdiktisaintek.go.id" target="_blank" class="text-white fw-bold">
                                <h class="text-white">PDDIKTI</h>
                            </a>
                        </div>
                    </div><!-- End Stats Item -->


                </div>

            </div>

        </section><!-- /Counts Section -->




        {{-- <!-- Trainers Index Section -->
        <section id="trainers-index" class="section trainers-index">

            <div class="container">

                <div class="row">

                    <div class="col-lg-4 col-4 d-flex" data-aos="fade-up" data-aos-delay="100">
                        <div class="member">
                            <img src="/assets-visitor/img/trainers/trainer-1.jpg" class="img-fluid" alt="">
                            <div class="member-content">
                                <h4>Walter White</h4>
                                <span>Web Development</span>
                                <p>
                                    Magni qui quod omnis unde et eos fuga et exercitationem. Odio veritatis perspiciatis
                                    quaerat qui aut aut aut
                                </p>
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter-x"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Team Member -->

                    <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                        <div class="member">
                            <img src="/assets-visitor/img/trainers/trainer-2.jpg" class="img-fluid" alt="">
                            <div class="member-content">
                                <h4>Sarah Jhinson</h4>
                                <span>Marketing</span>
                                <p>
                                    Repellat fugiat adipisci nemo illum nesciunt voluptas repellendus. In architecto
                                    rerum rerum temporibus
                                </p>
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter-x"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Team Member -->

                    <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                        <div class="member">
                            <img src="/assets-visitor/img/trainers/trainer-3.jpg" class="img-fluid" alt="">
                            <div class="member-content">
                                <h4>William Anderson</h4>
                                <span>Content</span>
                                <p>
                                    Voluptas necessitatibus occaecati quia. Earum totam consequuntur qui porro et
                                    laborum toro des clara
                                </p>
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter-x"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Team Member -->

                </div>

            </div>

        </section><!-- /Trainers Index Section --> --}}

    </main>
@endsection
