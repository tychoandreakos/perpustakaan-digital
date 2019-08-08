@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="header-body">
        <!-- Card stats -->
        @include('admin.component.card-home')

        <!-- overview panel -->
        <div class="container-fluid mt--7">
        <form-penerbit-component fetch="{{ route('penerbit.store') }}" index="{{ route('penerbit.index') }}"></form-penerbit-component>
            @endsection
