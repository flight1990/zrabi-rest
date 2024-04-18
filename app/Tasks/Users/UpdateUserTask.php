<?php

namespace App\Tasks\Users;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UpdateUserTask
{
    public function run(array $payload, int $id): Model
    {
        $user = User::query()->findOrFail($id);
        $user->update($payload);

        return $user;
    }
}
