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
        Schema::create('file_hasils', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pemesanan_id')->constrained('pemesanans', 'id_pemesanan')->cascadeOnDelete();
            $table->string('gambar_hasil')->nullable();
            $table->boolean('tampil_portofolio')->default(false);
            $table->dateTime('tanggal_upload')->nullable();
            $table->timestamps();                      // created_at & updated_at
            $table->softDeletes();                     // deleted_at (hapus aman)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file_hasils');
    }
};