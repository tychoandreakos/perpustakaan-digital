@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="header-body">
        <!-- Card stats -->
        @include('admin.component.card-home')
        {{-- {{ $sirkulasi }} --}}
        <!-- overview panel -->
        <div class="container-fluid mt--7">
        <digital-component fetch="{{ route('sirkulasi.pola2') }}" index="{{ route('eksemplar.keluar') }}" kode2="{{ route('sirkulasi.digital2') }}" kode="{{ route('sirkulasi.verifikasi') }}"></digital-component>
            @endsection
