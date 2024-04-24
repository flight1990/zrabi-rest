<?php

namespace App\Tasks\Categories;

use App\Models\Category;
use Kalnoy\Nestedset\Collection;

class GetCategoriesToTreeTask
{
    public function run(): Collection
    {
        return Category::query()
            ->defaultOrder()
            ->get()
            ->toTree();
    }
}
