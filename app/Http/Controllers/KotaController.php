<?php

namespace App\Http\Controllers;

use App\Kota;
use Illuminate\Http\Request;

class KotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Daftar KOta';
        return view('admin.master.kota.home', compact('title'));
    }

    public function fetch()
    {
        return Kota::latest()->paginate(5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Kota';
        return view('admin.master.kota.add', compact('title'));
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
            'nama_kota' => 'required',
        ]);

        Kota::create($request->all());

          return response()->json([
            'message' => 'data berhasil disimpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function show(Kota $kotum)
    {
        return $kotum;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function edit(Kota $kotum)
    {
        $title = 'Update Kota';
        return view('admin.master.kota.edit' ,compact('kotum', 'title'));
    }

    public function search(Request $request)
    {
        if($request->has('q')){

            $search = $request->q;

            return Kota::where('nama_kota','LIKE',"%$search%")
            ->latest()->paginate(5);
        }

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kota $kotum)
    {
        // return response($request->all());
    
        $kotum->update($request->all());

        return response()->json([
            'message' => 'data berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kota $kotum)
    {
        $kotum->delete();

        return response()->json([
            'message' => 'data berhasil dihapus']);
    }
}
