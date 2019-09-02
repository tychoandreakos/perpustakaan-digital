<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Topik extends Model
{
    protected $table = 'topik';
    protected $fillable = [
        'jenis_topik',
        'slug',
        'warna'
    ];

    public function getUpdatedAtAttribute($value)
    {
        return $this->attributes['updated_at'] = Carbon::parse($value)->diffForHumans();
    }

    public function buku()
    {
        return $this->hasMany(Buku::class);
    }

    // hapus ini ketika databse sudah fixed
    public function buku_transaksi()
    {
        return $this->belongsTo(BukuTransaksi::class);
    }
}
