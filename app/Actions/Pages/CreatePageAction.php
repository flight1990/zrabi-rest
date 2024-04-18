<?php

namespace App\Actions\Pages;

use App\Tasks\Pages\CreatePageTask;
use Illuminate\Database\Eloquent\Model;

class CreatePageAction
{
    public function __construct(protected CreatePageTask $createPageTaskTask)
    {}

    public function run(array $payload): Model
    {
        return $this->createPageTaskTask->run($payload);
    }
}
