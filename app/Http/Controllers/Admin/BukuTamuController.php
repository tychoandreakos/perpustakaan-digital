<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Tamu;
use DateTime;
use Illuminate\Http\Request;

class BukuTamuController extends Controller
{
    public function fetch()
    {
        return Tamu::with(['user' => function($q) {
            $q->select('id', 'id', 'name', 'email');
        } ,'user.anggota' => function($q) {
            $q->select('user_id', 'jurusan_id', 'alamat');
        }, 'user.anggota.jurusan'])->latest()->paginate(5);
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

    public function search(Request $request)
    {

        if($request->has('q')){

            $search = $request->q;

            return Tamu::with(['user' => function($q) {
                $q->select('id', 'id', 'name', 'email');
            } ,'user.anggota' => function($q) {
                $q->select('user_id', 'jurusan_id', 'alamat');
            }])->whereHas('user', function($q) use ($search){
                $q->where('name', 'LIKE', "%$search%")->orWhere('id', 'LIKE', "%$search%");
            }, 'user.anggota.jurusan')
            ->latest()
            ->paginate(5);
        }


        // return response()->json($data);
    }

    public function getMonthCount( $month )
    {
        $post_count = Tamu::whereMonth('created_at', $month)->get()->count();
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
