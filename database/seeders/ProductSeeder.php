<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();
        foreach ($categories as $category) {
            for ($i = 0; $i < 5; $i++) {
                Product::create([
                    'name' => "Produk {$i} dari {$category->name}",
                    'description' => "Deskripsi untuk produk {$i} dari kategori {$category->name}",
                    'price' => rand(10000, 50000),
                    'slug' => strtolower("produk-{$i}-dari-{$category->slug}"),
                    'stock' => rand(10, 100),
                    'image' => 'default.png',
                    'category_id' => $category->id,
                ]);
            }
        }
    }
}