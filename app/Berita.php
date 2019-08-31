<?php

namespace App;

use Bitfumes\Multiauth\Model\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Berita extends Model
{
    protected $table = 'berita';
    protected $fillable = [
        'judul',
        'isi',
        'slug',
        'img',
        'admin_id'
    ];


    public function getUpdatedAtAttribute($value)
    {
        return $this->attributes['updated_at'] = Carbon::parse($value)->diffForHumans();
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
