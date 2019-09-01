<section class="py-8 py-md-11 bg-gradient-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-6">

                <!-- Preheading -->
                <h6 class="text-uppercase text-primary font-weight-bold">
                    Halo, {{ Auth::user()->name }}
                </h6>

                <!-- Heading -->
                <h2>
                    Pinjaman Koleksi
                </h2>

                <!-- Text -->
                <p class="text-muted mb-6 mb-md-8">
                    We get thousands of job postings weekly, but only accept the openings at the top companies.
                </p>

            </div>
            <div class="col-12 col-md-6">

                <!-- Image -->
                <img src="{{ asset('img/illustrations/illustration-3.png') }}" class="img-fluid" alt="...">

            </div>
        </div> <!-- / .row -->
        <div class="row">
            <div class="col-12 col-md-6">

                <!-- Card -->
                <div class="card card-border border-primary shadow-light-lg mb-6 mb-md-8" data-aos="fade-up">
                    <div class="card-body">

                        <!-- Heading -->
                        <h6 class="text-uppercase text-primary d-inline-block mb-5 mr-1">
                            Daftar Pinjam
                        </h6>

                        <!-- Badge -->
                        <span class="badge badge-rounded-circle badge-primary-soft">
                            <span>{{ $pinjam->count() }}</span>
                        </span>

                        <!-- List group -->
                        <div>
                            <div class="list-group list-group-flush">
                                @if ($pinjam->count() > 0)
                                @foreach ($pinjam as $item)
                                <a class="list-group-item text-reset text-decoration-none"
                                    href="{{ route('buku', $item->buku->slug) }}">

                                    <p class="font-weight-bold mb-1">
                                        {{ ucwords($item->buku->judul) }}
                                    </p>
                                    <p class="font-size-sm text-muted mb-0">
                                        Tanggal Pinjam: {{ $item->tgl_pinjam }}
                                    </p>
                                    <p class="font-size-sm text-success mb-0">
                                        Tanggal Kembali {{ $item->tanggal_habis_pinjam }}
                                    </p>

                                </a>
                                @endforeach
                                @else
                                <h5 class="text-center">Yah, tidak ada buku yang dipinjam</h5>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>


            </div>
            <div class="col-12 col-md-6">

                <!-- Card -->
                <div class="card card-border border-danger shadow-light-lg mb-6 mb-md-8" data-aos="fade-up"
                    data-aos-delay="100">
                    <div class="card-body">

                        <!-- Heading -->
                        <h6 class="text-uppercase text-danger d-inline-block mb-5 mr-1">
                            Daftar Keterlambatan
                        </h6>

                        <!-- Badge -->
                        <span class="badge badge-rounded-circle badge-danger-soft">
                            <span>{{ $terlambat->count() }}</span>
                        </span>

                        <!-- List group -->
                        <div>
                            <div class="list-group list-group-flush">
                                @if ($terlambat->count() > 0)
                                @foreach ($terlambat as $item)
                                <a class="list-group-item text-reset text-decoration-none"
                                    href="{{ route('buku', $item->buku->slug) }}">

                                    <p class="font-weight-bold mb-1">
                                        {{ ucwords($item->buku->judul) }}
                                    </p>
                                    <p class="font-size-sm text-muted mb-0">
                                        Tanggal Pinjam: {{ $item->tgl_pinjam }}
                                    </p>
                                    <p class="font-size-sm text-danger mb-0">
                                        Tanggal Kembali {{ $item->tanggal_habis_pinjam }}
                                        (Terlambat
                                        {{ App\Http\Controllers\LandingController::denda($item->tanggal_habis_pinjam) }}
                                        Hari)
                                    </p>
                                    <p class="font-size-sm text-danger mb-0">
                                        Denda: Rp.
                                        {{ App\Http\Controllers\LandingController::denda($item->tanggal_habis_pinjam) * (int)$tipe->tipe_anggota->denda }}
                                    </p>
                                    <hr>
                                    <p class="font-size-sm text-muted mb-0">
                                        Silahkan hubungi petugas untuk membayar denda.
                                    </p>

                                </a>
                                @endforeach
                                @else
                                <h5 class="text-center">Wow, tidak ada buku yang terlambat!</h5>
                                @endif

                            </div>
                        </div>

                    </div>
                </div>


            </div>

            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="card card-border border-success shadow-light-lg mb-6 mb-md-8" data-aos="fade-up">
                        <div class="card-body">

                            <!-- Heading -->
                            <h6 class="text-uppercase text-success d-inline-block mb-5 mr-1">
                                Histori Peminjaman Anda
                            </h6>


                            <!-- List group -->
                            <div>
                                <div class="list-group list-group-flush">
                                        @if ($histori->count() > 0)
                                        @foreach ($histori as $item)
                                        <a class="list-group-item text-reset text-decoration-none"
                                            href="{{ route('buku', $item->buku->slug) }}">
            
                                            <p class="font-weight-bold mb-1">
                                                {{ ucwords($item->buku->judul) }}
                                            </p>
                                            <p class="font-size-sm text-muted mb-0">
                                                Tanggal Pinjam: {{ $item->tgl_pinjam }}
                                            </p>
                                            <p class="font-size-sm text-muted mb-0">
                                                Tanggal Kembali: {{ $item->tanggal_habis_pinjam }}
                                            </p>
                                            <p class="font-size-sm text-success mb-0">
                                                Tanggal Dikembalikan: {{ $item->tgl_kembali }}
                                            </p>
            
                                        </a>
                                        @endforeach
                                        @else
                                        <h5 class="text-center text-muted">Belum ada data!</h5>
                                        @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                        <div class="card card-border border-primary shadow-light-lg mb-6 mb-md-8" data-aos="fade-up">
                                <div class="card-body">
                
                                    <!-- Heading -->
                                    <h6 class="text-uppercase text-primary d-inline-block mb-5 mr-1">
                                        Peminjaman Yang Belum Diverifikasi
                                    </h6>
                
                
                                    <!-- List group -->
                                    <div>
                                        <div class="list-group list-group-flush">
                                                @if ($verifikasi->count() > 0)
                                                @foreach ($verifikasi as $item)
                                                <a class="list-group-item text-reset text-decoration-none"
                                                    href="{{ route('buku', $item->buku->slug) }}">
            
                                                    <p class="font-weight-bold mb-1">
                                                        {{ ucwords($item->buku->judul) }}
                                                    </p>
                                                    <p class="font-size-sm text-muted mb-0">
                                                            Kode Verifikasi: <span class="text-bold">{{ strtoupper($item->kode_pinjam) }}</span>
                                                        </p>
                                                </a>
                                                @endforeach
                                                @else
                                                <h5 class="text-center text-muted">Belum ada data!</h5>
                                                @endif
                                        </div>
                                    </div>
                
                                </div>
                            </div>
                </div>
            </div>




        </div> <!-- / .row -->
        <div class="row justify-content-center">
            <div class="col-12 col-md-6" data-aos="fade-up">


            </div>
        </div> <!-- / .row -->
    </div> <!-- / .container -->
</section>

<!-- PLACEMENT RATES
  ================================================== -->
<section>
    <div class="container py-8 pt-md-11 pb-md-9 border-top">
        <div class="row">
            <div class="col-12 col-md-10 col-lg-8">

                <!-- Preheading -->
                <h6 class="text-uppercase text-primary">
                    Placement rates
                </h6>

                <!-- Heading -->
                <h2 class="mb-6 mb-md-8">
                    Landkit is the leading job placement site with the highest rate of success of any tech job board.
                </h2>

                <!-- Stats -->
                <div class="d-flex">
                    <div class="pr-5">
                        <h3 class="mb-0">
                            <span data-toggle="countup" data-from="0" data-to="74" data-aos
                                data-aos-id="countup:in">0</span>k
                        </h3>
                        <p class="text-gray-700 mb-0">
                            Placements
                        </p>
                    </div>
                    <div class="px-5">
                        <h3 class="mb-0">
                            <span data-toggle="countup" data-from="0" data-to="124" data-aos
                                data-aos-id="countup:in">0</span>k
                        </h3>
                        <p class="text-gray-700 mb-0">
                            Positions
                        </p>
                    </div>
                    <div class="pl-5">
                        <h3 class="mb-0">
                            <span data-toggle="countup" data-from="0.0" data-to="1.9" data-decimals="1" data-aos
                                data-aos-id="countup:in">0.0</span>k
                        </h3>
                        <p class="text-gray-700 mb-0">
                            Partnerships
                        </p>
                    </div>
                </div>

            </div>
        </div> <!-- / .row -->
    </div> <!-- / .container -->
</section>
