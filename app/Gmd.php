<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gmd extends Model
{
    protected $table = 'gmd';
    protected $fillable = [
        'kode_gmd',
        'nama_gmd'
    ];

    public function biblio()
    {
        return $this->hasMany(Bibliobigrafi::class);
    }
}
