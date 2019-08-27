@extends('layouts.app')

@section('main')
<div class="container">


      <!-- CONTENT
    ================================================== -->
    <section class="section-border border-primary">
            <div class="container d-flex flex-column">
              <div class="row align-items-center justify-content-center no-gutters min-vh-100">
                <div class="col-8 col-md-6 col-lg-7 offset-md-1 order-md-2 mt-auto mt-md-0 pt-8 pb-4 py-md-11">
      
                  <!-- Image -->
                  <img src="{{ asset('img/illustrations/illustration-2.png') }}" alt="..." class="img-fluid">
      
                </div>
                <div class="col-12 col-md-5 col-lg-4 order-md-1 mb-auto mb-md-0 pb-8 py-md-11">
                  
                  <!-- Heading -->
                  <h1 class="mb-0 font-weight-bold text-center">
                    Sign in
                  </h1>
      
                  <!-- Text -->
                  <p class="mb-6 text-center text-muted">
                    Simplify your workflow in minutes.
                  </p>
      
                  <!-- Form -->
                  <form method="POST" action="{{ route('login') }}" class="mb-6">
                        @csrf
      
                    <!-- Email -->
                    <div class="form-group">
                      <label for="email">
                       Npm / ID
                      </label>
                      <input id="id" placeholder="Masukkan NPM Anda" type="text" class="form-control @error('id') is-invalid @enderror" name="id"
                      value="{{ old('id') }}" required autocomplete="off" autofocus>
                      @error('id')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror</div>
      
                    <!-- Password -->
                    <div class="form-group mb-5">
                      <label for="password">
                        Password
                      </label>
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                      name="password" required autocomplete="current-password" placeholder="******************">
                          @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                    </div>
      
                    <!-- Submit -->
                    <button class="btn btn-block btn-primary" type="submit">
                      Masuk
                    </button>
      
                  </form>
      
                  <!-- Text -->
                  <p class="mb-0 font-size-sm text-center text-muted">
                   Silahkan daftar jika belum, <a href="{{ route('register') }}">Daftar</a>.
                  </p>
      
                </div>
              </div> <!-- / .row -->
            </div> <!-- / .container -->
          </section>

    {{-- <div class="row" style="z-index: 90">
        <div class="col col-lg-6">
            <div class="s" style="padding-top: 2rem; padding-left: 4rem;">
                <h2 class="mb-3">Login DIGLIB STMIK AMIKBANDUNG</h2>

                <h4>Selamat Datang</h4>
                <span>Silahkan masukkan ID & Password anda.</span>
                <form method="POST" action="{{ route('login') }}" class="mt-4">
                    @csrf
                    <div class="form-group">
                        <label for="id_anggota">ID Anggota</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="id_anggota">Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password" placeholder="******************">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>
                
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                
                        <div class="form-group row mb-0">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                
                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    <div class="mt-3">
                        <span>Belum menjadi anggota?  <a href="{{ route('register') }}">{{ __('Daftar') }}</a></span>
                    </div>
                </form>
            </div>
        </div>


        <div class="col col-lg-6" style="z-index: -1">
            <img style="margin-left: -130px"
                src="https://cdn.dribbble.com/users/369527/screenshots/4301615/pietrasiak_.png">
        </div>
    </div> --}}
   
</div>
@endsection
