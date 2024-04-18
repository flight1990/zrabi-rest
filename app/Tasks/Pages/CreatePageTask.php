<?php

namespace App\Tasks\Pages;

use App\Models\Page;
use Illuminate\Database\Eloquent\Model;

class CreatePageTask
{
    public function run(array $payload): Model
    {
        return Page::create($payload);
    }
}
