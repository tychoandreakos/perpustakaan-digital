@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="header-body">
        <!-- Card stats -->
        @include('admin.component.card-home')

        <!-- overview panel -->
        <div class="container-fluid mt--7">
        <form-buku-component :fetch="{{ $buku }}" index="{{ route('buku.index') }}"></form-buku-component>
            @endsection
