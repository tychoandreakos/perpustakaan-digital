@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="header-body">
        <!-- Card stats -->
        @include('admin.component.card-home')
        {{-- {{ $gmd }} --}}
        <!-- overview panel -->
        <div class="container-fluid mt--7">
        <table-pengarang-component fetch="{{ route('pengarang.fetch') }}" index="{{ route('pengarang.index') }}" route="{{ route('pengarang.create') }}"></table-pengarang-component>
            @endsection
