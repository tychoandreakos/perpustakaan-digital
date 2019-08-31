 <!-- IMAGE
    ================================================== -->
    <section data-jarallax data-speed=".8" class="py-12 py-md-15 bg-cover jarallax" style="background-image: url({{asset('img/covers/cover-8.jpg')}});"></section>

    <!-- HEADER
    ================================================== -->
    <section class="pt-8 pt-md-11">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-md-10 col-lg-9 col-xl-8">
            
            <!-- Heading -->
            <h1 class="display-4 text-center">
              {{ $result->judul }}
            </h1>

            <!-- Text -->
            <p class="lead mb-7 text-center text-muted">
             {{ substr(strip_tags($result->isi), 0, 188) }} ...
            </p>

            @include('component.author-profile')

    <!-- SECTION
    ================================================== -->
    <section class="pt-6 pt-md-8">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-md-10 col-lg-9 col-xl-8">
            
            <!-- Fugure -->
            <figure class="figure mb-7">

              <!-- Image -->
              <img class="figure-img img-fluid rounded lift lift-lg" src="{{ url('storage/berita/'.$result->img) }}" alt="...">

              <!-- Caption -->
              <figcaption class="figure-caption text-center">
                This is a caption on this photo for reference
              </figcaption>

            </figure>
            
            <!-- Text -->
           {!! $result->isi !!}

          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->
    </section>

    <!-- SECTION
    ================================================== -->
    <section class="pt-6 pt-md-8 pb-8 pb-md-11">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-md-10 col-lg-9 col-xl-8">

            {{-- <!-- Text -->
            <p class="mb-7">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, quod a illum, cumque recusandae quae ea tempore, fugit, expedita vero natus aliquam nulla accusamus! Commodi culpa quibusdam accusamus aspernatur eveniet.
            </p> --}}

            <!-- Meta -->
            @include('component.author-profile')

          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->
    </section>

    @include('component.latest-stories')

    <!-- CTA
    ================================================== -->
    <section class="pt-7 pt-md-10 bg-light">
    </section>