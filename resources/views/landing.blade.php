@extends('layouts.app')
@section('main')

@include('component.navbar-landkit')


@include('component.hero')
@include('component.fitur')

    @isset($berita)
    @include('component.news')
    @endisset

@include('component.total')
@include('component.footer')

@endsection
