<?php

namespace App\Tasks;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class FindUserByIdTask
{
    public function run(int $id): Model
    {
        return  User::query()->findOrFail($id);
    }
}
