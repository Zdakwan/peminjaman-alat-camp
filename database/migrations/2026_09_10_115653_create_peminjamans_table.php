<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('peminjamans', function (Blueprint $table) {
            $table->id('id_peminjaman');

            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_barang');
            $table->unsignedBigInteger('id_admin');

            $table->date('tanggal_peminjaman');
            $table->date('tanggal_pengembalian');
            $table->integer('jumlah');

            $table->string('metode_pengambilan');
            $table->text('alamat_pengantaran')->nullable();

            $table->decimal('total_bayar', 12, 2);
            $table->string('status_peminjaman')->default('menunggu');
            $table->timestamps();

            // Definisi Foreign Key (Secara spesifik menunjuk ke id_user, id_barang, dan id_admin)
            $table->foreign('id_user')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('id_barang')->references('id_barang')->on('barangs')->onDelete('restrict');
            $table->foreign('id_admin')->references('id_admin')->on('admins')->onDelete('restrict');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('peminjamans');
    }
};
