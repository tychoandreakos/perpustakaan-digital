<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EksemplarPola extends Model
{
    protected $table = 'eksemplar_pola';
    public $incrementing = false;
    protected $guarded = [];

    public function eksemplar_transaksi()
    {
        return $this->hasMany(EksemplarTransaksi::class);
    }
}
