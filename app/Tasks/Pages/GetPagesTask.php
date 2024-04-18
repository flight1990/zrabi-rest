<?php

namespace App\Tasks\Pages;

use App\Models\Page;
use Illuminate\Pagination\LengthAwarePaginator;

class GetPagesTask
{
    public function run(int $limit = 10): LengthAwarePaginator
    {
        return Page::query()->paginate($limit);
    }
}
