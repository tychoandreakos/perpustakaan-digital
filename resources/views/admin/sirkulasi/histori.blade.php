@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="header-body">
        <!-- Card stats -->
        @include('admin.component.card-home')
        {{-- {{ $sirkulasi }} --}}
        <!-- overview panel -->
        <div class="container-fluid mt--7">
        <histori-component fetch="{{ route('histori.fetch') }}" index="{{ route('sirkulasi.histori') }}"></histori-component>
            @endsection
