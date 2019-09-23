@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="header-body">
        <!-- Card stats -->
        @include('admin.component.card-home')
        {{-- {{ $gmd }} --}}
        <!-- overview panel -->
        <div class="container-fluid mt--7">
        <table-koleksi-component fetch="{{ route('koleksi.fetch') }}" index="{{ route('koleksi.index') }}" route="{{ route('koleksi.create') }}"></table-koleksi-component>
            @endsection
