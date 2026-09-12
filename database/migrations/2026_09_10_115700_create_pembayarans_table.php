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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id('id_pembayaran');

            $table->unsignedBigInteger('id_peminjaman');
            $table->unsignedBigInteger('id_admin');

            $table->date('tanggal_bayar');
            $table->decimal('jumlah_bayar', 12, 2);
            $table->string('metode_bayar');
            $table->string('bukti_bayar')->nullable();

            $table->string('status_pembayaran')->default('menunggu');
            $table->timestamp('tanggal_verifikasi')->nullable();

            // Foreign Key
            $table->foreign('id_peminjaman')
                ->references('id_peminjaman')
                ->on('peminjamans')
                ->onDelete('restrict');

            $table->foreign('id_admin')
                ->references('id_admin')
                ->on('admins')
                ->onDelete('restrict');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};