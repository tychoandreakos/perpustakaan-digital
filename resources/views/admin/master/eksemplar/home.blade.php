@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="header-body">
        <!-- Card stats -->
        @include('admin.component.card-home')
        {{-- {{ $gmd }} --}}
        <!-- overview panel -->
        <div class="container-fluid mt--7">
        <table-transaksi-eksemplar-component fetch="{{ route('transaksi-eksemplar.fetch') }}" index="{{ route('transaksi-eksemplar.index') }}" route="{{ route('transaksi-eksemplar.create') }}"></table-transaksi-eksemplar-component>
            @endsection
