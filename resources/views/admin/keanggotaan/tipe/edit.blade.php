@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="header-body">
        <!-- Card stats -->
        @include('admin.component.card-home')
        <!-- overview panel -->
        <div class="container-fluid mt--7">
        <form-tipe-anggota-component :fetch="{{ $tipeAnggotum }}" index="{{ route('tipe-anggota.index') }}"></form-tipe-anggota-component>
            @endsection
