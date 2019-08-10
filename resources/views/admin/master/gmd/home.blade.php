@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="header-body">
        <!-- Card stats -->
        @include('admin.component.card-home')
        {{-- {{ $gmd }} --}}
        <!-- overview panel -->
        <div class="container-fluid mt--7">
        <table-gmd-component fetch="{{ route('gmd.fetch') }}" index="{{ route('gmd.index') }}" route="{{ route('gmd.create') }}"></table-gmd-component>
            @endsection
