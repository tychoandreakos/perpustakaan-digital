@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="header-body">
        <!-- Card stats -->
        @include('admin.component.card-home')

        <!-- overview panel -->
        <div class="container-fluid mt--7">
        <form-bibliobigrafi-component peng="{{ route('pengarang.store') }}" fetch="{{ route('bibliobigrafi.store') }}" pola="{{ route('bibliobigrafi.pola') }}" penerbit="{{ route('bibliobigrafi.penerbit') }}" bukus="{{ route('buku.store') }}" kota="{{ route('bibliobigrafi.kota') }}" pol="{{ route('eksemplar.store') }}" gmd="{{ route('bibliobigrafi.gmd') }}" pengarang="{{ route('bibliobigrafi.pengarang') }}" lokasi="{{ route('bibliobigrafi.lokasi') }}" bahasa="{{ route('bibliobigrafi.bahasa') }}" klasifikasi="{{ route('bibliobigrafi.klasifikasi') }}"  index="{{ route('bibliobigrafi.index') }}"></form-bibliobigrafi-component>
            @endsection
