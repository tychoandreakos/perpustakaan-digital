@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="header-body">
        <!-- Card stats -->
        @include('admin.component.card-home')
        {{-- {{ $gmd }} --}}
        <!-- overview panel -->
        <div class="container-fluid mt--7">
        <table-bibliobigrafi-component fetch="{{ route('bibliobigrafi.fetch') }}" index="{{ route('bibliobigrafi.index') }}" route="{{ route('bibliobigrafi.create') }}"></table-bibliobigrafi-component>
            @endsection
