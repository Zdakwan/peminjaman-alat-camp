<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Konten extends Model
{
    protected $table = 'kontens';

    protected $primaryKey = 'id_konten';

    public $timestamps = false;

    protected $fillable = [
        'id_admin',
        'judul',
        'jenis_konten',
        'isi',
        'gambar',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin', 'id_admin');
    }
}