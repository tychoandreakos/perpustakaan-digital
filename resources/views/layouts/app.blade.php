<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Map -->
        <link href='../api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css' rel='stylesheet' />

        <!-- Theme CSS -->
        <link rel="stylesheet" href="{{ asset('css/user.css') }}">
    </head>

<body>

    <div id="app">
        
        @yield('main')

    </div>

    <!-- JAVASCRIPT
    ================================================== -->
    <!-- Libs JS -->
    {{-- <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script> --}}

 
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/countup.js/1.8.2/countUp.min.js'></script>

    <!-- Map -->
    <script src='../api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

    <!-- Theme JS -->
    <script src="{{ asset('js/user.js') }}"></script>
</body>

<!-- Mirrored from landkit.goodthemes.co/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Aug 2019 03:35:28 GMT -->

</html>
