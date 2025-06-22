<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Paket extends Model
{
    protected $fillable = ['nama', 'kategori', 'harga', 'deskripsi', 'gambar', 'slug'];

    protected static function booted()
    {
        static::creating(function ($paket) {
            $baseSlug = Str::slug($paket->nama);
            $slug = $baseSlug;
            $counter = 1;

            // pastikan slug unik
            while (static::where('slug', $slug)->exists()) {
                $slug = $baseSlug . '-' . $counter++;
            }

            $paket->slug = $slug;
        });
    }
}
