@extends('layouts.boiler')

@section('main')
<div class="row">
    <div class="col col-lg-6">
        <h5>halo</h5>
    </div>
  <div class="row justify-content-center">
    <div class="col col-lg-12">
    <app-tamu store="{{ route('tool.tamu') }}"></app-tamu>
    </div>
  </div>
</div>
@endsection

