<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EksemplarTransaksi extends Model
{
    protected $table = 'eksemplar_transaksi';
    protected $fillable = [
        'pola_eksemplar',
        'kode_eksemplar',
        'status_pinjam'
    ];
    public $incrementing = false;

    public function eksemplar_pola()
    {
        return $this->belongsTo(EksemplarPola::class);
    }

    public function biblio()
    {
        return $this->hasMany(Bibliobigrafi::class);
    }
}
