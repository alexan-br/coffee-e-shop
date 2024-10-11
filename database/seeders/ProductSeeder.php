<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $faker = Faker::create();

        $productCount = 10; // Example: Seed only 10 products

        for ($i = 0; $i < $productCount; $i++) {
            Product::create([
                'name' => $faker->word,
                'description' => $faker->sentence(10),
                'thumbnail' => $faker->imageUrl(640, 480, 'products', true, 'Faker'), // Generates a random product image
                'price' => $faker->randomFloat(2, 1, 100), // Generates a price between 10 and 1000
            ]);
        }
    }
}
