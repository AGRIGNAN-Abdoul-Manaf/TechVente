<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $smartphones = Category::where('name','Smartphones')->first();
        $laptops = Category::where('name','Laptops')->first();
        $accessories = Category::where('name','Accessories')->first();

        Product::create([
            'name' => 'iPhone 15',
            'description' => 'Latest Apple iPhone 15',
            'price' => 1200,
            'discount' => 0,
            'stock' => 50,
            'category_id' => $smartphones->id,
        ]);

        Product::create([
            'name' => 'MacBook Pro 16"',
            'description' => 'Apple Laptop',
            'price' => 2500,
            'discount' => 0,
            'stock' => 30,
            'category_id' => $laptops->id,
        ]);

        Product::create([
            'name' => 'Wireless Mouse',
            'description' => 'Bluetooth mouse',
            'price' => 50,
            'discount' => 0,
            'stock' => 100,
            'category_id' => $accessories->id,
        ]);
    }
}
