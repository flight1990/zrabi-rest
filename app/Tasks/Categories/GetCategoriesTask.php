<?php

namespace App\Tasks\Categories;

use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;

class GetCategoriesTask
{
    public function run(int $limit = 10): LengthAwarePaginator
    {
        return Category::query()->paginate($limit);
    }
}
