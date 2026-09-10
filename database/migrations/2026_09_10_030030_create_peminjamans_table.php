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
       Schema::create('peminjamans', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->foreignId('alat_id')->constrained('alats')->onDelete('cascade');
    $table->integer('jumlah');
    $table->date('tanggal_pinjam');
    $table->date('tanggal_kembali');
    $table->decimal('total_biaya', 10, 2);
    $table->enum('status', ['Pending', 'Disetujui', 'Dipinjam', 'Selesai', 'Dibatalkan'])->default('Pending');
    $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamen');
    }
};
