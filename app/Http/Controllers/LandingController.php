<?php

namespace App\Http\Controllers;

use App\Anggota;
use App\AnggotaTransaksi;
use App\Berita;
use App\Bibliobigrafi;
use App\Buku;
use App\PinjamTransaksi;
use App\Tamu;
use App\Topik;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class LandingController extends Controller
{
    public function index()
    {
        // $user = User::all()->count();
        // $info = Info::all()->first();
        // $topik = Topik::orderBy('order', 'ASC')->limit(4)->get();
        $berita =  Berita::with('admin')->latest()->limit(3)->get();
        $buku = Buku::all()->count();
        return view('landing', compact('berita', 'buku'));
    }
    
    public function approval()
    {
        return view('approval');
    }

    public function tamu()
    {
        return view('tamu');
    }

    public function tamu_store(Request $request)
    {
        $validation = $request->validate([
            'nama' => 'required|min:3',
            'jurusan' => 'required|min:2',
            'alamat' => 'required|min:5',
            'keperluan' => 'required|min:3'
        ]);

        Tamu::create($validation);

        return response()->json([
            'message' => 'Halo, '.ucwords($request->nama).' Selamat Datang']);
    }

    public function update_profile(Request $request)
    {
        $anggota = Anggota::find(Auth::user()->id)->first();

        $anggota->jurusan = $request->jurusan;
        $anggota->tgl_lahir = $request->tgl_lahir;
        $anggota->alamat = $request->alamat;
        $anggota->jk = $request->jk;
        $anggota->no_telp = $request->no_telp;
        $anggota->save();

        return response()->json([
            'message' => 'Halo '.Auth::user()->name.', data kamu berhasil diperbaharui']);
    }

    public function pinjam($slug)
    {
        $buku = Buku::where('slug', $slug)->first();
       $random =  $this->generateRandomString(4);
       $total = PinjamTransaksi::where('user_id', Auth::user()->id)
        ->whereNotNull('kode_pinjam')->where('status_verifikasi', 1)->count();
        $jumlah = AnggotaTransaksi::where('user_id', Auth::user()->id)->first()->tipe_anggota()->first()->jumlah_pinjaman;

       $check = PinjamTransaksi::where('kode_pinjam', $random)->first();
       if($check) {
        $random;
        return false;
       }

       if($total < $jumlah) {
        $pinjam = PinjamTransaksi::create([
            'user_id' => Auth::user()->id,
            'status_verifikasi' => 1,
            'kode_pinjam' => strtolower($random),
            'buku_id' => $buku->id,
            'status_pinjam' => 0
        ]);
    
        return response()->json([
            'msg' => true,
            'message' => 'Kode verifikasi anda <br>'. $pinjam->kode_pinjam .'',
            ]);
       } else {
        return response()->json([
            'msg' => false,
            'message' => 'Silahkan verifikasikan dahulu pinjaman ada yang sebelumnya!',
            ]);
       }

       
    }

    private function generateRandomString($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function beranda()
    {
        // return
        $terbaru = Buku::with(['buku_transaksi' => function($q) {
            $q->select('id', 'buku_id', 'pengarang_id', 'penerbit_id', 'bahasa_id');
        },'buku_transaksi.pengarang' => function($q){
            $q->select('id', 'nama_pengarang');
        }, 'buku_transaksi.penerbit' => function($q) {
            $q->select('id', 'nama_penerbit');
        }, 'topik' => function($q) {
            $q->select('id','jenis_topik', 'warna');
        }, 'buku_transaksi.bahasa' => function($q) {
            $q->select('id', 'jenis_bahasa');
        }, 'bibliobigrafi.lokasi_rak' => function($q) {
            $q->select('id', 'nama_lokasi', 'kode_lokasi');
        }])->latest()->limit(2)->get();

        $berita =  Berita::with('admin')->latest()->limit(3)->get();

        $random = Buku::with(['buku_transaksi' => function($q) {
            $q->select('id', 'buku_id', 'pengarang_id', 'penerbit_id', 'bahasa_id');
        },'buku_transaksi.pengarang' => function($q){
            $q->select('id', 'nama_pengarang');
        }, 'buku_transaksi.penerbit' => function($q) {
            $q->select('id', 'nama_penerbit');
        }, 'topik' => function($q) {
            $q->select('id','jenis_topik', 'warna');
        }, 'buku_transaksi.bahasa' => function($q) {
            $q->select('id', 'jenis_bahasa');
        }, 'bibliobigrafi.lokasi_rak' => function($q) {
            $q->select('id', 'nama_lokasi', 'kode_lokasi');
        }])->inRandomOrder()->first();


        // return
        $date = Carbon::today()->subDays(7);
        $popular = Buku::with(['buku_transaksi' => function($q) {
            $q->select('id', 'buku_id', 'pengarang_id', 'penerbit_id', 'bahasa_id');
        },'buku_transaksi.pengarang' => function($q){
            $q->select('id', 'nama_pengarang');
        }, 'buku_transaksi.penerbit' => function($q) {
            $q->select('id', 'nama_penerbit');
        }, 'topik' => function($q) {
            $q->select('id','jenis_topik', 'warna');
        }, 'buku_transaksi.bahasa' => function($q) {
            $q->select('id', 'jenis_bahasa');
        }, 'bibliobigrafi.lokasi_rak' => function($q) {
            $q->select('id', 'nama_lokasi', 'kode_lokasi');
        }])->where('created_at', '>=', $date)->withCount('pinjam_transaksi')->limit(3)->get();

        $date = Carbon::today()->subDays(30);
        $popular30 = Buku::with(['buku_transaksi' => function($q) {
            $q->select('id', 'buku_id', 'pengarang_id', 'penerbit_id', 'bahasa_id');
        },'buku_transaksi.pengarang' => function($q){
            $q->select('id', 'nama_pengarang');
        }, 'buku_transaksi.penerbit' => function($q) {
            $q->select('id', 'nama_penerbit');
        }, 'topik' => function($q) {
            $q->select('id','jenis_topik', 'warna');
        }, 'buku_transaksi.bahasa' => function($q) {
            $q->select('id', 'jenis_bahasa');
        }, 'bibliobigrafi.lokasi_rak' => function($q) {
            $q->select('id', 'nama_lokasi', 'kode_lokasi');
        }])->where('created_at', '>=', $date)->withCount('pinjam_transaksi')->limit(2)->get();

        $randomTags = Topik::inRandomOrder()->limit(4)->get();

        return view('beranda', compact('terbaru', 'random', 'berita', 'popular', 'popular30', 'randomTags'));
    }

    public function lengkapi()
    {
        $anggota = Anggota::find(Auth::user()->id);
        return view('lengkapi', compact('anggota'));
    }

    public function terbaru()
    {
        // return
        $terbaru = Buku::with(['buku_transaksi' => function($q) {
            $q->select('id', 'buku_id', 'pengarang_id', 'penerbit_id', 'bahasa_id');
        },'buku_transaksi.pengarang' => function($q){
            $q->select('id', 'nama_pengarang');
        }, 'buku_transaksi.penerbit' => function($q) {
            $q->select('id', 'nama_penerbit');
        }, 'topik' => function($q) {
            $q->select('id','jenis_topik', 'warna');
        }, 'buku_transaksi.bahasa' => function($q) {
            $q->select('id', 'jenis_bahasa');
        }, 'bibliobigrafi.lokasi_rak' => function($q) {
            $q->select('id', 'nama_lokasi', 'kode_lokasi');
        }])->latest()->limit(9)->paginate(3);
        return view('terbaru', compact('terbaru'));
    }

    public function berita($slug)
    {
        $result = Berita::where('slug', $slug)->firstOrFail();
        $berita = Berita::latest()->limit(3)->get();
        return view('berita', compact('result', 'berita')); 
    }

    public function beritaSemua()
    {
        $result = Berita::latest()->paginate(3);
        return view('berita-semua', compact('result'));
    }

    public function buku($slug)
    {
        // return
        $result = Buku::with(['buku_transaksi.pengarang' => function($q){
            $q->select('id', 'nama_pengarang');
        }, 'buku_transaksi.penerbit' => function($q){
            $q->select('id', 'nama_penerbit');
        }, 'buku_transaksi.kota' => function($q){
            $q->select('id', 'nama_kota');
        }, 'buku_transaksi.bahasa' => function($q){
            $q->select('id', 'jenis_bahasa');
        }, 'bibliobigrafi.gmd' => function($q){
            $q->select('id', 'nama_gmd');
        }, 'bibliobigrafi.klasifikasi' => function($q) {
            $q->select('id', 'tipe_klasifikasi');
        }, 'buku_transaksi.topik' => function($q) {
            $q->select('id', 'jenis_topik', 'warna');
        }, 'topik'])->where('slug', $slug)->firstOrFail();

        $buku = Buku::where('slug', $slug)->first();
        $bibliobigrafi = Bibliobigrafi::where('buku_id', $buku->id)->where('status_pinjam', 0)->get();

        if(isset(Auth::user()->id)) {
            $total = PinjamTransaksi::where('user_id', Auth::user()->id)
            ->whereNotNull('kode_pinjam')->where('status_verifikasi', 1)->count();
        
    
           $anggota = AnggotaTransaksi::with('tipe_anggota')->where('user_id', Auth::user()->id)->get();
    
            return view('buku', compact('result', 'total', 'anggota', 'bibliobigrafi'));
        }

        return view('buku', compact('result', 'bibliobigrafi'));
       
    }

    public function baca($slug)
    {
        $result = Buku::where('slug', $slug)->firstOrFail();

        $filename = $result->pdf;

        $path = storage_path('app/public/file/'.$filename);

        return Response::make(file_get_contents($path), 200, [

        'Content-Type'
        => 'application/pdf',


        'Content-Disposition' => 'inline; filename="'.$filename.'"'

        ]);
    }

    public function random_topik()
    {
        return Topik::orderByRaw("RAND()")->first();
    }

    public function item($id)
    {
        return Buku::with(['buku_transaksi.pengarang' => function($q) {
            $q->select('id', 'nama_pengarang');
        }])->where('topik_id', $id)->limit(4)->get();
    }

    public function search(Request $request)
    {
        if($request->has('cari')){
           
            $validatedData = $request->validate([
                'cari' => 'required|min:3'
            ]);

            $query = $request->cari;
            $result = Buku::with(['buku_transaksi.pengarang' => function($q) use ($query) {
                $q->select('id', 'nama_pengarang');
            }, 'buku_transaksi.penerbit', 'bibliobigrafi.gmd' => function($q) {
                $q->select('id', 'nama_gmd')->first();
            }])->where('judul', 'LIKE' ,"%".$query."%")->paginate(5);
            $cari = $query;
            return view('search', compact('result', 'cari'));


        } else {
            $total = Buku::with(['buku_transaksi.pengarang' => function($q) {
                $q->select('id', 'nama_pengarang');
            }, 'buku_transaksi.penerbit', 'bibliobigrafi.gmd' => function($q) {
                $q->select('id', 'nama_gmd');
            }])->latest()->paginate(6);
            return view('search', compact('total'));
        }
    }

    public function cari(Request $request)
    {
        $validatedData = $request->validate([
            'cari' => 'required|min:3'
        ]);

        $query = $request->cari;

        // return
        $result = Buku::with(['buku_transaksi.pengarang' => function($q) use ($query) {
            $q->select('id', 'nama_pengarang');
        }, 'buku_transaksi.penerbit', 'bibliobigrafi.gmd' => function($q) {
            $q->select('id', 'nama_gmd')->first();
        }])->where('judul', 'LIKE' ,"%".$query."%")->paginate(5);
        $cari = $query;
        return view('cari', compact('result', 'cari'));
    }

    public function result($slug)
    {
       $result = Topik::with(['buku', 'buku.buku_transaksi.pengarang' => function($q) {
            $q->select('id', 'nama_pengarang');
        }, 'buku.buku_transaksi.penerbit', 'buku.bibliobigrafi.gmd' => function($q) {
            $q->select('id', 'nama_gmd')->first();
        }])->where('slug', $slug)->first();

        return view('result-topik', compact('result'));
    }


}
