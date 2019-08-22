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
        $total = PinjamTransaksi::where('user_id', $request->id)->count();
        if(!$total > $request->jumlah_pinjaman){
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
                'condition' => true,
                'message' => 'Buku berhasil dipinjam']);
        } else {
            return response()->json([
                'condition' => false,
                'message' => 'Anggota yang bersangkutan sudah melebihi batas pinjam buku']);
        }
    }

    public function pinjaman(Request $request)
    {
        return PinjamTransaksi::with(['bibliobigrafi' => function($q){
            $q->select("id", 'buku_id', 'pola_eksemplar', 'klasifikasi_id');
        }, 'bibliobigrafi.buku' => function($q){
            $q->select('id', 'judul');
        }, 'bibliobigrafi.klasifikasi' => function($q){
            $q->select('id', 'tipe_klasifikasi');
        }])->where('user_id', $request->id)->orderBy('tanggal_habis_pinjam', 'ASC')->paginate(10);
    }

    public function perpanjang(Request $request)
    {
        $pinjam = PinjamTransaksi::where('bibliobigrafi_id', $request->id)->get();
        // $pinjam->delete();
        return $request->has('tgl_pinjam');
        // $requestData = $request->para;
        $requestData['user_id'] = $request->has('user_id');
        $requestData['bibliobigrafi_id'] = $request->has('bibliobigrafi_id');
        $requestData['tgl_pinjam'] = $request->has('tgl_pinjam');
        $requestData['status_pinjam'] = $request->has('status_pinjam');
        $requestData['tanggal_habis_pinjam'] = Carbon::now()->addDays($request->user);
        PinjamTransaksi::create($requestData);
    }

    public function histori()
    {
        return PinjamTransaksi::with(['bibliobigrafi.buku' => function($q) {
            $q->select('id', 'judul');
        },  'user.anggota_transaksi.tipe_anggota'])->where('status_pinjam', 0)->latest()->paginate(5);
    }

    public function kembali(Request $request)
    {
        $bilio = Bibliobigrafi::where('id', $request->id)->first();
        $bilio->status_pinjam = 0;
        $bilio->save();

        $transaksi = PinjamTransaksi::where('bibliobigrafi_id', $request->id)->first();
        $transaksi->status_pinjam = 0;
        $transaksi->tgl_kembali = Carbon::now();
        $transaksi->save();

        return response()->json([
            'message' => 'pengembalian buku berhasil']);
    }

    public function pengembalian()
    {
        return Bibliobigrafi::where('status_pinjam', 1)->get();
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
