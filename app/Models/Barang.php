<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barangs';

    protected $primaryKey = 'id_barang';

    protected $fillable = [
        'nama_barang',
        'deskripsi',
        'kategori',
        'harga_sewa',
        'stok',
        'stok_tersedia',
        'foto',
    ];

    protected $casts = [
        'harga_sewa' => 'decimal:2',
        'stok' => 'integer',
        'stok_tersedia' => 'integer',
    ];

    public function peminjamans()
    {
        return $this->hasMany(
            Peminjaman::class,
            'id_barang',
            'id_barang'
        );
    }

    public function getRouteKeyName()
    {
        return 'id_barang';
    }
}