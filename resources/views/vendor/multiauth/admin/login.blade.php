<!--

=========================================================
* Argon Dashboard - v1.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2019 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        {{ config('app.name', 'Laravel') }}
    </title>
    <!-- Favicon -->
    <link href="{{ asset('img/brand/favicon.png') }}" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <link href="{{ asset('js/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    {{-- <link href="{{ asset('css/argon-dashboard.css') }}" rel="stylesheet" /> --}}
    <style>
        * {
            outline: none;
        }

    </style>
</head>

<body>
        <header class="header-global">
                <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light headroom">
                  <div class="container">
                    <a class="navbar-brand mr-lg-5" href="#">
                      <img src="../assets/img/brand/white.png" alt="DIGLIB STMIK">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="navbar-collapse collapse" id="navbar_global">
                      <div class="navbar-collapse-header">
                        <div class="row">
                          <div class="col-6 collapse-brand">
                            <a href="#">
                              <img src="../assets/img/brand/blue.png" alt="brand">
                            </a>
                          </div>
                          <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                              <span></span>
                              <span></span>
                            </button>
                          </div>
                        </div>
                    </div>    
                    </div>
                  </div>
                </nav>
              </header>
        <main>
                <section class="section section-shaped section-lg">
                  <div class="shape shape-style-1 bg-gradient-default">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                  </div>
                  <div class="container pt-lg-md">
                    <div class="row justify-content-center">
                      <div class="col-lg-5">
                        <div class="card bg-secondary shadow border-0">
                          <div class="card-header bg-white pb-2">
                            <div class="text-muted text-center mb-3">
                                <h3 class="text-muted">{{ strtoupper(config('multiauth.prefix')) }} LOGIN</h3>
                            </div>
                            
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>Username atau password anda salah!</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                          </div>
                          <div class="card-body">
                            <div class="text-center text-muted">
                            </div>
                            <form method="POST" action="{{ route('admin.login') }}" aria-label="{{ __('Admin Login') }}">
                                    @csrf
                              <div class="form-group mb-3">
                                <div class="input-group input-group-alternative">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                  </div>
                                  <input id="email" placeholder="Email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"
                                  required autofocus> @if ($errors->has('email'))
                              <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('email') }}</strong>
                                  </span> @endif
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="input-group input-group-alternative">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                  </div>
                                  <input id="password" placeholder="Password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                  required> @if ($errors->has('password'))
                              <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('password') }}</strong>
                                  </span> @endif
                                </div>
                              </div>
                              <div class="custom-control custom-control-alternative custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" name="remember" id="customCheckLogin" {{ old( 'remember') ? 'checked' : '' }}>
                                {{-- <input class="custom-control-input" id="customCheckLogin" type="checkbox"> --}}
                                <label class="custom-control-label" for="customCheckLogin">
                                    
                                  <span>Remember me</span>
                                </label>
                              </div>
                              <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4">Masuk</button>
                              </div>
                            </form>
                          </div>
                        </div>
                        <div class="row mt-3">
                          <div class="col-6">
                               <a class="text-light" href="{{ route('admin.password.request') }}">
                                 
                                    <small>   {{ __('Forgot Your Password?') }}</small>
                                </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              </main>


    <!--   Core   -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
</body>

</html>