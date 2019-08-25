<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

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
        return User::with('anggota_transaksi.tipe_anggota', 'anggota')->latest()->paginate(5);
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
            'id' => 'required|unique:users|integer',
            'name' => 'required|min:3',
            'password' => 'required|confirmed|min:6',
            'email' => 'required|min:6|email',
            'tgl_lahir' => 'required|date',
            'alamat' => 'nullable|min:6',
            'jk' => 'nullable',
            'no_telp' => 'nullable|min:6|numeric',
            'foto' => 'nullable',
            'image' => 'nullable',
        ]);

        if(!$request->image == '')
        {
            $image = $request->get('image');
            $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
            \Image::make($request->get('image'))->save(public_path('storage/anggota/').$name);
        } else {
        $name = 'img.jpg';
        }

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
        $requestData['foto'] = $name;
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
    public function edit($id)
    {
        $title = 'Update Anggota';
        $anggota = Anggota::with('users', 'users.anggota_transaksi.tipe_anggota')->where('user_id', $id)->first();
        $users = User::with('anggota')->where('id', $id)->first();
        return view('admin.anggota.edit', compact('anggota', 'users', 'title'));
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
