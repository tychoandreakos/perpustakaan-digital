@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="header-body">
        <!-- Card stats -->
        @include('admin.component.card-home')

        <!-- overview panel -->
        <div class="container-fluid mt--7">
        <form-berita-component fetch="{{ route('berita.store') }}" index="{{ route('berita.index') }}"></form-berita-component>
            @endsection
