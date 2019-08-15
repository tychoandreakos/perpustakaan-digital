<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\Bibliobigrafi;
use Illuminate\Http\Request;
use App\Pengarang;
use App\Penerbit;
use App\Kota;
use App\Gmd;
use App\Klasifikasi;
use App\LokasiRak;
use App\Bahasa;
use App\Buku;
use App\BukuTransaksi;
use App\EksemplarPola;
use App\EksemplarTransaksi;

class BibliobigrafiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.bibliobigrafi.home');
    }

    public function fetch()
    {
        return Buku::with(['buku_transaksi.pengarang' => function($q) {
            $q->select('id', 'nama_pengarang');
        }])->withCount('biblio')->latest()->paginate(5);
    }

    public function sirkulasi()
    {
        return Bibliobigrafi::with(['buku' => function($q) {
            $q->select('id', 'judul');
        }, 'buku.buku_transaksi.pengarang' => function($q) {
            $q->select('id', 'nama_pengarang');
        }])->where('status_pinjam', 0)->latest()->paginate(5);
    }

    public function search(Request $request)
    {
        if($request->has('q')){

            $search = $request->q;

            return Buku::with('buku_transaksi.pengarang')->withCount('biblio')
            ->where('judul', 'LIKE', "$search%")
            ->latest()->paginate(5);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Bibiliobigrafi';
        return view('admin.bibliobigrafi.add', compact('title'));
    }

    public function pengarang()
    {
        return Pengarang::all();
    }

    public function penerbit()
    {
        return Penerbit::all();
    }

    public function kota()
    {
        return Kota::all();
    }

    public function gmd()
    {
        return Gmd::all();
    }

    public function pola()
    {
        return EksemplarPola::all();
    }

    public function bahasa()
    {
        return Bahasa::all();
    }

    public function klasifikasi()
    {
        return Klasifikasi::all();
    }

    public function lokasi()
    {
        return LokasiRak::all();
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
            'judul' => 'required',
            'edisi' => 'nullable',
            'isbn_isnn' => 'required',
            'deskripsi_fisik' => 'required',
            'tahun_terbit' => 'required',
            'judul_seri' => 'nullable',
            'catatan' => 'nullable',
            'slug' => 'nullable',
            'pdf' => 'nullable',
            'gambar_sampul' => 'nullable'
        ]);

        if($request->get('image'))
       {
          $image = $request->get('image');
          $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
          \Image::make($request->get('image'))->save(public_path('storage/cover/').$name);
        }

       $requestData = $request->all();
       $requestData['slug'] = str_slug($request->judul);
       $requestData['gambar_sampul'] = $name;
        $buku = Buku::create($requestData);

       foreach ($request->pengarang_id as $pengarang) {
            $requestTrans = $request->all();
            $requestTrans['buku_id'] = $buku->id;
            $requestTrans['pengarang_id'] = $pengarang;   
            BukuTransaksi::create($requestTrans);
       }
        
        
       for ($i=0; $i < $request->total; $i++) {

        $eksemplar = EksemplarTransaksi::orderBy('pola_eksemplar', 'DESC')->first();

        if($eksemplar) {
            $requestTransaksi = $request->all();
            $requestTransaksi['pola_eksemplar'] = ++$eksemplar->pola_eksemplar;
            $requestTransaksi['kode_eksemplar'] = $request->pola_eksemplar;
            $eks = EksemplarTransaksi::create($requestTransaksi);
        } else {
            $requestTransaksi = $request->all();
            $requestTransaksi['pola_eksemplar'] = $request->pola_eksemplar;
            $requestTransaksi['kode_eksemplar'] = $request->pola_eksemplar;
            $eks = EksemplarTransaksi::create($requestTransaksi);
        }

       

        $requestBilio = $request->all();
        $requestBilio['buku_id'] = $buku->id;
        $requestBilio['klasifikasi_id'] = $request->klasifikasi_id;
        $requestBilio['gmd_id'] = $request->gmd_id;
        $requestBilio['pola_eksemplar'] = $eks->pola_eksemplar;
        Bibliobigrafi::create($requestBilio);

       }

        return response()->json([
            'message' => 'data berhasil disimpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bibliobigrafi  $bibliobigrafi
     * @return \Illuminate\Http\Response
     */
    public function show(Bibliobigrafi $bibliobigrafi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bibliobigrafi  $bibliobigrafi
     * @return \Illuminate\Http\Response
     */
    public function edit(Bibliobigrafi $bibliobigrafi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bibliobigrafi  $bibliobigrafi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bibliobigrafi $bibliobigrafi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bibliobigrafi  $bibliobigrafi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bibliobigrafi $bibliobigrafi)
    {
        //
    }
}
