<?php

namespace App\Actions\Tags;

use App\Tasks\Tags\DeleteTagTask;

class DeleteTagAction
{
    public function __construct(protected DeleteTagTask $deleteTagTask)
    {}

    public function run(int $id): void
    {
        $this->deleteTagTask->run($id);
    }
}
