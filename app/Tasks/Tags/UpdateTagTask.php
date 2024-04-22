<?php

namespace App\Tasks\Tags;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;

class UpdateTagTask
{
    public function run(array $payload, int $id): Model
    {
        $tag = Tag::query()->findOrFail($id);
        $tag->update($payload);

        return $tag;
    }
}
