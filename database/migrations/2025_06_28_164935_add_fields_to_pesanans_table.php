<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tambahkan kolom tambahan ke tabel pesanans.
     */
    public function up(): void
    {
        Schema::table('pesanans', function (Blueprint $table) {
            $table->string('id_pesanan')->unique()->after('id');
            $table->string('background')->nullable()->after('waktu');
            $table->integer('jumlah_orang')->nullable()->after('background');
            $table->integer('tambahan_orang')->default(0)->after('jumlah_orang');
            $table->boolean('tambahan_spotlight')->default(false)->after('tambahan_orang');
            $table->integer('total_harga')->nullable()->after('tambahan_spotlight');
            $table->string('pembayaran', 20)->nullable()->after('total_harga');
        });
    }

    /**
     * Rollback kolom tambahan dari tabel pesanans.
     */
    public function down(): void
    {
        Schema::table('pesanans', function (Blueprint $table) {
            $table->dropColumn([
                'id_pesanan',
                'background',
                'jumlah_orang',
                'tambahan_orang',
                'tambahan_spotlight',
                'total_harga',
                'pembayaran',
            ]);
        });
    }
};
