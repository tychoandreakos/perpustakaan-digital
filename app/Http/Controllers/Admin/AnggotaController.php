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
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

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
        return User::with('anggota_transaksi.tipe_anggota', 'anggota', 'anggota.jurusan')->latest()->paginate(5);
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
        // return $request->all();
        $validatedData = $request->validate([
            'id' => 'required|unique:users|integer',
            'name' => 'required|min:3',
            'password' => 'required|confirmed|min:6',
            'email' => 'required|min:6|email|unique:users',
            'tgl_lahir' => 'required|date',
            'alamat' => 'nullable|min:6',
            'jk' => 'nullable',
            'jurusan_id' => 'required',
            'no_telp' => 'nullable|min:6|numeric',
            'foto' => 'nullable',
            'jurusan' => 'nullable',
            'image' => 'nullable',
            'tipe_anggota' => 'required',
        ]);

        if(!$request->image == '')
        {
            $image = $request->get('image');
            $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];

            $path = public_path('storage/anggota/');
            $preview = public_path('storage/preview/');
            
            if(!File::isDirectory($path) && !File::isDirectory($preview)){
                File::makeDirectory($path, 0777, true, true);
                File::makeDirectory($preview, 0777, true, true);
            }

            \Image::make($request->get('image'))->fit(250)->save($path.$name);
            \Image::make($request->get('image'))->fit(250)->save($preview.$name);
        } else {
        $name = 'img.svg';
        }

        $dt = Carbon::now();

        $requestData = $request->all();
        $requestData['password'] = Hash::make($request['password']);
        $requestData['approved_at'] = $dt;
        $user = User::create($requestData);

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
        // sayangku? hallo cintaku tersayanggg :*
        // sayangku udh lanca lagi?
        // udh cintakuu :D :* :* :* 
        // sayangku liatin aku dulu sebentar ada error :D 
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
        $koleksi = Bibliobigrafi::all()->count();
        $anggota_count = User::all()->count();
        $eksemplar = PinjamTransaksi::all()->where('status_pinjam', 1)->count();
        $approve = User::whereNull('approved_at')->get()->count();
        $anggota = Anggota::with('anggota_transaksi.tipe_anggota', 'jurusan')->where('user_id', $id)->first();
        $users = User::with('anggota', 'anggota.jurusan')->where('id', $id)->first();
        
        return view('admin.anggota.edit', compact('anggota', 'users', 'title', 'koleksi', 'anggota_count', 'eksemplar', 'approve'));
    }

    public function search(Request $request)
    {
        if($request->has('q')){

            $search = $request->q;

            return User::with('anggota_transaksi.tipe_anggota', 'anggota', 'anggota.jurusan')->where('id','LIKE',"%$search%")->orWhere('name','LIKE',"%$search%")
            ->orWhereHas('anggota.jurusan', function($q) use ($search){
                $q->where('nama_jurusan', 'LIKE', "%$search%");
            })->latest()->paginate(5);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Anggota  $anggotum
     * @return \Illuminate\Http\Response
     */

    public function verifikasi($id)
    {
        $user = User::find($id);
        $user->approved_at = Carbon::now();
        $user->save();

        return response()->json([
            'message' => 'user dengan '.$id.' berhasil diaktifkan.']);
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|unique:users,id,'.$request->id,
            'name' => 'required|min:3',
            'password' => 'nullable',
            'email' => 'required|min:6|email|unique:users,email,'.$request->id.',id',
            'tgl_lahir' => 'required|date',
            'alamat' => 'nullable|min:6',
            'jk' => 'nullable',
            'no_telp' => 'nullable|min:6',
            'foto' => 'nullable',
            'jurusan' => 'nullable',
            'image' => 'nullable',
            'foto' => 'required',
            'old' => 'required',
            'tipe_anggota_id' => 'required'
        ]);


        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
       
        if(!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        $anggota = Anggota::find($request->id);
        $anggota->jurusan_id = $request->jurusan_id;
        $anggota->tgl_lahir =  date('Y-m-d', strtotime($request->tgl_lahir));
        $anggota->alamat = $request->alamat;
        $anggota->jk = ($request->jk == 'pria' || $request->jk == 'Pria') ? 0 : 1;
        $anggota->no_telp = $request->no_telp;

        
        if($request->foto !== $anggota->foto)
        {
            $image = $request->get('image');
            $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];

            $path = public_path('storage/anggota/');
            $preview = public_path('storage/preview/');
            
            if(!File::isDirectory($path) && !File::isDirectory($preview)){
                File::makeDirectory($path, 0777, true, true);
                File::makeDirectory($preview, 0777, true, true);
            }

            if($request->old !== 'img.svg') {
                unlink(public_path('storage/anggota/'. $anggota->foto));
                unlink(public_path('storage/preview/'. $anggota->foto));
            }


            \Image::make($request->get('image'))->fit(250)->save($path.$name);
            \Image::make($request->get('image'))->fit(250)->save($preview.$name);
            
            $anggota->foto = $name;
        }


        $anggota->save();

        $transaksi = AnggotaTransaksi::where('user_id', $request->id)->first();
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
        $user = User::find($id);

        $count = PinjamTransaksi::where('user_id', $id)->count();
        for ($i=0; $i < $count ; $i++) { 
            $pinjam = PinjamTransaksi::where('user_id', $id)->first();
            $bilio = $pinjam->bibliobigrafi()->first();
            $bilio->status_pinjam = 0;
            $bilio->save();
        }


        if($user->anggota->foto !== 'img.svg') {
            if(file_exists(public_path('storage/anggota/'. $user->anggota->foto))) {
                unlink(public_path('storage/anggota/'. $user->anggota->foto));
                unlink(public_path('storage/preview/'. $user->anggota->foto));
            }
        }

        // $user->pinjam_transaksi()->denda()->delete();
        $user->denda()->delete();
        $user->buku_tamu()->delete();
        $user->anggota_transaksi()->delete();
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
