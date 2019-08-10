<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PinjamTransaksi extends Model
{
    protected $table = 'pinjam_transaksi';
    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function bibliobigrafi()
    {
        return $this->belongsTo(Bibliobigrafi::class);
    }
}
