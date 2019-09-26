<?php

namespace App\Http\Controllers\admin;

use App\Bibliobigrafi;
use App\Http\Controllers\Controller;

use App\Buku;
use App\PinjamTransaksi;
use App\User;
use DateTime;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Daftar Buku';
        $koleksi = Bibliobigrafi::all()->count();
        $anggota_count = User::all()->count();
        $eksemplar = PinjamTransaksi::all()->where('status_pinjam', 1)->count();
        $approve = User::whereNull('approved_at')->get()->count();
        return view('admin.master.buku.home', compact('title', 'koleksi', 'anggota_count', 'eksemplar', 'approve'));
    }

    public function fetch()
    {
        return Buku::with(['buku_transaksi.pengarang' => function($q) {
            $q->select('id', 'nama_pengarang');
        }, 'buku_transaksi.penerbit' => function($q) {
            $q->select('id', 'nama_penerbit');
        }, 'buku_transaksi.topik' => function($q) {
            $q->select('id', 'jenis_topik', 'warna');
        }])->latest()->paginate(10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Buku';
        $koleksi = Bibliobigrafi::all()->count();
        $anggota_count = User::all()->count();
        $eksemplar = PinjamTransaksi::all()->where('status_pinjam', 1)->count();
        $approve = User::whereNull('approved_at')->get()->count();
        return view('admin.master.buku.add', compact('title', 'koleksi', 'anggota_count', 'eksemplar', 'approve'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //    $request->slug = str_slug($request->judul);
        $validatedData = $request->validate([
            'judul' => 'required|min: 3',
            'edisi' => 'nullable',
            'isbn_isnn' => 'required|min: 3',
            'deskripsi_fisik' => 'required|min: 3',
            'tahun_terbit' => 'required',
            'judul_seri' => 'nullable',
            'catatan' => 'nullable',
            'slug' => 'nullable',
            'pdf' => 'nullable',
            'gambar_sampul' => 'nullable'
        ]);

        $requestData = $request->all();
        $requestData['slug'] = str_slug($request->judul);


        Buku::create($requestData);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit(Buku $buku)
    {
        $title = 'Update Buku';
        return view('admin.master.buku.edit' ,compact('buku', 'title'));
    }

    public function search(Request $request)
    {
        // $data = [];


        if($request->has('q')){

            $search = $request->q;

            return Buku::with(['buku_transaksi.pengarang' => function($q) {
                $q->select('id', 'nama_pengarang');
            }, 'buku_transaksi.penerbit' => function($q) {
                $q->select('id', 'nama_penerbit');
            }])->where('judul','LIKE',"%$search%")
            // ->orWhere('isbn_isnn','LIKE',"%$search%")
            ->latest()
            ->paginate(5);
        }


        // return response()->json($data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buku $buku)
    {
        $buku->update($request->all());

        return response()->json([
            'message' => 'data berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bukuTransaksi = Buku::where('id', $id)->first();
        
        // Storage::delete('/public' . $bukuTra);
        
        if($bukuTransaksi->gambar_sampul !== 'img.jpg' ) {
            if(file_exists(public_path('storage/cover/'. $bukuTransaksi->gambar_sampul))) {
                unlink(public_path('storage/cover/'. $bukuTransaksi->gambar_sampul));
                unlink(public_path('storage/resize/'. $bukuTransaksi->gambar_sampul));
            }
        }


        if(!is_null($bukuTransaksi->pdf)) {
            if(file_exists(public_path('storage/file/'. $bukuTransaksi->pdf))) {
                unlink(public_path('storage/file/'. $bukuTransaksi->pdf));
                }
           
        }

        $bil = Bibliobigrafi::where('buku_id', $id)->count();
       for ($i=0; $i < $bil; $i++) { 
        $bilio = Bibliobigrafi::where('buku_id', $id)->first();
        $bilio->gmd_transaksi()->delete();
        $bilio->pola_eksemplar()->delete();
        }

        $bukuTransaksi->bibliobigrafi()->delete();
        $bukuTransaksi->buku_transaksi()->delete();
        $bukuTransaksi->delete();

        return response()->json([
            'message' => 'data berhasil dihapus']);
    }

    public function getAllMonth() {
        
        $month_arr = array();
        $buku = Buku::orderBy('created_at', 'ASC')
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
        $post_count = Buku::whereMonth('created_at', $month)->get()->count();
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
