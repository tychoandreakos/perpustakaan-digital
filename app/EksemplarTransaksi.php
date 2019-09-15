<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EksemplarTransaksi extends Model
{
    protected $table = 'eksemplar_transaksi';
    public $primaryKey = 'pola_eksemplar';
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

    public function bibliobigrafi()
    {
        return $this->belongsTo(Bibliobigrafi::class);
    }
}
