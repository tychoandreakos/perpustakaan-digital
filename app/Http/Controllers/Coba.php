<?php

namespace App\Http\Controllers;
// namespace Bitfumes\Multiauth\Http\Controllers;

use App\Anggota;
use App\Buku;
use DateTime;
use Illuminate\Http\Request;

class Coba extends Controller
{
    public function getAllMonth() {
        
        $month_arr = array();
        $buku = Anggota::orderBy('created_at', 'ASC')
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
        $month = 8;
        $post_count = Anggota::whereMonth('created_at', $month)->get()->count();
        return $post_count;        
    }

    public function getMonthData()
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
            'months' => $month_arr,
            'post_count_data' => $month_post_arr,
            'max' => $max,
        ];

        return $month_data_arr;
    }
}
