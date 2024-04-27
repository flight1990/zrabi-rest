<?php

namespace App\Actions\Services;

use App\Tasks\Services\GetServicesTask;
use Illuminate\Pagination\LengthAwarePaginator;

class GetServicesAction
{
    public function __construct(protected GetServicesTask $getServicesTask)
    {}

    public function run(array $params = []): LengthAwarePaginator
    {
        return $this->getServicesTask->run($params['limit'] ?? 10);
    }
}
