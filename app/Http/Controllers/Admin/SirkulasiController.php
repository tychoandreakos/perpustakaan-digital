<?php

namespace App\Http\Controllers\admin;

use App\AnggotaTransaksi;
use App\Bibliobigrafi;
use App\Http\Controllers\Controller;
use App\PinjamTransaksi;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SirkulasiController extends Controller
{
    public function sirkulasi()
    {
        $title = 'Sirkulasi';
                $koleksi = Bibliobigrafi::all()->count();
        $anggota_count = User::all()->count();
        $eksemplar = PinjamTransaksi::all()->where('status_pinjam', 1)->count();
        $approve = User::whereNull('approved_at')->get()->count();
        return view('admin.sirkulasi.sirkulasi', compact('title', 'koleksi', 'anggota_count', 'eksemplar', 'approve'));
    }

    public function pengembalian()
    {
        $title = 'Pengembalian Buku';
                $koleksi = Bibliobigrafi::all()->count();
        $anggota_count = User::all()->count();
        $eksemplar = PinjamTransaksi::all()->where('status_pinjam', 1)->count();
        $approve = User::whereNull('approved_at')->get()->count();
        return view('admin.sirkulasi.kembali', compact('title', 'koleksi', 'anggota_count', 'eksemplar', 'approve'));
    }

    public function verifikasi(Request $request)
    {
            return PinjamTransaksi::where('kode_pinjam', strtolower($request->kode))->get();
    }

   
    public function pola(Request $request)
    {
        $pinjam = PinjamTransaksi::where('kode_pinjam', $request->kode)->first();
        return Bibliobigrafi::where('buku_id', $pinjam->buku_id)->where('status_pinjam', 0)->get();
    }

    public function pinjam(Request $request)
    {
        $total = PinjamTransaksi::where([['user_id', $request->user_id], ['status_pinjam', 1]])->count();
        $anggota = AnggotaTransaksi::where('user_id', $request->user_id)->first();
        if($total != $anggota->tipe_anggota->jumlah_pinjaman){
            
            $dt = new Carbon;
            $bilio = Bibliobigrafi::where('pola_eksemplar', strtoupper($request->pola_eksemplar))->first();
            
            $pinjam = PinjamTransaksi::find($request->id);
            $pinjam->bibliobigrafi_id = $bilio->id;
            $pinjam->tgl_pinjam = Carbon::now();
            $pinjam->tanggal_habis_pinjam = $dt->addDay($anggota->tipe_anggota->masa_pinjaman_buku);
            $pinjam->status_pinjam = 1;
            $pinjam->verified_at = Carbon::now();
            $pinjam->status_verifikasi = 0;
            $pinjam->update();


            $bilio->status_pinjam = 1;
            $bilio->update();
    
            return response()->json([
                'condition' => true,
                'message' => 'Buku berhasil dipinjam']);
        } else {
            return response()->json([
                'condition' => false,
                'message' => 'Anggota yang bersangkutan sudah melebihi batas pinjam buku']);
        }
    }

    public function histori()
    {
        $title = 'Histori Peminjaman';
                $koleksi = Bibliobigrafi::all()->count();
        $anggota_count = User::all()->count();
        $eksemplar = PinjamTransaksi::all()->where('status_pinjam', 1)->count();
        $approve = User::whereNull('approved_at')->get()->count();
        return view('admin.sirkulasi.histori', compact('title', 'koleksi', 'anggota_count', 'eksemplar', 'approve'));
    }

    public function search(Request $request)
    {

        if($request->has('q')){

            $search = $request->q;

            return PinjamTransaksi::with(['bibliobigrafi' => function($q) {
                $q->select('id', 'buku_id', 'pola_eksemplar');
            },  'bibliobigrafi.buku' => function($q) {
                $q->select('id', 'judul');
            }, 'user.anggota_transaksi.tipe_anggota'])
            ->where('status_pinjam', 0)
            ->orWhereHas('user', function($q) use ($search){
                $q->where('name', 'LIKE', "%$search%")->orWhere('id', 'LIKE', "%$search%");
            })
            ->orWhereHas('bibliobigrafi.buku', function($q) use ($search){
                $q->where('judul', 'LIKE', "%$search%");
            })
            ->orWhereHas('user.anggota_transaksi.tipe_anggota', function($q) use ($search){
                $q->where('tipe_anggota', 'LIKE', "%$search%");
            })
            ->orWhereHas('bibliobigrafi', function($q) use ($search){
                $q->where('pola_eksemplar', 'LIKE', "%$search%");
            })
            ->latest()
            ->paginate(5);

        }

    }

    public function search_terlambat(Request $request)
    {

        if($request->has('q')){

            $search = $request->q;


            return PinjamTransaksi::with('bibliobigrafi.buku', 'user.anggota_transaksi.tipe_anggota')->where('status_pinjam', 1)->where('tanggal_habis_pinjam', '<', Carbon::now())
            ->whereHas('user', function($q) use ($search){
                $q->where('name', 'LIKE', "%$search%")->orWhere('id', 'LIKE', "%$search%");
            })
            ->orWhereHas('bibliobigrafi.buku', function($q) use ($search){
                $q->where('judul', 'LIKE', "%$search%");
            })
            ->orWhereHas('user.anggota_transaksi.tipe_anggota', function($q) use ($search){
                $q->where('tipe_anggota', 'LIKE', "%$search%");
            })
            ->latest()
            ->paginate(7);

            return PinjamTransaksi::with(['bibliobigrafi' => function($q) {
                $q->select('id', 'buku_id', 'pola_eksemplar');
            },  'bibliobigrafi.buku' => function($q) {
                $q->select('id', 'judul');
            }, 'user.anggota_transaksi.tipe_anggota'])
            ->where('status_pinjam', 0)
            ->whereHas('user', function($q) use ($search){
                $q->where('name', 'LIKE', "%$search%")->orWhere('id', 'LIKE', "%$search%");
            })
            ->orWhereHas('bibliobigrafi.buku', function($q) use ($search){
                $q->where('judul', 'LIKE', "%$search%");
            })
            ->orWhereHas('user.anggota_transaksi.tipe_anggota', function($q) use ($search){
                $q->where('tipe_anggota', 'LIKE', "%$search%");
            })
            ->orWhereHas('bibliobigrafi', function($q) use ($search){
                $q->where('pola_eksemplar', 'LIKE', "%$search%");
            })
            ->latest()
            ->paginate(5);

        }

    }

    public function pengunjung()
    {
        $title = 'Daftar Pengunjung Perpustakaan';
                $koleksi = Bibliobigrafi::all()->count();
        $anggota_count = User::all()->count();
        $eksemplar = PinjamTransaksi::all()->where('status_pinjam', 1)->count();
        $approve = User::whereNull('approved_at')->get()->count();
        return view('admin.pengunjung', compact('title', 'koleksi', 'anggota_count', 'eksemplar', 'approve'));
    }

    public function keterlambatan()
    {
        $title = 'Daftar Keterlambatan Buku';   
            $koleksi = Bibliobigrafi::all()->count();
        $anggota_count = User::all()->count();
        $eksemplar = PinjamTransaksi::all()->where('status_pinjam', 1)->count();
        $approve = User::whereNull('approved_at')->get()->count();
        return view('admin.keterlambatan', compact('title', 'koleksi', 'anggota_count', 'eksemplar', 'approve'));
    }

    public function digital()
    {
        $title = 'Sirkulasi Digital';
        $koleksi = Bibliobigrafi::all()->count();
        $anggota_count = User::all()->count();
        $eksemplar = PinjamTransaksi::all()->where('status_pinjam', 1)->count();
        $approve = User::whereNull('approved_at')->get()->count();
        return view('admin.sirkulasi.sirkulasi-digital', compact('title', 'koleksi', 'anggota_count', 'eksemplar', 'approve'));
    }

    public function keluar()
    {
        $title = 'Daftar Eksemplar Keluar';
                $koleksi = Bibliobigrafi::all()->count();
        $anggota_count = User::all()->count();
        $eksemplar = PinjamTransaksi::all()->where('status_pinjam', 1)->count();
        $approve = User::whereNull('approved_at')->get()->count();
        return view('admin.eksemplar.home', compact('title', 'koleksi', 'anggota_count', 'eksemplar', 'approve'));    
    }
}
