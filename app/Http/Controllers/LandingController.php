<?php

namespace App\Http\Controllers;

use App\Berita;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $berita =  Berita::all();
        return view('layouts.app', compact('berita'));
    }
}
