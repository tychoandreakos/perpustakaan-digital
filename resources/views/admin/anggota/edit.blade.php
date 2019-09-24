@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="header-body">
        <!-- Card stats -->
        @include('admin.component.card-home')

        <!-- overview panel -->
        <div class="container-fluid mt--7">
        <form-anggota-component tipeJurusan="{{ route('jurusan.store') }}" jur={{ route('jurusan.fetch') }} :users="{{ $users }}" :fetch="{{ $anggota }}" index="{{ route('anggota.index') }}" tipe="{{ route('tipe-anggota.fetch') }}"></form-anggota-component>
            @endsection
