<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjamans';

    protected $primaryKey = 'id_peminjaman';

    protected $fillable = [
        'id_user',
        'id_barang',
        'id_admin',
        'tanggal_peminjaman',
        'tanggal_pengembalian',
        'jumlah',
        'metode_pengambilan',
        'alamat_pengantaran',
        'total_bayar',
        'status_peminjaman',
    ];

    protected $casts = [
        'tanggal_peminjaman' => 'date',
        'tanggal_pengembalian' => 'date',
        'total_bayar' => 'decimal:2',
        'jumlah' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang', 'id_barang');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin', 'id_admin');
    }

    public function pembayarans()
    {
        return $this->hasMany(Pembayaran::class, 'id_peminjaman', 'id_peminjaman');
    }
}