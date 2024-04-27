<?php

namespace App\Actions\Services;

use App\Tasks\Services\FindServiceBySlugTask;
use Illuminate\Database\Eloquent\Model;

class FindServiceBySlugAction
{
    public function __construct(protected FindServiceBySlugTask $findServiceBySlugTask)
    {}

    public function run(string $slug): Model
    {
        return $this->findServiceBySlugTask->run($slug);
    }
}
