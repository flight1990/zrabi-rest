<?php

namespace App\Actions\Categories;

use App\Tasks\Categories\GetCategoriesTask;
use App\Tasks\Categories\GetCategoriesToTreeTask;
use Illuminate\Pagination\LengthAwarePaginator;
use Kalnoy\Nestedset\Collection;

class GetCategoriesAction
{
    public function __construct(protected GetCategoriesToTreeTask $categoriesToTreeTask)
    {}

    public function run(): \Illuminate\Support\Collection
    {
        return $this->categoriesToTreeTask->run();
    }
}
