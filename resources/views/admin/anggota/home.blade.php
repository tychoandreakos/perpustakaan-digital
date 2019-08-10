@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="header-body">
        <!-- Card stats -->
        @include('admin.component.card-home')
        {{-- {{ $gmd }} --}}
        <!-- overview panel -->
        <div class="container-fluid mt--7">
        <table-anggota-component fetch="{{ route('anggota.fetch') }}" index="{{ route('anggota.index') }}" route="{{ route('anggota.create') }}"></table-anggota-component>
            @endsection
