<?php

namespace App\Actions\Services;

use App\Tasks\Services\DeleteServiceTask;

class DeleteServiceAction
{
    public function __construct(protected DeleteServiceTask $deleteServiceTask)
    {}

    public function run(int $id): void
    {
        $this->deleteServiceTask->run($id);
    }
}
