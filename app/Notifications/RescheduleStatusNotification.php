<?php

namespace App\Notifications;

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RescheduleStatusNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $status;
    public $tanggal;
    public $waktu;

    public function __construct($status, $tanggal, $waktu)
    {
        $this->status = $status;
        $this->tanggal = $tanggal;
        $this->waktu = $waktu;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $message = (new MailMessage)
            ->greeting('Hai, ' . $notifiable->name)
            ->subject('Status Permintaan Reschedule Anda')
            ->line("Permintaan reschedule Anda telah {$this->status}.");

        if ($this->status === 'Disetujui') {
            $message->line("📅 Tanggal: {$this->tanggal}")
                ->line("⏰ Waktu: {$this->waktu}");
        }

        $message->line('Terima kasih telah menggunakan layanan Snapstures Studio.');

        return $message;
    }
}
