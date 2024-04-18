<?php

namespace App\Tasks\Pages;

use App\Models\Page;
use Illuminate\Database\Eloquent\Model;

class FindPageByIdTask
{
    public function run(int $id): Model
    {
        return Page::query()->findOrFail($id);
    }
}
