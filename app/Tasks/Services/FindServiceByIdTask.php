<?php

namespace App\Tasks\Services;

use App\Models\Service;
use Illuminate\Database\Eloquent\Model;

class FindServiceByIdTask
{
    public function run(int $id): Model
    {
        return Service::query()->findOrFail($id);
    }
}
