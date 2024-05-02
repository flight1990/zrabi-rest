<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory(50)
            ->create();
//            ->each(function ($category) {
//                Category::factory(5)
//                    ->create(['parent_id' => $category->id])
//                    ->each(function ($category) {
//                        Category::factory(7)
//                            ->create(['parent_id' => $category->id]);
//                    });
//            });
    }
}
