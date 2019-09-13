<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Gmd extends Model
{
    protected $table = 'gmd';
    protected $fillable = [
        'kode_gmd',
        'nama_gmd'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function getUpdatedAtAttribute($value)
    {
        return $this->attributes['updated_at'] = Carbon::parse($value)->diffForHumans();
    }

    public function getNamaGmdAttribute($value)
    {
        return $this->attributes['nama_gmd'] = ucwords($value);
    }

    public function gmd_transaksi()
    {
        return $this->hasMany(GmdTransaksi::class);
    }

    public function biblio()
    {
        return $this->hasMany(Bibliobigrafi::class);
    }
}
