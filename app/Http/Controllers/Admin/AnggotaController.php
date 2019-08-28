<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\Anggota;
use Illuminate\Http\Request;
use App\AnggotaTransaksi;
use App\Bibliobigrafi;
use App\PinjamTransaksi;
use App\User;
use Carbon\Carbon;
use DateTime;

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
        $koleksi = Bibliobigrafi::all()->count();
        $anggota_count = User::all()->count();
        $eksemplar = PinjamTransaksi::all()->where('status_pinjam', 1)->count();
        $approve = User::whereNull('approved_at')->get()->count();
        return view('admin.anggota.home', compact('title', 'koleksi', 'anggota_count', 'eksemplar', 'approve'));
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
        $koleksi = Bibliobigrafi::all()->count();
        $anggota_count = User::all()->count();
        $eksemplar = PinjamTransaksi::all()->where('status_pinjam', 1)->count();
        $approve = User::whereNull('approved_at')->get()->count();
        return view('admin.anggota.add', compact('title', 'koleksi', 'anggota_count', 'eksemplar', 'approve'));
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
            'jurusan' => 'nullable',
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
     * @param  \App\Anggota  $anggotum
     * @return \Illuminate\Http\Response
     */
    public function show(Anggota $anggotum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Anggota  $anggotum
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Update Anggota';
        // return
        $anggota = Anggota::with('anggota_transaksi.tipe_anggota')->where('user_id', $id)->first();
        $users = User::with('anggota')->where('id', $id)->first();
        return view('admin.anggota.edit', compact('anggota', 'users', 'title'));
    }

    public function search(Request $request)
    {
        if($request->has('q')){

            $search = $request->q;

            return User::with('anggota_transaksi.tipe_anggota', 'anggota')->where('name','LIKE',"%$search%")
            ->latest()->paginate(5);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Anggota  $anggotum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::find($request->id)->first();
        $user->update($request->all());
        $user->save();

        $anggota = Anggota::find($request->id)->first();
        $anggota->update($anggota->all());
        $anggota->save();

        $transaksi = AnggotaTransaksi::find($request->id)->first();
        $transaksi->update($request->all());
        $transaksi->save();

        return response()->json([
            'message' => 'data berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Anggota  $anggotum
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id)->first();

        $count = PinjamTransaksi::where('user_id', $id)->count();
        for ($i=0; $i < $count ; $i++) { 
            $pinjam = PinjamTransaksi::where('user_id', $id)->first();
            $bilio = $pinjam->bibliobigrafi()->first();
            $bilio->status_pinjam = 0;
            $bilio->save();
        }

        $user->pinjam_transaksi()->delete();
        $user->anggota_transaksi()->delete();
        $user->anggota()->delete();
        $user->delete();

        return response()->json([
            'message' => 'data berhasil dihapus']);
    }

    public function getAllMonth() {
        
        $month_arr = array();
        $buku = Anggota::orderBy('created_at', 'ASC')
        ->pluck('created_at');

        $buku = json_decode($buku);
// 
        if(!empty($buku)) {
            foreach($buku as $date){
                $date = new DateTime( $date );
                $month_no = $date->format( 'm' );
                $month_name = $date->format( 'M' );
                $month_arr[$month_no] = $month_name;
            }
        }
        return $month_arr;
    }

    public function getMonthCount( $month )
    {
        $post_count = Anggota::whereMonth('created_at', $month)->get()->count();
        return $post_count;        
    }

    public function chart()
    {
      
        $month_name_arr = [];
        $month_post_arr = [];
        $month_arr = $this->getAllMonth();
        if(!empty($month_arr)) {
            foreach($month_arr as $month_no => $month_name) {
                $month_post = $this->getMonthCount( $month_no );
                array_push($month_post_arr, $month_post);
                array_push($month_name_arr, $month_name);
            }
        }


        $month_data_arr = [
            'months' => $month_name_arr,
            'post_count_data' => $month_post_arr,
        ];

        return $month_data_arr;
    }
}
