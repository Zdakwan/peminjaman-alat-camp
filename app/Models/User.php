<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    protected $primaryKey = 'id_user';

    protected $fillable = [
        'nama',
        'email',
        'username',
        'password',
        'no_hp',
        'alamat',
    ];

    protected $hidden = [
        'password',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function peminjamans()
    {
        return $this->hasMany(Peminjaman::class, 'id_user', 'id_user');
    }
}