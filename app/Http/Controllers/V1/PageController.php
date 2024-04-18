<?php

namespace App\Http\Controllers\V1;

use App\Actions\Pages\FindPageBySlugAction;
use App\Http\Controllers\ApiController;
use App\Http\Resources\V1\PageResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PageController extends ApiController
{
    public function __construct(
        protected FindPageBySlugAction $findPageBySlugAction
    )
    {}

    public function show(string $slug): JsonResource
    {
        $page = $this->findPageBySlugAction->run($slug);
        return  $this->respondWithSuccess(new PageResource($page));
    }
}
