<?php

namespace App\Http\Controllers\admin;

use App\Bibliobigrafi;
use App\Http\Controllers\Controller;

use App\lokasi_rak;
use Illuminate\Http\Request;
use App\LokasiRak;
use App\PinjamTransaksi;
use App\User;

class LokasiRakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Daftar Lokasi Rak Buku';
        $koleksi = Bibliobigrafi::all()->count();
        $anggota_count = User::all()->count();
        $eksemplar = PinjamTransaksi::all()->where('status_pinjam', 1)->count();
        $approve = User::whereNull('approved_at')->get()->count();
        return view('admin.master.lokasi.home', compact('title', 'koleksi', 'anggota_count', 'eksemplar', 'approve'));
    
    }

    public function fetch()
    {
        return LokasiRak::latest()->paginate(5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Lokasi Rak';
        $koleksi = Bibliobigrafi::all()->count();
        $anggota_count = User::all()->count();
        $eksemplar = PinjamTransaksi::all()->where('status_pinjam', 1)->count();
        $approve = User::whereNull('approved_at')->get()->count();
        return view('admin.master.lokasi.add', compact('title', 'koleksi', 'anggota_count', 'eksemplar', 'approve'));
    
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
            'kode_lokasi' => 'required|min: 3|unique:lokasi_rak',
            'nama_lokasi' => 'required|min: 3',
        ]);

        LokasiRak::create($request->all());

        return response()->json([
            'message' => 'data berhasil disimpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\lokasi_rak  $lokasi_rak
     * @return \Illuminate\Http\Response
     */
    public function show(lokasi_rak $lokasi_rak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\lokasi_rak  $lokasi_rak
     * @return \Illuminate\Http\Response
     */
    public function edit(LokasiRak $lokasi)
    {
        $title = 'Update Lokasi Rak Buku';
        $koleksi = Bibliobigrafi::all()->count();
        $anggota_count = User::all()->count();
        $eksemplar = PinjamTransaksi::all()->where('status_pinjam', 1)->count();
        $approve = User::whereNull('approved_at')->get()->count();
        return view('admin.master.lokasi.edit' ,compact('lokasi', 'title', 'koleksi', 'anggota_count', 'eksemplar', 'approve'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\lokasi_rak  $lokasi_rak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'kode_lokasi' => 'required|min: 3|unique:lokasi_rak,id,'. $id,
            'nama_lokasi' => 'required|min: 3',
        ]);

        $lokasi = LokasiRak::find($id);
        $lokasi->kode_lokasi = $request->kode_lokasi;
        $lokasi->nama_lokasi = $request->nama_lokasi;
        $lokasi->save();

        return response()->json([
            'message' => 'data berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\lokasi_rak  $lokasi_rak
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lokasi = LokasiRak::find($id);
        $lokasi->delete();

        return response()->json([
            'message' => 'data berhasil dihapus']);
    }
}
