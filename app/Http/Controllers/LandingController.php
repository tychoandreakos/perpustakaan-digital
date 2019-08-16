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
        $topik = Topik::latest()->get();
        $berita =  Berita::latest()->get();
        return view('layouts.app', compact('berita','buku','user','info', 'topik'));
    }

    public function berita($slug)
    {
        $result = Berita::where('slug', $slug)->firstOrFail();
        return view('berita', compact('result')); 
    }
}
