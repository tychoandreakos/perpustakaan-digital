<?php

namespace App\Http\Controllers;

use App\Pengarang;
use Illuminate\Http\Request;

class PengarangController extends Controller
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
        Pengarang::create($request->all());

        return response('data berhasil disimpan', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pengarang  $pengarang
     * @return \Illuminate\Http\Response
     */
    public function show(Pengarang $pengarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pengarang  $pengarang
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengarang $pengarang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pengarang  $pengarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengarang $pengarang)
    {
        $pengarang->update($request->all());

        return response('data berhasil diubah', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengarang  $pengarang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengarang $pengarang)
    {
        $pengarang->delete();
    }
}
