<?php

namespace App\Http\Controllers\V1;

use App\Actions\CreateUserAction;
use App\Actions\DeleteUserAction;
use App\Actions\FindUserByIdAction;
use App\Actions\GetUsersAction;
use App\Actions\UpdateUserAction;
use App\Http\Controllers\ApiController;
use App\Http\Requests\V1\CreateUserRequest;
use App\Http\Requests\V1\UpdateUserRequest;
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
