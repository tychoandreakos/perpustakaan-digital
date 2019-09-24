@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="header-body">
        <!-- Card stats -->
        @include('admin.component.card-home')
        {{-- {{ $sirkulasi }} --}}
        <!-- overview panel -->
        <div class="container-fluid mt--7">
        <table-sirkulasi-component index3={{ route('denda.index') }} send="{{ route('send') }}" saat="{{ route('saat.ini') }}" stores2="{{ route('denda') }}" terlambat="{{ route('denda.index') }}" back="{{ route('sirkulasi.kembali2') }}" index="{{ route('eksemplar.keluar') }}" eksemplar="{{ route('bibliobigrafi.sirkulasi') }}" store="{{ route('pinjam.store') }}" perpanjangs="{{ route('pinjam.perpanjang') }}" fetch="{{ route('anggota.fetch') }}"></table-sirkulasi-component>
            @endsection
