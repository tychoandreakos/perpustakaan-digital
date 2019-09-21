@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="header-body">
        <!-- Card stats -->

        @include('admin.component.card-home')

        <!-- overview panel -->
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col-xl-8 mb-5 mb-xl-0">
                    <div class="card bg-gradient-default shadow">
                        <div class="card-header bg-transparent">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                    <h2 class="text-white mb-0">Statistik Peminjaman Koleksi Buku</h2>
                                </div>
                                <div class="col">
                                    <ul class="nav nav-pills justify-content-end">
                                        <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales"
                                            data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}'
                                            >
                                            {{-- <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                                                <span class="d-none d-md-block">Month</span>
                                                <span class="d-md-none">M</span>
                                            </a> --}}
                                        </li>
                                        {{-- <li class="nav-item" data-toggle="chart" data-target="#chart-sales"
                                            data-update='{"data":{"datasets":[{"data":[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}'
                                            >
                                            <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                                                <span class="d-none d-md-block">Week</span>
                                                <span class="d-md-none">W</span>
                                            </a>
                                        </li> --}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Chart -->
                            <div class="chart">
                                <!-- Chart wrapper -->
                                <canvas id="chart-sales" class="chart-canvas"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card shadow">
                        <div class="card-header bg-transparent">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="text-uppercase text-muted ls-1 mb-1">Statistik Pengunjung Per Bulan Berdasarkan Buku Tamu</h6>
                                    <h2 class="mb-0">Total Pengunjung</h2>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Chart -->
                            <div class="chart">
                                <canvas id="chart-orders-pengunjung" class="chart-canvas"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-xl-8 mb-5 mb-xl-0">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">Transaksi Terakhir</h3>
                                </div>
                                <div class="col text-right">
                                    <a href="{{ route('eksemplar.keluar') }}" class="btn btn-sm btn-primary">Lihat
                                        Semua</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                                @if (!$pinjam->isEmpty())
                            <!-- Projects table -->
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Kode Eksemplar</th>
                                        <th scope="col">ID Anggota</th>
                                        <th scope="col">Nama Anggota</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Tanggal Pinjam</th>
                                        <th scope="col">Tanggal Kembali</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach ($pinjam as $item)
                                   <tr>
                                       <th scope="row">
                                           {{ strtoupper($item->bibliobigrafi->pola_eksemplar) }}
                                       </th>
                                       <td>
                                           {{ $item->user_id }}
                                       </td>
                                       <td>
                                           {{ ucwords($item->user->name) }}
                                       </td>
                                       <td>
                                           {{ ucwords($item->bibliobigrafi->buku->judul) }}
                                       </td>
                                       <td>{{ $item->tgl_pinjam }}</td>
                                       <td>{{ $item->tanggal_habis_pinjam }}</td>
                                   </tr>
                                   @endforeach
                                   
                                </tbody>
                            </table>
                            @else
                                   <h4 class="text-center">Belum Ada Data</h4>
                                   @endif
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">Anggota Terbaru</h3>
                                </div>
                                <div class="col text-right">
                                    <a href="{{ route('anggota.index') }}" class="btn btn-sm btn-primary">Lihat Semua</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            @if (!$anggota->isEmpty())
                            <!-- Projects table -->
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">ID / NPM</th>
                                        <th scope="col">Nama Lengkap</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Jurusan</th>
                                        <th scope="col">Tipe Anggota</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach ($anggota as $item)
                                   <tr>
                                      <th scope="row">
                                         {{ $item->id }}
                                      </th>
                                      <td>
                                        {{ ucwords($item->name) }}
                                      </td>
                                      <td>
                                       {{ ucwords($item->email) }}
                                      </td>
                                    <td>{{ isset($item->anggota->jurusan) ? ucwords($item->anggota->jurusan->nama_jurusan) : 'Belum ada data!' }}</td>
                                    <td>{{ isset($item->anggota_transaksi->tipe_anggota->tipe_anggota) ? ucwords($item->anggota_transaksi->tipe_anggota->tipe_anggota) : 'Belum ada data' }}</td>
                                  </tr>
                                   @endforeach
                                </tbody>
                            </table>
                            @else
                            <h4 class="text-center">Belum Ada Data</h4>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endsection
