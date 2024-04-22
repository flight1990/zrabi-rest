<?php

namespace App\Http\Controllers\V1\Admin;

use App\Actions\Pages\CreatePageAction;
use App\Actions\Pages\DeletePageAction;
use App\Actions\Pages\FindPageByIdAction;
use App\Actions\Pages\GetPagesAction;
use App\Actions\Pages\UpdatePageAction;
use App\Http\Controllers\ApiController;
use App\Http\Requests\V1\Pages\CreatePageRequest;
use App\Http\Requests\V1\Pages\UpdatePageRequest;
use App\Http\Resources\V1\PageResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PageController extends ApiController
{
    public function __construct(
        protected GetPagesAction $getPagesAction,
        protected CreatePageAction $createPageAction,
        protected FindPageByIdAction $findPageByIdAction,
        protected UpdatePageAction $updatePageAction,
        protected DeletePageAction $deletePageAction
    )
    {}

    public function index(Request $request): ResourceCollection
    {
        $pages = $this->getPagesAction->run($request->all());
        return $this->respondWithSuccess(PageResource::collection($pages));
    }

    public function store(CreatePageRequest $request): JsonResponse
    {
        $page = $this->createPageAction->run($request->validated());
        return $this->respondWithSuccessCreate(new PageResource($page));
    }

    public function show(int $id): JsonResource
    {
        $page = $this->findPageByIdAction->run($id);
        return $this->respondWithSuccess(new PageResource($page));
    }

    public function update(UpdatePageRequest $request, int $id): JsonResource
    {
        $page = $this->updatePageAction->run($request->validated(), $id);
        return $this->respondWithSuccess(new PageResource($page));
    }

    public function destroy(int $id): JsonResponse
    {
        $this->deletePageAction->run($id);
        return $this->noContent();
    }
}
