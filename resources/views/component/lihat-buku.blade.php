 <!-- CONTENT
    ================================================== -->
 <section class="pt-8 pt-md-11">
     <div class="container">
         <div class="row align-items-center">
             <div class="col-12 col-md">

                 <!-- Link -->
                 <a href="{{ url()->previous() }}" class="font-weight-bold font-size-sm text-decoration-none mb-3">
                     <i class="fe fe-arrow-left mr-3"></i> Kembali
                 </a>



                 <!-- Heading -->
                 <h1 class="display-4 mb-2">
                     {{ ucwords($result->judul) }}
                 </h1>

                 <!-- Text -->
                 <p class="font-size-lg text-gray-700 mb-5 mb-md-0">
                     @foreach ($result->buku_transaksi as $p)
                     {{ ucwords($p->pengarang->nama_pengarang) }},
                     @endforeach
                 </p>

             </div>
             <div class="col-auto">
                 <!-- Buttons -->
                 @if ($total >= $anggota[0]->tipe_anggota->jumlah_pinjaman)
                 @else
                 <app-button-pinjam judul="{{ $result->judul }}" style="display: inline-block" class="mr-1"
                     route="{{ route('pinjam', $result->slug) }}"></app-button-pinjam>
                 @endif

                 @isset($result->pdf)
                 <a href="{{ route('baca', $result->slug) }}" class="btn btn-primary">
                     Baca
                 </a>
                 @endisset

             </div>
         </div> <!-- / .row -->
         <div class="row">
             <div class="col-12">

                 <!-- Divider -->
                 <hr class="my-6 my-md-8 border-gray-300">

             </div>
         </div> <!-- / .row -->
         <div class="row">


             <div class="col-12 col-md-8">
                 {!! $result->catatan !!}
             </div>


             <div class="col-12 col-md-4">
                 <span style="background: {{ $result->topik->warna }}"
                     class="badge badge-pill badge-float badge-float-outside">
                     <span class="h6 text-white text-uppercase">{{ ucwords($result->topik->jenis_topik) }}</span>
                 </span>
                 <!-- Card -->
                 {{-- <div class="card shadow-light-lg mb-5"> --}}
                 <div class="text-center">
                     <img src="{{ url('storage/resize/'. $result->gambar_sampul) }}" alt="...">
                 </div>
                 {{-- </div> --}}

                 <!-- Card -->
                 <div class="card shadow-light-lg mt-4">
                     <div class="card-body">

                         <!-- Heading -->

                         <div class="list-group list-group-flush pt-2">
                             @isset($no)
                             <div class="list-group-item d-flex align-items-center">

                                 <!-- Text -->
                                 <div class="mr-auto">

                                     <!-- Heading -->
                                     <p class="font-weight-bold mb-1">
                                         No Panggil
                                     </p>

                                     <!-- Text -->
                                     <p class="font-size-sm text-muted mb-0">
                                         We don't charge per seat, just per service.
                                     </p>

                                 </div>



                             </div>
                             @endisset
                             @isset($result->bibliobigrafi)
                             <div class="list-group-item d-flex align-items-center">

                                 <!-- Text -->
                                 <div class="mr-auto">

                                     <!-- Heading -->
                                     <p class="font-weight-bold mb-1">
                                         Jumlah Buku Tersedia
                                     </p>

                                     <!-- Text -->
                                     <p class="font-size-sm text-muted mb-0">
                                         {{ $result->bibliobigrafi->count() }} Sampel
                                     </p>

                                 </div>



                             </div>
                             @endisset
                             @isset($result->buku_transaksi[0]->penerbit)
                             <div class="list-group-item d-flex align-items-center">

                                 <!-- Text -->
                                 <div class="mr-auto">

                                     <!-- Heading -->
                                     <p class="font-weight-bold mb-1">
                                         Penerbit
                                     </p>

                                     <!-- Text -->
                                     <p class="font-size-sm text-muted mb-0">
                                         {{ $result->buku_transaksi[0]->penerbit->nama_penerbit }}
                                     </p>

                                 </div>



                             </div>
                             @endisset

                             @isset($result->isbn_isnn)
                             <div class="list-group-item d-flex align-items-center">

                                 <!-- Text -->
                                 <div class="mr-auto">

                                     <!-- Heading -->
                                     <p class="font-weight-bold mb-1">
                                         ISBN ISNN
                                     </p>

                                     <!-- Text -->
                                     <p class="font-size-sm text-muted mb-0">
                                         {{ $result->isbn_isnn }}
                                     </p>

                                 </div>




                             </div>
                             @endisset

                             @isset($result->deskripsi_fisik)
                             <div class="list-group-item d-flex align-items-center">

                                 <!-- Text -->
                                 <div class="mr-auto">

                                     <!-- Heading -->
                                     <p class="font-weight-bold mb-1">
                                         Deskripsi Fisik
                                     </p>

                                     <!-- Text -->
                                     <p class="font-size-sm text-muted mb-0">
                                         {{ $result->deskripsi_fisik }}
                                     </p>

                                 </div>



                             </div>
                             @endisset

                             @isset($result->bibliobigrafi[0]->gmd)
                             <div class="list-group-item d-flex align-items-center">

                                 <!-- Text -->
                                 <div class="mr-auto">

                                     <!-- Heading -->
                                     <p class="font-weight-bold mb-1">
                                         GMD
                                     </p>

                                     <!-- Text -->
                                     <p class="font-size-sm text-muted mb-0">
                                         {{ $result->bibliobigrafi[0]->gmd->nama_gmd}}
                                     </p>

                                 </div>



                             </div>
                             @endisset

                             @isset($result->tahun_terbit)
                             <div class="list-group-item d-flex align-items-center">

                                 <!-- Text -->
                                 <div class="mr-auto">

                                     <!-- Heading -->
                                     <p class="font-weight-bold mb-1">
                                         Tahun Terbit
                                     </p>

                                     <!-- Text -->
                                     <p class="font-size-sm text-muted mb-0">
                                         {{ $result->tahun_terbit }}
                                     </p>

                                 </div>



                             </div>
                             @endisset

                             @isset($result->buku_transaksi[0]->kota)
                             <div class="list-group-item d-flex align-items-center">

                                 <!-- Text -->
                                 <div class="mr-auto">

                                     <!-- Heading -->
                                     <p class="font-weight-bold mb-1">
                                         Tempat Terbit

                                         <!-- Text -->
                                         <p class="font-size-sm text-muted mb-0">
                                             {{ $result->buku_transaksi[0]->kota->nama_kota }}
                                         </p>

                                 </div>



                             </div>
                             @endisset

                             @isset($result->bibliobigrafi[0]->klasifikasi)
                             <div class="list-group-item d-flex align-items-center">

                                 <!-- Text -->
                                 <div class="mr-auto">

                                     <!-- Heading -->
                                     <p class="font-weight-bold mb-1">
                                         Klasifikasi
                                     </p>

                                     <!-- Text -->
                                     <p class="font-size-sm text-muted mb-0">
                                         {{ $result->bibliobigrafi[0]->klasifikasi->tipe_klasifikasi }}
                                     </p>

                                 </div>



                             </div>
                             @endisset

                             @isset($result->edisi)
                             <div class="list-group-item d-flex align-items-center">

                                 <!-- Text -->
                                 <div class="mr-auto">

                                     <!-- Heading -->
                                     <p class="font-weight-bold mb-1">
                                         Edisi
                                     </p>

                                     <!-- Text -->
                                     <p class="font-size-sm text-muted mb-0">
                                         {{ $result->edisi }}
                                     </p>

                                 </div>



                             </div>
                             @endisset

                             @isset($result->buku_transaksi[0]->bahasa)
                             <div class="list-group-item d-flex align-items-center">

                                 <!-- Text -->
                                 <div class="mr-auto">

                                     <!-- Heading -->
                                     <p class="font-weight-bold mb-1">
                                         Bahasa
                                     </p>

                                     <!-- Text -->
                                     <p class="font-size-sm text-muted mb-0">
                                         {{ ucwords($result->buku_transaksi[0]->bahasa->jenis_bahasa) }}
                                     </p>

                                 </div>



                             </div>
                             @endisset
                         </div>


                         {{-- <!-- Heading -->
                         <a href="#!" class="font-weight-bold font-size-sm text-decoration-none">
                             Let us know <i class="fe fe-arrow-right ml-3"></i>
                         </a> --}}

                     </div>
                 </div>

             </div>
         </div> <!-- / .row -->
     </div> <!-- / .container -->
 </section>

 <!-- FORM
          ================================================== -->
 <section class="pb-5 pb-md-10">

 </section>

 <!-- SHAPE
          ================================================== -->
 <div class="position-relative">
     <div class="shape shape-bottom shape-fluid-x svg-shim text-dark">
         <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
             <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor" />
         </svg>
     </div>
 </div>
