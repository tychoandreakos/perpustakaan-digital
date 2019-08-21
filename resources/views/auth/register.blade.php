@extends('layouts.app2')

{{-- @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

<div class="card-body">
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group row">
            <label for="name">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="email">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm">{{ __('Confirm Password') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                    autocomplete="new-password">
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
</div>
@endsection --}}

@section('content')
<div class="row">
    <div class="col col-lg-6">
        <img class="img-wow" src="https://cdn.dribbble.com/users/103909/screenshots/5964957/welcome-preview-01_2x.png" alt="gambar">
    </div>
    <div class="col col-lg-6">
        <div class="col col-md-9 pt-5">
            <h2>Selamat Datang DI DIGLIB STMIK AMIK BANDUNG</h2>
        </div>
        <p style="border-bottom: 0;" class="ml-1 col-8">Silahkan isi lengkap data diri anda pada formulir dibawah ini.</p>
        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <label class="ml-3" for="id">{{ __('NPM / ID') }}</label>

                    <div class="col-md-10">
                        <input id="id" type="text" class="form-control @error('id') is-invalid @enderror"
                            name="id" value="{{ old('id') }}" placeholder="Masukkan NPM / ID" required autocomplete="id" autofocus>

                        @error('id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="ml-3" for="name">{{ __('Nama Lengkap') }}</label>

                    <div class="col-md-10">
                        <input id="name" type="text" placeholder="Masukkan Nama Lengkap" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="ml-3" for="email">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-10">
                        <input id="email" placeholder="example@mail.com" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="ml-3" for="password">{{ __('Password') }}</label>

                    <div class="col-md-10">
                        <input id="password" placeholder="************" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="ml-3" for="password-confirm">{{ __('Confirm Password') }}</label>

                    <div class="col-md-10">
                        <input id="password-confirm" placeholder="************" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password">
                    </div>
                </div>

                <div class="form-group mb-0">
                    <div class="col-md-10 text-right">
                        <button type="submit" class="btn register">
                            {{ __('Daftar Sekarang!') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
