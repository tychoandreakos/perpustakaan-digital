@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="header-body">
        <!-- Card stats -->
        @include('admin.component.card-home')

        <!-- overview panel -->
        <div class="container-fluid mt--7">
        <form-klasifikasi-component :fetch="{{ $klasifikasi }}" index="{{ route('klasifikasi.index') }}"></form-klasifikasi-component>
            @endsection
