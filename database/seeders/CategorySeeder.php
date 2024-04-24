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
        Category::factory(2)
            ->create();
//            ->each(function ($category) {
//                Category::factory(2)
//                    ->create([
//                        'parent_id' => $category->id
//                    ])
//                    ->each(function ($category) {
//                        Category::factory(2)
//                            ->create([
//                                'parent_id' => $category->id
//                            ]);
//                    });
//            });
    }
}
