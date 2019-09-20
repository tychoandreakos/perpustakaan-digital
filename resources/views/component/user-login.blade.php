 <!-- WELCOME
    ================================================== -->
 <section data-jarallax data-speed=".8" class="py-10 py-md-14 overlay overlay-black overlay-60 bg-cover jarallax"
     style="background-image: url({{ asset('img/covers/cover-13.jpg') }});">
     <div class="container">
         <div class="row justify-content-center">
             <div class="col-12 col-md-10 col-lg-7 text-center">

                 <!-- Heading -->
                 <h1 class="display-2 font-weight-bold text-white">
                     Halo, {{ ucwords(Auth::user()->name) }}
                 </h1>

                 <!-- Text -->
                 <p class="lead mb-0 text-white-75">
                     Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquid, enim? Natus, voluptatum? Illum,
                     minus? Repellat.
                 </p>

             </div>
         </div> <!-- / .row -->
     </div> <!-- / .container -->
 </section>

 <!-- SHAPE
      ================================================== -->
 <div class="position-relative">
     <div class="shape shape-bottom shape-fluid-x svg-shim text-light">
         <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
             <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor" />
         </svg>
     </div>
 </div>

 <!-- SEARCH
      ================================================== -->
 <section class="mt-n6">
     <div class="container">
         <div class="row">
             <div class="col-12">

                 <!-- Form -->
                 <form method="get" action="{{ route('cari') }}" class="rounded shadow mb-4">
                     <div class="input-group input-group-lg">

                         <!-- Prepend -->
                         <div class="input-group-prepend">
                             <span class="input-group-text border-0 pr-1">
                                 <i class="fe fe-search"></i>
                             </span>
                         </div>


                         <!-- Input -->
                         <input type="text" required name="cari"
                             class="@error('cari') is-invalid @enderror form-control border-0 px-1"
                             aria-label="Masukkan satu atau lebih kata kunci dari judul, pengarang, atau subyek "
                             placeholder="Masukkan satu atau lebih kata kunci dari judul, pengarang, atau subyek ">

                         <!-- Append -->
                         <div class="input-group-append">
                             <span class="input-group-text border-0 py-0 pl-1 pr-3">
                                 <button type="submit" class="btn btn-sm btn-primary">
                                     Search
                                     </a>
                             </span>
                         </div>

                     </div>

                     @error('cari')
                     <div class="alert alert-danger">Minimal dibutuhkan 3 karakter untuk memulai pencarian</div>
                     @enderror
                 </form>

                 <!-- Badges -->
                 <div class="row align-items-center">
                     <div class="col-auto">

                         <!-- Heading -->
                         <h6 class="font-weight-bold text-uppercase text-muted mb-0">
                             Tags:
                         </h6>

                     </div>
                     <div class="col ml-n5">

                         <!-- Badges -->
                         @if(!empty($randomTags))
                         @foreach ($randomTags as $item)
                         <a class="badge badge-pill badge-secondary-soft"
                             href="{{ route('tags', $item->jenis_topik) }}">
                             <span class="h6 text-uppercase">{{ ucwords($item->jenis_topik) }}</span>
                         </a>
                         @endforeach
                         @else
                         Belum ada data!
                         @endif

                     </div>
                 </div> <!-- / .row -->

             </div>
         </div> <!-- / .row -->
     </div>
 </section>

 <!-- ARTICLES
      ================================================== -->
 <section class="pt-7 pt-md-10">
     <div class="container">
         <div class="row align-items-center mb-5">
             <div class="col-12 col-md">

                 <!-- Heading -->
                 <h3 class="mb-0">
                     Mungkin anda suka?
                 </h3>

                 <!-- Text -->
                 <p class="mb-0 text-muted">
                     Here’s what maybe you like.
                 </p>

             </div>
         </div> <!-- / .row -->
         <div class="row">
             <div class="col-12">

                 <!-- Card -->
                 <div class="card card-row shadow-light-lg mb-6 lift lift-lg">
                     @isset($random)
                     <div class="row no-gutters">
                         <div class="col-12">

                             <!-- Badge -->

                             <span class="badge badge-pill badge-light badge-float badge-float-inside">
                                 <span class="h6 text-uppercase">{{ ucwords($random->topik->jenis_topik) }}</span>
                             </span>

                         </div>
                         <a class="col-12 col-md-6 order-md-2 bg-cover card-img-right"
                             href="{{ route('buku', $random->slug) }}">

                             <div style="display: flex; background: {{ isset($random->topik->warna) ? $random->topik->warna : '#335eea' }}; width: 100%; height: 100%"
                                 class="card-img-top">
                                 <div style="background:url('{{  url('storage/resize/'.$random->gambar_sampul) }}') center no-repeat;background-size: cover; width: 150px;height: 200px;margin: auto; display:flex; align-self: center
                                      box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.25);"></div>
                             </div>

                             <!-- Shape -->
                             <div class="shape shape-left shape-fluid-y svg-shim text-white d-none d-md-block">
                                 <svg viewBox="0 0 112 690" fill="none" xmlns="http://www.w3.org/2000/svg">
                                     <path d="M2.14577e-06 0H62.7586V172C38.6207 384 112 517 112 517V690H2.14577e-06V0Z"
                                         fill="currentColor" />
                                 </svg>
                             </div>

                         </a>
                         <div class="col-12 col-md-6 order-md-1">

                             <!-- Body -->
                             <a class="card-body" href="{{ route('buku', $random->slug) }}">

                                 <!-- Heading -->
                                 <h3>
                                     {{ $random->judul }}
                                 </h3>

                                 <span class="badge badge-primary">ISBN: {{ $random->isbn_isnn }}</span>
                                 <span class="badge badge-secondary">Tahun Terbit: {{ $random->tahun_terbit }}</span>
                                 <span class="badge badge-success">Penerbit:
                                     {{ ucwords($random->buku_transaksi[0]->penerbit->nama_penerbit) }}</span>
                                 @isset($random->topik->jenis_topik)
                                 @endisset
                                 <span class="badge badge-warning">Bahasa:
                                     {{ ucwords($random->buku_transaksi[0]->bahasa->jenis_bahasa) }}</span>
                                 <span class="badge badge-info">Deskripsi Fisik: {{ $random->deskripsi_fisik }}</span>
                                 <span class="badge badge-light">Lokasi Rak:
                                     {{ $random->bibliobigrafi[0]->lokasi_rak->kode_lokasi }} -
                                     {{ ucwords($random->bibliobigrafi[0]->lokasi_rak->nama_lokasi) }}</span>
                                 <span class="badge badge-dark">No Panggil:
                                     {{ $random->bibliobigrafi[0]->no_panggil }}</span>


                                 <!-- Text -->
                                 <div class="mb-0 text-muted mt-5">
                                     {{ substr(strip_tags($random->catatan), 0, 250) . ' ....' }}
                                 </div>

                             </a>

                             <!-- Meta -->
                             <a class="card-meta" href="#!">

                                 <!-- Divider -->
                                 <hr class="card-meta-divider">

                                 <!-- Author -->
                                 <h6 class="text-uppercase text-muted mr-2 mb-0">
                                        @php
                                        $i = 0;
                                        $tr = [];   
                                       @endphp
                                       @foreach ($random->buku_transaksi as $p)
                                       @php
                                       $tr[$i++] = $p->pengarang->nama_pengarang;
                                       // array_push($tr, );
                                    //    print_r(join(', ', $tr));
                                       @endphp
                                       @endforeach

                                       @php  print_r(join(', ', $tr)) @endphp
                                 </h6>

                                 <!-- Date -->
                                 @if($random->pdf)
                                 <p class="h6 ok text-uppercase text-muted mb-0 ml-auto">
                                     <button onclick="location.href='{{ route('baca', $random->slug) }}'"
                                         data-toggle="tooltip" data-placement="top" title="Tooltip on top"
                                         class="btn btn-danger-soft btn-rounded-circle btn-sm">
                                         <i class="fe fe-eye"></i>
                                     </button>
                                 </p>
                                 @endif

                             </a>

                         </div>

                     </div> <!-- / .row -->
                     @else
                     <h4 class="text-center">belum ada data!</h4>
                     @endisset
                 </div>

             </div>
         </div> <!-- / .row -->
     </div> <!-- / .container -->
 </section>

 @include('component.buku-terbaru')

 <!-- ARTICLES
      ================================================== -->
 <section class="pt-7 pt-md-10">
     <div class="container">
         <div class="row align-items-center mb-5">
             <div class="col-12 col-md">

                 <!-- Heading -->
                 <h3 class="mb-0">
                     Berita Terbaru Perpustakaan
                 </h3>

                 <!-- Text -->
                 <p class="mb-0 text-muted">
                    Here’s what latest news of library.
                 </p>

             </div>
             <div class="col-12 col-md-auto">

                 <!-- Button -->
                 <a href="{{ route('berita.semua') }}" class="btn btn-sm btn-outline-gray-300 d-none d-md-inline">
                     Lihat Semua
                 </a>

             </div>
         </div> <!-- / .row -->
         @if(!empty($berita))
         <div class="row">
             <div class="col-12">

                 <!-- Card -->
                 <div class="card card-row shadow-light-lg mb-6">
                     <div class="row no-gutters">
                         <div class="col-12 col-md-6">

                             <!-- Slider -->
                             <div class="card-img-slider"
                                 data-flickity='{"fade": true, "imagesLoaded": true, "pageDots": false, "prevNextButtons": false, "asNavFor": "#blogSlider", "draggable": false}'>

                                 @foreach ($berita as $item)
                                 <a class="card-img-left bg-cover"
                                     style="background-image: url({{ url('storage/berita/'.$item->img) }});"
                                     href="{{ route('berita', $item->slug) }}">

                                     <!-- Image (placeholder) -->
                                     <img src="{{ url('storage/resize/'.$item->img) }}" alt="..."
                                         class="img-fluid d-md-none invisible">

                                 </a>
                                 @endforeach
                             </div>

                             <!-- Shape -->
                             <div class="shape shape-right shape-fluid-y svg-shim text-white d-none d-md-block">
                                 <svg viewBox="0 0 112 690" fill="none" xmlns="http://www.w3.org/2000/svg">
                                     <path d="M116 0H51V172C76 384 0 517 0 517V690H116V0Z" fill="currentColor" />
                                 </svg>
                             </div>

                         </div>

                         <div class="col-12 col-md-6 position-static">

                             <!-- Slider -->
                             <div class="position-static"
                                 data-flickity='{"wrapAround": true, "pageDots": false, "imagesLoaded": true, "adaptiveHeight": true}'
                                 id="blogSlider">

                                 @foreach ($berita as $item)
                                 <div class="w-100">

                                     <!-- Body -->
                                     <div class="card-body">
                                         <blockquote class="blockquote text-center mb-0">

                                             <!-- Brand -->
                                             <div class="row justify-content-center mb-5 mb-md-7">
                                                 <a href="{{ route('berita', $item->slug) }}">
                                                     <h3>{{ substr($item->judul, 0, 125) }}</h3>
                                                 </a>
                                             </div> <!-- / .row -->

                                             <!-- Text -->
                                             <p class="mb-5 mb-md-7">
                                                 {!! substr($item->isi, 0, 150) !!} ...
                                             </p>

                                             <!-- Footer -->
                                             <footer class="blockquote-footer">
                                                 <span
                                                     class="h6 text-uppercase">{{ ucwords($item->admin->name) }}</span>
                                             </footer>

                                         </blockquote>
                                     </div>

                                 </div>
                                 @endforeach


                             </div>

                         </div>
                     </div> <!-- / .row -->
                 </div>

             </div>
         </div> <!-- / .row -->
         @else
         <h4 class="text-center">Belum ada data!</h4>
         @endif
     </div> <!-- / .container -->
 </section>

 <!-- ARTICLES
      ================================================== -->
 <section class="pt-7 pt-md-10">
     <div class="container">
         <div class="row">
             <div class="col-12">

                 <!-- Heading -->
                 <h3 class="mb-0">
                     Popular 30 Hari Terakhir
                 </h3>

                 <!-- Text -->
                 <p class="mb-5 text-muted">
                     Here’s what’s big in the past month!
                 </p>

             </div>
         </div> <!-- / .row -->
         @if(empty($popular30))
         <div class="row">
             @foreach ($popular30 as $item)
             <div class="col-12 col-md-6 d-flex">

                 <!-- Card -->
                 <div class="card mb-6 shadow-light-lg lift lift-lg">

                     <!-- Image -->
                     <a class="card-img-top" href="{{ route('buku', $item->slug) }}">

                         <!-- Image -->
                         <div style="display: flex; background: {{ isset($item->topik->warna) ?$item->topik->warna : '#335eea' }}; width: 100%; height: 250px"
                             class="card-img-top">
                             <div style="background:url('{{  url('storage/cover/'.$item->gambar_sampul) }}') center no-repeat;background-size: cover; width: 115px;
                                   height: 160px;margin: auto; display:flex; align-self: center
                               box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.25);"></div>
                         </div>

                         <!-- Shape -->
                         <div class="position-relative">
                             <div class="shape shape-bottom shape-fluid-x svg-shim text-white">
                                 <svg viewBox="0 0 2880 480" fill="none" xmlns="http://www.w3.org/2000/svg">
                                     <path fill-rule="evenodd" clip-rule="evenodd"
                                         d="M2160 0C1440 240 720 240 720 240H0V480H2880V0H2160Z" fill="currentColor" />
                                 </svg>
                             </div>
                         </div>

                     </a>

                     <!-- Body -->
                     <a class="card-body" href="{{ route('buku', $item->slug) }}">

                         <!-- Heading -->
                         <h3>
                             {{ $item->judul }}
                         </h3>

                         <!-- badge-->
                         <span class="badge badge-primary">{{ $item->isbn_isnn }}</span>
                         <span class="badge badge-secondary">{{ $item->tahun_terbit }}</span>
                         <span
                             class="badge badge-success">{{ ucwords($item->buku_transaksi[0]->penerbit->nama_penerbit) }}</span>
                         @isset($item->topik->jenis_topik)
                         <span class="badge badge-danger">{{ ucwords($item->topik->jenis_topik) }}</span>
                         @endisset
                         <span
                             class="badge badge-warning">{{ ucwords($item->buku_transaksi[0]->bahasa->jenis_bahasa) }}</span>
                         <span class="badge badge-info">{{ $item->deskripsi_fisik }}</span>
                         <span class="badge badge-light"> {{ $item->bibliobigrafi[0]->lokasi_rak->kode_lokasi }} -
                             {{ ucwords($item->bibliobigrafi[0]->lokasi_rak->nama_lokasi) }}</span>
                         <span class="badge badge-dark">{{ $item->bibliobigrafi[0]->no_panggil }}</span>

                         <div class="mb-0 text-muted mt-4">
                             {!! isset($item->catatan) ? substr($item->catatan, 0, 150) .' ...' : 'Belum ada data' !!}
                         </div>

                     </a>

                     <!-- Meta -->
                     <a class="card-meta mt-auto" href="#!">

                         <!-- Divider -->
                         <hr class="card-meta-divider">

                         <!-- Author -->
                         <h6 class="text-uppercase text-muted mr-2 mb-0">
                             @foreach ($item->buku_transaksi as $p)
                             {{ $p->pengarang->nama_pengarang }}
                             @endforeach
                         </h6>

                         @if($item->pdf)
                         <!-- Date -->
                         <p class="h6 text-uppercase text-muted mb-0 ml-auto">
                             <button onclick="location.href='{{ route('baca', $item->slug) }}'" data-toggle="tooltip"
                                 data-placement="top" title="Baca Buku"
                                 class="btn btn-danger-soft btn-rounded-circle btn-sm">
                                 <i class="fe fe-eye"></i>
                             </button>
                         </p>
                         @endif

                     </a>

                 </div>

             </div>
             @endforeach


         </div>
         @else
         <h4 class="text-center">Belum ada data!</h4>
         @endif
     </div>
     </div> <!-- / .row -->
     </div> <!-- / .container -->
 </section>

 @if (empty($popular))
 @include('component.popular-mini')
 @endif

 <!-- MORE
      ================================================== -->
 <section class="py-7 py-md-10">
     {{-- <div class="container">
         <div class="row justify-content-center">
             <div class="col-12 col-md-9 col-lg-8 col-xl-7">

                 <!-- Button -->
                 <a href="#!" class="btn btn-block btn-outline-gray-300 d-flex align-items-center">
                     <span class="mx-auto">Load more</span> <i class="fe fe-arrow-right"></i>
                 </a>

             </div>
         </div> <!-- / .row -->
     </div> <!-- / .container --> --}}
 </section>

 <!-- SHAPE
      ================================================== -->
 <div class="position-relative">
     <div class="shape shape-bottom shape-fluid-x svg-shim text-gray-200">
         <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
             <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor" />
         </svg>
     </div>
 </div>

 <!-- CTA
      ================================================== -->
 {{-- <section class="pt-6 pt-md-8 bg-gray-200">
     <div class="container pb-6 pb-md-8 border-bottom border-gray-300">
         <div class="row align-items-center">
             <div class="col-12 col-md">

                 <!-- Heading -->
                 <h3 class="mb-1 font-weight-bold">
                     Get our stories delivered
                 </h3>

                 <!-- Text -->
                 <p class="font-size-lg text-muted mb-6 mb-md-0">
                     From us to your inbox weekly.
                 </p>

             </div>
             <div class="col-12 col-md-5">

                 <!-- Form -->
                 <form>
                     <div class="row">
                         <div class="col">

                             <!-- Input -->
                             <input type="email" class="form-control" placeholder="Enter your email">

                         </div>
                         <div class="col-auto ml-n5">

                             <!-- Button -->
                             <button class="btn btn-primary" type="submit">
                                 Subscribe
                             </button>

                         </div>
                     </div> <!-- / .row -->
                 </form>

             </div>
         </div> <!-- / .row -->
     </div> <!-- / .container -->
 </section> --}}
