<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'category_id' => 1,
                'name' => 'Smartphone X1 Ultra',
                'slug' => 'smartphone-x1-ultra',
                'description' => 'A flagship smartphone with a 108MP camera and 5000mAh battery.',
                'price' => 6500000,
                'stock' => 20,
                'image' => 'smartphone_x1.jpg',
                'status' => 1,
            ],
            [
                'category_id' => 1,
                'name' => 'Wireless Headphones AX-99',
                'slug' => 'wireless-headphones-ax-99',
                'description' => 'Wireless headphones with active noise cancellation.',
                'price' => 899000,
                'stock' => 50,
                'image' => 'headphones_ax99.jpg',
                'status' => 1,
            ],
            [
                'category_id' => 2,
                'name' => 'Slim Fit Premium Shirt',
                'slug' => 'slim-fit-premium-shirt',
                'description' => 'A premium slim-fit shirt suitable for work or casual wear.',
                'price' => 175000,
                'stock' => 80,
                'image' => 'slimfit_shirt.jpg',
                'status' => 1,
            ],
        ];

        foreach ($products as $m) {
            Product::create($m);
        }
    }
}
