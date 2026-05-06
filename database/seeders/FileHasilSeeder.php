<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FileHasilSeeder extends Seeder
{
    public function run(): void
    {
        // Hanya pemesanan berstatus 'selesai' yang punya file hasil
        // id_pemesanan: 1 (Budi - Logo), 3 (Siti - Poster), 5 (Andi - IG)
        DB::table('file_hasils')->insert([
            [
                'pemesanan_id'      => 1,
                'gambar_hasil'      => 'hasil/logo_budi_v1.png',
                'tampil_portofolio' => true,
                'tanggal_upload'    => now()->subDays(9),
            ],
            [
                'pemesanan_id'      => 1,
                'gambar_hasil'      => 'hasil/logo_budi_v2_final.png',
                'tampil_portofolio' => true,
                'tanggal_upload'    => now()->subDays(8),
            ],
            [
                'pemesanan_id'      => 3,
                'gambar_hasil'      => 'hasil/poster_siti_seminar.png',
                'tampil_portofolio' => true,
                'tanggal_upload'    => now()->subDays(6),
            ],
            [
                'pemesanan_id'      => 5,
                'gambar_hasil'      => 'hasil/ig_andi_tile1.png',
                'tampil_portofolio' => true,
                'tanggal_upload'    => now()->subDays(13),
            ],
            [
                'pemesanan_id'      => 5,
                'gambar_hasil'      => 'hasil/ig_andi_tile2.png',
                'tampil_portofolio' => false,
                'tanggal_upload'    => now()->subDays(13),
            ],
            [
                'pemesanan_id'      => 5,
                'gambar_hasil'      => 'hasil/ig_andi_tile3.png',
                'tampil_portofolio' => true,
                'tanggal_upload'    => now()->subDays(12),
            ],
        ]);
    }
}