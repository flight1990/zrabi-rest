<?php

namespace App\Actions\Tags;

use App\Tasks\Tags\CreateTagTask;
use Illuminate\Database\Eloquent\Model;

class CreateTagAction
{
    public function __construct(protected CreateTagTask $createTagTask)
    {}

    public function run(array $payload): Model
    {
        return $this->createTagTask->run($payload);
    }
}
