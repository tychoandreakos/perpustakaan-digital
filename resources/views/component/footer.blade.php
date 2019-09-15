 <!-- FOOTER
    ================================================== -->
 <footer class="py-8 py-md-11 bg-gray-200">
     <div class="container">
         <div class="row">
             <div class="col-12 col-md-4 col-lg-4">

                 <!-- Brand -->
                 <img src="{{ asset('img/logo.svg') }}" class="navbar-brand-img" alt="...">
                 <h4 style="display: inline" class="font-weight-bold text-primary">Digital Library.</h4>

                 <!-- Text -->
                 <p class="font-size-sm mt-2 text-gray-700 mb-2">
                  Email: {{ ucwords($info->email) }}
                  <br>
                  Telp:  {{ $info->no_telp }}
                  <br>
                  Pustakawan: {{ ucwords($info->pustakawan) }}
                </p>

                 <!-- Social -->
                 <ul class="list-unstyled list-inline list-social mb-6 mb-md-0">
                     <li class="list-inline-item list-social-item mr-3">
                         <a href="#!" class="text-decoration-none">
                             <img src="{{ asset('img/icons/social/instagram.svg') }}" class="list-social-icon"
                                 alt="...">
                         </a>
                     </li>
                     <li class="list-inline-item list-social-item mr-3">
                         <a href="#!" class="text-decoration-none">
                             <img src="{{ asset('img/icons/social/facebook.svg') }}" class="list-social-icon" alt="...">
                         </a>
                     </li>
                     <li class="list-inline-item list-social-item mr-3">
                         <a href="#!" class="text-decoration-none">
                             <img src="{{ asset('img/icons/social/twitter.svg') }}" class="list-social-icon" alt="...">
                         </a>
                     </li>
                 </ul>

             </div>
             <div class="col-6 col-md-4 col-lg-3">

                 <!-- Heading -->
                 <h6 class="font-weight-bold text-uppercase text-gray-700">
                     Jadwal Perpustakaan
                 </h6>

                 <!-- List -->
                 <ul class="list-unstyled text-muted mb-6 mb-md-8 mb-lg-0">
                     <li class="mb-3">
                         {{ ucwords($info->regular) }} <br>
                         <span class="font-size-sm">{{ $info->waktu_regular }}</span>
                     </li>
                     <li class="mb-3">
                      {{ ucwords($info->weekend) }} <br>
                      <span class="font-size-sm">{{ $info->waktu_weekend }}</span>
                     </li>
                     <li class="mb-3">
                      Jam Istirahat <br>
                      <span class="font-size-sm">{{ $info->waktu_istirahat }}</span>
                     </li>
                 </ul>

             </div>
             <div class="col-6 col-md-4 col-lg-5">

                 <!-- Heading -->
                 <h6 class="font-weight-bold text-uppercase text-gray-700">
                     Alamat
                 </h6>

                 <!-- List -->
                 <ul class="list-unstyled text-muted mb-6 mb-md-8 mb-lg-0">
                     <li class="mb-3">
                         {{ ucwords($info->alamat) }}
                     </li>
                 </ul>

             </div>
         </div> <!-- / .row -->
     </div> <!-- / .container -->
 </footer>
