@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="header-body">

        <!-- Card stats -->
        @include('admin.component.laporan-anggota')
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
                                <h2 class="text-white mb-0">10 Anggota Paling Aktif Meminjam Pada Bulan {{ $month }}</h2>
                                </div>
                                <div class="col">
                                    <ul class="nav nav-pills justify-content-end">
                                        <li class="nav-item">
                                        <a href="{{ route('print.anggota') }}" class="btn btn-danger py-2 px-3"><span
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
                               <li class="text-white">{{ ucwords($item->name) }} ( {{ $item->id }} ) - {{ $item->pinjam_transaksi_count }} Kali Meminjam
                        </li>
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
                                    <h6 class="text-uppercase text-muted ls-1 mb-1">Statistik Anggota Terdaftar</h6>
                                <h2 class="mb-0">Anggota ({{ $total }})</h2>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Chart -->
                            <div class="chart">
                                <canvas id="chart-orders-anggota" class="chart-canvas"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endsection
