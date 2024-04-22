<?php

namespace App\Http\Controllers\V1\Admin;

use App\Actions\Tags\CreateTagAction;
use App\Actions\Tags\DeleteTagAction;
use App\Actions\Tags\FindTagByIdAction;
use App\Actions\Tags\GetTagsAction;
use App\Actions\Tags\UpdateTagAction;
use App\Http\Controllers\ApiController;
use App\Http\Requests\V1\Tags\CreateTagRequest;
use App\Http\Requests\V1\Tags\UpdateTagRequest;
use App\Http\Resources\V1\TagResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TagController extends ApiController
{
    public function __construct(
        protected GetTagsAction $getTagsAction,
        protected CreateTagAction $createTagAction,
        protected FindTagByIdAction $findTagByIdAction,
        protected UpdateTagAction $updateTagAction,
        protected DeleteTagAction $deleteTagAction
    )
    {}

    public function index(Request $request): ResourceCollection
    {
        $tags = $this->getTagsAction->run($request->all());
        return $this->respondWithSuccess(TagResource::collection($tags));
    }

    public function store(CreateTagRequest $request): JsonResponse
    {
        $tag = $this->createTagAction->run($request->validated());
        return $this->respondWithSuccessCreate(new TagResource($tag));
    }

    public function show(int $id): JsonResource
    {
        $tag = $this->findTagByIdAction->run($id);
        return $this->respondWithSuccess(new TagResource($tag));
    }

    public function update(UpdateTagRequest $request, int $id): JsonResource
    {
        $tag = $this->updateTagAction->run($request->validated(), $id);
        return $this->respondWithSuccess(new TagResource($tag));
    }

    public function destroy(int $id): JsonResponse
    {
        $this->deleteTagAction->run($id);
        return $this->noContent();
    }
}
