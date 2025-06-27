<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalBooking extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'tanggal', 'jam'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
