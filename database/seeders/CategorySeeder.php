<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        Category::create(['name' => 'Cleanser']);     // ID 1
        Category::create(['name' => 'Moisturizer']);  // ID 2
        Category::create(['name' => 'Serum']);        // ID 3
        Category::create(['name' => 'Toner']);        // ID 4
        Category::create(['name' => 'Sunscreen']);    // ID 5
        Category::create(['name' => 'Mask']);         // ID 6
    }
}
