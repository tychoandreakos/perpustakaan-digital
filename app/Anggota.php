<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggota';
    protected $primary = 'user_id';
    public $incrementing = false;
    protected $fillable = [
        'user_id',
        'tgl_lahir',
        'tgl_registrasi',
        'tgl_expired',
        'alamat',
        'jk',
        'no_telp',
        'foto'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function anggota_transaksi()
    {
        return $this->hasOne(AnggotaTransaksi::class);
    }
}
