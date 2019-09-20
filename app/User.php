<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'id', 'approved_at'
    ];

    public $incrementing = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function anggota()
    {
        return $this->hasOne(Anggota::class);
    }

    public function buku_tamu()
    {
        return $this->hasMany(Tamu::class);
    }

    public function anggota_transaksi()
    {
        return $this->hasOne(AnggotaTransaksi::class);
    }

    public function denda(){
        return $this->hasMany(Denda::class);
    }

    public function getNameAttribute($value)
    {
        return $this->attributes['name'] = ucwords($value);
    }

    public function pinjam_transaksi()
    {
        return $this->hasMany(PinjamTransaksi::class);
    }
}
