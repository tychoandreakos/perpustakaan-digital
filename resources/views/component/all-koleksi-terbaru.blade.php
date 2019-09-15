      <!-- ARTICLES
          ================================================== -->
      <section class="pt-8 pt-md-11">
          <div class="container">
              <div class="row">
                  <div class="col-12">

                      <!-- Heading -->
                      <h2 class="mb-0">
                          Semua Koleksi Terbaru Perpustakaan
                      </h2>

                      <!--  -->
                      <p class="mb-5 text-muted">
                          These span the grid's entire width with several options.
                      </p>

                  </div>
              </div> <!-- / .row -->
              @foreach ($terbaru as $item)
              <div class="row">
                  <div class="col-12">
                      @if ($loop->iteration % 2 == 0)
                      <!-- Card -->
                      <div class="card card-row shadow-light-lg mb-6">
                          <div class="row no-gutters">
                              <div class="col-12">

                                  <!-- Badge -->
                                  <span class="badge badge-pill badge-dark badge-float badge-float-outside">
                                      <span class="h6 text-uppercase">{{ ucwords($item->topik->jenis_topik) }}</span>
                                  </span>

                              </div>
                              <a class="col-12 col-md-6 order-md-2 bg-cover card-img-right"
                                  href="{{ route('buku', $item->slug) }}">

                                  <div style="display: flex; background: {{ isset($item->topik->warna) ?$item->topik->warna : '#335eea' }}; width: 100%; height: 100%"
                                      class="card-img-top">
                                      <div style="background:url('{{  url('storage/cover/'.$item->gambar_sampul) }}') center no-repeat;background-size: cover; width: 115px;
                                                    height: 160px;margin: auto; display:flex; align-self: center
                                                box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.25);"></div>
                                  </div>

                                  <!-- Shape -->
                                  <div class="shape shape-left shape-fluid-y svg-shim text-white d-none d-md-block">
                                      <svg viewBox="0 0 112 690" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path
                                              d="M2.14577e-06 0H62.7586V172C38.6207 384 112 517 112 517V690H2.14577e-06V0Z"
                                              fill="currentColor" />
                                      </svg>
                                  </div>

                              </a>
                              <div class="col-12 col-md-6 order-md-1">

                                  <!-- Body -->
                                  <a class="card-body" href="{{ route('buku', $item->slug) }}">

                                      <!-- Heading -->
                                      <h3>
                                          {{ $item->judul }}.
                                      </h3>

                                      <!-- Text -->
                                      <!-- badge-->
                                      <span class="badge badge-primary">{{ $item->isbn_isnn }}</span>
                                      <span class="badge badge-secondary">{{ $item->tahun_terbit }}</span>
                                      <span
                                          class="badge badge-success">{{ ucwords($item->buku_transaksi[0]->penerbit->nama_penerbit) }}</span>
                                      @isset($item->topik->jenis_topik)
                                      <span class="badge badge-danger">{{ ucwords($item->topik->jenis_topik) }}</span>
                                      @endisset
                                      <span
                                          class="badge badge-warning">{{ ucwords($item->buku_transaksi[0]->bahasa->jenis_bahasa) }}</span>
                                      <span class="badge badge-info">{{ $item->deskripsi_fisik }}</span>
                                      <span class="badge badge-light">
                                          {{ $item->bibliobigrafi[0]->lokasi_rak->kode_lokasi }} -
                                          {{ ucwords($item->bibliobigrafi[0]->lokasi_rak->nama_lokasi) }}</span>
                                      <span class="badge badge-dark">{{ $item->bibliobigrafi[0]->no_panggil }}</span>
                                      <p class="mb-0 text-muted mt-4">
                                          This is the body text of the blog post to give visitors an idea of what the
                                          post is about beyond just the title. It can be a long snippet, a short
                                          snippet, whatever you prefer the size of card and description to be.
                                      </p>

                                  </a>

                                  <!-- Meta -->
                                  <a class="card-meta" href="{{ route('buku', $item->slug) }}">

                                      <!-- Divider -->
                                      <hr class="card-meta-divider">


                                      <!-- Author -->
                                      <h6 class="text-uppercase text-muted mr-2 mb-0">
                                          @foreach ($item->buku_transaksi as $p)
                                          {{ $p->pengarang->nama_pengarang }}
                                          @endforeach
                                      </h6>

                                      <!-- Date -->
                                      <p class="h6 text-uppercase text-muted mb-0 ml-auto">
                                          <time datetime="{{ $item->created_at }}">{{ $item->updated_at }}</time>
                                      </p>

                                  </a>

                              </div>

                          </div> <!-- / .row -->
                      </div>
                      @else
                      <!-- Card -->
                      <div class="card card-row shadow-light-lg mb-6">
                          <div class="row no-gutters">
                              <div class="col-12">

                                  <!-- Badge -->
                                  <span style="background: {{ $item->topik->warna }}"
                                      class="badge badge-pill badge-float badge-float-outside">
                                      <span
                                          class="h6 text-white text-uppercase">{{ ucwords($item->topik->jenis_topik) }}</span>
                                  </span>

                              </div>
                              <a class="col-12 col-md-6 bg-cover card-img-left"
                                  href="{{ route('buku', $item->slug) }}">

                                  <!-- Image (placeholder) -->
                                  <div style="display: flex; background: {{ isset($item->topik->warna) ?$item->topik->warna : '#335eea' }}; width: 100%; height: 100%"
                                      class="card-img-top">
                                      <div style="background:url('{{  url('storage/cover/'.$item->gambar_sampul) }}') center no-repeat;background-size: cover; width: 115px;
                                                    height: 160px;margin: auto; display:flex; align-self: center
                                                box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.25);"></div>
                                  </div>

                                  <!-- Shape -->
                                  <div class="shape shape-right shape-fluid-y svg-shim text-white d-none d-md-block">
                                      <svg viewBox="0 0 112 690" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M116 0H51V172C76 384 0 517 0 517V690H116V0Z" fill="currentColor" />
                                      </svg>
                                  </div>

                              </a>
                              <div class="col-12 col-md-6">

                                  <!-- Body -->
                                  <a class="card-body" href="{{ route('buku', $item->slug) }}">

                                      <!-- Heading -->
                                      <h3>
                                          {{ $item->judul }}
                                      </h3>

                                      <!-- Text -->
                                      <!-- badge-->
                                      <span class="badge badge-primary">{{ $item->isbn_isnn }}</span>
                                      <span class="badge badge-secondary">{{ $item->tahun_terbit }}</span>
                                      <span
                                          class="badge badge-success">{{ ucwords($item->buku_transaksi[0]->penerbit->nama_penerbit) }}</span>
                                      @isset($item->topik->jenis_topik)
                                      <span class="badge badge-danger">{{ ucwords($item->topik->jenis_topik) }}</span>
                                      @endisset
                                      <span
                                          class="badge badge-warning">{{ ucwords($item->buku_transaksi[0]->bahasa->jenis_bahasa) }}</span>
                                      <span class="badge badge-info">{{ $item->deskripsi_fisik }}</span>
                                      <span class="badge badge-light">
                                          {{ $item->bibliobigrafi[0]->lokasi_rak->kode_lokasi }} -
                                          {{ ucwords($item->bibliobigrafi[0]->lokasi_rak->nama_lokasi) }}</span>
                                      <span class="badge badge-dark">{{ $item->bibliobigrafi[0]->no_panggil }}</span>
                                      <p class="mb-0 text-muted mt-4">
                                          This is the body text of the blog post to give visitors an idea of what the
                                          post is about beyond just the title. It can be a long snippet, a short
                                          snippet, whatever you prefer the size of card and description to be.
                                      </p>

                                  </a>

                                  <!-- Meta -->
                                  <a class="card-meta" href="{{ route('buku', $item->slug) }}">

                                      <!-- Divider -->
                                      <hr class="card-meta-divider">


                                      <!-- Author -->
                                      <h6 class="text-uppercase text-muted mr-2 mb-0">
                                            @php
                                            $i = 0;
                                            $tr = [];   
                                           @endphp
                                           @foreach ($item->buku_transaksi as $p)
                                           @php
                                           $tr[$i++] = $p->pengarang->nama_pengarang;
                                           // array_push($tr, );
                                        //    print_r(join(', ', $tr));
                                           @endphp
                                           @endforeach

                                           @php  print_r(join(', ', $tr)) @endphp
                                      </h6>

                                      <!-- Date -->
                                      <p class="h6 text-uppercase text-muted mb-0 ml-auto">
                                          <time datetime="{{ $item->created_at }}">{{ $item->updated_at }}</time>
                                      </p>

                                  </a>

                              </div>

                          </div>
                      </div>
                      @endif
                  </div>
              </div> <!-- / .row -->
              @endforeach
          </div> <!-- / .container -->
      </section>

      <!-- ARTICLES
                ================================================== -->
      <section class="pb-8 pt-7 pb-md-11 pt-md-10">

          {{ $terbaru->links() }}
      </section>
