<?php

namespace App\Tasks\Tags;

use App\Models\Tag;

class DeleteTagTask
{
    public function run(int $id): void
    {
        $tag = Tag::query()->findOrFail($id);
        $tag->delete();
    }
}
