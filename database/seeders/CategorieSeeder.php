<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Electronics', 'slug' => 'electronics'],
            ['name' => 'Men Fashion', 'slug' => 'men-fashion'],
            ['name' => 'Women Fashion', 'slug' => 'women-fashion'],
            ['name' => 'Home Appliances', 'slug' => 'home-appliances'],
            ['name' => 'Sports', 'slug' => 'sports'],
            ['name' => 'Baby Products', 'slug' => 'baby-products'],
        ];

        foreach ($categories as $m) {
            Category::create($m);
        }
    }
}
