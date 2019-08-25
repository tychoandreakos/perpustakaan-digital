<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\Bibliobigrafi;
use App\Buku;
use App\PinjamTransaksi;
use App\User;
use Illuminate\Http\Request;

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
