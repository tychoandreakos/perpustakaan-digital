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
}
