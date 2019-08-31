   <!-- SHAPE
    ================================================== -->
   <div class="position-relative">
       <div class="shape shape-bottom shape-fluid-x svg-shim text-light">
           <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor" />
           </svg>
       </div>
   </div>

   <!-- ARTICLES
          ================================================== -->
   <section class="pt-7 pt-md-10 bg-light">
       <div class="container">
           <div class="row align-items-center mb-5">
               <div class="col-12 col-md">

                   <!-- Heading -->
                   <h3 class="mb-0">
                       Berita Terbaru
                   </h3>

                   <!-- Text -->
                   <p class="mb-0 text-muted">
                       Here’s what we've been up to recently.
                   </p>

               </div>
               <div class="col-12 col-md-auto">

                   <!-- Button -->
                   <a href="{{ route('berita.semua') }}" class="btn btn-sm btn-outline-gray-300 d-none d-md-inline">
                       View all
                   </a>

               </div>
           </div> <!-- / .row -->
           <div class="row">
               @foreach ($berita as $item)
               <div class="col-12 col-md-6 col-lg-4 d-flex">

                   <!-- Card -->
                   <div class="card mb-6 mb-lg-0 shadow-light-lg lift lift-lg">

                       <!-- Image -->
                       <a class="card-img-top" href="{{ route('berita',$item->slug) }}">

                           <!-- Image -->
                           <img src="{{ url('storage/berita/'. $item->img) }}" alt="..." class="card-img-top">

                           <!-- Shape -->
                           <div class="position-relative">
                               <div class="shape shape-bottom shape-fluid-x svg-shim text-white">
                                   <svg viewBox="0 0 2880 480" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd" clip-rule="evenodd"
                                           d="M2160 0C1440 240 720 240 720 240H0V480H2880V0H2160Z"
                                           fill="currentColor" />
                                   </svg>
                               </div>
                           </div>

                       </a>

                       <!-- Body -->
                       <a class="card-body" href="{{ route('berita',$item->slug) }}">

                           <!-- Heading -->
                           <h3>
                               {{ $item->judul }}
                           </h3>

                           <!-- Text -->
                           <p style="padding: 0; margin: 0" class="mb-0 text-muted">
                               {{ substr(strip_tags($item->isi), 0, 85) }} ...
                           </p>

                       </a>

                       <!-- Meta -->
                       <a class="card-meta mt-auto" href="#!">

                           <!-- Divider -->
                           <hr class="card-meta-divider">

                           <!-- Avatar -->
                           <div class="mr-2">
                                <i class="text-muted fa fa-user" aria-hidden="true"></i>
                            </div>

                           <!-- Author -->
                           <h6 class="text-uppercase text-muted mr-2 mb-0">
                               {{ ucwords(substr($item->admin->name, 0, 7)) }} ....
                           </h6>

                           <!-- Date -->
                           <p class="h6 text-uppercase text-muted mb-0 ml-auto">
                               <time datetime="{{ $item->created_at }}">{{ $item->updated_at }}</time>
                           </p>

                       </a>

                   </div>

               </div>
               @endforeach
           </div> <!-- / .row -->
       </div> <!-- / .container -->
   </section>
