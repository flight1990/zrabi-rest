<?php

namespace App\Actions\Pages;

use App\Tasks\Pages\FindPageBySlugTask;
use Illuminate\Database\Eloquent\Model;

class FindPageBySlugAction
{
    public function __construct(protected FindPageBySlugTask $findPageBySlugTask)
    {}

    public function run(string $slug): Model
    {
        return $this->findPageBySlugTask->run($slug);
    }
}
