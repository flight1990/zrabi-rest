<?php

namespace App\Tasks\Categories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class UpdateCategoryTask
{
    public function run(array $payload, int $id): Model
    {
        $category = Category::query()->findOrFail($id);
        $category->update($payload);

        return $category;
    }
}
