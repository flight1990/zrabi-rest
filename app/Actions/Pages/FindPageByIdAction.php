<?php

namespace App\Actions\Pages;

use App\Tasks\Pages\FindPageByIdTask;
use Illuminate\Database\Eloquent\Model;

class FindPageByIdAction
{
    public function __construct(protected FindPageByIdTask $findPageByIdTask)
    {}

    public function run(int $id): Model
    {
        return $this->findPageByIdTask->run($id);
    }
}
