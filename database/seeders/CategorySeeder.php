<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            "name" => "Makanan",
            "slug" => "makanan",
        ]);

        Category::create([
            "name" => "Minuman",
            "slug" => "minuman",
        ]);

        Category::create([
            "name" => "Bahan Makanan",
            "slug" => "Bahan Makanan",
        ]);

        Category::create([
            "name" => "Perabotan",
            "slug" => "Perabotan",
        ]);

        Category::create([
            "name" => "Peralatan dapur",
            "slug" => "Peralatan dapur",
        ]);

        Category::create([
            "name" => "Kesehatan",
            "slug" => "Kesehatan",
        ]);
    }
}
