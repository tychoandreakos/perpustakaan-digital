<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\Bibliobigrafi;
use App\Buku;
use App\Denda;
use App\PinjamTransaksi;
use App\User;
use App\Tamu;
use Carbon\Carbon;
use PDF;

class LaporanController extends Controller
{
    public function koleksi()
    {
        $title = 'Statistik Koleksi Buku';
        $buku = Buku::all()->count();
        $eksemplar = Bibliobigrafi::all()->count();
        $eksemplar_dipinjam = Bibliobigrafi::where('status_pinjam', 1)->count();
        // return
        $popular = Buku::latest()->limit(10)->get();

        return view('admin.laporan.koleksi', compact('buku', 'eksemplar', 'eksemplar_dipinjam', 'popular', 'title'));
    }

    public function pinjam()
    {
        $title = 'Statistik Koleksi Pinjaman';
        $buku = Buku::all()->count();
        $eksemplar = PinjamTransaksi::whereDate('created_at', '=', Carbon::now())->get()->count();
        $terlambat = PinjamTransaksi::with('bibliobigrafi.buku', 'user.anggota_transaksi.tipe_anggota')->where('status_pinjam', 1)->where('tanggal_habis_pinjam', '<', Carbon::now())->get()->count();
        $dipinjam = Bibliobigrafi::where('status_pinjam', 1)->count();
        $pinjaman = PinjamTransaksi::where('status_verifikasi', 1)->get()->count();
         $popular = Buku::with(['pinjam_transaksi' => function($q){
            $q->select('id', 'buku_id', 'status_verifikasi');
        }])->withCount('pinjam_transaksi')->whereHas('pinjam_transaksi', function($q) {
            $q->where('status_verifikasi', 0);
        })->orderBy('pinjam_transaksi_count', 'DESC')->limit(10)->get();

        return view('admin.laporan.pinjam', compact('buku', 'eksemplar', 'dipinjam', 'terlambat', 'pinjaman', 'popular', 'title'));
    }

    public function print_pinjam()
    {
        $buku = PinjamTransaksi::whereDate('created_at', '>', Carbon::now()->subDays(7))->get()->count();
        $eksemplar = PinjamTransaksi::whereDate('created_at', '=', Carbon::now())->get()->count();
        $eksemplar_dipinjam = PinjamTransaksi::with('bibliobigrafi.buku', 'user.anggota_transaksi.tipe_anggota')->where('status_pinjam', 1)->where('tanggal_habis_pinjam', '<', Carbon::now())->get()->count();
        $dipinjam = Bibliobigrafi::where('status_pinjam', 1)->count();
        // return
         $popular = Buku::with(['pinjam_transaksi' => function($q){
            $q->select('id', 'buku_id', 'status_verifikasi');
        }])->withCount('pinjam_transaksi')->whereHas('pinjam_transaksi', function($q) {
            $q->where('status_verifikasi', 0);
        })->orderBy('pinjam_transaksi_count', 'DESC')->limit(10)->get();
        $masuk = PinjamTransaksi::whereDate('created_at', '>', Carbon::now()->subDays(30))->get()->count();
        $time = Carbon::now();
        $tahun = PinjamTransaksi::whereDate('created_at', '>', Carbon::now()->subDays(360))->get()->count();
        $title = 'Ringkasan Laporan Peminjaman Di STMIK AMIKBANDUNG';

        $pdf = PDF::loadview('admin.laporan.print.pinjaman', compact('buku', 'tahun', 'title', 'time', 'eksemplar', 'masuk' ,'eksemplar_dipinjam', 'popular'));
        return $pdf->stream('laporan-pinjam-stmik-' . Carbon::now());
    }

    public function denda_bulanan() {
       $denda = Denda::with(['user' => function($q) {
            $q->select('id', 'name');
        }, 'user.anggota_transaksi.tipe_anggota' => function($q) {
            $q->select('id', 'denda');
        }, 'pinjam_transaksi' => function($q) {
            $q->select('id', 'bibliobigrafi_id', 'tgl_pinjam', 'tanggal_habis_pinjam', 'tgl_kembali');
        }, 'pinjam_transaksi.bibliobigrafi' => function($q){
            $q->select('id', 'pola_eksemplar');
        }, 'buku' => function($q) {
            $q->select('id', 'judul');
        }])->whereDate('created_at', '>', Carbon::now()->subDays(30))->latest()->get();

        $jumlah_bayar = Denda::whereDate('created_at', '>', Carbon::now()->subDays(30))->get()->map->only('jumlah_bayar')->toArray();

        $month = Carbon::now()->format('F Y');
        $title = 'Ringkasan Laporan Denda Per Bulan Di STMIK AMIKBANDUNG Pada Bulan '. $month;
        $time = Carbon::now();


        $pdf = PDF::loadview('admin.laporan.print.denda.bulanan', compact('denda', 'jumlah_bayar', 'time', 'month', 'title'));
        return $pdf->stream('laporan-denda-stmik-' . Carbon::now());
    }

    public function denda_tahunan() {
        $denda =  Denda::with(['user' => function($q) {
            $q->select('id', 'name');
        }, 'user.anggota_transaksi.tipe_anggota' => function($q) {
            $q->select('id', 'denda');
        }, 'pinjam_transaksi' => function($q) {
            $q->select('id', 'bibliobigrafi_id', 'tgl_pinjam', 'tanggal_habis_pinjam', 'tgl_kembali');
        }, 'pinjam_transaksi.bibliobigrafi' => function($q){
            $q->select('id', 'pola_eksemplar');
        }, 'buku' => function($q) {
            $q->select('id', 'judul');
        }])->whereDate('created_at', '>', Carbon::now()->subDays(360))->latest()->get();

        $month = Carbon::now()->format('F Y');
        $title = 'Ringkasan Laporan Denda Per Tahun Di STMIK AMIKBANDUNG Pada Bulan';
        $time = Carbon::now();
        
        $jumlah_bayar = Denda::whereDate('created_at', '>', Carbon::now()->subDays(360))->get()->map->only('jumlah_bayar')->toArray();


        $pdf = PDF::loadview('admin.laporan.print.denda.tahunan', compact('denda', 'jumlah_bayar', 'time', 'month', 'title'));
        return $pdf->stream('laporan-denda-stmik-' . Carbon::now());
    }

    public function denda_mingguan() {
        $denda =  Denda::with(['user' => function($q) {
            $q->select('id', 'name');
        }, 'user.anggota_transaksi.tipe_anggota' => function($q) {
            $q->select('id', 'denda');
        }, 'pinjam_transaksi' => function($q) {
            $q->select('id', 'bibliobigrafi_id', 'tgl_pinjam', 'tanggal_habis_pinjam', 'tgl_kembali');
        }, 'pinjam_transaksi.bibliobigrafi' => function($q){
            $q->select('id', 'pola_eksemplar');
        }, 'buku' => function($q) {
            $q->select('id', 'judul');
        }])->whereDate('created_at', '>', Carbon::now()->subDays(7))->latest()->get();

        $title = 'Ringkasan Laporan Denda Per Minggu Di STMIK AMIKBANDUNG';
        $month = Carbon::now()->format('F Y');
        $time = Carbon::now();
        
        $jumlah_bayar = Denda::whereDate('created_at', '>', Carbon::now()->subDays(7))->get()->map->only('jumlah_bayar')->toArray();


        $pdf = PDF::loadview('admin.laporan.print.denda.mingguan', compact('denda', 'jumlah_bayar', 'time', 'month', 'title'));
        return $pdf->stream('laporan-denda-stmik-' . Carbon::now());
    }

    public function denda_harian() {
        $denda =  Denda::with(['user' => function($q) {
            $q->select('id', 'name');
        }, 'user.anggota_transaksi.tipe_anggota' => function($q) {
            $q->select('id', 'denda');
        }, 'pinjam_transaksi' => function($q) {
            $q->select('id', 'bibliobigrafi_id', 'tgl_pinjam', 'tanggal_habis_pinjam', 'tgl_kembali');
        }, 'pinjam_transaksi.bibliobigrafi' => function($q){
            $q->select('id', 'pola_eksemplar');
        }, 'buku' => function($q) {
            $q->select('id', 'judul');
        }])->whereDate('created_at', '>', Carbon::now()->subDays(1))->latest()->get();

        $jumlah_bayar = Denda::whereDate('created_at', '>', Carbon::now()->subDays(1))->get()->map->only('jumlah_bayar')->toArray();

        $title = 'Ringkasan Laporan Denda Per Hari Di STMIK AMIKBANDUNG';
        $month = Carbon::now()->format('F Y');
        $time = Carbon::now();

        $pdf = PDF::loadview('admin.laporan.print.denda.harian', compact('denda', 'time', 'month', 'title', 'jumlah_bayar'));
        return $pdf->stream('laporan-denda-stmik-' . Carbon::now());
    }

    public function pengunjung()
    {
        $title = 'Statistik Pengunjung';
        $buku = Buku::all()->count();
        $eksemplar = PinjamTransaksi::whereDate('created_at', '=', Carbon::now())->get()->count();
        $terlambat = PinjamTransaksi::with('bibliobigrafi.buku', 'user.anggota_transaksi.tipe_anggota')->where('status_pinjam', 1)->where('tanggal_habis_pinjam', '<', Carbon::now())->get()->count();
        $dipinjam = Bibliobigrafi::where('status_pinjam', 1)->count();
        $pinjaman = PinjamTransaksi::whereDate('created_at', '>', Carbon::now()->subDays(30))->get()->count();
        $popular = PinjamTransaksi::with('bibliobigrafi.buku')->where('status_verifikasi', 0)->withCount('buku')->orderBy('buku_count', 'DESC')->get();

        return view('admin.laporan.pengunjung', compact('buku', 'eksemplar', 'dipinjam', 'terlambat', 'pinjaman', 'popular', 'title'));
    }

    public function print_koleksi()
    {
        $buku = Buku::all()->count();
        $eksemplar = Bibliobigrafi::all()->count();
        $eksemplar_dipinjam = Bibliobigrafi::where('status_pinjam', 1)->count();
        // return
        $popular = Buku::latest()->limit(10)->get();
        $masuk = Buku::whereDate('created_at', '>', Carbon::now()->subDays(30))->get()->count();
        $time = Carbon::now();
        $title = 'Ringkasan Statistik Koleksi';

        $pdf = PDF::loadview('admin.laporan.print.koleksi', compact('buku', 'title', 'time', 'eksemplar', 'masuk' ,'eksemplar_dipinjam', 'popular'));
        return $pdf->stream('laporan-koleksi-stmik-' . Carbon::now());
    }

    public function print_tamu()
    {
        $buku = Tamu::whereDate('created_at', '>', Carbon::now()->subDays(7))->get()->count();
        $eksemplar = Tamu::whereDate('created_at', '>', Carbon::now()->subDays(30))->get()->count();
        $eksemplar_dipinjam = Tamu::whereDate('created_at', '>', Carbon::now()->subDays(360))->get()->count();
        // return
        $popular = User::with('buku_tamu')->having('created_at', '>', Carbon::now()->subDays(30))->withCount('buku_tamu')->orderBy('buku_tamu_count', 'DESC')->limit(10)->get();
        $time = Carbon::now();
        $title = 'Ringkasan Statistik Buku Tamu';
        $month = Carbon::now()->format('F Y');

        $pdf = PDF::loadview('admin.laporan.print.tamu', compact('buku', 'title', 'month', 'time', 'eksemplar', 'eksemplar_dipinjam', 'popular'));
        return $pdf->stream('laporan-tamu-stmik-' . Carbon::now());
    }


    public function print_anggota()
    {
        $buku = User::all()->count();
        $eksemplar = User::whereDate('created_at', '>', Carbon::now()->subDays(30))->get()->count();
        $eksemplar_dipinjam = User::whereNull('approved_at')->get()->count();
        // return
        $popular = User::with('pinjam_transaksi', 'anggota')->withCount('pinjam_transaksi')->orderBy('pinjam_transaksi_count', 'DESC')->limit(10)->get();
        $masuk = Buku::whereDate('created_at', '>', Carbon::now()->subDays(30))->get()->count();
        $time = Carbon::now();
        $title = 'Ringkasan Statistik Anggota';
        $month = Carbon::now()->format('F Y');

        $pdf = PDF::loadview('admin.laporan.print.anggota', compact('buku', 'title', 'time', 'month', 'eksemplar', 'masuk' ,'eksemplar_dipinjam', 'popular'));
        return $pdf->stream('laporan-anggota-stmik-' . Carbon::now());
    }
    
    public function print_buku_bulan_ini()
    {
        // return
        $buku = Buku::with(['buku_transaksi' => function($q) {
            $q->select('id', 'buku_id', 'pengarang_id', 'penerbit_id');
        }, 'buku_transaksi.penerbit' => function($q) {
            $q->select('id', 'nama_penerbit');
        }, 'buku_transaksi.pengarang' => function($q) {
            $q->select('id', 'nama_pengarang');
        }, 'bibliobigrafi' => function($q) {
            $q->select('id', 'buku_id', 'klasifikasi_id');
        }, 'bibliobigrafi.gmd_transaksi' => function($q) {
            $q->select('id', 'bibliobigrafi_id', 'gmd_id');
        }, 'bibliobigrafi.gmd_transaksi.gmd' => function($q) {
            $q->select('id', 'kode_gmd', 'nama_gmd');
        }])->whereDate('created_at', '>', Carbon::now()->subDays(30))->get();
        $month = Carbon::now()->format('F Y');
        $salinan = 2;
        $title = 'Laporan Buku Baru Pada Bulan ' . $month;

        $pdf = PDF::loadview('admin.laporan.print.buku_ini', compact('buku', 'title', 'month', 'salinan'));
        return $pdf->stream();
    }

    public function anggota()
    {
        $title = 'Statistik Anggota';

        $buku = User::all()->count();
        $eksemplar = User::whereNull('approved_at')->get()->count();
        $eksemplar_dipinjam = User::all()->count();
        $total = User::all()->count();
        $bulan = User::whereDate('created_at', '>', Carbon::now()->subDays(30))->get()->count();
        $popular = User::with('pinjam_transaksi', 'anggota')->having('created_at', '>', Carbon::now()->subDays(30))->withCount('pinjam_transaksi')->orderBy('pinjam_transaksi_count', 'DESC')->limit(10)->get();
        $month = Carbon::now()->format('F Y');
        // $kadaluarsa = Anggota::where('tgl_expired', '>=' '')->get()->count();

        return view('admin.laporan.anggota', compact('buku', 'month', 'bulan', 'eksemplar', 'eksemplar_dipinjam', 'popular', 'title', 'total'));
    }
}
