<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipeAnggota extends Model
{
    protected $table = 'tipe_anggota';
    protected $guarded = [];

    public function anggota_transaksi()
    {
        return $this->hasMany(AnggotaTransaksi::class);
    }

    public function getTipeAnggotaAttribute($value)
    {
        return $this->attributes['tipe_anggota'] = ucwords($value);
    }
    
}
