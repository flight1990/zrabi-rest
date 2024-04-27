<?php

namespace App\Actions\Categories;

use App\Tasks\Categories\RebuildCategoriesTreeTask;

class RebuildCategoriesTreeAction
{
    public function __construct(protected RebuildCategoriesTreeTask $rebuildCategoriesTreeTask)
    {}

    public function run(array $payload): int
    {
        return $this->rebuildCategoriesTreeTask->run($payload['data']);
    }
}
