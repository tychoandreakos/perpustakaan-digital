@extends('layouts.boiler')

{{-- @include('layouts.user-navbar') --}}
@section('main')
<app-home buku="{{ route('buku.fetch') }}" username="{{ ucwords(Auth::user()->name) }}" topik="{{ route('random.fetch') }}"></app-home>
@endsection

