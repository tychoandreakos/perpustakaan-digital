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
        'gmd_id',
        'pola_eksemplar'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function getUpdatedAtAttribute($value)
    {
        return $this->attributes['updated_at'] = Carbon::parse($value)->diffForHumans();
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }

    public function klasifikasi()
    {
        return $this->belongsTo(Klasifikasi::class);
    }

    public function gmd()
    {
        return $this->belongsTo(Gmd::class);
    }

    public function pola_eksemplar()
    {
        return $this->belongsTo(EksemplarTransaksi::class);
    }

    public function pinjam_transaksi()
    {
        return $this->hasOne(PinjamTransaksi::class);
    }
}
