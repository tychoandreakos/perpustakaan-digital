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
        'order',
        'img'
    ];

    public function getUpdatedAtAttribute($value)
    {
        return $this->attributes['updated_at'] = Carbon::parse($value)->diffForHumans();
    }
}
