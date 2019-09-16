@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="header-body">
        <!-- Card stats -->
        @include('admin.component.card-home')
        {{-- {{ $gmd }} --}}
        <!-- overview panel -->
        <div class="container-fluid mt--7">
        <table-lokasi-component fetch="{{ route('lokasi.fetch') }}" index="{{ route('lokasi.index') }}" route="{{ route('lokasi.create') }}"></table-lokasi-component>
            @endsection
