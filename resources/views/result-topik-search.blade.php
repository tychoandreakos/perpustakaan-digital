@extends('layouts.boiler')

{{-- @include('layouts.user-navbar') --}}
@section('main')
<app-result-search :result="{{ $result }}"></app-result-search>
@endsection

