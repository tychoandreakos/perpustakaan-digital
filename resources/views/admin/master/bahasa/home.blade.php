@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="header-body">
        <!-- Card stats -->
        @include('admin.component.card-home')
        {{-- {{ $gmd }} --}}
        <!-- overview panel -->
        <div class="container-fluid mt--7">
        <table-bahasa-component fetch="{{ route('bahasa.fetch') }}" index="{{ route('bahasa.index') }}" route="{{ route('bahasa.create') }}"></table-bahasa-component>
            @endsection
