    <!-- FOOTER
    ================================================== -->
    <footer class="py-8 py-md-11 bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-4">

                    <!-- Brand -->
                    <img src="{{ asset('img/logo.svg') }}" class="navbar-brand-img" alt="...">
                    <h4 style="display: inline" class="font-weight-bold text-gray-400">Digital Library.</h4>

                    <!-- Text -->
                    <p class="font-size-sm mt-2 text-gray-400 mb-2">
                        @if(isset($info->email))
                        Email: {{ ucwords($info->email) }}
                        @else
                        Email: {{ ucwords('info@stmik-amikbandung.ac.id') }}
                        @endif
                        <br>
                        @if (isset($info->no_telp))
                        Telp: {{ $info->no_telp }}
                        @else
                        Telp: (022) 7271136
                        @endif
                        <br>
                        @if (isset($info->pustakawan))
                        Pustakawan: {{ ucwords($info->pustakawan) }}
                        @else
                        Pustakawan: Suhendry
                        @endif
                    </p>

                    <!-- Social -->
                    <ul class="list-unstyled list-inline list-social mb-6 mb-md-0">
                        <li class="list-inline-item list-social-item mr-3">
                            <a href="#!" class="text-decoration-none">
                                <img src="{{ asset('img/icons/social/instagram.svg') }}" class="list-social-icon"
                                    alt="...">
                            </a>
                        </li>
                        <li class="list-inline-item list-social-item mr-3">
                            <a href="#!" class="text-decoration-none">
                                <img src="{{ asset('img/icons/social/facebook.svg') }}" class="list-social-icon"
                                    alt="...">
                            </a>
                        </li>
                        <li class="list-inline-item list-social-item mr-3">
                            <a href="#!" class="text-decoration-none">
                                <img src="{{ asset('img/icons/social/twitter.svg') }}" class="list-social-icon"
                                    alt="...">
                            </a>
                        </li>
                    </ul>

                </div>
                <div class="col-6 col-md-4 col-lg-3">

                    <!-- Heading -->
                    <h6 class="font-weight-bold text-uppercase text-gray-400">
                        Jadwal Perpustakaan
                    </h6>

                    <!-- List -->
                    <ul class="list-unstyled text-gray-400 mb-6 mb-md-8 mb-lg-0">
                        <li class="mb-3">
                            @if (isset($info->regular))
                            {{ ucwords($info->regular) }} <br>
                            @else
                            Senin - Jumat <br>
                            @endif
                            @if (isset($info->waktu_regular))
                            <span class="font-size-sm">{{ $info->waktu_regular }}</span>
                            @else
                            <span class="font-size-sm">08.00 - 20.00</span>
                            @endif
                        </li>
                        <li class="mb-3">
                            @if (isset($info->weekend))
                            {{ ucwords($info->weekend) }} <br>
                            @else
                            Sabtu <br>
                            @endif
                            @if (isset($info->waktu_weekend))
                            <span class="font-size-sm">{{ $info->waktu_weekend }}</span>
                            @else
                            08.00 - 17.00
                            @endif
                        </li>
                        <li class="mb-3">
                            Jam Istirahat <br>
                            @if (isset($info->waktu_istirahat))
                            <span class="font-size-sm">{{ $info->waktu_istirahat }}</span>
                            @else
                            12.00 - 13.00
                            @endif
                        </li>
                    </ul>

                </div>
                <div class="col-6 col-md-4 col-lg-5">

                    <!-- Heading -->
                    <h6 class="font-weight-bold text-uppercase text-gray-400">
                        Alamat
                    </h6>

                    <!-- List -->
                    <ul class="list-unstyled text-gray-400 mb-6 mb-md-8 mb-lg-0">
                        <li class="mb-3">
                            @if (isset($info->alamat))
                            {{ ucwords($info->alamat) }}
                            @else
                            Jalan Jakarta No 28
                            Kelurahan Kebonwaru, Kecamatan Batununggal
                            Kota Bandung, Jawa barat
                            @endif
                        </li>
                    </ul>

                </div>
            </div> <!-- / .row -->
        </div> <!-- / .container -->
    </footer>
