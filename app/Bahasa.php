<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Bahasa extends Model
{
    protected $table = 'bahasa';
    protected $fillable = [
        'jenis_bahasa'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function getUpdatedAtAttribute($value)
    {
        return $this->attributes['updated_at'] = Carbon::parse($value)->diffForHumans();
    }

    public function getJenisBahasaAttribute($value)
    {
        return $this->attributes['jenis_bahasa'] = ucwords($value);
    }
    
    public function buku_transaksi()
    {
        return $this->hasMany(BukuTransaksi::class);
    }
}
