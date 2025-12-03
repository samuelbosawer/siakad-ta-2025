 <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="{{ route('dashboard.home') }}" class="app-brand-link">
              <span class="app-brand-logo demo">
               <img width="50px" src="{{ asset('assets/img/logo.png') }}" alt="" srcset="">
              </span>
              <span class=" menu-text fw-bolder ms-2">SIAK UM PAPUA</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item @if (Request::segment(1) == 'dashboard' && Request::segment(2) == null) active @endif">
              <a href="{{ route('dashboard.home') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>
            {{-- <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Data Master</span>
            </li> --}}

           @if (Auth::user()->hasRole('adminprodi'))
             <li class="menu-item @if (Request::segment(1) == 'dashboard' && Request::segment(2) == 'prodi') active @endif" >
              <a href="{{ route('dashboard.prodi') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div data-i18n="Analytics">Data Prodi</div>
              </a>
            </li>
          @endif


          

            <li class="menu-item  @if (Request::segment(1) == 'dashboard' && Request::segment(2) == 'mahasiswa') active @endif ">
              <a href="{{ route('dashboard.mahasiswa') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Analytics">Data Mahasiswa</div>
              </a>
            </li>


             @if (Auth::user()->hasRole('adminprodi') || Auth::user()->hasRole('dosen') )
            <li class="menu-item @if (Request::segment(1) == 'dashboard' && Request::segment(2) == 'dosen') active @endif">
              <a href="{{ route('dashboard.dosen') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Analytics">Data Dosen</div>
              </a>
            </li>
            @endif

          

             <li class="menu-item @if (Request::segment(1) == 'dashboard' && Request::segment(2) == 'magang' || Request::segment(2) == 'form-magang') active open @endif">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                <div data-i18n="Misc">Data Magang</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item @if (Request::segment(1) == 'dashboard' && Request::segment(2) == 'magang') active @endif">
                  <a href="{{ route('dashboard.magang') }}" class="menu-link">
                    <div data-i18n="Error">Magang</div>
                  </a>
                </li>
                <li class="menu-item @if (Request::segment(1) == 'dashboard' && Request::segment(2) == 'form-magang') active @endif">
                  <a href="{{ route('dashboard.form-magang') }}" class="menu-link">
                    <div data-i18n="Under Maintenance"> Magang Mahasiswa</div>
                  </a>
                </li>
              </ul>
            </li>

           
            <li class="menu-item @if (Request::segment(1) == 'dashboard' && Request::segment(2) == 'kkn' || Request::segment(2) == 'form-kkn') active open @endif">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                <div data-i18n="Misc">Data KKN</div>
              </a>
              <ul class="menu-sub ">
                <li class="menu-item @if (Request::segment(1) == 'dashboard' && Request::segment(2) == 'kkn') active @endif">
                  <a href="{{ route('dashboard.kkn') }}" class="menu-link  ">
                    <div data-i18n="Error">KKN</div>
                  </a>
                </li>
                <li class="menu-item  @if (Request::segment(1) == 'dashboard' && Request::segment(2) == 'form-kkn') active @endif" >
                  <a href="{{ route('dashboard.form-kkn') }}" class="menu-link ">
                    <div data-i18n="Under Maintenance"> KKN Mahasiswa</div>
                  </a>
                </li>
              </ul>
            </li>




            <li class="menu-item @if (Request::segment(1) == 'dashboard' && Request::segment(2) == 'proposal') active @endif ">
              <a href="{{ route('dashboard.proposal') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Analytics">Data Proposal </div>
              </a>
            </li>

              <li class="menu-item @if (Request::segment(1) == 'dashboard' && Request::segment(2) == 'skripsi') active @endif ">
              <a href="{{ route('dashboard.skripsi') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Analytics">Data Skripsi </div>
              </a>
            </li>

          


              <li class="menu-item @if (Request::segment(1) == 'dashboard' && Request::segment(2) == 'pengumuman') active @endif">
              <a href="{{ route('dashboard.pengumuman') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-news"></i>
                <div data-i18n="Analytics">Data Pengumuman </div>
              </a>
            </li>

              <li class="menu-item ">
              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="menu-link">
                <i class="menu-icon tf-icons bx bx-door-open"></i>
                <div data-i18n="Analytics">Keluar </div>
              </a>
            </li>


                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>


          </ul>
        </aside>
        <!-- / Menu -->