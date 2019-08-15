<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Kota extends Model
{
    protected $table = 'kota';
    protected $fillable = [
        'nama_kota'
    ];

    public function buku_transaksi()
    {
        return $this->hasMany(BukuTransaksi::class);
    }

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function getNamaKotaAttribute($value)
    {
        return $this->attributes['nama_kota'] = ucwords($value);
    }

    public function getUpdatedAtAttribute($value)
    {
        return $this->attributes['updated_at'] = Carbon::parse($value)->diffForHumans();
    }
}
