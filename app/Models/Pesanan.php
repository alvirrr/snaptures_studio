<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanans';

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'id_pesanan',
        'nama',
        'no_hp',
        'paket_id',
        'tanggal',
        'waktu',
        'background',
        'jumlah_orang',
        'tambahan_orang',
        'tambahan_spotlight',
        'total_harga',
        'pembayaran',
    ];

    // Jika kamu pakai timestamps (created_at, updated_at)
    public $timestamps = true;

    // Relasi ke paket (jika dibutuhkan)
    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }
}
