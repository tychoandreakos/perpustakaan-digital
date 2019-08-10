@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="header-body">
        <!-- Card stats -->
        @include('admin.component.card-home')
        {{-- {{ $gmd }} --}}
        <!-- overview panel -->
        <div class="container-fluid mt--7">
        <table-klasifikasi-component fetch="{{ route('klasifikasi.fetch') }}" index="{{ route('klasifikasi.index') }}" route="{{ route('klasifikasi.create') }}"></table-klasifikasi-component>
            @endsection
