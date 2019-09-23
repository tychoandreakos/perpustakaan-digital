<?php

namespace App\Http\Controllers\admin;

use App\Bibliobigrafi;
use App\Jurusan;
use App\Http\Controllers\Controller;
use App\PinjamTransaksi;
use App\User;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Daftar Jurusan';
        $koleksi = Bibliobigrafi::all()->count();
        $anggota_count = User::all()->count();
        $eksemplar = PinjamTransaksi::all()->where('status_pinjam', 1)->count();
        $approve = User::whereNull('approved_at')->get()->count();

        return view('admin.master.jurusan.home', compact('title', 'koleksi', 'anggota_count', 'eksemplar', 'approve'));
    }

    public function fetch()
    {
        return Jurusan::latest()->paginate(5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Jurusan';
        $koleksi = Bibliobigrafi::all()->count();
        $anggota_count = User::all()->count();
        $eksemplar = PinjamTransaksi::all()->where('status_pinjam', 1)->count();
        $approve = User::whereNull('approved_at')->get()->count();
        return view('admin.master.jurusan.add', compact('title', 'koleksi', 'anggota_count', 'eksemplar', 'approve'));
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
            'nama_jurusan' => 'required|min: 3',
        ]);

        Jurusan::create($request->all());

          return response()->json([
            'message' => 'data berhasil disimpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function show(Jurusan $jurusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function edit(Jurusan $jurusan)
    {
        $title = 'Update Kota';
        $koleksi = Bibliobigrafi::all()->count();
        $anggota_count = User::all()->count();
        $eksemplar = PinjamTransaksi::all()->where('status_pinjam', 1)->count();
        $approve = User::whereNull('approved_at')->get()->count();
        return view('admin.master.jurusan.edit' ,compact('jurusan', 'title', 'koleksi', 'anggota_count', 'eksemplar', 'approve'));
    }

    public function search(Request $request)
    {
        if($request->has('q')){

            $search = $request->q;

            return Jurusan::where('nama_jurusan','LIKE',"%$search%")
            ->latest()->paginate(75);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jurusan $jurusan)
    {
        $jurusan->update($request->all());

        return response()->json([
            'message' => 'data berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jurusan $jurusan)
    {
        $jurusan->delete();

        return response()->json([
            'message' => 'data berhasil dihapus']);
    }
}
