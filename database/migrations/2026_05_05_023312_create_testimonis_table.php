<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('testimonis', function (Blueprint $table) {
            $table->id('id_testimoni');
            $table->foreignId('user_id')->constrained('users', 'id_user')->cascadeOnDelete();
            $table->foreignId('pemesanan_id')->constrained('pemesanans', 'id_pemesanan')->cascadeOnDelete();
            $table->text('isi_testimoni');
            $table->tinyInteger('rating')->unsigned();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('testimonis');
    }
};