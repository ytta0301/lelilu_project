<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("posts")->insert([[
            "title" => "first commit",
            "author" => "juan",
            "content" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Qui possimus corrupti consectetur sint magnam molestias natus porro,",
        ], [
            "title" => "second commit",
            "author" => "juan lagi",
            "content" => "Ipsum, dolor sit amet consectetur adipisicing elit. Qui possimus corrupti consectetur sint magnam molestias natus porro,",
        ], [
            "title" => "third commit",
            "author" => "masih juan lagi",
            "content" => "Dolor, sit amet consectetur adipisicing elit. Qui possimus corrupti consectetur sint magnam molestias natus porro,",
        ], [
            "title" => "commit commit commit commit",
            "author" => "dan masih juan lagi",
            "content" => "Sit, amet consectetur adipisicing elit. Qui possimus corrupti consectetur sint magnam molestias natus porro,",
        ], [
            "title" => "commit^5",
            "author" => "tebak siapa",
            "content" => "Amet, consectetur adipisicing elit. Qui possimus corrupti consectetur sint magnam molestias natus porro,",
        ], [
            "title" => "udh 6",
            "author" => "yap, juan",
            "content" => "Consectetur, adipisicing elit. Qui possimus corrupti consectetur sint magnam molestias natus porro,",
        ], [
            "title" => "udh 7",
            "author" => "yap, masih juan",
            "content" => "Adipisicing, elit. Qui possimus corrupti consectetur sint magnam molestias natus porro,",
        ], [
            "title" => "Six Sevennnn",
            "author" => "juan maxxing",
            "content" => "Elit, Qui possimus corrupti consectetur sint magnam molestias natus porro,",
        ], [
            "title" => "888",
            "author" => "kukuh... ?!",
            "content" => "Qui, possimus corrupti consectetur sint magnam molestias natus porro,",
        ], [
            "title" => "RRQ 969",
            "author" => "mana juan?",
            "content" => "Possimus, corrupti consectetur sint magnam molestias natus porro,",
        ], [
            "title" => "10 dosa besar",
            "author" => "jjuuaann",
            "content" => "Corrupti, consectetur sint magnam molestias natus porro,",
        ]]);
    }
}
