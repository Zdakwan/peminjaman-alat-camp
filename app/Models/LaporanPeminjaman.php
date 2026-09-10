<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanPeminjaman extends Model
{
    protected $table = 'laporan_peminjamans';

    protected $primaryKey = 'id_laporan';

    public $timestamps = false;

    protected $fillable = [
        'id_admin',
        'periode_mulai',
        'periode_selesai',
        'total_peminjaman',
        'total_pendapatan',
    ];

    protected $casts = [
        'periode_mulai' => 'date',
        'periode_selesai' => 'date',
        'total_peminjaman' => 'integer',
        'total_pendapatan' => 'decimal:2',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin', 'id_admin');
    }
}