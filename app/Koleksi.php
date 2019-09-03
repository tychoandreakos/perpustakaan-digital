<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Koleksi extends Model
{
    protected $table = 'koleksi';
    protected $fillable = [
        'tipe_koleksi'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function getUpdatedAtAttribute($value)
    {
        return $this->attributes['updated_at'] = Carbon::parse($value)->diffForHumans();
    }

    public function bibliobigrafi()
    {
        return $this->hasMany(Bibliobigrafi::class);
    }

    public function getTipeKoleksiAttribute($value)
    {
        return $this->attributes['tipe_koleksi'] = ucwords($value);
    }
}
