<?php

namespace App\Mail;

use App\Models\Pemesanan;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MemberOrderSuccessMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pemesanan;

    public function __construct(Pemesanan $pemesanan)
    {
        $this->pemesanan = $pemesanan;
    }

    public function build()
    {
        return $this->subject('Konfirmasi Pemesanan Anda - Snapstures Studio')
            ->view('emails.member-pemesanan-berhasil')
            ->with(['pemesanan' => $this->pemesanan]);
    }
}
