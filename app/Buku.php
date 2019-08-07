<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';
    protected $fillable = [
        'judul',
        'edisi',
        'isbn_isnn',
        'deskripsi_fisik',
        'judul_seri',
        'catatan',
        'slug',
        'gambar_sampul'
    ];
}
