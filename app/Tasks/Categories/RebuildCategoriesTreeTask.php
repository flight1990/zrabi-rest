<?php

namespace App\Tasks\Categories;

use App\Models\Category;

class RebuildCategoriesTreeTask
{
    public function run(array $payload)
    {
        return Category::rebuildTree($payload, false);
    }
}
