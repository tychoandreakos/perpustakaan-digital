@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="header-body">
        <!-- Card stats -->
        @include('admin.component.card-home')

        <!-- overview panel -->
        <div class="container-fluid mt--7">
        <form-lokasi-component fetch="{{ route('lokasi.store') }}" index="{{ route('lokasi.index') }}"></form-lokasi-component>
            @endsection
