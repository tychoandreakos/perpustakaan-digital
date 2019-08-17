@extends('layouts.boiler')

{{-- @include('layouts.user-navbar') --}}
@section('main')
<app-home buku="{{ route('buku.fetch') }}"></app-home>
@endsection

