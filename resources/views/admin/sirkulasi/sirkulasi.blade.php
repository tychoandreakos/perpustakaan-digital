@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="header-body">
        <!-- Card stats -->
        @include('admin.component.card-home')
        {{-- {{ $sirkulasi }} --}}
        <!-- overview panel -->
        <div class="container-fluid mt--7">
        <table-sirkulasi-component eksemplar="{{ route('bibliobigrafi.sirkulasi') }}" store="{{ route('pinjam.store') }}" perpanjangs="{{ route('pinjam.perpanjang') }}" fetch="{{ route('anggota.fetch') }}"></table-sirkulasi-component>
            @endsection
