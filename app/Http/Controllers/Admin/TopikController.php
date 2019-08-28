<?php

namespace App\Http\Controllers\admin;

use App\Bibliobigrafi;
use App\Http\Controllers\Controller;
use App\PinjamTransaksi;
use App\Topik;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TopikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Daftar Topik';
        $koleksi = Bibliobigrafi::all()->count();
        $anggota_count = User::all()->count();
        $eksemplar = PinjamTransaksi::all()->where('status_pinjam', 1)->count();
        $approve = User::whereNull('approved_at')->get()->count();
        return view('admin.topik.home', compact('title', 'koleksi', 'anggota_count', 'eksemplar', 'approve'));
    }


    public function fetch()
    {
        return Topik::orderBy('order', 'ASC')->paginate(5);
    }

    public function last()
    {
        return Topik::orderBy('order', 'DESC')->first();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Topik';
        $koleksi = Bibliobigrafi::all()->count();
        $anggota_count = User::all()->count();
        $eksemplar = PinjamTransaksi::all()->where('status_pinjam', 1)->count();
        $approve = User::whereNull('approved_at')->get()->count();
        return view('admin.topik.add', compact('title', 'koleksi', 'anggota_count', 'eksemplar', 'approve'));
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
        $requestData['slug'] = str_slug($request->jenis_topik);
        Topik::create($requestData);
       
        return response()->json([
            'message' => 'data berhasil disimpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Topik  $topik
     * @return \Illuminate\Http\Response
     */
    public function show(Topik $topik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Topik  $topik
     * @return \Illuminate\Http\Response
     */
    public function edit(Topik $topik)
    {
        $title = 'Update Topik';
        return view('admin.topik.edit' ,compact('topik', 'title'));
    }

    public function search(Request $request)
    {
        if($request->has('q')){

            $search = $request->q;

            return Topik::where('jenis_topik','LIKE',"%$search%")
            ->latest()->paginate(5);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Topik  $topik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topik $topik)
    {
        $validatedData = $request->validate([
            'jenis_topik' => 'required',
            'image' =>  'required',
            'slug' => 'nullable',
            'old' => 'required',
            'order' => 'required',Rule::unique('topik')->ignore($topik->order)
        ]);

        if($request->image != $request->old){
            $image = $request->get('image');
            $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
            \Image::make($request->get('image'))->save(public_path('storage/topik/').$name);
            unlink(public_path('storage/topik/'. $request->old));
        }

        $requestData = $request->all();
        if(isset($name)){
            $requestData['img'] = $name;
        }
        $topik->update($requestData);

        return response()->json([
            'message' => 'data berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Topik  $topik
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topik $topik)
    {
        unlink(public_path('storage/topik/'. $topik->img));
        $topik->delete();

        return response()->json([
            'message' => 'data berhasil dihapus']);
    }
}
