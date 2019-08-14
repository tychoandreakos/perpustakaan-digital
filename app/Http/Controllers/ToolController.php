<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tamu;

class ToolController extends Controller
{
    public function tamu(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|min:3',
            'jurusan' => 'required',
            'keperluan' => 'required',
            'alamat' => 'required',
        ]);


        Tamu::create($validatedData);

        return response()->json([
            'message' => 'Terima Kasih, telah mengisi daftar tamu :)']);
    }
}
