<?php

namespace App\Http\Controllers\V1;

use App\Actions\Services\FindServiceBySlugAction;
use App\Http\Controllers\ApiController;
use App\Http\Resources\V1\ServiceResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceController extends ApiController
{
    public function __construct(
        protected FindServiceBySlugAction $findServiceBySlugAction
    )
    {}

    public function show(string $slug): JsonResource
    {
        $service = $this->findServiceBySlugAction->run($slug);
        return  $this->respondWithSuccess(new ServiceResource($service));
    }
}
