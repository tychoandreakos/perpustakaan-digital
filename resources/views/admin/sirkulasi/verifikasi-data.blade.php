@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="header-body">
        <!-- Card stats -->
        @include('admin.component.card-home')
        {{-- {{ $sirkulasi }} --}}
        <!-- overview panel -->
        <div class="container-fluid mt--7">
        <verifikasi-component :data="{{ $pinjam }}" fetch="{{ route('sirkulasi.pola') }}" index="{{ route('sirkulasi.digital') }}"></verifikasi-component>
            @endsection
