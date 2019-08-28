@extends('layouts.app')
@section('main')


<!-- WELCOME
    ================================================== -->
<section class="border-bottom">
    <div class="container">
        <div class="row align-items-stretch">
            <div class="col-12 col-md-6 offset-md-1 order-md-2">

                <!-- Slider (mobile) -->
                <div class="d-md-none img-cover"
                    data-flickity='{"imagesLoaded": true, "wrapAround": true, "prevNextButtons": false, "pageDots": false}'>
                    <div class="w-100">

                        <!-- Image -->
                        <img src="{{ asset('img/covers/cover-12.jpg') }}" alt="..." class="img-fluid">

                    </div>
                    <div class="w-100">

                        <!-- Image -->
                        <img src="{{ asset('img/covers/cover-2.jpg') }}" alt="..." class="img-fluid">

                    </div>
                </div>

                <!-- Slider -->
                <div class="position-relative h-100 vw-50 d-none d-md-block" data-aos="fade-left">

                    <!-- Slider -->
                    <div class="flickity-button-bottom flickity-button-white h-100 w-100"
                        data-flickity='{"imagesLoaded": true, "setGallerySize": false, "wrapAround": true, "pageDots": false}'>
                        <div class="w-100 h-100 bg-cover"
                            style="background-image: url({{ asset('img/covers/cover-9.jpg')}});"></div>
                        <div class="w-100 h-100 bg-cover"
                            style="background-image: url({{ asset('img/covers/cover-2.jpg')}});"></div>
                    </div>

                    <!-- Shape -->
                    <div class="shape shape-left shape-fluid-y svg-shim text-white">
                        <svg viewBox="0 0 100 1544" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0H100V386L50 1158V1544H0V0Z" fill="currentColor" />
                        </svg>
                    </div>

                </div>

            </div>
            <div class="col-12 col-md-5 py-4 py-md-8 order-md-1" data-aos="fade-right">

                <!-- Heading -->
                <h1 class="display-3">
                    Silahkan Isi <span class="text-primary">Data Diri</span> Anda.
                </h1>

                <!-- Form -->
              <app-tamu store="{{ route('tamu.store') }}"></app-tamu>

            </div>
        </div> <!-- / .row -->
    </div> <!-- / .container -->
</section>

@endsection
