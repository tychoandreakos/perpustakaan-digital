<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Denda extends Model
{
    protected $table = 'denda';
    protected $fillable = [
        'user_id',
        'pinjam_transaksi_id',
        'buku_id',
        'jumlah_bayar',
        'deskripsi',
    ];

    public function buku()
    {
        $this->belongsTo(Buku::class);
    }

    public function pinjam_transaksi()
    {
        $this->belongsTo(PinjamTransaksi::class);
    }

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
