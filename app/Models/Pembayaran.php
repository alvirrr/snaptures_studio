<?php

namespace App\Models;

use App\Models\Pemesanan;
use App\Enums\StatusPembayaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'invoice',
        'bank',
        'jumlah',
        'bukti',
        'status',
    ];

    protected $casts = [
        'status' => StatusPembayaran::class,
    ];

    /**
     * Relasi ke Pemesanan berdasarkan invoice = kode_transaksi
     */
    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'invoice', 'kode_transaksi');
    }
}
