<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
    <title>@yield('title')</title>
    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon" href="{{asset('sbadmin/assets/img/favicon/favicon.ico')}}" />
    @yield('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{asset('sbadmin/assets/vendor/fonts/boxicons.css')}}" />
    <link rel="stylesheet" href="{{asset('sbadmin/assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('sbadmin/assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('sbadmin/assets/css/demo.css')}}" />
    <link rel="stylesheet" href="{{asset('sbadmin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{asset('sbadmin//assets/vendor/libs/apex-charts/apex-charts.css')}}" />
    <script src="{{asset('sbadmin/assets/vendor/js/helpers.js')}}"></script>
    <script src="{{asset('sbadmin/assets/js/config.js')}}"></script>
  </head>

  <body>
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
              <span class="app-brand-text demo menu-text fw-bolder ms-2">Perpustakaan</span>
            </a>
            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>
          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            @if (Auth::user())
            @if (Auth::user()->role_id == 1)
            <li class="menu-item @if (request()->route()->uri() == 'dashboard') active @endif">
              <a href="/dashboard" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Category</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item @if (request()->route()->uri() == 'category') active @endif">
                  <a href="/category" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">List Category</div>
                  </a>
                </li>
                <li class="menu-item @if (request()->route()->uri() == 'category-tambah') active @endif">
                  <a href="/category-tambah" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Tambah Category</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-book"></i>
                <div data-i18n="Layouts">Buku</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item @if (request()->route()->uri() == 'buku') active @endif">
                  <a href="/buku" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-book"></i>
                    <div data-i18n="Analytics">List Buku</div>
                  </a>
                </li>
                <li class="menu-item @if (request()->route()->uri() == 'buku-tambah') active @endif">
                  <a href="/buku-tambah" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-book-add"></i>
                    <div data-i18n="Analytics">Tambah Buku</div>
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Layouts">Users</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item @if (request()->route()->uri() == 'user') active @endif">
                  <a href="/user" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-book"></i>
                    <div data-i18n="Analytics">List user</div>
                  </a>
                </li>
                <li class="menu-item @if (request()->route()->uri() == 'user-tambah') active @endif">
                  <a href="/user-tambah" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-book"></i>
                    <div data-i18n="Analytics">Tambah user</div>
                  </a>
                </li>
              </ul>
              <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons bx bx-book"></i>
                  <div data-i18n="Layouts">Peminjaman</div>
                </a>
              <ul class="menu-sub">
                <li class="menu-item @if (request()->route()->uri() == 'list-pengajuan') active @endif">
                  <a href="/list-pengajuan" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-book"></i>
                    <div data-i18n="Analytics">List Pengajuan</div>
                  </a>
                </li>
                <li class="menu-item @if (request()->route()->uri() == 'tambah-pinjaman') active @endif">
                  <a href="/tambah-pinjaman" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-book"></i>
                    <div data-i18n="Analytics">Tambah </div>
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-item @if (request()->route()->uri() == 'kembalikan-buku') active @endif">
              <a href="/kembalikan-buku" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Kembalikan Buku</div>
              </a>
            </li>
            <li class="menu-item @if (request()->route()->uri() == 'laporan-peminjaman') active @endif">
              <a href="/laporan-peminjaman" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Laporan Peminjaman</div>
              </a>
            </li>

            
            @elseif (Auth::user()->role_id == 2)
            <li class="menu-item @if (request()->route()->uri() == 'dashboard') active @endif">
              <a href="/dashboard" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-category"></i>
                <div data-i18n="Layouts">Category</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item @if (request()->route()->uri() == 'category') active @endif">
                  <a href="/category" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">List Category</div>
                  </a>
                </li>
                <li class="menu-item @if (request()->route()->uri() == 'category-tambah') active @endif">
                  <a href="/category-tambah" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Tambah Category</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-book"></i>
                <div data-i18n="Layouts">Buku</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item @if (request()->route()->uri() == 'buku') active @endif">
                  <a href="/buku" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-book"></i>
                    <div data-i18n="Analytics">List Buku</div>
                  </a>
                </li>
                <li class="menu-item @if (request()->route()->uri() == 'buku-tambah') active @endif">
                  <a href="/buku-tambah" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-book-add"></i>
                    <div data-i18n="Analytics">Tambah Buku</div>
                  </a>
                </li>
              </ul>
            </li>

            
              <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons bx bx-book"></i>
                  <div data-i18n="Layouts">Peminjaman</div>
                </a>
              <ul class="menu-sub">
                <li class="menu-item @if (request()->route()->uri() == 'list-pengajuan') active @endif">
                  <a href="/list-pengajuan" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-book"></i>
                    <div data-i18n="Analytics">List Pengajuan</div>
                  </a>
                </li>
                <li class="menu-item @if (request()->route()->uri() == 'user-tambah') active @endif">
                  <a href="/tambah-pinjaman" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-book"></i>
                    <div data-i18n="Analytics">Tambah </div>
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-item @if (request()->route()->uri() == 'kembalikan-buku') active @endif">
              <a href="/kembalikan-buku" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Kembalikan Buku</div>
              </a>
            </li>
            <li class="menu-item @if (request()->route()->uri() == 'laporan-peminjaman') active @endif">
              <a href="/laporan-peminjaman" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Laporan Peminjaman</div>
              </a>
            </li>

            @elseif (Auth::user()->role_id == 3)
            <li class="menu-item @if (request()->route()->uri() == 'home' ) active @endif">
              <a href="/home" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Home</div>
              </a>
            </li>
            <li class="menu-item @if (request()->route()->uri() == 'daftar-pinjam') active @endif">
              <a href="/daftar-pinjam" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Daftar Pinjamku</div>
              </a>
            </li>
            <li class="menu-item @if (request()->route()->uri() == 'koleksi') active @endif">
              <a href="/koleksi" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Koleksiku</div>
              </a>
            </li>
            @endif
            @else
            <li class="menu-item active">
              <a href="/login" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Login</div>
              </a>
            </li>
            @endif

            <!-- Layouts -->
            {{-- <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Layouts</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="layouts-without-menu.html" class="menu-link">
                    <div data-i18n="Without menu">Without menu</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-without-navbar.html" class="menu-link">
                    <div data-i18n="Without navbar">Without navbar</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-container.html" class="menu-link">
                    <div data-i18n="Container">Container</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-fluid.html" class="menu-link">
                    <div data-i18n="Fluid">Fluid</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-blank.html" class="menu-link">
                    <div data-i18n="Blank">Blank</div>
                  </a>
                </li>
              </ul>
            </li> --}}

            
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              @yield('search')
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                
                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      
                      @if (Auth::user())
                      <img src="
                      @if (Auth::user()->foto)
                      {{asset('storage/profile/'. Auth::user()->foto)}}
                      @else
                      {{asset('sbadmin/assets/img/avatars/1.png')}}
                      @endif
                      " class="w-px-40 h-auto rounded-circle"/>
                      @else
                      <img src="{{asset('sbadmin/assets/img/avatars/1.png')}}" alt=""  class="w-px-40 h-auto rounded-circle">
                      @endif
                      
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              @if (Auth::user())
                      <img src="
                      @if (Auth::user()->foto)
                      {{asset('storage/profile/'. Auth::user()->foto)}}
                      @else
                      {{asset('sbadmin/assets/img/avatars/1.png')}}
                      @endif
                      " class="w-px-40 h-auto rounded-circle"/>
                      @else
                      <img src="{{asset('sbadmin/assets/img/avatars/1.png')}}" alt=""  class="w-px-40 h-auto rounded-circle">
                      @endif
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            @if (Auth::user())
                            <span class="fw-semibold d-block">{{ Auth::user()->username }} </span>
                            
                            @if (Auth::user()->role_id == 1)
                            <small class="text-muted">Admin</small>
                            @elseif (Auth::user()->role_id == 2)
                            <small class="text-muted">Petugas</small>
                            @elseif (Auth::user()->role_id == 3)
                            <small class="text-muted">Peminjam</small>
                            @endif
                            @else
                            <span class="fw-semibold d-block">Guest Account</span>
                            <small>Guest</small>
                            @endif
                          </div>
                        </div>
                      </a>
                    </li>
                    
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    @if (Auth::user())
                    @if (Auth::user()->username)
                    <li>
                      <a class="dropdown-item" href="/profile">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">Profile</span>
                      </a>
                    </li>

                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="/logout">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                    @endif
                    @else
                    <li>
                      <a class="dropdown-item" href="/login">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">Login</span>
                      </a>
                    </li>
                    @endif

                    
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container mt-4">@yield('content')</div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made with ❤️ by
                  <a href="/home" target="_blank" class="footer-link fw-bolder">Ahmad sunhadi kamil</a>
                </div>
                
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    @yield('scripts')
    <script src="{{asset('jquery.js')}}"></script>
    <script src="{{asset('sbadmin/assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{asset('sbadmin/assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{asset('sbadmin/assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{asset('sbadmin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    
    <script src="{{asset('sbadmin/assets/vendor/js/menu.js')}}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{asset('sbadmin/assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>

    <!-- Main JS -->
    <script src="{{asset('sbadmin/assets/js/main.js')}}"></script>

    <!-- Page JS -->
    <script src="{{asset('sbadmin/assets/js/dashboards-analytics.js')}}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
