@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="header-body">
        <!-- Card stats -->
        @include('admin.component.card-home')
        {{-- {{ $gmd }} --}}
        <!-- overview panel -->
        <div class="container-fluid mt--7">
        <table-info-component fetch="{{ route('info.fetch') }}" index="{{ route('info.index') }}" route="{{ route('info.create') }}"></table-info-component>
            @endsection
