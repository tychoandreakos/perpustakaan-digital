@extends('layouts.app')
@section('main')

<!-- WELCOME
    ================================================== -->
<section class="border-bottom">
    <div class="container">
        <div class="row align-items-stretch">
            <div class="col-12 col-md-6 offset-md-1 order-md-2">

                <!-- Slider (mobile) -->
                {{-- <div class="d-md-none img-cover"
                    data-flickity='{"imagesLoaded": true, "wrapAround": true, "prevNextButtons": false, "pageDots": false}'>
                    <div class="w-100">

                        <!-- Image -->
                        <img src="{{ asset('img/covers/cover-12.jpg') }}" alt="..." class="img-fluid">

                    </div>
                    <div class="w-100">

                        <!-- Image -->
                        <img src="{{ asset('img/covers/cover-2.jpg') }}" alt="..." class="img-fluid">

                    </div>
                </div> --}}

                <!-- Slider -->
                <div style=" background: linear-gradient(87deg, #172b4d 0, #1a174d 100%) !important; height: 100vh" class="py-5 py-md-10 position-relative vw-50  d-none d-md-block" data-aos="fade-left">

                    <!-- Slider -->
                    {{-- <div class="flickity-button-bottom flickity-button-white h-100 w-100"
                        data-flickity='{"imagesLoaded": true, "setGallerySize": false, "wrapAround": true, "pageDots": false}'>
                        <div class="w-100 h-100 bg-cover"
                            style="background-image: url({{ asset('img/covers/cover-9.jpg')}});"></div>
                        <div class="w-100 h-100 bg-cover"
                            style="background-image: url({{ asset('img/covers/cover-2.jpg')}});"></div>
                    </div> --}}


                {{-- <div class="card shadow"> --}}

                        <div class="card bg-gradient-default shadow">
                                <div class="card-header bg-transparent">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                            <h2 class="text-white mb-0">Statistik Pengunjung</h2>
                                        </div>
                                        <div class="col">
                                            <ul class="nav nav-pills justify-content-end">
                                                <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales"
                                                    data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}'
                                                    >
                                                    {{-- <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                                                        <span class="d-none d-md-block">Month</span>
                                                        <span class="d-md-none">M</span>
                                                    </a> --}}
                                                </li>
                                                {{-- <li class="nav-item" data-toggle="chart" data-target="#chart-sales"
                                                    data-update='{"data":{"datasets":[{"data":[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}'
                                                    >
                                                    <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                                                        <span class="d-none d-md-block">Week</span>
                                                        <span class="d-md-none">W</span>
                                                    </a>
                                                </li> --}}
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!-- Chart -->
                                    <div class="chart">
                                        <!-- Chart wrapper -->
                                        {{-- <canvas id="chart-sales" class="chart-canvas"></canvas> --}}
                                        <canvas id="chart-orders-pengunjung" class="chart-canvas"></canvas>
                                    </div>
                                </div>
                            </div>

                    {{-- <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1">Statistik Pengunjung Per Bulan Berdasarkan Buku Tamu</h6>
                                <h2 class="mb-0">Total Pengunjung</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <canvas id="chart-orders-pengunjung" class="chart-canvas"></canvas>
                        </div>
                    </div> --}}
                {{-- </div> --}}

                    <!-- Shape -->
                    {{-- <div class="shape shape-left shape-fluid-y svg-shim text-white">
                        <svg viewBox="0 0 100 1544" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0H100V386L50 1158V1544H0V0Z" fill="currentColor" />
                        </svg>
                    </div> --}}

                </div>


            </div>
            <div style="margin-top: -5.5px" class="col-12 col-md-5 py-8 py-md-14 order-md-1" data-aos="fade-right">

                    @guest
                    <a class="navbar-brand" href="{{ route('landing') }}">
                        <img src="{{ asset('img/logo.svg') }}" class="navbar-brand-img" alt="...">
                        <h4 style="display: inline" class="font-weight-bold">STMIK Digital Library.</h4>
                    </a>
                    @else
                    <a class="navbar-brand" href="{{ route('beranda') }}">
                       <img src="{{ asset('img/logo.svg') }}" class="navbar-brand-img" alt="...">
                        <h4 style="display: inline" class="font-weight-bold">STMIK Digital Library.</h4>
                    </a>
                    @endguest

                <!-- Heading -->
                <h1 class="display-3 ">
                    Silahkan Isi <span class="text-primary">Data Diri</span> Anda.
                </h1>

                <!-- Form -->
            <app-tamu index="{{ route('tamu') }}" store="{{ route('tamu.store') }}"></app-tamu>

            </div>
        </div> <!-- / .row -->
    </div> <!-- / .container -->
</section>

@endsection
