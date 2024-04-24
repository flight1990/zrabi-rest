<?php

namespace App\Actions\Categories;

use App\Tasks\Categories\DeleteCategoryTask;

class DeleteCategoryAction
{
    public function __construct(protected DeleteCategoryTask $deleteCategoryTask)
    {}

    public function run(int $id): void
    {
        $this->deleteCategoryTask->run($id);
    }
}
