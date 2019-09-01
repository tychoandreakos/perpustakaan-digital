@extends('layouts.app')

@section('main')
<!-- CONTENT
    ================================================== -->
<section class="section-border border-primary">
    <div class="container d-flex flex-column">
        <div class="row align-items-center justify-content-center no-gutters min-vh-100">
            <div class="col-8 col-md-6 col-lg-7 offset-md-1 order-md-2 mt-auto mt-md-0 pt-5 pb-4 py-md-8">

                <!-- Image -->
                <img src="{{ asset('img/illustrations/illustration-1.png') }}" alt="..." class="img-fluid">

            </div>
            <div class="col-12 col-md-5 col-lg-4 order-md-1 mb-auto mb-md-0 pb-8 py-md-11">

                <!-- Heading -->
                <h1 class="display-3 font-weight-bold text-center">
                    Halo, {{ ucwords(Auth::user()->name) }}
                </h1>

                <!-- Text -->
                <p class="mb-5 text-center text-muted">
                    Selamat datang di DIGLIB <span class="text-primary">STMIK AMIKBANDUNG</span>, mohon maaf akun anda
                    belum dapat diaktifkan karena menunggu persetujuan admin. Silahkan cek kembali akun anda apabila
                    sudah diaktifkan.
                </p>

                <!-- Link -->
                <div class="text-center">
                        <a href="{{ route('landing') }}" class="btn btn-primary-soft shadow lift mr-1">
                                Kembali </i>
                            </a>
                    <a href="{{ route('search') }}" class="btn btn-primary shadow lift mr-1">
                        Cari Buku <i class="fe fe-arrow-right d-none d-md-inline ml-3"></i>
                    </a>
                </div>

            </div>
        </div> <!-- / .row -->
    </div> <!-- / .container -->
</section>
@endsection
