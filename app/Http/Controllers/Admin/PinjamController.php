<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\PinjamTransaksi;
use Illuminate\Support\Carbon;
use App\Bibliobigrafi;
use DateTime;

class PinjamController extends Controller
{
    public function store(Request $request)
    {
        $total = PinjamTransaksi::where([['user_id', $request->user_id], ['status_pinjam', 1]])->count();
        if($total != $request->jumlah_pinjaman){
            foreach ($request->bibliobigrafi as $bilio) {
                $requestData = $request->all();
            $requestData['tgl_pinjam'] = Carbon::now();
            $requestData['bibliobigrafi_id'] = $bilio;
            PinjamTransaksi::create($requestData);
    
            $bilio = Bibliobigrafi::find($bilio);
            $bilio->status_pinjam = 1;
            $bilio->update();
            }
    
            return response()->json([
                'condition' => true,
                'message' => 'Buku berhasil dipinjam']);
        } else {
            return response()->json([
                'condition' => false,
                'message' => 'Anggota yang bersangkutan sudah melebihi batas pinjam buku']);
        }
    }

    public function pinjaman(Request $request)
    {
        return PinjamTransaksi::with(['bibliobigrafi' => function($q){
            $q->select("id", 'buku_id', 'pola_eksemplar', 'klasifikasi_id');
        }, 'bibliobigrafi.buku' => function($q){
            $q->select('id', 'judul');
        }, 'bibliobigrafi.klasifikasi' => function($q){
            $q->select('id', 'tipe_klasifikasi');
        }])->where('user_id', $request->id)->orderBy('tanggal_habis_pinjam', 'ASC')->paginate(10);
    }

    public function denda($id)
    {
        return PinjamTransaksi::with(['bibliobigrafi' => function($q){
            $q->select("id", 'buku_id', 'pola_eksemplar', 'klasifikasi_id');
        }, 'bibliobigrafi.buku' => function($q){
            $q->select('id', 'judul');
        }, 'bibliobigrafi.klasifikasi' => function($q){
            $q->select('id', 'tipe_klasifikasi');
        }])->where([['user_id', $id], ['tanggal_habis_pinjam', '<', Carbon::now()]])->orderBy('tanggal_habis_pinjam', 'ASC')->paginate(10);
    }

    public function perpanjang(Request $request)
    {
        $pinjam = PinjamTransaksi::findOrFail($request->id);
        $new = new Carbon($pinjam->tanggal_habis_pinjam);
        $pinjam->tanggal_habis_pinjam = $new->addDays($request->duration);
        $pinjam->save();

        return response()->json([
            'message' => 'Buku berhasil diperpanjang']);
    }

    public function histori()
    {
        return PinjamTransaksi::with(['bibliobigrafi.buku' => function($q) {
            $q->select('id', 'judul');
        },  'user.anggota_transaksi.tipe_anggota'])->where('status_pinjam', 0)->latest()->paginate(5);
    }

    public function kembali(Request $request)
    {
        $bilio = Bibliobigrafi::where('id', $request->id)->first();
        $bilio->status_pinjam = 0;
        $bilio->save();

        $transaksi = PinjamTransaksi::where('bibliobigrafi_id', $request->id)->first();
        $transaksi->status_pinjam = 0;
        $transaksi->tgl_kembali = Carbon::now();
        $transaksi->save();

        return response()->json([
            'message' => 'pengembalian buku berhasil']);
    }

    public function pengembalian()
    {
        return Bibliobigrafi::where('status_pinjam', 1)->get();
    }


    public function search(Request $request)
    {

        if($request->has('q')){

            $search = $request->q;

            return Pengarang::where('nama_pengarang','LIKE',"%$search%")
            ->latest()
            ->paginate(5);

        }

    }

    public function eksemplar()
    {
        return Bibliobigrafi::with(['buku' => function($q){
            $q->select('id', 'judul');
        }, 'pinjam_transaksi'])->where('status_pinjam', 1)->paginate(5);
    }

    public function getAllMonth() {
        
        $month_arr = array();
        $buku = PinjamTransaksi::orderBy('created_at', 'ASC')
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
        $post_count = PinjamTransaksi::whereMonth('created_at', $month)->get()->count();
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

        $max_no = max( $month_post_arr );
        $max = round(($max_no + 30/2) / 30) * 30;
        $month_data_arr = [
            'months' => $month_name_arr,
            'post_count_data' => $month_post_arr,
            'max' => $max,
        ];

        return $month_data_arr;
    }
}
