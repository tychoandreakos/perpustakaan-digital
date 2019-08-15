<?php

namespace App\Http\Controllers;

use App\Berita;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $berita =  Berita::latest()->get();
        return view('layouts.app', compact('berita'));
    }

    public function berita($slug)
    {
        $result = Berita::where('slug', $slug)->firstOrFail();
        return view('berita', compact('result')); 
    }
}
