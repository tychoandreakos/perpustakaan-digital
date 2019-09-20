<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Anggota extends Model
{
    protected $table = 'anggota';
    protected $primaryKey = 'user_id';
    public $incrementing = false;
    protected $fillable = [
        'user_id',
        'jurusan_id',
        'tgl_lahir',
        'tgl_registrasi',
        'tgl_expired',
        'alamat',
        'jk',
        'no_telp',
        'foto',
        'jurusan'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function getUpdatedAtAttribute($value)
    {
        return $this->attributes['updated_at'] = Carbon::parse($value)->diffForHumans();
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function anggota_transaksi()
    {
        return $this->hasOne(AnggotaTransaksi::class, 'user_id', 'user_id');
    }
}
