<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create([
            'name' => 'Smartphones',
            'description' => 'All smartphone devices',
        ]);

        Category::create([
            'name' => 'Laptops',
            'description' => 'All laptop devices',
        ]);

        Category::create([
            'name' => 'Accessories',
            'description' => 'Phone and computer accessories',
        ]);
    }
}
