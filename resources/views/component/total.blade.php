   <!-- SHAPE
      ================================================== -->
      <div class="position-relative mt-n8">
            <div class="shape shape-bottom shape-fluid-x svg-shim text-gray-200">
              <svg viewBox="0 0 2880 480" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M2160 0C1440 240 720 240 720 240H0V480H2880V0H2160Z" fill="currentColor"/>
              </svg>
            </div>
          </div>
      
          <!-- STATS
          ================================================== -->
          <section class="pt-12 pt-md-13 bg-gray-200">
            <div class="container">
              <div class="row align-items-center">
                <div class="col-12 col-md-5 col-lg-6 order-md-2">
                  
                  <!-- Image -->
                  <img src="{{ asset('img/illustrations/illustration-8.png') }}" alt="..." class="img-fluid mb-6 mb-md-0">
      
                </div>
                <div class="col-12 col-md-7 col-lg-6 order-md-1">
                  
                  <!-- Heading -->
                  <h2>
                   Ayok daftar sekarang juga di <br>
                    <span class="text-primary">Diglib STMIK AMIKBANDUNG</span>.
                  </h2>
      
                  <!-- Text -->
                  <p class="font-size-lg text-gray-700 mb-6">
                    You have a business to run. Stop worring about cross-browser bugs, designing new pages, keeping your components up to date. Let us do that for you.
                  </p>
      
                  <!-- Stats -->
                  <div class="d-flex">
                    <div class="pr-5">
                      <h3 class="mb-0">
                        <span data-toggle="countup" data-from="0" data-to="{{ $pdf }}" data-aos data-aos-id="countup:in"></span>
                      </h3>
                      <p class="text-gray-700 mb-0">
                      PDF
                      </p>
                    </div>
                    <div class="border-left border-gray-300"></div>
                    <div class="px-5">
                      <h3 class="mb-0">
                          <span data-toggle="countup" data-from="0" data-to="{{ $anggota }}" data-aos data-aos-id="countup:in"></span>
                      </h3>
                      <p class="text-gray-700 mb-0">
                      Anggota
                      </p>
                    </div>
                    <div class="border-left border-gray-300"></div>
                    <div class="pl-5">
                      <h3 class="mb-0">
                        <span data-toggle="countup" data-from="0" data-to="{{ $buku }}" data-aos data-aos-id="countup:in"></span>
                      </h3>
                      <p class="text-gray-700 mb-0">
                        Koleksi Buku
                      </p>
                    </div>
                  </div>
      
                </div>
              </div> <!-- / .row --> 
            </div> <!-- / .container -->
          </section>