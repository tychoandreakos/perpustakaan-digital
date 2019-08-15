@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="header-body">
        <!-- Card stats -->
        @include('admin.component.card-home')

        <!-- overview panel -->
        <div class="container-fluid mt--7">
                <table-berita-component fetch="{{ route('berita.fetch') }}" index="{{ route('berita.index') }}" route="{{ route('berita.create') }}"></table-berita-component>
            @endsection
