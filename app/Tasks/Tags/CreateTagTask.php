<?php

namespace App\Tasks\Tags;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;

class CreateTagTask
{
    public function run(array $payload): Model
    {
        return Tag::create($payload);
    }
}
