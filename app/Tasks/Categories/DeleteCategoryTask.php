<?php

namespace App\Tasks\Categories;

use App\Models\Category;

class DeleteCategoryTask
{
    public function run(int $id): void
    {
        $category = Category::query()->findOrFail($id);
        $category->delete();
    }
}
