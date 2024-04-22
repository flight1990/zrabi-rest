<?php

namespace App\Actions\Tags;

use App\Tasks\Tags\GetTagsTask;
use Illuminate\Pagination\LengthAwarePaginator;

class GetTagsAction
{
    public function __construct(protected GetTagsTask $getTagsTask)
    {}

    public function run(array $params = []): LengthAwarePaginator
    {
        return $this->getTagsTask->run($params['limit'] ?? 10);
    }
}
