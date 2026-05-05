<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("products")->insert([[
            "name" => "Ayam Goreng",
            "description" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Qui possimus corrupti consectetur sint magnam molestias natus porro, magni quidem eos at. Iure, reprehenderit odit est provident obcaecati amet tempore. Non eaque itaque consectetur ratione deserunt iure sint officia adipisci eum, animi, est exercitationem deleniti. Maxime sapiente quam aliquam dignissimos facilis quod ab dicta assumenda deleniti. Facere quo quia accusamus. Dignissimos distinctio eum ipsum mollitia expedita, perspiciatis aliquam quisquam ullam alias id? Illo, commodi cumque quasi debitis natus dicta. Totam ex dolorum quisquam autem expedita veritatis qui? Facere ipsa maxime quibusdam natus, ipsam voluptatibus quasi voluptates vero obcaecati voluptatum fugiat sunt.",
            "price" => 15000,
            "category" => "food",
        ], [
            "name" => "Bebek Bakar",
            "description" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Qui possimus corrupti consectetur sint magnam molestias natus porro, magni quidem eos at. Iure, reprehenderit odit est provident obcaecati amet tempore. Non eaque itaque consectetur ratione deserunt iure sint officia adipisci eum, animi, est exercitationem deleniti. Maxime sapiente quam aliquam dignissimos facilis quod ab dicta assumenda deleniti. Facere quo quia accusamus. Dignissimos distinctio eum ipsum mollitia expedita, perspiciatis aliquam quisquam ullam alias id? Illo, commodi cumque quasi debitis natus dicta. Totam ex dolorum quisquam autem expedita veritatis qui? Facere ipsa maxime quibusdam natus, ipsam voluptatibus quasi voluptates vero obcaecati voluptatum fugiat sunt.",
            "price" => 20000,
            "category" => "food",
        ],
        [
            "name" => "Cicak Terbang",
            "description" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Qui possimus corrupti consectetur sint magnam molestias natus porro, magni quidem eos at. Iure, reprehenderit odit est provident obcaecati amet tempore. Non eaque itaque consectetur ratione deserunt iure sint officia adipisci eum, animi, est exercitationem deleniti. Maxime sapiente quam aliquam dignissimos facilis quod ab dicta assumenda deleniti. Facere quo quia accusamus. Dignissimos distinctio eum ipsum mollitia expedita, perspiciatis aliquam quisquam ullam alias id? Illo, commodi cumque quasi debitis natus dicta. Totam ex dolorum quisquam autem expedita veritatis qui? Facere ipsa maxime quibusdam natus, ipsam voluptatibus quasi voluptates vero obcaecati voluptatum fugiat sunt.",
            "price" => 100000,
            "category" => "food",
        ], 
        [
            "name" => "Kuda Renang",
            "description" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Qui possimus corrupti consectetur sint magnam molestias natus porro, magni quidem eos at. Iure, reprehenderit odit est provident obcaecati amet tempore. Non eaque itaque consectetur ratione deserunt iure sint officia adipisci eum, animi, est exercitationem deleniti. Maxime sapiente quam aliquam dignissimos facilis quod ab dicta assumenda deleniti. Facere quo quia accusamus. Dignissimos distinctio eum ipsum mollitia expedita, perspiciatis aliquam quisquam ullam alias id? Illo, commodi cumque quasi debitis natus dicta. Totam ex dolorum quisquam autem expedita veritatis qui? Facere ipsa maxime quibusdam natus, ipsam voluptatibus quasi voluptates vero obcaecati voluptatum fugiat sunt.",
            "price" => 50000,
            "category" => "food",
        ]] );
    }
}
