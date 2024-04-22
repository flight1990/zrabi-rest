<?php

namespace App\Actions\Tags;

use App\Tasks\Tags\FindTagByIdTask;
use Illuminate\Database\Eloquent\Model;

class FindTagByIdAction
{
    public function __construct(protected FindTagByIdTask $findTagByIdTask)
    {}

    public function run(int $id): Model
    {
        return $this->findTagByIdTask->run($id);
    }
}
