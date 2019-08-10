<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnggotaTransaksi extends Model
{
    protected $table = 'anggota_transaksi';
    protected $fillable = [
        'user_id',
        'tipe_anggota_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tipe_anggota()
    {
        return $this->belongsTo(TipeAnggota::class);
    }

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }
}
