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
        Category::create(['name' => 'Technology', 'slug' => 'technology']);
        Category::create(['name' => 'Sports', 'slug' => 'sports']);
        Category::create(['name' => 'Entertainment', 'slug' => 'entertainment']);
    }
}
