<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    protected $table = 'penerbit';
    protected $fillable = [
        'nama_penerbit'
    ];

    public function buku_transaksi()
    {
        return $this->hasMany(BukuTransaksi::class);
    }

    public function getNamaPenerbitAttribute($value)
    {
        return $this->attributes['nama_penerbit'] = ucwords($value);
    }

}
