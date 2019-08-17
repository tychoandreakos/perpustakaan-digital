@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="header-body">
        <!-- Card stats -->
        @include('admin.component.card-home')

        <!-- overview panel -->
        <div class="container-fluid mt--7">
        <form-topik-component fetch="{{ route('topik.store') }}" datas="{{ route('topik.last') }}" index="{{ route('topik.index') }}"></form-topik-component>
            @endsection
