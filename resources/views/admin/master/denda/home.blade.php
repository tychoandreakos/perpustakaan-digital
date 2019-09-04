@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="header-body">
        <!-- Card stats -->
        @include('admin.component.card-home')
        {{-- {{ $gmd }} --}}
        <!-- overview panel -->
        <div class="container-fluid mt--7">
        <table-denda-component fetch="{{ route('denda.fetch') }}" index="{{ route('denda.index') }}" route="{{ route('denda.create') }}"></table-denda-component>
            @endsection
