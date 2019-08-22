<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Daftar Buku';
        return view('admin.master.buku.home', compact('title'));
    }

    public function fetch()
    {
        return Buku::with(['buku_transaksi.pengarang' => function($q) {
            $q->select('id', 'nama_pengarang');
        }, 'buku_transaksi.penerbit' => function($q) {
            $q->select('id', 'nama_penerbit');
        }, 'buku_transaksi.topik' => function($q) {
            $q->select('id', 'jenis_topik', 'warna');
        }])->latest()->paginate(10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Buku';
        return view('admin.master.buku.add', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //    $request->slug = str_slug($request->judul);
        $validatedData = $request->validate([
            'judul' => 'required|min: 3',
            'edisi' => 'nullable',
            'isbn_isnn' => 'required|min: 3',
            'deskripsi_fisik' => 'required|min: 3',
            'tahun_terbit' => 'required',
            'judul_seri' => 'nullable',
            'catatan' => 'nullable',
            'slug' => 'nullable',
            'pdf' => 'nullable',
            'gambar_sampul' => 'nullable'
        ]);

        $requestData = $request->all();
        $requestData['slug'] = str_slug($request->judul);


        Buku::create($requestData);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit(Buku $buku)
    {
        $title = 'Update Buku';
        return view('admin.master.buku.edit' ,compact('buku', 'title'));
    }

    public function search(Request $request)
    {
        // $data = [];


        if($request->has('q')){

            $search = $request->q;

            return Buku::with(['buku_transaksi.pengarang' => function($q) {
                $q->select('id', 'nama_pengarang');
            }, 'buku_transaksi.penerbit' => function($q) {
                $q->select('id', 'nama_penerbit');
            }])->where('judul','LIKE',"%$search%")
            // ->orWhere('isbn_isnn','LIKE',"%$search%")
            ->latest()
            ->paginate(5);
        }


        // return response()->json($data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buku $buku)
    {
        $buku->update($request->all());

        return response()->json([
            'message' => 'data berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buku $buku)
    {
        return response()->json([
            'message' => 'data berhasil dihapus']);
    }
}
