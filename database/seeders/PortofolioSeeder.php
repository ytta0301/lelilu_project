<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Portfolio;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama_kreator' => 'Suki Art Collection',
                'deskripsi'    => 'Desain grafis untuk brand baru',
                'gambar'       => null,
                'is_aktif'     => true,
            ],
            [
                'nama_kreator' => 'Luna Creative',
                'deskripsi'    => 'Ilustrasi karakter 2D untuk game indie',
                'gambar'       => null,
                'is_aktif'     => true,
            ],
            [
                'nama_kreator' => 'Reza Motion Studio',
                'deskripsi'    => 'Animasi motion graphic produk kosmetik',
                'gambar'       => null,
                'is_aktif'     => true,
            ],
            [
                'nama_kreator' => 'Suki Art Collection',
                'deskripsi'    => 'Poster event musik lokal Surabaya',
                'gambar'       => null,
                'is_aktif'     => true,
            ],
            [
                'nama_kreator' => 'Luna Creative',
                'deskripsi'    => 'UI kit dashboard SaaS startup',
                'gambar'       => null,
                'is_aktif'     => true,
            ],
            [
                'nama_kreator' => 'Reza Motion Studio',
                'deskripsi'    => 'Video teaser peluncuran produk FMCG',
                'gambar'       => null,
                'is_aktif'     => false,
            ],
        ];

        foreach ($data as $item) {
            Portfolio::create($item);
        }
    }
}