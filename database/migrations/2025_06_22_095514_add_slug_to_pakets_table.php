<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use App\Models\Paket;

return new class extends Migration
{
    public function up(): void
    {
        // 1) Tambah kolom slug, tapi NULLABLE & TANPA unique dulu
        Schema::table('pakets', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('nama');
        });

        // 2) Isi slug unik untuk data lama
        Paket::all()->each(function ($p) {
            $base  = Str::slug($p->nama);
            $slug  = $base;
            $count = 1;

            // pastikan unik
            while (Paket::where('slug', $slug)->exists()) {
                $slug = $base . '-' . $count++;
            }

            $p->slug = $slug;
            $p->save();
        });

        // 3) Pasang UNIQUE index (NULL masih boleh dobel di MySQL)
        Schema::table('pakets', function (Blueprint $table) {
            $table->unique('slug');
        });
    }

    public function down(): void
    {
        Schema::table('pakets', function (Blueprint $table) {
            $table->dropUnique(['slug']);
            $table->dropColumn('slug');
        });
    }
};
