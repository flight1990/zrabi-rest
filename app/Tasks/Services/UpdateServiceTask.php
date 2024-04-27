<?php

namespace App\Tasks\Services;

use App\Models\Service;
use Illuminate\Database\Eloquent\Model;

class UpdateServiceTask
{
    public function run(array $payload, int $id): Model
    {
        $service = Service::query()->findOrFail($id);
        $service->update($payload);

        return $service;
    }
}
