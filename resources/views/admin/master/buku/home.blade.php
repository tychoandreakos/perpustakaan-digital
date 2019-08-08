@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="header-body">
        <!-- Card stats -->
        @include('admin.component.card-home')
        {{-- {{ $gmd }} --}}
        <!-- overview panel -->
        <div class="container-fluid mt--7">
        <table-buku-component fetch="{{ route('buku.fetch') }}" index="{{ route('buku.index') }}" route="{{ route('buku.create') }}"></table-buku-component>
            @endsection
