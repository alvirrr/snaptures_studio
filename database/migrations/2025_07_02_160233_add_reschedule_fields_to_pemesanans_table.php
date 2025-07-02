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
            //
            $table->date('reschedule_tanggal')->nullable();
            $table->string('reschedule_waktu')->nullable();
            $table->enum('reschedule_status', ['Pending', 'Approved', 'Rejected'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pemesanans', function (Blueprint $table) {
            //
        });
    }
};
