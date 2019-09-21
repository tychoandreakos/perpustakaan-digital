@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="header-body">

        <!-- Card stats -->
        @include('admin.component.laporan-pinjam')
        {{-- {{ $gmd }} --}}
        <!-- overview panel -->
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col-xl-12 mb-5 mb-xl-0">
                    <div class="card bg-gradient-default shadow">
                        <div class="card-header bg-transparent">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                    <h2 class="text-white mb-0">Statistik Pengunjung Berdasarkan Buku Tamu</h2>
                                </div>
                                <div class="col">
                                    <ul class="nav nav-pills justify-content-end">
                                        <li class="nav-item">
                                        <a href="{{ route('print.tamu') }}" class="btn btn-danger py-2 px-3"><span
                                                    class="d-none d-md-block">Cetak Data</span> <span
                                                    class="d-md-none">W</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                                <div class="chart">
                                        <!-- Chart wrapper -->
                                        <canvas id="chart-sales2" class="chart-canvas"></canvas>
                                    </div>
                        </div>
                    </div>
                </div>
            </div>
            @endsection
