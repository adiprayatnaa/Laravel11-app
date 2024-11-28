<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Category::factory(3)->create();
        Category::create(['name' => 'Technology', 'slug' => 'technology', 'color' => 'red']);
        Category::create(['name' => 'Sports', 'slug' => 'sports', 'color' => 'green']);
        Category::create(['name' => 'Entertainment', 'slug' => 'entertainment', 'color' => 'blue']);
    }
}
