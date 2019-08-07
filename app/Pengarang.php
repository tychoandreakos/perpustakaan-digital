<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengarang extends Model
{
    protected $table = 'pengarang';
    protected $fillable = [
        'nama_pengarang',
        'tahun_lahir'
    ];
}
