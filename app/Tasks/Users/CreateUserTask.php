<?php

namespace App\Tasks\Users;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class CreateUserTask
{
    public function run(array $payload): Model
    {
        return User::create($payload);
    }
}
