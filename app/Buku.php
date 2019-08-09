<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
    ];

    public function buku_transaksi()
    {
        return $this->hasOne(BukuTransaksi::class);
    }

    public function biblio()
    {
        return $this->hasMany(Bibliobigrafi::class);
    }
}
