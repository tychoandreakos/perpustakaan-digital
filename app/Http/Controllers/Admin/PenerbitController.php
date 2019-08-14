<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Daftar Penerbit';
        return view('admin.master.penerbit.home', compact('title'));
    }

    public function fetch()
    {
        return Penerbit::latest()->paginate(5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Penerbit';
        return view('admin.master.penerbit.add', compact('title'));
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
            'nama_penerbit' => 'required',
        ]);

        Penerbit::create($request->all());

        return response()->json([
            'message' => 'data berhasil disimpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Penerbit  $penerbit
     * @return \Illuminate\Http\Response
     */
    public function show(Penerbit $penerbit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Penerbit  $penerbit
     * @return \Illuminate\Http\Response
     */
    public function edit(Penerbit $penerbit)
    {
        $title = 'Update Penerbit';
        return view('admin.master.penerbit.edit' ,compact('penerbit', 'title'));
    }
    
    public function search(Request $request)
    {
        // $data = [];


        if($request->has('q')){

            $search = $request->q;

            return Penerbit::where('nama_penerbit','LIKE',"%$search%")
            ->orderBy('updated_at', 'DESC')
            ->paginate(5);

        }


        // return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Penerbit  $penerbit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penerbit $penerbit)
    {
        $penerbit->update($request->all());

        return response()->json([
            'message' => 'data berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Penerbit  $penerbit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penerbit $penerbit)
    {
        $penerbit->delete();

        return response()->json([
            'message' => 'data berhasil dihapus']);
    }
}
