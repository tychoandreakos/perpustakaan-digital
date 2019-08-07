<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EksemplarTransaksi extends Model
{
    protected $table = 'eksemplar_transaksi';
    protected $guarded = [];

    public function eksemplar_pola()
    {
        return $this->belongsTo(EksemplarPola::class);
    }

    public function biblio()
    {
        return $this->hasMany(Bibliobigrafi::class);
    }
}
