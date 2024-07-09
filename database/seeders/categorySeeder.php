<?php

namespace Database\Seeders;

use App\Models\Category\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = new Category();
        $category->name = 'Action';
        $category->save();

        $category = new Category();
        $category->name = 'Adventure';
        $category->save();

        $category = new Category();
        $category->name = 'Magic';
        $category->save();

        $category = new Category();
        $category->name = 'Romance';
        $category->save();
    }
}
