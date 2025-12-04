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
              <p class="mb-0">  Halaman ini menjelaskan sejarah lembaga, menampilkan perjalanan awal, perkembangan penting, nilai yang dibangun, serta peristiwa yang membentuk identitas dan arah pelayanan dari masa ke masa hingga saat ini secara berkelanjutan</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="/">Beranda</a></li>
            <li class="current">Sejarah<br></li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->


     <!-- About Us Section -->
    <section id="about-us" class="section about-us">

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
            <img src="/assets-visitor/img/about.jpg" class="img-fluid" alt="">
          </div>

          <div class="col-lg-6 order-2 order-lg-1 content" data-aos="fade-up" data-aos-delay="200">
            <h3>Sejarah Singkat</h3>
            <p style="text-align: justify">
               {{ $data->sejarah }}
            </p>
           
          </div>

        </div>

      </div>

    </section><!-- /About Us Section -->






    

    </main>
@endsection
