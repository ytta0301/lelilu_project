<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestimoniSeeder extends Seeder
{
    public function run(): void
    {
        // Hanya pemesanan 'selesai' yang bisa diberi testimoni
        DB::table('testimonis')->insert([
            [
                'user_id'        => 3, // Budi
                'pemesanan_id'   => 1,
                'isi_testimoni'  => 'Hasilnya melebihi ekspektasi! Logo kopi saya jadi terlihat sangat profesional. Proses revisi juga cepat dan responsif.',
                'rating'         => 5,
                'created_at'     => now()->subDays(8),
                'updated_at'     => now()->subDays(8),
            ],
            [
                'user_id'        => 4, // Siti
                'pemesanan_id'   => 3,
                'isi_testimoni'  => 'Poster seminar saya keren banget, banyak yang tanya siapa desainernya. Puas dengan hasilnya, harga juga terjangkau.',
                'rating'         => 5,
                'created_at'     => now()->subDays(5),
                'updated_at'     => now()->subDays(5),
            ],
            [
                'user_id'        => 5, // Andi
                'pemesanan_id'   => 5,
                'isi_testimoni'  => 'Feed Instagram produk saya jadi lebih estetik dan konsisten. Penjualan meningkat setelah pakai konten ini. Recommended!',
                'rating'         => 4,
                'created_at'     => now()->subDays(12),
                'updated_at'     => now()->subDays(12),
            ],
            [
                'user_id'        => 5, // Andi
                'pemesanan_id'   => 4,
                'isi_testimoni'  => 'Di dek observasi, kalian berdiri berdampingan menatap bintang.

“Sepi ya?” katanya.
“Tenang,” jawabmu.

Di planet dengan langit kehijauan, ia duduk di sampingmu dan menyandarkan kepala di bahumu.

“Indah… andaikan waktuku lebih panjang.”
“Kita buat terasa panjang,” katamu pelan.

Untuk pertama kalinya, Firefly tersenyum hangat—dan semesta terasa seperti rumah kecil yang kalian bagi bersama.',
                'rating'         => 5,
                'created_at'     => now()->subDays(12),
                'updated_at'     => now()->subDays(12),
            ],
        ]);
    }
}