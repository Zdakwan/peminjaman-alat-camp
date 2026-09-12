<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'admins';

    protected $primaryKey = 'id_admin';

    protected $fillable = [
        'nama_admin',
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function peminjamans()
    {
        return $this->hasMany(Peminjaman::class, 'id_admin', 'id_admin');
    }

    public function pembayarans()
    {
        return $this->hasMany(Pembayaran::class, 'id_admin', 'id_admin');
    }

    public function kontens()
    {
        return $this->hasMany(Konten::class, 'id_admin', 'id_admin');
    }

    public function laporanPeminjamans()
    {
        return $this->hasMany(LaporanPeminjaman::class, 'id_admin', 'id_admin');
    }
}
