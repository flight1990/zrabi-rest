<?php

namespace App\Tasks\Categories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class CreateCategoryTask
{
    public function run(array $payload): Model
    {
        return Category::create($payload);
    }
}
