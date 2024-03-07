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
        $categories = [
            'Appetizers',
            'Soups',
            'Salads',
            'Main Courses',
            'Pasta and Noodles',
            'Sandwiches and Wraps',
            'Burgers',
            'Pizza',
            'Sides',
            'Desserts',
            'Beverages',
            'Breakfast',
            'Kids Menu',
            'Specials',
            'Healthy Options',
            'Gluten-Free',
            'Seasonal Specials',
            'Combo Meals',
           
        ];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    
    }
}
