<?php

namespace App\Tasks\Services;

use App\Models\Service;
use Illuminate\Pagination\LengthAwarePaginator;

class GetServicesTask
{
    public function run(int $limit = 10): LengthAwarePaginator
    {
        return Service::query()->paginate($limit);
    }
}
