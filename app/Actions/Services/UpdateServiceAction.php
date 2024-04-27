<?php

namespace App\Actions\Services;

use App\Tasks\Services\UpdateServiceTask;
use Illuminate\Database\Eloquent\Model;

class UpdateServiceAction
{
    public function __construct(protected UpdateServiceTask $updateServiceTask)
    {}

    public function run(array $payload, int $id): Model
    {
        return $this->updateServiceTask->run($payload, $id);
    }
}
