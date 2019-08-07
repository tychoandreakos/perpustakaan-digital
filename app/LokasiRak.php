<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LokasiRak extends Model
{
    protected $table = 'lokasi_rak';
    protected $fillable = [
        'kode_lokasi',
        'nama_lokasi'
    ];
}
