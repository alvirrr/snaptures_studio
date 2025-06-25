<?php

namespace App\Enums;

enum StatusPembayaran: string
{
    case PENDING = 'pending';
    case VALID = 'valid';
    case REJECTED = 'rejected';

    public function label(): string
    {
        return match($this) {
            self::PENDING => 'Menunggu Validasi',
            self::VALID => 'Valid',
            self::REJECTED => 'Ditolak',
        };
    }
}
