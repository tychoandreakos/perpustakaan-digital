<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Buku extends Model
{
    protected $table = 'buku';
    protected $fillable = [
        'judul',
        'edisi',
        'tahun_terbit',
        'isbn_isnn',
        'deskripsi_fisik',
        'judul_seri',
        'catatan',
        'slug',
        'pdf',
        'gambar_sampul',
        'topik_id'
    ];
    
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function getUpdatedAtAttribute($value)
    {
        return $this->attributes['updated_at'] = Carbon::parse($value)->diffForHumans();
    }

    public function buku_transaksi()
    {
        return $this->hasMany(BukuTransaksi::class);
    }

    public function denda(){
        return $this->hasMany('denda');
    }

    public function pinjam_transaksi()
    {
        return $this->hasMany(PinjamTransaksi::class);
    }

    public function bibliobigrafi()
    {
        return $this->hasMany(Bibliobigrafi::class);
    }

    public function topik()
    {
        return $this->belongsTo(Topik::class);
    }
}
