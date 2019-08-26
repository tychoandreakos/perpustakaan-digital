@extends('layouts.app')
@section('main')


<!-- CONTENT
    ================================================== -->
<section class="section-border border-primary">
    <div class="container d-flex flex-column">
        <div class="row align-items-center justify-content-center no-gutters min-vh-100">
            <div class="col-12 col-md-5 col-lg-6 py-8 py-md-11">

                <!-- Heading -->
                <h1 class="mb-0 font-weight-bold text-center">
                    Sign up
                </h1>

                <!-- Text -->
                <p class="mb-6 text-center text-muted">
                    Simplify your workflow in minutes.
                </p>

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <!-- Create Post Form -->

                <!-- Form -->
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Email -->
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="email">
                                    ID / NPM
                                </label>
                                <input autocomplete="off" id="id" type="text"
                                    class="form-control @error('id') is-invalid @enderror" name="id"
                                    value="{{ old('id') }}" placeholder="Masukkan NPM / ID" required autocomplete="id"
                                    autofocus>

                                @error('id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="email">
                                    Nama Lengkap
                                </label>
                                <input autocomplete="off" id="name" type="text" placeholder="Masukkan Nama Lengkap"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="email">
                            Email Address
                        </label>
                        <input autocomplete="off" id="email" placeholder="example@mail.com" type="email"
                            class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>



                    <!-- Password -->
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-5">
                                <label for="password">
                                    Password
                                </label>
                                <input autocomplete="off" id="password" placeholder="************" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" placeholder="************" type="password"
                                        class="form-control" name="password_confirmation" required
                                        autocomplete="new-password">
                            </div>

                        </div>
                    </div>



                    <!-- Submit -->
                    <button class="btn btn-block btn-primary" type="submit">
                        {{ __('Daftar Sekarang!') }}
                    </button>

                </form>

                <!-- Text -->
                <p class="mb-0 mt-2 font-size-sm text-center text-muted">
                   Jika sudah memiliki akun silahkan <a href="{{ route('login') }}">Masuk</a>.
                </p>

            </div>
        </div> <!-- / .row -->
    </div> <!-- / .container -->
</section>

@endsection
