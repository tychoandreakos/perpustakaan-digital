<!-- WELCOME
    ================================================== -->
<section class="pt-4 pt-md-11">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-5 col-lg-6 order-md-2">

                <!-- Image -->
                <img src="{{ asset('img/illustrations/illustration-2.png') }}"
                    class="img-fluid mw-md-150 mw-lg-130 mb-6 mb-md-0" alt="..." data-aos="fade-up"
                    data-aos-delay="100">

            </div>
            <div class="col-12 col-md-7 col-lg-6 order-md-1" data-aos="fade-up">

                <!-- Heading -->
                <h1 class="display-3 text-center text-md-left">
                    Selamat Datang Di DIGLIB <br>
                    <span class="text-primary">STMIK AMIKBANDUNG.</span>
                </h1>

                <!-- Text -->
                <p class="lead text-center text-md-left text-muted mb-6 mb-lg-8">
                    Anda dapat mencari seluruh koleksi yang tersedia di perpustakaan kami.
                </p>

                @guest
                <!-- Buttons -->
                <div class="text-center text-md-left">
                    <a href="{{ route('search') }}" class="btn btn-primary shadow lift mr-1">
                        Cari Buku <i class="fe fe-arrow-right d-none d-md-inline ml-3"></i>
                    </a>

                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-primary-soft lift">
                        Daftar
                    </a>
                    @endif
                    @else
                    <a href="{{ route('beranda') }}" class="btn btn-primary shadow lift mr-1">
                        Masuk Menu Perpustakaan <i class="fe fe-arrow-right d-none d-md-inline ml-3"></i>
                    </a>
                    @endguest
                </div>

            </div>
        </div> <!-- / .row -->
    </div> <!-- / .container -->
</section>
