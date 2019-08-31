  <!-- TESTIMONIALS
      ================================================== -->
  <section class="pt-6 pt-md-6">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-12 col-md-10 col-lg-8 text-center">

                  <!-- Heading -->
                  <h2>
                      Berita Perpustakaan
                  </h2>

                  <!-- Text -->
                  <p class="font-size-lg text-muted mb-7 mb-md-9">
                      We dont' like to brag, but we don't mind letting our customers do it for us. Here are a few nice
                      things folks have said about our themes over the years.
                  </p>

              </div>
          </div> <!-- / .row -->
          <div class="row">
              <div class="col-12">

                  <!-- Card -->
                  <div class="card card-row shadow-light-lg mb-6">
                      <div class="row no-gutters">
                          <div class="col-12 col-md-6">

                              <!-- Slider -->
                              <div class="card-img-slider"
                                  data-flickity='{"fade": true, "imagesLoaded": true, "pageDots": false, "prevNextButtons": false, "asNavFor": "#blogSlider", "draggable": false}'>

                                  @foreach ($berita as $item)
                                  <a class="card-img-left bg-cover"
                                      style="background-image: url({{ url('storage/berita/'.$item->img) }});"
                                      href="{{ route('berita', $item->slug) }}">

                                      <!-- Image (placeholder) -->
                                      <img src="{{ url('storage/resize/'.$item->img) }}" alt="..."
                                          class="img-fluid d-md-none invisible">

                                  </a>
                                  @endforeach
                              </div>

                              <!-- Shape -->
                              <div class="shape shape-right shape-fluid-y svg-shim text-white d-none d-md-block">
                                  <svg viewBox="0 0 112 690" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M116 0H51V172C76 384 0 517 0 517V690H116V0Z" fill="currentColor" />
                                  </svg>
                              </div>

                          </div>

                          <div class="col-12 col-md-6 position-static">

                              <!-- Slider -->
                              <div class="position-static"
                                  data-flickity='{"wrapAround": true, "pageDots": false, "imagesLoaded": true, "adaptiveHeight": true}'
                                  id="blogSlider">

                                  @foreach ($berita as $item)
                                  <div class="w-100">

                                      <!-- Body -->
                                      <div class="card-body">
                                          <blockquote class="blockquote text-center mb-0">

                                              <!-- Brand -->
                                              <div class="row justify-content-center mb-5 mb-md-7">
                                                  <a href="{{ route('berita', $item->slug) }}">
                                                      <h3>{{ substr($item->judul, 0, 125) }}</h3>
                                                  </a>
                                              </div> <!-- / .row -->

                                              <!-- Text -->
                                              <p class="mb-5 mb-md-7">
                                                  {!! substr($item->isi, 0, 150) !!} ...
                                              </p>

                                              <!-- Footer -->
                                              <footer class="blockquote-footer">
                                                  <span class="h6 text-uppercase">{{ ucwords($item->admin->name) }}</span>
                                              </footer>

                                          </blockquote>
                                      </div>

                                  </div>
                                  @endforeach


                              </div>

                          </div>
                      </div> <!-- / .row -->
                  </div>

              </div>
          </div> <!-- / .row -->
      </div> <!-- / .container -->
  </section>
