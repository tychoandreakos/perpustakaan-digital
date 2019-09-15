<!-- BREADCRUMB
    ================================================== -->
<nav class="bg-gray-200">
    <div class="container">
        <div class="row">
            <div class="col-12">

                <!-- Breadcrumb -->
                <ol class="breadcrumb breadcrumb-scroll">
                    <li class="breadcrumb-item">
                        <a href="{{ route('beranda') }}" class="text-gray-700">
                            Buku
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Hasil Pencarian berdasarkan topik {{ ucwords($tags) }}
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
                <form method="get" action="{{ route('cari') }}" class="rounded shadow">
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
                            placeholder="Masukkan satu atau lebih kata kunci dari judul, pengarang, atau subyek "
                            value="{{ ucfirst($cari) }}">

                        <!-- Append -->
                        <div class="input-group-append">
                            <span class="input-group-text border-0 py-0 pl-1 pr-3">

                                <!-- Text -->
                                @if ($cari)
                                <span class="h6 text-uppercase text-muted d-none d-md-block mb-0 mr-5">
                                    Ditemukan 0 Pencarian
                                </span>
                                @endif

                                <!-- Button -->
                                <button type="submit" class="btn btn-sm btn-primary">
                                    Search
                                    </a>

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
<section>
    <div class="container">
        <div class="row">
            @if ($result->count())
            @foreach ($result->buku as $item)
            <div class="col-12 col-md-6 col-lg-4 d-flex">

                <!-- Card -->
                <div class="card mb-6 mb-lg-0 shadow-light-lg lift lift-lg">

                    <!-- Image -->
                    <a class="card-img-top" href="{{ route('buku', $item->slug) }}">

                        <!-- Image -->
                        <div style="display: flex; background: {{ isset($item->topik->warna) ?$result->warna : '#335eea' }}; width: 100%; height: 250px"
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
                        @isset($result->jenis_topik)
                        <span class="badge badge-danger">{{ ucwords($result->jenis_topik) }}</span>
                        @endisset
                        <span
                            class="badge badge-warning">{{ ucwords($item->buku_transaksi[0]->bahasa->jenis_bahasa) }}</span>
                        <span class="badge badge-info">{{ $item->deskripsi_fisik }}</span>
                        <span class="badge badge-light"> {{ $item->bibliobigrafi[0]->lokasi_rak->kode_lokasi }} -
                            {{ ucwords($item->bibliobigrafi[0]->lokasi_rak->nama_lokasi) }}</span>
                        <span class="badge badge-dark">{{ $item->bibliobigrafi[0]->no_panggil }}</span>

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
                            @endphp
                            @endforeach
                            @php print_r(join(', ', $tr)) @endphp
                        </h6>

                        <!-- Date -->
                        @if($item->pdf)
                        <p class="h6 text-uppercase text-muted mb-0 ml-auto">
                            <button onclick="location.href='{{ route('baca', $item->slug) }}'" data-toggle="tooltip"
                                data-placement="top" title="Tooltip on top"
                                class="btn btn-danger-soft btn-rounded-circle btn-sm">
                                <i class="fe fe-eye"></i>
                            </button>
                        </p>
                        @endif

                    </a>

                </div>

            </div>
            @endforeach

            {{-- {{ $result->links() }} --}}
            @else
            <h4 class="text-center">
                Tidak ditemukan pencarian dengan kata kunci {{ $cari }}

            </h4>
            @endif

            <section class="py-6 py-md-8">

            </section>
        </div>
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
</section>
