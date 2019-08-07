<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bahasa extends Model
{
    protected $table = 'bahasa';
    protected $fillable = [
        'jenis_bahasa'
    ];
    
    public function buku_transaksi()
    {
        return $this->hasMany(BukuTransaksi::class);
    }
}
