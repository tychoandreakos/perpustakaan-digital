<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Daftar Berita';
        return view('admin.berita.home', compact('title'));
    }

    public function fetch()
    {
        return Berita::latest()->paginate(5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Berita';
        return view('admin.berita.add', compact('title'));//
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
            'judul' => 'required',
            'isi' =>  'required',
            'slug' => 'nullable'
        ]);

        Berita::create($validatedData);
       
        return response()->json([
            'message' => 'data berhasil disimpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show(Berita $berita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit(Berita $berita)
    {
        $title = 'Update Berita';
        return view('admin.berita.edit' ,compact('bahasa', 'title'));
    }

    public function search(Request $request)
    {
        if($request->has('q')){

            $search = $request->q;

            return Berita::where('judul','LIKE',"%$search%")
            ->latest()->paginate(5);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Berita $berita)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'isi' =>  'required',
            'slug' => 'nullable'
        ]);

        $berita->update($request->all());

        return response()->json([
            'message' => 'data berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Berita $berita)
    {
        $berita->delete();

        return response()->json([
            'message' => 'data berhasil dihapus']);
    }
}
