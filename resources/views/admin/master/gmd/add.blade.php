@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="header-body">
        <!-- Card stats -->
        @include('admin.component.card-home')

        <!-- overview panel -->
        <div class="container-fluid mt--7">
        <form-gmd-component fetch="{{ route('gmd.store') }}" index="{{ route('gmd.index') }}"></form-gmd-component>
            @endsection
