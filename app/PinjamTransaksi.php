<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class PinjamTransaksi extends Model
{
    protected $table = 'pinjam_transaksi';
    protected $fillable = [
        'user_id',
        'bibliobigrafi_id',
        'tgl_pinjam',
        'tanggal_habis_pinjam',
        'tgl_kembali',
        'status_pinjam'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'tanggal_habis_pinjam'
    ];

    public function getTanggalHabisPinjamAttribute($value)
    {
        return $this->attributes['updated_at'] = Carbon::parse($value)->diffForHumans();
    }
    
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function bibliobigrafi()
    {
        return $this->belongsTo(Bibliobigrafi::class);
    }
}
