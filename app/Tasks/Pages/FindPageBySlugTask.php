<?php

namespace App\Tasks\Pages;

use App\Models\Page;
use Illuminate\Database\Eloquent\Model;

class FindPageBySlugTask
{
    public function run(string $slug): Model
    {
        return Page::query()->where('slug', $slug)->firstOrFail();
    }
}
