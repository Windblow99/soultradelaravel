<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();

        Category::create(['name' => 'PC Games']);
        Category::create(['name' => 'Mobile Games']);
        Category::create(['name' => 'Chatting']);
        Category::create(['name' => 'Others']);
    }
}
