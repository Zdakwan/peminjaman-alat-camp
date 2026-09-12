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
        Schema::create('kontens', function (Blueprint $table) {
            $table->id('id_konten');

            $table->unsignedBigInteger('id_admin');

            $table->string('judul');
            $table->string('jenis_konten');
            $table->longText('isi');
            $table->string('gambar')->nullable();

            $table->timestamp('updated_at')->nullable();

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
        Schema::dropIfExists('kontens');
    }
};