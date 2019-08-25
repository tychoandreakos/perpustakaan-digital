<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\PinjamTransaksi;
use App\User;
use Illuminate\Http\Request;

class homePageController extends Controller
{
    public function index()
    {
        // return
        $pinjam = PinjamTransaksi::with('bibliobigrafi.buku', 'user')->where('status_pinjam', 1)->latest()->limit(5)->get();
        // return
        $anggota = User::with('anggota', 'anggota_transaksi.tipe_anggota')->latest()->limit(4)->get();
        return view('admin.home', compact('pinjam', 'anggota'));
    }
}
