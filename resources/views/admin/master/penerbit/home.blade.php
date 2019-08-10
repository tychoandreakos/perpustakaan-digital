@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="header-body">
        <!-- Card stats -->
        @include('admin.component.card-home')
        {{-- {{ $gmd }} --}}
        <!-- overview panel -->
        <div class="container-fluid mt--7">
        <table-penerbit-component fetch="{{ route('penerbit.fetch') }}" index="{{ route('penerbit.index') }}" route="{{ route('penerbit.create') }}"></table-penerbit-component>
            @endsection
