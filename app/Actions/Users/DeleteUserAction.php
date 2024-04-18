<?php

namespace App\Actions\Users;

use App\Tasks\Users\DeleteUserTask;

class DeleteUserAction
{
    public function __construct(protected DeleteUserTask $deleteUserTask)
    {}

    public function run(int $id): void
    {
        $this->deleteUserTask->run($id);
    }
}
