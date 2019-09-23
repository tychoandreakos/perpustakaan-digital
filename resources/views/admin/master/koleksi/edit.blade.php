@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="header-body">
        <!-- Card stats -->
        @include('admin.component.card-home')

        <!-- overview panel -->
        <div class="container-fluid mt--7">
        <form-koleksi-component :fetch="{{ $koleksi2 }}" index="{{ route('koleksi.index') }}"></form-koleksi-component>
            @endsection
