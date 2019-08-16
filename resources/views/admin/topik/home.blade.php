@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="header-body">
        <!-- Card stats -->
        @include('admin.component.card-home')

        <!-- overview panel -->
        <div class="container-fluid mt--7">
                <table-topik-component fetch="{{ route('topik.fetch') }}" index="{{ route('topik.index') }}" route="{{ route('topik.create') }}"></table-topik-component>
            @endsection
