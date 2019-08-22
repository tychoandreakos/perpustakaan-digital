@extends('layouts.boiler')

{{-- @include('layouts.user-navbar') --}}
@section('main')
<app-result-search :result="{{ $result }}" keyword="{{ $cari }}"></app-result-search>
@endsection

