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
    
    public $primaryKey = 'kode_eksemplar';

    public function eksemplar_transaksi()
    {
        return $this->hasMany(EksemplarTransaksi::class);
    }

    public function getKodeEksemplarAttribute($value)
    {
        return $this->attributes['kode_eksemplar'] = strtoupper($value);
    }
}
