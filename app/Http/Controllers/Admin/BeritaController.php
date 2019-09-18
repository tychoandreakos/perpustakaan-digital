<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\Berita;
use App\Bibliobigrafi;
use App\PinjamTransaksi;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $koleksi = Bibliobigrafi::all()->count();
        $anggota_count = User::all()->count();
        $eksemplar = PinjamTransaksi::all()->where('status_pinjam', 1)->count();
        $approve = User::whereNull('approved_at')->get()->count();
        $title = 'Daftar Berita';
        return view('admin.berita.home', compact('title', 'koleksi', 'anggota_count', 'eksemplar', 'approve'));
    }

    public function fetch()
    {
        return Berita::latest()->paginate(50);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Berita';
        $koleksi = Bibliobigrafi::all()->count();
        $anggota_count = User::all()->count();
        $eksemplar = PinjamTransaksi::all()->where('status_pinjam', 1)->count();
        $approve = User::whereNull('approved_at')->get()->count();
        $title = 'Daftar Berita';
        return view('admin.berita.add', compact('title', 'koleksi', 'anggota_count', 'eksemplar', 'approve'));
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
            'judul' => 'required|min: 3',
            'isi' =>  'required|min: 3',
            'slug' => 'nullable|min: 3',
            'img' => 'nullable'
        ]);

        if(!$request->image == '')
        {
           $image = $request->get('image');
           $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
           \Image::make($request->get('image'))->resize(500, 398)->save(public_path('storage/resize/').$name);
           \Image::make($request->get('image'))->save(public_path('storage/berita/').$name);
         } else {
             $name = 'img.jpg';
         }
 
        $requestData = $request->all();
        $requestData['slug'] = str_slug($request->judul);
        $requestData['img'] = $name;
        $requestData['admin_id'] = Auth::user()->id;
        Berita::create($requestData);
       
        return response()->json([
            'message' => 'data berhasil disimpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Berita  $beritum
     * @return \Illuminate\Http\Response
     */
    public function show(Berita $beritum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Berita  $beritum
     * @return \Illuminate\Http\Response
     */
    public function edit(Berita $beritum)
    {
        $title = 'Update Berita';
        return view('admin.berita.edit' ,compact('beritum', 'title'));
    }

    public function search(Request $request)
    {
        if($request->has('q')){

            $search = $request->q;

            return Berita::where('judul','LIKE',"%$search%")
            ->latest()->paginate(5);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Berita  $beritum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Berita $beritum)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'isi' =>  'required',
            'slug' => 'nullable',
            'img' => 'nullable',
            'old' => 'required'
        ]);

        if($request->image != $request->old){
            $image = $request->get('image');
            $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
            \Image::make($request->get('image'))->save(public_path('storage/berita/').$name);
            unlink(public_path('storage/berita/'. $request->old));
        }

        $requestData = $request->all();
        if(isset($name)){
            $requestData['img'] = $name;
        }
        $beritum->update($requestData);

        return response()->json([
            'message' => 'data berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Berita  $beritum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Berita $beritum)
    {
        $beritum->delete();

        return response()->json([
            'message' => 'data berhasil dihapus']);
    }
}
