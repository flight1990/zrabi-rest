<?php

namespace App\Actions;

use App\Tasks\DeleteUserTask;

class DeleteUserAction
{
    public function __construct(protected DeleteUserTask $deleteUserTask)
    {}

    public function run(int $id): void
    {
        $this->deleteUserTask->run($id);
    }
}
