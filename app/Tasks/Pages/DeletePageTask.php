<?php

namespace App\Tasks\Pages;

use App\Models\Page;

class DeletePageTask
{
    public function run(int $id): void
    {
        $page = Page::query()->findOrFail($id);
        $page->delete();
    }
}
