<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Product::create([
                'name' => "Product $i",
                'price' => rand(10, 100),
                'description' => "Description for Product $i",
                'image' => "https://picsum.photos/id/$i/200/300",
            ]);
        }
    }
}
