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
        Schema::dropIfExists('portfolios'); // tambahkan baris ini
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 10)->unique()->comment('Format: PF-001');
            $table->string('nama_kreator', 100);
            $table->text('deskripsi')->nullable();
            $table->string('gambar')->nullable()->comment('Path file gambar di storage/app/public');
            $table->boolean('is_aktif')->default(true)->comment('Tampil / tidak di halaman publik');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
};