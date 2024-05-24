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
        Schema::create('tracking', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_resi')->unique();
            $table->string('nama_driver')->nullable();
            $table->string('status')->nullable();
            $table->string('paid_stat')->nullable();
            $table->float('total_harga')->nullable();
            $table->string('nama_penerima_barang')->nullable();
            $table->string('foto_penerimaan_barang')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tracking');
    }
};
