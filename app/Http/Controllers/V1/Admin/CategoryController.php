<?php

namespace App\Http\Controllers\V1\Admin;

use App\Actions\Categories\CreateCategoryAction;
use App\Actions\Categories\DeleteCategoryAction;
use App\Actions\Categories\FindCategoryByIdAction;
use App\Actions\Categories\GetCategoriesAction;
use App\Actions\Categories\RebuildCategoriesTreeAction;
use App\Actions\Categories\UpdateCategoryAction;
use App\Http\Controllers\ApiController;
use App\Http\Requests\V1\Categories\CreateCategoryRequest;
use App\Http\Requests\V1\Categories\RebuildCategoryRequest;
use App\Http\Requests\V1\Categories\UpdateCategoryRequest;
use App\Http\Resources\V1\CategoryResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryController extends ApiController
{
    public function __construct(
        protected GetCategoriesAction $getCategoriesAction,
        protected CreateCategoryAction $createCategoryAction,
        protected FindCategoryByIdAction $findCategoryByIdAction,
        protected UpdateCategoryAction $updateCategoryAction,
        protected DeleteCategoryAction $deleteCategoryAction,
        protected RebuildCategoriesTreeAction $rebuildCategoriesTreeAction
    )
    {}

    public function index(Request $request): JsonResponse
    {
        $categories = $this->getCategoriesAction->run();
        return $this->respondWithArray($categories->toArray());
    }

    public function store(CreateCategoryRequest $request): JsonResponse
    {
        $category = $this->createCategoryAction->run($request->validated());
        return $this->respondWithSuccessCreate(new CategoryResource($category));
    }

    public function show(int $id): JsonResource
    {
        $category = $this->findCategoryByIdAction->run($id);
        return $this->respondWithSuccess(new CategoryResource($category));
    }

    public function update(UpdateCategoryRequest $request, int $id): JsonResource
    {
        $category = $this->updateCategoryAction->run($request->validated(), $id);
        return $this->respondWithSuccess(new CategoryResource($category));
    }

    public function destroy(int $id): JsonResponse
    {
        $this->deleteCategoryAction->run($id);
        return $this->noContent();
    }

    public function rebuild(RebuildCategoryRequest $request): JsonResponse
    {
        $this->rebuildCategoriesTreeAction->run($request->validated());
        return $this->noContent();
    }
}
