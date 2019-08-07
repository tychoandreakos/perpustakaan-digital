<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggota';
    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
