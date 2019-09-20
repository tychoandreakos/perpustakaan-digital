<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = 'jurusan';
    protected $guarded = [];


    public function getNamaJurusanAttribute($value)
    {
        return $this->attributes['nama_jurusan'] = ucwords($value);
    }

    public function anggota()
    {
        $this->hasMany(Anggota::class);
    }
}
