<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admins';

    protected $primaryKey = 'id_admin';

    protected $fillable = [
        'nama_admin',
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
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