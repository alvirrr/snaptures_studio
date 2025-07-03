<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $fillable = ['kode', 'deskripsi', 'poin_dibutuhkan', 'expired_at'];

    public function members()
    {
        return $this->belongsToMany(Member::class, 'voucher_member')
                    ->withPivot('ditukar_pada', 'status')
                    ->withTimestamps();
    }
}
