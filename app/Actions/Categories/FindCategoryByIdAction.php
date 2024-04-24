<?php

namespace App\Actions\Categories;

use App\Tasks\Categories\FindCategoryByIdTask;
use Illuminate\Database\Eloquent\Model;

class FindCategoryByIdAction
{
    public function __construct(protected FindCategoryByIdTask $findCategoryByIdTask)
    {}

    public function run(int $id): Model
    {
        return $this->findCategoryByIdTask->run($id);
    }
}
