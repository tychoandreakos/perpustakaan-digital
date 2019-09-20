<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Topik extends Model
{
    protected $table = 'topik';
    protected $fillable = [
        'jenis_topik',
        'slug',
        'warna'
    ];

    public function getUpdatedAtAttribute($value)
    {
        return $this->attributes['updated_at'] = Carbon::parse($value)->diffForHumans();
    }

    public function getJenisTopikAttribute($value)
    {
        return $this->attributes['jenis_topik'] = ucwords($value);
    }

    public function buku()
    {
        return $this->hasMany(Buku::class);
    }
}
