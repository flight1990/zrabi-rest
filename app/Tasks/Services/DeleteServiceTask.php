<?php

namespace App\Tasks\Services;

use App\Models\Service;

class DeleteServiceTask
{
    public function run(int $id): void
    {
        $service = Service::query()->findOrFail($id);
        $service->delete();
    }
}
