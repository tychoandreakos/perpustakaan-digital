@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="header-body">
        <!-- Card stats -->
        @include('admin.component.card-home')
        {{-- {{ $tipe-anggota }} --}}
        <!-- overview panel -->
        <div class="container-fluid mt--7">
        <table-tipe-anggota-component fetch="{{ route('tipe-anggota.fetch') }}" index="{{ route('tipe-anggota.index') }}" route="{{ route('tipe-anggota.create') }}"></table-tipe-anggota-component>
            @endsection
