<section class="section section-components pb-0" id="section-components">
    <div class="container">
        <div style="padding-bottom: 10px;" class="row justify-content-center">
            <div class="box">
                <div class="row justify-content-center pt-3 pb-3 text-center">
                    <div class="col col-md-3">
                        <h5>200</h5>
                        <span>Koleksi Buku</span>
                    </div>
                    <div class="col col-md-3">
                        <h5>100</h5>
                        <span>Koleksi PDF</span>
                    </div>
                    <div class="col col-md-3">
                        <h5>300</h5>
                        <span>Anggota Aktif</span>
                    </div>
                    <div class="col col-md-3">
                        <h5>288</h5>
                        <span>Koleksi Buku</span>
                    </div>
                </div>
            </div>
        </div>


        {{-- topik --}}
        <h5 class="mb-3 mt-4">Pilih Topik</h5>
        <div class="row">
            <a href="#">
                <div class="col col-lg-3 col-md-6 mb-2 ">
                    <div style="background: url('https://cdn.dribbble.com/users/772985/screenshots/5794645/chip_2x.jpg') no-repeat center;background-size: cover"
                        class="card-topik">
                        <h6>Pemrograman</h6>
                    </div>
                </div>
            </a>

            <a href="#">
                <div class="col col-lg-3 col-md-6 mb-2">
                    <div style="background: url('https://cdn.dribbble.com/users/772985/screenshots/4851748/1.jpg') no-repeat center;background-size: cover"
                        class="card-topik">
                        <h6>Jurnal</h6>
                    </div>
                </div>
            </a>

            <a href="#">
                <div class="col col-lg-3 col-md-6 mb-2">
                    <div style="background: url('https://cdn.dribbble.com/users/772985/screenshots/5299827/branding_2_2x.jpg') no-repeat center;background-size: cover"
                        class="card-topik">
                        <h6>Manajemen</h6>
                    </div>
                </div>
            </a>

            <a href="#">
                <div class="col col-lg-3 col-md-6 mb-2">
                    <div style="background: url('https://cdn.dribbble.com/users/772985/screenshots/6313407/3_2.jpg') no-repeat center;background-size: cover"
                        class="card-topik">
                        <h6>Arsitektur</h6>
                    </div>
                </div>
            </a>
        </div>

        <div class="text-center mt-5"><a style="font-size: 15.5px;" href="#">Topik Lainnya</a></div>

        {{-- berita --}}
        <app-berita :berita="{{ $berita }}"></app-berita>

        {{-- info --}}
        <div id="info" class="mt-5">
            <div class="container">
                <div class="infomt-5">
                    <h5 class="mb-3">Info Perpustakaan</h5>
                    <div class="row ml-3">
                        <div class="col col-lg-7">
                            <h6>Jadwal Perpustakan</h6>

                            <div class="mt-3 mb-3">
                                <span>Senin - Jumat</span>
                                <p>08:00 - 20.00 WIB</p>
                            </div>

                            <div class="mb-3">
                                <span>Sabtu</span>
                                <p>12:00 - 13:00 WIB</p>
                            </div>

                            <div class="mb-3">
                                <span>Jam Istirahat</span>
                                <p>08:00 - 20.00 WIB</p>
                            </div>
                        </div>
                        <div class="col col-lg-5">
                            <h6>Informasi Kontak</h6>

                            <div class="mb-3">
                                <span>Alamat</span>
                                <p style="width: 90%">Jl. Jakarta No.28, Kebonwaru, Kec. Batununggal, Kota Bandung, Jawa
                                    Barat 40272</p>
                            </div>

                            <div class="mb-3">
                                <span>Phone Number</span>
                                <p>(021) 5711144 </p>
                            </div>

                            <div class="mb-3">
                                <span>Pustakawan</span>
                                <p>Suhendry</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
</section>
