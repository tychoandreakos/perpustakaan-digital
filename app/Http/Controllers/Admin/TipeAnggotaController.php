<?php

namespace App\Http\Controllers\admin;

use App\Bibliobigrafi;
use App\Http\Controllers\Controller;
use App\PinjamTransaksi;
use App\TipeAnggota;
use App\User;
use Illuminate\Http\Request;

class TipeAnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Daftar Tipe Anggota';
        $koleksi = Bibliobigrafi::all()->count();
        $anggota_count = User::all()->count();
        $eksemplar = PinjamTransaksi::all()->where('status_pinjam', 1)->count();
        $approve = User::whereNull('approved_at')->get()->count();
        return view('admin.keanggotaan.tipe.home', compact('title', 'koleksi', 'anggota_count', 'eksemplar', 'approve'));
    }

    public function fetch()
    {
        return TipeAnggota::latest()->paginate(50);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Tipe Anggota';
        $koleksi = Bibliobigrafi::all()->count();
        $anggota_count = User::all()->count();
        $eksemplar = PinjamTransaksi::all()->where('status_pinjam', 1)->count();
        $approve = User::whereNull('approved_at')->get()->count();
        return view('admin.keanggotaan.tipe.add', compact('title', 'koleksi', 'anggota_count', 'eksemplar', 'approve'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tipe_anggota' => 'required|unique:tipe_anggota',
            'jumlah_pinjaman' => 'required|numeric',
            'masa_berlaku_anggota' => 'required|numeric',
            'masa_pinjaman_buku' => 'required|numeric',
            'batas_perpanjangan_anggota' => 'required|numeric',
            'denda' => 'required',    
        ]);

        $validatedData['tipe_anggota'] = ucwords($request->tipe_anggota);
        TipeAnggota::create($validatedData);
       
        return response()->json([
            'message' => 'data berhasil disimpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipeAnggota  $tipeAnggotum
     * @return \Illuminate\Http\Response
     */
    public function show(TipeAnggota $tipeAnggotum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipeAnggota  $tipeAnggotum
     * @return \Illuminate\Http\Response
     */
    public function edit(TipeAnggota $tipeAnggotum)
    {
        $title = 'Update Tipe Anggota';
        $koleksi = Bibliobigrafi::all()->count();
        $anggota_count = User::all()->count();
        $eksemplar = PinjamTransaksi::all()->where('status_pinjam', 1)->count();
        $approve = User::whereNull('approved_at')->get()->count();
        return view('admin.keanggotaan.tipe.edit' ,compact('tipeAnggotum', 'title', 'koleksi', 'anggota_count', 'eksemplar', 'approve'));
    }

    public function search(Request $request)
    {
        if($request->has('q')){

            $search = $request->q;

            return TipeAnggota::where('tipe_anggota','LIKE',"%$search%")
            ->latest()->paginate(5);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipeAnggota  $tipeAnggotum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipeAnggota $tipeAnggotum)
    {
        $tipeAnggotum->update($request->all());

        return response()->json([
            'message' => 'data berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipeAnggota  $tipeAnggotum
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipeAnggota $tipeAnggotum)
    {
        $tipeAnggotum->delete();

        return response()->json([
            'message' => 'data berhasil dihapus']);
    }
}
