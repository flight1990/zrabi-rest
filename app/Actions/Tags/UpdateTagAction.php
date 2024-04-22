<?php

namespace App\Actions\Tags;

use App\Tasks\Tags\UpdateTagTask;
use Illuminate\Database\Eloquent\Model;

class UpdateTagAction
{
    public function __construct(protected UpdateTagTask $updateTagTask)
    {}

    public function run(array $payload, int $id): Model
    {
        return $this->updateTagTask->run($payload, $id);
    }
}
