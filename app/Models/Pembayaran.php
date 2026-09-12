<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayarans';

    protected $primaryKey = 'id_pembayaran';

    protected $fillable = [
        'id_peminjaman',
        'id_admin',
        'tanggal_bayar',
        'jumlah_bayar',
        'metode_bayar',
        'bukti_bayar',
        'status_pembayaran',
        'tanggal_verifikasi',
    ];

    protected $casts = [
        'tanggal_bayar' => 'date',
        'jumlah_bayar' => 'decimal:2',
        'tanggal_verifikasi' => 'datetime',
    ];

    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class, 'id_peminjaman', 'id_peminjaman');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin', 'id_admin');
    }
}