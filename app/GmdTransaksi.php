<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GmdTransaksi extends Model
{
    protected $table = 'gmd_transaksi';
    protected $fillable = [
        'biblibigrafi_id',
        'gmd_id'
    ];


    public function bibliobigrafi()
    {
        return $this->belongsTo(Bibliobigrafi::class);
    }

    public function gmd()
    {
        return $this->belongsTo(Gmd::class);
    }
}
