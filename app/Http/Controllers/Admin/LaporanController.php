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
        $popular = PinjamTransaksi::with('bibliobigrafi.buku')->withCount('bibliobigrafi')->orderBy('bibliobigrafi_count', 'DESC')->get();

        return view('admin.laporan.koleksi', compact('buku', 'eksemplar', 'eksemplar_dipinjam', 'popular', 'title'));
    }

    public function pinjam()
    {
        $title = 'Statistik Koleksi Pinjaman';
        $buku = Buku::all()->count();
        $eksemplar = Bibliobigrafi::all()->count();
        $eksemplar_dipinjam = Bibliobigrafi::where('status_pinjam', 1)->count();
        $popular = PinjamTransaksi::with('bibliobigrafi.buku')->withCount('bibliobigrafi')->orderBy('bibliobigrafi_count', 'DESC')->get();

        return view('admin.laporan.pinjam', compact('buku', 'eksemplar', 'eksemplar_dipinjam', 'popular', 'title'));
    }

    public function print_koleksi()
    {
        $buku = Buku::all()->count();
        $eksemplar = Bibliobigrafi::all()->count();
        $eksemplar_dipinjam = Bibliobigrafi::where('status_pinjam', 1)->count();
        $popular = PinjamTransaksi::with('bibliobigrafi.buku')->withCount('bibliobigrafi')->orderBy('bibliobigrafi_count', 'DESC')->get();

        $pdf = PDF::loadview('admin.laporan.print.koleksi', compact('buku', 'eksemplar' ,'eksemplar_dipinjam', 'popular'));
        return $pdf->stream('laporan-koleksi-stmik-' . Carbon::now());
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
        $month = Carbon::now()->format('F');
        $salinan = 2;

        $pdf = PDF::loadview('admin.laporan.print.buku_ini', compact('buku', 'month', 'salinan'));
        return $pdf->stream();
    }

    public function anggota()
    {
        $title = 'Statistik Anggota';

        $buku = Buku::all()->count();
        $eksemplar = Bibliobigrafi::all()->count();
        $eksemplar_dipinjam = Bibliobigrafi::where('status_pinjam', 1)->count();
        $total = User::all()->count();
        $popular = PinjamTransaksi::with('user', 'user.anggota')->withCount('user')->orderBy('user_count', 'DESC')->get();

        return view('admin.laporan.anggota', compact('buku', 'eksemplar', 'eksemplar_dipinjam', 'popular', 'title', 'total'));
    }
}
