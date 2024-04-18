<?php

namespace App\Tasks\Pages;

use App\Models\Page;
use Illuminate\Database\Eloquent\Model;

class UpdatePageTask
{
    public function run(array $payload, int $id): Model
    {
        $page = Page::query()->findOrFail($id);
        $page->update($payload);

        return $page;
    }
}
