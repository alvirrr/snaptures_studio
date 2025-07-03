<?php

// app/Models/PointLog.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PointLog extends Model
{
    protected $fillable = ['member_id', 'poin', 'keterangan'];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
