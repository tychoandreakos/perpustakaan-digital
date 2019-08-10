<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subyek extends Model
{
    protected $table = 'subyek';
    protected $fillable = [
        'nama_subyek',
        'tipe_subyek'
    ];
}
