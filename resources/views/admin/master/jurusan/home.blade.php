@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="header-body">
        <!-- Card stats -->
        @include('admin.component.card-home')
        {{-- {{ $gmd }} --}}
        <!-- overview panel -->
        <div class="container-fluid mt--7">
        <table-jurusan-component fetch="{{ route('jurusan.fetch') }}" index="{{ route('jurusan.index') }}" route="{{ route('jurusan.create') }}"></table-jurusan-component>
            @endsection
