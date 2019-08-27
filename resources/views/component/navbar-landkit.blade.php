     <!-- NAVBAR
    ================================================== -->
     <nav class="navbar navbar-expand-lg navbar-light bg-white">
         <div class="container">

             <!-- Brand -->
             @guest
             <a class="navbar-brand" href="{{ route('landing') }}">
                 <img src="{{ asset('img/brand.svg') }}" class="navbar-brand-img" alt="...">
             </a>
             @else
             <a class="navbar-brand" href="{{ route('beranda') }}">
                 <img src="{{ asset('img/brand.svg') }}" class="navbar-brand-img" alt="...">
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
                     <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" id="navbarLandings" data-toggle="dropdown" href="#"
                             aria-haspopup="true" aria-expanded="false">
                             Landings
                         </a>
                         <div class="dropdown-menu dropdown-menu-xl p-0" aria-labelledby="navbarLandings">
                             <div class="row no-gutters">
                                 <div class="col-12 col-lg-6">
                                     <div class="dropdown-img-left"
                                         style="background-image: url({{ asset('img/photos/photo-3.jpg') }});">

                                         <!-- Heading -->
                                         <h4 class="font-weight-bold text-white mb-0">
                                             Want to see an overview?
                                         </h4>

                                         <!-- Text -->
                                         <p class="font-size-sm text-white">
                                             See all the pages at once.
                                         </p>

                                         <!-- Button -->
                                         <a href="overview.html" class="btn btn-sm btn-white shadow-dark fonFt-size-sm">
                                             View all pages
                                         </a>

                                     </div>
                                 </div>
                                 <div class="col-12 col-lg-6">
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
                                 </div>
                             </div> <!-- / .row -->
                         </div>
                     </li>
                     <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" id="navbarPages" data-toggle="dropdown" href="#"
                             aria-haspopup="true" aria-expanded="false">
                             Pages
                         </a>
                         <div class="dropdown-menu dropdown-menu-lg" aria-labelledby="navbarPages">
                             <div class="row no-gutters">
                                 <div class="col-6 col-lg-4">

                                     <!-- Heading -->
                                     <h6 class="dropdown-header">
                                         Career
                                     </h6>

                                     <!-- List -->
                                     <a class="dropdown-item" href="careers.html">
                                         Listing
                                     </a>
                                     <a class="dropdown-item mb-5" href="career-single.html">
                                         Opening
                                     </a>

                                     <!-- Heading -->
                                     <h6 class="dropdown-header">
                                         Company
                                     </h6>

                                     <!-- List -->
                                     <a class="dropdown-item" href="about.html">
                                         About
                                     </a>
                                     <a class="dropdown-item" href="pricing.html">
                                         Pricing
                                     </a>
                                     <a class="dropdown-item mb-5 mb-lg-0" href="terms-of-service.html">
                                         Terms
                                     </a>

                                 </div>
                                 <div class="col-6 col-lg-4">

                                     <!-- Heading -->
                                     <h6 class="dropdown-header">
                                         Help center
                                     </h6>

                                     <!-- List -->
                                     <a class="dropdown-item" href="help-center.html">
                                         Overview
                                     </a>
                                     <a class="dropdown-item mb-5" href="help-center-article.html">
                                         Article
                                     </a>

                                     <!-- Heading -->
                                     <h6 class="dropdown-header">
                                         Contact
                                     </h6>

                                     <!-- List -->
                                     <a class="dropdown-item" href="contact.html">
                                         Basic
                                     </a>
                                     <a class="dropdown-item" href="contact-alt.html">
                                         Cover
                                     </a>

                                 </div>
                                 <div class="col-6 col-lg-4">

                                     <!-- Heading -->
                                     <h6 class="dropdown-header">
                                         Blog
                                     </h6>

                                     <!-- List -->
                                     <a class="dropdown-item" href="blog.html">
                                         Rich View
                                     </a>
                                     <a class="dropdown-item" href="blog-post.html">
                                         Article
                                     </a>
                                     <a class="dropdown-item" href="blog-showcase.html">
                                         Showcase
                                     </a>
                                     <a class="dropdown-item" href="blog-search.html">
                                         Search
                                     </a>

                                 </div>
                             </div>
                         </div> <!-- / .row -->
                     </li>
                     @guest
                     <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" id="navbarDocumentation" data-toggle="dropdown" href="#"
                             aria-haspopup="true" aria-expanded="false">
                             Pustakawan
                         </a>
                         <div class="dropdown-menu dropdown-menu-md" aria-labelledby="navbarDocumentation">
                             <div class="list-group list-group-flush">
                                 <a class="list-group-item" href="docs/index.html">

                                     <!-- Icon -->
                                     <div class="icon icon-sm text-primary">
                                         <?xml version="1.0" encoding="UTF-8"?>
                                         <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"
                                             xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink">
                                             <!-- Generator: Sketch 52.2 (67145) - http://www.bohemiancoding.com/sketch -->
                                             <title>Stockholm-icons / General / Clipboard</title>
                                             <desc>Created with Sketch.</desc>
                                             <g id="Stockholm-icons-/-General-/-Clipboard" stroke="none"
                                                 stroke-width="1" fill="none" fill-rule="evenodd">
                                                 <rect id="bound" x="0" y="0" width="24" height="24"></rect>
                                                 <path
                                                     d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z"
                                                     id="Combined-Shape" fill="#335EEA" opacity="0.3"></path>
                                                 <path
                                                     d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z"
                                                     id="Combined-Shape" fill="#335EEA"></path>
                                                 <rect id="Rectangle-152" fill="#335EEA" opacity="0.3" x="7" y="10"
                                                     width="5" height="2" rx="1"></rect>
                                                 <rect id="Rectangle-152-Copy" fill="#335EEA" opacity="0.3" x="7" y="14"
                                                     width="9" height="2" rx="1"></rect>
                                             </g>
                                         </svg>
                                     </div>

                                     <!-- Content -->
                                     <div class="ml-4">

                                         <!-- Heading -->
                                         <h6 class="font-weight-bold text-uppercase text-primary mb-0">
                                             Documentation
                                         </h6>

                                         <!-- Text -->
                                         <p class="font-size-sm text-gray-700 mb-0">
                                             Customizing and building
                                         </p>

                                     </div>

                                 </a>
                                 <a class="list-group-item" href="docs/alerts.html">

                                     <!-- Icon -->
                                     <div class="icon icon-sm text-primary">
                                         <?xml version="1.0" encoding="UTF-8"?>
                                         <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"
                                             xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink">
                                             <!-- Generator: Sketch 52.2 (67145) - http://www.bohemiancoding.com/sketch -->
                                             <title>Stockholm-icons / Layout / Layout-4-blocks</title>
                                             <desc>Created with Sketch.</desc>
                                             <g id="Stockholm-icons-/-Layout-/-Layout-4-blocks" stroke="none"
                                                 stroke-width="1" fill="none" fill-rule="evenodd">
                                                 <rect id="bound" x="0" y="0" width="24" height="24"></rect>
                                                 <rect id="Rectangle-7" fill="#335EEA" x="4" y="4" width="7" height="7"
                                                     rx="1.5"></rect>
                                                 <path
                                                     d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
                                                     id="Combined-Shape" fill="#335EEA" opacity="0.3"></path>
                                             </g>
                                         </svg>
                                     </div>

                                     <!-- Content -->
                                     <div class="ml-4">

                                         <!-- Heading -->
                                         <h6 class="font-weight-bold text-uppercase text-primary mb-0">
                                             Components
                                         </h6>

                                         <!-- Text -->
                                         <p class="font-size-sm text-gray-700 mb-0">
                                             Full list of components
                                         </p>

                                     </div>

                                 </a>
                                 <a class="list-group-item" href="{{ route('home') }}">

                                     <!-- Icon -->
                                     <div class="icon icon-sm text-primary">
                                         <?xml version="1.0" encoding="UTF-8"?>
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
                                                     rx="1"></rect>
                                                 <rect id="Rectangle-Copy" fill="#335EEA" x="6" y="15" width="5"
                                                     height="2" rx="1"></rect>
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
                                             Keep track of changes
                                         </p>

                                     </div>

                                     <!-- Badge -->
                                     <span class="badge badge-pill badge-primary-soft ml-auto">
                                         1.1.0
                                     </span>

                                 </a>
                             </div>
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
                                     <a class="dropdown-item" href="signin-cover.html">
                                         Update Foto
                                     </a>
                                     <a class="dropdown-item" href="signin-illustration.html">
                                         Lengkapi Profil
                                     </a>
                                     <a class="dropdown-item" href="signin.html">
                                         Lihat Profil
                                     </a>
                                 </div>
                             </li>
                             <li class="dropdown-item dropright">
                                 <a class="dropdown-link dropdown-toggle" data-toggle="dropdown" href="#">
                                     Status
                                 </a>
                                 <div class="dropdown-menu">
                                     <a class="dropdown-item" href="signup-cover.html">
                                         Status Akun
                                     </a>
                                     <a class="dropdown-item" href="signup-cover.html">
                                         Ubah Password
                                     </a>
                                 </div>
                             </li>
                             <li class="dropdown-item dropright">
                                 <a class="dropdown-link dropdown-toggle" data-toggle="dropdown" href="#">
                                     Password Reset
                                 </a>
                                 <div class="dropdown-menu">
                                     <a class="dropdown-item" href="password-reset-cover.html">
                                         Side Cover
                                     </a>
                                     <a class="dropdown-item" href="password-reset-illustration.html">
                                         Illustration
                                     </a>
                                     <a class="dropdown-item" href="password-reset.html">
                                         Basic
                                     </a>
                                 </div>
                             </li>
                             <li class="dropdown-item dropright">
                                 <a class="dropdown-link dropdown-toggle" data-toggle="dropdown" href="#">
                                     Error
                                 </a>
                                 <div class="dropdown-menu">
                                     <a class="dropdown-item" href="error-cover.html">
                                         Side Cover
                                     </a>
                                     <a class="dropdown-item" href="error-illustration.html">
                                         Illustration
                                     </a>
                                     <a class="dropdown-item" href="error.html">
                                         Basic
                                     </a>
                                 </div>
                             </li>
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
