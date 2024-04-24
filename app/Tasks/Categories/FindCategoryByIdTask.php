<?php

namespace App\Tasks\Categories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class FindCategoryByIdTask
{
    public function run(int $id): Model
    {
        return Category::query()->findOrFail($id);
    }
}
