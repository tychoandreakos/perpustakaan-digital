@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="header-body">
        <!-- Card stats -->
        @include('admin.component.card-home')

        <!-- overview panel -->
        <div class="container-fluid mt--7">
        <form-jurusan-component fetch="{{ route('jurusan.store') }}" index="{{ route('jurusan.index') }}"></form-jurusan-component>
            @endsection
