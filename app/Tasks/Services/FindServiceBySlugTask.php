<?php

namespace App\Tasks\Services;

use App\Models\Service;
use Illuminate\Database\Eloquent\Model;

class FindServiceBySlugTask
{
    public function run(string $slug): Model
    {
        return Service::query()->where('slug', $slug)->firstOrFail();
    }
}
