<?php

namespace App\Actions\Services;

use App\Tasks\Services\CreateServiceTask;
use Illuminate\Database\Eloquent\Model;

class CreateServiceAction
{
    public function __construct(protected CreateServiceTask $createServiceTask)
    {}

    public function run(array $payload): Model
    {
        return $this->createServiceTask->run($payload);
    }
}
