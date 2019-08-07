<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Klasifikasi extends Model
{
    protected $table = 'klasifikasi';
    protected $fillable = [
        'tipe_klasifikasi'
    ];

    public function biblio()
    {
        return $this->hasMany(Bibliobigrafi::class);
    }
}
