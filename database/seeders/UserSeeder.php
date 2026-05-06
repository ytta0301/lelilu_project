<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            // Admin
            [
                'nama'       => 'Admin Utama',
                'no_wa'      => '081200000001',
                'password'   => Hash::make('admin123'),
                'role'       => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama'       => 'Worker hitam',
                'no_wa'      => '081200000002',
                'password'   => Hash::make('worker123'),
                'role'       => 'worker',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // User
            [
                'nama'       => 'Budi Santoso',
                'no_wa'      => '081234567001',
                'password'   => Hash::make('user123'),
                'role'       => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama'       => 'Siti Rahayu',
                'no_wa'      => '081234567002',
                'password'   => Hash::make('user123'),
                'role'       => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama'       => 'Andi Prasetyo',
                'no_wa'      => '081234567003',
                'password'   => Hash::make('user123'),
                'role'       => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}