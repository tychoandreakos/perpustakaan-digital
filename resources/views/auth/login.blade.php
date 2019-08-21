@extends('layouts.app2')

@section('content')
<div class="container">


    <div class="row" style="z-index: 90">
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
    </div>


    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}
</div>

<div class="card-body">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6 offset-md-4">
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
            <div class="col-md-8 offset-md-4">
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
    </form>
</div>
</div>
</div>
</div> --}}
</div>
@endsection
