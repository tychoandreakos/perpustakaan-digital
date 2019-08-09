<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggota';
    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function anggota_transaksi()
    {
        return $this->hasOne(AnggotaTransaksi::class);
    }
}
