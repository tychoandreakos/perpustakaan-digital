@extends('layouts.boiler')

{{-- @include('layouts.user-navbar') --}}
@section('main')
<app-result :result="{{ $topik }}"></app-result>
@endsection

