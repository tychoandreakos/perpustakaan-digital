@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="header-body">
        <!-- Card stats -->
        @include('admin.component.card-home')

        <!-- overview panel -->
        <div class="container-fluid mt--7">
        <form-transaksi-eksemplar-component :fetch="{{ $transaksi-eksemplar }}" index="{{ route('transaksi-eksemplar.index') }}"></form-transaksi-eksemplar-component>
            @endsection
