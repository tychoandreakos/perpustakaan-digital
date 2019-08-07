<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BukuTransaksi extends Model
{
    protected $table = 'buku_transaksi';
    protected $guarded = [];

    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }

    public function kota()
    {
        return $this->belongsTo(Kota::class);
    }

    public function pengarang()
    {
        return $this->belongsTo(Pengarang::class);
    }

    public function bahasa()
    {
        return $this->belongsTo(Bahasa::class);
    }


    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class);
    }
}
