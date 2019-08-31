@extends('layouts.app')
@section('main')


@include('component.navbar-landkit')


<app-lengkapi :anggota="{{ $anggota }}" store="{{ route('lengkapi.profile') }}" name="{{ ucwords(Auth::user()->name) }}"></app-lengkapi>
@endsection
