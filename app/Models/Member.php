<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // untuk auth jika ingin login
use Illuminate\Notifications\Notifiable;

class Member extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'members';

    protected $fillable = [
        'name',
        'email',
        'password',
        'alamat',
        'wa',
        'foto',
    ];

    protected $hidden = [
        'password',
    ];

    public function pemesanans()
    {
        return $this->hasMany(Pemesanan::class);
    }
}
