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
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_transaksi')->unique();
            $table->unsignedBigInteger('member_id');
            $table->unsignedBigInteger('paket_id');
            $table->string('no_hp');
            $table->date('tanggal');
            $table->string('waktu');
            $table->enum('pembayaran', ['dp', 'lunas']);
            $table->integer('total_bayar');
            $table->enum('status', ['pending', 'confirmed', 'selesai'])->default('pending');
            $table->timestamps();

            // Foreign Key
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
            $table->foreign('paket_id')->references('id')->on('pakets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanans');
    }
};
