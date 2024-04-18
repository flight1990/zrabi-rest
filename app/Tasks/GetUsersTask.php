<?php

namespace App\Tasks;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

class GetUsersTask
{
    public function run(int $limit = 10): LengthAwarePaginator
    {
        return User::query()->paginate($limit);
    }
}
