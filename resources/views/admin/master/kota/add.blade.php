@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="header-body">
        <!-- Card stats -->
        @include('admin.component.card-home')

        <!-- overview panel -->
        <div class="container-fluid mt--7">
        <form-kota-component fetch="{{ route('kota.store') }}" index="{{ route('kota.index') }}"></form-kota-component>
            @endsection
