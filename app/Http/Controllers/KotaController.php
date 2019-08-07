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
        //
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
        Kota::create($request->all());
        return response('Data Berhasil Disimpan', 200)
        ->header('Content-Type', 'text/plain');
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
        //
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

        return response('Data Berhasil Diubah', 200)
        ->header('Content-Type', 'text/plain');
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

        return response('Data Berhasil Dihapus', 200)
        ->header('Content-Type', 'text/plain');
    }
}
