<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'poin',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Relasi ke pemesanan
     */
    public function pemesanans()
    {
        return $this->hasMany(Pemesanan::class);
    }

    /**
     * Riwayat log poin
     */
    public function riwayatPoin()
    {
        return $this->hasMany(PointLog::class);
    }

    /**
     * Relasi ke voucher yang ditukar
     */
    public function vouchers()
    {
        return $this->belongsToMany(Voucher::class, 'voucher_member')
            ->withPivot('ditukar_pada', 'status')
            ->withTimestamps();
    }
}
