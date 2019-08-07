<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnggotaTransaksi extends Model
{
    protected $table = 'anggota_transaksi';
    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function tipe_anggota()
    {
        return $this->belongsTo(TipeAnggota::class);
    }
}
