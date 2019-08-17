<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\Topik;
use Illuminate\Http\Request;

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
        return view('admin.topik.home', compact('title'));
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
        return view('admin.topik.add', compact('title'));
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
            'jenis_topik' => 'required',
            'image' => 'required',
            'slug' => 'nullable',
            'order' => 'required|unique:topik,order'
        ]);

        if(!$request->image == '')
        {
           $image = $request->get('image');
           $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
           \Image::make($request->get('image'))->save(public_path('storage/topik/').$name);
         } else {
             $name = 'img.jpg';
         }
 
        $requestData = $request->all();
        $requestData['slug'] = str_slug($request->jenis_topik);
        $requestData['img'] = $name;
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
            'order' => 'required|unique:topik,order,'. $topik->order
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
