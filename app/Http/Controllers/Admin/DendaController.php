<?php

namespace App\Http\Controllers\admin;

use App\Bibliobigrafi;
use App\Denda;
use App\Http\Controllers\Controller;
use App\PinjamTransaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DendaController extends Controller
{
    public function store(Request $request)
    {
        Denda::create($request->all());
        
        $bilio = Bibliobigrafi::find($request->bilio_id)->first();
        $bilio->status_pinjam = 0;
        $bilio->save();

        $transaksi = PinjamTransaksi::where('id', $request->pinjam_transaksi_id)->first();
        $transaksi->status_pinjam = 0;
        $transaksi->status_denda = 1;
        $transaksi->tgl_kembali = Carbon::now();
        $transaksi->save();



        return response()->json([
            'message' => 'Data Pembayaran Berhasil disimpan']);
    }
}
