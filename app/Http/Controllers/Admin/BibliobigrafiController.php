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
use App\Koleksi;
use App\PinjamTransaksi;
use App\Topik;
use App\User;
use Illuminate\Support\Facades\Storage;

class BibliobigrafiController extends Controller
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
        $title = 'Bibliobigrafi';
        return view('admin.bibliobigrafi.home', compact('title' ,'koleksi', 'anggota_count', 'eksemplar', 'approve'));
    }

    public function fetch()
    {
        return Buku::with(['buku_transaksi.pengarang' => function($q) {
            $q->select('id', 'nama_pengarang');
        }])->withCount('bibliobigrafi')->latest()->paginate(5);
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
        $koleksi = Bibliobigrafi::all()->count();
        $anggota_count = User::all()->count();
        $eksemplar = PinjamTransaksi::all()->where('status_pinjam', 1)->count();
        $approve = User::whereNull('approved_at')->get()->count();
        
        return view('admin.bibliobigrafi.add', compact('title' ,'koleksi', 'anggota_count', 'eksemplar', 'approve'));
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

    public function koleksi()
    {
        return Koleksi::all();
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

    public function topik()
    {
        return Topik::all();
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
            'tahun_terbit' => 'required|numeric',
            'klasifikasi_id' => 'required',
            'koleksi_id' => 'required',
            'pengarang_id' => 'required',
            'penerbit_id' => 'required',
            'kota_id' => 'required',
            'gmd_id' => 'required',
            'bahasa_id' => 'required',
            'lokasi_rak_id' => 'required',
            'no_panggil' => 'required',
            'total' => 'required',
            'pola_eksemplar' => 'required',
            'judul_seri' => 'nullable',
            'catatan' => 'nullable',
            'slug' => 'nullable',
            'topik_id' => 'required',
            'pdf' => 'nullable|max:10240',
            'gambar_sampul' => 'nullable'
            ]);
            
            if(!$request->image == '')
            {
            $image = $request->get('image');
            $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
            \Image::make($request->get('image'))->resize(115, 160)->save(public_path('storage/cover/').$name);
            \Image::make($request->get('image'))->resize(250, 308)->save(public_path('storage/resize/').$name);
        } else {
            $name = 'img.jpg';
        }

        $file = $request->input('pdf');
       
        if(isset($file)) {
            foreach ($file as $val) {
                $file = $this->base64($val, '/file');
               }
        }

        $requestData = $request->all();
        $requestData['slug'] = str_slug($request->judul);
        $requestData['gambar_sampul'] = $name;
        $requestData['pdf'] = isset($file) ? substr($file, 15, 50) : '';
        $buku = Buku::create($requestData);

       foreach ($request->pengarang_id as $pengarang) {
            $requestTrans = $request->all();
            $requestTrans['buku_id'] = $buku->id;
            $requestTrans['pengarang_id'] = $pengarang;   
            BukuTransaksi::create($requestTrans);
       }
        

    //    $eksemplar_pola = EksemplarPola::find($request->pola_eksemplar);
    //    $prefix = $eksemplar_pola->prefix;
    //    $suffix = $eksemplar_pola->suffix;
    //    $serial = $eksemplar_pola->serial;
        
       for ($i=0; $i < $request->total; $i++) {

        $eksemplar = EksemplarTransaksi::orderBy('pola_eksemplar', 'DESC')->first();

        // slice string

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
        $requestBilio['koleksi_id'] = $request->koleksi_id;
        $requestBilio['no_panggil'] = $request->no_panggil;
        Bibliobigrafi::create($requestBilio);

       }

        return response()->json([
            'message' => 'data berhasil disimpan']);
    }

   private function base64($base64_file, $path)
    {
        $pool = '01234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $file = $base64_file;

        $check_base_64 = strrpos($file, "base64"); // check jika file valid

        if($check_base_64 > 0) {
            $explode = explode(",", $file);
            
            $decoded_file = base64_decode($explode[1]);
            $date = date('dmYHis');
            $random_string = substr(str_shuffle(str_repeat($pool, 5)),0, 10);

            $file_extension = $this->uf_get_base64_file_extension($explode[0]);

            $filename = $date. $random_string .'.'. $file_extension;

            Storage::disk('public')->put($path. "/" .$filename, $decoded_file, 'public');

            $url = Storage::url($path ."/". $filename);
           
            return $url;
        } else {
            return false;
        }
    }

    private function uf_get_base64_file_extension($type)
    {
        $mime = str_replace(';base64', '', $type);
        $mime = str_replace('data:', '', $mime);

        $extension = [
            'application/pdf' => 'pdf',
            'application/epub+zip' => 'epub',
        ];


        return $extension[$mime];
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
    public function destroy($id)
    {
        $bukuTransaksi = Buku::where('id', $id)->first();
        
        // Storage::delete('/public' . $bukuTra);
        unlink(public_path('storage/cover/'. $bukuTransaksi->gambar_sampul));
        $bil = Bibliobigrafi::where('buku_id', $id)->count();
       for ($i=0; $i < $bil; $i++) { 
        $bilio = Bibliobigrafi::where('buku_id', $id)->first();
        $bilio->pola_eksemplar()->delete();
        }

        $bukuTransaksi->bibliobigrafi()->delete();
        $bukuTransaksi->buku_transaksi()->delete();
        $bukuTransaksi->delete();

        return response()->json([
            'message' => 'data berhasil dihapus']);
    }
}
