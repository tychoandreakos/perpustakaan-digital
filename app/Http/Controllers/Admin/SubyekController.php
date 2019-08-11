<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\Subyek;
use Illuminate\Http\Request;

class SubyekController extends Controller
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
        Subyek::create($request->all());

        return response('data berhasil disimpan', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subyek  $subyek
     * @return \Illuminate\Http\Response
     */
    public function show(Subyek $subyek)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subyek  $subyek
     * @return \Illuminate\Http\Response
     */
    public function edit(Subyek $subyek)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subyek  $subyek
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subyek $subyek)
    {
        $subyek->update($request->all());

        return response('data berhasil diubah', 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subyek  $subyek
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subyek $subyek)
    {
        $subyek->delete();
    }
}
