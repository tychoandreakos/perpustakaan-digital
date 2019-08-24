<section class="section section-components pb-0" id="section-components">
    <div class="container">
        <div style="padding-bottom: 10px;" class="row justify-content-center">
            <div class="box">
                <div class="row justify-content-center pt-3 pb-3 text-center">
                    <div class="col col-md-3">
                        <h5>{{ $buku }}</h5>
                        <span>Koleksi Buku</span>
                    </div>
                    <div class="col col-md-3">
                        <h5>100</h5>
                        <span>Koleksi PDF</span>
                    </div>
                    <div class="col col-md-3">
                        <h5>{{ $user }}</h5>
                        <span>Anggota Aktif</span>
                    </div>
                    <div class="col col-md-3">
                        <h5>288</h5>
                        <span>Koleksi Buku</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="img">
                <div class="img-1"></div>
           </div>

        {{-- topik --}}
        <h5 class="mb-3 mt-4">Pilih Topik</h5>
        <div class="row">
            @if(isset($topik))
            @foreach ($topik as $item)
            <a href="#">
                <div class="col col-lg-3 col-md-6 mb-2 ">
                    <div style="background: url('{{ asset("storage/topik/$item->img") }}') no-repeat center;background-size: cover"
                        class="card-topik">
                        <h6>{{ ucwords($item->jenis_topik) }}</h6>
                    </div>
                </div>
            </a>
            @endforeach
            @else
            
                {{-- jika belum ada data error --}}

            @endif
        </div>

        <div class="text-center mt-5"><a style="font-size: 15.5px;" href="#">Topik Lainnya</a></div>

        {{-- berita --}}
        <div id="berita">
            <app-berita :berita="{{ $berita }}"></app-berita>
        </div>

        {{-- info
        <div id="info" class="mt-5">
            <div class="container">
                <div class="infomt-5">
                    <h5 class="mb-3">Info Perpustakaan</h5>
                    <div class="row ml-3">
                        <div class="col col-lg-7">
                            <h6>Jadwal Perpustakan</h6>

                            <div class="mt-3 mb-3">
                                <span>{{ isset($info->regular) ? ucwords($info->regular) : 'Belum ada data!' }}</span>
                                <p>{{ $info->waktu_regular }}</p>
                            </div>

                            <div class="mb-3">
                                <span>{{ isset($info->weekend) ? ucwords($info->weekend) : 'Belum ada data!' }}</span>
                                <p>{{ $info->waktu_weekend }}</p>
                            </div>

                            <div class="mb-3">
                                <span>Jam Istirahat</span>
                                <p>{{ isset($info->waktu_istirahat) ? ucwords($info->waktu_istirahat) : 'Belum ada data!' }}</p>
                            </div>
                        </div>
                        <div class="col col-lg-5">
                            <h6>Informasi Kontak</h6>

                            <div class="mb-3">
                                <span>Alamat</span>
                                <p style="width: 90%">{{ ucfirst($info->alamat) }}</p>
                            </div>

                            <div class="mb-3">
                                <span>Phone Number</span>
                                <p>{{ isset($info->no_telp) ? ucwords($info->no_telp) : 'Belum ada data!' }}</p>
                            </div>

                            <div class="mb-3">
                                <span>Pustakawan</span>
                                <p>{{ isset($info->pustakawan) ? ucwords($info->pustakawan) : 'Belum ada data!' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

    </div>
    </div>
    </div>
</section>
