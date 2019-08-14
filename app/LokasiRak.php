<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class LokasiRak extends Model
{
    protected $table = 'lokasi_rak';
    protected $fillable = [
        'kode_lokasi',
        'nama_lokasi'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function setNamaLokasiAttribute($value)
    {
        $this->attributes['nama_lokasi'] = ucwords($value);
    }

    public function getUpdatedAtAttribute($value)
    {
        return $this->attributes['updated_at'] = Carbon::parse($value)->diffForHumans();
    }
}
