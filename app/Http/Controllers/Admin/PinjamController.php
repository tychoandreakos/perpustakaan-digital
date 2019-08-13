<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

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

    public function pinjaman(Request $request)
    {
        return PinjamTransaksi::with(['bibliobigrafi' => function($q){
            $q->select("id", 'buku_id', 'pola_eksemplar', 'klasifikasi_id');
        }, 'bibliobigrafi.buku' => function($q){
            $q->select('id', 'judul');
        }, 'bibliobigrafi.klasifikasi' => function($q){
            $q->select('id', 'tipe_klasifikasi');
        }])->where('user_id', $request->id)->paginate(10);
    }


    public function search(Request $request)
    {

        if($request->has('q')){

            $search = $request->q;

            return Pengarang::where('nama_pengarang','LIKE',"%$search%")
            ->latest()
            ->paginate(5);

        }

    }

    public function eksemplar()
    {
        return Bibliobigrafi::with(['buku' => function($q){
            $q->select('id', 'judul');
        }, 'pinjam_transaksi'])->where('status_pinjam', 1)->paginate(5);
    }
}
