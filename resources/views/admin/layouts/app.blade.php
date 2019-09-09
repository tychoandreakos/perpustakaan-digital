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
    <link href="{{ asset('img/brand/logo.png') }}" rel="icon" type="image/png">
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

    @include('admin.partials.sidebar')

    <div id="app" class="main-content">
        @include('admin.partials.navbar')

        <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">

            @yield('content')

            @include('admin.partials.footer')

        </div>
    </div>

    <!--   Core   -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
</body>

</html>
