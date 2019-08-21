@extends('layouts.boiler')

{{-- @include('layouts.user-navbar') --}}
@section('main')
<app-home buku="{{ route('buku.fetch') }}" topik="{{ route('random.fetch') }}"></app-home>
@endsection

