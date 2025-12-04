
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
                    <li><a href="/" class=" ">BERANDA<br></a></li>
                    <li class="dropdown"><a href="#"><span>PROFIL</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="{{ route('sejarah') }}">Sejarah Singkat</a></li>
                            <li><a href="{{ route('visi_misi') }}">Visi, Misi & Strategi</a></li>
                            <li><a href="{{ route('struktur') }}">Struktur Organinasi</a></li>
                            <li><a href="{{ route('dosen') }}">Dosen & Staf</a></li>
                        </ul>
                    </li>

                    <li><a href="{{ route('pengumuman') }}">PENGUMUMAN</a></li>
                    <li><a href="https://umpapua.ac.id" target="_blank">SIAKAD KAMPUS</a></li>
                    <li><a href="https://umpapua.ac.id" target="_blank">LMS</a></li>
                    <li><a href="https://pddikti.kemdiktisaintek.go.id" target="_blank">PDDIKTI</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

           @guest
                <a class="btn-getstarted" href="{{ route('login') }}">Login</a>
            @endguest

            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn-getstarted" type="submit">Logout</button>
                </form>
            @endauth
        </div>
    </header>