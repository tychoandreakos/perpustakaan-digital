@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="header-body">
        <!-- Card stats -->
        @include('admin.component.card-home')

        <!-- overview panel -->
        <div class="container-fluid mt--7">
                <table-bilio-component fetch="{{ route('bibliobigrafi.fetch') }}" index="{{ route('bibliobigrafi.index') }}" route="{{ route('bibliobigrafi.create') }}"></table-bilio-component>
            @endsection
