<?php

namespace App\Http\Controllers;

use App\Bibliobigrafi;
use Illuminate\Http\Request;

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
        //
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
