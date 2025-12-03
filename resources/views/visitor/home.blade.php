<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title> SIAK Prodi Ilmu Komunikasi UM Papua </title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo.png') }}" />
    <!-- Favicons -->
    <link href="{{ asset('assets/img/logo.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assets-visitor/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets-visitor/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets-visitor/vendor/aos/aos.css" rel="stylesheet">
    <link href="/assets-visitor/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/assets-visitor/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="/assets-visitor/css/main.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Mentor
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Updated: Jul 07 2025 with Bootstrap v5.3.7
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="/" class="logo d-flex align-items-center me-auto">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="{{ asset('assets/img/logo.png') }}" alt="">
                <h4 class="fw-bold">SIAK PRODI <br> Ilmu Komunikasi UM Papua</h4>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="" class="active fw-bolder">BERANDA<br></a></li>
                    <li class="dropdown"><a href="#"><span>PROFIL</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="#">Sejarah Singkat</a></li>
                            <li><a href="#">Visi, Misi & Strategi</a></li>
                            <li><a href="#">Struktur Organinasi</a></li>
                            <li><a href="#">Dosen & Staf</a></li>
                        </ul>
                    </li>

                    <li><a href="courses.html">PENGUMUMAN</a></li>
                    <li><a href="trainers.html">SIAKAD KAMPUS</a></li>
                    <li><a href="events.html">LMS</a></li>
                    <li><a href="pricing.html">PDDIKTI</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <a class="btn-getstarted" href="{{ route('login') }}">Login</a>
        </div>
    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">

            <img src="/assets-visitor/img/hero-bg.jpg" alt="" data-aos="fade-in">

            <div class="container">
                    {{-- <img src="{{ asset('assets/img/logo.png') }}" alt="" data-aos="fade-in"> --}}
                <h2 data-aos="fade-up" data-aos-delay="100">Sistem Informasi Akademik<br>Program Studi</h2>
                <div class="row ">
                    <div class="mt-4">
                  
                        <button data-aos="fade-up" data-aos-delay="200" class="fw-bolder text-white  bg-primary p-3   mx-auto " disabled>Ilmu Komunikasi UM Papua</button>
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
                        <p  style="text-align: justify">
                            Sistem Informasi Akademik (SIAK) Prodi Ilmu Komunikasi Universitas Muhammadiyah Papua adalah platform digital yang dirancang untuk mendukung proses administrasi dan layanan akademik secara terpadu. Sistem ini menjadi pusat pengelolaan data akademik yang dapat diakses oleh mahasiswa, dosen, dan staf program studi.
                        </p>

                        <p style="text-align: justify">Melalui SIAK, berbagai aktivitas akademik dapat dilakukan dengan lebih cepat, akurat, dan efisien. Layanan yang tersedia mencakup pengisian KRS, penjadwalan perkuliahan, pemantauan kehadiran, pengelolaan nilai, dan akses informasi kurikulum serta mata kuliah. Sistem ini juga membantu program studi dalam menyusun laporan akademik dan memonitor progres studi mahasiswa secara real time.</p>

                        <a href="#" class="read-more"><span>Selengkapnya</span><i class="bi bi-arrow-right"></i></a>
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
                            <span data-purecounter-start="0" data-purecounter-end="1232"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>Mahasiswa</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="64" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Dosen</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="42" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>KKN</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="24" data-purecounter-duration="1"
                                class="purecounter"></span>
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

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                        data-aos-delay="100">
                        <div class="course-item">
                            <img src="/assets-visitor/img/course/course-1.webp" class="img-fluid" alt="...">
                            <div class="course-content">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <p class="category">Web Development</p>
                                    <p class="price">$169</p>
                                </div>

                                <h3><a href="course-details.html">Website Design</a></h3>
                                <p class="description">Et architecto provident deleniti facere repellat nobis iste. Id
                                    facere quia quae dolores dolorem tempore.</p>
                            
                            </div>
                        </div>
                    </div> <!-- End Course Item-->

                          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                        data-aos-delay="100">
                        <div class="course-item">
                            <img src="/assets-visitor/img/course/course-1.webp" class="img-fluid" alt="...">
                            <div class="course-content">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <p class="category">Web Development</p>
                                    <p class="price">$169</p>
                                </div>

                                <h3><a href="course-details.html">Website Design</a></h3>
                                <p class="description">Et architecto provident deleniti facere repellat nobis iste. Id
                                    facere quia quae dolores dolorem tempore.</p>
                            
                            </div>
                        </div>
                    </div> <!-- End Course Item-->

                
                </div>

            </div>

        </section><!-- /Courses Section -->


              <!-- Counts Section -->
        <section id="" class="section bg-primary ">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-4 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <img src="/assets/img/logo.png" class="img-fluid rounded" width="50" alt="">
                         <a href="https://umpapua.ac.id" target="_blank" class="text-white fw-bold">  <h class="text-white">SIAKAD</h></a>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-4 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                              <img src="/assets-visitor/img/cms.png" class="img-fluid rounded" width="50" alt="">
                         <a href="https://umpapua.ac.id" target="_blank" class="text-white fw-bold">  <h class="text-white">LMS</h></a>
                        </div>
                    </div><!-- End Stats Item -->

                      <div class="col-lg-4 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                              <img src="/assets-visitor/img/PDDIKTI.png" class="img-fluid rounded" width="50" alt="">
                         <a href="https://umpapua.ac.id" target="_blank" class="text-white fw-bold">  <h class="text-white">PDDIKTI</h></a>
                        </div>
                    </div><!-- End Stats Item -->


                </div>

            </div>

        </section><!-- /Counts Section -->


        

        {{-- <!-- Trainers Index Section -->
        <section id="trainers-index" class="section trainers-index">

            <div class="container">

                <div class="row">

                    <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
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

    <footer id="footer" class="footer position-relative light-background">

        <div class="container footer-top">
            <div class="row  d-flex justify-content-between">
                <div class="col-lg-6 col-md-6 footer-about">
                    <a href="/" class="logo d-flex align-items-center">
                        <span class="sitename">SIAK PRODI
Ilmu Komunikasi UM Papua</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p> Jl. Abepantai No. 25 Tanah Hitam</p>
                        <p>Jayapura, Papua</p>
                        <p class="mt-3"><strong>Phone:</strong> <span>+(0967) 582-430</span></p>
                        <p><strong>Email:</strong> <span>mail@umpapua.ac.id</span></p>
                    </div>
                    <div class="social-links d-flex mt-4">
                        <a href="#"><i class="bi bi-twitter-x"></i></a>
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="#">Beranda</a></li>
                        <li><a href="#">Profil</a></li>
                        <li><a href="#">Pengumuman</a></li>
                    </ul>
                </div>

              

            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">PRODI
Ilmu Komunikasi UM Papua</strong> <span>All Rights Reserved</span>
            </p>
          
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="/assets-visitor/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets-visitor/vendor/php-email-form/validate.js"></script>
    <script src="/assets-visitor/vendor/aos/aos.js"></script>
    <script src="/assets-visitor/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/assets-visitor/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="/assets-visitor/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="/assets-visitor/js/main.js"></script>

</body>

</html>
