<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\Bibliobigrafi;
use App\PinjamTransaksi;
use App\User;
use Illuminate\Http\Request;

class EksemplarTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Daftar Eksemplar';
        $koleksi = Bibliobigrafi::all()->count();
        $anggota_count = User::all()->count();
        $eksemplar = PinjamTransaksi::all()->where('status_pinjam', 1)->count();
        $approve = User::whereNull('approved_at')->get()->count();
        return view('admin.master.eksemplar.home', compact('title', 'koleksi', 'anggota_count', 'eksemplar', 'approve'));
    }

    public function fetch()
    {
        return Bibliobigrafi::with(['buku' => function($q) {
            $q->select('id', 'judul');
        }, 'buku.buku_transaksi.pengarang' => function($q) {
            $q->select('id');
        }, 'klasifikasi' => function($q) {
            $q->select('id', 'tipe_klasifikasi');
        }])->latest()->paginate(5);
    }

    public function search(Request $request)
    {
        if($request->has('q')){

            $search = $request->q;

            return Bibliobigrafi::where('jenis_bahasa','LIKE',"%$search%")
            ->latest()->paginate(5);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bibliobigrafi  $bibliobigrafi
     * @return \Illuminate\Http\Response
     */
    public function show(Bibliobigrafi $bibliobigrafi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bibliobigrafi  $bibliobigrafi
     * @return \Illuminate\Http\Response
     */
    public function edit(Bibliobigrafi $bibliobigrafi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bibliobigrafi  $bibliobigrafi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bibliobigrafi $bibliobigrafi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bibliobigrafi  $bibliobigrafi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bilio = Bibliobigrafi::find($id);
        $bilio->gmd_transaksi()->delete();
        $bilio->pola_eksemplar()->delete();
        
        return response()->json([
            'message' => 'data berhasil dihapus']);
    }
}
