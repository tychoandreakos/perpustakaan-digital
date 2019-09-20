@extends('layouts.app')
@section('main')

@include('component.navbar-landkit')


<!-- BREADCRUMB
    ================================================== -->
<nav class="bg-gray-200">
    <div class="container">
        <div class="row">
            <div class="col-12">

                <!-- Breadcrumb -->
                <ol class="breadcrumb breadcrumb-scroll">
                    <li class="breadcrumb-item">
                        <a href="{{ route('landing') }}" class="text-gray-700">
                            Beranda
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Hasil Pencarian
                    </li>
                </ol>

            </div>
        </div> <!-- / .row -->
    </div> <!-- / .container -->
</nav>

<!-- SEARCH
          ================================================== -->
<section class="py-6">
    <div class="container">
        <div class="row">
            <div class="col-12">

                <!-- Form -->
                <form class="rounded shadow" method="get" action="{{ route('search') }}">
                    <div class="input-group input-group-lg">

                        <!-- Prepend -->
                        <div class="input-group-prepend">
                            <span class="input-group-text border-0 pr-1">
                                <i class="fe fe-search"></i>
                            </span>
                        </div>

                        <!-- Input -->
                        <input type="text" name="cari" value="{{ isset($cari) ? $cari : '' }}"
                            class="form-control border-0 px-1" aria-label="Search our blog..."
                            placeholder="Search our blog...">

                        <!-- Append -->
                        <div class="input-group-append">
                            <span class="input-group-text border-0 py-0 pl-1 pr-3">

                                <!-- Text -->
                                @isset($result)
                                <span class="h6 text-uppercase text-muted d-none d-md-block mb-0 mr-5">
                                    {{ $result->count() }} Result
                                </span>
                                @endisset

                                <!-- Button -->
                                <button type="submit" class="btn btn-sm btn-primary">
                                    Search
                                </button>

                            </span>
                        </div>

                    </div>
                </form>

            </div>
        </div> <!-- / .row -->
    </div>
</section>

<!-- ARTICLES
          ================================================== -->
@isset($result)
<section>
        <div class="container">
            <div class="row">
                @if ($result->count() > 0)
                @foreach ($result as $item)
                <div class="col-12 col-md-6 d-flex mt-7">
    
                    <!-- Card -->
                    <div class="card mb-6 mb-lg-0 shadow-light-lg lift lift-lg">
    
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
                            <span class="badge badge-primary">ISBN: {{ $item->isbn_isnn }}</span>
                            <span class="badge badge-secondary">Tahun Terbit: {{ $item->tahun_terbit }}</span>
                            <span
                                class="badge badge-success">Penerbit: {{ ucwords($item->buku_transaksi[0]->penerbit->nama_penerbit) }}</span>
                            @isset($item->topik->jenis_topik)
                            <span class="badge badge-danger">Topik: {{ ucwords($item->topik->jenis_topik) }}</span>
                            @endisset
                            <span
                                class="badge badge-warning">Bahasa: {{ ucwords($item->buku_transaksi[0]->bahasa->jenis_bahasa) }}</span>
                            <span class="badge badge-info">Deksripsi: {{ $item->deskripsi_fisik }}</span>
                            <span class="badge badge-light">Kode Buku: {{ $item->bibliobigrafi[0]->lokasi_rak->kode_lokasi }} -
                                {{ ucwords($item->bibliobigrafi[0]->lokasi_rak->nama_lokasi) }}</span>
                            <span class="badge badge-dark">No Panggil: {{ $item->bibliobigrafi[0]->no_panggil }}</span>
    
                            <p class="mb-0 text-muted mt-4">
                                {{ isset($item->catatan) ? substr(strip_tags($item->catatan), 0, 150) .' ...' : 'Belum ada data' }}
                            </p>
    
                        </a>
    
                        <!-- Meta -->
                        <a class="card-meta mt-auto" href="#!">
    
                            <!-- Divider -->
                            <hr class="card-meta-divider">
    
                            <!-- Author -->
                            <h6 class="text-uppercase mr-2 mb-0">
                                    @php
                                    $i = 0;
                                    $tr = [];   
                                   @endphp
                                   @foreach ($item->buku_transaksi as $p)
                                   @php
                                   $tr[$i++] = $p->pengarang->nama_pengarang;
                                   // array_push($tr, );
                                //    print_r(join(', ', $tr));
                                   @endphp
                                   @endforeach

                                   @php  print_r(join(', ', $tr)) @endphp
                            </h6>
    
                           
    
                        </a>
    
                    </div>
    
                </div>
                @endforeach
    
                {{ $result->links() }}
                @else
                <h4 class="text-center">
                    Tidak ditemukan pencarian dengan kata kunci {{ isset($cari) ? $cari : ''  }}
                 
                </h4>
                @endif
    
                <section class="py-6 py-md-8">
    
                  </section>
            </div>
        </div> <!-- / .container -->
    </section>
@else
<section>
        <div class="container">
            <div class="row">
                @if ($total->count() > 0)
                @foreach ($total as $item)
                <div class="col-12 col-md-6 d-flex mt-7">
    
                    <!-- Card -->
                    <div class="card mb-6 mb-lg-0 shadow-light-lg lift lift-lg">
    
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
                            <span class="badge badge-primary">ISBN: {{ $item->isbn_isnn }}</span>
                            <span class="badge badge-secondary">Tahun Terbit: {{ $item->tahun_terbit }}</span>
                            <span
                                class="badge badge-success">Penerbit: {{ ucwords($item->buku_transaksi[0]->penerbit->nama_penerbit) }}</span>
                            @isset($item->topik->jenis_topik)
                            <span class="badge badge-danger">Topik: {{ ucwords($item->topik->jenis_topik) }}</span>
                            @endisset
                            <span
                                class="badge badge-warning">Bahasa: {{ ucwords($item->buku_transaksi[0]->bahasa->jenis_bahasa) }}</span>
                            <span class="badge badge-info">Deksripsi: {{ $item->deskripsi_fisik }}</span>
                            <span class="badge badge-light">Kode Buku: {{ $item->bibliobigrafi[0]->lokasi_rak->kode_lokasi }} -
                                {{ ucwords($item->bibliobigrafi[0]->lokasi_rak->nama_lokasi) }}</span>
                            <span class="badge badge-dark">No Panggil: {{ $item->bibliobigrafi[0]->no_panggil }}</span>
    
                            <p class="mb-0 text-muted mt-4">
                                {{ isset($item->catatan) ? substr(strip_tags($item->catatan), 0, 150) .' ...' : 'Belum ada data' }}
                            </p>
    
                        </a>
    
                        <!-- Meta -->
                        <a class="card-meta mt-auto" href="#!">
    
                            <!-- Divider -->
                            <hr class="card-meta-divider">
    
                            <!-- Author -->
                            <h6 class="text-uppercase mr-2 mb-0">
                                @foreach ($item->buku_transaksi as $p)
                                {{ $p->pengarang->nama_pengarang }}
                                @endforeach
                            </h6>
    
                           
    
                        </a>
    
                    </div>
    
                </div>
                @endforeach
    
                {{ $total->links() }}
                @else
                <h4 class="text-center">
                    Tidak ditemukan pencarian dengan kata kunci {{ isset($cari) ? $cari : '' }}
                 
                </h4>
                @endif
    
                <section class="py-6 py-md-8">
    
                  </section>
            </div>
        </div> <!-- / .container -->
    </section>
@endisset

<!-- MORE
          ================================================== -->
<section class="py-7 py-md-10">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-9 col-lg-8 col-xl-7">

                <!-- Button -->
                <a href="#!" class="btn btn-block btn-outline-gray-300 d-flex align-items-center">
                    <span class="mx-auto">Load more</span> <i class="fe fe-arrow-right"></i>
                </a>

            </div>
        </div> <!-- / .row -->
    </div> <!-- / .container -->
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
<section class="pt-6 pt-md-8 bg-gray-200">
    <div class="container pb-6 pb-md-8 border-bottom border-gray-300">
        {{-- <div class="row align-items-center">
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
        </div> <!-- / .row --> --}}
    </div> <!-- / .container -->
</section>

@include('component.footer')

@endsection
