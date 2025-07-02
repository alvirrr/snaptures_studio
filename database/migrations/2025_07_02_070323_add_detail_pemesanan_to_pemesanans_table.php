<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pemesanans', function (Blueprint $table) {
            $table->string('background')->after('waktu')->nullable();
            $table->integer('jumlah_orang')->after('background')->default(1);
            $table->integer('tambahan_orang')->after('jumlah_orang')->default(0);
            $table->boolean('tambahan_spotlight')->after('tambahan_orang')->default(false);
        });
    }

    public function down(): void
    {
        Schema::table('pemesanans', function (Blueprint $table) {
            $table->dropColumn([
                'background',
                'jumlah_orang',
                'tambahan_orang',
                'tambahan_spotlight'
            ]);
        });
    }
};
