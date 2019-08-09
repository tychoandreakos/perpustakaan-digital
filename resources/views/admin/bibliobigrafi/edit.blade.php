@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="header-body">
        <!-- Card stats -->
        @include('admin.component.card-home')
        <!-- overview panel -->
        <div class="container-fluid mt--7">
        <form-bibliobigrafi-component :fetch="{{ $bibliobigrafi }}" kota="{{ route('bibliobigrafi.kota') }}" pengarang="{{ route('bibliobigrafi.pengarang') }}" bahasa="{{ route('bibliobigrafi.bahasa') }}" klasifikasi="{{ route('bibliobigrafi.klasifikasi') }}" gmd="{{ route('bibliobigrafi.gmd') }}" lokasi="{{ route('bibliobigrafi.lokasi') }}" penerbit="{{ route('bibliobigrafi.penerbit') }}" index="{{ route('bibliobigrafi.index') }}"></form-bibliobigrafi-component>
            @endsection
