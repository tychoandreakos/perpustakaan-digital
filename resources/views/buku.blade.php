@extends('layouts.boiler')

@section('main')
<app-buku-result :buku="{{ $result }}"></app-buku-result>
@endsection