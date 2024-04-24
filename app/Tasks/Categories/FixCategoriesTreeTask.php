<?php

namespace App\Tasks\Categories;

use App\Models\Category;

class FixCategoriesTreeTask
{
    public function run()
    {
        return Category::fixTree();
    }
}
