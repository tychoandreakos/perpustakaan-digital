<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PinjamTransaksi extends Model
{
    protected $table = 'pinjam_transaksi';
    protected $fillable = [
        'user_id',
        'bibliobigrafi_id',
        'tgl_pinjam',
        'tanggal_habis_pinjam',
        'tgl_kembali',
        'status_pinjam'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function bibliobigrafi()
    {
        return $this->belongsTo(Bibliobigrafi::class);
    }
}
