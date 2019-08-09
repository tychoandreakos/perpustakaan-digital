@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="header-body">
        <!-- Card stats -->
        @include('admin.component.card-home')

        <!-- overview panel -->
        <div class="container-fluid mt--7">
        <form-anggota-component fetch="{{ route('anggota.store') }}" tipe="{{ route('tipe-anggota.fetch') }}" index="{{ route('anggota.index') }}"></form-anggota-component>
            @endsection
