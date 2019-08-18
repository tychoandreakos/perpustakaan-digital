<?php

namespace App\Http\Controllers;

use App\Berita;
use App\Buku;
use App\Info;
use App\Topik;
use App\User;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $user = User::all()->count();
        $buku = Buku::all()->count();
        $info = Info::all()->first();
        $topik = Topik::orderBy('order', 'ASC')->limit(4)->get();
        $berita =  Berita::latest()->get();
        return view('layouts.app', compact('berita','buku','user','info', 'topik'));
    }

    public function berita($slug)
    {
        $result = Berita::where('slug', $slug)->firstOrFail();
        return view('berita', compact('result')); 
    }

    public function buku($slug)
    {
        $result = Buku::with(['buku_transaksi.pengarang' => function($q){
            $q->select('id', 'nama_pengarang');
        }, 'buku_transaksi.penerbit' => function($q){
            $q->select('id', 'nama_penerbit');
        }, 'buku_transaksi.kota' => function($q){
            $q->select('id', 'nama_kota');
        }, 'buku_transaksi.bahasa' => function($q){
            $q->select('id', 'jenis_bahasa');
        }, 'bibliobigrafi.gmd' => function($q){
            $q->select('id', 'nama_gmd');
        }, 'bibliobigrafi.klasifikasi' => function($q) {
            $q->select('id', 'tipe_klasifikasi');
        }])->where('slug', $slug)->firstOrFail();
        return view('buku', compact('result'));;
    }

    public function baca($slug)
    {
        $result = Buku::where('slug', $slug)->firstOrFail();
        return view('baca', compact('result'));
    }
}
