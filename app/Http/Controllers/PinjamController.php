<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PinjamTransaksi;
use Illuminate\Support\Carbon;
use App\Bibliobigrafi;

class PinjamController extends Controller
{
    public function store(Request $request)
    {
        foreach ($request->bibliobigrafi as $bilio) {
            $requestData = $request->all();
        $requestData['tgl_pinjam'] = Carbon::now();
        $requestData['bibliobigrafi_id'] = $bilio;
        PinjamTransaksi::create($requestData);

        $bilio = Bibliobigrafi::find($bilio);
        $bilio->status_pinjam = 1;
        $bilio->update();
        }

        return response()->json([
            'message' => 'data berhasil disimpan']);
    }
}
