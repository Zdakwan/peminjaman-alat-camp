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
        Schema::create('laporan_peminjamans', function (Blueprint $table) {
            $table->id('id_laporan');

            $table->unsignedBigInteger('id_admin');

            $table->date('periode_mulai');
            $table->date('periode_selesai');
            $table->integer('total_peminjaman')->default(0);
            $table->decimal('total_pendapatan', 12, 2)->default(0);

            $table->timestamp('created_at')->nullable();

            // Foreign Key
            $table->foreign('id_admin')
                ->references('id_admin')
                ->on('admins')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_peminjamans');
    }
};