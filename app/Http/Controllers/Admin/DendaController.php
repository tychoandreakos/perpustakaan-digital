<?php

namespace App\Http\Controllers\Admin;

use App\Bibliobigrafi;
use App\Denda;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PinjamTransaksi;
use App\User;
use Carbon\Carbon;
use DateTime;

class DendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Daftar Denda';
        $koleksi = Bibliobigrafi::all()->count();
        $anggota_count = User::all()->count();
        $eksemplar = PinjamTransaksi::all()->where('status_pinjam', 1)->count();
        $approve = User::whereNull('approved_at')->get()->count();
        return view('admin.master.denda.home', compact('title', 'koleksi', 'anggota_count', 'eksemplar', 'approve'));
    }

    public function fetch()
    {
        return Denda::with(['user' => function($q) {
            $q->select('id', 'name');
        }, 'user.anggota_transaksi.tipe_anggota' => function($q) {
            $q->select('id', 'denda');
        }, 'pinjam_transaksi' => function($q) {
            $q->select('id', 'bibliobigrafi_id', 'tgl_pinjam', 'tanggal_habis_pinjam', 'tgl_kembali');
        }, 'pinjam_transaksi.bibliobigrafi' => function($q){
            $q->select('id', 'pola_eksemplar');
        }, 'buku' => function($q) {
            $q->select('id', 'judul');
        }])->latest()->paginate(5);
    }

    public function hari($denda, $val) {
        $fdate = $denda;
        $tdate = $val;
        $datetime1 = new DateTime($fdate);
        $datetime2 = new DateTime($tdate);
        $interval = $datetime1->diff($datetime2);
        return $interval->format('%a');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Denda::create($request->all());
        
        $bilio = Bibliobigrafi::find($request->bilio_id);
        $bilio->status_pinjam = 0;
        $bilio->save();

        $transaksi = PinjamTransaksi::find($request->pinjam_transaksi_id);
        $transaksi->status_pinjam = 0;
        $transaksi->status_denda = 1;
        $transaksi->tgl_kembali = Carbon::now();
        $transaksi->save();

        return response()->json([
            'message' => 'Data Pembayaran Berhasil disimpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function search(Request $request)
    {

        if($request->has('q')){

            $search = $request->q;

            return Denda::with(['user' => function($q) {
                $q->select('id', 'name');
            }, 'user.anggota_transaksi.tipe_anggota' => function($q) {
                $q->select('id', 'denda');
            }, 'pinjam_transaksi' => function($q) {
                $q->select('id', 'bibliobigrafi_id', 'tgl_pinjam', 'tanggal_habis_pinjam', 'tgl_kembali');
            }, 'pinjam_transaksi.bibliobigrafi' => function($q){
                $q->select('id', 'pola_eksemplar');
            }, 'buku' => function($q) {
                $q->select('id', 'judul');
            }])
            ->whereHas('user', function($q) use ($search){
                $q->where('name', 'LIKE', "%$search%")->orWhere('id', 'LIKE', "%$search%");
            })
            ->orWhereHas('buku', function($q) use ($search) {
                $q->where('judul', 'LIKE', "%$search%");
            })
            ->latest()
            ->paginate(5);
        }

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
