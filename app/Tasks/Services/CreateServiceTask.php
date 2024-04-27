<?php

namespace App\Tasks\Services;

use App\Models\Service;
use Illuminate\Database\Eloquent\Model;

class CreateServiceTask
{
    public function run(array $payload): Model
    {
        return Service::create($payload);
    }
}
