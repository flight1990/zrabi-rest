<?php

namespace App\Http\Controllers\V1\Admin;

use App\Actions\Users\CreateUserAction;
use App\Actions\Users\DeleteUserAction;
use App\Actions\Users\FindUserByIdAction;
use App\Actions\Users\GetUsersAction;
use App\Actions\Users\UpdateUserAction;
use App\Http\Controllers\ApiController;
use App\Http\Requests\V1\Users\CreateUserRequest;
use App\Http\Requests\V1\Users\UpdateUserRequest;
use App\Http\Resources\V1\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserController extends ApiController
{
    public function __construct(
        protected GetUsersAction $getUsersAction,
        protected CreateUserAction $createUserAction,
        protected FindUserByIdAction $findUserByIdAction,
        protected UpdateUserAction $updateUserAction,
        protected DeleteUserAction $deleteUserAction
    )
    {}

    public function index(Request $request): ResourceCollection
    {
        $users = $this->getUsersAction->run($request->all());
        return $this->respondWithSuccess(UserResource::collection($users));
    }

    public function store(CreateUserRequest $request): JsonResponse
    {
        $user = $this->createUserAction->run($request->validated());
        return $this->respondWithSuccessCreate(new UserResource($user));
    }

    public function show(int $id): JsonResource
    {
        $user = $this->findUserByIdAction->run($id);
        return $this->respondWithSuccess(new UserResource($user));
    }

    public function update(UpdateUserRequest $request, int $id): JsonResource
    {
        $user = $this->updateUserAction->run($request->validated(), $id);
        return $this->respondWithSuccess(new UserResource($user));
    }

    public function destroy(int $id): JsonResponse
    {
        $this->deleteUserAction->run($id);
        return $this->noContent();
    }
}
