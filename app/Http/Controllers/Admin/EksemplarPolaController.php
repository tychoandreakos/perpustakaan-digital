<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\EksemplarPola;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class EksemplarPolaController extends Controller
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
        $requestData = $request->all();
        $requestData['prefix'] = (int)strlen($request->prefix);
        $requestData['serial'] = (int)$request->serial;
        $requestData['suffix'] = (int)strlen($request->suffix) || 0;
       EksemplarPola::create($requestData);

       return response()->json([
        'message' => 'data berhasil disimpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EksemplarPola  $eksemplarPola
     * @return \Illuminate\Http\Response
     */
    public function show(EksemplarPola $eksemplarPola)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EksemplarPola  $eksemplarPola
     * @return \Illuminate\Http\Response
     */
    public function edit(EksemplarPola $eksemplarPola)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EksemplarPola  $eksemplarPola
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EksemplarPola $eksemplarPola)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EksemplarPola  $eksemplarPola
     * @return \Illuminate\Http\Response
     */
    public function destroy(EksemplarPola $eksemplarPola)
    {
        //
    }
}
