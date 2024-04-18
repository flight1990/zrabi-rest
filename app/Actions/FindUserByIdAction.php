<?php

namespace App\Actions;

use App\Tasks\FindUserByIdTask;
use Illuminate\Database\Eloquent\Model;

class FindUserByIdAction
{
    public function __construct(protected FindUserByIdTask $findUserByIdTask)
    {}

    public function run(int $id): Model
    {
        return $this->findUserByIdTask->run($id);
    }
}
