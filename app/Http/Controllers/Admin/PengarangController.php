<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

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
        $title = 'Daftar Pengarang';
        return view('admin.master.pengarang.home', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetch()
    {
        return Pengarang::latest()->paginate(5);
    }

    public function create()
    {
        $title = 'Tambah Pengarang';
        return view('admin.master.pengarang.add', compact('title'));
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
            'nama_pengarang' => 'required',
            'tahun_lahir' => 'nullable',
        ]);

        Pengarang::create($request->all());

        return response()->json([
            'message' => 'data berhasil disimpan']);


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
        $title = 'Update Pengarang';
        return view('admin.master.pengarang.edit' ,compact('pengarang', 'title'));
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

        return response()->json([
            'message' => 'data berhasil diubah']);
    }

    public function search(Request $request)
    {
        // $data = [];


        if($request->has('q')){

            $search = $request->q;

            return Pengarang::where('nama_pengarang','LIKE',"%$search%")
            ->latest()
            ->paginate(5);

        }


        // return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengarang  $pengarang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengarang $pengarang)
    {
        return response()->json([
            'message' => 'data berhasil dihapus']);
    }
}
