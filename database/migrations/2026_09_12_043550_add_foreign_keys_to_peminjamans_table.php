<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('peminjamans', function (Blueprint $table) {
            $table->foreign('id_user')
                ->references('id_user')
                ->on('users')
                ->onDelete('restrict');

            $table->foreign('id_barang')
                ->references('id_barang')
                ->on('barangs')
                ->onDelete('restrict');

            $table->foreign('id_admin')
                ->references('id_admin')
                ->on('admins')
                ->onDelete('restrict');
        });
    }

    public function down(): void
    {
        Schema::table('peminjamans', function (Blueprint $table) {
            $table->dropForeign(['id_user']);
            $table->dropForeign(['id_barang']);
            $table->dropForeign(['id_admin']);
        });
    }
};
