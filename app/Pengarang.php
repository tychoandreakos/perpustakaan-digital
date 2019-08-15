<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Pengarang extends Model
{
    protected $table = 'pengarang';
    protected $fillable = [
        'nama_pengarang',
        'tahun_lahir'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function getUpdatedAtAttribute($value)
    {
        return $this->attributes['updated_at'] = Carbon::parse($value)->diffForHumans();
    }

    public function getNamaPengarangAttribute($value)
    {
        return $this->attributes['nama_pengarang'] = ucwords($value);
    }

    public function buku_transaksi()
    {
        return $this->hasMany(BukuTransaksi::class);
    }
}
