@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="header-body">
        <!-- Card stats -->
        @include('admin.component.card-home')

        <!-- overview panel -->
        <div class="container-fluid mt--7">
        <table-keterlambatan-component index="{{ route('keterlambatan') }}" send="{{ route('send') }}" store="{{ route('denda') }}" fetch="{{ route('terlambat.fetch') }}"></table-keterlambatan-component>
            @endsection
