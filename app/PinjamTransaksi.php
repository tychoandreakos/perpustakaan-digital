<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class PinjamTransaksi extends Model
{
    protected $table = 'pinjam_transaksi';
    protected $fillable = [
        'user_id',
        'buku_id',
        'bibliobigrafi_id',
        'tgl_pinjam',
        'tanggal_habis_pinjam',
        'tgl_kembali',
        'status_verifikasi',
        'status_pinjam',
        'kode_pinjam',
        'verified_at',
    ];
    
    protected $dates = [
        'created_at',
        'updated_at',
        'verified_at',
        'tanggal_habis_pinjam',
    ];

    // public function getTanggalHabisPinjamAttribute($value)
    // {
    //     return $this->attributes['tanggal_habis_pinjam'] = Carbon::parse($value)->diffForHumans();
    // }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function denda(){
        return $this->hasOne('denda');
    }

    public function buku() {
        return $this->belongsTo(Buku::class);
    }

    public function bibliobigrafi()
    {
        return $this->belongsTo(Bibliobigrafi::class);
    }
}
