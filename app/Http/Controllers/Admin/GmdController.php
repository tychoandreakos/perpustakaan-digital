<?php

namespace App\Http\Controllers\admin;

use App\Bibliobigrafi;
use App\Http\Controllers\Controller;

use App\Gmd;
use App\PinjamTransaksi;
use App\User;
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
        $koleksi = Bibliobigrafi::all()->count();
        $anggota_count = User::all()->count();
        $eksemplar = PinjamTransaksi::all()->where('status_pinjam', 1)->count();
        $approve = User::whereNull('approved_at')->get()->count();
        return view('admin.master.gmd.home', compact('title', 'koleksi', 'anggota_count', 'eksemplar', 'approve'));
    }

    public function fetch()
    {
        return Gmd::orderBy('kode_gmd', 'ASC')->paginate(5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah GMD';
        $koleksi = Bibliobigrafi::all()->count();
        $anggota_count = User::all()->count();
        $eksemplar = PinjamTransaksi::all()->where('status_pinjam', 1)->count();
        $approve = User::whereNull('approved_at')->get()->count();
        return view('admin.master.gmd.add', compact('title', 'koleksi', 'anggota_count', 'eksemplar', 'approve'));
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
            'kode_gmd' => 'required|unique:gmd||min: 3',
            'nama_gmd' => 'required|min: 3',
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
        $approve = User::whereNull('approved_at')->get()->count();
        return view('admin.master.gmd.edit' ,compact('gmd', 'title', 'koleksi', 'anggota_count', 'eksemplar', 'approve'));
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
