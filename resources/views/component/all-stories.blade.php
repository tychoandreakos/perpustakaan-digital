      <!-- ARTICLES
          ================================================== -->
      <section class="pt-8 pt-md-11">
          <div class="container">
              <div class="row">
                  <div class="col-12">

                      <!-- Heading -->
                      <h2 class="mb-0">
                          Semua Berita Terbaru Perpustakaan
                      </h2>

                      <!--  -->
                      <p class="mb-5 text-muted">
                          These span the grid's entire width with several options.
                      </p>

                  </div>
              </div> <!-- / .row -->
              @foreach ($result as $item)
              <div class="row">
                  <div class="col-12">
                      @if ($loop->iteration  % 2 == 0)
                      <!-- Card -->
                      <div class="card card-row shadow-light-lg mb-6">
                          <div class="row no-gutters">
                              <div class="col-12">

                                  <!-- Badge -->
                                  <span class="badge badge-pill badge-gray-600 badge-float badge-float-outside">
                                      <span class="h6 text-uppercase">Featured</span>
                                  </span>

                              </div>
                              <a class="col-12 col-md-6 order-md-2 bg-cover card-img-right"
                                  style="background-image: url({{ url('storage/berita/'. $item->img) }});" href="{{ route('berita', $item->slug) }}">

                                  <!-- Image (placeholder) -->
                                  <img src="{{ url('storage/berita/'. $item->img) }}" alt="..."
                                      class="img-fluid d-md-none invisible">

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
                                  <a class="card-body" href="{{ route('berita', $item->slug) }}">

                                      <!-- Heading -->
                                      <h3>
                                          {{ $item->judul }}.
                                      </h3>

                                      <!-- Text -->
                                      <p class="mb-0 text-muted">
                                          This is the body text of the blog post to give visitors an idea of what the
                                          post is about beyond just the title. It can be a long snippet, a short
                                          snippet, whatever you prefer the size of card and description to be.
                                      </p>

                                  </a>

                                  <!-- Meta -->
                                  <a class="card-meta" href="{{ route('berita', $item->slug) }}">

                                      <!-- Divider -->
                                      <hr class="card-meta-divider">

                                      <!-- Avatar -->
                                      <div class="avatar avatar-sm mr-2">
                                          <img src="{{ asset('img/avatars/avatar-1.jpg') }}" alt="..."
                                              class="avatar-img rounded-circle">
                                      </div>

                                      <!-- Author -->
                                      <h6 class="text-uppercase text-muted mr-2 mb-0">
                                          Ab Hadley
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
                                  <span class="badge badge-pill badge-gray-600 badge-float badge-float-outside">
                                      <span class="h6 text-uppercase">Featured</span>
                                  </span>

                              </div>
                              <a class="col-12 col-md-6 bg-cover card-img-left"
                                  style="background-image: url({{ url('storage/berita/'. $item->img) }});" href="{{ route('berita', $item->slug) }}">

                                  <!-- Image (placeholder) -->
                                  <img src="{{ url('storage/berita/'. $item->img) }}" alt="..."
                                      class="img-fluid d-md-none invisible">

                                  <!-- Shape -->
                                  <div class="shape shape-right shape-fluid-y svg-shim text-white d-none d-md-block">
                                      <svg viewBox="0 0 112 690" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M116 0H51V172C76 384 0 517 0 517V690H116V0Z" fill="currentColor" />
                                      </svg>
                                  </div>

                              </a>
                              <div class="col-12 col-md-6">

                                  <!-- Body -->
                                  <a class="card-body" href="{{ route('berita', $item->slug) }}">

                                      <!-- Heading -->
                                      <h3>
                                          {{ $item->judul }}
                                      </h3>

                                      <!-- Text -->
                                      <p class="mb-0 text-muted">
                                          This is the body text of the blog post to give visitors an idea of what the
                                          post is about beyond just the title. It can be a long snippet, a short
                                          snippet, whatever you prefer the size of card and description to be.
                                      </p>

                                  </a>

                                  <!-- Meta -->
                                  <a class="card-meta" href="{{ route('berita', $item->slug) }}">

                                      <!-- Divider -->
                                      <hr class="card-meta-divider">

                                      <!-- Avatar -->
                                      <div class="avatar avatar-sm mr-2">
                                          <img src="{{ asset('img/avatars/avatar-2.jpg') }}" alt="..."
                                              class="avatar-img rounded-circle">
                                      </div>

                                      <!-- Author -->
                                      <h6 class="text-uppercase text-muted mr-2 mb-0">
                                          Adolfo Hess
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
        {{ $result->links() }}
      </section>

