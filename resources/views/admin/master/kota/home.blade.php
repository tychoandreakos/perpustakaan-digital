@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="header-body">
        <!-- Card stats -->
        @include('admin.component.card-home')
        {{-- {{ $gmd }} --}}
        <!-- overview panel -->
        <div class="container-fluid mt--7">
        <table-kota-component fetch="{{ route('kota.fetch') }}" index="{{ route('kota.index') }}" route="{{ route('kota.create') }}"></table-kota-component>
            @endsection
