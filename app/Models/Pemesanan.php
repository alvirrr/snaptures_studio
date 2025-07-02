<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_transaksi',
        'member_id',
        'paket_id',
        'no_hp',
        'tanggal',
        'waktu',
        'background',
        'jumlah_orang',
        'tambahan_orang',
        'tambahan_spotlight',
        'pembayaran',
        'total_bayar',
        'status',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }

}
