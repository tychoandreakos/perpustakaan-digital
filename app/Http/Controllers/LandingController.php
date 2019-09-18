<?php

namespace App\Http\Controllers;

use App\Anggota;
use App\AnggotaTransaksi;
use App\Berita;
use App\Bibliobigrafi;
use App\Buku;
use App\Info;
use App\PinjamTransaksi;
use App\Tamu;
use App\Topik;
use App\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class LandingController extends Controller
{
    public function index()
    {
        // $user = User::all()->count();
        // $info = Info::all()->first()->first();
        // $topik = Topik::orderBy('order', 'ASC')->limit(4)->get();
        $berita =  Berita::with('admin')->latest()->limit(3)->get();
        $buku = Buku::all()->count();
        $anggota = User::all()->count();
        $pdf = Buku::whereNotNull('pdf')->get()->count();
        // return
        $info = Info::all()->first();
        return view('landing', compact('berita', 'info' ,'buku', 'anggota', 'pdf'));
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
            'user_id' => 'required|min:3',
        ]);

        $user = User::find($request->user_id);
        if(!$user) {
            return response()->json([
                'type' => false,
                'message' => 'Maaf, NPM yang anda masukkan tidak dapat kami proses!, silahkan masukkan ulang NPM anda.']);
        }

        Tamu::create($validation);

        return response()->json([
            'type' => true,
            'message' => 'Halo '. ucwords($user->name) .', Selamat Datang']);
    }

    public function update_profile(Request $request)
    {
        $anggota = Anggota::find(Auth::user()->id);

        $anggota->jurusan = $request->jurusan;
        $anggota->tgl_lahir = $request->tgl_lahir;
        $anggota->alamat = $request->alamat;
        $anggota->jk = ($request->jk == 'Pria') ? 0 : 1;
        $anggota->no_telp = $request->no_telp;
        $anggota->save();

        return response()->json([
            'message' => 'Halo '.Auth::user()->name.', data kamu berhasil diperbaharui']);
    }

    public function getMonthCount( $month )
    {
        $post_count = Tamu::whereMonth('created_at', $month)->get()->count();
        return $post_count;        
    }

    public function getAllMonth() {
        
        $month_arr = array();
        $buku = Tamu::orderBy('created_at', 'ASC')
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
            'message' => 'Silahkan verifikasikan dahulu pinjaman anda yang sebelumnya!',
            ]);
       }

       
    }

    public function batal(Request $request)
    {
        PinjamTransaksi::where('kode_pinjam', $request->id)->delete();
        
        return response()->json([
            'message' => 'Kode verifikasi <br>'. $request->id .' berhasil dihapus.',
            ]);
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

    public function tags($id)
    {
         $result = Topik::with(['buku.buku_transaksi.pengarang' => function($q){
            $q->select('id', 'nama_pengarang');
        },  'buku.buku_transaksi.penerbit', 'buku.bibliobigrafi.gmd' => function($q) {
            $q->select('id', 'nama_gmd')->first();
        }])->where('jenis_topik', $id)->first();
        $info = Info::all()->first();

        $cari = '';
        $tags = $id;
        return view('topik', compact('result', 'info', 'tags', 'cari'));
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

        $randomTags = Topik::inRandomOrder()->limit(3)->get();
        $info = Info::all()->first();

        return view('beranda', compact('terbaru', 'info', 'random', 'berita', 'popular', 'popular30', 'randomTags'));
    }

    public function lengkapi()
    {
        $anggota = Anggota::find(Auth::user()->id);
        $info = Info::all()->first();
        return view('lengkapi', compact('anggota', 'info'));
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
        $info = Info::all()->first();
        return view('terbaru', compact('terbaru', 'info'));
    }

     public static function denda($val)
    {
        $datetime1 = new DateTime($val);
        $datetime2 = new DateTime(Carbon::now());
        $interval = $datetime1->diff($datetime2);
        return $interval->format('%a');
    }

    public function pinjaman()
    {
        $pinjam = PinjamTransaksi::with('buku')->where('user_id', Auth::user()->id)->where('status_pinjam', 1)->where('status_verifikasi', 0)->where('tanggal_habis_pinjam', '>', Carbon::now())->latest()->paginate(5);

        $terlambat = PinjamTransaksi::with('buku')->where('user_id', Auth::user()->id)->where('status_pinjam', 1)->where('status_verifikasi', 0)->where('tanggal_habis_pinjam', '<', Carbon::now())->latest()->get();

        $verifikasi = PinjamTransaksi::with('buku')->where('user_id', Auth::user()->id)->where('status_verifikasi', 1)->latest()->get();

        $tipe = AnggotaTransaksi::with('tipe_anggota')->where('user_id', Auth::user()->id)->first();

        $histori = PinjamTransaksi::with('buku')->where('user_id', Auth::user()->id)->where('status_pinjam', 0)->where('status_verifikasi', 0)->latest()->get();
        $info = Info::all()->first();
        return view('pinjaman', compact('pinjam', 'tipe', 'info', 'terlambat', 'histori', 'verifikasi'));
    }

    public function berita($slug)
    {
        $result = Berita::with('admin')->where('slug', $slug)->firstOrFail();
        $berita = Berita::latest()->limit(3)->get();
        $info = Info::all()->first();
        return view('berita', compact('result', 'berita', 'info')); 
    }

    public function beritaSemua()
    {
        $result = Berita::with('admin')->latest()->paginate(3);
        $info = Info::all()->first();
        return view('berita-semua', compact('result', 'info'));
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
        }, 'bibliobigrafi.gmd_transaksi' => function($q){
            $q->select('id', 'bibliobigrafi_id', 'gmd_id');
        },  'bibliobigrafi.gmd_transaksi.gmd' => function($q) {
            $q->select('id', 'nama_gmd', 'kode_gmd');
        } ,'bibliobigrafi.klasifikasi' => function($q) {
            $q->select('id', 'tipe_klasifikasi');
        }, 'buku_transaksi.topik' => function($q) {
            $q->select('id', 'jenis_topik', 'warna');
        }, 'bibliobigrafi.lokasi_rak' => function($q) {
            $q->select('id', 'kode_lokasi', 'nama_lokasi');
        }, 'topik'])->where('slug', $slug)->firstOrFail();

        $buku = Buku::where('slug', $slug)->first();
        $bibliobigrafi = Bibliobigrafi::where('buku_id', $buku->id)->where('status_pinjam', 0)->get();

        if(isset(Auth::user()->id)) {
            $total = PinjamTransaksi::where('user_id', Auth::user()->id)
            ->whereNotNull('kode_pinjam')->where('status_verifikasi', 1)->count();
        
    
           $anggota = AnggotaTransaksi::with('tipe_anggota')->where('user_id', Auth::user()->id)->get();
           $info = Info::all()->first();
    
            return view('buku', compact('result', 'total', 'anggota', 'bibliobigrafi', 'info'));
        }

        $info = Info::all()->first();
        return view('buku', compact('result', 'info', 'bibliobigrafi'));
       
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
            $result = Buku::with(['buku_transaksi.pengarang' => function($q) {
                $q->select('id', 'nama_pengarang');
            }, 'buku_transaksi.penerbit', 'bibliobigrafi.gmd' => function($q) {
                $q->select('id', 'nama_gmd')->first();
            }])->where('judul', 'LIKE' ,"%".$query."%")->paginate(5);
            $cari = $query;
            $info = Info::all()->first();
            return view('search', compact('result', 'cari', 'info'));


        } else {
            $total = Buku::with(['buku_transaksi.pengarang' => function($q) {
                $q->select('id', 'nama_pengarang');
            }, 'buku_transaksi.penerbit', 'bibliobigrafi.gmd' => function($q) {
                $q->select('id', 'nama_gmd');
            }])->latest()->paginate(6);
            $info = Info::all()->first();
            return view('search', compact('total', 'info'));
        }
    }

    public function cari(Request $request)
    {
        $validatedData = $request->validate([
            'cari' => 'required|min:3'
        ]);

        $query = $request->cari;

        // return
        $result = Buku::with(['buku_transaksi.pengarang' => function($q) {
            $q->select('id', 'nama_pengarang');
        }, 'buku_transaksi.penerbit', 'bibliobigrafi.gmd' => function($q) {
            $q->select('id', 'nama_gmd')->first();
        }])->where('judul', 'LIKE' ,"%".$query."%")->paginate(5);
        $cari = $query;
        $info = Info::all()->first();
        return view('cari', compact('result', 'cari', 'info'));
    }

    public function result($slug)
    {
       $result = Topik::with(['buku', 'buku.buku_transaksi.pengarang' => function($q) {
        $q->select('id', 'nama_pengarang')->where('nama_pengarang', 'LIKE' ,"%".$q."%");
        }, 'buku.buku_transaksi.penerbit', 'buku.bibliobigrafi.gmd' => function($q) {
            $q->select('id', 'nama_gmd')->first();
        }])->where('slug', $slug)->first();
        $info = Info::all()->first();

        return view('result-topik', compact('result', 'info'));
    }


}
