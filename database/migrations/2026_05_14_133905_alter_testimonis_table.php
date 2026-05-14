<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('testimonis', function (Blueprint $table) {
            $table->dropForeign(['pemesanan_id']);
            $table->dropForeign(['user_id']);
        });

        Schema::table('testimonis', function (Blueprint $table) {
            $table->foreignId('pemesanan_id')->nullable()->change();
            $table->foreignId('user_id')->nullable()->change();
            $table->tinyInteger('rating')->unsigned()->nullable()->change();
            $table->string('nama')->nullable()->after('id_testimoni');
        });
    }

    public function down(): void
    {
        Schema::table('testimonis', function (Blueprint $table) {
            $table->dropColumn('nama');
            $table->tinyInteger('rating')->unsigned()->nullable(false)->change();
            $table->foreignId('pemesanan_id')->nullable(false)->change();
            $table->foreignId('user_id')->nullable(false)->change();
            $table->foreign('pemesanan_id')->references('id_pemesanan')->on('pemesanans')->cascadeOnDelete();
            $table->foreign('user_id')->references('id_user')->on('users')->cascadeOnDelete();
        });
    }
};
