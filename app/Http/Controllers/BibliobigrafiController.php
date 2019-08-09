<?php

namespace App\Http\Controllers;

use App\Bibliobigrafi;
use Illuminate\Http\Request;
use App\Pengarang;
use App\Penerbit;
use App\Kota;
use App\Gmd;
use App\Klasifikasi;
use App\LokasiRak;
use App\Bahasa;
use App\Buku;
use App\BukuTransaksi;
use App\EksemplarPola;

class BibliobigrafiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.bibliobigrafi.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Bibiliobigrafi';
        return view('admin.bibliobigrafi.add', compact('title'));
    }

    public function pengarang()
    {
        return Pengarang::all();
    }

    public function penerbit()
    {
        return Penerbit::all();
    }

    public function kota()
    {
        return Kota::all();
    }

    public function gmd()
    {
        return Gmd::all();
    }

    public function pola()
    {
        return EksemplarPola::all();
    }

    public function bahasa()
    {
        return Bahasa::all();
    }

    public function klasifikasi()
    {
        return Klasifikasi::all();
    }

    public function lokasi()
    {
        return LokasiRak::all();
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
            'edisi' => 'nullable',
            'isbn_isnn' => 'required',
            'deskripsi_fisik' => 'required',
            'tahun_terbit' => 'required',
            'judul_seri' => 'nullable',
            'catatan' => 'nullable',
            'slug' => 'nullable',
            'pdf' => 'nullable',
            'gambar_sampul' => 'nullable'
        ]);

        
        $requestData = $request->all();
        $requestData['slug'] = str_slug($request->judul);
        $buku = Buku::create($requestData);

       foreach ($request->pengarang_id as $pengarang) {
            $requestTrans = $request->all();
            $requestTrans['buku_id'] = $buku->id;
            $requestTrans['pengarang_id'] = $pengarang;   
            BukuTransaksi::create($requestTrans);
       }
        
        
        $requestBilio = $request->all();
        $requestBilio['buku_id'] = $buku->id;
        $requestBilio['klasifikasi_id'] = $request->klasifikasi_id;
        $requestBilio['gmd_id'] = $request->gmd_id;
        $requestBilio['pola_eksemplar'] = 'B000';
        Bibliobigrafi::create($requestBilio);

        return response()->json([
            'message' => 'data berhasil disimpan']);
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
    public function destroy(Bibliobigrafi $bibliobigrafi)
    {
        //
    }
}
