<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\Bibliobigrafi;
use App\Buku;
use App\PinjamTransaksi;
use App\User;
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
        $popular = PinjamTransaksi::with('bibliobigrafi.buku')->withCount('buku')->orderBy('buku_count', 'DESC')->get();

        return view('admin.laporan.koleksi', compact('buku', 'eksemplar', 'eksemplar_dipinjam', 'popular', 'title'));
    }

    public function pinjam()
    {
        $title = 'Statistik Koleksi Pinjaman';
        $buku = Buku::all()->count();
        $eksemplar = PinjamTransaksi::whereDate('created_at', '=', Carbon::now())->get()->count();
        $terlambat = PinjamTransaksi::with('bibliobigrafi.buku', 'user.anggota_transaksi.tipe_anggota')->where('status_pinjam', 1)->where('tanggal_habis_pinjam', '<', Carbon::now())->get()->count();
        $dipinjam = Bibliobigrafi::where('status_pinjam', 1)->count();
        $pinjaman = PinjamTransaksi::whereDate('created_at', '>', Carbon::now()->subDays(30))->get()->count();
        $popular = PinjamTransaksi::with('bibliobigrafi.buku')->withCount('buku')->orderBy('buku_count', 'DESC')->get();

        return view('admin.laporan.pinjam', compact('buku', 'eksemplar', 'dipinjam', 'terlambat', 'pinjaman', 'popular', 'title'));
    }

    public function print_pinjam()
    {
        $buku = PinjamTransaksi::whereDate('created_at', '>', Carbon::now()->subDays(7))->get()->count();
        $eksemplar = PinjamTransaksi::whereDate('created_at', '=', Carbon::now())->get()->count();
        $eksemplar_dipinjam = PinjamTransaksi::with('bibliobigrafi.buku', 'user.anggota_transaksi.tipe_anggota')->where('status_pinjam', 1)->where('tanggal_habis_pinjam', '<', Carbon::now())->get()->count();
        $dipinjam = Bibliobigrafi::where('status_pinjam', 1)->count();
        // return
        $popular = PinjamTransaksi::with('bibliobigrafi.buku')->withCount('buku')->orderBy('buku_count', 'DESC')->limit(10)->get();
        $masuk = PinjamTransaksi::whereDate('created_at', '>', Carbon::now()->subDays(30))->get()->count();
        $time = Carbon::now();
        $tahun = PinjamTransaksi::whereDate('created_at', '>', Carbon::now()->subDays(360))->get()->count();
        $title = 'Ringkasan Laporan Peminjaman Di STMIK AMIKBANDUNG';

        $pdf = PDF::loadview('admin.laporan.print.pinjaman', compact('buku', 'tahun', 'title', 'time', 'eksemplar', 'masuk' ,'eksemplar_dipinjam', 'popular'));
        return $pdf->stream('laporan-pinjam-stmik-' . Carbon::now());
    }

    public function pengunjung()
    {
        $title = 'Statistik Pengunjung';
        $buku = Buku::all()->count();
        $eksemplar = PinjamTransaksi::whereDate('created_at', '=', Carbon::now())->get()->count();
        $terlambat = PinjamTransaksi::with('bibliobigrafi.buku', 'user.anggota_transaksi.tipe_anggota')->where('status_pinjam', 1)->where('tanggal_habis_pinjam', '<', Carbon::now())->get()->count();
        $dipinjam = Bibliobigrafi::where('status_pinjam', 1)->count();
        $pinjaman = PinjamTransaksi::whereDate('created_at', '>', Carbon::now()->subDays(30))->get()->count();
        $popular = PinjamTransaksi::with('bibliobigrafi.buku')->withCount('buku')->orderBy('buku_count', 'DESC')->get();

        return view('admin.laporan.pengunjung', compact('buku', 'eksemplar', 'dipinjam', 'terlambat', 'pinjaman', 'popular', 'title'));
    }

    public function print_koleksi()
    {
        $buku = Buku::all()->count();
        $eksemplar = Bibliobigrafi::all()->count();
        $eksemplar_dipinjam = Bibliobigrafi::where('status_pinjam', 1)->count();
        // return
        $popular = PinjamTransaksi::with('bibliobigrafi.buku')->withCount('buku')->orderBy('buku_count', 'DESC')->limit(10)->get();
        $masuk = Buku::whereDate('created_at', '>', Carbon::now()->subDays(30))->get()->count();
        $time = Carbon::now();
        $title = 'Ringkasan Statistik Koleksi';

        $pdf = PDF::loadview('admin.laporan.print.koleksi', compact('buku', 'title', 'time', 'eksemplar', 'masuk' ,'eksemplar_dipinjam', 'popular'));
        return $pdf->stream('laporan-koleksi-stmik-' . Carbon::now());
    }

    public function print_anggota()
    {
        $buku = User::all()->count();
        $eksemplar = User::whereDate('created_at', '>', Carbon::now()->subDays(30))->get()->count();
        $eksemplar_dipinjam = User::whereNull('approved_at')->get()->count();
        // return
        $popular = PinjamTransaksi::with('user', 'user.anggota')->withCount('user')->orderBy('user_count', 'DESC')->get();
        $masuk = Buku::whereDate('created_at', '>', Carbon::now()->subDays(30))->get()->count();
        $time = Carbon::now();
        $title = 'Ringkasan Statistik Anggota';

        $pdf = PDF::loadview('admin.laporan.print.anggota', compact('buku', 'title', 'time', 'eksemplar', 'masuk' ,'eksemplar_dipinjam', 'popular'));
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
        $popular = PinjamTransaksi::with('user', 'user.anggota')->withCount('user')->orderBy('user_count', 'DESC')->get();
        $month = Carbon::now()->format('F Y');
        // $kadaluarsa = Anggota::where('tgl_expired', '>=' '')->get()->count();

        return view('admin.laporan.anggota', compact('buku', 'month', 'bulan', 'eksemplar', 'eksemplar_dipinjam', 'popular', 'title', 'total'));
    }
}
