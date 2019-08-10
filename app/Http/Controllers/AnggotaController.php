<?php

namespace App\Http\Controllers;

use App\Anggota;
use Illuminate\Http\Request;
use App\AnggotaTransaksi;
use App\User;
use Carbon\Carbon;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Daftar Anggota';
        return view('admin.anggota.home', compact('title'));
    }

    public function fetch()
    {
        return AnggotaTransaksi::with('user', 'tipe_anggota')->latest()->paginate(5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Anggota';
        return view('admin.anggota.add', compact('title'));
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
            // 'id' => 'required|unique:users|integer',
            'name' => 'required|min:3',
            'password' => 'required|confirmed|min:6',
            'email' => 'required|min:6',
            'tgl_lahir' => 'required',
            'alamat' => 'nullable|min:6',
            'jk' => 'nullable',
            'no_telp' => 'nullable|min:6',
            'foto' => 'nullable',
        ]);

        $dt = Carbon::now();

        $user = User::create($request->all());

        $requestTrans = $request->all();
        $requestTrans['user_id'] = $user->id;
        AnggotaTransaksi::create($requestTrans);

        $requestData = $request->all();
        $requestData['user_id'] = $user->id;
        $requestData['tgl_registrasi'] = $dt->toDateString();
        $requestData['tgl_expired'] = $dt->addYears($request->tipe);
        $requestData['tgl_lahir'] = date('Y-m-d', strtotime($request->tgl_lahir));
        $requestData['jk'] = ($request->jk == 'pria' || $request->jk == 'Pria') ? 0 : 1;
        Anggota::create($requestData);
       
        return response()->json([
            'message' => 'data berhasil disimpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function show(Anggota $anggota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function edit(Anggota $anggota)
    {
        $title = 'Update Anggota';
        return view('admin.anggota.edit' ,compact('anggota', 'title'));
    }

    public function search(Request $request)
    {
        if($request->has('q')){

            $search = $request->q;

            return Anggota::where('jenis_anggota','LIKE',"%$search%")
            ->latest()->paginate(5);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anggota $anggota)
    {
        
        $anggota->update($request->all());

        return response()->json([
            'message' => 'data berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anggota $anggota)
    {
        $anggota->delete();

        return response()->json([
            'message' => 'data berhasil dihapus']);
    }
}
