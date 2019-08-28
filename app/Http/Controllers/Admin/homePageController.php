<?php

namespace App\Http\Controllers\admin;

use App\Bibliobigrafi;
use App\Http\Controllers\Controller;
use App\PinjamTransaksi;
use App\User;
use DateTime;
use Illuminate\Http\Request;

class homePageController extends Controller
{
    public function index()
    {
        // return
        $pinjam = PinjamTransaksi::with('bibliobigrafi.buku', 'user')->where('status_pinjam', 1)->latest()->limit(5)->get();
        // return
        $anggota = User::with('anggota', 'anggota_transaksi.tipe_anggota')->latest()->limit(4)->get();
        
        $koleksi = Bibliobigrafi::all()->count();
        $anggota_count = User::all()->count();
        $eksemplar = PinjamTransaksi::all()->where('status_pinjam', 1)->count();
        $approve = User::whereNull('approved_at')->get()->count();

        $statistik = $this->chart();
        return view('admin.home', compact('pinjam', 'anggota', 'statistik', 'anggota_count', 'koleksi', 'eksemplar', 'approve'));
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

        $month_data_arr = [
            'post_count_data' => $month_post_arr,
        ];

        return $month_data_arr;
    }
}
