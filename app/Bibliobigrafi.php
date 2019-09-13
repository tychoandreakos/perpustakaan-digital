<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Bibliobigrafi extends Model
{
    protected $table = 'bibliobigrafi';

    protected $fillable = [
        'buku_id',
        'klasifikasi_id',
        'pola_eksemplar',
        'koleksi_id',
        'no_panggil',
        'lokasi_rak_id'
    ];


    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // public function getUpdatedAtAttribute($value)
    // {
    //     return $this->attributes['updated_at'] = Carbon::parse($value)->diffForHumans();
    // }

    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }

    public function klasifikasi()
    {
        return $this->belongsTo(Klasifikasi::class);
    }

    public function lokasi_rak()
    {
        return $this->belongsTo(LokasiRak::class);
    }

    public function gmd_transaksi()
    {
        return $this->hasMany(GmdTransaksi::class);
    }

    public function koleksi()
    {
        return $this->belongsTo(Koleksi::class);
    }

    public function gmd()
    {
        return $this->belongsTo(Gmd::class);
    }

    public function pola_eksemplar()
    {
        return $this->HasMany(EksemplarTransaksi::class, 'pola_eksemplar', 'pola_eksemplar');
    }

    public function pinjam_transaksi()
    {
        return $this->hasOne(PinjamTransaksi::class);
    }
}
