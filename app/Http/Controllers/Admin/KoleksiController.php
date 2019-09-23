<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\Koleksi;
use App\Bibliobigrafi;
use App\PinjamTransaksi;
use App\User;
use Illuminate\Http\Request;

class KoleksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Daftar Koleksi';
        $koleksi = Bibliobigrafi::all()->count();
        $anggota_count = User::all()->count();
        $eksemplar = PinjamTransaksi::all()->where('status_pinjam', 1)->count();
        $approve = User::whereNull('approved_at')->get()->count();
        return view('admin.master.koleksi.home', compact('title', 'koleksi', 'anggota_count', 'eksemplar', 'approve'));
    }

    public function fetch()
    {
        return Koleksi::latest()->paginate(75);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Koleksi';
        $koleksi = Bibliobigrafi::all()->count();
        $anggota_count = User::all()->count();
        $eksemplar = PinjamTransaksi::all()->where('status_pinjam', 1)->count();
        $approve = User::whereNull('approved_at')->get()->count();
        return view('admin.master.koleksi.add', compact('title', 'koleksi', 'anggota_count', 'eksemplar', 'approve'));
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
            'tipe_koleksi' => 'required',
        ]);
        
        Koleksi::create($request->all());

        return response()->json([
            'message' => 'data berhasil disimpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Koleksi  $koleksi
     * @return \Illuminate\Http\Response
     */
    public function show(Koleksi $koleksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Koleksi  $koleksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Koleksi $koleksi)
    {
        $title = 'Update Koleksi';
        // return
        $koleksi2 = $koleksi;
        $koleksi = Bibliobigrafi::all()->count();
        $anggota_count = User::all()->count();
        $eksemplar = PinjamTransaksi::all()->where('status_pinjam', 1)->count();
        $approve = User::whereNull('approved_at')->get()->count();
        return view('admin.master.koleksi.edit' ,compact('koleksi2', 'title', 'koleksi', 'anggota_count', 'eksemplar', 'approve'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Koleksi  $koleksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Koleksi $koleksi)
    {
        $koleksi->update($request->all());

        return response()->json([
            'message' => 'data berhasil diubah']);
    }

    public function search(Request $request)
    {
        if($request->has('q')){

            $search = $request->q;

            return Koleksi::where('tipe_koleksi','LIKE',"%$search%")
            ->latest()->paginate(5);
        }

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Koleksi  $koleksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Koleksi $koleksi)
    {
        // return $
        $koleksi->delete();

        return response()->json([
            'message' => 'data berhasil dihapus']);
    }
}
