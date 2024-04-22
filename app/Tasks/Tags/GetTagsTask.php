<?php

namespace App\Tasks\Tags;

use App\Models\Tag;
use Illuminate\Pagination\LengthAwarePaginator;

class GetTagsTask
{
    public function run(int $limit = 10): LengthAwarePaginator
    {
        return Tag::query()->paginate($limit);
    }
}
