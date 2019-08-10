@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="header-body">
        <!-- Card stats -->
        @include('admin.component.card-home')
        {{-- {{ $gmd }} --}}
        <!-- overview panel -->
        <div class="container-fluid mt--7">
        <table-eksemplar-keluar-component fetch="{{ route('eksemplar-keluar.fetch') }}" index="{{ route('eksemplar.keluar') }}"></table-eksemplar-keluar-component>
            @endsection
