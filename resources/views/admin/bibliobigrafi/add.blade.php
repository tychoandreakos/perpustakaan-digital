@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="header-body">
        <!-- Card stats -->
        @include('admin.component.card-home')

        <!-- overview panel -->
        <div class="container-fluid mt--7">
        <form-bibliobigrafi-component fetch="{{ route('bibliobigrafi.store') }}" penerbit="{{ route('bibliobigrafi.penerbit') }}" kota="{{ route('bibliobigrafi.kota') }}" gmd="{{ route('bibliobigrafi.gmd') }}" pengarang="{{ route('bibliobigrafi.pengarang') }}" lokasi="{{ route('bibliobigrafi.lokasi') }}" bahasa="{{ route('bibliobigrafi.bahasa') }}" klasifikasi="{{ route('bibliobigrafi.klasifikasi') }}"  index="{{ route('bibliobigrafi.index') }}"></form-bibliobigrafi-component>
            @endsection
