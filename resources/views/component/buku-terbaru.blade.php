<!-- ARTICLES
      ================================================== -->
<section class="pt-7 pt-md-10">
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-12 col-md">

                <!-- Heading -->
                <h3 class="mb-0">
                    Koleksi Terbaru
                </h3>

                <!-- Text -->
                <p class="mb-0 text-muted">
                    Here’s what we've been up to recently.
                </p>

            </div>
            <div class="col-12 col-md-auto">

                <!-- Button -->
                <a href="{{ route('terbaru') }}" class="btn btn-sm btn-outline-gray-300 d-none d-md-inline">
                    Lihat Semua
                </a>

            </div>
        </div> <!-- / .row -->
        <div class="row">
            @foreach ($terbaru as $item)
            <div class="col-12 col-md-6 d-flex">

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
                        <span class="badge badge-success">Penerbit:
                            {{ ucwords($item->buku_transaksi[0]->penerbit->nama_penerbit) }}</span>
                        @isset($item->topik->jenis_topik)
                        @endisset
                        <span class="badge badge-warning">Bahasa:
                            {{ ucwords($item->buku_transaksi[0]->bahasa->jenis_bahasa) }}</span>
                        <span class="badge badge-info">Deskripsi Fisik: {{ $item->deskripsi_fisik }}</span>
                        <span class="badge badge-light">Lokasi Rak:
                            {{ $item->bibliobigrafi[0]->lokasi_rak->kode_lokasi }} -
                            {{ ucwords($item->bibliobigrafi[0]->lokasi_rak->nama_lokasi) }}</span>
                        <span class="badge badge-dark">No Panggil:
                            {{ $item->bibliobigrafi[0]->no_panggil }}</span>

                        <div class="mb-0 text-muted mt-4">
                            {{ isset($item->catatan) ? substr(strip_tags($item->catatan), 0, 150) .' ...' : 'Belum ada data' }}
                        </div>

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
                            // print_r(join(', ', $tr));
                            @endphp
                            @endforeach

                            @php  print_r(join(', ', $tr)) @endphp
                        </h6>

                        @if($item->pdf)
                            <!-- Date -->
                        <p class="h6 text-uppercase text-muted mb-0 ml-auto">
                                <button onclick="location.href='{{ route('baca', $item->slug) }}'" data-toggle="tooltip" data-placement="top" title="Tooltip on top"
                                        class="btn btn-danger-soft btn-rounded-circle btn-sm">
                                        <i class="fe fe-eye"></i>
                                    </button>
                                </p>
                        @endif

                    </a>

                </div>

            </div>
            @endforeach
        </div> <!-- / .row -->
    </div> <!-- / .container -->
</section>
