<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\lokasi_rak;
use Illuminate\Http\Request;
use App\LokasiRak;

class LokasiRakController extends Controller
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
        LokasiRak::create($request->all());

        return response('data berhasil disimpan', 200);
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
    public function edit(lokasi_rak $lokasi_rak)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\lokasi_rak  $lokasi_rak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, lokasi_rak $lokasi_rak)
    {
        $lokasi_rak->update($request->all);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\lokasi_rak  $lokasi_rak
     * @return \Illuminate\Http\Response
     */
    public function destroy(lokasi_rak $lokasi_rak)
    {
        $lokasi_rak->delete();
    }
}
