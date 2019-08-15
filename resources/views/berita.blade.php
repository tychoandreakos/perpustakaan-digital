@extends('layouts.boiler')

@section('main')
<app-article :berita="{{ $result }}"></app-article>
@endsection