<?php

namespace App\Http\Controllers\admin;

use App\Bibliobigrafi;
use App\Http\Controllers\Controller;
use App\PinjamTransaksi;
use App\User;
use Illuminate\Http\Request;

class SirkulasiController extends Controller
{
    public function sirkulasi()
    {
        $title = 'Sirkulasi';
                $koleksi = Bibliobigrafi::all()->count();
        $anggota_count = User::all()->count();
        $eksemplar = PinjamTransaksi::all()->where('status_pinjam', 1)->count();
        $approve = User::whereNull('approved_at')->get()->count();
        return view('admin.sirkulasi.sirkulasi', compact('title', 'koleksi', 'anggota_count', 'eksemplar', 'approve'));
    }

    public function pengembalian()
    {
        $title = 'Pengembalian Buku';
                $koleksi = Bibliobigrafi::all()->count();
        $anggota_count = User::all()->count();
        $eksemplar = PinjamTransaksi::all()->where('status_pinjam', 1)->count();
        $approve = User::whereNull('approved_at')->get()->count();
        return view('admin.sirkulasi.kembali', compact('title', 'koleksi', 'anggota_count', 'eksemplar', 'approve'));
    }

    public function verifikasi(Request $request)
    {
        return response($request->all());
    }

    public function histori()
    {
        $title = 'Histori Peminjaman';
                $koleksi = Bibliobigrafi::all()->count();
        $anggota_count = User::all()->count();
        $eksemplar = PinjamTransaksi::all()->where('status_pinjam', 1)->count();
        $approve = User::whereNull('approved_at')->get()->count();
        return view('admin.sirkulasi.histori', compact('title', 'koleksi', 'anggota_count', 'eksemplar', 'approve'));
    }

    public function pengunjung()
    {
        $title = 'Daftar Pengunjung Perpustakaan';
                $koleksi = Bibliobigrafi::all()->count();
        $anggota_count = User::all()->count();
        $eksemplar = PinjamTransaksi::all()->where('status_pinjam', 1)->count();
        $approve = User::whereNull('approved_at')->get()->count();
        return view('admin.pengunjung', compact('title', 'koleksi', 'anggota_count', 'eksemplar', 'approve'));
    }

    public function keterlambatan()
    {
        $title = 'Daftar Keterlambatan Buku';   
            $koleksi = Bibliobigrafi::all()->count();
        $anggota_count = User::all()->count();
        $eksemplar = PinjamTransaksi::all()->where('status_pinjam', 1)->count();
        $approve = User::whereNull('approved_at')->get()->count();
        return view('admin.keterlambatan', compact('title', 'koleksi', 'anggota_count', 'eksemplar', 'approve'));
    }

    public function digital()
    {
        $title = 'Sirkulasi Digital';
                $koleksi = Bibliobigrafi::all()->count();
        $anggota_count = User::all()->count();
        $eksemplar = PinjamTransaksi::all()->where('status_pinjam', 1)->count();
        $approve = User::whereNull('approved_at')->get()->count();
        return view('admin.sirkulasi.sirkulasi-digital', compact('title', 'koleksi', 'anggota_count', 'eksemplar', 'approve'));
    }

    public function keluar()
    {
        $title = 'Daftar Eksemplar Keluar';
                $koleksi = Bibliobigrafi::all()->count();
        $anggota_count = User::all()->count();
        $eksemplar = PinjamTransaksi::all()->where('status_pinjam', 1)->count();
        $approve = User::whereNull('approved_at')->get()->count();
        return view('admin.eksemplar.home', compact('title', 'koleksi', 'anggota_count', 'eksemplar', 'approve'));    
    }
}
