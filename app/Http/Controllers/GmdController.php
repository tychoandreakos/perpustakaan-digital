<?php

namespace App\Http\Controllers;

use App\Gmd;
use Illuminate\Http\Request;

class GmdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Responses
     */
    public function index()
    {
        $title = 'Daftar GMD';
        return view('admin.master.gmd.home', compact('title'));
    }

    public function fetch()
    {
        return Gmd::latest()->paginate(5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah GMD';
        return view('admin.master.gmd.add', compact('title'));
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
            'kode_gmd' => 'required|unique:gmd',
            'nama_gmd' => 'required',
        ]);

        Gmd::create($request->all());

        return response()->json([
            'message' => 'data berhasil disimpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gmd  $gmd
     * @return \Illuminate\Http\Response
     */
    public function show(Gmd $gmd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gmd  $gmd
     * @return \Illuminate\Http\Response
     */
    public function edit(Gmd $gmd)
    {
        $title = 'Update GMD';
        return view('admin.master.gmd.edit' ,compact('gmd', 'title'));
    }

    public function search(Request $request)
    {
        // $data = [];


        if($request->has('q')){

            $search = $request->q;

            return Gmd::where('kode_gmd','LIKE',"%$search%")->
            orWhere('nama_gmd', "LIKE", "%$search%")->orderBy('updated_at', 'DESC')->paginate(5);

        }


        // return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gmd  $gmd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gmd $gmd)
    {
       $gmd->update($request->input());
        
       return response()->json([
        'message' => 'data berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gmd  $gmd
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gmd $gmd)
    {
        $gmd->delete();
        return response()->json([
            'message' => 'data berhasil dihapus']);
    }
}
