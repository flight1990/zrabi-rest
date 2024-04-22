<?php

namespace App\Tasks\Tags;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;

class FindTagByIdTask
{
    public function run(int $id): Model
    {
        return Tag::query()->findOrFail($id);
    }
}
