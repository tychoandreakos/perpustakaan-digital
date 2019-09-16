@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="header-body">

        <!-- Card stats -->
        @include('admin.component.laporan-home')
        {{-- {{ $gmd }} --}}
        <!-- overview panel -->
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col-xl-8 mb-5 mb-xl-0">
                    <div class="card bg-gradient-default shadow">
                        <div class="card-header bg-transparent">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                    <h2 class="text-white mb-0">10 Buku Baru Yang Terakhir Masuk</h2>
                                </div>
                                <div class="col">
                                    <ul class="nav nav-pills justify-content-end">
                                        <li class="nav-item">
                                        <a href="{{ route('print.koleksi') }}" class="btn btn-danger py-2 px-3"><span
                                                    class="d-none d-md-block">Cetak Data</span> <span
                                                    class="d-md-none">W</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <ol>
                                @if (!$popular->isEmpty())
                                @foreach ($popular as $item)
                                <li class="text-white">{{ ucwords($item->judul) }}</li>
                                @endforeach
                                @else
                                <div class="h4 text-white text-center">Belum ada data!</div>
                                @endif
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card shadow">
                        <div class="card-header bg-transparent">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="text-uppercase text-muted ls-1 mb-1">Statistik Buku Masuk</h6>
                                    <h2 class="mb-0">Total Buku Masuk</h2>
                                    <ul class="nav mt-2 nav-pills justify-content-start">
                                        <li class="nav-item">
                                        <a href="{{ route('print.buku_ini') }}" class="btn btn-sm btn-danger"><span
                                                    class="d-none d-md-block">Cetak Data Buku</span> <span
                                                    class="d-md-none">W</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Chart -->
                            <div class="chart">
                                <canvas id="chart-orders-buku" class="chart-canvas"></canvas>
                            </div>
                            
                           
                        </div>
                    </div>
                </div>
            </div>
            @endsection
