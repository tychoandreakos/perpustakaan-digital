@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="header-body">
        <!-- Card stats -->
        @include('admin.component.card-home')
        {{-- {{ $sirkulasi }} --}}
        <!-- overview panel -->
        <div class="container-fluid mt--7">
        <kembali-component fetch="{{ route('pengembalian.fetch') }}" index="{{ route('sirkulasi.pengembalian') }}" kembali="{{ route('sirkulasi.kembali') }}" back="{{ route('sirkulasi.pengembalian') }}"></kembali-component>
            @endsection
