<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bibliobigrafi extends Model
{
    protected $table = 'bibliobigrafi';
    protected $guarded = [];

    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }

    public function klasifikasi()
    {
        return $this->belongsTo(Klasifikasi::class);
    }

    public function gmd()
    {
        return $this->belongsTo(Gmd::class);
    }

    public function pola_eksemplar()
    {
        return $this->belongsTo(EksemplarTransaksi::class);
    }
}
