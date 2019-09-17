@extends('layouts.app')
@section('main')

@include('component.navbar-landkit')


@include('component.hero')
@include('component.fitur')

    @if(!empty($berita))
    @include('component.news')
    @endif

@include('component.total')
@include('component.footer')

@endsection
