<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EksemplarPola extends Model
{
    protected $table = 'eksemplar_pola';
    public $incrementing = false;
    protected $fillable = [
        'kode_eksemplar',
        'prefix',
        'serial',
        'suffix'
    ];

    public function eksemplar_transaksi()
    {
        return $this->hasMany(EksemplarTransaksi::class);
    }

    public function setKodeEksemplarAttribute($value)
    {
        $this->attributes['kode_eksemplar'] = strtoupper($value);
    }
}
