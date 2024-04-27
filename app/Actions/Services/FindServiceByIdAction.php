<?php

namespace App\Actions\Services;

use App\Tasks\Services\FindServiceByIdTask;
use Illuminate\Database\Eloquent\Model;

class FindServiceByIdAction
{
    public function __construct(protected FindServiceByIdTask $findServiceByIdTask)
    {}

    public function run(int $id): Model
    {
        return $this->findServiceByIdTask->run($id);
    }
}
