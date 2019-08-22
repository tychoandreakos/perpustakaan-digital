@extends('layouts.boiler')

{{-- @include('layouts.user-navbar') --}}
@section('main')
<app-result :result="{{ $result }}"></app-result>
@endsection

