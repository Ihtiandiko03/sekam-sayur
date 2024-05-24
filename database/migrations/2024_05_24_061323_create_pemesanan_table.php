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
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_resi');


            $table->integer('id_pemesan');
            $table->string('nama_pemesan');
            $table->string('alamat_pemesan');
            $table->string('nomor_telepon');
            $table->string('kecamatan');
            $table->string('kota');

            $table->integer('id_produk');
            $table->string('nama_produk');
            $table->integer('jumlah_pesanan');
            $table->float('harga_awal');
            $table->float('harga');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanan');
    }
};
