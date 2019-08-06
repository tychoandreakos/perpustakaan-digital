<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }} ">

    <title>Perpustakaan Amik</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body>

    <div id="app">
        <user-component></user-component>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
