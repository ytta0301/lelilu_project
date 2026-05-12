<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PemesananSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pemesanans')->insert([
            [
                'user_id'    => 3, // Budi
                'jenis'      => 'Logo',
                'brief'      => 'Butuh logo minimalis untuk brand kopi saya, warna coklat dan krem.',
                'referensi'  => 'referensi/logo_ref1.jpg',
                'harga'      => 250000,
                'status'     => 'selesai',
                'created_at' => now()->subDays(10),
                'updated_at' => now()->subDays(10),
            ],
            [
                'user_id'    => 3, // Budi
                'jenis'      => 'Banner',
                'brief'      => 'Banner promosi diskon akhir tahun ukuran 1x2 meter.',
                'referensi'  => null,
                'harga'      => 150000,
                'status'     => 'proses',
                'created_at' => now()->subDays(3),
                'updated_at' => now()->subDays(3),
            ],
            [
                'user_id'    => 4, // Siti
                'jenis'      => 'Poster',
                'brief'      => 'Poster event seminar bisnis online, tema profesional dan modern.',
                'referensi'  => 'referensi/poster_ref1.jpg',
                'harga'      => 175000,
                'status'     => 'selesai',
                'created_at' => now()->subDays(7),
                'updated_at' => now()->subDays(7),
            ],
            [
                'user_id'    => 4, // Siti
                'jenis'      => 'Kartu Nama',
                'brief'      => 'Kartu nama untuk konsultan keuangan, kesan elegan dan terpercaya.',
                'referensi'  => null,
                'harga'      => 100000,
                'status'     => 'pending',
                'created_at' => now()->subDays(1),
                'updated_at' => now()->subDays(1),
            ],
            [
                'user_id'    => 5, // Andi
                'jenis'      => 'Konten Instagram',
                'brief'      => 'Feed Instagram 9 tiles untuk launching produk skincare.',
                'referensi'  => 'referensi/ig_ref1.jpg',
                'harga'      => 450000,
                'status'     => 'selesai',
                'created_at' => now()->subDays(14),
                'updated_at' => now()->subDays(14),
            ],
            [
                'user_id'    => 5, // Andi
                'jenis'      => 'Logo',
                'brief'      => 'Logo untuk startup teknologi, kesan futuristik dan dinamis.',
                'referensi'  => 'referensi/logo_ref2.jpg',
                'harga'      => 300000,
                'status'     => 'dibatalkan',
                'created_at' => now()->subDays(5),
                'updated_at' => now()->subDays(5),
            ],
            [
                'user_id'    => 5, // Andi
                'jenis'      => 'Logo',
                'brief'      => 'Logo untuk startup teknologi, kesan futuristik dan dinamis.',
                'referensi'  => 'referensi/logo_ref2.jpg',
                'harga'      => 300000,
                'status'     => 'dibatalkan',
                'created_at' => now()->subDays(5),
                'updated_at' => now()->subDays(5),
            ],
             [
                'user_id'    => 7, // Kisari
                'jenis'      => 'Ilustrasi',
                'brief'      => 'Ilustrasi untuk buku anak-anak, tema kunang-kunang luar angkasa.',
                'referensi'  => 'referensi/ilustrasi_ref1.jpg',
                'harga'      => 500000,
                'status'     => 'selesai',
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2),
            ],
        ]);
    }
}