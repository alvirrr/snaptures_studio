<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Pesanan;

class PemesananBerhasilMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pesanan;

    public function __construct(Pesanan $pesanan)
    {
        $this->pesanan = $pesanan;
    }

    public function build()
    {
        return $this->subject('Konfirmasi Pemesanan Anda - Snapstures Studio')
            ->view('emails.pemesanan-berhasil');
    }
}
