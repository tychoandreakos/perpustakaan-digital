     <!-- NAVBAR
    ================================================== -->
     <nav class="navbar navbar-expand-lg navbar-light bg-white">
         <div class="container">

             <!-- Brand -->
             @guest
             <a class="navbar-brand" href="{{ route('landing') }}">
                 <img src="{{ asset('img/logo.svg') }}" class="navbar-brand-img" alt="...">
                 <h4 style="display: inline" class="font-weight-bold">STMIK Digital Library.</h4>
             </a>
             @else
             <a class="navbar-brand" href="{{ route('beranda') }}">
                <img src="{{ asset('img/logo.svg') }}" class="navbar-brand-img" alt="...">
                 <h4 style="display: inline" class="font-weight-bold">STMIK Digital Library.</h4>
             </a>
             @endguest
             <!-- Toggler -->
             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                 aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
             </button>

             <!-- Collapse -->
             <div class="collapse navbar-collapse" id="navbarCollapse">

                 <!-- Toggler -->
                 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                     aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                     <i class="fe fe-x"></i>
                 </button>

                 <!-- Navigation -->
                 <ul class="navbar-nav ml-auto">
                     <li class="nav-item">
                         @guest
                         <a href="{{ route('landing') }}" class="nav-link">
                             Beranda
                         </a>
                         @else
                         <a href="{{ route('beranda') }}" class="nav-link">
                             Beranda
                         </a>
                         @endguest
                     </li>
                     @guest
                     <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="{{ route('tamu') }}" aria-haspopup="true"
                             aria-expanded="false">
                             Buku Tamu
                         </a>
                     </li>
                     <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" id="navbarDocumentation" data-toggle="dropdown" href="#"
                             aria-haspopup="true" aria-expanded="false">
                             Pustakawan
                         </a>
                         <div class="dropdown-menu dropdown-menu-md" aria-labelledby="navbarDocumentation">
                             <div class="list-group list-group-flush">

                                 <a class="list-group-item" href="{{ route('home') }}">

                                     <!-- Icon -->
                                     <div class="icon icon-sm text-primary">
                                         <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"
                                             xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink">
                                             <!-- Generator: Sketch 52.2 (67145) - http://www.bohemiancoding.com/sketch -->
                                             <title>Stockholm-icons / Files / File</title>
                                             <desc>Created with Sketch.</desc>
                                             <g id="Stockholm-icons-/-Files-/-File" stroke="none" stroke-width="1"
                                                 fill="none" fill-rule="evenodd">
                                                 <polygon id="Shape" points="0 0 24 0 24 24 0 24"></polygon>
                                                 <path
                                                     d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z"
                                                     id="Combined-Shape" fill="#335EEA" opacity="0.3"></path>
                                                 <rect id="Rectangle" fill="#335EEA" x="6" y="11" width="9" height="2"
                                                     rx="1">
                                                 </rect>
                                                 <rect id="Rectangle-Copy" fill="#335EEA" x="6" y="15" width="5"
                                                     height="2" rx="1">
                                                 </rect>
                                             </g>
                                         </svg>
                                     </div>

                                     <!-- Content -->
                                     <div class="ml-4">

                                         <!-- Heading -->
                                         <h6 class="font-weight-bold text-uppercase text-primary mb-0">
                                             Masuk Pustakawan
                                         </h6>

                                         <!-- Text -->
                                         <p class="font-size-sm text-gray-700 mb-0">
                                             Halo pustakawan, silahkan masuk!   
                                         </p>

                                        </div>

                                 </a>
                             </div>
                         </div>
                     </li>
                     @else
                     <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="{{ route('tamu') }}" aria-haspopup="true"
                             aria-expanded="false">
                             Perpustakaan
                         </a>
                         {{-- @endguest --}}
                         <div class="dropdown-menu dropdown-menu-xl p-0" aria-labelledby="navbarLandings">
                             <div class="row no-gutters">
                                 <div class="col-12 col-lg-12">
                                     <div class="dropdown-img-left"
                                         style="background-image: url({{ asset('img/photos/photo-3.jpg') }});">

                                         <!-- Heading -->
                                         <h4 class="font-weight-bold text-white mb-0">
                                             Lihat Status Pinjam Buku ?
                                         </h4>

                                         <!-- Text -->
                                         <p class="font-size-sm text-white">
                                             Lihat Semua Transaksi Mengenai Peminjaman
                                         </p>

                                         <!-- Button -->
                                         <a href="{{ route('pinjaman') }}" class="btn btn-sm btn-white shadow-dark fonFt-size-sm">
                                             Lihat Semua Pinjaman
                                         </a>

                                     </div>
                                 </div>
                                 {{-- <div class="col-12 col-lg-6">
                                     <div class="dropdown-body">
                                         <div class="row no-gutters">
                                             <div class="col-6">

                                                 <!-- Heading -->
                                                 <h6 class="dropdown-header">
                                                     Services
                                                 </h6>

                                                 <!-- List -->
                                                 <a class="dropdown-item" href="coworking.html">
                                                     Coworking
                                                 </a>
                                                 <a class="dropdown-item" href="rental.html">
                                                     Rental
                                                 </a>
                                                 <a class="dropdown-item mb-5" href="job.html">
                                                     Job Listing
                                                 </a>

                                                 <!-- Heading -->
                                                 <h6 class="dropdown-header">
                                                     Apps
                                                 </h6>

                                                 <!-- List -->
                                                 <a class="dropdown-item" href="desktop-app.html">
                                                     Desktop
                                                 </a>
                                                 <a class="dropdown-item" href="mobile-app.html">
                                                     Mobile
                                                 </a>

                                             </div>
                                             <div class="col-6">

                                                 <!-- Heading -->
                                                 <h6 class="dropdown-header">
                                                     Web
                                                 </h6>

                                                 <!-- List -->
                                                 <a class="dropdown-item" href="index-2.html">
                                                     Basic
                                                 </a>
                                                 <a class="dropdown-item" href="enterprise.html">
                                                     Enterprise
                                                 </a>
                                                 <a class="dropdown-item" href="service.html">
                                                     Service
                                                 </a>
                                                 <a class="dropdown-item" href="cloud.html">
                                                     Cloud Hosting
                                                 </a>

                                             </div>
                                         </div> <!-- / .row -->
                                     </div>
                                 </div> --}}
                             </div> <!-- / .row -->
                         </div>
                     </li>
                     @endguest


                     @guest
                     @if (Route::has('register'))
                     <!-- Button -->
                     <a class="navbar-btn btn btn-sm btn-primary lift ml-auto" href="{{ route('login') }}">
                         Login
                     </a>
                     </a>
                     @endif
                     @else
                     <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" id="navbarAccount" data-toggle="dropdown" href="#"
                             aria-haspopup="true" aria-expanded="false">
                             Profile
                         </a>
                         <ul class="dropdown-menu" aria-labelledby="navbarAccount">
                             <li class="dropdown-item dropright">
                                 <a class="dropdown-link dropdown-toggle" data-toggle="dropdown" href="#">
                                     Edit Profile
                                 </a>
                                 <div class="dropdown-menu">
                                     <a class="dropdown-item" href="{{ route('profile.lengkapi') }}">
                                         Lengkapi Profil
                                     </a>
                                 </div>
                             </li>
                             {{-- <li class="dropdown-item dropright">
                                 <a class="dropdown-link dropdown-toggle" data-toggle="dropdown" href="#">
                                     Status
                                 </a>
                                 <div class="dropdown-menu">
                                     <a class="dropdown-item" href="signup-cover.html">
                                         Lihat Profil
                                     </a>
                                     <a class="dropdown-item" href="signup-cover.html">
                                         Ubah Password
                                     </a>
                                 </div>
                             </li> --}}
                         </ul>
                     </li>
                     <li class="nav-item dropdown">
                         <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                             data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                             {{ ucwords(Auth::user()->name) }} <span class="caret"></span>
                         </a>

                         <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                             <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                 {{ __('Logout') }}
                             </a>

                             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                 @csrf
                             </form>
                         </div>
                     </li>
                     @endguest

                 </ul>
             </div>

         </div>
     </nav>
