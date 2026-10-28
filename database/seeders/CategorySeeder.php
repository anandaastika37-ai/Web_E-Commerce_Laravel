<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{

    public function run(): void
    {
        Category::firstOrCreate(
            ['slug' => 'atasan'],
            [
                'name' => 'Atasan',
                'description' => 'Koleksi pakaian bagian atas seperti kaos, kemeja, blus, polo, dan sweater untuk berbagai gaya dan aktivitas.'
            ]
        );

        Category::firstOrCreate(
            ['slug' => 'bawahan'],
            [
                'name' => 'Bawahan',
                'description' => 'Beragam pakaian bagian bawah seperti celana jeans, celana bahan, rok, dan celana pendek untuk melengkapi penampilan.'
            ]
        );

        Category::firstOrCreate(
            ['slug' => 'luaran'],
            [
                'name' => 'Luaran',
                'description' => 'Pilihan pakaian luar seperti jaket, hoodie, cardigan, blazer, dan coat untuk menambah gaya serta kenyamanan.'
            ]
        );

        Category::firstOrCreate(
            ['slug' => 'aksesoris'],
            [
                'name' => 'Aksesoris',
                'description' => 'Berbagai pelengkap penampilan seperti topi, ikat pinggang, tas, jam tangan, dan aksesori fashion lainnya.'
            ]
        );

        Category::firstOrCreate(
            ['slug' => 'alas-kaki'],
            [
                'name' => 'Alas Kaki',
                'description' => 'Koleksi alas kaki seperti sepatu sneakers, sepatu formal, sandal, dan slip-on untuk berbagai kebutuhan dan aktivitas.'
            ]
        );
    }
}
